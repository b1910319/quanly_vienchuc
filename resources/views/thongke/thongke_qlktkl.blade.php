@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-12">
    <div class="row">
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THỐNG KÊ KHEN THƯỞNG KỶ LUẬT CỦA VIÊN CHỨC________
      </div>
    </div>
    <div class="row">
      <div class="col-2">
        <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100%; border-radius: 5px; background-color: #a4aa13; border: none; ">
          <i class="fa-solid fa-filter"></i>
          &ensp;
          Lọc khen thưởng
        </button>
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="color: #a4aa13;">
                  <i class="fa-solid fa-filter"></i>
                  &ensp;
                  Bộ lọc
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ URL::to('thongke_qltktkl_kt_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span class="text-center fw-bold" style="color: #379237; font-size: 20px">KHEN THƯỞNG</span>
                    <span style="font-weight: bold; font-size: 20px;">Loại khen thưởng</span>
                    @foreach ($list_loaikhenthuong as $key => $loaikhenthuong)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_lkt" id="size_{{ $loaikhenthuong->created_lkt }}" value="{{ $loaikhenthuong->ma_lkt }}"/>
                        <label class="label" for="size_{{ $loaikhenthuong->created_lkt }}">{{ $loaikhenthuong->ten_lkt }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $key+1 }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $key+1 }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Hình thức khen thưởng</span>
                    @foreach ($list_hinhthuckhenthuong as $key => $hinhthuckhenthuong)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_htkt" id="size_{{ $hinhthuckhenthuong->created_htkt }}" value="{{ $hinhthuckhenthuong->ma_htkt }}"/>
                        <label class="label" for="size_{{ $hinhthuckhenthuong->created_htkt }}">{{ $hinhthuckhenthuong->ten_htkt }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row mt-1">
                    <span style="font-weight: bold; font-size: 20px;">Thời gian khen thưởng</span>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="batdau_kt">
                    </div>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="ketthuc_kt">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                    <i class="fa-solid fa-square-xmark"></i>
                    &ensp; Đóng
                  </button>
                  <button type="submit" class="btn btn-primary fw-bold" style="background-color: #a4aa13; border: none;">
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
        <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="width: 100%; border-radius: 5px; background-color: #a4aa13; border: none; ">
          <i class="fa-solid fa-filter"></i>
          &ensp;
          Lọc kỷ luật
        </button>
        <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
          <div class="modal-dialog modal-dialog-scrollabl modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" style="color: #a4aa13;">
                  <i class="fa-solid fa-filter"></i>
                  &ensp;
                  Bộ lọc
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ URL::to('thongke_qltktkl_kl_loc') }}" method="post">
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
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                    <i class="fa-solid fa-square-xmark"></i>
                    &ensp; Đóng
                  </button>
                  <button type="submit" class="btn btn-primary fw-bold" style="background-color: #a4aa13; border: none;">
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
      <div class="col-1">
        <a href="{{ URL::to('thongke_qlktkl') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%; ">
            <i class="fa-solid fa-rotate"></i>
            &ensp;
            Làm mới
          </button>
        </a>
      </div>
    </div>
    <div id="myfirstchart_qlktkl" style="height: 250px;">
    </div>
    @if (isset($list_pdf_lkt))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THÔNG TIN KHEN THƯỞNG VIÊN CHỨC________
      </div>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_lkt as $key => $vc)
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
                            <b> Tôn giáo: </b> {{ $vienchuc->ten_tg }} <br>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlklkt_kt_pdf') }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlklkt_kt_excel') }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif

    @if (isset($list_all))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THỐNG KÊ KHEN THƯỞNG CỦA VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_loaikhenthuong as $loaikhenthuong )
          @if ($loaikhenthuong->ma_lkt == $ma_lkt)
          <span class="badge text-bg-secondary">{{ $loaikhenthuong->ten_lkt }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong )
          @if ($hinhthuckhenthuong->ma_htkt == $ma_htkt)
          <span class="badge text-bg-success">{{ $hinhthuckhenthuong->ten_htkt }}</span>
          @endif
        @endforeach
        ,
        <span class="badge text-bg-danger">{{ $batdau_kt }}</span>
        ,
        <span class="badge text-bg-warning">{{ $ketthuc_kt }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
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
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_all_pdf/'.$ma_lkt.'/'.$ma_k.'/'.$ma_htkt.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_all_excel/'.$ma_lkt.'/'.$ma_k.'/'.$ma_htkt.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_2))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THỐNG KÊ KHEN THƯỞNG CỦA VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaikhenthuong as $loaikhenthuong )
          @if ($loaikhenthuong->ma_lkt == $ma_lkt)
          <span class="badge text-bg-primary">{{ $loaikhenthuong->ten_lkt }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong )
          @if ($hinhthuckhenthuong->ma_htkt == $ma_htkt)
          <span class="badge text-bg-secondary">{{ $hinhthuckhenthuong->ten_htkt }}</span>
          @endif
        @endforeach
        ,
        <span class="badge text-bg-success">{{ $batdau_kt }}</span>
        ,
        <span class="badge text-bg-danger">{{ $ketthuc_kt }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_2 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_2_pdf/'.$ma_lkt.'/'.$ma_htkt.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_2_excel/'.$ma_lkt.'/'.$ma_htkt.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_3))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THỐNG KÊ KHEN THƯỞNG CỦA VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaikhenthuong as $loaikhenthuong )
          @if ($loaikhenthuong->ma_lkt == $ma_lkt)
          <span class="badge text-bg-primary">{{ $loaikhenthuong->ten_lkt }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-secondary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ,
        <span class="badge text-bg-success">{{ $batdau_kt }}</span>
        ,
        <span class="badge text-bg-danger">{{ $ketthuc_kt }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_3 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_3_pdf/'.$ma_lkt.'/'.$ma_k.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_3_excel/'.$ma_lkt.'/'.$ma_k.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_4))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THỐNG KÊ KHEN THƯỞNG CỦA VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaikhenthuong as $loaikhenthuong )
          @if ($loaikhenthuong->ma_lkt == $ma_lkt)
          <span class="badge text-bg-primary">{{ $loaikhenthuong->ten_lkt }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-secondary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong )
          @if ($hinhthuckhenthuong->ma_htkt == $ma_htkt)
          <span class="badge text-bg-success">{{ $hinhthuckhenthuong->ten_htkt }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_4 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_4_pdf/'.$ma_lkt.'/'.$ma_k.'/'.$ma_htkt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_4_excel/'.$ma_lkt.'/'.$ma_k.'/'.$ma_htkt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_5))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THỐNG KÊ KHEN THƯỞNG CỦA VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong )
          @if ($hinhthuckhenthuong->ma_htkt == $ma_htkt)
          <span class="badge text-bg-success">{{ $hinhthuckhenthuong->ten_htkt }}</span>
          @endif
        @endforeach
        ,
        <span class="badge text-bg-danger">{{ $batdau_kt }}</span>
        ,
        <span class="badge text-bg-warning">{{ $ketthuc_kt }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_5 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_5_pdf/'.$ma_htkt.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_5_excel/'.$ma_htkt.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_6))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THỐNG KÊ KHEN THƯỞNG CỦA VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-success">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ,
        <span class="badge text-bg-danger">{{ $batdau_kt }}</span>
        ,
        <span class="badge text-bg-warning">{{ $ketthuc_kt }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_6 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_6_pdf/'.$ma_k.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_6_excel/'.$ma_k.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_7))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THỐNG KÊ KHEN THƯỞNG CỦA VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-secondary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong )
          @if ($hinhthuckhenthuong->ma_htkt == $ma_htkt)
          <span class="badge text-bg-success">{{ $hinhthuckhenthuong->ten_htkt }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_7 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_7_pdf/'.$ma_k.'/'.$ma_htkt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_7_excel/'.$ma_k.'/'.$ma_htkt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_8))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KHEN THƯỞNG CỦA VIÊN CHỨC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaikhenthuong as $loaikhenthuong )
          @if ($loaikhenthuong->ma_lkt == $ma_lkt)
          <span class="badge text-bg-success">{{ $loaikhenthuong->ten_lkt }}</span>
          @endif
        @endforeach
        ,
        <span class="badge text-bg-danger">{{ $batdau_kt }}</span>
        ,
        <span class="badge text-bg-warning">{{ $ketthuc_kt }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_8 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_8_pdf/'.$ma_lkt.'/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_9))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KHEN THƯỞNG CỦA VIÊN CHỨC LỌC THEO LOẠI KHEN THƯỞNG & HÌNH THỨC KHEN THƯỞNG
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaikhenthuong as $loaikhenthuong )
          @if ($loaikhenthuong->ma_lkt == $ma_lkt)
          <span class="badge text-bg-secondary">{{ $loaikhenthuong->ten_lkt }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong )
          @if ($hinhthuckhenthuong->ma_htkt == $ma_htkt)
          <span class="badge text-bg-success">{{ $hinhthuckhenthuong->ten_htkt }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_9 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_9_pdf/'.$ma_lkt.'/'.$ma_htkt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_10))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KHEN THƯỞNG CỦA VIÊN CHỨC LỌC THEO LOẠI KHEN THƯỞNG & KHOA
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaikhenthuong as $loaikhenthuong )
          @if ($loaikhenthuong->ma_lkt == $ma_lkt)
          <span class="badge text-bg-secondary">{{ $loaikhenthuong->ten_lkt }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-success">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_10 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_10_pdf/'.$ma_lkt.'/'.$ma_k) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_11))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KHEN THƯỞNG CỦA VIÊN CHỨC LỌC THEO LOẠI KHEN THƯỞNG
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaikhenthuong as $loaikhenthuong )
          @if ($loaikhenthuong->ma_lkt == $ma_lkt)
          <span class="badge text-bg-secondary">{{ $loaikhenthuong->ten_lkt }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_11 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_11_pdf/'.$ma_lkt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_12))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KHEN THƯỞNG CỦA VIÊN CHỨC LỌC THEO KHOA
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-secondary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_12 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_12_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_13))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KHEN THƯỞNG CỦA VIÊN CHỨC LỌC HÌNH THỨC KHEN THƯỞNG
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong )
          @if ($hinhthuckhenthuong->ma_htkt == $ma_htkt)
          <span class="badge text-bg-secondary">{{ $hinhthuckhenthuong->ten_htkt }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_13 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_13_pdf/'.$ma_htkt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_14))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KHEN THƯỞNG CỦA VIÊN CHỨC LỌC THEO THỜI GIAN
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-danger">{{ $batdau_kt }}</span>
        ,
        <span class="badge text-bg-warning">{{ $ketthuc_kt }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin khen thưởng</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_14 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại khen thưởng:</b> {{ $vc->ten_lkt }} <br>
                        <b> Hình thức khen thưởng:</b> {{ $vc->ten_htkt }} <br>
                        <b> Ngày khen thưởng: </b> {{ $vc->ngay_kt }} <br>
                        <b> Nội dung: </b> {{ $vc->noidung_kt }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kt_loc_14_pdf/'.$batdau_kt.'/'.$ketthuc_kt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif

    @if (isset($list_kl_all))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KỶ LUẬT CỦA VIÊN CHỨC
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
        @foreach ($list_loaikyluat as $loaikyluat )
          @if ($loaikyluat->ma_lkl == $ma_lkl)
          <span class="badge text-bg-secondary">{{ $loaikyluat->ten_lkl }}</span>
          @endif
        @endforeach
        ,
        <span class="badge text-bg-danger">{{ $batdau_kl }}</span>
        ,
        <span class="badge text-bg-warning">{{ $ketthuc_kl }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin kỷ luật</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_kl_all as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại kỷ luật:</b> {{ $vc->ten_lkl }} <br>
                        <b> Lý do kỷ luật:</b> {{ $vc->lydo_kl }} <br>
                        <b> Ngày kỷ luật: </b> {{ $vc->ngay_kl }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kl_loc_all_pdf/'.$ma_lkl.'/'.$ma_k.'/'.$batdau_kl.'/'.$ketthuc_kl) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_kl_2))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KỶ LUẬT CỦA VIÊN CHỨC
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
        <span class="badge text-bg-danger">{{ $batdau_kl }}</span>
        ,
        <span class="badge text-bg-warning">{{ $ketthuc_kl }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin kỷ luật</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_kl_2 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại kỷ luật:</b> {{ $vc->ten_lkl }} <br>
                        <b> Lý do kỷ luật:</b> {{ $vc->lydo_kl }} <br>
                        <b> Ngày kỷ luật: </b> {{ $vc->ngay_kl }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kl_loc_2_pdf/'.$ma_k.'/'.$batdau_kl.'/'.$ketthuc_kl) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_kl_3))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KỶ LUẬT CỦA VIÊN CHỨC
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaikyluat as $loaikyluat )
          @if ($loaikyluat->ma_lkl == $ma_lkl)
          <span class="badge text-bg-primary">{{ $loaikyluat->ten_lkl }}</span>
          @endif
        @endforeach
        ,
        <span class="badge text-bg-danger">{{ $batdau_kl }}</span>
        ,
        <span class="badge text-bg-warning">{{ $ketthuc_kl }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin kỷ luật</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_kl_3 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại kỷ luật:</b> {{ $vc->ten_lkl }} <br>
                        <b> Lý do kỷ luật:</b> {{ $vc->lydo_kl }} <br>
                        <b> Ngày kỷ luật: </b> {{ $vc->ngay_kl }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kl_loc_3_pdf/'.$ma_lkl.'/'.$batdau_kl.'/'.$ketthuc_kl) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_kl_4))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KỶ LUẬT CỦA VIÊN CHỨC LỌC THEO KHOA & LOẠI KỶ LUẬT
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
        @foreach ($list_loaikyluat as $loaikyluat )
          @if ($loaikyluat->ma_lkl == $ma_lkl)
          <span class="badge text-bg-secondary">{{ $loaikyluat->ten_lkl }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin kỷ luật</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_kl_4 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại kỷ luật:</b> {{ $vc->ten_lkl }} <br>
                        <b> Lý do kỷ luật:</b> {{ $vc->lydo_kl }} <br>
                        <b> Ngày kỷ luật: </b> {{ $vc->ngay_kl }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kl_loc_4_pdf/'.$ma_lkl.'/'.$ma_k) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_kl_5))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KỶ LUẬT CỦA VIÊN CHỨC LỌC THEO KHOA
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
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin kỷ luật</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_kl_5 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại kỷ luật:</b> {{ $vc->ten_lkl }} <br>
                        <b> Lý do kỷ luật:</b> {{ $vc->lydo_kl }} <br>
                        <b> Ngày kỷ luật: </b> {{ $vc->ngay_kl }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kl_loc_5_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_kl_6))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KỶ LUẬT CỦA VIÊN CHỨC LỌC THEO LOẠI KỶ LUẬT
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaikyluat as $loaikyluat )
          @if ($loaikyluat->ma_lkl == $ma_lkl)
          <span class="badge text-bg-secondary">{{ $loaikyluat->ten_lkl }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin kỷ luật</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_kl_6 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại kỷ luật:</b> {{ $vc->ten_lkl }} <br>
                        <b> Lý do kỷ luật:</b> {{ $vc->lydo_kl }} <br>
                        <b> Ngày kỷ luật: </b> {{ $vc->ngay_kl }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kl_loc_6_pdf/'.$ma_lkl) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_kl_7))
      <div class="alert alert-dark" role="alert">
        <h3 class="text-center fw-bold" style="color: black" >
          THÔNG TIN KỶ LUẬT CỦA VIÊN CHỨC LỌC THEO THỜI GIAN
        </h3>
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        <span class="badge text-bg-danger">{{ $batdau_kl }}</span>
        ,
        <span class="badge text-bg-warning">{{ $ketthuc_kl }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thông tin kỷ luật</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_kl_7 as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
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
                        <b> Loại kỷ luật:</b> {{ $vc->ten_lkl }} <br>
                        <b> Lý do kỷ luật:</b> {{ $vc->lydo_kl }} <br>
                        <b> Ngày kỷ luật: </b> {{ $vc->ngay_kl }}
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
          <a href="{{ URL::to('/thongke_qlktkl_kl_loc_7_pdf/'.$batdau_kl.'/'.$ketthuc_kl) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
  </div>
</div>
<script>
  $(document).ready(function(){
    new Morris.Bar({
      element: 'myfirstchart_qlktkl',
      parseTime: false,
      hideHover:true,
      barColors: ['#F88F01'],
      data: [
        <?php
          if(isset($count_loaikhenthuong) ){
            foreach ($count_loaikhenthuong as $key => $count){
              foreach($list_loaikhenthuong as $key => $loaikhenthuong){
                if($count->ma_lkt == $loaikhenthuong->ma_lkt){
                  $ten_lkt = $loaikhenthuong->ten_lkt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkt', value: $tong },";
                }
              }
            }
          }else if(isset($count_5)){
            foreach ($count_5 as $key => $count){
              foreach($list_hinhthuckhenthuong as $key => $hinhthuckhenthuong){
                if($count->ma_htkt == $hinhthuckhenthuong->ma_htkt){
                  $ten_htkt = $hinhthuckhenthuong->ten_htkt;
                  $ngay_kt = $count->ngay_kt;
                  $tong = $count->sum;
                  echo "{ year: '$ngay_kt ($ten_htkt)', value: $tong },";
                }
              }
            }
          }else if(isset($count_6)){
            foreach ($count_6 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $ngay_kt = $count->ngay_kt;
                  $tong = $count->sum;
                  echo "{ year: '$ngay_kt ($ten_k)', value: $tong },";
                }
              }
            }
          }else if(isset($count_7)){
            foreach ($count_7 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }else if(isset($count_8)){
            foreach ($count_8 as $key => $count){
              foreach($list_loaikhenthuong as $key => $loaikhenthuong){
                if($count->ma_lkt == $loaikhenthuong->ma_lkt){
                  $ten_lkt = $loaikhenthuong->ten_lkt;
                  $ngay_kt = $count->ngay_kt;
                  $tong = $count->sum;
                  echo "{ year: '$ngay_kt ($ten_lkt)', value: $tong },";
                }
              }
            }
          }else if(isset($count_9)){
            foreach ($count_9 as $key => $count){
              foreach($list_loaikhenthuong as $key => $loaikhenthuong){
                if($count->ma_lkt == $loaikhenthuong->ma_lkt){
                  $ten_lkt = $loaikhenthuong->ten_lkt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkt', value: $tong },";
                }
              }
            }
          }else if(isset($count_10)){
            foreach ($count_10 as $key => $count){
              foreach($list_loaikhenthuong as $key => $loaikhenthuong){
                if($count->ma_lkt == $loaikhenthuong->ma_lkt){
                  $ten_lkt = $loaikhenthuong->ten_lkt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkt', value: $tong },";
                }
              }
            }
          }else if(isset($count_11)){
            foreach ($count_11 as $key => $count){
              foreach($list_loaikhenthuong as $key => $loaikhenthuong){
                if($count->ma_lkt == $loaikhenthuong->ma_lkt){
                  $ten_lkt = $loaikhenthuong->ten_lkt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkt', value: $tong },";
                }
              }
            }
          }else if(isset($count_12)){
            foreach ($count_12 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }else if(isset($count_13)){
            foreach ($count_13 as $key => $count){
              foreach($list_hinhthuckhenthuong as $key => $hinhthuckhenthuong){
                if($count->ma_htkt == $hinhthuckhenthuong->ma_htkt){
                  $ten_htkt = $hinhthuckhenthuong->ten_htkt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_htkt', value: $tong },";
                }
              }
            }
          }else if(isset($count_14)){
            foreach($count_14 as $count){
              $ngay_kt = $count->ngay_kt;
              $tong = $count->sum;
              echo "{ year: '$ngay_kt', value: $tong },";
            }
          }else if(isset($count_kl_all)){
            foreach ($count_kl_all as $key => $count){
              foreach($list_loaikyluat as $key => $loaikyluat){
                if($count->ma_lkl == $loaikyluat->ma_lkl){
                  $ten_lkl = $loaikyluat->ten_lkl;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkl', value: $tong },";
                }
              }
            }
          }else if(isset($count_kl_2)){
            foreach ($count_kl_2 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $ngay_kl = $count->ngay_kl;
                  $tong = $count->sum;
                  echo "{ year: '$ngay_kl ($ten_k)', value: $tong },";
                }
              }
            }
          }else if(isset($count_kl_3)){
            foreach ($count_kl_3 as $key => $count){
              foreach($list_loaikyluat as $key => $loaikyluat){
                if($count->ma_lkl == $loaikyluat->ma_lkl){
                  $ten_lkl = $loaikyluat->ten_lkl;
                  $ngay_kl = $count->ngay_kl;
                  $tong = $count->sum;
                  echo "{ year: '$ngay_kl ($ten_lkl)', value: $tong },";
                }
              }
            }
          }else if(isset($count_kl_4)){
            foreach ($count_kl_4 as $key => $count){
              foreach($list_loaikyluat as $key => $loaikyluat){
                if($count->ma_lkl == $loaikyluat->ma_lkl){
                  $ten_lkl = $loaikyluat->ten_lkl;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkl', value: $tong },";
                }
              }
            }
          }else if(isset($count_kl_5)){
            foreach ($count_kl_5 as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }else if(isset($count_kl_6)){
            foreach ($count_kl_6 as $key => $count){
              foreach($list_loaikyluat as $key => $loaikyluat){
                if($count->ma_lkl == $loaikyluat->ma_lkl){
                  $ten_lkl = $loaikyluat->ten_lkl;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lkl', value: $tong },";
                }
              }
            }
          }else if(isset($count_kl_7)){
            foreach ($count_kl_7 as $key => $count){
              $ngay_kl = $count->ngay_kl;
              $tong = $count->sum;
              echo "{ year: '$ngay_kl', value: $tong },";
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
