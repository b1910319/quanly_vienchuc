<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLK_Loc_TonGiaoExport implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function __construct(int $ma_k, int $ma_tg)
  {
    $this->ma_k = $ma_k;
    $this->ma_tg = $ma_tg;
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
      'Tôn giáo'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
    ->where('status_vc', '<>', '2')
    ->where('vienchuc.ma_k', $this->ma_k)
    ->where('vienchuc.ma_tg', $this->ma_tg)
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv', 'tongiao.ten_tg');
  }
}
