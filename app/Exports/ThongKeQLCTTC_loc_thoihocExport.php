<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLCTTC_loc_thoihocExport implements FromCollection, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function headings(): array {
    return [
      'Mã số viên chức',
      'Họ tên viên chức',
      'Email',
      'Số điện thoại',
      'Ngày sinh',
      'Khoa',
      'Chức vụ',
      'Ngày thôi học',
      'Lý do thôi học'
    ];
  }
  public function collection()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
      ->join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
      ->where('status_vc', '<>', '2')
      ->select('vienchuc.ma_vc','vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv', 'thoihoc.ngay_th', 'thoihoc.lydo_th')
      ->get();
  }
}
