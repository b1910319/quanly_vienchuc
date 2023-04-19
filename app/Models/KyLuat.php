<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KyLuat extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ma_lkl',
    'ngay_kl',
    'lydo_kl',
    'soquyetdinh_kl',
    'filequyetdinh_kl',
    'status_kl',
    'updated_kl'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_kl';
  protected $table = 'kyluat';
}
