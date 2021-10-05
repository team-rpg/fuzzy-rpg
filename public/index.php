<?php

use core\Renderer;
use core\Router\Router;
use core\Router\Exception\RouteNotFoundException;

require_once implode(DIRECTORY_SEPARATOR, [__DIR__, "..", "config", "config.php"]);

$router = Router::getInstance();

require implode(DIRECTORY_SEPARATOR, [ROOT, 'config', 'routes.php']);

// Appliquer l'action
try {
    $route = $router->match();
    // (new App\Controller\ArticleController())->index()
    // (new App\Controller\ArticleController())->show($id)
    (new ($route->getController())(Renderer::getInstance()))->{$route->getAction()}(...$router->getMatches());
} catch (RouteNotFoundException $e) {
    echo $e->getMessage();
    // header("Location: /"); // ou error 404
    // exit;
}