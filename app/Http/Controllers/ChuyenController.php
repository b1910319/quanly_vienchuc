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
      $list = Chuyen::join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->orderBy('ma_c', 'desc')
        ->where('chuyen.ma_l', $ma_l)
        ->where('chuyen.ma_vc', $ma_vc)
        ->where('status_c', '<>', '1')
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
      return view('chuyen.chuyen')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('lop', $lop)
        ->with('vienchuc', $vienchuc)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk);
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
      $edit = Chuyen::find($ma_c);
      $lop = Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->where('ma_c', $ma_c)
        ->first();
      return view('chuyen.chuyen_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('lop', $lop)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_chuyen(Request $request){
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
          $chuyen = Chuyen::find($id);
          $chuyen->delete();
          $danhsach = DanhSach::where('ma_vc', $chuyen->ma_vc)
            ->where('ma_l', $chuyen->ma_l)
            ->first();
          $danhsach->status_ds = '0';
          $danhsach->save();
        }
      }
    }
  }
  public function delete_chuyen_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_c = $request->ma_c;
      $list_chuyen = Chuyen::whereIn('ma_c', $ma_c)->get();
      foreach ($list_chuyen as $key => $chuyen) {
        if($chuyen->file_c != ' '){
          unlink('public/uploads/chuyen/'.$chuyen->file_c);
        }
        $chuyen->delete();
        $danhsach = DanhSach::where('ma_vc', $chuyen->ma_vc)
          ->where('ma_l', $chuyen->ma_l)
          ->first();
        $danhsach->status_ds = '0';
        $danhsach->save();
      }
      return redirect()->back();
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
  public function chuyen_all(){
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
    $title = "Cập nhật file quyết định";
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
      $list = Chuyen::join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
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
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk);
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
  public function vienchuc_chuyen_add($ma_l){
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
    $title = "Thêm kết quả quá trình học";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $chuyen_chuaduyet = Chuyen::where('ma_vc', $ma_vc)
      ->where('ma_l', $ma_l)
      ->where('status_c', '1')
      ->get();
    return view('chuyen.vienchuc_chuyen_add')
      ->with('title', $title)
      ->with('ma_l', $ma_l)
      ->with('chuyen_chuaduyet', $chuyen_chuaduyet)

      ->with('phanquyen_admin', $phanquyen_admin)
      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
  }
  public function vienchuc_add_chuyen(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $data = $request->all();
    $chuyen = new chuyen();
    $chuyen->ma_vc = $ma_vc;
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
    $danhsach = DanhSach::where('ma_vc', $ma_vc)
      ->where('ma_l', $data['ma_l'])
      ->first();
    $danhsach->status_ds = '2';
    $danhsach->save();
    return redirect()->back();
  }
  public function check_soquyetdinh_c_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_c = $request->soquyetdinh_c;
      $ma_c = $request->ma_c;
      if($soquyetdinh_c != null && $ma_c != null){
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_c)
          ->first();
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_c)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_c)
          ->first();
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_c)
          ->first();
        $dunghoc = DungHoc::where('soquyetdinh_c', $soquyetdinh_c)
          ->first();
        $giahan = GiaHan::where('soquyetdinh_gh', $soquyetdinh_c)
          ->first();
        $chuyen = Chuyen::where('soquyetdinh_c', $soquyetdinh_c)
          ->where('ma_c', '<>', $ma_c)  
          ->first();
        if(isset($quatrinhchucvu) || isset($quyetdinh) || isset($khenthuong) || isset($kyluat) || isset($dunghoc) || isset($giahan) || isset($chuyen)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function update_chuyen_quyetdinh(Request $request, $ma_c){
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
      $chuyen->soquyetdinh_c = $data['soquyetdinh_c'];
      $chuyen->ngaykyquyetdinh_c = $data['ngaykyquyetdinh_c'];
      $chuyen->status_c = $data['status_c'];
      $get_file = $request->file('filequyetdinh_c');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($chuyen->filequyetdinh_c){
          unlink('public/uploads/chuyen/'.$chuyen->filequyetdinh_c);
        }
        $get_file->move('public/uploads/chuyen', $new_image);
        $chuyen->filequyetdinh_c = $new_image;
      }
      $chuyen->updated_c = Carbon::now();
      $chuyen->save();
      return Redirect::to('/chuyen_all');
    }else{
      return Redirect::to('/home');
    }
  }
  public function vienchuc_chuyen_edit($ma_l, $ma_c){
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
    $edit = Chuyen::find($ma_c);
    $chuyen = Chuyen::where('ma_vc', $ma_vc)
      ->where('ma_l', $ma_l)
      ->where('ma_c', '<>', $ma_c)
      ->first();
    return view('chuyen.vienchuc_chuyen_edit')
      ->with('title', $title)
      ->with('ma_l', $ma_l)
      ->with('lop', $lop)
      ->with('edit', $edit)
      ->with('chuyen', $chuyen)

      ->with('phanquyen_admin', $phanquyen_admin)
      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
  }
  public function vienchuc_updated_chuyen(Request $request, $ma_c){
    $this->check_login();
    $data = $request->all();
    Carbon::now('Asia/Ho_Chi_Minh');
    $chuyen = Chuyen::find($ma_c);
    $chuyen->ma_l = $data['ma_l'];
    $chuyen->noidung_c = $data['noidung_c'];
    $chuyen->lydo_c = $data['lydo_c'];
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
    return Redirect::to('/vienchuc_chuyen_add/'.$data['ma_l']);
  }
  public function vienchuc_chuyen_delete(Request $request){
    $this->check_login();
    if($request->ajax()){
      $id =$request->id;
      if($id != null){
        $chuyen = Chuyen::find($id);
        if($chuyen->file_c != ' '){
          unlink('public/uploads/chuyen/'.$chuyen->file_c);
        }
        $chuyen->delete();
      }
    }
  }
}
