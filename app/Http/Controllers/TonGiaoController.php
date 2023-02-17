<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\DanToc;
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
  // public function select_dantoc($ma_tg){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $dantoc = TonGiao::find($ma_tg);
  //     if($dantoc->status_tg == 1){
  //       $dantoc->status_tg = TonGiao::find($ma_tg)->update(['status_tg' => 0]);
  //     }elseif($dantoc->status_tg == 0){
  //       $dantoc->status_tg = TonGiao::find($ma_tg)->update(['status_tg' => 1]);
  //     }
  //     return redirect()->back();
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function edit_dantoc($ma_tg){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $edit = TonGiao::find($ma_tg);
  //     return view('dantoc.dantoc_edit')
  //       ->with('edit', $edit)
  //       ->with('phanquyen_qltt', $phanquyen_qltt)
  //       ->with('phanquyen_admin', $phanquyen_admin);
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function update_dantoc(Request $request, $ma_tg){
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
  //     $dantoc = TonGiao::find($ma_tg);
  //     $dantoc->ten_tg = $data['ten_tg'];
  //     $dantoc->status_tg = $data['status_tg'];
  //     $dantoc->updated_tg = Carbon::now();
  //     $dantoc->save();
  //     return Redirect::to('dantoc');
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function delete_dantoc($ma_tg){
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
  //     return Redirect::to('dantoc');
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function delete_all_dantoc(){
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
  //     foreach($list as $key => $dantoc){
  //       $dantoc->delete();
  //     }
  //     return Redirect::to('dantoc');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
