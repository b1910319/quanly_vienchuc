@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row" role="alert">
      <a href="{{ URL::to('/giadinh/'.$edit->ma_vc) }}" class="col-1">
        <button type="button" class="btn btn-warning">
          <i class="fas fa-solid fa-caret-left"></i>&ensp;
        </button> &ensp;
      </a>
      <h4 class="text-center col-10 mt-1" style="font-weight: bold">CẬP NHẬT THÔNG TIN</h4>
    </div>
    <form action="{{ URL::to('/update_giadinh/'.$edit->ma_gd.'/'.$edit->ma_vc) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <?php
        $message=session()->get('message');
        if($message){
          ?>
            <p style="color: #379237" class="font-weight-bold text-center">
              <?php echo $message ?>
            </p>
          <?php
          session()->put('message',null);
        }
      ?>
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
                <tr>
                  <th scope="row">Viên chức: </th>
                  <td class="was-validated">
                    <select class="custom-select input_table" id="gender2" name="ma_vc">
                      <option value="0" >Chọn ngạch</option>
                      @foreach ($list_vienchuc as $vienchuc )
                        <option
                          @if ($vienchuc->ma_vc == $edit->ma_vc)
                            selected
                          @endif
                          value="{{ $vienchuc->ma_vc }}" >{{ $vienchuc->hoten_vc }}</option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_gd">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_gd == 1)
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
          <div class="col-6"></div>
          <div class="col-6">
            <button type="submit" class="btn btn-outline-success font-weight-bold">
              <i class="fa-solid fa-pen-to-square"></i>
              Cập nhật
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection