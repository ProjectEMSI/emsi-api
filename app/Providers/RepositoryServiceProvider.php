<?php

namespace App\Providers;

use App\Repositories\Content\Articles\ArticleRepository;
use App\Repositories\Content\Articles\ArticleRepositoryEloquent;
use App\Repositories\Content\Shorts\ShortRepository;
use App\Repositories\Content\Shorts\ShortRepositoryEloquent;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ArticleRepository::class, ArticleRepositoryEloquent::class);
        $this->app->bind(ShortRepository::class, ShortRepositoryEloquent::class);
        //:end-bindings:
    }
}
