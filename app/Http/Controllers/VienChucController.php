<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\Khoa;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class VienChucController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function login(Request $request){
    $user_vc = $request->user_vc;
    $pass_vc = md5($request->pass_vc);
    $result = VienChuc::where('user_vc', $user_vc)
      ->where('pass_vc', $pass_vc)
      ->where('status_vc', '<>', '1')
      ->first();
    if($result){
      $request->session()->put('hoten_vc',$result->hoten_vc);
      $request->session()->put('ma_vc',$result->ma_vc);
      return Redirect::to('/home');
    }else{
      $request->session()->put('message','Username hoặc Password bị sai vui lòng nhập lại!! ');
      return Redirect::to('/login');
    }
  }
  public function logout(){
    $this->check_login();
    session()->put('hoten_vc',null);
    session()->put('ma_vc',null);
    return Redirect::to('/login');
  }
  //thêm viên chức cho khoa
  public function vienchuc_khoa($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('ma_k', $ma_k)
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->groupBy('status_vc')
        ->get();
      $list = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->orderBy('ma_vc', 'desc')
        ->get();
      $khoa = Khoa::find($ma_k);
      $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
        ->where('ma_q', '=', '8')
        ->first();
      return view('vienchuc.admin_vienchuc_khoa')
        ->with('ma_k', $ma_k)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('khoa', $khoa)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function admin_add_vienchuc_khoa(Request $request, $ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      $vienchuc = new VienChuc();
      $vienchuc->hoten_vc = $data['hoten_vc'];
      $vienchuc->user_vc = $data['user_vc'];
      $vienchuc->pass_vc = md5($data['pass_vc']);
      $vienchuc->ma_k = $ma_k;
      $vienchuc->status_vc = $data['status_vc'];
      $vienchuc->save();
      $vienchuc_new = VienChuc::orderBy('ma_vc', 'desc')
        ->first();
      $phanquyen = new PhanQuyen();
      $phanquyen->ma_vc = $vienchuc_new->ma_vc;
      $phanquyen->ma_q = '10';
      $phanquyen->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/vienchuc_khoa/'.$ma_k);
    }else{
      return Redirect::to('/home');
    }
  }
  public function admin_select_vienchuc_khoa($ma_k, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $vienchuc = VienChuc::find($ma_vc);
      if($vienchuc->status_vc == 1){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 0]);
      }elseif($vienchuc->status_vc == 0){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 1]);
      }
      return Redirect::to('/vienchuc_khoa/'.$ma_k);
    }else{
      return Redirect::to('/home');
    }
  }
  public function admin_edit_vienchuc_khoa($ma_k, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $edit = VienChuc::find($ma_vc);
      $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
        ->where('ma_q', '=', '5')
        ->first();
      $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
        ->where('ma_q', '=', '8')
        ->first();
      return view('vienchuc.admin_vienchuc_khoa_edit')
        ->with('edit', $edit)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function admin_update_vienchuc_khoa(Request $request, $ma_k, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $vienchuc = VienChuc::find($ma_vc);
      $vienchuc->hoten_vc = $data['hoten_vc'];
      $vienchuc->user_vc = $data['user_vc'];
      $vienchuc->status_vc = $data['status_vc'];
      $vienchuc->updated_vc = Carbon::now();
      $vienchuc->save();
      return Redirect::to('/vienchuc_khoa/'.$ma_k);
    }else{
      return Redirect::to('/home');
    }
  }
  public function admin_delete_vienchuc_khoa($ma_k, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      VienChuc::find($ma_vc)->delete();
      return Redirect::to('/vienchuc_khoa/'.$ma_k);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function admin_deleteall_vienchuc_khoa($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $list = VienChuc::where('ma_k', $ma_k)
        ->get();
      foreach($list as $key => $vienchuc){
        $vienchuc->delete();
      }
      return Redirect::to('/vienchuc_khoa/'.$ma_k);
    }else{
      return Redirect::to('/home');
    }
  }
  public function quanly_vienchuc_khoa(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
        ->where('ma_q', '=', '8')
        ->first();
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->groupBy('status_vc')
        ->get();
      $list = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->orderBy('ma_vc', 'desc')
        ->get();
      $list_khoa = Khoa::where('status_k', '<>','1')
        ->orderBy('ten_k', 'asc')
        ->get();
      return view('vienchuc.quanly_vienchuc_khoa')
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('list_khoa', $list_khoa)
        ->with('phanquyen_admin', $phanquyen_admin);
    }
  }
  public function update_khoa_vc(Request $request){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $vienchuc = VienChuc::find($data['ma_vc']);
      $vienchuc->ma_k = $data['ma_k'];
      $vienchuc->save();
      return Redirect::to('quanly_vienchuc_khoa');
    }else{
      return Redirect::to('/home');
    }
  }
  public function admin_select_vienchuc($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $vienchuc = VienChuc::find($ma_vc);
      if($vienchuc->status_vc == 1){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 0]);
      }elseif($vienchuc->status_vc == 0){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 1]);
      }
      return Redirect::to('quanly_vienchuc_khoa');
    }else{
      return Redirect::to('/home');
    }
  }
}
