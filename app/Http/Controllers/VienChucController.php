<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class VienChucController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function login(Request $request){
    $user_vc = $request->user_vc;
    $pass_vc = md5($request->pass_vc);
    $result = VienChuc::where('user_vc', $user_vc)->where('pass_vc', $pass_vc)->first();
    if($result){
      $request->session()->put('hoten_vc',$result->hoten_vc);
      $request->session()->put('ma_vc',$result->ma_vc);
      return Redirect::to('/home');
    }else{
      $request->session()->put('message','Username hoặc Password bị sai vui lòng nhập lại!! ');
      return Redirect::to('/login');
    }
  }
  public function logout(){
    $this->check_login();
    session()->put('hoten_vc',null);
    session()->put('ma_vc',null);
    return Redirect::to('/login');
  }
  public function vienchuc_khoa($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))->groupBy('status_vc')->get();
      $list = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->orderBy('ma_vc', 'desc')
        ->get();
      return view('vienchuc.vienchuc_khoa')
        ->with('ma_k', $ma_k)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_vienchuc_khoa(Request $request, $ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      $vienchuc = new VienChuc();
      $vienchuc->hoten_vc = $data['hoten_vc'];
      $vienchuc->user_vc = $data['user_vc'].'@student.ctu.edu.vn';
      $vienchuc->pass_vc = md5($data['pass_vc']);
      $vienchuc->ma_k = $ma_k;
      $vienchuc->status_vc = $data['status_vc'];
      $vienchuc->save();
      $vienchuc_new = VienChuc::orderBy('ma_vc', 'desc')
        ->first();
      $phanquyen = new PhanQuyen();
      $phanquyen->ma_vc = $vienchuc_new->ma_vc;
      $phanquyen->ma_q = '10';
      $phanquyen->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/vienchuc_khoa/'.$ma_k);
    }else{
      return Redirect::to('/home');
    }
  }
}
