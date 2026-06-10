<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Customer flow
Route::get('/reservation', [ReservationController::class, 'select'])->name('reservation.select');
Route::post('/reservation/details', [ReservationController::class, 'details'])->name('reservation.details');
Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/confirmation/{reservation}', [ReservationController::class, 'confirmation'])->name('reservation.confirmation');

// Customer edit personal info only
Route::get('/reservation/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::put('/reservation/{reservation}/update', [ReservationController::class, 'update'])->name('reservation.update');

// Staff login prototype
Route::get('/staff/login', function () {
    return view('staff-login');
})->name('staff.login');

Route::post('/staff/login', function () {
    return redirect()->route('staff.dashboard');
})->name('staff.login.submit');

// Staff dashboard
Route::get('/staff/dashboard', [ReservationController::class, 'dashboard'])->name('staff.dashboard');
Route::put('/staff/reservation/{reservation}/status', [ReservationController::class, 'updateStatus'])->name('staff.reservation.status');