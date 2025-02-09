<?php

namespace App\Providers;

use App\Services\Dashboard\About\AboutService;
use App\Services\Dashboard\About\IAboutService;
use App\Services\Dashboard\Auth\AuthService;
use App\Services\Dashboard\Auth\IAuthService;
use App\Services\Dashboard\Blog\BlogService;
use App\Services\Dashboard\Blog\IBlogService;
use App\Services\Dashboard\clients\ClientsService;
use App\Services\Dashboard\clients\IClientsService;
use App\Services\Dashboard\Faq\FaqService;
use App\Services\Dashboard\Faq\IFaqService;
use App\Services\Dashboard\Header\HeaderService;
use App\Services\Dashboard\Header\IHeaderService;
use App\Services\Dashboard\Messages\IMessagesService;
use App\Services\Dashboard\Messages\MessagesService;
use App\Services\Dashboard\RolesAndManagers\Managers\IManagerServices;
use App\Services\Dashboard\RolesAndManagers\Managers\ManagerServices;
use App\Services\Dashboard\RolesAndManagers\Roles\IRolesServices;
use App\Services\Dashboard\RolesAndManagers\Roles\RolesServices;
use App\Services\Dashboard\Services\IServicesService as ServicesIServicesService;
use App\Services\Dashboard\Services\ServicesService as ServicesServicesService;
use App\Services\Dashboard\settings\ISettingService;
use App\Services\Dashboard\settings\SettingService;
use App\Services\Dashboard\Skills\ISkillService;
use App\Services\Dashboard\Skills\SkillService;
use App\Services\Dashboard\Team\ITeamService;
use App\Services\Dashboard\Team\TeamService;
use App\Services\Dashboard\Testimonials\ITestimonialService;
use App\Services\Dashboard\Testimonials\TestimonialService;
use App\Services\Website\Blog\BlogService as BlogBlogService;
use App\Services\Website\Blog\IBlogService as BlogIBlogService;
use App\Services\Website\Form\FormService;
use App\Services\Website\Form\IFormService;
use App\Services\Website\Home\HomeService;
use App\Services\Website\Home\IHomeService;
use App\Services\Website\Services\IServicesService;
use App\Services\Website\Services\ServicesService;
use App\Services\Website\Team\ITeamService as TeamITeamService;
use App\Services\Website\Team\TeamService as TeamTeamService;
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
        $this->app->bind(ServicesIServicesService::class,ServicesServicesService::class);
        $this->app->bind(IHeaderService::class,HeaderService::class);
        $this->app->bind(ISkillService::class,SkillService::class);
        $this->app->bind(ITestimonialService::class,TestimonialService::class);
        $this->app->bind(IFaqService::class,FaqService::class);
        $this->app->bind(ITeamService::class,TeamService::class);
        $this->app->bind(IAboutService::class,AboutService::class);
        $this->app->bind(IMessagesService::class,MessagesService::class);
        $this->app->bind(IBlogService::class,BlogService::class);
        $this->app->bind(IHomeService::class,HomeService::class);
        $this->app->bind(IServicesService::class,ServicesService::class);
        $this->app->bind(TeamITeamService::class,TeamTeamService::class);
        $this->app->bind(IFormService::class,FormService::class);
        $this->app->bind(BlogIBlogService::class,BlogBlogService::class);



    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
