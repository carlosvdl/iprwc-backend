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

$router->group(['prefix' => 'api'], function ($router) {

    // api/auth
    $router->group(['prefix' => 'auth'], function ($router) {

        // api/auth/register
        $router->post('register', [
            'as' => 'auth.register',
            'uses' => 'AuthController@register',
        ]);

        // api/auth/login
        $router->post('login', [
            'as' => 'auth.login',
            'uses' => 'AuthController@login'
        ]);

        $router->group(['middleware' => 'auth:api'], function ($router) {

            // api/auth/logout
            $router->post('logout', [
                'as' => 'auth.logout',
                'uses' => 'AuthController@logout'
            ]);

            // api/auth/refresh
            $router->post('refresh', [
                'as' => 'auth.refresh',
                'uses' => 'AuthController@refresh'
            ]);

            // api/auth/user
            $router->get('user', [
                'as' => 'auth.user',
                'uses' => 'AuthController@authUser'
            ]);
        });
    });

    // api/user
    $router->group(['prefix' => 'user', 'middleware' => 'auth'], function ($router) {

        // api/user/
        $router->put('/', [
            'as' => 'user.put',
            'uses' => 'UserController@put'
        ]);
    });

    // api/product
    $router->group(['prefix' => 'product', 'middleware' => 'auth'], function ($router) {

        // api/product/
        $router->get('/',[
            'as' => 'product.get-all',
            'uses' => 'ProductController@getAll'
        ]);

        // api/product/{id}/
        $router->get('{id}', [
            'as' => 'product.get',
            'uses' => 'ProductController@get'
        ]);

        // api/product
        $router->group(['middleware' => 'authorise'], function ($router) {

            // api/product/
            $router->post('/', [
                'as' => 'product.post',
                'uses' => 'ProductController@post'
            ]);

            // api/product/{id}/
            $router->put('{id}', [
                'as' => 'product.put',
                'uses' => 'ProductController@put'
            ]);

            // api/product/{id}/
            $router->delete('{id}', [
                'as' => 'product.delete',
                'uses' => 'ProductController@delete'
            ]);
        });
    });

    // api/shopping-cart
    $router->group(['prefix' => 'shopping-cart', 'middleware' => 'auth'], function ($router) {

        // api/shopping-cart/
        $router->get('/', [
            'as' => 'shopping-cart.get',
            'uses' => 'ShoppingCartController@get'
        ]);

        // api/shopping-cart/add-product/
        $router->put('add-product', [
            'as' => 'shopping-cart.add-product',
            'uses' => 'ShoppingCartController@addProduct'
        ]);

        // api/shopping-cart/remove-product/
        $router->put('delete-product', [
            'as' => 'shopping-cart.delete-product',
            'uses' => 'ShoppingCartController@deleteProduct'
        ]);

        // api/shopping-cart/empty/
        $router->put('empty', [
            'as' => 'shopping-cart.empty',
            'uses' => 'ShoppingCartController@empty'
        ]);
    });
});

