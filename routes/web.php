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
use App\Http\Controllers\TonGiaoController;
use App\Http\Controllers\ThuongBinhController;
use App\Http\Controllers\GiaDinhController;
use App\Http\Controllers\LoaiBangCapController;
use App\Http\Controllers\HeDaoTaoController;
use App\Http\Controllers\BangCapController;
use App\Http\Controllers\NghiHuuController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\LoaiKhenThuongController;
use App\Http\Controllers\HinhThucKhenThuongController;
use App\Http\Controllers\KhenThuongController;
use App\Http\Controllers\KyLuatController;
use App\Http\Controllers\LoaiKyLuatController;

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
Route::get('/thongtin_vienchuc_add',[VienChucController::class, 'thongtin_vienchuc_add']);
Route::get('/thongtin_vienchuc_edit/{ma_vc}',[VienChucController::class, 'thongtin_vienchuc_edit']);
Route::get('/change_tinh',[VienChucController::class, 'change_tinh']);
Route::get('/change_huyen',[VienChucController::class, 'change_huyen']);
Route::post('/update_thongtin_vienchuc/{ma_vc}',[VienChucController::class, 'update_thongtin_vienchuc']);
Route::get('/danhsach_thongtin_vienchuc',[VienChucController::class, 'danhsach_thongtin_vienchuc']);
Route::get('/search_danhsach_thongtin_vienchuc_khoa/{ma_k}',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_khoa']);
Route::post('/search_danhsach_thongtin_vienchuc_quequan',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_quequan']);
Route::get('/search_danhsach_thongtin_vienchuc_dantoc/{ma_dt}',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_dantoc']);
Route::post('/search_danhsach_thongtin_vienchuc_ngaysinh',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_ngaysinh']);
Route::get('/search_danhsach_thongtin_vienchuc_tongiao/{ma_tg}',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_tongiao']);
Route::get('/search_danhsach_thongtin_vienchuc_gioitinh/{gt}',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_gioitinh']);
Route::post('/search_danhsach_thongtin_vienchuc_ngach',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_ngach']);
Route::get('/search_danhsach_thongtin_vienchuc_thuongbinh/{ma_tb}',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_thuongbinh']);
Route::post('/search_danhsach_thongtin_vienchuc_ngaybatdaulamviec',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_ngaybatdaulamviec']);
Route::get('/search_danhsach_thongtin_vienchuc_hedaotao/{ma_hdt}',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_hedaotao']);
Route::get('/search_danhsach_thongtin_vienchuc_loiabangcap/{ma_hdt}',[VienChucController::class, 'search_danhsach_thongtin_vienchuc_loiabangcap']);





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
Route::get('/delete_bac_ngach/{ma_n}/{ma_b}',[BacController::class, 'delete_bac_ngach']);
Route::get('/delete_all_bac_ngach/{ma_n}',[BacController::class, 'delete_all_bac_ngach']);

Route::get('/bac',[BacController::class, 'bac']);
Route::post('/add_bac',[BacController::class, 'add_bac']);
Route::get('/select_bac/{ma_b}',[BacController::class, 'select_bac']);
Route::get('/edit_bac/{ma_b}',[BacController::class, 'edit_bac']);
Route::post('/update_bac/{ma_b}',[BacController::class, 'update_bac']);
Route::get('/delete_bac/{ma_b}',[BacController::class, 'delete_bac']);
Route::get('/delete_all_bac',[BacController::class, 'delete_all_bac']);
Route::get('/change_ngach',[BacController::class, 'change_ngach']);

Route::get('/nangbac',[BacController::class, 'nangbac']);
Route::post('/updated_nangbac',[BacController::class, 'updated_nangbac']);





Route::get('/tongiao',[TonGiaoController::class, 'tongiao']);
Route::post('/add_tongiao',[TonGiaoController::class, 'add_tongiao']);
Route::get('/select_tongiao/{ma_tg}',[TonGiaoController::class, 'select_tongiao']);
Route::get('/edit_tongiao/{ma_tg}',[TonGiaoController::class, 'edit_tongiao']);
Route::post('/update_tongiao/{ma_tg}',[TonGiaoController::class, 'update_tongiao']);
Route::get('/delete_tongiao/{ma_tg}',[TonGiaoController::class, 'delete_tongiao']);
Route::get('/delete_all_tongiao',[TonGiaoController::class, 'delete_all_tongiao']);




Route::get('/thuongbinh',[ThuongBinhController::class, 'thuongbinh']);
Route::post('/add_thuongbinh',[ThuongBinhController::class, 'add_thuongbinh']);
Route::get('/select_thuongbinh/{ma_tb}',[ThuongBinhController::class, 'select_thuongbinh']);
Route::get('/edit_thuongbinh/{ma_tb}',[ThuongBinhController::class, 'edit_thuongbinh']);
Route::post('/update_thuongbinh/{ma_tb}',[ThuongBinhController::class, 'update_thuongbinh']);
Route::get('/delete_thuongbinh/{ma_tb}',[ThuongBinhController::class, 'delete_thuongbinh']);
Route::get('/delete_all_thuongbinh',[ThuongBinhController::class, 'delete_all_thuongbinh']);





Route::get('/giadinh/{ma_vc}',[GiaDinhController::class, 'giadinh']);
Route::post('/add_giadinh/{ma_vc}',[GiaDinhController::class, 'add_giadinh']);
Route::get('/select_giadinh/{ma_gd}',[GiaDinhController::class, 'select_giadinh']);
Route::get('/edit_giadinh/{ma_gd}',[GiaDinhController::class, 'edit_giadinh']);
Route::post('/update_giadinh/{ma_gd}/{ma_vc}',[GiaDinhController::class, 'update_giadinh']);
Route::get('/delete_giadinh/{ma_gd}/{ma_vc}',[GiaDinhController::class, 'delete_giadinh']);
Route::get('/delete_all_giadinh/{ma_vc}',[GiaDinhController::class, 'delete_all_giadinh']);





Route::get('/loaibangcap',[LoaiBangCapController::class, 'loaibangcap']);
Route::post('/add_loaibangcap',[LoaiBangCapController::class, 'add_loaibangcap']);
Route::get('/select_loaibangcap/{ma_lbc}',[LoaiBangCapController::class, 'select_loaibangcap']);
Route::get('/edit_loaibangcap/{ma_lbc}',[LoaiBangCapController::class, 'edit_loaibangcap']);
Route::post('/update_loaibangcap/{ma_lbc}',[LoaiBangCapController::class, 'update_loaibangcap']);
Route::get('/delete_loaibangcap/{ma_lbc}',[LoaiBangCapController::class, 'delete_loaibangcap']);
Route::get('/delete_all_loaibangcap',[LoaiBangCapController::class, 'delete_all_loaibangcap']);




Route::get('/hedaotao',[HeDaoTaoController::class, 'hedaotao']);
Route::post('/add_hedaotao',[HeDaoTaoController::class, 'add_hedaotao']);
Route::get('/select_hedaotao/{ma_hdt}',[HeDaoTaoController::class, 'select_hedaotao']);
Route::get('/edit_hedaotao/{ma_hdt}',[HeDaoTaoController::class, 'edit_hedaotao']);
Route::post('/update_hedaotao/{ma_hdt}',[HeDaoTaoController::class, 'update_hedaotao']);
Route::get('/delete_hedaotao/{ma_hdt}',[HeDaoTaoController::class, 'delete_hedaotao']);
Route::get('/delete_all_hedaotao',[HeDaoTaoController::class, 'delete_all_hedaotao']);





Route::get('/bangcap/{ma_vc}',[BangCapController::class, 'bangcap']);
Route::post('/add_bangcap/{ma_vc}',[BangCapController::class, 'add_bangcap']);
Route::get('/select_bangcap/{ma_bc}',[BangCapController::class, 'select_bangcap']);
Route::get('/edit_bangcap/{ma_bc}/{ma_vc}',[BangCapController::class, 'edit_bangcap']);
Route::post('/update_bangcap/{ma_bc}/{ma_vc}',[BangCapController::class, 'update_bangcap']);
Route::get('/delete_bangcap/{ma_bc}/{ma_vc}',[BangCapController::class, 'delete_bangcap']);
Route::get('/delete_all_bangcap/{ma_vc}',[BangCapController::class, 'delete_all_bangcap']);




Route::get('/nghihuu',[NghiHuuController::class, 'nghihuu']);
Route::post('/updated_nghihuu',[NghiHuuController::class, 'updated_nghihuu']);




Route::get('/thongke_qltt',[ThongKeController::class, 'thongke_qltt']);
Route::get('/thongke_qltt_lbc_pdf',[ThongKeController::class, 'thongke_qltt_lbc_pdf']);
Route::get('/thongke_qltt_hdt_pdf',[ThongKeController::class, 'thongke_qltt_hdt_pdf']);
Route::get('/thongke_qltt_ngach_pdf',[ThongKeController::class, 'thongke_qltt_ngach_pdf']);
Route::post('/thongke_qltt_chucvu_pdf',[ThongKeController::class, 'thongke_qltt_chucvu_pdf']);
Route::get('/thongke_qltt_chucvu_pdf',[ThongKeController::class, 'thongke_qltt_chucvu_pdf']);
Route::post('/thongke_qltt_khoa_pdf',[ThongKeController::class, 'thongke_qltt_khoa_pdf']);
Route::get('/thongke_qltt_khoa_all_pdf',[ThongKeController::class, 'thongke_qltt_khoa_all_pdf']);
Route::post('/thongke_qltt_nghihuu_time_pdf',[ThongKeController::class, 'thongke_qltt_nghihuu_time_pdf']);
Route::get('/thongke_qltt_nghihuu_all_pdf',[ThongKeController::class, 'thongke_qltt_nghihuu_all_pdf']);
Route::post('/thongke_qltt_nghihuu_khoa_pdf',[ThongKeController::class, 'thongke_qltt_nghihuu_khoa_pdf']);
Route::get('/thongke_qltt_quequan_all_pdf',[ThongKeController::class, 'thongke_qltt_quequan_all_pdf']);
Route::post('/thongke_qltt_quequan_tinh_pdf',[ThongKeController::class, 'thongke_qltt_quequan_tinh_pdf']);






Route::get('/loaikhenthuong',[LoaiKhenThuongController::class, 'loaikhenthuong']);
Route::post('/add_loaikhenthuong',[LoaiKhenThuongController::class, 'add_loaikhenthuong']);
Route::get('/select_loaikhenthuong/{ma_lkt}',[LoaiKhenThuongController::class, 'select_loaikhenthuong']);
Route::get('/edit_loaikhenthuong/{ma_lkt}',[LoaiKhenThuongController::class, 'edit_loaikhenthuong']);
Route::post('/update_loaikhenthuong/{ma_lkt}',[LoaiKhenThuongController::class, 'update_loaikhenthuong']);
Route::get('/delete_loaikhenthuong/{ma_lkt}',[LoaiKhenThuongController::class, 'delete_loaikhenthuong']);
Route::get('/delete_all_loaikhenthuong',[LoaiKhenThuongController::class, 'delete_all_loaikhenthuong']);




Route::get('/hinhthuckhenthuong',[HinhThucKhenThuongController::class, 'hinhthuckhenthuong']);
Route::post('/add_hinhthuckhenthuong',[HinhThucKhenThuongController::class, 'add_hinhthuckhenthuong']);
Route::get('/select_hinhthuckhenthuong/{ma_lkt}',[HinhThucKhenThuongController::class, 'select_hinhthuckhenthuong']);
Route::get('/edit_hinhthuckhenthuong/{ma_lkt}',[HinhThucKhenThuongController::class, 'edit_hinhthuckhenthuong']);
Route::post('/update_hinhthuckhenthuong/{ma_lkt}',[HinhThucKhenThuongController::class, 'update_hinhthuckhenthuong']);
Route::get('/delete_hinhthuckhenthuong/{ma_lkt}',[HinhThucKhenThuongController::class, 'delete_hinhthuckhenthuong']);
Route::get('/delete_all_hinhthuckhenthuong',[HinhThucKhenThuongController::class, 'delete_all_hinhthuckhenthuong']);





Route::get('/khenthuong',[KhenThuongController::class, 'khenthuong']);
Route::get('/khenthuong_add/{ma_vc}',[KhenThuongController::class, 'khenthuong_add']);
Route::post('/add_khenthuong/{ma_vc}',[KhenThuongController::class, 'add_khenthuong']);
Route::get('/select_khenthuong/{ma_kt}',[KhenThuongController::class, 'select_khenthuong']);
Route::get('/edit_khenthuong/{ma_kt}/{ma_vc}',[KhenThuongController::class, 'edit_khenthuong']);
Route::post('/update_khenthuong/{ma_kt}/{ma_vc}',[KhenThuongController::class, 'update_khenthuong']);
Route::get('/delete_khenthuong/{ma_kt}/{ma_vc}',[KhenThuongController::class, 'delete_khenthuong']);
Route::get('/delete_all_khenthuong/{ma_vc}',[KhenThuongController::class, 'delete_all_khenthuong']);
Route::get('/khenthuong_pdf/{ma_kt}',[KhenThuongController::class, 'khenthuong_pdf']);








Route::get('/loaikyluat',[LoaiKyLuatController::class, 'loaikyluat']);
Route::post('/add_loaikyluat',[LoaiKyLuatController::class, 'add_loaikyluat']);
Route::get('/select_loaikyluat/{ma_lkl}',[LoaiKyLuatController::class, 'select_loaikyluat']);
Route::get('/edit_loaikyluat/{ma_lkl}',[LoaiKyLuatController::class, 'edit_loaikyluat']);
Route::post('/update_loaikyluat/{ma_lkl}',[LoaiKyLuatController::class, 'update_loaikyluat']);
Route::get('/delete_loaikyluat/{ma_lkl}',[LoaiKyLuatController::class, 'delete_loaikyluat']);
Route::get('/delete_all_loaikyluat',[LoaiKyLuatController::class, 'delete_all_loaikyluat']);





Route::get('/kyluat',[KyLuatController::class, 'kyluat']);
Route::get('/kyluat_add/{ma_vc}',[KyLuatController::class, 'kyluat_add']);
Route::post('/add_kyluat/{ma_vc}',[KyLuatController::class, 'add_kyluat']);
Route::get('/select_kyluat/{ma_kl}',[KyLuatController::class, 'select_kyluat']);
Route::get('/edit_kyluat/{ma_kl}/{ma_vc}',[KyLuatController::class, 'edit_kyluat']);
Route::post('/update_kyluat/{ma_kl}/{ma_vc}',[KyLuatController::class, 'update_kyluat']);
Route::get('/delete_kyluat/{ma_kl}/{ma_vc}',[KyLuatController::class, 'delete_kyluat']);
Route::get('/delete_all_kyluat/{ma_vc}',[KyLuatController::class, 'delete_all_kyluat']);
Route::get('/kyluat_pdf/{ma_kl}',[KyLuatController::class, 'kyluat_pdf']);



















