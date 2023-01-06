<?php

namespace App\Filters;

use App\Rules\Delimited;
use Illuminate\Database\Eloquent\Builder;

class MovieFilter extends QueryFilter
{
    protected function rules(): array
    {
        return [
            'minYear' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'maxYear' => ['nullable', 'integer', 'min:1900', 'max:2100'],
            'genres' => ['nullable', new Delimited('numeric')],
        ];
    }

    /**
     * @param int $year
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function minYear(int $year): Builder
    {
        return $this->builder->where('year', '>=', $year);
    }

    /**
     * @param int $year
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function maxYear(int $year): Builder
    {
        return $this->builder->where('year', '<=', $year);
    }

    /**
     * @param string $genres
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function genres(string $genres): Builder
    {
        $genreIds = extract_collection($genres);

        return $this->builder->whereHas('genres', function (Builder $query) use ($genreIds) {
            $query->whereIn('genre_id', $genreIds);
        });
    }
}
