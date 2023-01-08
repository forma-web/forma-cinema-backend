<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Series;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 3) as $i) {
            $genres = Genre::factory()->count(2)->create();

            Movie::factory()
                ->count(10)
                ->has(Series::factory()->count(10))
                ->hasAttached($genres)
                ->create();

            User::factory(5)
                ->hasAttached(Series::all(), [
                    'seek' => fake()->numberBetween(0, 100) * 60,
                    'finished' => fake()->boolean(50),
                ], 'views')
                ->create();
        }
    }
}
