<?php


use Illuminate\Database\Capsule\Manager as Capsule;

$elequentDatabase = new Capsule;

$elequentDatabase->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'port' => '3306',
    'database' => 'posupapps_test',
    'username' => 'root',
    'password' => '2023',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
]);


$elequentDatabase->bootEloquent();