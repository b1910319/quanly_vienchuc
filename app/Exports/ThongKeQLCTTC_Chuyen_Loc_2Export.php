<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLCTTC_Chuyen_Loc_2Export implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function __construct(int $ma_k)
  {
    $this->ma_k = $ma_k;
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
      'Tên lớp', 
      'Ngày bắt đầu học',
      'Ngày kết thúc',
      'Tên cơ sở đào tạo',
      'Ngành học', 
      'Trình độ đào tạo', 
      'Email cơ sở đào tạo', 
      'Số điện thoại cơ sở', 
      'Nội dung xin chuyển',
      'Lý do xin chuyển'
    ];
  }
  public function query()
  {
    return VienChuc::join('chuyen', 'chuyen.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('lop', 'lop.ma_l', '=', 'chuyen.ma_l')
    ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->where('status_c', '<>', '2')
    ->where('khoa.ma_k', $this->ma_k )
    ->where('status_c', '<>', '2')
    ->where('status_vc', '<>', '2')
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'lop.ten_l', 'lop.ngaybatdau_l', 'lop.ngayketthuc_l', 'lop.tencosodaotao_l', 'lop.nganhhoc_l', 'lop.trinhdodaotao_l', 'lop.emailcoso_l', 'lop.sdtcoso_l', 'chuyen.noidung_c', 'chuyen.lydo_c' );
  }
}
