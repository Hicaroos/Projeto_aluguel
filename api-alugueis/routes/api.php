<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContractController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\TenantController;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});


Route::middleware('auth:api')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('profile', [AuthController::class, 'profile']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
    });
    
    Route::apiResource('tenants', TenantController::class);
    Route::apiResource('contracts', ContractController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('properties', PropertyController::class);
});
