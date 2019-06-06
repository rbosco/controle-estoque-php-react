<?php

namespace Estoque\Providers;

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
        $this->app->bind(\Estoque\Repositories\CategoriasRepository::class, \Estoque\Repositories\CategoriasRepositoryEloquent::class);
        $this->app->bind(\Estoque\Repositories\ProdutosRepository::class, \Estoque\Repositories\ProdutosRepositoryEloquent::class);
        //:end-bindings:
    }
}
