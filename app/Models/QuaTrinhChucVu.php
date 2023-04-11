<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuaTrinhChucVu extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_nk',
    'ma_cv',
    'ma_vc',
    'ghichu_qtcv',
    'status_qtcv',
    'updated_qtcv'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_qtcv';
  protected $table = 'quatrinhchucvu';
}
