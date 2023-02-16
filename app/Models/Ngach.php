<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngach extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_n',
    'maso_n',
    'sonamnangbac_n',
    'status_k',
    'updated_k'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_n';
  protected $table = 'ngach';
}
