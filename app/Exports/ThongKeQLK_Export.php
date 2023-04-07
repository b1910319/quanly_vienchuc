<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLK_Export implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function __construct(int $ma_k)
  {
    $this->ma_k = $ma_k;
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
      'Ngạch'
    ];
  }
  public function query()
  {
    return VienChuc::join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
    ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
    ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
    ->where('vienchuc.ma_k', $this->ma_k)
    ->where('status_vc', '<>', '2')
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv', 'dantoc.ten_dt', 'tongiao.ten_tg', 'ngach.ten_n');
  }
}
