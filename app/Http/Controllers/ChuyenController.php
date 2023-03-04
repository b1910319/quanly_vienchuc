<?php

namespace App\Http\Controllers;

use App\Models\Chuyen;
use App\Models\DanhSach;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class ChuyenController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function chuyen($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật quá trình dừng học của viên chức";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Chuyen::join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->orderBy('ma_c', 'desc')
        ->where('chuyen.ma_l', $ma_l)
        ->where('chuyen.ma_vc', $ma_vc)
        ->get();
      $count = Chuyen::select(DB::raw('count(ma_c) as sum'))
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $count_status = Chuyen::select(DB::raw('count(ma_c) as sum, status_c'))
        ->groupBy('status_c')
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $lop = Lop::find($ma_l);
      $vienchuc = VienChuc::find($ma_vc);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('chuyen.chuyen')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('lop', $lop)
        ->with('vienchuc', $vienchuc)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_chuyen(Request $request){
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
      $chuyen = new chuyen();
      $chuyen->ma_vc = $data['ma_vc'];
      $chuyen->ma_l = $data['ma_l'];
      $chuyen->noidung_c = $data['noidung_c'];
      $chuyen->lydo_c = $data['lydo_c'];
      $chuyen->status_c = $data['status_c'];
      $get_file = $request->file('file_c');
      if($get_file){
        $new_file = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/chuyen', $new_file);
        $chuyen->file_c = $new_file;
      }
      $chuyen->save();
      $danhsach = DanhSach::where('ma_vc', $data['ma_vc'])
        ->where('ma_l', $data['ma_l'])
        ->first();
      $danhsach->status_ds = '2';
      $danhsach->save();
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_chuyen($ma_c){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $chuyen = Chuyen::find($ma_c);
      if($chuyen->status_c == 1){
        $chuyen->status_c = Chuyen::find($ma_c)->update(['status_c' => 0]);
      }elseif($chuyen->status_c == 0){
        $chuyen->status_c = Chuyen::find($ma_c)->update(['status_c' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_chuyen($ma_c){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật thông tin quyết định";
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $edit = Chuyen::find($ma_c);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('chuyen.chuyen_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_chuyen(Request $request, $ma_c){
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
      $chuyen = Chuyen::find($ma_c);
      $chuyen->ma_vc = $data['ma_vc'];
      $chuyen->ma_l = $data['ma_l'];
      $chuyen->noidung_c = $data['noidung_c'];
      $chuyen->lydo_c = $data['lydo_c'];
      $chuyen->status_c = $data['status_c'];
      $get_file = $request->file('file_c');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($chuyen->file_c != ' '){
          unlink('public/uploads/chuyen/'.$chuyen->file_c);
        }
        $get_file->move('public/uploads/chuyen', $new_image);
        $chuyen->file_c = $new_image;
      }
      $chuyen->updated_c = Carbon::now();
      $chuyen->save();
      return Redirect::to('/chuyen/'.$data['ma_l'].'/'.$data['ma_vc'],302);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_chuyen($ma_c){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $chuyen = Chuyen::find($ma_c);
      if($chuyen->file_c != ' '){
        unlink('public/uploads/chuyen/'.$chuyen->file_c);
      }
      $chuyen->delete();
      $danhsach = DanhSach::where('ma_vc', $chuyen->ma_vc)
        ->where('ma_l', $chuyen->ma_l)
        ->first();
      $danhsach->status_ds = '0';
      $danhsach->save();
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_all_chuyen($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Chuyen::where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $chuyen){
        if($chuyen->file_c != ' '){
          unlink('public/uploads/chuyen/'.$chuyen->file_c);
        }
        $danhsach = DanhSach::where('ma_vc', $ma_vc)
        ->where('ma_l', $ma_l)
        ->first();
        $danhsach->status_ds = '0';
        $danhsach->save();
        $chuyen->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  // public function chuyen_all(){
  //   $this->check_login();
  //   $ma_vc_login = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   $title = "Cập nhật thông tin tạm dừng học của viên chức";
  //   $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
  //     ->where('ma_q', '=', '7')
  //     ->first();
  //   $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
  //     ->where('ma_q', '=', '6')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qlcttc){
  //     $list = Chuyen::join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
  //       ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
  //       ->orderBy('ma_c', 'desc')
  //       ->get();
  //     $count = Chuyen::select(DB::raw('count(ma_c) as sum'))
  //       ->get();
  //     $count_status = Chuyen::select(DB::raw('count(ma_c) as sum, status_c'))
  //       ->groupBy('status_c')
  //       ->get();
  //     $lop = '';
  //     $vienchuc = '';
  //     Carbon::now('Asia/Ho_Chi_Minh'); 
  //     $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
  //     $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
  //       ->select(DB::raw('count(ma_vc) as sum'))
  //       ->get();
  //     $list_vienchuc = VienChuc::join('danhsach', 'danhsach.ma_vc', '=', 'vienchuc.ma_vc')
  //       ->get();
  //     $list_lop = Lop::orderBy('ten_l', 'asc')
  //       ->get();
  //     return view('chuyen.chuyen')
  //       ->with('phanquyen_admin', $phanquyen_admin)
  //       ->with('phanquyen_qltt', $phanquyen_qltt)
  //       ->with('count', $count)
  //       ->with('title', $title)
  //       ->with('count_status', $count_status)
  //       ->with('list', $list)
  //       ->with('lop', $lop)
  //       ->with('list_vienchuc', $list_vienchuc)
  //       ->with('list_lop', $list_lop)
  //       ->with('vienchuc', $vienchuc)
  //       ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
  //       ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
  //       ->with('count_nangbac', $count_nangbac);
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  public function chuyen_all(){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật file quyết định";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Chuyen::join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->orderBy('ma_c', 'desc')
        ->get();
      $count = Chuyen::select(DB::raw('count(ma_c) as sum'))
        ->get();
      $count_status = Chuyen::select(DB::raw('count(ma_c) as sum, status_c'))
        ->groupBy('status_c')
        ->get();
      $lop = '';
      $vienchuc = '';
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_vienchuc = VienChuc::join('danhsach', 'danhsach.ma_vc', '=', 'vienchuc.ma_vc')
        ->whereNotIn('vienchuc.ma_vc', function($query) {
            $query->select('chuyen.ma_vc')->from('chuyen');
          })
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      return view('chuyen.chuyen')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('lop', $lop)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('list_lop', $list_lop)
        ->with('vienchuc', $vienchuc)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_chuyen_all(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Chuyen::get();
      foreach($list as $key => $chuyen){
        if($chuyen->file_c){
          unlink('public/uploads/chuyen/'.$chuyen->file_c);
        }
        $chuyen->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
}
