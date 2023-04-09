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
use App\Http\Controllers\ChauLucController;
use App\Http\Controllers\ChuyenController;
use App\Http\Controllers\DanhMucLopController;
use App\Http\Controllers\DanhSachController;
use App\Http\Controllers\DungHocController;
use App\Http\Controllers\GiaHanController;
use App\Http\Controllers\NghiHuuController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\LoaiKhenThuongController;
use App\Http\Controllers\HinhThucKhenThuongController;
use App\Http\Controllers\KetQuaController;
use App\Http\Controllers\KhenThuongController;
use App\Http\Controllers\KyLuatController;
use App\Http\Controllers\LoaiKyLuatController;
use App\Http\Controllers\LopController;
use App\Http\Controllers\QuyetDinhController;
use App\Http\Controllers\ThoiHocController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\KhuVucController;
use App\Http\Controllers\QuocGiaController;

Route::get('/login',[HomeController::class, 'index']);
Route::get('/home',[HomeController::class, 'home']);

Route::get('/thongtin_canhan',[HomeController::class, 'thongtin_canhan']);
Route::get('/thongtin_canhan_edit/{ma_vc}',[HomeController::class, 'thongtin_canhan_edit']);
Route::post('/update_thongtin_canhan/{ma_vc}',[HomeController::class, 'update_thongtin_canhan']);

Route::get('/thongtin_giadinh',[HomeController::class, 'thongtin_giadinh']);
Route::post('/add_thongtin_giadinh',[HomeController::class, 'add_thongtin_giadinh']);
Route::get('/thongtin_giadinh_edit/{ma_gd}',[HomeController::class, 'thongtin_giadinh_edit']);
Route::post('/update_thongtin_giadinh/{ma_gd}',[HomeController::class, 'update_thongtin_giadinh']);
Route::get('/delete_thongtin_giadinh',[HomeController::class, 'delete_thongtin_giadinh']);
Route::get('/delete_all_thongtin_giadinh',[HomeController::class, 'delete_all_thongtin_giadinh']);
Route::post('/delete_thongtin_giadinh_check',[HomeController::class, 'delete_thongtin_giadinh_check']);

Route::get('/change_pass',[HomeController::class, 'change_pass']);
Route::get('/check_pass_cu',[HomeController::class, 'check_pass_cu']);
Route::post('/doi_matkhau',[HomeController::class, 'doi_matkhau']);

Route::get('/thongtin_bangcap',[HomeController::class, 'thongtin_bangcap']);

Route::get('/thongtin_khenthuong',[HomeController::class, 'thongtin_khenthuong']);

Route::get('/thongtin_kyluat',[HomeController::class, 'thongtin_kyluat']);

Route::get('/thongtin_lophoc',[HomeController::class, 'thongtin_lophoc']);


Route::post('/login',[VienChucController::class, 'login']);
Route::get('/logout',[VienChucController::class, 'logout']);
Route::get('/vienchuc_khoa/{ma_k}',[VienChucController::class, 'vienchuc_khoa']);
Route::post('/admin_add_vienchuc_khoa/{ma_k}',[VienChucController::class, 'admin_add_vienchuc_khoa']);
Route::post('/admin_add_vienchuc_khoa_excel',[VienChucController::class, 'admin_add_vienchuc_khoa_excel']);
Route::get('/admin_select_vienchuc_khoa/{ma_k}/{ma_vc}',[VienChucController::class, 'admin_select_vienchuc_khoa']);
Route::get('/admin_edit_vienchuc_khoa/{ma_k}/{ma_vc}',[VienChucController::class, 'admin_edit_vienchuc_khoa']);
Route::post('/admin_update_vienchuc_khoa/{ma_k}/{ma_vc}',[VienChucController::class, 'admin_update_vienchuc_khoa']);
Route::get('/admin_delete_vienchuc_khoa',[VienChucController::class, 'admin_delete_vienchuc_khoa']);
Route::get('/admin_deleteall_vienchuc_khoa/{ma_k}',[VienChucController::class, 'admin_deleteall_vienchuc_khoa']);
Route::get('/quanly_vienchuc_khoa',[VienChucController::class, 'quanly_vienchuc_khoa']);
Route::post('/update_khoa_vc',[VienChucController::class, 'update_khoa_vc']);
Route::get('/admin_select_vienchuc/{ma_vc}',[VienChucController::class, 'admin_select_vienchuc']);
Route::post('/admin_delete_vienchuc_khoa_check',[VienChucController::class, 'admin_delete_vienchuc_khoa_check']);
Route::get('/admin_delete_vienchuc',[VienChucController::class, 'admin_delete_vienchuc']);
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

Route::get('/check_user',[VienChucController::class, 'check_user']);

Route::get('/thongtin_vienchuc_khoa',[VienChucController::class, 'thongtin_vienchuc_khoa']);





Route::get('/quanly_quyen',[QuyenController::class, 'quanly_quyen']);
Route::post('/add_quyen',[QuyenController::class, 'add_quyen']);
Route::post('/add_quyen_excel',[QuyenController::class, 'add_quyen_excel']);
Route::get('/select_quyen/{ma_q}',[QuyenController::class, 'select_quyen']);
Route::get('/edit_quyen/{ma_q}',[QuyenController::class, 'edit_quyen']);
Route::post('/update_quyen/{ma_q}',[QuyenController::class, 'update_quyen']);
Route::get('/delete_quyen',[QuyenController::class, 'delete_quyen']);
Route::get('/delete_all_quyen',[QuyenController::class, 'delete_all_quyen']);
Route::post('/delete_quyen_check',[QuyenController::class, 'delete_quyen_check']);




Route::get('/phanquyen',[PhanQuyenController::class, 'phanquyen']);
Route::post('/phanquyen_vc',[PhanQuyenController::class, 'phanquyen_vc']);
Route::get('/lammoi_quyen/{ma_vc}',[PhanQuyenController::class, 'lammoi_quyen']);




Route::get('/quanly_khoa',[KhoaController::class, 'quanly_khoa']);
Route::post('/add_khoa',[KhoaController::class, 'add_khoa']);
Route::post('/add_khoa_excel',[KhoaController::class, 'add_khoa_excel']);
Route::get('/select_khoa/{ma_k}',[KhoaController::class, 'select_khoa']);
Route::get('/edit_khoa/{ma_k}',[KhoaController::class, 'edit_khoa']);
Route::post('/update_khoa/{ma_k}',[KhoaController::class, 'update_khoa']);
Route::get('/delete_khoa',[KhoaController::class, 'delete_khoa']);
Route::get('/delete_all_khoa',[KhoaController::class, 'delete_all_khoa']);
Route::post('/delete_khoa_check',[KhoaController::class, 'delete_khoa_check']);



Route::get('/dantoc',[DanTocController::class, 'dantoc']);
Route::post('/add_dantoc',[DanTocController::class, 'add_dantoc']);
Route::post('/add_dantoc_excel',[DanTocController::class, 'add_dantoc_excel']);
Route::get('/select_dantoc/{ma_dt}',[DanTocController::class, 'select_dantoc']);
Route::get('/edit_dantoc/{ma_dt}',[DanTocController::class, 'edit_dantoc']);
Route::post('/update_dantoc/{ma_dt}',[DanTocController::class, 'update_dantoc']);
Route::get('/delete_dantoc',[DanTocController::class, 'delete_dantoc']);
Route::get('/delete_all_dantoc',[DanTocController::class, 'delete_all_dantoc']);
Route::post('/delete_dantoc_check',[DanTocController::class, 'delete_dantoc_check']);




Route::get('/chucvu',[ChucVuController::class, 'chucvu']);
Route::post('/add_chucvu',[ChucVuController::class, 'add_chucvu']);
Route::post('/add_chucvu_excel',[ChucVuController::class, 'add_chucvu_excel']);
Route::get('/select_chucvu/{ma_cv}',[ChucVuController::class, 'select_chucvu']);
Route::get('/edit_chucvu/{ma_cv}',[ChucVuController::class, 'edit_chucvu']);
Route::post('/update_chucvu/{ma_cv}',[ChucVuController::class, 'update_chucvu']);
Route::get('/delete_chucvu',[ChucVuController::class, 'delete_chucvu']);
Route::get('/delete_all_chucvu',[ChucVuController::class, 'delete_all_chucvu']);
Route::post('/delete_chucvu_check',[ChucVuController::class, 'delete_chucvu_check']);




