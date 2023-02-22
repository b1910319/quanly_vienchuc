<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\ChucVu;
use App\Models\DanToc;
use App\Models\Khoa;
use App\Models\Ngach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\ThuongBinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;

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
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý nghĩ hưu";
    if($phanquyen_admin || $phanquyen_qltt){
      $list_vienchuc_nghihuu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->orderBy('hoten_vc','asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      // $date = Carbon::parse(Carbon::now())->format('Y-m-d');
      $batdau_nam = Carbon::parse(Carbon::now()->subMonths(745))->format('Y-m-d');
      $ketthuc_nam = Carbon::parse(Carbon::now()->subMonths(744))->format('Y-m-d');
      // $ketthuc_nam = Carbon::now()->subYears(); //61 nam 11 thang
      $batdau_nu = Carbon::parse(Carbon::now()->subMonths(721))->format('Y-m-d');
      $ketthuc_nu = Carbon::parse(Carbon::now()->subMonths(720))->format('Y-m-d');

      // echo $batdau_nam.'bat dau nam';
      // echo '<br>';
      // echo $ketthuc_nam.'ketthuc nam';
      // echo '<br>';
      // echo $batdau_nu.'bat dau nu';
      // echo '<br>';
      // echo $ketthuc_nu.'ketthuc nu';

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
      $list_nu_nghihuu_homnay = VienChuc::where('ngaysinh_vc','LIKE', $ketthuc_nu)
        ->where('gioitinh_vc', '1')
        ->where('status_vc','<>','2')
        ->get();
      $list_nam_nghihuu_homnay = VienChuc::where('ngaysinh_vc','LIKE', $ketthuc_nam)
        ->where('gioitinh_vc', '0')
        ->where('status_vc','<>','2')
        ->get();
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $batdau = Carbon::parse(Carbon::now()->subMonths(2))->format('Y-m-d');
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('nghihuu.nghihuu')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
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
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      $vienchuc = VienChuc::find($data['ma_vc']);
      $vienchuc->status_vc = '2';
      $vienchuc->thoigiannghi_vc = $data['thoigiannghi_vc'];
      $vienchuc->save();
      return Redirect::to('/nghihuu');
    }else{
      return Redirect::to('/home');
    }
  }
}
