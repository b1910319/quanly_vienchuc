<?php

namespace App\Http\Controllers;

use App\Models\Bac;
use App\Models\ChucVu;
use App\Models\DanToc;
use App\Models\HeDaoTao;
use App\Models\Khoa;
use App\Models\Ngach;
use App\Models\NhiemKy;
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

class QuaTrinhChucVuController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function quatrinhchucvu(){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $ma_k = session()->get('ma_k');
    $title = "Quản lý quá trình chức vụ";
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
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
      if ($phanquyen_qlk) {
        $list_vienchuc = VienChuc::orderBy('ma_vc', 'desc')
          ->where('ma_k', $ma_k)
          ->get();
        $count_quatrinhchucvu_vienchuc = VienChuc::leftJoin('quatrinhchucvu', 'vienchuc.ma_vc', '=', 'quatrinhchucvu.ma_vc')
          ->where('ma_k', $ma_k)
          ->select(DB::raw('count(ma_qtcv) as sum, vienchuc.ma_vc'))
          ->groupBy('vienchuc.ma_vc')
          ->get();
      } else {
        $list_vienchuc = VienChuc::orderBy('ma_vc', 'desc')
          ->get();
        $count_quatrinhchucvu_vienchuc = VienChuc::leftJoin('quatrinhchucvu', 'vienchuc.ma_vc', '=', 'quatrinhchucvu.ma_vc')
          ->select(DB::raw('count(ma_qtcv) as sum, vienchuc.ma_vc'))
          ->groupBy('vienchuc.ma_vc')
          ->get();
      }
      return view('quatrinhchucvu.quatrinhchucvu')
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_tinh', $list_tinh)
        ->with('list_khoa', $list_khoa)
        ->with('list_chucvu', $list_chucvu)
        ->with('list_ngach', $list_ngach)
        ->with('list_bac', $list_bac)
        ->with('list_dantoc', $list_dantoc)
        ->with('list_tongiao', $list_tongiao)
        ->with('list_thuongbinh', $list_thuongbinh)
        ->with('list_vienchuc', $list_vienchuc)
        
        ->with('title', $title)

        ->with('count_quatrinhchucvu_vienchuc', $count_quatrinhchucvu_vienchuc)

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
  public function quatrinhchucvu_add($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $title = "Thêm thông tin quá trình chức vụ";
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
      $list = QuaTrinhChucVu::join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->where('ma_vc', $ma_vc)
        ->orderBy('ma_qtcv', 'desc')
        ->get();
      $count_status = QuaTrinhChucVu::where('ma_vc', $ma_vc)
        ->select(DB::raw('count(ma_qtcv) as sum, status_qtcv'))
        ->groupBy('status_qtcv')
        ->get();
      $list_nhiemky = NhiemKy::where('status_nk', '<>', '1')
        ->orderBy('batdau_nk', 'desc')
        ->get();
      $list_chucvu = ChucVu::where('status_cv', '<>', '1')
        ->orderBy('ten_cv', 'asc')
        ->get();
      $vienchuc = VienChuc::find($ma_vc);
      return view('quatrinhchucvu.quatrinhchucvu_add')
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)

        ->with('count_status', $count_status)

        ->with('title', $title)
        ->with('ma_vc', $ma_vc)
        ->with('vienchuc', $vienchuc)

