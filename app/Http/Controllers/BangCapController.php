<?php

namespace App\Http\Controllers;

use App\Imports\BangCapImport;
use App\Models\BangCap;
use App\Models\HeDaoTao;
use App\Models\LoaiBangCap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\PhanQuyen;
use App\Models\VienChuc;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\TemplateProcessor;

class BangCapController extends Controller
{
  public function check_login(){
    $ma_vc = session()->get('ma_vc');
    if($ma_vc){
      return Redirect::to('/home');
    }else{
      return Redirect::to('/login')->send();
    }
  }
  public function bangcap($ma_vc){
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
    $title = "Quản lý loại bằng cấp";
    $phanquyen_qlktkl = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '7')
      ->first();
    $phanquyen_qlcttc = PhanQuyen::where('ma_vc', $ma_vc_login)
      ->where('ma_q', '=', '6')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlk){
      $list = BangCap::join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->where('ma_vc', $ma_vc)
        ->orderBy('ma_bc', 'desc')
        ->get();
      $count = BangCap::where('ma_vc', $ma_vc)
        ->select(DB::raw('count(ma_bc) as sum'))
        ->get();
      $count_status = BangCap::where('ma_vc', $ma_vc)
        ->select(DB::raw('count(ma_bc) as sum, status_bc'))
        ->groupBy('status_bc')
        ->get();
      $list_hedaotao = HeDaoTao::where('status_hdt', '<>', '1')
        ->orderBy('ten_hdt', 'asc')
        ->get();
      $list_loaibangcap = LoaiBangCap::where('status_lbc', '<>', '1')
        ->orderBy('ten_lbc', 'asc')
        ->get();
      $vienchuc = VienChuc::find($ma_vc);
      return view('bangcap.bangcap')
        ->with('phanquyen_qlktkl', $phanquyen_qlktkl)
        ->with('phanquyen_qlcttc', $phanquyen_qlcttc)
        ->with('phanquyen_admin', $phanquyen_admin)
        ->with('phanquyen_qlk', $phanquyen_qlk)
        ->with('phanquyen_qltt', $phanquyen_qltt)
        ->with('phanquyen_qlqtcv', $phanquyen_qlqtcv)
        ->with('count', $count)
        ->with('title', $title)
        ->with('ma_vc', $ma_vc)
        ->with('vienchuc', $vienchuc)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loaibangcap', $list_loaibangcap)
        ->with('count_status', $count_status)
        ->with('list', $list);
    }else{
      return Redirect::to('/home');
    }
  }
  public function check_sobang_bc(Request $request){
    $this->check_login();
    if($request->ajax()){
      $sobang_bc = $request->sobang_bc;
      if($sobang_bc != null){
        $bangcap = BangCap::where('sobang_bc', $sobang_bc)
          ->first();
        if(isset($bangcap)){
          return 1;
        }else{
          return 0;
        }
      }
    }
  }
  public function add_bangcap(Request $request, $ma_vc){
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
      $bangcap = new BangCap();
      $bangcap->ma_vc = $ma_vc;
      $bangcap->ma_hdt = $data['ma_hdt'];
      $bangcap->ma_lbc = $data['ma_lbc'];
      $bangcap->trinhdochuyenmon_bc = $data['trinhdochuyenmon_bc'];
      $bangcap->truonghoc_bc = $data['truonghoc_bc'];
      $bangcap->tunam_bc = $data['tunam_bc'];
      $bangcap->dennam_bc = $data['dennam_bc'];
      $bangcap->sobang_bc = $data['sobang_bc'];
      $bangcap->ngaycap_bc = $data['ngaycap_bc'];
      $bangcap->noicap_bc = $data['noicap_bc'];
      $bangcap->xephang_bc = $data['xephang_bc'];
      $bangcap->status_bc = $data['status_bc'];
      $vienchuc = VienChuc::find($ma_vc);
      $get_file = $request->file('file_bc');
      if($get_file){
        $new_file = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        $get_file->move('public/uploads/bangcap', $new_file);
        $bangcap->file_bc = $new_file;
      }
      $bangcap->save();
      $request->session()->put('message_add_bangcap','Thêm thành công');
      return Redirect::to('/bangcap/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function add_bangcap_excel(Request $request){
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
      Excel::import(new BangCapImport, $request->file('import_excel'));
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function select_bangcap($ma_bc){
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
      $bac = BangCap::find($ma_bc);
      if($bac->status_bc == 1){
        $bac->status_bc = BangCap::find($ma_bc)->update(['status_bc' => 0]);
      }elseif($bac->status_bc == 0){
        $bac->status_bc = BangCap::find($ma_bc)->update(['status_bc' => 1]);
      }
      return redirect()->back();
    }else{
      return Redirect::to('/home');
    }
  }
  public function edit_bangcap($ma_bc, $ma_vc){
    $this->check_login();
    $title = "Cập nhật thông tin bằng cấp";
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
      $edit = BangCap::find($ma_bc);
      $list_hedaotao = HeDaoTao::where('status_hdt', '<>', '1')
        ->orderBy('ten_hdt', 'asc')
        ->get();
      $list_loaibangcap = LoaiBangCap::where('status_lbc', '<>', '1')
        ->orderBy('ten_lbc', 'asc')
        ->get();
      return view('bangcap.bangcap_edit')
        ->with('edit', $edit)
        ->with('ma_vc', $ma_vc)
        ->with('title', $title)
        ->with('list_hedaotao', $list_hedaotao)
        ->with('list_loaibangcap', $list_loaibangcap)
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
  public function update_bangcap(Request $request, $ma_bc, $ma_vc){
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
      $bangcap = BangCap::find($ma_bc);
      $bangcap->ma_vc = $ma_vc;
      $bangcap->ma_hdt = $data['ma_hdt'];
      $bangcap->ma_lbc = $data['ma_lbc'];
      $bangcap->trinhdochuyenmon_bc = $data['trinhdochuyenmon_bc'];
      $bangcap->truonghoc_bc = $data['truonghoc_bc'];
      $bangcap->tunam_bc = $data['tunam_bc'];
      $bangcap->dennam_bc = $data['dennam_bc'];
      $bangcap->sobang_bc = $data['sobang_bc'];
      $bangcap->ngaycap_bc = $data['ngaycap_bc'];
      $bangcap->noicap_bc = $data['noicap_bc'];
      $bangcap->xephang_bc = $data['xephang_bc'];
      $bangcap->status_bc = $data['status_bc'];
      $vienchuc = VienChuc::find($ma_vc);
      $get_file = $request->file('file_bc');
      if($get_file){
        $new_file = $vienchuc->hoten_vc.rand(0,999).'.'.$get_file->getClientOriginalExtension();
        if($bangcap->file_bc){
          unlink('public/uploads/bangcap/'.$bangcap->file_bc);
        }
        $get_file->move('public/uploads/bangcap', $new_file);
        $bangcap->file_bc = $new_file;
      }
      $bangcap->updated_bc = Carbon::now();
      $bangcap->save();
      $request->session()->put('message_update_bangcap','Cập nhật thành công');
      return Redirect::to('/bangcap/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function delete_bangcap(Request $request){
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
          $bangcap = BangCap::find($id);
          if($bangcap->file_bc){
            unlink('public/uploads/bangcap/'.$bangcap->file_bc);
          }
          BangCap::find($id)->delete();
        }
      }
    }
  }
  public function delete_bangcap_check(Request $request){
    $this->check_login();
    $ma_vc = session()->get('ma_vc');
    $phanquyen_admin = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '5')
      ->first();
    $phanquyen_qltt = PhanQuyen::where('ma_vc', $ma_vc)
      ->where('ma_q', '=', '8')
      ->first();
    if($phanquyen_admin || $phanquyen_qltt){
      $ma_bc = $request->ma_bc;
      $list = BangCap::whereIn('ma_bc', $ma_bc)->get();
      foreach($list as $bangcap){
        if($bangcap->file_bc){
          unlink('public/uploads/bangcap/'.$bangcap->file_bc);
        }
      }
      BangCap::whereIn('ma_bc', $ma_bc)->delete();
      return redirect()->back();
    }
  }
  public function delete_all_bangcap($ma_vc){
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
      $list = BangCap::where('ma_vc', $ma_vc)
        ->get();
      foreach($list as $key => $bangcap){
        if($bangcap->file_bc){
          unlink('public/uploads/bangcap/'.$bangcap->file_bc);
        }
        $bangcap->delete();
      }
      return Redirect::to('/bangcap/'.$ma_vc);
    }else{
      return Redirect::to('/home');
    }
  }
  public function bangcap_xuatfile_word($ma_vc){
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
      $list_bangcap = BangCap::join('hedaotao', 'hedaotao.ma_hdt', '=', 'bangcap.ma_hdt')
        ->join('loaibangcap', 'loaibangcap.ma_lbc', '=', 'bangcap.ma_lbc')
        ->where('ma_vc', $ma_vc)
        ->get();
      $temp = new TemplateProcessor('public/word/bangcap_vienchuc.docx');
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
      $bangcap_arr = array();
      foreach($list_bangcap as $key => $bangcap){
        $bangcap_arr[] = [
          'stt' => $key+1, 
          'ten_hdt' => $bangcap->ten_hdt, 
          'ten_lbc' => $bangcap->ten_lbc, 
          'trinhdochuyenmon_bc' => $bangcap->trinhdochuyenmon_bc, 
          'truonghoc_bc' => $bangcap->truonghoc_bc, 
          'nienkhoa_bc' => $bangcap->nienkhoa_bc, 
          'sobang_bc' => $bangcap->sobang_bc,
          'ngaycap_bc' => $bangcap->ngaycap_bc,
          'noicap_bc' => $bangcap->noicap_bc,
          'xephang_bc' => $bangcap->xephang_bc
        ];
      };
      $temp->cloneRowAndSetValues('stt', $bangcap_arr);
      $name_file = $vienchuc->hoten_vc;
      $temp->saveAs($name_file.'.docx');
      return response()->download($name_file.'.docx');
    }else{
      return Redirect::to('/home');
    }
  }
}
