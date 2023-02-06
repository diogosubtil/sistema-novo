<?php

namespace App\Providers;

use App\Repositories\EloquentUsersRepository;
use App\Repositories\UsersRepository;
use Closure;
use Illuminate\Support\ServiceProvider;

class RepositoriesProviders extends ServiceProvider
{
    //COMPACT BINDINGS
    public array $bindings = [
        UsersRepository::class => EloquentUsersRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function booted(Closure $callback)
    {
        //
    }
}
