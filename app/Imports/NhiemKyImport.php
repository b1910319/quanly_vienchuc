<?php

namespace App\Imports;

use App\Models\NhiemKy;
use Maatwebsite\Excel\Concerns\ToModel;

class NhiemKyImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new NhiemKy([
      'ten_nk'     => $row[0],
    ]);
  }
}
