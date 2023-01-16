<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\TimingRequest;
use App\Http\Requests\UpdateSeriesRequest;
use App\Models\Movie;
use App\Models\Series;
use App\Models\User;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $movieId
     * @return \Illuminate\Contracts\Pagination\CursorPaginator
     */
    public function index(int $movieId): CursorPaginator
    {
        return $this
            ->myMovies($movieId)
            ->series()
            ->cursorPaginate(config('common.pagination.per_page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreSeriesRequest $request
     * @param int $movieId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(StoreSeriesRequest $request, int $movieId): Model
    {
        return $this
            ->myMovies($movieId)
            ->series()
            ->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $movieId
     * @param int $seriesId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show(int $movieId, int $seriesId): Model
    {
        return $this
            ->myMovies($movieId)
            ->series()
            ->findOrFail($seriesId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSeriesRequest $request
     * @param int $movieId
     * @param int $seriesId
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(UpdateSeriesRequest $request, int $movieId, int $seriesId): Model
    {
        $series = $this
            ->myMovies($movieId)
            ->series()
            ->findOrFail($seriesId);

        $series->update($request->validated());

        return $series;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $movieId
     * @param int $seriesId
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $movieId, int $seriesId): Response
    {
        $this
            ->myMovies($movieId)
            ->series()
            ->findOrFail($seriesId)
            ->delete();

        return response()->noContent();
    }

    /**
     * @param \App\Http\Requests\TimingRequest $request
     * @param int $movieId
     * @param int $seriesId
     * @return \Illuminate\Http\Response
     */
    public function updateTiming(TimingRequest $request, int $movieId, int $seriesId): Response
    {
        $params = collect($request->validated());

        /** @var Series $series */
        $series = $this
            ->myMovies($movieId)
            ->series()
            ->findOrFail($seriesId);

        $series->updateTiming(
            $params->only(['seek', 'finished'])->toArray(),
        );

        return response()->noContent();
    }

    /**
     * @param int $movieId
     * @return \App\Models\Movie
     */
    private function myMovies(int $movieId): Movie
    {
        /** @var User $user */
        $user = auth()->user();

        return $user->movies()->findOrFail($movieId);
    }
}