Route::get('/ngach',[NgachController::class, 'ngach']);
Route::post('/add_ngach',[NgachController::class, 'add_ngach']);
Route::post('/add_ngach_excel',[NgachController::class, 'add_ngach_excel']);
Route::get('/select_ngach/{ma_n}',[NgachController::class, 'select_ngach']);
Route::get('/edit_ngach/{ma_n}',[NgachController::class, 'edit_ngach']);
Route::post('/update_ngach/{ma_n}',[NgachController::class, 'update_ngach']);
Route::get('/delete_ngach',[NgachController::class, 'delete_ngach']);
Route::get('/delete_all_ngach',[NgachController::class, 'delete_all_ngach']);
Route::post('/delete_ngach_check',[NgachController::class, 'delete_ngach_check']);





Route::get('/bac_ngach/{ma_n}',[BacController::class, 'bac_ngach']);
Route::post('/add_bac_ngach/{ma_n}',[BacController::class, 'add_bac_ngach']);
Route::post('/add_bac_ngach_excel',[BacController::class, 'add_bac_ngach_excel']);
Route::get('/select_bac_ngach/{ma_n}/{ma_b}',[BacController::class, 'select_bac_ngach']);
Route::get('/edit_bac_ngach/{ma_n}/{ma_b}',[BacController::class, 'edit_bac_ngach']);
Route::post('/update_bac_ngach/{ma_n}/{ma_b}',[BacController::class, 'update_bac_ngach']);
Route::get('/delete_bac_ngach',[BacController::class, 'delete_bac_ngach']);
Route::post('/delete_bac_ngach_check',[BacController::class, 'delete_bac_ngach_check']);
Route::get('/delete_all_bac_ngach/{ma_n}',[BacController::class, 'delete_all_bac_ngach']);

Route::get('/bac',[BacController::class, 'bac']);
Route::post('/add_bac',[BacController::class, 'add_bac']);
Route::get('/select_bac/{ma_b}',[BacController::class, 'select_bac']);
Route::get('/edit_bac/{ma_b}',[BacController::class, 'edit_bac']);
Route::post('/update_bac/{ma_b}',[BacController::class, 'update_bac']);
Route::get('/delete_bac',[BacController::class, 'delete_bac']);
Route::get('/delete_all_bac',[BacController::class, 'delete_all_bac']);
Route::get('/change_ngach',[BacController::class, 'change_ngach']);
Route::post('/delete_bac_check',[BacController::class, 'delete_bac_check']);

Route::get('/nangbac',[BacController::class, 'nangbac']);
Route::post('/updated_nangbac',[BacController::class, 'updated_nangbac']);





Route::get('/tongiao',[TonGiaoController::class, 'tongiao']);
Route::post('/add_tongiao',[TonGiaoController::class, 'add_tongiao']);
Route::post('/add_tongiao_excel',[TonGiaoController::class, 'add_tongiao_excel']);
Route::get('/select_tongiao/{ma_tg}',[TonGiaoController::class, 'select_tongiao']);
Route::get('/edit_tongiao/{ma_tg}',[TonGiaoController::class, 'edit_tongiao']);
Route::post('/update_tongiao/{ma_tg}',[TonGiaoController::class, 'update_tongiao']);
Route::get('/delete_tongiao',[TonGiaoController::class, 'delete_tongiao']);
Route::get('/delete_all_tongiao',[TonGiaoController::class, 'delete_all_tongiao']);
Route::post('/delete_tongiao_check',[TonGiaoController::class, 'delete_tongiao_check']);




Route::get('/thuongbinh',[ThuongBinhController::class, 'thuongbinh']);
Route::post('/add_thuongbinh',[ThuongBinhController::class, 'add_thuongbinh']);
Route::post('/add_thuongbinh_excel',[ThuongBinhController::class, 'add_thuongbinh_excel']);
Route::get('/select_thuongbinh/{ma_tb}',[ThuongBinhController::class, 'select_thuongbinh']);
Route::get('/edit_thuongbinh/{ma_tb}',[ThuongBinhController::class, 'edit_thuongbinh']);
Route::post('/update_thuongbinh/{ma_tb}',[ThuongBinhController::class, 'update_thuongbinh']);
Route::get('/delete_thuongbinh',[ThuongBinhController::class, 'delete_thuongbinh']);
Route::get('/delete_all_thuongbinh',[ThuongBinhController::class, 'delete_all_thuongbinh']);
Route::post('/delete_thuongbinh_check',[ThuongBinhController::class, 'delete_thuongbinh_check']);





Route::get('/giadinh/{ma_vc}',[GiaDinhController::class, 'giadinh']);
Route::post('/add_giadinh/{ma_vc}',[GiaDinhController::class, 'add_giadinh']);
Route::post('/add_giadinh_excel',[GiaDinhController::class, 'add_giadinh_excel']);
Route::get('/select_giadinh/{ma_gd}',[GiaDinhController::class, 'select_giadinh']);
Route::get('/edit_giadinh/{ma_gd}',[GiaDinhController::class, 'edit_giadinh']);
Route::post('/update_giadinh/{ma_gd}/{ma_vc}',[GiaDinhController::class, 'update_giadinh']);
Route::get('/delete_giadinh',[GiaDinhController::class, 'delete_giadinh']);
Route::post('/delete_giadinh_check',[GiaDinhController::class, 'delete_giadinh_check']);
Route::get('/delete_all_giadinh/{ma_vc}',[GiaDinhController::class, 'delete_all_giadinh']);





Route::get('/loaibangcap',[LoaiBangCapController::class, 'loaibangcap']);
Route::post('/add_loaibangcap',[LoaiBangCapController::class, 'add_loaibangcap']);
Route::post('/add_loaibangcap_excel',[LoaiBangCapController::class, 'add_loaibangcap_excel']);
Route::get('/select_loaibangcap/{ma_lbc}',[LoaiBangCapController::class, 'select_loaibangcap']);
Route::get('/edit_loaibangcap/{ma_lbc}',[LoaiBangCapController::class, 'edit_loaibangcap']);
Route::post('/update_loaibangcap/{ma_lbc}',[LoaiBangCapController::class, 'update_loaibangcap']);
Route::get('/delete_loaibangcap',[LoaiBangCapController::class, 'delete_loaibangcap']);
Route::get('/delete_all_loaibangcap',[LoaiBangCapController::class, 'delete_all_loaibangcap']);
Route::post('/delete_loaibangcap_check',[LoaiBangCapController::class, 'delete_loaibangcap_check']);




Route::get('/hedaotao',[HeDaoTaoController::class, 'hedaotao']);
Route::post('/add_hedaotao',[HeDaoTaoController::class, 'add_hedaotao']);
Route::post('/add_hedaotao_excel',[HeDaoTaoController::class, 'add_hedaotao_excel']);
Route::get('/select_hedaotao/{ma_hdt}',[HeDaoTaoController::class, 'select_hedaotao']);
Route::get('/edit_hedaotao/{ma_hdt}',[HeDaoTaoController::class, 'edit_hedaotao']);
Route::post('/update_hedaotao/{ma_hdt}',[HeDaoTaoController::class, 'update_hedaotao']);
Route::get('/delete_hedaotao',[HeDaoTaoController::class, 'delete_hedaotao']);
Route::get('/delete_all_hedaotao',[HeDaoTaoController::class, 'delete_all_hedaotao']);
Route::post('/delete_hedaotao_check',[HeDaoTaoController::class, 'delete_hedaotao_check']);





Route::get('/bangcap/{ma_vc}',[BangCapController::class, 'bangcap']);
Route::post('/add_bangcap/{ma_vc}',[BangCapController::class, 'add_bangcap']);
Route::post('/add_bangcap_excel',[BangCapController::class, 'add_bangcap_excel']);
Route::get('/select_bangcap/{ma_bc}',[BangCapController::class, 'select_bangcap']);
Route::get('/edit_bangcap/{ma_bc}/{ma_vc}',[BangCapController::class, 'edit_bangcap']);
Route::post('/update_bangcap/{ma_bc}/{ma_vc}',[BangCapController::class, 'update_bangcap']);
Route::get('/delete_bangcap',[BangCapController::class, 'delete_bangcap']);
Route::post('/delete_bangcap_check',[BangCapController::class, 'delete_bangcap_check']);
Route::get('/delete_all_bangcap/{ma_vc}',[BangCapController::class, 'delete_all_bangcap']);




Route::get('/nghihuu',[NghiHuuController::class, 'nghihuu']);
Route::post('/updated_nghihuu',[NghiHuuController::class, 'updated_nghihuu']);
Route::get('/nghihuu_pdf',[NghiHuuController::class, 'nghihuu_pdf']);
Route::get('/nghihuu_excel',[NghiHuuController::class, 'nghihuu_excel']);

