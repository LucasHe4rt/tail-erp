<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

use Illuminate\Support\Str;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', function () use ($router) {
    return Str::random(32);
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', 'UsersController@index');
    $router->get('/{id}', 'UsersController@show');
    $router->post('/', 'UsersController@store');
    $router->put('/{id}', 'UsersController@update');
    $router->delete('/{id}', 'UsersController@destroy');
});

$router->group(['namespace' => 'Products'], function () use ($router) {
    $router->group(['prefix' => 'product-categories'], function () use ($router) {
        $router->get('/', 'ProductCategoriesController@index');
        $router->get('/{id}', 'ProductCategoriesController@show');
        $router->post('/', 'ProductCategoriesController@store');
        $router->put('/{id}', 'ProductCategoriesController@update');
        $router->delete('/{id}', 'ProductCategoriesController@destroy');
    });

    $router->group(['prefix' => 'products'], function () use ($router) {
        $router->get('/', 'ProductsController@index');
        $router->get('/{id}', 'ProductsController@show');
        $router->post('/', 'ProductsController@store');
        $router->put('/{id}', 'ProductsController@update');
        $router->delete('/{id}', 'ProductsController@destroy');
    });
});

$router->group(['prefix' => 'stocks'], function () use ($router) {
    $router->get('/', 'StocksController@index');
    $router->get('/{id}', 'StocksController@show');
    $router->post('/', 'StocksController@store');
    $router->put('/{id}', 'StocksController@update');
    $router->delete('/{id}', 'StocksController@destroy');
});

$router->group(['prefix' => 'sales'], function () use ($router) {
    $router->get('/', 'SalesController@index');
    $router->get('/{id}', 'SalesController@show');
    $router->post('/', 'SalesController@store');
});
