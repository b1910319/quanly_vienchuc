<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_k',
    'mota_k',
    'status_k',
    'updated_k'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_k';
  protected $table = 'khoa';
}
