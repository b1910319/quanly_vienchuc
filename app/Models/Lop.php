<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_dml',
    'ten_l',
    'ngaybatdau_l',
    'ngayketthuc_l',
    'tencosodaotao_l',
    'quocgiaodaotao_l',
    'nganhhoc_l',
    'trinhdodaotao_l',
    'nguonkinhphi_l',
    'diachidaotao_l',
    'emailcoso_l',
    'sdtcoso_l',
    'status_l',
    'updated_l'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_l';
  protected $table = 'lop';
}
