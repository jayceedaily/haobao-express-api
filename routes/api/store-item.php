<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreItemController;

Route::middleware('auth:sanctum')
    ->prefix('store/{store}/item')
    ->controller(StoreItemController::class)
    ->name('store-item.')
    ->group(function () {

        Route::get('/', 'index')->name('view');

        Route::post('/', 'store')->name('create');

    });
