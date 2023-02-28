<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucLop extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_dml',
    'status_dml',
    'updated_dml'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_dml';
  protected $table = 'danhmuclop';
}
