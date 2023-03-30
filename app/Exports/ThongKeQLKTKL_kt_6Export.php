<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLKTKL_kt_6Export implements FromQuery,WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  use Exportable;

  public function __construct( int $ma_k, string $batdau_kt, string $ketthuc_kt)
  {
    $this->ma_k = $ma_k;
    $this->batdau_kt = $batdau_kt;
    $this->ketthuc_kt = $ketthuc_kt;
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
      'Loại khen thưởng', 
      'Hình thức khen thưởng', 
      'Ngày khen thưởng', 
      'Nội dung khen thưởng'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
    ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
    ->where('vienchuc.ma_k', $this->ma_k)
    ->whereBetween('khenthuong.ngay_kt', [$this->batdau_kt, $this->ketthuc_kt])
    ->where('status_vc', '<>', '2')
    ->where('status_kt', '<>', '2')
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv','loaikhenthuong.ten_lkt', 'hinhthuckhenthuong.ten_htkt', 'khenthuong.ngay_kt', 'khenthuong.noidung_kt');
  }
}
