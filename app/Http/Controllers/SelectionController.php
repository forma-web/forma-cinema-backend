<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSelectionRequest;
use App\Http\Requests\UpdateSelectionRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class SelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index(): Collection
    {
        /** @var User $user */
        $user = auth()->user();

        return $user->selections()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSelectionRequest  $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(StoreSelectionRequest $request): Model
    {
        /** @var User $user */
        $user = auth()->user();

        return $user->selections()->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $selection
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show(int $selection): Model
    {
        /** @var User $user */
        $user = auth()->user();

        return $user->selections()->findOrFail($selection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateSelectionRequest $request
     * @param int $selection
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(UpdateSelectionRequest $request, int $selection): Model
    {
        /** @var User $user */
        $user = auth()->user();

        $selection = $user->selections()->findOrFail($selection);

        $selection->update($request->validated());

        return $selection;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $selection
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $selection): Response
    {
        /** @var User $user */
        $user = auth()->user();

        $selection = $user->selections()->findOrFail($selection)->delete();

        return response()->noContent();
    }
}
