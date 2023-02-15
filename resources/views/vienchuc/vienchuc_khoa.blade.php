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
              <form action="{{ URL::to('/add_vienchuc_khoa/'.$ma_k) }}" method="POST"
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
                          <th scope="row">Họ tên viên chức: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="hoten_vc" minlength="5">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_vc">
                              <option value="0" >Chọn trạng thái</option>
                              <option value="1" >Vô hiệu hoá</option>
                              <option selected value="0" >Kích hoạt</option>
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
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="user_vc">
                              <span class="input-group-text" id="basic-addon2">@student.ctu.edu.vn</span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Password: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="pass_vc" minlength="5" value="123456">
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
      <a href="{{ URL::to('/quanly_khoa') }}" class="col-1">
        <button type="button" class="btn btn-warning">
          <i class="fas fa-solid fa-caret-left"></i>&ensp;
        </button> &ensp;
      </a>
      <h4 class="text-center col-10 mt-1" style="font-weight: bold">DANH SÁCH</h4>
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
                  @if ($count_stt->status_vc == 0)
                    <tr>
                      <td>Tài khoản viên chức được kích hoạt</td>
                      <td>{{ $count_stt->sum }}</td>
                    </tr>
                  @else
                    @if ($count_stt->status_vc == 1)
                      <tr>
                        <td>Tài khoản viên chức bị vô hiệu hoá</td>
                        <td>{{ $count_stt->sum }}</td>
                      </tr>
                    @endif
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-2">
        <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_quyen') }}">
          <button type="button" class="btn btn-danger">Xoá tất cả</button>
        </a>
      </div>
    </div>
    <table class="table" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Họ tên viên chức </th>
          <th scope="col">Username</th>
          <th scope="col">Khoa</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Thời gian tạo</th>
          <th scope="col">Thời gian cập nhật</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $vienchuc)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $vienchuc->hoten_vc }}
            </td>
            <td>
              {{ $vienchuc->user_vc }}
            </td>
            <td>
              {{ $vienchuc->ten_k }}
            </td>
            <td>
              <?php
                if($vienchuc->status_vc == 0){
                  ?>
                    <span class="badge rounded-pill text-bg-success"><i class="fas fa-solid fa-eye"></i>&ensp;  Kích hoạt</span>
                  <?php
                }else if($vienchuc->status_vc == 1) {
                  ?>
                    <span class="badge text-bg-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Vô hiệu hoá</span>
                  <?php
                }
              ?>
            </td>
            <td>
              {{ $vienchuc->created_k }}
            </td>
            <td>
              {{ $vienchuc->updated_k }}
            </td>
            <td style="width: 23%;">
              <a href="{{ URL::to('/edit_vienchuc_khoa/'.$vienchuc->ma_k.'/'.$vienchuc->ma_vc)}}">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> &ensp; Cập nhật</button>
              </a>
              <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/delete_vienchuc_khoa/'.$vienchuc->ma_k.'/'.$vienchuc->ma_vc)}}">
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              </>
              
              <?php
                if($vienchuc->status_vc == 0){
                  ?>
                    <a href="{{ URL::to('/select_vienchuc_khoa/'.$vienchuc->ma_k.'/'.$vienchuc->ma_vc) }}">
                      <button type="button" class="btn btn-secondary">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Vô hiệu hoá
                      </button>
                    </a>
                  <?php
                }else if($vienchuc->status_vc == 1) {
                  ?>
                    <a href="{{ URL::to('/select_vienchuc_khoa/'.$vienchuc->ma_k.'/'.$vienchuc->ma_vc) }}">
                      <button type="button" class="btn btn-success">
                        <i class="fa-solid fa-eye"></i>
                        &ensp;
                        Kích hoạt
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
