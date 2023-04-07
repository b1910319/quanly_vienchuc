<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLK_Loc_HdtExport implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function __construct(int $ma_k, int $ma_hdt)
  {
    $this->ma_k = $ma_k;
    $this->ma_hdt = $ma_hdt;
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
      'Dân tộc', 
      'Tôn giáo', 
      'Ngạch',
      'Hệ đào tạo', 
      'Loại bằng cấp', 
      'Trình độ chuyên môn',
      'Trường học', 
      'Niên khoá', 
      'Số bằng', 
      'Ngày cấp bằng', 
      'Nơi cập', 
      'Xếp loại',
      'Quê quán', 
      'Hạng thương binh'
    ];
  }
  public function query()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
    ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
    ->join('bangcap','bangcap.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
    ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
    ->join('ngach', 'ngach.ma_n', '=', 'vienchuc.ma_n')
    ->join('quequan', 'quequan.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('tinh', 'tinh.ma_t', '=', 'quequan.ma_t')
    ->join('dantoc', 'dantoc.ma_dt', '=', 'vienchuc.ma_dt')
    ->join('tongiao', 'tongiao.ma_tg', '=', 'vienchuc.ma_tg')
    ->join('thuongbinh', 'thuongbinh.ma_tb', '=', 'vienchuc.ma_tb')
    ->where('status_vc', '<>', '2')
    ->where('vienchuc.ma_k', $this->ma_k)
    ->where('bangcap.ma_hdt', $this->ma_hdt)
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv', 'dantoc.ten_dt', 'tongiao.ten_tg', 'ngach.ten_n', 'hedaotao.ten_hdt', 'loaibangcap.ten_lbc','bangcap.trinhdochuyenmon_bc', 'bangcap.truonghoc_bc', 'bangcap.nienkhoa_bc', 'bangcap.sobang_bc', 'bangcap.ngaycap_bc', 'bangcap.noicap_bc', 'bangcap.xephang_bc', 'tinh.ten_t', 'thuongbinh.ten_tb');
  }
}
