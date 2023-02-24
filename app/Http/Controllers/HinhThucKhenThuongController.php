<?php

namespace App\Http\Controllers;

use App\Models\HinhThucKhenThuong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class HinhThucKhenThuongController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function hinhthuckhenthuong(){
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
      $list = HinhThucKhenThuong::orderBy('ma_htkt', 'desc')
        ->get();
      $count = HinhThucKhenThuong::select(DB::raw('count(ma_htkt) as sum'))->get();
      $count_status = HinhThucKhenThuong::select(DB::raw('count(ma_htkt) as sum, status_htkt'))
        ->groupBy('status_htkt')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('hinhthuckhenthuong.hinhthuckhenthuong')
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
  public function add_hinhthuckhenthuong(Request $request){
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
      $hinhthuckhenthuong = new hinhthuckhenthuong();
      $hinhthuckhenthuong->ten_htkt = $data['ten_htkt'];
      $hinhthuckhenthuong->status_htkt = $data['status_htkt'];
      $hinhthuckhenthuong->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/hinhthuckhenthuong');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_hinhthuckhenthuong($ma_htkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $hinhthuckhenthuong = HinhThucKhenThuong::find($ma_htkt);
      if($hinhthuckhenthuong->status_htkt == 1){
        $hinhthuckhenthuong->status_htkt = HinhThucKhenThuong::find($ma_htkt)->update(['status_htkt' => 0]);
      }elseif($hinhthuckhenthuong->status_htkt == 0){
        $hinhthuckhenthuong->status_htkt = HinhThucKhenThuong::find($ma_htkt)->update(['status_htkt' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_hinhthuckhenthuong($ma_htkt){
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
      $edit = HinhThucKhenThuong::find($ma_htkt);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('hinhthuckhenthuong.hinhthuckhenthuong_edit')
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
  public function update_hinhthuckhenthuong(Request $request, $ma_htkt){
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
      $hinhthuckhenthuong = HinhThucKhenThuong::find($ma_htkt);
      $hinhthuckhenthuong->ten_htkt = $data['ten_htkt'];
      $hinhthuckhenthuong->status_htkt = $data['status_htkt'];
      $hinhthuckhenthuong->updated_htkt = Carbon::now();
      $hinhthuckhenthuong->save();
      return Redirect::to('hinhthuckhenthuong');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_hinhthuckhenthuong($ma_htkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      HinhThucKhenThuong::find($ma_htkt)->delete();
      return Redirect::to('hinhthuckhenthuong');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_all_hinhthuckhenthuong(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $list = HinhThucKhenThuong::get();
      foreach($list as $key => $hinhthuckhenthuong){
        $hinhthuckhenthuong->delete();
      }
      return Redirect::to('hinhthuckhenthuong');
    }else{
      return Redirect::to('/home');
    }
  }
}
