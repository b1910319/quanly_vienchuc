<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLK_Loc_ChucVuExport implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function __construct(int $ma_k, int $ma_cv)
  {
    $this->ma_k = $ma_k;
    $this->ma_cv = $ma_cv;
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
      'Dân tộc', 
      'Tôn giáo', 
      'Ngạch',
      'Quê quán', 
      'Hạng thương binh'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
    ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
    ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
    ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
    ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
    ->where('status_vc', '<>', '2')
    ->where('vienchuc.ma_k', $this->ma_k)
    ->where('vienchuc.ma_cv', $this->ma_cv)
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv', 'dantoc.ten_dt', 'tongiao.ten_tg', 'ngach.ten_n', 'tinh.ten_t', 'thuongbinh.ten_tb');
  }
}
