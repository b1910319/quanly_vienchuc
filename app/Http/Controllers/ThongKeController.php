<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\Chuyen;
use App\Models\DungHoc;
use App\Models\GiaHan;
use App\Models\HeDaoTao;
use App\Models\HinhThucKhenThuong;
use App\Models\KetQua;
use App\Models\Khoa;
use App\Models\LoaiBangCap;
use App\Models\LoaiKhenThuong;
use App\Models\LoaiKyLuat;
use App\Models\Lop;
use App\Models\Ngach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\ThoiHoc;
use App\Models\Tinh;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use PDF;

class ThongKeController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function thongke_qltt(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, ngach.ma_n'))
        ->groupBy('ngach.ma_n')
        ->get();
      $count_chucvu = '';
      $count_khoa = '';
      $count_nghihuu = '';
      $count_nghihuu_time ='';
      $count_nghihuu_khoa = '';
      $count_tinh = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt',$count_hedaotao_ma_hdt)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_ngach(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_ngach_ma_n = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->where('status_vc', '<>', '2')
        ->where('ngach.ma_n', $data['ma_n'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, ngach.ma_n'))
        ->groupBy('ngach.ma_n')
        ->get();
      $count_chucvu = '';
      $count_khoa = '';
      $count_nghihuu = '';
      $count_nghihuu_time ='';
      $count_nghihuu_khoa = '';
      $count_tinh = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('ma_n', $data['ma_n'])
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt',$count_hedaotao_ma_hdt)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_ngach_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->join('bac', 'bac.ma_b', 'vienchuc.ma_b')
      ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
      ->where('status_vc', '<>', '2')
      ->orderBy('ten_n', 'asc')
      ->get();
      $pdf = PDF::loadView('pdf.pdf_thongtin_vienchuc', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_ma_ngach_pdf($ma_n){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->join('bac', 'bac.ma_b', 'vienchuc.ma_b')
      ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
      ->where('ngach.ma_n', $ma_n)
      ->where('status_vc', '<>', '2')
      ->orderBy('ten_n', 'asc')
      ->get();
      $pdf = PDF::loadView('pdf.pdf_thongtin_vienchuc', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_lbc(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaibangcap.ma_lbc'))
        ->groupBy('loaibangcap.ma_lbc')
        ->get();
      $count_hedaotao = '';
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu = '';
      $count_tinh = '';
      $count_nghihuu_time ='';
      $count_nghihuu_khoa = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt',$count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loaibangcap(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_lbc =VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->where('status_vc', '<>', '2')
        ->where('loaibangcap.ma_lbc', $data['ma_lbc'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaibangcap.ma_lbc'))
        ->groupBy('loaibangcap.ma_lbc')
        ->get();
      $count_hedaotao = '';
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu = '';
      $count_tinh = '';
      $count_nghihuu_time ='';
      $count_nghihuu_khoa = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_ngach_ma_n = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt',$count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('ma_lbc', $data['ma_lbc'])
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_lbc_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->where('status_vc', '<>', '2')
      ->orderBy('ten_lbc', 'asc')
      ->get();
      $pdf = PDF::loadView('pdf.pdf_loaibangcap', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loaibangcap_pdf($ma_lbc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->where('loaibangcap.ma_lbc', $ma_lbc)
      ->where('status_vc', '<>', '2')
      ->orderBy('ten_lbc', 'asc')
      ->get();
      $pdf = PDF::loadView('pdf.pdf_loaibangcap', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_hdt_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->where('status_vc', '<>', '2')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->orderBy('ten_hdt', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_hedaotao', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_chucvu(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_nghihuu_khoa = '';
      $count_ngach_ma_n = '';
      $count_chucvu = VienChuc::join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, chucvu.ma_cv'))
        ->where('status_vc', '<>', '2')
        ->groupBy('chucvu.ma_cv')
        ->get();
      $count_khoa ='';
      $count_nghihuu = '';
      $count_tinh = '';
      $count_nghihuu_time ='';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt',$count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_cv(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_nghihuu_khoa = '';
      $count_chucvu = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $count_cv = VienChuc::join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, chucvu.ma_cv'))
        ->where('status_vc', '<>', '2')
        ->where('chucvu.ma_cv', $data['ma_cv'])
        ->groupBy('chucvu.ma_cv')
        ->get();
      $count_khoa ='';
      $count_nghihuu = '';
      $count_tinh = '';
      $count_nghihuu_time ='';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt',$count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('ma_cv', $data['ma_cv'])
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_chucvu_pdf(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('chucvu.ma_cv', $data['ma_cv'])
        ->where('status_vc', '<>', '2')
        ->orderBy('hoten_vc', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_chucvu', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_cv_pdf($ma_cv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->where('chucvu.ma_cv', $ma_cv)
      ->where('status_vc', '<>', '2')
      ->orderBy('ten_cv', 'asc')
      ->get();
      $pdf = PDF::loadView('pdf.pdf_chucvu', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_chucvu_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->where('status_vc', '<>', '2')
      ->orderBy('ten_cv', 'asc')
      ->get();
      $pdf = PDF::loadView('pdf.pdf_chucvu', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_khoa(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa =VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
        ->groupBy('khoa.ma_k')
        ->get();
      $count_nghihuu = '';
      $count_tinh = '';
      $count_nghihuu_time ='';
      $count_nghihuu_khoa = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('count_hedaotao_ma_hdt', $count_hedaotao_ma_hdt)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_khoa_ma_k(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_khoa_ma_k =VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
        ->where('status_vc', '<>', '2')
        ->where('khoa.ma_k', $data['ma_k'])
        ->groupBy('khoa.ma_k')
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu_khoa = '';
      $count_nghihuu = '';
      $count_quequan_tinh ='';
      $count_nghihuu_time = '';
      $count_tinh = '';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('count_hedaotao_ma_hdt', $count_hedaotao_ma_hdt)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('ma_k', $data['ma_k'])
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_khoa_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->orderBy('hoten_vc', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_khoa', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_khoa_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('status_vc', '<>', '2')
        ->orderBy('ten_k', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_khoa', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_hdt(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, hedaotao.ma_hdt'))
        ->groupBy('hedaotao.ma_hdt')
        ->get();
      $count_ngach = '';
      $count_hedaotao_ma_hdt = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu = '';
      $count_tinh = '';
      $count_nghihuu_time ='';
      $count_nghihuu_khoa = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt',$count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_hedaotao(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_hedaotao_ma_hdt = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->where('status_vc', '<>', '2')
        ->where('hedaotao.ma_hdt', $data['ma_hdt'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, hedaotao.ma_hdt'))
        ->groupBy('hedaotao.ma_hdt')
        ->get();
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu = '';
      $count_tinh = '';
      $count_nghihuu_time ='';
      $count_nghihuu_khoa = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('ma_hdt', $data['ma_hdt'])
        ->with('count_hedaotao_ma_hdt', $count_hedaotao_ma_hdt)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_hedaotao_pdf($ma_hdt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
      ->where('hedaotao.ma_hdt', $ma_hdt)
      ->where('status_vc', '<>', '2')
      ->orderBy('hoten_vc', 'asc')
      ->get();
      $pdf = PDF::loadView('pdf.pdf_hedaotao', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_hdt_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->where('status_vc', '<>', '2')
        ->orderBy('hoten_vc', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_hedaotao', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_nghihuu(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu_time ='';
      $count_hedaotao_ma_hdt = '';
      $count_nghihuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('thoigiannghi_vc', '<>', ' ')
        ->where('status_vc', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, thoigiannghi_vc '))
        ->groupBy('thoigiannghi_vc')
        ->get();
      $count_tinh = '';
      $count_nghihuu_khoa = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt', $count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_nghihuu_time(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu_khoa = '';
      $count_nghihuu = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $count_nghihuu_time = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('thoigiannghi_vc', '<>', ' ')
        ->where('status_vc', '2')
        ->whereBetween('thoigiannghi_vc', [$data['batdau'], $data['ketthuc']])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, thoigiannghi_vc '))
        ->groupBy('thoigiannghi_vc')
        ->get();
      $count_tinh = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt', $count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('batdau', $data['batdau'])
        ->with('ketthuc', $data['ketthuc'])
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_nghihuu_time_pdf($batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->whereBetween('thoigiannghi_vc', [$batdau, $ketthuc])
        ->where('status_vc', '2')
        ->orderBy('hoten_vc', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_nghihuu', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_nghihuu_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('thoigiannghi_vc', '<>', ' ')
        ->where('status_vc', '2')
        ->orderBy('hoten_vc', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_nghihuu', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_nghihuu_khoa(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu = '';
      $count_nghihuu_time = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $count_nghihuu_khoa = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('thoigiannghi_vc', '<>', ' ')
        ->where('status_vc', '2')
        ->where('vienchuc.ma_k', $data['ma_k'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, thoigiannghi_vc '))
        ->groupBy('thoigiannghi_vc')
        ->get();
      $count_tinh = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt', $count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('ma_k', $data['ma_k'])
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_nghihuu_khoa_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('thoigiannghi_vc', '<>', ' ')
        ->where('status_vc', '2')
        ->orderBy('hoten_vc', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_nghihuu', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_quequan(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu_time ='';
      $count_nghihuu = '';
      $count_quequan_tinh ='';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $count_tinh = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->where('status_vc', '<>', '2')
        ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, tinh.ma_t'))
        ->groupBy('tinh.ma_t')
        ->get();
      $count_nghihuu_khoa = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt', $count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_quequan_tinh(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = '';
      $count_hedaotao = '';
      $count_ngach = '';
      $count_chucvu = '';
      $count_khoa ='';
      $count_nghihuu_time ='';
      $count_nghihuu = '';
      $count_tinh = '';
      $count_khoa_ma_k ='';
      $count_hedaotao_ma_hdt = '';
      $count_cv = '';
      $count_lbc = '';
      $count_ngach_ma_n = '';
      $count_quequan_tinh =VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
        ->where('status_vc', '<>', '2')
        ->where('tinh.ma_t', $data['ma_t'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, tinh.ma_t'))
        ->groupBy('tinh.ma_t')
        ->get();
      $count_nghihuu_khoa = '';
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('count_ngach_ma_n', $count_ngach_ma_n)
        ->with('count_lbc', $count_lbc)
        ->with('count_cv', $count_cv)
        ->with('count_hedaotao_ma_hdt', $count_hedaotao_ma_hdt)
        ->with('count_khoa_ma_k', $count_khoa_ma_k)
        ->with('count_nghihuu_khoa', $count_nghihuu_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('count_quequan_tinh', $count_quequan_tinh)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_nghihuu_time', $count_nghihuu_time)
        ->with('count_nghihuu', $count_nghihuu)
        ->with('count_tinh', $count_tinh)
        ->with('list_tinh', $list_tinh)
        ->with('ma_t', $data['ma_t'])
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_quequan_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->orderBy('ten_t', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_quequan', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_quequan_tinh_pdf($ma_t){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $vienchuc = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('quequan.ma_t', $ma_t)
        ->where('status_vc', '<>', '2')
        ->orderBy('ten_t', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_quequan', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }




  public function thongke_qlktkl(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaikhenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $count_hinhthuckhenthuong = '';
      $count_khoa = '';
      $count_khenthuong_time ='';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_ma_khoa = '';
      $count_kl_thoigian ='';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_khoa', $count_khoa)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_lkt(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaikhenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_hinhthuckhenthuong = '';
      $count_khoa = '';
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $count_khenthuong_time ='';
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_thoigian = '';
      $count_kl_ma_khoa ='';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_khoa', $count_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_ma_lkt(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaikhenthuong = '';
      $count_ma_lkt = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_vc', '<>', '2')
        ->where('loaikhenthuong.ma_lkt', $data['ma_lkt'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_hinhthuckhenthuong = '';
      $count_khoa = '';
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $count_khenthuong_time ='';
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_ma_khoa = '';
      $count_kl_thoigian ='';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian',$count_kl_thoigian)
        ->with('count_kl_ma_khoa',$count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('ma_lkt', $data['ma_lkt'])
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_khoa', $count_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_lkt_pdf($ma_lkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('loaikhenthuong.ma_lkt', $ma_lkt)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_khenthuong', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_lkt_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->orderBy('loaikhenthuong.ten_lkt', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_khenthuong', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_htkt(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_hinhthuckhenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, hinhthuckhenthuong.ma_htkt'))
        ->groupBy('hinhthuckhenthuong.ma_htkt')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_loaikhenthuong = '';
      $count_khoa = '';
      $count_khenthuong_time ='';
      $count_kl_ma_khoa ='';
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_thoigian = '';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_khoa', $count_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_ma_htkt(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_hinhthuckhenthuong = '';
      $count_ma_htkt = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('status_vc', '<>', '2')
        ->where('hinhthuckhenthuong.ma_htkt', $data['ma_htkt'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, hinhthuckhenthuong.ma_htkt'))
        ->groupBy('hinhthuckhenthuong.ma_htkt')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_loaikhenthuong = '';
      $count_khoa = '';
      $count_khenthuong_time ='';
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_ma_khoa = '';
      $count_kl_thoigian ='';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian',$count_kl_thoigian)
        ->with('count_kl_ma_khoa',$count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_khoa', $count_khoa)
        ->with('ma_htkt', $data['ma_htkt'])
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_htkt_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->orderBy('hinhthuckhenthuong.ten_htkt', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_khenthuong', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_htkt_pdf($ma_htkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('hinhthuckhenthuong.ma_htkt', $ma_htkt)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_khenthuong', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_thoigian(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_khenthuong_time = '';
      $count_kt_time = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->where('status_vc', '<>', '2')
        ->whereBetween('ngay_kt', [$data['batdau'], $data['ketthuc']])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khenthuong.ngay_kt'))
        ->groupBy('khenthuong.ngay_kt')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_loaikhenthuong = '';
      $count_hinhthuckhenthuong = '';
      $count_khoa = '';
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_ma_lkl ='';
      $count_kl_ma_khoa = '';
      $count_kl_thoigian ='';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian',$count_kl_thoigian)
        ->with('count_kl_ma_khoa',$count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('batdau', $data['batdau'])
        ->with('ketthuc', $data['ketthuc'])
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('count_khoa', $count_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_time(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_khenthuong_time = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khenthuong.ngay_kt'))
        ->groupBy('khenthuong.ngay_kt')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_loaikhenthuong = '';
      $count_hinhthuckhenthuong = '';
      $count_khoa = '';
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_thoigian = '';
      $count_kl_ma_khoa ='';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('count_khoa', $count_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_time_pdf($batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->whereBetween('ngay_kt', [$batdau, $ketthuc])
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_khenthuong', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_time_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_khenthuong', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_khoa(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_khoa = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
        ->groupBy('khoa.ma_k')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_hinhthuckhenthuong ='';
      $count_loaikhenthuong = '';
      $count_khenthuong_time ='';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_thoigian = '';
      $count_kl_ma_khoa ='';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_ma_khoa(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_khoa = '';
      $count_ma_khoa = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('khoa.ma_k', $data['ma_k'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
        ->groupBy('khoa.ma_k')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_hinhthuckhenthuong ='';
      $count_loaikhenthuong = '';
      $count_khenthuong_time ='';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_khenthuong_time ='';
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_ma_khoa = '';
      $count_kl_thoigian ='';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian',$count_kl_thoigian)
        ->with('count_kl_ma_khoa',$count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('ma_k', $data['ma_k'])
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('count_khoa', $count_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_khoa_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->orderBy('khoa.ten_k', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_khenthuong', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_ma_khoa_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->orderBy('khoa.ten_k', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_khenthuong', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }



  public function thongke_qlktkl_lkl(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaikhenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_hinhthuckhenthuong = '';
      $count_khoa = '';
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $count_khenthuong_time ='';
      $count_loaikyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_ma_khoa ='';
      $count_kl_thoigian = '';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_khoa', $count_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_lkl_pdf($ma_lkl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('loaikyluat.ma_lkl', $ma_lkl)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_kyluat', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_ma_lkl(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaikhenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_hinhthuckhenthuong = '';
      $count_khoa = '';
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $count_khenthuong_time ='';
      $count_loaikyluat = '';
      $count_ma_lkl = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_vc', '<>', '2')
        ->where('loaikyluat.ma_lkl', $data['ma_lkl'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_kl_ma_khoa ='';
      $count_kl_thoigian = '';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_khoa', $count_khoa)
        ->with('ma_lkl', $data['ma_lkl'])
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_lkl_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->orderBy('khoa.ten_k', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_kyluat', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_khoa(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_kl_khoa = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
        ->groupBy('khoa.ma_k')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_hinhthuckhenthuong ='';
      $count_loaikhenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $count_khenthuong_time ='';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_khenthuong_time ='';
      $count_loaikyluat = '';
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_ma_khoa ='';
      $count_kl_thoigian = '';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_ma_khoa(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_kl_khoa = '';
      $count_kl_ma_khoa = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('khoa.ma_k', $data['ma_k'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
        ->groupBy('khoa.ma_k')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_hinhthuckhenthuong ='';
      $count_loaikhenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $count_khenthuong_time ='';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_loaikyluat = '';
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_kyluat_time ='';
      $count_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_thoigian = '';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('ma_k', $data['ma_k'])
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('list_khoa', $list_khoa)
        ->with('count_khoa', $count_khoa)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_khoa_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->orderBy('khoa.ten_k', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_kyluat', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_ma_khoa_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->orderBy('khoa.ten_k', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_kyluat', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_thoigian(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_kyluat_time = '';
      $count_kl_thoigian = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->where('status_vc', '<>', '2')
        ->whereBetween('ngay_kl', [$data['batdau'], $data['ketthuc']])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, kyluat.ngay_kl'))
        ->groupBy('kyluat.ngay_kl')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_loaikhenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $count_hinhthuckhenthuong = '';
      $count_khoa = '';
      $count_loaikyluat = '';
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_khenthuong_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_ma_khoa ='';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('batdau', $data['batdau'])
        ->with('ketthuc', $data['ketthuc'])
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('count_khoa', $count_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_time(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_kyluat_time = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, kyluat.ngay_kl'))
        ->groupBy('kyluat.ngay_kl')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $count_loaikhenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $count_hinhthuckhenthuong = '';
      $count_khoa = '';
      $count_loaikyluat = '';
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count_khenthuong_time ='';
      $count_kl_khoa = '';
      $count_ma_lkt ='';
      $count_ma_htkt ='';
      $count_ma_khoa = '';
      $count_kt_time = '';
      $count_ma_lkl ='';
      $count_kl_ma_khoa ='';
      $count_kl_thoigian = '';
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
        ->with('count_kl_thoigian', $count_kl_thoigian)
        ->with('count_kl_ma_khoa', $count_kl_ma_khoa)
        ->with('count_ma_lkl', $count_ma_lkl)
        ->with('count_kt_time', $count_kt_time)
        ->with('count_ma_khoa', $count_ma_khoa)
        ->with('count_ma_htkt', $count_ma_htkt)
        ->with('count_ma_lkt', $count_ma_lkt)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('count_hinhthuckhenthuong', $count_hinhthuckhenthuong)
        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_khenthuong_time', $count_khenthuong_time)
        ->with('count_khoa', $count_khoa)
        ->with('count_kl_khoa', $count_kl_khoa)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_loaikyluat', $count_loaikyluat)
        ->with('count_kyluat_time', $count_kyluat_time)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_time_pdf($batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->whereBetween('ngay_kl', [$batdau, $ketthuc])
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_kyluat', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_thoigian_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $vienchuc = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlktkl_kyluat', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }



  public function thongke_qlcttc(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_lop =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
        ->groupBy('lop.ma_l')
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_ma_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('list_lop', $list_lop)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_ketqua_lop_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $status = 0;
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
        'status' => $status,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_ketqua_ma_lop(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('ketqua.ma_l', $data['ma_l'])
        ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
        ->groupBy('lop.ma_l')
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $count_giahan_lop = '';
      $count_giahan_khoa = '';
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('list_lop', $list_lop)
        ->with('ma_l', $data['ma_l'])
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_ketqua_ma_lop_pdf($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $status = 1;
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('ketqua.ma_l', $ma_l)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
        'status' => $status,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_ma_lop = '';
      $count_giahan = GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'giahan.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->select(DB::raw('count(giahan.ma_gh) as sum, giahan.thoigian_gh, khoa.ma_k'))
        ->groupBy('giahan.thoigian_gh','khoa.ma_k')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('list_lop', $list_lop)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin gia hạn thời gian học';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_time(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'giahan.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->whereBetween('thoigian_gh', [$data['batdau'], $data['ketthuc']])
        ->select(DB::raw('count(giahan.ma_gh) as sum, giahan.thoigian_gh, khoa.ma_k'))
        ->groupBy('giahan.thoigian_gh','khoa.ma_k')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('batdau', $data['batdau'])
        ->with('ketthuc', $data['ketthuc'])
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_time_pdf( $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin gia hạn thời gian học';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->whereBetween('thoigian_gh', [$batdau, $ketthuc])
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_khoa(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $count_giahan_lop = '';
      $count_giahan_khoa = GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'giahan.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $data['ma_k'])
        ->select(DB::raw('count(giahan.ma_gh) as sum, giahan.thoigian_gh, khoa.ma_k'))
        ->groupBy('giahan.thoigian_gh','khoa.ma_k')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('ma_k', $data['ma_k'])
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_khoa_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $status = 1;
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin gia hạn';
      $vienchuc = GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'giahan.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
        'status' => $status,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_lop_pdf($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $status = 1;
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin gia hạn';
      $vienchuc = GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'giahan.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('lop.ma_l', $ma_l)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
        'status' => $status,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_lop(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_giahan_lop = GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'giahan.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('lop.ma_l', $data['ma_l'])
        ->select(DB::raw('count(giahan.ma_gh) as sum, giahan.thoigian_gh, lop.ma_l'))
        ->groupBy('giahan.thoigian_gh','lop.ma_l')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('ma_l', $data['ma_l'])
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_ma_lop = '';
      $count_giahan = '';
      $count_giahan_lop = '';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_dunghoc = DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'dunghoc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->select(DB::raw('count(dunghoc.ma_dh) as sum, dunghoc.batdau_dh, khoa.ma_k'))
        ->groupBy('dunghoc.batdau_dh','khoa.ma_k')
        ->get();
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('list_lop', $list_lop)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin tạm dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_time(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $count_dunghoc = '';
      $count_dunghoc_time = DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'dunghoc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->whereBetween('batdau_dh', [$data['batdau'], $data['ketthuc']])
        ->select(DB::raw('count(dunghoc.ma_dh) as sum, dunghoc.batdau_dh, khoa.ma_k'))
        ->groupBy('dunghoc.batdau_dh','khoa.ma_k')
        ->get();
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('batdau', $data['batdau'])
        ->with('ketthuc', $data['ketthuc'])
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_time_pdf( $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin tạm dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->whereBetween('batdau_dh', [$batdau, $ketthuc])
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_khoa(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'dunghoc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $data['ma_k'])
        ->select(DB::raw('count(dunghoc.ma_dh) as sum, dunghoc.batdau_dh, khoa.ma_k'))
        ->groupBy('dunghoc.batdau_dh','khoa.ma_k')
        ->get();
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('ma_k', $data['ma_k'])
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_khoa_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $status = 1;
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin tạm dừng học';
      $vienchuc = DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'dunghoc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
        'status' => $status,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_lop(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'dunghoc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('lop.ma_l', $data['ma_l'])
        ->select(DB::raw('count(dunghoc.ma_dh) as sum, dunghoc.batdau_dh, lop.ma_l'))
        ->groupBy('dunghoc.batdau_dh','lop.ma_l')
        ->get();
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('ma_l', $data['ma_l'])
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_lop_pdf($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $status = 1;
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin tạm dừng học';
      $vienchuc = DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'dunghoc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('lop.ma_l', $ma_l)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
        'status' => $status,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_ma_lop = '';
      $count_giahan = '';
      $count_giahan_lop = '';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->select(DB::raw('count(chuyen.ma_c) as sum, lop.ma_l'))
        ->groupBy('lop.ma_l')
        ->get();
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('list_lop', $list_lop)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin chuyển nước, trường, ngành học';
      $vienchuc = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_chuyen', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_khoa(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $data['ma_k'])
        ->select(DB::raw('count(chuyen.ma_c) as sum, khoa.ma_k'))
        ->groupBy('khoa.ma_k')
        ->get();
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('ma_k', $data['ma_k'])
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_khoa_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $status = 1;
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin chuyển trường, nước, ngành học';
      $vienchuc = Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_chuyen', [
        'vienchuc' => $vienchuc,
        'title' => $title,
        'status' => $status,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_lop(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('lop.ma_l', $data['ma_l'])
        ->select(DB::raw('count(chuyen.ma_c) as sum, lop.ma_l'))
        ->groupBy('lop.ma_l')
        ->get();
      $count_thoihoc = '';
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('ma_l', $data['ma_l'])
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_lop_pdf($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $status = 1;
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin chuyển trường, nước, ngành học theo lớp';
      $vienchuc = Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('lop.ma_l', $ma_l)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_chuyen', [
        'vienchuc' => $vienchuc,
        'title' => $title,
        'status' => $status,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_ma_lop = '';
      $count_giahan = '';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_giahan_time = '';
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = ThoiHoc::join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'thoihoc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->select(DB::raw('count(thoihoc.ma_th) as sum, thoihoc.ngay_th, khoa.ma_k'))
        ->groupBy('thoihoc.ngay_th','khoa.ma_k')
        ->get();
      $count_thoihoc_time = '';
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('list_lop', $list_lop)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('list_khoa', $list_khoa)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin thôi học';
      $vienchuc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.pdf_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_time(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thống kê";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $data = $request->all();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_ketqua_ma_lop = '';
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $count_ketqua_lop = '';
      $count_giahan = '';
      $count_giahan_time = '';
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $count_giahan_khoa = '';
      $count_giahan_lop = '';
      $count_dunghoc = '';
      $count_dunghoc_time = '';
      $count_dunghoc_khoa = '';
      $count_dunghoc_lop = '';
      $count_chuyen = '';
      $count_chuyen_khoa = '';
      $count_chuyen_lop = '';
      $count_thoihoc = '';
      $count_thoihoc_time = ThoiHoc::join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'thoihoc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->whereBetween('ngay_th', [$data['batdau'], $data['ketthuc']])
        ->select(DB::raw('count(thoihoc.ma_th) as sum, thoihoc.ngay_th'))
        ->groupBy('thoihoc.ngay_th')
        ->get();
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)
        ->with('count_giahan', $count_giahan)
        ->with('count_giahan_time',$count_giahan_time)
        ->with('count_ketqua_ma_lop', $count_ketqua_ma_lop)
        ->with('count_giahan_khoa', $count_giahan_khoa)
        ->with('count_giahan_lop', $count_giahan_lop)
        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('batdau', $data['batdau'])
        ->with('ketthuc', $data['ketthuc'])
        ->with('count_dunghoc_time', $count_dunghoc_time)
        ->with('count_ketqua_lop', $count_ketqua_lop)
        ->with('count_dunghoc', $count_dunghoc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_dunghoc_khoa', $count_dunghoc_khoa)
        ->with('count_dunghoc_lop', $count_dunghoc_lop)
        ->with('count_chuyen', $count_chuyen)
        ->with('count_chuyen_khoa', $count_chuyen_khoa)
        ->with('count_chuyen_lop', $count_chuyen_lop)
        ->with('count_thoihoc', $count_thoihoc)
        ->with('count_thoihoc_time', $count_thoihoc_time)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  // public function thongke_qlcttc_dunghoc_time_pdf( $batdau, $ketthuc){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '6')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qlcttc){
  //     $title = 'Viên chức xin tạm dừng học';
  //     $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
  //       ->whereBetween('batdau_dh', [$batdau, $ketthuc])
  //       ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
  //       ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
  //       ->where('status_vc', '<>', '2')
  //       ->get();
  //     $pdf = PDF::loadView('pdf.pdf_qlcttc_dunghoc', [
  //       'vienchuc' => $vienchuc,
  //       'title' => $title,
  //     ]);
  //     return $pdf->stream();
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
