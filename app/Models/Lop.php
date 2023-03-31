<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lop extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_dml',
    'ma_qg',
    'ten_l',
    'ngaybatdau_l',
    'ngayketthuc_l',
    'yeucau_l',
    'tencosodaotao_l',
    'nganhhoc_l',
    'trinhdodaotao_l',
    'nguonkinhphi_l',
    'diachidaotao_l',
    'noidunghoc_l',
    'emailcoso_l',
    'sdtcoso_l',
    'luotxem_l',
    'status_l',
    'updated_l'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_l';
  protected $table = 'lop';
}
