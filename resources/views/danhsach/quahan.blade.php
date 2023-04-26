@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="row ">
      <div class="alert alert-success color_alert" role="alert">
        <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
          ________DANH SÁCH VIÊN CHỨC QUÁ HẠN CHƯA VỀ NƯỚC________
        </h4>
      </div>
      @foreach ($list_lop_quahan as $key => $lop_quahan )
        <button type="button" class="btn btn-light mt-3 bg-icon-success" data-toggle="collapse" data-target="#demo{{ $key+1 }}" style="width: 100%">
          <div class="row">
            <div class="col-11" style="font-weight: bold;">
              {{ $lop_quahan->ten_l }}
            </div>
            <div class="col-1">
              <i class="fa-solid fa-angle-down"></i>
            </div>
          </div>
        </button>
        <div id="demo{{ $key+1 }}" class="collapse mt-2">
          <table class="table" id="mytable{{ $key+1 }}">
            <thead class="color_table">
              <tr>
                <th class="text-light" scope="col">Thông tin viên chức</th>
                <th class="text-light" scope="col">Ngày về nước</th>
                <th></th>
              </tr>
            </thead>
            <tbody  >
              @foreach ($list_vienchuc_quahan as $key => $vienchuc)
                @if ($vienchuc->ma_l == $lop_quahan->ma_l)
                  <tr >
                    <td>
                      <b>- Họ tên viên chức: </b>{{ $vienchuc->hoten_vc }} ({{ $vienchuc->ma_vc }}) <br>
                      <b>- Email: </b>{{ $vienchuc->user_vc }} <br>
                      <b>- Số điện thoại: </b>{{ $vienchuc->sdt_vc }} <br>
                      <b>- Khoa: </b> {{ $vienchuc->ten_k }}
                    </td>
                    <td>
                      {{ $vienchuc->ngayvenuoc_kq }}
                    </td>
                    <td style="width: 22%">
                      <a href="{{ URL::to('guimail_quahan/'.$vienchuc->ma_vc.'/'.$vienchuc->ma_l) }}">
                        <button type="button" class="btn btn-primary fw-bold">
                          <i class="fa-solid fa-paper-plane text-light"></i>
                          &ensp;
                          Gửi mail
                        </button>
                      </a>
                      <a href="{{ URL::to('davenuoc/'.$vienchuc->ma_vc.'/'.$vienchuc->ma_l) }}">
                        <button type="button" class="btn btn-primary button_xanhla">
                          <i class="fa-solid fa-circle-check text-light"></i>
                          &ensp;
                          Đã về nước
                        </button>
                      </a>
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
        {{-- <div class="alert alert-primary fw-bold text-center mt-3" role="alert">
          {{ $lop_quahan->ten_l }}
        </div>
        <table class="table" id="mytable{{ $key+1 }}">
          <thead class="color_table">
            <tr>
              <th class="text-light" scope="col">Thông tin viên chức</th>
              <th class="text-light" scope="col">Ngày về nước</th>
              <th></th>
            </tr>
          </thead>
          <tbody  >
            @foreach ($list_vienchuc_quahan as $key => $vienchuc)
              @if ($vienchuc->ma_l == $lop_quahan->ma_l)
                <tr >
                  <td>
                    <b>- Họ tên viên chức: </b>{{ $vienchuc->hoten_vc }} ({{ $vienchuc->ma_vc }}) <br>
                    <b>- Email: </b>{{ $vienchuc->user_vc }} <br>
                    <b>- Số điện thoại: </b>{{ $vienchuc->sdt_vc }} <br>
                    <b>- Khoa: </b> {{ $vienchuc->ten_k }}
                  </td>
                  <td>
                    {{ $vienchuc->ngayvenuoc_kq }}
                  </td>
                  <td style="width: 22%">
                    <a href="">
                      <button type="button" class="btn btn-primary fw-bold">
                        <i class="fa-solid fa-paper-plane text-light"></i>
                        &ensp;
                        Gửi mail
                      </button>
                    </a>
                    <a href="">
                      <button type="button" class="btn btn-primary button_xanhla">
                        <i class="fa-solid fa-circle-check text-light"></i>
                        &ensp;
                        Đã về nước
                      </button>
                    </a>
                  </td>
                </tr>
              @endif
              
            @endforeach
          </tbody>
        </table> --}}
      @endforeach
      
    </div>
  </div>
</div>

@endsection