// --------------------------------------------------------

Route::get('/thongke_qltt',[ThongKeController::class, 'thongke_qltt']);
Route::get('/thongke_qltt_pdf',[ThongKeController::class, 'thongke_qltt_pdf']);
Route::get('/thongke_qltt_excel',[ThongKeController::class, 'thongke_qltt_excel']);

Route::post('/thongke_qltt_loc',[ThongKeController::class, 'thongke_qltt_loc']);

Route::get('/thongke_qltt_loc_all_pdf/{ma_k}/{ma_cv}/{ma_hdt}/{ma_lbc}/{ma_n}/{ma_t}/{ma_dt}/{ma_tg}/{ma_tb}',
[ThongKeController::class, 'thongke_qltt_loc_all_pdf']);
Route::get('/thongke_qltt_loc_all_excel/{ma_k}/{ma_cv}/{ma_hdt}/{ma_lbc}/{ma_n}/{ma_t}/{ma_dt}/{ma_tg}/{ma_tb}',
[ThongKeController::class, 'thongke_qltt_loc_all_excel']);

Route::get('/thongke_qltt_loc_2_pdf/{ma_k}/{ma_cv}',[ThongKeController::class, 'thongke_qltt_loc_2_pdf']);
Route::get('/thongke_qltt_loc_2_excel/{ma_k}/{ma_cv}',[ThongKeController::class, 'thongke_qltt_loc_2_excel']);

Route::get('/thongke_qltt_loc_khoa_pdf/{ma_k}',[ThongKeController::class, 'thongke_qltt_loc_khoa_pdf']);
Route::get('/thongke_qltt_loc_khoa_excel/{ma_k}',[ThongKeController::class, 'thongke_qltt_loc_khoa_excel']);

Route::get('/thongke_qltt_loc_chucvu_pdf/{ma_cv}',[ThongKeController::class, 'thongke_qltt_loc_chucvu_pdf']);
Route::get('/thongke_qltt_loc_chucvu_excel/{ma_cv}',[ThongKeController::class, 'thongke_qltt_loc_chucvu_excel']);

Route::get('/thongke_qltt_loc_hdt_pdf/{ma_hdt}',[ThongKeController::class, 'thongke_qltt_loc_hdt_pdf']);
Route::get('/thongke_qltt_loc_hdt_excel/{ma_hdt}',[ThongKeController::class, 'thongke_qltt_loc_hdt_excel']);

Route::get('/thongke_qltt_loc_lbc_pdf/{ma_lbc}',[ThongKeController::class, 'thongke_qltt_loc_lbc_pdf']);
Route::get('/thongke_qltt_loc_lbc_excel/{ma_lbc}',[ThongKeController::class, 'thongke_qltt_loc_lbc_excel']);

Route::get('/thongke_qltt_loc_ngach_pdf/{ma_n}',[ThongKeController::class, 'thongke_qltt_loc_ngach_pdf']);
Route::get('/thongke_qltt_loc_ngach_excel/{ma_n}',[ThongKeController::class, 'thongke_qltt_loc_ngach_excel']);

Route::get('/thongke_qltt_loc_tinh_pdf/{ma_t}',[ThongKeController::class, 'thongke_qltt_loc_tinh_pdf']);
Route::get('/thongke_qltt_loc_tinh_excel/{ma_t}',[ThongKeController::class, 'thongke_qltt_loc_tinh_excel']);

Route::get('/thongke_qltt_loc_dantoc_pdf/{ma_dt}',[ThongKeController::class, 'thongke_qltt_loc_dantoc_pdf']);
Route::get('/thongke_qltt_loc_dantoc_excel/{ma_dt}',[ThongKeController::class, 'thongke_qltt_loc_dantoc_excel']);

Route::get('/thongke_qltt_loc_tongiao_pdf/{ma_tg}',[ThongKeController::class, 'thongke_qltt_loc_tongiao_pdf']);
Route::get('/thongke_qltt_loc_tongiao_excel/{ma_tg}',[ThongKeController::class, 'thongke_qltt_loc_tongiao_excel']);

Route::get('/thongke_qltt_loc_thuongbinh_pdf/{ma_tb}',[ThongKeController::class, 'thongke_qltt_loc_thuongbinh_pdf']);
Route::get('/thongke_qltt_loc_thuongbinh_excel/{ma_tb}',[ThongKeController::class, 'thongke_qltt_loc_thuongbinh_excel']);


Route::post('/thongke_qltt_nghihuu_loc',[ThongKeController::class, 'thongke_qltt_nghihuu_loc']);

Route::get('/thongke_qltt_loc_nghihuu_all_pdf/{ma_k}/{batdau}/{ketthuc}',[ThongKeController::class, 'thongke_qltt_loc_nghihuu_all_pdf']);
Route::get('/thongke_qltt_loc_nghihuu_all_excel/{ma_k}/{batdau}/{ketthuc}',[ThongKeController::class, 'thongke_qltt_loc_nghihuu_all_excel']);

Route::get('/thongke_qltt_loc_nghihuu_khoa_pdf/{ma_k}',[ThongKeController::class, 'thongke_qltt_loc_nghihuu_khoa_pdf']);
Route::get('/thongke_qltt_loc_nghihuu_khoa_excel/{ma_k}',[ThongKeController::class, 'thongke_qltt_loc_nghihuu_khoa_excel']);

Route::get('/thongke_qltt_loc_nghihuu_time_pdf/{batdau}/{ketthuc}',[ThongKeController::class, 'thongke_qltt_loc_nghihuu_time_pdf']);
Route::get('/thongke_qltt_loc_nghihuu_time_excel/{batdau}/{ketthuc}',[ThongKeController::class, 'thongke_qltt_loc_nghihuu_time_excel']);

// *********************

Route::get('/thongke_qlktkl',[ThongKeController::class, 'thongke_qlktkl']);

Route::get('/thongke_qlklkt_kt_pdf',[ThongKeController::class, 'thongke_qlklkt_kt_pdf']);
Route::get('/thongke_qlklkt_kt_excel',[ThongKeController::class, 'thongke_qlklkt_kt_excel']);

Route::post('/thongke_qltktkl_kt_loc',[ThongKeController::class, 'thongke_qltktkl_kt_loc']);

Route::get('/thongke_qlktkl_kt_loc_all_pdf/{ma_lkt}/{ma_k}/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_all_pdf']);
Route::get('/thongke_qlktkl_kt_loc_all_excel/{ma_lkt}/{ma_k}/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_all_excel']);

Route::get('/thongke_qlktkl_kt_loc_2_pdf/{ma_lkt}/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_2_pdf']);
Route::get('/thongke_qlktkl_kt_loc_2_excel/{ma_lkt}/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_2_excel']);

Route::get('/thongke_qlktkl_kt_loc_3_pdf/{ma_lkt}/{ma_k}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_3_pdf']);
Route::get('/thongke_qlktkl_kt_loc_3_excel/{ma_lkt}/{ma_k}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_3_excel']);

Route::get('/thongke_qlktkl_kt_loc_4_pdf/{ma_lkt}/{ma_k}/{ma_htkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_4_pdf']);
Route::get('/thongke_qlktkl_kt_loc_4_excel/{ma_lkt}/{ma_k}/{ma_htkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_4_excel']);

Route::get('/thongke_qlktkl_kt_loc_5_pdf/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_5_pdf']);
Route::get('/thongke_qlktkl_kt_loc_5_excel/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_5_excel']);

Route::get('/thongke_qlktkl_kt_loc_6_pdf/{ma_k}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_6_pdf']);
Route::get('/thongke_qlktkl_kt_loc_6_excel/{ma_k}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_6_excel']);

Route::get('/thongke_qlktkl_kt_loc_7_pdf/{ma_k}/{ma_htkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_7_pdf']);
Route::get('/thongke_qlktkl_kt_loc_7_excel/{ma_k}/{ma_htkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_7_excel']);

Route::get('/thongke_qlktkl_kt_loc_8_pdf/{ma_lkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_8_pdf']);
Route::get('/thongke_qlktkl_kt_loc_8_excel/{ma_lkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_8_excel']);

Route::get('/thongke_qlktkl_kt_loc_9_pdf/{ma_lkt}/{ma_htkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_9_pdf']);
Route::get('/thongke_qlktkl_kt_loc_9_excel/{ma_lkt}/{ma_htkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_9_excel']);

Route::get('/thongke_qlktkl_kt_loc_10_pdf/{ma_lkt}/{ma_k}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_10_pdf']);
Route::get('/thongke_qlktkl_kt_loc_10_excel/{ma_lkt}/{ma_k}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_10_excel']);

