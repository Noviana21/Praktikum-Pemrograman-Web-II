<?php

// use CodeIgniter\Router\RouteCollection;

// /**
//  * @var RouteCollection $routes
//  */
// $routes->get('/', 'Home::index');

$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('/profile', 'Profile::index');