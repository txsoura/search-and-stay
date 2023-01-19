<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    # Version
    Route::get('/', function () {
        return [
            'name' => config('app.name'),
            'version' => config('app.version'),
            'locale' => app()->getLocale(),
        ];
    });

    // Route::middleware('auth:sanctum')->group(function () {
    Route::group([], function () {
        Route::apiResource('users', 'UserController');
        Route::delete('users/{user}/destroy', 'UserController@forceDestroy')->name('users.forceDestroy');
        Route::put('users/{user}/restore', 'UserController@restore')->name('users.restore');
        Route::put('users/{user}/approve', 'UserController@approve')->name('users.approve');
        Route::put('users/{user}/block', 'UserController@block')->name('users.block');

        //create, update and delete routes should be only acessible by user with admin role
        Route::apiResource('books', 'BookController');
        Route::delete('books/{book}/destroy', 'BookController@forceDestroy')->name('books.forceDestroy');
        Route::put('books/{book}/restore', 'BookController@restore')->name('books.restore');
    });
});
