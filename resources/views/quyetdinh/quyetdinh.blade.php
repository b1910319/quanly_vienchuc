@extends('layout')
@section('content')
<?php use Illuminate\Support\Carbon; ?>
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
        ________THÔNG TIN QUYẾT ĐỊNH CỬ ĐI HỌC CỦA VIÊN CHỨC________
      </h4>
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary button_xanhla" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
            <i class="fas fa-plus-square text-light"></i>
            &ensp; Thêm
          </button>
          @if ($vienchuc != '' && $lop != '')
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_quyetdinh/'.$lop->ma_l.'/'.$vienchuc->ma_vc) }}">
              <button type="button" class="btn btn-danger button_do">
                <i class="fa-solid fa-trash text-light"></i>
                &ensp;
                Xoá tất cả
              </button>
            </a>
          @else
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_quyetdinh_all') }}">
              <button type="button" class="btn btn-danger button_do">
              <i class="fa-solid fa-trash text-light"></i>
              &ensp;
              Xoá tất cả
            </button>
            </a>
          @endif
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form action="{{ URL::to('/add_quyetdinh') }}" method="POST"
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
                          <th scope="row">Ngày ký quyết định: </th>
                          <td class="was-validated">
                            <?php 
                              Carbon::now('Asia/Ho_Chi_Minh'); 
                              $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                              ?>
                              <input type='date' class='form-control input_table' autofocus required name="ngayky_qd" max="<?php echo $now ?>">
                              <?php
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Số quyết định: </th>
                          <td class="was-validated">
                            <input id="so_qd" type='text' class='form-control input_table' autofocus required name="so_qd">
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
                          <th scope="row">File quyết định: </th>
                          <td class="was-validated">
                            <input type='file' class='form-control input_table' required name="file_qd">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_qd" required>
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
          </div>
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
    <form action="{{ URL::to('/delete_quyetdinh_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức</th>
            <th class="text-light" scope="col">Thông tin lớp học</th>
            <th class="text-light" scope="col">Thông tin quyết định</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $key => $quyetdinh)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_qd[{{ $quyetdinh->ma_qd }}]" value="{{ $quyetdinh->ma_qd }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                <b>Họ tên viên chức: </b> {{ $quyetdinh->hoten_vc }} <br>
                <b>Email viên chức: </b> {{ $quyetdinh->user_vc }} <br>
                <b>Số điện thoại viên chức: </b> {{ $quyetdinh->sdt_vc }} <br>
              </td>
              <td style="width: 25%">
                <b>Tên lớp học: </b> {{ $quyetdinh->ten_l }} <br>
                <b>Ngày bắt đầu: </b> 
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaybatdau_l = Carbon::parse(Carbon::create($quyetdinh->ngaybatdau_l))->format('d-m-Y');
                  echo $ngaybatdau_l;
                ?>
                <br>
                <b>Ngày kết thúc: </b> 
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngayketthuc_l = Carbon::parse(Carbon::create($quyetdinh->ngayketthuc_l))->format('d-m-Y');
                  echo $ngayketthuc_l;
                ?>
                <br>
                <b>Tên cơ sở đào tạo: </b> {{ $quyetdinh->tencosodaotao_l }} <br>
                <b>Quốc gia đào tạo: </b> {{ $quyetdinh->ten_qg }} <br>
                <b>Email cơ sở đào tạo: </b> {{ $quyetdinh->emailcoso_l }} <br>
                <b>Số điện thoại cơ sở đào tạo: </b> {{ $quyetdinh->sdtcoso_l }} <br>
              </td>
              <td>
                <b>Số quyết định: </b>{{ $quyetdinh->so_qd }} <br>
                <b>Ngày ký quyết định: </b>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngayky_qd = Carbon::parse(Carbon::create($quyetdinh->ngayky_qd))->format('d-m-Y');
                  echo $ngayky_qd;
                ?>
                <br>
                @if ($quyetdinh->file_qd)
                  <a href="{{ asset('public/uploads/quyetdinh/'.$quyetdinh->file_qd) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File quyết định
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif

              </td>
              <td>
                <?php
                  if($quyetdinh->status_qd == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị
                      </span>
                    <?php
                  }else if($quyetdinh->status_qd == 1) {
                    ?>
                      <span class="badge badge-light-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 12%;">
                <div class="row">
                  <div class="col-12 mt-1">
                    <a href="{{ URL::to('/edit_quyetdinh/'.$quyetdinh->ma_qd)}}">
                      <button type="button" class=" btn btn-warning button_cam" style="width: 100%">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                        &ensp; Cập nhật
                      </button>
                    </a>
                  </div>
                  <div class="col-12 mt-1">
                    <input class="ma_qd{{ $quyetdinh->ma_qd }}" type="hidden" value="{{ $quyetdinh->ma_qd }}">
                    <button type="button" class=" xoa{{ $quyetdinh->ma_qd }} btn btn-danger button_do" style="width: 100%">
                      <i class="fa-solid fa-trash text-light"></i> 
                      &ensp;Xoá
                    </button>
                  </div>
                  <div class="col-12 mt-1">
                    <?php
                      if($quyetdinh->status_qd == 0){
                        ?>
                          <a href="{{ URL::to('/select_quyetdinh/'.$quyetdinh->ma_qd) }}">
                            <button type="button" class="btn btn-secondary fw-bold" style="width: 100%">
                              <i class="fa-solid fa-eye-slash text-light"></i> 
                              &ensp; Ẩn
                            </button>
                          </a>
                        <?php
                      }else if($quyetdinh->status_qd == 1) {
                        ?>
                          <a href="{{ URL::to('/select_quyetdinh/'.$quyetdinh->ma_qd) }}">
                            <button type="button" class="btn btn-success fw-bold" style="width: 100%">
                              <i class="fa-solid fa-eye text-light"></i>
                              &ensp; Hiển thị
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
  @foreach ($list as $quyetdinh )
    document.querySelector('.xoa{{ $quyetdinh->ma_qd }}').addEventListener('click', (event)=>{
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
          var id= $('.ma_qd{{ $quyetdinh->ma_qd }}').val();
          $.ajax({
            url:"{{ url("/delete_quyetdinh") }}", 
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
    $('#so_qd').mouseout(function(){
      var so_qd = $(this).val();
      // alert(so_qd);
      $.ajax({
        url:"{{ url("/check_so_qd") }}",
        type:"GET",
        data:{so_qd:so_qd},
        success:function(data){
          if(data == 1){  
            $('#baoloi').html('Số quyết định đã tồn tại');
            $('#so_qd').val('');
          }else{
            $('#baoloi').html(''); 
          }
        }
      });
    });
  });
</script>
<!--  -->
@endsection
