<?php

namespace App\Providers;

use App\Models\Chuyen;
use App\Models\DungHoc;
use App\Models\GiaHan;
use App\Models\KetQua;
use App\Models\PhanQuyen;
use App\Models\ThoiHoc;
use App\Models\VienChuc;
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
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
    $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
      ->select(DB::raw('count(ma_vc) as sum'))
      ->get();
    View::share('count_nangbac', $count_nangbac);
  }
}
