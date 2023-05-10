@extends('layout')
@section('content')
<?php use Illuminate\Support\Carbon; ?>
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
              <td>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaysinh_vc = Carbon::parse(Carbon::create($vc->ngaysinh_vc))->format('d-m-Y');
                  echo $ngaysinh_vc;
                ?>
              </td> 
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
              <td>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaytuyendung_vc = Carbon::parse(Carbon::create($vc->ngaytuyendung_vc))->format('d-m-Y');
                  echo $ngaytuyendung_vc;
                ?>
              </td> 
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
              <td>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaynhapngu_vc = Carbon::parse(Carbon::create($vc->ngaynhapngu_vc))->format('d-m-Y');
                  echo $ngaynhapngu_vc;
                ?>
              </td> 
            </tr>
            <tr>
              <th scope="row">Ngày xuất ngũ</th>
              <td>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngayxuatngu_vc = Carbon::parse(Carbon::create($vc->ngayxuatngu_vc))->format('d-m-Y');
                  echo $ngayxuatngu_vc;
                ?>
              </td> 
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
              <td>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaycapcccd_vc = Carbon::parse(Carbon::create($vc->ngaycapcccd_vc))->format('d-m-Y');
                  echo $ngaycapcccd_vc;
                ?>
              </td> 
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
                <span class="date">
                  <?php 
                    Carbon::now('Asia/Ho_Chi_Minh');
                    $ngay_kt = Carbon::parse(Carbon::create($khenthuong->ngay_kt))->format('d-m-Y');
                    echo $ngay_kt;
                  ?>
                </span>
                <b style="font-weight: bold; font-size: 22px">{{ $khenthuong->ten_lkt }}</b>
                <br>
                <b>- Hình thức khen thưởng: </b> {{ $khenthuong->ten_htkt }} <br>
                <b>- Nội dung khen thưởng:</b> {{ $khenthuong->noidung_kt }} <br>
                <b>- Số quyết định: </b>{{ $khenthuong->soquyetdinh_kt }} <br>
                @if ($khenthuong->filequyetdinh_kt)
                  <a href="{{ asset('public/uploads/khenthuong/'.$khenthuong->filequyetdinh_kt) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File quyết định
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
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
                <span class="date">{{ $qtcv->batdau_nk }} - {{ $qtcv->ketthuc_nk }}</span>
                <b style="font-weight: bold; font-size: 22px">{{ $qtcv->ten_cv }}</b>
                <br>
                <b>- Số quyết định: </b>{{ $qtcv->soquyetdinh_qtcv }} <br>
                <b>- Ngày ký quyết định: </b>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngayky_qtcv = Carbon::parse(Carbon::create($qtcv->ngayky_qtcv))->format('d-m-Y');
                  echo $ngayky_qtcv;
                ?>
                <br>
                @if ($qtcv->file_qtcv)
                  <a href="{{ asset('public/uploads/quatrinhchucvu/'.$qtcv->file_qtcv) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File quyết định
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
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
                <span class="date">
                  <?php 
                    Carbon::now('Asia/Ho_Chi_Minh');
                    $ngay_kl = Carbon::parse(Carbon::create($kyluat->ngay_kl))->format('d-m-Y');
                    echo $ngay_kl;
                  ?>
                </span>
                <b style="font-weight: bold; font-size: 22px">{{ $kyluat->ten_lkl }}</b>
                <br>
                <b>- Lý do kỷ luật:</b> {{ $kyluat->lydo_kl }} <br>
                <b>- Số quyết định: </b>{{ $kyluat->soquyetdinh_kl }} <br>
                @if ($kyluat->filequyetdinh_kl)
                  <a href="{{ asset('public/uploads/kyluat/'.$kyluat->filequyetdinh_kl) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File quyết định
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
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
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaybatdau_l = Carbon::parse(Carbon::create($lop_vc->ngaybatdau_l))->format('d-m-Y');
                  echo $ngaybatdau_l;
                ?>
                <br>
                <span class="fw-bold">
                  Ngày kết thúc: 
                </span>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngayketthuc_l = Carbon::parse(Carbon::create($lop_vc->ngayketthuc_l))->format('d-m-Y');
                  echo $ngayketthuc_l;
                ?>
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
                        <b>Bằng được cấp: </b>
                        <?php 
                          Carbon::now('Asia/Ho_Chi_Minh');
                          $bangduoccap_kq = Carbon::parse(Carbon::create($ketqua->bangduoccap_kq))->format('d-m-Y');
                          echo $bangduoccap_kq;
                        ?>
                        <br>
                        <b>Ngày cấp bằng: </b>
                        <?php 
                          Carbon::now('Asia/Ho_Chi_Minh');
                          $ngaycapbang_kq = Carbon::parse(Carbon::create($ketqua->ngaycapbang_kq))->format('d-m-Y');
                          echo $ngaycapbang_kq;
                        ?>
                        <br>
                      </div>
                      <div class="col-6">
                        <b>Xếp loại: </b>{{ $ketqua->xeploai_kq }} <br>
                        <b>Đề tài tốt nghiệp: </b>{{ $ketqua->detaitotnghiep_kq }} <br>
                        <b>Ngày về nước: </b>
                        <?php 
                          Carbon::now('Asia/Ho_Chi_Minh');
                          $ngayvenuoc_kq = Carbon::parse(Carbon::create($ketqua->ngayvenuoc_kq))->format('d-m-Y');
                          echo $ngayvenuoc_kq;
                        ?>
                        <br>
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
                      <th  scope="col">Thông tin gia hạn</th>
                      <th  scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_giahan as $giahan)
                      @if ($giahan->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Thời gian gia hạn: 
                            <?php 
                              Carbon::now('Asia/Ho_Chi_Minh');
                              $thoigian_gh = Carbon::parse(Carbon::create($giahan->thoigian_gh))->format('d-m-Y');
                              echo $thoigian_gh;
                            ?>
                            <br>
                            - Lý do xin gia hạn: {{ $giahan->lydo_gh }} <br>
                            @if ($giahan->file_gh)
                              <a href="{{ asset('public/uploads/giahan/'.$giahan->file_gh) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File gia hạn
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                            @endif
                          </td>
                          <td>
                            - Số quyết định: {{ $giahan->soquyetdinh_gh }} <br>
                            - Ngày ký quyết định: 
                            <?php 
                              Carbon::now('Asia/Ho_Chi_Minh');
                              $ngayky_quyetdinh_gh = Carbon::parse(Carbon::create($giahan->ngayky_quyetdinh_gh))->format('d-m-Y');
                              echo $ngayky_quyetdinh_gh;
                            ?>
                            <br>
                            @if ($giahan->filequyetdinh_gh)
                              <a href="{{ asset('public/uploads/giahan/'.$giahan->filequyetdinh_gh) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File quyết định
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
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
                      <th  scope="col">Thông tin xin tạm dừng</th>
                      <th  scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_dunghoc as $dunghoc)
                      @if ($dunghoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Ngày bắt đầu: 
                            <?php 
                              Carbon::now('Asia/Ho_Chi_Minh');
                              $batdau_dh = Carbon::parse(Carbon::create($dunghoc->batdau_dh))->format('d-m-Y');
                              echo $batdau_dh;
                            ?>
                            <br>
                            - Ngày kết thúc: 
                            <?php 
                              Carbon::now('Asia/Ho_Chi_Minh');
                              $ketthuc_dh = Carbon::parse(Carbon::create($dunghoc->ketthuc_dh))->format('d-m-Y');
                              echo $ketthuc_dh;
                            ?> 
                            <br>
                            @if ($dunghoc->file_dh)
                              <a href="{{ asset('public/uploads/dunghoc/'.$dunghoc->file_dh) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File gia hạn
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                            @endif
                          </td>
                          <td>
                            - Số quyết định: {{ $dunghoc->soquyetdinh_dh }} <br>
                            - Ngày ký quyết định: 
                            <?php 
                              Carbon::now('Asia/Ho_Chi_Minh');
                              $ngaykyquyetdinh_dh = Carbon::parse(Carbon::create($dunghoc->ngaykyquyetdinh_dh))->format('d-m-Y');
                              echo $ngaykyquyetdinh_dh;
                            ?>
                            <br>
                            @if ($dunghoc->filequyetdinh_dh)
                              <a href="{{ asset('public/uploads/dunghoc/'.$dunghoc->filequyetdinh_dh) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File quyết định
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
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
                      <th  scope="col">Thông tin xin chuyển</th>
                      <th  scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_chuyen as $chuyen)
                      @if ($chuyen->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td style="width: 60%">
                            - Nội dung xin chuyển: {{ $chuyen->noidung_c }} <br>
                            - Lý do xin chuyển: {{ $chuyen->lydo_c }} <br>
                            @if ($chuyen->file_c)
                              <a href="{{ asset('public/uploads/chuyen/'.$chuyen->file_c) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File gia hạn
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                            @endif
                          </td>
                          <td>
                            - Số quyết định: {{ $chuyen->soquyetdinh_c }} <br>
                            - Ngày ký quyết định: 
                            <?php 
                              Carbon::now('Asia/Ho_Chi_Minh');
                              $ngaykyquyetdinh_c = Carbon::parse(Carbon::create($chuyen->ngaykyquyetdinh_c))->format('d-m-Y');
                              echo $ngaykyquyetdinh_c;
                            ?>
                            <br>
                            @if ($chuyen->filequyetdinh_c)
                              <a href="{{ asset('public/uploads/chuyen/'.$chuyen->filequyetdinh_c) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File quyết định
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
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
                      <th  scope="col">Thông tin thôi học</th>
                      <th  scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_thoihoc as $thoihoc)
                      @if ($thoihoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Ngày thôi học: 
                            <?php 
                              Carbon::now('Asia/Ho_Chi_Minh');
                              $ngay_th = Carbon::parse(Carbon::create($thoihoc->ngay_th))->format('d-m-Y');
                              echo $ngay_th;
                            ?>
                            <br>
                            - Lý do xin thôi học: {{ $thoihoc->lydo_th }} <br>
                            @if ($thoihoc->file_th)
                              <a href="{{ asset('public/uploads/thoihoc/'.$thoihoc->file_th) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File gia hạn
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                            @endif
                          </td>
                          <td>
                            - Số quyết định: {{ $thoihoc->soquyetdinh_th }} <br>
                            - Ngày ký quyết định: 
                            <?php 
                              Carbon::now('Asia/Ho_Chi_Minh');
                              $ngaykyquyetdinh_th = Carbon::parse(Carbon::create($thoihoc->ngaykyquyetdinh_th))->format('d-m-Y');
                              echo $ngaykyquyetdinh_th;
                            ?>
                            <br>
                            @if ($thoihoc->filequyetdinh_th)
                              <a href="{{ asset('public/uploads/thoihoc/'.$thoihoc->filequyetdinh_th) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File quyết định
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
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
                <span class="date">
                  <?php 
                    Carbon::now('Asia/Ho_Chi_Minh');
                    $ngaycap_bc = Carbon::parse(Carbon::create($bangcap->ngaycap_bc))->format('d-m-Y');
                    echo $ngaycap_bc;
                  ?>
                </span>
                <b style="font-weight: bold; font-size: 22px">{{ $bangcap->truonghoc_bc }}</b>
                &ensp;
                @if ($bangcap->file_bc)
                  <a href="{{ asset('public/uploads/bangcap/'.$bangcap->file_bc) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File bằng cấp
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
                <br>
                <div class="row">
                  <div class="col-6">
                    <b>- Hệ đào tạo: </b> {{ $bangcap->ten_hdt }} <br>
                    <b>- Loại bằng cấp: </b> {{ $bangcap->ten_lbc }} <br>
                    <b>- Trình độ chuyên môn: </b> {{ $bangcap->trinhdochuyenmon_bc }} <br>
                    <b>- Niên khoá: </b> {{ $bangcap->tunam_bc }} - {{ $bangcap->dennam_bc }} <br>
                  </div>
                  <div class="col-6">
                    <b>- Số bằng: </b> {{ $bangcap->sobang_bc }} <br>
                    <b>- Nơi cấp: </b> {{ $bangcap->noicap_bc }} <br>
                    <b>- Xếp hạng: </b> {{ $bangcap->xephang_bc }} <br>
                  </div>
                </div>
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
                  <td>
                    <?php 
                      Carbon::now('Asia/Ho_Chi_Minh');
                      $ngaysinh_gd = Carbon::parse(Carbon::create($giadinh->ngaysinh_gd))->format('d-m-Y');
                      echo $ngaysinh_gd;
                    ?>
                  </td>
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
    <div class="row">
      <div class="card-box">
        <p class="text-center fw-bold" style=" color: #000d6b; font-size: 22px">QUÁ TRÌNH NGHỈ CỦA VIÊN CHỨC</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Thông tin quá trình nghỉ</th>
              <th scope="col">Thông tin quyết định</th>
            </tr>
          </thead>
          <tbody>
            @php
              $i = 0;
            @endphp
            @foreach ($list_quatrinhnghi as $key => $quatrinhnghi )
              @if ($quatrinhnghi->ma_vc == $vc->ma_vc)
                @php
                  $i++;
                @endphp
                <tr>
                  <th scope="row"><?php echo $i ?></th>
                  <td>
                    <b>- Danh mục nghỉ: </b>{{ $quatrinhnghi->ten_dmn }} <br>
                    <b>- Bắt đầu nghỉ: </b>
                    <?php 
                      Carbon::now('Asia/Ho_Chi_Minh');
                      $batdau_qtn = Carbon::parse(Carbon::create($quatrinhnghi->batdau_qtn))->format('d-m-Y');
                      echo $batdau_qtn;
                    ?>
                    <br>
                    <b>- Kết thúc nghỉ: </b>
                    <?php 
                      Carbon::now('Asia/Ho_Chi_Minh');
                      $ketthuc_qtn = Carbon::parse(Carbon::create($quatrinhnghi->ketthuc_qtn))->format('d-m-Y');
                      echo $ketthuc_qtn;
                    ?>
                    <br>
                    <b>- Ghi chú: </b>{{ $quatrinhnghi->ghichu_qtn }} <br>
                    @if ($quatrinhnghi->file_qtn)
                      <a href="{{ asset('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn) }}" style="color: #000D6B; font-weight: bold">
                        <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                        File
                      </a>
                    @else
                      <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                    @endif
                  </td>
                  <td>
                    <b>- Số quyết định: </b>{{ $quatrinhnghi->soquyetdinh_qtn }} <br>
                    <b>- Ngày ký quyết định: </b>
                    <?php 
                      Carbon::now('Asia/Ho_Chi_Minh');
                      $ngaykyquyetdinh_qtn = Carbon::parse(Carbon::create($quatrinhnghi->ngaykyquyetdinh_qtn))->format('d-m-Y');
                      echo $ngaykyquyetdinh_qtn;
                    ?>
                    <br>
                    @if ($quatrinhnghi->filequyetdinh_qtn)
                      <a href="{{ asset('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn) }}" style="color: #000D6B; font-weight: bold">
                        <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                        File
                      </a>
                    @else
                      <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                    @endif
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
