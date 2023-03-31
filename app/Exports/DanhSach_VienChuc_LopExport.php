<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DanhSach_VienChuc_LopExport implements FromQuery,WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  use Exportable;
  public function __construct(int $ma_l)
  {
    $this->ma_l = $ma_l;
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
      'Tên lớp'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('danhsach', 'danhsach.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('lop', 'danhsach.ma_l', '=', 'lop.ma_l')
    ->where('danhsach.ma_l', $this->ma_l)
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv','lop.ten_l');
  }
}
