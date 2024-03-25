<?php

use App\Http\Controllers\mainController;
use App\Http\Controllers\RoutineController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/',[mainController::class,'index']);
Route::get('/register',[mainController::class,'register_form']);
Route::post('/register',[mainController::class,'register']);
Route::get('/login',[mainController::class,'login_form']);
Route::post('/login',[mainController::class,'login']);
Route::get('/dashboard',[mainController::class,'dashboard']);
Route::get('/logout',[mainController::class,'logout']);

//Routine Routes
Route::get('/admin/details',[RoutineController::class,'details']);
Route::post('/admin/details',[RoutineController::class,'details_save']);