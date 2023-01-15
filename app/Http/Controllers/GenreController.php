<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Contracts\Pagination\CursorPaginator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Pagination\CursorPaginator
     */
    public function index(): CursorPaginator
    {
        return Genre::orderBy('id')->cursorPaginate(10);
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
}
