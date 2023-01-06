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
        'Властелин колец: Возвращение короля',
        'Гладиатор',
        'Пираты Карибского моря: Проклятие Черной жемчужины',
        'Семь самураев',
        'Храброе сердце',
        'Властелин колец: Две крепости',
        'Интерстеллар',
        'Матрица',
        'Начало',
        'Властелин колец: Братство кольца',
        'Крестный отец',
        'Криминальное чтиво',
        'Властелин колец: Братство кольца',
        'Славные парни',
        'Звёздные войны: Эпизод V - Империя наносит ответный удар',
        'Звёздные войны: Эпизод IV - Новая надежда',
        'Звёздные войны: Эпизод VI - Возвращение джедая',
        'Звёздные войны: Эпизод I - Скрытая угроза',
        'Звёздные войны: Эпизод III - Месть ситхов',
        'Звёздные войны: Эпизод II - Атака клонов',
        'Звёздные войны: Эпизод VII - Пробуждение силы',
        'Звёздные войны: Эпизод VIII - Последние джедаи',
        'Звёздные войны: Эпизод IX - Скайуокер. Восход',
        'Джентльмены',
        'Джокер',
        'Джанго освобождённый',
        'Джон Уик',
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
            'poster' => fake()->imageUrl(randomize: false, word: $movie),
            'trailer' => 'http://192.168.1.3:9000/movies/' . fake()->randomElement(self::URLS),
            'kinopoisk_id' => fake()->numberBetween(1, 100000),
            'kinopoisk_rating' => fake()->randomFloat(1, 0, 10),
        ];
    }
}
