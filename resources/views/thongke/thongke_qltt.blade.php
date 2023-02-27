@extends('layout')
@section('content')
{{-- <div class="row">
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức theo loại bằng cấp </p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_lbc_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file</button>
        </a>
      </div>
    </div>
    <div id="myfirstchart1" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức theo ngạch</p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_ngach_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file</button>
        </a>
      </div>
    </div>
    <div id="myfirstchart3" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold" style="font-size: 18px;" >Thống kê viên chức theo chức vụ</p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_chucvu_all_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file</button>
        </a>
      </div>
      <div class="row">
        <div class="col-5">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2" style="background-color: #00425A; border: none; width: 100%" >Chọn khoa để xuất file</button>
          <div id="demo2" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_chucvu_pdf') }}" method="post">
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
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white;">
                    Xuất file
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="myfirstchart4" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức theo hình thức đào tạo </p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_hdt_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file</button>
        </a>
      </div>
    </div>
    <div id="myfirstchart2" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức theo khoa </p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_khoa_all_pdf') }}">
          <button type="button" class="btn" style="background-color: #379237; border: none;">Xuất file</button>
        </a>
      </div>
      <div class="row">
        <div class="col-5">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1" style="background-color: #00425A; border: none; width: 100%" >Chọn khoa để xuất file</button>
          <div id="demo1" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_khoa_pdf') }}" method="post">
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
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white;">
                    Xuất file
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="myfirstchart5" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức nghĩ hưu</p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_nghihuu_all_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file</button>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="background-color: #00425A; border: none; width: 100%" >
          Chọn khoảng thời gian để xuất file
        </button>
        <div id="demo" class="collapse mt-3">
          <form action="{{ URL::to('thongke_qltt_nghihuu_time_pdf') }}" method="post">
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
                  Xuất file
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >Chọn khoa để xuất file</button>
        <div id="demo3" class="collapse mt-3">
          <form action="{{ URL::to('thongke_qltt_nghihuu_khoa_pdf') }}" method="post">
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
                  Xuất file
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div id="myfirstchart6" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức theo quê quán</p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_quequan_all_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file</button>
        </a>
      </div>
      <div class="row">
        <div class="col-5">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2" style="background-color: #00425A; border: none; width: 100%" >Chọn tỉnh để xuất file</button>
          <div id="demo2" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_quequan_tinh_pdf') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_t">
                    <option value="0" >Chọn chức vụ</option>
                    @foreach ($list_tinh as $tinh)
                      <option value="{{ $tinh->ma_t }}" >{{ $tinh->ten_t }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white;">
                    Xuất file
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="myfirstchart7" style="height: 250px;"></div>
  </div>
</div>
<script>
  $(document).ready(function(){
    // Thống kê viên chức theo hình thức đào tạo
    new Morris.Area({
      element: 'myfirstchart2',
      pointFillColors: ['#FFB84C'],
      lineColors:['#F94A29'],
      parseTime: false,
      pointStrokeColors: ['#379237'],
      data: [
        <?php
          foreach ($count_hedaotao as $key => $count){
            foreach($list_hedaotao as $key => $hedaotao){
              if($count->ma_hdt == $hedaotao->ma_hdt){
                $ten_hdt = $hedaotao->ten_hdt;
                $tong = $count->sum;
                echo "{ year: '$ten_hdt', value: $tong },";
              }
            }
            
          }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
    // Thống kê viên chức theo loại bằng cấp
    new Morris.Line({
      element: 'myfirstchart1',
      pointFillColors: ['#F94A29'],
      parseTime: false,
      pointStrokeColors: ['#379237'],
      data: [
        <?php
          foreach ($count_loaibangcap as $key => $count){
            foreach($list_loaibangcap as $key => $loaibangcap){
              if($count->ma_lbc == $loaibangcap->ma_lbc){
                $ten_lbc = $loaibangcap->ten_lbc;
                $tong = $count->sum;
                echo "{ year: '$ten_lbc', value: $tong },";
              }
            }
            
          }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
    //Thống kê viên chức theo ngạch
    new Morris.Bar({
      element: 'myfirstchart3',
      parseTime: false,
      barColors: ['#FF731D'],
      data: [
        <?php
          foreach ($count_ngach as $key => $count){
            foreach($list_ngach as $key => $ngach){
              if($count->ma_n == $ngach->ma_n){
                $ten_n = $ngach->ten_n;
                $tong = $count->sum;
                echo "{ year: '$ten_n', value: $tong },";
              }
            }
            
          }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
    //Thống kê viên chức theo chức vụ
    new Morris.Donut({
      element: 'myfirstchart4',
      parseTime: false,
      colors: [
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(255, 99, 132, 0.6)'
      ],
      data: [
        <?php
          foreach ($count_chucvu as $key => $count){
            foreach($list_chucvu as $key => $chucvu){
              if($count->ma_cv == $chucvu->ma_cv){
                $ten_cv = $chucvu->ten_cv;
                $tong = $count->sum;
                echo "{ label: '$ten_cv', value: $tong },";
              }
            }
            
          }
        ?>
      ],
    });
    //Thống kê viên chức theo khoa
    new Morris.Line({
      element: 'myfirstchart5',
      pointFillColors: ['#2F3A8F'],
      parseTime: false,
      pointStrokeColors: ['#2F3A8F'],
      lineColors:['#603601'],
      data: [
        <?php
          foreach ($count_khoa as $key => $count){
            foreach($list_khoa as $key => $khoa){
              if($count->ma_k == $khoa->ma_k){
                $ten_k = $khoa->ten_k;
                $tong = $count->sum;
                echo "{ year: '$ten_k', value: $tong },";
              }
            }
            
          }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
    //Thống kê viên chức nghĩ hưu
    new Morris.Bar({
      element: 'myfirstchart6',
      parseTime: false,
      barColors: ['#C06014'],
      data: [
        <?php
          foreach ($count_nghihuu as $key => $count){
            $ngay = $count->thoigiannghi_vc;
            $tong = $count->sum;
            echo "{ year: '$ngay', value: $tong },";
          }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
    //Thống kê viên chức theo quê quán
    new Morris.Donut({
      element: 'myfirstchart7',
      parseTime: false,
      colors: [
        'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)',
        'rgba(153, 102, 255, 0.6)',
        'rgba(255, 159, 64, 0.6)',
        'rgba(0, 255, 0, 0.6)',
        'rgba(255, 99, 132, 0.6)',
        'rgba(192, 255, 62, 0.6)',
        'rgba(255, 255, 0, 0.6)',
        'rgba(255, 255, 193, 0.6)',
        'rgba(255, 130, 71, 0.6)',
        'rgba(255, 64, 64, 0.6)',
        'rgba(255, 105, 180, 0.6)'
      ],
      data: [
        <?php
          foreach ($count_tinh as $key => $count){
            foreach($list_tinh as $key => $tinh){
              if($count->ma_t == $tinh->ma_t){
                $ten_t = $tinh->ten_t;
                $tong = $count->sum;
                echo "{ label: '$ten_t', value: $tong },";
              }
            }
            
          }
        ?>
      ],
    });
  })
</script> --}}
<div class="row">
  <div class="card-box col-2">
    <div class="row">
      <div class="mt-2" >
        <a href="{{ URL::to('thongke_qltt') }}">
          <button type="button" class="btn btn-primary" style="background-color:
            @if ($count_ngach != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Ngạch viên chức
          </button>
        </a>
      </div>
      <div class="mt-2">
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
      </div>
      <div class="mt-2">
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
      </div>
      <div class="mt-2">
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
      </div>
      <div class="mt-2">
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
      </div>
      <div class="mt-2">
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
      </div>
      <div class="mt-2">
        <div class="dropdown" >
          <button class="dropbtn" style="background-color: #379237; width: 245px">Xuất file</button>
          <div class="dropdown-content">
            @foreach ($list_khoa as  $khoa)
              <a href="{{ URL::to('/thongke_qltt_khoa_pdf/'.$khoa->ma_k) }}">{{ $khoa->ten_k }}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-box col-10">
    <div class="row">
      <div class="col-6">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức </p>
      </div>
    </div>
    @if ($count_nghihuu || $count_nghihuu_time || $count_nghihuu_khoa)
      <div class="row">
        <div class="col-4">
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
        <div class="col-4">
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
      </div>
    @endif
    <div class="row">
      
    </div>
    <div id="myfirstchart_qltt_1" style="height: 250px;"></div>
    {{-- @if ($count_ngach != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qltt_time_pdf/'.$batdau.'/'.$ketthuc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif --}}
    @if ($count_ngach != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qltt_ngach_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_loaibangcap != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qltt_lbc_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_chucvu != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qltt_chucvu_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_hedaotao != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qltt_hdt_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_khoa != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qltt_khoa_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_nghihuu != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qltt_nghihuu_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_nghihuu_time != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qltt_nghihuu_time_pdf/'.$batdau.'/'.$ketthuc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%">Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_nghihuu_khoa != '')
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/thongke_qltt_nghihuu_khoa_pdf/'.$ma_k) }}">
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
      element: 'myfirstchart_qltt_1',
      pointFillColors: ['#F94A29'],
      parseTime: false,
      hideHover:true,
      barColors: ['#554994'],
      data: [
        <?php
          if($count_ngach){
            foreach ($count_ngach as $key => $count){
              foreach($list_ngach as $key => $ngach){
                if($count->ma_n == $ngach->ma_n){
                  $ten_n = $ngach->ten_n;
                  $tong = $count->sum;
                  echo "{ year: '$ten_n', value: $tong },";
                }
              }
            }
          }else if($count_loaibangcap){
            foreach ($count_loaibangcap as $key => $count){
              foreach($list_loaibangcap as $key => $loaibangcap){
                if($count->ma_lbc == $loaibangcap->ma_lbc){
                  $ten_lbc = $loaibangcap->ten_lbc;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lbc', value: $tong },";
                }
              }
            }
          }else if($count_chucvu){
            foreach ($count_chucvu as $key => $count){
              foreach($list_chucvu as $key => $chucvu){
                if($count->ma_cv == $chucvu->ma_cv){
                  $ten_cv = $chucvu->ten_cv;
                  $tong = $count->sum;
                  echo "{ year: '$ten_cv', value: $tong },";
                }
              }
            }
          }else if($count_hedaotao){
            foreach ($count_hedaotao as $key => $count){
              foreach($list_hedaotao as $key => $hedaotao){
                if($count->ma_hdt == $hedaotao->ma_hdt){
                  $ten_hdt = $hedaotao->ten_hdt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_hdt', value: $tong },";
                }
              }
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
          }else if($count_nghihuu){
            foreach ($count_nghihuu as $key => $count){
              $thoigiannghi_vc = $count->thoigiannghi_vc;
              $tong = $count->sum;
              echo "{ year: '$thoigiannghi_vc', value: $tong },";
            }
          }else if($count_nghihuu_time){
            foreach ($count_nghihuu_time as $key => $count){
              $thoigiannghi_vc = $count->thoigiannghi_vc;
              $tong = $count->sum;
              echo "{ year: '$thoigiannghi_vc', value: $tong },";
            }
          }else if($count_nghihuu_khoa){
            foreach ($count_nghihuu_khoa as $key => $count){
              $thoigiannghi_vc = $count->thoigiannghi_vc;
              $tong = $count->sum;
              echo "{ year: '$thoigiannghi_vc', value: $tong },";
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
