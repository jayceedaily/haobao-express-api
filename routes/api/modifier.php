<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModifierController;

Route::middleware('auth:sanctum')->group(function () {

    Route::middleware([])->prefix('store/{store}')->group(function () {

        Route::prefix('/modifier')->group(function () {

            Route::get('/', [ModifierController::class, 'index']);

            Route::post('/', [ModifierController::class, 'store']);
        });
    });

    Route::middleware([])->prefix('modifier/{modifier}')->group(function () {

        Route::get('/', [ModifierController::class, 'show']);

        Route::put('/', [ModifierController::class, 'update']);

        Route::delete('/', [ModifierController::class, 'destroy']);
    });
});
