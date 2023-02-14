<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
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
}
