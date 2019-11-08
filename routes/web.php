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

/* For normal app */
// $router->group(['prefix' => 'products'], function ($app) {
//     $app->get('/', 'ProductController@index');
//     $app->get('create', 'ProductController@create');
//     $app->post('store', 'ProductController@store');
//     $app->get('show/{id}', 'ProductController@show');
//     $app->get('edit/{id}', 'ProductController@edit');
//     $app->post('update/{id}', 'ProductController@update');
//     $app->post('destroy/{id}', 'ProductController@destroy');
// });

/* For Api */
$router->group(['prefix' => 'api'], function () use ($router) {
    /* Auth */
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('profile', 'UserController@profile');
    $router->get('users/{id}', 'UserController@singleUser');
    $router->get('users', 'UserController@allUsers');

    /* Products */
    $router->group(['prefix' => 'products'], function () use ($router) {
        $router->get('/', 'ProductController@index');
        $router->post('store', 'ProductController@store');
        $router->get('show/{id}', 'ProductController@show');
        $router->patch('update/{id}', 'ProductController@update');
        $router->delete('destroy/{id}', 'ProductController@destroy');
    });
});

/* Testing Routes */
$router->group(['prefix' => 'testing'], function () use ($router) {
    $router->post('register', 'UnitTestingController@testShouldCreateUser');
    $router->post('login', 'UnitTestingController@testShouldLoginUser');
    $router->get('profile', 'UnitTestingController@testShouldFetchUserProfile');
    $router->get('users/{id}', 'UnitTestingController@testShouldFetchUserData');
    $router->get('users', 'UnitTestingController@testShouldFetchUsers');

    /* Products */
    $router->group(['prefix' => 'products'], function () use ($router) {
        $router->get('/', 'UnitTestingController@testShouldFetchAllProducts');
        $router->post('store', 'UnitTestingController@testShouldCreateProduct');
        $router->get('show/{id}', 'UnitTestingController@testShouldShowProduct');
        $router->patch('update/{id}', 'UnitTestingController@testShouldUpdateProduct');
        $router->delete('destroy/{id}', 'UnitTestingController@testShouldDeleteProduct');
    });
});
