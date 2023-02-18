<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QueQuan extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_x',
    'ma_t',
    'ma_h',
    'ma_vc',
    'diachi_qq',
    'status_qq',
    'updated_qq'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_qq';
  protected $table = 'quequan';
}
