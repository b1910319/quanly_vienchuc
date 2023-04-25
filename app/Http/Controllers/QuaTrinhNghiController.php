<?php

namespace App\Http\Controllers;

use App\Models\Chuyen;
use App\Models\DanhMucNghi;
use App\Models\DungHoc;
use App\Models\GiaHan;
use App\Models\KhenThuong;
use App\Models\KyLuat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\QuaTrinhChucVu;
use App\Models\QuaTrinhNghi;
use App\Models\QuyetDinh;
use App\Models\ThoiHoc;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\TemplateProcessor;
use PDF;

class QuaTrinhNghiController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function quatrinhnghi($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $title = "Quản lý quá trình nghỉ";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $list = QuaTrinhNghi::join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
        ->where('ma_vc', $ma_vc)
        ->orderBy('ma_qtn', 'desc')
        ->get();
      $list_danhmucnghi = DanhMucNghi::where('status_dmn', '<>', '1')
        ->orderBy('ten_dmn', 'asc')
        ->get();
      $vienchuc = VienChuc::find($ma_vc);
      return view('quatrinhnghi.quatrinhnghi')
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('title', $title)
        ->with('ma_vc', $ma_vc)
        ->with('vienchuc', $vienchuc)
        ->with('list_danhmucnghi', $list_danhmucnghi)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_soquyetdinh_qtn(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_qtn = $request->soquyetdinh_qtn;
      if($soquyetdinh_qtn != null){
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_qtn)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_qtn)
          ->first();
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_qtn)
          ->first();
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_qtn)
          ->first();
        $giahan = GiaHan::where('soquyetdinh_gh', $soquyetdinh_qtn)
          ->first();
        $chuyen = Chuyen::where('soquyetdinh_c', $soquyetdinh_qtn)
          ->first();
        $dunghoc = DungHoc::where('soquyetdinh_dh', $soquyetdinh_qtn)
          ->first();
        $thoihoc = ThoiHoc::where('soquyetdinh_th', $soquyetdinh_qtn)
          ->first();
        $quatrinhnghi = QuaTrinhNghi::where('soquyetdinh_qtn', $soquyetdinh_qtn)
          ->first();
        if(isset($quatrinhchucvu) || isset($quyetdinh) || isset($khenthuong) || isset($kyluat)|| isset($giahan) || isset($chuyen) || isset($dunghoc) || isset($thoihoc) || isset($quatrinhnghi)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function check_soquyetdinh_qtn_edit(Request $request){
    $this->check_login();
    if($request->ajax()){
      $soquyetdinh_qtn = $request->soquyetdinh_qtn;
      $ma_qtn = $request->ma_qtn;
      if($soquyetdinh_qtn != null && $ma_qtn != null){
        $quatrinhnghi = QuaTrinhNghi::where('soquyetdinh_qtn', $soquyetdinh_qtn)
          ->where('ma_qtn', '<>', $ma_qtn)
          ->first();
        $quatrinhchucvu = QuaTrinhChucVu::where('soquyetdinh_qtcv', $soquyetdinh_qtn)
          ->first();
        $quyetdinh = QuyetDinh::where('so_qd', $soquyetdinh_qtn)
          ->first();
        $kyluat = KyLuat::where('soquyetdinh_kl', $soquyetdinh_qtn)
          ->first();
        $khenthuong = KhenThuong::where('soquyetdinh_kt', $soquyetdinh_qtn)
          ->first();
        $giahan = GiaHan::where('soquyetdinh_gh', $soquyetdinh_qtn)
          ->first();
        $chuyen = Chuyen::where('soquyetdinh_c', $soquyetdinh_qtn)
          ->first();
        $dunghoc = DungHoc::where('soquyetdinh_dh', $soquyetdinh_qtn)
          ->first();
        $thoihoc = ThoiHoc::where('soquyetdinh_th', $soquyetdinh_qtn)
          ->first();
        if(isset($quatrinhchucvu) || isset($quyetdinh) || isset($khenthuong) || isset($kyluat) || isset($giahan) || isset($chuyen) || isset($dunghoc) || isset($thoihoc) || isset($quatrinhnghi)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_quatrinhnghi(Request $request, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $data = $request->all();
      $quatrinhnghi = new QuaTrinhNghi();
      $quatrinhnghi->ma_vc = $ma_vc;
      $quatrinhnghi->ma_dmn = $data['ma_dmn'];
      $quatrinhnghi->batdau_qtn = $data['batdau_qtn'];
      $quatrinhnghi->ketthuc_qtn = $data['ketthuc_qtn'];
      $quatrinhnghi->ghichu_qtn = $data['ghichu_qtn'];
      $quatrinhnghi->soquyetdinh_qtn = $data['soquyetdinh_qtn'];
      $quatrinhnghi->ngaykyquyetdinh_qtn = $data['ngaykyquyetdinh_qtn'];
      $quatrinhnghi->status_qtn = $data['status_qtn'];
      $vienchuc = VienChuc::find($ma_vc);
      $get_file = $request->file('file_qtn');
      $get_file_quyetdinh = $request->file('filequyetdinh_qtn');
      if($get_file && $get_file_quyetdinh){
        $new_file = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/quatrinhnghi', $new_file);
        $quatrinhnghi->file_qtn = $new_file;
        $new_file_quyetdinh = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file_quyetdinh->getClientOriginalExtension();
        $get_file_quyetdinh->move('public/uploads/quatrinhnghi', $new_file_quyetdinh);
        $quatrinhnghi->filequyetdinh_qtn = $new_file_quyetdinh;
      }
      $quatrinhnghi->save();
      if($data['ma_dmn'] == 9){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 3]);
      }else if($data['ma_dmn'] == 10){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 5]);
      }else if($data['ma_dmn'] == 12){
        $vienchuc->status_vc = VienChuc::find($ma_vc)->update(['status_vc' => 4]);
      }
      $request->session()->put('message','Thêm thành công');
      return Redirect::to('/quatrinhnghi/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  // public function add_bangcap_excel(Request $request){
  //   $this->check_login();
  //   $ma_vc_login = session()->get('ma_vc');
  //   $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
  //     ->where('ma_q', '=', '5')
  //     ->first();
  //   $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
  //     ->where('ma_q', '=', '8')
  //     ->first();
  //   $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
  //     ->where('ma_q', '=', '9')
  //     ->first();
  //   if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
  //     Excel::import(new BangCapImport, $request->file('import_excel'));
  //     return redirect()->back();
  //   }else{
  //     return Redirect::to('/home');
  //   }
  // }
  public function select_quatrinhnghi($ma_qtn){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $quatrinhnghi = QuaTrinhNghi::find($ma_qtn);
      if($quatrinhnghi->status_qtn == 1){
        $quatrinhnghi->status_qtn = QuaTrinhNghi::find($ma_qtn)->update(['status_qtn' => 0]);
      }elseif($quatrinhnghi->status_qtn == 0){
        $quatrinhnghi->status_qtn = QuaTrinhNghi::find($ma_qtn)->update(['status_qtn' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_quatrinhnghi($ma_dmn, $ma_vc){
    $this->check_login();
    $title = "Cập nhật thông tin nghỉ";
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_qlqtcv = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '51')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
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
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $edit = QuaTrinhNghi::find($ma_dmn);
      $list_danhmucnghi = DanhMucNghi::where('status_dmn', '<>', '1')
        ->orderBy('ten_dmn', 'asc')
        ->get();
      return view('quatrinhnghi.quatrinhnghi_edit')
        ->with('edit', $edit)
        ->with('ma_vc', $ma_vc)
        ->with('title', $title)
        ->with('list_danhmucnghi', $list_danhmucnghi)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('phanquyen_admin', $phanquyen_admin);
    }else{
      return Redirect::to('/home');
    }
  }
  public function update_quatrinhnghi(Request $request, $ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $data = $request->all();
      Carbon::now('Asia/Ho_Chi_Minh');
      $quatrinhnghi = QuaTrinhNghi::find($data['ma_qtn']);
      $quatrinhnghi->ma_vc = $ma_vc;
      $quatrinhnghi->ma_dmn = $data['ma_dmn'];
      $quatrinhnghi->batdau_qtn = $data['batdau_qtn'];
      $quatrinhnghi->ketthuc_qtn = $data['ketthuc_qtn'];
      $quatrinhnghi->ghichu_qtn = $data['ghichu_qtn'];
      $quatrinhnghi->soquyetdinh_qtn = $data['soquyetdinh_qtn'];
      $quatrinhnghi->ngaykyquyetdinh_qtn = $data['ngaykyquyetdinh_qtn'];
      $quatrinhnghi->status_qtn = $data['status_qtn'];
      $vienchuc = VienChuc::find($ma_vc);
      $get_file = $request->file('file_qtn');
      $get_file_quyetdinh = $request->file('filequyetdinh_qtn');
      if($get_file && $get_file_quyetdinh){
        $new_file = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($quatrinhnghi->file_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn);
        }
        $get_file->move('public/uploads/quatrinhnghi', $new_file);
        $quatrinhnghi->file_qtn = $new_file;
        $new_file_quyetdinh = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file_quyetdinh->getClientOriginalExtension();
        if($quatrinhnghi->filequyetdinh_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn);
        }
        $get_file_quyetdinh->move('public/uploads/quatrinhnghi', $new_file_quyetdinh);
        $quatrinhnghi->filequyetdinh_qtn = $new_file_quyetdinh;
      }else if($get_file){
        $new_file = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($quatrinhnghi->file_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn);
        }
        $get_file->move('public/uploads/quatrinhnghi', $new_file);
        $quatrinhnghi->file_qtn = $new_file;
      }else if($get_file_quyetdinh){
        $new_file_quyetdinh = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file_quyetdinh->getClientOriginalExtension();
        if($quatrinhnghi->filequyetdinh_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn);
        }
        $get_file_quyetdinh->move('public/uploads/quatrinhnghi', $new_file_quyetdinh);
        $quatrinhnghi->filequyetdinh_qtn = $new_file_quyetdinh;
      }
      $quatrinhnghi->updated_qtn = Carbon::now();
      $quatrinhnghi->save();
      return Redirect::to('/quatrinhnghi/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_quatrinhnghi(Request $request){
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
          $quatrinhnghi = QuaTrinhNghi::find($id);
          if($quatrinhnghi->file_qtn && $quatrinhnghi->filequyetdinh_qtn ){
            unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn);
            unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn);
          }else if($quatrinhnghi->file_qtn){
            unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn);
          }else if($quatrinhnghi->filequyetdinh_qtn){
            unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn);
          }
          QuaTrinhNghi::find($id)->delete();
        }
      }
    }
  }
  public function delete_quatrinhnghi_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_qtn = $request->ma_qtn;
      $list = QuaTrinhNghi::whereIn('ma_qtn', $ma_qtn)->get();
      foreach($list as $quatrinhnghi){
        if($quatrinhnghi->file_qtn && $quatrinhnghi->filequyetdinh_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn);
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn);
        }else if($quatrinhnghi->file_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn);
        }else if($quatrinhnghi->filequyetdinh_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn);
        }
      }
      QuaTrinhNghi::whereIn('ma_qtn', $ma_qtn)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_quatrinhnghi($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $list = QuaTrinhNghi::where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $quatrinhnghi){
        if($quatrinhnghi->file_qtn && $quatrinhnghi->filequyetdinh_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn);
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn);
        }else if($quatrinhnghi->file_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn);
        }else if($quatrinhnghi->filequyetdinh_qtn){
          unlink('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn);
        }
        $quatrinhnghi->delete();
      }
      return Redirect::to('/quatrinhnghi/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function quatrinhnghi_xuatfile( $ma_vc){
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
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', 'vienchuc.ma_k')
        ->where('ma_vc', $ma_vc)
        ->get();
      $list_quatrinhnghi= QuaTrinhNghi::join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
        ->where('ma_vc', $ma_vc)
        ->get();
      $pdf = PDF::loadView('pdf.quatrinhnghi_pdf', [
        'vienchuc' => $vienchuc,
        'list_quatrinhnghi' => $list_quatrinhnghi,
      ]);
      return $pdf->stream();
    }else{
      return Redirect::to('/home');
    }
  }
  public function quatrinhnghi_xuatfile_word($ma_vc){
    $this->check_login();
    $ma_vc_login = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qlk = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '9')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qlk || $phanquyen_qltt){
      $vienchuc = VienChuc::join('khoa', 'khoa.ma_k', 'vienchuc.ma_k')
        ->where('ma_vc', $ma_vc)
        ->first();
      $list_quatrinhnghi = QuaTrinhNghi::join('danhmucnghi', 'danhmucnghi.ma_dmn', '=', 'quatrinhnghi.ma_dmn')
        ->where('ma_vc', $ma_vc)
        ->get();
      $temp = new TemplateProcessor('public/word/quatrinhnghi_vienchuc.docx');
      $temp->setValue('hoten_vc',$vienchuc->hoten_vc);
      $temp->setValue('tenkhac_vc',$vienchuc->tenkhac_vc);
      $temp->setValue('ngaysinh_vc',$vienchuc->ngaysinh_vc);
      if($vienchuc->gioitinh_vc == 0){
        $gioitinh_vc = 'Nam';
      }else if($vienchuc->gioitinh_vc == 1){
        $gioitinh_vc = 'Nữ';
      }
      $temp->setValue('gioitinh_vc',$gioitinh_vc);
      $temp->setValue('ten_k',$vienchuc->ten_k);
      $temp->setValue('user_vc',$vienchuc->user_vc);
      $temp->setImageValue('hinh_vc', array('path' => 'public/uploads/vienchuc/'.$vienchuc->hinh_vc, 'width' => 100, 'height' => 150));
      $quatrinhnghi_arr = array();
      foreach($list_quatrinhnghi as $key => $quatrinhnghi){
        $quatrinhnghi_arr[] = [
          'stt' => $key+1, 
          'ten_dmn' => $quatrinhnghi->ten_dmn, 
          'batdau_qtn' => $quatrinhnghi->batdau_qtn, 
          'ketthuc_qtn' => $quatrinhnghi->ketthuc_qtn, 
          'ghichu_qtn' => $quatrinhnghi->ghichu_qtn, 
          'soquyetdinh_qtn' => $quatrinhnghi->soquyetdinh_qtn, 
          'ngaykyquyetdinh_qtn' => $quatrinhnghi->ngaykyquyetdinh_qtn
        ];
      };
      $temp->cloneRowAndSetValues('stt', $quatrinhnghi_arr);
      $name_file = $vienchuc->hoten_vc;
      $temp->saveAs($name_file.'.docx');
      return response()->download($name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }
}
