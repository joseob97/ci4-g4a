<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'IndexController::index');

// Rutas para autenticación
$routes->get('login', 'AuthController::login', ['as' => 'login']); // Define la ruta de login para GET
$routes->post('login', 'AuthController::attemptLogin', ['as' => 'attemptLogin']); // Define la ruta de login para POST
$routes->get('logout', 'AuthController::logout', ['as' => 'logout']); // Ruta para cerrar sesión

// Ruta para registro
$routes->match(['get', 'post'], 'register', 'AuthController::register', ['as' => 'register']);

// Ruta para el menú principal
$routes->get('menu', 'MenuController::menu', ['as' => 'menu']);
