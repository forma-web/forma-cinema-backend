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
        $this->call([
            MovieSeeder::class,
        ]);

        foreach (range(1, 3) as $i) {
            $genres = Genre::factory()->count(20)->create();
        }

        User::factory()
            ->count(10)
            ->hasAttached(Series::find(1), [
                'seek' => fake()->numberBetween(0, 100) * 60,
                'finished' => true,
            ], 'views')
            ->create();
    }
}
