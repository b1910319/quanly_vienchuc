@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('/khenthuong_add/'.$ma_vc) }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_khenthuong/'.$edit->ma_kt.'/'.$edit->ma_vc) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Loại khen thưởng: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_lkt">
                    <option value="0" >Chọn loại khen thưởng</option>
                    @foreach ($list_loaikhenthuong as $loaikhenthuong )
                      <option
                      @if ($edit->ma_lkt == $loaikhenthuong->ma_lkt)
                        selected
                      @endif
                        value="{{ $loaikhenthuong->ma_lkt }}" >{{ $loaikhenthuong->ten_lkt }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Hình thức khen thưởng: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_htkt">
                    <option value="0" >Chọn hình thức khen thưởng</option>
                    @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong )
                      <option 
                        @if ($edit->ma_htkt == $hinhthuckhenthuong->ma_htkt)
                          selected
                        @endif
                        value="{{ $hinhthuckhenthuong->ma_htkt }}" >{{ $hinhthuckhenthuong->ten_htkt }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày khen thưởng: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ngay_kt" value="{{ $edit->ngay_kt }}">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Nội dung khen thưởng: </th>
                <td class="was-validated">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="noidung_kt">
                    {{ $edit->noidung_kt }}
                  </textarea>
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_kt">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_kt == 1)
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