<?php

namespace App\Http\Controllers;

use App\Models\BangCap;
use App\Models\HeDaoTao;
use App\Models\LoaiBangCap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class BangCapController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function bangcap($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý loại bằng cấp";
    if($phanquyen_admin || $phanquyen_qltt){
      $list = BangCap::join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->where('ma_vc', $ma_vc)
        ->orderBy('ma_bc', 'desc')
        ->get();
      $count = BangCap::where('ma_vc', $ma_vc)
        ->select(DB::raw('count(ma_bc) as sum'))
        ->get();
      $count_status = BangCap::where('ma_vc', $ma_vc)
        ->select(DB::raw('count(ma_bc) as sum, status_bc'))
        ->groupBy('status_bc')
        ->get();
      $list_hedaotao = HeDaoTao::where('status_hdt', '<>', '1')
        ->orderBy('ten_hdt', 'asc')
        ->get();
      $list_loaibangcap = LoaiBangCap::where('status_lbc', '<>', '1')
        ->orderBy('ten_lbc', 'asc')
        ->get();
      $vienchuc = VienChuc::find($ma_vc);
      return view('bangcap.bangcap')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('ma_vc', $ma_vc)
        ->with('vienchuc', $vienchuc)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_bangcap(Request $request, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      $bangcap = new BangCap();
      $bangcap->ma_vc = $ma_vc;
      $bangcap->ma_hdt = $data['ma_hdt'];
      $bangcap->ma_lbc = $data['ma_lbc'];
      $bangcap->trinhdochuyenmon_bc = $data['trinhdochuyenmon_bc'];
      $bangcap->truonghoc_bc = $data['truonghoc_bc'];
      $bangcap->nienkhoa_bc = $data['nienkhoa_bc'];
      $bangcap->sobang_bc = $data['sobang_bc'];
      $bangcap->ngaycap_bc = $data['ngaycap_bc'];
      $bangcap->noicap_bc = $data['noicap_bc'];
      $bangcap->xephang_bc = $data['xephang_bc'];
      $bangcap->status_bc = $data['status_bc'];
      $bangcap->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/bangcap/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_bangcap($ma_bc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $bac = BangCap::find($ma_bc);
      if($bac->status_bc == 1){
        $bac->status_bc = BangCap::find($ma_bc)->update(['status_bc' => 0]);
      }elseif($bac->status_bc == 0){
        $bac->status_bc = BangCap::find($ma_bc)->update(['status_bc' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_bangcap($ma_bc, $ma_vc){
    $this->check_login();
    $title = "Cập nhật thông tin bằng cấp";
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = BangCap::find($ma_bc);
      $list_hedaotao = HeDaoTao::where('status_hdt', '<>', '1')
        ->orderBy('ten_hdt', 'asc')
        ->get();
      $list_loaibangcap = LoaiBangCap::where('status_lbc', '<>', '1')
        ->orderBy('ten_lbc', 'asc')
        ->get();
      return view('bangcap.bangcap_edit')
        ->with('edit', $edit)
        ->with('ma_vc', $ma_vc)
        ->with('title', $title)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_bangcap(Request $request, $ma_bc, $ma_vc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $bangcap = BangCap::find($ma_bc);
      $bangcap->ma_vc = $ma_vc;
      $bangcap->ma_hdt = $data['ma_hdt'];
      $bangcap->ma_lbc = $data['ma_lbc'];
      $bangcap->trinhdochuyenmon_bc = $data['trinhdochuyenmon_bc'];
      $bangcap->truonghoc_bc = $data['truonghoc_bc'];
      $bangcap->nienkhoa_bc = $data['nienkhoa_bc'];
      $bangcap->sobang_bc = $data['sobang_bc'];
      $bangcap->ngaycap_bc = $data['ngaycap_bc'];
      $bangcap->noicap_bc = $data['noicap_bc'];
      $bangcap->xephang_bc = $data['xephang_bc'];
      $bangcap->status_bc = $data['status_bc'];
      $bangcap->updated_bc = Carbon::now();
      $bangcap->save();
      return Redirect::to('/bangcap/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  // public function delete_bangcap($ma_n, $ma_b){
  //   $this->check_login();
  //   $ma_vc_login = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     Bac::find($ma_b)->delete();
  //     return Redirect::to('/bangcap/'.$ma_vc);
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  // public function delete_all_bangcap($ma_n){
  //   $this->check_login();
  //   $ma_vc = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt){
  //     $list = Bac::where('ma_n', $ma_n)
  //       ->get();
  //     foreach($list as $key => $bac){
  //       $bac->delete();
  //     }
  //     return Redirect::to('/bangcap/'.$ma_vc);
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
}
