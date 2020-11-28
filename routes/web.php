<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('cvs.index');
Route::get('/cvs', [HomeController::class, 'index']);
Route::post('/cvs', [CvController::class, 'store']);
Route::get('/cvs/create', [CvController::class, 'create']);
Route::get('/cvs/{cv}', [CvController::class, 'show'])->name('cvs.show');
Route::put('/cvs/{cv}', [CvController::class, 'update']);
Route::post('/cvs/{cv}', [CvController::class, 'destroy']);
Route::get('/cvs/{cv}/edit', [CvController::class, 'edit']);
