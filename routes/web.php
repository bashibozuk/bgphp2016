<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index');
    Route::get('/lobby', 'LobbyController@index');
    Route::get('/lobby/wait', 'LobbyController@wait');
    Route::get('/join-game/{id}', 'GameController@join');
    Route::get('/game/create', 'LobbyController@createGame');
    Route::post('/game', 'LobbyController@store');
    Route::get('/check-game-join', 'GameController@check');
    Route::get('/play-game', 'GameController@game');
});
