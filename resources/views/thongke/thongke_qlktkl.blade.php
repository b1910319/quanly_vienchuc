@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-2">
    <div class="row">
      <div>
        <a href="{{ URL::to('thongke_qlktkl_lkt') }}">
          <button type="button" class="btn btn-primary" style="background-color:
            @if ($count_loaikhenthuong != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Loại khen thưởng
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qlktkl_htkt') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_hinhthuckhenthuong != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Hình thức khen thưởng
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qlktkl_khoa') }}">
          <button type="button" class="btn btn-primary" style="background-color:
            @if ($count_khoa != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Khoa
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qlktkl_time') }}">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="background-color:
            @if ($count_khenthuong_time != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%" >
            Khoảng thời gian
          </button>
        </a>
      </div>
    </div>
  </div>
  <div class="card-box col-10">
    <div class="row">
      <div class="col-6">
        <p class="fw-bold" style="font-size: 18px;">Thống kê khen thưởng </p>
      </div>
    </div>
    @if ($count_loaikhenthuong || $count_ma_lkt)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn loại khen thưởng
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qlktkl_ma_lkt') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_lkt">
                    <option value="0" >Chọn loại khen thưởng</option>
                    @foreach ($list_loaikhenthuong as $loaikhenthuong)
                      <option value="{{ $loaikhenthuong->ma_lkt }}" >{{ $loaikhenthuong->ten_lkt }}</option>
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
          <a href="{{ URL::to('thongke_qlktkl_lkt') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_hinhthuckhenthuong || $count_ma_htkt)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn hình thức khen thưởng
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qlktkl_ma_htkt') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_htkt">
                    <option value="0" >Chọn hình thức khen thưởng</option>
                    @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong)
                      <option value="{{ $hinhthuckhenthuong->ma_htkt }}" >{{ $hinhthuckhenthuong->ten_htkt }}</option>
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
          <a href="{{ URL::to('thongke_qlktkl_htkt') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_khenthuong_time || $count_kt_time)
    <div class="row">
      <div class="col-3">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="background-color: #00425A; border: none; width: 100%" >
          Chọn khoảng thời gian
        </button>
        <div id="demo" class="collapse mt-3">
          <form action="{{ URL::to('thongke_qlktkl_thoigian') }}" method="post">
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
      <div class="col-1">
        <a href="{{ URL::to('thongke_qlktkl_time') }}">
          <button type="button" class="btn btn-warning">
            <i class="fa-solid fa-arrows-rotate"></i>
          </button>
        </a>
      </div>
    </div>
    @endif
    @if ($count_khoa || $count_ma_khoa)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn khoa
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qlktkl_ma_khoa') }}" method="post">
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
          <a href="{{ URL::to('thongke_qlktkl_khoa') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    <div id="myfirstchart_qlktkl_1" style="height: 250px;"></div>
    @if ($count_loaikhenthuong != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_lkt_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_ma_lkt != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_lkt_pdf/'.$ma_lkt) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_hinhthuckhenthuong != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_htkt_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_ma_htkt != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_htkt_pdf/'.$ma_htkt) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_khoa != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_khoa_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_ma_khoa != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_ma_khoa_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_khenthuong_time != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_time_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_kt_time != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_time_pdf/'.$batdau.'/'.$ketthuc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
  </div>
  <div class="card-box col-2">
    <div>
      <a href="{{ URL::to('thongke_qlktkl_lkl') }}">
        <button type="button" class="btn btn-primary" style="background-color:
          @if ($count_loaikyluat != '')
            #850000
          @else
            gray
          @endif
          ; border: none; width: 100%;">
          Loại kỷ luật
        </button>
      </a>
    </div>
    <div class="mt-2">
      <a href="{{ URL::to('thongke_qlktkl_kl_khoa') }}">
        <button type="button" class="btn btn-primary" style="background-color:
          @if ($count_kl_khoa != '')
            #850000
          @else
            gray
          @endif
          ; border: none; width: 100%;">
          Khoa
        </button>
      </a>
    </div>
    <div class="mt-2">
      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1" style="background-color:
      @if ($count_kyluat_time != '')
        #850000
      @else
        gray
      @endif
      ; border: none; width: 100%" >
        Chọn khoảng thời gian để xuất file
      </button>
      <div id="demo1" class="collapse mt-3">
        <form action="{{ URL::to('thongke_qlktkl_kl_time') }}" method="post">
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
  </div>
  <div class="card-box col-10">
    <div class="row">
      <div class="col-6">
        <p class="fw-bold" style="font-size: 18px;">Thống kê kỷ luật </p>
      </div>
      @if ($count_loaikyluat || $count_ma_lkl)
        <div class="row">
          <div class="col-3">
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo4" style="background-color: #00425A; border: none; width: 100%" >
              Chọn loại kỷ luật
            </button>
            <div id="demo4" class="collapse mt-3">
              <form action="{{ URL::to('thongke_qlktkl_ma_lkl') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-8">
                    <select class="custom-select input_table" id="gender2" name="ma_lkl">
                      <option value="0" >Chọn loại kỷ luật</option>
                      @foreach ($list_loaikyluat as $loaikyluat)
                        <option value="{{ $loaikyluat->ma_lkl }}" >{{ $loaikyluat->ten_lkl }}</option>
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
            <a href="{{ URL::to('thongke_qlktkl_lkl') }}">
              <button type="button" class="btn btn-warning">
                <i class="fa-solid fa-arrows-rotate"></i>
              </button>
            </a>
          </div>
        </div>
      @endif
      <div class="row">
        <div id="myfirstchart_qlktkl_2" style="height: 250px;"></div>
        @if ($count_kyluat_time != '')
          <div class="row">
            <div class="col-2">
              <a href="{{ URL::to('/thongke_qlktkl_kl_time_pdf/'.$batdau.'/'.$ketthuc) }}">
                <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
              </a>
            </div>
          </div>
        @endif
        @if ($count_loaikyluat != '')
          <div class="row">
            <div class="col-2">
              <a href="{{ URL::to('/thongke_qlktkl_lkl_all_pdf') }}">
                <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
              </a>
            </div>
          </div>
        @endif
        @if ($count_ma_lkl != '')
          <div class="row">
            <div class="col-2">
              <a href="{{ URL::to('/thongke_qlktkl_lkl_pdf/'.$ma_lkl) }}">
                <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
              </a>
            </div>
          </div>
        @endif
        @if ($count_kl_khoa != '')
          <div class="row">
            <div class="col-2">
              <a href="{{ URL::to('/thongke_qlktkl_kl_khoa_all_pdf') }}">
                <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
              </a>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    // Thống kê viên chức theo loại khen thưởng
    new Morris.Bar({
      element: 'myfirstchart_qlktkl_1',
      pointFillColors: ['#F94A29'],
      parseTime: false,
      hideHover:true,
      barColors: ['#554994'],
      data: [
        <?php
          if($count_loaikhenthuong){
            foreach ($count_loaikhenthuong as $key => $count){
              foreach($list_loaikhenthuong as $key => $loaikhenthuong){
                if($count->ma_lkt == $loaikhenthuong->ma_lkt){
                  $ten_lkt = $loaikhenthuong->ten_lkt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkt', value: $tong },";
                }
              }
            }
          }else if($count_ma_lkt){
            foreach ($count_ma_lkt as $key => $count){
              foreach($list_loaikhenthuong as $key => $loaikhenthuong){
                if($count->ma_lkt == $loaikhenthuong->ma_lkt){
                  $ten_lkt = $loaikhenthuong->ten_lkt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkt', value: $tong },";
                }
              }
            }
          }else if($count_hinhthuckhenthuong){
            foreach ($count_hinhthuckhenthuong as $key => $count){
              foreach($list_hinhthuckhenthuong as $key => $hinhthuckhenthuong){
                if($count->ma_htkt == $hinhthuckhenthuong->ma_htkt){
                  $ten_htkt = $hinhthuckhenthuong->ten_htkt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_htkt', value: $tong },";
                }
              }
            }
          }else if($count_ma_htkt){
            foreach ($count_ma_htkt as $key => $count){
              foreach($list_hinhthuckhenthuong as $key => $hinhthuckhenthuong){
                if($count->ma_htkt == $hinhthuckhenthuong->ma_htkt){
                  $ten_htkt = $hinhthuckhenthuong->ten_htkt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_htkt', value: $tong },";
                }
              }
            }
          }else if($count_khenthuong_time){
            foreach ($count_khenthuong_time as $key => $count){
              $ngay_kt = $count->ngay_kt;
              $tong = $count->sum;
              echo "{ year: '$ngay_kt', value: $tong },";
            }
          }else if($count_kt_time){
            foreach ($count_kt_time as $key => $count){
              $ngay_kt = $count->ngay_kt;
              $tong = $count->sum;
              echo "{ year: '$ngay_kt', value: $tong },";
            }
          }else if($count_khoa){
            foreach ($count_khoa as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }else if($count_ma_khoa){
            foreach ($count_ma_khoa as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }
          
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số khen thưởng']
    });
    new Morris.Line({
      element: 'myfirstchart_qlktkl_2',
      parseTime: false,
      hideHover:true,
      pointFillColors: ['#16FF00'],
      lineColors:['#F94A29'],
      parseTime: false,
      pointStrokeColors: ['#379237'],
      data: [
        <?php
          if($count_loaikyluat){
            foreach ($count_loaikyluat as $key => $count){
              foreach($list_loaikyluat as $key => $loaikyluat){
                if($count->ma_lkl == $loaikyluat->ma_lkl){
                  $ten_lkl = $loaikyluat->ten_lkl;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkl', value: $tong },";
                }
              }
            }
          }else if($count_ma_lkl){
            foreach ($count_ma_lkl as $key => $count){
              foreach($list_loaikyluat as $key => $loaikyluat){
                if($count->ma_lkl == $loaikyluat->ma_lkl){
                  $ten_lkl = $loaikyluat->ten_lkl;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkl', value: $tong },";
                }
              }
            }
          }else if($count_kyluat_time){
            foreach ($count_kyluat_time as $key => $count){
              $ngay_kl = $count->ngay_kl;
              $tong = $count->sum;
              echo "{ year: '$ngay_kl', value: $tong },";
            }
          }else if($count_kl_khoa){
            foreach ($count_kl_khoa as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }
          
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số kỷ luật']
    });
  })
</script>
@endsection