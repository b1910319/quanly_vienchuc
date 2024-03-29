<?php

namespace App\Http\Controllers;

use App\Imports\ChauLucImport;
use App\Models\ChauLuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ChauLucController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function chauluc(){
    $this->check_login();
    $title = "Quản lý châu lục";
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $count = ChauLuc::select(DB::raw('count(ma_cl) as sum'))->get();
      $count_status = ChauLuc::select(DB::raw('count(ma_cl) as sum, status_cl'))->groupBy('status_cl')->get();
      $list = ChauLuc::orderBy('ma_cl', 'desc')
        ->get();
      $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
        ->where('ma_q', '=', '8')
        ->first();
      $count_khuvuc_chauluc = ChauLuc::leftJoin('khuvuc', 'chauluc.ma_cl', '=', 'khuvuc.ma_cl')
        ->select(DB::raw('count(ma_kv) as sum, chauluc.ma_cl'))
        ->groupBy('chauluc.ma_cl')
        ->get();
      return view('chauluc.chauluc')
        ->with('count', $count)
        ->with('title', $title)

        ->with('count_status', $count_status)
        ->with('count_khuvuc_chauluc', $count_khuvuc_chauluc)

        ->with('list', $list)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
    
  }
  public function check_ten_cl(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_cl = $request->ten_cl;
      if($ten_cl != null){
        $chauluc = ChauLuc::where('ten_cl', $ten_cl)
          ->first();
        if(isset($chauluc)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_ten_cl_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_cl = $request->ten_cl;
      $ma_cl = $request->ma_cl;
      if($ten_cl != null && $ma_cl != null){
        $chauluc = ChauLuc::where('ten_cl', $ten_cl)
          ->where('ma_cl', '<>', $ma_cl)
          ->first();
        if(isset($chauluc)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_chauluc(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $data = $request->all();
      $chauluc = new chauluc();
      $chauluc->ten_cl = $data['ten_cl'];
      $chauluc->mota_cl = $data['mota_cl'];
      $chauluc->status_cl = $data['status_cl'];
      $chauluc->save();
      $request->session()->put('message_add_chauluc','Thêm thành công');
      return Redirect::to('/chauluc');
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_chauluc_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Excel::import(new ChauLucImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }

  public function select_chauluc($ma_cl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $chauluc = ChauLuc::find($ma_cl);
      if($chauluc->status_cl == 1){
        $chauluc->status_cl = ChauLuc::find($ma_cl)->update(['status_cl' => 0]);
      }elseif($chauluc->status_cl == 0){
        $chauluc->status_cl = ChauLuc::find($ma_cl)->update(['status_cl' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_chauluc($ma_cl){
    $this->check_login();
    $title = "Cập nhật thông tin chauluc";
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $edit = ChauLuc::find($ma_cl);
      $ma_vc = session()->get('ma_vc');
      return view('chauluc.chauluc_edit')
        ->with('title', $title)
        ->with('edit', $edit)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_chauluc(Request $request, $ma_cl){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $chauluc = ChauLuc::find($ma_cl);
      $chauluc->ten_cl = $data['ten_cl'];
      $chauluc->mota_cl = $data['mota_cl'];
      $chauluc->status_cl = $data['status_cl'];
      $chauluc->updated_cl = Carbon::now();
      $chauluc->save();
      $request->session()->put('message_update_chauluc','Cập nhật thành công');
      return Redirect::to('chauluc');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_chauluc(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          ChauLuc::find($id)->delete();
        }
      }
    }
  }
  public function delete_chauluc_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_cl = $request->ma_cl;
      ChauLuc::whereIn('ma_cl', $ma_cl)->delete();
      return Redirect::to('chauluc');
    }
  }
  public function delete_all_chauluc(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = ChauLuc::get();
      foreach($list as $key => $chauluc){
        $chauluc->delete();
      }
      return Redirect::to('chauluc');
    }else{
      return Redirect::to('/home');
    }
  }
}
