@extends('layout')
@section('content')
<div class="card-box">
  <div class="row ">
    <div class="alert alert-success color_alert" role="alert" >
      <div class="row">
        <div class="col-1">
          <a href="{{ URL::to('/lylich') }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        </div>
        <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
          ________ LÝ LỊCH CỦA VIÊN CHỨC " <span style="color: #FFFF00">{{ $vienchuc_ma->hoten_vc }}</span> "________
        </h4>
      </div>
      
    </div>
  </div>
</div>
<div class="mt-3"></div>
<div class="row">
  <div class="col-5">
    <div class="card-box">
      <p class="text-center fw-bold" style=" color: #000d6b; font-size: 22px">THÔNG TIN CÁ NHÂN</p>
      @foreach ($vienchuc as $vc )
        <table class="table table-hover">
          <tbody>
            <tr>
              <th scope="row" style="width: 30%">Họ tên viên chức</th>
              <td>{{ $vc->hoten_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Tên gọi khác</th>
              <td>{{ $vc->tenkhac_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Ngày sinh</th>
              <td>{{ $vc->ngaysinh_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Giới tính</th>
              <td>
                @if ($vc->gioitinh_vc == 0)
                  Nam
                @else
                  Nữ
                @endif
              </td> 
            </tr>
            <tr>
              <th scope="row">Nơi sinh</th>
              <td>
                @foreach ($list_noisinh as $noisinh )
                  @if ($noisinh->ma_vc == $vc->ma_vc)
                    {{ $noisinh->ten_x }}, {{ $noisinh->ten_h }}, Tỉnh {{ $noisinh->ten_t }} <br>
                  @endif
                @endforeach
              </td> 
            </tr>
            <tr>
              <th scope="row">Quê quán</th>
              <td>
                @foreach ($list_quequan as $quequan )
                  @if ($quequan->ma_vc == $vc->ma_vc)
                    {{ $quequan->ten_x }}, {{ $quequan->ten_h }}, Tỉnh {{ $quequan->ten_t }} <br>
                  @endif
                @endforeach
              </td> 
            </tr>
            <tr>
              <th scope="row">Dân tộc</th>
              <td>
                @foreach ($list_dantoc as $dantoc )
                  @if ($dantoc->ma_dt == $vc->ma_dt)
                    {{ $dantoc->ten_dt }} <br>
                  @endif
                @endforeach
              </td> 
            </tr>
            <tr>
              <th scope="row">Tôn giáo</th>
              <td>
                @foreach ($list_tongiao as $tongiao )
                  @if ($tongiao->ma_tg == $vc->ma_tg)
                    {{ $tongiao->ten_tg }} <br>
                  @endif
                @endforeach
              </td> 
            </tr>
            <tr>
              <th scope="row">Hộ khẩu thường trú</th>
              <td>{{ $vc->thuongtru_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Nơi ở hiện nay</th>
              <td>{{ $vc->hientai_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Nghề khi được tuyển</th>
              <td>{{ $vc->nghekhiduoctuyen_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Ngày tuyển dụng</th>
              <td>{{ $vc->ngaytuyendung_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Chức vụ</th>
              <td>
                @foreach ($list_chucvu as $chucvu )
                  @if ($vc->ma_cv == $chucvu->ma_cv)
                    {{ $chucvu->ten_cv }} <br>
                  @endif
                @endforeach
              </td> 
            </tr>
            <tr>
              <th scope="row">Công việc chính được giao</th>
              <td>{{ $vc->congviecchinhgiao_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Ngạch</th>
              <td>
                @foreach ($list_ngach as $ngach )
                  @if ($ngach->ma_n == $vc->ma_n)
                    Ngạch: {{ $ngach->ten_n }}
                    <br>
                    Mã ngạch: {{ $ngach->maso_n }}
                  @endif
                @endforeach
              </td> 
            </tr>

            <tr>
              <th scope="row">Bậc</th>
              <td>
                @foreach ($list_bac as $bac )
                  @if ($bac->ma_b == $vc->ma_b)
                    Bậc lương: {{ $bac->ten_b }} <br>
                    Hệ số: {{ $bac->hesoluong_b }} <br>
                    Ngày hưởng: {{ $vc->ngayhuongbac_vc }}
                  @endif
                @endforeach
              </td> 
            </tr>
            <tr>
              <th scope="row">Trình độ giáo dục phổ thông</th>
              <td>{{ $vc->trinhdophothong_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Lý luận chính trị</th>
              <td>{{ $vc->chinhtri_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Quản lý nhà nước</th>
              <td>{{ $vc->quanlynhanuoc_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Ngoại ngữ</th>
              <td>{{ $vc->ngoaingu_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Tin học</th>
              <td>{{ $vc->tinhoc_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Vào đảng</th>
              <td>
                Ngày vào Đảng Cộng sản Việt Nam: {{ $vc->ngayvaodang_vc }}<br>
                Ngày chính thức: {{ $vc->ngaychinhthuc_vc }} 
              </td> 
            </tr>
            <tr>
              <th scope="row">Ngày nhập ngũ</th>
              <td>{{ $vc->ngaynhapngu_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Ngày xuất ngũ</th>
              <td>{{ $vc->ngayxuatngu_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Quân hàm cao nhất</th>
              <td>{{ $vc->quanham_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Danh hiệu được phong tặng cao nhất</th>
              <td>{{ $vc->danhhieucao_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Sở trường công tác</th>
              <td>{{ $vc->sotruong_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Tình trạng sức khoẻ</th>
              <td>
                Chiều cao: {{ $vc->chieucao_vc }} cm <br>
                Cân nặng: {{ $vc->cannang_vc }} kg <br>
                Nhóm máu: {{ $vc->nhommau_vc }} 
              </td> 
            </tr>
            <tr>
              <th scope="row">Là thương binh hạng</th>
              <td>
                @foreach ($list_thuongbinh as $thuongbinh )
                  @if ($thuongbinh->ma_tb == $vc->ma_tb)
                    {{ $thuongbinh->ten_tb }} <br>
                  @endif
                @endforeach
              </td> 
            </tr>
            <tr>
              <th scope="row">Học phần giảng dạy</th>
              <td>{{ $vc->hocphangiangday_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Số chứng minh nhân dân:</th>
              <td>{{ $vc->cccd_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Ngày cấp</th>
              <td>{{ $vc->ngaycapcccd_vc }}</td> 
            </tr>
            <tr>
              <th scope="row">Số sổ BHXH</th>
              <td>{{ $vc->bhxh_vc }}</td> 
            </tr>
          </tbody>
        </table>
      @endforeach
    </div>
  </div>
  <div class="col-7">
    <div class="row">
      <div class="card-box">
        <p class="text-center fw-bold" style=" color: #000d6b; font-size: 22px">QUÁ TRÌNH KHEN THƯỞNG CỦA VIÊN CHỨC</p>
        <div class="dots-list">
          <ol>
            @foreach ($list_khenthuong as $khenthuong )
              <li>
                <span class="date">{{ $khenthuong->ngay_kt }}</span>
                <b style="font-weight: bold; font-size: 22px">{{ $khenthuong->ten_lkt }}</b>
                <br>
                Hình thức khen thưởng: {{ $khenthuong->ten_htkt }} <br>
                Nội dung khen thưởng: {{ $khenthuong->noidung_kt }}
              </li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card-box">
        <p class="text-center fw-bold" style=" color: #000d6b; font-size: 22px">QUÁ TRÌNH CHỨC VỤ VIÊN CHỨC</p>
        <div class="dots-list">
          <ol>
            @foreach ($list_quatrinhchucvu as $qtcv )
              <li>
                <span class="date">{{ $qtcv->ten_nk }}</span>
                <b style="font-weight: bold; font-size: 22px">{{ $qtcv->ten_cv }}</b>
                <br>
                {{ $qtcv->ghichu_qtcv }}
              </li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card-box">
        <p class="text-center fw-bold" style=" color: #000d6b; font-size: 22px">QUÁ TRÌNH KỶ LUẬT CỦA VIÊN CHỨC</p>
        <div class="dots-list">
          <ol>
            @foreach ($list_kyluat as $kyluat )
              <li>
                <span class="date">{{ $kyluat->ngay_kl }}</span>
                <b style="font-weight: bold; font-size: 22px">{{ $kyluat->ten_lkl }}</b>
                <br>
                Lý do kỷ luật: {{ $kyluat->lydo_kl }}
              </li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card-box">
        <p class="text-center fw-bold" style=" color: #000d6b; font-size: 22px">QUÁ TRÌNH HỌC CỦA VIÊN CHỨC</p>
        @foreach ($list_lop_vienchuc as $key => $lop_vc)
          <button type="button" class="btn btn-light mt-3" data-toggle="collapse" data-target="#demo{{ $key+1 }}" style="width: 100%">
            <div class="row">
              <div class="col-11" style="font-weight: bold;">
                {{ $lop_vc->ten_l }}
              </div>
              <div class="col-1">
                <i class="fa-solid fa-angle-down"></i>
              </div>
            </div>
          </button>
          <div id="demo{{ $key+1 }}" class="collapse mt-2">
            <p class="fw-bold text-center text-danger">THÔNG TIN LỚP HỌC</p>
            <div class="row">
              <div class="col-6">
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
              <div class="col-6">
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
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 30%;">
                  HOÀN THÀNH KHOÁ HỌC
                </p>
                @foreach ($list_quatrinhhoc_ketqua as $ketqua)
                  @if ($ketqua->ma_l == $lop_vc->ma_l)
                    <div class="row">
                      <div class="col-6">
                        <b>Tên người hướng dẫn: </b>{{ $ketqua->tennguoihuongdan_kq }} <br>
                        <b>Email người hướng dẫn: </b>{{ $ketqua->emailnguoihuongdan_kq }} <br>
                        <b>Bằng được cấp: </b>{{ $ketqua->bangduoccap_kq }} <br>
                        <b>Ngày cấp bằng: </b>{{ $ketqua->ngaycapbang_kq }} <br>
                      </div>
                      <div class="col-6">
                        <b>Xếp loại: </b>{{ $ketqua->xeploai_kq }} <br>
                        <b>Đề tài tốt nghiệp: </b>{{ $ketqua->detaitotnghiep_kq }} <br>
                        <b>Ngày về nước: </b>{{ $ketqua->ngayvenuoc_kq }} <br>
                        <b>Đánh giá của cơ sở: </b>{{ $ketqua->danhgiacuacoso_kq }} <br>
                        <b>Kiến nghị: </b>{{ $ketqua->kiennghi_kq }}
                      </div>
                    </div>
                  @endif
                @endforeach
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
                      <th  scope="col">File</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_giahan as $giahan)
                      @if ($giahan->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>{{ $giahan->thoigian_gh }}</td>
                          <td>{{ $giahan->lydo_gh }}</td>
                          <td>
                            @if ($giahan->file_gh !=' ')
                              <a href="{{ asset('public/uploads/giahan/'.$giahan->file_gh) }}">
                                <button type="button" class="btn btn-warning button_xanhla">
                                  <i class="fa-solid fa-file text-light"></i>
                                  &ensp;
                                  File
                                </button>
                              </a>
                            @else
                              Không có file
                            @endif
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
            @endforeach
            @foreach ($list_quatrinhhoc_dunghoc as $dunghoc)
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
                      <th  scope="col">File</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_dunghoc as $dunghoc)
                      @if ($dunghoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>{{ $dunghoc->batdau_dh }}</td>
                          <td>{{ $dunghoc->ketthuc_dh }}</td>
                          <td>{{ $dunghoc->lydo_dh }}</td>
                          <td>
                            @if ($dunghoc->file_dh !=' ')
                              <a href="{{ asset('public/uploads/dunghoc/'.$dunghoc->file_dh) }}">
                                <button type="button" class="btn btn-warning button_xanhla">
                                  <i class="fa-solid fa-file text-light"></i>
                                  &ensp;
                                  File
                                </button>
                              </a>
                            @else
                              Không có file
                            @endif
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
            @endforeach
            @foreach ($list_quatrinhhoc_chuyen as $chuyen)
              @if ($chuyen->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 40%;">
                  CHUYỂN NƯỚC, NGÀNH HỌC, TRƯỜNG...
                </p>
                <table class="table">
                  <thead>
                    <tr>
                      <th  scope="col">Nội dung xin chuyển</th>
                      <th  scope="col">Lý do chuyển</th>
                      <th  scope="col">File</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_chuyen as $chuyen)
                      @if ($chuyen->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>{{ $chuyen->noidung_c }}</td>
                          <td>{{ $chuyen->lydo_c }}</td>
                          <td>
                            @if ($chuyen->file_c !=' ')
                              <a href="{{ asset('public/uploads/chuyen/'.$chuyen->file_c) }}">
                                <button type="button" class="btn btn-warning button_xanhla">
                                  <i class="fa-solid fa-file text-light"></i>
                                  &ensp;
                                  File
                                </button>
                              </a>
                            @else
                              Không có file
                            @endif
                          </td>
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
                      <th  scope="col">File</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_thoihoc as $thoihoc)
                      @if ($thoihoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>{{ $thoihoc->ngay_th }}</td>
                          <td>{{ $thoihoc->lydo_th }}</td>
                          <td>
                            @if ($thoihoc->file_th !=' ')
                              <a href="{{ asset('public/uploads/thoihoc/'.$thoihoc->file_th) }}">
                                <button type="button" class="btn btn-warning button_xanhla">
                                  <i class="fa-solid fa-file text-light"></i>
                                  &ensp;
                                  File
                                </button>
                              </a>
                            @else
                              Không có file
                            @endif
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              @endif
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
    <div class="row">
      <div class="card-box">
        <p class="text-center fw-bold" style=" color: #000d6b; font-size: 22px">THÔNG TIN BẰNG CẤP CỦA VIÊN CHỨC</p>
        <div class="dots-list">
          <ol>
            @foreach ($list_bangcap as $key => $bangcap )
              <li>
                <span class="date">{{ $bangcap->ngaycap_bc }}</span>
                <b style="font-weight: bold; font-size: 22px">{{ $bangcap->truonghoc_bc }}</b>
                <br>
                <b>Hệ đào tạo: </b> {{ $bangcap->ten_hdt }} <br>
                <b>Loại bằng cấp: </b> {{ $bangcap->ten_lbc }} <br>
                <b>Trình độ chuyên môn: </b> {{ $bangcap->trinhdochuyenmon_bc }} <br>
                <b>Niên khoá: </b> {{ $bangcap->nienkhoa_bc }} <br>
                <b>Số bằng: </b> {{ $bangcap->sobang_bc }} <br>
                <b>Nơi cấp: </b> {{ $bangcap->noicap_bc }} <br>
                <b>Xếp hạng: </b> {{ $bangcap->xephang_bc }}
              </li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="card-box">
        <p class="text-center fw-bold" style=" color: #000d6b; font-size: 22px">THÔNG TIN GIA ĐÌNH VIÊN CHỨC</p>
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
                    <b>Số điện thoại:</b> {{ $giadinh->sdt_gd }} <br>
                    <b>Nghề nghiệp:</b> {{ $giadinh->nghenghiep_gd }}
                  </td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
