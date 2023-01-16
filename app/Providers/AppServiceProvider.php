<?php

namespace App\Providers;

use App\Filters\QueryFilter;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
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
        // TODO: Move this to a separate service provider

        Collection::macro('replaceByKey', function (string $key, callable $fn): Collection
        {
            /** @var Collection $this */
            $value = $this->get($key);

            return $this->replace([
                $key => $fn($value)
            ]);
        });

        VerifyEmail::toMailUsing(function (User $notifiable, string $url): MailMessage {
            return (new MailMessage)
                ->subject('Добро пожаловать в систему')
                ->view('mails.user_created', [
                    'url' => $url,
                    'username' => $notifiable->first_name,
                ]);
        });

        VerifyEmail::createUrlUsing(function (User $notifiable): string
        {
            $params = http_build_query([
                'verifier' => URL::temporarySignedRoute(
                    'auth.email.verify',
                    now()->addMinutes(config('auth.verification.expire', 60)),
                    [
                        'id' => $notifiable->getKey(),
                        'hash' => sha1($notifiable->getEmailForVerification()),
                    ]
                ),
            ]);

            return config('app.frontend_url') . '?' . $params;
        });

        BelongsToMany::macro('filterRelation', function (QueryFilter $filter): BelongsToMany {

            /** @var BelongsToMany $this */
            $filter->apply($this->getQuery());

            return $this;
        });

        Model::shouldBeStrict(! $this->app->isProduction());
    }
}
