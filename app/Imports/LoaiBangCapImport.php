<?php

namespace App\Imports;

use App\Models\LoaiBangCap;
use Maatwebsite\Excel\Concerns\ToModel;

class LoaiBangCapImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new LoaiBangCap([
      'ten_lbc'     => $row[0],
    ]);
  }
}
