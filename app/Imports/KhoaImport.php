<?php

namespace App\Imports;

use App\Models\Khoa;
use Maatwebsite\Excel\Concerns\ToModel;

class KhoaImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Khoa([
      'ten_k'     => $row[0],
      'mota_k'    => $row[1], 
    ]);
  }
}
