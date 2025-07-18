<?php

use App\Http\Controllers\FypsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\InvoiceController;


Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard'); // User is logged in
    }
    return redirect('/login'); // User is not logged in
});

Route::get('/signup', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/signup', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::resource('customers', CustomerController::class);
    Route::resource('users', UserController::class);

    Route::resource('orders', OrderController::class);

    Route::resource('items', ItemController::class);
    Route::resource('invoices', InvoiceController::class);

});



Route::resource('fyps', FypsController::class);
