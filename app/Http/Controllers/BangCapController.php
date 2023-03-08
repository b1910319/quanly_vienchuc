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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý loại bằng cấp";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
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
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('bangcap.bangcap')
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('ma_vc', $ma_vc)
        ->with('vienchuc', $vienchuc)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_status', $count_status)
        ->with('count_nangbac', $count_nangbac)
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = BangCap::find($ma_bc);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
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
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_bangcap(Request $request, $ma_bc, $ma_vc){
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
  public function delete_bangcap($ma_bc, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      BangCap::find($ma_bc)->delete();
      return Redirect::to('/bangcap/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_all_bangcap($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = BangCap::where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $bangcap){
        $bangcap->delete();
      }
      return Redirect::to('/bangcap/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
}
