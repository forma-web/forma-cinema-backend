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
        'Бойцовский клуб',
        'Властелин колец: Возвращение короля',
        'Властелин колец: Две крепости',
        'Властелин колец: Братство кольца',
        'Джентльмены',
        'Джокер',
        'Достучаться до небес',
        'Зеленая миля',
        'Интерстеллар',
        'Крестный отец',
        'Крестный отец 2',
        'Криминальное чтиво',
        'Матрица',
        'Матрица: Перезагрузка',
        'Начало',
        'Однажды в Голливуде',
        'Побег из Шоушенка',
        'Пятый элемент',
        'Список Шиндлера',
        'Темный рыцарь',
        'Терминатор 2: Судный день',
        'Титаник',
        'Форрест Гамп',
    ];

    private const COUNTRYS = [
        'США',
        'Великобритания',
        'Франция',
        'Германия',
        'Италия',
        'Япония',
        'Канада',
        'Испания',
        'Россия',
        'Южная Корея',
        'Австралия',
        'Индия',
        'Бразилия',
        'Мексика',
        'Китай',
        'Швеция',
        'Нидерланды',
        'Швейцария',
        'Израиль',
        'Норвегия',
        'Ирландия',
        'Дания',
        'Польша',
        'Турция',
        'Греция',
        'Австрия',
        'ЮАР',
        'Индонезия',
        'Сингапур',
        'Швеция',
        'Нидерланды',
        'Швейцария',
        'Израиль',
        'Норвегия',
        'Ирландия',
        'Дания',
        'Польша',
        'Турция',
        'Греция',
        'Австрия',
        'ЮАР',
        'Индонезия',
        'Сингапур',
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
            'country' => $this->faker->randomElement(self::COUNTRYS),
            'age_restrictions' => fake()->randomElement(RussianAgesEnum::values()),
            'duration' => fake()->numberBetween(60, 180) * 60, // seconds
            'logline' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'poster' => fake()->imageUrl(),
            'trailer' => 'http://192.168.1.3:9000/movies/' . fake()->randomElement(self::URLS),
            'kinopoisk_id' => fake()->numberBetween(1, 100000),
            'kinopoisk_rating' => fake()->randomFloat(1, 0, 10),
        ];
    }
}
