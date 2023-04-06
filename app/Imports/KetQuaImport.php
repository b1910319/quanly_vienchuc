<?php

namespace App\Imports;

use App\Models\KetQua;
use Maatwebsite\Excel\Concerns\ToModel;

class KetQuaImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new KetQua([
      'ma_l'     => $row[0],
      'ma_vc'     => $row[1],
      'tennguoihuongdan_kq'     => $row[2],
      'emailnguoihuongdan_kq'     => $row[3],
      'noidungaotao_kq'     => $row[4],
      'bangduoccap_kq'     => $row[5],
      'ngaycapbang_kq'     => $row[6],
      'xeploai_kq'     => $row[7],
      'detaitotnghiep_kq'     => $row[8],
      'ngayvenuoc_kq'     => $row[9],
      'danhgiacuacoso_kq'     => $row[10],
      'kiennghi_kq'     => $row[11],
    ]);
  }
}
