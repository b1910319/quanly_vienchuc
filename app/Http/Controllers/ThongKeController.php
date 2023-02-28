<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\HeDaoTao;
use App\Models\HinhThucKhenThuong;
use App\Models\Khoa;
use App\Models\LoaiBangCap;
use App\Models\LoaiKhenThuong;
use App\Models\LoaiKyLuat;
use App\Models\Ngach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_ngach(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loaibangcap(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_cv(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_khoa_ma_k(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_hedaotao(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_nghihuu_time(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_quequan_tinh(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_lkt(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_ma_lkt(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
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
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
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
  public function thongke_qlktkl_time(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
      $count_khenthuong_time = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
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
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
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
  public function thongke_qlktkl_khoa(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
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
  public function thongke_qlktkl_lkl(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
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
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
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
  public function thongke_qlktkl_kl_time(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
      $count_kyluat_time = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
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
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)
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
  public function thongke_qlktkl_lkl_pdf($ma_lkl){
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
}
