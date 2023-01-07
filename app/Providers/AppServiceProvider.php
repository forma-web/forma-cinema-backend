<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Collection::macro('replaceByKey', function (string $key, callable $fn): Collection
        {
            /** @var Collection $this */
            $value = $this->get($key);

            return $this->replace([
                $key => $fn($value)
            ]);
        });

        Model::shouldBeStrict(! $this->app->isProduction());
    }
}
