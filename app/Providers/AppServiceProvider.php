<?php

namespace App\Providers;

use App\Policies\AuteurPolicy;
use App\Policies\LivrePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("create-livre",[LivrePolicy::class,"create"]);
        Gate::define("edit-livre",[LivrePolicy::class,"edit"]);
        Gate::define("delete-livre",[LivrePolicy::class,"delete"]);

        Gate::define("view-auteur",[AuteurPolicy::class,"view"]);

        Gate::define("create-auteur",[AuteurPolicy::class,"create"]);
        Gate::define("edit-auteur",[AuteurPolicy::class,"edit"]);
        Gate::define("delete-auteur",[AuteurPolicy::class,"delete"]);

    }
}
