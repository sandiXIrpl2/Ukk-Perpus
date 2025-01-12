<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DdcController;
use App\Http\Controllers\Admin\RakController;
use App\Http\Controllers\Admin\FormatController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\PustakaController;
use App\Http\Controllers\Admin\PenerbitController;
use App\Http\Controllers\Admin\PengarangController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\JenisAnggotaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['header' => 'Dashboard Admin']);
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    // Routes untuk Manajemen Rak
    Route::resource('rak', RakController::class);
    Route::resource('ddc', DdcController::class);
    Route::resource('format', FormatController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('pengarang', PengarangController::class);
    Route::resource('jenis_anggota', JenisAnggotaController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('pustaka', PustakaController::class);
    Route::resource('transaksi', TransaksiController::class);
});


require __DIR__.'/auth.php';
