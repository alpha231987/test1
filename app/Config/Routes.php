<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');


$routes->get('/project', 'Project::index');
$routes->get('/project/test2', 'Project::test2');

$routes->get('/admin/login', 'Admin::login');
$routes->get('/admin/logout', 'Admin::logout');


//$routes->get('/admin', 'Admin::index',['filter'=>'auth']);

//$routes->get('/admin', 'Admin::index');

$routes->group( 'admin', function ( $routes ) {
    $routes->group( '', ['filter' => 'auth'], function ( $routes ) {
        $routes->get('/', 'Admin::index');
    });    
});
$routes->post('/admin/login', 'Admin::sign_in');