<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLCTTC_loc_1Export implements FromCollection, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function headings(): array {
    return [
      'Mã số viên chức',
      'Họ tên viên chức',
      'Email',
      'Số điện thoại',
      'Ngày sinh',
      'Khoa',
      'Chức vụ',
      'Tên người hướng dẫn', 
      'Email người hướng dẫn', 
      'Nội dung đào tạo',
      'Bằng được cấp', 
      'Ngày cấp bằng',
      'Xếp loại', 
      'Đề tài tốt nghiệp',
      'Ngày về nước',
      'Đánh giá của cơ sở'
    ];
  }
  public function collection()
  {
    return VienChuc::join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->join('chucvu', 'chucvu.ma_cv', '=', 'vienchuc.ma_cv')
      ->join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
      ->where('status_vc', '<>', '2')
      ->select('vienchuc.ma_vc','vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'chucvu.ten_cv', 'ketqua.tennguoihuongdan_kq', 'ketqua.emailnguoihuongdan_kq', 'ketqua.noidungaotao_kq', 'ketqua.bangduoccap_kq', 'ketqua.ngaycapbang_kq', 'ketqua.xeploai_kq', 'ketqua.detaitotnghiep_kq', 'ketqua.ngayvenuoc_kq', 'ketqua.danhgiacuacoso_kq')
      ->get();
  }
}
