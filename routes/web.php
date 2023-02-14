<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VienChucController;


Route::get('/login',[HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'home']);




Route::post('/login',[VienChucController::class, 'login']);
Route::get('/logout',[VienChucController::class, 'logout']);





