<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Movie
 *
 * @property int $id
 * @property string $name
 * @property int|null $year
 * @property string|null $country
 * @property string|null $age_restrictions
 * @property int $duration
 * @property string|null $logline
 * @property string|null $description
 * @property string|null $poster
 * @property string|null $trailer
 * @property string|null $kinopoisk_id
 * @property float|null $kinopoisk_rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Genre[] $genres
 * @property-read int|null $genres_count
 * @method static \Database\Factories\MovieFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie filter(\App\Filters\QueryFilter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereAgeRestrictions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereKinopoiskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereKinopoiskRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereLogline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie wherePoster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTrailer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereYear($value)
 * @mixin \Eloquent
 */
class Movie extends Model
{
    use HasFactory, Filterable;

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, GenreMovie::class);
    }
}
