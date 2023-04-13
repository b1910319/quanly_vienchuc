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
        15.6 Trình độ chuyên môn <br>
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
        16. Ngày vào Đảng Cộng sản Việt Nam: {{ $vc->ngayvaodang_vc }}, Ngày chính thức: {{ $vc->ngaychinhthuc_vc }} <br>
        17. Ngày nhập ngũ: {{ $vc->ngaynhapngu_vc }}, Ngày xuất ngũ: {{ $vc->ngayxuatngu_vc }}, Quân hàm cao nhất: {{ $vc->quanham_vc }} <br>
        18. Danh hiệu được phong tặng cao nhất (Anh hùng lao động, anh hùng lực lượng vũ trang; nhà giáo, thày thuốc, nghệ sĩ nhân dân và ưu tú, …): {{ $vc->danhhieucao_vc }} <br>
        19. Sở trường công tác: {{ $vc->sotruong_vc }} <br>
        20. Khen thưởng: <br>
        <table class="table">
          <thead>
            <tr>
              <th  scope="col">#</th>
              <th  scope="col">Loại khen thưởng</th>
              <th  scope="col">Hình thức khen thưởng</th>
              <th  scope="col">Ngày khen thưởng</th>
              <th  scope="col">Nội dung khen thưởng</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 0;
              $a = 0;
            @endphp
            @foreach ($list_khenthuong as $key => $khenthuong)
              @if ($khenthuong->ma_vc == $vc->ma_vc)
                @php
                  $i = $i+1;
                @endphp
                <tr>
                  <td><?php echo $i ?></td>
                  <td>{{ $khenthuong->ten_lkt }}</td>
                  <td>{{ $khenthuong->ten_htkt }}</td>
                  <td>{{ $khenthuong->ngay_kt }}</td>
                  <td>{{ $khenthuong->noidung_kt }}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        21. Kỷ luật: <br>
        <table class="table">
          <thead>
            <tr>
              <th  scope="col">#</th>
              <th  scope="col">Loại kỷ luật</th>
              <th  scope="col">Ngày kỷ luật</th>
              <th  scope="col">Lý do kỷ luật</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_kyluat as $key => $kyluat)
              @if ($kyluat->ma_vc == $vc->ma_vc)
                @php
                  $a = $a+1;
                @endphp
                <tr>
                  <td><?php echo $a ?></td>
                  <td>{{ $kyluat->ten_lkl }}</td>
                  <td>{{ $kyluat->ngay_kl }}</td>
                  <td style="width: 40%">{{ $kyluat->lydo_kl }}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        22. Tình trạng sức khoẻ: Chiều cao: {{ $vc->chieucao_vc }} cm, Cân nặng: {{ $vc->cannang_vc }} kg, Nhóm máu: {{ $vc->nhommau_vc }} <br>
        @foreach ($list_thuongbinh as $thuongbinh )
          @if ($thuongbinh->ma_tb == $vc->ma_tb)
            23. Là thương binh hạng: {{ $thuongbinh->ten_tb }} <br>
          @endif
        @endforeach
        Là con gia đình chính sách (Con thương binh, con liệt sĩ, người nhiễm chất độc da cam Dioxin): {{ $vc->chinhsach_vc }} <br>
        24. Đào tạo, bồi dưỡng về chuyên môn, nghiệp vụ, lý luận chính trị, ngoại ngữ, tin học <br>
        25. Tóm tắt quá trình công tác: <br>
        <table class="table">
          <thead>
            <tr>
              <th  scope="col">#</th>
              <th  scope="col">Nhiệm kỳ</th>
              <th  scope="col">Chức vụ</th>
              <th  scope="col">Ghi chú</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 0;
            @endphp
            @foreach ($list_quatrinhchucvu as $key => $qtcv)
              @if ($qtcv->ma_vc == $vc->ma_vc)
                @php
                  $i = $i+1;
                @endphp
                <tr>
                  <td><?php echo $i ?></td>
                  <td>{{ $qtcv->ten_nk }}</td>
                  <td>{{ $qtcv->ten_cv }}</td>
                  <td style="width: 40%">{{ $qtcv->ghichu_qtcv }}</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        26. Học phần giảng dạy: {{ $vc->hocphangiangday_vc }} <br>
        27. Số chứng minh nhân dân: {{ $vc->cccd_vc }}, Ngày cấp: {{ $vc->ngaycapcccd_vc }} <br>
        28. Số sổ BHXH: {{ $vc->bhxh_vc }} <br>
        29. Đặc điểm lịch sử bản thân: <br>
        - Khai rõ: bị bắt, bị tù (từ ngày tháng năm nào đến ngày tháng năm nào, ở đâu), đã khai báo cho ai, những vấn đề gì? Bản thân có làm việc trong chế độ cũ (cơ quan, đơn vị nào, địa điểm, chức danh, chức vụ, thời gian làm việc ....): <br>
        => {{ $vc->lichsubanthan1_vc }} <br>
        - Tham gia hoặc có quan hệ với các tổ chức chính trị, kinh tế, xã hội nào ở nước ngoài (làm gì, tổ chức nào, đặt trụ sở ở đâu .........?): <br>
        => {{ $vc->lichsubanthan2_vc }} <br>
        - Có thân nhân (Cha, Mẹ, Vợ, Chồng, con, anh chị em ruột) ở nước ngoài (làm gì, địa chỉ)?: <br>
        => {{ $vc->lichsubanthan3_vc }} <br>
        30. Quan hệ gia đình: <br>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Mối quan hệ</th>
              <th scope="col">Họ và tên</th>
              <th scope="col">Ngày tháng năm sinh</th>
              <th scope="col">Quê quán, nghề nghiệp, chức danh, chức vụ, đơn vị công tác, học tập, nơi ở (trong, ngoài nước); thành viên các tổ chức chính trị - xã hội ........</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 0;
            @endphp
            @foreach ($list_giadinh as $key => $giadinh )
              @if ($giadinh->ma_vc == $vc->ma_vc)
                @php
                  $i++;
                @endphp
                <tr>
                  <th scope="row"><?php echo $i ?></th>
                  <td>{{ $giadinh->moiquanhe_gd }}</td>
                  <td>{{ $giadinh->hoten_gd }}</td>
                  <td>{{ $giadinh->ngaysinh_gd }}</td>
                  <td style="width: 40%">
                    Số điện thoại: {{ $giadinh->sdt_gd }} <br>
                    Nghề nghiệp: {{ $giadinh->nghenghiep_gd }}
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
        31. Quá trình tham gia các lớp học: <br>
        @foreach ($list_lop_vienchuc as $key => $lop_vc)
          @if ($vc->ma_vc == $lop_vc->ma_vc)
            <p class="fw-bold text-center text-danger">THÔNG TIN LỚP HỌC</p>
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
              THÔNG TIN QUÁ TRÌNH HỌC
            </p>
            @foreach ($list_quatrinhhoc_ketqua as $ketqua)
              @if ($ketqua->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 25%;">
                  HOÀN THÀNH KHOÁ HỌC
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
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 15%;">
                  GIA HẠN
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
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 15%;">
                  DỪNG HỌC
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
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 43%;">
                  CHUYỂN NƯỚC, NGÀNH HỌC, TRƯỜNG ...
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
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 15%;">
                  THÔI HỌC
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