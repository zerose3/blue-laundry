<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\TrackingApiController;

Route::prefix('v1')->group(function () {
    // Public API
    Route::get('/track/{orderCode}', [TrackingApiController::class, 'track']);
    Route::get('/services', [OrderApiController::class, 'services']);
    
    // Authenticated API
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/orders', [OrderApiController::class, 'index']);
        Route::post('/orders', [OrderApiController::class, 'store']);
        Route::get('/orders/{order}', [OrderApiController::class, 'show']);
    });
});
