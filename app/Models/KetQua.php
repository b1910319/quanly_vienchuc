<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KetQua extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_l',
    'ma_vc',
    'tennguoihuongdan_kq',
    'emailnguoihuongdan_kq',
    'noidungaotao_kq',
    'bangduoccap_kq',
    'ngaycapbang_kq',
    'xeploai_kq',
    'detaitotnghiep_kq',
    'ngayvenuoc_kq',
    'danhgiacuacoso_kq',
    'kiennghi_kq',
    'status_kq',
    'updated_kq'

  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_kq';
  protected $table = 'ketqua';
}
