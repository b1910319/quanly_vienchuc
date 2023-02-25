<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\LoaiKyLuat;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class LoaiKyLuatController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function loaikyluat(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý loại bằng cấp";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $list = LoaiKyLuat::orderBy('ma_lkl', 'desc')
        ->get();
      $count = LoaiKyLuat::select(DB::raw('count(ma_lkl) as sum'))->get();
      $count_status = LoaiKyLuat::select(DB::raw('count(ma_lkl) as sum, status_lkl'))
        ->groupBy('status_lkl')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('loaikyluat.loaikyluat')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_loaikyluat(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $data = $request->all();
      $loaikyluat = new loaikyluat();
      $loaikyluat->ten_lkl = $data['ten_lkl'];
      $loaikyluat->status_lkl = $data['status_lkl'];
      $loaikyluat->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/loaikyluat');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_loaikyluat($ma_lkl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $loaikyluat = LoaiKyLuat::find($ma_lkl);
      if($loaikyluat->status_lkl == 1){
        $loaikyluat->status_lkl = LoaiKyLuat::find($ma_lkl)->update(['status_lkl' => 0]);
      }elseif($loaikyluat->status_lkl == 0){
        $loaikyluat->status_lkl = LoaiKyLuat::find($ma_lkl)->update(['status_lkl' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_loaikyluat($ma_lkl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật thông tin loại bằng cấp";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $edit = LoaiKyLuat::find($ma_lkl);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('loaikyluat.loaikyluat_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_loaikyluat(Request $request, $ma_lkl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $loaikyluat = LoaiKyLuat::find($ma_lkl);
      $loaikyluat->ten_lkl = $data['ten_lkl'];
      $loaikyluat->status_lkl = $data['status_lkl'];
      $loaikyluat->updated_lkl = Carbon::now();
      $loaikyluat->save();
      return Redirect::to('loaikyluat');
    }else{
      return Redirect::to('/home');
    }
  }
  // public function delete_loaikyluat($ma_lkl){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '7')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qlktkl){
  //     LoaiKyLuat::find($ma_lkl)->delete();
  //     return Redirect::to('loaikyluat');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function delete_all_loaikyluat(){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '7')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qlktkl){
  //     $list = LoaiKyLuat::get();
  //     foreach($list as $key => $loaikyluat){
  //       $loaikyluat->delete();
  //     }
  //     return Redirect::to('loaikyluat');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
