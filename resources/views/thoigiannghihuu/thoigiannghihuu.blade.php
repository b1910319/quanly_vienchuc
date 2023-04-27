@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-light color_alert" role="alert" >
      ________THÔNG TIN VỀ THỜI GIAN NGHỈ HƯU CỦA VIÊN CHỨC________
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary button_xanhla" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
            <i class="fas fa-plus-square text-light"></i>
            &ensp; Thêm
          </button>
          {{-- <button type="button" class="btn btn-primary button_xanhla" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-upload text-light"></i> &ensp;
            Nhập file
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Nhập file</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="form-container" action="{{ URL::to('add_thoigiannghihuu_excel') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                      <div class="col-9">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Chọn file cần nhập</label>
                          <input class="form-control" type="file" id="formFile" name="import_excel" accept=".xlsx" required>
                        </div>
                      </div>
                      <div class="col-3" style="margin-top: 37px">
                        <button type="submit" class="btn btn-primary button_xanhla">
                          <i class="fa-solid fa-upload text-light"></i> &ensp;
                          Upload
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                    <i class="fa-solid fa-square-xmark text-light"></i>
                    &ensp; Đóng
                  </button>
                </div>
              </div>
            </div>
          </div> --}}
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_thoigiannghihuu') }}">
            <button type="button" class="btn btn-danger button_do">
              <i class="fa-solid fa-trash text-light"></i>
              &ensp;
              Xoá tất cả
            </button>
          </a>
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form action="{{ URL::to('/add_thoigiannghihuu') }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 30%">Năm nghỉ hưu: </th>
                          <td class="was-validated">
                            <input type='number' id="thoigian_tgnh" class='form-control input_table' autofocus required name="thoigian_tgnh">
                            <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Nam nghỉ hưu: </th>
                          <td class="was-validated">
                            <div class="row">
                              <div class="col-6">
                                <div class="input-group mb-3">
                                  <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" required min="50" name="tuoinam">

                                  <span class="input-group-text" id="basic-addon2">tuổi</span>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="input-group mb-3">
                                  <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="0" min="0" name="thangnam">

                                  <span class="input-group-text" id="basic-addon2">tháng</span>
                                </div>
                              </div>
                            </div>
                            
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 30%">Nữ nghỉ hưu: </th>
                          <td class="was-validated">
                            <div class="row">
                              <div class="col-6">
                                <div class="input-group mb-3">
                                  <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" required min="50" name="tuoinu">

                                  <span class="input-group-text" id="basic-addon2">tuổi</span>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="input-group mb-3">
                                  <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="0" min="0" name="thangnu">

                                  <span class="input-group-text" id="basic-addon2">tháng</span>
                                </div>
                              </div>
                            </div>
                            
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_tgnh" required>
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
    <form action="{{ URL::to('/delete_thoigiannghihuu_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">#</th>
            <th class="text-light" scope="col">Năm </th>
            <th class="text-light" scope="col">Nghỉ hưu ở nam </th>
            <th class="text-light" scope="col">Nghỉ hưu ở nữ</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody  >
          @foreach ($list as $key => $thoigiannghihuu)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_tgnh[{{ $thoigiannghihuu->ma_tgnh }}]" value="{{ $thoigiannghihuu->ma_tgnh }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                {{ $thoigiannghihuu->thoigian_tgnh }} ({{ $thoigiannghihuu->ma_tgnh }})
              </td>
              <td>
                {{ floor($thoigiannghihuu->nam_tgnh/12) }} tuổi
                {{ $thoigiannghihuu->nam_tgnh%12 }} tháng
              </td>
              <td>
                {{ floor($thoigiannghihuu->nu_tgnh/12) }} tuổi
                {{ $thoigiannghihuu->nu_tgnh%12 }} tháng
              </td>
              <td>
                <?php
                  if($thoigiannghihuu->status_tgnh == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị
                      </span>
                    <?php
                  }else if($thoigiannghihuu->status_tgnh == 1) {
                    ?>
                      <span class="badge badge-light-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 27%;">
                <a href="{{ URL::to('/edit_thoigiannghihuu/'.$thoigiannghihuu->ma_tgnh)}}">
                  <button type="button" class=" btn btn-warning button_cam">
                    <i class="fa-solid fa-pen-to-square text-light"></i>
                    &ensp; Cập nhật
                  </button>
                </a>
                <input class="ma_tgnh{{ $thoigiannghihuu->ma_tgnh }}" type="hidden" value="{{ $thoigiannghihuu->ma_tgnh }}">
                <button type="button" class=" xoa{{ $thoigiannghihuu->ma_tgnh }} btn btn-danger button_do"><i class="fa-solid fa-trash text-light"></i> &ensp;Xoá</button>
                <?php
                  if($thoigiannghihuu->status_tgnh == 0){
                    ?>
                      <a href="{{ URL::to('/select_thoigiannghihuu/'.$thoigiannghihuu->ma_tgnh) }}">
                        <button type="button" class="btn btn-secondary fw-bold">
                          <i class="fa-solid fa-eye-slash text-light"></i> 
                          &ensp; Ẩn
                        </button>
                      </a>
                    <?php
                  }else if($thoigiannghihuu->status_tgnh == 1) {
                    ?>
                      <a href="{{ URL::to('/select_thoigiannghihuu/'.$thoigiannghihuu->ma_tgnh) }}">
                        <button type="button" class="btn btn-success fw-bold">
                          <i class="fa-solid fa-eye text-light"></i>
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
  @foreach ($list as $thoigiannghihuu )
    document.querySelector('.xoa{{ $thoigiannghihuu->ma_tgnh }}').addEventListener('click', (event)=>{
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
          var id= $('.ma_tgnh{{ $thoigiannghihuu->ma_tgnh }}').val();
          $.ajax({
            url:"{{ url("/delete_thoigiannghihuu") }}", 
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
    $('#thoigian_tgnh').mouseout(function(){
      var thoigian_tgnh = $(this).val();
      var ten = '';
      // alert(thoigian_tgnh);
      $.ajax({
        url:"{{ url("/check_thoigian_tgnh") }}",
        type:"GET",
        data:{thoigian_tgnh:thoigian_tgnh},
        success:function(data){
          if(data == 1){  
            $('#baoloi').html('Năm đã tồn tại');
            $('#thoigian_tgnh').val('');
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


