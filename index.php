<?php 

session_start();

// Composer autoloader
require_once __DIR__.'/vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__)->load();

require_once __DIR__.'/routes/index.php';