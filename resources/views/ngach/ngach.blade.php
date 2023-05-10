@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-light color_alert" role="alert">
      ________THÔNG TIN NGẠCH CỦA VIÊN CHỨC________
    </div>
    <?php 
      $mess = session()->get('message_add_ngach');
      if ($mess != null) {
        ?>
          <div class="alert alert-success alert-dismissible fade show fw-bold" role="alert" style="width: 20%">
            <?php echo $mess ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
        $mess = session()->put('message_add_ngach', null);
      }
    ?>
    <?php 
      $mess = session()->get('message_update_ngach');
      if ($mess != null) {
        ?>
          <div class="alert alert-warning alert-dismissible fade show fw-bold" role="alert" style="width: 20%">
            <?php echo $mess ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
        $mess = session()->put('message_update_ngach', null);
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
                  <form class="form-container" action="{{ URL::to('add_ngach_excel') }}" method="POST" enctype='multipart/form-data'>
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
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_ngach') }}">
            <button type="button" class="btn btn-danger button_do">
              <i class="fa-solid fa-trash text-light"></i>
              &ensp;
              Xoá tất cả
            </button>
          </a>
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form action="{{ URL::to('/add_ngach') }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Tên ngạch: </th>
                          <td class="was-validated">
                            <input id="ten_n" type='text' class='form-control input_table' autofocus required name="ten_n">
                            <p id="baoloi_ten" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></p>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Mã số ngạch: </th>
                          <td class="was-validated">
                            <input type='text' id="maso_n" class='form-control input_table' autofocus required name="maso_n">
                            <p id="baoloi_maso" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Số năm nâng bậc: </th>
                          <td class="was-validated">
                            <input type='number' class='form-control input_table' autofocus required name="sonamnangbac_n">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_n">
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
    <div class="mt-3"></div>
    <form action="{{ URL::to('/delete_ngach_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table" >
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Ngạch </th>
            <th class="text-light" scope="col">Mã số ngạch</th>
            <th class="text-light" scope="col">Bậc</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody  >
          @foreach ($list as $key => $ngach)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_n[{{ $ngach->ma_n }}]" value="{{ $ngach->ma_n }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                {{ $ngach->ten_n }} ({{ $ngach->ma_n }})
              </td>
              <td>
                {{ $ngach->maso_n }}
              </td>
              <td style="width: 12%">
                <?php
                  foreach ($count_bac_ngach as $key => $count) {
                    if($count->ma_n == $ngach->ma_n && $count->sum > 0){
                      ?>
                        <a href="{{ URL::to('/bac_ngach/'.$ngach->ma_n) }}">
                          <button type="button" class="btn btn-primary position-relative button_xanhla" style=" width: 100%;">
                            <i class="fas fa-plus-square text-light"></i>
                            &ensp;
                            Thêm bậc
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                              <?php echo $count->sum ?>
                              <span class="visually-hidden">

                              </span>
                            </span>
                          </button>
                        </a>
                      <?php
                    }elseif ($count->ma_n == $ngach->ma_n && $count->sum == 0) {
                      ?>
                        <a href="{{ URL::to('/bac_ngach/'.$ngach->ma_n) }}">
                          <button type="button" class="btn btn-primary position-relative button_xanhla" style=" width: 100%;">
                            <i class="fas fa-plus-square text-light"></i>
                            &ensp;
                            Thêm bậc
                          </button>
                        </a>
                      <?php
                    }
                  }
                ?>
              </td>
              <td>
                <?php
                  if($ngach->status_n == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị
                      </span>
                    <?php
                  }else if($ngach->status_n == 1) {
                    ?>
                      <span class="badge badge-light-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 27%;">
                <a href="{{ URL::to('/edit_ngach/'.$ngach->ma_n)}}">
                  <button type="button" class=" btn btn-warning button_cam">
                    <i class="fa-solid fa-pen-to-square text-light"></i>
                    &ensp; Cập nhật
                  </button>
                </a>
                <input class="ma_n{{ $ngach->ma_n }}" type="hidden" value="{{ $ngach->ma_n }}">
                <button type="button" class=" xoa{{ $ngach->ma_n }} btn btn-danger button_do"><i class="fa-solid fa-trash text-light"></i> &ensp;Xoá</button>
                <?php
                  if($ngach->status_n == 0){
                    ?>
                      <a href="{{ URL::to('/select_ngach/'.$ngach->ma_n) }}">
                        <button type="button" class="btn btn-secondary fw-bold">
                          <i class="fa-solid fa-eye-slash text-light"></i> 
                          &ensp; Ẩn
                        </button>
                      </a>
                    <?php
                  }else if($ngach->status_n == 1) {
                    ?>
                      <a href="{{ URL::to('/select_ngach/'.$ngach->ma_n) }}">
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
<script>
  @foreach ($list as $ngach )
    document.querySelector('.xoa{{ $ngach->ma_n }}').addEventListener('click', (event)=>{
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
          var id= $('.ma_n{{ $ngach->ma_n }}').val();
          $.ajax({
            url:"{{ url("/delete_ngach") }}", 
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
    $('#ten_n').mouseout(function(){
      var ten_n = $(this).val();
      // alert(ten_n);
      $.ajax({
        url:"{{ url("/check_ten_n") }}",
        type:"GET",
        data:{ten_n:ten_n},
        success:function(data){
          if(data == 1){  
            $('#baoloi_ten').html('Ngạch đã tồn tại');
            $('#ten_n').val('');
          }else{
            $('#baoloi_ten').html(''); 
          }
        }
      });
    });
  });
  $(document).ready(function(){
    $('#maso_n').mouseout(function(){
      var maso_n = $(this).val();
      // alert(maso_n);
      $.ajax({
        url:"{{ url("/check_maso_n") }}",
        type:"GET",
        data:{maso_n:maso_n},
        success:function(data){
          if(data == 1){  
            $('#baoloi_maso').html('Mã số ngạch đã tồn tại');
            $('#maso_n').val('');
          }else{
            $('#baoloi_maso').html(''); 
          }
        }
      });
    });
  });
</script>
<!--  -->
@endsection
