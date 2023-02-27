@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-12">
    <div class="row">
      <div class="col-6">
        <p class="fw-bold" style="font-size: 18px;">Thống kê khen thưởng </p>
      </div>
    </div>
    <div class="row">
      <div class="col-2">
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
      <div class="col-2">
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
      <div class="col-2">
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
      <div class="col-2">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="background-color:
        @if ($count_khenthuong_time != '')
          #850000
        @else
          gray
        @endif
        ; border: none; width: 100%" >
          Chọn khoảng thời gian để xuất file
        </button>
        <div id="demo" class="collapse mt-3">
          <form action="{{ URL::to('thongke_qlktkl_time') }}" method="post">
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
      <div class="col-2">
        <div class="dropdown" >
          <button class="dropbtn" style="background-color: #379237">Xuất file</button>
          <div class="dropdown-content">
            @foreach ($list_hinhthuckhenthuong as  $htkt)
              <a href="{{ URL::to('/thongke_qlktkl_htkt_pdf/'.$htkt->ma_htkt) }}">{{ $htkt->ten_htkt }}</a>
            @endforeach
            <span>____________________________________________________</span>
            @foreach ($list_loaikhenthuong as  $lkt)
              <a href="{{ URL::to('/thongke_qlktkl_lkt_pdf/'.$lkt->ma_lkt) }}">{{ $lkt->ten_lkt }}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div id="myfirstchart_qlktkl_1" style="height: 250px;"></div>
    @if ($count_khenthuong_time != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qlktkl_time_pdf/'.$batdau.'/'.$ketthuc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_loaikhenthuong != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qlktkl_lkt_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_hinhthuckhenthuong != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qlktkl_htkt_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_khoa != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qlktkl_khoa_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
  </div>
  <div class="card-box col-12">
    <div class="row">
      <div class="col-6">
        <p class="fw-bold" style="font-size: 18px;">Thống kê kỷ luật </p>
      </div>
      <div class="row">
        <div class="col-2">
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
        <div class="col-2">
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
        <div class="col-2">
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
        <div class="col-2">
          <div class="dropdown" >
            <button class="dropbtn" style="background-color: #379237">Xuất file</button>
            <div class="dropdown-content">
              @foreach ($list_loaikyluat as  $lkl)
                <a href="{{ URL::to('/thongke_qlktkl_lkl_pdf/'.$lkl->ma_lkl) }}">{{ $lkl->ten_lkl }}</a>
              @endforeach
            </div>
          </div>
        </div>
        <div id="myfirstchart_qlktkl_2" style="height: 250px;"></div>
        @if ($count_kyluat_time != '')
          <div class="row">
            <div class="col-1">
              <a href="{{ URL::to('/thongke_qlktkl_kl_time_pdf/'.$batdau.'/'.$ketthuc) }}">
                <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
              </a>
            </div>
          </div>
        @endif
        @if ($count_loaikyluat != '')
          <div class="row">
            <div class="col-1">
              <a href="{{ URL::to('/thongke_qlktkl_lkl_all_pdf') }}">
                <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
              </a>
            </div>
          </div>
        @endif
        @if ($count_kl_khoa != '')
          <div class="row">
            <div class="col-1">
              <a href="{{ URL::to('/thongke_qlktkl_kl_khoa_all_pdf') }}">
                <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
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
          }else if($count_khenthuong_time){
            foreach ($count_khenthuong_time as $key => $count){
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
