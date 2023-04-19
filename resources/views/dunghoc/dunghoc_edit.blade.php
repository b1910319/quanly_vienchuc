@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        @if (isset($vienchuc))
          <a href="{{ URL::to('/dunghoc/'.$edit->ma_l.'/'.$edit->ma_vc) }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @else
          <a href="{{ URL::to('/dunghoc_all') }}">
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
    <form action="{{ URL::to('/update_dunghoc/'.$edit->ma_dh) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <input type="hidden" name="ma_vc" value="{{ $edit->ma_vc }}">
              <input type="hidden" name="ma_l" value="{{ $edit->ma_l }}">
              <tr>
                <th style="width: 30%" scope="row">Ngày bắt đầu tạm dừng học: </th>
                <td class="was-validated">
                  <input id="batdau_dh" type='date' class='form-control input_table' autofocus required name="batdau_dh" value="{{ $edit->batdau_dh }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày kết thúc tạm dừng học: </th>
                <td class="was-validated">
                  <input id="ketthuc_dh" type='date' class='form-control input_table' autofocus required name="ketthuc_dh" value="{{ $edit->ketthuc_dh }}">
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
                <th style="width: 30%" scope="row">Lý do tạm dừng học: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="lydo_dh" value="{{ $edit->lydo_dh }}">
                </td>
              </tr>
              <tr>
                <th scope="row">File tạm dừng: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-6">
                      <input type='file' class='form-control input_table' name="file_dh">
                    </div>
                    <div class="col-6">
                      @if ($edit->file_dh != ' ')
                        <a href="{{ asset('public/uploads/dunghoc/'.$edit->file_dh) }}">
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
                  <select class="custom-select input_table" id="gender2" name="status_dh">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_dh == 1)
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
      $('#ketthuc_dh').change(function(){
        var ketthuc_dh = $(this).val();
        var batdau_dh = $('#batdau_dh').val();
        // alert(batdau_dh);
        // alert(ketthuc_dh);
        if(batdau_dh > ketthuc_dh){  
          $('#baoloi').html('Ngày kết thúc phải lớn hơn ngày bắt đầu');
          $('#ketthuc_dh').val('');
        }else{
          $('#baoloi').html(''); 
        }
      });
    });
  </script>
@endsection