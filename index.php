<?php

include __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', config('app.debug'));

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $router) {
    $namespace = "\\App\\Controllers\\";

    $router->get('/products', $namespace . 'ProductController@index');
    $router->get('/new', $namespace . 'ProductController@create');
    $router->post('/new', $namespace . 'ProductController@store');
    $router->delete('/products', $namespace . 'ProductController@delete');

});

$httpMethod = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$controller, $method] = explode('@', $handler);
        (new $controller)->$method($vars);
        break;
}