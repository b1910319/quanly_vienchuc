<?php

namespace App\Http\Controllers;

use App\Exports\DanhSach_VienChuc_LopExport;
use App\Models\Bac;
use App\Models\ChucVu;
use App\Models\Chuyen;
use App\Models\DanhSach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\DanToc;
use App\Models\DungHoc;
use App\Models\GiaHan;
use App\Models\HeDaoTao;
use App\Models\KetQua;
use App\Models\Khoa;
use App\Models\LoaiBangCap;
use App\Models\Lop;
use App\Models\Ngach;
use App\Models\PhanQuyen;
use App\Models\QuyetDinh;
use App\Models\ThoiHoc;
use App\Models\ThuongBinh;
use App\Models\Tinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use PDF;
use Illuminate\Support\Carbon;

class DanhSachController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function danhsach($ma_l){
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
    $title = "Quản lý thông tin dân tộc";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $count = DanhSach::where('ma_l', $ma_l)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $count_quyetdinh_vienchuc = QuyetDinh::join('vienchuc', 'vienchuc.ma_vc', '=', 'quyetdinh.ma_vc')
        ->where('quyetdinh.ma_l', $ma_l)
        ->select(DB::raw('count(quyetdinh.ma_qd) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_dunghoc_vienchuc = DungHoc::join('vienchuc', 'vienchuc.ma_vc', '=', 'dunghoc.ma_vc')
        ->where('dunghoc.ma_l', $ma_l)
        ->select(DB::raw('count(dunghoc.ma_dh) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_ketqua_vienchuc = KetQua::join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
        ->where('ketqua.ma_l', $ma_l)
        ->select(DB::raw('count(ketqua.ma_kq) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_giahan_vienchuc = GiaHan::join('vienchuc', 'vienchuc.ma_vc', '=', 'giahan.ma_vc')
        ->where('giahan.ma_l', $ma_l)
        ->select(DB::raw('count(giahan.ma_gh) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_chuyen_vienchuc = Chuyen::join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
        ->where('chuyen.ma_l', $ma_l)
        ->select(DB::raw('count(chuyen.ma_c) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $count_thoihoc_vienchuc = ThoiHoc::join('vienchuc', 'vienchuc.ma_vc', '=', 'thoihoc.ma_vc')
        ->where('thoihoc.ma_l', $ma_l)
        ->select(DB::raw('count(thoihoc.ma_th) as sum, vienchuc.ma_vc'))
        ->groupBy('vienchuc.ma_vc')
        ->get();
      $list_vienchuc = VienChuc::where('status_vc', '<>', '2')
        ->orderBy('ma_vc', 'desc')
        ->get();
      $list = DanhSach::join('vienchuc', 'vienchuc.ma_vc', '=', 'danhsach.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'danhsach.ma_l')
        ->where('danhsach.ma_l', $ma_l)
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
      $lop = Lop::find($ma_l);
      return view('danhsach.danhsach')
        ->with('title', $title)
        ->with('ma_l', $ma_l)
        ->with('lop', $lop)

        ->with('count', $count)
        ->with('count_thoihoc_vienchuc', $count_thoihoc_vienchuc)
        ->with('count_chuyen_vienchuc', $count_chuyen_vienchuc)
        ->with('count_giahan_vienchuc', $count_giahan_vienchuc)
        ->with('count_ketqua_vienchuc', $count_ketqua_vienchuc)
        ->with('count_quyetdinh_vienchuc', $count_quyetdinh_vienchuc)
        ->with('count_dunghoc_vienchuc', $count_dunghoc_vienchuc)

        ->with('list_vienchuc', $list_vienchuc)
        ->with('list',$list)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loiabangcap', $list_loiabangcap)
        ->with('list_tinh',$list_tinh)

        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_danhsach($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $danhsach = new DanhSach();
      $danhsach->ma_l = $ma_l;
      $danhsach->ma_vc = $ma_vc;
      $danhsach->save();
      return Redirect::to('/danhsach/'.$ma_l);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_danhsach(Request $request){
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
        $ma_l =$request->ma_l;
        $ma_vc =$request->ma_vc;
        if($ma_l != null && $ma_vc != null){
          $list_danhsach = DanhSach::where('ma_vc', $ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          foreach ($list_danhsach as $key => $danhsach) {
            $danhsach->delete();
          }
          $quyetdinh = QuyetDinh::where('ma_vc', $ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($quyetdinh)){
            foreach($quyetdinh as $qd){
              if($qd->file_qd != ' '){
                unlink('public/uploads/quyetdinh/'.$qd->file_qd);
              }
              $qd->delete();
            }
          }
          $ketqua = KetQua::where('ma_vc', $ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($ketqua)){
            foreach ($ketqua as $key => $kq) {
              $kq->delete();
            }
          }
          $giahan = GiaHan::where('ma_vc', $ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($giahan)){
            foreach ($giahan as $key => $gh) {
              if($gh->file_gh != ' '){
                unlink('public/uploads/giahan/'.$gh->file_gh);
              }
              $gh->delete();
            }
          }
          $dunghoc = DungHoc::where('ma_vc', $ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($dunghoc)){
            foreach ($dunghoc as $key => $dh) {
              if($dh->file_dh != ' '){
                unlink('public/uploads/dunghoc/'.$dh->file_dh);
              }
              $dh->delete();
            }
          }
          $thoihoc = ThoiHoc::where('ma_vc', $ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($thoihoc)){
            foreach ($thoihoc as $key => $th) {
              if($th->file_th != ' '){
                unlink('public/uploads/thoihoc/'.$th->file_th);
              }
              $th->delete();
            }
          }
          $chuyen = Chuyen::where('ma_vc', $ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($chuyen)){
            foreach ($chuyen as $key => $c) {
              if($c->file_c != ' '){
                unlink('public/uploads/chuyen/'.$c->file_c);
              }
              $c->delete();
            }
          }
        }
      }
    }
  }
  public function delete_all_danhsach($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = DanhSach::where('ma_l', $ma_l)
        ->get();
      foreach($list as $key => $danhsach){
        $quyetdinh = QuyetDinh::where('ma_vc', $danhsach->ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($quyetdinh)){
            foreach($quyetdinh as $qd){
              if($qd->file_qd != ' '){
                unlink('public/uploads/quyetdinh/'.$qd->file_qd);
              }
              $qd->delete();
            }
          }
          $ketqua = KetQua::where('ma_vc', $danhsach->ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($ketqua)){
            foreach ($ketqua as $key => $kq) {
              $kq->delete();
            }
          }
          $giahan = GiaHan::where('ma_vc', $danhsach->ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($giahan)){
            foreach ($giahan as $key => $gh) {
              if($gh->file_gh != ' '){
                unlink('public/uploads/giahan/'.$gh->file_gh);
              }
              $gh->delete();
            }
          }
          $dunghoc = DungHoc::where('ma_vc', $danhsach->ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($dunghoc)){
            foreach ($dunghoc as $key => $dh) {
              if($dh->file_dh != ' '){
                unlink('public/uploads/dunghoc/'.$dh->file_dh);
              }
              $dh->delete();
            }
          }
          $thoihoc = ThoiHoc::where('ma_vc', $danhsach->ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($thoihoc)){
            foreach ($thoihoc as $key => $th) {
              if($th->file_th != ' '){
                unlink('public/uploads/thoihoc/'.$th->file_th);
              }
              $th->delete();
            }
          }
          $chuyen = Chuyen::where('ma_vc', $danhsach->ma_vc)
            ->where('ma_l', $ma_l)
            ->get();
          if(isset($chuyen)){
            foreach ($chuyen as $key => $c) {
              if($c->file_c != ' '){
                unlink('public/uploads/chuyen/'.$c->file_c);
              }
              $c->delete();
            }
          }
          $danhsach->delete();
      }
      return Redirect::to('/danhsach/'.$ma_l);
    }else{
      return Redirect::to('/home');
    }
  }
  public function quyetdinh_dihoc_pdf($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $vienchuc = DanhSach::join('vienchuc', 'vienchuc.ma_vc', '=', 'danhsach.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'danhsach.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('danhsach.ma_l', $ma_l)
        ->where('danhsach.ma_vc', $ma_vc)
        ->get();
      $lop = Lop::find($ma_l);
      $pdf = PDF::loadView('pdf.pdf_quyetdinh_dihoc', [
        'vienchuc' => $vienchuc,
        'lop' => $lop,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function danhsach_vienchuc_lop_pdf($ma_l){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $vienchuc = DanhSach::join('vienchuc', 'vienchuc.ma_vc', '=', 'danhsach.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'danhsach.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('danhsach.ma_l', $ma_l)
        ->get();
      $lop = Lop::find($ma_l);
      $pdf = PDF::loadView('pdf.pdf_danhsach_vienchuc_lop', [
        'vienchuc' => $vienchuc,
        'lop' => $lop,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function danhsach_vienchuc_lop_excel($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      return (new DanhSach_VienChuc_LopExport($ma_l))->download('Danh-sach-vien-chuc-lop.xlsx');
    }else{
      return Redirect::to('/home');
    }
  }
  public function quatrinhhoc(){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $title = "Qúa trình học";
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      return view('danhsach.quatrinhhoc')
        ->with('title', $title)

        ->with('list_vienchuc', $list_vienchuc)
        ->with('list_khoa', $list_khoa)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_thuongbinh', $list_thuongbinh)

        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }

  public function quatrinhhoc_chitiet($ma_vc){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    $title = "Qúa trình học";
    if($phanquyen_admin || $phanquyen_qlcttc){
      $vienchuc = VienChuc::find($ma_vc);
      $list_lop_vienchuc = VienChuc::join('danhsach', 'danhsach.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'danhsach.ma_l')
        ->join('danhmuclop', 'danhmuclop.ma_dml', '=', 'lop.ma_dml')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->where('danhsach.ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_ketqua = KetQua::where('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_giahan = GiaHan::where('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_dunghoc = DungHoc::where('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_chuyen = Chuyen::where('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_thoihoc = ThoiHoc::where('ma_vc', $ma_vc)
        ->get();
      return view('danhsach.quatrinhhoc_chitiet')
        ->with('title', $title)
        ->with('vienchuc', $vienchuc)

        ->with('list_lop_vienchuc', $list_lop_vienchuc)
        ->with('list_quatrinhhoc_ketqua', $list_quatrinhhoc_ketqua)
        ->with('list_quatrinhhoc_giahan', $list_quatrinhhoc_giahan)
        ->with('list_quatrinhhoc_dunghoc', $list_quatrinhhoc_dunghoc)
        ->with('list_quatrinhhoc_chuyen', $list_quatrinhhoc_chuyen)
        ->with('list_quatrinhhoc_thoihoc', $list_quatrinhhoc_thoihoc)

        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function quatrinhhoc_xuatfile( Request $request){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_vc = $request->ma_vc;
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', 'vienchuc.ma_k')
        ->whereIn('ma_vc', $ma_vc)
        ->get();
      $list_lop_vienchuc = VienChuc::join('danhsach', 'danhsach.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'danhsach.ma_l')
        ->join('danhmuclop', 'danhmuclop.ma_dml', '=', 'lop.ma_dml')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->whereIn('danhsach.ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_ketqua = KetQua::whereIn('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_giahan = GiaHan::whereIn('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_dunghoc = DungHoc::whereIn('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_chuyen = Chuyen::whereIn('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhhoc_thoihoc = ThoiHoc::whereIn('ma_vc', $ma_vc)
        ->get();
      $pdf = PDF::loadView('pdf.quatrinhhoc_pdf', [
        'vienchuc' => $vienchuc,
        'list_lop_vienchuc' => $list_lop_vienchuc,
        'list_quatrinhhoc_ketqua' => $list_quatrinhhoc_ketqua,
        'list_quatrinhhoc_giahan' => $list_quatrinhhoc_giahan,
        'list_quatrinhhoc_dunghoc' => $list_quatrinhhoc_dunghoc,
        'list_quatrinhhoc_chuyen' => $list_quatrinhhoc_chuyen,
        'list_quatrinhhoc_thoihoc' => $list_quatrinhhoc_thoihoc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
}
