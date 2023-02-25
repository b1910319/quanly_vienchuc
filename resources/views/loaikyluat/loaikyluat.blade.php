@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237;">
            <i class="fa-solid fa-circle-plus"></i> &ensp; Thêm
          </button>
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <div class="alert alert-primary" role="alert">
                <h4 class="text-center" style="font-weight: bold">THÊM THÔNG TIN</h4>
              </div>
              <form action="{{ URL::to('/add_loaikyluat') }}" method="POST"
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
                          <th scope="row">Loại kỷ luật: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="ten_lkl">
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
                            <select class="custom-select input_table" id="gender2" name="status_lkl">
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
              <button role="button" class="item-question collapsed btn btn-primary" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237;">
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
        <h4 class="text-center" style="font-weight: bold">DANH SÁCH</h4>
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
                  @if ($count_stt->status_lkl == 0)
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
        <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_loaikyluat') }}">
          <button type="button" class="btn btn-danger">Xoá tất cả</button>
        </a>
      </div>
    </div>
    <table class="table" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Loại khen thưởng </th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Thời gian tạo</th>
          <th scope="col">Thời gian cập nhật</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $loaikyluat)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $loaikyluat->ten_lkl }}
            </td>
            <td>
              <?php
                if($loaikyluat->status_lkl == 0){
                  ?>
                    <span class="badge rounded-pill text-bg-success"><i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị</span>
                  <?php
                }else if($loaikyluat->status_lkl == 1) {
                  ?>
                    <span class="badge text-bg-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                  <?php
                }
              ?>
            </td>
            <td>
              {{ $loaikyluat->created_lkl }}
            </td>
            <td>
              {{ $loaikyluat->updated_lkl }}
            </td>
            <td style="width: 21%;">
              <a href="{{ URL::to('/edit_loaikyluat/'.$loaikyluat->ma_lkl)}}">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> &ensp; Cập nhật</button>
              </a>
              <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/delete_loaikyluat/'.$loaikyluat->ma_lkl)}}">
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              </a>
              <?php
                if($loaikyluat->status_lkl == 0){
                  ?>
                    <a href="{{ URL::to('/select_loaikyluat/'.$loaikyluat->ma_lkl) }}">
                      <button type="button" class="btn btn-secondary">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Ẩn
                      </button>
                    </a>
                  <?php
                }else if($loaikyluat->status_lkl == 1) {
                  ?>
                    <a href="{{ URL::to('/select_loaikyluat/'.$loaikyluat->ma_lkl) }}">
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