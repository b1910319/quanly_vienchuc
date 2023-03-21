<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ten_f',
    'file_f',
    'status_f',
    'updated_f'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_f';
  protected $table = 'file';
}
