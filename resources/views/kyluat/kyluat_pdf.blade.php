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
      @foreach($kyluat as $key => $kl)
        <p style="margin-left: 60px;">Số: {{ $kl->ma_kl }} /QĐ-ĐHCT <i style="margin-left: 350px;">Cần thơ {{ $kl->ngay_kl }}</i></p>
      @endforeach
      
    </p>
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">QUYẾT ĐỊNH</p>
    <p class="text-center">V/v kỷ luật viên chức</p>
    <p>
      <i>
        <span style="margin-left: 40px;">Căn cứ Luật Thi đua, khen thưởng ngày</span> 26 tháng 11 năm 2003; Luật sửa đổi bổ sung một số điều của Luật Thi đua, khen thưởng ngày 14 tháng 6 năm 2005 và Luật sửa đổi, bổ sung một số điều của Luật Thi đua, khen thưởng ngày 16 tháng 11 năm 2013;
        <br>
        <span style="margin-left: 40px;">Căn cứ Nghị định số 69/2017/NĐ-CP</span> ngày 25 tháng 5 năm 2017 của Chính phủ quy định chức năng, nhiệm vụ, quyền hạn và cơ cấu tổ chức của Bộ Giáo dục và Đào tạo; 
        <br>
        <span style="margin-left: 40px;">Căn cứ Nghị định số</span> 91/2017/NĐ-CP ngày 31 tháng 7 năm 2017 của Chính phủ quy định chi tiết thi hành một số điều của Luật Thi đua, khen thưởng; 
        <br>
        <span style="margin-left: 40px;">Theo đề nghị của Vụ trưởng Vụ Thi đua - Khen thưởng</span>
        <br>
        <span style="margin-left: 40px;">Bộ trưởng Bộ Giáo dục</span>và Đào tạo ban hành Thông tư hướng dẫn công tác thi đua, khen thưởng ngành Giáo dục. 
      </i>
    </p>
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">QUYẾT ĐỊNH: </p>
    @foreach($kyluat as $key => $kl)
      <p>
        <b style="margin-left: 40px;">Điều 1: </b>
        Nay tiến hành {{ $kl->ten_lkl }} cho 
        @if ($kl->gioitinh_vc == 0)
          ông
        @else
          @if ($kl->gioitinh_vc == 1)
            bà
          @endif
        @endif
        <b>{{ $kl->hoten_vc }}</b> thuộc khoa {{ $kl->ten_k }} đang công tác tại Trường Công Nghệ Thông Tin Và Truyền Thông - Đại Học Cần Thơ bị kỷ luật vì lý do: {{ $kl->lydo_kl }}.
      </p>
      <p>
        <b style="margin-left: 40px;">Điều 2: </b>
        Quyết định này có hiệu lực kể từ ngày ký. Các Trưởng phòng: Kế hoạch Tổng hợp, Công tác Sinh viên, Tài chính, Đào tạo, Thủ trưởng các đơn vị có liên quan và viên chức có tên tại Điều 1 chịu trách nhiệm thi hành quyết định này./.
      </p>
    @endforeach
    <b style="margin-left: 500px;" >HIỆU TRƯỞNG</b>
    <p>
      <b>Nơi nhận:</b>
      <br>
      - Như Điều 2:
      <br>
      - Lưu: VT, TCCB, HSCN
    </p>
  </div>
</body>
</html>