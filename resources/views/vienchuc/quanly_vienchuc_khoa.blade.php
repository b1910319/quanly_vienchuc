@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="mt-3"></div>
    <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
      ________THÔNG TIN VIÊN CHỨC________
    </div>
    <div class="row">
      <div class="col-1 mb-3">
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
                      <td>Tài khoản được kích hoạt</td>
                      <td>{{ $count_stt->sum }}</td>
                    </tr>
                  @else
                    @if ($count_stt->status_vc == 1)
                      <tr>
                        <td>Tài khoản bị vô hiệu hoá</td>
                        <td>{{ $count_stt->sum }}</td>
                      </tr>
                    @else
                      @if ($count_stt->status_vc == 2)
                        <tr>
                          <td>Nghĩ hưu</td>
                          <td>{{ $count_stt->sum }}</td>
                        </tr>
                      @else
                      @endif
                    @endif
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-1">
        <a href="{{ URL::to('/quanly_vienchuc_khoa') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%; ">
            <i class="fa-solid fa-rotate"></i>
            &ensp;
            Làm mới
          </button>
        </a>
      </div>
      <div class="col-1">
        <div class="dropdown" >
          <button class="dropbtn fw-bold" style="width: 100%; border-radius: 5px; background-color: #a4aa13; ">
            <i class="fa-solid fa-filter"></i>
            &ensp;
            Lọc
          </button>
          <div class="dropdown-content">
            @foreach ($list_khoa as $khoa )
              <a href="{{ URL::to('/search_vienchuc_khoa/'.$khoa->ma_k) }}">{{ $khoa->ten_k }}</a>
            @endforeach
            <a href="{{ URL::to('quanly_vienchuc_khoa') }}">Tất cả</a>
          </div>
        </div>
      </div>
    </div>
    <table class="table" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Thông tin viên chức</th>
          <th scope="col">Khoa</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Quản lý</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $vienchuc)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $vienchuc->hoten_vc }} ({{ $vienchuc->ma_vc }})
              <br>
              {{ $vienchuc->user_vc }}
            </td>
            <td>
              {{ $vienchuc->ten_k }} ({{ $vienchuc->ma_k }})
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
            <td class="was-validated" style="width: 25%">
              <form action="{{ URL::to('update_khoa_vc') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-8">
                    <input type="hidden" name="ma_vc" value="{{ $vienchuc->ma_vc }}">
                    <select class="custom-select input_table" id="gender2" name="ma_k">
                      <option value="0" >Chọn khoa cần cập nhật</option>
                      @foreach ($list_khoa as $khoa)
                        <option value="{{ $khoa->ma_k }}" >{{ $khoa->ten_k }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-4">
                    <button type="submit" class=" btn btn-warning fw-bold" style="background-color: #FC7300">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </div>
                </div>
              </form>
              
            </td>
            <td style="width: 25%;">
              <a href="{{ URL::to('/admin_edit_vienchuc_khoa/'.$vienchuc->ma_k.'/'.$vienchuc->ma_vc)}}">
                <button type="button" class=" btn btn-warning fw-bold" style="background-color: #FC7300">
                  <i class="fa-solid fa-pen-to-square"></i>
                  &ensp; Cập nhật
                </button>
              </a>
              <input class="ma_vc" type="hidden" value="{{ $vienchuc->ma_vc }}">
              <button type="button" class=" xoa btn btn-danger fw-bold" style="background-color: #FF1E1E"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              <?php
                if($vienchuc->status_vc == 0){
                  ?>
                    <a href="{{ URL::to('/admin_select_vienchuc/'.$vienchuc->ma_vc) }}">
                      <button type="button" class="btn btn-secondary fw-bold">
                        <i class="fa-solid fa-lock"></i> 
                        &ensp; Vô hiệu hoá
                      </button>
                    </a>
                  <?php
                }else if($vienchuc->status_vc == 1) {
                  ?>
                    <a href="{{ URL::to('/admin_select_vienchuc/'.$vienchuc->ma_vc) }}">
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
        var ma_vc= $('.ma_vc').val();
        $.ajax({
          url:"{{ url("/admin_delete_vienchuc") }}", 
          type: "GET", 
          data: {ma_vc:ma_vc},
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
