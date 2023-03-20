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
          <button type="button" class="btn btn-success fw-bold" style="background-color: #81B214; border: #81B214;width: 100%">Lớp học tham gia</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        THÔNG TIN LỚP HỌC VIÊN CHỨC THAM GIA
      </div>
      <div class="row ">
        <div class="mt-3"></div>
        <table class="table" id="mytable">
          <thead class="table-dark">
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Thông tin lớp học</th>
              <th scope="col">Thông tin kết quả</th>
              <th scope="col">Thông tin gia hạn</th>
              <th scope="col">Thông tin tạm dừng</th>
              <th scope="col">Thông tin xin chuyển</th>
              <th scope="col">Thông tin thôi học</th>
            </tr>
          </thead>
          <tbody  >
            @foreach ($list as $key => $lop)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td style="width: 30%">
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
                <td>
                  <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #FFBE0F; border: none; color: black;">
                    <i class="fa-solid fa-square-poll-vertical"></i>
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
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                {{-- <td>
                  <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #FFBE0F; border: none; color: black;">
                    <i class="fa-solid fa-square-poll-vertical"></i>
                    &ensp;
                    Gia hạn
                  </button>
                  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">GIA HẠN</h1>
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
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td> --}}
                <td></td>
                <td></td>
                <td></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection