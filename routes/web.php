<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\FlightBookingController;

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




// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//  Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::resource('bookings', FlightBookingController::class);
// })->middleware('admin');


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Flight Booking management routes (separate)
    Route::get('bookings', [FlightBookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('bookings/create', [FlightBookingController::class, 'create'])->name('admin.bookings.create');
    Route::post('bookings', [FlightBookingController::class, 'store'])->name('admin.bookings.store');
    Route::get('bookings/{booking}/edit', [FlightBookingController::class, 'edit'])->name('admin.bookings.edit');
    Route::put('bookings/{booking}', [FlightBookingController::class, 'update'])->name('admin.bookings.update');
    Route::delete('bookings/{booking}', [FlightBookingController::class, 'destroy'])->name('admin.bookings.destroy');

    // Optional: show booking details route
    Route::get('bookings/{booking}', [FlightBookingController::class, 'show'])->name('bookings.show');
})->middleware('admin');

require __DIR__.'/auth.php';
