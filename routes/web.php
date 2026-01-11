<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoomManagementController;
use App\Http\Controllers\FacilityManagementController;
use App\Http\Controllers\FrequentlyAskedQuestionController;
use App\Http\Controllers\PrincipleController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermsConditionController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WhyChooseUsController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/detail/{slug}', [RoomController::class, 'show'])->name('rooms.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/terms-and-conditions', [TermsConditionController::class, 'show'])->name('terms.show');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])->name('privacy.show');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.customer.store');
Route::post('/messages', [ContactMessageController::class, 'store'])->name('messages.customer.store');

Route::middleware('check.auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update', 'update')->name('update');
    });
    Route::controller(ContactController::class)->prefix('contact')->name('contact.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update', 'update')->name('update');
    });

    Route::controller(RoomManagementController::class)->prefix('rooms')->name('rooms.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::resource('facilities', FacilityManagementController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('messages', ContactMessageController::class);
    Route::resource('faq', FrequentlyAskedQuestionController::class);
    Route::resource('principle', PrincipleController::class);
    Route::resource('privacy', PrivacyPolicyController::class);
    Route::resource('terms', TermsConditionController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('why', WhyChooseUsController::class);
});
