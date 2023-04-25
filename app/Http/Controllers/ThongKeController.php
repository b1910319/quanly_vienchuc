<?php

namespace App\Http\Controllers;

use App\Exports\ThongKeQLTT_nghi_allExport;
use App\Exports\ThongKeQLTT_nghi_2Export;
use App\Exports\ThongKeQLTT_nghi_3Export;
use App\Exports\ThongKeQLTT_nghi_4Export;
use App\Exports\ThongKeQLTT_nghi_5Export;
use App\Exports\ThongKeQLTT_nghi_6Export;
use App\Exports\ThongKeQLTT_nghi_7Export;
use App\Exports\ThongKeQLK_KyLuat_Loc_AllExport;
use App\Exports\ThongKeQLK_KyLuat_Loc_2Export;
use App\Exports\ThongKeQLK_KyLuat_Loc_3Export;
use App\Exports\ThongKeQLK_KhenThuong_Loc_AllExport;
use App\Exports\ThongKeQLK_KhenThuong_Loc_2Export;
use App\Exports\ThongKeQLK_KhenThuong_Loc_3Export;
use App\Exports\ThongKeQLK_KhenThuong_Loc_4Export;
use App\Exports\ThongKeQLK_KhenThuong_Loc_5Export;
use App\Exports\ThongKeQLK_KhenThuong_Loc_6Export;
use App\Exports\ThongKeQLK_KhenThuong_Loc_7Export;
use App\Exports\ThongKeQLK_NghiHuu_TimeExport;
use App\Exports\ThongKeQLK_Export;
use App\Exports\ThongKeQLK_Loc_AllExport;
use App\Exports\ThongKeQLK_Loc_ChucVuExport;
use App\Exports\ThongKeQLK_Loc_HdtExport;
use App\Exports\ThongKeQLK_Loc_LbcExport;
use App\Exports\ThongKeQLK_Loc_NgachExport;
use App\Exports\ThongKeQLK_Loc_TinhExport;
use App\Exports\ThongKeQLK_Loc_DanTocExport;
use App\Exports\ThongKeQLK_Loc_TonGiaoExport;
use App\Exports\ThongKeQLK_Loc_ThuongBinhExport;
use App\Exports\ThongKeQLCTTC_ThoiHoc_Loc_AllExport;
use App\Exports\ThongKeQLCTTC_ThoiHoc_Loc_2Export;
use App\Exports\ThongKeQLCTTC_ThoiHoc_Loc_3Export;
use App\Exports\ThongKeQLCTTC_ThoiHoc_Loc_4Export;
use App\Exports\ThongKeQLCTTC_ThoiHoc_Loc_5Export;
use App\Exports\ThongKeQLCTTC_ThoiHoc_Loc_6Export;
use App\Exports\ThongKeQLCTTC_ThoiHoc_Loc_7Export;
use App\Exports\ThongKeQLCTTC_Chuyen_Loc_AllExport;
use App\Exports\ThongKeQLCTTC_Chuyen_Loc_2Export;
use App\Exports\ThongKeQLCTTC_Chuyen_Loc_3Export;
use App\Exports\ThongKeQLCTTC_Chuyen_Loc_4Export;
use App\Exports\ThongKeQLCTTC_Chuyen_Loc_5Export;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_AllExport;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_2Export;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_3Export;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_4Export;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_5Export;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_6Export;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_7Export;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_8Export;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_9Export;
use App\Exports\ThongKeQLCTTC_DungHoc_Loc_11Export;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_AllExport;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_2Export;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_3Export;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_4Export;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_5Export;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_6Export;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_7Export;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_8Export;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_9Export;
use App\Exports\ThongKeQLCTTC_GiaHan_Loc_11Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_AllExport;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_2Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_3Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_4Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_5Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_6Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_7Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_8Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_9Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_11Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_13Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_14Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_15Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_16Export;
use App\Exports\ThongKeQLCTTC_HoanThanh_Loc_17Export;
use App\Exports\ThongKeQLCTTC_loc_thoihocExport;
use App\Exports\ThongKeQLCTTC_loc_chuyenExport;
use App\Exports\ThongKeQLCTTC_loc_dunghocExport;
use App\Exports\ThongKeQLCTTC_loc_giahanExport;
use App\Exports\ThongKeQLCTTC_loc_hoanthanhExport;
use App\Exports\ThongKeQLCTTC_loc_allExport;
use App\Exports\ThongKeQLCTTC_loc_1Export;
use App\Exports\ThongKeQLKTKL_kl_7Export;
use App\Exports\ThongKeQLKTKL_kl_6Export;
use App\Exports\ThongKeQLKTKL_kl_5Export;
use App\Exports\ThongKeQLKTKL_kl_4Export;
use App\Exports\ThongKeQLKTKL_kl_3Export;
use App\Exports\ThongKeQLKTKL_kl_2Export;
use App\Exports\ThongKeQLKTKL_kl_allExport;
use App\Exports\ThongKeQLKTKL_kt_15Export;
use App\Exports\ThongKeQLKTKL_kt_14Export;
use App\Exports\ThongKeQLKTKL_kt_13Export;
use App\Exports\ThongKeQLKTKL_kt_12Export;
use App\Exports\ThongKeQLKTKL_kt_11Export;
use App\Exports\ThongKeQLKTKL_kt_10Export;
use App\Exports\ThongKeQLKTKL_kt_9Export;
use App\Exports\ThongKeQLKTKL_kt_8Export;
use App\Exports\ThongKeQLKTKL_kt_7Export;
use App\Exports\ThongKeQLKTKL_kt_6Export;
use App\Exports\ThongKeQLKTKL_kt_5Export;
use App\Exports\ThongKeQLKTKL_kt_4Export;
use App\Exports\ThongKeQLKTKL_kt_2Export;
use App\Exports\ThongKeQLKTKL_kt_3Export;
use App\Exports\ThongKeQLKTKL_kt_allExport;
use App\Exports\ThongKeQLKTKLExport;
use App\Exports\ThongKeQLQTCV_Export;
use App\Exports\ThongKeQLQTCV_1Export;
use App\Exports\ThongKeQLQTCV_2Export;
use App\Exports\ThongKeQLQTCV_3Export;
use App\Exports\ThongKeQLQTCV_4Export;
use App\Exports\ThongKeQLQTCV_5Export;
use App\Exports\ThongKeQLQTCV_6Export;
use App\Exports\ThongKeQLQTCV_7Export;
use App\Exports\ThongKeQLTT_2Export;
use App\Exports\ThongKeQLTT_3Export;
use App\Exports\ThongKeQLTT_4Export;
use App\Exports\ThongKeQLTT_allExport;
use App\Exports\ThongKeQLTT_chucvuExport;
use App\Exports\ThongKeQLTT_dantocExport;
use App\Exports\ThongKeQLTT_hdtExport;
use App\Exports\ThongKeQLTT_khoaExport;
use App\Exports\ThongKeQLTT_lbcExport;
use App\Exports\ThongKeQLTT_ngachExport;
use App\Exports\ThongKeQLTT_nghihuu_allExport;
use App\Exports\ThongKeQLTT_nghihuu_khoaExport;
use App\Exports\ThongKeQLTT_nghihuu_timeExport;
use App\Exports\ThongKeQLTT_thuongbinhExport;
use App\Exports\ThongKeQLTT_tinhExport;
use App\Exports\ThongKeQLTT_tongiaoExport;
use App\Exports\ThongKeQLTTExport;
use App\Models\ChucVu;
use App\Models\Chuyen;
use App\Models\DanToc;
use App\Models\DungHoc;
use App\Models\GiaHan;
use App\Models\HeDaoTao;
use App\Models\HinhThucKhenThuong;
use App\Models\KetQua;
use App\Models\KhenThuong;
use App\Models\Khoa;
use App\Models\DanhMucNghi;
use App\Models\KyLuat;
use App\Models\LoaiBangCap;
use App\Models\LoaiKhenThuong;
use App\Models\LoaiKyLuat;
use App\Models\Lop;
use App\Models\Ngach;
use App\Models\NhiemKy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QuaTrinhChucVu;
use App\Models\QuocGia;
use App\Models\ThoiHoc;
use App\Models\ThuongBinh;
use App\Models\Tinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use PDF;
use Excel;
use PhpOffice\PhpWord\TemplateProcessor;

