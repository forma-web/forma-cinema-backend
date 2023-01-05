<?php

namespace Database\Factories;

use App\Enums\RussianAgesEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    private const MOVIES = [
        'Титаник',
        'Зеленая миля',
        'Побег из Шоушенка',
        'Форрест Гамп',
        'Список Шиндлера',
        '1+1',
        'Леон',
        'Иван Васильевич меняет профессию',
        'Достучаться до небес',
        'Король Лев',
        'Бойцовский клуб',
    ];

    private const URLS = [
        'MVI_6513.MOV',
        'Погоня.mp4',
        'MVI_9891.MOV',
        'PFSC.mp4',
        'Огонёк.mp4',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $movie = $this->faker->randomElement(self::MOVIES);

        return [
            'name' => $movie,
            'year' => fake()->year(),
            'country' => fake()->countryISOAlpha3(),
            'age_restrictions' => fake()->randomElement(RussianAgesEnum::values()),
            'duration' => fake()->numberBetween(60, 180) * 60,
            'logline' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'poster' => fake()->imageUrl(randomize: false, word: $movie),
            'trailer' => urlencode('http://192.168.1.3/movies/' . fake()->randomElement(self::URLS)),
            'kinopoisk_id' => fake()->numberBetween(1, 100000),
            'kinopoisk_rating' => fake()->randomFloat(1, 0, 10),
        ];
    }
}
