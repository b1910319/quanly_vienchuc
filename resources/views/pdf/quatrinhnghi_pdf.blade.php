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
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">
      QUÁ TRÌNH NGHỈ CỦA VIÊN CHỨC
      <br>
    </p>
    <p>
      @foreach ($vienchuc as $vc )
        <p class="text-center fw-bold" style="font-size: 14px; color: #0C1E7F">THÔNG TIN VIÊN CHỨC</p>
        <div style="float: left; width: 20%">
          @if ($vc->hinh_vc != ' ')
            <img src="{{ URL::to('public/uploads/vienchuc/'.$vc->hinh_vc) }}" class="img-fluid" style="width: 80%">
          @else
            Chưa cập nhật hình ảnh
          @endif
        </div>
        1. Họ và tên khai sinh (viết chữ in hoa): <span style="text-transform: uppercase">{{ $vc->hoten_vc }}</span> <br>
        2. Tên gọi khác: {{ $vc->tenkhac_vc }} <br>
        3. Ngày sinh : {{ $vc->ngaysinh_vc }} , Giới tính (nam, nữ): 
        @if ($vc->gioitinh_vc == 0)
          Nam
        @else
          Nữ
        @endif
        <br>
        4. Email: {{ $vc->user_vc }} <br>
        5. Khoa: {{ $vc->ten_k }} <br>
        6. Qúa trình nghỉ: <br> <br>
        <table class="table">
          <thead>
            <tr>
              <th  scope="col">#</th>
              <th  scope="col">Thông tin nghỉ</th>
              <th  scope="col">Thông tin quyết định</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 0;
            @endphp
            @foreach ($list_quatrinhnghi as $key => $quatrinhnghi)
              @if ($quatrinhnghi->ma_vc == $vc->ma_vc)
                @php
                  $i = $i+1;
                @endphp
                <tr>
                  <td style="width: 5%"><?php echo $i ?></td>
                  <td>
                    - Danh mục nghỉ: {{ $quatrinhnghi->ten_dmn }} <br>
                    - Bắt đầu nghỉ: {{ $quatrinhnghi->batdau_qtn }} <br>
                    - Kết thúc nghỉ: {{ $quatrinhnghi->ketthuc_qtn }} <br>
                    - Ghi chú: {{ $quatrinhnghi->ghichu_qtn }}
                  </td>
                  <td>
                    - Số quyết định: {{ $quatrinhnghi->soquyetdinh_qtn }} <br>
                    - Ngày ký quyết định: {{ $quatrinhnghi->ngaykyquyetdinh_qtn }}
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        <p class="fw-bold">
          _____________________________________________________________________________________________________________________________________
        </p>
      @endforeach
    </p>
  </div>
</body>
</html>