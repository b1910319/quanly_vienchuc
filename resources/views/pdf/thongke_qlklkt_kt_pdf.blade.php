<!DOCTYPE html>
<html>
<style>
  *{
    font-family: DejaVu Sans !important;
    font-size: 11px;
  }
</style>
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
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">BẢNG THỐNG KÊ KHEN THƯỞNG CỦA VIÊN CHỨC</p>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Viên chức</th>
          <th scope="col">Khoa</th>
          <th scope="col">Thông tin khen thưởng</th>
        </tr>
      </thead>
      <tbody>
        @foreach($khenthuong as $key => $kt)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>
              @foreach ($vienchuc as $vc )
                @if ($vc->ma_vc == $kt->ma_vc)
                  <b>Họ tên: </b>{{ $vc->hoten_vc }} <br>
                  <b>Email: </b>{{ $vc->user_vc }} <br>
                  <b>Số điện thoại: </b> {{ $vc->sdt_vc }} <br>
                @endif
              @endforeach
            </td>
            <td>{{ $kt->ten_k }}</td>
            <td>
              <b>Loaị khen thưởng: </b>{{ $kt->ten_lkt }}<br>
              <b>Hình thức khen thưởng: </b>{{ $kt->ten_htkt }}<br>
              <b>Số quyết định: </b>{{ $kt->soquyetdinh_kt }} <br>
              <b>Ngày ký quyết định: </b>{{ $kt->ngay_kt }}<br>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>