<?php

namespace App\Http\Controllers;

use App\Models\DanhMucLop;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class LopController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function lop(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý thông tin lớp";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Lop::orderBy('ma_l', 'desc')
        ->get();
      $count = Lop::select(DB::raw('count(ma_l) as sum'))->get();
      $count_status = Lop::select(DB::raw('count(ma_l) as sum, status_l'))
        ->groupBy('status_l')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_danhmuclop = DanhMucLop::where('status_dml', '<>', '1')
        ->orderBy('ten_dml', 'asc')
        ->get();
      return view('lop.lop')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('list_danhmuclop', $list_danhmuclop)
        ->with('count_status', $count_status)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_lop(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $data = $request->all();
      $lop = new Lop();
      $lop->ma_dml = $data['ma_dml'];
      $lop->ten_l = $data['ten_l'];
      $lop->ngaybatdau_l = $data['ngaybatdau_l'];
      $lop->ngayketthuc_l = $data['ngayketthuc_l'];
      $lop->yeucau_l = $data['yeucau_l'];
      $lop->tencosodaotao_l = $data['tencosodaotao_l'];
      $lop->quocgiaodaotao_l = $data['quocgiaodaotao_l'];
      $lop->nganhhoc_l = $data['nganhhoc_l'];
      $lop->trinhdodaotao_l = $data['trinhdodaotao_l'];
      $lop->nguonkinhphi_l = $data['nguonkinhphi_l'];
      $lop->noidunghoc_l = $data['noidunghoc_l'];
      $lop->diachidaotao_l = $data['diachidaotao_l'];
      $lop->emailcoso_l = $data['emailcoso_l'];
      $lop->sdtcoso_l = $data['sdtcoso_l'];
      $lop->status_l = $data['status_l'];
      $lop->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/lop');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_lop($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $lop = Lop::find($ma_l);
      if($lop->status_l == 1){
        $lop->status_l = Lop::find($ma_l)->update(['status_l' => 0]);
      }elseif($lop->status_l == 0){
        $lop->status_l = Lop::find($ma_l)->update(['status_l' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_lop($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật thông tin lớp";
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $edit = Lop::find($ma_l);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $list_danhmuclop = DanhMucLop::where('status_dml', '<>', '1')
      ->orderBy('ten_dml', 'asc')
      ->get();
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('lop.lop_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('list_danhmuclop', $list_danhmuclop)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_lop(Request $request, $ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $lop = Lop::find($ma_l);
      $lop->ma_dml = $data['ma_dml'];
      $lop->ten_l = $data['ten_l'];
      $lop->ngaybatdau_l = $data['ngaybatdau_l'];
      $lop->ngayketthuc_l = $data['ngayketthuc_l'];
      $lop->yeucau_l = $data['yeucau_l'];
      $lop->tencosodaotao_l = $data['tencosodaotao_l'];
      $lop->quocgiaodaotao_l = $data['quocgiaodaotao_l'];
      $lop->nganhhoc_l = $data['nganhhoc_l'];
      $lop->trinhdodaotao_l = $data['trinhdodaotao_l'];
      $lop->nguonkinhphi_l = $data['nguonkinhphi_l'];
      $lop->noidunghoc_l = $data['noidunghoc_l'];
      $lop->diachidaotao_l = $data['diachidaotao_l'];
      $lop->emailcoso_l = $data['emailcoso_l'];
      $lop->sdtcoso_l = $data['sdtcoso_l'];
      $lop->status_l = $data['status_l'];
      $lop->updated_l = Carbon::now();
      $lop->save();
      return Redirect::to('lop');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_lop($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Lop::find($ma_l)->delete();
      return Redirect::to('lop');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_all_lop(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Lop::get();
      foreach($list as $key => $lop){
        $lop->delete();
      }
      return Redirect::to('lop');
    }else{
      return Redirect::to('/home');
    }
  }
}
