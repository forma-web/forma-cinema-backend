<?php

namespace App\Http\Requests;

use App\Enums\RussianAgesEnum;
use Illuminate\Validation\Rules\Enum;

class StoreMovieRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'year' => ['numeric', 'min:1895', 'max:2050'],
            'country' => ['string', 'max:255'],
            'age_restriction' => [new Enum(RussianAgesEnum::class)],
            'duration' => ['required', 'numeric', 'min:1'],
            'logline' => ['string', 'max:280'],
            'description' => ['string'],
            'poster' => ['string', 'max:1000'],
            'trailer' => ['string', 'max:1000'],
            'kinopoisk_id' => ['numeric'],
            'kinopoisk_rating' => ['numeric', 'min:0', 'max:10'],
        ];
    }
}
