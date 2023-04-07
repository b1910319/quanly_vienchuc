@extends('layout')
@section('content')
  <div class="row">
    <div class="col-2 card-box">
      <div class="row">
        <a href="{{ URL::to('thongtin_canhan') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Thông tin viên chức</button>
        </a>
        <a href="{{ URL::to('thongtin_giadinh') }}" class="mt-2">
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Gia đình</button>
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
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Lớp học tham gia</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-success row color_alert" role="alert">
        <a href="{{ URL::to('/thongtin_giadinh') }}" class="col-1">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
        <h4 class="text-center col-10 mt-1" style=" color: white; text-align: center; font-weight: bold; font-size: 20px">________CẬP NHẬT THÔNG TIN GIA ĐÌNH VIÊN CHỨC________</h4>
      </div>
      <form action="{{ URL::to('/update_thongtin_giadinh/'.$edit->ma_gd) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
          <div class="col-6">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Mối quan hệ: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="moiquanhe_gd" value="{{ $edit->moiquanhe_gd }}">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Họ tên: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="hoten_gd" value="{{ $edit->hoten_gd }}">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Số điện thoại: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="sdt_gd" value="{{ $edit->sdt_gd }}"> 
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-6">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Ngày sinh: </th>
                  <td class="was-validated">
                    <input type='date' class='form-control input_table' autofocus required name="ngaysinh_gd" value="{{ $edit->ngaysinh_gd }}">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Nghề nghiệp: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="nghenghiep_gd" value="{{ $edit->nghenghiep_gd }}">
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row mb-2">
            <div class="col-5"></div>
            <div class="col-2">
              <button type="submit" class="btn btn-warning button_cam" style="width: 100%;">
                <i class="fa-solid fa-pen-to-square text-light"></i>
                &ensp; Cập nhật
              </button>
            </div>
            <div class="col-5"></div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection