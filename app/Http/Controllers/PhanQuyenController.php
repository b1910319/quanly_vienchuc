<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\Quyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class PhanQuyenController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function phanquyen(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $title = "Phân quyền";
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '8')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '7')
    ->first();
    if($phanquyen_admin){
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '1')
        ->orderBy('vienchuc.ma_vc', 'desc')
        ->get();
      $list_phanquyen = PhanQuyen::join('quyen', 'quyen.ma_q', '=', 'phanquyen.ma_q')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'phanquyen.ma_vc')
        ->get();
      $list_quyen = Quyen::where('status_q', '<>', '1')
        ->orderBy('ma_q', 'desc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('quyen.phanquyen')
        ->with('list_quyen', $list_quyen)
        ->with('title', $title)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('list_phanquyen', $list_phanquyen)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count_nangbac', $count_nangbac)
        ->with('list_vienchuc', $list_vienchuc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function phanquyen_vc(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      $phanquyen = new PhanQuyen();
      $phanquyen->ma_vc = $data['ma_vc'];
      $phanquyen->ma_q = $data['ma_q'];
      $phanquyen->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/phanquyen');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function lammoi_quyen($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $list_phanquyen_ma = PhanQuyen::where('ma_vc', $ma_vc)
        ->where('ma_q', '<>', '10')
        ->get();
      foreach($list_phanquyen_ma as  $phanquyen){
        $phanquyen->delete();
      }
      return Redirect::to('/phanquyen');
    }else{
      return Redirect::to('/home');
    }
  }
}
