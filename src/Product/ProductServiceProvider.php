<?php

declare(strict_types=1);

namespace Accredify\Product;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        // $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'product');
    }
}
