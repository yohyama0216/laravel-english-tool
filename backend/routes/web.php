<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SentenceController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});
// Sentenceリソースに対するCRUDルートを一括で設定
Route::resource('sentences', SentenceController::class);
// Categoryリソースに対するCRUDルートを一括で設定
Route::resource('categories', CategoryController::class);