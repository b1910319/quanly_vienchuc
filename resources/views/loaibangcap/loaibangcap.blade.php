@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
      ________THÔNG TIN LOẠI BẰNG CẤP________
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary fw-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237; border: none">
            <i class="fas fa-plus-square"></i>
            &ensp; Thêm
          </button>
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_loaibangcap') }}">
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
                    @if ($count_stt->status_lbc == 0)
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
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form action="{{ URL::to('/add_loaibangcap') }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Loại bằng cấp: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="ten_lbc">
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
                            <select class="custom-select input_table" id="gender2" name="status_lbc">
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
      <thead class="table-secondary">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Loại bằng cấp </th>
          <th scope="col">Trạng thái</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $loaibangcap)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $loaibangcap->ten_lbc }} ({{ $loaibangcap->ma_lbc }})
            </td>
            <td>
              <?php
                if($loaibangcap->status_lbc == 0){
                  ?>
                    <span class="badge badge-light-success">
                      <i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị
                    </span>
                  <?php
                }else if($loaibangcap->status_lbc == 1) {
                  ?>
                    <span class="badge badge-light-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                  <?php
                }
              ?>
            </td>
            <td style="width: 21%;">
              <a href="{{ URL::to('/edit_loaibangcap/'.$loaibangcap->ma_lbc)}}">
                <button type="button" class=" btn btn-warning fw-bold" style="background-color: #FC7300">
                  <i class="fa-solid fa-pen-to-square"></i>
                  &ensp; Cập nhật
                </button>
              </a>
              <input class="ma_lbc" type="hidden" value="{{ $loaibangcap->ma_lbc }}">
              <button type="button" class=" xoa btn btn-danger fw-bold" style="background-color: #FF1E1E"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              <?php
                if($loaibangcap->status_lbc == 0){
                  ?>
                    <a href="{{ URL::to('/select_loaibangcap/'.$loaibangcap->ma_lbc) }}">
                      <button type="button" class="btn btn-secondary fw-bold">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Ẩn
                      </button>
                    </a>
                  <?php
                }else if($loaibangcap->status_lbc == 1) {
                  ?>
                    <a href="{{ URL::to('/select_loaibangcap/'.$loaibangcap->ma_lbc) }}">
                      <button type="button" class="btn btn-success fw-bold">
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
        var id= $('.ma_lbc').val();
        $.ajax({
          url:"{{ url("/delete_loaibangcap") }}", 
          type: "GET", 
          data: {id:id},
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
<!--  -->
@endsection
