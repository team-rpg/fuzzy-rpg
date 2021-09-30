<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

$router->add("/(showUserList)?", ['GET'], 'App\Controller\UserController', 'showAllUsers', 'users');
$router->add("/user/userRegister", ['GET', 'POST'], 'App\Controller\ArticleController', 'new', 'add_user');
$router->add("/user/(\d+)/showUser", ['GET'], 'App\Controller\ArticleController', 'show', 'show_user');
$router->add("/user/(\d+)/editUser", ['GET', 'POST'], 'App\Controller\ArticleController', 'edit', 'edit_user');
$router->add("/user/(\d+)/deleteUser", ['GET'], 'App\Controller\ArticleController', 'delete', 'delete_user');