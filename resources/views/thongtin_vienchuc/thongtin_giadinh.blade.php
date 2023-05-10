@extends('layout')
@section('content')
<?php use Illuminate\Support\Carbon;?>
  <div class="row">
    <div class="col-2 card-box">
      <div class="row">
        <a href="{{ URL::to('thongtin_canhan') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Thông tin viên chức</button>
        </a>
        <a href="{{ URL::to('thongtin_giadinh') }}" class="mt-2">
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Gia đình</button>
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
        <a href="{{ URL::to('thongtin_quatrinhchucvu') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Qúa trình chức vụ</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light color_alert" role="alert" >
        ________THÔNG TIN GIA ĐÌNH VIÊN CHỨC________
      </div>
      <div class="row">
        <div class="faqs-page block ">
          <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <button role="button" class="item-question collapsed btn btn-primary button_xanhla" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
                <i class="fas fa-plus-square text-light"></i>
                &ensp; Thêm
              </button>
              <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_thongtin_giadinh') }}">
                <button type="button" class="btn btn-danger button_do">
                  <i class="fa-solid fa-trash text-light"></i>
                  &ensp;
                  Xoá tất cả
                </button>
              </a>
              <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
                <div class="panel-body mt-3">
                  <form action="{{ URL::to('/add_thongtin_giadinh') }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                                <input type='text' class='form-control input_table' autofocus required pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" name="sdt_gd">
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
                                <?php 
                                  Carbon::now('Asia/Ho_Chi_Minh'); 
                                  $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                                  ?>
                                    <input type='date' class='form-control input_table' autofocus required name="ngaysinh_gd" max="<?php echo $now ?>">
                                  <?php
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <th scope="row">Nghề nghiệp: </th>
                              <td class="was-validated">
                                <input type='text' class='form-control input_table' autofocus required name="nghenghiep_gd">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="row mb-2">
                        <div class="col-5"></div>
                        <div class="col-2">
                          <button type="submit"  class="btn btn-primary button_xanhla them" style=" width: 100%;">
                            <i class="fas fa-plus-square text-light"></i>
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
      </div>
      <div class="row ">
        <div class="mt-3"></div>
        <form action="{{ URL::to('/delete_thongtin_giadinh_check') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <table class="table" id="mytable">
            <thead class="color_table" >
              <tr>
                <th class="text-light" scope="col"></th>
                <th class="text-light" scope="col">STT</th>
                <th class="text-light" scope="col">Mối quan hệ</th>
                <th class="text-light" scope="col">Họ tên</th>
                <th class="text-light" scope="col">Số điện thoại</th>
                <th class="text-light" scope="col">Ngày sinh</th>
                <th class="text-light" scope="col">Nghề nghiệp</th>
                <th class="text-light" scope="col"></th>
              </tr>
            </thead>
            <tbody  >
              @foreach ($list as $key => $giadinh)
                <tr >
                  <td style="width: 5%">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox"  name="ma_gd[{{ $giadinh->ma_gd }}]" value="{{ $giadinh->ma_gd }}">
                    </div>
                  </td>
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
                    <?php 
                      Carbon::now('Asia/Ho_Chi_Minh');
                      $ngaysinh_gd = Carbon::parse(Carbon::create($giadinh->ngaysinh_gd))->format('d-m-Y');
                      echo $ngaysinh_gd;
                    ?>
                  </td>
                  <td>
                    {{ $giadinh->nghenghiep_gd }}
                  </td>
                  <td style="width: 21%;">
                    <a href="{{ URL::to('/thongtin_giadinh_edit/'.$giadinh->ma_gd)}}">
                      <button type="button" class="btn btn-warning button_cam">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                        &ensp; Cập nhật
                      </button>
                    </a>
                    <input class="ma_gd{{ $giadinh->ma_gd }}" type="hidden" value="{{ $giadinh->ma_gd }}">
                    <button type="button" class=" xoa{{ $giadinh->ma_gd }} btn btn-danger button_do"><i class="fa-solid fa-trash text-light"></i> &ensp;Xoá</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <button  type="submit" class="btn btn-danger button_do xoa_check">
            <i class="fa-solid fa-trash text-light"></i>
            &ensp;
            Xoá
          </button>
        </form>
      </div>
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
  @foreach ($list as $giadinh )
    document.querySelector('.xoa{{ $giadinh->ma_gd }}').addEventListener('click', (event)=>{
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
          var id= $('.ma_gd{{ $giadinh->ma_gd }}').val();
          $.ajax({
            url:"{{ url("/delete_thongtin_giadinh") }}", 
            type: "GET", 
            data: {id:id},
          });
          swalWithBootstrapButtons.fire(
            'Xoá thành công',
            'Dữ liệu của bạn đã được xoá.',
            'success'
          )
          location.reload();
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Đã huỷ',
            'Dữ liệu được an toàn',
            'error'
          )
          location.reload();
        }
      })
      
    });
  @endforeach
</script>
<!--  -->
@endsection