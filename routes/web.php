<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VienChucController;
use Illuminate\Support\Facades\Route;

Route::get('/vienchuc',[VienChucController::class, 'index']);









Route::get('/admin',[AdminController::class, 'index']);











