<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class MovieSelection extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
