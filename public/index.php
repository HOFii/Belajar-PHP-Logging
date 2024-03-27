<?php

require_once __DIR__ . '/../vendor/autoload.php';

use hofi\Belajar\PHP\MVC\App\Router;
use hofi\Belajar\PHP\MVC\Controller\HomeController;
use hofi\Belajar\PHP\MVC\Controller\ProductController;
use hofi\Belajar\PHP\MVC\Middleware\AuthMiddleware;

Router::add('Get', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', ProductController::class, 'categories');

Router::add('Get', '/', HomeController::class, 'index');
Router::add('Get', '/hello', HomeController::class, 'hello', [AuthMiddleware::class]);
Router::add('Get', '/world', HomeController::class, 'world', [AuthMiddleware::class]);
Router::add('Get', '/about', HomeController::class, 'about');

Router::run();