Route::get('/thongke_qlktkl_kt_loc_11_pdf/{ma_lkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_11_pdf']);
Route::get('/thongke_qlktkl_kt_loc_11_excel/{ma_lkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_11_excel']);

Route::get('/thongke_qlktkl_kt_loc_12_pdf/{ma_k}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_12_pdf']);
Route::get('/thongke_qlktkl_kt_loc_12_excel/{ma_k}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_12_excel']);

Route::get('/thongke_qlktkl_kt_loc_13_pdf/{ma_htkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_13_pdf']);
Route::get('/thongke_qlktkl_kt_loc_13_excel/{ma_htkt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_13_excel']);

Route::get('/thongke_qlktkl_kt_loc_14_pdf/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_14_pdf']);
Route::get('/thongke_qlktkl_kt_loc_14_excel/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_14_excel']);

Route::get('/thongke_qlktkl_kt_loc_15_pdf/{ma_htkt}/{ma_k}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_15_pdf']);
Route::get('/thongke_qlktkl_kt_loc_15_excel/{ma_htkt}/{ma_k}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlktkl_kt_loc_15_excel']);

Route::post('/thongke_qltktkl_kl_loc',[ThongKeController::class, 'thongke_qltktkl_kl_loc']);

Route::get('/thongke_qlktkl_kl_loc_all_pdf/{ma_lkl}/{ma_k}/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_all_pdf']);
Route::get('/thongke_qlktkl_kl_loc_all_excel/{ma_lkl}/{ma_k}/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_all_excel']);

Route::get('/thongke_qlktkl_kl_loc_2_pdf/{ma_k}/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_2_pdf']);
Route::get('/thongke_qlktkl_kl_loc_2_excel/{ma_k}/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_2_excel']);

Route::get('/thongke_qlktkl_kl_loc_3_pdf/{ma_lkl}/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_3_pdf']);
Route::get('/thongke_qlktkl_kl_loc_3_excel/{ma_lkl}/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_3_excel']);

Route::get('/thongke_qlktkl_kl_loc_4_pdf/{ma_lkl}/{ma_k}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_4_pdf']);
Route::get('/thongke_qlktkl_kl_loc_4_excel/{ma_lkl}/{ma_k}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_4_excel']);

Route::get('/thongke_qlktkl_kl_loc_5_pdf/{ma_k}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_5_pdf']);
Route::get('/thongke_qlktkl_kl_loc_5_excel/{ma_k}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_5_excel']);

Route::get('/thongke_qlktkl_kl_loc_6_pdf/{ma_lkl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_6_pdf']);
Route::get('/thongke_qlktkl_kl_loc_6_excel/{ma_lkl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_6_excel']);

Route::get('/thongke_qlktkl_kl_loc_7_pdf/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_7_pdf']);
Route::get('/thongke_qlktkl_kl_loc_7_excel/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlktkl_kl_loc_7_excel']);

// ********************************

Route::get('/thongke_qlk',[ThongKeController::class, 'thongke_qlk']);
Route::get('/thongke_qlk_pdf',[ThongKeController::class, 'thongke_qlk_pdf']);
Route::get('/thongke_qlk_excel',[ThongKeController::class, 'thongke_qlk_excel']);

Route::post('/thongke_qlk_loc',[ThongKeController::class, 'thongke_qlk_loc']);

Route::get('/thongke_qlk_loc_all_pdf/{ma_cv}/{ma_hdt}/{ma_lbc}/{ma_n}/{ma_t}/{ma_dt}/{ma_tg}/{ma_tb}',[ThongKeController::class, 'thongke_qlk_loc_all_pdf']);
Route::get('/thongke_qlk_loc_all_excel/{ma_cv}/{ma_hdt}/{ma_lbc}/{ma_n}/{ma_t}/{ma_dt}/{ma_tg}/{ma_tb}',[ThongKeController::class, 'thongke_qlk_loc_all_excel']);

Route::get('/thongke_qlk_loc_chucvu_pdf/{ma_cv}',[ThongKeController::class, 'thongke_qlk_loc_chucvu_pdf']);
Route::get('/thongke_qlk_loc_chucvu_excel/{ma_cv}',[ThongKeController::class, 'thongke_qlk_loc_chucvu_excel']);

Route::get('/thongke_qlk_loc_hdt_pdf/{ma_hdt}',[ThongKeController::class, 'thongke_qlk_loc_hdt_pdf']);
Route::get('/thongke_qlk_loc_hdt_excel/{ma_hdt}',[ThongKeController::class, 'thongke_qlk_loc_hdt_excel']);

Route::get('/thongke_qlk_loc_lbc_pdf/{ma_lbc}',[ThongKeController::class, 'thongke_qlk_loc_lbc_pdf']);
Route::get('/thongke_qlk_loc_lbc_excel/{ma_lbc}',[ThongKeController::class, 'thongke_qlk_loc_lbc_excel']);

Route::get('/thongke_qlk_loc_ngach_pdf/{ma_n}',[ThongKeController::class, 'thongke_qlk_loc_ngach_pdf']);
Route::get('/thongke_qlk_loc_ngach_excel/{ma_n}',[ThongKeController::class, 'thongke_qlk_loc_ngach_excel']);

Route::get('/thongke_qlk_loc_tinh_pdf/{ma_t}',[ThongKeController::class, 'thongke_qlk_loc_tinh_pdf']);
Route::get('/thongke_qlk_loc_tinh_excel/{ma_t}',[ThongKeController::class, 'thongke_qlk_loc_tinh_excel']);

Route::get('/thongke_qlk_loc_dantoc_pdf/{ma_dt}',[ThongKeController::class, 'thongke_qlk_loc_dantoc_pdf']);
Route::get('/thongke_qlk_loc_dantoc_excel/{ma_dt}',[ThongKeController::class, 'thongke_qlk_loc_dantoc_excel']);

Route::get('/thongke_qlk_loc_tongiao_pdf/{ma_tg}',[ThongKeController::class, 'thongke_qlk_loc_tongiao_pdf']);
Route::get('/thongke_qlk_loc_tongiao_excel/{ma_tg}',[ThongKeController::class, 'thongke_qlk_loc_tongiao_excel']);

Route::get('/thongke_qlk_loc_thuongbinh_pdf/{ma_tb}',[ThongKeController::class, 'thongke_qlk_loc_thuongbinh_pdf']);
Route::get('/thongke_qlk_loc_thuongbinh_excel/{ma_tb}',[ThongKeController::class, 'thongke_qlk_loc_thuongbinh_excel']);


Route::post('/thongke_qlk_nghihuu_loc',[ThongKeController::class, 'thongke_qlk_nghihuu_loc']);

Route::get('/thongke_qlk_loc_nghihuu_time_pdf/{batdau}/{ketthuc}',[ThongKeController::class, 'thongke_qlk_loc_nghihuu_time_pdf']);
Route::get('/thongke_qlk_loc_nghihuu_time_excel/{batdau}/{ketthuc}',[ThongKeController::class, 'thongke_qlk_loc_nghihuu_time_excel']);

Route::post('/thongke_qlk_kt_loc',[ThongKeController::class, 'thongke_qlk_kt_loc']);

Route::get('/thongke_qlk_kt_loc_all_pdf/{ma_lkt}/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlk_kt_loc_all_pdf']);
Route::get('/thongke_qlk_kt_loc_all_excel/{ma_lkt}/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlk_kt_loc_all_excel']);

Route::get('/thongke_qlk_kt_loc_2_pdf/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlk_kt_loc_2_pdf']);
Route::get('/thongke_qlk_kt_loc_2_excel/{ma_htkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlk_kt_loc_2_excel']);

Route::get('/thongke_qlk_kt_loc_3_pdf/{ma_lkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlk_kt_loc_3_pdf']);
Route::get('/thongke_qlk_kt_loc_3_excel/{ma_lkt}/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlk_kt_loc_3_excel']);

Route::get('/thongke_qlk_kt_loc_4_pdf/{ma_lkt}/{ma_htkt}',[ThongKeController::class, 'thongke_qlk_kt_loc_4_pdf']);
Route::get('/thongke_qlk_kt_loc_4_excel/{ma_lkt}/{ma_htkt}',[ThongKeController::class, 'thongke_qlk_kt_loc_4_excel']);

Route::get('/thongke_qlk_kt_loc_5_pdf/{ma_lkt}',[ThongKeController::class, 'thongke_qlk_kt_loc_5_pdf']);
Route::get('/thongke_qlk_kt_loc_5_excel/{ma_lkt}',[ThongKeController::class, 'thongke_qlk_kt_loc_5_excel']);

