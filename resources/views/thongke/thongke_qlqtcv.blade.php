@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-12">
    <div class="row">
      <p class="fw-bold" style="font-size: 18px;">Thống kê quá trình chức vụ của viên chức </p>
    </div>
    <div class="row">
      <div class="col-2">
        <button type="button" class="btn btn-primary button_loc" data-bs-toggle="modal" data-bs-target="#exampleModal1" style="width: 100%;">
          <i class="fa-solid fa-filter text-light"></i>
          &ensp;
          Qúa trình chức vụ
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
              <form action="{{ URL::to('thongke_qlqtcv_loc') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                  <div class="row">
                    <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                    @foreach ($list_khoa as $key => $khoa)
                      <div class="col-3">
                        <input type="radio" class="radio" name="ma_k" id="size_{{ $key+200 }}" value="{{ $khoa->ma_k }}"/>
                        <label class="label" for="size_{{ $key+200 }}">{{ $khoa->ten_k }}</label>
                      </div>
                    @endforeach
                  </div>
                  <div class="row mt-1">
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Chức vụ</span>
                      <div class="mt-1">
                        <select class="custom-select input_table"  name="ma_cv">
                          <option value="" >Chọn chức vụ</option>
                          @foreach ($list_chucvu as $chucvu)
                            <option value="{{ $chucvu->ma_cv }}" >{{ $chucvu->ten_cv }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <span style="font-weight: bold; font-size: 20px;">Nhiệm kỳ</span>
                      <div class="mt-1">
                        <select class="custom-select input_table"  name="ma_nk">
                          <option value="" >Chọn nhiệm kỳ</option>
                          @foreach ($list_nhiemky as $nhiemky)
                            <option value="{{ $nhiemky->ma_nk }}" >{{ $nhiemky->ten_nk }}</option>
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
                  <button type="submit" class="btn btn-primary button_loc">
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
        <a href="{{ URL::to('thongke_qlqtcv') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%; ">
            <i class="fa-solid fa-rotate"></i>
            &ensp;
            Làm mới
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
    <div id="myfirstchart_qlktkl" style="height: 250px;">
    </div>
    @if (isset($list_pdf))
      <div class="alert alert-light color_alert" role="alert" >
        ________THÔNG TIN QUÁ TRÌNH CHỨC VỤ CỦA VIÊN CHỨC________
      </div>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức </th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Thông tin quá trình chức vụ</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_pdf as $key => $vc)
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
                        <b> Chức vụ:</b> {{ $vc->ten_cv }} <br>
                        <b> Nhiệm kỳ:</b> {{ $vc->ten_nk }} <br>
                        <b> Ghi chú: </b> {{ $vc->ghichu_qtcv }} <br>
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
          <a href="{{ URL::to('/thongke_qlqtcv_pdf') }}">
            <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
        </div>
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qlqtcv_excel') }}">
            <button type="button" class="btn btn-warning button_xanhla" style=" width: 100%;">
              <i class="fa-solid fa-file-excel text-light"></i>
              &ensp;
              Xuất file Excel
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
      barColors: ['#379237'],
      data: [
        <?php
          if(isset($count_nhiemky_chucvu) ){
            foreach ($count_nhiemky_chucvu as $key => $count){
              foreach($list_nhiemky as $key => $nhiemky){
                foreach($list_chucvu as $key => $chucvu){
                  if($count->ma_nk == $nhiemky->ma_nk && $count->ma_cv == $chucvu->ma_cv){
                    $ten_nk = $nhiemky->ten_nk;
                    $ten_cv = $chucvu->ten_cv;
                    $tong = $count->sum;
                    echo "{ year: '$ten_nk ($ten_cv)', value: $tong },";
                  }
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
