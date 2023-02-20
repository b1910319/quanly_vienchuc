<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangCap extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ma_hdt',
    'ma_lbc',
    'trinhdochuyenmon_bc',
    'truonghoc_bc',
    'nienkhoa_bc',
    'sobang_bc',
    'ngaycap_bc',
    'noicap_bc',
    'xephang_bc',
    'status_bc',
    'updated_bc'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_bc';
  protected $table = 'bangcap';
}