Route::get('/thongke_qlk_kt_loc_6_pdf/{ma_htkt}',[ThongKeController::class, 'thongke_qlk_kt_loc_6_pdf']);
Route::get('/thongke_qlk_kt_loc_6_excel/{ma_htkt}',[ThongKeController::class, 'thongke_qlk_kt_loc_6_excel']);

Route::get('/thongke_qlk_kt_loc_7_pdf/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlk_kt_loc_7_pdf']);
Route::get('/thongke_qlk_kt_loc_7_excel/{batdau_kt}/{ketthuc_kt}',[ThongKeController::class, 'thongke_qlk_kt_loc_7_excel']);


Route::post('/thongke_qlk_kl_loc',[ThongKeController::class, 'thongke_qlk_kl_loc']);

Route::get('/thongke_qlk_kl_loc_all_pdf/{ma_lkl}/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlk_kl_loc_all_pdf']);
Route::get('/thongke_qlk_kl_loc_all_excel/{ma_lkl}/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlk_kl_loc_all_excel']);

Route::get('/thongke_qlk_kl_loc_2_pdf/{ma_lkl}',[ThongKeController::class, 'thongke_qlk_kl_loc_2_pdf']);
Route::get('/thongke_qlk_kl_loc_2_excel/{ma_lkl}',[ThongKeController::class, 'thongke_qlk_kl_loc_2_excel']);

Route::get('/thongke_qlk_kl_loc_3_pdf/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlk_kl_loc_3_pdf']);
Route::get('/thongke_qlk_kl_loc_3_excel/{batdau_kl}/{ketthuc_kl}',[ThongKeController::class, 'thongke_qlk_kl_loc_3_excel']);


// ----------------------------------------------------------



Route::get('/thongke_qlcttc',[ThongKeController::class, 'thongke_qlcttc']);

Route::post('/thongke_qlcttc_loc',[ThongKeController::class, 'thongke_qlcttc_loc']);

Route::get('/thongke_qlcttc_loc_1_pdf',[ThongKeController::class, 'thongke_qlcttc_loc_1_pdf']);
Route::get('/thongke_qlcttc_loc_1_excel',[ThongKeController::class, 'thongke_qlcttc_loc_1_excel']);

Route::get('/thongke_qlktkl_loc_all_pdf',[ThongKeController::class, 'thongke_qlktkl_loc_all_pdf']);
Route::get('/thongke_qlktkl_loc_all_excel',[ThongKeController::class, 'thongke_qlktkl_loc_all_excel']);

Route::get('/thongke_qlcttc_loc_hoanthanh_pdf',[ThongKeController::class, 'thongke_qlcttc_loc_hoanthanh_pdf']);
Route::get('/thongke_qlcttc_loc_hoanthanh_excel',[ThongKeController::class, 'thongke_qlcttc_loc_hoanthanh_excel']);

Route::get('/thongke_qlcttc_loc_giahan_pdf',[ThongKeController::class, 'thongke_qlcttc_loc_giahan_pdf']);
Route::get('/thongke_qlcttc_loc_giahan_excel',[ThongKeController::class, 'thongke_qlcttc_loc_giahan_excel']);

Route::get('/thongke_qlcttc_loc_dunghoc_pdf',[ThongKeController::class, 'thongke_qlcttc_loc_dunghoc_pdf']);
Route::get('/thongke_qlcttc_loc_dunghoc_excel',[ThongKeController::class, 'thongke_qlcttc_loc_dunghoc_excel']);

Route::get('/thongke_qlcttc_loc_chuyen_pdf',[ThongKeController::class, 'thongke_qlcttc_loc_chuyen_pdf']);
Route::get('/thongke_qlcttc_loc_chuyen_excel',[ThongKeController::class, 'thongke_qlcttc_loc_chuyen_excel']);

Route::get('/thongke_qlcttc_loc_thoihoc_pdf',[ThongKeController::class, 'thongke_qlcttc_loc_thoihoc_pdf']);
Route::get('/thongke_qlcttc_loc_thoihoc_excel',[ThongKeController::class, 'thongke_qlcttc_loc_thoihoc_excel']);


Route::post('/thongke_qlcttc_hoanthanh_loc',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc']);

Route::get('/thongke_qlcttc_hoanthanh_loc_all_pdf/{ma_l}/{batdau_capbang}/{ketthuc_capbang}/{batdau_venuoc}/{ketthuc_venuoc}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_all_pdf']);
Route::get('/thongke_qlcttc_hoanthanh_loc_all_excel/{ma_l}/{batdau_capbang}/{ketthuc_capbang}/{batdau_venuoc}/{ketthuc_venuoc}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_all_excel']);

Route::get('/thongke_qlcttc_hoanthanh_loc_2_pdf/{batdau_capbang}/{ketthuc_capbang}/{batdau_venuoc}/{ketthuc_venuoc}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_2_pdf']);
Route::get('/thongke_qlcttc_hoanthanh_loc_2_excel/{batdau_capbang}/{ketthuc_capbang}/{batdau_venuoc}/{ketthuc_venuoc}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_2_excel']);

Route::get('/thongke_qlcttc_hoanthanh_loc_3_pdf/{ma_l}/{batdau_venuoc}/{ketthuc_venuoc}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_3_pdf']);
Route::get('/thongke_qlcttc_hoanthanh_loc_3_excel/{ma_l}/{batdau_venuoc}/{ketthuc_venuoc}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_3_excel']);

Route::get('/thongke_qlcttc_hoanthanh_loc_4_pdf/{ma_l}/{batdau_capbang}/{ketthuc_capbang}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_4_pdf']);
Route::get('/thongke_qlcttc_hoanthanh_loc_4_excel/{ma_l}/{batdau_capbang}/{ketthuc_capbang}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_4_excel']);

Route::get('/thongke_qlcttc_hoanthanh_loc_5_pdf/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_5_pdf']);
Route::get('/thongke_qlcttc_hoanthanh_loc_5_excel/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_5_excel']);

Route::get('/thongke_qlcttc_hoanthanh_loc_6_pdf/{batdau_capbang}/{ketthuc_capbang}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_6_pdf']);
Route::get('/thongke_qlcttc_hoanthanh_loc_6_excel/{batdau_capbang}/{ketthuc_capbang}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_6_excel']);

Route::get('/thongke_qlcttc_hoanthanh_loc_7_pdf/{batdau_venuoc}/{ketthuc_venuoc}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_7_pdf']);
Route::get('/thongke_qlcttc_hoanthanh_loc_7_excel/{batdau_venuoc}/{ketthuc_venuoc}',[ThongKeController::class, 'thongke_qlcttc_hoanthanh_loc_7_excel']);



Route::post('/thongke_qlcttc_giahan_loc',[ThongKeController::class, 'thongke_qlcttc_giahan_loc']);

Route::get('/thongke_qlcttc_giahan_loc_all_pdf/{ma_k}/{ma_l}/{batdau_giahan}/{ketthuc_giahan}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_all_pdf']);
Route::get('/thongke_qlcttc_giahan_loc_all_excel/{ma_k}/{ma_l}/{batdau_giahan}/{ketthuc_giahan}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_all_excel']);

Route::get('/thongke_qlcttc_giahan_loc_2_pdf/{ma_l}/{batdau_giahan}/{ketthuc_giahan}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_2_pdf']);
Route::get('/thongke_qlcttc_giahan_loc_2_excel/{ma_l}/{batdau_giahan}/{ketthuc_giahan}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_2_excel']);

Route::get('/thongke_qlcttc_giahan_loc_3_pdf/{ma_k}/{batdau_giahan}/{ketthuc_giahan}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_3_pdf']);
Route::get('/thongke_qlcttc_giahan_loc_3_excel/{ma_k}/{batdau_giahan}/{ketthuc_giahan}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_3_excel']);

Route::get('/thongke_qlcttc_giahan_loc_4_pdf/{ma_k}/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_4_pdf']);
Route::get('/thongke_qlcttc_giahan_loc_4_excel/{ma_k}/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_4_excel']);

Route::get('/thongke_qlcttc_giahan_loc_5_pdf/{ma_k}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_5_pdf']);
Route::get('/thongke_qlcttc_giahan_loc_5_excel/{ma_k}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_5_excel']);

Route::get('/thongke_qlcttc_giahan_loc_6_pdf/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_6_pdf']);
Route::get('/thongke_qlcttc_giahan_loc_6_excel/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_6_excel']);

