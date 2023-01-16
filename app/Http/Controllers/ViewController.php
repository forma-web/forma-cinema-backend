<?php

namespace App\Http\Controllers;

use App\Filters\ViewFilter;
use App\Models\User;
use App\Models\View;
use Illuminate\Contracts\Pagination\CursorPaginator;
use Illuminate\Http\Response;

class ViewController extends Controller
{
    /**
     * @param \App\Filters\ViewFilter $filter
     * @return \Illuminate\Contracts\Pagination\CursorPaginator
     */
    public function show(ViewFilter $filter): CursorPaginator
    {
        /** @var User $user */
        $user = auth()->user();

        return $user
            ->series()
            ->filterRelation($filter)
            ->orderByPivot('created_at', 'desc')
            ->orderByPivot('id')
            ->with('movie')
            ->cursorPaginate();
    }

    /**
     * @param int $view
     * @return \Illuminate\Http\Response
     */
    public function hide(int $view): Response
    {
        /** @var User $user */
        $user = auth()->user();

        /** @var View $view */
        $view = $user->views()->findOrFail($view);

        $view->hide();

        return response()->noContent();
    }
}
