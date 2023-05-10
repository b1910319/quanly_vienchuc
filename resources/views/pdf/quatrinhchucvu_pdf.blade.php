<!DOCTYPE html>
<html>
<style>
  *{
    font-family: DejaVu Sans !important;
    font-size: 11px;
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
    <p class="text-center">
      <i>
        BỘ GIÁO DỤC VÀ ĐÀO TẠO <br> 
        <b>TRƯỜNG CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG - ĐẠI HỌC CẦN THƠ</b>
      </i>
    </p>
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">
      TỔNG HỢP QUÁ TRÌNH CHỨC VỤ CỦA VIÊN CHỨC
      <br>
    </p>
    <p>
      @foreach ($vienchuc as $vc )
        <p class="text-center fw-bold" style="font-size: 14px; color: #0C1E7F">THÔNG TIN VIÊN CHỨC</p>
        <div class="row">
          <div class="col-6" style="float: left; width: 50%">
            <b>Tên viên chức: </b> {{ $vc->hoten_vc }}
            <br>
            <b>Mã số viên chức: </b> VC{{ $vc->ma_vc }}
            <br>
            <b>Email: </b>{{ $vc->user_vc }}
          </div>
          <div class="col-6" style="float: right;  width: 50%">
            <b>Số điện thoại: </b>{{ $vc->sdt_vc }}
            <br>
            <b>Khoa: </b>{{ $vc->ten_k }}
            <br>
            <b>Ngày sinh: </b> {{ $vc->ngaysinh_vc }}
          </div>
        </div>
        <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 10%;">
          QÚA TRÌNH
        </p>
        <table class="table">
          <thead>
            <tr>
              <th  scope="col">#</th>
              <th  scope="col">Nhiệm kỳ</th>
              <th  scope="col">Chức vụ</th>
              <th  scope="col">Thông tin quyết định</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 0;
            @endphp
            @foreach ($list_quatrinhchucvu as $key => $qtcv)
              @if ($qtcv->ma_vc == $vc->ma_vc)
                @php
                  $i = $i+1;
                @endphp
                <tr>
                  <td><?php echo $i ?></td>
                  <td>{{ $qtcv->batdau_nk }} - {{ $qtcv->ketthuc_nk }}</td>
                  <td>{{ $qtcv->ten_cv }}</td>
                  <td >
                    - Số quyết định: {{ $qtcv->soquyetdinh_qtcv }}
                    <br>
                    - Ngày ký quyết định:
                    <?php 
                      Carbon::now('Asia/Ho_Chi_Minh');
                      $ngayky_qtcv = Carbon::parse(Carbon::create($qtcv->ngayky_qtcv))->format('d-m-Y');
                      echo $ngayky_qtcv;
                    ?>
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        <hr>
      @endforeach
    </p>
  </div>
</body>
</html>