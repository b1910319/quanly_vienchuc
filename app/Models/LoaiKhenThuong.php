<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiKhenThuong extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_lkt',
    'status_lkt',
    'updated_lkt'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_lkt';
  protected $table = 'loaikhenthuong';
}
