<?php

namespace App\Providers;

use App\Services\Contracts\NewsService;
use App\Services\GuardianApi\GuardianApiService;
use App\Services\NewsApi\NewsApiService;
use App\Services\NewyorkTimesApi\NewyorkTimesApiService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            NewyorkTimesApiService::class,
            fn () => new NewyorkTimesApiService(
                baseUrl: strval(config('services.newyork-times-api.url')),
                key: strval(config('services.newyork-times-api.key')),
                timeout: intval(config('services.newyork-times-api.timeout')),
                retryTimes: intval(config('services.newyork-times-api.retry.times')),
                retrySleep: intval(config('services.newyork-times-api.retry.sleep')),

            ),
        );

        $this->app->singleton(
            GuardianApiService::class,
            fn () => new GuardianApiService(
                baseUrl: strval(config('services.guardian-api.url')),
                key: strval(config('services.guardian-api.key')),
                timeout: intval(config('services.guardian-api.timeout')),
                retryTimes: intval(config('services.guardian-api.retry.times')),
                retrySleep: intval(config('services.guardian-api.retry.sleep')),

            ),
        );

        $this->app->singleton(
            abstract: NewsService::class,
            concrete: fn () => new NewsApiService(
                baseUrl: strval(config('services.news-api.url')),
                key: strval(config('services.news-api.key')),
                timeout: intval(config('services.news-api.timeout')),
                retryTimes: intval(config('services.news-api.retry.times')),
                retrySleep: intval(config('services.news-api.retry.sleep')),

            ),
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
