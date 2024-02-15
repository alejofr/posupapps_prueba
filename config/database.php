<?php


use Illuminate\Database\Capsule\Manager as Capsule;

$elequentDatabase = new Capsule;

$elequentDatabase->addConnection([
    'driver' => 'mysql',
    'host' => 'posupapps.com',
    'port' => '3306',
    'database' => 'posupapp_afreitez',
    'username' => 'posupapp_afreitez',
    'password' => '~gNQAx1y6vpI',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
]);


$elequentDatabase->bootEloquent();