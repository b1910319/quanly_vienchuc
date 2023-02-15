<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanToc extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_dt',
    'status_dt',
    'updated_dt'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_dt';
  protected $table = 'dantoc';
}
