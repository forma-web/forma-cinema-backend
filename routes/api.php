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

Route::post('test', function () {
});

Route::post('upload', function (\Illuminate\Http\Request $request) {
    $file = $request->file('file');
    $rangeHeader = $request->header('Content-Range');

//    info(json_encode([
//        'list' => scandir('/tmp'),
//        'file' => $file,
//        'headers' => $request->headers->all(),
//    ]));

    abort_if(!$rangeHeader, 400, 'Missing Content-Range header');
//    abort_if(!$chunkIndexHeader, 400, 'Missing X-Chunk-Index header');
//    abort_if(!$fileTypeHeader, 400, 'Missing X-File-Type header');

    $newName = $file->store('movies');

    list(, , $end, $total) = parseContentRange($rangeHeader);

//    if ($end === $total)
//        \Illuminate\Support\Facades\Bus::batch(
//            array_map(
//                fn ($dimension) => new \App\Jobs\ConvertVideo($newName, $dimension),
//                config('common.video.dimensions'),
//            )
//        )->dispatch();

    response()->noContent();
})->name('upload');
