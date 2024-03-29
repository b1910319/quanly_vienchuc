@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert" >
      <div class="col-1">
        <a href="{{ URL::to('nhiemky') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form onsubmit="return check_submit() " action="{{ URL::to('/update_nhiemky/'.$edit->ma_nk) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row" style="width: 10%">Từ: </th>
                <td class="was-validated" style="width: 40%">
                  <input type='number' class='form-control input_table' id="batdau_nk" autofocus required name="batdau_nk" min="2000" max="<?php $date = getdate(); echo $date['year']+10 ?>" value="{{ $edit->batdau_nk }}">
                </td>
                <th scope="row" style="width: 10%">Đến: </th>
                <td class="was-validated" style="width: 40%">
                  <input type='number' class='form-control input_table' id="ketthuc_nk" autofocus required name="ketthuc_nk" min="2000" max="<?php $date = getdate(); echo $date['year']+10 ?>" value="{{ $edit->ketthuc_nk }}">
                  <p id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></p>
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
                  <select class="custom-select input_table" id="gender2" name="status_nk">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_nk == 1)
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
  {{-- ajax --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  {{--  --}}
  <script language="javascript">
    function check_submit()
    {
      let batdau_nk = document.getElementById("batdau_nk");
      var ketthuc_nk = document.getElementById("ketthuc_nk");
      var p = document.getElementById("baoloi");
      var number_input = '';
      if(batdau_nk.value > ketthuc_nk.value){
        $('#baoloi').html('Năm kết thúc nhiệm kỳ phải lớn hơn năm bắt đầu nhiệm kỳ'); 
        ketthuc_nk.value = number_input.value;
        return false;
      }
      return true; 
    }
  </script>
@endsection