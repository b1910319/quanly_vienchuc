<?php

namespace App\Http\Controllers;

use App\Models\Chuyen;
use App\Models\DanhSach;
use App\Models\DungHoc;
use App\Models\GiaHan;
use App\Models\KhenThuong;
use App\Models\KyLuat;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QuaTrinhChucVu;
use App\Models\QuyetDinh;
use App\Models\ThoiHoc;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

class ThoiHocController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function thoihoc($ma_l, $ma_vc){
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
    $title = "Cập nhật quá trình dừng học của viên chức";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = ThoiHoc::join('vienchuc', 'vienchuc.ma_vc', '=', 'thoihoc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->orderBy('ma_th', 'desc')
        ->where('thoihoc.ma_l', $ma_l)
        ->where('thoihoc.ma_vc', $ma_vc)
        ->get();
      $count = ThoiHoc::select(DB::raw('count(ma_th) as sum'))
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $count_status = ThoiHoc::select(DB::raw('count(ma_th) as sum, status_th'))
        ->groupBy('status_th')
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
      return view('thoihoc.thoihoc')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('lop', $lop)
        ->with('vienchuc', $vienchuc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_thoihoc(Request $request){
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
      $thoihoc = new thoihoc();
      $thoihoc->ma_vc = $data['ma_vc'];
      $thoihoc->ma_l = $data['ma_l'];
      $thoihoc->ngay_th = $data['ngay_th'];
      $thoihoc->lydo_th = $data['lydo_th'];
      $thoihoc->status_th = $data['status_th'];
      $get_file = $request->file('file_th');
      if($get_file){
        $new_file = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/thoihoc', $new_file);
        $thoihoc->file_th = $new_file;
      }
      $thoihoc->save();
      $danhsach = DanhSach::where('ma_vc', $data['ma_vc'])
        ->where('ma_l', $data['ma_l'])
        ->first();
      $danhsach->status_ds = '3';
      $danhsach->save();
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_thoihoc($ma_th){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $thoihoc = ThoiHoc::find($ma_th);
      if($thoihoc->status_th == 1){
        $thoihoc->status_th = ThoiHoc::find($ma_th)->update(['status_th' => 0]);
      }elseif($thoihoc->status_th == 0){
        $thoihoc->status_th = ThoiHoc::find($ma_th)->update(['status_th' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_thoihoc($ma_th){
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
    $title = "Cập nhật thông tin quyết định";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $edit = ThoiHoc::find($ma_th);
      $lop = ThoiHoc::join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->where('ma_th', $ma_th)
        ->first();
      return view('thoihoc.thoihoc_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('lop', $lop)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_thoihoc(Request $request, $ma_th){
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
      $thoihoc = ThoiHoc::find($ma_th);
      $thoihoc->ma_vc = $data['ma_vc'];
      $thoihoc->ma_l = $data['ma_l'];
      $thoihoc->ngay_th = $data['ngay_th'];
      $thoihoc->lydo_th = $data['lydo_th'];
      $thoihoc->status_th = $data['status_th'];
      $get_file = $request->file('file_th');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($thoihoc->file_th != ' '){
          unlink('public/uploads/thoihoc/'.$thoihoc->file_th);
        }
        $get_file->move('public/uploads/thoihoc', $new_image);
        $thoihoc->file_th = $new_image;
      }
      $thoihoc->updated_th = Carbon::now();
      $thoihoc->save();
      return Redirect::to('/thoihoc/'.$data['ma_l'].'/'.$data['ma_vc'],302);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_thoihoc(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          $thoihoc = ThoiHoc::find($id);
          if($thoihoc->file_th != ' '){
            unlink('public/uploads/thoihoc/'.$thoihoc->file_th);
          }
          $thoihoc->delete();
          $danhsach = DanhSach::where('ma_vc', $thoihoc->ma_vc)
            ->where('ma_l', $thoihoc->ma_l)
            ->first();
          $danhsach->status_ds = '0';
          $danhsach->save();
        }
      }
    }
  }
  public function delete_thoihoc_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_th = $request->ma_th;
      $list_thoihoc = ThoiHoc::whereIn('ma_th', $ma_th)->get();
      foreach ($list_thoihoc as $key => $thoihoc) {
        if($thoihoc->file_th != ' '){
          unlink('public/uploads/thoihoc/'.$thoihoc->file_th);
        }
        $thoihoc->delete();
        $danhsach = DanhSach::where('ma_vc', $thoihoc->ma_vc)
          ->where('ma_l', $thoihoc->ma_l)
          ->first();
        $danhsach->status_ds = '0';
        $danhsach->save();
      }
      return redirect()->back();
    }
  }
  public function delete_all_thoihoc($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = ThoiHoc::where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $thoihoc){
        if($thoihoc->file_th != ' '){
          unlink('public/uploads/thoihoc/'.$thoihoc->file_th);
        }
        $danhsach = DanhSach::where('ma_vc', $ma_vc)
        ->where('ma_l', $ma_l)
        ->first();
        $danhsach->status_ds = '0';
        $danhsach->save();
        $thoihoc->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function thoihoc_all(){
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
    $title = "Cập nhật thông tin tạm dừng học của viên chức";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = ThoiHoc::join('vienchuc', 'vienchuc.ma_vc', '=', 'thoihoc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->orderBy('ma_th', 'desc')
        ->get();
      $count = ThoiHoc::select(DB::raw('count(ma_th) as sum'))
        ->get();
      $count_status = ThoiHoc::select(DB::raw('count(ma_th) as sum, status_th'))
        ->groupBy('status_th')
        ->get();
      $lop = '';
      $vienchuc = '';
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_vienchuc = VienChuc::join('danhsach', 'danhsach.ma_vc', '=', 'vienchuc.ma_vc')
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      return view('thoihoc.thoihoc')
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
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_thoihoc_all(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = ThoiHoc::get();
      foreach($list as $key => $thoihoc){
        if($thoihoc->file_th != ' '){
          unlink('public/uploads/thoihoc/'.$thoihoc->file_th);
        }
        $thoihoc->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function vienchuc_thoihoc_add($ma_l){
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
    $title = "Thêm quá trình học";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $lop = Lop::find($ma_l);
    $thoihoc_chuaduyet = ThoiHoc::where('ma_vc', $ma_vc)
      ->where('ma_l', $ma_l)
      ->where('status_th', '1')
      ->get();
    return view('thoihoc.vienchuc_thoihoc_add')
      ->with('title', $title)
      ->with('ma_l', $ma_l)
      ->with('lop', $lop)
      ->with('thoihoc_chuaduyet', $thoihoc_chuaduyet)

      ->with('phanquyen_admin', $phanquyen_admin)
      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
  }
  public function vienchuc_add_thoihoc(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $data = $request->all();
    $thoihoc = new thoihoc();
    $thoihoc->ma_vc = $ma_vc;
    $thoihoc->ma_l = $data['ma_l'];
    $thoihoc->ngay_th = $data['ngay_th'];
    $thoihoc->lydo_th = $data['lydo_th'];
    $thoihoc->status_th = $data['status_th'];
    $get_file = $request->file('file_th');
    if($get_file){
      $new_file = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
      $get_file->move('public/uploads/thoihoc', $new_file);
      $thoihoc->file_th = $new_file;
    }
    $thoihoc->save();
    $danhsach = DanhSach::where('ma_vc', $ma_vc)
      ->where('ma_l', $data['ma_l'])
      ->first();
    $danhsach->status_ds = '3';
    $danhsach->save();
    return Redirect::to('vienchuc_thoihoc_add/'.$data['ma_l']);
  }
  public function vienchuc_thoihoc_delete(Request $request){
    $this->check_login();
    if($request->ajax()){
      $id =$request->id;
      if($id != null){
        $thoihoc = ThoiHoc::find($id);
        if($thoihoc->file_th){
          unlink('public/uploads/thoihoc/'.$thoihoc->file_th);
        }
        $thoihoc->delete();
      }
    }
  }
  public function vienchuc_thoihoc_edit($ma_l, $ma_th){
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
    $title = "Thêm thông tin";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $lop = Lop::find($ma_l);
    $edit = ThoiHoc::find($ma_th);
    $thoihoc = ThoiHoc::where('ma_vc', $ma_vc)
      ->where('ma_l', $ma_l)
      ->where('ma_th', '<>', $ma_th)
      ->orderBy('ngay_th', 'desc')
      ->first();
    return view('thoihoc.vienchuc_thoihoc_edit')
      ->with('title', $title)
      ->with('ma_l', $ma_l)
      ->with('lop', $lop)
      ->with('edit', $edit)
      ->with('thoihoc', $thoihoc)

      ->with('phanquyen_admin', $phanquyen_admin)
      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
  }
  public function vienchuc_updated_thoihoc(Request $request, $ma_th){
    $this->check_login();
    $data = $request->all();
    Carbon::now('Asia/Ho_Chi_Minh');
    $thoihoc = ThoiHoc::find($ma_th);
    $thoihoc->ma_l = $data['ma_l'];
    $thoihoc->ngay_th = $data['ngay_th'];
    $thoihoc->lydo_th = $data['lydo_th'];
    $get_file = $request->file('file_th');
    if($get_file){
      $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
      if($thoihoc->file_th != ' '){
        unlink('public/uploads/thoihoc/'.$thoihoc->file_th);
      }
      $get_file->move('public/uploads/thoihoc', $new_image);
      $thoihoc->file_th = $new_image;
    }
    $thoihoc->updated_th = Carbon::now();
    $thoihoc->save();
    return Redirect::to('/vienchuc_thoihoc_add/'.$data['ma_l']);
  }

  public function update_thoihoc_quyetdinh(Request $request, $ma_th){
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
      $thoihoc = ThoiHoc::find($ma_th);
      $thoihoc->soquyetdinh_th = $data['soquyetdinh_th'];
      $thoihoc->ngaykyquyetdinh_th = $data['ngaykyquyetdinh_th'];
      $thoihoc->status_th = $data['status_th'];
      $get_file = $request->file('filequyetdinh_th');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($thoihoc->filequyetdinh_th){
          unlink('public/uploads/thoihoc/'.$thoihoc->filequyetdinh_th);
        }
        $get_file->move('public/uploads/thoihoc', $new_image);
        $thoihoc->filequyetdinh_th = $new_image;
      }
      $thoihoc->updated_th = Carbon::now();
      $thoihoc->save();
      return Redirect::to('thoihoc_all');
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_soquyetdinh_th_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_th = $request->soquyetdinh_th;
      $ma_th = $request->ma_th;
      if($soquyetdinh_th != null && $ma_th != null){
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_th)
          ->first();
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_th)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_th)
          ->first();
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_th)
          ->first();
        $dunghoc = DungHoc::where('soquyetdinh_dh', $soquyetdinh_th) 
          ->first();
        $giahan = GiaHan::where('soquyetdinh_gh', $soquyetdinh_th)
          ->first();
        $chuyen = Chuyen::where('soquyetdinh_c', $soquyetdinh_th)
          ->first();
        $thoihoc = ThoiHoc::where('soquyetdinh_th', $soquyetdinh_th)
          ->where('ma_th', '<>', $ma_th)  
          ->first();
        if(isset($quatrinhchucvu) || isset($quyetdinh) || isset($khenthuong) || isset($kyluat) || isset($dunghoc) || isset($giahan) || isset($chuyen) || isset($thoihoc)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
}
