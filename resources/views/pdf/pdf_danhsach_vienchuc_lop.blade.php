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
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">DANH SÁCH VIÊN CHỨC THUỘC LỚP: <br> {{ $lop->ten_l }}</p>
    <p >
      <p class="text-center fw-bold">Thông tin lớp học</p> 
      <b>Tên lớp: </b> {{ $lop->ten_l }} <br>
      <b>Ngày bắt đầu: </b> {{ $lop->ngaybatdau_l }} <br>
      <b>Ngày kết thúc: </b> {{ $lop->ngayketthuc_l }} <br>
      <b>Tên cơ sở đào tạo: </b> {{ $lop->tencosodaotao_l }} <br>
      <b>Quốc gia đào tạo: </b> {{ $lop->quocgiaodaotao_l }} <br>
      <b>Ngành học: </b> {{ $lop->nganhhoc_l }} <br>
      <b>Địa chỉ đào tạo: </b> {{ $lop->diachidaotao_l }} <br>
      <b>Email cơ sở: </b> {{ $lop->emailcoso_l }}
    </p>
    <table class="table mt-3">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Viên chức</th>
          <th scope="col">Khoa</th>
        </tr>
      </thead>
      <tbody>
        @foreach($vienchuc as $key => $vc)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>
              <b>Họ tên: </b>{{ $vc->hoten_vc }} <br>
              <b>Email: </b>{{ $vc->user_vc }} <br>
              <b>Số điện thoại: </b> {{ $vc->sdt_vc }} <br>
              <b>Chức vụ: </b>{{ $vc->ten_cv }}
            </td>
            <td>{{ $vc->ten_k }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>