<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuVuc extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_cl',
    'ten_kv',
    'status_kv',
    'updated_kv'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_kv';
  protected $table = 'khuvuc';
}
