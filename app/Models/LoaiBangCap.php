<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiBangCap extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_lbc',
    'status_lbc',
    'updated_lbc'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_lbc';
  protected $table = 'loaibangcap';
}
