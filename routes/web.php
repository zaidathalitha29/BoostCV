<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', 'DashboardController@admin')
            ->name('dashboard');

        Route::resource('users', 'Admin\UserController');

        Route::resource('creators', 'Admin\CreatorController');

        Route::resource('categories', 'Admin\CategoryController');

    });


/*
|--------------------------------------------------------------------------
| Creator
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:creator'])
    ->prefix('creator')
    ->name('creator.')
    ->group(function () {

        Route::get('/dashboard', 'DashboardController@creator')
            ->name('dashboard');

        Route::get('/profile', 'Creator\ProfileController@index')
            ->name('profile.index');

        Route::get('/profile/edit', 'Creator\ProfileController@edit')
            ->name('profile.edit');

        Route::put('/profile', 'Creator\ProfileController@update')
            ->name('profile.update');

        Route::resource('portfolios', 'Creator\PortfolioController');

    });


/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/dashboard', 'DashboardController@customer')
            ->name('dashboard');

        Route::get('/profile', 'Customer\CustomerController@profile')
            ->name('profile');

        Route::get('/profile/edit', 'Customer\CustomerController@editProfile')
            ->name('profile.edit');

        Route::put('/profile', 'Customer\CustomerController@updateProfile')
            ->name('profile.update');

        Route::resource('services', 'Customer\ServiceController')
            ->only(['index', 'show']);

        Route::resource('orders', 'Customer\OrderController');

        Route::resource('payments', 'Customer\PaymentController')
            ->only(['index', 'create', 'store', 'show']);

    });