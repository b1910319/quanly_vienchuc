<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLK_KhenThuong_Loc_6Export implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function __construct(int $ma_k, int $ma_htkt)
  {
    $this->ma_k = $ma_k;
    $this->ma_htkt = $ma_htkt;
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
      'Ngày khen thưởng',
      'Nội dung khen thưởng', 
      'Loại khen thưởng',
      'Hình thức khen thưởng',
      'Số quyết định'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('khenthuong', 'khenthuong.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
    ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
    ->where('vienchuc.ma_k', $this->ma_k)
    ->where('khenthuong.ma_htkt', $this->ma_htkt)
    ->where('status_vc', '<>', '2')
    ->where('status_kt', '<>', '2')
      ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv', 'khenthuong.ngay_kt', 'khenthuong.noidung_kt', 'loaikhenthuong.ten_lkt', 'hinhthuckhenthuong.ten_htkt', 'khenthuong.soquyetdinh_kt');
  }
}
