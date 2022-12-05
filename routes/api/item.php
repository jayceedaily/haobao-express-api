<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ModifierItemController;

Route::middleware('auth:sanctum')->group(function () {

    Route::middleware([])->prefix('store/{store}')->group(function () {

        Route::prefix('/item')->group(function () {

            Route::get('/', [ItemController::class, 'index']);

            Route::post('/', [ItemController::class, 'store']);
        });
    });

    Route::middleware([])->prefix('modifier/{modifier}')->group(function () {

        Route::prefix('/item')->group(function () {

            Route::get('/', [ModifierItemController::class, 'index']);

            Route::post('/', [ModifierItemController::class, 'store']);
        });
    });

    Route::middleware([])->prefix('item/{item}')->group(function () {

        Route::get('/', [ItemController::class, 'show']);

        Route::put('/', [ItemController::class, 'update']);

        Route::delete('/', [ItemController::class, 'destroy']);
    });
});
