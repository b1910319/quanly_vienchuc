<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\PhanQuyen;
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
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $count = Quyen::select(DB::raw('count(ma_q) as sum'))->get();
      $count_status = Quyen::select(DB::raw('count(ma_q) as sum, status_q'))->groupBy('status_q')->get();
      $list = Quyen::orderBy('ma_q', 'desc')
        ->get();
      
      return view('quyen.quanly_quyen')
        ->with('count', $count)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function add_quyen(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      $quyen = new Quyen();
      $quyen->ten_q = $data['ten_q'];
      $quyen->mota_q = $data['mota_q'];
      $quyen->status_q = $data['status_q'];
      $quyen->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/quanly_quyen');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function select_quyen($ma_q){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $quyen = Quyen::find($ma_q);
      if($quyen->status_q == 1){
        $quyen->status_q = Quyen::find($ma_q)->update(['status_q' => 0]);
      }elseif($quyen->status_q == 0){
        $quyen->status_q = Quyen::find($ma_q)->update(['status_q' => 1]);
      }
      return Redirect::to('quanly_quyen');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function edit_quyen($ma_q){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $edit = Quyen::find($ma_q);
      $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
      return view('quyen.quanly_quyen_edit')
        ->with('edit', $edit)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function update_quyen(Request $request, $ma_q){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $quyen = Quyen::find($ma_q);
      $quyen->ten_q = $data['ten_q'];
      $quyen->mota_q = $data['mota_q'];
      $quyen->status_q = $data['status_q'];
      $quyen->updated_q = Carbon::now();
      $quyen->save();
      return Redirect::to('quanly_quyen');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_quyen($ma_q){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      Quyen::find($ma_q)->delete();
      return Redirect::to('quanly_quyen');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_all_quyen(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $list = Quyen::get();
      foreach($list as $key => $quyen){
        $quyen->delete();
      }
      return Redirect::to('quanly_quyen');
    }else{
      return Redirect::to('/home');
    }
  }

}
