<?php

namespace App\Providers;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // TODO: Move this to another place
        Collection::macro('replaceByKey', function (string $key, callable $fn): Collection
        {
            /** @var Collection $this */
            $value = $this->get($key);

            return $this->replace([
                $key => $fn($value)
            ]);
        });

        BelongsToMany::macro('filterRelation', function (QueryFilter $filter): BelongsToMany {

            /** @var BelongsToMany $this */
            $filter->apply($this->getQuery());

            return $this;
        });

        Model::shouldBeStrict(! $this->app->isProduction());
    }
}
