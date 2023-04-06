<?php

namespace App\Imports;

use App\Models\Lop;
use Maatwebsite\Excel\Concerns\ToModel;

class LopImport implements ToModel
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */
  public function model(array $row)
  {
    return new Lop([
      'ma_dml'     => $row[0],
      'ma_qg'     => $row[1],
      'ten_l'     => $row[2],
      'ngaybatdau_l'     => $row[3],
      'ngayketthuc_l'     => $row[4],
      'yeucau_l'     => $row[5],
      'tencosodaotao_l'     => $row[6],
      'nganhhoc_l'     => $row[7],
      'trinhdodaotao_l'     => $row[8],
      'nguonkinhphi_l'     => $row[9],
      'diachidaotao_l'     => $row[10],
      'noidunghoc_l'     => $row[11],
      'emailcoso_l'     => $row[12],
      'sdtcoso_l'     => $row[13],
    ]);
  }
}
