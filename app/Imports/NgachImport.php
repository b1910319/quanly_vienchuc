<?php

namespace App\Imports;

use App\Models\Ngach;
use Maatwebsite\Excel\Concerns\ToModel;

class NgachImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Ngach([
      'maso_n'     => $row[0],
      'ten_n'     => $row[1],
      'sonamnangbac_n'     => $row[2],
    ]);
  }
}
