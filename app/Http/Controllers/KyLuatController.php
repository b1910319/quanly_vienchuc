<?php

namespace App\Http\Controllers;

use App\Imports\KyLuatImport;
use App\Models\Bac;
use App\Models\ChucVu;
use App\Models\Chuyen;
use App\Models\DanToc;
use App\Models\DungHoc;
use App\Models\GiaHan;
use App\Models\HeDaoTao;
use App\Models\KhenThuong;
use App\Models\Khoa;
use App\Models\Loaikyluat;
use App\Models\Ngach;
use App\Models\KyLuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QuaTrinhChucVu;
use App\Models\QuaTrinhNghi;
use App\Models\QuyetDinh;
use App\Models\ThoiHoc;
use App\Models\ThuongBinh;
use App\Models\Tinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use PhpOffice\PhpWord\TemplateProcessor;

class KyLuatController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function kyluat(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý kỷ luật";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d');
      if ($phanquyen_qlk) {
        $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
          ->where('status_vc', '<>', '2')
          ->where('ma_k', $ma_k)
          ->select(DB::raw('count(ma_vc) as sum'))
          ->get();
        $list_vienchuc = VienChuc::orderBy('ma_vc', 'desc')
          ->where('ma_k', $ma_k)
          ->get();
        $list_vienchuc_kyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('ma_k', $ma_k)
          ->get();
        $count_kyluat_vienchuc = VienChuc::leftJoin('kyluat', 'vienchuc.ma_vc', '=', 'kyluat.ma_vc')
          ->where('ma_k', $ma_k)
          ->select(DB::raw('count(ma_kl) as sum, vienchuc.ma_vc'))
          ->groupBy('vienchuc.ma_vc')
          ->get();
      } else {
        $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(ma_vc) as sum'))
          ->get();
        $list_vienchuc = VienChuc::orderBy('ma_vc', 'desc')
          ->get();
        $list_vienchuc_kyluat = VienChuc::join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->get();
        $count_kyluat_vienchuc = VienChuc::leftJoin('kyluat', 'vienchuc.ma_vc', '=', 'kyluat.ma_vc')
          ->select(DB::raw('count(ma_kl) as sum, vienchuc.ma_vc'))
          ->groupBy('vienchuc.ma_vc')
          ->get();
      }
      return view('kyluat.kyluat')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_tinh', $list_tinh)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('title', $title)
        ->with('count_kyluat_vienchuc', $count_kyluat_vienchuc)
        ->with('list_vienchuc_kyluat', $list_vienchuc_kyluat)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('list_vienchuc', $list_vienchuc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function kyluat_add($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thêm thông tin kỷ luật";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $list = KyLuat::join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('ma_vc', $ma_vc)
        ->orderBy('ma_kl', 'desc')
        ->get();
      $count = KyLuat::where('ma_vc', $ma_vc)
        ->select(DB::raw('count(ma_kl) as sum'))
        ->get();
      $count_status = KyLuat::where('ma_vc', $ma_vc)
        ->select(DB::raw('count(ma_kl) as sum, status_kl'))
        ->groupBy('status_kl')
        ->get();
      $list_loaikyluat = LoaiKyLuat::where('status_lkl', '<>', '1')
        ->orderBy('ten_lkl', 'asc')
        ->get();
      $vienchuc = VienChuc::find($ma_vc);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('kyluat.kyluat_add')
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('ma_vc', $ma_vc)
        ->with('vienchuc', $vienchuc)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('count_status', $count_status)
        ->with('count_nangbac', $count_nangbac)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_soquyetdinh_kl(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_kl = $request->soquyetdinh_kl;
      if($soquyetdinh_kl != null){
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_kl)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_kl)
          ->first();
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_kl)
          ->first();
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_kl)
          ->first();
        $giahan = GiaHan::where('soquyetdinh_gh', $soquyetdinh_kl)
          ->first();
        $chuyen = Chuyen::where('soquyetdinh_c', $soquyetdinh_kl)
          ->first();
        $dunghoc = DungHoc::where('soquyetdinh_dh', $soquyetdinh_kl)
          ->first();
        $thoihoc = ThoiHoc::where('soquyetdinh_th', $soquyetdinh_kl)
          ->first();
        $quatrinhnghi = QuaTrinhNghi::where('soquyetdinh_qtn', $soquyetdinh_kl)
          ->first();
        if(isset($quatrinhchucvu) || isset($quyetdinh) || isset($khenthuong) || isset($kyluat) || isset($giahan) || isset($chuyen) || isset($dunghoc) || isset($thoihoc) || isset($quatrinhnghi)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_soquyetdinh_kl_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_kl = $request->soquyetdinh_kl;
      $ma_kl = $request->ma_kl;
      if($soquyetdinh_kl != null && $ma_kl != null){
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_kl)
          ->where('ma_kl', '<>', $ma_kl)
          ->first();
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_kl)
          ->first();
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_kl)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_kl)
          ->first();
        $giahan = GiaHan::where('soquyetdinh_gh', $soquyetdinh_kl)
          ->first();
        $chuyen = Chuyen::where('soquyetdinh_c', $soquyetdinh_kl)
          ->first();
        $dunghoc = DungHoc::where('soquyetdinh_dh', $soquyetdinh_kl)
          ->first();
        $thoihoc = ThoiHoc::where('soquyetdinh_th', $soquyetdinh_kl)
          ->first();
        $quatrinhnghi = QuaTrinhNghi::where('soquyetdinh_qtn', $soquyetdinh_kl)
          ->first();
        if(isset($khenthuong) || isset($quatrinhchucvu) || isset($quyetdinh) || isset($kyluat) || isset($giahan) || isset($chuyen) || isset($dunghoc) || isset($thoihoc) || isset($quatrinhnghi)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_kyluat(Request $request, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $data = $request->all();
      $kyluat = new KyLuat();
      $vienchuc = VienChuc::find($ma_vc);
      $kyluat->ma_lkl = $data['ma_lkl'];
      $kyluat->ma_vc = $ma_vc;
      $kyluat->ngay_kl = $data['ngay_kl'];
      $kyluat->lydo_kl = $data['lydo_kl'];
      $kyluat->status_kl = $data['status_kl'];
      $kyluat->soquyetdinh_kl = $data['soquyetdinh_kl'];
      $get_file = $request->file('filequyetdinh_kl');
      if($get_file){
        $new_file = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/kyluat', $new_file);
        $kyluat->filequyetdinh_kl = $new_file;
      }
      $kyluat->save();
      if($data['ma_lkl'] == 6){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 3]);
      }
      $request->session()->put('message_add_kyluat','Thêm thành công');
      return Redirect::to('/kyluat_add/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_kyluat_excel(Request $request){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      Excel::import(new KyLuatImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_kyluat($ma_kl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $kyluat = KyLuat::find($ma_kl);
      if($kyluat->status_kl == 1){
        $kyluat->status_kl = KyLuat::find($ma_kl)->update(['status_kl' => 0]);
      }elseif($kyluat->status_kl == 0){
        $kyluat->status_kl = KyLuat::find($ma_kl)->update(['status_kl' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_kyluat($ma_kl, $ma_vc){
    $this->check_login();
    $title = "Cập nhật thông tin kỷ luật";
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $edit = KyLuat::find($ma_kl);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_loaikyluat = LoaiKyLuat::where('status_lkl', '<>', '1')
        ->orderBy('ten_lkl', 'asc')
        ->get();
      return view('kyluat.kyluat_edit')
        ->with('edit', $edit)
        ->with('ma_vc', $ma_vc)
        ->with('title', $title)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_kyluat(Request $request, $ma_kl, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $data = $request->all();
      $vienchuc = VienChuc::find($ma_vc);
      Carbon::now('Asia/Ho_Chi_Minh');
      $kyluat = KyLuat::find($ma_kl);
      $kyluat->ma_lkl = $data['ma_lkl'];
      $kyluat->ma_vc = $ma_vc;
      $kyluat->ngay_kl = $data['ngay_kl'];
      $kyluat->lydo_kl = $data['lydo_kl'];
      $kyluat->status_kl = $data['status_kl'];
      $kyluat->soquyetdinh_kl = $data['soquyetdinh_kl'];
      $get_file = $request->file('filequyetdinh_kl');
      if($get_file){
        $new_file = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($kyluat->filequyetdinh_kl){
          unlink('public/uploads/kyluat/'.$kyluat->filequyetdinh_kl);
        }
        $get_file->move('public/uploads/kyluat', $new_file);
        $kyluat->filequyetdinh_kl = $new_file;
      }
      $kyluat->updated_kl = Carbon::now();
      $kyluat->save();
      $request->session()->put('message_update_kyluat','Cập nhật thành công');
      return Redirect::to('/kyluat_add/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_kyluat(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk || $phanquyen_qlktkl){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          $kyluat =  KyLuat::find($id);
          if($kyluat->filequyetdinh_kl){
            unlink('public/uploads/kyluat/'.$kyluat->filequyetdinh_kl);
          }
          KyLuat::find($id)->delete();
        }
      }
    }
  }
  public function delete_kyluat_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk || $phanquyen_qlktkl){
      $ma_kl = $request->ma_kl;
      $kyluat = KyLuat::whereIn('ma_kl', $ma_kl)->get();
      foreach($kyluat as $kl){
        if($kl->filequyetdinh_kl){
          unlink('public/uploads/kyluat/'.$kl->filequyetdinh_kl);
        }
      }
      KyLuat::whereIn('ma_kl', $ma_kl)->delete();
      $request->session()->put('message','Xoá thành công');
      return redirect()->back();
    }
  }
  public function delete_all_kyluat($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $list = KyLuat::where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $kyluat){
        if($kyluat->filequyetdinh_kl){
          unlink('public/uploads/kyluat/'.$kyluat->filequyetdinh_kl);
        }
        $kyluat->delete();
      }
      session()->put('message','Xoá thành công');
      return Redirect::to('/kyluat_add/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function kyluat_pdf($ma_kl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $kyluat = KyLuat::join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'kyluat.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('ma_kl', $ma_kl)
        ->get();
      $pdf = PDF::loadView('kyluat.kyluat_pdf', [
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function kyluat_xuatfile_pdf( $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', 'vienchuc.ma_k')
        ->where('ma_vc', $ma_vc)
        ->get();
      $list_kyluat= KyLuat::join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('ma_vc', $ma_vc)
        ->get();
      $pdf = PDF::loadView('pdf.kyluat_pdf', [
        'vienchuc' => $vienchuc,
        'list_kyluat' => $list_kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function kyluat_xuatfile_word($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', 'vienchuc.ma_k')
        ->where('ma_vc', $ma_vc)
        ->first();
        $list_kyluat= KyLuat::join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('ma_vc', $ma_vc)
        ->orderBy('ngay_kl', 'desc')
        ->get();
      $temp = new TemplateProcessor('public/word/kyluat_vienchuc.docx');
      $temp->setValue('hoten_vc',$vienchuc->hoten_vc);
      $temp->setValue('tenkhac_vc',$vienchuc->tenkhac_vc);
      $temp->setValue('ngaysinh_vc',$vienchuc->ngaysinh_vc);
      if($vienchuc->gioitinh_vc == 0){
        $gioitinh_vc = 'Nam';
      }else if($vienchuc->gioitinh_vc == 1){
        $gioitinh_vc = 'Nữ';
      }
      $temp->setValue('gioitinh_vc',$gioitinh_vc);
      $temp->setValue('ten_k',$vienchuc->ten_k);
      $temp->setValue('user_vc',$vienchuc->user_vc);
      $temp->setImageValue('hinh_vc', array('path' => 'public/uploads/vienchuc/'.$vienchuc->hinh_vc, 'width' => 100, 'height' => 150));
      $kyluat_arr = array();
      foreach($list_kyluat as $key => $kyluat){
        $kyluat_arr[] = [
          'stt_kl' => $key+1, 
          'ten_lkl' => $kyluat->ten_lkl, 
          'soquyetdinh_kl' => $kyluat->soquyetdinh_kl, 
          'ngay_kl' => $kyluat->ngay_kl, 
          'lydo_kl' => $kyluat->lydo_kl
        ];
      };
      $temp->cloneRowAndSetValues('stt_kl', $kyluat_arr);
      $name_file = $vienchuc->hoten_vc;
      $temp->saveAs($name_file.'.docx');
      return response()->download($name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }
}
