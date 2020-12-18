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

$router->get('/', fn() => $router->app->version());

$router->group(['prefix' => 'api/v1', 'middleware' => ['cors']],function ($router) {
    $router->get('/', 'PollController@index');
    // CRUD: start point
    $router->get(   'polls',        ['uses' => 'PollController@getAllPolls']);
    $router->get(   'polls/{id}',   ['uses' => 'PollController@getPoll']);
    $router->post(  'polls',        ['uses' => 'PollController@storePoll']);
    $router->delete('polls/{id}',   ['uses' => 'PollController@destroyPoll']);
    $router->put(   'polls/{id}',   ['uses' => 'PollController@updatePoll']);

    // sub-questions list
    $router->get('polls/{id}/options',
        [
            'uses' => 'PollOptionController@getAllOptions',
            'as' => 'poll.answers',
        ]
    );

    // sub-questions list
    $router->get('polls/{id}/options/{option_id}',
        [
            'uses' => 'PollOptionController@getOption',
            'as' => 'poll.answer',
        ]
    );

    // sub-questions list
    $router->get('polls/{id}/options/{option_id}/sub',
        [
            'uses' => 'PollOptionController@getSubOptions',
            'as' => 'poll.sub.answers',
        ]
    );
});
