<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/index', function() {
//     return view('admin.index');
// });

// Route::get('/admin', [adminController::class,'index']);
Route::get('/admin', [TodoController::class, 'tampilkantodo']);
Route::get('/admin/{id}', [TodoController::class, 'detailtugas']);
Route::get('/admin/hapustodos/{id}', [TodoController::class, 'hapustodos']);
Route::get('/TambahTugas', [TodoController::class, 'tambahtugas']);
Route::post('/simpantugas', [TodoController::class, 'simpantugas']);
Route::get('/admin/edittugas/{id}', [TodoController::class, 'edittugas']);
Route::post('/simpanedit/{id}', [TodoController::class, 'simpanedit']);


// Route::get('/admin/create', [adminController::class,'create']);