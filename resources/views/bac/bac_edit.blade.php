@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert" >
      <div class="col-1">
        <a href="{{ URL::to('bac') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_bac/'.$edit->ma_b) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Tên bậc: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="ten_b" value="{{ $edit->ten_b }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Hệ số lương: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="hesoluong_b" value="{{ $edit->hesoluong_b }}">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Ngạch: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_n" required>
                    <option value="" >Chọn ngạch</option>
                    @foreach ($list_ngach as $ngach )
                      <option
                        @if ($ngach->ma_n == $edit->ma_n)
                          selected
                        @endif
                        value="{{ $ngach->ma_n }}" >{{ $ngach->ten_n }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_b">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_b == 1)
                      <option selected value="1" >Ẩn</option>
                      <option value="0" >Hiển thị</option>
                    @else
                      <option value="0" selected >Hiển thị</option>
                      <option value="1" >Ẩn</option>
                    @endif
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row mb-2">
          <div class="col-5"></div>
          <div class="col-2">
            <button type="submit" class="btn btn-warning button_cam" style=" width: 100%">
              <i class="fa-solid fa-pen-to-square text-light"></i>
              &ensp; Cập nhật
            </button>
          </div>
          <div class="col-5"></div>
        </div>
      </div>
    </form>
  </div>
@endsection