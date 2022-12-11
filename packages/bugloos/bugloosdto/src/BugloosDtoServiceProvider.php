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
//        dd(__DIR__.'\web.php');
        include __DIR__ . '/routes/web.php';
//        $this->loadRoutesFrom(__DIR__.'/web.php');
    }
}
