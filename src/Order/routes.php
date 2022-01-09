<?php

use Illuminate\Support\Facades\Route;

Route::prefix('order-module')
    ->middleware('api')
    ->namespace('Laracon\Order\Application\Http\Controllers')
    ->group(function () {
        Route::apiResource('orders/', OrderController::class)->except('destroy');
    });
