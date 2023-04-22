@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert" >
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
        ________THÔNG TIN VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC________
      </h4>
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          {{-- <button role="button" class="item-question collapsed btn btn-primary button_xanhla" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
            <i class="fas fa-plus-square text-light"></i>
            &ensp; Thêm
          </button> --}}
          @if ($vienchuc != '' && $lop != '')
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_dunghoc/'.$lop->ma_l.'/'.$vienchuc->ma_vc) }}">
              <button type="button" class="btn btn-danger button_do">
                <i class="fa-solid fa-trash text-light"></i>
                &ensp;
                Xoá tất cả
              </button>
            </a>
          @else
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_dunghoc_all') }}">
              <button type="button" class="btn btn-danger button_do">
                <i class="fa-solid fa-trash text-light"></i>
                &ensp;
                Xoá tất cả
              </button>
            </a>
          @endif
          <button class="btn btn-primary button_thongke" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
            <i class="fa-solid fa-chart-simple text-light"></i> &ensp;
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
                <thead class="">
                  <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($count_status as $key => $count_stt)
                    @if ($count_stt->status_dh == 0)
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
          {{-- <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form action="{{ URL::to('/add_dunghoc') }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        @if ($vienchuc != '' && $lop != '')
                          <input type="hidden" name="ma_vc" value="{{ $vienchuc->ma_vc }}">
                          <input type="hidden" name="ma_l" value="{{ $lop->ma_l }}">
                        @else
                          <tr>
                            <th scope="row">Viên chức: </th>
                            <td class="was-validated">
                              <select class="custom-select input_table" id="gender2" name="ma_vc" required>
                                <option value="" >Chọn viên chức</option>
                                @foreach ($list_vienchuc as $vienchuc )
                                <option value="{{ $vienchuc->ma_vc }}" >{{ $vienchuc->hoten_vc }}</option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Lớp: </th>
                            <td class="was-validated">
                              <select class="custom-select input_table" id="gender2" name="ma_l" required>
                                <option value="" >Chọn lớp</option>
                                @foreach ($list_lop as $lop )
                                  <option value="{{ $lop->ma_l }}" >{{ $lop->ten_l }}</option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                        @endif
                        
                        <tr>
                          <th scope="row">Ngày bắt đầu tạm dừng học: </th>
                          <td class="was-validated">
                            <input id="batdau_dh" type='date' class='form-control input_table' autofocus required name="batdau_dh">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày kết thúc tạm dừng học: </th>
                          <td class="was-validated">
                            <input id="ketthuc_dh" type='date' class='form-control input_table' autofocus required name="ketthuc_dh">
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
                            <input type='file' class='form-control input_table' required name="file_dh">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_dh" required>
                              <option value="" >Chọn trạng thái</option>
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
            </div>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
    <form action="{{ URL::to('/delete_dunghoc_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức</th>
            <th class="text-light" scope="col">Thông tin lớp học</th>
            <th class="text-light" scope="col">Thông tin tạm dừng học</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $key => $dunghoc)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_dh[{{ $dunghoc->ma_dh }}]" value="{{ $dunghoc->ma_dh }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                <b>Họ tên viên chức: </b> {{ $dunghoc->hoten_vc }} <br>
                <b>Email viên chức: </b> {{ $dunghoc->user_vc }} <br>
                <b>Số điện thoại viên chức: </b> {{ $dunghoc->sdt_vc }} <br>
                <b>Khoa: </b> {{ $dunghoc->ten_k}}
              </td>
              <td>
                <b>Tên lớp học: </b> {{ $dunghoc->ten_l }} <br>
                <b>Ngày bắt đầu: </b> {{ $dunghoc->ngaybatdau_l }} <br>
                <b>Ngày kết thúc: </b> {{ $dunghoc->ngayketthuc_l }} <br>
                <b>Tên cơ sở đào tạo: </b> {{ $dunghoc->tencosodaotao_l }} <br>
                <b>Quốc gia đào tạo: </b> {{ $dunghoc->quocgiaodaotao_l }} <br>
                <b>Email cơ sở đào tạo: </b> {{ $dunghoc->emailcoso_l }} <br>
                <b>Số điện thoại cơ sở đào tạo: </b> {{ $dunghoc->sdtcoso_l }} <br>
              </td>
              <td style="width: 19%">
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
                @if ($dunghoc->filequyetdinh_dh)
                  <a href="{{ asset('public/uploads/dunghoc/'.$dunghoc->filequyetdinh_dh) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File quyết định
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file quyết định</span>
                @endif
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
                    <a href="{{ URL::to('/edit_dunghoc/'.$dunghoc->ma_dh)}}">
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
                  <div class="col-12 mt-1">
                    <?php
                      if($dunghoc->status_dh == 0){
                        ?>
                          <a href="{{ URL::to('/select_dunghoc/'.$dunghoc->ma_dh) }}">
                            <button type="button" style="width: 100%" class="btn btn-secondary fw-bold">
                              <i class="fa-solid fa-circle-xmark text-light "></i>
                              &ensp; Chưa duyệt
                            </button>
                          </a>
                        <?php
                      }else if($dunghoc->status_dh == 1) {
                        ?>
                          <a href="{{ URL::to('/select_dunghoc/'.$dunghoc->ma_dh) }}">
                            <button type="button" style="width: 100%" class="btn btn-success fw-bold">
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
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
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
  @foreach ($list as $dunghoc )
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
        cancelButtonText: '<i class="fa-solid fa-xmark"></i> &ensp;  Huỷ',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          var id= $('.ma_dh{{ $dunghoc->ma_dh }}').val();
          $.ajax({
            url:"{{ url("/delete_dunghoc") }}", 
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
<!--  -->
@endsection
