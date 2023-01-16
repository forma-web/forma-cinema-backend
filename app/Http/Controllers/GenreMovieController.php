<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Pagination\CursorPaginator;

class GenreMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $genre
     * @return \Illuminate\Contracts\Pagination\CursorPaginator
     */
    public function index(int $genre): CursorPaginator
    {
        return Genre::findOrFail($genre)
            ->movies()
            ->cursorPaginate(config('common.pagination.per_page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $movie
     * @param int $genre
     * @return \Illuminate\Http\Response
     */
    public function update(int $genre, int $movie): Response
    {
        $movie =  $this->getMovie($movie);
        $genres = $movie->genres->count();

        abort_if(
            $genres >= config('common.genres.max'),
            Response::HTTP_UNPROCESSABLE_ENTITY,
            __('common.genres.max'),
        );

        $movie->genres()->syncWithoutDetaching(Genre::findOrFail($genre));

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $movie
     * @param int $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $genre, int $movie): Response
    {
        $this->getMovie($movie)->genres()->detach(Genre::findOrFail($genre));

        return response()->noContent();
    }

    /**
     * @param int $movie
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function getMovie(int $movie): Model
    {
        /** @var User $user */
        $user = auth()->user();

        return $user->movies()->findOrFail($movie);
    }
}
