<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory, Filterable;

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, GenreMovie::class);
    }
}
