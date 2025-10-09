<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutDescriptionController;
use App\Http\Controllers\AboutExcellenceController;
use App\Http\Controllers\AboutHistoryController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\RentalBookingController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\MountainController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TripController as AdminTripController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FeaturedServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PopularDestinationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicPostController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\PublicRentalController;
use App\Http\Controllers\PublicServiceController;
use App\Http\Controllers\PublicTripController;
use App\Models\DestinationImage;
use App\Models\FeaturedService;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/products', [PublicProductController::class, 'index'])->name('products');
Route::get('/services', [PublicServiceController::class, 'index'])->name('services');
Route::get('/posts', [PublicPostController::class, 'index'])->name('public-posts.index');
Route::get('/posts/{slug}', [PublicPostController::class, 'show'])->name('public-posts.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/banners', BannerController::class)->except(['show', 'create', 'edit']);
    Route::resource('/popular-destinations', PopularDestinationController::class)->except(['show', 'create', 'edit']);
    Route::patch('/popular-destinations/{id}/toggle-show', [PopularDestinationController::class, 'toggleShow'])
        ->name('popular-destinations.toggle-show');


    Route::resource('/description', AboutDescriptionController::class)->except(['show', 'create', 'edit', 'destroy']);
    Route::resource('/featured-services', FeaturedServiceController::class)->except(['index', 'show', 'create', 'edit']);
    Route::resource('/history', AboutHistoryController::class)->except(['show', 'create', 'edit', 'destroy']);
    Route::resource('/excellence', AboutExcellenceController::class)->except(['show', 'create', 'edit', 'destroy']);
    Route::resource('/destinations', DestinationController::class)->except(['show', 'create', 'edit']);
    Route::delete('destination-images/{image}', [DestinationController::class, 'deleteImage'])->name('destination-images.destroy');
    Route::post('/destinations-category', [DestinationController::class, 'addCategory'])->name('destination-category.store');

    Route::resource('trips', AdminTripController::class)->except(['show', 'create', 'edit']);
    Route::resource('products', EquipmentController::class)->except(['show', 'create', 'edit']);
    Route::resource('services', ServiceController::class)->except(['show', 'create', 'edit']);
    Route::resource('posts', PostController::class)->except(['show', 'create', 'edit']);
    Route::resource('contacts', ContactController::class)->except(['show', 'create', 'edit']);
    Route::put('information/{id}', [InformationController::class, 'update'])->name('information.update');

    Route::resource('bookings', AdminBookingController::class)->except(['show', 'create', 'edit']);
    Route::patch('bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.update-status');

    Route::resource('rental-bookings', RentalBookingController::class)->except(['show', 'create', 'edit']);
    Route::patch('rental-bookings/{rentalBooking}/status', [RentalBookingController::class, 'updateStatus'])->name('rental-bookings.update-status');
});
