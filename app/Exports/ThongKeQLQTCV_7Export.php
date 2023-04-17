<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLQTCV_7Export implements FromQuery,WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  use Exportable;
  public function __construct(int $ma_nk)
  {
    $this->ma_nk = $ma_nk;
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
      'Từ năm',
      'Đến năm',
      'Số quyết định',
      'Ngày ký quyết định'
    ];
  }
  public function query()
  {
    return VienChuc::join('quatrinhchucvu', 'quatrinhchucvu.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
    ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->where('nhiemky.ma_nk', $this->ma_nk)
    ->where('status_vc', '<>', '2')
    ->where('status_qtcv', '<>', '2')
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv','nhiemky.batdau_nk' , 'nhiemky.ketthuc_nk', 'quatrinhchucvu.soquyetdinh_qtcv', 'quatrinhchucvu.ngayky_qtcv');
  }
}
