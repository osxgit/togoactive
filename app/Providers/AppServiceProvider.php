<?php

namespace App\Providers;

use App\Repositories\AchievementsRepository;
use App\Repositories\EventsFaqRepository;
use App\Repositories\Interfaces\CrudRepositoryInterface;
use App\Services\MailgunService;
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
        $this->app->bind(
            CrudRepositoryInterface::class,
            EventsFaqRepository::class,
            AchievementsRepository::class,
            MailgunService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
