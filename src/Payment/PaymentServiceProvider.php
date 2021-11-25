<?php

declare(strict_types=1);

namespace Accredify\Payment;

use Accredify\Payment\Domain\Contracts\PaymentServiceInterface;
use Accredify\Payment\Domain\Services\PaymentService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        PaymentServiceInterface::class => PaymentService::class,
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // $this->loadMigrationsFrom(__DIR__.'/Infrastructure/Database/migrations');

        // $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'product');
    }
}
