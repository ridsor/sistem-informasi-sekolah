<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LaporanController;

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

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/dashboard/siswa', SiswaController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/kelas', KelasController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/jurusan', JurusanController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/laporan', LaporanController::class)->middleware('auth');
Route::get('/dashboard/laporan/cetak/{nilai}', [LaporanController::class, 'cetak']);
Route::get('/dashboard/jurusan/create-slug', [JurusanController::class, 'createSlug'])->middleware('auth');
