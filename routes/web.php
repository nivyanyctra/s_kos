<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Ini adalah file utama untuk semua route aplikasi.
| Semua route admin dilindungi oleh middleware auth.
*/

// 🔹 Halaman utama (landing page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// 🔹 Autentikasi
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])
    ->name('login.post')
    ->middleware('guest');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])
    ->name('register.post')
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// 🔹 Grup route admin
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // 🔹 Manajemen Pengaturan Kos (Setting)
    Route::controller(SettingController::class)
        ->prefix('settings')
        ->name('settings.')
        ->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::put('/update', 'update')->name('update');
        });

    // 🔹 Manajemen Kamar
    Route::controller(RoomController::class)
        ->prefix('rooms')
        ->name('rooms.')
        ->group(function () {

            Route::get('/', 'index')->name('index');           // daftar kamar
            Route::get('/create', 'create')->name('create');   // ⬅️ DITAMBAHKAN
            Route::post('/', 'store')->name('store');          // simpan kamar
            Route::get('/{id}/edit', 'edit')->name('edit');    // edit kamar
            Route::put('/{id}', 'update')->name('update');     // update kamar
            Route::delete('/{id}', 'destroy')->name('destroy');// hapus kamar
        });

    // 🔹 Manajemen Fasilitas
    Route::resource('facilities', FacilityManagementController::class);
});