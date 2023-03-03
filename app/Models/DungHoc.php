<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DungHoc extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_vc',
    'ma_l',
    'batdau_dh',
    'ketthuc_dh',
    'lydo_dh',
    'file_dh',
    'status_dh',
    'updated_dh'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_dh';
  protected $table = 'dunghoc';
}
