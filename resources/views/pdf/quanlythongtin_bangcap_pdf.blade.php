<!DOCTYPE html>
<html>
<style>
  *{
    font-family: DejaVu Sans !important;
    font-size: 13px;
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
  @foreach ($vienchuc as $vc )
    <div class="row">
      <p class="">
        Cơ quan, đơn vị có thẩm quyền quản lý CBCC ………………………………………….…………………….…………………….
        <br>
        Cơ quan, đơn vị sử dụng CBCC …………………………………………………………..…………………….…………………….....
      </p>
      <p  style="font-size: 16px; font-weight: bold; text-align: center;">
        SƠ YẾU LÝ LỊCH CÁN BỘ, CÔNG CHỨC (BẰNG CẤP)
        <br>
      </p>
      <p>
        1. Họ và tên khai sinh (viết chữ in hoa): <span style="text-transform: uppercase">{{ $vc->hoten_vc }}</span> <br>
        2. Tên gọi khác: {{ $vc->tenkhac_vc }} <br>
        3. Ngày sinh : {{ $vc->ngaysinh_vc }} , Giới tính (nam, nữ): 
        @if ($vc->gioitinh_vc == 0)
          Nam
        @else
          Nữ
        @endif
        <br>
        4. Khoa: {{ $vc->ten_k }} <br>
        5. Email: {{ $vc->user_vc }} <br>
        6 Trình độ chuyên môn cao nhất (TSKH, TS, Ths, cử nhân, kỹ sư, cao đẳng, trung cấp, sơ cấp, chuyên ngành): <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Hệ đào tạo</th>
              <th scope="col">Loại bằng cấp</th>
              <th scope="col">Thông tin</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 0;
            @endphp
            @foreach ($list_bangcap as $key => $bangcap )
              @if ($bangcap->ma_vc == $vc->ma_vc)
                @php
                  $i++;
                @endphp
                <tr>
                  <th scope="row"><?php echo $i ?></th>
                  <td>{{ $bangcap->ten_hdt }}</td>
                  <td>{{ $bangcap->ten_lbc }}</td>
                  <td>
                    Trình độ chuyên môn: {{ $bangcap->trinhdochuyenmon_bc }} <br>
                    Trường học: {{ $bangcap->truonghoc_bc }} <br>
                    Niên khoá: {{ $bangcap->nienkhoa_bc }} <br>
                    Số bằng: {{ $bangcap->sobang_bc }} <br>
                    Ngày cấp bằng: {{ $bangcap->ngaycap_bc }} <br>
                    Nơi cấp: {{ $bangcap->noicap_bc }} <br>
                    Xếp loại: {{ $bangcap->xephang_bc }}
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        <span style="margin-left: 450px">
          ..............Ngày......tháng......năm.........
        </span> <br>
        <span style="margin-left: 100px; font-weight: bold">Người khai</span>
        <span style="margin-left: 270px; font-weight: bold">Thủ trưởng cơ quan, đơn vị quản lý </span> <br>
        <span style="margin-left: 50px">Tôi xin cam đoan những lời </span>
        <span style="margin-left: 280px; font-weight: bold">và sử dụng CBCC</span> <br>
        <span style="margin-left: 50px">khai trên đây là đúng sự thật</span>
        <span style="margin-left: 270px">(Ký tên, đóng dấu)</span> <br>
        <span style="margin-left: 70px">(Ký tên, ghi rõ họ tên)</span>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </p>
    </div>
  @endforeach

</body>
</html>