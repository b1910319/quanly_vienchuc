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
              <form action="{{ URL::to('/add_lop_danhmuclop/'.$danhmuclop->ma_dml) }}" method="POST"
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
                          <th scope="row">Tên lớp học: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="ten_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày bắt đầu lớp học: </th>
                          <td class="was-validated">
                            <input type='date' class='form-control input_table' autofocus required name="ngaybatdau_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày kết thức lớp học: </th>
                          <td class="was-validated">
                            <input type='date' class='form-control input_table' autofocus required name="ngayketthuc_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Yêu cầu lớp học: </th>
                          <td class="was-validated">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="yeucau_l"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Cơ sở đào tạo: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="tencosodaotao_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Quốc gia đào tạo: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="quocgiaodaotao_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngành học: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="nganhhoc_l">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Trình độ đào tạo: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="trinhdodaotao_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Nguồn kinh phí: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="nguonkinhphi_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Nội dung học: </th>
                          <td class="was-validated">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="noidunghoc_l"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Địa chỉ đào tạo: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="diachidaotao_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Email cơ sở: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="emailcoso_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Số điện thoại cơ sở: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="sdtcoso_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_l">
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
    <div class="alert alert-success row" role="alert">
      <a href="{{ URL::to('/danhmuclop') }}" class="col-1">
        <button type="button" class="btn btn-warning">
          <i class="fas fa-solid fa-caret-left"></i>&ensp;
        </button> &ensp;
      </a>
      <h4 class="text-center col-10 mt-1" style="font-weight: bold">
        DANH SÁCH 
        <span style="color: #379237;">( {{ $danhmuclop->ten_dml }} )</span>
      </h4>
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
                  @if ($count_stt->status_l == 0)
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
        <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_lop_danhmuclop/'.$ma_dml) }}">
          <button type="button" class="btn btn-danger">Xoá tất cả</button>
        </a>
      </div>
    </div>
    <table class="table" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Thông tin lớp học</th>
          <th scope="col">Danh mục lớp</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Thời gian tạo</th>
          <th scope="col">Thời gian cập nhật</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $lop)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td style="width: 20%;">
              <div class="row ">
                <div class="col-md-12">
                  <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                    style="height: 100px; overflow: auto;">
                    <p>
                      <b> Tên lớp:</b> {{ $lop->ten_l }} <br>
                      <b> Ngày bắt đầu:</b> {{ $lop->ngaybatdau_l }} <br>
                      <b> Ngày kết thúc: </b> {{ $lop->ngayketthuc_l }} <br>
                      <b> Tên cơ sở đào tạo: </b> {{ $lop->tencosodaotao_l }} <br>
                      <b> Quốc gia đào tạo: </b> {{ $lop->quocgiaodaotao_l }} <br>
                      <b> Ngành học: </b> {{ $lop->nganhhoc_l }} <br>
                      <b> Trình độ đào tạo: </b> {{ $lop->trinhdodaotao_l }} <br>
                      <b> Nguồn kinh phí: </b> {{ $lop->nguonkinhphi_l }} <br>
                      <b> Địa chỉ đào tạo: </b> {{ $lop->diachidaotao_l }} <br>
                      <b> Email cơ sở: </b> {{ $lop->emailcoso_l }} <br>
                      <b> Số điện thoại: </b> {{ $lop->sdtcoso_l }} <br>
                    </p>
                  </div>
                </div>
              </div>
            </td>
            <td>
              {{ $danhmuclop->ten_dml }}
            </td>
            <td>
              <?php
                if($lop->status_l == 0){
                  ?>
                    <span class="badge rounded-pill text-bg-success"><i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị</span>
                  <?php
                }else if($lop->status_l == 1) {
                  ?>
                    <span class="badge text-bg-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                  <?php
                }
              ?>
            </td>
            <td>
              {{ $lop->created_l }}
            </td>
            <td>
              {{ $lop->updated_l }}
            </td>
            <td style="width: 21%;">
              <a href="{{ URL::to('/edit_lop_danhmuclop/'.$lop->ma_l)}}">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> &ensp; Cập nhật</button>
              </a>
              <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/delete_lop_danhmuclop/'.$lop->ma_l.'/'.$lop->ma_dml)}}">
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              </a>
              <?php
                if($lop->status_l == 0){
                  ?>
                    <a href="{{ URL::to('/select_lop_danhmuclop/'.$lop->ma_l) }}">
                      <button type="button" class="btn btn-secondary">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Ẩn
                      </button>
                    </a>
                  <?php
                }else if($lop->status_l == 1) {
                  ?>
                    <a href="{{ URL::to('/select_lop_danhmuclop/'.$lop->ma_l) }}">
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