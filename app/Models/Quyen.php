<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_q',
    'mota_q',
    'status_q',
    'updated_q'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_q';
  protected $table = 'quyen';
}
