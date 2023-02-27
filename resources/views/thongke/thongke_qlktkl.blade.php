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
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="background-color: #00425A; border: none; width: 100%" >
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
              {{-- <div class="col-6">
                <a href="{{ URL::to('/thongke_qlktkl_time_pdf') }}">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #379237; border: none; color: white; width: 100%;">
                    Xuất file
                  </button>
                </a>
              </div> --}}
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
    // // Thống kê viên chức theo hình thức đào tạo
    // new Morris.Area({
    //   element: 'myfirstchart2',
    //   pointFillColors: ['#FFB84C'],
    //   lineColors:['#F94A29'],
    //   parseTime: false,
    //   pointStrokeColors: ['#379237'],
    //   data: [
    //     <?php
    //       foreach ($count_hedaotao as $key => $count){
    //         foreach($list_hedaotao as $key => $hedaotao){
    //           if($count->ma_hdt == $hedaotao->ma_hdt){
    //             $ten_hdt = $hedaotao->ten_hdt;
    //             $tong = $count->sum;
    //             echo "{ year: '$ten_hdt', value: $tong },";
    //           }
    //         }
            
    //       }
    //     ?>
    //   ],
    //   xkey: 'year',
    //   ykeys: ['value'],
    //   labels: ['Số viên chức']
    // });
    // //Thống kê viên chức theo ngạch
    // new Morris.Bar({
    //   element: 'myfirstchart3',
    //   parseTime: false,
    //   barColors: ['#FF731D'],
    //   data: [
    //     <?php
    //       foreach ($count_ngach as $key => $count){
    //         foreach($list_ngach as $key => $ngach){
    //           if($count->ma_n == $ngach->ma_n){
    //             $ten_n = $ngach->ten_n;
    //             $tong = $count->sum;
    //             echo "{ year: '$ten_n', value: $tong },";
    //           }
    //         }
            
    //       }
    //     ?>
    //   ],
    //   xkey: 'year',
    //   ykeys: ['value'],
    //   labels: ['Số viên chức']
    // });
    // //Thống kê viên chức theo chức vụ
    // new Morris.Donut({
    //   element: 'myfirstchart4',
    //   parseTime: false,
    //   colors: [
    //     'rgba(54, 162, 235, 0.6)',
    //     'rgba(255, 206, 86, 0.6)',
    //     'rgba(153, 102, 255, 0.6)',
    //     'rgba(255, 159, 64, 0.6)',
    //     'rgba(255, 99, 132, 0.6)'
    //   ],
    //   data: [
    //     <?php
    //       foreach ($count_chucvu as $key => $count){
    //         foreach($list_chucvu as $key => $chucvu){
    //           if($count->ma_cv == $chucvu->ma_cv){
    //             $ten_cv = $chucvu->ten_cv;
    //             $tong = $count->sum;
    //             echo "{ label: '$ten_cv', value: $tong },";
    //           }
    //         }
            
    //       }
    //     ?>
    //   ],
    // });
    // //Thống kê viên chức theo khoa
    // new Morris.Line({
    //   element: 'myfirstchart5',
    //   pointFillColors: ['#2F3A8F'],
    //   parseTime: false,
    //   pointStrokeColors: ['#2F3A8F'],
    //   lineColors:['#603601'],
    //   data: [
    //     <?php
    //       foreach ($count_khoa as $key => $count){
    //         foreach($list_khoa as $key => $khoa){
    //           if($count->ma_k == $khoa->ma_k){
    //             $ten_k = $khoa->ten_k;
    //             $tong = $count->sum;
    //             echo "{ year: '$ten_k', value: $tong },";
    //           }
    //         }
            
    //       }
    //     ?>
    //   ],
    //   xkey: 'year',
    //   ykeys: ['value'],
    //   labels: ['Số viên chức']
    // });
    // //Thống kê viên chức nghĩ hưu
    // new Morris.Bar({
    //   element: 'myfirstchart6',
    //   parseTime: false,
    //   barColors: ['#C06014'],
    //   data: [
    //     <?php
    //       foreach ($count_nghihuu as $key => $count){
    //         $ngay = $count->thoigiannghi_vc;
    //         $tong = $count->sum;
    //         echo "{ year: '$ngay', value: $tong },";
    //       }
    //     ?>
    //   ],
    //   xkey: 'year',
    //   ykeys: ['value'],
    //   labels: ['Số viên chức']
    // });
    // //Thống kê viên chức theo quê quán
    // new Morris.Donut({
    //   element: 'myfirstchart7',
    //   parseTime: false,
    //   colors: [
    //     'rgba(54, 162, 235, 0.6)',
    //     'rgba(255, 206, 86, 0.6)',
    //     'rgba(153, 102, 255, 0.6)',
    //     'rgba(255, 159, 64, 0.6)',
    //     'rgba(0, 255, 0, 0.6)',
    //     'rgba(255, 99, 132, 0.6)',
    //     'rgba(192, 255, 62, 0.6)',
    //     'rgba(255, 255, 0, 0.6)',
    //     'rgba(255, 255, 193, 0.6)',
    //     'rgba(255, 130, 71, 0.6)',
    //     'rgba(255, 64, 64, 0.6)',
    //     'rgba(255, 105, 180, 0.6)'
    //   ],
    //   data: [
    //     <?php
    //       foreach ($count_tinh as $key => $count){
    //         foreach($list_tinh as $key => $tinh){
    //           if($count->ma_t == $tinh->ma_t){
    //             $ten_t = $tinh->ten_t;
    //             $tong = $count->sum;
    //             echo "{ label: '$ten_t', value: $tong },";
    //           }
    //         }
            
    //       }
    //     ?>
    //   ],
    // });
  })
</script>
@endsection
