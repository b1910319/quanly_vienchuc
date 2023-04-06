<?php

namespace App\Imports;

use App\Models\HinhThucKhenThuong;
use Maatwebsite\Excel\Concerns\ToModel;

class HinhThucKhenThuongImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new HinhThucKhenThuong([
      'ten_htkt'     => $row[0],
    ]);
  }
}
