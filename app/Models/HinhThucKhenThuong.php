<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhThucKhenThuong extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_htkt',
    'status_htkt',
    'updated_htkt'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_htkt';
  protected $table = 'hinhthuckhenthuong';
}
