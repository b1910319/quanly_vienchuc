<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HieuTruongController extends Controller
{
  public function index(){
    return view('hieutruong.thongtin.thongtin');
  }
}
