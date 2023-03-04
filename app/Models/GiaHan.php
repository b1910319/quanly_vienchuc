<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaHan extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ma_l',
    'thoigian_gh',
    'lydo_gh',
    'file_gh',
    'status_gh',
    'updated_gh'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_gh';
  protected $table = 'giahan';
}
