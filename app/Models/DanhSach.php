<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSach extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_l',
    'ma_vc',
    'status_ds',
    'updated_ds'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'created_ds';
  // Gắn incrementing thành false, vì table của ta ko có khóa chính và ko tăng dần.
  public $incrementing = false;
  protected $table = 'danhsach';
}
