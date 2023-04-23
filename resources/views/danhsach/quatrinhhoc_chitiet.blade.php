@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('quatrinhhoc') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
        ________QÚA TRÌNH HỌC CỦA VIÊN CHỨC " <span style="color: #FFFF00" >{{ $vienchuc->hoten_vc }}</span> "________
      </h4>
    </div>
    <div class="mt-3"></div>
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
            <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 15%;">
              HOÀN THÀNH KHOÁ HỌC
            </p>
            <table class="table">
              <thead class="color_table">
                <tr>
                  <th class="text-light" scope="col">Tên người hướng dẫn</th>
                  <th class="text-light" scope="col">Email người hướng dẫn</th>
                  <th class="text-light" scope="col">Bằng được cấp</th>
                  <th class="text-light" scope="col">Ngày cấp bằng</th>
                  <th class="text-light" scope="col">Xếp loại</th>
                  <th class="text-light" scope="col">Đề tài tốt nghiệp</th>
                  <th class="text-light" scope="col">Ngày về nước</th>
                  <th class="text-light" scope="col">Đánh giá của cơ sở</th>
                  <th class="text-light" scope="col">Kiến nghị</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($list_quatrinhhoc_ketqua as $ketqua)
                  @if ($ketqua->ma_l == $lop_vc->ma_l)
                    <tr>
                      <td>{{ $ketqua->tennguoihuongdan_kq }}</td>
                      <td>{{ $ketqua->emailnguoihuongdan_kq }}</td>
                      <td>{{ $ketqua->bangduoccap_kq }}</td>
                      <td style="width: 8%">{{ $ketqua->ngaycapbang_kq }}</td>
                      <td>{{ $ketqua->xeploai_kq }}</td>
                      <td>{{ $ketqua->detaitotnghiep_kq }}</td>
                      <td style="width: 8%">{{ $ketqua->ngayvenuoc_kq }}</td>
                      <td>{{ $ketqua->danhgiacuacoso_kq }}</td>
                      <td>{{ $ketqua->kiennghi_kq }}</td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          @endif
        @endforeach
        <div class="row">
          <div class="col-6">
            @foreach ($list_quatrinhhoc_giahan as $giahan)
              @if ($giahan->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 15%;">
                  GIA HẠN
                </p>
                <table class="table">
                  <thead class="color_table">
                    <tr>
                      <th class="text-light"   scope="col">Thông tin gia hạn</th>
                      <th class="text-light"   scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_giahan as $giahan)
                      @if ($giahan->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Thời gian gia hạn: {{ $giahan->thoigian_gh }} <br>
                            - Lý do xin gia hạn: {{ $giahan->lydo_gh }} <br>
                            @if ($giahan->file_gh)
                              <a href="{{ asset('public/uploads/giahan/'.$giahan->file_gh) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File xin gia hạn
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                            @endif
                          </td>
                          <td>
                            - Số quyết định: {{ $giahan->soquyetdinh_gh }} <br>
                            - Ngày ký quyết định: {{ $giahan->ngaykyquyetdinh_gh }} <br>
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
              @break
            @endforeach
          </div>
          <div class="col-6">
            @foreach ($list_quatrinhhoc_dunghoc as $dunghoc)
              @if ($dunghoc->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 15%;">
                  DỪNG HỌC
                </p>
                <table class="table">
                  <thead class="color_table">
                    <tr>
                      <th class="text-light"   scope="col">Thông tin dừng học</th>
                      <th class="text-light"   scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_dunghoc as $dunghoc)
                      @if ($dunghoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Ngày bắt đầu: {{ $dunghoc->batdau_dh }} <br>
                            - Ngày kết thúc: {{ $dunghoc->ketthuc_dh }} <br>
                            - Lý do: {{ $dunghoc->lydo_dh }} <br>
                            @if ($dunghoc->file_dh)
                              <a href="{{ asset('public/uploads/dunghoc/'.$dunghoc->file_dh) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File xin tạm dừng
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                            @endif
                          </td>
                          <td>
                            - Số quyết định: {{ $dunghoc->soquyetdinh_dh }} <br>
                            - Ngày ký quyết định: {{ $dunghoc->ngaykyquyetdinh_dh }} <br>
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
              @break
            @endforeach
          </div>
          <div class="col-6">
            @foreach ($list_quatrinhhoc_chuyen as $chuyen)
              @if ($chuyen->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 50%;">
                  CHUYỂN NƯỚC, NGÀNH HỌC, TRƯỜNG...
                </p>
                <table class="table">
                  <thead class="color_table">
                    <tr>
                      <th class="text-light"  scope="col">Thông tin xin chuyển</th>
                      <th class="text-light"  scope="col">Thông tin quyết định</th>
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
                                File xin chuyển
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                            @endif
                          </td>
                          <td>
                            - Số quyết định: {{ $chuyen->soquyetdinh_c }} <br>
                            - Ngày ký quyết định: {{ date('d-m-Y') , strtotime($chuyen->ngaykyquyetdinh_c) }} <br>
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
              @break
            @endforeach
          </div>
          <div class="col-6">
            @foreach ($list_quatrinhhoc_thoihoc as $thoihoc)
              @if ($thoihoc->ma_l == $lop_vc->ma_l)
                <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 15%;">
                  THÔI HỌC
                </p>
                <table class="table">
                  <thead class="color_table">
                    <tr>
                      <th class="text-light"  scope="col">Thông tin thôi học</th>
                      <th class="text-light"  scope="col">Thông tin quyết định</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($list_quatrinhhoc_thoihoc as $thoihoc)
                      @if ($thoihoc->ma_l == $lop_vc->ma_l)
                        <tr>
                          <td>
                            - Ngày thôi học: {{ $thoihoc->ngay_th }} <br>
                            - Lý do thôi học: {{ $thoihoc->lydo_th }} <br>
                            @if ($thoihoc->file_th)
                              <a href="{{ asset('public/uploads/thoihoc/'.$thoihoc->file_th) }}" style="color: #000D6B; font-weight: bold">
                                <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                                File xin chuyển
                              </a>
                            @else
                              <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                            @endif
                          </td>
                          <td>
                            - Số quyết định: {{ $thoihoc->soquyetdinh_th }} <br>
                            - Ngày ký quyết định: {{ date('d-m-Y') , strtotime($thoihoc->ngaykyquyetdinh_th) }} <br>
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
              @break
            @endforeach
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
