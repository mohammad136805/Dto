<?php
namespace bugloos\bugloosdto;

use Illuminate\Support\ServiceProvider;

class BugloosDtoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes/web.php';
    }
}
