<?php

namespace App\Providers;

use App\Contracts\AboutContract;
use App\Contracts\ScreenContract;
use App\Contracts\GeneralInformationContract;
use App\Contracts\HomeContract;
use App\Contracts\UserContract;
use App\Contracts\AttributeContract;
use App\Contracts\BlogContract;
use App\Contracts\PortfolioContract;
use App\Contracts\CategoryContract;
use App\Contracts\TestimonialContract;
use App\Contracts\CompanyIconContract;
use App\Contracts\CompanyFactContract;
use App\Contracts\CommentContract;
use App\Contracts\ContactContract;
use App\Contracts\ServiceContract;
use App\Contracts\SubscriptionContract;
use App\Contracts\TeamContract;
use App\Contracts\SettingContract;
use App\Repositories\AboutRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\BlogRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\TestimonialRepository;
use App\Repositories\HomeRepository;
use App\Repositories\SubscriptionRepository;
use App\Repositories\SettingRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\CompanyIconRepository;
use App\Repositories\CompanyFactRepository;
use App\Repositories\CommentRepository;
use App\Repositories\UserRepository;
use App\Repositories\ScreenRepository;
use App\Repositories\GeneralInformationRepository;
use App\Repositories\ContactRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\TeamRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\SettingProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        TestimonialContract::class         =>          TestimonialRepository::class,
        HomeContract::class         =>          HomeRepository::class,
        AttributeContract::class         =>          AttributeRepository::class,
        AboutContract::class         =>          AboutRepository::class,
        ServiceContract::class         =>          ServiceRepository::class,
        ClientContract::class         =>          ClientRepository::class,
        TeamContract::class         =>          TeamRepository::class,
        BlogContract::class         =>          BlogRepository::class,
        ContactContract::class         =>          ContactRepository::class,
        CompanyIconContract::class         =>          CompanyIconRepository::class,
        CommentContract::class         =>          CommentRepository::class,
        CompanyFactContract::class         =>          CompanyFactRepository::class,
        UserContract::class         =>          UserRepository::class,
        ScreenContract::class         =>          ScreenRepository::class,
        GeneralInformationContract::class         =>          GeneralInformationRepository::class,
        PortfolioContract::class         =>          PortfolioRepository::class,
        SubscriptionContract::class         =>          SubscriptionRepository::class,
        SettingContract::class         =>          SettingRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}
