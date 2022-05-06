<?php
namespace Deployer;

require __DIR__.'/../vendor/autoload.php';
require 'recipe/laravel.php';

set('repository', 'git@github.com:chourik2000-prog/stock.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', [
    'app',
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

add('copy_dirs', ['vendor']);

// Hosts

host('localhost')
//    ->set('hostname', '127.0.0.1')
    ->set('remote_user', 'deployer')
    ->set('port', '2325')
    ->set('identity_file', '~/.ssh/deployer')
    ->set('deploy_path', '/var/www/iaigestion');


set('branch', 'fix/migrations');
set('ssh_multiplexing', false);
set('keep_releases', 4);

// Tasks
desc('Deploiement');
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:down',
    'artisan:migrate',
    'artisan:up',
    'deploy:publish'
]);

after('deploy:failed', 'deploy:unlock');
