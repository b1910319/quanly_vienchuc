<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoiSinh extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_x',
    'ma_t',
    'ma_h',
    'ma_vc',
    'diachi_ns',
    'status_ns',
    'updated_ns'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_ns';
  protected $table = 'noisinh';
}
