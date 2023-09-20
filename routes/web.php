<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Qui è possibile registrare le route web per la tua applicazione.
| Queste route sono caricate dal RouteServiceProvider e tutte verranno
| assegnate al gruppo di middleware "web". Fai qualcosa di grandioso!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route dashboard

// index
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.home');

// create
Route::get('/dashboard/dish-create', [DashboardController::class, 'create'])
    ->middleware(['auth'])
    ->name('dish.create');

// store
Route::post('/dashboard/dish-store', [DashboardController::class, 'store'])
    ->middleware(['auth'])
    ->name('dish.store');

// show
Route::get('/dashboard/show', [DashboardController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dish.show');

// delete img
Route::delete('/dashboard/deleteImg/{id}', [DashboardController::class, 'deleteImg'])
    ->middleware('auth')
    ->name('dish.deleteImg');

Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])
    ->name('dish.edit');

Route::put('/dashboard/{id}/update', [DashboardController::class, 'update'])
    ->name('dish.update');

Route::put('/dashboard/dish-deleted-edit/{id}', [DashboardController::class, 'changeDeleted'])
    ->middleware(['auth'])
    ->name('dish.deleted.edit');

// orders
Route::get('/dashboard/orders/{id}/show', [DashboardController::class, 'showOrders'])
    ->middleware(['auth', 'verified'])
    ->name('orders.show');

// statistics
Route::get('/dashboard/orders/{id}/statistics', [DashboardController::class, 'showStatistics'])
    ->middleware(['auth', 'verified'])
    ->name('orders.statistics');

// Route profile

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}/update', [ProfileController::class, 'updateprofile'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
