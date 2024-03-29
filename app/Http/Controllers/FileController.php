<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;

class FileController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function file(){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thông tin file";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = File::orderBy('ma_f', 'desc')
        ->get();
      $count = File::select(DB::raw('count(ma_f) as sum'))
        ->get();
      $count_status = File::select(DB::raw('count(ma_f) as sum, status_f'))
        ->groupBy('status_f')
        ->get();
      return view('file.file')
        ->with('count', $count)
        ->with('count_status', $count_status)

        ->with('list', $list)

        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)

        ->with('title', $title);
    }
  }
  public function check_ten_f(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_f = $request->ten_f;
      if($ten_f != null){
        $file = File::where('ten_f', $ten_f)
          ->first();
        if(isset($file)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_ten_f_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_f = $request->ten_f;
      $ma_f = $request->ma_f;
      if($ten_f != null && $ma_f != null){
        $file = File::where('ten_f', $ten_f)
          ->where('ma_f', '<>', $ma_f)
          ->first();
        if(isset($file)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_file(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      $file = new File();
      $file->ten_f = $data['ten_f'];
      $file->status_f = $data['status_f'];
      $file->ma_vc = $ma_vc;
      $get_file = $request->file('file_f');
      if($get_file){
        $new_file = $file->ten_f.rand(0,99).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/file', $new_file);
        $file->file_f = $new_file;
      }
      $file->save();
      $request->session()->put('message_add_file','Thêm thành công');
      return Redirect::to('/file');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_file($ma_f){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $file = File::find($ma_f);
      if($file->status_f == 1){
        $file->status_f = File::find($ma_f)->update(['status_f' => 0]);
      }elseif($file->status_f == 0){
        $file->status_f = File::find($ma_f)->update(['status_f' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_file($ma_f){
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
    $title = "Cập nhật thông tin quyết định";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin){
      $edit = File::find($ma_f);
      return view('file.file_edit')
        ->with('edit', $edit)

        ->with('title', $title)


        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_file(Request $request, $ma_f){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $file = File::find($ma_f);
      $file->ten_f = $data['ten_f'];
      $file->status_f = $data['status_f'];
      $file->ma_vc = $ma_vc;
      $get_file = $request->file('file_f');
      if($get_file){
        $new_image = time().rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($file->file_f != NULL){
          unlink('public/uploads/file/'.$file->file_f);
        }
        $get_file->move('public/uploads/file', $new_image);
        $file->file_f = $new_image;
      }
      $file->updated_f = Carbon::now();
      $file->save();
      $request->session()->put('message_update_file','Cập nhật thành công');
      return Redirect::to('file');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_file(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      if($request->ajax()){
        $ma_f =$request->ma_f;
        if($ma_f != null){
          $file = file::find($ma_f);
          if($file->file_f != NULL){
            unlink('public/uploads/file/'.$file->file_f);
          }
          $file->delete();
        }
      }
    }
  }
  public function delete_all_file(){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $list = File::get();
      foreach($list as $key => $file){
        if($file->file_f != ' '){
          unlink('public/uploads/file/'.$file->file_f);
        }
        $file->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function file_luottai(Request $request){
    $this->check_login();
    if($request->ajax()){
      $id =$request->id;
      if($id != null){
        $file = File::find($id);
        $file->luottai_f = $file->luottai_f + 1;
        $file->save();
      }
    }
  }
  public function delete_file_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin){
      $ma_f = $request->ma_f;
      $list = File::whereIn('ma_f', $ma_f)
        ->get();
      foreach($list as $key => $file){
        if($file->file_f != ' '){
          unlink('public/uploads/file/'.$file->file_f);
        }
        $file->delete();
      }
      return redirect()->back();
    }
  }
}
