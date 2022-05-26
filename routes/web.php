<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;

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

// ADMIN ACCESS
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('admin_level');
Route::get('/admin/testimoni', [App\Http\Controllers\AdminController::class, 'showTestimoni'])->name('admin.show.testimoni')->middleware('admin_level'); 
Route::post('/admin/testimoni/store', [App\Http\Controllers\AdminController::class, 'storeTestimoni'])->name('admin.store.testimoni')->middleware('admin_level');
Route::post('/admin/testimoni/update/{id}', [App\Http\Controllers\AdminController::class, 'updateTestimoni'])->middleware('admin_level');
Route::get('/admin/testimoni/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteTestimoni'])->middleware('admin_level');
Route::get('/admin/testimoni/cari', [App\Http\Controllers\AdminController::class, 'cariTestimoni'])->name('admin.cari.testimoni')->middleware('admin_level');

//RELAWAN ACCESS
Route::get('/relawan', [App\Http\Controllers\RelawanController::class, 'index'])->name('relawan.index')->middleware('relawan_level');
Route::get('/relawan/materi', [App\Http\Controllers\RelawanController::class, 'showMateri'])->name('relawan.show.materi')->middleware('relawan_level');
Route::get('/relawan/materi/tambah', [App\Http\Controllers\RelawanController::class, 'tambahMateri'])->name('relawan.tambah.materi')->middleware('relawan_level');
Route::post('/relawan/materi/store', [App\Http\Controllers\RelawanController::class, 'storeMateri'])->name('relawan.store.materi')->middleware('relawan_level');
Route::get('/relawan/materi/edit/{id}', [App\Http\Controllers\RelawanController::class, 'editMateri'])->name('relawan.edit.materi')->middleware('relawan_level');
Route::post('/relawan/materi/update/{id}', [App\Http\Controllers\RelawanController::class, 'updateMateri'])->name('relawan.update.materi')->middleware('relawan_level');
Route::get('/relawan/materi/delete/{id}', [App\Http\Controllers\RelawanController::class, 'deleteMateri'])->middleware('relawan_level');
Route::get('/relawan/materi/cari', [App\Http\Controllers\RelawanController::class, 'cariMateri'])->name('relawan.cari.materi')->middleware('relawan_level');
Route::get('/relawan/mendaftar', [App\Http\Controllers\RelawanController::class, 'showRequest'])->name('relawan.pendaftaran_relawan');
Route::post('/relawan/mendaftar', [App\Http\Controllers\RelawanController::class, 'store_pendaftaran_relawan'])->name('relawan.pendaftaran_relawan.store');

// Route Donasi
Route::post('/donasi/create', [App\Http\Controllers\DonasiController::class, 'store'])->name('donasi.store');
Route::get('/donasi/create', [App\Http\Controllers\DonasiController::class, 'create'])->name('donasi.create');

// Route GUEST
Route::post('/request-volunteer', [App\Http\Controllers\GuestController::class, 'store'])->name('request_volunteer.store');
Route::get('/request-volunteer', [App\Http\Controllers\GuestController::class, 'create_request'])->name('request_volunteer.create');
// Google Auth
Route::get('redirect', [App\Http\Controllers\SocialController::class, 'redirect']);
Route::get('callback/google', [App\Http\Controllers\SocialController::class, 'callback']);
