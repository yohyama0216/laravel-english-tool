<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SentenceController;

Route::get('/', function () {
    return view('welcome');
});
// Sentenceリソースに対するCRUDルートを一括で設定
Route::resource('sentences', SentenceController::class);