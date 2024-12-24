<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



use App\Http\Controllers\GuruController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\MasterOfMaster;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\ReportController;

// Halaman utama
Route::get('/', function () {
    return view('home'); // Ganti 'home' dengan nama view utama Anda
})->name('home');





Route::get('/guru-summary', [MasterOfMaster::class, 'index'])->name('gurusummary.index');
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/{guru_id}', [ReportController::class, 'detail'])->name('report.detail');


Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
Route::get('/guru/search', [GuruController::class, 'search'])->name('guru.search');

Route::get('/mata_pelajaran', [MataPelajaranController::class, 'index'])->name('mata_pelajaran.index');
Route::get('/mata_pelajaran/create', [MataPelajaranController::class, 'create'])->name('mata_pelajaran.create');
Route::post('/mata_pelajaran', [MataPelajaranController::class, 'store'])->name('mata_pelajaran.store');
Route::get('/mata_pelajaran/{id}/edit', [MataPelajaranController::class, 'edit'])->name('mata_pelajaran.edit');
Route::put('/mata_pelajaran/{id}', [MataPelajaranController::class, 'update'])->name('mata_pelajaran.update');
Route::delete('/mata_pelajaran', [MataPelajaranController::class, 'destroy'])->name('mata_pelajaran.destroy');

use App\Http\Controllers\AbsenController;

Route::delete('/absen/destroy-all', [AbsenController::class, 'destroyAll'])->name('absen.destroyAll');


Route::get('/absensi', [AbsenController::class, 'index'])->name('absen.index');
Route::get('/absensi/create', [AbsenController::class, 'create'])->name('absen.create');
Route::post('/absensi', [AbsenController::class, 'store'])->name('absen.store');
Route::get('/absensi/{id}/edit', [AbsenController::class, 'edit'])->name('absen.edit');
Route::put('/absensi/{id}', [AbsenController::class, 'update'])->name('absen.update');
Route::delete('/absensi/{id}', [AbsenController::class, 'destroy'])->name('absen.destroy');

Route::get('/murid', [MuridController::class, 'index'])->name('murid.index');
Route::get('/murid/create', [MuridController::class, 'create'])->name('murid.create');
Route::post('/murid', [MuridController::class, 'store'])->name('murid.store');
Route::get('/murid/{id}/edit', [MuridController::class, 'edit'])->name('murid.edit');
Route::put('/murid/{id}', [MuridController::class, 'update'])->name('murid.update');
Route::delete('/murid/{id}', [MuridController::class, 'destroy'])->name('murid.destroy');


Route::get('/gaji', [GajiController::class, 'index'])->name('gaji.index');
Route::get('/gaji/create', [GajiController::class, 'create'])->name('gaji.create');
Route::post('/gaji', [GajiController::class, 'store'])->name('gaji.store');
Route::get('/gaji/{id}/edit', [GajiController::class, 'edit'])->name('gaji.edit');
Route::put('/gaji/{id}', [GajiController::class, 'update'])->name('gaji.update');
Route::delete('/gaji/{id}', [GajiController::class, 'destroy'])->name('gaji.destroy');

Route::get('/report2', [ReportController::class, 'filter'])->name('report.filter');

