<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThoiGianNghiHuu extends Model
{
  use HasFactory;
  protected $fillable = [
    'thoigian_tgnh',
    'nam_tgnh',
    'nu_tgnh',
    'status_tgnh'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_tgnh';
  protected $table = 'thoigiannghihuu';
}
