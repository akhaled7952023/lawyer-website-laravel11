<?php

namespace App\Providers;

use App\Services\Dashboard\Auth\AuthService;
use App\Services\Dashboard\Auth\IAuthService;
use App\Services\Dashboard\clients\ClientsService;
use App\Services\Dashboard\clients\IClientsService;
use App\Services\Dashboard\Header\HeaderService;
use App\Services\Dashboard\Header\IHeaderService;
use App\Services\Dashboard\RolesAndManagers\Managers\IManagerServices;
use App\Services\Dashboard\RolesAndManagers\Managers\ManagerServices;
use App\Services\Dashboard\RolesAndManagers\Roles\IRolesServices;
use App\Services\Dashboard\RolesAndManagers\Roles\RolesServices;
use App\Services\Dashboard\Services\IServicesService;
use App\Services\Dashboard\Services\ServicesService;
use App\Services\Dashboard\settings\ISettingService;
use App\Services\Dashboard\settings\SettingService;
use App\Services\Dashboard\Skills\ISkillService;
use App\Services\Dashboard\Skills\SkillService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthService::class,AuthService::class);
        $this->app->bind(IRolesServices::class,RolesServices::class);
        $this->app->bind(IManagerServices::class,ManagerServices::class);
        $this->app->bind(ISettingService::class,SettingService::class);
        $this->app->bind(IClientsService::class,ClientsService::class);
        $this->app->bind(IServicesService::class,ServicesService::class);
        $this->app->bind(IHeaderService::class,HeaderService::class);
        $this->app->bind(ISkillService::class,SkillService::class);





    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
