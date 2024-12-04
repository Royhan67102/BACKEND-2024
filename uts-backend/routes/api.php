<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/news', [BeritaController::class, 'index']);
Route::post('/news', [BeritaController::class, 'store']);
Route::get('/news/{id}', [BeritaController::class, 'show']);
Route::put('/news/{id}', [BeritaController::class, 'update']);
Route::delete('/news/{id}', [BeritaController::class, 'destroy']);

Route::get('/news/category/{category}', [BeritaController::class, 'getByCategory']);
