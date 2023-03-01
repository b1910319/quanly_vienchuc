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
  <div class="row">
    <p style="font-size: 14px; margin-left: 50px;">BỘ GIÁO DỤC VÀ ĐÀO TẠO <b style="font-size: 14px; margin-left: 100px;">CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></p>
    <p>
      <b>TRƯỜNG CÔNG NGHỆ THÔNG TIN VÀ </b>
      <b style="margin-left: 120px; border-bottom: 2px solid black">Độc lập - Tự do - Hạnh phúc</b>
      <br>
      <b style="margin-left: 5px;"> TRUYỀN THÔNG - ĐẠI HỌC CẦN THƠ</b>
      <p style="margin-left: 60px;">Số: _______ /QĐ-ĐHCT <i style="margin-left: 250px;">Cần thơ, ngày ___ tháng ___ năm _____ </i></p>
    </p>
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">QUYẾT ĐỊNH</p>
    <p class="text-center"><b>Về việc cử viên chức đi học lớp {{ $lop->ten_l }} tại {{ $lop->diachidaotao_l }} </></p>
    <p  style="font-size: 14px; font-weight: bold; text-align: center;">HIỆU TRƯỞNG TRƯỜNG CÔNG NGHỆ THÔNG TIN VÀ <br> TRUYỀN THÔNG - ĐẠI HỌC CẦN THƠ</p>
    <p>
      <i>
        <span style="margin-left: 40px;">Căn cứ Luật viên chức ngày 15 </span> tháng 11 năm 2010 và Luật sửa đổi, bổ sung một số điều của Luật Cán bộ, công chức và Luật viên chức ngày 25 tháng 11 năm 2019;
        <br>
        <span style="margin-left: 40px;">Căn cứ Luật Giaó dục</span> đại học ngày 18 tháng 06 năm 2012 và Luật sửa đổi, bổ sung một số điều của Luật Giaó dục đại học ngày 19 tháng 11 năm 2018; 
        <br>
        <span style="margin-left: 40px;">Theo thông báo số</span> 308-TB/HVCTKVIV ngày 28 tháng 9 năm 2022 của Học viện Chính trị khu vực IV về việc nhập học lớp {{ $lop->ten_l }} tại {{ $lop->diachidaotao_l }}; 
        <br>
        <span style="margin-left: 40px;">Theo đề nghị của Trưởng phòng Tổ chức - Cán bộ</span>
      </i>
    </p>
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">QUYẾT ĐỊNH: </p>
    @foreach($vienchuc as $key => $vc)
      <p>
        <b style="margin-left: 40px;">Điều 1: </b>
        Cử 
        @if ($vc->gioitinh_vc == 0)
          ông
        @else
          @if ($vc->gioitinh_vc == 1)
            bà
          @endif
        @endif
        <b>{{ $vc->hoten_vc }}</b> (MSVC: {{ $vc->ma_vc }}) thuộc khoa {{ $vc->ten_k }} đang công tác tại Trường Công Nghệ Thông Tin Và Truyền Thông - Đại Học Cần Thơ đi học {{ $lop->ten_l }}.
        <span style="margin-left: 65px;">- Địa điểm: </span>{{ $lop->tencosodaotao_l }} <br>
        <span style="margin-left: 65px;">- Thời gian: Bắt đầu </span>{{ $lop->ngaybatdau_l }} kết thúc {{ $lop->ngayketthuc_l }} ({{ $lop->diachidaotao_l }})
      </p>
      <p>
        <b style="margin-left: 40px;">Điều 2: </b>
        Các chi phí có liên quan trong thời gian đi học tập của viên chức có tại tại Điều 1 được hưởng theo quy định hiện hành.
      </p>
      <p>
        <b style="margin-left: 40px;">Điều 3: </b>
        Trưởng phòng: Kế hoạch-Tổng hợp, Tổ chức-Cán bộ, Tài chính, thủ trưởng các đơn vị có liên quan và viên chức có tên tại Điều 1 chịu trách nhiệm thi hành quyết định này ./.
      </p>
    @endforeach
    <b style="margin-left: 500px;" >HIỆU TRƯỞNG</b>
    <p>
      <b>Nơi nhận:</b>
      <br>
      - Như Điều 3:
      <br>
      - Lưu: VT, TCCB, HSCN
    </p>
  </div>
</body>
</html>