<?php

namespace App\Imports;

use App\Models\TonGiao;
use Maatwebsite\Excel\Concerns\ToModel;

class TonGiaoImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new TonGiao([
      'ten_tg'     => $row[0],
    ]);
  }
}
