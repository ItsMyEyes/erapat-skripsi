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

Route::get('/', function () {
    $about = \App\Models\about::first();
    return view('welcome', compact('about'));
});

Auth::routes();
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class,'logout']);

// Route user
Route::resource('users', \App\Http\Controllers\UserController::class);

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route Ruangan
    Route::resource('ruangans', \App\Http\Controllers\RuanganController::class);

    // Create rapat
    Route::resource('agendas', \App\Http\Controllers\ListRapatController::class);
    Route::post('agendas/filter', [\App\Http\Controllers\ListRapatController::class, 'filterDate']);
    Route::get('agendas/{id}/selesaikan', [\App\Http\Controllers\HasilRapatController::class, 'selesai']);
    Route::post('agendas/{id}/selesaikan', [\App\Http\Controllers\HasilRapatController::class, 'selesaikan']);
    Route::get('agendas/{id}/detail', [\App\Http\Controllers\HasilRapatController::class, 'index']);
    Route::get('agendas/{id}/presensi', [\App\Http\Controllers\HasilRapatController::class, 'presensi']);

    Route::get('hasil', [\App\Http\Controllers\HasilRapatController::class, 'fetchAll']);
    Route::post('hasil', [\App\Http\Controllers\HasilRapatController::class, 'filterDate']);
    Route::resource('/abouts', \App\Http\Controllers\AboutController::class);
});

// Route peserta
Route::get('/hasils',[\App\Http\Controllers\PesertaController::class, 'hasilRapat']);
Route::get('/peserta',[\App\Http\Controllers\PesertaController::class, 'index']);
Route::get('/detail/{id}/rapat',[\App\Http\Controllers\PesertaController::class, 'detail']);
Route::post('/absen/{id}/rapat',[\App\Http\Controllers\PesertaController::class, 'hadir']);
Route::get('/notulen/{id}/rapat',[\App\Http\Controllers\PesertaController::class, 'notulen']);
Route::get('/cetak/{id}/rapat',[\App\Http\Controllers\PesertaController::class, 'cetak']);
