<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Http\Response;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\CursorPaginator
     */
    public function index(): CursorPaginator
    {
        return Genre::orderBy('id')->cursorPaginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenreRequest  $request
     * @return \App\Models\Genre|\Illuminate\Database\Eloquent\Model
     */
    public function store(StoreGenreRequest $request)
    {
        return Genre::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $genre
     * @return \App\Models\Genre
     */
    public function show(int $genre): Genre
    {
        return Genre::findOrFail($genre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateGenreRequest $request
     * @param int $genre
     * @return \App\Models\Genre
     */
    public function update(UpdateGenreRequest $request, int $genre): Genre
    {
        $genre = Genre::findOrFail($genre);
        $genre->update($request->validated());

        return $genre;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $genre): Response
    {
        Genre::findOrFail($genre)->delete();

        return response()->noContent();
    }
}