class ThongKeController extends Controller
{
  public function check_login()
  {
    $ma_vc = session()->get('ma_vc');
    if ($ma_vc) {
      return Redirect::to('/home');
    } else {
      return Redirect::to('/login')->send();
    }
  }
  public function thongke_qltt()
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qltt) {
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $list_danhmucnghi = DanhMucNghi::orderBy('ten_dmn', 'asc')
        ->get();
      $count = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
        ->groupBy('khoa.ma_k')
        ->get();
      $list = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->orderBy('ten_n', 'asc')
        ->get();
      return view('thongke.thongke_qltt')
        ->with('title', $title)

        ->with('count', $count)

        ->with('list', $list)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('list_ngach', $list_ngach)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_tinh', $list_tinh)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_danhmucnghi', $list_danhmucnghi)

        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->orderBy('khoa.ten_k', 'asc')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return Excel::download(new ThongKeQLTTExport, 'Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc(Request $request)
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qltt) {
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $data = $request->all();

      if (isset($data['ma_k'])  && isset($data['ma_cv'])  && isset($data['ma_hdt'])  && isset($data['ma_lbc'])  && isset($data['ma_n'])  && isset($data['ma_t']) && isset($data['ma_dt'])  && isset($data['ma_tg'])  && isset($data['ma_tb'])) {
        $count = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
          ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
          ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
          ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
          ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('vienchuc.ma_cv', $data['ma_cv'])
          ->where('bangcap.ma_hdt', $data['ma_hdt'])
          ->where('bangcap.ma_lbc', $data['ma_lbc'])
          ->where('vienchuc.ma_n', $data['ma_n'])
          ->where('quequan.ma_t', $data['ma_t'])
          ->where('vienchuc.ma_dt', $data['ma_dt'])
          ->where('vienchuc.ma_tg', $data['ma_tg'])
          ->where('vienchuc.ma_tb', $data['ma_tb'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count', $count)

          ->with('list_all', $list_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_cv', $data['ma_cv'])
          ->with('ma_hdt', $data['ma_hdt'])
          ->with('ma_lbc', $data['ma_lbc'])
          ->with('ma_n', $data['ma_n'])
          ->with('ma_t', $data['ma_t'])
          ->with('ma_dt', $data['ma_dt'])
          ->with('ma_tg', $data['ma_tg'])
          ->with('ma_tb', $data['ma_tb'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k']) && isset($data['ma_cv'])) {
        $count = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('vienchuc.ma_cv', $data['ma_cv'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count', $count)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_2', $list_2)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_cv', $data['ma_cv'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_hdt'])) {
        $count_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('bangcap.ma_hdt', $data['ma_hdt'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_3', $count_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_3', $list_3)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_hdt', $data['ma_hdt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_lbc'])) {
        $count_4 = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaibangcap.ma_lbc'))
          ->groupBy('loaibangcap.ma_lbc')
          ->get();
        $list_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('bangcap.ma_lbc', $data['ma_lbc'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_4', $count_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_4', $list_4)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_lbc', $data['ma_lbc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_khoa = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_pdf_khoa = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_khoa', $count_khoa)

          ->with('list_pdf_khoa', $list_pdf_khoa)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_cv'])) {
        $count_chucvu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_cv'))
          ->groupBy('vienchuc.ma_cv')
          ->get();
        $list_pdf_chucvu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_cv', $data['ma_cv'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_chucvu', $count_chucvu)

          ->with('list_pdf_chucvu', $list_pdf_chucvu)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)

          ->with('ma_cv', $data['ma_cv'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_hdt'])) {
        $count_hedaotao = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, hedaotao.ma_hdt'))
          ->groupBy('hedaotao.ma_hdt')
          ->get();
        $list_pdf_hdt = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('bangcap.ma_hdt', $data['ma_hdt'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_hedaotao', $count_hedaotao)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_pdf_hdt', $list_pdf_hdt)

          ->with('ma_hdt', $data['ma_hdt'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lbc'])) {
        $count_loaibangcap = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaibangcap.ma_lbc'))
          ->groupBy('loaibangcap.ma_lbc')
          ->get();
        $list_pdf_lbc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('bangcap.ma_lbc', $data['ma_lbc'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_loaibangcap', $count_loaibangcap)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_pdf_lbc', $list_pdf_lbc)

          ->with('ma_lbc', $data['ma_lbc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_n'])) {
        $count_ngach = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_n'))
          ->groupBy('vienchuc.ma_n')
          ->get();
        $list_pdf_ngach = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_n', $data['ma_n'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_ngach', $count_ngach)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_ngach', $list_pdf_ngach)

          ->with('ma_n', $data['ma_n'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_t'])) {
        $count_tinh = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, tinh.ma_t'))
          ->groupBy('tinh.ma_t')
          ->get();
        $list_pdf_tinh = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('quequan.ma_t', $data['ma_t'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_tinh', $count_tinh)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_pdf_tinh', $list_pdf_tinh)

          ->with('ma_t', $data['ma_t'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_dt'])) {
        $count_dantoc = VienChuc::join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_dt'))
          ->groupBy('vienchuc.ma_dt')
          ->get();
        $list_pdf_dantoc = VienChuc::join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_dt', $data['ma_dt'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_dantoc', $count_dantoc)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_dantoc', $list_pdf_dantoc)

          ->with('ma_dt', $data['ma_dt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_tg'])) {
        $count_tongiao = VienChuc::join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_tg'))
          ->groupBy('vienchuc.ma_tg')
          ->get();
        $list_pdf_tongiao = VienChuc::join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_tg', $data['ma_tg'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_tongiao', $count_tongiao)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_tongiao', $list_pdf_tongiao)

          ->with('ma_tg', $data['ma_tg'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_tb'])) {
        $count_thuongbinh = VienChuc::join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_tb'))
          ->groupBy('vienchuc.ma_tb')
          ->get();
        $list_pdf_thuongbinh = VienChuc::join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_tb', $data['ma_tb'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_thuongbinh', $count_thuongbinh)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_thuongbinh', $list_pdf_thuongbinh)

          ->with('ma_tb', $data['ma_tb'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_all_pdf($ma_k, $ma_cv, $ma_hdt, $ma_lbc, $ma_n, $ma_t, $ma_dt, $ma_tg, $ma_tb)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', 'bangcap.ma_hdt')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('vienchuc.ma_cv', $ma_cv)
        ->where('bangcap.ma_hdt', $ma_hdt)
        ->where('bangcap.ma_lbc', $ma_lbc)
        ->where('vienchuc.ma_n', $ma_n)
        ->where('quequan.ma_t', $ma_t)
        ->where('vienchuc.ma_dt', $ma_dt)
        ->where('vienchuc.ma_tg', $ma_tg)
        ->where('vienchuc.ma_tb', $ma_tb)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_all_excel($ma_k, $ma_cv, $ma_hdt, $ma_lbc, $ma_n, $ma_t, $ma_dt, $ma_tg, $ma_tb)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_allExport($ma_k, $ma_cv, $ma_hdt, $ma_lbc, $ma_n, $ma_t, $ma_dt, $ma_tg, $ma_tb))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_2_pdf($ma_k, $ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('vienchuc.ma_cv', $ma_cv)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_2_excel($ma_k, $ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_2Export($ma_k, $ma_cv))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_3_pdf($ma_k, $ma_hdt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('bangcap.ma_hdt', $ma_hdt)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_3_excel($ma_k, $ma_hdt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_3Export($ma_k, $ma_hdt))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_4_pdf($ma_k, $ma_lbc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('bangcap.ma_lbc', $ma_lbc)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_4_excel($ma_k, $ma_lbc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_4Export($ma_k, $ma_lbc))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_khoa_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_khoa_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_khoaExport($ma_k))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_chucvu_pdf($ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('vienchuc.ma_cv', $ma_cv)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_chucvu_excel($ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_chucvuExport($ma_cv))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_hdt_pdf($ma_hdt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', 'bangcap.ma_hdt')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('bangcap.ma_hdt', $ma_hdt)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_hdt_excel($ma_hdt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_hdtExport($ma_hdt))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_lbc_pdf($ma_lbc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', 'bangcap.ma_lbc')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('bangcap.ma_lbc', $ma_lbc)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_lbc_excel($ma_hdt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_lbcExport($ma_hdt))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_ngach_pdf($ma_n)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->where('vienchuc.ma_n', $ma_n)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_ngach_excel($ma_n)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_ngachExport($ma_n))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_tinh_pdf($ma_t)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('tinh', 'tinh.ma_t', 'quequan.ma_t')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('quequan.ma_t', $ma_t)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_tinh_excel($ma_t)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_tinhExport($ma_t))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_dantoc_pdf($ma_dt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->where('vienchuc.ma_dt', $ma_dt)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_dantoc_excel($ma_dt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_dantocExport($ma_dt))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_tongiao_pdf($ma_tg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->where('vienchuc.ma_tg', $ma_tg)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_tongiao_excel($ma_tg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_tongiaoExport($ma_tg))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_thuongbinh_pdf($ma_tb)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
        ->where('vienchuc.ma_tb', $ma_tb)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_thuongbinh_excel($ma_tb)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_thuongbinhExport($ma_tb))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_nghihuu_loc(Request $request){
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qltt) {
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $data = $request->all();
      if (isset($data['ma_k'])  && isset($data['batdau'])  && isset($data['ketthuc'])) {
        $count_nghihuu_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('vienchuc.thoigiannghi_vc', [$data['batdau'], $data['ketthuc']])
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k, vienchuc.thoigiannghi_vc'))
          ->groupBy('khoa.ma_k', 'vienchuc.thoigiannghi_vc')
          ->get();
        $list_nghihuu_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('vienchuc.thoigiannghi_vc', [$data['batdau'], $data['ketthuc']])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nghihuu_all', $count_nghihuu_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghihuu_all', $list_nghihuu_all)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_nghihuu_khoa = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k, vienchuc.thoigiannghi_vc'))
          ->groupBy('khoa.ma_k', 'vienchuc.thoigiannghi_vc')
          ->get();
        $list_nghihuu_khoa = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nghihuu_khoa', $count_nghihuu_khoa)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghihuu_khoa', $list_nghihuu_khoa)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau']) && isset($data['ketthuc'])) {
        $count_nghihuu_time = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k, vienchuc.thoigiannghi_vc'))
          ->groupBy('khoa.ma_k', 'vienchuc.thoigiannghi_vc')
          ->get();
        $list_nghihuu_time = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->whereBetween('vienchuc.thoigiannghi_vc', [$data['batdau'], $data['ketthuc']])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nghihuu_time', $count_nghihuu_time)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghihuu_time', $list_nghihuu_time)

          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_nghihuu_all_pdf($ma_k, $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('vienchuc.thoigiannghi_vc', [$batdau, $ketthuc])
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_nghihuu_all_excel($ma_k, $batdau, $ketthuc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_nghihuu_allExport($ma_k, $batdau, $ketthuc))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_nghihuu_khoa_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->where('vienchuc.ma_k', $ma_k)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_nghihuu_khoa_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_nghihuu_khoaExport($ma_k))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_nghihuu_time_pdf($batdau, $ketthuc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->whereBetween('vienchuc.thoigiannghi_vc', [$batdau, $ketthuc])
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qltt_loc_nghihuu_time_excel($batdau, $ketthuc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_nghihuu_timeExport($batdau, $ketthuc))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_nghi_loc(Request $request){
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qltt) {
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $list_danhmucnghi = DanhMucNghi::orderBy('ten_dmn', 'asc')
        ->get();
      $data = $request->all();
      if (isset($data['ma_dmn']) && isset($data['ma_k']) &&  isset($data['batdau'])  && isset($data['ketthuc'])) {
        $count_nghi_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->select(DB::raw('count(quatrinhnghi.ma_vc) as sum, danhmucnghi.ma_dmn'))
          ->groupBy('danhmucnghi.ma_dmn')
          ->get();
        $list_nghi_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->where('danhmucnghi.ma_dmn', $data['ma_dmn'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('quatrinhnghi.batdau_qtn', [$data['batdau'], $data['ketthuc']])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nghi_all', $count_nghi_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghi_all', $list_nghi_all)
          ->with('list_danhmucnghi', $list_danhmucnghi)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_dmn', $data['ma_dmn'])
          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }else if (isset($data['ma_dmn']) && isset($data['ma_k'])) {
        $count_nghi_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->select(DB::raw('count(quatrinhnghi.ma_vc) as sum, danhmucnghi.ma_dmn'))
          ->groupBy('danhmucnghi.ma_dmn')
          ->get();
        $list_nghi_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->where('danhmucnghi.ma_dmn', $data['ma_dmn'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nghi_2', $count_nghi_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghi_2', $list_nghi_2)
          ->with('list_danhmucnghi', $list_danhmucnghi)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_dmn', $data['ma_dmn'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }else if (isset($data['ma_dmn']) &&  isset($data['batdau'])  && isset($data['ketthuc'])) {
        $count_nghi_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->select(DB::raw('count(quatrinhnghi.ma_vc) as sum, quatrinhnghi.batdau_qtn'))
          ->groupBy('quatrinhnghi.batdau_qtn')
          ->get();
        $list_nghi_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->where('danhmucnghi.ma_dmn', $data['ma_dmn'])
          ->whereBetween('quatrinhnghi.batdau_qtn', [$data['batdau'], $data['ketthuc']])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nghi_3', $count_nghi_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghi_3', $list_nghi_3)
          ->with('list_danhmucnghi', $list_danhmucnghi)

          ->with('ma_dmn', $data['ma_dmn'])
          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }else if (isset($data['ma_k']) &&  isset($data['batdau'])  && isset($data['ketthuc'])) {
        $count_nghi_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->select(DB::raw('count(quatrinhnghi.ma_vc) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_nghi_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('quatrinhnghi.batdau_qtn', [$data['batdau'], $data['ketthuc']])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nghi_4', $count_nghi_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghi_4', $list_nghi_4)
          ->with('list_danhmucnghi', $list_danhmucnghi)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }else if (isset($data['ma_dmn'])) {
        $count_nghi_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->select(DB::raw('count(quatrinhnghi.ma_vc) as sum, danhmucnghi.ma_dmn'))
          ->groupBy('danhmucnghi.ma_dmn')
          ->get();
        $list_nghi_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
          ->where('danhmucnghi.ma_dmn', $data['ma_dmn'])
          ->get();
        return view('thongke.thongke_qltt')
          ->with('title', $title)

          ->with('count_nghi_5', $count_nghi_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghi_5', $list_nghi_5)
          ->with('list_danhmucnghi', $list_danhmucnghi)

          ->with('ma_dmn', $data['ma_dmn'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }

  }

  public function thongke_qltt_loc_nghi_all_pdf($ma_dmn, $ma_k, $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
        ->where('danhmucnghi.ma_dmn', $ma_dmn)
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('quatrinhnghi.batdau_qtn', [$batdau, $ketthuc])
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_nghi_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }}
  public function thongke_qltt_loc_nghi_all_excel($ma_dmn, $ma_k, $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_nghi_allExport($ma_dmn, $ma_k, $batdau, $ketthuc))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_nghi_2_pdf($ma_dmn, $ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
        ->where('danhmucnghi.ma_dmn', $ma_dmn)
        ->where('vienchuc.ma_k', $ma_k)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_nghi_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }}
  public function thongke_qltt_loc_nghi_2_excel($ma_dmn, $ma_k){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_nghi_2Export($ma_dmn, $ma_k))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_nghi_3_pdf($ma_dmn, $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
        ->where('danhmucnghi.ma_dmn', $ma_dmn)
        ->whereBetween('quatrinhnghi.batdau_qtn', [$batdau, $ketthuc])
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_nghi_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }}
  public function thongke_qltt_loc_nghi_3_excel($ma_dmn, $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_nghi_3Export($ma_dmn, $batdau, $ketthuc))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltt_loc_nghi_4_pdf( $ma_k, $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('quatrinhnghi.batdau_qtn', [$batdau, $ketthuc])
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_nghi_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }}
  public function thongke_qltt_loc_nghi_4_excel( $ma_k, $batdau, $ketthuc){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_nghi_4Export( $ma_k, $batdau, $ketthuc))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

    public function thongke_qltt_loc_nghi_5_pdf($ma_dmn){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
        ->where('danhmucnghi.ma_dmn', $ma_dmn)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_nghi_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }}
  public function thongke_qltt_loc_nghi_5_excel($ma_dmn){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if ($phanquyen_admin || $phanquyen_qltt) {
      return (new ThongKeQLTT_nghi_5Export($ma_dmn))->download('Danh-sach-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }


  // ----------------------------------------------------------

  public function thongke_qlktkl()
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('status_kt', '<>', '2')
        ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
        ->groupBy('loaikhenthuong.ma_lkt')
        ->get();
      $list_pdf_lkt = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('status_kt', '<>', '2')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::orderBy('ten_htkt', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      return view('thongke.thongke_qlktkl')
        ->with('title', $title)

        ->with('count_loaikhenthuong', $count_loaikhenthuong)

        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaikyluat', $list_loaikyluat)
        ->with('list_pdf_lkt', $list_pdf_lkt)
        ->with('list_vienchuc', $list_vienchuc)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlklkt_kt_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlklkt_kt_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKLExport, 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltktkl_kt_loc(Request $request)
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $data = $request->all();
      if (isset($data['ma_lkt'])  && isset($data['ma_k'])  && isset($data['ma_htkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
          ->groupBy('loaikhenthuong.ma_lkt')
          ->get();
        $list_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_all', $list_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_k', $data['ma_k'])
          ->with('ma_htkt', $data['ma_htkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_htkt'])  && isset($data['ma_k'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
          ->groupBy('loaikhenthuong.ma_lkt')
          ->get();
        $list_15 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_15', $list_15)

          ->with('ma_htkt', $data['ma_htkt'])
          ->with('ma_k', $data['ma_k'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])  && isset($data['ma_htkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
          ->groupBy('loaikhenthuong.ma_lkt')
          ->get();
        $list_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_2', $list_2)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_htkt', $data['ma_htkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])  && isset($data['ma_k'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
          ->groupBy('loaikhenthuong.ma_lkt')
          ->get();
        $list_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_3', $list_3)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_k', $data['ma_k'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])  && isset($data['ma_k'])  && isset($data['ma_htkt'])) {
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
          ->groupBy('loaikhenthuong.ma_lkt')
          ->get();
        $list_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_4', $list_4)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_k', $data['ma_k'])
          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_htkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_5 = KhenThuong::join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, hinhthuckhenthuong.ma_htkt, ngay_kt'))
          ->groupBy('hinhthuckhenthuong.ma_htkt', 'ngay_kt')
          ->get();
        $list_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('hinhthuckhenthuong.ma_htkt', $data['ma_htkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_5', $count_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_5', $list_5)

          ->with('ma_htkt', $data['ma_htkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, vienchuc.ma_k, ngay_kt'))
          ->groupBy('vienchuc.ma_k', 'ngay_kt')
          ->get();
        $list_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khoa.ma_k', $data['ma_k'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_6', $count_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_6', $list_6)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_htkt'])) {
        $count_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_7', $count_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_7', $list_7)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_8 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt, ngay_kt'))
          ->groupBy('khenthuong.ma_lkt', 'ngay_kt')
          ->get();
        $list_8 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_8', $count_8)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_8', $list_8)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])  && isset($data['ma_htkt'])) {
        $count_9 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt'))
          ->groupBy('khenthuong.ma_lkt')
          ->get();
        $list_9 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_9', $count_9)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_9', $list_9)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])  && isset($data['ma_k'])) {
        $count_10 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt'))
          ->groupBy('khenthuong.ma_lkt')
          ->get();
        $list_10 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_10', $count_10)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_10', $list_10)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])) {
        $count_11 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt'))
          ->groupBy('khenthuong.ma_lkt')
          ->get();
        $list_11 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_11', $count_11)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_11', $list_11)

          ->with('ma_lkt', $data['ma_lkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_12 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, vienchuc.ma_k'))
          ->groupBy('vienchuc.ma_k')
          ->get();
        $list_12 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_12', $count_12)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_12', $list_12)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_htkt'])) {
        $count_13 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_htkt'))
          ->groupBy('khenthuong.ma_htkt')
          ->get();
        $list_13 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_13', $count_13)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_13', $list_13)

          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_14 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, ngay_kt'))
          ->groupBy('ngay_kt')
          ->get();
        $list_14 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_14', $count_14)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_14', $list_14)

          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_all_pdf($ma_lkt, $ma_k, $ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_all_excel($ma_lkt, $ma_k, $ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_allExport($ma_lkt, $ma_k, $ma_htkt, $batdau_kt, $ketthuc_kt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_2_pdf($ma_lkt, $ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_2_excel($ma_lkt, $ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_2Export($ma_lkt, $ma_htkt, $batdau_kt, $ketthuc_kt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_3_pdf($ma_lkt, $ma_k, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_3_excel($ma_lkt, $ma_k, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_3Export($ma_lkt, $ma_k, $batdau_kt, $ketthuc_kt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_4_pdf($ma_lkt, $ma_k, $ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('hinhthuckhenthuong.ma_htkt', $ma_htkt)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_4_excel($ma_lkt, $ma_k, $ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_4Export($ma_lkt, $ma_k, $ma_htkt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_5_pdf($ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_5_excel($ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_5Export($ma_htkt, $batdau_kt, $ketthuc_kt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_6_pdf($ma_k, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_6_excel($ma_k, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_6Export($ma_k, $batdau_kt, $ketthuc_kt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_7_pdf($ma_k, $ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('hinhthuckhenthuong.ma_htkt', $ma_htkt)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_7_excel($ma_k, $ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_7Export($ma_k, $ma_htkt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_8_pdf($ma_lkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_8_excel($ma_lkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_8Export($ma_lkt, $batdau_kt, $ketthuc_kt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_9_pdf($ma_lkt, $ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('hinhthuckhenthuong.ma_htkt', $ma_htkt)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_9_excel($ma_lkt, $ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_9Export($ma_lkt, $ma_htkt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_10_pdf($ma_lkt, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_10_excel($ma_lkt, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_10Export($ma_lkt, $ma_k), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_11_pdf($ma_lkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_11_excel($ma_lkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_11Export($ma_lkt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_12_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_12_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_12Export($ma_k), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_13_pdf($ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_13_excel($ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_13Export($ma_htkt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_14_pdf($batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_14_excel($batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_14Export($batdau_kt, $ketthuc_kt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kt_loc_15_pdf($ma_htkt, $ma_k, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kt_loc_15_excel($ma_htkt, $ma_k, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kt_15Export($ma_htkt, $ma_k, $batdau_kt, $ketthuc_kt), 'Khen-thuong-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qltktkl_kl_loc(Request $request)
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $data = $request->all();
      if (isset($data['ma_lkl'])  && isset($data['ma_k']) && isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])) {
        $count_kl_all = KyLuat::join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl'))
          ->groupBy('loaikyluat.ma_lkl')
          ->get();
        $list_kl_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_kl_all', $count_kl_all)

          ->with('list_kl_all', $list_kl_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_lkl', $data['ma_lkl'])
          ->with('ma_k', $data['ma_k'])
          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k']) && isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])) {
        $count_kl_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, khoa.ma_k, ngay_kl'))
          ->groupBy('khoa.ma_k', 'ngay_kl')
          ->get();
        $list_kl_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_kl_2', $count_kl_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_2', $list_kl_2)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkl']) && isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])) {
        $count_kl_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl, ngay_kl'))
          ->groupBy('loaikyluat.ma_lkl', 'ngay_kl')
          ->get();
        $list_kl_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_kl_3', $count_kl_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_3', $list_kl_3)

          ->with('ma_lkl', $data['ma_lkl'])
          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkl']) && isset($data['ma_k'])) {
        $count_kl_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl'))
          ->groupBy('loaikyluat.ma_lkl')
          ->get();
        $list_kl_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_kl_4', $count_kl_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_4', $list_kl_4)

          ->with('ma_lkl', $data['ma_lkl'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_kl_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_kl_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('vienchuc.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_kl_5', $count_kl_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_5', $list_kl_5)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkl'])) {
        $count_kl_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl'))
          ->groupBy('loaikyluat.ma_lkl')
          ->get();
        $list_kl_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_kl_6', $count_kl_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_6', $list_kl_6)

          ->with('ma_lkl', $data['ma_lkl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])) {
        $count_kl_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, ngay_kl'))
          ->groupBy('ngay_kl')
          ->get();
        $list_kl_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlktkl')
          ->with('title', $title)

          ->with('count_kl_7', $count_kl_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_kl_7', $list_kl_7)

          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kl_loc_all_pdf($ma_lkl, $ma_k, $batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_all_excel($ma_lkl, $ma_k, $batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kl_allExport($ma_lkl, $ma_k, $batdau_kl, $ketthuc_kl), 'Ky-luat-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kl_loc_2_pdf($ma_k, $batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_2_excel($ma_k, $batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kl_2Export($ma_k, $batdau_kl, $ketthuc_kl), 'Ky-luat-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kl_loc_3_pdf($ma_lkl, $batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_3_excel($ma_lkl, $batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kl_3Export($ma_lkl, $batdau_kl, $ketthuc_kl), 'Ky-luat-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kl_loc_4_pdf($ma_lkl, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_4_excel($ma_lkl, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kl_4Export($ma_lkl, $ma_k), 'Ky-luat-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kl_loc_5_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_5_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kl_5Export($ma_k), 'Ky-luat-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kl_loc_6_pdf($ma_lkl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_6_excel($ma_lkl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kl_6Export($ma_lkl), 'Ky-luat-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlktkl_kl_loc_7_pdf($batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlklkt_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_kl_loc_7_excel($batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlktkl) {
      return Excel::download(new ThongKeQLKTKL_kl_7Export($batdau_kl, $ketthuc_kl), 'Ky-luat-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }


  // ----------------------------------------------------------

  public function thongke_qlcttc()
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $count_1 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
        ->groupBy('lop.ma_l')
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $list_quocgia = QuocGia::where('status_qg', '<>', '1')
        ->get();
      $list_1 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kq', '<>', '2')
        ->get();
      return view('thongke.thongke_qlcttc')
        ->with('title', $title)

        ->with('count_1', $count_1)

        ->with('list_lop', $list_lop)
        ->with('list_khoa', $list_khoa)
        ->with('list_quocgia', $list_quocgia)
        ->with('list_1', $list_1)
        ->with('list_vienchuc', $list_vienchuc)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_1_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kq', '<>', '2')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_1_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_loc_1Export(), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc(Request $request)
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $list_quocgia = QuocGia::where('status_qg', '<>', '1')
        ->get();
      $data = $request->all();
      if (isset($data['hoanthanh'])  && isset($data['giahan'])  && isset($data['tamdung'])  && isset($data['xinchuyen'])  && isset($data['thoihoc'])) {
        $count_1 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_all = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('status_kq', '<>', '2')
          ->where('status_gh', '<>', '2')
          ->where('status_dh', '<>', '2')
          ->where('status_c', '<>', '2')
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_1', $count_1)

          ->with('list_all', $list_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_vienchuc', $list_vienchuc)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['hoanthanh'])) {
        $count_hoanthanh =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_hoanthanh = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kq', '<>', '2')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh', $count_hoanthanh)

          ->with('list_khoa', $list_khoa)
          ->with('list_lop', $list_lop)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh', $list_hoanthanh)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['giahan'])) {
        $count_giahan =  GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->where('status_gh', '<>', '2')
          ->select(DB::raw('count(giahan.ma_gh) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_giahan = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan', $count_giahan)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan', $list_giahan)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['tamdung'])) {
        $count_dunghoc =  DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_dunghoc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc', $count_dunghoc)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc', $list_dunghoc)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['xinchuyen'])) {
        $count_chuyen =  Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->where('status_c', '<>', '2')
          ->select(DB::raw('count(chuyen.ma_c) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_chuyen = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_chuyen', $count_chuyen)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_chuyen', $list_chuyen)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['thoihoc'])) {
        $count_thoihoc =  ThoiHoc::join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->where('status_th', '<>', '2')
          ->select(DB::raw('count(thoihoc.ma_th) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_thoihoc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_thoihoc', $count_thoihoc)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_thoihoc', $list_thoihoc)

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_all_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học, gia hạn, xin tạm dừng, xin chuyển nước, trường, ngành học, xin thôi học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->where('status_kq', '<>', '2')
        ->where('status_gh', '<>', '2')
        ->where('status_dh', '<>', '2')
        ->where('status_c', '<>', '2')
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlktkl_loc_all_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_loc_allExport(), 'Vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_loc_hoanthanh_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_hoanthanh_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_loc_hoanthanhExport(), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_loc_giahan_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn khoá học';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_giahan_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_loc_giahanExport(), 'Vien-chuc-giahan-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_loc_dunghoc_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin tạm dừng khoá học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_dunghoc_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_loc_dunghocExport(), 'Vien-chuc-xin-tam-dung-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_loc_chuyen_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin tạm dừng khoá học';
      $vienchuc = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_c', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_chuyen', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_chuyen_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_loc_chuyenExport(), 'Vien-chuc-xin-chuyen-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_loc_thoihoc_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin thôi học';
      $vienchuc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_loc_thoihoc_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_loc_thoihocExport(), 'Vien-chuc-thoi-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc(Request $request)
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $list_quocgia = QuocGia::where('status_qg', '<>', '1')
        ->get();
      $data = $request->all();

      if (isset($data['ma_l'])  && isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang'])  && isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc'])) {
        $count_hoanthanh_all =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_hoanthanh_all = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_all', $count_hoanthanh_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_all', $list_hoanthanh_all)

          ->with('ma_l', $data['ma_l'])
          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])
          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l'])  && isset($data['ma_k'])) {
        $count_hoanthanh_11 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_hoanthanh_11 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('lop.ma_l', $data['ma_l'])
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('status_kq', '<>', '2')
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_11', $count_hoanthanh_11)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_11', $list_hoanthanh_11)

          ->with('ma_l', $data['ma_l'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang'])  && isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc'])) {
        $count_hoanthanh_2 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, ketqua.ngaycapbang_kq'))
          ->groupBy('ketqua.ngaycapbang_kq')
          ->get();
        $list_hoanthanh_2 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_2', $count_hoanthanh_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_2', $list_hoanthanh_2)

          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])
          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l']) && isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc'])) {
        $count_hoanthanh_3 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l, ketqua.ngayvenuoc_kq'))
          ->groupBy('lop.ma_l', 'ketqua.ngayvenuoc_kq')
          ->get();
        $list_hoanthanh_3 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_3', $count_hoanthanh_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_3', $list_hoanthanh_3)

          ->with('ma_l', $data['ma_l'])
          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l']) && isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang'])) {
        $count_hoanthanh_4 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l, ketqua.ngaycapbang_kq'))
          ->groupBy('lop.ma_l', 'ketqua.ngaycapbang_kq')
          ->get();
        $list_hoanthanh_4 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_4', $count_hoanthanh_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_4', $list_hoanthanh_4)

          ->with('ma_l', $data['ma_l'])
          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang']) && isset($data['ma_k'])) {
        $count_hoanthanh_13 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, ketqua.ngaycapbang_kq'))
          ->groupBy('ketqua.ngaycapbang_kq')
          ->get();
        $list_hoanthanh_13 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_kq', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_13', $count_hoanthanh_13)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_13', $list_hoanthanh_13)

          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang']) && isset($data['ma_qg'])) {
        $count_hoanthanh_14 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, quocgia.ma_qg'))
          ->groupBy('quocgia.ma_qg')
          ->get();
        $list_hoanthanh_14 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->where('status_kq', '<>', '2')
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_14', $count_hoanthanh_14)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_14', $list_hoanthanh_14)

          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])
          ->with('ma_qg', $data['ma_qg'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc']) && isset($data['ma_k'])) {
        $count_hoanthanh_15 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, ketqua.ngayvenuoc_kq'))
          ->groupBy('ketqua.ngayvenuoc_kq')
          ->get();
        $list_hoanthanh_15 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_kq', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_15', $count_hoanthanh_15)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_15', $list_hoanthanh_15)

          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc']) && isset($data['ma_qg'])) {
        $count_hoanthanh_16 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, ketqua.ngayvenuoc_kq'))
          ->groupBy('ketqua.ngayvenuoc_kq')
          ->get();
        $list_hoanthanh_16 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->where('status_kq', '<>', '2')
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_16', $count_hoanthanh_16)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_16', $list_hoanthanh_16)

          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])
          ->with('ma_qg', $data['ma_qg'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_qg'])) {
        $count_hoanthanh_17 =  VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_hoanthanh_17 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->where('lop.ma_qg', $data['ma_qg'])
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('status_kq', '<>', '2')
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_17', $count_hoanthanh_17)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_17', $list_hoanthanh_17)

          ->with('ma_qg', $data['ma_qg'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l'])) {
        $count_hoanthanh_5 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, lop.ma_l, lop.ma_l'))
          ->groupBy('lop.ma_l', 'lop.ma_l')
          ->get();
        $list_hoanthanh_5 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_5', $count_hoanthanh_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_5', $list_hoanthanh_5)

          ->with('ma_l', $data['ma_l'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_capbang'])  && isset($data['ketthuc_capbang'])) {
        $count_hoanthanh_6 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, ketqua.ngaycapbang_kq'))
          ->groupBy('ketqua.ngaycapbang_kq')
          ->get();
        $list_hoanthanh_6 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->whereBetween('ketqua.ngaycapbang_kq', [$data['batdau_capbang'], $data['ketthuc_capbang']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_6', $count_hoanthanh_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_6', $list_hoanthanh_6)

          ->with('batdau_capbang', $data['batdau_capbang'])
          ->with('ketthuc_capbang', $data['ketthuc_capbang'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_venuoc'])  && isset($data['ketthuc_venuoc'])) {
        $count_hoanthanh_7 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, ketqua.ngayvenuoc_kq'))
          ->groupBy('ketqua.ngayvenuoc_kq')
          ->get();
        $list_hoanthanh_7 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->where('status_kq', '<>', '2')
          ->whereBetween('ketqua.ngayvenuoc_kq', [$data['batdau_venuoc'], $data['ketthuc_venuoc']])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_7', $count_hoanthanh_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_7', $list_hoanthanh_7)

          ->with('batdau_venuoc', $data['batdau_venuoc'])
          ->with('ketthuc_venuoc', $data['ketthuc_venuoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_hoanthanh_8 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_hoanthanh_8 = KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_kq', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_8', $count_hoanthanh_8)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_8', $list_hoanthanh_8)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_qg'])) {
        $count_hoanthanh_9 =  KetQua::join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->where('status_kq', '<>', '2')
          ->select(DB::raw('count(ketqua.ma_kq) as sum, quocgia.ma_qg'))
          ->groupBy('quocgia.ma_qg')
          ->get();
        $list_hoanthanh_9 = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->where('status_kq', '<>', '2')
          ->where('lop.ma_qg', $data['ma_qg'])
          ->where('status_kq', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_hoanthanh_9', $count_hoanthanh_9)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_hoanthanh_9', $list_hoanthanh_9)

          ->with('ma_qg', $data['ma_qg'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_all_pdf($ma_l, $batdau_capbang, $ketthuc_capbang, $batdau_venuoc, $ketthuc_venuoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_all_excel($ma_l, $batdau_capbang, $ketthuc_capbang, $batdau_venuoc, $ketthuc_venuoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_AllExport($ma_l, $batdau_capbang, $ketthuc_capbang, $batdau_venuoc, $ketthuc_venuoc), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_2_pdf($batdau_capbang, $ketthuc_capbang, $batdau_venuoc, $ketthuc_venuoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_2_excel($batdau_capbang, $ketthuc_capbang, $batdau_venuoc, $ketthuc_venuoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_2Export($batdau_capbang, $ketthuc_capbang, $batdau_venuoc, $ketthuc_venuoc), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_3_pdf($ma_l,  $batdau_venuoc, $ketthuc_venuoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_3_excel($ma_l,  $batdau_venuoc, $ketthuc_venuoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_3Export($ma_l,  $batdau_venuoc, $ketthuc_venuoc), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_4_pdf($ma_l, $batdau_capbang, $ketthuc_capbang)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_4_excel($ma_l, $batdau_capbang, $ketthuc_capbang)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_4Export($ma_l, $batdau_capbang, $ketthuc_capbang), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_5_pdf($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_5_excel($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_5Export($ma_l), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_6_pdf($batdau_capbang, $ketthuc_capbang)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_6_excel($batdau_capbang, $ketthuc_capbang)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_6Export($batdau_capbang, $ketthuc_capbang), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_7_pdf($batdau_venuoc, $ketthuc_venuoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->where('status_kq', '<>', '2')
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_7_excel($batdau_venuoc, $ketthuc_venuoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_7Export($batdau_venuoc, $ketthuc_venuoc), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_8_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_kq', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_8_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_8Export($ma_k), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_9_pdf($ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->where('status_kq', '<>', '2')
        ->where('lop.ma_qg', $ma_qg)
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_9_excel($ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_9Export($ma_qg), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_11_pdf($ma_l, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('lop.ma_l', $ma_l)
        ->where('khoa.ma_k', $ma_k)
        ->where('status_kq', '<>', '2')
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_11_excel($ma_l, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_11Export($ma_l, $ma_k), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_13_pdf($batdau_capbang, $ketthuc_capbang, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_kq', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_13_excel($batdau_capbang, $ketthuc_capbang, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_13Export($batdau_capbang, $ketthuc_capbang, $ma_k), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_14_pdf($batdau_capbang, $ketthuc_capbang, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->where('status_kq', '<>', '2')
        ->where('quocgia.ma_qg', $ma_qg)
        ->whereBetween('ketqua.ngaycapbang_kq', [$batdau_capbang, $ketthuc_capbang])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_14_excel($batdau_capbang, $ketthuc_capbang, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_14Export($batdau_capbang, $ketthuc_capbang, $ma_qg), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_15_pdf($batdau_venuoc, $ketthuc_venuoc, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_kq', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_15_excel($batdau_venuoc, $ketthuc_venuoc, $ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_15Export($batdau_venuoc, $ketthuc_venuoc, $ma_k), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_16_pdf($batdau_venuoc, $ketthuc_venuoc, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->where('status_kq', '<>', '2')
        ->where('quocgia.ma_qg', $ma_qg)
        ->whereBetween('ketqua.ngayvenuoc_kq', [$batdau_venuoc, $ketthuc_venuoc])
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_16_excel($batdau_venuoc, $ketthuc_venuoc, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_16Export($batdau_venuoc, $ketthuc_venuoc, $ma_qg), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_hoanthanh_loc_17_pdf($ma_k, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức hoàn thành khoá học';
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->where('lop.ma_qg', $ma_qg)
        ->where('khoa.ma_k', $ma_k)
        ->where('status_kq', '<>', '2')
        ->where('status_kq', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_ketqua', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_hoanthanh_loc_17_excel($ma_k, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_HoanThanh_Loc_17Export($ma_k, $ma_qg), 'Vien-chuc-hoan-thanh-khoa-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }


  public function thongke_qlcttc_giahan_loc(Request $request)
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $data = $request->all();
      $list_quocgia = QuocGia::where('status_qg', '<>', '1')
        ->get();
      if (isset($data['ma_k'])  && isset($data['ma_l'])  && isset($data['batdau_giahan'])  && isset($data['ketthuc_giahan'])) {
        $count_giahan_all =  GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->where('status_gh', '<>', '2')
          ->select(DB::raw('count(giahan.ma_gh) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_giahan_all = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('lop.ma_l', $data['ma_l'])
          ->whereBetween('giahan.thoigian_gh', [$data['batdau_giahan'], $data['ketthuc_giahan']])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_all', $count_giahan_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_all', $list_giahan_all)

          ->with('ma_l', $data['ma_l'])
          ->with('ma_k', $data['ma_k'])
          ->with('batdau_giahan', $data['batdau_giahan'])
          ->with('ketthuc_giahan', $data['ketthuc_giahan'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l'])  && isset($data['batdau_giahan'])  && isset($data['ketthuc_giahan'])) {
        $count_giahan_2 =  GiaHan::join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->where('status_gh', '<>', '2')
          ->select(DB::raw('count(giahan.ma_gh) as sum, lop.ma_l, giahan.thoigian_gh'))
          ->groupBy('lop.ma_l', 'giahan.thoigian_gh')
          ->get();
        $list_giahan_2 = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->whereBetween('giahan.thoigian_gh', [$data['batdau_giahan'], $data['ketthuc_giahan']])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_2', $count_giahan_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_2', $list_giahan_2)

          ->with('ma_l', $data['ma_l'])
          ->with('batdau_giahan', $data['batdau_giahan'])
          ->with('ketthuc_giahan', $data['ketthuc_giahan'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k']) && isset($data['batdau_giahan'])  && isset($data['ketthuc_giahan'])) {
        $count_giahan_3 =  VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(giahan.ma_gh) as sum, khoa.ma_k, giahan.thoigian_gh'))
          ->groupBy('khoa.ma_k', 'giahan.thoigian_gh')
          ->get();
        $list_giahan_3 = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->whereBetween('giahan.thoigian_gh', [$data['batdau_giahan'], $data['ketthuc_giahan']])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_3', $count_giahan_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_3', $list_giahan_3)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau_giahan', $data['batdau_giahan'])
          ->with('ketthuc_giahan', $data['ketthuc_giahan'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_l'])) {
        $count_giahan_4 =  VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->select(DB::raw('count(giahan.ma_gh) as sum, lop.ma_l, khoa.ma_k'))
          ->groupBy('lop.ma_l', 'khoa.ma_k')
          ->get();
        $list_giahan_4 = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('lop.ma_l', $data['ma_l'])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_4', $count_giahan_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_4', $list_giahan_4)

          ->with('ma_l', $data['ma_l'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_qg'])) {
        $count_giahan_9 =  VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->select(DB::raw('count(giahan.ma_gh) as sum, quocgia.ma_qg, khoa.ma_k'))
          ->groupBy('quocgia.ma_qg', 'khoa.ma_k')
          ->get();
        $list_giahan_9 = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_9', $count_giahan_9)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_9', $list_giahan_9)

          ->with('ma_qg', $data['ma_qg'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_giahan'])  && isset($data['ketthuc_giahan']) && isset($data['ma_qg'])) {
        $count_giahan_11 =  VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(giahan.ma_gh) as sum, khoa.ma_k, giahan.thoigian_gh'))
          ->groupBy('khoa.ma_k', 'giahan.thoigian_gh')
          ->get();
        $list_giahan_11 = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->whereBetween('giahan.thoigian_gh', [$data['batdau_giahan'], $data['ketthuc_giahan']])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_11', $count_giahan_11)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_11', $list_giahan_11)

          ->with('ma_qg', $data['ma_qg'])
          ->with('batdau_giahan', $data['batdau_giahan'])
          ->with('ketthuc_giahan', $data['ketthuc_giahan'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_giahan_5 =  VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->select(DB::raw('count(giahan.ma_gh) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_giahan_5 = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_5', $count_giahan_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_5', $list_giahan_5)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l'])) {
        $count_giahan_6 =  VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->select(DB::raw('count(giahan.ma_gh) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_giahan_6 = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_6', $count_giahan_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_6', $list_giahan_6)

          ->with('ma_l', $data['ma_l'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_giahan'])  && isset($data['ketthuc_giahan'])) {
        $count_giahan_7 =  VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(giahan.ma_gh) as sum, giahan.thoigian_gh'))
          ->groupBy('giahan.thoigian_gh')
          ->get();
        $list_giahan_7 = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->whereBetween('giahan.thoigian_gh', [$data['batdau_giahan'], $data['ketthuc_giahan']])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_7', $count_giahan_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_7', $list_giahan_7)

          ->with('batdau_giahan', $data['batdau_giahan'])
          ->with('ketthuc_giahan', $data['ketthuc_giahan'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_qg'])) {
        $count_giahan_8 =  VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->select(DB::raw('count(giahan.ma_gh) as sum, quocgia.ma_qg'))
          ->groupBy('quocgia.ma_qg')
          ->get();
        $list_giahan_8 = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_gh', '<>', '2')
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->where('status_gh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_giahan_8', $count_giahan_8)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_giahan_8', $list_giahan_8)

          ->with('ma_qg', $data['ma_qg'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_all_pdf($ma_k, $ma_l, $batdau_giahan, $ketthuc_giahan)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('lop.ma_l', $ma_l)
        ->whereBetween('giahan.thoigian_gh', [$batdau_giahan, $ketthuc_giahan])
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_all_excel($ma_k, $ma_l, $batdau_giahan, $ketthuc_giahan)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_AllExport($ma_k, $ma_l, $batdau_giahan, $ketthuc_giahan), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc_2_pdf($ma_l, $batdau_giahan, $ketthuc_giahan)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->whereBetween('giahan.thoigian_gh', [$batdau_giahan, $ketthuc_giahan])
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_2_excel($ma_l, $batdau_giahan, $ketthuc_giahan)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_2Export($ma_l, $batdau_giahan, $ketthuc_giahan), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc_3_pdf($ma_k, $batdau_giahan, $ketthuc_giahan)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->whereBetween('giahan.thoigian_gh', [$batdau_giahan, $ketthuc_giahan])
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_3_excel($ma_k, $batdau_giahan, $ketthuc_giahan)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_3Export($ma_k, $batdau_giahan, $ketthuc_giahan), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc_4_pdf($ma_k, $ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('lop.ma_l', $ma_l)
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_4_excel($ma_k, $ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_4Export($ma_k, $ma_l), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc_5_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_5_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_5Export($ma_k), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc_6_pdf($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_6_excel($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_6Export($ma_l), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc_7_pdf($batdau_giahan, $ketthuc_giahan)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->whereBetween('giahan.thoigian_gh', [$batdau_giahan, $ketthuc_giahan])
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_7_excel($batdau_giahan, $ketthuc_giahan)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_7Export($batdau_giahan, $ketthuc_giahan), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc_8_pdf($ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('quocgia.ma_qg', $ma_qg)
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_8_excel($ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_8Export($ma_qg), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc_9_pdf($ma_k, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('quocgia.ma_qg', $ma_qg)
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_9_excel($ma_k, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_9Export($ma_k, $ma_qg), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_giahan_loc_11_pdf($batdau_giahan, $ketthuc_giahan, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_gh', '<>', '2')
        ->where('quocgia.ma_qg', $ma_qg)
        ->whereBetween('giahan.thoigian_gh', [$batdau_giahan, $ketthuc_giahan])
        ->where('status_gh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_giahan', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_giahan_loc_11_excel($batdau_giahan, $ketthuc_giahan, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_GiaHan_Loc_11Export($batdau_giahan, $ketthuc_giahan, $ma_qg), 'Vien-chuc-gia-han.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }


  public function thongke_qlcttc_dunghoc_loc(Request $request)
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $data = $request->all();
      $list_quocgia = QuocGia::where('status_qg', '<>', '1')
        ->get();
      if (isset($data['ma_k'])  && isset($data['ma_l'])  && isset($data['batdau_dunghoc'])  && isset($data['ketthuc_dunghoc'])) {
        $count_dunghoc_all =  DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_dunghoc_all = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('lop.ma_l', $data['ma_l'])
          ->whereBetween('dunghoc.batdau_dh', [$data['batdau_dunghoc'], $data['ketthuc_dunghoc']])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_all', $count_dunghoc_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_all', $list_dunghoc_all)

          ->with('ma_l', $data['ma_l'])
          ->with('ma_k', $data['ma_k'])
          ->with('batdau_dunghoc', $data['batdau_dunghoc'])
          ->with('ketthuc_dunghoc', $data['ketthuc_dunghoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l'])  && isset($data['batdau_dunghoc'])  && isset($data['ketthuc_dunghoc'])) {
        $count_dunghoc_2 =  DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, lop.ma_l, dunghoc.batdau_dh'))
          ->groupBy('lop.ma_l', 'dunghoc.batdau_dh')
          ->get();
        $list_dunghoc_2 = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->whereBetween('dunghoc.batdau_dh', [$data['batdau_dunghoc'], $data['ketthuc_dunghoc']])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_2', $count_dunghoc_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_2', $list_dunghoc_2)

          ->with('ma_l', $data['ma_l'])
          ->with('batdau_dunghoc', $data['batdau_dunghoc'])
          ->with('ketthuc_dunghoc', $data['ketthuc_dunghoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_qg'])  && isset($data['batdau_dunghoc'])  && isset($data['ketthuc_dunghoc'])) {
        $count_dunghoc_11 =  DungHoc::join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, quocgia.ma_qg, dunghoc.batdau_dh'))
          ->groupBy('quocgia.ma_qg', 'dunghoc.batdau_dh')
          ->get();
        $list_dunghoc_11 = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->whereBetween('dunghoc.batdau_dh', [$data['batdau_dunghoc'], $data['ketthuc_dunghoc']])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_11', $count_dunghoc_11)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_11', $list_dunghoc_11)

          ->with('ma_qg', $data['ma_qg'])
          ->with('batdau_dunghoc', $data['batdau_dunghoc'])
          ->with('ketthuc_dunghoc', $data['ketthuc_dunghoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k']) && isset($data['batdau_dunghoc'])  && isset($data['ketthuc_dunghoc'])) {
        $count_dunghoc_3 =  VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, khoa.ma_k, dunghoc.batdau_dh'))
          ->groupBy('khoa.ma_k', 'dunghoc.batdau_dh')
          ->get();
        $list_dunghoc_3 = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->whereBetween('dunghoc.batdau_dh', [$data['batdau_dunghoc'], $data['ketthuc_dunghoc']])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_3', $count_dunghoc_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_3', $list_dunghoc_3)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau_dunghoc', $data['batdau_dunghoc'])
          ->with('ketthuc_dunghoc', $data['ketthuc_dunghoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_l'])) {
        $count_dunghoc_4 =  VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, lop.ma_l, khoa.ma_k'))
          ->groupBy('lop.ma_l', 'khoa.ma_k')
          ->get();
        $list_dunghoc_4 = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('lop.ma_l', $data['ma_l'])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_4', $count_dunghoc_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_4', $list_dunghoc_4)

          ->with('ma_l', $data['ma_l'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_qg'])) {
        $count_dunghoc_9 =  VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, quocgia.ma_qg, khoa.ma_k'))
          ->groupBy('quocgia.ma_qg', 'khoa.ma_k')
          ->get();
        $list_dunghoc_9 = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_9', $count_dunghoc_9)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_9', $list_dunghoc_9)

          ->with('ma_qg', $data['ma_qg'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_dunghoc_5 =  VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_dunghoc_5 = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_5', $count_dunghoc_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_5', $list_dunghoc_5)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l'])) {
        $count_dunghoc_6 =  VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_dunghoc_6 = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_6', $count_dunghoc_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_6', $list_dunghoc_6)

          ->with('ma_l', $data['ma_l'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_dunghoc'])  && isset($data['ketthuc_dunghoc'])) {
        $count_dunghoc_7 =  VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, dunghoc.batdau_dh'))
          ->groupBy('dunghoc.batdau_dh')
          ->get();
        $list_dunghoc_7 = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->whereBetween('dunghoc.batdau_dh', [$data['batdau_dunghoc'], $data['ketthuc_dunghoc']])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_7', $count_dunghoc_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_7', $list_dunghoc_7)

          ->with('batdau_dunghoc', $data['batdau_dunghoc'])
          ->with('ketthuc_dunghoc', $data['ketthuc_dunghoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_qg'])) {
        $count_dunghoc_8 =  VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->select(DB::raw('count(dunghoc.ma_dh) as sum, quocgia.ma_qg'))
          ->groupBy('quocgia.ma_qg')
          ->get();
        $list_dunghoc_8 = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_dh', '<>', '2')
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->where('status_dh', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_dunghoc_8', $count_dunghoc_8)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_dunghoc_8', $list_dunghoc_8)

          ->with('ma_qg', $data['ma_qg'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_all_pdf($ma_k, $ma_l, $batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('lop.ma_l', $ma_l)
        ->whereBetween('dunghoc.batdau_dh', [$batdau_dunghoc, $ketthuc_dunghoc])
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_all_excel($ma_k, $ma_l, $batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_AllExport($ma_k, $ma_l, $batdau_dunghoc, $ketthuc_dunghoc), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc_loc_2_pdf($ma_l, $batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->whereBetween('dunghoc.batdau_dh', [$batdau_dunghoc, $ketthuc_dunghoc])
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_2_excel($ma_l, $batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_2Export($ma_l, $batdau_dunghoc, $ketthuc_dunghoc), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc_loc_3_pdf($ma_k, $batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->whereBetween('dunghoc.batdau_dh', [$batdau_dunghoc, $ketthuc_dunghoc])
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_3_excel($ma_k, $batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_3Export($ma_k, $batdau_dunghoc, $ketthuc_dunghoc), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc_loc_4_pdf($ma_k, $ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('lop.ma_l', $ma_l)
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_4_excel($ma_k, $ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_4Export($ma_k, $ma_l), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc_loc_5_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_5_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_5Export($ma_k), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc_loc_6_pdf($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_6_excel($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_6Export($ma_l), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc_loc_7_pdf($batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->whereBetween('dunghoc.batdau_dh', [$batdau_dunghoc, $ketthuc_dunghoc])
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_7_excel($batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_7Export($batdau_dunghoc, $ketthuc_dunghoc), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc_loc_8_pdf($ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('quocgia.ma_qg', $ma_qg)
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_8_excel($ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_8Export($ma_qg), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc_loc_9_pdf($ma_k, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('quocgia.ma_qg', $ma_qg)
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_9_excel($ma_k, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_9Export($ma_k, $ma_qg), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_dunghoc_loc_11_pdf($ma_qg, $batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_dh', '<>', '2')
        ->where('quocgia.ma_qg', $ma_qg)
        ->whereBetween('dunghoc.batdau_dh', [$batdau_dunghoc, $ketthuc_dunghoc])
        ->where('status_dh', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_dunghoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_dunghoc_loc_11_excel($ma_qg, $batdau_dunghoc, $ketthuc_dunghoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_DungHoc_Loc_11Export($ma_qg, $batdau_dunghoc, $ketthuc_dunghoc), 'Vien-chuc-dung-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }


  public function thongke_qlcttc_xinchuyen_loc(Request $request)
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $data = $request->all();
      $list_quocgia = QuocGia::where('status_qg', '<>', '1')
        ->get();
      if (isset($data['ma_k'])  && isset($data['ma_l'])) {
        $count_chuyen_all =  Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->select(DB::raw('count(chuyen.ma_c) as sum, lop.ma_l, khoa.ma_k'))
          ->groupBy('lop.ma_l', 'khoa.ma_k')
          ->get();
        $list_chuyen_all = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('lop.ma_l', $data['ma_l'])
          ->where('status_c', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_chuyen_all', $count_chuyen_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_chuyen_all', $list_chuyen_all)

          ->with('ma_l', $data['ma_l'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_qg'])) {
        $count_chuyen_5 =  Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->select(DB::raw('count(chuyen.ma_c) as sum, quocgia.ma_qg, khoa.ma_k'))
          ->groupBy('quocgia.ma_qg', 'khoa.ma_k')
          ->get();
        $list_chuyen_5 = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->where('status_c', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_chuyen_5', $count_chuyen_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_chuyen_5', $list_chuyen_5)

          ->with('ma_qg', $data['ma_qg'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_chuyen_2 =  Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->select(DB::raw('count(chuyen.ma_c) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_chuyen_2 = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('status_c', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_chuyen_2', $count_chuyen_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_chuyen_2', $list_chuyen_2)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l'])) {
        $count_chuyen_3 =  Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->select(DB::raw('count(chuyen.ma_c) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_chuyen_3 = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->where('status_c', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_chuyen_3', $count_chuyen_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_chuyen_3', $list_chuyen_3)

          ->with('ma_l', $data['ma_l'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_qg'])) {
        $count_chuyen_4 =  Chuyen::join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'chuyen.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->select(DB::raw('count(chuyen.ma_c) as sum, quocgia.ma_qg'))
          ->groupBy('quocgia.ma_qg')
          ->get();
        $list_chuyen_4 = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
          ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_c', '<>', '2')
          ->where('quocgia.ma_qg', $data['ma_qg'])
          ->where('status_c', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_chuyen_4', $count_chuyen_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_chuyen_4', $list_chuyen_4)

          ->with('ma_qg', $data['ma_qg'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_chuyen_loc_all_pdf($ma_k, $ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_c', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('lop.ma_l', $ma_l)
        ->where('status_c', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_chuyen', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_loc_all_excel($ma_k, $ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_Chuyen_Loc_AllExport($ma_k, $ma_l), 'Vien-chuc-chuyen.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_chuyen_loc_2_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_c', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_c', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_chuyen', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_loc_2_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_Chuyen_Loc_2Export($ma_k), 'Vien-chuc-chuyen.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_chuyen_loc_3_pdf($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_c', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->where('status_c', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_chuyen', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_loc_3_excel($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_Chuyen_Loc_3Export($ma_l), 'Vien-chuc-chuyen.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_chuyen_loc_4_pdf($ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_c', '<>', '2')
        ->where('quocgia.ma_qg', $ma_qg)
        ->where('status_c', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_chuyen', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_loc_4_excel($ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_Chuyen_Loc_4Export($ma_qg), 'Vien-chuc-chuyen.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_loc_5_pdf($ma_k, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin dừng học';
      $vienchuc = VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
        ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_c', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('quocgia.ma_qg', $ma_qg)
        ->where('status_c', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_chuyen', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_chuyen_loc_5_excel($ma_k, $ma_qg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_Chuyen_Loc_5Export($ma_k, $ma_qg), 'Vien-chuc-chuyen.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }


  public function thongke_qlcttc_thoihoc_loc(Request $request)
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $data = $request->all();
      $list_quocgia = QuocGia::where('status_qg', '<>', '1')
        ->get();
      if (isset($data['ma_k'])  && isset($data['ma_l'])  && isset($data['batdau_thoihoc'])  && isset($data['ketthuc_thoihoc'])) {
        $count_thoihoc_all =  ThoiHoc::join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->where('status_th', '<>', '2')
          ->select(DB::raw('count(thoihoc.ma_th) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_thoihoc_all = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('lop.ma_l', $data['ma_l'])
          ->whereBetween('thoihoc.ngay_th', [$data['batdau_thoihoc'], $data['ketthuc_thoihoc']])
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_thoihoc_all', $count_thoihoc_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_thoihoc_all', $list_thoihoc_all)

          ->with('ma_l', $data['ma_l'])
          ->with('ma_k', $data['ma_k'])
          ->with('batdau_thoihoc', $data['batdau_thoihoc'])
          ->with('ketthuc_thoihoc', $data['ketthuc_thoihoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l'])  && isset($data['batdau_thoihoc'])  && isset($data['ketthuc_thoihoc'])) {
        $count_thoihoc_2 =  ThoiHoc::join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->where('status_th', '<>', '2')
          ->select(DB::raw('count(thoihoc.ma_th) as sum, lop.ma_l, thoihoc.ngay_th'))
          ->groupBy('lop.ma_l', 'thoihoc.ngay_th')
          ->get();
        $list_thoihoc_2 = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->whereBetween('thoihoc.ngay_th', [$data['batdau_thoihoc'], $data['ketthuc_thoihoc']])
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_thoihoc_2', $count_thoihoc_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_thoihoc_2', $list_thoihoc_2)

          ->with('ma_l', $data['ma_l'])
          ->with('batdau_thoihoc', $data['batdau_thoihoc'])
          ->with('ketthuc_thoihoc', $data['ketthuc_thoihoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k']) && isset($data['batdau_thoihoc'])  && isset($data['ketthuc_thoihoc'])) {
        $count_thoihoc_3 =  VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(thoihoc.ma_th) as sum, khoa.ma_k, thoihoc.ngay_th'))
          ->groupBy('khoa.ma_k', 'thoihoc.ngay_th')
          ->get();
        $list_thoihoc_3 = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->whereBetween('thoihoc.ngay_th', [$data['batdau_thoihoc'], $data['ketthuc_thoihoc']])
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_thoihoc_3', $count_thoihoc_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_thoihoc_3', $list_thoihoc_3)

          ->with('ma_k', $data['ma_k'])
          ->with('batdau_thoihoc', $data['batdau_thoihoc'])
          ->with('ketthuc_thoihoc', $data['ketthuc_thoihoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_l'])) {
        $count_thoihoc_4 =  VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->select(DB::raw('count(thoihoc.ma_th) as sum, lop.ma_l, khoa.ma_k'))
          ->groupBy('lop.ma_l', 'khoa.ma_k')
          ->get();
        $list_thoihoc_4 = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('lop.ma_l', $data['ma_l'])
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_thoihoc_4', $count_thoihoc_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_thoihoc_4', $list_thoihoc_4)

          ->with('ma_l', $data['ma_l'])
          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_thoihoc_5 =  VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->select(DB::raw('count(thoihoc.ma_th) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_thoihoc_5 = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_thoihoc_5', $count_thoihoc_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_thoihoc_5', $list_thoihoc_5)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_l'])) {
        $count_thoihoc_6 =  VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->select(DB::raw('count(thoihoc.ma_th) as sum, lop.ma_l'))
          ->groupBy('lop.ma_l')
          ->get();
        $list_thoihoc_6 = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->where('lop.ma_l', $data['ma_l'])
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_thoihoc_6', $count_thoihoc_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_thoihoc_6', $list_thoihoc_6)

          ->with('ma_l', $data['ma_l'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_thoihoc'])  && isset($data['ketthuc_thoihoc'])) {
        $count_thoihoc_7 =  VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(thoihoc.ma_th) as sum, thoihoc.ngay_th'))
          ->groupBy('thoihoc.ngay_th')
          ->get();
        $list_thoihoc_7 = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_th', '<>', '2')
          ->whereBetween('thoihoc.ngay_th', [$data['batdau_thoihoc'], $data['ketthuc_thoihoc']])
          ->where('status_th', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->get();
        return view('thongke.thongke_qlcttc')
          ->with('title', $title)

          ->with('count_thoihoc_7', $count_thoihoc_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_quocgia', $list_quocgia)
          ->with('list_lop', $list_lop)
          ->with('list_vienchuc', $list_vienchuc)
          ->with('list_thoihoc_7', $list_thoihoc_7)

          ->with('batdau_thoihoc', $data['batdau_thoihoc'])
          ->with('ketthuc_thoihoc', $data['ketthuc_thoihoc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_loc_all_pdf($ma_k, $ma_l, $batdau_thoihoc, $ketthuc_thoihoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_th', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('lop.ma_l', $ma_l)
        ->whereBetween('thoihoc.ngay_th', [$batdau_thoihoc, $ketthuc_thoihoc])
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_loc_all_excel($ma_k, $ma_l, $batdau_thoihoc, $ketthuc_thoihoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_ThoiHoc_Loc_AllExport($ma_k, $ma_l, $batdau_thoihoc, $ketthuc_thoihoc), 'Vien-chuc-thoi-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_thoihoc_loc_2_pdf($ma_l, $batdau_thoihoc, $ketthuc_thoihoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_th', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->whereBetween('thoihoc.ngay_th', [$batdau_thoihoc, $ketthuc_thoihoc])
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_loc_2_excel($ma_l, $batdau_thoihoc, $ketthuc_thoihoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_ThoiHoc_Loc_2Export($ma_l, $batdau_thoihoc, $ketthuc_thoihoc), 'Vien-chuc-thoi-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_thoihoc_loc_3_pdf($ma_k, $batdau_thoihoc, $ketthuc_thoihoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_th', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->whereBetween('thoihoc.ngay_th', [$batdau_thoihoc, $ketthuc_thoihoc])
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_loc_3_excel($ma_k, $batdau_thoihoc, $ketthuc_thoihoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_ThoiHoc_Loc_3Export($ma_k, $batdau_thoihoc, $ketthuc_thoihoc), 'Vien-chuc-thoi-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_thoihoc_loc_4_pdf($ma_k, $ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_th', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('lop.ma_l', $ma_l)
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_loc_4_excel($ma_k, $ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_ThoiHoc_Loc_4Export($ma_k, $ma_l), 'Vien-chuc-thoi-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_thoihoc_loc_5_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_th', '<>', '2')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_loc_5_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_ThoiHoc_Loc_5Export($ma_k), 'Vien-chuc-thoi-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_thoihoc_loc_6_pdf($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_th', '<>', '2')
        ->where('lop.ma_l', $ma_l)
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_loc_6_excel($ma_l)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_ThoiHoc_Loc_6Export($ma_l), 'Vien-chuc-thoi-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlcttc_thoihoc_loc_7_pdf($batdau_thoihoc, $ketthuc_thoihoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      $title = 'Viên chức xin gia hạn';
      $vienchuc = VienChuc::join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'thoihoc.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_th', '<>', '2')
        ->whereBetween('thoihoc.ngay_th', [$batdau_thoihoc, $ketthuc_thoihoc])
        ->where('status_th', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlcttc_thoihoc', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlcttc_thoihoc_loc_7_excel($batdau_thoihoc, $ketthuc_thoihoc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlcttc) {
      return Excel::download(new ThongKeQLCTTC_ThoiHoc_Loc_7Export($batdau_thoihoc, $ketthuc_thoihoc), 'Vien-chuc-thoi-hoc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }



  // --------------------------------------------------------

  public function thongke_qlk()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $title = "Thống kê";
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_qlk) {
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $count = VienChuc::join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_k', $ma_k)
        ->select(DB::raw('count(vienchuc.ma_vc) as sum, chucvu.ma_cv'))
        ->groupBy('chucvu.ma_cv')
        ->get();
      $list = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      return view('thongke.thongke_qlk')
        ->with('title', $title)

        ->with('count', $count)

        ->with('list', $list)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('list_ngach', $list_ngach)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_tinh', $list_tinh)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_khoa', $list_khoa)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('list_loaikyluat', $list_loaikyluat)

        ->with('ma_k', $ma_k)

        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = 'Theo khoa';
      $vienchuc = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qltt_pdf', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Export($ma_k), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc(Request $request)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $title = "Thống kê";
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_qlk) {
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $data = $request->all();

      if (isset($data['ma_cv'])  && isset($data['ma_hdt'])  && isset($data['ma_lbc'])  && isset($data['ma_n'])  && isset($data['ma_t']) && isset($data['ma_dt'])  && isset($data['ma_tg'])  && isset($data['ma_tb'])) {
        $count = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, chucvu.ma_cv'))
          ->groupBy('chucvu.ma_cv')
          ->get();
        $list_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
          ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
          ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
          ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
          ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('vienchuc.ma_cv', $data['ma_cv'])
          ->where('bangcap.ma_hdt', $data['ma_hdt'])
          ->where('bangcap.ma_lbc', $data['ma_lbc'])
          ->where('vienchuc.ma_n', $data['ma_n'])
          ->where('quequan.ma_t', $data['ma_t'])
          ->where('vienchuc.ma_dt', $data['ma_dt'])
          ->where('vienchuc.ma_tg', $data['ma_tg'])
          ->where('vienchuc.ma_tb', $data['ma_tb'])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count', $count)

          ->with('list_all', $list_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_k', $ma_k)
          ->with('ma_cv', $data['ma_cv'])
          ->with('ma_hdt', $data['ma_hdt'])
          ->with('ma_lbc', $data['ma_lbc'])
          ->with('ma_n', $data['ma_n'])
          ->with('ma_t', $data['ma_t'])
          ->with('ma_dt', $data['ma_dt'])
          ->with('ma_tg', $data['ma_tg'])
          ->with('ma_tb', $data['ma_tb'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_cv'])) {
        $count_chucvu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_cv'))
          ->groupBy('vienchuc.ma_cv')
          ->get();
        $list_pdf_chucvu = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_cv', $data['ma_cv'])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_chucvu', $count_chucvu)

          ->with('list_pdf_chucvu', $list_pdf_chucvu)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_cv', $data['ma_cv'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_hdt'])) {
        $count_hedaotao = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, hedaotao.ma_hdt'))
          ->groupBy('hedaotao.ma_hdt')
          ->get();
        $list_pdf_hdt = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('bangcap.ma_hdt', $data['ma_hdt'])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_hedaotao', $count_hedaotao)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_pdf_hdt', $list_pdf_hdt)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_thuongbinh', $list_thuongbinh)

          ->with('ma_hdt', $data['ma_hdt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lbc'])) {
        $count_loaibangcap = VienChuc::join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, loaibangcap.ma_lbc'))
          ->groupBy('loaibangcap.ma_lbc')
          ->get();
        $list_pdf_lbc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('bangcap.ma_lbc', $data['ma_lbc'])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_loaibangcap', $count_loaibangcap)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_pdf_lbc', $list_pdf_lbc)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_thuongbinh', $list_thuongbinh)

          ->with('ma_lbc', $data['ma_lbc'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_n'])) {
        $count_ngach = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_n'))
          ->groupBy('vienchuc.ma_n')
          ->get();
        $list_pdf_ngach = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_n', $data['ma_n'])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_ngach', $count_ngach)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_ngach', $list_pdf_ngach)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_n', $data['ma_n'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_t'])) {
        $count_tinh = VienChuc::join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, tinh.ma_t'))
          ->groupBy('tinh.ma_t')
          ->get();
        $list_pdf_tinh = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('quequan.ma_t', $data['ma_t'])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_tinh', $count_tinh)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_pdf_tinh', $list_pdf_tinh)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_t', $data['ma_t'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_dt'])) {
        $count_dantoc = VienChuc::join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $ma_k)
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_dt'))
          ->groupBy('vienchuc.ma_dt')
          ->get();
        $list_pdf_dantoc = VienChuc::join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_dt', $data['ma_dt'])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_dantoc', $count_dantoc)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_dantoc', $list_pdf_dantoc)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_dt', $data['ma_dt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_tg'])) {
        $count_tongiao = VienChuc::join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $ma_k)
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_tg'))
          ->groupBy('vienchuc.ma_tg')
          ->get();
        $list_pdf_tongiao = VienChuc::join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('vienchuc.ma_tg', $data['ma_tg'])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_tongiao', $count_tongiao)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_tongiao', $list_pdf_tongiao)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_tg', $data['ma_tg'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_tb'])) {
        $count_thuongbinh = VienChuc::join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $ma_k)
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, vienchuc.ma_tb'))
          ->groupBy('vienchuc.ma_tb')
          ->get();
        $list_pdf_thuongbinh = VienChuc::join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_tb', $data['ma_tb'])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_thuongbinh', $count_thuongbinh)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_pdf_thuongbinh', $list_pdf_thuongbinh)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('ma_tb', $data['ma_tb'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_all_pdf($ma_cv, $ma_hdt, $ma_lbc, $ma_n, $ma_t, $ma_dt, $ma_tg, $ma_tb)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
        ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('vienchuc.ma_cv', $ma_cv)
        ->where('bangcap.ma_hdt', $ma_hdt)
        ->where('bangcap.ma_lbc', $ma_lbc)
        ->where('vienchuc.ma_n', $ma_n)
        ->where('quequan.ma_t', $ma_t)
        ->where('vienchuc.ma_dt', $ma_dt)
        ->where('vienchuc.ma_tg', $ma_tg)
        ->where('vienchuc.ma_tb', $ma_tb)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_all_excel($ma_cv, $ma_hdt, $ma_lbc, $ma_n, $ma_t, $ma_dt, $ma_tg, $ma_tb)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Loc_AllExport($ma_k, $ma_cv, $ma_hdt, $ma_lbc, $ma_n, $ma_t, $ma_dt, $ma_tg, $ma_tb), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_chucvu_pdf($ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = 'Lọc theo chức vụ';
      $vienchuc =  VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_cv', $ma_cv)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_chucvu_excel($ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Loc_ChucVuExport($ma_k, $ma_cv), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_hdt_pdf($ma_hdt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = 'Lọc theo hệ đào tạo';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('bangcap.ma_hdt', $ma_hdt)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_hdt_excel($ma_hdt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Loc_HdtExport($ma_k, $ma_hdt), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_lbc_pdf($ma_lbc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = 'Lọc theo loại bằng cấp';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('bangcap', 'bangcap.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('bangcap.ma_lbc', $ma_lbc)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_lbc_excel($ma_lbc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Loc_LbcExport($ma_k, $ma_lbc), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_ngach_pdf($ma_n)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = 'Lọc theo ngạch viên chức';
      $vienchuc = VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_n', $ma_n)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_ngach_excel($ma_n)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Loc_NgachExport($ma_k, $ma_n), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_tinh_pdf($ma_t)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = 'Lọc theo quê quán của viên chức';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('quequan.ma_t', $ma_t)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_tinh_excel($ma_t)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Loc_TinhExport($ma_k, $ma_t), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_dantoc_pdf($ma_dt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = 'Lọc theo dân tộc của viên chức';
      $vienchuc = VienChuc::join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_dt', $ma_dt)
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_dantoc_excel($ma_dt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Loc_DanTocExport($ma_k, $ma_dt), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_tongiao_pdf($ma_tg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = 'Lọc theo tôn giáo';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('vienchuc.ma_tg', $ma_tg)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_tongiao_excel($ma_tg)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Loc_TonGiaoExport($ma_k, $ma_tg), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_thuongbinh_pdf($ma_tb)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = 'Lọc theo hạng của thương binh';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('vienchuc.ma_tb', $ma_tb)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_thuongbinh_excel($ma_tb)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_Loc_ThuongBinhExport($ma_k, $ma_tb), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }


  public function thongke_qlk_nghihuu_loc(Request $request)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $title = "Thống kê";
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_qlk) {
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $data = $request->all();
      if (isset($data['batdau']) && isset($data['ketthuc'])) {
        $count_nghihuu_time = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->select(DB::raw('count(vienchuc.ma_vc) as sum, khoa.ma_k, vienchuc.thoigiannghi_vc'))
          ->groupBy('khoa.ma_k', 'vienchuc.thoigiannghi_vc')
          ->get();
        $list_nghihuu_time = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_vc', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->whereBetween('vienchuc.thoigiannghi_vc', [$data['batdau'], $data['ketthuc']])
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_nghihuu_time', $count_nghihuu_time)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_nghihuu_time', $list_nghihuu_time)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)

          ->with('batdau', $data['batdau'])
          ->with('ketthuc', $data['ketthuc'])

          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_loc_nghihuu_time_pdf($batdau, $ketthuc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $title = '';
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '2')
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('vienchuc.thoigiannghi_vc', [$batdau, $ketthuc])
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk', [
        'vienchuc' => $vienchuc,
        'title' => $title,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_loc_nghihuu_time_excel($batdau, $ketthuc)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_NghiHuu_TimeExport($ma_k, $batdau, $ketthuc), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }


  public function thongke_qlk_kt_loc(Request $request)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $title = "Thống kê";
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_qlk) {
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $data = $request->all();
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      if (isset($data['ma_lkt']) && isset($data['ma_htkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_loaikhenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, loaikhenthuong.ma_lkt'))
          ->groupBy('loaikhenthuong.ma_lkt')
          ->get();
        $list_kt_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('vienchuc.ma_k', $ma_k)
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_loaikhenthuong', $count_loaikhenthuong)

          ->with('list_kt_all', $list_kt_all)
          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_k', $ma_k)
          ->with('ma_htkt', $data['ma_htkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_htkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_kt_2 = KhenThuong::join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'khenthuong.ma_vc')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_kt', '<>', '2')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, hinhthuckhenthuong.ma_htkt, ngay_kt'))
          ->groupBy('hinhthuckhenthuong.ma_htkt', 'ngay_kt')
          ->get();
        $list_kt_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('hinhthuckhenthuong.ma_htkt', $data['ma_htkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_kt_2', $count_kt_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_kt_2', $list_kt_2)

          ->with('ma_htkt', $data['ma_htkt'])
          ->with('ma_k', $ma_k)
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])  && isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_kt_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt, ngay_kt'))
          ->groupBy('khenthuong.ma_lkt', 'ngay_kt')
          ->get();
        $list_kt_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_kt_3', $count_kt_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_kt_3', $list_kt_3)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])  && isset($data['ma_htkt'])) {
        $count_kt_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt'))
          ->groupBy('khenthuong.ma_lkt')
          ->get();
        $list_kt_4 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_kt_4', $count_kt_4)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_kt_4', $list_kt_4)

          ->with('ma_lkt', $data['ma_lkt'])
          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkt'])) {
        $count_kt_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_lkt'))
          ->groupBy('khenthuong.ma_lkt')
          ->get();
        $list_kt_5 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('khenthuong.ma_lkt', $data['ma_lkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_kt_5', $count_kt_5)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_kt_5', $list_kt_5)

          ->with('ma_lkt', $data['ma_lkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_htkt'])) {
        $count_kt_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $ma_k)
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, khenthuong.ma_htkt'))
          ->groupBy('khenthuong.ma_htkt')
          ->get();
        $list_kt_6 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->where('khenthuong.ma_htkt', $data['ma_htkt'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_kt_6', $count_kt_6)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_kt_6', $list_kt_6)

          ->with('ma_htkt', $data['ma_htkt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_kt'])  && isset($data['ketthuc_kt'])) {
        $count_kt_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->where('status_kt', '<>', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->select(DB::raw('count(khenthuong.ma_kt) as sum, ngay_kt'))
          ->groupBy('ngay_kt')
          ->get();
        $list_kt_7 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
          ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
          ->whereBetween('khenthuong.ngay_kt', [$data['batdau_kt'], $data['ketthuc_kt']])
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kt', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_kt_7', $count_kt_7)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_kt_7', $list_kt_7)

          ->with('batdau_kt', $data['batdau_kt'])
          ->with('ketthuc_kt', $data['ketthuc_kt'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kt_loc_all_pdf($ma_lkt, $ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kt_loc_all_excel($ma_lkt, $ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KhenThuong_Loc_AllExport($ma_k, $ma_lkt, $ma_htkt, $batdau_kt, $ketthuc_kt), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kt_loc_2_pdf($ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('hinhthuckhenthuong.ma_htkt', $ma_htkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kt_loc_2_excel($ma_htkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KhenThuong_Loc_2Export($ma_k, $ma_htkt, $batdau_kt, $ketthuc_kt), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kt_loc_3_pdf($ma_lkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kt_loc_3_excel($ma_lkt, $batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KhenThuong_Loc_3Export($ma_k, $ma_lkt, $batdau_kt, $ketthuc_kt), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kt_loc_4_pdf($ma_lkt, $ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kt_loc_4_excel($ma_lkt, $ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KhenThuong_Loc_4Export($ma_k, $ma_lkt, $ma_htkt), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kt_loc_5_pdf($ma_lkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_lkt', $ma_lkt)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kt_loc_5_excel($ma_lkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KhenThuong_Loc_5Export($ma_k, $ma_lkt), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kt_loc_6_pdf($ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('khenthuong.ma_htkt', $ma_htkt)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kt_loc_6_excel($ma_htkt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KhenThuong_Loc_6Export($ma_k, $ma_htkt), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kt_loc_7_pdf($batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $khenthuong = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->whereBetween('khenthuong.ngay_kt', [$batdau_kt, $ketthuc_kt])
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kt', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kt_pdf', [
        'vienchuc' => $vienchuc,
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kt_loc_7_excel($batdau_kt, $ketthuc_kt)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KhenThuong_Loc_7Export($ma_k, $batdau_kt, $ketthuc_kt), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }


  public function thongke_qlk_kl_loc(Request $request)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $title = "Thống kê";
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if ($phanquyen_qlk) {
      $list_loaikhenthuong = LoaiKhenThuong::orderBy('ten_lkt', 'asc')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::get();
      $list_loaikyluat = LoaiKyLuat::orderBy('ten_lkl', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $data = $request->all();
      $list_loaibangcap = LoaiBangCap::orderBy('ten_lbc', 'asc')
        ->get();
      $list_hedaotao = HeDaoTao::orderBy('ten_hdt', 'asc')
        ->get();
      $list_ngach = Ngach::orderBy('ten_n', 'asc')
        ->get();
      $list_chucvu = ChucVu::orderBy('ten_cv', 'asc')
        ->get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      $list_dantoc = DanToc::orderBy('ten_dt', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_tongiao = TonGiao::orderBy('ten_tg', 'asc')
        ->get();
      $list_thuongbinh = ThuongBinh::orderBy('ten_tb', 'asc')
        ->get();
      $data = $request->all();
      if (isset($data['ma_lkl']) && isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])) {
        $count_kl_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl, ngay_kl'))
          ->groupBy('loaikyluat.ma_lkl', 'ngay_kl')
          ->get();
        $list_kl_all = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_kl_all', $count_kl_all)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_kl_all', $list_kl_all)

          ->with('ma_lkl', $data['ma_lkl'])
          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_lkl'])) {
        $count_kl_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_kl', '<>', '2')
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, loaikyluat.ma_lkl'))
          ->groupBy('loaikyluat.ma_lkl')
          ->get();
        $list_kl_2 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('kyluat.ma_lkl', $data['ma_lkl'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_kl_2', $count_kl_2)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_kl_2', $list_kl_2)

          ->with('ma_lkl', $data['ma_lkl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['batdau_kl'])  && isset($data['ketthuc_kl'])) {
        $count_kl_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->where('status_kl', '<>', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->select(DB::raw('count(kyluat.ma_kl) as sum, ngay_kl'))
          ->groupBy('ngay_kl')
          ->get();
        $list_kl_3 = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
          ->whereBetween('kyluat.ngay_kl', [$data['batdau_kl'], $data['ketthuc_kl']])
          ->where('vienchuc.ma_k', $ma_k)
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_kl', '<>', '2')
          ->get();
        return view('thongke.thongke_qlk')
          ->with('title', $title)

          ->with('count_kl_3', $count_kl_3)

          ->with('list_khoa', $list_khoa)
          ->with('list_loaikhenthuong', $list_loaikhenthuong)
          ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
          ->with('list_loaikyluat', $list_loaikyluat)
          ->with('list_loaibangcap', $list_loaibangcap)
          ->with('list_ngach', $list_ngach)
          ->with('list_hedaotao', $list_hedaotao)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_tinh', $list_tinh)
          ->with('list_dantoc', $list_dantoc)
          ->with('list_tongiao', $list_tongiao)
          ->with('list_thuongbinh', $list_thuongbinh)
          ->with('list_kl_3', $list_kl_3)

          ->with('batdau_kl', $data['batdau_kl'])
          ->with('ketthuc_kl', $data['ketthuc_kl'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kl_loc_all_pdf($ma_lkl, $batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->where('vienchuc.ma_k', $ma_k)
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kl_loc_all_excel($ma_lkl, $batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KyLuat_Loc_AllExport($ma_k, $ma_lkl, $batdau_kl, $ketthuc_kl), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kl_loc_2_pdf($ma_lkl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_lkl', $ma_lkl)
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kl_loc_2_excel($ma_lkl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KyLuat_Loc_2Export($ma_k, $ma_lkl), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlk_kl_loc_3_pdf($batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      $kyluat = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->whereBetween('kyluat.ngay_kl', [$batdau_kl, $ketthuc_kl])
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('vienchuc.ma_k', $ma_k)
        ->where('status_kl', '<>', '2')
        ->get();
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlk_kl_pdf', [
        'vienchuc' => $vienchuc,
        'kyluat' => $kyluat,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlk_kl_loc_3_excel($batdau_kl, $ketthuc_kl)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if ($phanquyen_qlk) {
      return Excel::download(new ThongKeQLK_KyLuat_Loc_3Export($ma_k, $batdau_kl, $ketthuc_kl), 'Quan-ly-khoa.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }




  public function thongke_qlqtcv()
  {
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $count_nhiemky = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->where('status_qtcv', '<>', '2')
        ->select(DB::raw('count(quatrinhchucvu.ma_qtcv) as sum, nhiemky.ma_nk'))
        ->groupBy('nhiemky.ma_nk')
        ->get();
      $list_pdf = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->where('status_qtcv', '<>', '2')
        ->orderBy('ma_vc', 'asc')
        ->get();
      $list_nhiemky = NhiemKy::where('status_nk', '<>', '1')
        ->orderBy('batdau_nk', 'desc')
        ->get();
      $list_chucvu = ChucVu::where('status_cv', '<>', '1')
        ->orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::where('status_k', '<>', '1')
        ->orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      return view('thongke.thongke_qlqtcv')
        ->with('title', $title)

        ->with('count_nhiemky', $count_nhiemky)

        ->with('list_pdf', $list_pdf)
        ->with('list_nhiemky', $list_nhiemky)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_vienchuc', $list_vienchuc)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlqtcv_pdf()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_qlqtcv || $phanquyen_admin) {
      $quatrinhchucvu = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlqtcv_pdf', [
        'quatrinhchucvu' => $quatrinhchucvu,
        'list_vienchuc' => $list_vienchuc,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_excel()
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_qlqtcv || $phanquyen_admin) {
      return Excel::download(new ThongKeQLQTCV_Export(), 'Qua-trinh-chuc-vu.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_word(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_qtcv', '<>', '2')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $temp = new TemplateProcessor('public/word/quanly_qtcv.docx');
      $qtcv_arr = array();
      foreach($quatrinhchucvu as $key => $qtcv){
        $qtcv_arr[] = [
          'stt_qtcv' => $key+1, 
          'hoten_vc' => $qtcv->hoten_vc, 
          'user_vc' => $qtcv->user_vc, 
          'sdt_vc' => $qtcv->sdt_vc, 
          'ngaysinh_vc' => $qtcv->ngaysinh_vc, 
          'ten_cv' => $qtcv->ten_cv, 
          'batdau_nk' => $qtcv->batdau_nk, 
          'ketthuc_nk' => $qtcv->ketthuc_nk, 
          'soquyetdinh_qtcv' => $qtcv->soquyetdinh_qtcv, 
          'ngayky_qtcv' => $qtcv->ngayky_qtcv, 
          'ten_k' => $qtcv->ten_k
        ];
      };
      $temp->cloneRowAndSetValues('stt_qtcv', $qtcv_arr);
      $name_file = 'Qúa trình chức vụ';
      $temp->saveAs($name_file.'.docx');
      return response()->download($name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc(Request $request){
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $title = "Thống kê";
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $list_nhiemky = NhiemKy::where('status_nk', '<>', '1')
        ->orderBy('batdau_nk', 'desc')
        ->get();
      $list_chucvu = ChucVu::where('status_cv', '<>', '1')
        ->orderBy('ten_cv', 'asc')
        ->get();
      $list_khoa = Khoa::where('status_k', '<>', '1')
        ->orderBy('ten_k', 'asc')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $data = $request->all();
      if (isset($data['ma_k'])  && isset($data['ma_cv'])  && isset($data['ma_nk'])) {
        $count_1 = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->where('status_qtcv', '<>', '2')
          ->select(DB::raw('count(quatrinhchucvu.ma_qtcv) as sum, chucvu.ma_cv'))
          ->groupBy('chucvu.ma_cv')
          ->get();
        $list_1 = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('chucvu.ma_cv', $data['ma_cv'])
          ->where('nhiemky.ma_nk', $data['ma_nk'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_qtcv', '<>', '2')
          ->get();
        return view('thongke.thongke_qlqtcv')
          ->with('title', $title)

          ->with('count_1', $count_1)

          ->with('list_1', $list_1)
          ->with('list_khoa', $list_khoa)
          ->with('list_nhiemky', $list_nhiemky)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_vienchuc', $list_vienchuc)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_cv', $data['ma_cv'])
          ->with('ma_nk', $data['ma_nk'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])  && isset($data['ma_cv'])) {
        $count_2 = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'quatrinhchucvu.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_qtcv', '<>', '2')
          ->select(DB::raw('count(quatrinhchucvu.ma_qtcv) as sum, khoa.ma_k, chucvu.ma_cv'))
          ->groupBy('khoa.ma_k', 'chucvu.ma_cv')
          ->get();
        $list_2 = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('chucvu.ma_cv', $data['ma_cv'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_qtcv', '<>', '2')
          ->get();
        return view('thongke.thongke_qlqtcv')
          ->with('title', $title)

          ->with('count_2', $count_2)

          ->with('list_2', $list_2)
          ->with('list_khoa', $list_khoa)
          ->with('list_nhiemky', $list_nhiemky)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_vienchuc', $list_vienchuc)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_cv', $data['ma_cv'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k']) && isset($data['ma_nk'])) {
        $count_3 = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'quatrinhchucvu.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_qtcv', '<>', '2')
          ->select(DB::raw('count(quatrinhchucvu.ma_qtcv) as sum, nhiemky.ma_nk, khoa.ma_k'))
          ->groupBy('nhiemky.ma_nk', 'khoa.ma_k')
          ->get();
        $list_3 = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('nhiemky.ma_nk', $data['ma_nk'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_qtcv', '<>', '2')
          ->get();
        return view('thongke.thongke_qlqtcv')
          ->with('title', $title)

          ->with('count_3', $count_3)

          ->with('list_3', $list_3)
          ->with('list_khoa', $list_khoa)
          ->with('list_nhiemky', $list_nhiemky)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_vienchuc', $list_vienchuc)

          ->with('ma_k', $data['ma_k'])
          ->with('ma_nk', $data['ma_nk'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_cv']) && isset($data['ma_nk'])) {
        $count_4 = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'quatrinhchucvu.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_qtcv', '<>', '2')
          ->select(DB::raw('count(quatrinhchucvu.ma_qtcv) as sum, nhiemky.ma_nk, chucvu.ma_cv'))
          ->groupBy('nhiemky.ma_nk', 'chucvu.ma_cv')
          ->get();
        $list_4 = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('chucvu.ma_cv', $data['ma_cv'])
          ->where('nhiemky.ma_nk', $data['ma_nk'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_qtcv', '<>', '2')
          ->get();
        return view('thongke.thongke_qlqtcv')
          ->with('title', $title)

          ->with('count_4', $count_4)

          ->with('list_4', $list_4)
          ->with('list_khoa', $list_khoa)
          ->with('list_nhiemky', $list_nhiemky)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_vienchuc', $list_vienchuc)

          ->with('ma_cv', $data['ma_cv'])
          ->with('ma_nk', $data['ma_nk'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_k'])) {
        $count_5 = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'quatrinhchucvu.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_qtcv', '<>', '2')
          ->select(DB::raw('count(quatrinhchucvu.ma_qtcv) as sum, khoa.ma_k'))
          ->groupBy('khoa.ma_k')
          ->get();
        $list_5 = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('khoa.ma_k', $data['ma_k'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_qtcv', '<>', '2')
          ->get();
        return view('thongke.thongke_qlqtcv')
          ->with('title', $title)

          ->with('count_5', $count_5)

          ->with('list_5', $list_5)
          ->with('list_khoa', $list_khoa)
          ->with('list_nhiemky', $list_nhiemky)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_vienchuc', $list_vienchuc)

          ->with('ma_k', $data['ma_k'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_cv'])) {
        $count_6 = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'quatrinhchucvu.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_qtcv', '<>', '2')
          ->select(DB::raw('count(quatrinhchucvu.ma_qtcv) as sum, chucvu.ma_cv'))
          ->groupBy('chucvu.ma_cv')
          ->get();
        $list_6 = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('chucvu.ma_cv', $data['ma_cv'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_qtcv', '<>', '2')
          ->get();
        return view('thongke.thongke_qlqtcv')
          ->with('title', $title)

          ->with('count_6', $count_6)

          ->with('list_6', $list_6)
          ->with('list_khoa', $list_khoa)
          ->with('list_nhiemky', $list_nhiemky)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_vienchuc', $list_vienchuc)

          ->with('ma_cv', $data['ma_cv'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      } else if (isset($data['ma_nk'])) {
        $count_7 = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('vienchuc', 'vienchuc.ma_vc', '=', 'quatrinhchucvu.ma_vc')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('status_qtcv', '<>', '2')
          ->select(DB::raw('count(quatrinhchucvu.ma_qtcv) as sum, nhiemky.ma_nk'))
          ->groupBy('nhiemky.ma_nk')
          ->get();
        $list_7 = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
          ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
          ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
          ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
          ->where('nhiemky.ma_nk', $data['ma_nk'])
          ->where('status_vc', '<>', '2')
          ->where('status_vc', '<>', '3')
          ->where('status_vc', '<>', '4')
          ->where('status_vc', '<>', '5')
          ->where('status_qtcv', '<>', '2')
          ->get();
        return view('thongke.thongke_qlqtcv')
          ->with('title', $title)

          ->with('count_7', $count_7)

          ->with('list_7', $list_7)
          ->with('list_khoa', $list_khoa)
          ->with('list_nhiemky', $list_nhiemky)
          ->with('list_chucvu', $list_chucvu)
          ->with('list_vienchuc', $list_vienchuc)

          ->with('ma_nk', $data['ma_nk'])

          ->with('phanquyen_admin', $phanquyen_admin)
          ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
          ->with('phanquyen_qltt', $phanquyen_qltt)
          ->with('phanquyen_qlk', $phanquyen_qlk)
          ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
          ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
      }
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlqtcv_loc_1_pdf($ma_k, $ma_cv, $ma_nk)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('chucvu.ma_cv', $ma_cv)
        ->where('nhiemky.ma_nk', $ma_nk)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlqtcv_pdf', [
        'quatrinhchucvu' => $quatrinhchucvu,
        'list_vienchuc' => $list_vienchuc,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_1_excel($ma_k, $ma_cv, $ma_nk)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      return Excel::download(new ThongKeQLQTCV_1Export($ma_k, $ma_cv, $ma_nk), 'Qua-trinh-chuc-vu-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_1_word($ma_k, $ma_cv, $ma_nk){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $khoa = Khoa::find($ma_k);
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('chucvu.ma_cv', $ma_cv)
        ->where('nhiemky.ma_nk', $ma_nk)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $temp = new TemplateProcessor('public/word/quanly_qtcv.docx');
      $qtcv_arr = array();
      foreach($quatrinhchucvu as $key => $qtcv){
        $qtcv_arr[] = [
          'stt_qtcv' => $key+1, 
          'hoten_vc' => $qtcv->hoten_vc, 
          'user_vc' => $qtcv->user_vc, 
          'sdt_vc' => $qtcv->sdt_vc, 
          'ngaysinh_vc' => $qtcv->ngaysinh_vc, 
          'ten_cv' => $qtcv->ten_cv, 
          'batdau_nk' => $qtcv->batdau_nk, 
          'ketthuc_nk' => $qtcv->ketthuc_nk, 
          'soquyetdinh_qtcv' => $qtcv->soquyetdinh_qtcv, 
          'ngayky_qtcv' => $qtcv->ngayky_qtcv, 
          'ten_k' => $qtcv->ten_k
        ];
      };
      $temp->cloneRowAndSetValues('stt_qtcv', $qtcv_arr);
      $name_file = $khoa->ten_k;
      $temp->saveAs($name_file.'.docx');
      return response()->download($name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }

  public function thongke_qlqtcv_loc_2_pdf($ma_k, $ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('chucvu.ma_cv', $ma_cv)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlqtcv_pdf', [
        'quatrinhchucvu' => $quatrinhchucvu,
        'list_vienchuc' => $list_vienchuc,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_2_excel($ma_k, $ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      return Excel::download(new ThongKeQLQTCV_2Export($ma_k, $ma_cv), 'Qua-trinh-chuc-vu-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_2_word($ma_k, $ma_cv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $khoa = Khoa::find($ma_k);
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('chucvu.ma_cv', $ma_cv)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $temp = new TemplateProcessor('public/word/quanly_qtcv.docx');
      $qtcv_arr = array();
      foreach($quatrinhchucvu as $key => $qtcv){
        $qtcv_arr[] = [
          'stt_qtcv' => $key+1, 
          'hoten_vc' => $qtcv->hoten_vc, 
          'user_vc' => $qtcv->user_vc, 
          'sdt_vc' => $qtcv->sdt_vc, 
          'ngaysinh_vc' => $qtcv->ngaysinh_vc, 
          'ten_cv' => $qtcv->ten_cv, 
          'batdau_nk' => $qtcv->batdau_nk, 
          'ketthuc_nk' => $qtcv->ketthuc_nk, 
          'soquyetdinh_qtcv' => $qtcv->soquyetdinh_qtcv, 
          'ngayky_qtcv' => $qtcv->ngayky_qtcv, 
          'ten_k' => $qtcv->ten_k
        ];
      };
      $temp->cloneRowAndSetValues('stt_qtcv', $qtcv_arr);
      $name_file = $khoa->ten_k;
      $temp->saveAs($name_file.'.docx');
      return response()->download($name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }

  public function thongke_qlqtcv_loc_3_pdf($ma_k, $ma_nk)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('nhiemky.ma_nk', $ma_nk)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlqtcv_pdf', [
        'quatrinhchucvu' => $quatrinhchucvu,
        'list_vienchuc' => $list_vienchuc,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_3_excel($ma_k, $ma_nk)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      return Excel::download(new ThongKeQLQTCV_3Export($ma_k, $ma_nk), 'Qua-trinh-chuc-vu-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_3_word($ma_k, $ma_nk){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $khoa = Khoa::find($ma_k);
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('nhiemky.ma_nk', $ma_nk)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $temp = new TemplateProcessor('public/word/quanly_qtcv.docx');
      $qtcv_arr = array();
      foreach($quatrinhchucvu as $key => $qtcv){
        $qtcv_arr[] = [
          'stt_qtcv' => $key+1, 
          'hoten_vc' => $qtcv->hoten_vc, 
          'user_vc' => $qtcv->user_vc, 
          'sdt_vc' => $qtcv->sdt_vc, 
          'ngaysinh_vc' => $qtcv->ngaysinh_vc, 
          'ten_cv' => $qtcv->ten_cv, 
          'batdau_nk' => $qtcv->batdau_nk, 
          'ketthuc_nk' => $qtcv->ketthuc_nk, 
          'soquyetdinh_qtcv' => $qtcv->soquyetdinh_qtcv, 
          'ngayky_qtcv' => $qtcv->ngayky_qtcv, 
          'ten_k' => $qtcv->ten_k
        ];
      };
      $temp->cloneRowAndSetValues('stt_qtcv', $qtcv_arr);
      $name_file = $khoa->ten_k;
      $temp->saveAs($name_file.'.docx');
      return response()->download($name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }

  public function thongke_qlqtcv_loc_4_pdf($ma_cv, $ma_nk)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('chucvu.ma_cv', $ma_cv)
        ->where('nhiemky.ma_nk', $ma_nk)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlqtcv_pdf', [
        'quatrinhchucvu' => $quatrinhchucvu,
        'list_vienchuc' => $list_vienchuc,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_4_excel($ma_cv, $ma_nk)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      return Excel::download(new ThongKeQLQTCV_4Export($ma_cv, $ma_nk), 'Qua-trinh-chuc-vu-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_4_word($ma_cv, $ma_nk){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $chucvu = ChucVu::find($ma_cv);
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('chucvu.ma_cv', $ma_cv)
        ->where('nhiemky.ma_nk', $ma_nk)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $temp = new TemplateProcessor('public/word/quanly_qtcv.docx');
      $qtcv_arr = array();
      foreach($quatrinhchucvu as $key => $qtcv){
        $qtcv_arr[] = [
          'stt_qtcv' => $key+1, 
          'hoten_vc' => $qtcv->hoten_vc, 
          'user_vc' => $qtcv->user_vc, 
          'sdt_vc' => $qtcv->sdt_vc, 
          'ngaysinh_vc' => $qtcv->ngaysinh_vc, 
          'ten_cv' => $qtcv->ten_cv, 
          'batdau_nk' => $qtcv->batdau_nk, 
          'ketthuc_nk' => $qtcv->ketthuc_nk, 
          'soquyetdinh_qtcv' => $qtcv->soquyetdinh_qtcv, 
          'ngayky_qtcv' => $qtcv->ngayky_qtcv, 
          'ten_k' => $qtcv->ten_k
        ];
      };
      $temp->cloneRowAndSetValues('stt_qtcv', $qtcv_arr);
      $name_file = $chucvu->ten_cv;
      $temp->saveAs($name_file.'.docx');
      return response()->download($name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }

  public function thongke_qlqtcv_loc_5_pdf($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlqtcv_pdf', [
        'quatrinhchucvu' => $quatrinhchucvu,
        'list_vienchuc' => $list_vienchuc,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_5_excel($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      return Excel::download(new ThongKeQLQTCV_5Export($ma_k), 'Qua-trinh-chuc-vu-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_5_word($ma_k)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $khoa = Khoa::find($ma_k);
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('khoa.ma_k', $ma_k)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->orderBy('vienchuc.ma_vc', 'asc')
        ->get();
      $temp = new TemplateProcessor('public/word/quanly_qtcv.docx');
      $qtcv_arr = array();
      foreach ($quatrinhchucvu as $key => $qtcv) {
        $qtcv_arr[] = [
          'stt_qtcv' => $key + 1,
          'hoten_vc' => $qtcv->hoten_vc,
          'user_vc' => $qtcv->user_vc,
          'sdt_vc' => $qtcv->sdt_vc,
          'ngaysinh_vc' => $qtcv->ngaysinh_vc,
          'ten_cv' => $qtcv->ten_cv,
          'batdau_nk' => $qtcv->batdau_nk,
          'ketthuc_nk' => $qtcv->ketthuc_nk,
          'soquyetdinh_qtcv' => $qtcv->soquyetdinh_qtcv,
          'ngayky_qtcv' => $qtcv->ngayky_qtcv,
          'ten_k' => $qtcv->ten_k
        ];
      };
      $temp->cloneRowAndSetValues('stt_qtcv', $qtcv_arr);
      $name_file = $khoa->ten_k;
      $temp->saveAs($name_file . '.docx');
      return response()->download($name_file . '.docx');
    } else {
      return Redirect::to('/home');
    }
  }

  public function thongke_qlqtcv_loc_6_pdf($ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('chucvu.ma_cv', $ma_cv)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlqtcv_pdf', [
        'quatrinhchucvu' => $quatrinhchucvu,
        'list_vienchuc' => $list_vienchuc,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_6_excel($ma_cv)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      return Excel::download(new ThongKeQLQTCV_6Export($ma_cv), 'Qua-trinh-chuc-vu-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_6_word($ma_cv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $chucvu = ChucVu::find($ma_cv);
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('chucvu.ma_cv', $ma_cv)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $temp = new TemplateProcessor('public/word/quanly_qtcv.docx');
      $qtcv_arr = array();
      foreach($quatrinhchucvu as $key => $qtcv){
        $qtcv_arr[] = [
          'stt_qtcv' => $key+1, 
          'hoten_vc' => $qtcv->hoten_vc, 
          'user_vc' => $qtcv->user_vc, 
          'sdt_vc' => $qtcv->sdt_vc, 
          'ngaysinh_vc' => $qtcv->ngaysinh_vc, 
          'ten_cv' => $qtcv->ten_cv, 
          'batdau_nk' => $qtcv->batdau_nk, 
          'ketthuc_nk' => $qtcv->ketthuc_nk, 
          'soquyetdinh_qtcv' => $qtcv->soquyetdinh_qtcv, 
          'ngayky_qtcv' => $qtcv->ngayky_qtcv, 
          'ten_k' => $qtcv->ten_k
        ];
      };
      $temp->cloneRowAndSetValues('stt_qtcv', $qtcv_arr);
      $name_file = $chucvu->ten_cv;
      $temp->saveAs($name_file.'.docx');
      return response()->download($name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }

  public function thongke_qlqtcv_loc_7_pdf($ma_nk)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('nhiemky.ma_nk', $ma_nk)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $list_vienchuc = VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->get();
      $pdf = PDF::loadView('pdf.thongke_qlqtcv_pdf', [
        'quatrinhchucvu' => $quatrinhchucvu,
        'list_vienchuc' => $list_vienchuc,
      ]);
      return $pdf->stream();
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_7_excel($ma_nk)
  {
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if ($phanquyen_admin || $phanquyen_qlqtcv) {
      return Excel::download(new ThongKeQLQTCV_7Export($ma_nk), 'Qua-trinh-chuc-vu-vien-chuc.xlsx');
    } else {
      return Redirect::to('/home');
    }
  }
  public function thongke_qlqtcv_loc_7_word($ma_nk){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv){
      $nhiemky = NhiemKy::find($ma_nk);
      $quatrinhchucvu = VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('nhiemky.ma_nk', $ma_nk)
        ->where('status_vc', '<>', '2')
        ->where('status_vc', '<>', '3')
        ->where('status_vc', '<>', '4')
        ->where('status_vc', '<>', '5')
        ->where('status_qtcv', '<>', '2')
        ->get();
      $temp = new TemplateProcessor('public/word/quanly_qtcv.docx');
      $qtcv_arr = array();
      foreach($quatrinhchucvu as $key => $qtcv){
        $qtcv_arr[] = [
          'stt_qtcv' => $key+1, 
          'hoten_vc' => $qtcv->hoten_vc, 
          'user_vc' => $qtcv->user_vc, 
          'sdt_vc' => $qtcv->sdt_vc, 
          'ngaysinh_vc' => $qtcv->ngaysinh_vc, 
          'ten_cv' => $qtcv->ten_cv, 
          'batdau_nk' => $qtcv->batdau_nk, 
          'ketthuc_nk' => $qtcv->ketthuc_nk, 
          'soquyetdinh_qtcv' => $qtcv->soquyetdinh_qtcv, 
          'ngayky_qtcv' => $qtcv->ngayky_qtcv, 
          'ten_k' => $qtcv->ten_k
        ];
      };
      $temp->cloneRowAndSetValues('stt_qtcv', $qtcv_arr);
      $name_file = $nhiemky->batdau_nk.' - '.$nhiemky->ketthuc_nk;
      $temp->saveAs('Nhiệm kỳ '.$name_file.'.docx');
      return response()->download('Nhiệm kỳ '.$name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }
}
