<?php

namespace App\Http\Controllers;

use App\Imports\NhiemKyImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\NhiemKy;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class NhiemKyController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function nhiemky(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $title = "Quản lý thông tin nhiệm kỳ";
    if($phanquyen_qlqtcv || $phanquyen_admin){
      $list = NhiemKy::orderBy('ma_nk', 'desc')
        ->get();
      $count = NhiemKy::select(DB::raw('count(ma_nk) as sum'))->get();
      $count_status = NhiemKy::select(DB::raw('count(ma_nk) as sum, status_nk'))
        ->groupBy('status_nk')
        ->get();
      return view('nhiemky.nhiemky')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_nhiemky(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $data = $request->all();
      $nhiemky = new NhiemKy();
      $nhiemky->ten_nk = $data['ten_nk'];
      $nhiemky->status_nk = $data['status_nk'];
      $nhiemky->save();
      return Redirect::to('/nhiemky');
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_nhiemky_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      Excel::import(new NhiemKyImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_nhiemky($ma_nk){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $nhiemky = NhiemKy::find($ma_nk);
      if($nhiemky->status_nk == 1){
        $nhiemky->status_nk = NhiemKy::find($ma_nk)->update(['status_nk' => 0]);
      }elseif($nhiemky->status_nk == 0){
        $nhiemky->status_nk = NhiemKy::find($ma_nk)->update(['status_nk' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function edit_nhiemky($ma_nk){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $title = "Cập nhật thông tin nhiệm kỳ";
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $edit = NhiemKy::find($ma_nk);
      return view('nhiemky.nhiemky_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_nhiemky(Request $request, $ma_nk){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $nhiemky = NhiemKy::find($ma_nk);
      $nhiemky->ten_nk = $data['ten_nk'];
      $nhiemky->status_nk = $data['status_nk'];
      $nhiemky->updated_nk = Carbon::now();
      $nhiemky->save();
      return Redirect::to('nhiemky');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_nhiemky(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          NhiemKy::find($id)->delete();
        }
      }
    }
  }
  public function delete_all_nhiemky(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $list = NhiemKy::get();
      foreach($list as $key => $nhiemky){
        $nhiemky->delete();
      }
      return Redirect::to('nhiemky');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_nhiemky_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $ma_nk = $request->ma_nk;
      NhiemKy::whereIn('ma_nk', $ma_nk)->delete();
      return redirect()->back();
    }
  }
}
