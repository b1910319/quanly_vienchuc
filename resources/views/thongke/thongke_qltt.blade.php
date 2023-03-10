@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-2">
    <div class="row">
      <div class="mt-2" >
        <a href="{{ URL::to('thongke_qltt') }}">
          <button type="button" class="btn btn-primary" style="background-color:
            @if ($count_ngach != '' || $count_ngach_ma_n != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Ngạch viên chức
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_lbc') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_loaibangcap != '' || $count_lbc != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Theo loại bằng cấp
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_chucvu') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_chucvu != '' || $count_cv != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Theo chức vụ
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_hdt') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_hedaotao != '' || $count_hedaotao_ma_hdt != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Theo hệ đào tạo
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_khoa') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_khoa != '' || $count_khoa_ma_k != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Theo khoa
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_nghihuu') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_nghihuu != '' || $count_nghihuu_time != '' || $count_nghihuu_khoa != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Viên chức nghĩ hưu
          </button>
        </a>
      </div>
      <div class="mt-2">
        <a href="{{ URL::to('thongke_qltt_quequan') }}">
          <button type="button" class="btn btn-primary" style="background-color: 
            @if ($count_tinh != '' || $count_quequan_tinh != '')
              #850000
            @else
              gray
            @endif
            ; border: none; width: 100%;">
            Quê quán viên chức
          </button>
        </a>
      </div>
    </div>
  </div>
  <div class="card-box col-10">
    <div class="row">
      <div class="col-6">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức </p>
      </div>
    </div>
    @if ($count_ngach || $count_ngach_ma_n)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn ngạch
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_ngach') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_n">
                    <option value="0" >Chọn ngạch</option>
                    @foreach ($list_ngach as $ngach)
                      <option value="{{ $ngach->ma_n }}" >{{ $ngach->ten_n }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_tinh || $count_quequan_tinh)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn tỉnh/thành phố thống kê
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_quequan_tinh') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_t">
                    <option value="0" >Chọn tỉnh</option>
                    @foreach ($list_tinh as $tinh)
                      <option value="{{ $tinh->ma_t }}" >{{ $tinh->ten_t }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_quequan') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_nghihuu || $count_nghihuu_time || $count_nghihuu_khoa)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn khoa thống kê
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_nghihuu_khoa') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_k">
                    <option value="0" >Chọn khoa</option>
                    @foreach ($list_khoa as $khoa)
                      <option value="{{ $khoa->ma_k }}" >{{ $khoa->ten_k }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="background-color: #00425A; border: none; width: 100%" >
            Chọn khoảng thời gian thống kê
          </button>
          <div id="demo" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_nghihuu_time') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-4">
                  <input type='date' class='form-control input_table' autofocus required name="batdau">
                </div>
                <div class="col-4">
                  <input type='date' class='form-control input_table' autofocus required name="ketthuc">
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_nghihuu') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_hedaotao || $count_hedaotao_ma_hdt)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn hệ đào tạo
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_hedaotao') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_hdt">
                    <option value="0" >Chọn hệ đào tạo</option>
                    @foreach ($list_hedaotao as $hedaotao)
                      <option value="{{ $hedaotao->ma_hdt }}" >{{ $hedaotao->ten_hdt }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_hdt') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_loaibangcap || $count_lbc)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn loại bằng cấp
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_loaibangcap') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_lbc">
                    <option value="0" >Chọn loại bằng cấp</option>
                    @foreach ($list_loaibangcap as $loaibangcap)
                      <option value="{{ $loaibangcap->ma_lbc }}" >{{ $loaibangcap->ten_lbc }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_lbc') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_chucvu || $count_cv)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn chức vụ
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_cv') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_cv">
                    <option value="0" >Chọn chức vụ</option>
                    @foreach ($list_chucvu as $chucvu)
                      <option value="{{ $chucvu->ma_cv }}" >{{ $chucvu->ten_cv }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_chucvu') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_khoa || $count_khoa_ma_k)
      <div class="row">
        <div class="col-3">
          <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >
            Chọn khoa thống kê
          </button>
          <div id="demo3" class="collapse mt-3">
            <form action="{{ URL::to('thongke_qltt_khoa_ma_k') }}" method="post">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-8">
                  <select class="custom-select input_table" id="gender2" name="ma_k">
                    <option value="0" >Chọn khoa</option>
                    @foreach ($list_khoa as $khoa)
                      <option value="{{ $khoa->ma_k }}" >{{ $khoa->ten_k }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="background-color: #850000; border: none; color: white; width: 100%;">
                    Thống kê
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1">
          <a href="{{ URL::to('thongke_qltt_khoa') }}">
            <button type="button" class="btn btn-warning">
              <i class="fa-solid fa-arrows-rotate"></i>
            </button>
          </a>
        </div>
      </div>
    @endif
    <div id="myfirstchart_qltt_1" style="height: 250px;"></div>
    @if ($count_ngach != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Ngạch</th>
            <th scope="col">Bậc</th>
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
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_n }}</td>
              <td>{{ $vc->ten_b }} - {{ $vc->hesoluong_b }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_ngach_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_ngach_ma_n != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Ngạch</th>
            <th scope="col">Bậc</th>
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
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_n }}</td>
              <td>{{ $vc->ten_b }} - {{ $vc->hesoluong_b }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_ma_ngach_pdf/'.$ma_n) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_loaibangcap != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Loại bằng cấp</th>
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
                        {{-- <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br> --}}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_lbc }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_lbc_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_lbc != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Loại bằng cấp</th>
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
                        {{-- <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br> --}}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_lbc }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loaibangcap_pdf/'.$ma_lbc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_chucvu != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Loại bằng cấp</th>
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
                        {{-- <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br> --}}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_lbc }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_chucvu_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_cv != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Loại bằng cấp</th>
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
                        {{-- <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br> --}}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_lbc }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_cv_pdf/'.$ma_cv) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_hedaotao != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Hệ đào tạo</th>
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
                        {{-- <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br> --}}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_hdt }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_hdt_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_hedaotao_ma_hdt != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Hệ đào tạo</th>
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
                        {{-- <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br> --}}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_hdt }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_hedaotao_pdf/'.$ma_hdt) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_khoa != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Hệ đào tạo</th>
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
                        {{-- <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br> --}}
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_hdt }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_khoa_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_khoa_ma_k != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_khoa_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_nghihuu != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_nghihuu_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_nghihuu_time != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_nghihuu_time_pdf/'.$batdau.'/'.$ketthuc) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_nghihuu_khoa != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_nghihuu_khoa_pdf/'.$ma_k) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_tinh != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_quequan_all_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($count_quequan_tinh != '')
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_quequan_tinh_pdf/'.$ma_t) }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
  </div>
