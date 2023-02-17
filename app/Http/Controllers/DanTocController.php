<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\DanToc;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;


class DanTocController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function dantoc(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = DanToc::orderBy('ma_dt', 'desc')
        ->get();
      $count = DanToc::select(DB::raw('count(ma_dt) as sum'))->get();
      $count_status = DanToc::select(DB::raw('count(ma_dt) as sum, status_dt'))
        ->groupBy('status_dt')
        ->get();
      return view('dantoc.dantoc')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_dantoc(Request $request){
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
      $dantoc = new DanToc();
      $dantoc->ten_dt = $data['ten_dt'];
      $dantoc->status_dt = $data['status_dt'];
      $dantoc->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/dantoc');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_dantoc($ma_dt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $dantoc = DanToc::find($ma_dt);
      if($dantoc->status_dt == 1){
        $dantoc->status_dt = DanToc::find($ma_dt)->update(['status_dt' => 0]);
      }elseif($dantoc->status_dt == 0){
        $dantoc->status_dt = DanToc::find($ma_dt)->update(['status_dt' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function edit_dantoc($ma_dt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = DanToc::find($ma_dt);
      return view('dantoc.dantoc_edit')
        ->with('edit', $edit)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_dantoc(Request $request, $ma_dt){
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
      $dantoc = DanToc::find($ma_dt);
      $dantoc->ten_dt = $data['ten_dt'];
      $dantoc->status_dt = $data['status_dt'];
      $dantoc->updated_dt = Carbon::now();
      $dantoc->save();
      return Redirect::to('dantoc');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_dantoc($ma_dt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      DanToc::find($ma_dt)->delete();
      return Redirect::to('dantoc');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_all_dantoc(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = DanToc::get();
      foreach($list as $key => $dantoc){
        $dantoc->delete();
      }
      return Redirect::to('dantoc');
    }else{
      return Redirect::to('/home');
    }
  }
}
