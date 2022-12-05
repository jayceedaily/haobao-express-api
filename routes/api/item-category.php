<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\StoreItemCategoryController;

Route::middleware('auth:sanctum')->group(function () {

    // Item Category

    Route::apiResource('/item-category', ItemCategoryController::class);

    // Store Item Category

    Route::middleware([])->prefix('store/{store}')->group(function () {

        Route::prefix('/item-category')->group(function () {

            Route::get('/', [ItemCategoryController::class, 'index']);

            Route::post('/', [ItemCategoryController::class, 'store']);
        });
    });
});
