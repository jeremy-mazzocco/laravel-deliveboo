<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route dashboard

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.home');

Route::get('/dashboard/dish-create', [DashboardController::class, 'create'])
    ->middleware(['auth'])
    ->name('dish.create');

Route::post('/dashboard/dish-store', [DashboardController::class, 'store'])
    ->middleware(['auth'])
    ->name('dish.store');

Route::get('/dashboard/show', [DashboardController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dish.show');

Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])
    ->name('dish.edit');

Route::put('/dashboard/{id}/update', [DashboardController::class, 'update'])
    ->name('dish.update');

Route::put('/dashboard/dish-deleted-edit/{id}', [DashboardController::class, 'changeDeleted'])->middleware(['auth'])
    ->name('dish.deleted.edit');

Route::get('/dashboard/orders/{id}/show', [DashboardController::class, 'showOrders'])
    ->middleware(['auth', 'verified'])
    ->name('orders.show');



// Route profile

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
