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
      TỔNG HỢP QUÁ TRÌNH HỌC CỦA VIÊN CHỨC
      <br>
    </p>
    <p>
      @foreach ($vienchuc as $vc )
        <p class="text-center fw-bold" style="font-size: 13px">Thông tin viên chức</p>
        <div class="row">
          <div class="col-6" style="float: left; width: 50%">
            <b>Tên viên chức: </b> {{ $vc->hoten_vc }}
            <br>
            <b>Mã số viên chức: </b> {{ $vc->ma_vc }}
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
        <p class="text-center fw-bold" style="font-size: 13px">Quá trình học</p>
        @foreach ($list_lop_vienchuc as $key => $lop_vc)
          @if ($vc->ma_vc == $lop_vc->ma_vc)
            <p class="fw-bold text-center text-danger">Thông tin lớp học</p>
            <div class="row">
              <div class="col-6" style="float: left; width: 50%">
                <span class="fw-bold">
                  Ngày bắt đầu: 
                </span>
                {{ $lop_vc->ngaybatdau_l }}
                <br>
                <span class="fw-bold">
                  Ngày kết thúc: 
                </span>
                {{ $lop_vc->ngayketthuc_l }}
                <br>
                <span class="fw-bold">
                  Tên cơ sở đào tạo: 
                </span>
                {{ $lop_vc->tencosodaotao_l }}
                <br>
                <span class="fw-bold">
                  Ngành học: 
                </span>
                {{ $lop_vc->nganhhoc_l }}
                <br>
                <span class="fw-bold">
                  Trình độ đào tạo: 
                </span>
                {{ $lop_vc->trinhdodaotao_l }}
              </div>
              <div class="col-6" style="float: right; width: 50%">
                <span class="fw-bold">
                  Nguồn kinh phí: 
                </span>
                {{ $lop_vc->nguonkinhphi_l }}
                <br>
                <span class="fw-bold">
                  Địa chỉ nơi đào tạo: 
                </span>
                {{ $lop_vc->diachidaotao_l }}
                <br>
                <span class="fw-bold">
                  Email cơ sở đào tạo: 
                </span>
                {{ $lop_vc->emailcoso_l }}
                <br>
                <span class="fw-bold">
                  Số điện thoại cơ sở đào tạo: 
                </span>
                {{ $lop_vc->sdtcoso_l }}
                <br>
                <span class="fw-bold">
                  Quốc gia đào tạo: 
                </span>
                {{ $lop_vc->ten_qg }}
              </div>
            </div>
            <p class="fw-bold text-center text-danger mt-2">
              Thông tin quá trình học
            </p>
            @foreach ($list_quatrinhhoc_ketqua as $ketqua)
              @if ($ketqua->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 20%;">
                  Hoàn thành khoá học
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Tên người hướng dẫn</th>
                      <th  scope="col">Email</th>
                      <th  scope="col">Bằng được cấp</th>
                      <th  scope="col">Ngày cấp bằng</th>
                      <th  scope="col">Xếp loại</th>
                      <th  scope="col">Đề tài tốt nghiệp</th>
                      <th  scope="col">Ngày về nước</th>
                      <th  scope="col">Đánh giá của cơ sở</th>
                      <th  scope="col">Kiến nghị</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_ketqua as $ketqua)
                      @if ($ketqua->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>{{ $ketqua->tennguoihuongdan_kq }}</td>
                          <td>{{ $ketqua->emailnguoihuongdan_kq }}</td>
                          <td>{{ $ketqua->bangduoccap_kq }}</td>
                          <td>{{ $ketqua->ngaycapbang_kq }}</td>
                          <td>{{ $ketqua->xeploai_kq }}</td>
                          <td>{{ $ketqua->detaitotnghiep_kq }}</td>
                          <td>{{ $ketqua->ngayvenuoc_kq }}</td>
                          <td>{{ $ketqua->danhgiacuacoso_kq }}</td>
                          <td>{{ $ketqua->kiennghi_kq }}</td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
            @endforeach
            @foreach ($list_quatrinhhoc_giahan as $giahan)
              @if ($giahan->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 10%;">
                  Gia hạn
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Thời gian gia hạn</th>
                      <th  scope="col">Lý do gia hạn</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_giahan as $giahan)
                      @if ($giahan->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>{{ $giahan->thoigian_gh }}</td>
                          <td>{{ $giahan->lydo_gh }}</td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
            @endforeach
            @foreach ($list_quatrinhhoc_dunghoc as $dunghoc )
              @if ($dunghoc->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 10%;">
                  Dừng học
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Ngày bắt đầu tạm dừng</th>
                      <th  scope="col">Ngày kết thúc tạm dừng</th>
                      <th  scope="col">Lý do tạm dừng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_dunghoc as $dunghoc)
                      @if ($dunghoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>{{ $dunghoc->batdau_dh }}</td>
                          <td>{{ $dunghoc->ketthuc_dh }}</td>
                          <td>{{ $dunghoc->lydo_dh }}</td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
            @endforeach
            @foreach ($list_quatrinhhoc_chuyen as $chuyen)
              @if ($chuyen->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 35%;">
                  Chuyển nước, trường, ngành học ....
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Nội dung xin chuyển</th>
                      <th  scope="col">Lý do chuyển</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_chuyen as $chuyen)
                      @if ($chuyen->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>{{ $chuyen->noidung_c }}</td>
                          <td>{{ $chuyen->lydo_c }}</td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
            @endforeach
            @foreach ($list_quatrinhhoc_thoihoc as $thoihoc)
              @if ($thoihoc->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 10%;">
                  Thôi học
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Ngày thôi học</th>
                      <th  scope="col">Lý do thôi học</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_thoihoc as $thoihoc)
                      @if ($thoihoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>{{ $thoihoc->ngay_th }}</td>
                          <td>{{ $thoihoc->lydo_th }}</td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
            @endforeach
          @endif
        @endforeach
        <hr>
      @endforeach
    </p>
  </div>
</body>
</html>