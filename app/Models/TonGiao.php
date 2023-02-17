<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TonGiao extends Model
{
  use HasFactory;
  protected $fillable = [
    'ten_tg',
    'status_tg',
    'updated_tg'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_tg';
  protected $table = 'tongiao';
}
