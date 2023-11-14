<?php

namespace App\Providers;

use App\Services\ClassroomServiceInterface;
use App\Services\ClassroomService;
use App\Services\CurriculumServiceInterface;
use App\Services\CurriculumService;
use App\Services\LectureServiceInterface;
use App\Services\LectureService;
use App\Services\StudentService;
use App\Services\StudentServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentServiceInterface::class, StudentService::class);
        $this->app->bind(LectureServiceInterface::class, LectureService::class);
        $this->app->bind(ClassroomServiceInterface::class, ClassroomService::class);
        $this->app->bind(CurriculumServiceInterface::class, CurriculumService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
