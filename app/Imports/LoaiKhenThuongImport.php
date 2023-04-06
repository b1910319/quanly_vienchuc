<?php

namespace App\Imports;

use App\Models\LoaiKhenThuong;
use Maatwebsite\Excel\Concerns\ToModel;

class LoaiKhenThuongImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new LoaiKhenThuong([
      'ten_lkt'     => $row[0],
    ]);
  }
}
