<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {


    Route::get('/home', [ApiController::class, 'typeList']);

    // Route::get('/project/{id}', [ProjectController::class, 'projectShow']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
