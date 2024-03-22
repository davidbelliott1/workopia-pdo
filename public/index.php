<?php

require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

use Framework\Router;

// Router Stuff
// instantiate the Router class
$router = new Router();

// get the routes from the routes.php file
$routes = require basePath('routes.php');

// get current uri and method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// route the request
$router->route($uri);
