<?php

namespace App\Http\Controllers;

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

class GiaHanController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function giahan($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
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
      $list = GiaHan::join('vienchuc', 'vienchuc.ma_vc', '=', 'giahan.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->orderBy('ma_gh', 'desc')
        ->where('giahan.ma_l', $ma_l)
        ->where('giahan.ma_vc', $ma_vc)
        ->get();
      $count = GiaHan::select(DB::raw('count(ma_gh) as sum'))
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $count_status = GiaHan::select(DB::raw('count(ma_gh) as sum, status_gh'))
        ->groupBy('status_gh')
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $lop = Lop::find($ma_l);
      $vienchuc = VienChuc::find($ma_vc);
      return view('giahan.giahan')
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_giahan(Request $request){
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
      $giahan = new GiaHan();
      $giahan->ma_vc = $data['ma_vc'];
      $giahan->ma_l = $data['ma_l'];
      $giahan->thoigian_gh = $data['thoigian_gh'];
      $giahan->lydo_gh = $data['lydo_gh'];
      $giahan->status_gh = $data['status_gh'];
      $get_file = $request->file('file_gh');
      if($get_file){
        $new_file = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/giahan', $new_file);
        $giahan->file_gh = $new_file;
      }
      $giahan->save();
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_giahan($ma_gh){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $giahan = GiaHan::find($ma_gh);
      if($giahan->status_gh == 1){
        $giahan->status_gh = GiaHan::find($ma_gh)->update(['status_gh' => 0]);
      }elseif($giahan->status_gh == 0){
        $giahan->status_gh = GiaHan::find($ma_gh)->update(['status_gh' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_giahan($ma_gh){
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
      $edit = GiaHan::find($ma_gh);
      $lop = GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->where('ma_gh', $ma_gh)
        ->first();
      return view('giahan.giahan_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('lop', $lop)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_giahan(Request $request, $ma_gh){
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
      $giahan = GiaHan::find($ma_gh);
      $giahan->ma_vc = $data['ma_vc'];
      $giahan->ma_l = $data['ma_l'];
      $giahan->thoigian_gh = $data['thoigian_gh'];
      $giahan->lydo_gh = $data['lydo_gh'];
      $giahan->status_gh = $data['status_gh'];
      $get_file = $request->file('file_gh');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($giahan->file_gh != ' '){
          unlink('public/uploads/giahan/'.$giahan->file_gh);
        }
        $get_file->move('public/uploads/giahan', $new_image);
        $giahan->file_gh = $new_image;
      }
      $giahan->updated_gh = Carbon::now();
      $giahan->save();
      return Redirect::to('/giahan/'.$data['ma_l'].'/'.$data['ma_vc'],302);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_giahan(Request $request){
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
          $giahan = GiaHan::find($id);
          if($giahan->file_gh != ' '){
            unlink('public/uploads/giahan/'.$giahan->file_gh);
          }
          $giahan->delete();
        }
      }
    }
  }
  public function delete_giahan_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_gh = $request->ma_gh;
      $list_giahan = GiaHan::whereIn('ma_gh', $ma_gh)->get();
      foreach ($list_giahan as $key => $giahan) {
        if($giahan->file_gh != ' '){
          unlink('public/uploads/giahan/'.$giahan->file_gh);
        }
        $giahan->delete();
      }
      return redirect()->back();
    }
  }
  public function delete_all_giahan($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = GiaHan::where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $giahan){
        if($giahan->file_gh != ' '){
          unlink('public/uploads/giahan/'.$giahan->file_gh);
        }
        $giahan->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function giahan_all(){
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
      $list = GiaHan::join('vienchuc', 'vienchuc.ma_vc', '=', 'giahan.ma_vc')
        ->join('khoa','khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->orderBy('ma_gh', 'desc')
        ->get();
      $count = GiaHan::select(DB::raw('count(ma_gh) as sum'))
        ->get();
      $count_status = GiaHan::select(DB::raw('count(ma_gh) as sum, status_gh'))
        ->groupBy('status_gh')
        ->get();
      $lop = '';
      $vienchuc = '';
      $list_vienchuc = VienChuc::join('danhsach', 'danhsach.ma_vc', '=', 'vienchuc.ma_vc')
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      return view('giahan.giahan')
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
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_giahan_all(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = GiaHan::get();
      foreach($list as $key => $giahan){
        if($giahan->file_gh != ' '){
          unlink('public/uploads/giahan/'.$giahan->file_gh);
        }
        $giahan->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function vienchuc_giahan_add($ma_l){
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
    $lop = Lop::find($ma_l);
    $giahan = GiaHan::where('ma_vc', $ma_vc)
      ->where('ma_l', $ma_l)
      ->orderBy('thoigian_gh', 'desc')
      ->first();
    $giahan_chuaduyet = GiaHan::where('ma_vc', $ma_vc)
      ->where('ma_l', $ma_l)
      ->where('status_gh', '1')
      ->get();
    return view('giahan.vienchuc_giahan_add')
      ->with('title', $title)
      ->with('ma_l', $ma_l)
      ->with('lop', $lop)
      ->with('giahan', $giahan)
      ->with('giahan_chuaduyet', $giahan_chuaduyet)

      ->with('phanquyen_admin', $phanquyen_admin)
      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
  }
  public function vienchuc_add_giahan(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $data = $request->all();
    $giahan = new GiaHan();
    $giahan->ma_vc = $ma_vc;
    $giahan->ma_l = $data['ma_l'];
    $giahan->thoigian_gh = $data['thoigian_gh'];
    $giahan->lydo_gh = $data['lydo_gh'];
    $giahan->status_gh = $data['status_gh'];
    $get_file = $request->file('file_gh');
    if($get_file){
      $new_file = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
      $get_file->move('public/uploads/giahan', $new_file);
      $giahan->file_gh = $new_file;
    }
    $giahan->save();
    return redirect()->back();
  }
  public function check_soquyetdinh_gh_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_gh = $request->soquyetdinh_gh;
      $ma_gh = $request->ma_gh;
      if($soquyetdinh_gh != null && $ma_gh != null){
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_gh)
          ->first();
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_gh)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_gh)
          ->first();
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_gh)
          ->first();
        $dunghoc = DungHoc::where('soquyetdinh_dh', $soquyetdinh_gh)
          ->first();
        $giahan = GiaHan::where('soquyetdinh_gh', $soquyetdinh_gh)
          ->where('ma_gh', '<>', $ma_gh)  
          ->first();
        if(isset($quatrinhchucvu) || isset($quyetdinh) || isset($khenthuong) || isset($kyluat) || isset($dunghoc) || isset($giahan)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function update_giahan_quyetdinh(Request $request, $ma_gh){
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
      $giahan = GiaHan::find($ma_gh);
      $giahan->soquyetdinh_gh = $data['soquyetdinh_gh'];
      $giahan->ngaykyquyetdinh_gh = $data['ngaykyquyetdinh_gh'];
      $giahan->status_gh = $data['status_gh'];
      $get_file = $request->file('filequyetdinh_gh');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($giahan->filequyetdinh_gh){
          unlink('public/uploads/giahan/'.$giahan->filequyetdinh_gh);
        }
        $get_file->move('public/uploads/giahan', $new_image);
        $giahan->filequyetdinh_gh = $new_image;
      }
      $giahan->updated_gh = Carbon::now();
      $giahan->save();
      return Redirect::to('/giahan_all');
    }else{
      return Redirect::to('/home');
    }
  }
  public function vienchuc_giahan_edit($ma_l, $ma_gh){
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
    $edit = GiaHan::find($ma_gh);
    $giahan = GiaHan::where('ma_vc', $ma_vc)
      ->where('ma_l', $ma_l)
      ->where('ma_gh', '<>', $ma_gh)
      ->orderBy('thoigian_gh', 'desc')
      ->first();
    return view('giahan.vienchuc_giahan_edit')
      ->with('title', $title)
      ->with('ma_l', $ma_l)
      ->with('lop', $lop)
      ->with('edit', $edit)
      ->with('giahan', $giahan)

      ->with('phanquyen_admin', $phanquyen_admin)
      ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
  }
  public function vienchuc_updated_giahan(Request $request, $ma_gh){
    $this->check_login();
    $data = $request->all();
    Carbon::now('Asia/Ho_Chi_Minh');
    $giahan = GiaHan::find($ma_gh);
    $giahan->ma_l = $data['ma_l'];
    $giahan->thoigian_gh = $data['thoigian_gh'];
    $giahan->lydo_gh = $data['lydo_gh'];
    $get_file = $request->file('file_gh');
    if($get_file){
      $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
      if($giahan->file_gh != ' '){
        unlink('public/uploads/giahan/'.$giahan->file_gh);
      }
      $get_file->move('public/uploads/giahan', $new_image);
      $giahan->file_gh = $new_image;
    }
    $giahan->updated_gh = Carbon::now();
    $giahan->save();
    return Redirect::to('/vienchuc_giahan_add/'.$data['ma_l']);
  }
  public function vienchuc_giahan_delete(Request $request){
    $this->check_login();
    if($request->ajax()){
      $id =$request->id;
      if($id != null){
        $giahan = GiaHan::find($id);
        if($giahan->file_gh != ' '){
          unlink('public/uploads/giahan/'.$giahan->file_gh);
        }
        $giahan->delete();
      }
    }
  }
}
