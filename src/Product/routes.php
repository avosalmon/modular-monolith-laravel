<?php

use Illuminate\Support\Facades\Route;

Route::prefix('products')
    ->middleware('api')
    ->namespace('Laracon\Product\Application\Http\Controllers')
    ->group(function () {
        Route::apiResource('/', ProductController::class);
    });
