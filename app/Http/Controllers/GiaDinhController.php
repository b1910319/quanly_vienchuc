<?php

namespace App\Http\Controllers;

use App\Imports\GiaDinhImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\GiaDinh;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class GiaDinhController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function giadinh($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thông tin quan hệ gia đình";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $list = GiaDinh::where('ma_vc', $ma_vc)
        ->orderBy('ma_gd', 'desc')
        ->get();
      $count = GiaDinh::select(DB::raw('count(ma_gd) as sum'))
        ->where('ma_vc', $ma_vc)
        ->get();
      $count_status = GiaDinh::select(DB::raw('count(ma_gd) as sum, status_gd'))
        ->where('ma_vc', $ma_vc)
        ->groupBy('status_gd')
        ->get();
      $vienchuc = VienChuc::find($ma_vc);
      return view('giadinh.giadinh')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('ma_vc', $ma_vc)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('vienchuc', $vienchuc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('title', $title);
    }
  }
  public function add_giadinh(Request $request, $ma_vc){
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
      $giadinh = new GiaDinh();
      $giadinh->moiquanhe_gd = $data['moiquanhe_gd'];
      $giadinh->hoten_gd = $data['hoten_gd'];
      $giadinh->sdt_gd = $data['sdt_gd'];
      $giadinh->ngaysinh_gd = $data['ngaysinh_gd'];
      $giadinh->nghenghiep_gd = $data['nghenghiep_gd'];
      $giadinh->status_gd = $data['status_gd'];
      $giadinh->ma_vc = $ma_vc;
      $giadinh->save();
      return Redirect::to('/giadinh/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_giadinh_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Excel::import(new GiaDinhImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_giadinh($ma_gd){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $giadinh = GiaDinh::find($ma_gd);
      if($giadinh->status_gd == 1){
        $giadinh->status_gd = GiaDinh::find($ma_gd)->update(['status_gd' => 0]);
      }elseif($giadinh->status_gd == 0){
        $giadinh->status_gd = GiaDinh::find($ma_gd)->update(['status_gd' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_giadinh($ma_gd){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật thông tin bâc";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = GiaDinh::find($ma_gd);
      $list_vienchuc = VienChuc::where('status_vc', '<>', '1')
        ->get();
      return view('giadinh.giadinh_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_giadinh(Request $request, $ma_gd, $ma_vc){
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
      $giadinh = GiaDinh::find($ma_gd);
      $giadinh->moiquanhe_gd = $data['moiquanhe_gd'];
      $giadinh->hoten_gd = $data['hoten_gd'];
      $giadinh->sdt_gd = $data['sdt_gd'];
      $giadinh->ngaysinh_gd = $data['ngaysinh_gd'];
      $giadinh->nghenghiep_gd = $data['nghenghiep_gd'];
      $giadinh->status_gd = $data['status_gd'];
      $giadinh->ma_vc = $data['ma_vc'];
      $giadinh->updated_gd = Carbon::now();
      $giadinh->save();
      return Redirect::to('/giadinh/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_giadinh(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          GiaDinh::find($id)->delete();
        }
      }
    }
  }
  public function delete_giadinh_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_gd = $request->ma_gd;
      GiaDinh::whereIn('ma_gd', $ma_gd)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_giadinh($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = GiaDinh::where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $giadinh){
        $giadinh->delete();
      }
      return Redirect::to('/giadinh/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
}
