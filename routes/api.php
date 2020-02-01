<?php

use Illuminate\Http\Request;

Route::group([
    'prefix' => 'v1',
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::middleware(['auth:api'])
        ->group(function () {
            Route::post('me', 'AuthController@me');

            Route::resource('user', 'UserController')->only('index', 'show', 'store', 'update');
            Route::resource('room', 'RoomController')->only('index', 'show', 'store', 'update');
            Route::resource('team-buying', 'TeamBuyingController')->only('index', 'show', 'store', 'update');
            Route::resource('menu', 'RestaurantController')->only('index', 'show', 'store', 'update');
        });
});
