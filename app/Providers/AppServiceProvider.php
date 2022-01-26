<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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

        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });
        Gate::define('hrd', function (User $user) {
            return $user->posisi == 'hrd';
        });

        Gate::define('not_admin', function (User $user) {
            return !$user->is_admin;
        });

        Gate::define('not_admin_direktur', function (User $user) {
            return !$user->is_admin && $user->posisi !== 'direktur';
        });
        Gate::define('not_admin_karyawan', function (User $user) {
            return !$user->is_admin && $user->posisi !== 'karyawan';
        });
    }
}
