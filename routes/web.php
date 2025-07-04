<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengujianController;

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
    return redirect()->route('siswa.index');
});

Route::get('/siswa', [PengujianController::class, 'index'])->name('siswa.index');

// Route untuk menampilkan form tambah data (Create)
Route::get('/siswa/create', [PengujianController::class, 'create'])->name('siswa.create');

// Route untuk menyimpan data baru (Create)
Route::post('/siswa', [PengujianController::class, 'store'])->name('siswa.store');

// Route untuk menampilkan form edit data (Update)
Route::get('/siswa/{siswa}/edit', [PengujianController::class, 'edit'])->name('siswa.edit');

// Route untuk memperbarui data (Update)
Route::put('/siswa/{siswa}', [PengujianController::class, 'update'])->name('siswa.update');

// Route untuk menghapus data (Delete)
Route::delete('/siswa/{siswa}', [PengujianController::class, 'destroy'])->name('siswa.destroy');