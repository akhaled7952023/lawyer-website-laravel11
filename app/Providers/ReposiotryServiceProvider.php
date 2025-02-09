<?php

namespace App\Providers;

use App\Repositories\Dashboard\About\AboutRepository;
use App\Repositories\Dashboard\About\IAboutRepository;
use App\Repositories\Dashboard\Auth\AuthRepository;
use App\Repositories\Dashboard\Auth\IAuthRepository;
use App\Repositories\Dashboard\Blog\BlogRepository;
use App\Repositories\Dashboard\Blog\IBlogRepository;
use App\Repositories\Dashboard\clients\ClientsRepository;
use App\Repositories\Dashboard\clients\IClientsRepository;
use App\Repositories\Dashboard\Faq\FaqRepository;
use App\Repositories\Dashboard\Faq\IFaqRepository;
use App\Repositories\Dashboard\Header\HeaderRepository;
use App\Repositories\Dashboard\Header\IHeaderRepository;
use App\Repositories\Dashboard\Messages\IMessagesRepository;
use App\Repositories\Dashboard\Messages\MessagesRepository;
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
use App\Repositories\Dashboard\Team\ITeamRepository;
use App\Repositories\Dashboard\Team\TeamRepository;
use App\Repositories\Dashboard\Testimonials\ITestimonialRepository;
use App\Repositories\Dashboard\Testimonials\TestimonialRepository;
use App\Repositories\Website\Blog\BlogRepository as BlogBlogRepository;
use App\Repositories\Website\Blog\IBlogRepository as BlogIBlogRepository;
use App\Repositories\Website\Form\FormRepository;
use App\Repositories\Website\Form\IFormRepository;
use App\Repositories\Website\Home\HomeRepository;
use App\Repositories\Website\Home\IHomeRepository;
use App\Repositories\Website\Services\IServicesRepository;
use App\Repositories\Website\Services\ServicesRepository;
use App\Repositories\Website\Team\ITeamRepository as TeamITeamRepository;
use App\Repositories\Website\Team\TeamRepository as TeamTeamRepository;
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
        $this->app->bind(ITestimonialRepository::class,TestimonialRepository::class);
        $this->app->bind(IFaqRepository::class,FaqRepository::class);
        $this->app->bind(ITeamRepository::class,TeamRepository::class);
        $this->app->bind(IAboutRepository::class,AboutRepository::class);
        $this->app->bind(IMessagesRepository::class,MessagesRepository::class);
        $this->app->bind(IBlogRepository::class,BlogRepository::class);
        $this->app->bind(IHomeRepository::class,HomeRepository::class);
        $this->app->bind(IServicesRepository::class,ServicesRepository::class);
        $this->app->bind(TeamITeamRepository::class,TeamTeamRepository::class);
        $this->app->bind(BlogIBlogRepository::class,BlogBlogRepository::class);
        $this->app->bind(IFormRepository::class,FormRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
