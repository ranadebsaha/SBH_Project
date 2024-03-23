<?php

use App\Http\Controllers\mainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[mainController::class,'index']);
Route::get('/register',[mainController::class,'register_form']);
Route::post('/register',[mainController::class,'register']);
Route::get('/login',[mainController::class,'login_form']);
Route::post('/login',[mainController::class,'login']);
// Route::get('/dashboard',[mainController::class,'']);