@extends('layout')
@section('content')
  <div class="row">
    <div class="col-2 card-box">
      <div class="row">
        <a href="{{ URL::to('thongtin_canhan') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Thông tin viên chức</button>
        </a>
        <a href="{{ URL::to('thongtin_giadinh') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Gia đình</button>
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
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Lớp học tham gia</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light color_alert row" role="alert">
        <div class="col-1">
          <a href="{{ URL::to('thongtin_lophoc') }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        </div>
        <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
          ________THÊM THÔNG TIN XIN TẠM DỪNG QUÁ TRÌNH HỌC________
        </h4>
      </div>
      <form action="{{ URL::to('/vienchuc_add_dunghoc') }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="status_dh" value="1">
        <input type="hidden" name="ma_l" value="{{ $ma_l }}">
        <div class="row">
          <div class="col-6">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Ngày bắt đầu tạm dừng học: </th>
                  <td class="was-validated">
                    <input id="batdau_dh" type='date' class='form-control input_table' autofocus required name="batdau_dh" 
                      @if (isset($dunghoc->ketthuc_dh))
                        min="{{ $dunghoc->ketthuc_dh }}"
                      @else
                        min="{{ $lop->ngaybatdau_l }}"
                      @endif
                      max="{{ $lop->ngayketthuc_l }}"
                    >
                  </td>
                </tr>
                <tr>
                  <th scope="row">Ngày kết thúc tạm dừng học: </th>
                  <td class="was-validated">
                    <input id="ketthuc_dh" type='date' class='form-control input_table' autofocus required name="ketthuc_dh"
                      @if (isset($dunghoc->ketthuc_dh))
                        min="{{ $dunghoc->ketthuc_dh }}"
                      @else
                        min="{{ $lop->ngaybatdau_l }}"
                      @endif
                      max="{{ $lop->ngayketthuc_l }}"
                    >
                    <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-6">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Lý do tạm dừng học: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="lydo_dh">
                  </td>
                </tr>
                <tr>
                  <th scope="row">File tạm dừng học: </th>
                  <td class="was-validated">
                    <input type='file' class='form-control input_table' name="file_dh" required>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row mb-2">
            <div class="col-5"></div>
            <div class="col-2">
              <button type="submit"  class="btn btn-primary button_xanhla them" style="width: 100%;">
                <i class="fas fa-plus-square text-light"></i>
                &ensp;
                Thêm
              </button>
            </div>
            <div class="col-5"></div>
          </div>
        </div>
      </form>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin tạm dừng</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dunghoc_chuaduyet as $key => $dunghoc)
            <tr >
              <th scope="row">{{ $key+1 }}</th>
              <td>
                <b>Bắt đầu tạm dừng: </b> {{ $dunghoc->batdau_dh }} <br>
                <b>Kết thúc tạm dừng: </b> {{ $dunghoc->ketthuc_dh }} <br>
                <b>Lý do tạm dừng: </b> {{ $dunghoc->lydo_dh }} <br>
                @if ($dunghoc->file_dh)
                  <a href="{{ asset('public/uploads/dunghoc/'.$dunghoc->file_dh) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File xin tạm dừng
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
                <br>
              </td>
              <td>
                <?php
                  if($dunghoc->status_dh == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fa-solid fa-circle-check "></i>&ensp;  Đã duyệt
                      </span>
                    <?php
                  }else if($dunghoc->status_dh == 1) {
                    ?>
                      <span class="badge badge-light-danger"><i class="fa-solid fa-circle-xmark "></i>&ensp; Chưa duyệt</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 12%;">
                <div class="row">
                  <div class="col-12 mt-1">
                    <a href="{{ URL::to('/vienchuc_dunghoc_edit/'.$ma_l.'/'.$dunghoc->ma_dh)}}">
                      <button type="button" style="width: 100%" class=" btn btn-warning button_cam ">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                        &ensp; Cập nhật
                      </button>
                    </a>
                  </div>
                  <div class="col-12 mt-1">
                    <input class="ma_dh{{ $dunghoc->ma_dh }}" type="hidden" value="{{ $dunghoc->ma_dh }}">
                <button type="button" style="width: 100%" class=" xoa{{ $dunghoc->ma_dh }} btn btn-danger button_do"><i class="fa-solid fa-trash text-light"></i> &ensp;Xoá</button>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
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
    @foreach ($dunghoc_chuaduyet as $dunghoc )
      document.querySelector('.xoa{{ $dunghoc->ma_dh }}').addEventListener('click', (event)=>{
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
          cancelButtonText: '<i class="fa-solid fa-xmark text-light"></i> &ensp;  Huỷ',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            var id= $('.ma_dh{{ $dunghoc->ma_dh }}').val();
            $.ajax({
              url:"{{ url("/vienchuc_dunghoc_delete") }}", 
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
  <script>
    $(document).ready(function(){
      $('#ketthuc_dh').change(function(){
        var ketthuc_dh = $(this).val();
        var batdau_dh = $('#batdau_dh').val();
        // alert(batdau_dh);
        // alert(ketthuc_dh);
        if(batdau_dh > ketthuc_dh){  
          $('#baoloi').html('Ngày kết thúc phải lớn hơn ngày bắt đầu');
          $('#ketthuc_dh').val('');
        }else{
          $('#baoloi').html(''); 
        }
      });
    });
  </script>
@endsection