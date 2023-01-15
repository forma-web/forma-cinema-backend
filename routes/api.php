<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SelectionController;
use App\Http\Controllers\SelectionMoviesController;
use App\Http\Controllers\ViewController;
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
       Route::post('refresh', 'refresh')->name('refresh');

        Route::middleware('auth')->group(function () {
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

Route::middleware('auth')->group(function () {
    Route::prefix('user')->as('user.')->group(function () {
        Route::get('', [AuthenticationController::class, 'current'])->name('current');
        Route::patch('', [AuthenticationController::class, 'updateCredentials'])->name('update');
    });

    Route::apiResource('selections', SelectionController::class);
    Route::apiResource('selections.movies', SelectionMoviesController::class)->except(['show', 'store']);

    Route::apiResource('genres', GenreController::class)->except(['store', 'update', 'destroy']);

    Route::apiResource('movies', MovieController::class);
    Route::get('views', ViewController::class)->name('views');
});

//Route::post('upload', function (\Illuminate\Http\Request $request) {
//    $request->file('file')->store('movies');
//    info(print_r($request->all(), true));
//})->name('upload');
