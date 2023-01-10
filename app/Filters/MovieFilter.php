<?php

namespace App\Filters;

use App\Rules\Delimited;
use Illuminate\Database\Eloquent\Builder;

class MovieFilter extends QueryFilter
{
    protected function rules(): array
    {
        return [
            'minYear' => ['numeric', 'min:1900', 'max:2100'],
            'maxYear' => ['numeric', 'min:1900', 'max:2100'],
            'selection' => ['numeric', 'exists:selections,id'],
            'genres' => ['string', new Delimited('numeric')],
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
     * @param int $selectionId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function selection(int $selectionId): Builder
    {
        return $this->builder->whereHas('selections', function (Builder $query) use ($selectionId) {
            $query->where('selections.id', $selectionId);
        });
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
