<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLKTKL_kl_7Export implements FromQuery,WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  use Exportable;
  public function __construct(string $batdau_kl,  string $ketthuc_kl)
  {
    $this->batdau_kl = $batdau_kl;
    $this->ketthuc_kl = $ketthuc_kl;
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
      'Loại kỷ luật', 
      'Ngày kỷ luật', 
      'Nội dung kỷ luật'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('kyluat', 'kyluat.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
    ->whereBetween('kyluat.ngay_kl', [$this->batdau_kl, $this->ketthuc_kl])
    ->where('status_vc', '<>', '2')
    ->where('status_kl', '<>', '2')
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv','loaikyluat.ten_lkl', 'kyluat.ngay_kl', 'kyluat.lydo_kl');
  }
}
