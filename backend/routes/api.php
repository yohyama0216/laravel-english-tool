<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradingController;

Route::post('/grading/check', [GradingController::class, 'checkSentence']);
