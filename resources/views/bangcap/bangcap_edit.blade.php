@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert" >
      <div class="col-1">
        <a href="{{ URL::to('/bangcap/'.$ma_vc) }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_bangcap/'.$edit->ma_bc.'/'.$ma_vc) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Hệ đào tạo: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_hdt">
                    <option value="0" >Chọn hệ đào tạo</option>
                    @foreach ($list_hedaotao as $hedaotao)
                      <option
                        @if ($hedaotao->ma_hdt == $edit->ma_hdt)
                          selected
                        @endif
                        value="{{ $hedaotao->ma_hdt }}" >{{ $hedaotao->ten_hdt }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Loại bằng cấp: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_lbc">
                    <option value="0" >Chọn loại bằng cấp</option>
                    @foreach ($list_loaibangcap as $loaibangcap)
                      <option
                        @if ($loaibangcap->ma_lbc == $edit->ma_lbc)
                          selected
                        @endif
                        value="{{ $loaibangcap->ma_lbc }}" >{{ $loaibangcap->ten_lbc }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Trình độ chuyên môn: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="trinhdochuyenmon_bc" value="{{ $edit->trinhdochuyenmon_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Trường học: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="truonghoc_bc" value="{{ $edit->truonghoc_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Niên khoá: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="nienkhoa_bc" value="{{ $edit->nienkhoa_bc }}">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Số bằng: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="sobang_bc" value="{{ $edit->sobang_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày cấp bằng: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ngaycap_bc" value="{{ $edit->ngaycap_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Nơi cấp: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="noicap_bc" value="{{ $edit->noicap_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Xếp hạng: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="xephang_bc" value="{{ $edit->xephang_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_bc">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_bc == 1)
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