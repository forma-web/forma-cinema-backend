<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Genre
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie[] $movies
 * @property-read int|null $movies_count
 * @method static \Database\Factories\GenreFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre query()
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Genre whereUpdatedAt($value)
 */
	class Genre extends \Eloquent {}
}

namespace App\Models{
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
 */
	class GenreMovie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Movie
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int|null $year
 * @property string|null $country
 * @property \App\Enums\RussianAgesEnum|null $age_restrictions
 * @property int $duration
 * @property string|null $logline
 * @property string|null $description
 * @property string|null $poster
 * @property string|null $trailer
 * @property int|null $kinopoisk_id
 * @property float|null $kinopoisk_rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Genre[] $genres
 * @property-read int|null $genres_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Series[] $series
 * @property-read int|null $series_count
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
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereYear($value)
 */
	class Movie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MovieSelection
 *
 * @property int $id
 * @property int $movie_id
 * @property int $selection_id
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection query()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection whereSelectionId($value)
 */
	class MovieSelection extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Selection
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string|null $thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie[] $movies
 * @property-read int|null $movies_count
 * @method static \Database\Factories\SelectionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Selection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Selection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Selection query()
 * @method static \Illuminate\Database\Eloquent\Builder|Selection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Selection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Selection whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Selection whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Selection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Selection whereUserId($value)
 */
	class Selection extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Series
 *
 * @property int $id
 * @property int $movie_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Movie|null $movie
 * @method static \Database\Factories\SeriesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Series newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Series newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Series query()
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereUpdatedAt($value)
 */
	class Series extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie[] $movies
 * @property-read int|null $movies_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Selection[] $selections
 * @property-read int|null $selections_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Series[] $views
 * @property-read int|null $views_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(\App\Filters\QueryFilter $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject, \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * App\Models\View
 *
 * @property int $id
 * @property int $user_id
 * @property int $series_id
 * @property int|null $seek
 * @property bool $finished
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|View newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|View query()
 * @method static \Illuminate\Database\Eloquent\Builder|View whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereFinished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereSeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereSeriesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|View whereUserId($value)
 */
	class View extends \Eloquent {}
}

