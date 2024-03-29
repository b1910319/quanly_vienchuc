@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('kyluat') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
        ________THÔNG TIN KỶ LUẬT VIÊN CHỨC " <span style="color: #FFFF00"> {{ $vienchuc->hoten_vc }}</span> "________
      </h4>
    </div>
    <?php 
      $mess = session()->get('message_add_kyluat');
      if ($mess != null) {
        ?>
          <div class="alert alert-success alert-dismissible fade show fw-bold" role="alert" style="width: 20%">
            <?php echo $mess ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
        $mess = session()->put('message_add_kyluat', null);
      }
    ?>
    <?php 
      $mess = session()->get('message_update_kyluat');
      if ($mess != null) {
        ?>
          <div class="alert alert-warning alert-dismissible fade show fw-bold" role="alert" style="width: 20%">
            <?php echo $mess ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
        $mess = session()->put('message_update_kyluat', null);
      }
    ?>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary button_xanhla" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
            <i class="fas fa-plus-square text-light"></i>
            &ensp; Thêm
          </button>
          <button type="button" class="btn btn-primary button_xanhla" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                  <form class="form-container" action="{{ URL::to('add_kyluat_excel') }}" method="POST" enctype='multipart/form-data'>
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
          </div>
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_kyluat/'.$ma_vc) }}">
            <button type="button" class="btn btn-danger button_do">
              <i class="fa-solid fa-trash text-light"></i>
              &ensp;
              Xoá tất cả
            </button>
          </a>
          <a href="{{ URL::to('/kyluat_xuatfile_pdf/'.$ma_vc) }}">
            <button type="button" class="btn btn-warning fw-bold button_do">
              <i class="fa-solid fa-file-pdf text-light"></i>
              &ensp;
              Xuất file PDF
            </button>
          </a>
          <a href="{{ URL::to('/kyluat_xuatfile_word/'.$ma_vc) }}">
            <button type="button" class="btn btn-primary button_word" >
              <i class="fa-solid fa-file-word text-light"></i>
              &ensp;
              Xuất file Word
            </button>
          </a>
          {{-- <button class="btn btn-primary button_thongke" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
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
                <thead>
                  <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($count_status as $key => $count_stt)
                    @if ($count_stt->status_kl == 0)
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
          </div> --}}
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form action="{{ URL::to('/add_kyluat/'.$ma_vc) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Loại kỷ luật: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="ma_lkl" name="ma_lkl" required>
                              <option value="" >Chọn loại kỷ luật</option>
                              @foreach ($list_loaikyluat as $loaikyluat )
                                <option value="{{ $loaikyluat->ma_lkl }}" >{{ $loaikyluat->ten_lkl }}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày kỷ luật: </th>
                          <td class="was-validated">
                            <?php 
                              use Illuminate\Support\Carbon;
                              Carbon::now('Asia/Ho_Chi_Minh'); 
                              $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                              ?>
                                <input type='date' class='form-control input_table' autofocus required name="ngay_kl" max="<?php echo $now ?>">
                              <?php
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Số quyết định: </th>
                          <td class="was-validated">
                            <input type='text' id="soquyetdinh_kl"  class='form-control input_table' autofocus required name="soquyetdinh_kl">
                            <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">File quyết định: </th>
                          <td class="was-validated">
                            <input type='file' class='form-control input_table' required name="filequyetdinh_kl">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Lý do kỷ luật: </th>
                          <td class="was-validated">
                            <div class="form-floating">
                              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" required style="height:190px; resize: none;" name="lydo_kl"></textarea>
                              <label for="floatingTextarea2">Lý do kỷ luật</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_kl" required>
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
    <?php
      $message=session()->get('message');
      if($message){
        ?>
          <div class="alert alert-warning alert-dismissible fade show fw-bold" role="alert">
            <?php echo $message ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
        session()->put('message',null);
      }
    ?>
    <form action="{{ URL::to('/delete_kyluat_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Loại kỷ luật</th>
            <th class="text-light" scope="col">Thông tin kỷ luật</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody  >
          @foreach ($list as $key => $kyluat)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_kl[{{ $kyluat->ma_kl }}]" value="{{ $kyluat->ma_kl }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                {{ $kyluat->ten_lkl }}
              </td>
              <td style="width: 35%">
                <b>Lý do kỷ luật: </b> {{ $kyluat->lydo_kl }} <br>
                <b>Số quyết định: </b> {{ $kyluat->soquyetdinh_kl }} <br>
                <b>Ngày ky quyết định: </b> {{ date('d-m-Y') , strtotime($kyluat->ngay_kl) }} <br>
                @if ($kyluat->filequyetdinh_kl)
                  <a href="{{ asset('public/uploads/kyluat/'.$kyluat->filequyetdinh_kl) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File quyết định
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
              </td>
              <td>
                <?php
                  if($kyluat->status_kl == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị
                      </span>
                    <?php
                  }else if($kyluat->status_kl == 1) {
                    ?>
                      <span class="badge badge-light-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 12%;">
                <div class="row">
                  <div class="col-12">
                    <a href="{{ URL::to('/edit_kyluat/'.$kyluat->ma_kl.'/'.$ma_vc)}}">
                      <button style="width: 100%" type="button" class=" btn btn-warning button_cam">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                        &ensp; Cập nhật
                      </button>
                    </a>
                  </div>
                  <div class="col-12 mt-1">
                    <input class="ma_kl{{ $kyluat->ma_kl }}" type="hidden" value="{{ $kyluat->ma_kl }}">
                    <button style="width: 100%" type="button" class=" xoa{{ $kyluat->ma_kl }} btn btn-danger button_do"><i class="fa-solid fa-trash text-light"></i> &ensp;Xoá</button>
                  </div>
                  <div class="col-12 mt-1">
                    <?php
                      if($kyluat->status_kl == 0){
                        ?>
                          <a href="{{ URL::to('/select_kyluat/'.$kyluat->ma_kl) }}">
                            <button style="width: 100%" type="button" class="btn btn-secondary fw-bold">
                              <i class="fa-solid fa-eye-slash text-light"></i> 
                              &ensp; Ẩn
                            </button>
                          </a>
                        <?php
                      }else if($kyluat->status_kl == 1) {
                        ?>
                          <a href="{{ URL::to('/select_kyluat/'.$kyluat->ma_kl) }}">
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
  @foreach ($list as $kyluat )
    document.querySelector('.xoa{{ $kyluat->ma_kl }}').addEventListener('click', (event)=>{
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
          var id= $('.ma_kl{{ $kyluat->ma_kl }}').val();
          $.ajax({
            url:"{{ url("/delete_kyluat") }}", 
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
    $('#soquyetdinh_kl').mouseout(function(){
      var soquyetdinh_kl = $(this).val();
      var soquyetdinh = '';
      $.ajax({
        url:"{{ url("/check_soquyetdinh_kl") }}",
        type:"GET",
        data:{soquyetdinh_kl:soquyetdinh_kl},
        success:function(data){
          if(data == 1){  
            $('#baoloi').html('Số quyết định đã tồn tại');
            $('#soquyetdinh_kl').val('');
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
