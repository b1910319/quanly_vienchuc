<?php

namespace App\Http\Controllers;

use App\Imports\KhenThuongImport;
use App\Models\Bac;
use App\Models\ChucVu;
use App\Models\DanToc;
use App\Models\HeDaoTao;
use App\Models\HinhThucKhenThuong;
use App\Models\KhenThuong;
use App\Models\Khoa;
use App\Models\KyLuat;
use App\Models\LoaiKhenThuong;
use App\Models\Ngach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QuaTrinhChucVu;
use App\Models\QuyetDinh;
use App\Models\ThuongBinh;
use App\Models\Tinh;
use App\Models\TonGiao;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class KhenThuongController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function khenthuong(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý khen thưởng";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $list_khoa = Khoa::get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      $list_hedaotao = HeDaoTao::get();
      $list_tinh = Tinh::orderBy('ten_t', 'asc')
        ->get();
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      if ($phanquyen_qlk) {
        $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
          ->where('ma_k', $ma_k)
          ->select(DB::raw('count(ma_vc) as sum'))
          ->get();
        $list_vienchuc = VienChuc::orderBy('ma_vc', 'desc')
          ->where('ma_k', $ma_k)
          ->get();
        $count_khenthuong_vienchuc = VienChuc::leftJoin('khenthuong', 'vienchuc.ma_vc', '=', 'khenthuong.ma_vc')
          ->where('ma_k', $ma_k)
          ->select(DB::raw('count(ma_kt) as sum, vienchuc.ma_vc'))
          ->groupBy('vienchuc.ma_vc')
          ->get();
      } else {
        $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
          ->select(DB::raw('count(ma_vc) as sum'))
          ->get();
        $list_vienchuc = VienChuc::orderBy('ma_vc', 'desc')
          ->get();
        $count_khenthuong_vienchuc = VienChuc::leftJoin('khenthuong', 'vienchuc.ma_vc', '=', 'khenthuong.ma_vc')
          ->select(DB::raw('count(ma_kt) as sum, vienchuc.ma_vc'))
          ->groupBy('vienchuc.ma_vc')
          ->get();
      }
      return view('khenthuong.khenthuong')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_tinh', $list_tinh)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('title', $title)
        ->with('count_khenthuong_vienchuc', $count_khenthuong_vienchuc)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('list_vienchuc', $list_vienchuc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function khenthuong_add($ma_vc){
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
    $title = "Thêm thông tin khen thưởng";
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $list = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->where('ma_vc', $ma_vc)
        ->orderBy('ma_kt', 'desc')
        ->get();
      $count = KhenThuong::where('ma_vc', $ma_vc)
        ->select(DB::raw('count(ma_kt) as sum'))
        ->get();
      $count_status = KhenThuong::where('ma_vc', $ma_vc)
        ->select(DB::raw('count(ma_kt) as sum, status_kt'))
        ->groupBy('status_kt')
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::where('status_htkt', '<>', '1')
        ->orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::where('status_lkt', '<>', '1')
        ->orderBy('ten_lkt', 'asc')
        ->get();
      $vienchuc = VienChuc::find($ma_vc);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      return view('khenthuong.khenthuong_add')
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('count', $count)
        ->with('title', $title)
        ->with('ma_vc', $ma_vc)
        ->with('vienchuc', $vienchuc)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('count_status', $count_status)
        ->with('count_nangbac', $count_nangbac)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_soquyetdinh_kt(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_kt = $request->soquyetdinh_kt;
      if($soquyetdinh_kt != null){
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_kt)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_kt)
          ->first();
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_kt)
          ->first();
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_kt)
          ->first();
        if(isset($quatrinhchucvu) || isset($quyetdinh) || isset($khenthuong) || isset($kyluat)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_soquyetdinh_kt_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_kt = $request->soquyetdinh_kt;
      $ma_kt = $request->ma_kt;
      if($soquyetdinh_kt != null && $ma_kt != null){
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_kt)
          ->where('ma_kt', '<>', $ma_kt)
          ->first();
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_kt)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_kt)
          ->first();
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_kt)
          ->first();
        if(isset($quatrinhchucvu) || isset($quyetdinh) || isset($khenthuong) || isset($kyluat)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_khenthuong(Request $request, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $data = $request->all();
      $vienchuc = VienChuc::find($ma_vc);
      $khenthuong = new KhenThuong();
      $khenthuong->ma_lkt = $data['ma_lkt'];
      $khenthuong->ma_vc = $ma_vc;
      $khenthuong->ma_htkt = $data['ma_htkt'];
      $khenthuong->ngay_kt = $data['ngay_kt'];
      $khenthuong->noidung_kt = $data['noidung_kt'];
      $khenthuong->status_kt = $data['status_kt'];
      $khenthuong->soquyetdinh_kt = $data['soquyetdinh_kt'];
      $get_file = $request->file('filequyetdinh_kt');
      if($get_file){
        $new_file = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/khenthuong', $new_file);
        $khenthuong->filequyetdinh_kt = $new_file;
      }
      $khenthuong->save();
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/khenthuong_add/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_khenthuong_excel(Request $request){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      Excel::import(new KhenThuongImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_khenthuong($ma_kt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $khenthuong = KhenThuong::find($ma_kt);
      if($khenthuong->status_kt == 1){
        $khenthuong->status_kt = KhenThuong::find($ma_kt)->update(['status_kt' => 0]);
      }elseif($khenthuong->status_kt == 0){
        $khenthuong->status_kt = KhenThuong::find($ma_kt)->update(['status_kt' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_khenthuong($ma_kt, $ma_vc){
    $this->check_login();
    $title = "Cập nhật thông tin khen thưởng";
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $edit = KhenThuong::find($ma_kt);
      Carbon::now('Asia/Ho_Chi_Minh'); 
      $ketthuc = Carbon::parse(Carbon::now())->format('Y-m-d'); 
      $count_nangbac = VienChuc::where('ngaynangbac_vc','LIKE', $ketthuc)
        ->select(DB::raw('count(ma_vc) as sum'))
        ->get();
      $list_hinhthuckhenthuong = HinhThucKhenThuong::where('status_htkt', '<>', '1')
        ->orderBy('ten_htkt', 'asc')
        ->get();
      $list_loaikhenthuong = LoaiKhenThuong::where('status_lkt', '<>', '1')
        ->orderBy('ten_lkt', 'asc')
        ->get();
      return view('khenthuong.khenthuong_edit')
        ->with('edit', $edit)
        ->with('ma_vc', $ma_vc)
        ->with('title', $title)
        ->with('list_hinhthuckhenthuong', $list_hinhthuckhenthuong)
        ->with('list_loaikhenthuong', $list_loaikhenthuong)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('count_nangbac', $count_nangbac)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_khenthuong(Request $request, $ma_kt, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $data = $request->all();
      $vienchuc = VienChuc::find($ma_vc);
      Carbon::now('Asia/Ho_Chi_Minh');
      $khenthuong = KhenThuong::find($ma_kt);
      $khenthuong->ma_lkt = $data['ma_lkt'];
      $khenthuong->ma_vc = $ma_vc;
      $khenthuong->ma_htkt = $data['ma_htkt'];
      $khenthuong->ngay_kt = $data['ngay_kt'];
      $khenthuong->noidung_kt = $data['noidung_kt'];
      $khenthuong->status_kt = $data['status_kt'];
      $get_file = $request->file('filequyetdinh_kt');
      if($get_file){
        $new_file = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($khenthuong->filequyetdinh_kt){
          unlink('public/uploads/khenthuong/'.$khenthuong->filequyetdinh_kt);
        }
        $get_file->move('public/uploads/khenthuong', $new_file);
        $khenthuong->filequyetdinh_kt = $new_file;
      }
      $khenthuong->updated_kt = Carbon::now();
      $khenthuong->save();
      return Redirect::to('/khenthuong_add/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_khenthuong(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk || $phanquyen_qlktkl){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          $khenthuong = KhenThuong::find($id);
          if($khenthuong->filequyetdinh_kt){
            unlink('public/uploads/khenthuong/'.$khenthuong->filequyetdinh_kt);
          }
          KhenThuong::find($id)->delete();
        }
      }
    }
  }
  public function delete_khenthuong_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk || $phanquyen_qlktkl){
      $ma_kt = $request->ma_kt;
      $khenthuong = KhenThuong::whereIn('ma_kt', $ma_kt)->get();
      foreach($khenthuong as $kt){
        if($kt->filequyetdinh_kt){
          unlink('public/uploads/khenthuong/'.$kt->filequyetdinh_kt);
        }
      }
      KhenThuong::whereIn('ma_kt', $ma_kt)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_khenthuong($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $list = KhenThuong::where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $khenthuong){
        if($khenthuong->filequyetdinh_kt){
          unlink('public/uploads/khenthuong/'.$khenthuong->filequyetdinh_kt);
        }
        $khenthuong->delete();
      }
      return Redirect::to('/khenthuong_add/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function khenthuong_pdf($ma_kt){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $khenthuong = KhenThuong::join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'khenthuong.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('ma_kt', $ma_kt)
        ->get();
      $pdf = PDF::loadView('khenthuong.khenthuong_pdf', [
        'khenthuong' => $khenthuong,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function quanly_khenthuong_kyluat(){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $title = "Khen thưởng kỷ luật";
    if($phanquyen_admin || $phanquyen_qlktkl){
      $list_vienchuc = VienChuc::orderBy('hoten_vc', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      return view('khenthuong.quanly_khenthuong_kyluat')
        ->with('title', $title)

        ->with('list_vienchuc', $list_vienchuc)
        ->with('list_khoa', $list_khoa)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_thuongbinh', $list_thuongbinh)

        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function qlk_quanly_khenthuong_kyluat(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
    ->where('ma_q', '=', '9')
    ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $title = "Khen thưởng kỷ luật";
    if($phanquyen_qlk){
      $list_vienchuc = VienChuc::where('ma_k', $ma_k)
        ->orderBy('hoten_vc', 'asc')
        ->get();
      $list_khoa = Khoa::orderBy('ten_k', 'asc')
        ->get();
      $list_chucvu = ChucVu::get();
      $list_ngach = Ngach::get();
      $list_bac = Bac::get();
      $list_dantoc = DanToc::get();
      $list_tongiao = TonGiao::get();
      $list_thuongbinh = ThuongBinh::get();
      return view('khenthuong.quanly_khenthuong_kyluat')
        ->with('title', $title)

        ->with('list_vienchuc', $list_vienchuc)
        ->with('list_khoa', $list_khoa)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_thuongbinh', $list_thuongbinh)

        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function quanly_khenthuong_kyluat_chitiet($ma_vc){
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
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    $title = "Khen thưởng, kỷ luật";
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $vienchuc = VienChuc::find($ma_vc);
      $khenthuong = KhenThuong::join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('khenthuong.ma_vc', $ma_vc)
        ->first();
      $kyluat = KyLuat::join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_vc', $ma_vc)
        ->first();
      $list_khenthuong = KhenThuong::join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->where('khenthuong.ma_vc', $ma_vc)
        ->orderBy('ngay_kt', 'desc')
        ->get();
      $list_kyluat = KyLuat::join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->where('kyluat.ma_vc', $ma_vc)
        ->orderBy('ngay_kl', 'desc')
        ->get();
      return view('khenthuong.quanly_khenthuong_kyluat_chitiet')
        ->with('title', $title)
        ->with('vienchuc', $vienchuc)

        ->with('khenthuong', $khenthuong)
        ->with('kyluat', $kyluat)
        ->with('list_khenthuong', $list_khenthuong)
        ->with('list_kyluat', $list_kyluat)

        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qltt', $phanquyen_qltt);
    }else{
      return Redirect::to('/home');
    }
  }
  public function quanly_khenthuong_kyluat_xuatfile( Request $request){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlktkl || $phanquyen_qlk){
      $ma_vc = $request->ma_vc;
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', 'vienchuc.ma_k')
        ->whereIn('ma_vc', $ma_vc)
        ->get();
      $list_khenthuong= KhenThuong::join('hinhthuckhenthuong', 'hinhthuckhenthuong.ma_htkt', '=', 'khenthuong.ma_htkt')
        ->join('loaikhenthuong', 'loaikhenthuong.ma_lkt', '=', 'khenthuong.ma_lkt')
        ->whereIn('ma_vc', $ma_vc)
        ->get();
      $list_kyluat= KyLuat::join('loaikyluat', 'loaikyluat.ma_lkl', '=', 'kyluat.ma_lkl')
        ->whereIn('ma_vc', $ma_vc)
        ->get();
      $pdf = PDF::loadView('pdf.quanly_khenthuong_kyluat_pdf', [
        'vienchuc' => $vienchuc,
        'list_khenthuong' => $list_khenthuong,
        'list_kyluat' => $list_kyluat,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
}
