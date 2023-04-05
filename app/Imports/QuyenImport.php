<?php

namespace App\Imports;

use App\Models\Quyen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class QuyenImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Quyen([
      'ten_q'     => $row[0],
      'mota_q'    => $row[1], 
    ]);
  }
}
