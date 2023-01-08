<?php

namespace App\Http\Controllers;

use App\Enums\ViewModesEnum;
use App\Models\User;
use Illuminate\Contracts\Pagination\CursorPaginator;

class ViewController extends Controller
{
    // Views history
    // Continue watching

    /**
     * @return string
     */
    public function __invoke()
    {
        /** @var User $user */
        $user = auth()->user();

        $mode =  \request()->get('mode', ViewModesEnum::CONTINUE->value);

        $views = $user
            ->views()
            ->orderByPivot('created_at', 'desc')
            ->orderByPivot('id');

        if ($mode === ViewModesEnum::CONTINUE->value)
            return $views->wherePivot('finished', false)->get();

        return $views->get();
    }
}
