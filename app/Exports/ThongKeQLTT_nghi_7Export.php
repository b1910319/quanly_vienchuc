<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLTT_nghi_7Export implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  use Exportable;

  public function __construct(string $batdau, string $ketthuc)
  {
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
      'Danh mục nghỉ',
      'Bắt đầu nghỉ',
      'Số quyết định',
      'Ngày ký quyết định'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('quatrinhnghi', 'quatrinhnghi.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
    ->whereBetween('quatrinhnghi.batdau_qtn', [$this->batdau, $this->ketthuc])
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'danhmucnghi.ten_dmn', 'quatrinhnghi.batdau_qtn', 'quatrinhnghi.soquyetdinh_qtn', 'quatrinhnghi.ngaykyquyetdinh_qtn');
  }
}
