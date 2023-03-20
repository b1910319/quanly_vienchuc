@extends('layout')
@section('content')
  <div class="row">
    <div class="col-2 card-box">
      <div class="row">
        <a href="{{ URL::to('thongtin_canhan') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Thông tin viên chức</button>
        </a>
        <a href="{{ URL::to('thongtin_giadinh') }}" class="mt-2">
          <button type="button" class="btn btn-success fw-bold" style="background-color: #81B214; border: #81B214;width: 100%">Gia đình</button>
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
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Lớp học tham gia</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold;">
        THÔNG TIN GIA ĐÌNH VIÊN CHỨC
      </div>
      <div class="row">
        <div class="faqs-page block ">
          <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <button role="button" class="item-question collapsed btn btn-primary fw-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237; border: none">
                <i class="fas fa-plus-square"></i>
                &ensp; Thêm
              </button>
              <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_lop') }}">
                <button type="button" class="btn btn-danger fw-bold" style="background-color: #FF1E1E">
                  <i class="fa-solid fa-trash"></i>
                  &ensp;
                  Xoá tất cả
                </button>
              </a>
              <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
                <div class="panel-body mt-3">
                  <form action="{{ URL::to('/add_thongtin_giadinh') }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <?php
                      $message=session()->get('message');
                      if($message){
                        ?>
                          <p style="color: #379237" class="fw-bold text-center">
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
                                <input type='text' class='form-control input_table' autofocus required name="moiquanhe_gd">
                              </td>
                            </tr>
                            <tr>
                              <th scope="row">Họ tên: </th>
                              <td class="was-validated">
                                <input type='text' class='form-control input_table' autofocus required name="hoten_gd">
                              </td>
                            </tr>
                            <tr>
                              <th scope="row">Số điện thoại: </th>
                              <td class="was-validated">
                                <input type='text' class='form-control input_table' autofocus required name="sdt_gd">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-6">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th scope="row">Ngày sinh: </th>
                              <td class="was-validated">
                                <input type='date' class='form-control input_table' autofocus required name="ngaysinh_gd">
                              </td>
                            </tr>
                            <tr>
                              <th scope="row">Nghề nghiệp: </th>
                              <td class="was-validated">
                                <input type='text' class='form-control input_table' autofocus required name="nghenghiep_gd">
                              </td>
                            </tr>
                            <tr>
                              <th scope="row">Trạng thái: </th>
                              <td class="was-validated">
                                <select class="custom-select input_table" id="gender2" name="status_gd">
                                  <option value="0" >Chọn trạng thái</option>
                                  <option value="1" >Ẩn</option>
                                  <option selected value="0" >Hiển thị</option>
                                </select>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="row mb-2">
                        <div class="col-6"></div>
                        <div class="col-6">
                          <button type="submit"  class="btn btn-primary font-weight-bold" style="background-color: #379237; border: none;">
                            <i class="fas fa-plus-square"></i>
                            &ensp;
                            Thêm
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row ">
        <div class="mt-3"></div>
        <?php
          $message=session()->get('message_update');
          if($message){
            ?>
              <p style="color: #379237" class="fw-bold text-center">
                <?php echo $message ?>
              </p>
            <?php
            session()->put('message_update',null);
          }
        ?>
        <div class="row">
        </div>
        <table class="table" id="mytable">
          <thead class="table-dark">
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Mối quan hệ</th>
              <th scope="col">Họ tên</th>
              <th scope="col">Số điện thoại</th>
              <th scope="col">Ngày sinh</th>
              <th scope="col">Nghề nghiệp</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody  >
            @foreach ($list as $key => $giadinh)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td>
                  {{ $giadinh->moiquanhe_gd }}
                </td>
                <td>
                  {{ $giadinh->hoten_gd }}
                </td>
                <td>
                  {{ $giadinh->sdt_gd }}
                </td>
                <td>
                  {{ $giadinh->ngaysinh_gd }}
                </td>
                <td>
                  {{ $giadinh->nghenghiep_gd }}
                </td>
                <td style="width: 18%;">
                  <a href="{{ URL::to('/thongtin_giadinh_edit/'.$giadinh->ma_gd)}}">
                    <button type="button" class="btn btn-warning fw-bold" style="background-color: #FC7300">
                      <i class="fa-solid fa-pen-to-square"></i>
                      &ensp; Cập nhật
                    </button>
                  </a>
                  <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/thongtin_giadinh_delete/'.$giadinh->ma_gd)}}">
                    <button type="button" class="btn btn-danger fw-bold" style="background-color: #FF1E1E"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection