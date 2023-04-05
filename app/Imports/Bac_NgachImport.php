<?php

namespace App\Imports;

use App\Models\Bac;
use Maatwebsite\Excel\Concerns\ToModel;

class Bac_NgachImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Bac([
      'ma_n'     => $row[0],
      'ten_b'     => $row[1],
      'hesoluong_b'     => $row[2],
    ]);
  }
}
