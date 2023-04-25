@extends('layout')
@section('content')
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
          <a href="{{ URL::to('/quatrinhnghi/'.$ma_vc) }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @endif
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form  action="{{ URL::to('/update_quatrinhnghi/'.$ma_vc) }}" method="POST"
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
                        <option value="{{ $danhmucnghi->ma_dmn }}" 
                          @if ($danhmucnghi->ma_dmn == $edit->ma_dmn)
                            selected
                          @endif
                          >
                          {{ $danhmucnghi->ten_dmn }}
                        </option>
                      @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Bắt đầu: </th>
                  <td class="was-validated">
                    <div class="row">
                      <div class="col-5">
                        <input id="batdau_qtn" type='date' class='form-control input_table' autofocus required name="batdau_qtn" value="{{ $edit->batdau_qtn }}">
                      </div>
                      <div class="col-2">
                        <p class="mt-1 fw-bold text-center">Kết thúc</p>
                      </div>
                      <div class="col-5">
                        <input id="ketthuc_qtn" type='date' class='form-control input_table' autofocus name="ketthuc_qtn" value="{{ $edit->ketthuc_qtn }}" >
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Ghi chú: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus  name="ghichu_qtn" value="{{ $edit->ghichu_qtn }}">
                  </td>
                </tr>
                <tr>
                  <th scope="row">File quá trình nghỉ: </th>
                  <td class="was-validated">
                    <div class="row">
                      <div class="col-6">
                        <input type='file' class='form-control input_table' name="file_qtn"
                        @if (!$edit->file_qtn)
                          required
                        @endif
                        >
                      </div>
                      <div class="col-6">
                        @if ($edit->file_qtn)
                          <a href="{{ asset('public/uploads/quatrinhnghi/'.$edit->file_qtn) }}">
                            <button type="button" class="btn btn-warning button_xanhla">
                              <i class="fa-solid fa-file text-light"></i>
                              &ensp;
                              File
                            </button>
                          </a>
                        @else
                          <span style="color: #FF1E1E; font-weight: bold">Không có file</span>
                        @endif
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
                  <th scope="row">Số quyết định: </th>
                  <td class="was-validated">
                    <input type="hidden" name="ma_qtn" id="ma_qtn" value="{{ $edit->ma_qtn }}">
                    <input id="soquyetdinh_qtn" type='text' class='form-control input_table' autofocus required name="soquyetdinh_qtn" value="{{ $edit->soquyetdinh_qtn }}">
                    <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                  </td>
                </tr>
                <tr>
                  <th scope="row">File quá trình nghỉ: </th>
                  <td class="was-validated">
                    <div class="row">
                      <div class="col-6">
                        <input type='file' class='form-control input_table' name="filequyetdinh_qtn"
                        @if (!$edit->filequyetdinh_qtn)
                          required
                        @endif
                        >
                      </div>
                      <div class="col-6">
                        @if ($edit->filequyetdinh_qtn)
                          <a href="{{ asset('public/uploads/quatrinhnghi/'.$edit->filequyetdinh_qtn) }}">
                            <button type="button" class="btn btn-warning button_xanhla">
                              <i class="fa-solid fa-file text-light"></i>
                              &ensp;
                              File
                            </button>
                          </a>
                        @else
                          <span style="color: #FF1E1E; font-weight: bold">Không có file</span>
                        @endif
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Ngày ký quyết định: </th>
                  <td class="was-validated">
                    <?php 
                      use Illuminate\Support\Carbon;
                      Carbon::now('Asia/Ho_Chi_Minh'); 
                      $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                      ?>
                      <input type='date' class='form-control input_table' autofocus required name="ngaykyquyetdinh_qtn" max="<?php echo $now ?>" value="{{ $edit->ngaykyquyetdinh_qtn }}">
                      <?php
                    ?>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Trạng thái: </th>
                  <td class="was-validated">
                    <select class="custom-select input_table" id="gender2" name="status_qtn">
                      <option value="0" >Chọn trạng thái</option>
                      @if ($edit->status_qtn == 1)
                        <option selected value="1" >Ẩn</option>
                        <option value="0" >Hiển thị</option>
                      @else
                        <option value="0" selected >Hiển thị</option>
                        <option value="1" >Ẩn</option>
                      @endif
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row mb-2">
            <div class="col-5"></div>
            <div class="col-2">
              <button type="submit" class="btn btn-warning button_cam" style=" width: 100%">
                <i class="fa-solid fa-pen-to-square text-light"></i>
                &ensp; Cập nhật
              </button>
            </div>
            <div class="col-5"></div>
          </div>
        </div>
      </form>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#soquyetdinh_qtn').mouseout(function(){
      var soquyetdinh_qtn = $(this).val();
      var ma_qtn = $('#ma_qtn').val();
      var soquyetdinh = '';
      $.ajax({
        url:"{{ url("/check_soquyetdinh_qtn_edit") }}",
        type:"GET",
        data:{soquyetdinh_qtn:soquyetdinh_qtn, ma_qtn:ma_qtn},
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
