<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');

// route login
$routes->match(['get', 'post'], '/login', 'Login::index');
$routes->get('/logout', 'Login::logout');

// route crud buku
$routes->group('', ['filter' => 'auth'], static function ($routes){
    $routes->get('/buku', 'Form::index');
    $routes->get('/buku/show/(:num)', 'Form::show/$1');
    $routes->get('/buku/create', 'Form::create');
    $routes->post('/buku/store', 'Form::store');
    $routes->get('/buku/edit/(:num)', 'Form::edit/$1');
    $routes->post('/buku/update/(:num)', 'Form::update/$1');
    $routes->delete('/buku/delete/(:num)', 'Form::delete/$1');
});

// route register
$routes->match(['get', 'post'], '/signup', 'Register::index');