<?php

declare(strict_types=1);

namespace Laracon\Payment\Providers;

use Laracon\Payment\Contracts\PaymentService as PaymentServiceContract;
use Laracon\Payment\Domain\Services\PaymentService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        PaymentServiceContract::class => PaymentService::class,
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadRoutesFrom(__DIR__.'/../routes.php');

        // $this->loadMigrationsFrom(__DIR__.'/../Infrastructure/Database/Migrations');

        // $this->loadTranslationsFrom(__DIR__.'/../Resources/lang', 'payment');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
