@extends('layout')
@section('content')
<?php use Illuminate\Support\Carbon; ?>
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        @if ($phanquyen_qlk)
          <a href="{{ URL::to('/thongtin_vienchuc_khoa') }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @else
          <a href="{{ URL::to('/thongtin_vienchuc_add') }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @endif
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
        ________THÔNG TIN QUÁ TRÌNH NGHỈ CỦA VIÊN CHỨC " <span style="color: #FFFF00"> {{ $vienchuc->hoten_vc }}</span> "________
      </h4>
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
                  <form class="form-container" action="{{ URL::to('add_quatrinhnghi_excel') }}" method="POST" enctype='multipart/form-data'>
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
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_quatrinhnghi/'.$ma_vc) }}">
            <button type="button" class="btn btn-danger button_do">
              <i class="fa-solid fa-trash text-light"></i>
              &ensp;
              Xoá tất cả
            </button>
          </a>
          <a href="{{ URL::to('/quatrinhnghi_xuatfile/'.$ma_vc) }}">
            <button type="button" class="btn btn-warning fw-bold button_do">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
          <a href="{{ URL::to('quatrinhnghi_xuatfile_word/'.$ma_vc) }}">
            <button type="button" class="btn btn-primary button_word" >
              <i class="fa-solid fa-file-word text-light"></i>
              &ensp;
              Xuất file Word
            </button>
          </a>
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form  action="{{ URL::to('/add_quatrinhnghi/'.$ma_vc) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Danh mục nghỉ: </th>
                          <td class="was-validated">
                            <select class="custom-select" id="ma_dmn" name="ma_dmn" required>
                              <option value="" >Chọn danh mục</option>
                              @foreach ($list_danhmucnghi as $danhmucnghi )
                                <option value="{{ $danhmucnghi->ma_dmn }}" >{{ $danhmucnghi->ten_dmn }}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Bắt đầu: </th>
                          <td class="was-validated">
                            <div class="row">
                              <div class="col-5">
                                <?php 

                                  Carbon::now('Asia/Ho_Chi_Minh'); 
                                  $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                                  ?>
                                  <input id="batdau_qtn" type='date' class='form-control input_table' autofocus required name="batdau_qtn" max="<?php echo $now ?>">
                                  <?php
                                ?>
                              </div>
                              <div class="col-2">
                                <p class="mt-1 fw-bold text-center">Kết thúc</p>
                              </div>
                              <div class="col-5">
                                <input id="ketthuc_qtn" type='date' class='form-control input_table' autofocus name="ketthuc_qtn">
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ghi chú: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus  name="ghichu_qtn">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">File xin nghĩ: </th>
                          <td class="was-validated">
                            <input type='file' class='form-control input_table' name="file_qtn" required>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Số quyết định: </th>
                          <td class="was-validated">
                            <input id="soquyetdinh_qtn" type='text' class='form-control input_table' autofocus required name="soquyetdinh_qtn">
                            <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">File quyết định: </th>
                          <td class="was-validated">
                            <input type='file' class='form-control input_table' name="filequyetdinh_qtn" required>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày ký quyết định: </th>
                          <td class="was-validated">
                            <?php 
                              $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                              ?>
                              <input type='date' class='form-control input_table' autofocus required name="ngaykyquyetdinh_qtn" max="<?php echo $now ?>">
                              <?php
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_qtn">
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
    <form action="{{ URL::to('/delete_quatrinhnghi_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin nghĩ</th>
            <th class="text-light" scope="col">Thông tin quyết định</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody  >
          @foreach ($list as $key => $quatrinhnghi)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_qtn[{{ $quatrinhnghi->ma_qtn }}]" value="{{ $quatrinhnghi->ma_qtn }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                <b>- Danh mục nghỉ: </b>{{ $quatrinhnghi->ten_dmn }} <br>
                <b>- Bắt đầu nghỉ: </b>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $batdau_qtn = Carbon::parse(Carbon::create($quatrinhnghi->batdau_qtn))->format('d-m-Y');
                  echo $batdau_qtn;
                ?>
                <br>
                <b>- Kết thúc nghỉ: </b>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ketthuc_qtn = Carbon::parse(Carbon::create($quatrinhnghi->ketthuc_qtn))->format('d-m-Y');
                  echo $ketthuc_qtn;
                ?>
                <br>
                <b>- Ghi chú: </b>{{ $quatrinhnghi->ghichu_qtn }} <br>
                @if ($quatrinhnghi->file_qtn)
                  <a href="{{ asset('public/uploads/quatrinhnghi/'.$quatrinhnghi->file_qtn) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File xin nghỉ
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
              </td>
              <td>
                <b>- Số quyết định: </b>{{ $quatrinhnghi->soquyetdinh_qtn }} <br>
                <b>- Ngày ký quyết định: </b>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaykyquyetdinh_qtn = Carbon::parse(Carbon::create($quatrinhnghi->ngaykyquyetdinh_qtn))->format('d-m-Y');
                  echo $ngaykyquyetdinh_qtn;
                ?>
                <br>
                @if ($quatrinhnghi->filequyetdinh_qtn)
                  <a href="{{ asset('public/uploads/quatrinhnghi/'.$quatrinhnghi->filequyetdinh_qtn) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File quyết định
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
              </td>
              <td>
                <?php
                  if($quatrinhnghi->status_qtn == 0){
                    ?>
                      <span class="badge rounded-pill text-bg-success"><i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị</span>
                    <?php
                  }else if($quatrinhnghi->status_qtn == 1) {
                    ?>
                      <span class="badge text-bg-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 12%;">
                <div class="row">
                  <div class="col-12 mt-1">
                    <a href="{{ URL::to('/edit_quatrinhnghi/'.$quatrinhnghi->ma_qtn.'/'.$ma_vc)}}">
                      <button style="width: 100%" type="button" class=" btn btn-warning button_cam">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                        &ensp; Cập nhật
                      </button>
                    </a>
                  </div>
                  <div class="col-12 mt-1">
                    <input class="ma_qtn{{ $quatrinhnghi->ma_qtn }}" type="hidden" value="{{ $quatrinhnghi->ma_qtn }}">
                    <button style="width: 100%" type="button" class=" xoa{{ $quatrinhnghi->ma_qtn }} btn btn-danger button_do">
                      <i class="fa-solid fa-trash text-light"></i> 
                      &ensp;Xoá
                    </button>
                  </div>
                  <div class="col-12 mt-1">
                    <?php
                      if($quatrinhnghi->status_qtn == 0){
                        ?>
                          <a href="{{ URL::to('/select_quatrinhnghi/'.$quatrinhnghi->ma_qtn) }}">
                            <button style="width: 100%" type="button" class="btn btn-secondary fw-bold">
                              <i class="fa-solid fa-eye-slash text-light"></i> 
                              &ensp; Ẩn
                            </button>
                          </a>
                        <?php
                      }else if($quatrinhnghi->status_qtn == 1) {
                        ?>
                          <a href="{{ URL::to('/select_quatrinhnghi/'.$quatrinhnghi->ma_qtn) }}">
                            <button style="width: 100%" type="button" class="btn btn-success fw-bold">
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
  @foreach ($list as $key => $quatrinhnghi)
    document.querySelector('.xoa{{ $quatrinhnghi->ma_qtn }}').addEventListener('click', (event)=>{
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
          var id= $('.ma_qtn{{ $quatrinhnghi->ma_qtn }}').val();
          $.ajax({
            url:"{{ url("/delete_quatrinhnghi") }}", 
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
<script>
  $(document).ready(function(){
    $('#soquyetdinh_qtn').mouseout(function(){
      var soquyetdinh_qtn = $(this).val();
      var soquyetdinh = '';
      $.ajax({
        url:"{{ url("/check_soquyetdinh_qtn") }}",
        type:"GET",
        data:{soquyetdinh_qtn:soquyetdinh_qtn},
        success:function(data){
          if(data == 1){  
            $('#baoloi').html('Số quyết định đã tồn tại');
            $('#soquyetdinh_qtn').val('');
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
