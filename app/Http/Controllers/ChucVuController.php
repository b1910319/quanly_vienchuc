<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Models\ChucVu;
use App\Models\DanToc;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;

class ChucVuController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function chucvu(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = ChucVu::orderBy('ma_cv', 'desc')
        ->get();
      $count = ChucVu::select(DB::raw('count(ma_cv) as sum'))->get();
      $count_status = ChucVu::select(DB::raw('count(ma_cv) as sum, status_cv'))
        ->groupBy('status_cv')
        ->get();
      return view('chucvu.chucvu')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_chucvu(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      $chucvu = new ChucVu();
      $chucvu->ten_cv = $data['ten_cv'];
      $chucvu->status_cv = $data['status_cv'];
      $chucvu->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/chucvu');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_chucvu($ma_cv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $chucvu = ChucVu::find($ma_cv);
      if($chucvu->status_cv == 1){
        $chucvu->status_cv = ChucVu::find($ma_cv)->update(['status_cv' => 0]);
      }elseif($chucvu->status_cv == 0){
        $chucvu->status_cv = ChucVu::find($ma_cv)->update(['status_cv' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_chucvu($ma_cv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = ChucVu::find($ma_cv);
      return view('chucvu.chucvu_edit')
        ->with('edit', $edit)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_chucvu(Request $request, $ma_cv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $chucvu = ChucVu::find($ma_cv);
      $chucvu->ten_cv = $data['ten_cv'];
      $chucvu->status_cv = $data['status_cv'];
      $chucvu->updated_cv = Carbon::now();
      $chucvu->save();
      return Redirect::to('chucvu');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_chucvu($ma_cv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      ChucVu::find($ma_cv)->delete();
      return Redirect::to('chucvu');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_all_chucvu(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = ChucVu::get();
      foreach($list as $key => $chucvu){
        $chucvu->delete();
      }
      return Redirect::to('chucvu');
    }else{
      return Redirect::to('/home');
    }
  }
}
