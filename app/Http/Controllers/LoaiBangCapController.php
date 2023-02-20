<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\ChucVu;
use App\Models\LoaiBangCap;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;

class LoaiBangCapController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function loaibangcap(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý loại bằng cấp";
    if($phanquyen_admin || $phanquyen_qltt){
      $list = LoaiBangCap::orderBy('ma_lbc', 'desc')
        ->get();
      $count = LoaiBangCap::select(DB::raw('count(ma_lbc) as sum'))->get();
      $count_status = LoaiBangCap::select(DB::raw('count(ma_lbc) as sum, status_lbc'))
        ->groupBy('status_lbc')
        ->get();
      return view('loaibangcap.loaibangcap')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_loaibangcap(Request $request){
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
      $loaibangcap = new LoaiBangCap();
      $loaibangcap->ten_lbc = $data['ten_lbc'];
      $loaibangcap->status_lbc = $data['status_lbc'];
      $loaibangcap->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/loaibangcap');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_loaibangcap($ma_lbc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $loaibangcap = LoaiBangCap::find($ma_lbc);
      if($loaibangcap->status_lbc == 1){
        $loaibangcap->status_lbc = LoaiBangCap::find($ma_lbc)->update(['status_lbc' => 0]);
      }elseif($loaibangcap->status_lbc == 0){
        $loaibangcap->status_lbc = LoaiBangCap::find($ma_lbc)->update(['status_lbc' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  // public function edit_chucvu($ma_lbc){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   $title = "Cập nhật thông tin chức vụ";
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $edit = ChucVu::find($ma_lbc);
  //     return view('chucvu.chucvu_edit')
  //       ->with('edit', $edit)
  //       ->with('title', $title)
  //       ->with('phanquyen_qltt', $phanquyen_qltt)
  //       ->with('phanquyen_admin', $phanquyen_admin);
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function update_chucvu(Request $request, $ma_lbc){
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
  //     $chucvu = ChucVu::find($ma_lbc);
  //     $chucvu->ten_lbc = $data['ten_lbc'];
  //     $chucvu->status_lbc = $data['status_lbc'];
  //     $chucvu->updated_lbc = Carbon::now();
  //     $chucvu->save();
  //     return Redirect::to('chucvu');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function delete_chucvu($ma_lbc){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     ChucVu::find($ma_lbc)->delete();
  //     return Redirect::to('chucvu');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function delete_all_chucvu(){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $list = ChucVu::get();
  //     foreach($list as $key => $chucvu){
  //       $chucvu->delete();
  //     }
  //     return Redirect::to('chucvu');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}