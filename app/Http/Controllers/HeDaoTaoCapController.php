<?php

namespace App\Http\Controllers;

use App\Models\HeDaoTao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;

class HeDaoTaoCapController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function hedaotao(){
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
      $list = HeDaoTao::orderBy('ma_hdt', 'desc')
        ->get();
      $count = HeDaoTao::select(DB::raw('count(ma_hdt) as sum'))->get();
      $count_status = HeDaoTao::select(DB::raw('count(ma_hdt) as sum, status_hdt'))
        ->groupBy('status_hdt')
        ->get();
      return view('hedaotao.hedaotao')
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
  public function add_hedaotao(Request $request){
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
      $hedaotao = new hedaotao();
      $hedaotao->ten_hdt = $data['ten_hdt'];
      $hedaotao->status_hdt = $data['status_hdt'];
      $hedaotao->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/hedaotao');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_hedaotao($ma_hdt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $hedaotao = HeDaoTao::find($ma_hdt);
      if($hedaotao->status_hdt == 1){
        $hedaotao->status_hdt = HeDaoTao::find($ma_hdt)->update(['status_hdt' => 0]);
      }elseif($hedaotao->status_hdt == 0){
        $hedaotao->status_hdt = HeDaoTao::find($ma_hdt)->update(['status_hdt' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  // public function edit_hedaotao($ma_hdt){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   $title = "Cập nhật thông tin loại bằng cấp";
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $edit = HeDaoTao::find($ma_hdt);
  //     return view('hedaotao.hedaotao_edit')
  //       ->with('edit', $edit)
  //       ->with('title', $title)
  //       ->with('phanquyen_qltt', $phanquyen_qltt)
  //       ->with('phanquyen_admin', $phanquyen_admin);
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function update_hedaotao(Request $request, $ma_hdt){
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
  //     $hedaotao = HeDaoTao::find($ma_hdt);
  //     $hedaotao->ten_hdt = $data['ten_hdt'];
  //     $hedaotao->status_hdt = $data['status_hdt'];
  //     $hedaotao->updated_hdt = Carbon::now();
  //     $hedaotao->save();
  //     return Redirect::to('hedaotao');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function delete_hedaotao($ma_hdt){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     HeDaoTao::find($ma_hdt)->delete();
  //     return Redirect::to('hedaotao');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function delete_all_hedaotao(){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $list = HeDaoTao::get();
  //     foreach($list as $key => $hedaotao){
  //       $hedaotao->delete();
  //     }
  //     return Redirect::to('hedaotao');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
