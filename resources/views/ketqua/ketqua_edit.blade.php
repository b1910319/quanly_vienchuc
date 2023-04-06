@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        @if (isset($vienchuc))
          <a href="{{ URL::to('/ketqua/'.$edit->ma_l.'/'.$edit->ma_vc) }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @else
          <a href="{{ URL::to('ketqua_all') }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @endif
        
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_ketqua/'.$edit->ma_kq) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <input type="hidden" name="ma_vc" value="{{ $edit->ma_vc }}">
              <input type="hidden" name="ma_l" value="{{ $edit->ma_l }}">
              <tr>
                <th scope="row">Tên người hướng dẫn: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="tennguoihuongdan_kq" value="{{ $edit->tennguoihuongdan_kq }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Email người hướng dẫn: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="emailnguoihuongdan_kq" value="{{ $edit->emailnguoihuongdan_kq }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Nội dung đào tạo: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="noidungaotao_kq" value="{{ $edit->noidungaotao_kq }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Văn bằng, chứng chỉ được cấp: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="bangduoccap_kq" value="{{ $edit->bangduoccap_kq }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày cấp bằng: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ngaycapbang_kq" value="{{ $edit->ngaycapbang_kq }}">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Kết quả xếp loại: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="xeploai_kq" value="{{ $edit->xeploai_kq }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Đề tài tốt nghiệp: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="detaitotnghiep_kq" value="{{ $edit->detaitotnghiep_kq }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày về nước: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ngayvenuoc_kq" value="{{ $edit->ngayvenuoc_kq }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Đánh giá của cơ sở đào tạo: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="danhgiacuacoso_kq" value="{{ $edit->danhgiacuacoso_kq }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Kiến nghị, đề xuất: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="kiennghi_kq" value="{{ $edit->kiennghi_kq }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_kq">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_dt == 1)
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
            <button type="submit" class="btn btn-warning button_cam" style="width: 100%">
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