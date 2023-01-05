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
 * App\Models\Movie
 *
 * @property int $id
 * @property string $name
 * @property int|null $year
 * @property string|null $country
 * @property string|null $age_restrictions
 * @property int $duration
 * @property string|null $longline
 * @property string|null $description
 * @property string|null $poster
 * @property string|null $trailer
 * @property string|null $kinopoisk_id
 * @property string|null $kinopoisk_rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereLongline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie wherePoster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTrailer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereYear($value)
 */
	class Movie extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MovieSelection
 *
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSelection query()
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
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SeriesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Series newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Series newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Series query()
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Series whereId($value)
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
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
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
	class User extends \Eloquent {}
}

namespace App\Models{
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
 */
	class View extends \Eloquent {}
}

