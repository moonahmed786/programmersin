<?php
/**
 * Simple Deployment Script for ProgrammersIn
 * This script handles git pull, migrations and caching for root-based installation.
 */

$token = 'YOUR_SECRET_TOKEN'; // Set this to a secure token and call ?token=YOUR_SECRET_TOKEN

if (($_GET['token'] ?? '') !== $token) {
    die('Unauthorized access.');
}

function runCommand($command) {
    echo "Running: $command\n";
    $output = [];
    $returnVar = 0;
    exec($command . ' 2>&1', $output, $returnVar);
    echo implode("\n", $output) . "\n";
    if ($returnVar !== 0) {
        echo "Command failed with exit code: $returnVar\n";
        exit($returnVar);
    }
}

// Ensure we are in the root directory
chdir(__DIR__);

echo "<pre>";
runCommand('git pull origin main');
runCommand('composer install --no-dev --optimize-autoloader');
runCommand('php artisan migrate --force');
runCommand('php artisan config:cache');
runCommand('php artisan route:cache');
runCommand('php artisan view:cache');

// If using Vite, build the assets
// runCommand('npm install && npm run build');

echo "\nDeployment Complete!";
echo "</pre>";
