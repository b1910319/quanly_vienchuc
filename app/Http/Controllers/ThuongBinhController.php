<?php

namespace App\Http\Controllers;

use App\Imports\ThuongBinhImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\ThuongBinh;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ThuongBinhController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function thuongbinh(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $title = "Quản lý thông tin thương binh";
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = ThuongBinh::orderBy('ma_tb', 'desc')
        ->get();
      $count = ThuongBinh::select(DB::raw('count(ma_tb) as sum'))->get();
      $count_status = ThuongBinh::select(DB::raw('count(ma_tb) as sum, status_tb'))
        ->groupBy('status_tb')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('thuongbinh.thuongbinh')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('count_nangbac', $count_nangbac)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_ten_tb(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_tb = $request->ten_tb;
      if($ten_tb != null){
        $thuongbinh = ThuongBinh::where('ten_tb', $ten_tb)
          ->first();
        if(isset($thuongbinh)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_ten_tb_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_tb = $request->ten_tb;
      $ma_tb = $request->ma_tb;
      if($ten_tb != null && $ma_tb != null){
        $thuongbinh = ThuongBinh::where('ten_tb', $ten_tb)
          ->where('ma_tb', '<>', $ma_tb)
          ->first();
        if(isset($thuongbinh)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_thuongbinh(Request $request){
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
      $thuongbinh = new thuongbinh();
      $thuongbinh->ten_tb = $data['ten_tb'];
      $thuongbinh->mota_tb = $data['mota_tb'];
      $thuongbinh->status_tb = $data['status_tb'];
      $thuongbinh->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/thuongbinh');
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_thuongbinh_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Excel::import(new ThuongBinhImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_thuongbinh($ma_tb){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $thuongbinh = ThuongBinh::find($ma_tb);
      if($thuongbinh->status_tb == 1){
        $thuongbinh->status_tb = ThuongBinh::find($ma_tb)->update(['status_tb' => 0]);
      }elseif($thuongbinh->status_tb == 0){
        $thuongbinh->status_tb = ThuongBinh::find($ma_tb)->update(['status_tb' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_thuongbinh($ma_tb){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Cập nhật thông tin thương binh";
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = ThuongBinh::find($ma_tb);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('thuongbinh.thuongbinh_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_thuongbinh(Request $request, $ma_tb){
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
      $thuongbinh = ThuongBinh::find($ma_tb);
      $thuongbinh->ten_tb = $data['ten_tb'];
      $thuongbinh->mota_tb = $data['mota_tb'];
      $thuongbinh->status_tb = $data['status_tb'];
      $thuongbinh->updated_tb = Carbon::now();
      $thuongbinh->save();
      return Redirect::to('thuongbinh');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_thuongbinh(Request $request){
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
          ThuongBinh::find($id)->delete();
        }
      }
    }
  }
  public function delete_all_thuongbinh(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = ThuongBinh::get();
      foreach($list as $key => $thuongbinh){
        $thuongbinh->delete();
      }
      return Redirect::to('thuongbinh');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_thuongbinh_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_tb = $request->ma_tb;
      ThuongBinh::whereIn('ma_tb', $ma_tb)->delete();
      return redirect()->back();
    }
  }
}
