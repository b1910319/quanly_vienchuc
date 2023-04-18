@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert" >
      <div class="col-1">
        <a href="{{ URL::to('thuongbinh') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_thuongbinh/'.$edit->ma_tb) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Thương binh: </th>
                <td class="was-validated">
                  <input id="ten_tb" type='text' class='form-control input_table' autofocus required name="ten_tb" value="{{ $edit->ten_tb }}">
                  <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_tb">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_tb == 1)
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
                  <textarea name="mota_tb" id="" cols="60" rows="10" required>
                    <?php
                      echo $edit->mota_tb;
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
  <script>
    $(document).ready(function(){
      $('#ten_tb').change(function(){
        var ten_tb = $(this).val();
        var ten = '';
        // alert(ten_tb);
        $.ajax({
          url:"{{ url("/check_ten_tb") }}",
          type:"GET",
          data:{ten_tb:ten_tb},
          success:function(data){
            if(data == 1){  
              $('#baoloi').html('Hạng thương binh đã tồn tại');
              $('#ten_tb').val('');
            }else{
              $('#baoloi').html(''); 
            }
          }
        });
      });
    });
  </script>
@endsection