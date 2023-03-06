@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-2">
    <div class="row">
      <div class="mt-2" >
        <a href="{{ URL::to('thongke_qlcttc') }}">
          <button type="button" class="btn btn-primary" style="background-color:
            @if ($count_ketqua_lop != '' || $count_ketqua_ma_lop != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Viên chức hoàn thành khoá học
          </button>
        </a>
      </div>
      {{-- <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_lbc') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_loaibangcap != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Theo loại bằng cấp
          </button>
        </a>
      </div> --}}
      {{-- <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_chucvu') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_chucvu != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Theo chức vụ
          </button>
        </a>
      </div> --}}
      {{-- <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_hdt') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_hedaotao != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Theo hệ đào tạo
          </button>
        </a>
      </div> --}}
      {{-- <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_khoa') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_khoa != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Theo khoa
          </button>
        </a>
      </div> --}}
      {{-- <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_nghihuu') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_nghihuu != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Viên chức nghĩ hưu
          </button>
        </a>
      </div> --}}
      {{-- <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_quequan') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_tinh != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Quê quán viên chức
          </button>
        </a>
      </div> --}}
    </div>
  </div>
  <div class="card-box col-10">
    <div class="row">
      <div class="col-6">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức </p>
      </div>
    </div>
    @if ($count_ketqua_lop || $count_ketqua_ma_lop)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn lớp
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qlcttc_ketqua_ma_lop') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_l">
                    <option value="0" >Chọn lớp</option>
                    @foreach ($list_lop as $lop)
                      <option value="{{ $lop->ma_l }}" >{{ $lop->ten_l }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qlcttc') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    {{-- @if ($count_tinh || $count_quequan_tinh)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn tỉnh/thành phố thống kê
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_quequan_tinh') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_t">
                    <option value="0" >Chọn tỉnh</option>
                    @foreach ($list_tinh as $tinh)
                      <option value="{{ $tinh->ma_t }}" >{{ $tinh->ten_t }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_quequan') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_nghihuu || $count_nghihuu_time || $count_nghihuu_khoa)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn khoa thống kê
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_nghihuu_khoa') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_k">
                    <option value="0" >Chọn khoa</option>
                    @foreach ($list_khoa as $khoa)
                      <option value="{{ $khoa->ma_k }}" >{{ $khoa->ten_k }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="background-color: #00425A; border: none; width: 100%" >
            Chọn khoảng thời gian thống kê
          </button>
          <div id="demo" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_nghihuu_time') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-4">
                  <input type='date' class='form-control input_table' autofocus required name="batdau">
                </div>
                <div class="col-4">
                  <input type='date' class='form-control input_table' autofocus required name="ketthuc">
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_nghihuu') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_hedaotao || $count_hedaotao_ma_hdt)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn hệ đào tạo
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_hedaotao') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_hdt">
                    <option value="0" >Chọn hệ đào tạo</option>
                    @foreach ($list_hedaotao as $hedaotao)
                      <option value="{{ $hedaotao->ma_hdt }}" >{{ $hedaotao->ten_hdt }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_hdt') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_loaibangcap || $count_lbc)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn loại bằng cấp
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_loaibangcap') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_lbc">
                    <option value="0" >Chọn loại bằng cấp</option>
                    @foreach ($list_loaibangcap as $loaibangcap)
                      <option value="{{ $loaibangcap->ma_lbc }}" >{{ $loaibangcap->ten_lbc }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_lbc') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_chucvu || $count_cv)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn chức vụ
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_cv') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_cv">
                    <option value="0" >Chọn chức vụ</option>
                    @foreach ($list_chucvu as $chucvu)
                      <option value="{{ $chucvu->ma_cv }}" >{{ $chucvu->ten_cv }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_chucvu') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_khoa || $count_khoa_ma_k)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn khoa thống kê
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_khoa_ma_k') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_k">
                    <option value="0" >Chọn khoa</option>
                    @foreach ($list_khoa as $khoa)
                      <option value="{{ $khoa->ma_k }}" >{{ $khoa->ten_k }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_khoa') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif --}}
    <div id="myfirstchart_qltt_1" style="height: 250px;"></div>
    @if ($count_ketqua_lop != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_ketqua_lop_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_ketqua_ma_lop != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_ketqua_ma_lop_pdf/'.$ma_l) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    {{-- @if ($count_loaibangcap != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_lbc_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_lbc != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loaibangcap_pdf/'.$ma_lbc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_chucvu != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_chucvu_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_hedaotao != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_hdt_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_khoa != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_khoa_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_khoa_ma_k != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_khoa_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_nghihuu != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_nghihuu_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_nghihuu_time != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_nghihuu_time_pdf/'.$batdau.'/'.$ketthuc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_nghihuu_khoa != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_nghihuu_khoa_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_tinh != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_quequan_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_quequan_tinh != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_quequan_tinh_pdf/'.$ma_t) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_hedaotao_ma_hdt != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_hedaotao_pdf/'.$ma_hdt) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    {{-- @if ($count_cv != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_cv_pdf/'.$ma_cv) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
  </div>
</div>
<script>
  $(document).ready(function(){
    new Morris.Bar({
      element: 'myfirstchart_qltt_1',
      pointFillColors: ['#F94A29'],
      parseTime: false,
      hideHover:true,
      barColors: ['#FF6363'],
      data: [
        <?php
          if($count_ketqua_lop){
            foreach ($count_ketqua_lop as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if($count_ketqua_ma_lop){
            foreach ($count_ketqua_ma_lop as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }
          //else if($count_loaibangcap){
          //   foreach ($count_loaibangcap as $key => $count){
          //     foreach($list_loaibangcap as $key => $loaibangcap){
          //       if($count->ma_lbc == $loaibangcap->ma_lbc){
          //         $ten_lbc = $loaibangcap->ten_lbc;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lbc', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_lbc){
          //   foreach ($count_lbc as $key => $count){
          //     foreach($list_loaibangcap as $key => $loaibangcap){
          //       if($count->ma_lbc == $loaibangcap->ma_lbc){
          //         $ten_lbc = $loaibangcap->ten_lbc;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lbc', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_chucvu){
          //   foreach ($count_chucvu as $key => $count){
          //     foreach($list_chucvu as $key => $chucvu){
          //       if($count->ma_cv == $chucvu->ma_cv){
          //         $ten_cv = $chucvu->ten_cv;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_cv', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_cv){
          //   foreach ($count_cv as $key => $count){
          //     foreach($list_chucvu as $key => $chucvu){
          //       if($count->ma_cv == $chucvu->ma_cv){
          //         $ten_cv = $chucvu->ten_cv;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_cv', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_hedaotao){
          //   foreach ($count_hedaotao as $key => $count){
          //     foreach($list_hedaotao as $key => $hedaotao){
          //       if($count->ma_hdt == $hedaotao->ma_hdt){
          //         $ten_hdt = $hedaotao->ten_hdt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_hdt', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_hedaotao_ma_hdt){
          //   foreach ($count_hedaotao_ma_hdt as $key => $count){
          //     foreach($list_hedaotao as $key => $hedaotao){
          //       if($count->ma_hdt == $hedaotao->ma_hdt){
          //         $ten_hdt = $hedaotao->ten_hdt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_hdt', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_khoa){
          //   foreach ($count_khoa as $key => $count){
          //     foreach($list_khoa as $key => $khoa){
          //       if($count->ma_k == $khoa->ma_k){
          //         $ten_k = $khoa->ten_k;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_k', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_khoa_ma_k){
          //   foreach ($count_khoa_ma_k as $key => $count){
          //     foreach($list_khoa as $key => $khoa){
          //       if($count->ma_k == $khoa->ma_k){
          //         $ten_k = $khoa->ten_k;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_k', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_nghihuu){
          //   foreach ($count_nghihuu as $key => $count){
          //     $thoigiannghi_vc = $count->thoigiannghi_vc;
          //     $tong = $count->sum;
          //     echo "{ year: '$thoigiannghi_vc', value: $tong },";
          //   }
          // }else if($count_nghihuu_time){
          //   foreach ($count_nghihuu_time as $key => $count){
          //     $thoigiannghi_vc = $count->thoigiannghi_vc;
          //     $tong = $count->sum;
          //     echo "{ year: '$thoigiannghi_vc', value: $tong },";
          //   }
          // }else if($count_nghihuu_khoa){
          //   foreach ($count_nghihuu_khoa as $key => $count){
          //     $thoigiannghi_vc = $count->thoigiannghi_vc;
          //     $tong = $count->sum;
          //     echo "{ year: '$thoigiannghi_vc', value: $tong },";
          //   }
          // }else if($count_tinh){
          //   foreach ($count_tinh as $key => $count){
          //     foreach($list_tinh as $key => $tinh){
          //       if($count->ma_t == $tinh->ma_t){
          //         $ten_t = $tinh->ten_t;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_t', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_quequan_tinh){
          //   foreach ($count_quequan_tinh as $key => $count){
          //     foreach($list_tinh as $key => $tinh){
          //       if($count->ma_t == $tinh->ma_t){
          //         $ten_t = $tinh->ten_t;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_t', value: $tong },";
          //       }
          //     }
          //   }
          // }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
  })
</script>
@endsection
