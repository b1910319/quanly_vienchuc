@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row" role="alert" style="background-color: #3F979B; text-align: center;">
      <div class="col-1">
        <a href="{{ URL::to('/vienchuc_khoa/'.$edit->ma_k) }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/admin_update_vienchuc_khoa/'.$edit->ma_k.'/'.$edit->ma_vc) }}" method="POST"
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
                <th scope="row">Họ tên viên chức: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="hoten_vc" minlength="5" value="{{ $edit->hoten_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_vc">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_vc == 1)
                      <option selected value="1" >Vô hiệu hoá</option>
                      <option value="0" >Kích hoạt</option>
                    @else
                      @if ($edit->status_vc == 0)
                        <option  value="1" >Vô hiệu hoá</option>
                        <option selected value="0" >Kích hoạt</option>
                      @endif
                    @endif
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Email: </th>
                <td class="was-validated">
                  <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_vc" value="{{ $edit->user_vc }}">
                  </div>
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