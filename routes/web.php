<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;


Route::get('/', function () {
    return view('home', [
        'name' => 'valen',
        'role' => 'manajemen',
        'buah' => ['pisang', 'apel', 'jeruk', 'semangka', 'kiwi']
    ]);
});

Route::get('/about', function() {
    return view('about');
});


// Rute untuk menyimpan data mahasiswa
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');

// Rute untuk mengambil data mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

// Rute untuk mengedit data mahasiswa
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

// Rute untuk menghapus data mahasiswa
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

Route::get('/mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');
