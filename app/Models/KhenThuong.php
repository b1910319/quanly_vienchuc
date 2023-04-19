<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhenThuong extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ma_lkt',
    'ma_htkt',
    'ngay_kt',
    'noidung_kt',
    'soquyetdinh_kt',
    'filequyetdinh_kt',
    'status_kt',
    'updated_kt'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_kt';
  protected $table = 'khenthuong';
}
