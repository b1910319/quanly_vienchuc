@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row" role="alert">
      <a href="{{ URL::to('/lop') }}" class="col-1">
        <button type="button" class="btn btn-warning">
          <i class="fas fa-solid fa-caret-left"></i>&ensp;
        </button> &ensp;
      </a>
      <h4 class="text-center col-10 mt-1" style="font-weight: bold">CẬP NHẬT THÔNG TIN</h4>
    </div>
    <form action="{{ URL::to('/update_lop/'.$edit->ma_l) }}" method="POST"
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
                <th scope="row">Danh mục lớp: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_dml">
                    <option value="0" >Chọn danh mục lớp</option>
                    @foreach ($list_danhmuclop as $danhmuclop )
                      <option
                        @if ($danhmuclop->ma_dml == $edit->ma_dml)
                          selected
                        @endif
                        value="{{ $danhmuclop->ma_dml }}" >{{ $danhmuclop->ten_dml }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Tên lớp học: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="ten_l" value="{{ $edit->ten_l }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày bắt đầu lớp học: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ngaybatdau_l" value="{{ $edit->ngaybatdau_l }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày kết thức lớp học: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ngayketthuc_l" value="{{ $edit->ngayketthuc_l }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Cơ sở đào tạo: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="tencosodaotao_l" value="{{ $edit->tencosodaotao_l }}"> 
                </td>
              </tr>
              <tr>
                <th scope="row">Quốc gia đào tạo: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="quocgiaodaotao_l" value="{{ $edit->quocgiaodaotao_l }}">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Ngành học: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="nganhhoc_l" value="{{ $edit->nganhhoc_l }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Trình độ đào tạo: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="trinhdodaotao_l" value="{{ $edit->trinhdodaotao_l }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Nguồn kinh phí: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="nguonkinhphi_l" value="{{ $edit->nguonkinhphi_l }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Địa chỉ đào tạo: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="diachidaotao_l" value="{{ $edit->diachidaotao_l }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Email cơ sở: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="emailcoso_l" value="{{ $edit->emailcoso_l }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Số điện thoại cơ sở: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="sdtcoso_l" value="{{ $edit->sdtcoso_l }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_l">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_l == 1)
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