@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('ngach') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_ngach/'.$edit->ma_n) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Tên ngạch: </th>
                <td class="was-validated">
                  <input type="hidden" id="ma_n" value="{{ $edit->ma_n }}">
                  <input id="ten_n" type='text' class='form-control input_table' autofocus required name="ten_n" value="{{ $edit->ten_n }}">
                  <span id="baoloi_ten" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                </td>
              </tr>
              <tr>
                <th scope="row">Mã số ngạch: </th>
                <td class="was-validated">
                  <input id="maso_n" type='text' class='form-control input_table' autofocus required name="maso_n" value="{{ $edit->maso_n }}">
                  <span id="baoloi_maso" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
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
                  <input type='text' class='form-control input_table' autofocus required name="sonamnangbac_n" value="{{ $edit->sonamnangbac_n }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_n" required>
                    <option value="" >Chọn trạng thái</option>
                    @if ($edit->status_n == 1)
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
            <button type="submit" class="btn btn-warning button_cam" style="width: 100%">
              <i class="fa-solid fa-pen-to-square text-light"></i>
              &ensp; Cập nhật
            </button>
          </div>
          <div class="col-5"></div>
        </div>
      </div>
    </form>
  </div>
  <script>
    $(document).ready(function(){
      $('#ten_n').mouseout(function(){
        var ten_n = $(this).val();
        var ma_n = $('#ma_n').val();
        // alert(ten_n);
        $.ajax({
          url:"{{ url("/check_ten_n_edit") }}",
          type:"GET",
          data:{ten_n:ten_n, ma_n:ma_n},
          success:function(data){
            if(data == 1){  
              $('#baoloi_ten').html('Ngạch đã tồn tại');
              $('#ten_n').val('');
            }else{
              $('#baoloi').html(''); 
            }
          }
        });
      });
    });
    $(document).ready(function(){
      $('#maso_n').mouseout(function(){
        var maso_n = $(this).val();
        var ma_n = $('#ma_n').val();
        // alert(maso_n);
        $.ajax({
          url:"{{ url("/check_maso_n_edit") }}",
          type:"GET",
          data:{maso_n:maso_n, ma_n:ma_n},
          success:function(data){
            if(data == 1){  
              $('#baoloi_maso').html('Mã số ngạch đã tồn tại');
              $('#maso_n').val('');
            }else{
              $('#baoloi').html(''); 
            }
          }
        });
      });
    });
  </script>
@endsection