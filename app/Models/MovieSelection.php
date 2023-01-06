<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\MovieSelection
 *
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection query()
 * @mixin \Eloquent
 */
class MovieSelection extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
