<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
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
    return view('login');
  }
  public function home(){
    $this->check_login();
    $title = 'Trang chủ';
    $ma_vc = session()->get('ma_vc');
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
    $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
    $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
      ->select(DB::raw('count(ma_vc) as sum'))
      ->get();
    if($phanquyen_admin){
      $count_vienchuc = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('status_vc', '<>', '2')
        ->get();
      $count_vienchuc_nghihuu = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('status_vc', '2')
        ->get();
      $count_vienchuc_kyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(DISTINCT kyluat.ma_vc) as sum'))
        ->where('status_vc', '<>', '2')
        ->get();
      $count_vienchuc_khenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(DISTINCT khenthuong.ma_vc) as sum'))
        ->where('status_vc', '<>', '2')
        ->get();
      return view('home.home_admin')
        ->with('title', $title)
        ->with('count_vienchuc', $count_vienchuc)
        ->with('count_vienchuc_nghihuu', $count_vienchuc_nghihuu)
        ->with('count_vienchuc_kyluat', $count_vienchuc_kyluat)
        ->with('count_vienchuc_khenthuong', $count_vienchuc_khenthuong)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else if( $phanquyen_qltt){
      $count_vienchuc = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('status_vc', '<>', '2')
        ->get();
      $count_vienchuc_nghihuu = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('status_vc', '2')
        ->get();
      return view('home.home_qltt')
        ->with('title', $title)
        ->with('count_vienchuc_nghihuu', $count_vienchuc_nghihuu)
        ->with('count_vienchuc', $count_vienchuc)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else if($phanquyen_qlktkl){
      $count_vienchuc = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('status_vc', '<>', '2')
        ->get();
      $count_vienchuc_kyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(DISTINCT kyluat.ma_vc) as sum'))
        ->where('status_vc', '<>', '2')
        ->get();
      $count_vienchuc_khenthuong = VienChuc::join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(DISTINCT khenthuong.ma_vc) as sum'))
        ->where('status_vc', '<>', '2')
        ->get();
      return view('home.home_qlktkl')
        ->with('title', $title)
        ->with('count_vienchuc_kyluat', $count_vienchuc_kyluat)
        ->with('count_vienchuc_khenthuong', $count_vienchuc_khenthuong)
        ->with('count_vienchuc', $count_vienchuc)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return view('home.home')
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }
  }
}
