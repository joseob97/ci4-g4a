<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'IndexController::index');

$routes->get('login', 'AuthController::login', ['as' => 'login']);
$routes->post('login', 'AuthController::attemptLogin', ['as' => 'attemptLogin']);
$routes->get('logout', 'AuthController::logout', ['as' => 'logout']);
$routes->match(['get', 'post'], 'register', 'AuthController::register', ['as' => 'register']);

$routes->get('menu', 'MenuController::menu', ['as' => 'menu', 'filter' => 'auth']);

$routes->get('users', 'UserController::index', ['filter' => 'auth']);
$routes->post('users/search', 'UserController::search', ['filter' => 'auth']);
$routes->get('users/edit/(:num)', 'UserController::edit/$1', ['filter' => 'auth']);
$routes->post('users/update', 'UserController::update', ['filter' => 'auth']);
$routes->get('users/delete/(:num)', 'UserController::delete/$1', ['filter' => 'auth']);
$routes->get('gestionar_usuarios', 'UserController::manage', ['filter' => 'auth']);

$routes->get('users/cards/(:num)', 'UserController::listCards/$1', ['filter' => 'auth']);
$routes->get('users/cards/edit/(:num)', 'UserController::editCard/$1', ['filter' => 'auth']);
$routes->post('users/cards/update', 'UserController::updateCard', ['filter' => 'auth']);

$routes->get('gestionar_videojuegos', 'GameController::manageGames', ['filter' => 'auth']);
$routes->get('games/list', 'GameController::listGames', ['filter' => 'auth']);
$routes->get('games/add', 'GameController::addGame', ['filter' => 'auth']);
$routes->post('games/create', 'GameController::create', ['filter' => 'auth']);
$routes->get('games/edit/(:num)', 'GameController::editGame/$1', ['filter' => 'auth']);
$routes->post('games/update', 'GameController::updateGame', ['filter' => 'auth']);
$routes->get('games/delete/(:num)', 'GameController::deleteGame/$1', ['filter' => 'auth']);