</div>
<script>
  $(document).ready(function(){
    // Thống kê viên chức theo loại khen thưởng
    new Morris.Bar({
      element: 'myfirstchart_qltt_1',
      pointFillColors: ['#F94A29'],
      parseTime: false,
      hideHover:true,
      barColors: ['#FF6363'],
      data: [
        <?php
          if($count_ngach){
            foreach ($count_ngach as $key => $count){
              foreach($list_ngach as $key => $ngach){
                if($count->ma_n == $ngach->ma_n){
                  $ten_n = $ngach->ten_n;
                  $tong = $count->sum;
                  echo "{ year: '$ten_n', value: $tong },";
                }
              }
            }
          }else if($count_ngach_ma_n){
            foreach ($count_ngach_ma_n as $key => $count){
              foreach($list_ngach as $key => $ngach){
                if($count->ma_n == $ngach->ma_n){
                  $ten_n = $ngach->ten_n;
                  $tong = $count->sum;
                  echo "{ year: '$ten_n', value: $tong },";
                }
              }
            }
          }else if($count_loaibangcap){
            foreach ($count_loaibangcap as $key => $count){
              foreach($list_loaibangcap as $key => $loaibangcap){
                if($count->ma_lbc == $loaibangcap->ma_lbc){
                  $ten_lbc = $loaibangcap->ten_lbc;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lbc', value: $tong },";
                }
              }
            }
          }else if($count_lbc){
            foreach ($count_lbc as $key => $count){
              foreach($list_loaibangcap as $key => $loaibangcap){
                if($count->ma_lbc == $loaibangcap->ma_lbc){
                  $ten_lbc = $loaibangcap->ten_lbc;
                  $tong = $count->sum;
                  echo "{ year: '$ten_lbc', value: $tong },";
                }
              }
            }
          }else if($count_chucvu){
            foreach ($count_chucvu as $key => $count){
              foreach($list_chucvu as $key => $chucvu){
                if($count->ma_cv == $chucvu->ma_cv){
                  $ten_cv = $chucvu->ten_cv;
                  $tong = $count->sum;
                  echo "{ year: '$ten_cv', value: $tong },";
                }
              }
            }
          }else if($count_cv){
            foreach ($count_cv as $key => $count){
              foreach($list_chucvu as $key => $chucvu){
                if($count->ma_cv == $chucvu->ma_cv){
                  $ten_cv = $chucvu->ten_cv;
                  $tong = $count->sum;
                  echo "{ year: '$ten_cv', value: $tong },";
                }
              }
            }
          }else if($count_hedaotao){
            foreach ($count_hedaotao as $key => $count){
              foreach($list_hedaotao as $key => $hedaotao){
                if($count->ma_hdt == $hedaotao->ma_hdt){
                  $ten_hdt = $hedaotao->ten_hdt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_hdt', value: $tong },";
                }
              }
            }
          }else if($count_hedaotao_ma_hdt){
            foreach ($count_hedaotao_ma_hdt as $key => $count){
              foreach($list_hedaotao as $key => $hedaotao){
                if($count->ma_hdt == $hedaotao->ma_hdt){
                  $ten_hdt = $hedaotao->ten_hdt;
                  $tong = $count->sum;
                  echo "{ year: '$ten_hdt', value: $tong },";
                }
              }
            }
          }else if($count_khoa){
            foreach ($count_khoa as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }else if($count_khoa_ma_k){
            foreach ($count_khoa_ma_k as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }else if($count_nghihuu){
            foreach ($count_nghihuu as $key => $count){
              $thoigiannghi_vc = $count->thoigiannghi_vc;
              $tong = $count->sum;
              echo "{ year: '$thoigiannghi_vc', value: $tong },";
            }
          }else if($count_nghihuu_time){
            foreach ($count_nghihuu_time as $key => $count){
              $thoigiannghi_vc = $count->thoigiannghi_vc;
              $tong = $count->sum;
              echo "{ year: '$thoigiannghi_vc', value: $tong },";
            }
          }else if($count_nghihuu_khoa){
            foreach ($count_nghihuu_khoa as $key => $count){
              $thoigiannghi_vc = $count->thoigiannghi_vc;
              $tong = $count->sum;
              echo "{ year: '$thoigiannghi_vc', value: $tong },";
            }
          }else if($count_tinh){
            foreach ($count_tinh as $key => $count){
              foreach($list_tinh as $key => $tinh){
                if($count->ma_t == $tinh->ma_t){
                  $ten_t = $tinh->ten_t;
                  $tong = $count->sum;
                  echo "{ year: '$ten_t', value: $tong },";
                }
              }
            }
          }else if($count_quequan_tinh){
            foreach ($count_quequan_tinh as $key => $count){
              foreach($list_tinh as $key => $tinh){
                if($count->ma_t == $tinh->ma_t){
                  $ten_t = $tinh->ten_t;
                  $tong = $count->sum;
                  echo "{ year: '$ten_t', value: $tong },";
                }
              }
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
