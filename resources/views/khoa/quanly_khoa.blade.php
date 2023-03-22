@extends('layout')
@section('content') 
<div class="row">
  <div class="card-box">
    <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
      ________THÔNG TIN KHOA THUỘC TRƯỜNG CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG________
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary fw-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237; border: none">
            <i class="fas fa-plus-square"></i>
            &ensp; Thêm
          </button>
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_khoa') }}">
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
                <thead class="table-dark text-light" >
                  <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($count_status as $key => $count_stt)
                    @if ($count_stt->status_k == 0)
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
              <form action="{{ URL::to('/add_khoa') }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Tên khoa: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="ten_k" minlength="5">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_k">
                              <option value="0" >Chọn trạng thái</option>
                              <option value="1" >Ẩn</option>
                              <option selected value="0" >Hiển thị</option>
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
                          <th scope="row" style="width: 20%">Mô tả: </th>
                          <td class="was-validated">
                            <textarea class="form-control" rows="4" required name="mota_k">

                            </textarea>
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
          <th scope="col">Khoa </th>
          <th scope="col">Viên chức</th>
          <th scope="col">Trạng thái</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $khoa)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $khoa->ten_k }}
            </td>
            <td style="width: 12%">
              <?php
                foreach ($count_vienchuc_khoa as $key => $count) {
                  if($count->ma_k == $khoa->ma_k && $count->sum > 0){
                    ?>
                      <a href="{{ URL::to('/vienchuc_khoa/'.$khoa->ma_k) }}">
                        <button type="button" class="btn btn-primary position-relative fw-bold" style="background-color: #379237; border: none; width: 100%;">
                          <i class="fas fa-plus-square"></i>
                          &ensp;
                          Thêm viên chức
                          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php echo $count->sum ?>
                            <span class="visually-hidden">

                            </span>
                          </span>
                        </button>
                      </a>
                    <?php
                  }elseif ($count->ma_k == $khoa->ma_k && $count->sum == 0) {
                    ?>
                      <a href="{{ URL::to('/vienchuc_khoa/'.$khoa->ma_k) }}">
                        <button type="button" class="btn btn-primary position-relative fw-bold" style="background-color: #379237; border: none; width: 100%;">
                          <i class="fas fa-plus-square"></i>
                          &ensp;
                          Thêm viên chức
                        </button>
                      </a>
                    <?php
                  }
                }
              ?>
            </td>
            
            <td>
              <?php
                if($khoa->status_k == 0){
                  ?>
                    <span class="badge badge-light-success">
                      <i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị
                    </span>
                  <?php
                }else if($khoa->status_k == 1) {
                  ?>
                    <span class="badge badge-light-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                  <?php
                }
              ?>
            </td>
            <td style="width: 22%;">
              <a href="{{ URL::to('/edit_khoa/'.$khoa->ma_k)}}">
                <button type="button" class=" btn btn-warning fw-bold" style="background-color: #FC7300">
                  <i class="fa-solid fa-pen-to-square"></i>
                  &ensp; Cập nhật
                </button>
              </a>
              <input class="ma_k" type="hidden" value="{{ $khoa->ma_k}}">
              <button type="button" class=" xoa btn btn-danger fw-bold" style="background-color: #FF1E1E"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              <?php
                if($khoa->status_k == 0){
                  ?>
                    <a href="{{ URL::to('/select_khoa/'.$khoa->ma_k) }}">
                      <button type="button" class="btn btn-secondary fw-bold">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Ẩn
                      </button>
                    </a>
                  <?php
                }else if($khoa->status_k == 1) {
                  ?>
                    <a href="{{ URL::to('/select_khoa/'.$khoa->ma_k) }}">
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
<!-- trình soạn thảo  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
<script>
  // CKEDITOR.replace('mota_k');
</script>
<!--  -->
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
        var id= $('.ma_k').val();
        $.ajax({
          url:"{{ url("/delete_khoa") }}", 
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
@endsection
