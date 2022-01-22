<?php

declare(strict_types=1);

namespace Laracon\Inventory\Providers;

use Illuminate\Support\ServiceProvider;
use Laracon\Inventory\Contracts\ProductService as ProductServiceContract;
use Laracon\Inventory\Infrastructure\Services\ProductService;

class InventoryServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ProductServiceContract::class => ProductService::class,
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes.php');

        $this->loadMigrationsFrom(__DIR__.'/../Infrastructure/Database/Migrations');

        // $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'inventory');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // manually register bindings
        // $this->app->bind(ProductServiceContract::class, ProductService::class);
    }
}
