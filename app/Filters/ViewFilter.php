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
     * @param string $mode
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function mode(string $mode): Builder
    {
        $continueMode = $mode === ViewModesEnum::CONTINUE->value;

        if ($continueMode)
            $this->builder->where('hidden', false);

        return $this->builder->where('finished', !$continueMode);
    }
}
