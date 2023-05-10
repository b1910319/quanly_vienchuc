<!DOCTYPE html>
<html>
<style>
  *{
    font-family: DejaVu Sans !important;
    font-size: 13px;
  }
</style>
<?php use Illuminate\Support\Carbon; ?>
<head>
  <title>PDF</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  {{-- link bootstrap  --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
  {{--  --}}
</head>
<body>
  <div class="row">
    <p style="font-size: 14px; margin-left: 50px;">BỘ GIÁO DỤC VÀ ĐÀO TẠO <b style="font-size: 14px; margin-left: 100px;">CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></p>
    <p>
      <b>TRƯỜNG CÔNG NGHỆ THÔNG TIN VÀ </b>
      <b style="margin-left: 120px; border-bottom: 2px solid black">Độc lập - Tự do - Hạnh phúc</b>
      <br>
      <b style="margin-left: 5px;"> TRUYỀN THÔNG - ĐẠI HỌC CẦN THƠ</b>
    </p>
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">QUÁ TRÌNH CHỨC VỤ CỦA VIÊN CHỨC</p>
    <p>
      <b>Họ tên viên chức: </b> {{ $vienchuc->hoten_vc }} <br>
      <b>Mã số viên chức: </b> VC{{ $vienchuc->ma_vc }} <br>
      <b>Số điện thoại: </b> {{ $vienchuc->sdt_vc }} <br>
      <b>Email: </b> {{ $vienchuc->user_vc }}
    </p>
    <p class="text-center fw-bold">QÚA TRÌNH CHỨC VỤ</p>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Chức vụ</th>
          <th scope="col">Nhiệm kỳ</th>
          <th scope="col">Thông tin quyết định</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($quatrinhchucvu as $key => $qtcv )
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $qtcv->ten_cv }}</td>
            <td>Nhiệm kỳ: {{ $qtcv->batdau_nk }} - {{ $qtcv->ketthuc_nk }}</td>
            <td>
              <b>Số quyết định: </b>{{ $qtcv->soquyetdinh_qtcv }} <br>
              <b>Ngày ký: </b> 
              <?php 
                Carbon::now('Asia/Ho_Chi_Minh');
                $ngayky_qtcv = Carbon::parse(Carbon::create($qtcv->ngayky_qtcv))->format('d-m-Y');
                echo $ngayky_qtcv;
              ?>
            </td>
          </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
</body>
</html>