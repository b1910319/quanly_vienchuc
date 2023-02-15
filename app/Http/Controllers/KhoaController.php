<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\Khoa;
use App\Models\PhanQuyen;
use App\Models\Quyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class KhoaController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function quanly_khoa(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $count = Khoa::select(DB::raw('count(ma_k) as sum'))->get();
      $count_status = Khoa::select(DB::raw('count(ma_k) as sum, status_k'))->groupBy('status_k')->get();
      $list = Khoa::orderBy('ma_k', 'desc')
        ->get();
      return view('khoa.quanly_khoa')
        ->with('count', $count)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function add_khoa(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      $khoa = new Khoa();
      $khoa->ten_k = $data['ten_k'];
      $khoa->mota_k = $data['mota_k'];
      $khoa->status_k = $data['status_k'];
      $khoa->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/quanly_khoa');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_khoa($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $khoa = Khoa::find($ma_k);
      if($khoa->status_k == 1){
        $khoa->status_k = Khoa::find($ma_k)->update(['status_k' => 0]);
      }elseif($khoa->status_k == 0){
        $khoa->status_k = Khoa::find($ma_k)->update(['status_k' => 1]);
      }
      return Redirect::to('quanly_khoa');
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_khoa($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $edit = Khoa::find($ma_k);
      $ma_vc = session()->get('ma_vc');
      $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
      return view('khoa.quanly_khoa_edit')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('edit', $edit);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_khoa(Request $request, $ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $khoa = Khoa::find($ma_k);
      $khoa->ten_k = $data['ten_k'];
      $khoa->mota_k = $data['mota_k'];
      $khoa->status_k = $data['status_k'];
      $khoa->updated_k = Carbon::now();
      $khoa->save();
      return Redirect::to('quanly_khoa');
    }else{
      return Redirect::to('/home');
    }
  }
  // public function delete_quyen($ma_q){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   if($phanquyen_admin){
  //     Khoa::find($ma_q)->delete();
  //     return Redirect::to('quanly_quyen');
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function delete_all_quyen(){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   if($phanquyen_admin){
  //     $list = Khoa::get();
  //     foreach($list as $key => $quyen){
  //       $quyen->delete();
  //     }
  //     return Redirect::to('quanly_quyen');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
