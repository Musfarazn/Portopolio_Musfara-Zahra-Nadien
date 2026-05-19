<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RuleController;

Route::get('/', function () {
    return redirect()->route('login');
});

// 🔹 Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 🔹 Hanya bisa diakses user yang login
Route::middleware('auth')->group(function () {

    // 🔸 User
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
    Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
    Route::post('/diagnosa', [DiagnosaController::class, 'store'])->name('diagnosa.store');
    Route::get('/diagnosa/hasil/{id}', [DiagnosaController::class, 'hasil'])->name('diagnosa.hasil');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::delete('/riwayat/{id}', [RiwayatController::class, 'destroy'])->name('riwayat.destroy');

    // 🔸 Admin Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    // 🔸 CRUD Gejala
    Route::get('/admin/gejala', [AdminController::class, 'gejala'])->name('admin.gejala');
    Route::post('/admin/gejala', [AdminController::class, 'storeGejala'])->name('admin.store_gejala');
    Route::get('/admin/gejala/{id}/edit', [AdminController::class, 'editGejala'])->name('admin.edit_gejala');
    Route::put('/admin/gejala/{id}', [AdminController::class, 'updateGejala'])->name('admin.update_gejala');
    Route::delete('/admin/gejala/{id}', [AdminController::class, 'deleteGejala'])->name('admin.delete_gejala');

    // 🔸 Riwayat Admin (gunakan method khusus di AdminController)
    Route::get('/admin/riwayat', [AdminController::class, 'riwayat'])->name('admin.riwayat');
    Route::delete('/admin/riwayat/{id}', [AdminController::class, 'destroyRiwayat'])->name('admin.riwayat.destroy');

    // 🔸 Rules (DIPERBAIKI URUTANNYA 🔥)
    Route::prefix('admin')->name('admin.')->group(function () {

        // Taruh di atas agar tidak bentrok dengan {rule}
        Route::post('rules/import', [RuleController::class, 'import'])->name('rules.import');
        Route::delete('rules/destroy-multiple', [RuleController::class, 'destroyMultiple'])->name('rules.destroyMultiple');

        // Baru resource-nya di bawah
        Route::resource('rules', RuleController::class);
    });
});
