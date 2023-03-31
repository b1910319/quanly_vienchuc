<?php

namespace App\Http\Controllers;

use App\Models\ChauLuc;
use App\Models\KhuVuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class KhuVucController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function khuvuc($ma_cl){
    $this->check_login();
    $title = "Quản lý khu vực";
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $count = KhuVuc::select(DB::raw('count(ma_kv) as sum'))
        ->where('ma_cl', $ma_cl)
        ->get();
      $count_status = KhuVuc::select(DB::raw('count(ma_kv) as sum, status_kv'))
        ->where('ma_cl', $ma_cl)
        ->groupBy('status_kv')
        ->get();
      $list = KhuVuc::orderBy('ma_kv', 'desc')
        ->where('ma_cl', $ma_cl)
        ->get();
      $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
        ->where('ma_q', '=', '8')
        ->first();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $chauluc = ChauLuc::find($ma_cl);
      return view('khuvuc.khuvuc')
        ->with('count', $count)
        ->with('title', $title)
        ->with('chauluc', $chauluc)

        ->with('count_status', $count_status)
        ->with('count_nangbac', $count_nangbac)

        ->with('list', $list)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function add_khuvuc(Request $request){
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
      $khuvuc = new khuvuc();
      $khuvuc->ma_cl = $data['ma_cl'];
      $khuvuc->ten_kv = $data['ten_kv'];
      $khuvuc->status_kv = $data['status_kv'];
      $khuvuc->save();
      return Redirect::to('/khuvuc/'.$data['ma_cl']);
    }else{
      return Redirect::to('/home');
    }
  }

  public function select_khuvuc($ma_kv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $khuvuc = KhuVuc::find($ma_kv);
      if($khuvuc->status_kv == 1){
        $khuvuc->status_kv = KhuVuc::find($ma_kv)->update(['status_kv' => 0]);
      }elseif($khuvuc->status_kv == 0){
        $khuvuc->status_kv = KhuVuc::find($ma_kv)->update(['status_kv' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_khuvuc($ma_kv){
    $this->check_login();
    $title = "Cập nhật thông tin khuvuc";
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $edit = KhuVuc::find($ma_kv);
      $ma_vc = session()->get('ma_vc');
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_chauluc = ChauLuc::orderBy('ten_cl', 'asc')
        ->get();
      return view('khuvuc.khuvuc_edit')
        ->with('title', $title)
        ->with('edit', $edit)

        ->with('count_nangbac', $count_nangbac)

        ->with('list_chauluc', $list_chauluc)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_khuvuc(Request $request, $ma_kv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $khuvuc = KhuVuc::find($ma_kv);
      $khuvuc->ten_kv = $data['ten_kv'];
      $khuvuc->ma_cl = $data['ma_cl'];
      $khuvuc->status_kv = $data['status_kv'];
      $khuvuc->updated_kv = Carbon::now();
      $khuvuc->save();
      return Redirect::to('khuvuc/'.$data['ma_cl']);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_khuvuc(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          KhuVuc::find($id)->delete();
        }
      }
    }
  }
  public function delete_khuvuc_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_kv = $request->ma_kv;
      KhuVuc::whereIn('ma_kv', $ma_kv)->delete();
      return Redirect::to('khuvuc');
    }
  }
  public function delete_all_khuvuc(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = KhuVuc::get();
      foreach($list as $key => $khuvuc){
        $khuvuc->delete();
      }
      return Redirect::to('khuvuc');
    }else{
      return Redirect::to('/home');
    }
  }
}
