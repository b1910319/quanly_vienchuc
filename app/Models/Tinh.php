<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_t',
    'status_t',
    'updated_t'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_t';
  protected $table = 'tinh';
}
