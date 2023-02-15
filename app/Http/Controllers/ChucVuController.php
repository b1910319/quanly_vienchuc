<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\ChucVu;
use App\Models\DanToc;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;

class ChucVuController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function chucvu(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = ChucVu::orderBy('ma_cv', 'desc')
        ->get();
      $count = ChucVu::select(DB::raw('count(ma_cv) as sum'))->get();
      $count_status = ChucVu::select(DB::raw('count(ma_cv) as sum, status_cv'))
        ->groupBy('status_cv')
        ->get();
      return view('chucvu.chucvu')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_chucvu(Request $request){
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
      $chucvu = new ChucVu();
      $chucvu->ten_cv = $data['ten_cv'];
      $chucvu->status_cv = $data['status_cv'];
      $chucvu->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/chucvu');
    }else{
      return Redirect::to('/home');
    }
  }
  // public function select_dantoc($ma_dt){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $dantoc = DanToc::find($ma_dt);
  //     if($dantoc->status_dt == 1){
  //       $dantoc->status_dt = DanToc::find($ma_dt)->update(['status_dt' => 0]);
  //     }elseif($dantoc->status_dt == 0){
  //       $dantoc->status_dt = DanToc::find($ma_dt)->update(['status_dt' => 1]);
  //     }
  //     return Redirect::to('/dantoc');
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function edit_dantoc($ma_dt){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $edit = DanToc::find($ma_dt);
  //     return view('dantoc.dantoc_edit')
  //       ->with('edit', $edit)
  //       ->with('phanquyen_qltt', $phanquyen_qltt)
  //       ->with('phanquyen_admin', $phanquyen_admin);
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function update_dantoc(Request $request, $ma_dt){
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
  //     $dantoc = DanToc::find($ma_dt);
  //     $dantoc->ten_dt = $data['ten_dt'];
  //     $dantoc->status_dt = $data['status_dt'];
  //     $dantoc->updated_dt = Carbon::now();
  //     $dantoc->save();
  //     return Redirect::to('dantoc');
  //   }else{
  //     return Redirect::to('/home');
  //   }
    
  // }
  // public function delete_dantoc($ma_dt){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     DanToc::find($ma_dt)->delete();
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
  //     $list = DanToc::get();
  //     foreach($list as $key => $dantoc){
  //       $dantoc->delete();
  //     }
  //     return Redirect::to('dantoc');
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
