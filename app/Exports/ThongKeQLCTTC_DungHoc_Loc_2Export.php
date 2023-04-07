<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLCTTC_DungHoc_Loc_2Export implements FromQuery,WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function __construct(int $ma_l, string $batdau_dunghoc, string $ketthuc_dunghoc)
  {
    $this->ma_l = $ma_l;
    $this->batdau_dunghoc = $batdau_dunghoc;
    $this->ketthuc_dunghoc = $ketthuc_dunghoc;
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
      'Bắt đầu dừng học',
      'Kết thúc dừng học', 
      'Lý do dừng học'
    ];
  }
  public function query()
  {
    return VienChuc::join('dunghoc', 'dunghoc.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('lop', 'lop.ma_l', '=', 'dunghoc.ma_l')
    ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->where('status_dh', '<>', '2')
    ->where('lop.ma_l', $this->ma_l )
    ->whereBetween('dunghoc.batdau_dh', [$this->batdau_dunghoc, $this->ketthuc_dunghoc])
    ->where('status_dh', '<>', '2')
    ->where('status_vc', '<>', '2')
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'lop.ten_l', 'lop.ngaybatdau_l', 'lop.ngayketthuc_l', 'lop.tencosodaotao_l', 'lop.nganhhoc_l', 'lop.trinhdodaotao_l', 'lop.emailcoso_l', 'lop.sdtcoso_l', 'dunghoc.batdau_dh', 'dunghoc.ketthuc_dh', 'dunghoc.lydo_dh' );
  }
}
