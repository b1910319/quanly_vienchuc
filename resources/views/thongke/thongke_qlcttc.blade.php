@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-12">
    <div class="row">
      <p class="fw-bold" style="font-size: 18px;">Thống kê quản lý công tác tổ chức </p>
    </div>
    <div class="row">
      <div class="col-1">
        <button type="button" class="btn btn-primary fw-bold button_loc" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100%;">
          <i class="fa-solid fa-filter text-light"></i>
          &ensp;
          Lọc
        </button>
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl ">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="color: #a4aa13;">
                  <i class="fa-solid fa-filter text-light"></i>
                  &ensp;
                  Bộ lọc
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ URL::to('thongke_qlcttc_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <div class="col-6">
                      <input type="radio" class="radio" name="hoanthanh" id="size_1" value="1"/>
                      <label class="label" for="size_1">
                        Hoàn thành khoá học
                      </label>
                    </div>
                    <div class="col-6">
                      <input type="radio" class="radio" name="giahan" id="size_2" value="1"/>
                      <label class="label" for="size_2">
                        Xin gia hạn
                      </label>
                    </div>
                    <div class="col-6">
                      <input type="radio" class="radio" name="tamdung" id="size_3" value="1"/>
                      <label class="label" for="size_3">
                        Xin tạm dừng
                      </label>
                    </div>
                    <div class="col-6">
                      <input type="radio" class="radio" name="xinchuyen" id="size_4" value="1"/>
                      <label class="label" for="size_4">
                        Xin chuyển
                      </label>
                    </div>
                    <div class="col-6">
                      <input type="radio" class="radio" name="thoihoc" id="size_5" value="1"/>
                      <label class="label" for="size_5">
                        Xin thôi học
                      </label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                    <i class="fa-solid fa-square-xmark text-light"></i>
                    &ensp; Đóng
                  </button>
                  <button type="submit" class="btn btn-primary fw-bold button_loc" >
                    <i class="fa-solid fa-filter text-light"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-primary fw-bold button_loc" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="width: 100%;">
          <i class="fa-solid fa-filter text-light"></i>
          &ensp;
          Hoàn thành khoá học
        </button>
        <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="color: #a4aa13;">
                  <i class="fa-solid fa-filter text-light"></i>
                  &ensp;
                  Bộ lọc
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ URL::to('thongke_qlcttc_hoanthanh_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Lớp</span>
                      <div class="mt-1">
                        <select class="custom-select input_table"  name="ma_l">
                          <option value="" >Chọn lớp</option>
                          @foreach ($list_lop as $lop)
                            <option value="{{ $lop->ma_l }}" >{{ $lop->ten_l }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-8">
                      <span style="font-weight: bold; font-size: 20px;">Ngày cấp bằng</span>
                      <div class="row">
                        <div class="col-6 mt-1">
                          <input type='date' class='form-control input_table' autofocus name="batdau_capbang">
                        </div>
                        <div class="col-6 mt-1">
                          <input type='date' class='form-control input_table' autofocus name="ketthuc_capbang">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <span style="font-weight: bold; font-size: 20px;">Ngày về nước</span>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="batdau_venuoc">
                    </div>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="ketthuc_venuoc">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                    <i class="fa-solid fa-square-xmark text-light"></i>
                    &ensp; Đóng
                  </button>
                  <button type="submit" class="btn btn-primary fw-bold button_loc" >
                    <i class="fa-solid fa-filter text-light"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-primary fw-bold button_loc" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="width: 100%;">
          <i class="fa-solid fa-filter text-light"></i>
          &ensp;
          Xin gia hạn
        </button>
        <div class="modal fade " id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="color: #a4aa13;">
                  <i class="fa-solid fa-filter text-light"></i>
                  &ensp;
                  Bộ lọc
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ URL::to('thongke_qlcttc_giahan_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $khoa->created_k }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $khoa->created_k }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Lớp</span>
                      <div class="mt-1">
                        <select class="custom-select input_table"  name="ma_l">
                          <option value="" >Chọn lớp</option>
                          @foreach ($list_lop as $lop)
                            <option value="{{ $lop->ma_l }}" >{{ $lop->ten_l }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-8">
                      <span style="font-weight: bold; font-size: 20px;">Thời gian gia hạn</span>
                      <div class="row">
                        <div class="col-6 mt-1">
                          <input type='date' class='form-control input_table' autofocus name="batdau_giahan">
                        </div>
                        <div class="col-6 mt-1">
                          <input type='date' class='form-control input_table' autofocus name="ketthuc_giahan">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                    <i class="fa-solid fa-square-xmark text-light"></i>
                    &ensp; Đóng
                  </button>
                  <button type="submit" class="btn btn-primary fw-bold button_loc" >
                    <i class="fa-solid fa-filter text-light"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-primary fw-bold button_loc" data-bs-toggle="modal" data-bs-target="#exampleModal3" style="width: 100%;">
          <i class="fa-solid fa-filter text-light"></i>
          &ensp;
          Xin tạm dừng
        </button>
        <div class="modal fade " id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="color: #a4aa13;">
                  <i class="fa-solid fa-filter text-light"></i>
                  &ensp;
                  Bộ lọc
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ URL::to('thongke_qlcttc_dunghoc_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $khoa->created_k.$khoa->ma_k }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $khoa->created_k.$khoa->ma_k }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Lớp</span>
                      <div class="mt-1">
                        <select class="custom-select input_table"  name="ma_l">
                          <option value="" >Chọn lớp</option>
                          @foreach ($list_lop as $lop)
                            <option value="{{ $lop->ma_l }}" >{{ $lop->ten_l }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-8">
                      <span style="font-weight: bold; font-size: 20px;">Thời gian gia hạn</span>
                      <div class="row">
                        <div class="col-6 mt-1">
                          <input type='date' class='form-control input_table' autofocus name="batdau_dunghoc">
                        </div>
                        <div class="col-6 mt-1">
                          <input type='date' class='form-control input_table' autofocus name="ketthuc_dunghoc">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                    <i class="fa-solid fa-square-xmark text-light"></i>
                    &ensp; Đóng
                  </button>
                  <button type="submit" class="btn btn-primary fw-bold button_loc" >
                    <i class="fa-solid fa-filter text-light"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-primary fw-bold button_loc" data-bs-toggle="modal" data-bs-target="#exampleModal4" style="width: 100%;">
          <i class="fa-solid fa-filter text-light"></i>
          &ensp;
          Xin chuyển
        </button>
        <div class="modal fade " id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="color: #a4aa13;">
                  <i class="fa-solid fa-filter text-light"></i>
                  &ensp;
                  Bộ lọc
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ URL::to('thongke_qlcttc_xinchuyen_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $khoa->created_k.$khoa->ma_k.$khoa->status_k }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $khoa->created_k.$khoa->ma_k.$khoa->status_k }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Lớp</span>
                      <div class="mt-1">
                        <select class="custom-select input_table"  name="ma_l">
                          <option value="" >Chọn lớp</option>
                          @foreach ($list_lop as $lop)
                            <option value="{{ $lop->ma_l }}" >{{ $lop->ten_l }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                    <i class="fa-solid fa-square-xmark text-light"></i>
                    &ensp; Đóng
                  </button>
                  <button type="submit" class="btn btn-primary fw-bold button_loc" >
                    <i class="fa-solid fa-filter text-light"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-primary fw-bold button_loc" data-bs-toggle="modal" data-bs-target="#exampleModal5" style="width: 100%;">
          <i class="fa-solid fa-filter text-light"></i>
          &ensp;
          Xin thôi học
        </button>
        <div class="modal fade " id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="color: #a4aa13;">
                  <i class="fa-solid fa-filter text-light"></i>
                  &ensp;
                  Bộ lọc
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ URL::to('thongke_qlcttc_thoihoc_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $khoa->ma_k.$khoa->status_k }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $khoa->ma_k.$khoa->status_k }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Lớp</span>
                      <div class="mt-1">
                        <select class="custom-select input_table"  name="ma_l">
                          <option value="" >Chọn lớp</option>
                          @foreach ($list_lop as $lop)
                            <option value="{{ $lop->ma_l }}" >{{ $lop->ten_l }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-8">
                      <span style="font-weight: bold; font-size: 20px;">Thời gian thôi học</span>
                      <div class="row">
                        <div class="col-6 mt-1">
                          <input type='date' class='form-control input_table' autofocus name="batdau_thoihoc">
                        </div>
                        <div class="col-6 mt-1">
                          <input type='date' class='form-control input_table' autofocus name="ketthuc_thoihoc">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                    <i class="fa-solid fa-square-xmark text-light"></i>
                    &ensp; Đóng
                  </button>
                  <button type="submit" class="btn btn-primary fw-bold button_loc" >
                    <i class="fa-solid fa-filter text-light"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-1">
        <a href="{{ URL::to('thongke_qlcttc') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%; ">
            <i class="fa-solid fa-rotate"></i>
          </button>
        </a>
      </div>
    </div>
    <div class="music-waves mt-3">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
    <div id="myfirstchart_qlcttc" style="height: 250px;">
    </div>
    @if (isset($list_1))
      <div class="alert alert-light color_alert" role="alert">
        ________DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC________
      </div>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Kết quả</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_1 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              @foreach ($list_khoa as $khoa  )
                @if ($khoa->ma_k == $vc->ma_k)
                  <td>{{ $khoa->ten_k }}</td>
                @endif
              @endforeach
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên người hướng dẫn:</b> {{ $vc->tennguoihuongdan_kq }} <br>
                        <b> Email người hướng dẫn:</b> {{ $vc->emailnguoihuongdan_kq }} <br>
                        <b> Nội dung đào tạo: </b> {{ $vc->noidungaotao_kq }} <br>
                        <b> Bằng được cấp: </b> {{ $vc->bangduoccap_kq }} <br>
                        <b> Ngày cấp bằng : </b> {{ $vc->ngaycapbang_kq }} <br>
                        <b> Xếp loại: </b> {{ $vc->xeploai_kq }} <br>
                        <b> Đề tài tốt nghiệp: </b> {{ $vc->detaitotnghiep_kq }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_1_pdf') }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_1_excel') }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_all))
      <div class="alert alert-light color_alert" role="alert">
        ________DANH SÁCH VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Hoàn thành khoá học</span>
        ,
        <span class="badge text-bg-secondary">Xin gia hạn</span>
        ,
        <span class="badge text-bg-success">Xin tạm dừng</span>
        ,
        <span class="badge text-bg-danger">Xin chuyển</span>
        ,
        <span class="badge text-bg-warning">Xin thôi học</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_all as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_loc_all_pdf') }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_loc_all_excel') }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_hoanthanh))
      <div class="alert alert-light color_alert" role="alert">
        ________DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Hoàn thành khoá học</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Kết quả</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_hoanthanh as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên người hướng dẫn:</b> {{ $vc->tennguoihuongdan_kq }} <br>
                        <b> Email người hướng dẫn:</b> {{ $vc->emailnguoihuongdan_kq }} <br>
                        <b> Nội dung đào tạo: </b> {{ $vc->noidungaotao_kq }} <br>
                        <b> Bằng được cấp: </b> {{ $vc->bangduoccap_kq }} <br>
                        <b> Ngày cấp bằng : </b> {{ $vc->ngaycapbang_kq }} <br>
                        <b> Xếp loại: </b> {{ $vc->xeploai_kq }} <br>
                        <b> Đề tài tốt nghiệp: </b> {{ $vc->detaitotnghiep_kq }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_hoanthanh_pdf') }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_hoanthanh_excel') }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_giahan))
      <div class="alert alert-light color_alert" role="alert">
        ________DANH SÁCH VIÊN CHỨC XIN GIA HẠN________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Xin gia hạn</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Gia hạn</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_giahan as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian gia hạn:</b> {{ $vc->thoigian_gh }} <br>
                        <b> Lý do xin gia hạn:</b> {{ $vc->lydo_gh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_giahan_pdf') }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_giahan_excel') }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_dunghoc))
      <div class="alert alert-light color_alert" role="alert">
        ________DANH SÁCH VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Xin tạm dừng</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin dừng học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_dunghoc as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian bắt đầu dừng:</b> {{ $vc->batdau_dh }} <br>
                        <b> Thời gian kết thúc dừng:</b> {{ $vc->ketthuc_dh }} <br>
                        <b> Lý do xin xin dừng:</b> {{ $vc->lydo_dh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_dunghoc_pdf') }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_dunghoc_excel') }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_chuyen))
      <div class="alert alert-light color_alert" role="alert">
        ________DANH SÁCH VIÊN CHỨC XIN CHUYỂN NƯỚC, NGÀNH HỌC, TRƯỜNG....________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Xin chuyển</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin chuyển</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_chuyen as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Nội dung xin chuyển:</b> {{ $vc->noidung_c }} <br>
                        <b> Lý do xin chuyển:</b> {{ $vc->lydo_c }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_chuyen_pdf') }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_chuyen_excel') }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_thoihoc))
      <div class="alert alert-light color_alert" role="alert">
        ________DANH SÁCH VIÊN CHỨC XIN THÔI HỌC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Xin thôi học</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin thôi học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_thoihoc as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Ngày thôi học:</b> {{ $vc->ngay_th }} <br>
                        <b> Lý do xin thôi học:</b> {{ $vc->lydo_th }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_thoihoc_pdf') }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_loc_thoihoc_excel') }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif

    @if (isset($list_hoanthanh_all))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        ngày cấp bằng
        <span class="badge text-bg-secondary">{{ $batdau_capbang }}</span>
        <span class="badge text-bg-success">{{ $ketthuc_capbang }}</span>
        ,
        ngày về nước 
        <span class="badge text-bg-danger">{{ $batdau_venuoc }}</span>
        <span class="badge text-bg-warning">{{ $ketthuc_venuoc }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin kết quả</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_hoanthanh_all as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên người hướng dẫn:</b> {{ $vc->tennguoihuongdan_kq }} <br>
                        <b> Email người hướng dẫn:</b> {{ $vc->emailnguoihuongdan_kq }} <br>
                        <b> Bằng được cấp:</b> {{ $vc->bangduoccap_kq }} <br>
                        <b> Ngày cấp bằng:</b> {{ $vc->ngaycapbang_kq }} <br>
                        <b> Xếp loại:</b> {{ $vc->xeploai_kq }} <br>
                        <b> Ngày về nước:</b> {{ $vc->ngayvenuoc_kq }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_all_pdf/'.$ma_l.'/'.$batdau_capbang.'/'.$ketthuc_capbang.'/'.$batdau_venuoc.'/'.$ketthuc_venuoc) }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_all_excel/'.$ma_l.'/'.$batdau_capbang.'/'.$ketthuc_capbang.'/'.$batdau_venuoc.'/'.$ketthuc_venuoc) }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_hoanthanh_2))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        ngày cấp bằng
        <span class="badge text-bg-primary">{{ $batdau_capbang }}</span>
        <span class="badge text-bg-secondary">{{ $ketthuc_capbang }}</span>
        ,
        ngày về nước 
        <span class="badge text-bg-success">{{ $batdau_venuoc }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_venuoc }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin kết quả</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_hoanthanh_2 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên người hướng dẫn:</b> {{ $vc->tennguoihuongdan_kq }} <br>
                        <b> Email người hướng dẫn:</b> {{ $vc->emailnguoihuongdan_kq }} <br>
                        <b> Bằng được cấp:</b> {{ $vc->bangduoccap_kq }} <br>
                        <b> Ngày cấp bằng:</b> {{ $vc->ngaycapbang_kq }} <br>
                        <b> Xếp loại:</b> {{ $vc->xeploai_kq }} <br>
                        <b> Ngày về nước:</b> {{ $vc->ngayvenuoc_kq }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_2_pdf/'.$batdau_capbang.'/'.$ketthuc_capbang.'/'.$batdau_venuoc.'/'.$ketthuc_venuoc) }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_2_excel/'.$batdau_capbang.'/'.$ketthuc_capbang.'/'.$batdau_venuoc.'/'.$ketthuc_venuoc) }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_hoanthanh_3))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        ngày về nước 
        <span class="badge text-bg-danger">{{ $batdau_venuoc }}</span>
        <span class="badge text-bg-warning">{{ $ketthuc_venuoc }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin kết quả</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_hoanthanh_3 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên người hướng dẫn:</b> {{ $vc->tennguoihuongdan_kq }} <br>
                        <b> Email người hướng dẫn:</b> {{ $vc->emailnguoihuongdan_kq }} <br>
                        <b> Bằng được cấp:</b> {{ $vc->bangduoccap_kq }} <br>
                        <b> Ngày cấp bằng:</b> {{ $vc->ngaycapbang_kq }} <br>
                        <b> Xếp loại:</b> {{ $vc->xeploai_kq }} <br>
                        <b> Ngày về nước:</b> {{ $vc->ngayvenuoc_kq }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_3_pdf/'.$ma_l.'/'.$batdau_venuoc.'/'.$ketthuc_venuoc) }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_3_excel/'.$ma_l.'/'.$batdau_venuoc.'/'.$ketthuc_venuoc) }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_hoanthanh_4))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        ngày cấp bằng
        <span class="badge text-bg-danger">{{ $batdau_capbang }}</span>
        <span class="badge text-bg-warning">{{ $ketthuc_capbang }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin kết quả</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_hoanthanh_4 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên người hướng dẫn:</b> {{ $vc->tennguoihuongdan_kq }} <br>
                        <b> Email người hướng dẫn:</b> {{ $vc->emailnguoihuongdan_kq }} <br>
                        <b> Bằng được cấp:</b> {{ $vc->bangduoccap_kq }} <br>
                        <b> Ngày cấp bằng:</b> {{ $vc->ngaycapbang_kq }} <br>
                        <b> Xếp loại:</b> {{ $vc->xeploai_kq }} <br>
                        <b> Ngày về nước:</b> {{ $vc->ngayvenuoc_kq }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_4_pdf/'.$ma_l.'/'.$batdau_capbang.'/'.$ketthuc_capbang) }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_4_excel/'.$ma_l.'/'.$batdau_capbang.'/'.$ketthuc_capbang) }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_hoanthanh_5))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin kết quả</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_hoanthanh_5 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên người hướng dẫn:</b> {{ $vc->tennguoihuongdan_kq }} <br>
                        <b> Email người hướng dẫn:</b> {{ $vc->emailnguoihuongdan_kq }} <br>
                        <b> Bằng được cấp:</b> {{ $vc->bangduoccap_kq }} <br>
                        <b> Ngày cấp bằng:</b> {{ $vc->ngaycapbang_kq }} <br>
                        <b> Xếp loại:</b> {{ $vc->xeploai_kq }} <br>
                        <b> Ngày về nước:</b> {{ $vc->ngayvenuoc_kq }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_5_pdf/'.$ma_l) }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_5_excel/'.$ma_l) }}">
            <button type="button" class="btn btn-warning button_xanhla" style="width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_hoanthanh_6))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        ngày cấp bằng
        <span class="badge text-bg-danger">{{ $batdau_capbang }}</span>
        <span class="badge text-bg-warning">{{ $ketthuc_capbang }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin kết quả</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_hoanthanh_6 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên người hướng dẫn:</b> {{ $vc->tennguoihuongdan_kq }} <br>
                        <b> Email người hướng dẫn:</b> {{ $vc->emailnguoihuongdan_kq }} <br>
                        <b> Bằng được cấp:</b> {{ $vc->bangduoccap_kq }} <br>
                        <b> Ngày cấp bằng:</b> {{ $vc->ngaycapbang_kq }} <br>
                        <b> Xếp loại:</b> {{ $vc->xeploai_kq }} <br>
                        <b> Ngày về nước:</b> {{ $vc->ngayvenuoc_kq }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_6_pdf/'.$batdau_capbang.'/'.$ketthuc_capbang) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_hoanthanh_7))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        ngày về nước
        <span class="badge text-bg-danger">{{ $batdau_venuoc }}</span>
        <span class="badge text-bg-warning">{{ $ketthuc_venuoc }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin kết quả</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_hoanthanh_7 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên người hướng dẫn:</b> {{ $vc->tennguoihuongdan_kq }} <br>
                        <b> Email người hướng dẫn:</b> {{ $vc->emailnguoihuongdan_kq }} <br>
                        <b> Bằng được cấp:</b> {{ $vc->bangduoccap_kq }} <br>
                        <b> Ngày cấp bằng:</b> {{ $vc->ngaycapbang_kq }} <br>
                        <b> Xếp loại:</b> {{ $vc->xeploai_kq }} <br>
                        <b> Ngày về nước:</b> {{ $vc->ngayvenuoc_kq }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_hoanthanh_loc_7_pdf/'.$batdau_venuoc.'/'.$ketthuc_venuoc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif

    @if (isset($list_giahan_all))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN GIA HẠN KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-secondary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ngày gia hạn
        <span class="badge text-bg-success">{{ $batdau_giahan }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_giahan }}</span>
        ,
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin gia hạn</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_giahan_all as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian gia hạn:</b> {{ $vc->thoigian_gh }} <br>
                        <b> Lý do gia hạn:</b> {{ $vc->lydo_gh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_loc_all_pdf/'.$ma_k.'/'.$ma_l.'/'.$batdau_giahan.'/'.$ketthuc_giahan) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_giahan_2))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN GIA HẠN KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        ngày gia hạn
        <span class="badge text-bg-success">{{ $batdau_giahan }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_giahan }}</span>
        ,
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin gia hạn</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_giahan_2 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian gia hạn:</b> {{ $vc->thoigian_gh }} <br>
                        <b> Lý do gia hạn:</b> {{ $vc->lydo_gh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_loc_2_pdf/'.$ma_l.'/'.$batdau_giahan.'/'.$ketthuc_giahan) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_giahan_3))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN GIA HẠN KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ngày gia hạn
        <span class="badge text-bg-success">{{ $batdau_giahan }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_giahan }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin gia hạn</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_giahan_3 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian gia hạn:</b> {{ $vc->thoigian_gh }} <br>
                        <b> Lý do gia hạn:</b> {{ $vc->lydo_gh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_loc_3_pdf/'.$ma_k.'/'.$batdau_giahan.'/'.$ketthuc_giahan) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_giahan_4))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN GIA HẠN KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-success">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin gia hạn</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_giahan_4 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian gia hạn:</b> {{ $vc->thoigian_gh }} <br>
                        <b> Lý do gia hạn:</b> {{ $vc->lydo_gh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_loc_4_pdf/'.$ma_k.'/'.$ma_l) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_giahan_5))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN GIA HẠN KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin gia hạn</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_giahan_5 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian gia hạn:</b> {{ $vc->thoigian_gh }} <br>
                        <b> Lý do gia hạn:</b> {{ $vc->lydo_gh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_loc_5_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_giahan_6))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN GIA HẠN KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin gia hạn</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_giahan_6 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian gia hạn:</b> {{ $vc->thoigian_gh }} <br>
                        <b> Lý do gia hạn:</b> {{ $vc->lydo_gh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_loc_6_pdf/'.$ma_l) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_giahan_7))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN GIA HẠN KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        ngày gia hạn
        <span class="badge text-bg-success">{{ $batdau_giahan }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_giahan }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin gia hạn</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_giahan_7 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian gia hạn:</b> {{ $vc->thoigian_gh }} <br>
                        <b> Lý do gia hạn:</b> {{ $vc->lydo_gh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_giahan_loc_7_pdf/'.$batdau_giahan.'/'.$ketthuc_giahan) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif

    @if (isset($list_dunghoc_all))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-secondary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ngày bắt đầu xin dừng
        <span class="badge text-bg-success">{{ $batdau_dunghoc }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_dunghoc }}</span>
        ,
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin tạm dừng học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_dunghoc_all as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian bắt:</b> {{ $vc->batdau_dh }} <br>
                        <b> Thời gian kết thuc:</b> {{ $vc->ketthuc_dh }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_dh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_dunghoc_loc_all_pdf/'.$ma_k.'/'.$ma_l.'/'.$batdau_dunghoc.'/'.$ketthuc_dunghoc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_dunghoc_2))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        ngày tạm dừng
        <span class="badge text-bg-success">{{ $batdau_dunghoc }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_dunghoc }}</span>
        ,
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin tạm dừng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_dunghoc_2 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian bắt:</b> {{ $vc->batdau_dh }} <br>
                        <b> Thời gian kết thuc:</b> {{ $vc->ketthuc_dh }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_dh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_dunghoc_loc_2_pdf/'.$ma_l.'/'.$batdau_dunghoc.'/'.$ketthuc_dunghoc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_dunghoc_3))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ngày tạm dừng
        <span class="badge text-bg-success">{{ $batdau_dunghoc }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_dunghoc }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin tạm dừng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_dunghoc_3 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian bắt:</b> {{ $vc->batdau_dh }} <br>
                        <b> Thời gian kết thuc:</b> {{ $vc->ketthuc_dh }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_dh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_dunghoc_loc_3_pdf/'.$ma_k.'/'.$batdau_dunghoc.'/'.$ketthuc_dunghoc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_dunghoc_4))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-success">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin tạm dừng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_dunghoc_4 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian bắt:</b> {{ $vc->batdau_dh }} <br>
                        <b> Thời gian kết thuc:</b> {{ $vc->ketthuc_dh }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_dh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_dunghoc_loc_4_pdf/'.$ma_k.'/'.$ma_l) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_dunghoc_5))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin tạm dừng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_dunghoc_5 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian bắt:</b> {{ $vc->batdau_dh }} <br>
                        <b> Thời gian kết thuc:</b> {{ $vc->ketthuc_dh }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_dh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_dunghoc_loc_5_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_dunghoc_6))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin tạm dừng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_dunghoc_6 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian bắt:</b> {{ $vc->batdau_dh }} <br>
                        <b> Thời gian kết thuc:</b> {{ $vc->ketthuc_dh }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_dh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_dunghoc_loc_6_pdf/'.$ma_l) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_dunghoc_7))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        ngày tạm dừng
        <span class="badge text-bg-success">{{ $batdau_dunghoc }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_dunghoc }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin tạm dừng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_dunghoc_7 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Thời gian bắt:</b> {{ $vc->batdau_dh }} <br>
                        <b> Thời gian kết thuc:</b> {{ $vc->ketthuc_dh }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_dh }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_dunghoc_loc_7_pdf/'.$batdau_dunghoc.'/'.$ketthuc_dunghoc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif

    @if (isset($list_chuyen_all))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN CHUYỂN NƯỚC, TRƯỜNG, NGÀNH HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-secondary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin chuyển nước, ngành học ...</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_chuyen_all as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Nội dung chuyển:</b> {{ $vc->noidung_c }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_c }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_chuyen_loc_all_pdf/'.$ma_k.'/'.$ma_l) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_chuyen_2))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN CHUYỂN NƯỚC, TRƯỜNG, NGÀNH HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin chuyển nước, ngành học ...</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_chuyen_2 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Nội dung chuyển:</b> {{ $vc->noidung_c }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_c }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_chuyen_loc_2_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_chuyen_3))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN CHUYỂN NƯỚC, TRƯỜNG, NGÀNH HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin chuyển nước, ngành học ...</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_chuyen_3 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Nội dung chuyển:</b> {{ $vc->noidung_c }} <br>
                        <b> Lý do:</b> {{ $vc->lydo_c }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_chuyen_loc_3_pdf/'.$ma_l) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif

    @if (isset($list_thoihoc_all))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN THÔI HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-secondary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ngày thôi học
        <span class="badge text-bg-success">{{ $batdau_thoihoc }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_thoihoc }}</span>
        ,
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin thôi học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_thoihoc_all as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Ngày thôi học:</b> {{ $vc->ngay_th }} <br>
                        <b> Lý do thôi học:</b> {{ $vc->lydo_th }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_thoihoc_loc_all_pdf/'.$ma_k.'/'.$ma_l.'/'.$batdau_thoihoc.'/'.$ketthuc_thoihoc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_thoihoc_2))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN THÔI HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
        ngày thôi học
        <span class="badge text-bg-success">{{ $batdau_thoihoc }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_thoihoc }}</span>
        ,
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin thôi học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_thoihoc_2 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Ngày thôi học:</b> {{ $vc->ngay_th }} <br>
                        <b> Lý do thôi học:</b> {{ $vc->lydo_th }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_thoihoc_loc_2_pdf/'.$ma_l.'/'.$batdau_thoihoc.'/'.$ketthuc_thoihoc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_thoihoc_3))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN THÔI HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ngày thôi học
        <span class="badge text-bg-success">{{ $batdau_thoihoc }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_thoihoc }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin thôi học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_thoihoc_3 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Ngày thôi học:</b> {{ $vc->ngay_th }} <br>
                        <b> Lý do thôi học:</b> {{ $vc->lydo_th }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_thoihoc_loc_3_pdf/'.$ma_k.'/'.$batdau_thoihoc.'/'.$ketthuc_thoihoc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_thoihoc_4))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN THÔI HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-success">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin thôi học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_thoihoc_4 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Ngày thôi học:</b> {{ $vc->ngay_th }} <br>
                        <b> Lý do thôi học:</b> {{ $vc->lydo_th }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_thoihoc_loc_4_pdf/'.$ma_k.'/'.$ma_l) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_thoihoc_5))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN THÔI HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin thôi học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_thoihoc_5 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Ngày thôi học:</b> {{ $vc->ngay_th }} <br>
                        <b> Lý do thôi học:</b> {{ $vc->lydo_th }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_thoihoc_loc_5_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_thoihoc_6))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN THÔI HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_lop as $lop )
          @if ($lop->ma_l == $ma_l)
          <span class="badge text-bg-primary">{{ $lop->ten_l }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin thôi học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_thoihoc_6 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Ngày thôi học:</b> {{ $vc->ngay_th }} <br>
                        <b> Lý do thôi học:</b> {{ $vc->lydo_th }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_thoihoc_loc_6_pdf/'.$ma_l) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_thoihoc_7))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN THÔI HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        ngày thôi học
        <span class="badge text-bg-success">{{ $batdau_thoihoc }}</span>
        <span class="badge text-bg-danger">{{ $ketthuc_thoihoc }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin lớp</th>
            <th class="text-light" scope="col">Thông tin xin thôi học</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_thoihoc_7 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      @foreach ($list_vienchuc as $vienchuc )
                        @if ($vienchuc->ma_vc == $vc->ma_vc)
                          <p>
                            <b> Tên viên chức:</b> {{ $vienchuc->hoten_vc }} <br>
                            <b> Số điện thoại:</b> {{ $vienchuc->sdt_vc }} <br>
                            <b> Email: </b> {{ $vienchuc->user_vc }} <br>
                            <b> Ngày sinh: </b> {{ $vienchuc->ngaysinh_vc }} <br>
                            <b> Giới tính: </b>
                            @if ($vienchuc->giotinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                            <br>
                            <b> Địa chỉ hiện tại: </b> {{ $vienchuc->hientai_vc }} <br>
                            <b> Địa chỉ thường trú: </b> {{ $vienchuc->thuongtru_vc }} <br>
                            <b> Trình độ phổ thông: </b> {{ $vienchuc->trinhdophothong_vc }} <br>
                            <b> Ngoại ngữ: </b> {{ $vienchuc->ngoaingu_vc }} <br>
                            <b> Tin học: </b> {{ $vienchuc->tinhoc_vc }} <br>
                            <b> Ngày vào đảng: </b> {{ $vienchuc->ngayvaodang_vc }} <br>
                            <b> Ngày chính thức: </b> {{ $vienchuc->ngaychinhthuc_vc }} <br>
                            <b> Ngày bắt đầu làm việc: </b> {{ $vienchuc->ngaybatdaulamviec_vc }} <br>
                            <b> Chức vụ: </b> {{ $vienchuc->ten_cv }} <br>
                            <b> Dân tộc: </b> {{ $vienchuc->ten_dt }} <br>
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }}
                          </p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $vc->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $vc->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $vc->ngayketthuc_l }} <br>
                        <b> Cơ sở đào tạo: </b> {{ $vc->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $vc->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $vc->nganhhoc_l }} <br>
                        <b> Địa chỉ cơ sở: </b> {{ $vc->diachidaotao_l }} <br>
                        <b> Email: </b> {{ $vc->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $vc->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Ngày thôi học:</b> {{ $vc->ngay_th }} <br>
                        <b> Lý do thôi học:</b> {{ $vc->lydo_th }}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlcttc_thoihoc_loc_7_pdf/'.$batdau_thoihoc.'/'.$ketthuc_thoihoc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
  </div>
</div>
<script>
  $(document).ready(function(){
    new Morris.Bar({
      element: 'myfirstchart_qlcttc',
      parseTime: false,
      hideHover:true,
      barColors: ['#379237'],
      data: [
        <?php
          if(isset($count_1) ){
            foreach ($count_1 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_hoanthanh) ){
            foreach ($count_hoanthanh as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_giahan) ){
            foreach ($count_giahan as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_dunghoc) ){
            foreach ($count_dunghoc as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_chuyen) ){
            foreach ($count_chuyen as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_thoihoc) ){
            foreach ($count_thoihoc as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_hoanthanh_all) ){
            foreach ($count_hoanthanh_all as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_hoanthanh_2) ){
            foreach ($count_hoanthanh_2 as $key => $count){
              $ngaycapbang_kq = $count->ngaycapbang_kq;
              $tong = $count->sum;
              echo "{ year: '$ngaycapbang_kq', value: $tong },";
            }
          }else if(isset($count_hoanthanh_3) ){
            foreach ($count_hoanthanh_3 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ngayvenuoc_kq = $count->ngayvenuoc_kq;
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l ($ngayvenuoc_kq)', value: $tong },";
                }
              }
            }
          }else if(isset($count_hoanthanh_4) ){
            foreach ($count_hoanthanh_4 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ngaycapbang_kq = $count->ngaycapbang_kq;
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l ($ngaycapbang_kq)', value: $tong },";
                }
              }
            }
          }else if(isset($count_hoanthanh_5) ){
            foreach ($count_hoanthanh_5 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_hoanthanh_6) ){
            foreach ($count_hoanthanh_6 as $key => $count){
              $ngaycapbang_kq = $count->ngaycapbang_kq;
              $tong = $count->sum;
              echo "{ year: '$ngaycapbang_kq', value: $tong },";
            }
          }else if(isset($count_hoanthanh_7) ){
            foreach ($count_hoanthanh_7 as $key => $count){
              $ngayvenuoc_kq = $count->ngayvenuoc_kq;
              $tong = $count->sum;
              echo "{ year: '$ngayvenuoc_kq', value: $tong },";
            }
          }else if(isset($count_giahan_all) ){
            foreach ($count_giahan_all as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_giahan_2) ){
            foreach ($count_giahan_2 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  $thoigian_gh = $count->thoigian_gh;
                  echo "{ year: '$ten_l ($thoigian_gh)', value: $tong },";
                }
              }
            }
          }else if(isset($count_giahan_3) ){
            foreach ($count_giahan_3 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  $thoigian_gh = $count->thoigian_gh;
                  echo "{ year: '$ten_k ($thoigian_gh)', value: $tong },";
                }
              }
            }
          }else if(isset($count_giahan_4) ){
            foreach ($count_giahan_4 as $key => $count){
              foreach($list_lop as $key => $lop){
                foreach($list_khoa as $key => $khoa){
                  if($count->ma_l == $lop->ma_l && $count->ma_k == $khoa->ma_k){
                    $ten_l = $lop->ten_l;
                    $ten_k = $khoa->ten_k;
                    $tong = $count->sum;
                    echo "{ year: '$ten_l ($ten_k)', value: $tong },";
                  }
                }
              }
            }
          }else if(isset($count_giahan_5) ){
            foreach ($count_giahan_5 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                  if( $count->ma_k == $khoa->ma_k){
                    $ten_k = $khoa->ten_k;
                    $tong = $count->sum;
                    echo "{ year: '$ten_k', value: $tong },";
                  }
                }
            }
          }else if(isset($count_giahan_6) ){
            foreach ($count_giahan_6 as $key => $count){
              foreach($list_lop as $key => $lop){
                  if( $count->ma_l == $lop->ma_l){
                    $ten_l = $lop->ten_l;
                    $tong = $count->sum;
                    echo "{ year: '$ten_l', value: $tong },";
                  }
                }
            }
          }else if(isset($count_giahan_7) ){
            foreach ($count_giahan_7 as $key => $count){
              $thoigian_gh = $count->thoigian_gh;
              $tong = $count->sum;
              echo "{ year: '$thoigian_gh', value: $tong },";
            }
          }else if(isset($count_dunghoc_all) ){
            foreach ($count_dunghoc_all as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_dunghoc_2) ){
            foreach ($count_dunghoc_2 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  $batdau_dh = $count->batdau_dh;
                  echo "{ year: '$ten_l ($batdau_dh)', value: $tong },";
                }
              }
            }
          }else if(isset($count_dunghoc_3) ){
            foreach ($count_dunghoc_3 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  $batdau_dh = $count->batdau_dh;
                  echo "{ year: '$ten_k ($batdau_dh)', value: $tong },";
                }
              }
            }
          }else if(isset($count_dunghoc_4) ){
            foreach ($count_dunghoc_4 as $key => $count){
              foreach($list_lop as $key => $lop){
                foreach($list_khoa as $key => $khoa){
                  if($count->ma_l == $lop->ma_l && $count->ma_k == $khoa->ma_k){
                    $ten_l = $lop->ten_l;
                    $ten_k = $khoa->ten_k;
                    $tong = $count->sum;
                    echo "{ year: '$ten_l ($ten_k)', value: $tong },";
                  }
                }
              }
            }
          }else if(isset($count_dunghoc_5) ){
            foreach ($count_dunghoc_5 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                  if( $count->ma_k == $khoa->ma_k){
                    $ten_k = $khoa->ten_k;
                    $tong = $count->sum;
                    echo "{ year: '$ten_k', value: $tong },";
                  }
                }
            }
          }else if(isset($count_dunghoc_6) ){
            foreach ($count_dunghoc_6 as $key => $count){
              foreach($list_lop as $key => $lop){
                  if( $count->ma_l == $lop->ma_l){
                    $ten_l = $lop->ten_l;
                    $tong = $count->sum;
                    echo "{ year: '$ten_l', value: $tong },";
                  }
                }
            }
          }else if(isset($count_dunghoc_7) ){
            foreach ($count_dunghoc_7 as $key => $count){
              $batdau_dh = $count->batdau_dh;
              $tong = $count->sum;
              echo "{ year: '$batdau_dh', value: $tong },";
            }
          }else if(isset($count_chuyen_all) ){
            foreach ($count_chuyen_all as $key => $count){
              foreach($list_lop as $key => $lop){
                foreach($list_khoa as $key => $khoa){
                  if($count->ma_l == $lop->ma_l && $count->ma_k == $khoa->ma_k){
                    $ten_l = $lop->ten_l;
                    $ten_k = $khoa->ten_k;
                    $tong = $count->sum;
                    echo "{ year: '$ten_l ($ten_k)', value: $tong },";
                  }
                }
                
              }
            }
          }else if(isset($count_chuyen_2) ){
            foreach ($count_chuyen_2 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }else if(isset($count_chuyen_3) ){
            foreach ($count_chuyen_3 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_thoihoc_all) ){
            foreach ($count_thoihoc_all as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if(isset($count_thoihoc_2) ){
            foreach ($count_thoihoc_2 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  $ngay_th = $count->ngay_th;
                  echo "{ year: '$ten_l ($ngay_th)', value: $tong },";
                }
              }
            }
          }else if(isset($count_thoihoc_3) ){
            foreach ($count_thoihoc_3 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  $ngay_th = $count->ngay_th;
                  echo "{ year: '$ten_k ($ngay_th)', value: $tong },";
                }
              }
            }
          }else if(isset($count_thoihoc_4) ){
            foreach ($count_thoihoc_4 as $key => $count){
              foreach($list_lop as $key => $lop){
                foreach($list_khoa as $key => $khoa){
                  if($count->ma_l == $lop->ma_l && $count->ma_k == $khoa->ma_k){
                    $ten_l = $lop->ten_l;
                    $ten_k = $khoa->ten_k;
                    $tong = $count->sum;
                    echo "{ year: '$ten_l ($ten_k)', value: $tong },";
                  }
                }
              }
            }
          }else if(isset($count_thoihoc_5) ){
            foreach ($count_thoihoc_5 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                  if( $count->ma_k == $khoa->ma_k){
                    $ten_k = $khoa->ten_k;
                    $tong = $count->sum;
                    echo "{ year: '$ten_k', value: $tong },";
                  }
                }
            }
          }else if(isset($count_thoihoc_6) ){
            foreach ($count_thoihoc_6 as $key => $count){
              foreach($list_lop as $key => $lop){
                  if( $count->ma_l == $lop->ma_l){
                    $ten_l = $lop->ten_l;
                    $tong = $count->sum;
                    echo "{ year: '$ten_l', value: $tong },";
                  }
                }
            }
          }else if(isset($count_thoihoc_7) ){
            foreach ($count_thoihoc_7 as $key => $count){
              $ngay_th = $count->ngay_th;
              $tong = $count->sum;
              echo "{ year: '$ngay_th', value: $tong },";
            }
          }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
  })
</script>
@endsection
