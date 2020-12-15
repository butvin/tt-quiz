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

$router->group(['prefix' => 'api/v1'],function ($router) {
    $router->get(   'polls', 'PollController@getAll');
    $router->get(   'polls/{id}', 'PollController@getPoll');
    $router->post(  'polls', 'PollController@store');
    $router->delete('polls/{id}', ['uses' => 'PollController@destroy']);
    $router->put(   'polls/{id}', 'PollController@update');
    $router->get(   'polls/{poll_id}/options', 'PollOptionController@getPollOptions');
});

$router->group(['middleware' => ['cors']], function($router) {
    $router->get('/', fn($router) => $router->app->version());


});
