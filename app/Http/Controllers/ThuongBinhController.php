<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Khoa;
use App\Models\PhanQuyen;
use App\Models\ThuongBinh;
use Illuminate\Support\Carbon;

class ThuongBinhController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function thuongbinh(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = ThuongBinh::orderBy('ma_tb', 'desc')
        ->get();
      $count = ThuongBinh::select(DB::raw('count(ma_tb) as sum'))->get();
      $count_status = ThuongBinh::select(DB::raw('count(ma_tb) as sum, status_tb'))
        ->groupBy('status_tb')
        ->get();
      return view('thuongbinh.thuongbinh')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_thuongbinh(Request $request){
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
      $thuongbinh = new thuongbinh();
      $thuongbinh->ten_tb = $data['ten_tb'];
      $thuongbinh->mota_tb = $data['mota_tb'];
      $thuongbinh->status_tb = $data['status_tb'];
      $thuongbinh->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/thuongbinh');
    }else{
      return Redirect::to('/home');
    }
  }
  // public function select_thuongbinh($ma_tb){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $thuongbinh = ThuongBinh::find($ma_tb);
  //     if($thuongbinh->status_tb == 1){
  //       $thuongbinh->status_tb = ThuongBinh::find($ma_tb)->update(['status_tb' => 0]);
  //     }elseif($thuongbinh->status_tb == 0){
  //       $thuongbinh->status_tb = ThuongBinh::find($ma_tb)->update(['status_tb' => 1]);
  //     }
  //     return redirect()->back();
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function edit_thuongbinh($ma_tb){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $edit = ThuongBinh::find($ma_tb);
  //     return view('thuongbinh.thuongbinh_edit')
  //       ->with('edit', $edit)
  //       ->with('phanquyen_qltt', $phanquyen_qltt)
  //       ->with('phanquyen_admin', $phanquyen_admin);
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function update_thuongbinh(Request $request, $ma_tb){
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
  //     $thuongbinh = ThuongBinh::find($ma_tb);
  //     $thuongbinh->ten_tb = $data['ten_tb'];
  //     $thuongbinh->status_tb = $data['status_tb'];
  //     $thuongbinh->updated_tb = Carbon::now();
  //     $thuongbinh->save();
  //     return Redirect::to('thuongbinh');
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function delete_thuongbinh($ma_tb){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     ThuongBinh::find($ma_tb)->delete();
  //     return Redirect::to('thuongbinh');
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function delete_all_thuongbinh(){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $list = ThuongBinh::get();
  //     foreach($list as $key => $thuongbinh){
  //       $thuongbinh->delete();
  //     }
  //     return Redirect::to('thuongbinh');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
