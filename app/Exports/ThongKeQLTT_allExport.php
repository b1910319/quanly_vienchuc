<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLTT_allExport implements FromQuery,WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  use Exportable;

  public function __construct(int $ma_k, int $ma_cv, int $ma_hdt, int $ma_lbc, int $ma_n, int $ma_t, int $ma_dt, int $ma_tg, int $ma_tb)
  {
    $this->ma_k = $ma_k;
    $this->ma_cv = $ma_cv;
    $this->ma_hdt = $ma_hdt;
    $this->ma_lbc = $ma_lbc;
    $this->ma_n = $ma_n;
    $this->ma_t = $ma_t;
    $this->ma_dt = $ma_dt;
    $this->ma_tg = $ma_tg;
    $this->ma_tb = $ma_tb;
    return $this;
  }
  public function headings(): array {
    return [
      'Mã số viên chức',
      'Họ tên viên chức',
      'Email',
      'Số điện thoại',
      'Ngày sinh',
      'Khoa',
      'Chức vụ',
      'Hệ đào tạo', 
      'Loại bằng cấp', 
      'Ngạch',
      'Quê quán', 
      'Dân tộc',
      'Tôn giáo',
      'Thương binh'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
    ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
    ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
    ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
    ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
    ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
    ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
    ->where('status_vc', '<>', '2')
    ->where('vienchuc.ma_k', $this->ma_k)
    ->where('vienchuc.ma_cv', $this->ma_cv)
    ->where('bangcap.ma_hdt', $this->ma_hdt)
    ->where('bangcap.ma_lbc', $this->ma_lbc)
    ->where('vienchuc.ma_n', $this->ma_n)
    ->where('quequan.ma_t', $this->ma_t)
    ->where('vienchuc.ma_dt', $this->ma_dt)
    ->where('vienchuc.ma_tg', $this->ma_tg)
    ->where('vienchuc.ma_tb', $this->ma_tb)
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv', 'hedaotao.ten_hdt', 'loaibangcap.ten_lbc', 'ngach.ten_n', 'tinh.ten_t', 'dantoc.ten_dt', 'tongiao.ten_tg', 'thuongbinh.ten_tb');
  }
}
