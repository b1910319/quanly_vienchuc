<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_q',
    'ma_vc',
    'status_pq',
    'updated_pq'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'created_pq';
  // Gắn incrementing thành false, vì table của ta ko có khóa chính và ko tăng dần.
  public $incrementing = false;
  protected $table = 'phanquyen';
}
