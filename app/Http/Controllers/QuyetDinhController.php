<?php

namespace App\Http\Controllers;

use App\Models\DanhMucLop;
use App\Models\DanhSach;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QuyetDinh;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class QuyetDinhController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function quyetdinh($ma_l, $ma_vc){
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
      $list = QuyetDinh::join('vienchuc', 'vienchuc.ma_vc', '=', 'quyetdinh.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'quyetdinh.ma_l')
        ->orderBy('ma_qd', 'desc')
        ->where('quyetdinh.ma_l', $ma_l)
        ->where('quyetdinh.ma_vc', $ma_vc)
        ->get();
      $count = QuyetDinh::select(DB::raw('count(ma_qd) as sum'))
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $count_status = QuyetDinh::select(DB::raw('count(ma_qd) as sum, status_qd'))
        ->groupBy('status_qd')
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      // $count_vienchuc_lop = Lop::leftJoin('danhsach', 'lop.ma_l', '=', 'danhsach.ma_l')
      //   ->select(DB::raw('count(danhsach.ma_l) as sum, lop.ma_l'))
      //   ->groupBy('lop.ma_l')
      //   ->get();
      $lop = Lop::find($ma_l);
      $vienchuc = VienChuc::find($ma_vc);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      // $list_danhmuclop = DanhMucLop::where('status_dml', '<>', '1')
      //   ->orderBy('ten_dml', 'asc')
      //   ->get();
      return view('quyetdinh.quyetdinh')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        // ->with('count_vienchuc_lop', $count_vienchuc_lop)
        // ->with('list_danhmuclop', $list_danhmuclop)
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
  public function add_quyetdinh(Request $request){
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
      $quyetdinh = new QuyetDinh();
      $quyetdinh->ma_vc = $data['ma_vc'];
      $quyetdinh->ma_l = $data['ma_l'];
      $quyetdinh->so_qd = $data['so_qd'];
      $quyetdinh->ngayky_qd = $data['ngayky_qd'];
      $quyetdinh->status_qd = $data['status_qd'];
      $get_file = $request->file('file_qd');
      if($get_file){
        $new_file = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/quyetdinh', $new_file);
        $quyetdinh->file_qd = $new_file;
      }
      $quyetdinh->save();
      // return Redirect::to('/quyetdinh/'.$data['ma_l'].'/'.$data['ma_vc'],302);
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_quyetdinh($ma_qd){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $quyetdinh = QuyetDinh::find($ma_qd);
      if($quyetdinh->status_qd == 1){
        $quyetdinh->status_qd = QuyetDinh::find($ma_qd)->update(['status_qd' => 0]);
      }elseif($quyetdinh->status_qd == 0){
        $quyetdinh->status_qd = QuyetDinh::find($ma_qd)->update(['status_qd' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_quyetdinh($ma_qd){
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
      $edit = QuyetDinh::find($ma_qd);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('quyetdinh.quyetdinh_edit')
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
  public function update_quyetdinh(Request $request, $ma_qd){
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
      $quyetdinh = QuyetDinh::find($ma_qd);
      $quyetdinh->ma_vc = $data['ma_vc'];
      $quyetdinh->ma_l = $data['ma_l'];
      $quyetdinh->so_qd = $data['so_qd'];
      $quyetdinh->ngayky_qd = $data['ngayky_qd'];
      $quyetdinh->status_qd = $data['status_qd'];
      $get_file = $request->file('file_qd');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($quyetdinh->file_qd != ' '){
          unlink('public/uploads/quyetdinh/'.$quyetdinh->file_qd);
        }
        $get_file->move('public/uploads/quyetdinh', $new_image);
        $quyetdinh->file_qd = $new_image;
      }
      $quyetdinh->updated_qd = Carbon::now();
      $quyetdinh->save();
      return Redirect::to('/quyetdinh/'.$data['ma_l'].'/'.$data['ma_vc'],302);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_quyetdinh($ma_qd){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $quyetdinh = QuyetDinh::find($ma_qd);
      if($quyetdinh->file_qd != ' '){
        unlink('public/uploads/quyetdinh/'.$quyetdinh->file_qd);
      }
      $quyetdinh->delete();
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_all_quyetdinh($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = QuyetDinh::where('ma_l', $ma_l)
        ->get();
      foreach($list as $key => $quyetdinh){
        if($quyetdinh->file_qd != ' '){
          unlink('public/uploads/quyetdinh/'.$quyetdinh->file_qd);
        }
        $quyetdinh->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function quyetdinh_all(){
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
      $list = QuyetDinh::join('vienchuc', 'vienchuc.ma_vc', '=', 'quyetdinh.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'quyetdinh.ma_l')
        ->orderBy('ma_qd', 'desc')
        ->get();
      $count = QuyetDinh::select(DB::raw('count(ma_qd) as sum'))
        ->get();
      $count_status = QuyetDinh::select(DB::raw('count(ma_qd) as sum, status_qd'))
        ->groupBy('status_qd')
        ->get();
      // $count_vienchuc_lop = Lop::leftJoin('danhsach', 'lop.ma_l', '=', 'danhsach.ma_l')
      //   ->select(DB::raw('count(danhsach.ma_l) as sum, lop.ma_l'))
      //   ->groupBy('lop.ma_l')
      //   ->get();
      $lop = '';
      $vienchuc = '';
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      // $list_danhmuclop = DanhMucLop::where('status_dml', '<>', '1')
      //   ->orderBy('ten_dml', 'asc')
      //   ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      return view('quyetdinh.quyetdinh')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        // ->with('count_vienchuc_lop', $count_vienchuc_lop)
        // ->with('list_danhmuclop', $list_danhmuclop)
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
  public function delete_quyetdinh_all(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = QuyetDinh::get();
      foreach($list as $key => $quyetdinh){
        if($quyetdinh->file_qd != ' '){
          unlink('public/uploads/quyetdinh/'.$quyetdinh->file_qd);
        }
        $quyetdinh->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
}
