<!DOCTYPE html>
<html>
<style>
  *{
    font-family: DejaVu Sans !important;
    font-size: 12px;
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
        <p class="text-center fw-bold" style="font-size: 13px">THÔNG TIN VIÊN CHỨC</p>
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
            <b>Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
          </div>
        </div>
        <p class="text-center fw-bold" style="font-size: 13px">QUÁ TRÌNH HỌC</p>
        @foreach ($list_lop_vienchuc as $key => $lop_vc)
          @if ($vc->ma_vc == $lop_vc->ma_vc)
            <p class="fw-bold text-danger">THÔNG TIN LỚP HỌC</p>
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
                <br>
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
                {{ $lop_vc->ten_qg }} <br>
              </div>
            </div>
            {{-- <p class="fw-bold text-center text-danger mt-2">
              THÔNG TIN QUÁ TRÌNH HỌC
            </p> --}}
            @foreach ($list_quatrinhhoc_ketqua as $ketqua)
              @if ($ketqua->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 25%;">
                  HOÀN THÀNH KHOÁ HỌC
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Thông tin người hướng dẫn</th>
                      <th  scope="col">Thông tin bằng cấp</th>
                      <th  scope="col">Thông tin khác</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_ketqua as $ketqua)
                      @if ($ketqua->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Tên người hướng dẫn: {{ $ketqua->tennguoihuongdan_kq }} <br>
                            - Email người hướng dẫn: {{ $ketqua->emailnguoihuongdan_kq }}
                          </td>
                          <td>
                            - Bằng được cấp: {{ $ketqua->bangduoccap_kq }} <br>
                            - Ngày cấp bằng: {{ $ketqua->ngaycapbang_kq }} <br>
                            - Xếp loại: {{ $ketqua->xeploai_kq }}
                            - Đề tài tốt nghiệp: {{ $ketqua->detaitotnghiep_kq }}
                          </td>
                          <td>
                            - Ngày về nước: {{ date('d-m-Y') , strtotime($ketqua->ngayvenuoc_kq) }}
                            - Đánh giá của cơ sở: {{ $ketqua->danhgiacuacoso_kq }} <br>
                            - Kiến nghị: {{ $ketqua->kiennghi_kq }}
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
              @break
            @endforeach
            @foreach ($list_quatrinhhoc_giahan as $giahan)
              @if ($giahan->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 15%;">
                  GIA HẠN
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Thông tin gia hạn</th>
                      <th  scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_giahan as $giahan)
                      @if ($giahan->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Thời gian gia hạn: {{ $giahan->thoigian_gh }} <br>
                            - Lý do gia hạn: {{ $giahan->lydo_gh }}
                          </td>
                          <td>
                            - Số quyết định: {{ $giahan->soquyetdinh_gh }} <br>
                            - Ngày ký quyết định: {{ $giahan->ngaykyquyetdinh_gh }}
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
              @break
            @endforeach
            @foreach ($list_quatrinhhoc_dunghoc as $dunghoc )
              @if ($dunghoc->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 10%;">
                  DỪNG HỌC
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Thông tin dừng học</th>
                      <th  scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_dunghoc as $dunghoc)
                      @if ($dunghoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Ngày bắt đầu tạm dừng: {{ $dunghoc->batdau_dh }} <br>
                            - Ngày kết thúc tạm dừng: {{ $dunghoc->ketthuc_dh }} <br>
                            - Lý do xin tạm dừng: {{ $dunghoc->lydo_dh }}
                          </td>
                          <td>
                            - Số quyết định: {{ $dunghoc->soquyetdinh_dh }} <br>
                            - Ngày ký quyết định: {{ $dunghoc->ngaykyquyetdinh_dh }}
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
              @break
            @endforeach
            @foreach ($list_quatrinhhoc_chuyen as $chuyen)
              @if ($chuyen->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 40%;">
                  CHUYỂN NƯỚC, NGÀNH HỌC, TRƯỜNG ...
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Thông tin xin chuyển</th>
                      <th  scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_chuyen as $chuyen)
                      @if ($chuyen->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td style="width: 60%;">
                            - Nội dung xin chuyển: {{ $chuyen->noidung_c }} <br>
                            - Lý do xin chuyển: {{ $chuyen->lydo_c }}
                          </td>
                          <td>
                            - Số quyết định: {{ $chuyen->soquyetdinh_c }} <br>
                            - Ngày ký quyết định: {{ $chuyen->ngaykyquyetdinh_c }}
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
              @break
            @endforeach
            @foreach ($list_quatrinhhoc_thoihoc as $thoihoc)
              @if ($thoihoc->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 15%;">
                  THÔI HỌC
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Thông tin thôi học</th>
                      <th  scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_thoihoc as $thoihoc)
                      @if ($thoihoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Ngày thôi học: {{ $thoihoc->ngay_th }} <br>
                            - Lý do thôi học: {{ $thoihoc->lydo_th }}
                          </td>
                          <td>
                            - Số quyết định: {{ $thoihoc->soquyetdinh_th }} <br>
                            - Ngày ký quyết định: {{ $thoihoc->ngaykyquyetdinh_th }}
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
              @break
            @endforeach
          @endif
        @endforeach
      @endforeach
    </p>
  </div>
</body>
</html>