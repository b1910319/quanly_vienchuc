<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\HeDaoTao;
use App\Models\LoaiBangCap;
use App\Models\Ngach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\Quyen;
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
    if($phanquyen_admin || $phanquyen_qltt){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_loaibangcap = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaibangcap.ma_lbc'))
        ->groupBy('loaibangcap.ma_lbc')
        ->get();
      $count_hedaotao = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, hedaotao.ma_hdt'))
        ->groupBy('hedaotao.ma_hdt')
        ->get();
      $count_ngach = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, ngach.ma_n'))
        ->groupBy('ngach.ma_n')
        ->get();
      $count_chucvu = VienChuc::join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, chucvu.ma_cv'))
        ->groupBy('chucvu.ma_cv')
        ->get();
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_ngach', $count_ngach)
        ->with('list_ngach', $list_ngach)
        ->with('count_hedaotao', $count_hedaotao)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('count_chucvu', $count_chucvu)
        ->with('list_chucvu', $list_chucvu)
        ->with('count_loaibangcap', $count_loaibangcap)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_lbc_pdf(){
    $vienchuc = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->orderBy('ten_lbc', 'asc')
      ->get();
    $pdf = PDF::loadView('pdf.pdf_loaibangcap', [
      'vienchuc' => $vienchuc,
    ]);

    return $pdf->stream();
  }
  public function thongke_qltt_hdt_pdf(){
    $vienchuc = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->orderBy('ten_hdt', 'asc')
      ->get();
    $pdf = PDF::loadView('pdf.pdf_hedaotao', [
      'vienchuc' => $vienchuc,
    ]);
    return $pdf->stream();
  }
  public function thongke_qltt_ngach_pdf(){
    $vienchuc = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->orderBy('ten_n', 'asc')
      ->get();
    $pdf = PDF::loadView('pdf.pdf_ngach', [
      'vienchuc' => $vienchuc,
    ]);
    return $pdf->stream();
  }
  public function thongke_qltt_chucvu_pdf(){
    $vienchuc = VienChuc::join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->orderBy('ten_cv', 'asc')
      ->get();
    $pdf = PDF::loadView('pdf.pdf_chucvu', [
      'vienchuc' => $vienchuc,
    ]);
    return $pdf->stream();
  }
}
