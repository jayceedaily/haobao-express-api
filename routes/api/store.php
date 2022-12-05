<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

//  Store Management

Route::middleware('auth:sanctum')->group(function () {

    Route::middleware([])->apiResource('store', StoreController::class);

});
