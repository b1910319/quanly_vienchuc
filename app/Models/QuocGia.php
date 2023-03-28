<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuocGia extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_qg',
    'status_qg',
    'updated_qg'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_qg';
  protected $table = 'quocgia';
}
