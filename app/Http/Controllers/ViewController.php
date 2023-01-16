<?php

namespace App\Http\Controllers;

use App\Filters\ViewFilter;
use App\Models\User;
use Illuminate\Contracts\Pagination\CursorPaginator;

class ViewController extends Controller
{
    /**
     * @param \App\Filters\ViewFilter $filter
     * @return \Illuminate\Contracts\Pagination\CursorPaginator
     */
    public function __invoke(ViewFilter $filter): CursorPaginator
    {
        /** @var User $user */
        $user = auth()->user();

        return $user
            ->views()
            ->filter($filter)
            ->orderByPivot('created_at', 'desc')
            ->orderByPivot('id')
            ->with('movie')
            ->cursorPaginate();
    }
}
