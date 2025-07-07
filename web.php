<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PemesananController;

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
    return view('welcome');
});

Route::get('/profil', function () {
    return view('profil');  
});

Route::get('/koneksi', function () {
    return view('koneksi');  
});

Route::get('/tampilkan_data', function () {
    return view('tampilkan_data');  
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

Route::get('/pendaftaran', function () {
    return view('pendaftaran');  
});

Route::resource('pemesanan', PemesananController::class);
 