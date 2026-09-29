<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});


Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
        // Kelola User
        Route::resource('users', 'Admin\UserController');

        // Kelola Creator
        Route::resource('creators', 'Admin\CreatorController');

        // Kelola Category
        Route::resource('categories', 'Admin\CategoryController');

    });


Route::middleware(['auth', 'role:creator'])->prefix('creator')->name('creator.')->group(function () {
        // Profile Creator
        Route::get('/profile', 'Creator\ProfileController@index')
            ->name('profile.index');

        Route::get('/profile/edit', 'Creator\ProfileController@edit')
            ->name('profile.edit');

        Route::put('/profile', 'Creator\ProfileController@update')
            ->name('profile.update');

        Route::resource('portfolios', 'Creator\PortfolioController');

    });


Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/profile', 'Customer\CustomerController@profile')
            ->name('profile');

        Route::get('/profile/edit', 'Customer\CustomerController@editProfile')
            ->name('profile.edit');

        Route::put('/profile', 'Customer\CustomerController@updateProfile')
            ->name('profile.update');

        Route::resource('services', 'Customer\ServiceController')
            ->only([
                'index',
                'show'
            ]);

        Route::resource('orders', 'Customer\OrderController');

        Route::resource('payments', 'Customer\PaymentController')
            ->only([
                'index',
                'create',
                'store',
                'show'
            ]);
    });