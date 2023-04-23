@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('/kyluat_add/'.$ma_vc) }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_kyluat/'.$edit->ma_kl.'/'.$edit->ma_vc) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Loại kỷ luật: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_lkl" required>
                    <option value="" >Chọn loại kỷ luật</option>
                    @foreach ($list_loaikyluat as $loaikyluat )
                      <option
                      @if ($edit->ma_lkl == $loaikyluat->ma_lkl)
                        selected
                      @endif
                        value="{{ $loaikyluat->ma_lkl }}" >{{ $loaikyluat->ten_lkl }}</option>
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
                      <input type='date' class='form-control input_table' autofocus required name="ngay_kl" value="{{ $edit->ngay_kl }}" max="<?php echo $now ?>">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">File quyết định: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-6">
                      <input type='file' class='form-control input_table' name="filequyetdinh_kl" 
                      @if (!$edit->filequyetdinh_kl)
                        required
                      @endif
                      
                      >
                    </div>
                    <div class="col-6">
                      @if ($edit->filequyetdinh_kl)
                        <a href="{{ asset('public/uploads/kyluat/'.$edit->filequyetdinh_kl) }}">
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
                <th scope="row">Số quyết định: </th>
                <td class="was-validated">
                  <input type="hidden" id="ma_kl" value="{{ $edit->ma_kl }}">
                  <input type='text' id="soquyetdinh_kl"  class='form-control input_table' autofocus required name="soquyetdinh_kl" value="{{ $edit->soquyetdinh_kl }}">
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
                <th scope="row">Lý do kỷ luật: </th>
                <td class="was-validated">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="lydo_kl">
                    {{ $edit->lydo_kl }}
                  </textarea>
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_kl" required>
                    <option value="" >Chọn trạng thái</option>
                    @if ($edit->status_kl == 1)
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
      $('#soquyetdinh_kl').mouseout(function(){
        var soquyetdinh_kl = $(this).val();
        var ma_kl = $('#ma_kl').val();
        // alert(ma_kl);
        $.ajax({
          url:"{{ url("/check_soquyetdinh_kl_edit") }}",
          type:"GET",
          data:{soquyetdinh_kl:soquyetdinh_kl, ma_kl:ma_kl},
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
@endsection