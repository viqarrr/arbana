<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\RentalBookingController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\MountainController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TripController as AdminTripController;
use App\Http\Controllers\PublicRentalController;
use App\Http\Controllers\PublicTripController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/trips', function () {
    return view('trips');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/news', function () {
    return view('news');
});
Route::get('/detail-news', function () {
    return view('detail-news');
});

Route::get('/trips', [PublicTripController::class, 'index'])->name('trips.index');
Route::get('/trips/{trip:slug}', [PublicTripController::class, 'show'])->name('trips.show');
Route::post('/trips/book', [PublicTripController::class, 'book'])->name('trips.book');

Route::get('/products', [PublicRentalController::class, 'index'])->name('rentals.index');
Route::get('/products/{equipment}', [PublicRentalController::class, 'show'])->name('rentals.show');
Route::post('/products/calculate-price', [PublicRentalController::class, 'calculatePrice'])->name('rentals.calculate-price');
Route::post('/products/book', [PublicRentalController::class, 'book'])->name('rentals.book');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('dashboard')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/mountains', MountainController::class);
    Route::delete('mountain-images/{image}', [MountainController::class, 'deleteImage'])->name('mountain-images.destroy');

    Route::resource('trips', AdminTripController::class);
    Route::resource('equipment', EquipmentController::class);
    Route::resource('services', ServiceController::class);

    Route::resource('bookings', AdminBookingController::class);
    Route::patch('bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.update-status');

    Route::resource('rental-bookings', RentalBookingController::class);
    Route::patch('rental-bookings/{rentalBooking}/status', [RentalBookingController::class, 'updateStatus'])->name('rental-bookings.update-status');
});
