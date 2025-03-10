<?php

namespace SubalRoy\Preorder;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use SubalRoy\Preorder\Events\PreorderSubmitted;
use SubalRoy\Preorder\Listeners\SendEmailsAfterPreorder;

class PreorderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Event::listen(
            PreorderSubmitted::class,
            SendEmailsAfterPreorder::class
        );

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'preorderform');

        $this->publishes([
            __DIR__.'/../resources/js' => resource_path('js/vendor/preorderform'),
        ], 'js');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../src/Models' => app_path('Models'),
        ], 'models');

    }
}
