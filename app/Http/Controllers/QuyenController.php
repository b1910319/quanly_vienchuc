<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\Quyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;


class QuyenController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function quanly_quyen(){
    $this->check_login();
    $count = Quyen::select(DB::raw('count(ma_q) as sum'))->get();
    $count_status = Quyen::select(DB::raw('count(ma_q) as sum, status_q'))->groupBy('status_q')->get();
    $list = Quyen::orderBy('ma_q', 'desc')
      ->get();
    return view('quyen.quanly_quyen')
      ->with('count', $count)
      ->with('count_status', $count_status)
      ->with('list', $list);
  }
  public function them_quyen(Request $request){
    $this->check_login();
    $data = $request->all();
    $quyen = new Quyen();
    $quyen->ten_q = $data['ten_q'];
    $quyen->mota_q = $data['mota_q'];
    $quyen->status_q = $data['status_q'];
    $quyen->save();
    $request->session()->put('message','Thêm thành công');
    return Redirect::to('/quanly_quyen');
  }
}
