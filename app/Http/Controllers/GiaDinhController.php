<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\GiaDinh;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class GiaDinhController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function giadinh($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thông tin quan hệ gia đình";
    if($phanquyen_admin || $phanquyen_qltt){
      $list = GiaDinh::where('ma_vc', $ma_vc)
        ->orderBy('ma_gd', 'desc')
        ->get();
      $count = GiaDinh::select(DB::raw('count(ma_gd) as sum'))->get();
      $count_status = GiaDinh::select(DB::raw('count(ma_gd) as sum, status_gd'))
        ->groupBy('status_gd')
        ->get();
      $vienchuc = VienChuc::find($ma_vc);
      return view('giadinh.giadinh')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('ma_vc', $ma_vc)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('vienchuc', $vienchuc)
        ->with('title', $title);
    }
  }
  public function add_giadinh(Request $request, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      $giadinh = new GiaDinh();
      $giadinh->moiquanhe_gd = $data['moiquanhe_gd'];
      $giadinh->hoten_gd = $data['hoten_gd'];
      $giadinh->sdt_gd = $data['sdt_gd'];
      $giadinh->ngaysinh_gd = $data['ngaysinh_gd'];
      $giadinh->nghenghiep_gd = $data['nghenghiep_gd'];
      $giadinh->status_gd = $data['status_gd'];
      $giadinh->ma_vc = $ma_vc;
      $giadinh->save();
      return Redirect::to('/giadinh/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
}
