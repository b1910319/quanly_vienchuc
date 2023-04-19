<?php

namespace App\Imports;

use App\Models\KyLuat;
use Maatwebsite\Excel\Concerns\ToModel;

class KyLuatImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new KyLuat([
      'ma_vc'     => $row[0],
      'ma_lkl'     => $row[1],
      'lydo_kl'     => $row[2],
      'ngay_kl'     => $row[3],
      'soquyetdinh_kl'     => $row[4],
    ]);
  }
}
