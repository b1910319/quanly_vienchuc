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
      'batdau_nk'     => $row[0],
      'ketthuc_nk'     => $row[1],
    ]);
  }
}
