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
    <p style="font-size: 16px; margin-left: 50px;">BỘ GIÁO DỤC VÀ ĐÀO TẠO <b style="font-size: 16px; margin-left: 80px;">CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM</b></p>
    <p>
      <b style="margin-left: 40px;">TRƯỜNG CÔNG NGHỆ THÔNG TIN VÀ </b>
      <b style="margin-left: 150px; border-bottom: 2px solid black">Độc lập - Tự do - Hạnh phúc</b>
      <br>
      <b style="margin-left: 40px;"> TRUYỀN THÔNG - ĐẠI HỌC CẦN THƠ</b>
    </p>
    <p  style="font-size: 16px; font-weight: bold; text-align: center;">BÁO CÁO KẾT THÚC CHƯƠNG TRÌNH HỌC TẬP</p>
    <p style="margin-left: 100px;">
      Kính gửi: - Hiệu trưởng Trường Công nghệ thông tin và truyền thông - Đại học Cần Thơ
      <br>
      <span style="margin-left: 58px">-(Trưởng đơn vị)</span>
    </p>
    @foreach ($vienchuc as $vc )
      <p style="margin-left: 30px;">
        1. Họ và tên: {{ $vc->hoten_vc }} <span style="margin-left: 180px">MSVC: VC{{ $vc->ma_vc }}</span> <br>
        2. Ngày tháng năm sinh: {{ $vc->ngaysinh_vc }} <br>
        3. Số CMND/CCCD: {{ $vc->cccd_vc }} <span style="margin-left: 210px">Ngày cấp: {{ $vc->ngaycapcccd_vc }}</span> <br>
        4. Đơn vị công tác: {{ $vc->ten_k }} (bộ môn, khoa hoặc tương đương) <br>
        5. Trình độ đào tạo: {{ $vc->trinhdodaotao_l }} <br>
        6. Nguồn kinh phí/diện học bổng (ghi cụ thể Hiệp định/NSNN/khác, nếu có):{{ $vc->nguonkinhphi_l }} <br>
        7. Chuyên ngành: {{ $vc->nganhhoc_l }} <br>
        8. Tên và địa chỉ cơ sở đào tạo: Tên: {{ $vc->tencosodaotao_l }}, địa chỉ: {{ $vc->diachidaotao_l }} <br>
        <span style="margin-left: 15px">
          Thông tin liên hệ: Email: {{ $vc->emailcoso_l }}
        </span>
        <span style="margin-left: 30px">
          Điện thoại: {{ $vc->sdtcoso_l }}
        </span>
        9. Ngày bắt đầu khóa học: {{ $vc->ngaybatdau_l }} <br>
        10. Ngày kết thúc chương trình đào tạo: {{ $vc->ngayketthuc_l }} <br>
        11. Ngày về nước: {{ $vc->ngayvenuoc_kq }} <br>
        12. Kết quả học tập: <br>
        <span style="margin-left: 15px">
          Văn bằng, chứng chỉ được cấp: {{ $vc->bangduoccap_kq }}
        </span> 
        <span style="margin-left: 110px">
          Ngày cấp bằng: {{ $vc->ngaycapbang_kq }}
        </span> <br>
        <span style="margin-left: 15px">
          Kết quả xếp loại (nếu có): {{ $vc->xeploai_kq }}
        </span> <br>
        13. Tên đề tài luận văn thạc sĩ (nếu học thạc sĩ coursework không có luận văn thì ghi: không có luận văn), đề tài luận án tiến sĩ, chuyên đề thực tập: {{ $vc->detaitotnghiep_kq }} <br>
        14. Thông tin người hướng dẫn khoa học: <br>
        <span style="margin-left: 15px">
          Họ tên: {{ $vc->tennguoihuongdan_kq }}
        </span> <br>
        <span style="margin-left: 15px">
          Địa chỉ email: {{ $vc->emailnguoihuongdan_kq }}
        </span> <br>
        15. Đánh giá của cơ sở đào tạo hoặc người hướng dẫn (nếu có, viết tóm tắt): {{ $vc->danhgiacuacoso_kq }} <br>
        16. Kiến nghị, đề xuất (nếu có): {{ $vc->kiennghi_kq }} <br>
        <span style="margin-left: 400px">........., ngày ...... tháng ...... năm ........</span> <br>
        <b style="margin-left: 470px">Người báo cáo</b> <br>
        <span style="margin-left: 455px">(Ký và ghi rõ họ tên)</span>
      </p>
    @endforeach
    
  </div>
</body>
</html>