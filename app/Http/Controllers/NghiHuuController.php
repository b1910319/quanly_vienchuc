<?php

namespace App\Http\Controllers;

use App\Exports\NghiHuuExport;
use App\Models\Bac;
use App\Models\BangCap;
use App\Models\ChucVu;
use App\Models\Chuyen;
use App\Models\DanToc;
use App\Models\DungHoc;
use App\Models\GiaDinh;
use App\Models\GiaHan;
use App\Models\KetQua;
use App\Models\KhenThuong;
use App\Models\Khoa;
use App\Models\KyLuat;
use App\Models\Ngach;
use App\Models\NoiSinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QueQuan;
use App\Models\QuyetDinh;
use App\Models\ThoiHoc;
use App\Models\ThuongBinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class NghiHuuController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function nghihuu(){
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
    $title = "Quản lý nghĩ hưu";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt ||$phanquyen_qlk){
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $batdau_nam = Carbon::parse(Carbon::now()->subMonths(744))->format('Y-m-d');
      $ketthuc_nam = Carbon::parse(Carbon::now()->subMonths(743))->format('Y-m-d');
      $batdau_nu = Carbon::parse(Carbon::now()->subMonths(720))->format('Y-m-d');
      $ketthuc_nu = Carbon::parse(Carbon::now()->subMonths(719))->format('Y-m-d');

      // echo $batdau_nam.'bat dau nam';
      // echo '<br>';
      // echo $ketthuc_nam.'ketthuc nam';
      // echo '<br>';
      // echo $batdau_nu.'bat dau nu';
      // echo '<br>';
      // echo $ketthuc_nu.'ketthuc nu';

      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      if ($phanquyen_qlk) {
        $list_vienchuc_nghihuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->orderBy('hoten_vc','asc')
          ->get();
        $list_vienchuc_nam_ganhuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->whereBetween('ngaysinh_vc', [$batdau_nam, $ketthuc_nam])
          ->where('gioitinh_vc', '0')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->get();
        $list_vienchuc_nu_ganhuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->whereBetween('ngaysinh_vc', [$batdau_nu, $ketthuc_nu])
          ->where('gioitinh_vc', '1')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->get();
        $list_nghihuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->get();
        $list_nu_nghihuu_homnay = VienChuc::where('ngaysinh_vc','LIKE', $ketthuc_nu)
          ->where('gioitinh_vc', '1')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc','<>','2')
          ->get();
        $list_nam_nghihuu_homnay = VienChuc::where('ngaysinh_vc','LIKE', $ketthuc_nam)
          ->where('gioitinh_vc', '0')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc','<>','2')
          ->get();
      } else {
        $list_vienchuc_nghihuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->orderBy('hoten_vc','asc')
        ->get();
        $list_vienchuc_nam_ganhuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->whereBetween('ngaysinh_vc', [$batdau_nam, $ketthuc_nam])
        ->where('gioitinh_vc', '0')
        ->where('status_vc', '<>', '2')
        ->get();
        $list_vienchuc_nu_ganhuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->whereBetween('ngaysinh_vc', [$batdau_nu, $ketthuc_nu])
          ->where('gioitinh_vc', '1')
          ->where('status_vc', '<>', '2')
          ->get();
        $list_nghihuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->get();
        $list_nu_nghihuu_homnay = VienChuc::where('ngaysinh_vc','LIKE', $batdau_nu)
          ->where('gioitinh_vc', '1')
          ->where('status_vc','<>','2')
          ->get();
        $list_nam_nghihuu_homnay = VienChuc::where('ngaysinh_vc','LIKE', $batdau_nam)
          ->where('gioitinh_vc', '0')
          ->where('status_vc','<>','2')
          ->get();
      }
      return view('nghihuu.nghihuu')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('list_vienchuc_nam_ganhuu', $list_vienchuc_nam_ganhuu)
        ->with('list_vienchuc_nu_ganhuu', $list_vienchuc_nu_ganhuu)
        ->with('list_vienchuc_nghihuu', $list_vienchuc_nghihuu)
        ->with('list_nghihuu', $list_nghihuu)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('count_nangbac', $count_nangbac)
        ->with('list_nu_nghihuu_homnay', $list_nu_nghihuu_homnay)
        ->with('list_nam_nghihuu_homnay', $list_nam_nghihuu_homnay)
        ->with('title', $title);
    }else{
      return Redirect::to('/home');
    }
  }
  public function updated_nghihuu(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $data = $request->all();
      $vienchuc = VienChuc::find($data['ma_vc']);
      $vienchuc->status_vc = '2';
      $vienchuc->thoigiannghi_vc = $data['thoigiannghi_vc'];
      $vienchuc->save();
      $khenthuong = KhenThuong::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($khenthuong as $key => $kt) {
        $kt->status_kt = '2';
        $kt->save();
      }
      $kyluat = KyLuat::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($kyluat as $key => $kl) {
        $kl->status_kl = '2';
        $kl->save();
      }
      $bangcap =  BangCap::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($bangcap as $key => $bc) {
        $bc->status_bc = '2';
        $bc->save();
      }
      $noisinh =  NoiSinh::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($noisinh as $key => $ns) {
        $ns->status_ns = '2';
        $ns->save();
      }
      $giadinh =  GiaDinh::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($giadinh as $key => $gd) {
        $gd->status_gd = '2';
        $gd->save();
      }
      $ketqua =  KetQua::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($ketqua as $key => $kq) {
        $kq->status_kq = '2';
        $kq->save();
      }
      $quyetdinh =  QuyetDinh::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($quyetdinh as $key => $qd) {
        $qd->status_qd = '2';
        $qd->save();
      }
      $giahan =  GiaHan::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($giahan as $key => $gh) {
        $gh->status_gh = '2';
        $gh->save();
      }
      $dunghoc =  DungHoc::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($dunghoc as $key => $dh) {
        $dh->status_dh = '2';
        $dh->save();
      }
      $thoihoc =  ThoiHoc::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($thoihoc as $key => $th) {
        $th->status_th = '2';
        $th->save();
      }
      $chuyen =  Chuyen::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($chuyen as $key => $c) {
        $c->status_c = '2';
        $c->save();
      }
      $quequan =  QueQuan::where('ma_vc', $data['ma_vc'])
        ->get();
      foreach ($quequan as $key => $qq) {
        $qq->status_qq = '2';
        $qq->save();
      }
      return Redirect::to('/nghihuu');
    }else{
      return Redirect::to('/home');
    }
  }
  public function nghihuu_pdf(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('status_vc', '=', '2')
        ->orderBy('khoa.ten_k', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.nghihuu_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function nghihuu_excel(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      return Excel::download(new NghiHuuExport, 'Danh-sach-vien-chuc-nghi-huu.xlsx');
    }else{
      return Redirect::to('/home');
    }
  }
}
