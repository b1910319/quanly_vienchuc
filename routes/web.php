<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VienChucController;
use App\Http\Controllers\QuyenController;



Route::get('/login',[HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'home']);




Route::post('/login',[VienChucController::class, 'login']);
Route::get('/logout',[VienChucController::class, 'logout']);


Route::get('/quanly_quyen',[QuyenController::class, 'quanly_quyen']);
Route::post('/add_quyen',[QuyenController::class, 'add_quyen']);
Route::get('/select_quyen/{ma_q}',[QuyenController::class, 'select_quyen']);
Route::get('/edit_quyen/{ma_q}',[QuyenController::class, 'edit_quyen']);
Route::post('/update_quyen/{ma_q}',[QuyenController::class, 'update_quyen']);
Route::get('/delete_quyen/{ma_q}',[QuyenController::class, 'delete_quyen']);
Route::get('/delete_all_quyen',[QuyenController::class, 'delete_all_quyen']);













