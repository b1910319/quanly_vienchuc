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
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qlcttc_giahan') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_giahan != '' || $count_giahan_time != '' || $count_giahan_khoa != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Viên chức gia hạn
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qlcttc_dunghoc') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_dunghoc != '' || $count_dunghoc_time != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Viên chức xin tạm dừng học
          </button>
        </a>
      </div>
    </div>
  </div>
  <div class="card-box col-10">
    <div class="row">
      <div class="col-6">
        <p class="fw-bold" style="font-size: 18px;">Thống kê quản lý công tác tổ chức </p>
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
    @if ($count_giahan || $count_giahan_time || $count_giahan_khoa)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Khoảng thời gian
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qlcttc_giahan_time') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-6">
                  <input type='date' class='form-control input_table' autofocus required name="batdau">
                </div>
                <div class="col-6">
                  <input type='date' class='form-control input_table' autofocus required name="ketthuc">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-6">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo4" style="background-color: #00425A; border: none; width: 100%" >
            Chọn khoa
          </button>
          <div id="demo4" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qlcttc_giahan_khoa') }}" method="post">
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
          <a href="{{ URL::to('thongke_qlcttc_giahan') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_dunghoc || $count_dunghoc_time)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Khoảng thời gian
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qlcttc_dunghoc_time') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-6">
                  <input type='date' class='form-control input_table' autofocus required name="batdau">
                </div>
                <div class="col-6">
                  <input type='date' class='form-control input_table' autofocus required name="ketthuc">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-6">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo4" style="background-color: #00425A; border: none; width: 100%" >
            Chọn khoa
          </button>
          <div id="demo4" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qlcttc_dunghoc_khoa') }}" method="post">
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
          <a href="{{ URL::to('thongke_qlcttc_dunghoc') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
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
    @if ($count_giahan != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_giahan_time != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_time_pdf/'.$batdau.'/'.$ketthuc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_giahan_khoa != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_khoa_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_dunghoc != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_dunghoc_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_dunghoc_time != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_dunghoc_time_pdf/'.$batdau.'/'.$ketthuc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
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
          }else if($count_giahan){
            foreach ($count_giahan as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $thoigian_gh = $count->thoigian_gh;
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$thoigian_gh ( $ten_k )', value: $tong },";
                }
              }
            }
          }else if($count_giahan_time){
            foreach ($count_giahan_time as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $thoigian_gh = $count->thoigian_gh;
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$thoigian_gh ( $ten_k )', value: $tong },";
                }
              }
            }
          }else if($count_giahan_khoa){
            foreach ($count_giahan_khoa as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $thoigian_gh = $count->thoigian_gh;
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$thoigian_gh ( $ten_k )', value: $tong },";
                }
              }
            }
          }else if($count_dunghoc){
            foreach ($count_dunghoc as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $batdau_dh = $count->batdau_dh;
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$batdau_dh ( $ten_k )', value: $tong },";
                }
              }
            }
          }else if($count_dunghoc_time){
            foreach ($count_dunghoc_time as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $batdau_dh = $count->batdau_dh;
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$batdau_dh ( $ten_k )', value: $tong },";
                }
              }
            }
          }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
  })
</script>
@endsection
