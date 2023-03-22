@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row" role="alert" style="background-color: #3F979B; text-align: center;">
      <div class="col-1">
        <a href="{{ URL::to('file') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_file/'.$edit->ma_f) }}" method="POST"
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
                <th scope="row">Tên file: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="ten_f" value="{{ $edit->ten_f }}">
                </td>
              </tr>
              <tr>
                <th scope="row">File: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-6">
                      <input type='file' class='form-control input_table' name="file_f">
                    </div>
                    <div class="col-6">
                      @if ($edit->file_f != NULL)
                        <a href="{{ asset('public/uploads/file/'.$edit->file_f) }}">
                          <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none; ">
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
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_f">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_f == 1)
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