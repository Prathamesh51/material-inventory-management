<?php

namespace App\Providers;

use App\Http\Repositories\Contracts\CategoryRepository;
use App\Http\Repositories\Contracts\MaterialRepository;
use App\Http\Repositories\Eloquent\EloquentCategoryRepository;
use App\Http\Repositories\Eloquent\EloquentMaterialRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepository::class, EloquentCategoryRepository::class);
        $this->app->bind(MaterialRepository::class, EloquentMaterialRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
