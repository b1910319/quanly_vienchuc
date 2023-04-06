<?php

namespace App\Imports;

use App\Models\KhenThuong;
use Maatwebsite\Excel\Concerns\ToModel;

class KhenThuongImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new KhenThuong([
      'ma_vc'     => $row[0],
      'ma_lkt'     => $row[1],
      'ma_htkt'     => $row[2],
      'ngay_kt'     => $row[3],
      'noidung_kt'     => $row[4],
    ]);
  }
}
