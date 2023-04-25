<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuaTrinhNghi extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ma_dmn',
    'batdau_qtn',
    'ketthuc_qtn',
    'ghichu_qtn',
    'soquyetdinh_qtn',
    'ngaykyquyetdinh_qtn',
    'file_qtn',
    'filequyetdinh_qtn',
    'status_qtn',
    'updated_qtn'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_qtn';
  protected $table = 'quatrinhnghi';
}
