<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiKyLuat extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_lkl',
    'status_lkl',
    'updated_lkl'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_lkl';
  protected $table = 'loaikyluat';
}
