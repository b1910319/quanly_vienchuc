@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row" role="alert" style="background-color: #3F979B; text-align: center;">
      <div class="col-1">
        <a href="{{ URL::to('/quyetdinh/'.$edit->ma_l.'/'.$edit->ma_vc) }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_quyetdinh/'.$edit->ma_qd) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <input type="hidden" name="ma_vc" value="{{ $edit->ma_vc }}">
              <input type="hidden" name="ma_l" value="{{ $edit->ma_l }}">
              <tr>
                <th scope="row">Số quyết định: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="so_qd" value="{{ $edit->so_qd }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày ký quyết định: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ngayky_qd" value="{{ $edit->ngayky_qd }}">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">File quyết định: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-6">
                      <input type='file' class='form-control input_table' name="file_qd">
                    </div>
                    <div class="col-6">
                      @if ($edit->file_qd != ' ')
                        <a href="{{ asset('public/uploads/quyetdinh/'.$edit->file_qd) }}">
                          <button type="button" class="btn btn-warning fw-bold" style="background-color: #379237; border: none;">
                            <i class="fa-solid fa-file"></i>
                            &ensp;
                            File
                          </button>
                        </a>
                      @else
                        Không có file
                      @endif
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_qd">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_qd == 1)
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
            <button type="submit" class="btn btn-warning fw-bold" style="background-color: #FC7300; width: 100%">
              <i class="fa-solid fa-pen-to-square"></i>
              &ensp; Cập nhật
            </button>
          </div>
          <div class="col-5"></div>
        </div>
      </div>
    </form>
  </div>
@endsection