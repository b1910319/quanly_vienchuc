<?php

namespace App\Imports;

use App\Models\ThuongBinh;
use Maatwebsite\Excel\Concerns\ToModel;

class ThuongBinhImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new ThuongBinh([
      'ten_tb'     => $row[0],
      'mota_tb'     => $row[1],
    ]);
  }
}
