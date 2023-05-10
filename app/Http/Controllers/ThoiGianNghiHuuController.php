<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\ThoiGianNghiHuu;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ThoiGianNghiHuuController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function thoigiannghihuu(){
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
    $title = "Quản lý thời gian nghỉ hưu";
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
      $list = ThoiGianNghiHuu::orderBy('ma_tgnh', 'desc')
        ->get();
      return view('thoigiannghihuu.thoigiannghihuu')
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
  public function check_thoigian_tgnh(Request $request){
    $this->check_login();
    if($request->ajax()){
      $thoigian_tgnh = $request->thoigian_tgnh;
      if($thoigian_tgnh != null){
        $thoigiannghihuu = ThoiGianNghiHuu::where('thoigian_tgnh', $thoigian_tgnh)
          ->first();
        if(isset($thoigiannghihuu)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_thoigian_tgnh_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $thoigian_tgnh = $request->thoigian_tgnh;
      $ma_tgnh = $request->ma_tgnh;
      if($thoigian_tgnh != null && $ma_tgnh != null){
        $thoigiannghihuu = ThoiGianNghiHuu::where('thoigian_tgnh', $thoigian_tgnh)
          ->where('ma_tgnh', '<>', $ma_tgnh)
          ->first();
        if(isset($thoigiannghihuu)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_thoigiannghihuu(Request $request){
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
      $thoigiannghihuu = new ThoiGianNghiHuu();
      $thoigiannghihuu->thoigian_tgnh = $data['thoigian_tgnh'];
      $thoigiannghihuu->nam_tgnh = $data['tuoinam']*12+$data['thangnam'];
      $thoigiannghihuu->nu_tgnh = $data['tuoinu']*12+$data['thangnu'];
      $thoigiannghihuu->status_tgnh = $data['status_tgnh'];
      $thoigiannghihuu->save();
      $request->session()->put('message_add_thoigiannghi','Thêm thành công');
      return Redirect::to('/thoigiannghihuu');
    }else{
      return Redirect::to('/home');
    }
  }

  public function select_thoigiannghihuu($ma_tgnh){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $thoigiannghihuu = ThoiGianNghiHuu::find($ma_tgnh);
      if($thoigiannghihuu->status_tgnh == 1){
        $thoigiannghihuu->status_tgnh = ThoiGianNghiHuu::find($ma_tgnh)->update(['status_tgnh' => 0]);
      }elseif($thoigiannghihuu->status_tgnh == 0){
        $thoigiannghihuu->status_tgnh = ThoiGianNghiHuu::find($ma_tgnh)->update(['status_tgnh' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function edit_thoigiannghihuu($ma_tgnh){
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
    $title = "Cập nhật thông tin thời gian nghỉ hưu";
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
      $edit = ThoiGianNghiHuu::find($ma_tgnh);
      return view('thoigiannghihuu.thoigiannghihuu_edit')
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
  public function update_thoigiannghihuu(Request $request, $ma_tgnh){
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
      $thoigiannghihuu = ThoiGianNghiHuu::find($ma_tgnh);
      $thoigiannghihuu->thoigian_tgnh = $data['thoigian_tgnh'];
      $thoigiannghihuu->nam_tgnh = $data['tuoinam']*12+$data['thangnam'];
      $thoigiannghihuu->nu_tgnh = $data['tuoinu']*12+$data['thangnu'];
      $thoigiannghihuu->status_tgnh = $data['status_tgnh'];
      $thoigiannghihuu->save();
      $request->session()->put('message_update_thoigiannghi','Cập nhật thành công');
      return Redirect::to('thoigiannghihuu');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_thoigiannghihuu(Request $request){
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
          ThoiGianNghiHuu::find($id)->delete();
        }
      }
    }
  }
  public function delete_all_thoigiannghihuu(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = ThoiGianNghiHuu::get();
      foreach($list as $key => $thoigiannghihuu){
        $thoigiannghihuu->delete();
      }
      return Redirect::to('thoigiannghihuu');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_thoigiannghihuu_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_tgnh = $request->ma_tgnh;
      ThoiGianNghiHuu::whereIn('ma_tgnh', $ma_tgnh)->delete();
      return redirect()->back();
    }
  }
}
