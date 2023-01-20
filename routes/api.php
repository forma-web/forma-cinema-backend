<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreMovieController;
use App\Http\Controllers\SelectionController;
use App\Http\Controllers\SelectionMovieController;
use App\Http\Controllers\SeriesController;
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
    Route::apiResource('selections.movies', SelectionMovieController::class)->except(['show', 'store']);

    Route::apiResource('genres', GenreController::class)->except(['store', 'update', 'destroy']);
    Route::apiResource('genres.movies', GenreMovieController::class)->except(['show', 'store']);

    Route::apiResource('movies', MovieController::class);
    Route::apiResource('movies.series', SeriesController::class);

    Route::put(
        'movies/{movie}/series/{series}/history',
        [SeriesController::class, 'updateTiming']
    )->name('movies.series.history.update');

    Route::prefix('history')->as('history.')->group(function () {
        Route::get('', [ViewController::class, 'show'])->name('show');
        Route::patch('{history}', [ViewController::class, 'hide'])->name('hide');
    });
});

Route::post('generate', function () {

    $uuid = 'uploads_' . \Illuminate\Support\Str::uuid();

    $chunks = [
        ['id' => 1, 'path' => '/tmp' . \Illuminate\Support\Str::random(10)],
        ['id' => 2, 'path' => '/tmp' . \Illuminate\Support\Str::random(10)],
        ['id' => 3, 'path' => '/tmp' . \Illuminate\Support\Str::random(10)],
        ['id' => 4, 'path' => '/tmp' . \Illuminate\Support\Str::random(10)],
        ['id' => 5, 'path' => '/tmp' . \Illuminate\Support\Str::random(10)],
    ];

    $chunks = collect($chunks)->shuffle();

    $chunks->each(function ($chunk) use ($uuid) {
        \Illuminate\Support\Facades\Redis::sadd($uuid, $chunk['path']);
    });

    dump(\Illuminate\Support\Facades\Redis::smembers($uuid));
});

Route::post('upload', function (\Illuminate\Http\Request $request) {
    $file = $request->file('file');
    info(print_r($file->getClientOriginalName(), true));
    info(print_r($file->getFileInfo(), true));
    $file->store('movies');
})->name('upload');
