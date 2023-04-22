<?php

namespace App\Http\Controllers;

use App\Models\DungHoc;
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

class DungHocController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function dunghoc($ma_l, $ma_vc){
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
      $list = DungHoc::join('vienchuc', 'vienchuc.ma_vc', '=', 'dunghoc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->orderBy('ma_dh', 'desc')
        ->where('dunghoc.ma_l', $ma_l)
        ->where('dunghoc.ma_vc', $ma_vc)
        ->get();
      $count = DungHoc::select(DB::raw('count(ma_dh) as sum'))
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $count_status = DungHoc::select(DB::raw('count(ma_dh) as sum, status_dh'))
        ->groupBy('status_dh')
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $lop = Lop::find($ma_l);
      $vienchuc = VienChuc::find($ma_vc);
      return view('dunghoc.dunghoc')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('lop', $lop)
        ->with('vienchuc', $vienchuc)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_dunghoc(Request $request){
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
      $dunghoc = new dunghoc();
      $dunghoc->ma_vc = $data['ma_vc'];
      $dunghoc->ma_l = $data['ma_l'];
      $dunghoc->batdau_dh = $data['batdau_dh'];
      $dunghoc->ketthuc_dh = $data['ketthuc_dh'];
      $dunghoc->lydo_dh = $data['lydo_dh'];
      $dunghoc->status_dh = $data['status_dh'];
      $get_file = $request->file('file_dh');
      if($get_file){
        $new_file = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/dunghoc', $new_file);
        $dunghoc->file_dh = $new_file;
      }
      $dunghoc->save();
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_dunghoc($ma_dh){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $dunghoc = DungHoc::find($ma_dh);
      if($dunghoc->status_dh == 1){
        $dunghoc->status_dh = DungHoc::find($ma_dh)->update(['status_dh' => 0]);
      }elseif($dunghoc->status_dh == 0){
        $dunghoc->status_dh = DungHoc::find($ma_dh)->update(['status_dh' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_dunghoc($ma_dh){
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
      $edit = DungHoc::find($ma_dh);
      $lop = DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->where('ma_dh', $ma_dh)
        ->first();
      return view('dunghoc.dunghoc_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('lop', $lop)

        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_soquyetdinh_dh_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_dh = $request->soquyetdinh_dh;
      $ma_dh = $request->ma_dh;
      if($soquyetdinh_dh != null && $ma_dh != null){
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_dh)
          ->first();
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_dh)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_dh)
          ->first();
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_dh)
          ->first();
        $dunghoc = DungHoc::where('soquyetdinh_dh', $soquyetdinh_dh)
          ->where('ma_dh', '<>', $ma_dh)  
          ->first();
        if(isset($quatrinhchucvu) || isset($quyetdinh) || isset($khenthuong) || isset($kyluat) || isset($dunghoc)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function update_dunghoc(Request $request, $ma_dh){
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
      $dunghoc = DungHoc::find($ma_dh);
      $dunghoc->ma_vc = $data['ma_vc'];
      $dunghoc->ma_l = $data['ma_l'];
      $dunghoc->batdau_dh = $data['batdau_dh'];
      $dunghoc->ketthuc_dh = $data['ketthuc_dh'];
      $dunghoc->lydo_dh = $data['lydo_dh'];
      $dunghoc->ma_l = $data['ma_l'];
      $dunghoc->status_dh = $data['status_dh'];
      $get_file = $request->file('file_dh');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($dunghoc->file_dh != ' '){
          unlink('public/uploads/dunghoc/'.$dunghoc->file_dh);
        }
        $get_file->move('public/uploads/dunghoc', $new_image);
        $dunghoc->file_dh = $new_image;
      }
      $dunghoc->updated_dh = Carbon::now();
      $dunghoc->save();
      return Redirect::to('/dunghoc/'.$data['ma_l'].'/'.$data['ma_vc'],302);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_dunghoc_quyetdinh(Request $request, $ma_dh){
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
      $dunghoc = DungHoc::find($ma_dh);
      $dunghoc->soquyetdinh_dh = $data['soquyetdinh_dh'];
      $dunghoc->ngaykyquyetdinh_dh = $data['ngaykyquyetdinh_dh'];
      $dunghoc->status_dh = $data['status_dh'];
      $get_file = $request->file('filequyetdinh_dh');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($dunghoc->filequyetdinh_dh){
          unlink('public/uploads/dunghoc/'.$dunghoc->filequyetdinh_dh);
        }
        $get_file->move('public/uploads/dunghoc', $new_image);
        $dunghoc->filequyetdinh_dh = $new_image;
      }
      $dunghoc->updated_dh = Carbon::now();
      $dunghoc->save();
      return Redirect::to('/dunghoc/'.$data['ma_l'].'/'.$data['ma_vc'],302);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_dunghoc(Request $request){
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
          $dunghoc = DungHoc::find($id);
          if($dunghoc->file_dh != ' '){
            unlink('public/uploads/dunghoc/'.$dunghoc->file_dh);
          }
          $dunghoc->delete();
        }
      }
    }
  }
  public function delete_dunghoc_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_dh = $request->ma_dh;
      $list_dunghoc = DungHoc::whereIn('ma_dh', $ma_dh)->get();
      foreach ($list_dunghoc as $key => $dunghoc) {
        if($dunghoc->file_dh != ' '){
          unlink('public/uploads/dunghoc/'.$dunghoc->file_dh);
        }
        $dunghoc->delete();
      }
      return redirect()->back();
    }
  }
  public function delete_all_dunghoc($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = DungHoc::where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $dunghoc){
        if($dunghoc->file_dh != ' '){
          unlink('public/uploads/dunghoc/'.$dunghoc->file_dh);
        }
        $dunghoc->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function dunghoc_all(){
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
      $list = DungHoc::join('vienchuc', 'vienchuc.ma_vc', '=', 'dunghoc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->orderBy('ma_dh', 'desc')
        ->get();
      $count = DungHoc::select(DB::raw('count(ma_dh) as sum'))
        ->get();
      $count_status = DungHoc::select(DB::raw('count(ma_dh) as sum, status_dh'))
        ->groupBy('status_dh')
        ->get();
      $lop = '';
      $vienchuc = '';
      $list_vienchuc = VienChuc::join('danhsach', 'danhsach.ma_vc', '=', 'vienchuc.ma_vc')
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      return view('dunghoc.dunghoc')
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
  public function delete_dunghoc_all(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = DungHoc::get();
      foreach($list as $key => $dunghoc){
        if($dunghoc->file_dh != ' '){
          unlink('public/uploads/dunghoc/'.$dunghoc->file_dh);
        }
        $dunghoc->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function vienchuc_dunghoc_add($ma_l){
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
    $dunghoc = DungHoc::where('ma_vc', $ma_vc)
      ->where('ma_l', $ma_l)
      ->orderBy('ketthuc_dh', 'desc')
      ->first();
    return view('dunghoc.vienchuc_dunghoc_add')
      ->with('title', $title)
      ->with('ma_l', $ma_l)
      ->with('lop', $lop)
      ->with('dunghoc', $dunghoc)

      ->with('phanquyen_admin', $phanquyen_admin)
      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
  }
  public function vienchuc_add_dunghoc(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $data = $request->all();
    $dunghoc = new dunghoc();
    $dunghoc->ma_vc = $ma_vc;
    $dunghoc->ma_l = $data['ma_l'];
    $dunghoc->batdau_dh = $data['batdau_dh'];
    $dunghoc->ketthuc_dh = $data['ketthuc_dh'];
    $dunghoc->lydo_dh = $data['lydo_dh'];
    $dunghoc->status_dh = $data['status_dh'];
    $get_file = $request->file('file_dh');
    if($get_file){
      $new_file = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
      $get_file->move('public/uploads/dunghoc', $new_file);
      $dunghoc->file_dh = $new_file;
    }
    $dunghoc->save();
    return Redirect::to('thongtin_lophoc');
  }
}
