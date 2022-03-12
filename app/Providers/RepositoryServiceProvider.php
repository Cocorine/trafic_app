<?php

namespace App\Providers;

use App\Repositories\Eloquent\EloquentRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PermissionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(EloquentRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(EloquentRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(EloquentRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
