<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Article\App\Interfaces\ArticleRepositoryInterface;
use Modules\Article\App\Repositories\ArticleRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
