<?php

namespace App\Imports;

use App\Models\VienChuc;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class Admin_VienChuc_KhoaImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new VienChuc([
      'hoten_vc'     => $row[0],
      'user_vc'    => $row[1], 
      'pass_vc' => md5($row[2]),
      'ma_k' => $row[3],
    ]);
  }
}
