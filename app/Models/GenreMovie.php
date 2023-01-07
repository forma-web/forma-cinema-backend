<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\GenreMovie
 *
 * @property int $id
 * @property int $genre_id
 * @property int $movie_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie query()
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie whereGenreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GenreMovie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GenreMovie extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genres_movies';
}
