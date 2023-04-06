<?php

namespace App\Imports;

use App\Models\KhuVuc;
use Maatwebsite\Excel\Concerns\ToModel;

class KhuVucImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new KhuVuc([
      'ma_cl'     => $row[0],
      'ten_kv'     => $row[1],
    ]);
  }
}
