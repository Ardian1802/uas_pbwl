<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/peserta', [App\Http\Controllers\PesertaController::class, 'index']);
Route::get('/peserta/create', [App\Http\Controllers\PesertaController::class, 'create']);
Route::post('/peserta', [App\Http\Controllers\PesertaController::class, 'store']);
Route::get('/peserta/edit/{id}', [App\Http\Controllers\PesertaController::class, 'edit']);
Route::patch('/peserta/{id}', [App\Http\Controllers\PesertaController::class, 'update']);
Route::delete('/peserta/{id}', [App\Http\Controllers\PesertaController::class, 'destroy']);
Route::get('/peserta/cari', [App\Http\Controllers\PesertaController::class, 'cari']);

Route::get('/kegiatan', [App\Http\Controllers\KegiatanController::class, 'index']);
Route::get('/kegiatan/create', [App\Http\Controllers\KegiatanController::class, 'create']);
Route::post('/kegiatan', [App\Http\Controllers\KegiatanController::class, 'store']);
Route::get('/kegiatan/edit/{id}', [App\Http\Controllers\KegiatanController::class, 'edit']);
Route::patch('/kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'update']);
Route::delete('/kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'destroy']);
Route::get('/kegiatan/cari', [App\Http\Controllers\KegiatanController::class, 'cari']);

Route::get('/evaluasi', [App\Http\Controllers\EvaluasiController::class, 'index']);
Route::get('/evaluasi/create', [App\Http\Controllers\EvaluasiController::class, 'create']);
Route::post('/evaluasi', [App\Http\Controllers\EvaluasiController::class, 'store']);
Route::get('/evaluasi/edit/{id}', [App\Http\Controllers\EvaluasiController::class, 'edit']);
Route::patch('/evaluasi/{id}', [App\Http\Controllers\EvaluasiController::class, 'update']);
Route::delete('/evaluasi/{id}', [App\Http\Controllers\EvaluasiController::class, 'destroy']);
Route::get('/evaluasi/cari', [App\Http\Controllers\EvaluasiController::class, 'cari']);