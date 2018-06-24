<?php

$config = require_once('config.php');

$pdo = new PDO(
    "mysql:host=" . $config['database']['host'] . ";dbname=" . $config['database']['dbname'],
    $config['database']['user'],
    $config['database']['password']
);

