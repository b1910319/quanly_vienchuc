@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row" role="alert" style="background-color: #3F979B; text-align: center; text-transform: uppercase">
      <div class="col-1">
        @if ($phanquyen_qlk)
          <a href="{{ URL::to('/thongtin_vienchuc_khoa') }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @else
          <a href="{{ URL::to('/quanly_khoa') }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @endif
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________THÔNG TIN CÁC VIÊN CHỨC THUỘC " <span style="color: #FFFF00">{{ $khoa->ten_k }}</span> "________
      </h4>
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary fw-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237; border: none">
            <i class="fas fa-plus-square"></i>
            &ensp; Thêm
          </button>
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/admin_deleteall_vienchuc_khoa/'.$ma_k) }}">
            <button type="button" class="btn btn-danger fw-bold" style="background-color: #FF1E1E">
              <i class="fa-solid fa-trash"></i>
              &ensp;
              Xoá tất cả
            </button>
          </a>
          <button class="btn btn-primary fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="background-color: #00AF91; border: none;">
            <i class="fa-solid fa-chart-simple"></i> &ensp;
            Thống kê
          </button>
  
          <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title fw-bold" id="offcanvasScrollingLabel" style="color: #00AF91 ">
                <i class="fa-solid fa-chart-simple"></i>
                &ensp;
                Thống kê
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <table class="table">
                <thead class="table-dark text-light">
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
                        @else
                          @if ($count_stt->status_vc == 2)
                            <tr>
                              <td>Tài khoản nghĩ hưu</td>
                              <td>{{ $count_stt->sum }}</td>
                            </tr>
                          @endif
                        @endif
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form action="{{ URL::to('/admin_add_vienchuc_khoa/'.$ma_k) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                            <div>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_vc" required >
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
                    <div class="col-5"></div>
                    <div class="col-2">
                      <button type="submit"  class="btn btn-primary font-weight-bold them" style="background-color: #379237; border: none; width: 100%;">
                        <i class="fas fa-plus-square"></i>
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
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
    <table class="table" id="mytable">
      <thead class="table-secondary" >
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Họ tên viên chức </th>
          <th scope="col">Username</th>
          <th scope="col">Khoa</th>
          <th scope="col">Trạng thái</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $vienchuc)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $vienchuc->hoten_vc }} ({{ $vienchuc->ma_vc }})
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
                    <span class="badge badge-light-success">
                      <i class="fa-solid fa-unlock-keyhole"></i>&ensp;  Kích hoạt
                    </span>
                  <?php
                }else if($vienchuc->status_vc == 1) {
                  ?>
                    <span class="badge badge-light-danger">
                      <i class="fa-solid fa-lock"></i>
                      &ensp; Vô hiệu hoá</span>
                  <?php
                }elseif ($vienchuc->status_vc == 2) {
                  ?>
                    <span class="badge badge-light-warning">
                      <i class="fa-solid fa-toggle-off"></i>
                      &ensp; Nghĩ hưu</span>
                  <?php
                }
              ?>
            </td>
            <td style="width: 23%;">
              <a href="{{ URL::to('/admin_edit_vienchuc_khoa/'.$vienchuc->ma_k.'/'.$vienchuc->ma_vc)}}">
                <button type="button" class=" btn btn-warning fw-bold" style="background-color: #FC7300">
                  <i class="fa-solid fa-pen-to-square"></i>
                  &ensp; Cập nhật
                </button>
              </a>
              <input class="ma_k" type="hidden" value="{{ $vienchuc->ma_k }}">
              <input class="ma_vc" type="hidden" value="{{ $vienchuc->ma_vc }}">
              <button type="button" class=" xoa btn btn-danger fw-bold" style="background-color: #FF1E1E"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              <?php
                if($vienchuc->status_vc == 0){
                  ?>
                    <a href="{{ URL::to('/admin_select_vienchuc_khoa/'.$vienchuc->ma_k.'/'.$vienchuc->ma_vc) }}">
                      <button type="button" class="btn btn-secondary fw-bold">
                        <i class="fa-solid fa-lock"></i> 
                        &ensp; Vô hiệu hoá
                      </button>
                    </a>
                  <?php
                }else if($vienchuc->status_vc == 1) {
                  ?>
                    <a href="{{ URL::to('/admin_select_vienchuc_khoa/'.$vienchuc->ma_k.'/'.$vienchuc->ma_vc) }}">
                      <button type="button" class="btn btn-success fw-bold">
                        <i class="fa-solid fa-unlock-keyhole"></i>
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
{{-- ajax --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{--  --}}
<script>
  document.querySelector('.them').addEventListener('click', (event)=>{
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: 'Thêm thành công'
    })
    
  });
  document.querySelector('.xoa').addEventListener('click', (event)=>{
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
      title: 'Bạn có chắc muốn xoá không?',
      text: "Bạn không thể khôi phục dữ liệu đã xoá",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: '<i class="fa-solid fa-trash"></i> &ensp;  Xoá',
      cancelButtonText: '<i class="fa-solid fa-xmark"></i> &ensp;  Huỷ',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        var ma_k= $('.ma_k').val();
        var ma_vc= $('.ma_vc').val();
        $.ajax({
          url:"{{ url("/admin_delete_vienchuc_khoa") }}", 
          type: "GET", 
          data: {ma_k:ma_k, ma_vc:ma_vc},
        });
        swalWithBootstrapButtons.fire(
          'Xoá thành công',
          'Dữ liệu của bạn đã được xoá.',
          'success'
        )
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Đã huỷ',
          'Dữ liệu được an toàn',
          'error'
        )
      }
      location.reload();
    })
    
  });
</script>
@endsection
