<?php

namespace App\Providers;

use App\Repositories\Dashboard\Auth\AuthRepository;
use App\Repositories\Dashboard\Auth\IAuthRepository;
use App\Repositories\Dashboard\clients\ClientsRepository;
use App\Repositories\Dashboard\clients\IClientsRepository;
use App\Repositories\Dashboard\Header\HeaderRepository;
use App\Repositories\Dashboard\Header\IHeaderRepository;
use App\Repositories\Dashboard\RolesAndManagers\Managers\IManagersRepository;
use App\Repositories\Dashboard\RolesAndManagers\Managers\ManagersRepository;
use App\Repositories\Dashboard\RolesAndManagers\Roles\IRolesRepository;
use App\Repositories\Dashboard\RolesAndManagers\Roles\RolesRepository;
use App\Repositories\Dashboard\Services\IServicessRepository;
use App\Repositories\Dashboard\Services\ServicessRepository;
use App\Repositories\Dashboard\settings\ISettingRepository;
use App\Repositories\Dashboard\settings\SettingRepository;
use App\Repositories\Dashboard\Skills\ISkillsRepository;
use App\Repositories\Dashboard\Skills\SkillsRepository;
use Illuminate\Support\ServiceProvider;

class ReposiotryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthRepository::class,AuthRepository::class);
        $this->app->bind(IRolesRepository::class,RolesRepository::class);
        $this->app->bind(IManagersRepository::class,ManagersRepository::class);
        $this->app->bind(ISettingRepository::class,SettingRepository::class);
        $this->app->bind(IClientsRepository::class,ClientsRepository::class);
        $this->app->bind(IServicessRepository::class,ServicessRepository::class);
        $this->app->bind(IHeaderRepository::class,HeaderRepository::class);
        $this->app->bind(ISkillsRepository::class,SkillsRepository::class);



    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
