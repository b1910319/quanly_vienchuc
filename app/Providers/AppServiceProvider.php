<?php

namespace App\Providers;

use App\Models\Chuyen;
use App\Models\DungHoc;
use App\Models\GiaHan;
use App\Models\KetQua;
use App\Models\PhanQuyen;
use App\Models\ThoiHoc;
use App\Models\VienChuc;
use App\Models\DanhMucNghi;
use App\Models\LoaiBangCap;
use App\Models\HeDaoTao;
use App\Models\Ngach;
use App\Models\ChucVu;
use App\Models\Khoa;
use App\Models\Tinh;
use App\Models\DanToc;
use App\Models\TonGiao;
use App\Models\ThuongBinh;
use App\Models\LoaiKhenThuong;
use App\Models\HinhThucKhenThuong;
use App\Models\LoaiKyLuat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    $count_ketqua_an = KetQua::where('status_kq', '1')
      ->select(DB::raw('count(ma_kq) as sum'))
      ->get();
    View::share('count_ketqua_an', $count_ketqua_an);

    $count_tamdung_an = DungHoc::where('status_dh', '1')
      ->select(DB::raw('count(ma_dh) as sum'))
      ->get();
    View::share('count_tamdung_an', $count_tamdung_an);

    $count_giahan_an = GiaHan::where('status_gh', '1')
      ->select(DB::raw('count(ma_gh) as sum'))
      ->get();
    View::share('count_giahan_an', $count_giahan_an);    

    $count_chuyen_an = Chuyen::where('status_c', '1')
      ->select(DB::raw('count(ma_c) as sum'))
      ->get();
    View::share('count_chuyen_an', $count_chuyen_an);

    $count_thoihoc_an = ThoiHoc::where('status_th', '1')
      ->select(DB::raw('count(ma_th) as sum'))
      ->get();
    View::share('count_thoihoc_an', $count_thoihoc_an);

    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    View::share('phanquyen_admin', $phanquyen_admin);

    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    View::share('phanquyen_qltt', $phanquyen_qltt);

    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    View::share('phanquyen_qlk', $phanquyen_qlk);

    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    View::share('phanquyen_qlktkl', $phanquyen_qlktkl);

    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    View::share('phanquyen_qlcttc', $phanquyen_qlcttc);

    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    View::share('phanquyen_qlqtcv', $phanquyen_qlqtcv);
    
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
    $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
      ->select(DB::raw('count(ma_vc) as sum'))
      ->get();
    View::share('count_nangbac', $count_nangbac);

    $list_danhmucnghi = DanhMucNghi::orderBy('ten_dmn', 'asc')
      ->get();
    View::share('list_danhmucnghi', $list_danhmucnghi);

    $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
      ->get();
    View::share('list_loaibangcap', $list_loaibangcap);

    $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
      ->get();
    View::share('list_hedaotao', $list_hedaotao);

    $list_ngach = Ngach::orderBy('ten_n', 'asc')
      ->get();
      View::share('list_ngach', $list_ngach);

    $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
      ->get();
      View::share('list_chucvu', $list_chucvu);

    $list_khoa = Khoa::orderBy('ten_k', 'asc')
      ->get();
      View::share('list_khoa', $list_khoa);

    $list_tinh = Tinh::orderBy('ten_t', 'asc')
      ->get();
      View::share('list_tinh', $list_tinh);

    $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
      ->get();
      View::share('list_dantoc', $list_dantoc);

    $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
      ->get();
      View::share('list_tongiao', $list_tongiao);

    $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
      ->get();
    View::share('list_thuongbinh', $list_thuongbinh);

    $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
    ->get();
    View::share('list_loaikhenthuong', $list_loaikhenthuong);

    $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
      ->get();
      View::share('list_hinhthuckhenthuong', $list_hinhthuckhenthuong);

    $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
      ->get();
      View::share('list_loaikyluat', $list_loaikyluat);

  }
}
