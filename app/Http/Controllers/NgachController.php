<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Ngach;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;

class NgachController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function ngach(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = Ngach::orderBy('ma_n', 'desc')
        ->get();
      $count = Ngach::select(DB::raw('count(ma_n) as sum'))->get();
      $count_status = Ngach::select(DB::raw('count(ma_n) as sum, status_n'))
        ->groupBy('status_n')
        ->get();
      return view('ngach.ngach')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_ngach(Request $request){
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
      $ngach = new Ngach();
      $ngach->ten_n = $data['ten_n'];
      $ngach->maso_n = $data['maso_n'];
      $ngach->sonamnangbac_n = $data['sonamnangbac_n'];
      $ngach->status_n = $data['status_n'];
      $ngach->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/ngach');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_ngach($ma_n){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ngach = Ngach::find($ma_n);
      if($ngach->status_n == 1){
        $ngach->status_n = Ngach::find($ma_n)->update(['status_n' => 0]);
      }elseif($ngach->status_n == 0){
        $ngach->status_n = Ngach::find($ma_n)->update(['status_n' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_ngach($ma_n){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = Ngach::find($ma_n);
      return view('ngach.ngach_edit')
        ->with('edit', $edit)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_ngach(Request $request, $ma_n){
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
      $ngach = Ngach::find($ma_n);
      $ngach->ten_n = $data['ten_n'];
      $ngach->maso_n = $data['maso_n'];
      $ngach->sonamnangbac_n = $data['sonamnangbac_n'];
      $ngach->status_n = $data['status_n'];
      $ngach->updated_n = Carbon::now();
      $ngach->save();
      return Redirect::to('ngach');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_ngach($ma_n){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Ngach::find($ma_n)->delete();
      return Redirect::to('ngach');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_all_ngach(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = Ngach::get();
      foreach($list as $key => $ngach){
        $ngach->delete();
      }
      return Redirect::to('ngach');
    }else{
      return Redirect::to('/home');
    }
  }
}
