@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-12">
    <div class="row">
      <div class="col-12">
        <p class="fw-bold" style="font-size: 18px;">Thống kê quản lý công tác tổ chức </p>
      </div>
    </div>
    <div class="row">
      <div class="col-1">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #379237; border: none; width: 100%">
          <i class="fa-solid fa-filter"></i>
          &ensp;
          Bộ lọc
        </button>
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl ">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bộ lọc</h1>
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
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-filter"></i>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #D36B00; border: none; width: 100%">
          <i class="fa-solid fa-filter"></i>
          &ensp;
          Bộ lọc hoàn thành khoá học
        </button>
        <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bộ lọc</h1>
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
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-filter"></i>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #F96666; border: none; width: 100%">
          <i class="fa-solid fa-filter"></i>
          &ensp;
          Bộ lọc xin gia hạn
        </button>
        <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bộ lọc</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              {{-- <form action="{{ URL::to('thongke_qltktkl_kl_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span class="text-center fw-bold" style="color: #D36B00; font-size: 20px">KỶ LUẬT</span>
                    <span style="font-weight: bold; font-size: 20px;">Loại kỷ luật</span>
                    @foreach ($list_loaikyluat as $key => $loaikyluat)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_lkl" id="size_{{ $loaikyluat->created_lkl }}" value="{{ $loaikyluat->ma_lkl }}"/>
                        <label class="label" for="size_{{ $loaikyluat->created_lkl }}">{{ $loaikyluat->ten_lkl }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $khoa->created_k }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $khoa->created_k }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row mt-1">
                    <span style="font-weight: bold; font-size: 20px;">Thời gian kỷ luật</span>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="batdau_kl">
                    </div>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="ketthuc_kl">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-filter"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #066163; border: none; width: 100%">
          <i class="fa-solid fa-filter"></i>
          &ensp;
          Bộ lọc xin tạm dừng học
        </button>
        <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bộ lọc</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              {{-- <form action="{{ URL::to('thongke_qltktkl_kl_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span class="text-center fw-bold" style="color: #D36B00; font-size: 20px">KỶ LUẬT</span>
                    <span style="font-weight: bold; font-size: 20px;">Loại kỷ luật</span>
                    @foreach ($list_loaikyluat as $key => $loaikyluat)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_lkl" id="size_{{ $loaikyluat->created_lkl }}" value="{{ $loaikyluat->ma_lkl }}"/>
                        <label class="label" for="size_{{ $loaikyluat->created_lkl }}">{{ $loaikyluat->ten_lkl }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $khoa->created_k }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $khoa->created_k }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row mt-1">
                    <span style="font-weight: bold; font-size: 20px;">Thời gian kỷ luật</span>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="batdau_kl">
                    </div>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="ketthuc_kl">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-filter"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #86340A; border: none; width: 100%">
          <i class="fa-solid fa-filter"></i>
          &ensp;
          Bộ lọc xin chuyển
        </button>
        <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bộ lọc</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              {{-- <form action="{{ URL::to('thongke_qltktkl_kl_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span class="text-center fw-bold" style="color: #D36B00; font-size: 20px">KỶ LUẬT</span>
                    <span style="font-weight: bold; font-size: 20px;">Loại kỷ luật</span>
                    @foreach ($list_loaikyluat as $key => $loaikyluat)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_lkl" id="size_{{ $loaikyluat->created_lkl }}" value="{{ $loaikyluat->ma_lkl }}"/>
                        <label class="label" for="size_{{ $loaikyluat->created_lkl }}">{{ $loaikyluat->ten_lkl }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $khoa->created_k }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $khoa->created_k }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row mt-1">
                    <span style="font-weight: bold; font-size: 20px;">Thời gian kỷ luật</span>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="batdau_kl">
                    </div>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="ketthuc_kl">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-filter"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="background-color: #E40017; border: none; width: 100%">
          <i class="fa-solid fa-filter"></i>
          &ensp;
          Bộ lọc xin thôi học
        </button>
        <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Bộ lọc</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              {{-- <form action="{{ URL::to('thongke_qltktkl_kl_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span class="text-center fw-bold" style="color: #D36B00; font-size: 20px">KỶ LUẬT</span>
                    <span style="font-weight: bold; font-size: 20px;">Loại kỷ luật</span>
                    @foreach ($list_loaikyluat as $key => $loaikyluat)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_lkl" id="size_{{ $loaikyluat->created_lkl }}" value="{{ $loaikyluat->ma_lkl }}"/>
                        <label class="label" for="size_{{ $loaikyluat->created_lkl }}">{{ $loaikyluat->ten_lkl }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $khoa->created_k }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $khoa->created_k }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row mt-1">
                    <span style="font-weight: bold; font-size: 20px;">Thời gian kỷ luật</span>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="batdau_kl">
                    </div>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="ketthuc_kl">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-filter"></i>
                    &ensp;
                    Lọc
                  </button>
                </div>
              </form> --}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-1">
        <a href="{{ URL::to('thongke_qlcttc') }}">
          <button type="button" class="btn btn-warning">
            <i class="fa-solid fa-arrows-rotate"></i>
          </button>
        </a>
      </div>
      
    </div>
    
    <div id="myfirstchart_qlcttc" style="height: 250px;">
    </div>
    @if ($list_1 != '')
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC
        </h3>
      </div>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Kết quả</th>
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
              @foreach ($list_vienchuc as $vienchuc  )
                @if ($vienchuc->ma_vc == $vc->ma_vc)
                  <td>{{ $vienchuc->ten_k }}</td>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_all != '')
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC
        </h3>
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
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_hoanthanh != '')
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC HOÀN THÀNH KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Hoàn thành khoá học</span>
      </p>
      
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Kết quả</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_giahan != '')
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC  XIN GIA HẠN KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Xin gia hạn</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Gia hạn</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_dunghoc != '')
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Xin tạm dừng</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin xin dừng học</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_chuyen != '')
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN CHUYỂN NƯỚC, TRƯỜNG, NGÀNH HỌC .....
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Xin chuyển</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin xin dừng học</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_thoihoc != '')
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          DANH SÁCH VIÊN CHỨC XIN THÔI HỌC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-primary">Xin thôi học</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin xin thôi học</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif

    @if ($list_hoanthanh_all != '')
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
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin kết quả</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_hoanthanh_2 != '')
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
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin kết quả</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_hoanthanh_3 != '')
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
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin kết quả</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_hoanthanh_4 != '')
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
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin kết quả</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_hoanthanh_5 != '')
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
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin kết quả</th>
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
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_hoanthanh_6 != '')
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
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin kết quả</th>
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
    @if ($list_hoanthanh_7 != '')
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
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin lớp</th>
            <th scope="col">Thông tin kết quả</th>
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
  </div>
