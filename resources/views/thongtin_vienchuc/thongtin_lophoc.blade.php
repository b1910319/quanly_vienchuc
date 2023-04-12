@extends('layout')
@section('content')
  <div class="row">
    <div class="col-2 card-box">
      <div class="row">
        <a href="{{ URL::to('thongtin_canhan') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Thông tin viên chức</button>
        </a>
        <a href="{{ URL::to('thongtin_giadinh') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Gia đình</button>
        </a>
        <a href="{{ URL::to('thongtin_bangcap') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Bằng cấp</button>
        </a>
        <a href="{{ URL::to('thongtin_khenthuong') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Khen thưởng</button>
        </a>
        <a href="{{ URL::to('thongtin_kyluat') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Kỷ luật</button>
        </a>
        <a href="{{ URL::to('thongtin_lophoc') }}" class="mt-2">
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Lớp học tham gia</button>
        </a>
        <a href="{{ URL::to('thongtin_quatrinhchucvu') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Qúa trình chức vụ</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light color_alert" role="alert">
        ________THÔNG TIN LỚP HỌC VIÊN CHỨC THAM GIA________
      </div>
      <div class="row ">
        <div class="mt-3"></div>
        <table class="table" id="mytable">
          <thead class="color_table" >
            <tr>
              <th class="text-light" scope="col">STT</th>
              <th class="text-light" scope="col">Thông tin lớp học</th>
              <th class="text-light" scope="col">Thông tin kết quả</th>
              <th class="text-light" scope="col">Thông tin gia hạn</th>
              <th class="text-light" scope="col">Thông tin tạm dừng</th>
              <th class="text-light" scope="col">Thông tin xin chuyển</th>
              <th class="text-light" scope="col">Thông tin thôi học</th>
            </tr>
          </thead>
          <tbody  >
            @foreach ($list as $key => $lop)
              <tr >
                <th scope="row" style="width: 5%;">{{ $key+1 }}</th>
                <td style="width: 21%">
                  <div class="row ">
                    <div class="col-md-12">
                      <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                        style="height: 150px; overflow: auto;">
                        <p>
                          <b> Tên lớp:</b> {{ $lop->ten_l }} <br>
                          <b> Ngày bắt đầu:</b> {{ $lop->ngaybatdau_l }} <br>
                          <b> Ngày kết thúc: </b> {{ $lop->ngayketthuc_l }} <br>
                          <b> Yêu cầu: </b> {{ $lop->yeucau_l }} <br>
                          <b> Tên cơ sở đào tạo: </b> {{ $lop->tencosodaotao_l }} <br>
                          <b> Quốc gia đào tạo: </b> {{ $lop->quocgiaodaotao_l }} <br>
                          <b> Ngành học: </b> {{ $lop->nganhhoc_l }} <br>
                          <b> Trình độ đào tạo: </b> {{ $lop->trinhdodaotao_l }} <br>
                          <b> Nguồn kinh phí: </b> {{ $lop->nguonkinhphi_l }} <br>
                          <b> Địa chỉ đào tạo: </b> {{ $lop->diachidaotao_l }} <br>
                          <b> Nội dung học: </b> {{ $lop->noidunghoc_l }} <br>
                          <b> Email cơ sở: </b> {{ $lop->emailcoso_l }} <br>
                          <b> Số điện thoại cơ sở: </b> {{ $lop->sdtcoso_l }}
                        </p>
                      </div>
                    </div>
                  </div>
                </td>
                <td style="width: 13%;">
                  @php
                    $i = 0;
                  @endphp
                  @foreach ($ketqua as $kq )
                    @if ($ma_vc == $kq->ma_vc && $lop->ma_l == $kq->ma_l )
                      <?php $i++ ?>
                    @endif
                  @endforeach
                  @if ($i == 0)
                    <a href="{{ URL::to('vienchuc_ketqua_add/'.$lop->ma_l) }}">
                      <button type="submit"  class="btn btn-primary button_xanhla" style=" width: 100%;">
                        <i class="fas fa-plus-square text-light"></i>
                        &ensp;
                        Thêm
                      </button>
                    </a>
                  @else
                    <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #FFBE0F; border: none; color: black; width: 100%;">
                      <i class="fa-solid fa-square-poll-vertical "></i>
                      &ensp;
                      Kết quả
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">KẾT QUẢ</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            @foreach ($ketqua as $kq )
                              @if ($ma_vc == $kq->ma_vc && $lop->ma_l == $kq->ma_l )
                                <table class="table">
                                  <tbody>
                                    <tr>
                                      <th scope="row">Tên người hướng dẫn</th>
                                      <td>{{ $kq->tennguoihuongdan_kq }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Email người hướng dẫn</th>
                                      <td>{{ $kq->emailnguoihuongdan_kq }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Nội dung đào tạo</th>
                                      <td>{{ $kq->noidungaotao_kq }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Bằng được cấp</th>
                                      <td>{{ $kq->bangduoccap_kq }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Ngày cấp bằng</th>
                                      <td>{{ $kq->ngaycapbang_kq }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Xếp loại</th>
                                      <td>{{ $kq->xeploai_kq }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Đề tài tốt nghiệp</th>
                                      <td>{{ $kq->detaitotnghiep_kq }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Ngày về nước</th>
                                      <td>{{ $kq->ngayvenuoc_kq }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Đánh giá của cơ sở</th>
                                      <td>{{ $kq->danhgiacuacoso_kq }}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Kiến nghị</th>
                                      <td>{{ $kq->kiennghi_kq }}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              @endif
                            @endforeach
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                              <i class="fa-solid fa-square-xmark text-light"></i>
                              &ensp; Đóng
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endif
                  
                  
                </td>
                <td style="width: 16%;">
                  <a href="{{ URL::to('vienchuc_giahan_add/'.$lop->ma_l) }}">
                    <button type="button"  class="btn btn-primary button_xanhla">
                      <i class="fas fa-plus-square text-light"></i>
                      &ensp;
                      Thêm
                    </button>
                  </a>
                  @foreach ($giahan as $gh )
                    @if ($gh->ma_l == $lop->ma_l && $gh->ma_vc == $lop->ma_vc)
                      <div style="height: 120px" class="mt-1">
                        <b>Thời gian gia hạn: </b> {{ $gh->thoigian_gh }} <br>
                        <b>Lý do gia hạn: </b> {{ $gh->lydo_gh }} <br>
                      </div>
                      @if ($gh->file_gh !=' ')
                        <a href="{{ asset('public/uploads/giahan/'.$gh->file_gh) }}">
                          <button type="button" class="btn btn-warning mt-2 button_do">
                            <i class="fa-solid fa-file text-light"></i>
                            &ensp;
                            File
                          </button>
                        </a>
                      @else
                        Không có file
                      @endif
                    @endif
                  @endforeach
                </td>
                <td style="width: 16%;">
                  <a href="{{ URL::to('vienchuc_dunghoc_add/'.$lop->ma_l) }}">
                    <button type="submit"  class="btn btn-primary button_xanhla">
                      <i class="fas fa-plus-square text-light"></i>
                      &ensp;
                      Thêm
                    </button>
                  </a>
                  @foreach ($dunghoc as $dh )
                    @if ($dh->ma_l == $lop->ma_l && $dh->ma_vc == $lop->ma_vc)
                      <div style="height: 120px" class="mt-1">
                        <b>Thời gian bắt đầu: </b> {{ $dh->batdau_dh }} <br>
                        <b>Thời gian kết thúc: </b> {{ $dh->ketthuc_dh }} <br>
                        <b>Lý do dừng học: </b> {{ $dh->lydo_dh }} <br>
                      </div>
                      @if ($dh->file_dh !=' ')
                        <a href="{{ asset('public/uploads/dunghoc/'.$dh->file_dh) }}">
                          <button type="button" class="btn btn-warning mt-2 button_do">
                            <i class="fa-solid fa-file text-light"></i>
                            &ensp;
                            File
                          </button>
                        </a>
                      @else
                        Không có file
                      @endif
                    @endif
                  @endforeach
                </td>
                <td style="width: 16%;">
                  <a href="{{ URL::to('vienchuc_chuyen_add/'.$lop->ma_l) }}">
                    <button type="submit"  class="btn btn-primary button_xanhla">
                      <i class="fas fa-plus-square text-light"></i>
                      &ensp;
                      Thêm
                    </button>
                  </a>
                  @foreach ($chuyen as $c )
                    @if ($c->ma_l == $lop->ma_l && $c->ma_vc == $lop->ma_vc)
                      <div style="height: 120px" class="mt-1">
                        <b>Nội dung xin chyển: </b> {{ $c->noidung_c }} <br>
                        <b>Lý do xin chuyển: </b> {{ $c->lydo_c }} <br>
                      </div>
                      @if ($c->file_c !=' ')
                        <a href="{{ asset('public/uploads/chuyen/'.$c->file_c) }}">
                          <button type="button" class="btn btn-warning mt-2 button_do">
                            <i class="fa-solid fa-file text-light"></i>
                            &ensp;
                            File
                          </button>
                        </a>
                      @else
                        Không có file
                      @endif
                    @endif
                  @endforeach
                </td>
                <td style="width: 16%;">
                  @php
                    $i = 0;
                  @endphp
                  @foreach ($thoihoc as $th )
                    @if ($th->ma_l == $lop->ma_l && $th->ma_vc == $lop->ma_vc)
                      <?php $i++ ?>
                    @endif
                  @endforeach
                  @if ($i == 0)
                    <a href="{{ URL::to('vienchuc_thoihoc_add/'.$lop->ma_l) }}">
                      <button type="submit"  class="btn btn-primary button_xanhla">
                        <i class="fas fa-plus-square text-light"></i>
                        &ensp;
                        Thêm
                      </button>
                    </a>
                  @else
                    @foreach ($thoihoc as $th )
                      @if ($th->ma_l == $lop->ma_l && $th->ma_vc == $lop->ma_vc)
                        <div style="height: 120px" class="mt-1">
                          <b>Ngày xin thôi học: </b> {{ $th->ngay_th }} <br>
                          <b>Lý do xin thôi học: </b> {{ $th->lydo_th }} <br>
                        </div>
                        @if ($th->file_th !=' ')
                          <a href="{{ asset('public/uploads/thoihoc/'.$th->file_th) }}">
                            <button type="button" class="btn btn-warning mt-2 button_do">
                              <i class="fa-solid fa-file text-light"></i>
                              &ensp;
                              File
                            </button>
                          </a>
                        @else
                          Không có file
                        @endif
                      @endif
                    @endforeach
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection