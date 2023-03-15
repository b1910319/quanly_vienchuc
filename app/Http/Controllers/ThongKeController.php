<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\Chuyen;
use App\Models\DanToc;
use App\Models\DungHoc;
use App\Models\GiaHan;
use App\Models\HeDaoTao;
use App\Models\HinhThucKhenThuong;
use App\Models\KetQua;
use App\Models\KhenThuong;
use App\Models\Khoa;
use App\Models\KyLuat;
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
use App\Models\ThuongBinh;
use App\Models\Tinh;
use App\Models\TonGiao;
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
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
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $count = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
        ->groupBy('khoa.ma_k')
        ->get();
      $list = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->where('status_vc', '<>', '2')
        ->orderBy('ten_n', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)

        ->with('count_nangbac', $count_nangbac)
        ->with('count', $count)

        ->with('list', $list)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('list_ngach', $list_ngach)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_tinh', $list_tinh)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)

        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->where('status_vc', '<>', '2')
        ->orderBy('khoa.ten_k', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc(Request $request){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
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
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $data = $request->all();

      if(isset($data['ma_k'])  && isset($data['ma_cv'])  && isset($data['ma_hdt'])  && isset($data['ma_lbc'])  && isset($data['ma_n'])  && isset( $data['ma_t']) && isset($data['ma_dt'])  && isset($data['ma_tg'])  && isset($data['ma_tb'])){
        $count = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
          ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
          ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
          ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
          ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('vienchuc.ma_cv', $data['ma_cv'])
          ->where('bangcap.ma_hdt', $data['ma_hdt'])
          ->where('bangcap.ma_lbc', $data['ma_lbc'])
          ->where('vienchuc.ma_n', $data['ma_n'])
          ->where('quequan.ma_t', $data['ma_t'])
          ->where('vienchuc.ma_dt', $data['ma_dt'])
          ->where('vienchuc.ma_tg', $data['ma_tg'])
          ->where('vienchuc.ma_tb', $data['ma_tb'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count', $count)

          ->with('list_all', $list_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_cv', $data['ma_cv'])
          ->with('ma_hdt', $data['ma_hdt'])
          ->with('ma_lbc', $data['ma_lbc'])
          ->with('ma_n', $data['ma_n'])
          ->with('ma_t', $data['ma_t'])
          ->with('ma_dt', $data['ma_dt'])
          ->with('ma_tg', $data['ma_tg'])
          ->with('ma_tb', $data['ma_tb'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_k']) && isset($data['ma_cv'])){
        $count = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('vienchuc.ma_cv', $data['ma_cv'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count', $count)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_2', $list_2)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_cv', $data['ma_cv'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_k'])){
        $count_khoa = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_pdf_khoa = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_khoa', $count_khoa)

          ->with('list_pdf_khoa', $list_pdf_khoa)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_cv'])){
        $count_chucvu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_cv'))
          ->groupBy('vienchuc.ma_cv')
          ->get();
        $list_pdf_chucvu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_cv', $data['ma_cv'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_chucvu', $count_chucvu)

          ->with('list_pdf_chucvu', $list_pdf_chucvu)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)

          ->with('ma_cv', $data['ma_cv'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_hdt'])){
        $count_hedaotao = VienChuc::join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt','=', 'bangcap.ma_hdt')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, hedaotao.ma_hdt'))
          ->groupBy('hedaotao.ma_hdt')
          ->get();
        $list_pdf_hdt = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt','=', 'bangcap.ma_hdt')
          ->where('status_vc', '<>', '2')
          ->where('bangcap.ma_hdt', $data['ma_hdt'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_hedaotao', $count_hedaotao)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_pdf_hdt', $list_pdf_hdt)

          ->with('ma_hdt', $data['ma_hdt'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lbc'])){
        $count_loaibangcap = VienChuc::join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaibangcap', 'loaibangcap.ma_lbc','=', 'bangcap.ma_lbc')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaibangcap.ma_lbc'))
          ->groupBy('loaibangcap.ma_lbc')
          ->get();
        $list_pdf_lbc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaibangcap', 'loaibangcap.ma_lbc','=', 'bangcap.ma_lbc')
          ->where('status_vc', '<>', '2')
          ->where('bangcap.ma_lbc', $data['ma_lbc'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_loaibangcap', $count_loaibangcap)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_pdf_lbc', $list_pdf_lbc)

          ->with('ma_lbc', $data['ma_lbc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_n'])){
        $count_ngach = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_n'))
          ->groupBy('vienchuc.ma_n')
          ->get();
        $list_pdf_ngach = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_n', $data['ma_n'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_ngach',$count_ngach)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_ngach', $list_pdf_ngach)

          ->with('ma_n', $data['ma_n'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_t'])){
        $count_tinh = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, tinh.ma_t'))
          ->groupBy('tinh.ma_t')
          ->get();
        $list_pdf_tinh = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quequan','quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t','=', 'quequan.ma_t')
          ->where('status_vc', '<>', '2')
          ->where('quequan.ma_t', $data['ma_t'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_tinh', $count_tinh)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_pdf_tinh', $list_pdf_tinh)

          ->with('ma_t', $data['ma_t'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_dt'])){
        $count_dantoc = VienChuc::join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_dt'))
          ->groupBy('vienchuc.ma_dt')
          ->get();
        $list_pdf_dantoc = VienChuc::join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_dt', $data['ma_dt'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_dantoc', $count_dantoc)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_dantoc', $list_pdf_dantoc)

          ->with('ma_dt', $data['ma_dt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_tg'])){
        $count_tongiao = VienChuc::join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_tg'))
          ->groupBy('vienchuc.ma_tg')
          ->get();
        $list_pdf_tongiao = VienChuc::join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_tg', $data['ma_tg'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_tongiao', $count_tongiao)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_tongiao', $list_pdf_tongiao)

          ->with('ma_tg', $data['ma_tg'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_tb'])){
        $count_thuongbinh = VienChuc::join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_tb'))
          ->groupBy('vienchuc.ma_tb')
          ->get();
        $list_pdf_thuongbinh = VienChuc::join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_tb', $data['ma_tb'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_thuongbinh', $count_thuongbinh)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_thuongbinh', $list_pdf_thuongbinh)

          ->with('ma_tb', $data['ma_tb'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_all_pdf($ma_k, $ma_cv, $ma_hdt, $ma_lbc, $ma_n, $ma_t, $ma_dt, $ma_tg, $ma_tb){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', 'bangcap.ma_hdt')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
        ->where('status_vc', '<>', '2')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('vienchuc.ma_cv', $ma_cv)
        ->where('bangcap.ma_hdt', $ma_hdt)
        ->where('bangcap.ma_lbc', $ma_lbc)
        ->where('vienchuc.ma_n', $ma_n)
        ->where('quequan.ma_t', $ma_t)
        ->where('vienchuc.ma_dt', $ma_dt)
        ->where('vienchuc.ma_tg', $ma_tg)
        ->where('vienchuc.ma_tb', $ma_tb)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_khoa_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_chucvu_pdf($ma_cv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('vienchuc.ma_cv', $ma_cv)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_hdt_pdf($ma_hdt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', 'bangcap.ma_hdt')
          ->where('status_vc', '<>', '2')
          ->where('bangcap.ma_hdt', $ma_hdt)
          ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_lbc_pdf($ma_lbc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', 'bangcap.ma_lbc')
          ->where('status_vc', '<>', '2')
          ->where('bangcap.ma_lbc', $ma_lbc)
          ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_ngach_pdf($ma_n){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->where('vienchuc.ma_n', $ma_n)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_tinh_pdf($ma_t){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quequan','quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t', 'quequan.ma_t')
          ->where('status_vc', '<>', '2')
          ->where('quequan.ma_t', $ma_t)
          ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_dantoc_pdf($ma_dt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->where('vienchuc.ma_dt', $ma_dt)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_tongiao_pdf($ma_tg){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->where('vienchuc.ma_tg', $ma_tg)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_thuongbinh_pdf($ma_tb){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
        ->where('vienchuc.ma_tb', $ma_tb)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_2_pdf($ma_k, $ma_cv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('vienchuc.ma_cv', $ma_cv)
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_nghihuu_loc(Request $request){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
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
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $data = $request->all();
      if(isset($data['ma_k'])  && isset($data['batdau'])  && isset($data['ketthuc'])){
        $count_nghihuu_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('vienchuc.thoigiannghi_vc', [$data['batdau'], $data['ketthuc']])
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k, vienchuc.thoigiannghi_vc'))
          ->groupBy('khoa.ma_k', 'vienchuc.thoigiannghi_vc')
          ->get();
        $list_nghihuu_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->where('vienchuc.ma_k', $data['ma_k'])
        ->whereBetween('vienchuc.thoigiannghi_vc', [$data['batdau'], $data['ketthuc']])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_nghihuu_all', $count_nghihuu_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghihuu_all', $list_nghihuu_all)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_k'])){
        $count_nghihuu_khoa = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k, vienchuc.thoigiannghi_vc'))
          ->groupBy('khoa.ma_k', 'vienchuc.thoigiannghi_vc')
          ->get();
        $list_nghihuu_khoa = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->where('vienchuc.ma_k', $data['ma_k'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_nghihuu_khoa', $count_nghihuu_khoa)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghihuu_khoa', $list_nghihuu_khoa)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['batdau']) && isset($data['ketthuc']) ){
        $count_nghihuu_time = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->whereBetween('vienchuc.thoigiannghi_vc', [$data['batdau'], $data['ketthuc']])
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k, vienchuc.thoigiannghi_vc'))
          ->groupBy('khoa.ma_k', 'vienchuc.thoigiannghi_vc')
          ->get();
        $list_nghihuu_time = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->whereBetween('vienchuc.thoigiannghi_vc', [$data['batdau'], $data['ketthuc']])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_nghihuu_time', $count_nghihuu_time)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghihuu_time', $list_nghihuu_time)

          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_nghihuu_all_pdf($ma_k, $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('vienchuc.thoigiannghi_vc', [$batdau, $ketthuc])
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_nghihuu_khoa_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->where('vienchuc.ma_k', $ma_k)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_nghihuu_time_pdf($batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->whereBetween('vienchuc.thoigiannghi_vc', [$batdau, $ketthuc])
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }



// ----------------------------------------------------------

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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
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
      $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_kt', '<>', '2')
        ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $list_pdf_lkt = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('status_kt', '<>', '2')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl','asc')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)

        ->with('count_loaikhenthuong', $count_loaikhenthuong)
        ->with('count_nangbac', $count_nangbac)

        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('list_pdf_lkt', $list_pdf_lkt)
        ->with('list_vienchuc', $list_vienchuc)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlklkt_kt_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltktkl_kt_loc(Request $request){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
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
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl','asc')
        ->get();
      $data = $request->all();
      if(isset($data['ma_lkt'])  && isset($data['ma_k'])  && isset($data['ma_htkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])){
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_kt', '<>', '2')
        ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
        $list_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_all', $list_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_k', $data['ma_k'])
          ->with('ma_htkt', $data['ma_htkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lkt'])  && isset($data['ma_htkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])){
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_kt', '<>', '2')
        ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
        $list_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_2', $list_2)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_htkt', $data['ma_htkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lkt'])  && isset($data['ma_k'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])){
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_kt', '<>', '2')
        ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
        $list_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_3', $list_3)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_k', $data['ma_k'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lkt'])  && isset($data['ma_k'])  && isset($data['ma_htkt'])){
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_kt', '<>', '2')
        ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
        $list_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_4', $list_4)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_k', $data['ma_k'])
          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if( isset($data['ma_htkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])){
        $count_loaikhenthuong = '';
        $count_5 = KhenThuong::join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, hinhthuckhenthuong.ma_htkt, ngay_kt'))
          ->groupBy('hinhthuckhenthuong.ma_htkt', 'ngay_kt')
          ->get();
        $list_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('hinhthuckhenthuong.ma_htkt', $data['ma_htkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_loaikhenthuong', $count_loaikhenthuong)
          ->with('count_5', $count_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_5', $list_5)

          ->with('ma_htkt', $data['ma_htkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if( isset($data['ma_k'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])){
        $count_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, vienchuc.ma_k, ngay_kt'))
          ->groupBy('vienchuc.ma_k', 'ngay_kt')
          ->get();
        $list_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khoa.ma_k', $data['ma_k'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_6', $count_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_6', $list_6)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_k'])  && isset($data['ma_htkt'])){
        $count_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_7', $count_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_7', $list_7)
          
          ->with('ma_k', $data['ma_k'])
          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if( isset($data['ma_lkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])){
        $count_8 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt, ngay_kt'))
          ->groupBy('khenthuong.ma_lkt', 'ngay_kt')
          ->get();
        $list_8 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_8', $count_8)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_8', $list_8)
        
          ->with('ma_lkt', $data['ma_lkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lkt'])  && isset($data['ma_htkt'])){
        $count_9 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt'))
          ->groupBy('khenthuong.ma_lkt')
          ->get();
        $list_9 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_9', $count_9)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_9', $list_9)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lkt'])  && isset($data['ma_k'])){
        $count_10 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt'))
          ->groupBy('khenthuong.ma_lkt')
          ->get();
        $list_10 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_10', $count_10)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_10', $list_10)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lkt'])){
        $count_11 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt'))
          ->groupBy('khenthuong.ma_lkt')
          ->get();
        $list_11 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_11', $count_11)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_11', $list_11)

          ->with('ma_lkt', $data['ma_lkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_k'])){
        $count_12 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, vienchuc.ma_k'))
          ->groupBy('vienchuc.ma_k')
          ->get();
        $list_12 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_12', $count_12)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_12', $list_12)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_htkt'])){
        $count_13 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_htkt'))
          ->groupBy('khenthuong.ma_htkt')
          ->get();
        $list_13 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_13', $count_13)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_13', $list_13)

          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])){
        $count_14 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, ngay_kt'))
          ->groupBy('ngay_kt')
          ->get();
        $list_14 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_14', $count_14)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_14', $list_14)

          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_all_pdf($ma_lkt, $ma_k, $ma_htkt, $batdau_kt, $ketthuc_kt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_2_pdf($ma_lkt, $ma_htkt, $batdau_kt, $ketthuc_kt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_3_pdf($ma_lkt, $ma_k, $batdau_kt, $ketthuc_kt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_4_pdf($ma_lkt, $ma_k, $ma_htkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('hinhthuckhenthuong.ma_htkt', $ma_htkt)
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_5_pdf($ma_htkt, $batdau_kt, $ketthuc_kt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_6_pdf($ma_k, $batdau_kt, $ketthuc_kt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_7_pdf($ma_k, $ma_htkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('hinhthuckhenthuong.ma_htkt', $ma_htkt)
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_8_pdf($ma_lkt, $batdau_kt, $ketthuc_kt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_9_pdf($ma_lkt, $ma_htkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('hinhthuckhenthuong.ma_htkt', $ma_htkt)
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_10_pdf($ma_lkt, $ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_11_pdf($ma_lkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_12_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_13_pdf($ma_htkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_14_pdf($batdau_kt, $ketthuc_kt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qltktkl_kl_loc(Request $request){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
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
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl','asc')
        ->get();
      $data = $request->all();
      if(isset($data['ma_lkl'])  && isset($data['ma_k'])&& isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])){
        $count_kl_all = KyLuat::join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('status_kl', '<>', '2')
        ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl'))
        ->groupBy('loaikyluat.ma_lkl')
        ->get();
        $list_kl_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('status_vc', '<>', '2')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_kl_all', $count_kl_all)

          ->with('list_kl_all', $list_kl_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_lkl', $data['ma_lkl'])
          ->with('ma_k', $data['ma_k'])
          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_k'])&& isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])){
        $count_kl_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, khoa.ma_k, ngay_kl'))
          ->groupBy('khoa.ma_k', 'ngay_kl')
          ->get();
        $list_kl_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('status_vc', '<>', '2')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_kl_2', $count_kl_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_2', $list_kl_2)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lkl'])&& isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])){
        $count_kl_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl, ngay_kl'))
          ->groupBy('loaikyluat.ma_lkl', 'ngay_kl')
          ->get();
        $list_kl_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('status_vc', '<>', '2')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_kl_3', $count_kl_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_3', $list_kl_3)

          ->with('ma_lkl', $data['ma_lkl'])
          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lkl'])&& isset($data['ma_k'])){
        $count_kl_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl'))
          ->groupBy('loaikyluat.ma_lkl')
          ->get();
        $list_kl_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_kl_4', $count_kl_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_4', $list_kl_4)

          ->with('ma_lkl', $data['ma_lkl'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_k'])){
        $count_kl_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_kl_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_kl_5', $count_kl_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_5', $list_kl_5)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_lkl'])){
        $count_kl_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl'))
          ->groupBy('loaikyluat.ma_lkl')
          ->get();
        $list_kl_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->where('status_vc', '<>', '2')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_kl_6', $count_kl_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_6', $list_kl_6)

          ->with('ma_lkl', $data['ma_lkl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])){
        $count_kl_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, ngay_kl'))
          ->groupBy('ngay_kl')
          ->get();
        $list_kl_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('status_vc', '<>', '2')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_kl_7', $count_kl_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_7', $list_kl_7)

          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_all_pdf($ma_lkl, $ma_k, $batdau_kl, $ketthuc_kl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_2_pdf($ma_k, $batdau_kl, $ketthuc_kl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_3_pdf($ma_lkl, $batdau_kl, $ketthuc_kl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_4_pdf($ma_lkl, $ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_5_pdf($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_6_pdf($ma_lkl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->where('status_vc', '<>', '2')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_7_pdf($batdau_kl, $ketthuc_kl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }

// ----------------------------------------------------------

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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
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
      $count_1 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
        ->groupBy('lop.ma_l')
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $list_1 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_kq', '<>', '2')
        ->get();
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)

        ->with('count_1', $count_1)
        ->with('count_nangbac', $count_nangbac)

        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('list_1', $list_1)
        ->with('list_vienchuc', $list_vienchuc)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_1_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_kq', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc(Request $request){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
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
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $data = $request->all();
      if(isset($data['hoanthanh'])  && isset($data['giahan'])  && isset($data['tamdung'])  && isset($data['xinchuyen'])  && isset($data['thoihoc'])){
        $count_1 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_all = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('giahan', 'giahan.ma_vc' , '=', 'vienchuc.ma_vc' )
          ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
          ->join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('chuyen', 'chuyen.ma_vc' , '=', 'vienchuc.ma_vc')
          ->join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('status_kq', '<>', '2')
          ->where('status_gh', '<>', '2')
          ->where('status_dh', '<>', '2')
          ->where('status_c', '<>', '2')
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_1', $count_1)

          ->with('list_all', $list_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['hoanthanh'])){
        $count_hoanthanh =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_hoanthanh = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
            ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
            ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
            ->where('status_vc', '<>', '2')
            ->where('status_kq', '<>', '2')
            ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_hoanthanh', $count_hoanthanh)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh'. $list_hoanthanh)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['giahan'])){
        $count_giahan =  GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->where('status_gh', '<>', '2')
          ->select(DB::raw('count(giahan.ma_gh) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_giahan = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_giahan', $count_giahan)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan', $list_giahan)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['tamdung'])){
        $count_dunghoc =  DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_dunghoc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_dunghoc', $count_dunghoc)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc', $list_dunghoc)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['xinchuyen'])){
        $count_chuyen =  Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->where('status_c', '<>', '2')
          ->select(DB::raw('count(chuyen.ma_c) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_chuyen = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_chuyen', $count_chuyen)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_chuyen', $list_chuyen)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['thoihoc'])){
        $count_thoihoc =  ThoiHoc::join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->where('status_th', '<>', '2')
          ->select(DB::raw('count(thoihoc.ma_th) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_thoihoc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_thoihoc', $count_thoihoc)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_thoihoc', $list_thoihoc)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_loc_all_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học, gia hạn, xin tạm dừng, xin chuyển nước, trường, ngành học, xin thôi học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('giahan', 'giahan.ma_vc' , '=', 'vienchuc.ma_vc' )
        ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
        ->join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chuyen', 'chuyen.ma_vc' , '=', 'vienchuc.ma_vc')
        ->join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->where('status_kq', '<>', '2')
        ->where('status_gh', '<>', '2')
        ->where('status_dh', '<>', '2')
        ->where('status_c', '<>', '2')
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_hoanthanh_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
      ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
      ->where('status_kq', '<>', '2')
      ->where('status_vc', '<>', '2')
      ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_giahan_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin gia hạn khoá học';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_dunghoc_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin tạm dừng khoá học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_chuyen_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin tạm dừng khoá học';
      $vienchuc = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
        ->where('status_c', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_thoihoc_pdf(){
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
        ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc(Request $request){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
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
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $data = $request->all();

      if(isset($data['ma_l'])  && isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang'])  && isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc'])){
        $count_hoanthanh_all =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
        ->groupBy('lop.ma_l')
        ->get();
        $list_hoanthanh_all = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'] )
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_hoanthanh_all', $count_hoanthanh_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_all', $list_hoanthanh_all)

          ->with('ma_l', $data['ma_l'])
          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])
          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang'])  && isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc'])){
        $count_hoanthanh_2 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, ketqua.ngaycapbang_kq'))
        ->groupBy('ketqua.ngaycapbang_kq')
        ->get();
        $list_hoanthanh_2 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_hoanthanh_2', $count_hoanthanh_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_2', $list_hoanthanh_2)

          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])
          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_l']) && isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc'])){
        $count_hoanthanh_3 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l, ketqua.ngayvenuoc_kq'))
        ->groupBy('lop.ma_l', 'ketqua.ngayvenuoc_kq')
        ->get();
        $list_hoanthanh_3 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'] )
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_hoanthanh_3', $count_hoanthanh_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_3', $list_hoanthanh_3)

          ->with('ma_l', $data['ma_l'])
          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_l']) && isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang'])){
        $count_hoanthanh_4 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l, ketqua.ngaycapbang_kq'))
        ->groupBy('lop.ma_l', 'ketqua.ngaycapbang_kq')
        ->get();
        $list_hoanthanh_4 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'] )
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_hoanthanh_4', $count_hoanthanh_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_4', $list_hoanthanh_4)

          ->with('ma_l', $data['ma_l'])
          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['ma_l'])){
        $count_hoanthanh_5 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l, lop.ma_l'))
        ->groupBy('lop.ma_l', 'lop.ma_l')
        ->get();
        $list_hoanthanh_5 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'] )
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_hoanthanh_5', $count_hoanthanh_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_5', $list_hoanthanh_5)

          ->with('ma_l', $data['ma_l'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang'])){
        $count_hoanthanh_6 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, ketqua.ngaycapbang_kq'))
        ->groupBy('ketqua.ngaycapbang_kq')
        ->get();
        $list_hoanthanh_6 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_hoanthanh_6', $count_hoanthanh_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_6', $list_hoanthanh_6)

          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }else if(isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc'])){
        $count_hoanthanh_7 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, ketqua.ngayvenuoc_kq'))
        ->groupBy('ketqua.ngayvenuoc_kq')
        ->get();
        $list_hoanthanh_7 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_hoanthanh_7', $count_hoanthanh_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_7', $list_hoanthanh_7)

          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_all_pdf($ma_l, $batdau_capbang, $ketthuc_capbang, $batdau_venuoc, $ketthuc_venuoc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->where('lop.ma_l', $ma_l )
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_2_pdf($batdau_capbang, $ketthuc_capbang, $batdau_venuoc, $ketthuc_venuoc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_3_pdf($ma_l,  $batdau_venuoc, $ketthuc_venuoc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->where('lop.ma_l', $ma_l )
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_4_pdf($ma_l, $batdau_capbang, $ketthuc_capbang){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->where('lop.ma_l', $ma_l )
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_5_pdf($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->where('lop.ma_l', $ma_l )
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_6_pdf($batdau_capbang, $ketthuc_capbang){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_7_pdf($batdau_venuoc, $ketthuc_venuoc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc(Request $request){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
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
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $data = $request->all();
      if(isset($data['ma_k'])  && isset($data['ma_l'])  && isset($data['batdau_giahan'])  && isset($data['ketthuc_giahan'])){
        $count_giahan_all =  GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->where('status_gh', '<>', '2')
        ->select(DB::raw('count(giahan.ma_gh) as sum, lop.ma_l'))
        ->groupBy('lop.ma_l')
        ->get();
        $list_giahan_all = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'] )
          ->where('lop.ma_l', $data['ma_l'] )
          ->whereBetween('giahan.thoigian_gh', [$data['batdau_giahan'], $data['ketthuc_giahan']])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_nangbac', $count_nangbac)
          ->with('count_giahan_all', $count_giahan_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_all', $list_giahan_all)

          ->with('ma_l', $data['ma_l'])
          ->with('ma_k', $data['ma_k'])
          ->with('batdau_giahan', $data['batdau_giahan'])
          ->with('ketthuc_giahan', $data['ketthuc_giahan'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qltt', $phanquyen_qltt);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_all_pdf($ma_k, $ma_l, $batdau_giahan, $ketthuc_giahan){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->where('status_gh', '<>', '2')
      ->where('khoa.ma_k', $ma_k )
      ->where('lop.ma_l', $ma_l )
      ->whereBetween('giahan.thoigian_gh', [$batdau_giahan, $ketthuc_giahan])
      ->where('status_gh', '<>', '2')
      ->where('status_vc', '<>', '2')
      ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
}
