@extends('layout')
@section('content')
  <div class="row">
    <div class="col-2 card-box">
      <div class="row">
        <a href="{{ URL::to('thongtin_canhan') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Thông tin viên chức</button>
        </a>
        <a href="{{ URL::to('thongtin_giadinh') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Gia đình</button>
        </a>
        <a href="{{ URL::to('thongtin_bangcap') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Bằng cấp</button>
        </a>
        <a href="{{ URL::to('thongtin_khenthuong') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Khen thưởng</button>
        </a>
        <a href="{{ URL::to('thongtin_kyluat') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Kỷ luật</button>
        </a>
        <a href="{{ URL::to('thongtin_lophoc') }}" class="mt-2">
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Lớp học tham gia</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light color_alert row" role="alert">
        <div class="col-1">
          <a href="{{ URL::to('thongtin_lophoc') }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        </div>
        <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
          ________THÊM KẾT QUẢ QUÁ TRÌNH HỌC________
        </h4>
      </div>
      <form action="{{ URL::to('/vienchuc_add_ketqua') }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="status_kq" value="1">
        <input type="hidden" name="ma_l" value="{{ $ma_l }}">
        <div class="row">
          <div class="col-6">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Tên người hướng dẫn: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="tennguoihuongdan_kq">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Email người hướng dẫn: </th>
                  <td class="was-validated">
                    <input type='email' class='form-control input_table' autofocus required name="emailnguoihuongdan_kq">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Nội dung đào tạo: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="noidungaotao_kq">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Văn bằng, chứng chỉ được cấp: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="bangduoccap_kq">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Ngày cấp bằng: </th>
                  <td class="was-validated">
                    <input type='date' class='form-control input_table' autofocus required name="ngaycapbang_kq">
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
                    <input type='text' class='form-control input_table' autofocus required name="xeploai_kq">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Đề tài tốt nghiệp: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="detaitotnghiep_kq">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Ngày về nước: </th>
                  <td class="was-validated">
                    <input type='date' class='form-control input_table' autofocus required name="ngayvenuoc_kq">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Đánh giá của cơ sở đào tạo: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="danhgiacuacoso_kq">
                  </td>
                </tr>
                <tr>
                  <th scope="row">Kiến nghị, đề xuất: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="kiennghi_kq">
                  </td>
                </tr>
                <tr>
                  <th scope="row">File kết quả: </th>
                  <td class="was-validated">
                    <input type='file' class='form-control input_table' name="file_kq" required>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row mb-2">
            <div class="col-5"></div>
            <div class="col-2">
              <button type="submit"  class="btn btn-primary button_xanhla them" style="width: 100%;">
                <i class="fas fa-plus-square text-light"></i>
                &ensp;
                Thêm
              </button>
            </div>
            <div class="col-5"></div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection