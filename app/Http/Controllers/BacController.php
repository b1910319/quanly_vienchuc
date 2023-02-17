<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\Bac;
use App\Models\ChucVu;
use App\Models\DanToc;
use App\Models\Ngach;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;


class BacController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function bac_ngach($ma_n){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $count = Bac::select(DB::raw('count(ma_b) as sum'))
        ->where('ma_n', $ma_n)
        ->get();
      $count_status = Bac::select(DB::raw('count(ma_b) as sum, status_b'))
        ->where('ma_n', $ma_n)
        ->groupBy('status_b')
        ->get();
      $list = Bac::where('ma_n', $ma_n)
        ->orderBy('ma_b', 'desc')
        ->get();
      $ngach = Ngach::find($ma_n);
      return view('bac.bac_ngach')
        ->with('ma_n', $ma_n)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('ngach', $ngach)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_bac_ngach(Request $request, $ma_n){
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
      $bac = new Bac();
      $bac->ten_b = $data['ten_b'];
      $bac->hesoluong_b = $data['hesoluong_b'];
      $bac->ma_n = $ma_n;
      $bac->status_b = $data['status_b'];
      $bac->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/bac_ngach/'.$ma_n);
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_bac_ngach($ma_n, $ma_b){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $bac = Bac::find($ma_b);
      if($bac->status_b == 1){
        $bac->status_b = Bac::find($ma_b)->update(['status_b' => 0]);
      }elseif($bac->status_b == 0){
        $bac->status_b = Bac::find($ma_b)->update(['status_b' => 1]);
      }
      return Redirect::to('/bac_ngach/'.$ma_n);
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_bac_ngach($ma_n, $ma_b){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = Bac::find($ma_b);
      return view('bac.bac_ngach_edit')
        ->with('edit', $edit)
        ->with('ma_n', $ma_n)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_bac_ngach(Request $request, $ma_n, $ma_b){
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
      $bac = Bac::find($ma_b);
      $bac->ten_b = $data['ten_b'];
      $bac->hesoluong_b = $data['hesoluong_b'];
      $bac->ma_n = $ma_n;
      $bac->status_b = $data['status_b'];
      $bac->updated_b = Carbon::now();
      $bac->save();
      return Redirect::to('/bac_ngach/'.$ma_n);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_bac_ngach($ma_n, $ma_b){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Bac::find($ma_b)->delete();
      return Redirect::to('/bac_ngach/'.$ma_n);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_all_bac_ngach($ma_n){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = Bac::where('ma_n', $ma_n)
        ->get();
      foreach($list as $key => $bac){
        $bac->delete();
      }
      return Redirect::to('/bac_ngach/'.$ma_n);
    }else{
      return Redirect::to('/home');
    }
  }

  public function bac(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = Bac::join('ngach', 'ngach.ma_n', '=', 'bac.ma_n')
        ->orderBy('ma_b', 'desc')
        ->get();
      $count = Bac::select(DB::raw('count(ma_b) as sum'))->get();
      $count_status = Bac::select(DB::raw('count(ma_b) as sum, status_b'))
        ->groupBy('status_b')
        ->get();
      $list_ngach = Ngach::where('status_n', '<>', '1')
        ->get();
      return view('bac.bac')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list_ngach',$list_ngach)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_bac(Request $request){
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
      $bac = new Bac();
      $bac->ma_n = $data['ma_n'];
      $bac->ten_b = $data['ten_b'];
      $bac->hesoluong_b = $data['hesoluong_b'];
      $bac->status_b = $data['status_b'];
      $bac->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/bac');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_bac($ma_b){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $bac = Bac::find($ma_b);
      if($bac->status_b == 1){
        $bac->status_b = Bac::find($ma_b)->update(['status_b' => 0]);
      }elseif($bac->status_b == 0){
        $bac->status_b = Bac::find($ma_b)->update(['status_b' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_bac($ma_b){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = Bac::find($ma_b);
      $list_ngach = Ngach::where('status_n', '<>', '1')
        ->get();
      return view('bac.bac_edit')
        ->with('edit', $edit)
        ->with('list_ngach', $list_ngach)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_bac(Request $request, $ma_b){
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
      $bac = Bac::find($ma_b);
      $bac->ma_n = $data['ma_n'];
      $bac->ten_b = $data['ten_b'];
      $bac->hesoluong_b = $data['hesoluong_b'];
      $bac->status_b = $data['status_b'];
      $bac->updated_b = Carbon::now();
      $bac->save();
      return Redirect::to('bac');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_bac($ma_b){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Bac::find($ma_b)->delete();
      return Redirect::to('bac');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_all_bac(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = Bac::get();
      foreach($list as $key => $bac){
        $bac->delete();
      }
      return Redirect::to('bac');
    }else{
      return Redirect::to('/home');
    }
  }
}
