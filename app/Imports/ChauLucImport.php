<?php

namespace App\Imports;

use App\Models\ChauLuc;
use Maatwebsite\Excel\Concerns\ToModel;

class ChauLucImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new ChauLuc([
      'ten_cl'     => $row[0],
      'mota_cl'     => $row[1],
    ]);
  }
}
