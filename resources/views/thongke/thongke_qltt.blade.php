@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-12">
    <div class="row">
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THỐNG KÊ VIÊN CHỨC________
      </div>
    </div>
    <div class="row">
      <div class="col-2">
        <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 100%; border-radius: 5px; background-color: #a4aa13; border: none; ">
          <i class="fa-solid fa-filter"></i>
          &ensp;
          Lọc viên chức
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
              <form action="{{ URL::to('thongke_qltt_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
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
                    <span style="font-weight: bold; font-size: 20px;">Chức vụ</span>
                    @foreach ($list_chucvu as $key => $chucvu)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_cv" id="size_{{ $chucvu->created_cv }}" value="{{ $chucvu->ma_cv }}"/>
                        <label class="label" for="size_{{ $chucvu->created_cv }}">{{ $chucvu->ten_cv }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Hệ đào tạo</span>
                    @foreach ($list_hedaotao as $key => $hedaotao)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_hdt" id="size_{{ $hedaotao->created_hdt }}" value="{{ $hedaotao->ma_hdt }}"/>
                        <label class="label" for="size_{{ $hedaotao->created_hdt }}">{{ $hedaotao->ten_hdt }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Loại bằng cấp</span>
                    @foreach ($list_loaibangcap as $key => $loaibangcap)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_lbc" id="size_{{ $loaibangcap->created_lbc }}" value="{{ $loaibangcap->ma_lbc }}"/>
                        <label class="label" for="size_{{ $loaibangcap->created_lbc }}">{{ $loaibangcap->ten_lbc }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row mt-2">
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Ngạch</span>
                      <div class="mt-2">
                        <select class="custom-select input_table"  name="ma_n">
                          <option value="" >Chọn ngạch viên chức</option>
                          @foreach ($list_ngach as $ngach)
                            <option value="{{ $ngach->ma_n }}" >{{ $ngach->ten_n }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Quê quán</span>
                      <div class="mt-2">
                        <select class="custom-select input_table"  name="ma_t">
                          <option value="" >Chọn tỉnh\thành phố</option>
                          @foreach ($list_tinh as $tinh)
                            <option value="{{ $tinh->ma_t }}" >{{ $tinh->ten_t }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Dân tộc</span>
                      <div class="mt-2">
                        <select class="custom-select input_table"  name="ma_dt">
                          <option value="" >Chọn dân tộc</option>
                          @foreach ($list_dantoc as $dantoc)
                            <option value="{{ $dantoc->ma_dt }}" >{{ $dantoc->ten_dt }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Tôn giáo</span>
                      <div class="mt-2">
                        <select class="custom-select input_table"  name="ma_tg">
                          <option value="" >Chọn tôn giáo của viên chức</option>
                          @foreach ($list_tongiao as $tongiao)
                            <option value="{{ $tongiao->ma_tg }}" >{{ $tongiao->ten_tg }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Thương binh</span>
                      <div class="mt-2">
                        <select class="custom-select input_table"  name="ma_tb">
                          <option value="" >Hạng thương binh</option>
                          @foreach ($list_thuongbinh as $thuongbinh)
                            <option value="{{ $thuongbinh->ma_tb }}" >{{ $thuongbinh->ten_tb }}</option>
                          @endforeach
                        </select>
                      </div>
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
          Lọc viên chức nghĩ hưu
        </button>
        <div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true" style="height: 100%;">
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
              <form action="{{ URL::to('thongke_qltt_nghihuu_loc') }}" method="post">
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
                  <div class="row mt-1">
                    <span style="font-weight: bold; font-size: 20px;">Thời gian nghĩ</span>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="batdau">
                    </div>
                    <div class="col-4 mt-1">
                      <input type='date' class='form-control input_table' autofocus name="ketthuc">
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
        <a href="{{ URL::to('thongke_qltt') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%; ">
            <i class="fa-solid fa-rotate"></i>
            &ensp;
            Làm mới
          </button>
        </a>
      </div>
    </div>
    
    <div id="myfirstchart_qltt_1" style="height: 250px;"> 
    </div>
    @if (isset($list))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC________
      </div>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Ngạch</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list as $key => $vc)
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
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_n }}({{ $vc->ma_n }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_pdf') }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_excel') }}">
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
        ________DANH SÁCH VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Viên chức được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_chucvu as $chucvu )
          @if ($chucvu->ma_cv == $ma_cv)
          <span class="badge text-bg-secondary">{{ $chucvu->ten_cv }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_hedaotao as $hedaotao )
          @if ($hedaotao->ma_hdt == $ma_hdt)
          <span class="badge text-bg-success">{{ $hedaotao->ten_hdt }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_loaibangcap as $loaibangcap )
          @if ($loaibangcap->ma_lbc == $ma_lbc)
          <span class="badge text-bg-danger">{{ $loaibangcap->ten_lbc }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_ngach as $ngach )
          @if ($ngach->ma_n == $ma_n)
          <span class="badge text-bg-warning">{{ $ngach->ten_n }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_tinh as $tinh )
          @if ($tinh->ma_t == $ma_t)
          <span class="badge text-bg-info">{{ $tinh->ten_t }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_dantoc as $dantoc )
          @if ($dantoc->ma_dt == $ma_dt)
          <span class="badge text-bg-light">{{ $dantoc->ten_dt }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_tongiao as $tongiao )
          @if ($tongiao->ma_tg == $ma_tg)
          <span class="badge text-bg-dark">{{ $tongiao->ten_tg }}</span>
          @endif
        @endforeach
        ,
        @foreach ($list_thuongbinh as $thuongbinh )
          @if ($thuongbinh->ma_tb == $ma_tb)
          <span class="badge text-bg-primary">{{ $thuongbinh->ten_tb }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Ngạch</th>
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
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_n }}({{ $vc->ma_n }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_all_pdf/'.$ma_k.'/'.$ma_cv.'/'.$ma_hdt.'/'.$ma_lbc.'/'.$ma_n.'/'.$ma_t.'/'.$ma_dt.'/'.$ma_tg.'/'.$ma_tb.'/') }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_all_excel/'.$ma_k.'/'.$ma_cv.'/'.$ma_hdt.'/'.$ma_lbc.'/'.$ma_n.'/'.$ma_t.'/'.$ma_dt.'/'.$ma_tg.'/'.$ma_tb.'/') }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_2 ))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        @foreach ($list_chucvu as $chucvu )
          @if ($chucvu->ma_cv == $ma_cv)
          <span class="badge text-bg-secondary">{{ $chucvu->ten_cv }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Chức vụ</th>
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_cv }}({{ $vc->ma_cv }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_2_pdf/'.$ma_k.'/'.$ma_cv) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_2_excel/'.$ma_k.'/'.$ma_cv) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ( isset($list_pdf_khoa))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC ĐƯỢC LỌC THEO KHOA________
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
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Ngạch</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_khoa as $key => $vc)
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
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>
                @foreach ($list_ngach as $ngach )
                  @if ($ngach->ma_n == $vc->ma_n)
                    {{ $vc->ten_n }}({{ $vc->ma_n }})
                  @endif
                @endforeach
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_khoa_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_khoa_excel/'.$ma_k) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; width: 100%;">
              <i class="fa-solid fa-file-excel"></i>
              &ensp;
              Xuất file Excel
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_pdf_chucvu))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC THEO CHỨC VỤ________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_chucvu as $chucvu )
          @if ($chucvu->ma_cv == $ma_cv)
          <span class="badge text-bg-primary">{{ $chucvu->ten_cv }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Chức vụ</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_chucvu as $key => $vc)
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_cv}}({{ $vc->ma_cv}})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_chucvu_pdf/'.$ma_cv) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_pdf_hdt) )
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC THEO HỆ ĐÀO TẠO________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_hedaotao as $hedaotao )
          @if ($hedaotao->ma_hdt == $ma_hdt)
          <span class="badge text-bg-primary">{{ $hedaotao->ten_hdt }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Hệ đào tạo</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_hdt as $key => $vc)
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_hdt }}({{ $vc->ma_hdt }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_hdt_pdf/'.$ma_hdt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_pdf_lbc))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC THEO LOẠI BẰNG CẤP________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_loaibangcap as $loaibangcap )
          @if ($loaibangcap->ma_lbc == $ma_lbc)
          <span class="badge text-bg-primary">{{ $loaibangcap->ten_lbc }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Loại bằng cấp</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_lbc as $key => $vc)
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_lbc }} ({{ $vc->ma_lbc }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_lbc_pdf/'.$ma_lbc) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_pdf_ngach))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC THEO NGẠCH________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_ngach as $ngach )
          @if ($ngach->ma_n == $ma_n)
          <span class="badge text-bg-primary">{{ $ngach->ten_n }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Ngạch</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_ngach as $key => $vc)
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_n }}({{ $vc->ma_n }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_ngach_pdf/'.$ma_n) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_pdf_tinh))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC THEO TỈNH/THÀNH PHỐ________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_tinh as $tinh )
          @if ($tinh->ma_t == $ma_t)
          <span class="badge text-bg-primary">{{ $tinh->ten_t }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Quê quán</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_tinh as $key => $vc)
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_t }}({{ $vc->ma_t }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_tinh_pdf/'.$ma_t) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_pdf_dantoc))
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC THEO DÂN TỘC________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_dantoc as $dantoc )
          @if ($dantoc->ma_dt == $ma_dt)
          <span class="badge text-bg-primary">{{ $dantoc->ten_dt }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Dân tộc</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_dantoc as $key => $vc)
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_dt }}({{ $VC->ma_dt }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_dantoc_pdf/'.$ma_dt) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_pdf_tongiao) )
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC THEO TÔN GIÁO________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_tongiao as $tongiao )
          @if ($tongiao->ma_tg == $ma_tg)
          <span class="badge text-bg-primary">{{ $tongiao->ten_tg }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Tôn giáo</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_tongiao as $key => $vc)
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_tg }}({{ $vc->ma_tg }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_tongiao_pdf/'.$ma_tg) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_pdf_thuongbinh) )
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC THEO HẠNG CỦA THƯƠNG BINH________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_thuongbinh as $thuongbinh )
          @if ($thuongbinh->ma_tb == $ma_tb)
          <span class="badge text-bg-primary">{{ $thuongbinh->ten_tb }}</span>
          @endif
        @endforeach
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thương binh</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf_thuongbinh as $key => $vc)
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->ten_tb }}({{ $vc->ma_tb }})</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_thuongbinh_pdf/'.$ma_tb) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif

    @if (isset($list_nghihuu_all) )
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC NGHĨ HƯU________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @foreach ($list_khoa as $khoa )
          @if ($khoa->ma_k == $ma_k)
          <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
          @endif
        @endforeach
        Bắt đầu 
        <span class="badge text-bg-secondary">{{ $batdau }}</span>
        Kết thúc
        <span class="badge text-bg-success">{{ $ketthuc }}</span>
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thời gian nghĩ</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_nghihuu_all as $key => $vc)
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
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
              <td>{{ $vc->thoigiannghi_vc }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_nghihuu_all_pdf/'.$ma_k.'/'.$batdau.'/'.$ketthuc) }}">
            <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
      </div>
    @endif
    @if (isset($list_nghihuu_khoa)  || isset($list_nghihuu_time) )
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________DANH SÁCH VIÊN CHỨC NGHĨ HƯU________
      </div>
      <p style="font-weight: bold; color: #D36B00; font-size: 18px">
        Danh sách được lọc theo: 
        @if ($list_nghihuu_khoa != '')
          @foreach ($list_khoa as $khoa )
            @if ($khoa->ma_k == $ma_k)
            <span class="badge text-bg-primary">{{ $khoa->ten_k }}</span>
            @endif
          @endforeach
        @else
          Bắt đầu 
          <span class="badge text-bg-primary">{{ $batdau }}</span>
          Kết thúc
          <span class="badge text-bg-secondary">{{ $ketthuc }}</span>
        @endif
      </p>
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Thời gian nghĩ</th>
          </tr>
        </thead>
        <tbody  >
          @if ($list_nghihuu_khoa)
            @foreach($list_nghihuu_khoa as $key => $vc)
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
                        </p>
                      </div>
                    </div>
                  </div>
                </td>
                <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
                <td>{{ $vc->thoigiannghi_vc }}</td>
              </tr>
            @endforeach
          @else
            @foreach($list_nghihuu_time as $key => $vc)
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
                        </p>
                      </div>
                    </div>
                  </div>
                </td>
                <td>{{ $vc->ten_k }} ({{ $vc->ma_k }})</td>
                <td>{{ $vc->thoigiannghi_vc }}</td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          @if ($list_nghihuu_khoa != '')
            <a href="{{ URL::to('/thongke_qltt_loc_nghihuu_khoa_pdf/'.$ma_k) }}">
              <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
            </a>
          @else
            <a href="{{ URL::to('/thongke_qltt_loc_nghihuu_time_pdf/'.$batdau.'/'.$ketthuc) }}">
              <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none; width: 100%;">
              <i class="fa-solid fa-file-pdf"></i>
              &ensp;
              Xuất file PDF
            </button>
            </a>
          @endif
        </div>
      </div>
    @endif

  </div>
</div>
<script>
  $(document).ready(function(){
    new Morris.Bar({
      element: 'myfirstchart_qltt_1',
      parseTime: false,
      hideHover:true,
      barColors: ['#F88F01'],
      data: [
        <?php
          if(isset($count)){
            foreach ($count as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }else if(isset($count_khoa)){
            foreach ($count_khoa as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }else if(isset($count_chucvu)){
            foreach ($count_chucvu as $key => $count){
              foreach($list_chucvu as $key => $chucvu){
                if($count->ma_cv == $chucvu->ma_cv){
                  $ten_cv = $chucvu->ten_cv;
                  $tong = $count->sum;
                  echo "{ year: '$ten_cv', value: $tong },";
                }
              }
            }
          }else if(isset($count_hedaotao)){
            foreach ($count_hedaotao as $key => $count){
              foreach($list_hedaotao as $key => $hedaotao){
                if($count->ma_hdt == $hedaotao->ma_hdt){
                  $ten_hdt = $hedaotao->ten_hdt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_hdt', value: $tong },";
                }
              }
            }
          }else if(isset($count_loaibangcap)){
            foreach ($count_loaibangcap as $key => $count){
              foreach($list_loaibangcap as $key => $loaibangcap){
                if($count->ma_lbc == $loaibangcap->ma_lbc){
                  $ten_lbc = $loaibangcap->ten_lbc;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lbc', value: $tong },";
                }
              }
            }
          }else if(isset($count_ngach)){
            foreach ($count_ngach as $key => $count){
              foreach($list_ngach as $key => $ngach){
                if($count->ma_n == $ngach->ma_n){
                  $ten_n = $ngach->ten_n;
                  $tong = $count->sum;
                  echo "{ year: '$ten_n', value: $tong },";
                }
              }
            }
          }else if(isset($count_tinh)){
            foreach ($count_tinh as $key => $count){
              foreach($list_tinh as $key => $tinh){
                if($count->ma_t == $tinh->ma_t){
                  $ten_t = $tinh->ten_t;
                  $tong = $count->sum;
                  echo "{ year: '$ten_t', value: $tong },";
                }
              }
            }
          }else if(isset($count_dantoc)){
            foreach ($count_dantoc as $key => $count){
              foreach($list_dantoc as $key => $dantoc){
                if($count->ma_dt == $dantoc->ma_dt){
                  $ten_dt = $dantoc->ten_dt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_dt', value: $tong },";
                }
              }
            }
          }else if(isset($count_tongiao)){
            foreach ($count_tongiao as $key => $count){
              foreach($list_tongiao as $key => $tongiao){
                if($count->ma_tg == $tongiao->ma_tg){
                  $ten_tg = $tongiao->ten_tg;
                  $tong = $count->sum;
                  echo "{ year: '$ten_tg', value: $tong },";
                }
              }
            }
          }else if(isset($count_thuongbinh)){
            foreach ($count_thuongbinh as $key => $count){
              foreach($list_thuongbinh as $key => $thuongbinh){
                if($count->ma_tb == $thuongbinh->ma_tb){
                  $ten_tb = $thuongbinh->ten_tb;
                  $tong = $count->sum;
                  echo "{ year: '$ten_tb', value: $tong },";
                }
              }
            }
          }else if(isset($count_nghihuu_all)){
            foreach ($count_nghihuu_all as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $thoigiannghi_vc = $count->thoigiannghi_vc;
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$thoigiannghi_vc ( $ten_k )', value: $tong },";
                }
              }
            }
          }else if(isset($count_nghihuu_khoa)){
            foreach ($count_nghihuu_khoa as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $thoigiannghi_vc = $count->thoigiannghi_vc;
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$thoigiannghi_vc ( $ten_k )', value: $tong },";
                }
              }
            }
          }else if(isset($count_nghihuu_time)){
            foreach ($count_nghihuu_time as $key => $count){
              $thoigiannghi_vc = $count->thoigiannghi_vc;
              $tong = $count->sum;
              echo "{ year: '$thoigiannghi_vc', value: $tong },";
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
