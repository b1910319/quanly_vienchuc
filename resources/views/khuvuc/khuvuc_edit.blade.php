@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('khuvuc/'.$edit->ma_cl) }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_khuvuc/'.$edit->ma_kv) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Tên châu lục: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" aria-label="Default select example" name="ma_cl">
                    @foreach ($list_chauluc as $chauluc )
                      <option  
                        @if ($chauluc->ma_cl == $edit->ma_cl)
                          selected
                        @endif
                        value="{{ $chauluc->ma_cl }}">
                        {{ $chauluc->ten_cl }}
                      </option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Tên khu vực: </th>
                <td class="was-validated">
                  <input type="hidden" id="ma_kv" value="{{ $edit->ma_kv }}">
                  <input id="ten_kv" type='text' class='form-control input_table' autofocus required name="ten_kv" value="{{ $edit->ten_kv }}">
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
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_kv" required>
                    <option value="" >Chọn trạng thái</option>
                    @if ($edit->status_kv == 1)
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
      $('#ten_kv').mouseout(function(){
        var ten_kv = $(this).val();
        var ma_kv = $('#ma_kv').val();
        // alert(ten_kv);
        $.ajax({
          url:"{{ url("/check_ten_kv_edit") }}",
          type:"GET",
          data:{ten_kv:ten_kv, ma_kv:ma_kv},
          success:function(data){
            if(data == 1){  
              $('#baoloi').html('Khu vực đã tồn tại');
              $('#ten_kv').val('');
            }else{
              $('#baoloi').html(''); 
            }
          }
        });
      });
    });
  </script>
@endsection