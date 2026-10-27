<?php

use App\Http\Controllers\PrediksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/prediksi', [PrediksiController::class, 'index'])->name('prediksi');

Route::post('/hasil-prediksi', [PrediksiController::class, 'prosesData'])->name('hasil-prediksi');

Route::get('/riwayat', [PrediksiController::class, 'riwayat'])->name('riwayat');
