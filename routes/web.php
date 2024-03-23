<?php

use App\Http\Controllers\mainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[mainController::class,'index']);
Route::get('/register',[mainController::class,'register_form']);
// Route::get('/',[mainController::class,'index']);