<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {


    Route::get('/home', [ApiController::class, 'typeList']);

    //store order
    Route::post('/orders', [ApiController::class, 'storeOrder']);

    Route::get('/restaurants/{ids}', [ApiController::class, 'restaurantList']);

    Route::get('/restaurant/{id}/dishes', [ApiController::class, 'dishesList']);

});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
