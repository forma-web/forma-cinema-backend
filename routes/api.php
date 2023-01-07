<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MovieController;
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
    ->as('auth.')
    ->group(function () {
        Route::post('register', 'register')->name('register');
        Route::post('login', 'login')->name('login');
        Route::post('logout', 'logout')->name('logout');
        Route::get('me', 'me')->name('me');

        Route::middleware('auth')->group(function () {
            Route::get('me', 'current')->name('me');
            Route::post('refresh', 'refresh')->name('refresh');

            Route::prefix('email')->as('email.')->group(function () {
                Route::middleware('signed')
                    ->get('verify/{id}/{hash}', 'verify')
                    ->name('verify');
                Route::middleware('throttle:1,0.5')
                    ->post('resend', 'resend')
                    ->name('resend');
            });
        });
    });

Route::apiResource('movies', MovieController::class);
