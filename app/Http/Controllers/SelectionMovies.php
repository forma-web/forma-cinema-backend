<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class SelectionMovies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $selection
     * @return \Illuminate\Contracts\Pagination\CursorPaginator
     */
    public function index(int $selection): CursorPaginator
    {
        return $this->getSelection($selection)->movies()->cursorPaginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param int $selection
     * @param int $movie
     * @return \Illuminate\Http\Response
     */
    public function update(int $selection, int $movie): Response
    {
        $this
            ->getSelection($selection)
            ->movies()
            ->syncWithoutDetaching(Movie::findOrFail($movie));

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $selection
     * @param int $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $selection, int $movie): Response
    {
        $this
            ->getSelection($selection)
            ->movies()
            ->detach($movie);

        return response()->noContent();
    }

    /**
     * @param int $selection
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function getSelection(int $selection): Model
    {
        /** @var User $user */
        $user = auth()->user();

        return $user->selections()->findOrFail($selection);
    }
}
