<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @mixin \Eloquent
 */
class Selection extends Model
{
    use HasFactory;
}
