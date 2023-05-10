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
      'tunam_bc'     => $row[5],
      'dennam_bc'     => $row[6],
      'sobang_bc'     => $row[7],
      'ngaycap_bc'     => $row[8],
      'noicap_bc'     => $row[9],
      'xephang_bc'     => $row[10],
      'file_bc' => $row[11],
    ]);
  }
}
