<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/news', [BeritaController::class, 'index']);         // Mendapatkan semua berita
Route::post('/news', [BeritaController::class, 'store']);        // Menambahkan berita baru
Route::get('/news/{id}', [BeritaController::class, 'show']);     // Mendapatkan detail berita berdasarkan ID
Route::put('/news/{id}', [BeritaController::class, 'update']);   // Mengedit berita berdasarkan ID
Route::delete('/news/{id}', [BeritaController::class, 'destroy']); // Menghapus berita berdasarkan ID
Route::get('/news/category/sport', [BeritaController::class, 'index']);
Route::get('/news/category/finance', [BeritaController::class, 'index']);
Route::get('/news/category/automotive', [BeritaController::class, 'index']);
