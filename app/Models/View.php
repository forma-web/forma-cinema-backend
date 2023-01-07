<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\View
 *
 * @property int $id
 * @property int $user_id
 * @property int $series_id
 * @property int|null $offset
 * @property bool $finished
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|View newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View query()
 * @method static \Illuminate\Database\Eloquent\Builder|View whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereFinished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereOffset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereSeriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereUserId($value)
 * @mixin \Eloquent
 */
class View extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
}
