<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VienChuc extends Model
{
  use HasFactory;
  protected $fillable = [
    'ma_k',
    'ma_cv',
    'ma_n',
    'ma_b',
    'ma_dt',
    'ma_tg',
    'ma_tb',
    'user_vc',
    'pass_vc',
    'hoten_vc',
    'hinh_vc',
    'tenkhac_vc',
    'ngaysinh_vc',
    'gioitinh_vc',
    'thuongtru_vc',
    'hientai_vc',
    'nghekhiduoctuyen_vc',
    'ngaytuyendung_vc',
    'congviecchinhgiao_vc',
    'phucap_vc',
    'trinhdophothong_vc',
    'chinhtri_vc',
    'quanlynhanuoc_vc',
    'ngoaingu_vc',
    'tinhoc_vc',
    'ngayvaodang_vc',
    'ngaychinhthuc_vc',
    'ngaynhapngu_vc',
    'ngayxuatngu_vc',
    'quanham_vc',
    'danhhieucao_vc',
    'sotruong_vc',
    'chieucao_vc',
    'cannang_vc',
    'nhommau_vc',
    'chinhsach_vc',
    'cccd_vc',
    'ngaycapcccd_vc',
    'bhxh_vc',
    'lichsubanthan1_vc',
    'lichsubanthan2_vc',
    'lichsubanthan3_vc',
    'ngaybatdaulamviec_vc',
    'thoigiannghi_vc',
    'status_vc',
    'ngayhuongbac_vc',
    'updated_vc'
  ];
  public $timestamps = false; 
  protected $primaryKey = 'ma_vc';
  protected $table = 'vienchuc';
}
