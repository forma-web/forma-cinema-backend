<?php

use App\Http\Controllers\AuthenticationController;
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

Route::controller(AuthenticationController::class)
    ->prefix('auth')
    ->as('authentication.')
    ->group(function () {
        Route::post('registration', 'registration')->name('registration');
        Route::post('login', 'login')->name('login');
        Route::post('logout', 'logout')->name('logout');
        Route::get('me', 'me')->name('me');

        Route::middleware('auth')->group(function () {
            Route::post('refresh', 'refresh')->name('refresh');
            Route::get('me', 'current')->name('me');
        });
    });
