<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChauLuc extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_cl',
    'mota_cl',
    'status_cl',
    'updated_cl'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_cl';
  protected $table = 'chauluc';
}
