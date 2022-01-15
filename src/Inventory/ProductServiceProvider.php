<?php

declare(strict_types=1);

namespace Laracon\Inventory;

use Laracon\Inventory\Domain\Contracts\ProductRepositoryInterface;
use Laracon\Inventory\Infrastructure\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ProductRepositoryInterface::class => ProductRepository::class,
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadMigrationsFrom(__DIR__.'/Infrastructure/Database/Migrations');

        // $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'product');
    }
}
