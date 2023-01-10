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

    private const POSTERS = [
        'https://wallpapers.moviemania.io/desktop/tv/63174/0922e9/lucifer-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/400155/8246da/hotel-transylvania-3-summer-vacation-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/141052/90aa26/justice-league-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/122917/982d38/the-hobbit-the-battle-of-the-five-armies-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/238/90643c/the-godfather-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/tv/1668/4e4f3a/friends-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/tv/1396/9eb237/breaking-bad-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/tv/62560/494539/mr-robot-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/tv/15260/cbf68e/adventure-time-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/177572/39e4ee/big-hero-6-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/155/ab7673/the-dark-knight-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/tv/45/d73df8/top-gear-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/271110/217b74/captain-america-civil-war-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/tv/19885/9ea0cd/sherlock-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/205596/e80ca1/the-imitation-game-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/286217/427460/the-martian-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/293660/7c016e/deadpool-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/tv/60573/8e7b8b/silicon-valley-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/216015/2ce157/fifty-shades-of-grey-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/198184/217545/chappie-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/280/7adbd9/terminator-2-judgment-day-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/310/f457b6/bruce-almighty-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/335984/847f8d/blade-runner-2049-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/11324/b59b3b/shutter-island-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/281957/fcf319/the-revenant-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/106646/93aba7/the-wolf-of-wall-street-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/260514/aa417f/cars-3-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/293167/aeb81b/kong-skull-island-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/324552/99a475/john-wick-chapter-2-desktop-wallpaper.jpg?w=1920&h=1080',
        'https://wallpapers.moviemania.io/desktop/movie/310307/e824f5/the-founder-desktop-wallpaper.jpg?w=1920&h=1080',
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
            'poster' => fake()->randomElement(self::POSTERS),
            'trailer' => 'http://192.168.1.3:9000/movies/' . fake()->randomElement(self::URLS),
            'kinopoisk_id' => fake()->numberBetween(1, 100000),
            'kinopoisk_rating' => fake()->randomFloat(1, 0, 10),
        ];
    }
}
