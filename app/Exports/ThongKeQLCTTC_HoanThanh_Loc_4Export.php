<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLCTTC_HoanThanh_Loc_4Export implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  public function __construct(int $ma_l, string $batdau_capbang, string $ketthuc_capbang )
  {
    $this->ma_l = $ma_l;
    $this->batdau_capbang = $batdau_capbang;
    $this->ketthuc_capbang = $ketthuc_capbang;
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
      'Tên người hướng dẫn', 
      'Email người hướng dẫn',
      'Bằng được cấp',
      'Ngày cấp bằng', 
      'Xếp loại', 
      'Đề tài tốt nghiệp', 
      'Ngày về nước', 
      'Đánh giá của cơ sở'
      
    ];
  }
  public function query()
  {
    return VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
    ->join('khoa', 'vienchuc.ma_k', '=', 'khoa.ma_k')
    ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
    ->where('status_kq', '<>', '2')
    ->where('lop.ma_l', $this->ma_l )
    ->whereBetween('ketqua.ngaycapbang_kq', [$this->batdau_capbang, $this->ketthuc_capbang])
    ->where('status_kq', '<>', '2')
    ->where('status_vc', '<>', '2')
    ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc', 'khoa.ten_k', 'lop.ten_l', 'lop.ngaybatdau_l', 'lop.ngayketthuc_l', 'lop.tencosodaotao_l', 'lop.nganhhoc_l', 'lop.trinhdodaotao_l', 'lop.emailcoso_l', 'lop.sdtcoso_l', 'ketqua.tennguoihuongdan_kq', 'ketqua.emailnguoihuongdan_kq', 'ketqua.bangduoccap_kq', 'ketqua.ngaycapbang_kq', 'ketqua.xeploai_kq', 'ketqua.detaitotnghiep_kq', 'ketqua.ngayvenuoc_kq', 'ketqua.danhgiacuacoso_kq');
  }
}
