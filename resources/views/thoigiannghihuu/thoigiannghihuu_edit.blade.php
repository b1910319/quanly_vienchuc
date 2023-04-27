@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-light row color_alert" role="alert" >
      <div class="col-1">
        <a href="{{ URL::to('thoigiannghihuu') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_thoigiannghihuu/'.$edit->ma_tgnh) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row" style="width: 30%">Năm nghỉ hưu: </th>
                <td class="was-validated">
                  <input type="hidden" name="" id="ma_tgnh" value="{{ $edit->ma_tgnh }}">
                  <input type='number' id="thoigian_tgnh" class='form-control input_table' autofocus required name="thoigian_tgnh" value="{{ $edit->thoigian_tgnh }}">
                  <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                </td>
              </tr>
              <tr>
                <th scope="row">Nam nghỉ hưu: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-6">
                      <div class="input-group mb-3">
                        <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" required min="50" name="tuoinam" value="{{ floor($edit->nam_tgnh/12) }}">

                        <span class="input-group-text" id="basic-addon2">tuổi</span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group mb-3">
                        <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $edit->nam_tgnh%12 }}" min="0" name="thangnam">

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
                        <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" required min="50" name="tuoinu" value="{{ floor($edit->nu_tgnh/12) }}">

                        <span class="input-group-text" id="basic-addon2">tuổi</span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group mb-3">
                        <input type="number" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{  $edit->nu_tgnh%12 }}" min="0" name="thangnu">

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
                    @if ($edit->status_tgnh == 1)
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
    $('#thoigian_tgnh').mouseout(function(){
      var thoigian_tgnh = $(this).val();
      var ma_tgnh = $('#ma_tgnh').val();
      var ten = '';
      // alert(thoigian_tgnh);
      $.ajax({
        url:"{{ url("/check_thoigian_tgnh_edit") }}",
        type:"GET",
        data:{thoigian_tgnh:thoigian_tgnh, ma_tgnh:ma_tgnh},
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


