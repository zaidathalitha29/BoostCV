<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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