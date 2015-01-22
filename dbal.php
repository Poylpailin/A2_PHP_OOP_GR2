<?php

require __DIR__.'/vendor/autoload.php';

$config = new \Doctrine\DBAL\Configuration();

$connectionParams = array(
    'dbname' => 'pokemon_battle',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

var_dump($conn->errorInfo());