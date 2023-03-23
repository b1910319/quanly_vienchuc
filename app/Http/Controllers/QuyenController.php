<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\Quyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;


class QuyenController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function quanly_quyen(){
    $this->check_login();
    $title = "Quản lý các quyền";
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin){
      $count = Quyen::select(DB::raw('count(ma_q) as sum'))->get();
      $count_status = Quyen::select(DB::raw('count(ma_q) as sum, status_q'))->groupBy('status_q')->get();
      $list = Quyen::orderBy('ma_q', 'desc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('quyen.quanly_quyen')
        ->with('count', $count)
        ->with('title', $title)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('count_status', $count_status)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function add_quyen(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      $quyen = new Quyen();
      $quyen->ten_q = $data['ten_q'];
      $quyen->mota_q = $data['mota_q'];
      $quyen->status_q = $data['status_q'];
      $quyen->save();
      return Redirect::to('/quanly_quyen');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function select_quyen($ma_q){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $quyen = Quyen::find($ma_q);
      if($quyen->status_q == 1){
        $quyen->status_q = Quyen::find($ma_q)->update(['status_q' => 0]);
      }elseif($quyen->status_q == 0){
        $quyen->status_q = Quyen::find($ma_q)->update(['status_q' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function edit_quyen($ma_q){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $title = "Cập nhật thông tin quyền";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin){
      $edit = Quyen::find($ma_q);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('quyen.quanly_quyen_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function update_quyen(Request $request, $ma_q){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $quyen = Quyen::find($ma_q);
      $quyen->ten_q = $data['ten_q'];
      $quyen->mota_q = $data['mota_q'];
      $quyen->status_q = $data['status_q'];
      $quyen->updated_q = Carbon::now();
      $quyen->save();
      return Redirect::to('quanly_quyen');
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function delete_quyen(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          Quyen::find($id)->delete();
          return Redirect::to('quanly_quyen');
        }
      }
    }
    
  }
  public function delete_all_quyen(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $list = Quyen::get();
      foreach($list as $key => $quyen){
        $quyen->delete();
      }
      return Redirect::to('quanly_quyen');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_quyen_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $ma_q = $request->ma_q;
      Quyen::whereIn('ma_q', $ma_q)->delete();
      return Redirect::to('quanly_quyen');
    }
  }
}
