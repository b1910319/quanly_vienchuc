<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\LoaiKhenThuong;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class LoaiKhenThuongController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function loaikhenthuong(){
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
      $list = LoaiKhenThuong::orderBy('ma_lkt', 'desc')
        ->get();
      $count = LoaiKhenThuong::select(DB::raw('count(ma_lkt) as sum'))->get();
      $count_status = LoaiKhenThuong::select(DB::raw('count(ma_lkt) as sum, status_lkt'))
        ->groupBy('status_lkt')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('loaikhenthuong.loaikhenthuong')
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
  public function add_loaikhenthuong(Request $request){
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
      $loaikhenthuong = new LoaiKhenThuong();
      $loaikhenthuong->ten_lkt = $data['ten_lkt'];
      $loaikhenthuong->status_lkt = $data['status_lkt'];
      $loaikhenthuong->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/loaikhenthuong');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_loaikhenthuong($ma_lkt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $loaikhenthuong = LoaiKhenThuong::find($ma_lkt);
      if($loaikhenthuong->status_lkt == 1){
        $loaikhenthuong->status_lkt = LoaiKhenThuong::find($ma_lkt)->update(['status_lkt' => 0]);
      }elseif($loaikhenthuong->status_lkt == 0){
        $loaikhenthuong->status_lkt = LoaiKhenThuong::find($ma_lkt)->update(['status_lkt' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  // public function edit_loaikhenthuong($ma_lkt){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   $title = "Cập nhật thông tin loại bằng cấp";
  //   $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '7')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $edit = LoaiKhenThuong::find($ma_lkt);
  //     Carbon::now('Asia/Ho_Chi_Minh'); 
  //     $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
  //     $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
  //       ->select(DB::raw('count(ma_vc) as sum'))
  //       ->get();
  //     return view('loaikhenthuong.loaikhenthuong_edit')
  //       ->with('edit', $edit)
  //       ->with('title', $title)
  //       ->with('count_nangbac', $count_nangbac)
  //       ->with('phanquyen_qltt', $phanquyen_qltt)
  //       ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
  //       ->with('phanquyen_admin', $phanquyen_admin);
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function update_loaikhenthuong(Request $request, $ma_lkt){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $data = $request->all();
  //     Carbon::now('Asia/Ho_Chi_Minh');
  //     $loaikhenthuong = LoaiKhenThuong::find($ma_lkt);
  //     $loaikhenthuong->ten_lkt = $data['ten_lkt'];
  //     $loaikhenthuong->status_lkt = $data['status_lkt'];
  //     $loaikhenthuong->updated_lkt = Carbon::now();
  //     $loaikhenthuong->save();
  //     return Redirect::to('loaikhenthuong');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function delete_loaikhenthuong($ma_lkt){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     LoaiKhenThuong::find($ma_lkt)->delete();
  //     return Redirect::to('loaikhenthuong');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function delete_all_loaikhenthuong(){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $list = LoaiKhenThuong::get();
  //     foreach($list as $key => $loaikhenthuong){
  //       $loaikhenthuong->delete();
  //     }
  //     return Redirect::to('loaikhenthuong');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
