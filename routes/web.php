<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CreatorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Creator\ProfileController;
use App\Http\Controllers\Creator\PortfolioController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\ServiceController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PaymentController;


/*
|--------------------------------------------------------------------------
| Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
| Laravel UI pada Laravel 7 masih menggunakan namespace controller.
*/

Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});


/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| Dashboard Umum
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'admin'])
            ->name('dashboard');

        Route::resource('users', UserController::class);

        Route::resource('creators', CreatorController::class);

        Route::resource('categories', CategoryController::class);
    });


/*
|--------------------------------------------------------------------------
| Creator Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:creator'])
    ->prefix('creator')
    ->name('creator.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'creator'])
            ->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'index'])
            ->name('profile.index');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::put('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::resource('portfolios', PortfolioController::class);
    });


/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'customer'])
            ->name('dashboard');

        Route::get('/profile', [CustomerController::class, 'profile'])
            ->name('profile');

        Route::get('/profile/edit', [CustomerController::class, 'editProfile'])
            ->name('profile.edit');

        Route::put('/profile', [CustomerController::class, 'updateProfile'])
            ->name('profile.update');

        Route::resource('services', ServiceController::class)
            ->only(['index', 'show']);

        Route::resource('orders', OrderController::class);

        Route::resource('payments', PaymentController::class)
            ->only(['index', 'create', 'store', 'show']);
    });