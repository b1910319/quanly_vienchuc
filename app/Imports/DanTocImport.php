<?php

namespace App\Imports;

use App\Models\DanToc;
use Maatwebsite\Excel\Concerns\ToModel;

class DanTocImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new DanToc([
      'ten_dt'     => $row[0],
    ]);
  }
}
