<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLTT_nghihuu_allExport implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  use Exportable;

  public function __construct(int $ma_k, string $batdau, string $ketthuc)
  {
    $this->ma_k = $ma_k;
    $this->batdau = $batdau;
    $this->ketthuc = $ketthuc;
    return $this;
  }
  public function headings(): array
  {
    return [
      'Mã số viên chức',
      'Họ tên viên chức',
      'Email',
      'Số điện thoại',
      'Ngày sinh',
      'Khoa',
      'Chức vụ',
      'Ngày nghĩ hưu'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->where('status_vc', '2')
    ->where('vienchuc.ma_k', $this->ma_k)
    ->whereBetween('vienchuc.thoigiannghi_vc', [$this->batdau, $this->ketthuc])
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv','vienchuc.thoigiannghi_vc');
  }
}
