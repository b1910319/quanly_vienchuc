<?php

namespace App\Imports;

use App\Models\GiaDinh;
use Maatwebsite\Excel\Concerns\ToModel;

class GiaDinhImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new GiaDinh([
      'ma_vc'     => $row[0],
      'moiquanhe_gd'     => $row[1],
      'hoten_gd'     => $row[2],
      'sdt_gd'     => $row[3],
      'ngaysinh_gd'     => $row[4],
      'nghenghiep_gd'     => $row[5],
    ]);
  }
}
