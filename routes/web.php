<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VienChucController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\DanTocController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\NgachController;
use App\Http\Controllers\BacController;


Route::get('/login',[HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'home']);




Route::post('/login',[VienChucController::class, 'login']);
Route::get('/logout',[VienChucController::class, 'logout']);
Route::get('/vienchuc_khoa/{ma_k}',[VienChucController::class, 'vienchuc_khoa']);
Route::post('/admin_add_vienchuc_khoa/{ma_k}',[VienChucController::class, 'admin_add_vienchuc_khoa']);
Route::get('/admin_select_vienchuc_khoa/{ma_k}/{ma_vc}',[VienChucController::class, 'admin_select_vienchuc_khoa']);
Route::get('/admin_edit_vienchuc_khoa/{ma_k}/{ma_vc}',[VienChucController::class, 'admin_edit_vienchuc_khoa']);
Route::post('/admin_update_vienchuc_khoa/{ma_k}/{ma_vc}',[VienChucController::class, 'admin_update_vienchuc_khoa']);
Route::get('/admin_delete_vienchuc_khoa/{ma_k}/{ma_vc}',[VienChucController::class, 'admin_delete_vienchuc_khoa']);
Route::get('/admin_deleteall_vienchuc_khoa/{ma_k}',[VienChucController::class, 'admin_deleteall_vienchuc_khoa']);
Route::get('/quanly_vienchuc_khoa',[VienChucController::class, 'quanly_vienchuc_khoa']);
Route::post('/update_khoa_vc',[VienChucController::class, 'update_khoa_vc']);
Route::get('/admin_select_vienchuc/{ma_vc}',[VienChucController::class, 'admin_select_vienchuc']);
Route::get('/admin_delete_vienchuc/{ma_vc}',[VienChucController::class, 'admin_delete_vienchuc']);
Route::get('/search_vienchuc_khoa/{ma_k}',[VienChucController::class, 'search_vienchuc_khoa']);




Route::get('/quanly_quyen',[QuyenController::class, 'quanly_quyen']);
Route::post('/add_quyen',[QuyenController::class, 'add_quyen']);
Route::get('/select_quyen/{ma_q}',[QuyenController::class, 'select_quyen']);
Route::get('/edit_quyen/{ma_q}',[QuyenController::class, 'edit_quyen']);
Route::post('/update_quyen/{ma_q}',[QuyenController::class, 'update_quyen']);
Route::get('/delete_quyen/{ma_q}',[QuyenController::class, 'delete_quyen']);
Route::get('/delete_all_quyen',[QuyenController::class, 'delete_all_quyen']);



Route::get('/phanquyen',[PhanQuyenController::class, 'phanquyen']);
Route::post('/phanquyen_vc',[PhanQuyenController::class, 'phanquyen_vc']);
Route::get('/lammoi_quyen/{ma_vc}',[PhanQuyenController::class, 'lammoi_quyen']);



Route::get('/quanly_khoa',[KhoaController::class, 'quanly_khoa']);
Route::post('/add_khoa',[KhoaController::class, 'add_khoa']);
Route::get('/select_khoa/{ma_k}',[KhoaController::class, 'select_khoa']);
Route::get('/edit_khoa/{ma_k}',[KhoaController::class, 'edit_khoa']);
Route::post('/update_khoa/{ma_k}',[KhoaController::class, 'update_khoa']);
Route::get('/delete_khoa/{ma_k}',[KhoaController::class, 'delete_khoa']);
Route::get('/delete_all_khoa',[KhoaController::class, 'delete_all_khoa']);



Route::get('/dantoc',[DanTocController::class, 'dantoc']);
Route::post('/add_dantoc',[DanTocController::class, 'add_dantoc']);
Route::get('/select_dantoc/{ma_dt}',[DanTocController::class, 'select_dantoc']);
Route::get('/edit_dantoc/{ma_dt}',[DanTocController::class, 'edit_dantoc']);
Route::post('/update_dantoc/{ma_dt}',[DanTocController::class, 'update_dantoc']);
Route::get('/delete_dantoc/{ma_dt}',[DanTocController::class, 'delete_dantoc']);
Route::get('/delete_all_dantoc',[DanTocController::class, 'delete_all_dantoc']);



Route::get('/chucvu',[ChucVuController::class, 'chucvu']);
Route::post('/add_chucvu',[ChucVuController::class, 'add_chucvu']);
Route::get('/select_chucvu/{ma_cv}',[ChucVuController::class, 'select_chucvu']);
Route::get('/edit_chucvu/{ma_cv}',[ChucVuController::class, 'edit_chucvu']);
Route::post('/update_chucvu/{ma_cv}',[ChucVuController::class, 'update_chucvu']);
Route::get('/delete_chucvu/{ma_cv}',[ChucVuController::class, 'delete_chucvu']);
Route::get('/delete_all_chucvu',[ChucVuController::class, 'delete_all_chucvu']);




Route::get('/ngach',[NgachController::class, 'ngach']);
Route::post('/add_ngach',[NgachController::class, 'add_ngach']);
Route::get('/select_ngach/{ma_n}',[NgachController::class, 'select_ngach']);
Route::get('/edit_ngach/{ma_n}',[NgachController::class, 'edit_ngach']);
Route::post('/update_ngach/{ma_n}',[NgachController::class, 'update_ngach']);
Route::get('/delete_ngach/{ma_n}',[NgachController::class, 'delete_ngach']);
Route::get('/delete_all_ngach',[NgachController::class, 'delete_all_ngach']);





Route::get('/bac_ngach/{ma_n}',[BacController::class, 'bac_ngach']);
Route::post('/add_bac_ngach/{ma_n}',[BacController::class, 'add_bac_ngach']);
Route::get('/select_bac_ngach/{ma_n}/{ma_b}',[BacController::class, 'select_bac_ngach']);
Route::get('/edit_bac_ngach/{ma_n}/{ma_b}',[BacController::class, 'edit_bac_ngach']);
Route::post('/update_bac_ngach/{ma_n}/{ma_b}',[BacController::class, 'update_bac_ngach']);









