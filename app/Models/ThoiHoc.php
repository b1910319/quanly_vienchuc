<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThoiHoc extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ma_l',
    'ngay_th',
    'lydo_th',
    'file_th',
    'status_th',
    'updated_th'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_th';
  protected $table = 'thoihoc';
}
