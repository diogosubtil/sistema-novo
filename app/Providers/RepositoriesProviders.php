<?php

namespace App\Providers;

use App\Repositories\EloquentNotificationsRepository;
use App\Repositories\EloquentRegistersRepository;
use App\Repositories\EloquentSettingsRepository;
use App\Repositories\EloquentSupportsAnswersRepository;
use App\Repositories\EloquentSupportsRepository;
use App\Repositories\EloquentUnidadesRepository;
use App\Repositories\EloquentUploadsRepository;
use App\Repositories\EloquentUsersRepository;
use App\Repositories\NotificationsRepository;
use App\Repositories\RegistersRepository;
use App\Repositories\SettingsRepository;
use App\Repositories\SupportsAnswersRepository;
use App\Repositories\SupportsRepository;
use App\Repositories\UnidadesRepository;
use App\Repositories\UploadsRepository;
use App\Repositories\UsersRepository;
use Closure;
use Illuminate\Support\ServiceProvider;

class RepositoriesProviders extends ServiceProvider
{
    //COMPACT BINDINGS
    public array $bindings = [
        UsersRepository::class              => EloquentUsersRepository::class,
        UnidadesRepository::class           => EloquentUnidadesRepository::class,
        SettingsRepository::class           => EloquentSettingsRepository::class,
        RegistersRepository::class          => EloquentRegistersRepository::class,
        SupportsRepository::class           => EloquentSupportsRepository::class,
        SupportsAnswersRepository::class    => EloquentSupportsAnswersRepository::class,
        UploadsRepository::class            => EloquentUploadsRepository::class,
        NotificationsRepository::class      => EloquentNotificationsRepository::class
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
