<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SentenceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LearningHistoryController;

Route::get('/', function () {
    return view('welcome');
});
// Sentenceリソースに対するCRUDルートを一括で設定
Route::resource('sentences', SentenceController::class);
// Categoryリソースに対するCRUDルートを一括で設定
Route::resource('categories', CategoryController::class);
// 学習履歴
Route::resource('learning_histories', LearningHistoryController::class);
