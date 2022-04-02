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

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('admin_level');
Route::get('/relawan', [App\Http\Controllers\RelawanController::class, 'index'])->name('relawan.index')->middleware('relawan_level');

// Route Donasi
Route::post('/donasi/create', [App\Http\Controllers\DonasiController::class, 'store'])->name('donasi.store');
Route::get('/donasi/create', [App\Http\Controllers\DonasiController::class, 'create'])->name('donasi.create');