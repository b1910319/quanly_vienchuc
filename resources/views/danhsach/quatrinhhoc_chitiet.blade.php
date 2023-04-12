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
            <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 8%;">
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
            <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 8%;">
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
            <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 23%;">
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
            <p style="font-weight: bold; border-bottom: 2px solid #E83A14; width: 8%;">
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
@endsection
