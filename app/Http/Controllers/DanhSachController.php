<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\ChucVu;
use App\Models\DanhSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\DanToc;
use App\Models\HeDaoTao;
use App\Models\KetQua;
use App\Models\Khoa;
use App\Models\LoaiBangCap;
use App\Models\Lop;
use App\Models\Ngach;
use App\Models\PhanQuyen;
use App\Models\QuyetDinh;
use App\Models\ThuongBinh;
use App\Models\Tinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use PDF;
use Illuminate\Support\Carbon;

class DanhSachController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function danhsach($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý thông tin dân tộc";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $count = DanhSach::where('ma_l', $ma_l)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $count_quyetdinh_vienchuc = QuyetDinh::join('vienchuc', 'vienchuc.ma_vc', '=', 'quyetdinh.ma_vc')
        ->where('quyetdinh.ma_l', $ma_l)
        ->select(DB::raw('count(quyetdinh.ma_qd) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_ketqua_vienchuc = KetQua::join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
        ->where('ketqua.ma_l', $ma_l)
        ->select(DB::raw('count(ketqua.ma_kq) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_vienchuc = VienChuc::where('status_vc', '<>', '2')
        ->orderBy('ma_vc', 'desc')
        ->get();
      $list = DanhSach::join('vienchuc', 'vienchuc.ma_vc', '=', 'danhsach.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'danhsach.ma_l')
        ->where('danhsach.ma_l', $ma_l)
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      return view('danhsach.danhsach')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('ma_l', $ma_l)
        ->with('list',$list)
        ->with('count_ketqua_vienchuc', $count_ketqua_vienchuc)
        ->with('count_quyetdinh_vienchuc', $count_quyetdinh_vienchuc)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('list_tinh',$list_tinh)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_danhsach($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $danhsach = new DanhSach();
      $danhsach->ma_l = $ma_l;
      $danhsach->ma_vc = $ma_vc;
      $danhsach->save();
      return Redirect::to('/danhsach/'.$ma_l);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_danhsach($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
      if($phanquyen_admin || $phanquyen_qlcttc){
        $list = DanhSach::where('ma_vc', $ma_vc)
          ->where('ma_l', $ma_l)
          ->get();
        foreach($list as $key => $danhsach){
          $danhsach->delete();
        }
        return Redirect::to('/danhsach/'.$ma_l);
      }else{
        return Redirect::to('/home');
      }
  }
  public function delete_all_danhsach($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = DanhSach::where('ma_l', $ma_l)
        ->get();
      foreach($list as $key => $danhsach){
        $danhsach->delete();
      }
      return Redirect::to('/danhsach/'.$ma_l);
    }else{
      return Redirect::to('/home');
    }
  }
  public function quyetdinh_dihoc_pdf($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $vienchuc = DanhSach::join('vienchuc', 'vienchuc.ma_vc', '=', 'danhsach.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'danhsach.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('danhsach.ma_l', $ma_l)
        ->where('danhsach.ma_vc', $ma_vc)
        ->get();
      $lop = Lop::find($ma_l);
      $pdf = PDF::loadView('pdf.pdf_quyetdinh_dihoc', [
        'vienchuc' => $vienchuc,
        'lop' => $lop,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
}
