<?php

use App\Http\Controllers\HieuTruongController;
use App\Http\Controllers\TruongKhoaController;
use App\Http\Controllers\VienChucController;
use Illuminate\Support\Facades\Route;

Route::get('/vienchuc',[VienChucController::class, 'index']);





Route::get('/truongkhoa',[TruongKhoaController::class, 'index']);





Route::get('/hieutruong',[HieuTruongController::class, 'index']);











