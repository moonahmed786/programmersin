<?php

namespace Deployer;

require 'recipe/laravel.php';

// Config
set('repository', 'git@github.com:moonahmed786/programmersin.git');

add('shared_files', ['.env']);
add('shared_dirs', ['storage', 'uploads']);
add('writable_dirs', ['bootstrap/cache', 'storage']);

// Tasks
task('deploy:build', function () {
    cd('{{release_path}}');
    run('npm install');
    run('npm run build');
});

task('artisan:db:seed', function () {
    run('{{bin/php}} {{release_path}}/artisan db:seed --force');
});

desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'deploy:build',
    'artisan:migrate',
    'artisan:db:seed',
    'artisan:optimize',
    'deploy:publish',
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

/**
 * Note for Root Deployment:
 * Since we moved public contents to root, the server should point to:
 * {{deploy_path}}/current
 */
