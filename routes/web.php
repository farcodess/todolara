<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/index', function() {
//     return view('pengguna.index');
// });

// Route::get('/pengguna', [PenggunaController::class,'index']);
Route::get('/pengguna', [TodoController::class, 'tampilkantodo']);
Route::get('/pengguna/{id}', [TodoController::class, 'detailtugas']);
Route::get('/pengguna/hapustodos/{id}', [TodoController::class, 'hapustodos']);
Route::get('/TambahTugas', [TodoController::class, 'tambahtugas']);
Route::post('/simpantugas', [TodoController::class, 'simpantugas']);
// Route::get('/pengguna/create', [PenggunaController::class,'create']);