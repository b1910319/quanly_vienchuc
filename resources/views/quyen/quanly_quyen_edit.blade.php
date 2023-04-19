@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success color_alert row" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('quanly_quyen') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_quyen/'.$edit->ma_q) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Quyền: </th>
                <td class="was-validated">
                  <input type='text' id="ten_q" class='form-control input_table' autofocus required name="ten_q" minlength="5" value="{{ $edit->ten_q }}">
                  <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_q">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_q == 1)
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
                  <textarea class="form-control" rows="4" required name="mota_q">
                    <?php
                      echo $edit->mota_q;
                    ?>
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
  {{-- ajax --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
  {{--  --}}
<script>
  $(document).ready(function(){
    $('#ten_q').mouseout(function(){
      var ten_q = $(this).val();
      var ten = '';
      // alert(ten_q);
      $.ajax({
        url:"{{ url("/check_ten_q") }}",
        type:"GET",
        data:{ten_q:ten_q},
        success:function(data){
          if(data == 1){  
            $('#baoloi').html('Quyền đã tồn tại');
            $('#ten_q').val('');
          }else{
            $('#baoloi').html(''); 
          }
        }
      });
    });
  });
</script>
@endsection