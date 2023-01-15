<?php

namespace App\Http\Controllers;

use App\Filters\MovieFilter;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function index(): CursorPaginator
    {
        return $this->myMovies()
            ->orderBy('id')
            ->latest()
            ->cursorPaginate(config('common.pagination.per_page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(StoreMovieRequest $request): Model
    {
        return $this->myMovies()->create($request->validated());
    }

    /**
     * Display the specified resource.
     *

     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show(int $id): Model
    {
        return $this->myMovies()->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateMovieRequest $request
     * @param int $movie
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(UpdateMovieRequest $request, int $movie): Model
    {
        $movie = $this->myMovies()->findOrFail($movie);

        $movie->update($request->validated());

        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $movie): Response
    {
        $this->myMovies()->findOrFail($movie)->delete();

        return response()->noContent();
    }

    private function myMovies(): HasMany
    {
        /** @var User $user */
        $user = auth()->user();

        return $user->movies();
    }
}
