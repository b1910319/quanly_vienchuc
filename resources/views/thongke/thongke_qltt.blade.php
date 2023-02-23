@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold">Thống kê viên chức theo hình thức đào tạo </p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_hdt_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file PDF</button>
        </a>
      </div>
    </div>
    <div id="myfirstchart1" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold">Thống kê viên chức theo loại bằng cấp </p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_lbc_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file PDF</button>
        </a>
      </div>
    </div>
    <div id="myfirstchart2" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold">Thống kê viên chức theo ngạch</p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_hdt_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file PDF</button>
        </a>
      </div>
    </div>
    <div id="myfirstchart3" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">
    <div class="row">
      <div class="col-10">
        <p class="fw-bold">Thống kê viên chức theo ngạch</p>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('thongke_qltt_hdt_pdf') }}">
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file PDF</button>
        </a>
      </div>
    </div>
    <div id="myfirstchart4" style="height: 250px;"></div>
  </div>
</div>
<script>
  $(document).ready(function(){
    new Morris.Area({
      element: 'myfirstchart1',
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
      element: 'myfirstchart2',
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
  })
</script>
@endsection
