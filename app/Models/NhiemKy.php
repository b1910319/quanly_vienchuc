<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhiemKy extends Model
{
  use HasFactory;
  protected $fillable = [
    'batdau_nk',
    'ketthuc_nk',
    'status_nk',
    'updated_nk'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_nk';
  protected $table = 'nhiemky';
}
