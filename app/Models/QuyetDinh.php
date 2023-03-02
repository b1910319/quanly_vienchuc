<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyetDinh extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ma_l',
    'so_qd',
    'ngayky_qd',
    'file_qd',
    'status_qd',
    'updated_qd'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_qd';
  protected $table = 'quyetdinh';
}
