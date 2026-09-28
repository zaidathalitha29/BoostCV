<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CreatorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');});
});
Route::middleware(['auth', 'role:creator'])->group(function () {
    Route::get('/creator/dashboard', function () {return view('creator.dashboard');});
});
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', function () {return view('customer.dashboard');});
});


// payments
Route::get('/payments', 'PaymentController@index')->name('payments.index');
Route::post('/payments', 'PaymentController@store')->name('payments.store');
Route::put('/payments/{id}/verify', 'PaymentController@verify')->name('payments.verify');
Route::put('/payments/{id}/reject', 'PaymentController@reject')->name('payments.reject');

// creators
Route::get('/creators', 'CreatorController@index')->name('creator.index');
Route::get('/creators/create', 'CreatorController@create')->name('creator.create');
Route::post('/creators', 'CreatorController@store')->name('creator.store');
Route::get('/creators/{id}/edit', 'CreatorController@edit')->name('creator.edit');
Route::put('/creators/{id}', 'CreatorController@update')->name('creator.update');
Route::delete('/creators/{id}', 'CreatorController@destroy')->name('creator.destroy');

// services
Route::get('/services', 'ServiceController@index')->name('service.index');
Route::get('/services/create', 'ServiceController@create')->name('service.create');
Route::post('/services', 'ServiceController@store')->name('service.store');
Route::get('/services/{id}/edit', 'ServiceController@edit')->name('service.edit');
Route::put('/services/{id}', 'ServiceController@update')->name('service.update');
Route::delete('/services/{id}', 'ServiceController@destroy')->name('service.destroy');

// portfolios
Route::get('/portfolios', 'PortfolioController@index')->name('portfolio.index');
Route::get('/portfolios/create', 'PortfolioController@create')->name('portfolio.create');
Route::post('/portfolios', 'PortfolioController@store')->name('portfolio.store');
Route::get('/portfolios/{id}/edit', 'PortfolioController@edit')->name('portfolio.edit');
Route::put('/portfolios/{id}', 'PortfolioController@update')->name('portfolio.update');
Route::delete('/portfolios/{id}', 'PortfolioController@destroy')->name('portfolio.destroy');