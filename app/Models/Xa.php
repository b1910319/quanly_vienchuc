<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xa extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_x',
    'ma_h',
    'status_x',
    'updated_x'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_x';
  protected $table = 'xa';
}
