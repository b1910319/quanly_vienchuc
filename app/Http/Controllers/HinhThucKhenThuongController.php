<?php

namespace App\Http\Controllers;

use App\Imports\HinhThucKhenThuongImport;
use App\Models\HinhThucKhenThuong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý loại bằng cấp";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
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
      
      return view('hinhthuckhenthuong.hinhthuckhenthuong')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_ten_htkt(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_htkt = $request->ten_htkt;
      if($ten_htkt != null){
        $hinhthuckhenthuong = HinhThucKhenThuong::where('ten_htkt', $ten_htkt)
          ->first();
        if(isset($hinhthuckhenthuong)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_ten_htkt_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_htkt = $request->ten_htkt;
      $ma_htkt = $request->ma_htkt;
      if($ten_htkt != null && $ma_htkt != null){
        $hinhthuckhenthuong = HinhThucKhenThuong::where('ten_htkt', $ten_htkt)
          ->where('ma_htkt', '<>', $ma_htkt)
          ->first();
        if(isset($hinhthuckhenthuong)){
          return 1;
        }else{
          return 0;
        }
      }
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
      $request->session()->put('message_add_hinhthuckhenthuong','Thêm thành công');
      return Redirect::to('/hinhthuckhenthuong');
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_hinhthuckhenthuong_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      Excel::import(new HinhThucKhenThuongImport, $request->file('import_excel'));
      return redirect()->back();
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
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật thông tin loại bằng cấp";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $edit = HinhThucKhenThuong::find($ma_htkt);
      
      return view('hinhthuckhenthuong.hinhthuckhenthuong_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
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
      $request->session()->put('message_update_hinhthuckhenthuong','Cập nhật thành công');
      return Redirect::to('hinhthuckhenthuong');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_hinhthuckhenthuong(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          HinhThucKhenThuong::find($id)->delete();
        }
      }
    }
  }
  public function delete_hinhthuckhenthuong_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl){
      $ma_htkt = $request->ma_htkt;
      HinhThucKhenThuong::whereIn('ma_htkt', $ma_htkt)->delete();
      return redirect()->back();
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
