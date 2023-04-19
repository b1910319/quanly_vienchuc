@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('chauluc') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_chauluc/'.$edit->ma_cl) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Tên châu lục: </th>
                <td class="was-validated">
                  <input type="hidden" id="ma_cl" value="{{ $edit->ma_cl }}">
                  <input id="ten_cl" type='text' class='form-control input_table' autofocus required name="ten_cl" value="{{ $edit->ten_cl }}">
                  <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_cl" required>
                    <option value="" >Chọn trạng thái</option>
                    @if ($edit->status_cl == 1)
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
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row" style="width: 20%">Mô tả: </th>
                <td class="was-validated">
                  <textarea class="form-control" rows="4" required name="mota_cl">
                    <?php echo $edit->mota_cl ?>
                  </textarea>
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
      $('#ten_cl').mouseout(function(){
        var ten_cl = $(this).val();
        var ma_cl = $('#ma_cl').val();
        // alert(ten_cl);
        $.ajax({
          url:"{{ url("/check_ten_cl_edit") }}",
          type:"GET",
          data:{ten_cl:ten_cl, ma_cl:ma_cl},
          success:function(data){
            if(data == 1){  
              $('#baoloi').html('Châu lục đã tồn tại');
              $('#ten_cl').val('');
            }else{
              $('#baoloi').html(''); 
            }
          }
        });
      });
    });
  </script>
@endsection