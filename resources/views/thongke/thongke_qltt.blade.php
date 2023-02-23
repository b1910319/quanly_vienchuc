@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold">Thống kê viên chức theo loại bằng cấp </p>
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
        <p class="fw-bold">Thống kê viên chức theo ngạch</p>
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
      <div class="col-4">
        <p class="fw-bold">Thống kê viên chức theo chức vụ</p>
      </div>
      <div class="col-8">
        <form action="{{ URL::to('thongke_qltt_chucvu_pdf') }}" method="post">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-5">
              <select class="custom-select input_table" id="gender2" name="ma_cv">
                <option value="0" >Chọn chức vụ</option>
                @foreach ($list_chucvu as $chucvu)
                  <option value="{{ $chucvu->ma_cv }}" >{{ $chucvu->ten_cv }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-4">
              <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #00425A; border: none; color: white;">
                Xuất file
              </button>
            </div>
            <div class="col-3">
              <a href="{{ URL::to('thongke_qltt_chucvu_all_pdf') }}">
                <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file</button>
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div id="myfirstchart4" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold">Thống kê viên chức theo hình thức đào tạo </p>
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
      <div class="col-4">
        <p class="fw-bold">Thống kê viên chức theo khoa </p>
      </div>
      <div class="col-8">
        <form action="{{ URL::to('thongke_qltt_khoa_pdf') }}" method="post">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-5">
              <select class="custom-select input_table" id="gender2" name="ma_k">
                <option value="0" >Chọn khoa</option>
                @foreach ($list_khoa as $khoa)
                  <option value="{{ $khoa->ma_k }}" >{{ $khoa->ten_k }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-4">
              <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #00425A; border: none; color: white;">
                Xuất file
              </button>
            </div>
            <div class="col-3">
              <a href="{{ URL::to('thongke_qltt_khoa_all_pdf') }}">
                <button type="button" class="btn" style="background-color: #379237; border: none;">Xuất file</button>
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div id="myfirstchart5" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-4">
        <p class="fw-bold">Thống kê viên chức nghĩ hưu</p>
      </div>
    </div>
    <form action="{{ URL::to('thongke_qltt_nghihuu_time_pdf') }}" method="post">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-3">
          <input type='date' class='form-control input_table' autofocus required name="batdau">
        </div>
        <div class="col-3">
          <input type='date' class='form-control input_table' autofocus required name="ketthuc">
        </div>
        <div class="col-2">
          <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #00425A; border: none; color: white;">
            Xuất file
          </button>
        </div>
        <div class="col-3">
          <a href="{{ URL::to('thongke_qltt_nghihuu_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file</button>
          </a>
        </div>
      </div>
    </form>
    <div id="myfirstchart6" style="height: 250px;"></div>
  </div>
</div>
<script>
  $(document).ready(function(){
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
    new Morris.Line({
      element: 'myfirstchart5',
      pointFillColors: ['#F94A29'],
      parseTime: false,
      pointStrokeColors: ['#379237'],
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
    new Morris.Bar({
      element: 'myfirstchart6',
      parseTime: false,
      barColors: ['#FF731D'],
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
  })
</script>
@endsection
