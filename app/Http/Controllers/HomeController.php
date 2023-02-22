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
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $batdau = Carbon::parse(Carbon::now()->subMonths(2))->format('Y-m-d');
    $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
    $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
      ->select(DB::raw('count(ma_vc) as sum'))
      ->get();
    if($phanquyen_admin){

      return view('home.home_admin')
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else if( $phanquyen_qltt){

      return view('home.home_qltt')
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return view('home.home')
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }
  }
}
