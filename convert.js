import fs from 'fs';
import path from 'path';
import crypto from 'crypto';
import https from 'https';

const stitchAssetsDir = path.join(process.cwd(), 'stitch_assets');
const viewsDir = path.join(process.cwd(), 'resources', 'views', 'pages');
const uploadsDir = path.join(process.cwd(), 'public', 'uploads', 'stitch');

// Create directories if they don't exist
if (!fs.existsSync(viewsDir)) fs.mkdirSync(viewsDir, { recursive: true });
if (!fs.existsSync(uploadsDir)) fs.mkdirSync(uploadsDir, { recursive: true });

async function downloadImage(url, dest) {
    return new Promise((resolve, reject) => {
        if (!url.startsWith('http')) return resolve();
        https.get(url, (res) => {
            if (res.statusCode !== 200) {
                console.warn(`Failed to download ${url}: ${res.statusCode}`);
                resolve();
                return;
            }
            const file = fs.createWriteStream(dest);
            res.pipe(file);
            file.on('finish', () => {
                file.close();
                resolve();
            });
        }).on('error', (err) => {
            console.error(`Error downloading ${url}: ${err.message}`);
            resolve();
        });
    });
}

function extractBodyContent(html) {
    const bodyMatch = html.match(/<body[^>]*>([\s\S]*?)<\/body>/i);
    return bodyMatch ? bodyMatch[1] : html;
}

function sanitizeClassName(html) {
    // Remove unwanted selection colors or global backgrounds from body tag if needed
    return html; 
}

async function processFile(fileName) {
    if (!fileName.endsWith('.html')) return;

    console.log(`Processing ${fileName}...`);
    const filePath = path.join(stitchAssetsDir, fileName);
    let htmlContent = fs.readFileSync(filePath, 'utf-8');

    // Find and download images
    const imgRegex = /<img[^>]+src="([^">]+)"[^>]*>/g;
    let match;
    const downloads = [];
    const replacements = [];

    while ((match = imgRegex.exec(htmlContent)) !== null) {
        const url = match[1];
        if (url.startsWith('http')) {
            const extMatch = url.match(/\.(png|jpg|jpeg|gif|svg|webp)/i);
            const ext = extMatch ? extMatch[0] : '.png';
            const hash = crypto.createHash('md5').update(url).digest('hex').substring(0, 10);
            const newFileName = `${hash}${ext}`;
            const destPath = path.join(uploadsDir, newFileName);
            
            if (!fs.existsSync(destPath)) {
                downloads.push(downloadImage(url, destPath));
            }
            
            replacements.push({
                originalUrl: url,
                newUrl: `/uploads/stitch/${newFileName}`
            });
        }
    }

    await Promise.all(downloads);

    // Replace image URLs
    for (const rep of replacements) {
        htmlContent = htmlContent.split(rep.originalUrl).join(rep.newUrl);
    }

    // Extract body
    const bodyContent = extractBodyContent(htmlContent);

    // Create Blade template
    const bladeContent = `@extends("layouts.app")\n@section("content")\n\n${bodyContent}\n\n@endsection`;

    // Save to resources/views/pages
    const baseName = fileName.replace('.html', '').replace(/^\d+_/, '').replace(/_/g, '-');
    const destBladePath = path.join(viewsDir, `${baseName}.blade.php`);
    fs.writeFileSync(destBladePath, bladeContent, 'utf-8');
    
    console.log(`Saved ${baseName}.blade.php`);
    return baseName;
}

async function main() {
    const files = fs.readdirSync(stitchAssetsDir);
    const routes = [];
    
    for (const file of files) {
        if (file.endsWith('.html')) {
            const baseName = await processFile(file);
            routes.push(baseName);
        }
    }

    // Output route definitions to append later
    const routesConfig = routes.map(rn => `Route::get('/${rn}', function () { return view('pages.${rn}'); });`).join('\n');
    console.log('\n--- Route configurations to add in routes/web.php ---');
    console.log(routesConfig);
    console.log('-----------------------------------------------------');
}

main().catch(console.error);
