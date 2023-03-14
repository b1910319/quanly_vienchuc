@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-12">
    <div class="row">
      <div class="col-12">
        <p class="fw-bold" style="font-size: 18px;">Thống kê thông tin khen thưởng, kỷ luật của viên chức </p>
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
                      <input type="radio" class="radio" name="hoanthanh" id="size_1" value=""/>
                      <label class="label" for="size_1">
                        Hoàn thành khoá học
                      </label>
                    </div>
                    <div class="col-6">
                      <input type="radio" class="radio" name="giahan" id="size_2" value=""/>
                      <label class="label" for="size_2">
                        Xin gia hạn
                      </label>
                    </div>
                    <div class="col-6">
                      <input type="radio" class="radio" name="tamdung" id="size_3" value=""/>
                      <label class="label" for="size_3">
                        Xin tạm dừng
                      </label>
                    </div>
                    <div class="col-6">
                      <input type="radio" class="radio" name="xinchuyen" id="size_4" value=""/>
                      <label class="label" for="size_4">
                        Xin chuyển
                      </label>
                    </div>
                    <div class="col-6">
                      <input type="radio" class="radio" name="thoihoc" id="size_5" value=""/>
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
        <a href="{{ URL::to('thongke_qlktkl') }}">
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
          }
          //else if($count_5){
          //   foreach ($count_5 as $key => $count){
          //     foreach($list_hinhthuckhenthuong as $key => $hinhthuckhenthuong){
          //       if($count->ma_htkt == $hinhthuckhenthuong->ma_htkt){
          //         $ten_htkt = $hinhthuckhenthuong->ten_htkt;
          //         $ngay_kt = $count->ngay_kt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ngay_kt ($ten_htkt)', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_6){
          //   foreach ($count_6 as $key => $count){
          //     foreach($list_khoa as $key => $khoa){
          //       if($count->ma_k == $khoa->ma_k){
          //         $ten_k = $khoa->ten_k;
          //         $ngay_kt = $count->ngay_kt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ngay_kt ($ten_k)', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_7){
          //   foreach ($count_7 as $key => $count){
          //     foreach($list_khoa as $key => $khoa){
          //       if($count->ma_k == $khoa->ma_k){
          //         $ten_k = $khoa->ten_k;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_k', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_8){
          //   foreach ($count_8 as $key => $count){
          //     foreach($list_loaikhenthuong as $key => $loaikhenthuong){
          //       if($count->ma_lkt == $loaikhenthuong->ma_lkt){
          //         $ten_lkt = $loaikhenthuong->ten_lkt;
          //         $ngay_kt = $count->ngay_kt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ngay_kt ($ten_lkt)', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_9){
          //   foreach ($count_9 as $key => $count){
          //     foreach($list_loaikhenthuong as $key => $loaikhenthuong){
          //       if($count->ma_lkt == $loaikhenthuong->ma_lkt){
          //         $ten_lkt = $loaikhenthuong->ten_lkt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lkt', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_10){
          //   foreach ($count_10 as $key => $count){
          //     foreach($list_loaikhenthuong as $key => $loaikhenthuong){
          //       if($count->ma_lkt == $loaikhenthuong->ma_lkt){
          //         $ten_lkt = $loaikhenthuong->ten_lkt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lkt', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_11){
          //   foreach ($count_11 as $key => $count){
          //     foreach($list_loaikhenthuong as $key => $loaikhenthuong){
          //       if($count->ma_lkt == $loaikhenthuong->ma_lkt){
          //         $ten_lkt = $loaikhenthuong->ten_lkt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lkt', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_12){
          //   foreach ($count_12 as $key => $count){
          //     foreach($list_khoa as $key => $khoa){
          //       if($count->ma_k == $khoa->ma_k){
          //         $ten_k = $khoa->ten_k;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_k', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_13){
          //   foreach ($count_13 as $key => $count){
          //     foreach($list_hinhthuckhenthuong as $key => $hinhthuckhenthuong){
          //       if($count->ma_htkt == $hinhthuckhenthuong->ma_htkt){
          //         $ten_htkt = $hinhthuckhenthuong->ten_htkt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_htkt', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_14){
          //   foreach($count_14 as $count){
          //     $ngay_kt = $count->ngay_kt;
          //     $tong = $count->sum;
          //     echo "{ year: '$ngay_kt', value: $tong },";
          //   }
          // }else if($count_kl_all ){
          //   foreach ($count_kl_all as $key => $count){
          //     foreach($list_loaikyluat as $key => $loaikyluat){
          //       if($count->ma_lkl == $loaikyluat->ma_lkl){
          //         $ten_lkl = $loaikyluat->ten_lkl;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lkl', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_kl_2){
          //   foreach ($count_kl_2 as $key => $count){
          //     foreach($list_khoa as $key => $khoa){
          //       if($count->ma_k == $khoa->ma_k){
          //         $ten_k = $khoa->ten_k;
          //         $ngay_kl = $count->ngay_kl;
          //         $tong = $count->sum;
          //         echo "{ year: '$ngay_kl ($ten_k)', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_kl_3){
          //   foreach ($count_kl_3 as $key => $count){
          //     foreach($list_loaikyluat as $key => $loaikyluat){
          //       if($count->ma_lkl == $loaikyluat->ma_lkl){
          //         $ten_lkl = $loaikyluat->ten_lkl;
          //         $ngay_kl = $count->ngay_kl;
          //         $tong = $count->sum;
          //         echo "{ year: '$ngay_kl ($ten_lkl)', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_kl_4){
          //   foreach ($count_kl_4 as $key => $count){
          //     foreach($list_loaikyluat as $key => $loaikyluat){
          //       if($count->ma_lkl == $loaikyluat->ma_lkl){
          //         $ten_lkl = $loaikyluat->ten_lkl;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lkl', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_kl_5){
          //   foreach ($count_kl_5 as $key => $count){
          //     foreach($list_khoa as $key => $khoa){
          //       if($count->ma_k == $khoa->ma_k){
          //         $ten_k = $khoa->ten_k;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_k', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_kl_6){
          //   foreach ($count_kl_6 as $key => $count){
          //     foreach($list_loaikyluat as $key => $loaikyluat){
          //       if($count->ma_lkl == $loaikyluat->ma_lkl){
          //         $ten_lkl = $loaikyluat->ten_lkl;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lkl', value: $tong },";
          //       }
          //     }
          //   }
          // }else if($count_kl_7){
          //   foreach ($count_kl_7 as $key => $count){
          //     $ngay_kl = $count->ngay_kl;
          //     $tong = $count->sum;
          //     echo "{ year: '$ngay_kl', value: $tong },";
          //   }
          // }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
  })
</script>
@endsection
