<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaDinh extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'moiquanhe_gd',
    'hoten_gd',
    'sdt_gd',
    'ngaysinh_gd',
    'nghenghiep_gd',
    'status_gd',
    'updated_gd'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_gd';
  protected $table = 'giadinh';
}