</div>
<script>
  $(document).ready(function(){
    new Morris.Bar({
      element: 'myfirstchart_qlcttc',
      pointFillColors: ['#F94A29'],
      parseTime: false,
      hideHover:true,
      barColors: ['#FF6363'],
      data: [
        <?php
          if($count_1 ){
            foreach ($count_1 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if($count_hoanthanh ){
            foreach ($count_hoanthanh as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if($count_giahan ){
            foreach ($count_giahan as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if($count_dunghoc ){
            foreach ($count_dunghoc as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if($count_chuyen ){
            foreach ($count_chuyen as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if($count_thoihoc ){
            foreach ($count_thoihoc as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if($count_hoanthanh_all ){
            foreach ($count_hoanthanh_all as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if($count_hoanthanh_2 ){
            foreach ($count_hoanthanh_2 as $key => $count){
              $ngaycapbang_kq = $count->ngaycapbang_kq;
              $tong = $count->sum;
              echo "{ year: '$ngaycapbang_kq', value: $tong },";
            }
          }else if($count_hoanthanh_3 ){
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
          }else if($count_hoanthanh_4 ){
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
          }else if($count_hoanthanh_5 ){
            foreach ($count_hoanthanh_5 as $key => $count){
              foreach($list_lop as $key => $lop){
                if($count->ma_l == $lop->ma_l){
                  $ten_l = $lop->ten_l;
                  $tong = $count->sum;
                  echo "{ year: '$ten_l', value: $tong },";
                }
              }
            }
          }else if($count_hoanthanh_6 ){
            foreach ($count_hoanthanh_6 as $key => $count){
              $ngaycapbang_kq = $count->ngaycapbang_kq;
              $tong = $count->sum;
              echo "{ year: '$ngaycapbang_kq', value: $tong },";
            }
          }else if($count_hoanthanh_7 ){
            foreach ($count_hoanthanh_7 as $key => $count){
              $ngayvenuoc_kq = $count->ngayvenuoc_kq;
              $tong = $count->sum;
              echo "{ year: '$ngayvenuoc_kq', value: $tong },";
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
