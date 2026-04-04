<?php
/**
 * Simple Deployment Script for ProgrammersIn
 * This script handles git pull, migrations and caching for root-based installation.
 * Access this via: https://programmersin.com/deploy.php
 */

// Basic security check (Optional: uncomment and set a token for more security)
// $token = 'your_secret_token';
// if (($_GET['token'] ?? '') !== $token) {
//     die('Unauthorized access. Please use ?token=your_secret_token');
// }

// Detect the correct PHP binary. 
// Since the web server is running PHP 8.4, we try to use the same binary for CLI commands.
$php = PHP_BINARY;
if (strpos($php, 'php-fpm') !== false || strpos($php, 'cgi') !== false) {
    // If running under FPM/CGI, PHP_BINARY might not be the CLI version.
    // We can try to guess or use common paths.
    $php = 'php8.4'; // Common for many hosting providers
}

function runCommand($command) {
    echo "<b>Running: $command</b>\n";
    $output = [];
    $returnVar = 0;
    exec($command . ' 2>&1', $output, $returnVar);
    echo implode("\n", $output) . "\n";
    if ($returnVar !== 0) {
        echo "<span style='color:red;'>Command failed with exit code: $returnVar</span>\n";
    }
    echo "\n";
}

// Ensure we are in the root directory
chdir(__DIR__);

echo "<pre>";
echo "<h3>ProgrammersIn Deployment Tool</h3>\n";
echo "Using PHP: " . $php . " (Version: " . PHP_VERSION . ")\n\n";

// 1. Pull latest code
runCommand('git pull origin main');

// 2. Run migrations (Essential to fix the "sessions" table error)
runCommand($php . ' artisan migrate --force');

// 3. Clear and Optimize caches
runCommand($php . ' artisan cache:clear');
runCommand($php . ' artisan config:cache');
runCommand($php . ' artisan route:cache');
runCommand($php . ' artisan view:cache');

// 4. Update assets if needed (Vite)
// runCommand('npm run build');

echo "\n<b>Deployment Process Finished!</b>";
echo "</pre>";


