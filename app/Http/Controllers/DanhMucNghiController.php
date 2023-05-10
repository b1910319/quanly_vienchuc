<?php

namespace App\Http\Controllers;

use App\Models\DanhMucNghi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;

class DanhMucNghiController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function danhmucnghi(){
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
    $title = "Quản lý thông tin danh mục";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = DanhMucNghi::orderBy('ma_dmn', 'desc')
        ->get();
      return view('danhmucnghi.danhmucnghi')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('title', $title)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_ten_dmn(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_dmn = $request->ten_dmn;
      if($ten_dmn != null){
        $danhmucnghi = DanhMucNghi::where('ten_dmn', $ten_dmn)
          ->first();
        if(isset($danhmucnghi)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_ten_dmn_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_dmn = $request->ten_dmn;
      $ma_dmn = $request->ma_dmn;
      if($ten_dmn != null && $ma_dmn != null){
        $danhmucnghi = DanhMucNghi::where('ten_dmn', $ten_dmn)
          ->where('ma_dmn', '<>', $ma_dmn)
          ->first();
        if(isset($danhmucnghi)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_danhmucnghi(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      $danhmucnghi = new DanhMucNghi();
      $danhmucnghi->ten_dmn = $data['ten_dmn'];
      $danhmucnghi->status_dmn = $data['status_dmn'];
      $danhmucnghi->save();
      $request->session()->put('message_add_danhmucnghi','Thêm thành công');
      return Redirect::to('/danhmucnghi');
    }else{
      return Redirect::to('/home');
    }
  }

  public function select_danhmucnghi($ma_dmn){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $danhmucnghi = DanhMucNghi::find($ma_dmn);
      if($danhmucnghi->status_dmn == 1){
        $danhmucnghi->status_dmn = DanhMucNghi::find($ma_dmn)->update(['status_dmn' => 0]);
      }elseif($danhmucnghi->status_dmn == 0){
        $danhmucnghi->status_dmn = DanhMucNghi::find($ma_dmn)->update(['status_dmn' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function edit_danhmucnghi($ma_dmn){
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
    $title = "Cập nhật thông tin danh mục";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = DanhMucNghi::find($ma_dmn);
      return view('danhmucnghi.danhmucnghi_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_danhmucnghi(Request $request, $ma_dmn){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $danhmucnghi = DanhMucNghi::find($ma_dmn);
      $danhmucnghi->ten_dmn = $data['ten_dmn'];
      $danhmucnghi->status_dmn = $data['status_dmn'];
      $danhmucnghi->updated_dmn = Carbon::now();
      $danhmucnghi->save();
      $request->session()->put('message_update_danhmucnghi','Cập nhật thành công');
      return Redirect::to('danhmucnghi');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_danhmucnghi(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          DanhMucNghi::find($id)->delete();
        }
      }
    }
  }
  public function delete_all_danhmucnghi(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = DanhMucNghi::get();
      foreach($list as $key => $danhmucnghi){
        $danhmucnghi->delete();
      }
      return Redirect::to('danhmucnghi');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_danhmucnghi_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_dmn = $request->ma_dmn;
      DanhMucNghi::whereIn('ma_dmn', $ma_dmn)->delete();
      return redirect()->back();
    }
  }
}
