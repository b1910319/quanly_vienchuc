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
              <form action="{{ URL::to('/add_bac_ngach/'.$ma_n) }}" method="POST"
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
                          <th scope="row">Tên bậc: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="ten_b" minlength="5">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Hệ số lương </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="hesoluong_b">
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
                            <select class="custom-select input_table" id="gender2" name="status_b">
                              <option value="0" >Chọn trạng thái</option>
                              <option value="1" >Vô hiệu hoá</option>
                              <option selected value="0" >Kích hoạt</option>
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
      <a href="{{ URL::to('/ngach') }}" class="col-1">
        <button type="button" class="btn btn-warning">
          <i class="fas fa-solid fa-caret-left"></i>&ensp;
        </button> &ensp;
      </a>
      <h4 class="text-center col-10 mt-1" style="font-weight: bold">
        DANH SÁCH 
        <span style="color: #379237;">( {{ $ngach->ten_n }} )</span>
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
                  @if ($count_stt->status_b == 0)
                    <tr>
                      <td>Danh mục hiển thị</td>
                      <td>{{ $count_stt->sum }}</td>
                    </tr>
                  @else
                    @if ($count_stt->status_b == 1)
                      <tr>
                        <td>Danh mục ẩn</td>
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
        <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_bac_ngach/'.$ma_n) }}">
          <button type="button" class="btn btn-danger">Xoá tất cả</button>
        </a>
      </div>
    </div>
    <table class="table" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên bậc </th>
          <th scope="col">Hệ số lương</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Thời gian tạo</th>
          <th scope="col">Thời gian cập nhật</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $bac)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $bac->ten_b }}
            </td>
            <td>
              {{ $bac->hesoluong_b }}
            </td>
            <td>
              <?php
                if($bac->status_b == 0){
                  ?>
                    <span class="badge rounded-pill text-bg-success"><i class="fas fa-solid fa-eye"></i>&ensp;  Kích hoạt</span>
                  <?php
                }else if($bac->status_b == 1) {
                  ?>
                    <span class="badge text-bg-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Vô hiệu hoá</span>
                  <?php
                }
              ?>
            </td>
            <td>
              {{ $bac->created_b }}
            </td>
            <td>
              {{ $bac->updated_b }}
            </td>
            <td style="width: 23%;">
              <a href="{{ URL::to('/admin_edit_bac_khoa/'.$bac->ma_n.'/'.$bac->ma_b)}}">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> &ensp; Cập nhật</button>
              </a>
              <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/admin_delete_bac_khoa/'.$bac->ma_n.'/'.$bac->ma_b)}}">
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              </>
              
              <?php
                if($bac->status_b == 0){
                  ?>
                    <a href="{{ URL::to('/admin_select_bac_khoa/'.$bac->ma_n.'/'.$bac->ma_b) }}">
                      <button type="button" class="btn btn-secondary">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Vô hiệu hoá
                      </button>
                    </a>
                  <?php
                }else if($bac->status_b == 1) {
                  ?>
                    <a href="{{ URL::to('/admin_select_bac_khoa/'.$bac->ma_b.'/'.$bac->ma_b) }}">
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
