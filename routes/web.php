<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('products', [\App\Http\Controllers\PublicController::class, 'index']);
Route::post('upload-product', [\App\Http\Controllers\PublicController::class, 'store'])->name('upload-product');
Route::put('update-product/{pid}', [\App\Http\Controllers\PublicController::class, 'edit']);

