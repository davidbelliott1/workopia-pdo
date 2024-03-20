<?php

require '../helpers.php';
require basePath('Router.php');
require basePath('Database.php');


// Router Stuff
// instantiate the Router class
$router = new Router();

// get the routes from the routes.php file
$routes = require basePath('routes.php');

// get current uri and method
// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// route the request
$router->route($uri, $method);
