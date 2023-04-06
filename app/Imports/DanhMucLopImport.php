<?php

namespace App\Imports;

use App\Models\DanhMucLop;
use Maatwebsite\Excel\Concerns\ToModel;

class DanhMucLopImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new DanhMucLop([
      'ten_dml'     => $row[0],
    ]);
  }
}
