<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

$router->add("/", ['GET'], 'App\Controller\IndexController', 'index', 'home');
$router->add("/user/index", ['GET'], 'App\Controller\UserController', 'index', 'home');
$router->add("/user/signup", ['GET', 'POST'], 'App\Controller\UserController', 'new', 'signup');
$router->add("/user/signin", ['GET', 'POST'], 'App\Controller\UserController', 'signin', 'signin');
$router->add("/user/profil", ['GET'], 'App\Controller\UserController', 'profil', 'profil');
$router->add("/user/logout", ['GET', 'POST'], 'App\Controller\UserController', 'logout', 'logout');
$router->add("/user/(\d+)/show", ['GET'], 'App\Controller\UserController', 'show', 'show');
$router->add("/user/(\d+)/edit", ['GET', 'POST'], 'App\Controller\UserController', 'edit', 'edit');
$router->add("/user/(\d+)/delete", ['GET'], 'App\Controller\UserController', 'delete', 'delete');

$router->add("/user/createCharacter", ['GET', 'POST'], 'App\Controller\CharacterController', 'createCharacter', 'create_character');
$router->add("/user/(\d+)/deleteCharacter", ['GET'], 'App\Controller\CharacterController', 'deleteCharacter', 'delete');
$router->add("/bestiary/index", ['GET'], 'App\Controller\MonsterController', 'index', 'showall');
$router->add("/bestiary/(\d+)/show", ['GET'], 'App\Controller\MonsterController', 'show', 'show');

$router->add("/fight/init", ['GET', 'POST'], 'App\Controller\FightController', 'init', 'init');
$router->add("/fight", ['POST'], 'App\Controller\FightController', 'fight', 'fight');
$router->add("/fight/(\d+)/attack", ['GET'], 'App\Controller\FightController', 'attack', 'attack');