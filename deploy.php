<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'bde_enigma_web');

// Project repository
set('repository', 'git@github.com:JesusCrie/BDE-Enigma-Web.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('jesus')
    ->set('bin/php', '/usr/local/bin/php71')
    ->set('bin/composer', '/usr/local/bin/composer7')
    ->set('deploy_path', '/www/jesuscrie/bde-enigma');
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
