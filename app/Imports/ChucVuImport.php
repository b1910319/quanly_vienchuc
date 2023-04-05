<?php

namespace App\Imports;

use App\Models\ChucVu;
use Maatwebsite\Excel\Concerns\ToModel;

class ChucVuImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new ChucVu([
      'ten_cv'     => $row[0],
    ]);
  }
}
