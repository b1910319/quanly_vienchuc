<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLTT_3Export implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  use Exportable;
  public function __construct(int $ma_k, int $ma_hdt)
  {
    $this->ma_k = $ma_k;
    $this->ma_hdt = $ma_hdt;
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
      'Hệ đào tạo',
      'Loại bằng cấp',
      'Trình độ chuyên môn', 
      'Trường học',
      'Niên khoá', 
      'Số bằng', 
      'Ngày cấp', 
      'Nơi cấp',
      'Xếp loại'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
    ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
    ->where('status_vc', '<>', '2')
    ->where('vienchuc.ma_k', $this->ma_k)
    ->where('bangcap.ma_hdt', $this->ma_hdt)
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv', 'hedaotao.ten_hdt', 'loaibangcap.ten_lbc', 'bangcap.trinhdochuyenmon_bc', 'bangcap.truonghoc_bc', 'bangcap.nienkhoa_bc', 'bangcap.sobang_bc', 'bangcap.ngaycap_bc', 'bangcap.noicap_bc', 'bangcap.xephang_bc');
  }
}
