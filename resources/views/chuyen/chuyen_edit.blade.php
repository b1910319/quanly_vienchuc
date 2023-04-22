@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        @if (isset($vienchuc))
          <a href="{{ URL::to('/chuyen/'.$edit->ma_l.'/'.$edit->ma_vc) }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @else
          <a href="{{ URL::to('/chuyen_all') }}">
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
    <form action="{{ URL::to('/update_chuyen_quyetdinh/'.$edit->ma_c) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <input type="hidden" name="ma_vc" value="{{ $edit->ma_vc }}">
              <input type="hidden" name="ma_l" value="{{ $edit->ma_l }}">
              <tr>
                <th style="width: 30%" scope="row">Số quyết định: </th>
                <td class="was-validated">
                  <input type="hidden" id="ma_c" value="{{ $edit->ma_c }}">
                  <input id="soquyetdinh_c" type='text' class='form-control input_table' autofocus required name="soquyetdinh_c" value="{{ $edit->soquyetdinh_c }}">
                  <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày ký quyết định: </th>
                <td class="was-validated">
                  <input id="ngaykyquyetdinh_c" type='date' class='form-control input_table' autofocus required name="ngaykyquyetdinh_c" min="{{ $lop->ngaybatdau_l }}" max="{{ $lop->ngayketthuc_l }}" value="{{ $edit->ngaykyquyetdinh_c }}">
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
                      <input type='file' class='form-control input_table' name="filequyetdinh_c"
                      @if (!$edit->filequyetdinh_c)
                        required
                      @endif
                      >
                    </div>
                    <div class="col-6">
                      @if ($edit->filequyetdinh_c)
                        <a href="{{ asset('public/uploads/dunghoc/'.$edit->filequyetdinh_c) }}">
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
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_c" required>
                    <option value="" >Chọn trạng thái</option>
                    <option value="0" selected >Hiển thị</option>
                    <option value="1" >Ẩn</option>
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
      $('#soquyetdinh_c').mouseout(function(){
        var soquyetdinh_c = $(this).val();
        var ma_c = $('#ma_c').val();

        // alert(ma_c);
        $.ajax({
          url:"{{ url("/check_soquyetdinh_c_edit") }}",
          type:"GET",
          data:{soquyetdinh_c:soquyetdinh_c, ma_c:ma_c},
          success:function(data){
            if(data == 1){  
              $('#baoloi').html('Số quyết định đã tồn tại');
              $('#soquyetdinh_c').val('');
            }else{
              $('#baoloi').html(''); 
            }
          }
        });
      });
    });
  </script>
@endsection