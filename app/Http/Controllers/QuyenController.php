<?php

namespace App\Http\Controllers;

use App\Imports\QuyenImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\Quyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;


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
    if($phanquyen_admin){
      $count = Quyen::select(DB::raw('count(ma_q) as sum'))->get();
      $count_status = Quyen::select(DB::raw('count(ma_q) as sum, status_q'))->groupBy('status_q')->get();
      $list = Quyen::orderBy('ma_q', 'desc')
        ->get();
      return view('quyen.quanly_quyen')
        ->with('count', $count)
        ->with('title', $title)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function check_ten_q(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_q = $request->ten_q;
      if($ten_q != null){
        $quyen = Quyen::where('ten_q', $ten_q)
          ->first();
        if(isset($quyen)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_ten_q_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_q = $request->ten_q;
      $ma_q = $request->ma_q;
      if($ten_q != null && $ma_q != null){
        $quyen = Quyen::where('ten_q', $ten_q)
          ->where('ma_q', '<>', $ma_q)
          ->first();
        if(isset($quyen)){
          return 1;
        }else{
          return 0;
        }
      }
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
  public function add_quyen_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      Excel::import(new QuyenImport, $request->file('import_excel'));
      return redirect()->back();
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
    if($phanquyen_admin){
      $edit = Quyen::find($ma_q);
      return view('quyen.quanly_quyen_edit')
        ->with('edit', $edit)
        ->with('title', $title)
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
