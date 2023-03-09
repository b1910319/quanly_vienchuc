<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Bac;
use App\Models\ChucVu;
use App\Models\DanToc;
use App\Models\HeDaoTao;
use App\Models\Huyen;
use App\Models\Khoa;
use App\Models\LoaiBangCap;
use App\Models\Ngach;
use App\Models\NoiSinh;
use App\Models\PhanQuyen;
use App\Models\QueQuan;
use App\Models\ThuongBinh;
use App\Models\Tinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use App\Models\Xa;
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
      ->where('status_vc', '<>', '2')
      ->first();
    if($result){
      $request->session()->put('hoten_vc',$result->hoten_vc);
      $request->session()->put('hinh_vc',$result->hinh_vc);
      $request->session()->put('ma_vc',$result->ma_vc);
      $request->session()->put('ma_k',$result->ma_k);
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
    session()->put('ma_k',null);
    session()->put('hinh_vc',null);
    return Redirect::to('/login');
  }
  //thêm viên chức cho khoa
  public function vienchuc_khoa($ma_k){
    $this->check_login();
    $title = "Thêm viên chức theo khoa";
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
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk ){
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
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('vienchuc.admin_vienchuc_khoa')
        ->with('ma_k', $ma_k)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('khoa', $khoa)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk){
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
      $noisinh = new NoiSinh();
      $noisinh->ma_vc = $vienchuc_new->ma_vc;
      $noisinh->save();
      $quequan = new QueQuan();
      $quequan->ma_vc = $vienchuc_new->ma_vc;
      $quequan->save();
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk){
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
    $title = "Cập nhật thông tin viên chức";
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk){
      $edit = VienChuc::find($ma_vc);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('vienchuc.admin_vienchuc_khoa_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk){
      VienChuc::find($ma_vc)->delete();
      $list_noisinh = NoiSinh::where('ma_vc', $ma_vc)
        ->get();
      foreach($list_noisinh as $noisinh){
        $noisinh->delete();
      }
      $list_quequan = QueQuan::where('ma_vc', $ma_vc)
        ->get();
      foreach($list_quequan as $quequan){
        $quequan->delete();
      }
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk){
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
    $title = "Quản lý viên chức thuộc khoa";
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
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin){
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
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('vienchuc.quanly_vienchuc_khoa')
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('title', $title)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('list_khoa', $list_khoa)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk){
      $vienchuc = VienChuc::find($ma_vc);
      if($vienchuc->status_vc == 1){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 0]);
      }elseif($vienchuc->status_vc == 0){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function admin_delete_vienchuc($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk){
      VienChuc::find($ma_vc)->delete();
      if($phanquyen_qlk){
        return Redirect::to('thongtin_vienchuc_khoa');
      }else{
        return Redirect::to('quanly_vienchuc_khoa');
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_vienchuc_khoa($ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $title = "Tìm kiếm viên chức";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin){
      $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
        ->where('ma_q', '=', '8')
        ->first();
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('ma_k', $ma_k)
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->where('ma_k', $ma_k)
        ->groupBy('status_vc')
        ->get();
      $list = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->orderBy('ma_vc', 'desc')
        ->get();
      $list_khoa = Khoa::where('status_k', '<>','1')
        ->orderBy('ten_k', 'asc')
        ->get();
      $khoa_ma = Khoa::find($ma_k);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('vienchuc.search_vienchuc_khoa')
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('list_khoa', $list_khoa)
        ->with('khoa_ma', $khoa_ma)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongtin_vienchuc_add(){
    $this->check_login();
    $title = "Thêm thông tin viên chức";
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
    if($phanquyen_admin || $phanquyen_qltt){
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '1')
        ->orderBy('vienchuc.ma_vc', 'desc')
        ->get();
      $count_quanhe_giadinh = VienChuc::leftJoin('giadinh', 'giadinh.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_gd) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('vienchuc.thongtin_vienchuc_add')
      ->with('list_vienchuc', $list_vienchuc)
      ->with('title', $title)
      ->with('count_bangcap', $count_bangcap)
      ->with('count_nangbac', $count_nangbac)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('count_quanhe_giadinh', $count_quanhe_giadinh)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongtin_vienchuc_edit($ma_vc){
    $this->check_login();
    $title = "Thêm thông tin viên chức";
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $edit = VienChuc::find($ma_vc);
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_bac = Bac::where('ma_n', $edit->ma_n)
        ->orderBy('ma_b', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_huyen = Huyen::orderBy('ten_h', 'asc')
        ->get();
      $list_xa = Xa::orderBy('ten_x', 'asc')
        ->get();
      $noisinh = NoiSinh::where('ma_vc', $edit->ma_vc)
        ->get();
      $quequan = QueQuan::where('ma_vc', $edit->ma_vc)
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('vienchuc.thongtin_vienchuc_edit')
        ->with('title', $title)
        ->with('edit', $edit)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_tinh', $list_tinh)
        ->with('list_huyen', $list_huyen)
        ->with('list_xa', $list_xa)
        ->with('noisinh', $noisinh)
        ->with('quequan', $quequan)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function change_tinh(Request $request){
    $this->check_login();
    if($request->ajax()){
      $id =$request->id;
      if($id != null){
        $huyen = Huyen::where('ma_t', 'LIKE', $id)->get();
        $output='';
        if(count($huyen)>0){
          foreach($huyen as $row){
              $output .='
                <option value="'.$row->ma_h.'" >'.$row->ten_h.'</option>
              ';
          }
        } else{
            $output .='';
        }
      }else{
        $output = '';
      }
      return $output;
    }
  }
  public function change_huyen(Request $request){
    $this->check_login();
    if($request->ajax()){
      $id =$request->id;
      if($id != null){
        $xa = Xa::where('ma_h', 'LIKE', $id)->get();
        $output='';
        if(count($xa)>0){
          foreach($xa as $row){
              $output .='
                <option value="'.$row->ma_x.'" >'.$row->ten_x.'</option>
              ';
          }
        } else{
            $output .='';
        }
      }else{
        $output = '';
      }
      return $output;
    }
  }
  public function update_thongtin_vienchuc(Request $request, $ma_vc){
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
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $data = $request->all();
      $vienchuc = VienChuc::find($ma_vc);
      $vienchuc->ma_k = $data['ma_k'];
      $vienchuc->ma_cv = $data['ma_cv'];
      $vienchuc->ma_n = $data['ma_n'];
      $vienchuc->ma_b = $data['ma_b'];
      $vienchuc->ma_dt = $data['ma_dt'];
      $vienchuc->ma_tg = $data['ma_tg'];
      $vienchuc->ma_tb = $data['ma_tb'];
      $vienchuc->user_vc = $data['user_vc'];
      $vienchuc->hoten_vc = $data['hoten_vc'];
      $vienchuc->sdt_vc = $data['sdt_vc'];
      $get_image = $request->file('hinh_vc');
      if($get_image){
        $new_image = time().rand(0,999).'.'.$get_image->getClientOriginalExtension();
        if($vienchuc->hinh_vc){
          unlink('public/uploads/vienchuc/'.$vienchuc->hinh_vc);
        }
        $get_image->move('public/uploads/vienchuc', $new_image);
        $vienchuc->hinh_vc = $new_image;
      }
      $vienchuc->tenkhac_vc = $data['tenkhac_vc'];
      $vienchuc->ngaysinh_vc = $data['ngaysinh_vc'];
      $vienchuc->gioitinh_vc = $data['gioitinh_vc'];
      $vienchuc->thuongtru_vc = $data['thuongtru_vc'];
      $vienchuc->hientai_vc = $data['hientai_vc'];
      $vienchuc->nghekhiduoctuyen_vc = $data['nghekhiduoctuyen_vc'];
      $vienchuc->ngaytuyendung_vc = $data['ngaytuyendung_vc'];
      $vienchuc->congviecchinhgiao_vc = $data['congviecchinhgiao_vc'];
      $vienchuc->phucap_vc = $data['phucap_vc'];
      $vienchuc->trinhdophothong_vc = $data['trinhdophothong_vc'];
      $vienchuc->chinhtri_vc = $data['chinhtri_vc'];
      $vienchuc->quanlynhanuoc_vc = $data['quanlynhanuoc_vc'];
      $vienchuc->ngoaingu_vc = $data['ngoaingu_vc'];
      $vienchuc->tinhoc_vc = $data['tinhoc_vc'];
      $vienchuc->ngayvaodang_vc = $data['ngayvaodang_vc'];
      $vienchuc->ngaychinhthuc_vc = $data['ngaychinhthuc_vc'];
      $vienchuc->ngaynhapngu_vc = $data['ngaynhapngu_vc'];
      $vienchuc->ngayxuatngu_vc = $data['ngayxuatngu_vc'];
      $vienchuc->quanham_vc = $data['quanham_vc'];
      $vienchuc->ngayhuongbac_vc = $data['ngayhuongbac_vc'];
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ngach = Ngach::find($data['ma_n']);
      $vienchuc->ngaynangbac_vc = Carbon::parse(Carbon::now()->addYears($ngach->sonamnangbac_n))->format('Y-m-d');
      $vienchuc->danhhieucao_vc = $data['danhhieucao_vc'];
      $vienchuc->sotruong_vc = $data['sotruong_vc'];
      $vienchuc->chieucao_vc = $data['chieucao_vc'];
      $vienchuc->cannang_vc = $data['cannang_vc'];
      $vienchuc->nhommau_vc = $data['nhommau_vc'];
      $vienchuc->chinhsach_vc = $data['chinhsach_vc'];
      $vienchuc->cccd_vc = $data['cccd_vc'];
      $vienchuc->ngaycapcccd_vc = $data['ngaycapcccd_vc'];
      $vienchuc->bhxh_vc = $data['bhxh_vc'];
      $vienchuc->lichsubanthan1_vc = $data['lichsubanthan1_vc'];
      $vienchuc->lichsubanthan2_vc = $data['lichsubanthan2_vc'];
      $vienchuc->lichsubanthan3_vc = $data['lichsubanthan3_vc'];
      $vienchuc->ngaybatdaulamviec_vc = $data['ngaybatdaulamviec_vc'];
      $vienchuc->status_vc = $data['status_vc'];
      $vienchuc->save();
      $noisinh = NoiSinh::where('ma_vc', $ma_vc)
        ->first();
      $noisinh->ma_t = $data['ma_t_ns'];
      $noisinh->ma_h = $data['ma_h_ns'];
      $noisinh->ma_x = $data['ma_x_ns'];
      $noisinh->diachi_ns = $data['diachi_ns'];
      $noisinh->save();
      $quequan = QueQuan::where('ma_vc', $ma_vc)
      ->first();
      $quequan->ma_t = $data['ma_t_qq'];
      $quequan->ma_h = $data['ma_h_qq'];
      $quequan->ma_x = $data['ma_x_qq'];
      $quequan->diachi_qq = $data['diachi_qq'];
      $quequan->save();
      if($phanquyen_qlk){
        return Redirect::to('/thongtin_vienchuc_khoa');
      }else{
        return Redirect::to('/thongtin_vienchuc_add');
      }
    }else{
      return Redirect::to('/home');
    }
  }

  public function danhsach_thongtin_vienchuc(){
    $this->check_login();
    $title = "Danh sách thông tin viên chức";
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
    if($phanquyen_admin || $phanquyen_qltt){
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_vienchuc = VienChuc::orderBy('ma_vc', 'desc')
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      return view('vienchuc.danhsach_thongtin_vienchuc')
        ->with('title', $title)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_khoa_show', $list_khoa_show)
        ->with('count', $count)
        ->with('ten',' ')
        ->with('count_bangcap', $count_bangcap)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac)
        ->with('list_tinh', $list_tinh)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('count_status', $count_status)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
        
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_khoa($ma_k){
    $this->check_login();
    $title = "Viên chức theo khoa";
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
    if($phanquyen_admin || $phanquyen_qltt){
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('ma_k', $ma_k)
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->where('ma_k', $ma_k)
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_vienchuc = VienChuc::where('ma_k', $ma_k)
        ->orderBy('ma_vc', 'desc')
        ->get();
      $khoa = Khoa::find($ma_k);
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      return view('vienchuc.danhsach_thongtin_vienchuc')
        ->with('title', $title)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_khoa_show', $list_khoa_show)
        ->with('count', $count)
        ->with('count_nangbac', $count_nangbac)
        ->with('ten', $khoa->ten_k)
        ->with('list_tinh', $list_tinh)
        ->with('count_bangcap', $count_bangcap)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('count_status', $count_status)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_quequan(Request $request){
    $this->check_login();
    $title = "Viên chức theo quê quán";
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
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $data = $request->all();
      $count = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->where('quequan.ma_t', $data['ma_t'])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum'))
        ->get();
      $count_status = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, status_vc'))
        ->where('ma_t', $data['ma_t'])
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $tinh = Tinh::find($data['ma_t']);
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      if($phanquyen_qlk){
        $ma_k = session()->get('ma_k');
        $list_vienchuc = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('quequan.ma_t', $data['ma_t'])
          ->where('ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->get();
        return view('vienchuc.thongtin_vienchuc_khoa')
          ->with('title', $title)
          ->with('list_khoa', $list_khoa)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_ngach', $list_ngach)
          ->with('list_bac', $list_bac)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_khoa_show', $list_khoa_show)
          ->with('count', $count)
          ->with('ma_k', $ma_k)
          ->with('count_bangcap', $count_bangcap)
          ->with('ten', $tinh->ten_t)
          ->with('count_nangbac', $count_nangbac)
          ->with('list_tinh', $list_tinh)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('count_status', $count_status)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('list_loiabangcap', $list_loiabangcap)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_admin', $phanquyen_admin);
      }else{
        $list_vienchuc = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('quequan.ma_t', $data['ma_t'])
          ->where('status_vc', '<>', '2')
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->get();
        return view('vienchuc.danhsach_thongtin_vienchuc')
          ->with('title', $title)
          ->with('list_khoa', $list_khoa)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_ngach', $list_ngach)
          ->with('list_bac', $list_bac)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_khoa_show', $list_khoa_show)
          ->with('count', $count)
          ->with('count_bangcap', $count_bangcap)
          ->with('ten', $tinh->ten_t)
          ->with('count_nangbac', $count_nangbac)
          ->with('list_tinh', $list_tinh)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('count_status', $count_status)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('list_loiabangcap', $list_loiabangcap)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_admin', $phanquyen_admin);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_dantoc($ma_dt){
    $this->check_login();
    $title = "Viên chức theo dân tộc";
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
    if($phanquyen_admin || $phanquyen_qltt){
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('ma_dt', $ma_dt)
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->where('ma_dt', $ma_dt)
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_vienchuc = VienChuc::where('ma_dt', $ma_dt)
        ->orderBy('ma_vc', 'desc')
        ->get();
      $dantoc = DanToc::find($ma_dt);
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      return view('vienchuc.danhsach_thongtin_vienchuc')
        ->with('title', $title)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_khoa_show', $list_khoa_show)
        ->with('count', $count)
        ->with('count_bangcap', $count_bangcap)
        ->with('count_nangbac', $count_nangbac)
        ->with('ten', $dantoc->ten_dt)
        ->with('list_tinh', $list_tinh)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('count_status', $count_status)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_ngaysinh(Request $request){
    $this->check_login();
    $title = "Viên chức theo ngày sinh";
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
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
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $data = $request->all();
      $count = VienChuc::whereBetween('ngaysinh_vc', [$data['batdau'], $data['ketthuc']])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum'))
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      if($phanquyen_qlk){
        $list_vienchuc = VienChuc::whereBetween('ngaysinh_vc', [$data['batdau'], $data['ketthuc']])
          ->where('ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->get();
        return view('vienchuc.thongtin_vienchuc_khoa')
          ->with('title', $title)
          ->with('list_khoa', $list_khoa)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_ngach', $list_ngach)
          ->with('list_bac', $list_bac)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_khoa_show', $list_khoa_show)
          ->with('count', $count)
          ->with('ma_k', $ma_k)
          ->with('count_bangcap', $count_bangcap)
          ->with('count_nangbac', $count_nangbac)
          ->with('ten', $data['batdau'].' -> '.$data['ketthuc'])
          ->with('list_tinh', $list_tinh)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('count_status', $count_status)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_loiabangcap', $list_loiabangcap)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_admin', $phanquyen_admin);
      }else{
        $list_vienchuc = VienChuc::whereBetween('ngaysinh_vc', [$data['batdau'], $data['ketthuc']])
          ->where('status_vc', '<>', '2')
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->get();
        return view('vienchuc.danhsach_thongtin_vienchuc')
          ->with('title', $title)
          ->with('list_khoa', $list_khoa)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_ngach', $list_ngach)
          ->with('list_bac', $list_bac)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_khoa_show', $list_khoa_show)
          ->with('count', $count)
          ->with('count_bangcap', $count_bangcap)
          ->with('count_nangbac', $count_nangbac)
          ->with('ten', $data['batdau'].' -> '.$data['ketthuc'])
          ->with('list_tinh', $list_tinh)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('count_status', $count_status)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_loiabangcap', $list_loiabangcap)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_admin', $phanquyen_admin);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_tongiao($ma_tg){
    $this->check_login();
    $title = "Viên chức theo tôn giáo";
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
    if($phanquyen_admin || $phanquyen_qltt){
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('ma_tg', $ma_tg)
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->where('ma_tg', $ma_tg)
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_vienchuc = VienChuc::where('ma_tg', $ma_tg)
        ->orderBy('ma_vc', 'desc')
        ->get();
      $dantoc = DanToc::find($ma_tg);
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      return view('vienchuc.danhsach_thongtin_vienchuc')
        ->with('title', $title)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_khoa_show', $list_khoa_show)
        ->with('count', $count)
        ->with('count_bangcap', $count_bangcap)
        ->with('count_nangbac', $count_nangbac)
        ->with('ten', $dantoc->ten_dt)
        ->with('list_tinh', $list_tinh)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('count_status', $count_status)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_gioitinh($gt){
    $this->check_login();
    $title = "Viên chức theo tôn giáo";
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
    if($phanquyen_admin || $phanquyen_qltt){
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('gioitinh_vc', $gt)
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->where('gioitinh_vc', $gt)
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_vienchuc = VienChuc::where('gioitinh_vc', $gt)
        ->orderBy('ma_vc', 'desc')
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      if($gt == 0){
        $ten = 'Nam';
      }else if($gt == 1){
        $ten = 'Nữ';
      }
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      return view('vienchuc.danhsach_thongtin_vienchuc')
        ->with('title', $title)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_khoa_show', $list_khoa_show)
        ->with('count', $count)
        ->with('count_bangcap', $count_bangcap)
        ->with('ten', $ten)
        ->with('count_nangbac', $count_nangbac)
        ->with('list_tinh', $list_tinh)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('count_status', $count_status)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_ngach(Request $request){
    $this->check_login();
    $title = "Viên chức theo ngạch";
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
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
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $data = $request->all();
      $count = VienChuc::select(DB::raw('count(vienchuc.ma_vc) as sum'))
        ->where('ma_n', $data['ma_n'])
        ->where('ma_b', $data['ma_b'])
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->where('ma_n', $data['ma_n'])
        ->where('ma_b', $data['ma_b'])
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $bac = Bac::find($data['ma_b']);
      $ngach = Ngach::find($data['ma_n']);
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      if ($phanquyen_qlk) {
        $list_vienchuc = VienChuc::where('ma_n', $data['ma_n'])
          ->where('ma_b', $data['ma_b'])
          ->where('ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->get();
        return view('vienchuc.thongtin_vienchuc_khoa')
          ->with('title', $title)
          ->with('list_khoa', $list_khoa)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_ngach', $list_ngach)
          ->with('list_bac', $list_bac)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_khoa_show', $list_khoa_show)
          ->with('count', $count)
          ->with('ma_k', $ma_k)
          ->with('count_bangcap', $count_bangcap)
          ->with('count_nangbac', $count_nangbac)
          ->with('ten', 'Ngạch: '.$ngach->ten_n.' ,'.'Bậc: '.$bac->ten_b)
          ->with('list_tinh', $list_tinh)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('count_status', $count_status)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_loiabangcap', $list_loiabangcap)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_admin', $phanquyen_admin);
      } else {
        $list_vienchuc = VienChuc::where('ma_n', $data['ma_n'])
          ->where('ma_b', $data['ma_b'])
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('vienchuc.danhsach_thongtin_vienchuc')
          ->with('title', $title)
          ->with('list_khoa', $list_khoa)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_ngach', $list_ngach)
          ->with('list_bac', $list_bac)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_khoa_show', $list_khoa_show)
          ->with('count', $count)
          ->with('count_bangcap', $count_bangcap)
          ->with('count_nangbac', $count_nangbac)
          ->with('ten', 'Ngạch: '.$ngach->ten_n.' ,'.'Bậc: '.$bac->ten_b)
          ->with('list_tinh', $list_tinh)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('count_status', $count_status)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_loiabangcap', $list_loiabangcap)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_admin', $phanquyen_admin);
      }
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_thuongbinh($ma_tb){
    $this->check_login();
    $title = "Viên chức theo hạng thương binh";
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
    if($phanquyen_admin || $phanquyen_qltt){
      $count = VienChuc::select(DB::raw('count(ma_vc) as sum'))
        ->where('ma_tb', $ma_tb)
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->where('ma_tb', $ma_tb)
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_vienchuc = VienChuc::where('ma_tb', $ma_tb)
        ->orderBy('ma_vc', 'desc')
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $thuongbinh = ThuongBinh::find($ma_tb);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      return view('vienchuc.danhsach_thongtin_vienchuc')
        ->with('title', $title)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_khoa_show', $list_khoa_show)
        ->with('count', $count)
        ->with('count_bangcap', $count_bangcap)
        ->with('count_nangbac', $count_nangbac)
        ->with('ten', $thuongbinh->ten_tb)
        ->with('list_tinh', $list_tinh)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('count_status', $count_status)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_ngaybatdaulamviec(Request $request){
    $this->check_login();
    $title = "Viên chức theo ngày bắt đầu làm việc";
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
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
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $data = $request->all();
      $count = VienChuc::whereBetween('ngaybatdaulamviec_vc', [$data['batdau'], $data['ketthuc']])
        ->select(DB::raw('count(vienchuc.ma_vc) as sum'))
        ->get();
      $count_status = VienChuc::select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      if($phanquyen_qlk){
        $list_vienchuc = VienChuc::whereBetween('ngaybatdaulamviec_vc', [$data['batdau'], $data['ketthuc']])
          ->where('ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->get();  
        return view('vienchuc.thongtin_vienchuc_khoa')
          ->with('title', $title)
          ->with('list_khoa', $list_khoa)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_ngach', $list_ngach)
          ->with('list_bac', $list_bac)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_khoa_show', $list_khoa_show)
          ->with('count', $count)
          ->with('ma_k', $ma_k)
          ->with('count_bangcap', $count_bangcap)
          ->with('count_nangbac', $count_nangbac)
          ->with('ten', $data['batdau'].' -> '.$data['ketthuc'])
          ->with('list_tinh', $list_tinh)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_loiabangcap', $list_loiabangcap)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('count_status', $count_status)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_admin', $phanquyen_admin);
      }else{
        $list_vienchuc = VienChuc::whereBetween('ngaybatdaulamviec_vc', [$data['batdau'], $data['ketthuc']])
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->where('status_vc', '<>', '2')
          ->get();
        return view('vienchuc.danhsach_thongtin_vienchuc')
          ->with('title', $title)
          ->with('list_khoa', $list_khoa)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_ngach', $list_ngach)
          ->with('list_bac', $list_bac)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_khoa_show', $list_khoa_show)
          ->with('count', $count)
          ->with('count_bangcap', $count_bangcap)
          ->with('count_nangbac', $count_nangbac)
          ->with('ten', $data['batdau'].' -> '.$data['ketthuc'])
          ->with('list_tinh', $list_tinh)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_loiabangcap', $list_loiabangcap)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('count_status', $count_status)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_admin', $phanquyen_admin);
      }
      
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_hedaotao($ma_hdt){
    $this->check_login();
    $title = "Viên chức theo hệ đào tạo";
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
    if($phanquyen_admin || $phanquyen_qltt){
      $count = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum'))
        ->where('hedaotao.ma_hdt', $ma_hdt)
        ->get();
      $count_status = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, status_vc'))
        ->where('hedaotao.ma_hdt', $ma_hdt)
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_vienchuc = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->where('hedaotao.ma_hdt', $ma_hdt)
        ->orderBy('vienchuc.ma_vc', 'desc')
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $hedaotao = HeDaoTao::find($ma_hdt);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('vienchuc.danhsach_thongtin_vienchuc')
        ->with('title', $title)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_khoa_show', $list_khoa_show)
        ->with('count', $count)
        ->with('count_bangcap', $count_bangcap)
        ->with('count_nangbac', $count_nangbac)
        ->with('ten', $hedaotao->ten_hdt)
        ->with('list_tinh', $list_tinh)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('count_status', $count_status)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function search_danhsach_thongtin_vienchuc_loiabangcap($ma_lbc){
    $this->check_login();
    $title = "Viên chức theo loại bằng cấp";
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
    if($phanquyen_admin || $phanquyen_qltt){
      $count = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum'))
        ->where('loaibangcap.ma_lbc', $ma_lbc)
        ->get();
      $count_status = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, status_vc'))
        ->where('loaibangcap.ma_lbc', $ma_lbc)
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_vienchuc = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->where('loaibangcap.ma_lbc', $ma_lbc)
        ->orderBy('vienchuc.ma_vc', 'desc')
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $loaibangcap = LoaiBangCap::find($ma_lbc);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('vienchuc.danhsach_thongtin_vienchuc')
        ->with('title', $title)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_khoa_show', $list_khoa_show)
        ->with('count', $count)
        ->with('count_bangcap', $count_bangcap)
        ->with('count_nangbac', $count_nangbac)
        ->with('ten', $loaibangcap->ten_lbc)
        ->with('list_tinh', $list_tinh)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('count_status', $count_status)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongtin_vienchuc_khoa(){
    $this->check_login();
    $title = "Danh sách thông tin viên chức";
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
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
    if($phanquyen_qlk){
      $count = VienChuc::where('ma_k', $ma_k)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_status = VienChuc::where('ma_k', $ma_k)
        ->select(DB::raw('count(ma_vc) as sum, status_vc'))
        ->groupBy('status_vc')
        ->get();
      $list_khoa_show = Khoa::where('status_k', '<>', '1')
        ->get();
      $list_vienchuc = VienChuc::where('ma_k', $ma_k)
        ->orderBy('ma_vc', 'desc')
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_loiabangcap = LoaiBangCap::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $khoa = Khoa::find($ma_k);
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_bangcap = VienChuc::leftJoin('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->select(DB::raw('count(ma_bc) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      return view('vienchuc.thongtin_vienchuc_khoa')
        ->with('title', $title)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_khoa_show', $list_khoa_show)
        ->with('count', $count)
        ->with('count_bangcap', $count_bangcap)
        ->with('ten', $khoa->ten_k)
        ->with('ma_k', $ma_k)
        ->with('count_bangcap', $count_bangcap)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac)
        ->with('list_tinh', $list_tinh)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('count_status', $count_status)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
        
    }else{
      return Redirect::to('/home');
    }
  }
}
