<?php

namespace Workdo\CarService\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposer extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        view()->composer(['business.create'], function ($view) {
            if (\Auth::check()) {
                if (module_is_active('CarService')) {
                    $view->getFactory()->startPush('theme_card', view('car-service::theme.card', ['btn' => false]));
                }
            }
        });


        view()->composer(['business.manage'], function ($view) {
            if (\Auth::check()) {
                if (module_is_active('CarService')) {
                    $view->getFactory()->startPush('theme_card', view('car-service::theme.card', ['btn' => true]));
                }
            }
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
