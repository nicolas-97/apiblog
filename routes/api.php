<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
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



Route::prefix('auth')->group(function(){
    Route::post('login', 'Auth\AuthController@login');
    Route::post('signup', 'Auth\AuthController@signup');

    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('logout', 'Auth\AuthController@logout');
    });
});

Route::group(['middleware' => ['auth:api']], function () {
        Route::resource('profile', 'Profile\ProfileController')
            ->only(['show','update','destroy']);
});




