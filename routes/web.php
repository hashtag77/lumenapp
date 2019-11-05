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

$router->group(['prefix' => 'products'], function ($app) {
    $app->get('/', 'ProductController@index');
    $app->get('create', 'ProductController@create');
    $app->post('store', 'ProductController@store');
    $app->get('show/{id}', 'ProductController@show');
    $app->get('edit/{id}', 'ProductController@edit');
    $app->post('update/{id}', 'ProductController@update');
    $app->post('destroy/{id}', 'ProductController@destroy');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    // $router->get('registeraccount', 'AuthController@getRegisterForm');
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    // $router->get('profile', 'UserController@profile');
    $router->get('users/{id}', 'UserController@singleUser');
    $router->get('users', 'UserController@allUsers');
});