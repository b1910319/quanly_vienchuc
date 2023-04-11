<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\Chuyen;
use App\Models\DanToc;
use App\Models\DungHoc;
use App\Models\File;
use App\Models\GiaDinh;
use App\Models\GiaHan;
use App\Models\HeDaoTao;
use App\Models\HinhThucKhenThuong;
use App\Models\Huyen;
use App\Models\KetQua;
use App\Models\KhenThuong;
use App\Models\Khoa;
use App\Models\KyLuat;
use App\Models\LoaiBangCap;
use App\Models\LoaiKhenThuong;
use App\Models\LoaiKyLuat;
use App\Models\Lop;
use App\Models\Ngach;
use App\Models\NoiSinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QueQuan;
use App\Models\ThoiHoc;
use App\Models\ThuongBinh;
use App\Models\Tinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use App\Models\Xa;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function index(){
    $date = Carbon::parse(Carbon::now()->addMonths(2))->format('Y-m-d');
    $list_lop = Lop::join('quocgia', 'lop.ma_qg', '=', 'quocgia.ma_qg')
      ->orderBy('ma_l', 'desc')
      ->where('ngaybatdau_l', '>=', $date)
      ->get();
    return view('login')
      ->with('list_lop', $list_lop);
  }
  public function home(){
    $this->check_login();
    $title = 'Trang chủ';
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();

    $count_vienchuc = VienChuc::select(DB::raw('count(ma_vc) as sum'))
      ->where('status_vc', '<>', '2')
      ->get();
    $count_vienchuc_khoa = VienChuc::select(DB::raw('count(ma_vc) as sum'))
      ->where('status_vc', '<>', '2')
      ->where('vienchuc.ma_k', $ma_k)
      ->get();
    $count_vienchuc_nghihuu = VienChuc::select(DB::raw('count(ma_vc) as sum'))
      ->where('status_vc', '2')
      ->get();
    $count_vienchuc_nghihuu_khoa = VienChuc::select(DB::raw('count(ma_vc) as sum'))
      ->where('status_vc', '2')
      ->where('vienchuc.ma_k', $ma_k)
      ->get();
    $count_vienchuc_kyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
      ->where('status_vc', '<>', '2')
      ->select(DB::raw('count(DISTINCT kyluat.ma_vc) as sum'))
      ->get();
    $count_vienchuc_kyluat_khoa = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
      ->where('vienchuc.ma_k', $ma_k)
      ->where('status_vc', '<>', '2')
      ->select(DB::raw('count(DISTINCT kyluat.ma_vc) as sum'))
      ->get();
    $count_vienchuc_khenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
      ->select(DB::raw('count(DISTINCT khenthuong.ma_vc) as sum'))
      ->where('status_vc', '<>', '2')
      ->get();
    $count_vienchuc_khenthuong_khoa = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
      ->select(DB::raw('count(DISTINCT khenthuong.ma_vc) as sum'))
      ->where('status_vc', '<>', '2')
      ->where('vienchuc.ma_k', $ma_k)
      ->get();

    $date = Carbon::parse(Carbon::now()->addMonths(2))->format('Y-m-d');
    // echo $date;
    $list_lop = Lop::join('quocgia', 'lop.ma_qg', '=', 'quocgia.ma_qg')
      ->orderBy('ma_l', 'desc')
      ->where('ngaybatdau_l', '>=', $date)
      ->get();
    $list_file = File::where('status_f', '<>', '1')
      ->orderBy('ma_f', 'desc')
      ->get();
    $vienchuc = VienChuc::find($ma_vc);
    $list_khoa = Khoa::orderBy('ten_k', 'asc')
      ->get();
    $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
      ->get();
    $list_ngach = Ngach::orderBy('ten_n', 'asc')
      ->get();
    $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
      ->get();
    $truongkhoa = VienChuc::where('ma_k', $ma_k)
      ->where('ma_cv', '6')
      ->get();
    $ketqua = KetQua::where('status_kq', '1')
      ->where('ma_vc', $ma_vc)
      ->first();
    $dunghoc = DungHoc::where('status_dh', '1')
      ->where('ma_vc', $ma_vc)
      ->first();
    $giahan = GiaHan::where('status_gh', '1')
      ->where('ma_vc', $ma_vc)
      ->first();
    $chuyen = Chuyen::where('status_c', '1')
      ->where('ma_vc', $ma_vc)
      ->first();
    $thoihoc = ThoiHoc::where('status_th', '1')
      ->where('ma_vc', $ma_vc)
      ->first();
    $ketqua_an = KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
      ->where('status_kq', '1')
      ->where('ma_vc', $ma_vc)
      ->get();
    $dunghoc_an = DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
      ->where('status_dh', '1')
      ->where('ma_vc', $ma_vc)
      ->get();
    $giahan_an = GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
      ->where('status_gh', '1')
      ->where('ma_vc', $ma_vc)
      ->get();
    $chuyen_an = Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
      ->where('status_c', '1')
      ->where('ma_vc', $ma_vc)
      ->get();
    $thoihoc_an = ThoiHoc::join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
      ->where('status_th', '1')
      ->where('ma_vc', $ma_vc)
      ->get();
    return view('home.home')
      ->with('vienchuc', $vienchuc)
      ->with('truongkhoa', $truongkhoa)
      ->with('title', $title)

      ->with('count_vienchuc', $count_vienchuc)
      ->with('count_vienchuc_nghihuu', $count_vienchuc_nghihuu)
      ->with('count_vienchuc_kyluat', $count_vienchuc_kyluat)
      ->with('count_vienchuc_khenthuong', $count_vienchuc_khenthuong)
      ->with('count_vienchuc_khoa', $count_vienchuc_khoa)
      ->with('count_vienchuc_nghihuu_khoa', $count_vienchuc_nghihuu_khoa)
      ->with('count_vienchuc_kyluat_khoa', $count_vienchuc_kyluat_khoa)
      ->with('count_vienchuc_khenthuong_khoa', $count_vienchuc_khenthuong_khoa)

      ->with('list_lop', $list_lop)
      ->with('list_file', $list_file)
      ->with('list_khoa', $list_khoa)
      ->with('list_chucvu', $list_chucvu)
      ->with('list_ngach', $list_ngach)
      ->with('list_dantoc', $list_dantoc)

      ->with('ketqua_an', $ketqua_an)
      ->with('dunghoc_an', $dunghoc_an)
      ->with('giahan_an', $giahan_an)
      ->with('chuyen_an', $chuyen_an)
      ->with('thoihoc_an', $thoihoc_an)
      ->with('ketqua', $ketqua)
      ->with('dunghoc', $dunghoc)
      ->with('giahan', $giahan)
      ->with('chuyen', $chuyen)
      ->with('thoihoc', $thoihoc)

      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_admin', $phanquyen_admin);
  }
  public function thongtin_canhan(){
    $this->check_login();
    $title = 'Thông tin cá nhân';
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $vienchuc = VienChuc::find($ma_vc);
    $list_khoa = Khoa::get();
    $list_chucvu = ChucVu::get();
    $list_bac =  Bac::get();
    $list_ngach = Ngach::get();
    $list_dantoc = DanToc::get();
    $list_tongiao = TonGiao::get();
    $list_thuongbinh = ThuongBinh::get();
    return view('thongtin_vienchuc.thongtin_canhan')
      ->with('title', $title)

      ->with('vienchuc', $vienchuc)

      ->with('list_khoa', $list_khoa)
      ->with('list_chucvu', $list_chucvu)
      ->with('list_bac', $list_bac)
      ->with('list_ngach', $list_ngach)
      ->with('list_dantoc', $list_dantoc)
      ->with('list_tongiao', $list_tongiao)
      ->with('list_thuongbinh', $list_thuongbinh)

      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)

      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
  }
  public function thongtin_canhan_edit($ma_vc){
    $this->check_login();
    $title = 'Cập nhật thông tin cá nhân';
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    $edit = VienChuc::find($ma_vc);
    if($ma_vc == $ma_vc_login){
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_bac =  Bac::get();
      $list_ngach = Ngach::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_tinh = Tinh::get();
      $list_huyen = Huyen::get();
      $list_xa = Xa::get();
      $noisinh = NoiSinh::where('ma_vc', $ma_vc)
        ->get();
      $quequan = QueQuan::where('ma_vc', $ma_vc)
        ->get();
      return view('thongtin_vienchuc.thongtin_canhan_edit')
        ->with('title', $title)

        ->with('edit', $edit)

        ->with('list_tinh', $list_tinh)
        ->with('list_huyen', $list_huyen)
        ->with('list_xa', $list_xa)
        ->with('noisinh', $noisinh)
        ->with('quequan', $quequan)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_bac', $list_bac)
        ->with('list_ngach', $list_ngach)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)

        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function update_thongtin_canhan(Request $request, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    if($ma_vc_login == $ma_vc){
      $data = $request->all();
      $vienchuc = VienChuc::find($ma_vc);
      $vienchuc->ma_k = $data['ma_k'];
      $vienchuc->ma_cv = $data['ma_cv'];
      $vienchuc->ma_n = $data['ma_n'];
      $vienchuc->ma_b = $data['ma_b'];
      $vienchuc->ma_dt = $data['ma_dt'];
      $vienchuc->ma_tg = $data['ma_tg'];
      $vienchuc->ma_tb = $data['ma_tb'];
      $vienchuc->user_vc = $data['user_vc'];
      $vienchuc->hoten_vc = $data['hoten_vc'];
      $vienchuc->sdt_vc = $data['sdt_vc'];
      $get_image = $request->file('hinh_vc');
      if($get_image){
        $new_image = time().rand(0,999).'.'.$get_image->getClientOriginalExtension();
        if($vienchuc->hinh_vc){
          unlink('public/uploads/vienchuc/'.$vienchuc->hinh_vc);
        }
        $get_image->move('public/uploads/vienchuc', $new_image);
        $vienchuc->hinh_vc = $new_image;
      }
      $vienchuc->tenkhac_vc = $data['tenkhac_vc'];
      $vienchuc->ngaysinh_vc = $data['ngaysinh_vc'];
      $vienchuc->gioitinh_vc = $data['gioitinh_vc'];
      $vienchuc->thuongtru_vc = $data['thuongtru_vc'];
      $vienchuc->hientai_vc = $data['hientai_vc'];
      $vienchuc->hocphangiangday_vc = $data['hocphangiangday_vc'];
      $vienchuc->nghekhiduoctuyen_vc = $data['nghekhiduoctuyen_vc'];
      $vienchuc->ngaytuyendung_vc = $data['ngaytuyendung_vc'];
      $vienchuc->congviecchinhgiao_vc = $data['congviecchinhgiao_vc'];
      $vienchuc->phucap_vc = $data['phucap_vc'];
      $vienchuc->trinhdophothong_vc = $data['trinhdophothong_vc'];
      $vienchuc->chinhtri_vc = $data['chinhtri_vc'];
      $vienchuc->quanlynhanuoc_vc = $data['quanlynhanuoc_vc'];
      $vienchuc->ngoaingu_vc = $data['ngoaingu_vc'];
      $vienchuc->tinhoc_vc = $data['tinhoc_vc'];
      $vienchuc->ngayvaodang_vc = $data['ngayvaodang_vc'];
      $vienchuc->ngaychinhthuc_vc = $data['ngaychinhthuc_vc'];
      $vienchuc->ngaynhapngu_vc = $data['ngaynhapngu_vc'];
      $vienchuc->ngayxuatngu_vc = $data['ngayxuatngu_vc'];
      $vienchuc->quanham_vc = $data['quanham_vc'];
      $vienchuc->ngayhuongbac_vc = $data['ngayhuongbac_vc'];
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ngach = Ngach::find($data['ma_n']);
      $vienchuc->ngaynangbac_vc = Carbon::parse(Carbon::now()->addYears($ngach->sonamnangbac_n))->format('Y-m-d');
      $vienchuc->danhhieucao_vc = $data['danhhieucao_vc'];
      $vienchuc->sotruong_vc = $data['sotruong_vc'];
      $vienchuc->chieucao_vc = $data['chieucao_vc'];
      $vienchuc->cannang_vc = $data['cannang_vc'];
      $vienchuc->nhommau_vc = $data['nhommau_vc'];
      $vienchuc->chinhsach_vc = $data['chinhsach_vc'];
      $vienchuc->cccd_vc = $data['cccd_vc'];
      $vienchuc->ngaycapcccd_vc = $data['ngaycapcccd_vc'];
      $vienchuc->bhxh_vc = $data['bhxh_vc'];
      $vienchuc->lichsubanthan1_vc = $data['lichsubanthan1_vc'];
      $vienchuc->lichsubanthan2_vc = $data['lichsubanthan2_vc'];
      $vienchuc->lichsubanthan3_vc = $data['lichsubanthan3_vc'];
      $vienchuc->ngaybatdaulamviec_vc = $data['ngaybatdaulamviec_vc'];
      $vienchuc->status_vc = $data['status_vc'];
      $vienchuc->save();
      $noisinh = NoiSinh::where('ma_vc', $ma_vc)
        ->first();
      $noisinh->ma_t = $data['ma_t_ns'];
      $noisinh->ma_h = $data['ma_h_ns'];
      $noisinh->ma_x = $data['ma_x_ns'];
      $noisinh->diachi_ns = $data['diachi_ns'];
      $noisinh->save();
      $quequan = QueQuan::where('ma_vc', $ma_vc)
      ->first();
      $quequan->ma_t = $data['ma_t_qq'];
      $quequan->ma_h = $data['ma_h_qq'];
      $quequan->ma_x = $data['ma_x_qq'];
      $quequan->diachi_qq = $data['diachi_qq'];
      $quequan->save();
      return Redirect::to('/thongtin_canhan');
    }else{
      return Redirect::to('/home');
    }
    
  }

  public function thongtin_giadinh(){
    $this->check_login();
    $title = 'Thông tin gia đình viên chức';
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $list = GiaDinh::where('ma_vc', $ma_vc)
    ->get();
    return view('thongtin_vienchuc.thongtin_giadinh')
      ->with('title', $title)

      ->with('list', $list)
      ->with('ma_vc', $ma_vc)

      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)

      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
  }
  public function add_thongtin_giadinh(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $data = $request->all();
    $giadinh = new GiaDinh();
    $giadinh->moiquanhe_gd = $data['moiquanhe_gd'];
    $giadinh->hoten_gd = $data['hoten_gd'];
    $giadinh->sdt_gd = $data['sdt_gd'];
    $giadinh->ngaysinh_gd = $data['ngaysinh_gd'];
    $giadinh->nghenghiep_gd = $data['nghenghiep_gd'];
    $giadinh->ma_vc = $ma_vc;
    $giadinh->save();
    return Redirect::to('/thongtin_giadinh');
  }
  public function thongtin_giadinh_edit($ma_gd){
    $this->check_login();
    $title = 'Cập nhật thông tin';
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    
    $edit = GiaDinh::find($ma_gd);
    return view('thongtin_vienchuc.thongtin_giadinh_edit')
      ->with('title', $title)

      ->with('edit', $edit)

      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)

      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
  }
  public function update_thongtin_giadinh(Request $request, $ma_gd){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $data = $request->all();
    $giadinh = GiaDinh::find($ma_gd);
    $giadinh->moiquanhe_gd = $data['moiquanhe_gd'];
    $giadinh->hoten_gd = $data['hoten_gd'];
    $giadinh->sdt_gd = $data['sdt_gd'];
    $giadinh->ngaysinh_gd = $data['ngaysinh_gd'];
    $giadinh->nghenghiep_gd = $data['nghenghiep_gd'];
    $giadinh->ma_vc = $ma_vc;
    $giadinh->save();
    return Redirect::to('/thongtin_giadinh');
  }
  public function delete_thongtin_giadinh(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    if($request->ajax()){
      $id =$request->id;
      if($id != null){
        $giadinh = GiaDinh::find($id);
        if($giadinh->ma_vc == $ma_vc){
          GiaDinh::find($id)->delete();
        }
      }
    }
  }
  public function delete_thongtin_giadinh_check(Request $request){
    $this->check_login();
    $ma_gd = $request->ma_gd;
    GiaDinh::whereIn('ma_gd', $ma_gd)->delete();
    return redirect()->back();
  }
  public function delete_all_thongtin_giadinh(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $list = GiaDinh::get();
    foreach($list as $key => $giadinh){
      if($giadinh->ma_vc == $ma_vc){
        $giadinh->delete();
      }
    }
    return Redirect::to('thongtin_giadinh');
  }

  public function thongtin_bangcap(){
    $this->check_login();
    $title = 'Thông tin gia đình viên chức';
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $list_loaibangcap = LoaiBangCap::get();
    $list_hedaotao = HeDaoTao::get();
    $list = BangCap::where('ma_vc', $ma_vc)
      ->get();
    return view('thongtin_vienchuc.thongtin_bangcap')
      ->with('title', $title)

      ->with('list', $list)
      ->with('ma_vc', $ma_vc)

      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)

      ->with('list_loaibangcap', $list_loaibangcap)
      ->with('list_hedaotao', $list_hedaotao)

      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
  }

  public function thongtin_khenthuong(){
    $this->check_login();
    $title = 'Thông tin gia đình viên chức';
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $list_loaikhenthuong = LoaiKhenThuong::get();
    $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
    $list = KhenThuong::where('ma_vc', $ma_vc)
      ->get();
    return view('thongtin_vienchuc.thongtin_khenthuong')
      ->with('title', $title)

      ->with('list', $list)
      ->with('ma_vc', $ma_vc)

      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)

      ->with('list_loaikhenthuong', $list_loaikhenthuong)
      ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)

      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
  }

  public function thongtin_kyluat(){
    $this->check_login();
    $title = 'Thông tin gia đình viên chức';
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $list_loaikyluat = LoaiKyLuat::get();
    $list = KyLuat::where('ma_vc', $ma_vc)
      ->get();
    return view('thongtin_vienchuc.thongtin_kyluat')
      ->with('title', $title)

      ->with('list', $list)
      ->with('ma_vc', $ma_vc)

      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)

      ->with('list_loaikyluat', $list_loaikyluat)

      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
  }

  public function thongtin_lophoc(){
    $this->check_login();
    $title = 'Thông tin gia đình viên chức';
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $list = VienChuc::join('danhsach', 'vienchuc.ma_vc', '=', 'danhsach.ma_vc')
      ->join('lop', 'lop.ma_l', '=', 'danhsach.ma_l')
      ->where('vienchuc.ma_vc', $ma_vc)
      ->get();
    $ketqua = KetQua::where('status_kq', '<>', '1')
      ->get();
    $giahan = GiaHan::where('status_gh', '<>', '1')
      ->get();
    $dunghoc = DungHoc::where('status_dh', '<>', '1')
      ->get();
    $thoihoc = ThoiHoc::where('status_th', '<>', '1')
      ->get();
    $chuyen = Chuyen::where('status_c', '<>', '1')
      ->get();
    return view('thongtin_vienchuc.thongtin_lophoc')
      ->with('title', $title)

      ->with('list', $list)
      ->with('ma_vc', $ma_vc)

      ->with('ketqua', $ketqua)
      ->with('giahan', $giahan)
      ->with('dunghoc', $dunghoc)
      ->with('thoihoc', $thoihoc)
      ->with('chuyen', $chuyen)

      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)

      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
  }
  public function change_pass(){
    $this->check_login();
    $title = 'Đổi mật khẩu';
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $vienchuc = VienChuc::find($ma_vc);
    return view('home.change_pass')
      ->with('title', $title)

      ->with('ma_vc', $ma_vc)
      ->with('vienchuc', $vienchuc)

      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)

      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
  }
  public function check_pass_cu(Request $request){
    $this->check_login();
    if($request->ajax()){
      $pass_cu = md5($request->pass_cu);
      $user_vc = $request->user_vc;
      if($pass_cu != null && $user_vc != null){
        $vienchuc = VienChuc::where('user_vc', $user_vc)
          ->where('pass_vc', $pass_cu)
          ->first();
        if(isset($vienchuc)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function doi_matkhau(Request $request){
    $this->check_login();
    $user_vc = $request->user_vc;
    $pass_cu = md5($request->pass_cu);
    $pass_moi = md5($request->pass_moi);
    $vienchuc = VienChuc::where('user_vc', $user_vc)
      ->where('pass_vc', $pass_cu)
      ->first();
    if(isset($vienchuc)){
      $vienchuc_update = VienChuc::find($vienchuc->ma_vc);
      $vienchuc_update->pass_vc = VienChuc::find($vienchuc->ma_vc)->update(['pass_vc' => $pass_moi]);
      session()->put('hoten_vc',null);
      session()->put('ma_vc',null);
      session()->put('ma_k',null);
      session()->put('hinh_vc',null);
      return Redirect::to('/login');
    }else{
      return Redirect::to('/change_pass');
    }
  }
}
