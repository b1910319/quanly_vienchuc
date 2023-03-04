<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuyen extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ma_l',
    'noidung_c',
    'lydo_c',
    'file_c',
    'status_c',
    'updated_c'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_c';
  protected $table = 'chuyen';
}
