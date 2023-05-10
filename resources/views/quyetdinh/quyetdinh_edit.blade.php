@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        @if (isset($vienchuc))
          <a href="{{ URL::to('/quyetdinh/'.$edit->ma_l.'/'.$edit->ma_vc) }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @else
          <a href="{{ URL::to('quyetdinh_all') }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @endif
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_quyetdinh/'.$edit->ma_qd) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <input type="hidden" name="ma_vc" value="{{ $edit->ma_vc }}">
              <input type="hidden" name="ma_l" value="{{ $edit->ma_l }}">
              <tr>
                <th scope="row">Ngày ký quyết định: </th>
                <td class="was-validated">
                  <?php 
                    use Illuminate\Support\Carbon;
                    Carbon::now('Asia/Ho_Chi_Minh'); 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                      <input type='date' class='form-control input_table' autofocus required name="ngayky_qd" value="{{ $edit->ngayky_qd }}" max="<?php echo $now ?>">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Số quyết định: </th>
                <td class="was-validated">
                  <input type="hidden" id="ma_qd" value="{{ $edit->ma_qd }}">
                  <input id="so_qd" type='text' class='form-control input_table' autofocus required name="so_qd" value="{{ $edit->so_qd }}">
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
                <th scope="row">File quyết định: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-6">
                      <input type='file' class='form-control input_table' name="file_qd">
                    </div>
                    <div class="col-6">
                      @if ($edit->file_qd)
                        <a href="{{ asset('public/uploads/quyetdinh/'.$edit->file_qd) }}">
                          <button type="button" class="btn btn-warning button_xanhla">
                            <i class="fa-solid fa-file text-light"></i>
                            &ensp;
                            File
                          </button>
                        </a>
                      @else
                        Không có file
                      @endif
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_qd" required>
                    <option value="" >Chọn trạng thái</option>
                    @if ($edit->status_qd == 1)
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
  <script>
    $(document).ready(function(){
      $('#so_qd').mouseout(function(){
        var so_qd = $(this).val();
        var ma_qd = $('#ma_qd').val();var ma_qd = $('#ma_qd').val();

        // alert(ma_qd);
        $.ajax({
          url:"{{ url("/check_so_qd_edit") }}",
          type:"GET",
          data:{so_qd:so_qd, ma_qd:ma_qd},
          success:function(data){
            if(data == 1){  
              $('#baoloi').html('Số quyết định đã tồn tại');
              $('#so_qd').val('');
            }else{
              $('#baoloi').html(''); 
            }
          }
        });
      });
    });
  </script>
@endsection