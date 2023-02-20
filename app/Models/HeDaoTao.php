<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeDaoTao extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_hdt',
    'status_hdt',
    'updated_hdt'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_hdt';
  protected $table = 'hedaotao';
}
