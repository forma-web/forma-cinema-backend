<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    // Views history
    // Continue watching

    public function __invoke()
    {
        return auth()->user()->views()->get();
    }
}
