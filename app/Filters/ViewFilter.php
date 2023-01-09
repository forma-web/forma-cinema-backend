<?php

namespace App\Filters;

use App\Enums\ViewModesEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rules\Enum;

class ViewFilter extends QueryFilter
{
    protected function rules(): array
    {
        return [
            'mode' => [new Enum(ViewModesEnum::class)],
        ];
    }

    /**
     * @param int $year
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function mode(ViewModesEnum $mode): Builder
    {
        dd($mode);
        return $this->builder->where('year', '>=', $year);
    }
}
