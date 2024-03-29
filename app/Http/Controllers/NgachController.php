<?php

namespace App\Http\Controllers;

use App\Imports\NgachImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Ngach;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class NgachController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function ngach(){
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
    $title = "Quản lý thông tin ngạch";
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
      $list = Ngach::orderBy('ma_n', 'desc')
        ->get();
      $count = Ngach::select(DB::raw('count(ma_n) as sum'))->get();
      $count_status = Ngach::select(DB::raw('count(ma_n) as sum, status_n'))
        ->groupBy('status_n')
        ->get();
      $count_bac_ngach = Ngach::leftJoin('bac', 'ngach.ma_n', '=', 'bac.ma_n')
        ->select(DB::raw('count(ma_b) as sum, ngach.ma_n'))
        ->groupBy('ngach.ma_n')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('ngach.ngach')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_bac_ngach',$count_bac_ngach)
        ->with('count_status', $count_status)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_ten_n(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_n = $request->ten_n;
      if($ten_n != null){
        $ngach = Ngach::where('ten_n', $ten_n)
          ->first();
        if(isset($ngach)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_maso_n(Request $request){
    $this->check_login();
    if($request->ajax()){
      $maso_n = $request->maso_n;
      if($maso_n != null){
        $ngach = Ngach::where('maso_n', $maso_n)
          ->first();
        if(isset($ngach)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_ten_n_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_n = $request->ten_n;
      $ma_n = $request->ma_n;
      if($ten_n != null && $ma_n != null){
        $ngach = Ngach::where('ten_n', $ten_n)
          ->where('ma_n', '<>', $ma_n)
          ->first();
        if(isset($ngach)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_maso_n_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $maso_n = $request->maso_n;
      $ma_q = $request->ma_q;
      if($maso_n != null && $ma_q != null){
        $ngach = Ngach::where('maso_n', $maso_n)
          ->where('ma_q', '<>', $ma_q)
          ->first();
        if(isset($ngach)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_ngach(Request $request){
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
      $ngach = new Ngach();
      $ngach->ten_n = $data['ten_n'];
      $ngach->maso_n = $data['maso_n'];
      $ngach->sonamnangbac_n = $data['sonamnangbac_n'];
      $ngach->status_n = $data['status_n'];
      $ngach->save();
      $request->session()->put('message_add_ngach','Thêm thành công');
      return Redirect::to('/ngach');
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_ngach_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Excel::import(new NgachImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_ngach($ma_n){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ngach = Ngach::find($ma_n);
      if($ngach->status_n == 1){
        $ngach->status_n = Ngach::find($ma_n)->update(['status_n' => 0]);
      }elseif($ngach->status_n == 0){
        $ngach->status_n = Ngach::find($ma_n)->update(['status_n' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_ngach($ma_n){
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
    $title = "Cập nhật thông tin ngạch";
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
      $edit = Ngach::find($ma_n);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('ngach.ngach_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_ngach(Request $request, $ma_n){
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
      $ngach = Ngach::find($ma_n);
      $ngach->ten_n = $data['ten_n'];
      $ngach->maso_n = $data['maso_n'];
      $ngach->sonamnangbac_n = $data['sonamnangbac_n'];
      $ngach->status_n = $data['status_n'];
      $ngach->updated_n = Carbon::now();
      $ngach->save();
      $request->session()->put('message_update_ngach','Cập nhật thành công');
      return Redirect::to('ngach');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_ngach(Request $request){
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
          Ngach::find($id)->delete();
        }
      }
    }
  }
  public function delete_all_ngach(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = Ngach::get();
      foreach($list as $key => $ngach){
        $ngach->delete();
      }
      return Redirect::to('ngach');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_ngach_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_n = $request->ma_n;
      Ngach::whereIn('ma_n', $ma_n)->delete();
      return redirect()->back();
    }
  }
}
