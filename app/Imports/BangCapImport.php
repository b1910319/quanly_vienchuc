<?php

namespace App\Imports;

use App\Models\BangCap;
use Maatwebsite\Excel\Concerns\ToModel;

class BangCapImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new BangCap([
      'ma_vc'     => $row[0],
      'ma_hdt'     => $row[1],
      'ma_lbc'     => $row[2],
      'trinhdochuyenmon_bc'     => $row[3],
      'truonghoc_bc'     => $row[4],
      'nienkhoa_bc'     => $row[5],
      'sobang_bc'     => $row[6],
      'ngaycap_bc'     => $row[7],
      'noicap_bc'     => $row[8],
      'xephang_bc'     => $row[9],
    ]);
  }
}
