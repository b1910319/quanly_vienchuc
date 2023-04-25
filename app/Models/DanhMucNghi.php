<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucNghi extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_dmn',
    'status_dmn',
    'updated_dmn'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_dmn';
  protected $table = 'danhmucnghi';
}
