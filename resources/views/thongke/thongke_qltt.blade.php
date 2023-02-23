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
          <button type="button" class="btn btn-primary" style="background-color: #379237; border: none;">Xuất file PDF</button>
        </a>
      </div>
    </div>
    <div id="myfirstchart" style="height: 250px;"></div>
  </div>
  <div class="card-box col-6">

  </div>
</div>
<script>
  $(document).ready(function(){
    new Morris.Line({
      element: 'myfirstchart',
      pointFillColors: ['#F94A29'],
      parseTime: false,
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
  });
</script>
@endsection
