<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestoController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');

Route::get('/forgotPassword', [AuthController::class, 'showFP'])->name('password.reset');

Route::get('/contact', [RestoController::class], 'showContact')->name('contact.show');
Route::post('/contact/submit', [RestoController::class, 'submitContact'])->name('contact.submit');

Route::get('/home', [RestoController::class, 'showHome'])->name('home.show');
Route::get('/menu', [RestoController::class, 'showMenu'])->name('resto.menu');
Route::post('/add-to-cart', [RestoController::class, 'addToCart'])->name('resto.addToCart');
Route::get('/view-order', [RestoController::class, 'viewOrder'])->name('resto.viewOrder');
Route::post('/cart/update-quantity/{id}', [RestoController::class, 'updateQuantity'])->name('resto.updateQuantity');
Route::post('/remove-from-cart/{id}', [RestoController::class, 'removeFromCart'])->name('resto.removeFromCart');

Route::get('/reserve_table', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reserve_table', [ReservationController::class, 'store'])->name('reservations.store');