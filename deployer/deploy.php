<?php
namespace Deployer;

require __DIR__.'/../vendor/autoload.php';
require 'recipe/laravel.php';

set('repository', 'git@github.com:chourik2000-prog/stock.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('localhost')
//    ->set('hostname', '127.0.0.1')
    ->set('remote_user', 'chourik')
    ->set('port', '2325')
    ->set('identity_file', '~/.ssh/id_rsa')
    ->set('deploy_path', '/var/www/stock');


set('ssh_multiplexing', false);

// Tasks
task('success', function() {

});

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

after('deploy', 'success');
after('deploy:failed', 'deploy:unlock');
