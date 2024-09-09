<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SentenceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LearningHistoryController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\GradingController;

Route::get('/', function () {
    return view('welcome');
});
// Sentenceリソースに対するCRUDルートを一括で設定
Route::resource('sentences', SentenceController::class);
// Categoryリソースに対するCRUDルートを一括で設定
Route::resource('categories', CategoryController::class);
// 学習履歴
Route::resource('learning_histories', LearningHistoryController::class);
// 学習
Route::get('/learning', [LearningController::class, 'show'])->name('learning.show');
Route::post('/learning', [LearningController::class, 'check'])->name('learning.check');

Route::post('/grading/check', [GradingController::class, 'checkSentence']);
