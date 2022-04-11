<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.app');
// });



Auth::routes();

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('landing.page');
// Route::get('/', [App\Http\Controllers\WebController::class, 'donasi'])->name('donasi');
// Route::get('/', [App\Http\Controllers\WebController::class, 'about'])->name('about');

//ADMIN ACCESS
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('admin_level');

//RELAWAN ACCESS
Route::get('/relawan', [App\Http\Controllers\RelawanController::class, 'index'])->name('relawan.index')->middleware('relawan_level');
Route::get('/relawan/materi', [App\Http\Controllers\RelawanController::class, 'showMateri'])->name('relawan.show.materi')->middleware('relawan_level');
Route::get('/relawan/materi/tambah', [App\Http\Controllers\RelawanController::class, 'tambahMateri'])->name('relawan.tambah.materi')->middleware('relawan_level');
Route::post('/relawan/materi/store', [App\Http\Controllers\RelawanController::class, 'storeMateri'])->name('relawan.store.materi')->middleware('relawan_level');
Route::get('/relawan/materi/edit/{id}', [App\Http\Controllers\RelawanController::class, 'editMateri'])->name('relawan.edit.materi')->middleware('relawan_level');
Route::post('/relawan/materi/update/{id}', [App\Http\Controllers\RelawanController::class, 'updateMateri'])->name('relawan.update.materi')->middleware('relawan_level');
Route::get('/relawan/materi/delete/{id}', [App\Http\Controllers\RelawanController::class, 'deleteMateri'])->middleware('relawan_level');
Route::get('/relawan/materi/cari', [App\Http\Controllers\RelawanController::class, 'cariMateri'])->name('relawan.cari.materi')->middleware('relawan_level');

// Nyobain aja
Route::get('/coba', function () {
    return view('partials.footer');
});