<?php

namespace App\Imports;

use App\Models\LoaiKyLuat;
use Maatwebsite\Excel\Concerns\ToModel;

class LoaiKyLuatImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new LoaiKyLuat([
      'ten_lkl'     => $row[0],
    ]);
  }
}
