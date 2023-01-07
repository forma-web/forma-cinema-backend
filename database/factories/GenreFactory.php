<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    private const GENRES = [
        'Боевик',
        'Вестерн',
        'Военный',
        'Детектив',
        'Детский',
        'Документальный',
        'Драма',
        'Исторический',
        'Комедия',
        'Криминал',
        'Мелодрама',
        'Мистика',
        'Музыка',
        'Мультфильм',
        'Приключения',
        'Семейный',
        'Спорт',
        'Триллер',
        'Ужасы',
        'Фантастика',
        'Фэнтези',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement(self::GENRES),
        ];
    }
}
