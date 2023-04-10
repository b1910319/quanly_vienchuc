<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLCTTC_GiaHan_Loc_8Export implements FromQuery,WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function __construct(int $ma_qg)
  {
    $this->ma_qg = $ma_qg;
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
      'Thời gian gia hạn', 
      'Lý do gia hạn',
      'Quốc gia'
    ];
  }
  public function query()
  {
    return VienChuc::join('giahan', 'giahan.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('lop', 'lop.ma_l', '=', 'giahan.ma_l')
    ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
    ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->where('status_gh', '<>', '2')
    ->where('lop.ma_qg', $this->ma_qg )
    ->where('status_gh', '<>', '2')
    ->where('status_vc', '<>', '2')
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'lop.ten_l', 'lop.ngaybatdau_l', 'lop.ngayketthuc_l', 'lop.tencosodaotao_l', 'lop.nganhhoc_l', 'lop.trinhdodaotao_l', 'lop.emailcoso_l', 'lop.sdtcoso_l', 'giahan.thoigian_gh', 'giahan.lydo_gh', 'quocgia.ten_qg' );
  }
}
