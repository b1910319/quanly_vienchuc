<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuongBinh extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_tb',
    'mota_tb',
    'status_tb',
    'updated_tb'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_tb';
  protected $table = 'thuongbinh';
}
