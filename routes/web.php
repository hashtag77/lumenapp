<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// $router->resource('/products', 'ProductController');

$router->get('/products', 'ProductController@index');

$router->get('/products/create', 'ProductController@create');

$router->post('/products/store', 'ProductController@store');

$router->get('/products/show/{id}', 'ProductController@show');

$router->get('/products/edit/{id}', 'ProductController@edit');

$router->post('/products/update/{id}', 'ProductController@update');

$router->post('/products/destroy/{id}', 'ProductController@destroy');
