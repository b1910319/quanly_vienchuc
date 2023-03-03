@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row" role="alert">
      <a href="{{ URL::to('/dunghoc/'.$edit->ma_l.'/'.$edit->ma_vc) }}" class="col-1">
        <button type="button" class="btn btn-warning">
          <i class="fas fa-solid fa-caret-left"></i>&ensp;
        </button> &ensp;
      </a>
      <h4 class="text-center col-10 mt-1" style="font-weight: bold">CẬP NHẬT THÔNG TIN</h4>
    </div>
    <form action="{{ URL::to('/update_dunghoc/'.$edit->ma_dh) }}" method="POST"
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
              <input type="hidden" name="ma_vc" value="{{ $edit->ma_vc }}">
              <input type="hidden" name="ma_l" value="{{ $edit->ma_l }}">
              <tr>
                <th scope="row">Ngày bắt đầu tạm dừng học: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="batdau_dh" value="{{ $edit->batdau_dh }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày kết thúc tạm dừng học: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ketthuc_dh" value="{{ $edit->ketthuc_dh }}">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Lý do tạm dừng học: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="lydo_dh" value="{{ $edit->lydo_dh }}">
                </td>
              </tr>
              <tr>
                <th scope="row">File tạm dừng: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-6">
                      <input type='file' class='form-control input_table' name="file_dh">
                    </div>
                    <div class="col-6">
                      @if ($edit->file_dh != ' ')
                        <a href="{{ asset('public/uploads/dunghoc/'.$edit->file_dh) }}">
                          <button type="button" class="btn btn-warning" style="background-color: #77D970; border: none;">
                            <i class="fa-solid fa-file"></i>
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
                  <select class="custom-select input_table" id="gender2" name="status_dh">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_dh == 1)
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