Route::get('/thongke_qlcttc_giahan_loc_7_pdf/{batdau_giahan}/{ketthuc_giahan}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_7_pdf']);
Route::get('/thongke_qlcttc_giahan_loc_7_excel/{batdau_giahan}/{ketthuc_giahan}',[ThongKeController::class, 'thongke_qlcttc_giahan_loc_7_excel']);


Route::post('/thongke_qlcttc_dunghoc_loc',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc']);

Route::get('/thongke_qlcttc_dunghoc_loc_all_pdf/{ma_k}/{ma_l}/{batdau_dunghoc}/{ketthuc_dunghoc}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_all_pdf']);
Route::get('/thongke_qlcttc_dunghoc_loc_all_excel/{ma_k}/{ma_l}/{batdau_dunghoc}/{ketthuc_dunghoc}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_all_excel']);

Route::get('/thongke_qlcttc_dunghoc_loc_2_pdf/{ma_l}/{batdau_dunghoc}/{ketthuc_dunghoc}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_2_pdf']);
Route::get('/thongke_qlcttc_dunghoc_loc_2_excel/{ma_l}/{batdau_dunghoc}/{ketthuc_dunghoc}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_2_excel']);

Route::get('/thongke_qlcttc_dunghoc_loc_3_pdf/{ma_k}/{batdau_dunghoc}/{ketthuc_dunghoc}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_3_pdf']);
Route::get('/thongke_qlcttc_dunghoc_loc_3_excel/{ma_k}/{batdau_dunghoc}/{ketthuc_dunghoc}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_3_excel']);

Route::get('/thongke_qlcttc_dunghoc_loc_4_pdf/{ma_k}/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_4_pdf']);
Route::get('/thongke_qlcttc_dunghoc_loc_4_excel/{ma_k}/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_4_excel']);

Route::get('/thongke_qlcttc_dunghoc_loc_5_pdf/{ma_k}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_5_pdf']);
Route::get('/thongke_qlcttc_dunghoc_loc_5_excel/{ma_k}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_5_excel']);

Route::get('/thongke_qlcttc_dunghoc_loc_6_pdf/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_6_pdf']);
Route::get('/thongke_qlcttc_dunghoc_loc_6_excel/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_6_excel']);

Route::get('/thongke_qlcttc_dunghoc_loc_7_pdf/{batdau_dunghoc}/{ketthuc_dunghoc}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_7_pdf']);
Route::get('/thongke_qlcttc_dunghoc_loc_7_excel/{batdau_dunghoc}/{ketthuc_dunghoc}',[ThongKeController::class, 'thongke_qlcttc_dunghoc_loc_7_excel']);

Route::post('/thongke_qlcttc_xinchuyen_loc',[ThongKeController::class, 'thongke_qlcttc_xinchuyen_loc']);

Route::get('/thongke_qlcttc_chuyen_loc_all_pdf/{ma_k}/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_chuyen_loc_all_pdf']);
Route::get('/thongke_qlcttc_chuyen_loc_all_excel/{ma_k}/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_chuyen_loc_all_excel']);

Route::get('/thongke_qlcttc_chuyen_loc_2_pdf/{ma_k}',[ThongKeController::class, 'thongke_qlcttc_chuyen_loc_2_pdf']);
Route::get('/thongke_qlcttc_chuyen_loc_2_excel/{ma_k}',[ThongKeController::class, 'thongke_qlcttc_chuyen_loc_2_excel']);

Route::get('/thongke_qlcttc_chuyen_loc_3_pdf/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_chuyen_loc_3_pdf']);
Route::get('/thongke_qlcttc_chuyen_loc_3_excel/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_chuyen_loc_3_excel']);


Route::post('/thongke_qlcttc_thoihoc_loc',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc']);

Route::get('/thongke_qlcttc_thoihoc_loc_all_pdf/{ma_k}/{ma_l}/{batdau_thoihoc}/{ketthuc_thoihoc}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_all_pdf']);
Route::get('/thongke_qlcttc_thoihoc_loc_all_excel/{ma_k}/{ma_l}/{batdau_thoihoc}/{ketthuc_thoihoc}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_all_excel']);

Route::get('/thongke_qlcttc_thoihoc_loc_2_pdf/{ma_l}/{batdau_thoihoc}/{ketthuc_thoihoc}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_2_pdf']);
Route::get('/thongke_qlcttc_thoihoc_loc_2_excel/{ma_l}/{batdau_thoihoc}/{ketthuc_thoihoc}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_2_excel']);

Route::get('/thongke_qlcttc_thoihoc_loc_3_pdf/{ma_k}/{batdau_thoihoc}/{ketthuc_thoihoc}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_3_pdf']);
Route::get('/thongke_qlcttc_thoihoc_loc_3_excel/{ma_k}/{batdau_thoihoc}/{ketthuc_thoihoc}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_3_excel']);

Route::get('/thongke_qlcttc_thoihoc_loc_4_pdf/{ma_k}/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_4_pdf']);
Route::get('/thongke_qlcttc_thoihoc_loc_4_excel/{ma_k}/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_4_excel']);

Route::get('/thongke_qlcttc_thoihoc_loc_5_pdf/{ma_k}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_5_pdf']);
Route::get('/thongke_qlcttc_thoihoc_loc_5_excel/{ma_k}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_5_excel']);

Route::get('/thongke_qlcttc_thoihoc_loc_6_pdf/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_6_pdf']);
Route::get('/thongke_qlcttc_thoihoc_loc_6_excel/{ma_l}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_6_excel']);

Route::get('/thongke_qlcttc_thoihoc_loc_7_pdf/{batdau_thoihoc}/{ketthuc_thoihoc}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_7_pdf']);
Route::get('/thongke_qlcttc_thoihoc_loc_7_excel/{batdau_thoihoc}/{ketthuc_thoihoc}',[ThongKeController::class, 'thongke_qlcttc_thoihoc_loc_7_excel']);


// ----------------------------------------------------------

Route::get('/loaikhenthuong',[LoaiKhenThuongController::class, 'loaikhenthuong']);
Route::post('/add_loaikhenthuong',[LoaiKhenThuongController::class, 'add_loaikhenthuong']);
Route::post('/add_loaikhenthuong_excel',[LoaiKhenThuongController::class, 'add_loaikhenthuong_excel']);
Route::get('/select_loaikhenthuong/{ma_lkt}',[LoaiKhenThuongController::class, 'select_loaikhenthuong']);
Route::get('/edit_loaikhenthuong/{ma_lkt}',[LoaiKhenThuongController::class, 'edit_loaikhenthuong']);
Route::post('/update_loaikhenthuong/{ma_lkt}',[LoaiKhenThuongController::class, 'update_loaikhenthuong']);
Route::get('/delete_loaikhenthuong',[LoaiKhenThuongController::class, 'delete_loaikhenthuong']);
Route::get('/delete_all_loaikhenthuong',[LoaiKhenThuongController::class, 'delete_all_loaikhenthuong']);
Route::post('/delete_loaikhenthuong_check',[LoaiKhenThuongController::class, 'delete_loaikhenthuong_check']);


// -------------------------------------------------------

Route::get('/hinhthuckhenthuong',[HinhThucKhenThuongController::class, 'hinhthuckhenthuong']);
Route::post('/add_hinhthuckhenthuong',[HinhThucKhenThuongController::class, 'add_hinhthuckhenthuong']);
Route::post('/add_hinhthuckhenthuong_excel',[HinhThucKhenThuongController::class, 'add_hinhthuckhenthuong_excel']);
Route::get('/select_hinhthuckhenthuong/{ma_htkt}',[HinhThucKhenThuongController::class, 'select_hinhthuckhenthuong']);
Route::get('/edit_hinhthuckhenthuong/{ma_htkt}',[HinhThucKhenThuongController::class, 'edit_hinhthuckhenthuong']);
Route::post('/update_hinhthuckhenthuong/{ma_htkt}',[HinhThucKhenThuongController::class, 'update_hinhthuckhenthuong']);
Route::get('/delete_hinhthuckhenthuong',[HinhThucKhenThuongController::class, 'delete_hinhthuckhenthuong']);
Route::post('/delete_hinhthuckhenthuong_check',[HinhThucKhenThuongController::class, 'delete_hinhthuckhenthuong_check']);
Route::get('/delete_all_hinhthuckhenthuong',[HinhThucKhenThuongController::class, 'delete_all_hinhthuckhenthuong']);





Route::get('/khenthuong',[KhenThuongController::class, 'khenthuong']);
Route::get('/khenthuong_add/{ma_vc}',[KhenThuongController::class, 'khenthuong_add']);
Route::post('/add_khenthuong/{ma_vc}',[KhenThuongController::class, 'add_khenthuong']);
Route::post('/add_khenthuong_excel',[KhenThuongController::class, 'add_khenthuong_excel']);
Route::get('/select_khenthuong/{ma_kt}',[KhenThuongController::class, 'select_khenthuong']);
Route::get('/edit_khenthuong/{ma_kt}/{ma_vc}',[KhenThuongController::class, 'edit_khenthuong']);
Route::post('/update_khenthuong/{ma_kt}/{ma_vc}',[KhenThuongController::class, 'update_khenthuong']);
Route::get('/delete_khenthuong',[KhenThuongController::class, 'delete_khenthuong']);
Route::post('/delete_khenthuong_check',[KhenThuongController::class, 'delete_khenthuong_check']);
Route::get('/delete_all_khenthuong/{ma_vc}',[KhenThuongController::class, 'delete_all_khenthuong']);
Route::get('/khenthuong_pdf/{ma_kt}',[KhenThuongController::class, 'khenthuong_pdf']);








Route::get('/loaikyluat',[LoaiKyLuatController::class, 'loaikyluat']);
Route::post('/add_loaikyluat',[LoaiKyLuatController::class, 'add_loaikyluat']);
Route::post('/add_loaikyluat_excel',[LoaiKyLuatController::class, 'add_loaikyluat_excel']);
Route::get('/select_loaikyluat/{ma_lkl}',[LoaiKyLuatController::class, 'select_loaikyluat']);
Route::get('/edit_loaikyluat/{ma_lkl}',[LoaiKyLuatController::class, 'edit_loaikyluat']);
Route::post('/update_loaikyluat/{ma_lkl}',[LoaiKyLuatController::class, 'update_loaikyluat']);
Route::get('/delete_loaikyluat',[LoaiKyLuatController::class, 'delete_loaikyluat']);
Route::post('/delete_loaikyluat_check',[LoaiKyLuatController::class, 'delete_loaikyluat_check']);
Route::get('/delete_all_loaikyluat',[LoaiKyLuatController::class, 'delete_all_loaikyluat']);





Route::get('/kyluat',[KyLuatController::class, 'kyluat']);
Route::get('/kyluat_add/{ma_vc}',[KyLuatController::class, 'kyluat_add']);
Route::post('/add_kyluat/{ma_vc}',[KyLuatController::class, 'add_kyluat']);
Route::post('/add_kyluat_excel',[KyLuatController::class, 'add_kyluat_excel']);
Route::get('/select_kyluat/{ma_kl}',[KyLuatController::class, 'select_kyluat']);
Route::get('/edit_kyluat/{ma_kl}/{ma_vc}',[KyLuatController::class, 'edit_kyluat']);
Route::post('/update_kyluat/{ma_kl}/{ma_vc}',[KyLuatController::class, 'update_kyluat']);
Route::get('/delete_kyluat',[KyLuatController::class, 'delete_kyluat']);
Route::get('/delete_all_kyluat/{ma_vc}',[KyLuatController::class, 'delete_all_kyluat']);
Route::get('/kyluat_pdf/{ma_kl}',[KyLuatController::class, 'kyluat_pdf']);
Route::post('/delete_kyluat_check',[KyLuatController::class, 'delete_kyluat_check']);






Route::get('/danhmuclop',[DanhMucLopController::class, 'danhmuclop']);
Route::post('/add_danhmuclop',[DanhMucLopController::class, 'add_danhmuclop']);
Route::post('/add_danhmuclop_excel',[DanhMucLopController::class, 'add_danhmuclop_excel']);
Route::get('/select_danhmuclop/{ma_dml}',[DanhMucLopController::class, 'select_danhmuclop']);
Route::get('/edit_danhmuclop/{ma_dml}',[DanhMucLopController::class, 'edit_danhmuclop']);
Route::post('/update_danhmuclop/{ma_dml}',[DanhMucLopController::class, 'update_danhmuclop']);
Route::get('/delete_danhmuclop',[DanhMucLopController::class, 'delete_danhmuclop']);
Route::post('/delete_danhmuclop_check',[DanhMucLopController::class, 'delete_danhmuclop_check']);
Route::get('/delete_all_danhmuclop',[DanhMucLopController::class, 'delete_all_danhmuclop']);





Route::get('/lop',[LopController::class, 'lop']);
Route::post('/add_lop',[LopController::class, 'add_lop']);
Route::post('/add_lop_excel',[LopController::class, 'add_lop_excel']);
Route::get('/select_lop/{ma_l}',[LopController::class, 'select_lop']);
Route::get('/edit_lop/{ma_l}',[LopController::class, 'edit_lop']);
Route::post('/update_lop/{ma_l}',[LopController::class, 'update_lop']);
Route::get('/delete_lop',[LopController::class, 'delete_lop']);
Route::get('/delete_all_lop',[LopController::class, 'delete_all_lop']);
Route::post('/delete_lop_check',[LopController::class, 'delete_lop_check']);
Route::get('/lop_luotxem',[LopController::class, 'lop_luotxem']);

Route::get('/lop_danhmuclop/{ma_dml}',[LopController::class, 'lop_danhmuclop']);
Route::post('/add_lop_danhmuclop/{ma_l}',[LopController::class, 'add_lop_danhmuclop']);
Route::get('/select_lop_danhmuclop/{ma_l}',[LopController::class, 'select_lop_danhmuclop']);
Route::get('/edit_lop_danhmuclop/{ma_l}',[LopController::class, 'edit_lop_danhmuclop']);
Route::post('/update_lop_danhmuclop/{ma_l}/{ma_dml}',[LopController::class, 'update_lop_danhmuclop']);
Route::get('/delete_lop_danhmuclop',[LopController::class, 'delete_lop_danhmuclop']);
Route::get('/delete_all_lop_danhmuclop/{ma_dml}',[LopController::class, 'delete_all_lop_danhmuclop']);
Route::post('/delete_lop_danhmuclop_check',[LopController::class, 'delete_lop_danhmuclop_check']);





Route::get('/danhsach/{ma_l}',[DanhSachController::class, 'danhsach']);
Route::get('/add_danhsach/{ma_l}/{ma_vc}',[DanhSachController::class, 'add_danhsach']);
Route::get('/delete_danhsach',[DanhSachController::class, 'delete_danhsach']);
Route::get('/delete_all_danhsach/{ma_l}',[DanhSachController::class, 'delete_all_danhsach']);
Route::get('/quyetdinh_dihoc_pdf/{ma_l}/{ma_vc}',[DanhSachController::class, 'quyetdinh_dihoc_pdf']);
Route::get('/danhsach_vienchuc_lop_pdf/{ma_l}',[DanhSachController::class, 'danhsach_vienchuc_lop_pdf']);
Route::get('/danhsach_vienchuc_lop_excel/{ma_l}',[DanhSachController::class, 'danhsach_vienchuc_lop_excel']);




Route::get('/quyetdinh/{ma_l}/{ma_vc}',[QuyetDinhController::class, 'quyetdinh']);
Route::post('/add_quyetdinh',[QuyetDinhController::class, 'add_quyetdinh']);
Route::get('/select_quyetdinh/{ma_qd}',[QuyetDinhController::class, 'select_quyetdinh']);
Route::get('/edit_quyetdinh/{ma_qd}',[QuyetDinhController::class, 'edit_quyetdinh']);
Route::post('/update_quyetdinh/{ma_qd}',[QuyetDinhController::class, 'update_quyetdinh']);
Route::get('/delete_quyetdinh',[QuyetDinhController::class, 'delete_quyetdinh']);
Route::get('/delete_all_quyetdinh/{ma_l}/{ma_vc}',[QuyetDinhController::class, 'delete_all_quyetdinh']);
Route::get('/quyetdinh_all',[QuyetDinhController::class, 'quyetdinh_all']);
Route::post('/delete_quyetdinh_check',[QuyetDinhController::class, 'delete_quyetdinh_check']);
Route::get('/delete_quyetdinh_all',[QuyetDinhController::class, 'delete_quyetdinh_all']);





