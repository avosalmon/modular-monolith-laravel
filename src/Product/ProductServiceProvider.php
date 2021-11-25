<?php

declare(strict_types=1);

namespace Accredify\Product;

use Accredify\Product\Domain\Contracts\ProductRepositoryInterface;
use Accredify\Product\Infrastructure\Repositories\ProductRepository;
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

        $this->loadMigrationsFrom(__DIR__.'/Infrastructure/Database/migrations');

        // $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'product');
    }
}
