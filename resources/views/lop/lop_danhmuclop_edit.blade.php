@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row" role="alert" style="background-color: #3F979B; text-align: center;">
      <div class="col-1">
        <a href="{{ URL::to('/lop_danhmuclop/'.$edit->ma_dml) }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_lop_danhmuclop/'.$edit->ma_l.'/'.$edit->ma_dml) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
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
                <th scope="row">Quốc gia đào tạo: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_qg">
                    <option value="0" >Chọn quốc gia đào tạo</option>
                    @foreach ($list_quocgia as $quocgia )
                      <option
                        @if ($quocgia->ma_qg == $edit->ma_qg)
                          selected
                        @endif
                        value="{{ $quocgia->ma_qg }}" >{{ $quocgia->ten_qg }}</option>
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
                <th scope="row">Yêu cầu lớp học: </th>
                <td class="was-validated">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="yeucau_l">
                    {{ $edit->yeucau_l }}
                  </textarea>
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
                <th scope="row">Nội dung học: </th>
                <td class="was-validated">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="noidunghoc_l">
                    {{ $edit->noidunghoc_l }}
                  </textarea>
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