Route::get('/ketqua/{ma_l}/{ma_vc}',[KetQuaController::class, 'ketqua']);
Route::post('/add_ketqua',[KetQuaController::class, 'add_ketqua']);
Route::post('/add_ketqua_excel',[KetQuaController::class, 'add_ketqua_excel']);
Route::get('/select_ketqua/{ma_kq}',[KetQuaController::class, 'select_ketqua']);
Route::get('/edit_ketqua/{ma_kq}',[KetQuaController::class, 'edit_ketqua']);
Route::post('/update_ketqua/{ma_kq}',[KetQuaController::class, 'update_ketqua']);
Route::get('/delete_ketqua',[KetQuaController::class, 'delete_ketqua']);
Route::post('/delete_ketqua_check',[KetQuaController::class, 'delete_ketqua_check']);
Route::get('/delete_all_ketqua/{ma_l}/{ma_vc}',[KetQuaController::class, 'delete_all_ketqua']);
Route::get('/ketqua_pdf/{ma_kq}',[KetQuaController::class, 'ketqua_pdf']);
Route::get('/ketqua_all',[KetQuaController::class, 'ketqua_all']);
Route::get('/delete_ketqua_all',[KetQuaController::class, 'delete_ketqua_all']);

Route::get('/vienchuc_ketqua_add/{ma_l}',[KetQuaController::class, 'vienchuc_ketqua_add']);
Route::post('/vienchuc_add_ketqua',[KetQuaController::class, 'vienchuc_add_ketqua']);





Route::get('/dunghoc/{ma_l}/{ma_vc}',[DungHocController::class, 'dunghoc']);
Route::post('/add_dunghoc',[DungHocController::class, 'add_dunghoc']);
Route::get('/select_dunghoc/{ma_dh}',[DungHocController::class, 'select_dunghoc']);
Route::get('/edit_dunghoc/{ma_dh}',[DungHocController::class, 'edit_dunghoc']);
Route::post('/update_dunghoc/{ma_dh}',[DungHocController::class, 'update_dunghoc']);
Route::get('/delete_dunghoc',[DungHocController::class, 'delete_dunghoc']);
Route::get('/delete_all_dunghoc/{ma_l}/{ma_vc}',[DungHocController::class, 'delete_all_dunghoc']);
Route::get('/dunghoc_all',[DungHocController::class, 'dunghoc_all']);
Route::post('/delete_dunghoc_check',[DungHocController::class, 'delete_dunghoc_check']);
Route::get('/delete_dunghoc_all',[DungHocController::class, 'delete_dunghoc_all']);





Route::get('/giahan/{ma_l}/{ma_vc}',[GiaHanController::class, 'giahan']);
Route::post('/add_giahan',[GiaHanController::class, 'add_giahan']);
Route::get('/select_giahan/{ma_gh}',[GiaHanController::class, 'select_giahan']);
Route::get('/edit_giahan/{ma_gh}',[GiaHanController::class, 'edit_giahan']);
Route::post('/update_giahan/{ma_gh}',[GiaHanController::class, 'update_giahan']);
Route::get('/delete_giahan',[GiaHanController::class, 'delete_giahan']);
Route::get('/delete_all_giahan/{ma_l}/{ma_vc}',[GiaHanController::class, 'delete_all_giahan']);
Route::post('/delete_giahan_check',[GiaHanController::class, 'delete_giahan_check']);
Route::get('/giahan_all',[GiaHanController::class, 'giahan_all']);
Route::get('/delete_giahan_all',[GiaHanController::class, 'delete_giahan_all']);






Route::get('/chuyen/{ma_l}/{ma_vc}',[ChuyenController::class, 'chuyen']);
Route::post('/add_chuyen',[ChuyenController::class, 'add_chuyen']);
Route::get('/select_chuyen/{ma_c}',[ChuyenController::class, 'select_chuyen']);
Route::get('/edit_chuyen/{ma_c}',[ChuyenController::class, 'edit_chuyen']);
Route::post('/update_chuyen/{ma_c}',[ChuyenController::class, 'update_chuyen']);
Route::get('/delete_chuyen',[ChuyenController::class, 'delete_chuyen']);
Route::get('/delete_all_chuyen/{ma_l}/{ma_vc}',[ChuyenController::class, 'delete_all_chuyen']);
Route::post('/delete_chuyen_check',[ChuyenController::class, 'delete_chuyen_check']);
Route::get('/chuyen_all',[ChuyenController::class, 'chuyen_all']);
Route::get('/delete_chuyen_all',[ChuyenController::class, 'delete_chuyen_all']);







Route::get('/thoihoc/{ma_l}/{ma_vc}',[ThoiHocController::class, 'thoihoc']);
Route::post('/add_thoihoc',[ThoiHocController::class, 'add_thoihoc']);
Route::get('/select_thoihoc/{ma_th}',[ThoiHocController::class, 'select_thoihoc']);
Route::get('/edit_thoihoc/{ma_th}',[ThoiHocController::class, 'edit_thoihoc']);
Route::post('/update_thoihoc/{ma_th}',[ThoiHocController::class, 'update_thoihoc']);
Route::get('/delete_thoihoc',[ThoiHocController::class, 'delete_thoihoc']);
Route::post('/delete_thoihoc_check',[ThoiHocController::class, 'delete_thoihoc_check']);
Route::get('/delete_all_thoihoc/{ma_l}/{ma_vc}',[ThoiHocController::class, 'delete_all_thoihoc']);
Route::get('/thoihoc_all',[ThoiHocController::class, 'thoihoc_all']);
Route::get('/delete_thoihoc_all',[ThoiHocController::class, 'delete_thoihoc_all']);






Route::get('/file',[FileController::class, 'file']);
Route::post('/add_file',[FileController::class, 'add_file']);
Route::get('/select_file/{ma_f}',[FileController::class, 'select_file']);
Route::get('/edit_file/{ma_f}',[FileController::class, 'edit_file']);
Route::post('/update_file/{ma_f}',[FileController::class, 'update_file']);
Route::get('/delete_file',[FileController::class, 'delete_file']);
Route::get('/delete_all_file',[FileController::class, 'delete_all_file']);
Route::get('/file_luottai',[FileController::class, 'file_luottai']);
Route::post('/delete_file_check',[FileController::class, 'delete_file_check']);

Route::get('/chauluc',[ChauLucController::class, 'chauluc']);
Route::post('/add_chauluc',[ChauLucController::class, 'add_chauluc']);
Route::post('/add_chauluc_excel',[ChauLucController::class, 'add_chauluc_excel']);
Route::get('/select_chauluc/{ma_kv}',[ChauLucController::class, 'select_chauluc']);
Route::get('/edit_chauluc/{ma_kv}',[ChauLucController::class, 'edit_chauluc']);
Route::post('/update_chauluc/{ma_kv}',[ChauLucController::class, 'update_chauluc']);
Route::get('/delete_chauluc',[ChauLucController::class, 'delete_chauluc']);
Route::get('/delete_all_chauluc',[ChauLucController::class, 'delete_all_chauluc']);
Route::post('/delete_chauluc_check',[ChauLucController::class, 'delete_chauluc_check']);




Route::get('/khuvuc/{ma_cl}',[KhuVucController::class, 'khuvuc']);
Route::post('/add_khuvuc',[KhuVucController::class, 'add_khuvuc']);
Route::post('/add_khuvuc_excel',[KhuVucController::class, 'add_khuvuc_excel']);
Route::get('/select_khuvuc/{ma_kv}',[KhuVucController::class, 'select_khuvuc']);
Route::get('/edit_khuvuc/{ma_kv}',[KhuVucController::class, 'edit_khuvuc']);
Route::post('/update_khuvuc/{ma_kv}',[KhuVucController::class, 'update_khuvuc']);
Route::get('/delete_khuvuc',[KhuVucController::class, 'delete_khuvuc']);
Route::get('/delete_all_khuvuc/{ma_cl}',[KhuVucController::class, 'delete_all_khuvuc']);
Route::post('/delete_khuvuc_check',[KhuVucController::class, 'delete_khuvuc_check']);



Route::get('/quocgia/{ma_kv}',[QuocGiaController::class, 'quocgia']);
Route::post('/add_quocgia',[QuocGiaController::class, 'add_quocgia']);
Route::post('/add_quocgia_excel',[QuocGiaController::class, 'add_quocgia_excel']);
Route::get('/select_quocgia/{ma_qg}',[QuocGiaController::class, 'select_quocgia']);
Route::get('/edit_quocgia/{ma_qg}',[QuocGiaController::class, 'edit_quocgia']);
Route::post('/update_quocgia/{ma_qg}',[QuocGiaController::class, 'update_quocgia']);
Route::get('/delete_quocgia',[QuocGiaController::class, 'delete_quocgia']);
Route::get('/delete_all_quocgia/{ma_kv}',[QuocGiaController::class, 'delete_all_quocgia']);
Route::post('/delete_quocgia_check',[QuocGiaController::class, 'delete_quocgia_check']);













