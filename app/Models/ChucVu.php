<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_cv',
    'status_cv',
    'updated_cv'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_cv';
  protected $table = 'chucvu';
}
