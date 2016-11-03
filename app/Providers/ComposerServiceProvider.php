<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
             'back.users.edit',
             'back.users.create'
        ], 
            function ($view) {
                $view->with(resolve('App\Repositories\Interfaces\RoleRepositoryInterface')->allSelect());
            }
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
