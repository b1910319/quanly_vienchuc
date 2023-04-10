<?php

namespace App\Exports;

use App\Models\VienChuc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ThongKeQLCTTC_HoanThanh_Loc_14Export implements FromQuery, WithHeadings, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */
  use Exportable;

  public function __construct(string $batdau_capbang, string $ketthuc_capbang, int $ma_qg)
  {
    $this->batdau_capbang = $batdau_capbang;
    $this->ma_qg = $ma_qg;
    $this->ketthuc_capbang = $ketthuc_capbang;
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
      'Tên người hướng dẫn',
      'Email người hướng dẫn', 
      'Nội dung đào tạo',
      'Bằng được cấp',
      'Ngày cấp bằng',
      'Xếp loại',
      'Đề tài tốt nghiệp',
      'Ngày về nước',
      'Đánh giá của cơ sở',
      'Kiến nghị',
      'Quốc gia'
    ];
  }
  public function query()
  {
    return VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->join('quocgia', 'quocgia.ma_qg', '=', 'lop.ma_qg')
      ->where('status_kq', '<>', '2')
      ->where('quocgia.ma_qg', $this->ma_qg)
      ->whereBetween('ketqua.ngaycapbang_kq', [$this->batdau_capbang, $this->ketthuc_capbang])
      ->where('status_kq', '<>', '2')
      ->where('status_vc', '<>', '2')
      ->select('vienchuc.ma_vc', 'vienchuc.hoten_vc', 'vienchuc.user_vc', 'vienchuc.sdt_vc', 'vienchuc.ngaysinh_vc','ketqua.tennguoihuongdan_kq', 'ketqua.emailnguoihuongdan_kq', 'ketqua.noidungaotao_kq', 'ketqua.bangduoccap_kq', 'ketqua.ngaycapbang_kq', 'ketqua.xeploai_kq', 'ketqua.detaitotnghiep_kq', 'ketqua.ngayvenuoc_kq', 'ketqua.danhgiacuacoso_kq', 'ketqua.kiennghi_kq', 'quocgia.ten_qg');
  }
}
