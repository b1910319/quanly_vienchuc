<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLCTTC_loc_allExport implements FromCollection, WithHeadings, ShouldAutoSize
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
      'Chức vụ'
    ];
  }
  public function collection()
  {
    return VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('giahan', 'giahan.ma_vc' , '=', 'vienchuc.ma_vc' )
      ->join('khoa', 'khoa.ma_k','=', 'vienchuc.ma_k')
      ->join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('chuyen', 'chuyen.ma_vc' , '=', 'vienchuc.ma_vc')
      ->join('thoihoc', 'thoihoc.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
      ->where('status_kq', '<>', '2')
      ->where('status_gh', '<>', '2')
      ->where('status_dh', '<>', '2')
      ->where('status_c', '<>', '2')
      ->where('status_th', '<>', '2')
      ->where('status_vc', '<>', '2')
      ->select('vienchuc.ma_vc','vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv')
      ->get();
  }
}
