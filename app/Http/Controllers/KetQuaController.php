<?php

namespace App\Http\Controllers;

use App\Imports\KetQuaImport;
use App\Models\KetQua;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class KetQuaController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function ketqua($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật kết quả học tập";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = KetQua::join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->orderBy('ma_kq', 'desc')
        ->where('ketqua.ma_l', $ma_l)
        ->where('ketqua.ma_vc', $ma_vc)
        ->get();
      $count = KetQua::select(DB::raw('count(ma_kq) as sum'))
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $count_status = KetQua::select(DB::raw('count(ma_kq) as sum, status_kq'))
        ->groupBy('status_kq')
        ->where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      $lop = Lop::find($ma_l);
      $vienchuc = VienChuc::find($ma_vc);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('ketqua.ketqua')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('lop', $lop)
        ->with('vienchuc', $vienchuc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_ketqua(Request $request){
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
      $ketqua = new KetQua();
      $ketqua->ma_vc = $data['ma_vc'];
      $ketqua->ma_l = $data['ma_l'];
      $ketqua->tennguoihuongdan_kq = $data['tennguoihuongdan_kq'];
      $ketqua->emailnguoihuongdan_kq = $data['emailnguoihuongdan_kq'];
      $ketqua->noidungaotao_kq = $data['noidungaotao_kq'];
      $ketqua->bangduoccap_kq = $data['bangduoccap_kq'];
      $ketqua->ngaycapbang_kq = $data['ngaycapbang_kq'];
      $ketqua->xeploai_kq = $data['xeploai_kq'];
      $ketqua->detaitotnghiep_kq = $data['detaitotnghiep_kq'];
      $ketqua->ngayvenuoc_kq = $data['ngayvenuoc_kq'];
      $ketqua->danhgiacuacoso_kq = $data['danhgiacuacoso_kq'];
      $ketqua->kiennghi_kq = $data['kiennghi_kq'];
      $ketqua->status_kq = $data['status_kq'];
      $ketqua->save();
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_ketqua_excel(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      Excel::import(new KetQuaImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_ketqua($ma_kq){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ketqua = KetQua::find($ma_kq);
      if($ketqua->status_kq == 1){
        $ketqua->status_kq = KetQua::find($ma_kq)->update(['status_kq' => 0]);
      }elseif($ketqua->status_kq == 0){
        $ketqua->status_kq = KetQua::find($ma_kq)->update(['status_kq' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_ketqua($ma_kq){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
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
    if($phanquyen_admin || $phanquyen_qlcttc){
      $edit = KetQua::find($ma_kq);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('ketqua.ketqua_edit')
        ->with('edit', $edit)
        ->with('title', $title)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_ketqua(Request $request, $ma_kq){
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
      $ketqua = KetQua::find($ma_kq);
      $ketqua->ma_vc = $data['ma_vc'];
      $ketqua->ma_l = $data['ma_l'];
      $ketqua->tennguoihuongdan_kq = $data['tennguoihuongdan_kq'];
      $ketqua->emailnguoihuongdan_kq = $data['emailnguoihuongdan_kq'];
      $ketqua->noidungaotao_kq = $data['noidungaotao_kq'];
      $ketqua->bangduoccap_kq = $data['bangduoccap_kq'];
      $ketqua->ngaycapbang_kq = $data['ngaycapbang_kq'];
      $ketqua->xeploai_kq = $data['xeploai_kq'];
      $ketqua->detaitotnghiep_kq = $data['detaitotnghiep_kq'];
      $ketqua->ngayvenuoc_kq = $data['ngayvenuoc_kq'];
      $ketqua->danhgiacuacoso_kq = $data['danhgiacuacoso_kq'];
      $ketqua->kiennghi_kq = $data['kiennghi_kq'];
      $ketqua->status_kq = $data['status_kq'];
      $ketqua->updated_kq = Carbon::now();
      $ketqua->save();
      return Redirect::to('/ketqua/'.$data['ma_l'].'/'.$data['ma_vc'],302);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_ketqua(Request $request){
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
          KetQua::find($id)->delete();
        }
      }
    }
  }
  public function delete_ketqua_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $ma_kq = $request->ma_kq;
      KetQua::whereIn('ma_kq', $ma_kq)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_ketqua($ma_l, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = KetQua::where('ma_l', $ma_l)
        ->where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $ketqua){
        $ketqua->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function ketqua_pdf($ma_kq){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $vienchuc = VienChuc::join('ketqua', 'ketqua.ma_vc', '=', 'vienchuc.ma_vc')
      ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
      ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
      ->where('ketqua.ma_kq', $ma_kq)
      ->where('status_vc', '<>', '2')
      ->get();
      $pdf = PDF::loadView('pdf.pdf_ketqua', [
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function ketqua_all(){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Cập nhật kết quả học tập";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = KetQua::join('vienchuc', 'vienchuc.ma_vc', '=', 'ketqua.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->join('lop', 'lop.ma_l', '=', 'ketqua.ma_l')
        ->orderBy('ma_kq', 'desc')
        ->get();
      $count = KetQua::select(DB::raw('count(ma_kq) as sum'))
        ->get();
      $count_status = KetQua::select(DB::raw('count(ma_kq) as sum, status_kq'))
        ->groupBy('status_kq')
        ->get();
      $lop = '';
      $vienchuc = '';
      $list_vienchuc = VienChuc::join('danhsach', 'danhsach.ma_vc', '=', 'vienchuc.ma_vc')
        ->whereNotIn('vienchuc.ma_vc', function($query) {
            $query->select('ketqua.ma_vc')->from('ketqua');
          })
        ->get();
      $list_lop = Lop::orderBy('ten_l', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('ketqua.ketqua')
        ->with('count', $count)
        ->with('title', $title)
        ->with('count_status', $count_status)
        ->with('list', $list)
        ->with('lop', $lop)
        ->with('list_lop', $list_lop)
        ->with('list_vienchuc', $list_vienchuc)
        ->with('vienchuc', $vienchuc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('count_nangbac', $count_nangbac);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_ketqua_all(){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qlcttc){
      $list = KetQua::get();
      foreach($list as $key => $ketqua){
        $ketqua->delete();
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function vienchuc_ketqua_add($ma_l){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Thêm kết quả quá trình học";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    Carbon::now('Asia/Ho_Chi_Minh'); 
    $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
    $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
    return view('ketqua.vienchuc_ketqua_add')
      ->with('title', $title)
      ->with('ma_l', $ma_l)

      ->with('count_nangbac', $count_nangbac)

      ->with('phanquyen_admin', $phanquyen_admin)
      ->with('phanquyen_qltt', $phanquyen_qltt)
      ->with('phanquyen_qlk', $phanquyen_qlk)
      ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
      ->with('phanquyen_qlktkl', $phanquyen_qlktkl);
  }
  public function vienchuc_add_ketqua(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $data = $request->all();
    $ketqua = new KetQua();
    $ketqua->ma_vc = $ma_vc;
    $ketqua->ma_l = $data['ma_l'];
    $ketqua->tennguoihuongdan_kq = $data['tennguoihuongdan_kq'];
    $ketqua->emailnguoihuongdan_kq = $data['emailnguoihuongdan_kq'];
    $ketqua->noidungaotao_kq = $data['noidungaotao_kq'];
    $ketqua->bangduoccap_kq = $data['bangduoccap_kq'];
    $ketqua->ngaycapbang_kq = $data['ngaycapbang_kq'];
    $ketqua->xeploai_kq = $data['xeploai_kq'];
    $ketqua->detaitotnghiep_kq = $data['detaitotnghiep_kq'];
    $ketqua->ngayvenuoc_kq = $data['ngayvenuoc_kq'];
    $ketqua->danhgiacuacoso_kq = $data['danhgiacuacoso_kq'];
    $ketqua->kiennghi_kq = $data['kiennghi_kq'];
    $ketqua->status_kq = $data['status_kq'];
    $ketqua->save();
    return redirect()->back();
  }
}
