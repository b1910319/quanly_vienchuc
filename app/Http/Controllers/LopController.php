<?php

namespace App\Http\Controllers;

use App\Imports\LopImport;
use App\Jobs\LopEmail;
use App\Models\DanhMucLop;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QuocGia;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class LopController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function lop(){
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
    $title = "Quản lý thông tin lớp";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Lop::orderBy('ma_l', 'desc')
        ->get();
      $count = Lop::select(DB::raw('count(ma_l) as sum'))->get();
      $count_status = Lop::select(DB::raw('count(ma_l) as sum, status_l'))
        ->groupBy('status_l')
        ->get();
      $count_vienchuc_lop = Lop::leftJoin('danhsach', 'lop.ma_l', '=', 'danhsach.ma_l')
        ->select(DB::raw('count(danhsach.ma_l) as sum, lop.ma_l'))
        ->groupBy('lop.ma_l')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_danhmuclop = DanhMucLop::where('status_dml', '<>', '1')
        ->orderBy('ten_dml', 'asc')
        ->get();
      $list_quocgia = QuocGia::where('status_qg', '<>', '1')
        ->orderBy('ten_qg', 'asc')
        ->get();
      return view('lop.lop')
        ->with('count', $count)
        ->with('count_nangbac', $count_nangbac)
        ->with('count_vienchuc_lop', $count_vienchuc_lop)
        ->with('count_status', $count_status)

        ->with('title', $title)

        ->with('list', $list)
        ->with('list_danhmuclop', $list_danhmuclop)
        ->with('list_quocgia', $list_quocgia)

        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_ten_l(Request $request){
    $this->check_login();
    if($request->ajax()){
      $ten_l = $request->ten_l;
      if($ten_l != null){
        $lop = Lop::where('ten_l', $ten_l)
          ->first();
        if(isset($lop)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_lop(Request $request){
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
      $lop = new Lop();
      $lop->ma_dml = $data['ma_dml'];
      $lop->ten_l = $data['ten_l'];
      $lop->ngaybatdau_l = $data['ngaybatdau_l'];
      $lop->ngayketthuc_l = $data['ngayketthuc_l'];
      $lop->yeucau_l = $data['yeucau_l'];
      $lop->tencosodaotao_l = $data['tencosodaotao_l'];
      $lop->ma_qg = $data['ma_qg'];
      $lop->nganhhoc_l = $data['nganhhoc_l'];
      $lop->trinhdodaotao_l = $data['trinhdodaotao_l'];
      $lop->nguonkinhphi_l = $data['nguonkinhphi_l'];
      $lop->noidunghoc_l = $data['noidunghoc_l'];
      $lop->diachidaotao_l = $data['diachidaotao_l'];
      $lop->emailcoso_l = $data['emailcoso_l'];
      $lop->sdtcoso_l = $data['sdtcoso_l'];
      $lop->status_l = $data['status_l'];
      $lop->save();
      $vienchuc = VienChuc::whereIn('ma_vc', [1,177,187])
        ->get();
      $message = [
          'type' => 'Lớp học mới',
          'ten_l' => $data['ten_l'],
          'ngaybatdau_l' => $data['ngaybatdau_l'],
          'ngayketthuc_l' => $data['ngayketthuc_l'],
          'tencosodaotao_l' => $data['tencosodaotao_l'],
          'nganhhoc_l' => $data['nganhhoc_l'],
          'diachidaotao_l' => $data['diachidaotao_l'],
          'sdtcoso_l' => $data['sdtcoso_l'],
          'url' => 'http://localhost/quanly_vienchuc/home',
      ];
      LopEmail::dispatch($message, $vienchuc)->delay(now()->addMinute(1));
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/lop');
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_lop_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Excel::import(new LopImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_lop($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $lop = Lop::find($ma_l);
      if($lop->status_l == 1){
        $lop->status_l = Lop::find($ma_l)->update(['status_l' => 0]);
      }elseif($lop->status_l == 0){
        $lop->status_l = Lop::find($ma_l)->update(['status_l' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_lop($ma_l){
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
    $title = "Cập nhật thông tin lớp";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $edit = Lop::find($ma_l);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $list_danhmuclop = DanhMucLop::where('status_dml', '<>', '1')
      ->orderBy('ten_dml', 'asc')
      ->get();
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_quocgia = QuocGia::where('status_qg', '<>', '1')
        ->orderBy('ten_qg', 'asc')
        ->get();
      return view('lop.lop_edit')
        ->with('edit', $edit)
        ->with('title', $title)

        ->with('list_danhmuclop', $list_danhmuclop)
        ->with('list_quocgia', $list_quocgia)

        ->with('count_nangbac', $count_nangbac)

        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_lop(Request $request, $ma_l){
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
      Carbon::now('Asia/Ho_Chi_Minh');
      $lop = Lop::find($ma_l);
      $lop->ma_dml = $data['ma_dml'];
      $lop->ten_l = $data['ten_l'];
      $lop->ngaybatdau_l = $data['ngaybatdau_l'];
      $lop->ngayketthuc_l = $data['ngayketthuc_l'];
      $lop->yeucau_l = $data['yeucau_l'];
      $lop->tencosodaotao_l = $data['tencosodaotao_l'];
      $lop->ma_qg = $data['ma_qg'];
      $lop->nganhhoc_l = $data['nganhhoc_l'];
      $lop->trinhdodaotao_l = $data['trinhdodaotao_l'];
      $lop->nguonkinhphi_l = $data['nguonkinhphi_l'];
      $lop->noidunghoc_l = $data['noidunghoc_l'];
      $lop->diachidaotao_l = $data['diachidaotao_l'];
      $lop->emailcoso_l = $data['emailcoso_l'];
      $lop->sdtcoso_l = $data['sdtcoso_l'];
      $lop->status_l = $data['status_l'];
      $lop->updated_l = Carbon::now();
      $lop->save();
      return Redirect::to('lop');
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_lop(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          Lop::find($id)->delete();
        }
      }
    }
  }
  public function delete_lop_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_l = $request->ma_l;
      Lop::whereIn('ma_l', $ma_l)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_lop(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Lop::get();
      foreach($list as $key => $lop){
        $lop->delete();
      }
      return Redirect::to('lop');
    }else{
      return Redirect::to('/home');
    }
  }
  public function lop_luotxem(Request $request){
    if($request->ajax()){
      $id =$request->id;
      if($id != null){
        $lop = Lop::find($id);
        $lop->luotxem_l = $lop->luotxem_l + 1;
        $lop->save();
      }
    }
  }

  public function lop_danhmuclop($ma_dml){
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
    $title = "Quản lý thông tin lớp theo danh mục";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Lop::orderBy('ma_l', 'desc')
        ->where('ma_dml', $ma_dml)
        ->get();
      $count = Lop::select(DB::raw('count(ma_l) as sum'))
        ->where('ma_dml', $ma_dml)
        ->get();
      $count_status = Lop::select(DB::raw('count(ma_l) as sum, status_l'))
        ->where('ma_dml', $ma_dml)
        ->groupBy('status_l')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $danhmuclop = DanhMucLop::find($ma_dml);
      $list_quocgia = QuocGia::orderBy('ten_qg', 'asc')
        ->get();
      return view('lop.lop_danhmuclop')
        ->with('title', $title)
        ->with('ma_dml', $ma_dml)
        ->with('danhmuclop', $danhmuclop)

        ->with('count_status', $count_status)
        ->with('count', $count)
        ->with('count_nangbac', $count_nangbac)

        ->with('list', $list)
        ->with('list_quocgia', $list_quocgia)

        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_lop_danhmuclop(Request $request, $ma_dml){
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
      $lop = new Lop();
      $lop->ma_dml = $ma_dml;
      $lop->ten_l = $data['ten_l'];
      $lop->ngaybatdau_l = $data['ngaybatdau_l'];
      $lop->ngayketthuc_l = $data['ngayketthuc_l'];
      $lop->yeucau_l = $data['yeucau_l'];
      $lop->tencosodaotao_l = $data['tencosodaotao_l'];
      $lop->ma_qg = $data['ma_qg'];
      $lop->nganhhoc_l = $data['nganhhoc_l'];
      $lop->trinhdodaotao_l = $data['trinhdodaotao_l'];
      $lop->nguonkinhphi_l = $data['nguonkinhphi_l'];
      $lop->noidunghoc_l = $data['noidunghoc_l'];
      $lop->diachidaotao_l = $data['diachidaotao_l'];
      $lop->emailcoso_l = $data['emailcoso_l'];
      $lop->sdtcoso_l = $data['sdtcoso_l'];
      $lop->status_l = $data['status_l'];
      $lop->save();
      $vienchuc = VienChuc::whereIn('ma_vc', [1,177,187])
        ->get();
      $message = [
          'type' => 'Lớp học mới',
          'ten_l' => $data['ten_l'],
          'ngaybatdau_l' => $data['ngaybatdau_l'],
          'ngayketthuc_l' => $data['ngayketthuc_l'],
          'tencosodaotao_l' => $data['tencosodaotao_l'],
          'nganhhoc_l' => $data['nganhhoc_l'],
          'diachidaotao_l' => $data['diachidaotao_l'],
          'sdtcoso_l' => $data['sdtcoso_l'],
          'url' => 'http://localhost/quanly_vienchuc/home',
      ];
      LopEmail::dispatch($message, $vienchuc)->delay(now()->addMinute(1));
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/lop_danhmuclop/'.$ma_dml);
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_lop_danhmuclop($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $lop = Lop::find($ma_l);
      if($lop->status_l == 1){
        $lop->status_l = Lop::find($ma_l)->update(['status_l' => 0]);
      }elseif($lop->status_l == 0){
        $lop->status_l = Lop::find($ma_l)->update(['status_l' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_lop_danhmuclop($ma_l){
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
    $title = "Cập nhật thông tin lớp";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $edit = Lop::find($ma_l);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $list_danhmuclop = DanhMucLop::where('status_dml', '<>', '1')
      ->orderBy('ten_dml', 'asc')
      ->get();
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_quocgia = QuocGia::orderBy('ten_qg', 'asc')
        ->get();
      return view('lop.lop_danhmuclop_edit')
        ->with('edit', $edit)
        ->with('title', $title)

        ->with('list_danhmuclop', $list_danhmuclop)
        ->with('list_quocgia', $list_quocgia)

        ->with('count_nangbac', $count_nangbac)

        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_lop_danhmuclop(Request $request, $ma_l, $ma_dml){
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
      Carbon::now('Asia/Ho_Chi_Minh');
      $lop = Lop::find($ma_l);
      $lop->ma_dml = $data['ma_dml'];
      $lop->ten_l = $data['ten_l'];
      $lop->ngaybatdau_l = $data['ngaybatdau_l'];
      $lop->ngayketthuc_l = $data['ngayketthuc_l'];
      $lop->yeucau_l = $data['yeucau_l'];
      $lop->tencosodaotao_l = $data['tencosodaotao_l'];
      $lop->ma_qg = $data['ma_qg'];
      $lop->nganhhoc_l = $data['nganhhoc_l'];
      $lop->trinhdodaotao_l = $data['trinhdodaotao_l'];
      $lop->nguonkinhphi_l = $data['nguonkinhphi_l'];
      $lop->noidunghoc_l = $data['noidunghoc_l'];
      $lop->diachidaotao_l = $data['diachidaotao_l'];
      $lop->emailcoso_l = $data['emailcoso_l'];
      $lop->sdtcoso_l = $data['sdtcoso_l'];
      $lop->status_l = $data['status_l'];
      $lop->updated_l = Carbon::now();
      $lop->save();
      return Redirect::to('/lop_danhmuclop/'.$ma_dml);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_lop_danhmuclop(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          Lop::find($id)->delete();
        }
      }
    }
  }
  public function delete_lop_danhmuclop_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_l = $request->ma_l;
      Lop::whereIn('ma_l', $ma_l)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_lop_danhmuclop($ma_dml){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = Lop::where('ma_dml', $ma_dml)
        ->get();
      foreach($list as $key => $lop){
        $lop->delete();
      }
      return Redirect::to('/lop_danhmuclop/'.$ma_dml);
    }else{
      return Redirect::to('/home');
    }
  }
}
