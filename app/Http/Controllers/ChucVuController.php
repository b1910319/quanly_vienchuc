<?php

namespace App\Http\Controllers;

use App\Imports\ChucVuImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\ChucVu;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

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
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý chức vụ";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
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
        ->with('title', $title)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('count_status', $count_status)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_ten_cv(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_cv = $request->ten_cv;
      if($ten_cv != null){
        $chucvu = ChucVu::where('ten_cv', $ten_cv)
          ->first();
        if(isset($chucvu)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_ten_cv_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_cv = $request->ten_cv;
      $ma_cv = $request->ma_cv;
      if($ten_cv != null && $ma_cv != null){
        $chucvu = ChucVu::where('ten_cv', $ten_cv)
          ->where('ma_cv', '<>', $ma_cv)
          ->first();
        if(isset($chucvu)){
          return 1;
        }else{
          return 0;
        }
      }
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
      $request->session()->put('message_add_chucvu','Thêm thành công');
      return Redirect::to('/chucvu');
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_chucvu_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      Excel::import(new ChucVuImport, $request->file('import_excel'));
      return redirect()->back();
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
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật thông tin chức vụ";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = ChucVu::find($ma_cv);
      return view('chucvu.chucvu_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
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
      $request->session()->put('message_update_chucvu','Cập nhật thành công');
      return Redirect::to('chucvu');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_chucvu(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          ChucVu::find($id)->delete();
        }
      }
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
  public function delete_chucvu_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_cv = $request->ma_cv;
      ChucVu::whereIn('ma_cv', $ma_cv)->delete();
      return redirect()->back();
    }
  }
}
