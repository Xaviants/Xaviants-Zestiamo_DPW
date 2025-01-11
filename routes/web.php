<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\TakeawayController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

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

// Reservasi (Dine In)
Route::get('/reserve-table/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reserve-table', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reserve-table', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reserve-table/edit/{id}', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('/reserve-table/update/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reserve-table/delete/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

// Take away
Route::get('/takeaway', [TakeawayController::class, 'create'])->name('takeaway.create');
Route::post('/takeaway', [TakeawayController::class, 'store'])->name('takeaway.store');
Route::get('/takeaway-orders', [TakeawayController::class, 'index'])->name('takeaway.index');
Route::get('/takeaway/edit/{id}', [TakeawayController::class, 'edit'])->name('takeaway.edit');
Route::put('/takeaway/update/{id}', [TakeawayController::class, 'update'])->name('takeaway.update');
Route::delete('/takeaway/delete/{id}', [TakeawayController::class, 'destroy'])->name('takeaway.destroy');