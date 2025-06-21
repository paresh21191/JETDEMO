<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\FlightBookingController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\FlightCustomerUserController;
use App\Http\Controllers\Admin\SystemReportController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Flight Booking management routes
    Route::get('bookings', [FlightBookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/create', [FlightBookingController::class, 'create'])->name('bookings.create');
    Route::post('bookings', [FlightBookingController::class, 'store'])->name('bookings.store');
    Route::get('bookings/{booking}/edit', [FlightBookingController::class, 'edit'])->name('bookings.edit');
    Route::put('bookings/{booking}', [FlightBookingController::class, 'update'])->name('bookings.update');
    Route::delete('bookings/{booking}', [FlightBookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('bookings/{booking}', [FlightBookingController::class, 'show'])->name('bookings.show');
    Route::resource('flight_customer_users', FlightCustomerUserController::class);
    Route::get('reports', [SystemReportController::class, 'index'])->name('reports.index');
});


require __DIR__.'/auth.php';
