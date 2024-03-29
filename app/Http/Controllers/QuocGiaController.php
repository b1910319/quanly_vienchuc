<?php

namespace App\Http\Controllers;

use App\Imports\QuocGiaImport;
use App\Models\KhuVuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QuocGia;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class QuocGiaController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function quocgia($ma_kv){
    $this->check_login();
    $title = "Quản lý";
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
      $count = QuocGia::select(DB::raw('count(ma_qg) as sum'))
        ->where('ma_kv', $ma_kv)
        ->get();
      $count_status = QuocGia::select(DB::raw('count(ma_qg) as sum, status_qg'))
        ->where('ma_kv', $ma_kv)
        ->groupBy('status_qg')
        ->get();
      $list = QuocGia::orderBy('ma_qg', 'desc')
        ->where('ma_kv', $ma_kv)
        ->get();
      $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
        ->where('ma_q', '=', '8')
        ->first();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $khuvuc = KhuVuc::find($ma_kv);
      return view('quocgia.quocgia')
        ->with('count', $count)
        ->with('title', $title)
        ->with('khuvuc', $khuvuc)

        ->with('count_status', $count_status)
        ->with('count_nangbac', $count_nangbac)

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
  public function check_ten_qg(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_qg = $request->ten_qg;
      if($ten_qg != null){
        $quocgia = QuocGia::where('ten_qg', $ten_qg)
          ->first();
        if(isset($quocgia)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_ten_qg_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_qg = $request->ten_qg;
      $ma_qg = $request->ma_qg;
      if($ten_qg != null && $ma_qg != null){
        $quocgia = QuocGia::where('ten_qg', $ten_qg)
          ->where('ma_qg', '<>', $ma_qg)
          ->first();
        if(isset($quocgia)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_quocgia(Request $request){
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
      $quocgia = new QuocGia();
      $quocgia->ma_kv = $data['ma_kv'];
      $quocgia->ten_qg = $data['ten_qg'];
      $quocgia->status_qg = $data['status_qg'];
      $quocgia->save();
      $request->session()->put('message_add_quocgia','Thêm thành công');
      return Redirect::to('/quocgia/'.$data['ma_kv']);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_quocgia_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Excel::import(new QuocGiaImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }

  public function select_quocgia($ma_qg){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $quocgia = QuocGia::find($ma_qg);
      if($quocgia->status_qg == 1){
        $quocgia->status_qg = QuocGia::find($ma_qg)->update(['status_qg' => 0]);
      }elseif($quocgia->status_qg == 0){
        $quocgia->status_qg = QuocGia::find($ma_qg)->update(['status_qg' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_quocgia($ma_qg){
    $this->check_login();
    $title = "Cập nhật thông tin quocgia";
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
      $edit = QuocGia::find($ma_qg);
      $ma_vc = session()->get('ma_vc');
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_khuvuc = KhuVuc::orderBy('ten_kv', 'asc')
        ->where('status_kv', '<>', '1')
        ->get();
      return view('quocgia.quocgia_edit')
        ->with('title', $title)
        ->with('edit', $edit)

        ->with('count_nangbac', $count_nangbac)

        ->with('list_khuvuc', $list_khuvuc)

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
  public function update_quocgia(Request $request, $ma_qg){
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
      $quocgia = QuocGia::find($ma_qg);
      $quocgia->ma_kv = $data['ma_kv'];
      $quocgia->ten_qg = $data['ten_qg'];
      $quocgia->status_qg = $data['status_qg'];
      $quocgia->updated_qg = Carbon::now();
      $quocgia->save();
      $request->session()->put('message_update_quocgia','Cập nhật thành công');
      return Redirect::to('/quocgia/'.$data['ma_kv']);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_quocgia(Request $request){
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
          QuocGia::find($id)->delete();
        }
      }
    }
  }
  public function delete_quocgia_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_qg = $request->ma_qg;
      QuocGia::whereIn('ma_qg', $ma_qg)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_quocgia($ma_kv){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = QuocGia::where('ma_kv', $ma_kv)
        ->get();
      foreach($list as $key => $quyen){
        $quyen->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
}
