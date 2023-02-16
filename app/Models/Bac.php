<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bac extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_n',
    'ten_b',
    'hesoluong_b',
    'status_b',
    'updated_b'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_b';
  protected $table = 'bac';
}
