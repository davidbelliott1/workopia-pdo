<?php

echo "hello world";

require '../helpers.php';

require basePath('Database.php');
require basePath('Router.php');

$routes = require basePath('routes.php');
$config = require basePath('config/db.php');

// instantiate the Router class
$router = new Router();

// instantiate the DB class
$db = new Database($config);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
