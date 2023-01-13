<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TruongKhoaController extends Controller
{
  public function index(){
    return view('truongkhoa.thongtin.thongtin');
  }
}
