<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_h',
    'ma_t',
    'status_h',
    'updated_h'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_h';
  protected $table = 'huyen';
}
