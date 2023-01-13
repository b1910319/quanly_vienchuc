<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VienChucController extends Controller
{
  public function index(){
    return view('vienchuc.hoso');
  }
}
