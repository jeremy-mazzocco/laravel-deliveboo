<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {

    Route::get('/home', [ApiController::class, 'mountedData']);
    Route::post('/restaurants', [ApiController::class, 'restaurantList']);

    // Route::get('/restaurants', [ApiController::class, 'restaurantList'])->name('debug.page');
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
