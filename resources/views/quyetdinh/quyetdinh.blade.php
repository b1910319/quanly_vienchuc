@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
            <i class="fa-solid fa-circle-plus"></i> &ensp; Thêm
          </button>
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <div class="alert alert-primary" role="alert">
                <h4 class="text-center" style="font-weight: bold">THÊM THÔNG TIN</h4>
              </div>
              <form action="{{ URL::to('/add_quyetdinh') }}" method="POST"
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
                        @if ($vienchuc != '' && $lop != '')
                          <input type="hidden" name="ma_vc" value="{{ $vienchuc->ma_vc }}">
                          <input type="hidden" name="ma_l" value="{{ $lop->ma_l }}">
                        @else
                          <tr>
                            <th scope="row">Viên chức: </th>
                            <td class="was-validated">
                              <select class="custom-select input_table" id="gender2" name="ma_vc">
                                <option value="0" >Chọn viên chức</option>
                                @foreach ($list_vienchuc as $vienchuc )
                                <option value="{{ $vienchuc->ma_vc }}" >{{ $vienchuc->hoten_vc }}</option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Lớp: </th>
                            <td class="was-validated">
                              <select class="custom-select input_table" id="gender2" name="ma_l">
                                <option value="0" >Chọn lớp</option>
                                @foreach ($list_lop as $lop )
                                  <option value="{{ $lop->ma_l }}" >{{ $lop->ten_l }}</option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                        @endif
                        
                        <tr>
                          <th scope="row">Số quyết định: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="so_qd">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày ký quyết định: </th>
                          <td class="was-validated">
                            <input type='date' class='form-control input_table' autofocus required name="ngayky_qd">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">File quyết định: </th>
                          <td class="was-validated">
                            <input type='file' class='form-control input_table' name="file_qd">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_qd">
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
                      <button type="submit"  class="btn btn-outline-primary font-weight-bold">
                        <i class="fas fa-plus-square"></i>
                        Thêm
                      </button>
                    </div>
                  </div>
                </div>
              </form>
              <button role="button" class="item-question collapsed btn btn-primary" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
                <i class="fa-solid fa-chevron-up"></i> &ensp; Thu gọn
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
    <div class="alert alert-success" role="alert">
      <div class="row">
        @if ($vienchuc != '' && $lop != '')
          <a href="{{ URL::to('/danhsach/'.$lop->ma_l) }}" class="col-1">
            <button type="button" class="btn btn-warning">
              <i class="fas fa-solid fa-caret-left"></i>&ensp;
            </button> &ensp;
          </a>
        @endif
        <h4 class="text-center col-10 mt-1" style="font-weight: bold">
          DANH SÁCH 
        </h4>
      </div>
    </div>
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
      <div class="col-2">
        @foreach ($count as $key => $count)
          <p class="fw-bold" style="color: #379237; ">Tổng có: {{ $count->sum }}</p>
        @endforeach
      </div>
      <div class="col-2 mb-3">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="width: 100%">Thống kê</button>
  
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Thống kê</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Tên</th>
                  <th scope="col">Số lượng</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($count_status as $key => $count_stt)
                  @if ($count_stt->status_qd == 0)
                    <tr>
                      <td>Danh mục hiển thị</td>
                      <td>{{ $count_stt->sum }}</td>
                    </tr>
                  @else
                    <tr>
                      <td>Danh mục ẩn</td>
                      <td>{{ $count_stt->sum }}</td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-2">
        @if ($vienchuc != '' && $lop != '')
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_quyetdinh/'.$lop->ma_l) }}">
            <button type="button" class="btn btn-danger">Xoá tất cả</button>
          </a>
        @else
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_quyetdinh_all') }}">
            <button type="button" class="btn btn-danger">Xoá tất cả</button>
          </a>
        @endif
      </div>
    </div>
    <table class="table" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Thông tin viên chức</th>
          <th scope="col">Thông tin lớp học</th>
          <th scope="col">Mã số quyết định</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Ngày ký quyết định</th>
          <th scope="col">file quyết định</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $quyetdinh)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              <b>Họ tên viên chức: </b> {{ $quyetdinh->hoten_vc }} <br>
              <b>Email viên chức: </b> {{ $quyetdinh->user_vc }} <br>
              <b>Số điện thoại viên chức: </b> {{ $quyetdinh->sdt_vc }} <br>
            </td>
            <td>
              <b>Tên lớp học: </b> {{ $quyetdinh->ten_l }} <br>
              <b>Ngày bắt đầu: </b> {{ $quyetdinh->ngaybatdau_l }} <br>
              <b>Ngày kết thúc: </b> {{ $quyetdinh->ngayketthuc_l }} <br>
              <b>Tên cơ sở đào tạo: </b> {{ $quyetdinh->tencosodaotao_l }} <br>
              <b>Quốc gia đào tạo: </b> {{ $quyetdinh->quocgiaodaotao_l }} <br>
              <b>Email cơ sở đào tạo: </b> {{ $quyetdinh->emailcoso_l }} <br>
              <b>Số điện thoại cơ sở đào tạo: </b> {{ $quyetdinh->sdtcoso_l }} <br>
            </td>
            <td>
              {{ $quyetdinh->so_qd }}
            </td>
            <td>
              <?php
                if($quyetdinh->status_qd == 0){
                  ?>
                    <span class="badge rounded-pill text-bg-success"><i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị</span>
                  <?php
                }else if($quyetdinh->status_qd == 1) {
                  ?>
                    <span class="badge text-bg-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                  <?php
                }
              ?>
            </td>
            <td>
              {{ $quyetdinh->ngayky_qd }}
            </td>
            <td>
              @if ($quyetdinh->file_qd !=' ')
                <a href="{{ asset('public/uploads/quyetdinh/'.$quyetdinh->file_qd) }}">
                  <button type="button" class="btn btn-warning" style="background-color: #77D970; border: none;">
                    <i class="fa-solid fa-file"></i>
                    File
                  </button>
                </a>
              @else
                Không có file
              @endif
            </td>
            <td style="width: 21%;">
              <a href="{{ URL::to('/edit_quyetdinh/'.$quyetdinh->ma_qd)}}">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> &ensp; Cập nhật</button>
              </a>
              <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/delete_quyetdinh/'.$quyetdinh->ma_qd)}}">
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              </a>
              <?php
                if($quyetdinh->status_qd == 0){
                  ?>
                    <a href="{{ URL::to('/select_quyetdinh/'.$quyetdinh->ma_qd) }}">
                      <button type="button" class="btn btn-secondary">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Ẩn
                      </button>
                    </a>
                  <?php
                }else if($quyetdinh->status_qd == 1) {
                  ?>
                    <a href="{{ URL::to('/select_quyetdinh/'.$quyetdinh->ma_qd) }}">
                      <button type="button" class="btn btn-success">
                        <i class="fa-solid fa-eye"></i>
                        &ensp; Hiển thị
                      </button>
                    </a>
                  <?php
                }
              ?>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
