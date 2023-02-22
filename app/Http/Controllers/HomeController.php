<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
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
    if($phanquyen_admin){

      return view('home.home_admin')
      ->with('title', $title)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
    }else if( $phanquyen_qltt){

      return view('home.home_qltt')
      ->with('title', $title)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return view('home.home')
      
      ->with('title', $title)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_admin', $phanquyen_admin);
    }
  }
}
