<?php

namespace App\Providers;

use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Interfaces\Admin\AdminActivityInterface;
use App\Http\Interfaces\Admin\AdminAuthInterface;
use App\Http\Interfaces\Admin\AdminContactInterface;
use App\Http\Interfaces\Admin\AdminCourseInterface;
use App\Http\Interfaces\Admin\AdminFaqInterface;
use App\Http\Interfaces\Admin\AdminHomeInterface;
use App\Http\Interfaces\Admin\AdminSliderInterface;
use App\Http\Interfaces\Admin\AdminTeacherInterface;
use App\Http\Interfaces\EndUser\ContactInterface;
use App\Http\Interfaces\EndUser\FaqInterface;
use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Repositories\Admin\AdminActivityRepository;
use App\Http\Repositories\Admin\AdminAuthRepository;
use App\Http\Repositories\Admin\AdminContactRepository;
use App\Http\Repositories\Admin\AdminCourseRepository;
use App\Http\Repositories\Admin\AdminFaqRepository;
use App\Http\Repositories\Admin\AdminHomeRepository;
use App\Http\Repositories\Admin\AdminSliderRepository;
use App\Http\Repositories\Admin\AdminTeacherRepository;
use App\Http\Repositories\EndUser\ContactRepository;
use App\Http\Repositories\EndUser\FaqRepository;
use App\Http\Repositories\EndUser\HomeRepository;
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
        $this->app->bind(AdminActivityInterface::class,AdminActivityRepository::class);
        $this->app->bind(AdminTeacherInterface::class,AdminTeacherRepository::class);
        $this->app->bind(AdminAuthInterface::class,AdminAuthRepository::class);
        $this->app->bind(AdminCourseInterface::class,AdminCourseRepository::class);
        $this->app->bind(AdminFaqInterface::class,AdminFaqRepository::class);
        $this->app->bind(AdminHomeInterface::class,AdminHomeRepository::class);
        $this->app->bind(AdminSliderInterface::class,AdminSliderRepository::class);
        $this->app->bind(AdminContactInterface::class,AdminContactRepository::class);
        $this->app->bind(HomeInterface::class,HomeRepository::class);
        $this->app->bind(FaqInterface::class,FaqRepository::class);
        $this->app->bind(ContactInterface::class,ContactRepository::class);
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
