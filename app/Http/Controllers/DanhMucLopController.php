<?php

namespace App\Http\Controllers;

use App\Models\DanhMucLop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class DanhMucLopController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function danhmuclop(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý thông tin danh mục";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = DanhMucLop::orderBy('ma_dml', 'desc')
        ->get();
      $count = DanhMucLop::select(DB::raw('count(ma_dml) as sum'))->get();
      $count_lop_danhmuc = DanhMucLop::leftJoin('lop', 'danhmuclop.ma_dml', '=', 'lop.ma_dml')
        ->select(DB::raw('count(ma_l) as sum, danhmuclop.ma_dml'))
        ->groupBy('danhmuclop.ma_dml')
        ->get();
      $count_status = DanhMucLop::select(DB::raw('count(ma_dml) as sum, status_dml'))
        ->groupBy('status_dml')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('danhmuclop.danhmuclop')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_lop_danhmuc', $count_lop_danhmuc)
        ->with('count_status', $count_status)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_danhmuclop(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $data = $request->all();
      $danhmuclop = new DanhMucLop();
      $danhmuclop->ten_dml = $data['ten_dml'];
      $danhmuclop->status_dml = $data['status_dml'];
      $danhmuclop->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/danhmuclop');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_danhmuclop($ma_dml){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $danhmuclop = DanhMucLop::find($ma_dml);
      if($danhmuclop->status_dml == 1){
        $danhmuclop->status_dml = DanhMucLop::find($ma_dml)->update(['status_dml' => 0]);
      }elseif($danhmuclop->status_dml == 0){
        $danhmuclop->status_dml = DanhMucLop::find($ma_dml)->update(['status_dml' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_danhmuclop($ma_dml){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật thông tin danh mục lớp";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $edit = DanhMucLop::find($ma_dml);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('danhmuclop.danhmuclop_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_danhmuclop(Request $request, $ma_dml){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $danhmuclop = DanhMucLop::find($ma_dml);
      $danhmuclop->ten_dml = $data['ten_dml'];
      $danhmuclop->status_dml = $data['status_dml'];
      $danhmuclop->updated_dml = Carbon::now();
      $danhmuclop->save();
      return Redirect::to('danhmuclop');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_danhmuclop($ma_dml){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      DanhMucLop::find($ma_dml)->delete();
      return Redirect::to('danhmuclop');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_all_danhmuclop(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = DanhMucLop::get();
      foreach($list as $key => $danhmuclop){
        $danhmuclop->delete();
      }
      return Redirect::to('danhmuclop');
    }else{
      return Redirect::to('/home');
    }
  }
}
