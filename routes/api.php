<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//  Access Control List

Route::middleware('auth:sanctum')->group(function () {

    Route::middleware([])->apiResource('role', RoleController::class);

    Route::middleware([])->apiResource('permission', PermissionController::class);

    Route::middleware([])->apiResource('role-permission', RolePermissionController::class);
});

require('api/auth.php');
require('api/item-category.php');
require('api/item.php');
require('api/store.php');
