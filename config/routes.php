<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

$router->add("/(user/index)?", ['GET'], 'App\Controller\UserController', 'index', 'users');
$router->add("/user/signup", ['GET', 'POST'], 'App\Controller\UserController', 'new', 'signup');
$router->add("/user/signin", ['GET', 'POST'], 'App\Controller\UserController', 'signin', 'signin');
$router->add("/user/profil", ['GET'], 'App\Controller\UserController', 'profil', 'profil');
$router->add("/user/logout", ['GET', 'POST'], 'App\Controller\UserController', 'logout', 'logout');
$router->add("/user/(\d+)/show", ['GET'], 'App\Controller\UserController', 'show', 'show');
$router->add("/user/(\d+)/edit", ['GET', 'POST'], 'App\Controller\UserController', 'edit', 'edit');
$router->add("/user/(\d+)/delete", ['GET'], 'App\Controller\UserController', 'delete', 'delete');