        ->with('list_nhiemky', $list_nhiemky)
        ->with('list_chucvu', $list_chucvu)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_soquyetdinh_qtcv(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_qtcv = $request->soquyetdinh_qtcv;
      if($soquyetdinh_qtcv != null){
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_qtcv)
          ->first();
        $quatrinhchucvu_1 = QuyetDinh::where('so_qd', $soquyetdinh_qtcv)
          ->first();
        if(isset($quatrinhchucvu) || isset($quatrinhchucvu_1)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_quatrinhchucvu(Request $request, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
      $data = $request->all();
      $quatrinhchucvu = new QuaTrinhChucVu();
      $quatrinhchucvu->ma_nk = $data['ma_nk'];
      $quatrinhchucvu->ma_vc = $ma_vc;
      $quatrinhchucvu->ma_cv = $data['ma_cv'];
      $quatrinhchucvu->soquyetdinh_qtcv = $data['soquyetdinh_qtcv'];
      $quatrinhchucvu->ngayky_qtcv = $data['ngayky_qtcv'];
      $get_file = $request->file('file_qtcv');
      $vienchuc = VienChuc::find($ma_vc);
      $chucvu = ChucVu::find($data['ma_cv']);
      if($get_file){
        $new_file = $vienchuc->hoten_vc.'-'.$chucvu->ten_cv.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/quatrinhchucvu', $new_file);
        $quatrinhchucvu->file_qtcv = $new_file;
      }
      $quatrinhchucvu->status_qtcv = $data['status_qtcv'];
      $quatrinhchucvu->save();
      $vienchuc = VienChuc::find($ma_vc);
      $vienchuc->ma_cv = VienChuc::find($ma_vc)->update(['ma_cv' => $data['ma_cv']]);
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_quatrinhchucvu($ma_qtcv){
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
      $quatrinhchucvu = QuaTrinhChucVu::find($ma_qtcv);
      if($quatrinhchucvu->status_qtcv == 1){
        $quatrinhchucvu->status_qtcv = QuaTrinhChucVu::find($ma_qtcv)->update(['status_qtcv' => 0]);
      }elseif($quatrinhchucvu->status_qtcv == 0){
        $quatrinhchucvu->status_qtcv = QuaTrinhChucVu::find($ma_qtcv)->update(['status_qtcv' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_quatrinhchucvu($ma_qtcv, $ma_vc){
    $this->check_login();
    $title = "Cập nhật thông tin";
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
      $edit = QuaTrinhChucVu::find($ma_qtcv);
      $list_nhiemky = NhiemKy::where('status_nk', '<>', '1')
        ->orderBy('batdau_nk', 'desc')
        ->get();
      $list_chucvu = ChucVu::where('status_cv', '<>', '1')
        ->orderBy('ten_cv', 'asc')
        ->get();
      return view('quatrinhchucvu.quatrinhchucvu_edit')
        ->with('edit', $edit)
        ->with('title', $title)

        ->with('ma_vc', $ma_vc)

        ->with('list_nhiemky', $list_nhiemky)
        ->with('list_chucvu', $list_chucvu)

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
  public function update_quatrinhchucvu(Request $request, $ma_qtcv, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $quatrinhchucvu = QuaTrinhChucVu::find($ma_qtcv);
      $quatrinhchucvu->ma_nk = $data['ma_nk'];
      $quatrinhchucvu->ma_vc = $ma_vc;
      $quatrinhchucvu->ma_cv = $data['ma_cv'];
      $quatrinhchucvu->soquyetdinh_qtcv = $data['soquyetdinh_qtcv'];
      $quatrinhchucvu->ngayky_qtcv = $data['ngayky_qtcv'];
      $quatrinhchucvu->status_qtcv = $data['status_qtcv'];
      $get_file = $request->file('file_qtcv');
      $vienchuc = VienChuc::find($ma_vc);
      $chucvu = ChucVu::find($data['ma_cv']);
      if($get_file){
        $new_file = $vienchuc->hoten_vc.'-'.$chucvu->ten_cv.rand(0,999).'.'.$get_file->getClientOriginalExtension();$new_file = $vienchuc->hoten_vc.'-'.$chucvu->ten_cv.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($quatrinhchucvu->file_qtcv != ' '){
          unlink('public/uploads/quatrinhchucvu/'.$quatrinhchucvu->file_qtcv);
        }
        $get_file->move('public/uploads/quatrinhchucvu', $new_file);
        $quatrinhchucvu->file_qtcv = $new_file;
      }
      $quatrinhchucvu->updated_qtcv = Carbon::now();
      $quatrinhchucvu->save();
      return Redirect::to('/quatrinhchucvu_add/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_quatrinhchucvu(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
      if($request->ajax()){
        $id =$request->id;
        if($id != null){
          QuaTrinhChucVu::find($id)->delete();
        }
      }
    }
  }
  public function delete_quatrinhchucvu_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
      $ma_qtcv = $request->ma_qtcv;
      QuaTrinhChucVu::whereIn('ma_qtcv', $ma_qtcv)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_quatrinhchucvu($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
      $list = QuaTrinhChucVu::where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $quatrinhchucvu){
        $quatrinhchucvu->delete();
      }
      return Redirect::to('/quatrinhchucvu_add/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function quatrinhchucvu_pdf($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
      $quatrinhchucvu = QuaTrinhChucVu::join('chucvu', 'chucvu.ma_cv', '=', 'quatrinhchucvu.ma_cv')
        ->join('nhiemky', 'nhiemky.ma_nk', '=', 'quatrinhchucvu.ma_nk')
        ->join('vienchuc', 'vienchuc.ma_vc', '=', 'quatrinhchucvu.ma_vc')
        ->join('khoa', 'khoa.ma_k', '=', 'vienchuc.ma_k')
        ->where('quatrinhchucvu.ma_vc', $ma_vc)
        ->get();
      $vienchuc = VienChuc::find($ma_vc);
      $pdf = PDF::loadView('quatrinhchucvu.quatrinhchucvu_pdf', [
        'quatrinhchucvu' => $quatrinhchucvu,
        'vienchuc' => $vienchuc,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function quanlychucvu_xuatfile( Request $request){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qlqtcv || $phanquyen_qlk){
      $ma_vc = $request->ma_vc;
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', 'vienchuc.ma_k')
        ->whereIn('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhchucvu = QuaTrinhChucVu::join('nhiemky','quatrinhchucvu.ma_nk', '=', 'nhiemky.ma_nk')
        ->join('chucvu', 'chucvu.ma_cv', 'quatrinhchucvu.ma_cv')
        ->whereIn('ma_vc', $ma_vc)
        ->get();
      $pdf = PDF::loadView('pdf.quatrinhchucvu_pdf', [
        'vienchuc' => $vienchuc,
        'list_quatrinhchucvu' => $list_quatrinhchucvu,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
}
