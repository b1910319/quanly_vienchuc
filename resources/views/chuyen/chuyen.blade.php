@extends('layout')
@section('content')
<?php use Illuminate\Support\Carbon; ?>
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        @if ($vienchuc != '' && $lop != '')
          <a href="{{ URL::to('/danhsach/'.$lop->ma_l) }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @endif
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________THÔNG TIN XIN CHUYỂN TRƯỜNG, NƯỚC, NGÀNH HỌC ... CỦA VIÊN CHỨC________
      </h4>
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          @if ($vienchuc != '' && $lop != '')
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_chuyen/'.$lop->ma_l.'/'.$vienchuc->ma_vc) }}">
              <button type="button" class="btn btn-danger button_do">
                <i class="fa-solid fa-trash text-light"></i>
                &ensp;
                Xoá tất cả
              </button>
            </a>
          @else
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_chuyen_all') }}">
              <button type="button" class="btn btn-danger button_do">
                <i class="fa-solid fa-trash text-light"></i>
                &ensp;
                Xoá tất cả
              </button>
            </a>
          @endif
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
    <form action="{{ URL::to('/delete_chuyen_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức</th>
            <th class="text-light" scope="col">Thông tin lớp học</th>
            <th class="text-light" scope="col">Thông tin chuyển trường, nước ....</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $key => $chuyen)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_c[{{ $chuyen->ma_c }}]" value="{{ $chuyen->ma_c }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                <b>Họ tên viên chức: </b> {{ $chuyen->hoten_vc }} <br>
                <b>Email viên chức: </b> {{ $chuyen->user_vc }} <br>
                <b>Số điện thoại viên chức: </b> {{ $chuyen->sdt_vc }} <br>
                <b>Khoa: </b> {{ $chuyen->ten_k }}
              </td>
              <td>
                <b>Tên lớp học: </b> {{ $chuyen->ten_l }} <br>
                <b>Ngày bắt đầu: </b> 
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaybatdau_l = Carbon::parse(Carbon::create($chuyen->ngaybatdau_l))->format('d-m-Y');
                  echo $ngaybatdau_l;
                ?>
                <br>
                <b>Ngày kết thúc: </b> 
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngayketthuc_l = Carbon::parse(Carbon::create($chuyen->ngayketthuc_l))->format('d-m-Y');
                  echo $ngayketthuc_l;
                ?>
                <br>
                <b>Tên cơ sở đào tạo: </b> {{ $chuyen->tencosodaotao_l }} <br>
                <b>Quốc gia đào tạo: </b> {{ $chuyen->quocgiaodaotao_l }} <br>
                <b>Email cơ sở đào tạo: </b> {{ $chuyen->emailcoso_l }} <br>
                <b>Số điện thoại cơ sở đào tạo: </b> {{ $chuyen->sdtcoso_l }} <br>
              </td>
              <td>
                <b>Nội dung chuyển: </b> {{ $chuyen->noidung_c }} <br>
                <b>Lý do chuyển: </b> {{ $chuyen->lydo_c }} <br>
                <b>Số quyết định: </b>{{ $chuyen->soquyetdinh_c }} <br>
                <b>Ngày ký quyết định: </b>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaykyquyetdinh_c = Carbon::parse(Carbon::create($chuyen->ngaykyquyetdinh_c))->format('d-m-Y');
                  echo $ngaykyquyetdinh_c;
                ?>
                <br>
                @if ($chuyen->file_c)
                  <a href="{{ asset('public/uploads/chuyen/'.$chuyen->file_c) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File xin chuyển
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
                <br>
                @if ($chuyen->filequyetdinh_c)
                  <a href="{{ asset('public/uploads/chuyen/'.$chuyen->filequyetdinh_c) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File quyết định
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file quyết định</span>
                @endif
              </td>
              <td>
                <?php
                  if($chuyen->status_c == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fa-solid fa-circle-check "></i>&ensp;  Đã duyệt
                      </span>
                    <?php
                  }else if($chuyen->status_c == 1) {
                    ?>
                      <span class="badge badge-light-danger"><i class="fa-solid fa-circle-xmark "></i>&ensp; Chưa duyệt</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 12%;">
                <div class="row">
                  <div class="col-12 mt-1">
                    <a href="{{ URL::to('/edit_chuyen/'.$chuyen->ma_c)}}">
                      <button style="width: 100%" type="button" class=" btn btn-warning button_cam">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                        &ensp; Cập nhật
                      </button>
                    </a>
                  </div>
                  <div class="col-12 mt-1">
                    <?php
                      if($chuyen->status_c == 0){
                        ?>
                          <a href="{{ URL::to('/select_chuyen/'.$chuyen->ma_c) }}">
                            <button style="width: 100%" type="button" class="btn btn-secondary fw-bold">
                              <i class="fa-solid fa-circle-xmark text-light "></i>
                              &ensp; Chưa duyệt
                            </button>
                          </a>
                        <?php
                      }else if($chuyen->status_c == 1) {
                        ?>
                          <a href="{{ URL::to('/select_chuyen/'.$chuyen->ma_c) }}">
                            <button style="width: 100%" type="button" class="btn btn-success fw-bold">
                              <i class="fa-solid fa-circle-check text-light "></i>
                              &ensp; Duyệt
                            </button>
                          </a>
                        <?php
                      }
                    ?>
                  </div>
                </div>
                
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
  @foreach ($list as $chuyen )
    document.querySelector('.xoa{{ $chuyen->ma_c }}').addEventListener('click', (event)=>{
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
        confirmButtonText: '<i class="fa-solid fa-trash text-light"></i> &ensp;  Xoá',
        cancelButtonText: '<i class="fa-solid fa-xmark"></i> &ensp;  Huỷ',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          var id= $('.ma_c{{ $chuyen->ma_c }}').val();
          $.ajax({
            url:"{{ url("/delete_chuyen") }}", 
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
  @endforeach
  
</script>
<!--  -->
@endsection
