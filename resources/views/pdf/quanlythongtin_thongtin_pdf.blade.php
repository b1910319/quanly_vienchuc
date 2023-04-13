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
        SƠ YẾU LÝ LỊCH CÁN BỘ, CÔNG CHỨC
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
        @foreach ($list_noisinh as $noisinh )
          @if ($noisinh->ma_vc == $vc->ma_vc)
            4. Nơi sinh: {{ $noisinh->ten_x }}, {{ $noisinh->ten_h }}, Tỉnh {{ $noisinh->ten_t }} <br>
          @endif
        @endforeach
        @foreach ($list_quequan as $quequan )
          @if ($quequan->ma_vc == $vc->ma_vc)
            5. Quê quán: {{ $quequan->ten_x }}, {{ $quequan->ten_h }}, Tỉnh {{ $quequan->ten_t }} <br>
          @endif
        @endforeach
        @foreach ($list_dantoc as $dantoc )
          @if ($dantoc->ma_dt == $vc->ma_dt)
            6. Dân tộc: {{ $dantoc->ten_dt }} <br>
          @endif
        @endforeach
        @foreach ($list_tongiao as $tongiao )
          @if ($tongiao->ma_tg == $vc->ma_tg)
            7. Tôn giáo: {{ $tongiao->ten_tg }} <br>
          @endif
        @endforeach
        8. Nơi đăng ký bộ khẩu thường trú: {{ $vc->thuongtru_vc }} <br>
        9. Nơi ở hiện nay: {{ $vc->hientai_vc }} <br>
        10. Nghề nghiệp khi được tuyển dụng: {{ $vc->nghekhiduoctuyen_vc }} <br>
        11. Ngày tuyển dụng: {{ $vc->ngaytuyendung_vc }}, Cơ quan tuyển dụng: Trường Công nghệ thông tin và Truyền thông - Đại học Cần Thơ <br>
        @foreach ($list_chucvu as $chucvu )
          @if ($vc->ma_cv == $chucvu->ma_cv)
            12. Chức vụ (chức danh) hiện tại: {{ $chucvu->ten_cv }} <br>
          @endif
        @endforeach
        13. Công việc chính được giao: {{ $vc->congviecchinhgiao_vc }} <br>
        @foreach ($list_ngach as $ngach )
          @if ($ngach->ma_n == $vc->ma_n)
            14. Ngạch công chức (viên chức): {{ $ngach->ten_n }}, Mã ngạch: {{ $ngach->maso_n }} <br>
          @endif
        @endforeach
        @foreach ($list_bac as $bac )
          @if ($bac->ma_b == $vc->ma_b)
            Bậc lương: {{ $bac->ten_b }}, Hệ số: {{ $bac->hesoluong_b }}, Ngày hưởng: {{ $vc->ngayhuongbac_vc }} <br>
          @endif
        @endforeach
        Phụ cấp: {{ $vc->phucap_vc }} <br>
        15.1 Trình độ giáo dục phổ thông (đã tốt nghiệp lớp mấy/thuộc hệ nào): {{ $vc->trinhdophothong_vc }} <br>
        15.2 Lý luận chính trị (Cao cấp, trung cấp, sơ cấp và tương đương): {{ $vc->chinhtri_vc }} <br>
        15.3 Quản lý nhà nước (chuyên viên cao cấp, chuyên viên chính, chuyên viên, cán sự,........) : {{ $vc->quanlynhanuoc_vc }} <br>
        15.4 Ngoại ngữ (Tên ngoại ngữ + Trình độ A, B, C, D......): {{ $vc->ngoaingu_vc }} <br>
        15.5 Tin học (Trình độ A, B, C,.......): {{ $vc->tinhoc_vc }} <br>
        16. Ngày vào Đảng Cộng sản Việt Nam: {{ $vc->ngayvaodang_vc }}, Ngày chính thức: {{ $vc->ngaychinhthuc_vc }} <br>
        17. Ngày nhập ngũ: {{ $vc->ngaynhapngu_vc }}, Ngày xuất ngũ: {{ $vc->ngayxuatngu_vc }}, Quân hàm cao nhất: {{ $vc->quanham_vc }} <br>
        18. Danh hiệu được phong tặng cao nhất (Anh hùng lao động, anh hùng lực lượng vũ trang; nhà giáo, thày thuốc, nghệ sĩ nhân dân và ưu tú, …): {{ $vc->danhhieucao_vc }} <br>
        19. Sở trường công tác: {{ $vc->sotruong_vc }} <br>
        20. Tình trạng sức khoẻ: Chiều cao: {{ $vc->chieucao_vc }} cm, Cân nặng: {{ $vc->cannang_vc }} kg, Nhóm máu: {{ $vc->nhommau_vc }} <br>
        @foreach ($list_thuongbinh as $thuongbinh )
          @if ($thuongbinh->ma_tb == $vc->ma_tb)
            21. Là thương binh hạng: {{ $thuongbinh->ten_tb }} <br>
          @endif
        @endforeach
        Là con gia đình chính sách (Con thương binh, con liệt sĩ, người nhiễm chất độc da cam Dioxin): {{ $vc->chinhsach_vc }} <br>
        22. Học phần giảng dạy: {{ $vc->hocphangiangday_vc }} <br>
        23. Số chứng minh nhân dân: {{ $vc->cccd_vc }}, Ngày cấp: {{ $vc->ngaycapcccd_vc }}
        24. Số sổ BHXH: {{ $vc->bhxh_vc }} <br>
        25. Đặc điểm lịch sử bản thân: <br>
        - Khai rõ: bị bắt, bị tù (từ ngày tháng năm nào đến ngày tháng năm nào, ở đâu), đã khai báo cho ai, những vấn đề gì? Bản thân có làm việc trong chế độ cũ (cơ quan, đơn vị nào, địa điểm, chức danh, chức vụ, thời gian làm việc ....): <br>
        => {{ $vc->lichsubanthan1_vc }} <br>
        - Tham gia hoặc có quan hệ với các tổ chức chính trị, kinh tế, xã hội nào ở nước ngoài (làm gì, tổ chức nào, đặt trụ sở ở đâu .........?): <br>
        => {{ $vc->lichsubanthan2_vc }} <br>
        - Có thân nhân (Cha, Mẹ, Vợ, Chồng, con, anh chị em ruột) ở nước ngoài (làm gì, địa chỉ)?: <br>
        => {{ $vc->lichsubanthan3_vc }} <br>
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