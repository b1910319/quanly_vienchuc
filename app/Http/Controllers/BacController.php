<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Bac;
use App\Models\ChucVu;
use App\Models\DanToc;
use App\Models\Khoa;
use App\Models\Ngach;
use App\Models\PhanQuyen;
use App\Models\ThuongBinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;


class BacController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function bac_ngach($ma_n){
    $this->check_login();
    $title = "Thêm thông tin bậc theo ngạch";
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $count = Bac::select(DB::raw('count(ma_b) as sum'))
        ->where('ma_n', $ma_n)
        ->get();
      $count_status = Bac::select(DB::raw('count(ma_b) as sum, status_b'))
        ->where('ma_n', $ma_n)
        ->groupBy('status_b')
        ->get();
      $list = Bac::where('ma_n', $ma_n)
        ->orderBy('ma_b', 'desc')
        ->get();
      $ngach = Ngach::find($ma_n);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('bac.bac_ngach')
        ->with('ma_n', $ma_n)
        ->with('count', $count)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('ngach', $ngach)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_bac_ngach(Request $request, $ma_n){
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
      $bac = new Bac();
      $bac->ten_b = $data['ten_b'];
      $bac->hesoluong_b = $data['hesoluong_b'];
      $bac->ma_n = $ma_n;
      $bac->status_b = $data['status_b'];
      $bac->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/bac_ngach/'.$ma_n);
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_bac_ngach($ma_n, $ma_b){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $bac = Bac::find($ma_b);
      if($bac->status_b == 1){
        $bac->status_b = Bac::find($ma_b)->update(['status_b' => 0]);
      }elseif($bac->status_b == 0){
        $bac->status_b = Bac::find($ma_b)->update(['status_b' => 1]);
      }
      return Redirect::to('/bac_ngach/'.$ma_n);
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_bac_ngach($ma_n, $ma_b){
    $this->check_login();
    $title = "Cập nhật thông tin bậc theo ngạch";
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $edit = Bac::find($ma_b);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('bac.bac_ngach_edit')
        ->with('edit', $edit)
        ->with('ma_n', $ma_n)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_bac_ngach(Request $request, $ma_n, $ma_b){
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
      $bac = Bac::find($ma_b);
      $bac->ten_b = $data['ten_b'];
      $bac->hesoluong_b = $data['hesoluong_b'];
      $bac->ma_n = $ma_n;
      $bac->status_b = $data['status_b'];
      $bac->updated_b = Carbon::now();
      $bac->save();
      return Redirect::to('/bac_ngach/'.$ma_n);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_bac_ngach(Request $request){
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
          Bac::find($id)->delete();
        }
      }
    }
  }
  public function delete_all_bac_ngach($ma_n){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = Bac::where('ma_n', $ma_n)
        ->get();
      foreach($list as $key => $bac){
        $bac->delete();
      }
      return Redirect::to('/bac_ngach/'.$ma_n);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_bac_ngach_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_b = $request->ma_b;
      Bac::whereIn('ma_b', $ma_b)->delete();
      return redirect()->back();
    }
  }
// --------------------------------------------------------
  public function bac(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý bậc";
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
      $list = Bac::join('ngach', 'ngach.ma_n', '=', 'bac.ma_n')
        ->orderBy('ma_b', 'desc')
        ->get();
      $count = Bac::select(DB::raw('count(ma_b) as sum'))->get();
      $count_status = Bac::select(DB::raw('count(ma_b) as sum, status_b'))
        ->groupBy('status_b')
        ->get();
      $list_ngach = Ngach::where('status_n', '<>', '1')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('bac.bac')
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list_ngach',$list_ngach)
        ->with('count_nangbac', $count_nangbac)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_bac(Request $request){
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
      $bac = new Bac();
      $bac->ma_n = $data['ma_n'];
      $bac->ten_b = $data['ten_b'];
      $bac->hesoluong_b = $data['hesoluong_b'];
      $bac->status_b = $data['status_b'];
      $bac->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/bac');
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_bac($ma_b){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $bac = Bac::find($ma_b);
      if($bac->status_b == 1){
        $bac->status_b = Bac::find($ma_b)->update(['status_b' => 0]);
      }elseif($bac->status_b == 0){
        $bac->status_b = Bac::find($ma_b)->update(['status_b' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_bac($ma_b){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật thông tin bâc";
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
      $edit = Bac::find($ma_b);
      $list_ngach = Ngach::where('status_n', '<>', '1')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('bac.bac_edit')
        ->with('edit', $edit)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('title', $title)
        ->with('list_ngach', $list_ngach)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_bac(Request $request, $ma_b){
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
      $bac = Bac::find($ma_b);
      $bac->ma_n = $data['ma_n'];
      $bac->ten_b = $data['ten_b'];
      $bac->hesoluong_b = $data['hesoluong_b'];
      $bac->status_b = $data['status_b'];
      $bac->updated_b = Carbon::now();
      $bac->save();
      return Redirect::to('bac');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_bac(Request $request){
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
          Bac::find($id)->delete();
        }
      }
    }
  }
  public function delete_bac_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_b = $request->ma_b;
      Bac::whereIn('ma_b', $ma_b)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_bac(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $list = Bac::get();
      foreach($list as $key => $bac){
        $bac->delete();
      }
      return Redirect::to('bac');
    }else{
      return Redirect::to('/home');
    }
  }
  public function change_ngach(Request $request){
    $this->check_login();
    if($request->ajax()){
      $id =$request->id;
      if($id != null){
        $bac = Bac::where('ma_n', 'LIKE', $id)->get();
        $output='';
        if(count($bac)>0){
          foreach($bac as $row){
              $output .='
                <option value="'.$row->ma_b.'" >'.$row->ten_b.' - '.$row->hesoluong_b.'</option>
              ';
          }
        } else{
            $output .='';
        }
      }else{
        $output = '';
      }
      return $output;
    }
  }

  public function nangbac(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $title = "Nâng bậc";
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $batdau = Carbon::parse(Carbon::now())->format('Y-m-d');
      $ketthuc = Carbon::parse(Carbon::now())->addMonths(1)->format('Y-m-d'); 
      // echo $batdau.'bat dau';
      // echo '<br>';
      // echo $ketthuc.'ketthuc';
      // echo '<br>';
      if ($phanquyen_qlk) {
        $list_vienchuc = VienChuc::whereBetween('ngaynangbac_vc', [$batdau, $ketthuc])
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->get();
        $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $batdau)
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->select(DB::raw('count(ma_vc) as sum'))
          ->get();
        $list_nangbac_homnay = VienChuc::where('ngaynangbac_vc','LIKE', $batdau)
          ->where('status_vc', '<>', '2')
          ->where('vienchuc.ma_k', $ma_k)
          ->get();
      } else {
        $list_vienchuc = VienChuc::whereBetween('ngaynangbac_vc', [$batdau, $ketthuc])
          ->where('status_vc', '<>', '2')
          ->orderBy('vienchuc.ma_vc', 'desc')
          ->get();
        $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $batdau)
          ->where('status_vc', '<>', '2')
          ->select(DB::raw('count(ma_vc) as sum'))
          ->get();
        $list_nangbac_homnay = VienChuc::where('ngaynangbac_vc','LIKE', $batdau)
          ->where('status_vc', '<>', '2')
          ->get();
      }
      return view('bac.nangbac')
        ->with('title', $title)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('list_nangbac_homnay', $list_nangbac_homnay)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function updated_nangbac(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $data = $request->all();
      $vienchuc = VienChuc::find($data['ma_vc']);
      $vienchuc->ma_b = $data['ma_b'];
      $vienchuc->ngayhuongbac_vc = $data['ngayhuongbac_vc'];
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ngach = Ngach::find($data['ma_n']);
      $vienchuc->ngaynangbac_vc = Carbon::parse(Carbon::now()->addYears($ngach->sonamnangbac_n))->format('Y-m-d');
      $vienchuc->save();
      return Redirect::to('/nangbac');
    }else{
      return Redirect::to('/home');
    }
  }
}
