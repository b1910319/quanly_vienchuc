<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\TonGiao;
use Illuminate\Support\Carbon;

class TonGiaoController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function tongiao(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = TonGiao::orderBy('ma_tg', 'desc')
        ->get();
      $count = TonGiao::select(DB::raw('count(ma_tg) as sum'))->get();
      $count_status = TonGiao::select(DB::raw('count(ma_tg) as sum, status_tg'))
        ->groupBy('status_tg')
        ->get();
      return view('tongiao.tongiao')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_tongiao(Request $request){
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
      $tongiao = new TonGiao();
      $tongiao->ten_tg = $data['ten_tg'];
      $tongiao->status_tg = $data['status_tg'];
      $tongiao->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/tongiao');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_tongiao($ma_tg){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $tongiao = TonGiao::find($ma_tg);
      if($tongiao->status_tg == 1){
        $tongiao->status_tg = TonGiao::find($ma_tg)->update(['status_tg' => 0]);
      }elseif($tongiao->status_tg == 0){
        $tongiao->status_tg = TonGiao::find($ma_tg)->update(['status_tg' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_tongiao($ma_tg){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = TonGiao::find($ma_tg);
      return view('tongiao.tongiao_edit')
        ->with('edit', $edit)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_tongiao(Request $request, $ma_tg){
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
      $tongiao = TonGiao::find($ma_tg);
      $tongiao->ten_tg = $data['ten_tg'];
      $tongiao->status_tg = $data['status_tg'];
      $tongiao->updated_tg = Carbon::now();
      $tongiao->save();
      return Redirect::to('tongiao');
    }else{
      return Redirect::to('/home');
    }
  }
  // public function delete_tongiao($ma_tg){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     TonGiao::find($ma_tg)->delete();
  //     return Redirect::to('tongiao');
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function delete_all_tongiao(){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $list = TonGiao::get();
  //     foreach($list as $key => $tongiao){
  //       $tongiao->delete();
  //     }
  //     return Redirect::to('tongiao');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
