<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\StoreItemCategoryController;

Route::middleware('auth:sanctum')->group(function () {

    // Item Category

    // Route::apiResource('/category', ItemCategoryController::class);

    Route::put('/category/{itemCategory}', [ItemCategoryController::class, 'update']);
    Route::delete('/category/{itemCategory}', [ItemCategoryController::class, 'destroy']);

    // Store Item Category

    Route::middleware([])->prefix('store/{store}')->group(function () {

        Route::prefix('/category')->group(function () {

            Route::get('/', [ItemCategoryController::class, 'index']);

            Route::post('/', [ItemCategoryController::class, 'store']);
        });
    });
});
