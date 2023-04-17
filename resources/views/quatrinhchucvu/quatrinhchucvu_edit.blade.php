@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('/quatrinhchucvu_add/'.$ma_vc) }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_quatrinhchucvu/'.$edit->ma_qtcv.'/'.$edit->ma_vc) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Chức vụ: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_cv">
                    <option value="0" >Chọn chức vụ</option>
                    @foreach ($list_chucvu as $chucvu )
                      <option
                      @if ($edit->ma_cv == $chucvu->ma_cv)
                        selected
                      @endif
                        value="{{ $chucvu->ma_cv }}" >{{ $chucvu->ten_cv }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Nhiệm kỳ: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_nk">
                    <option value="0" >Chọn nhiệm kỳ</option>
                    @foreach ($list_nhiemky as $nhiemky )
                      <option 
                        @if ($edit->ma_nk == $nhiemky->ma_nk)
                          selected
                        @endif
                        value="{{ $nhiemky->ma_nk }}" >{{ $nhiemky->batdau_nk }} - {{ $nhiemky->ketthuc_nk }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Số quyết định: </th>
                <td class="was-validated">
                  <input type='text' id="soquyetdinh_qtcv"  class='form-control input_table' autofocus required name="soquyetdinh_qtcv" value="{{ $edit->soquyetdinh_qtcv }}">
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
                <th scope="row">Ngày ký quyết định: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ngayky_qtcv" value="{{ $edit->ngayky_qtcv }}">
                </td>
              </tr>
              <tr>
                <th scope="row">File quyết định: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-6">
                      <input type='file' class='form-control input_table' name="file_qtcv">
                    </div>
                    <div class="col-6">
                      @if ($edit->file_qtcv != ' ')
                        <a href="{{ asset('public/uploads/quatrinhchucvu/'.$edit->file_qtcv) }}">
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
                  <select class="custom-select input_table" id="gender2" name="status_qtcv">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_qtcv == 1)
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
  <script>
    $(document).ready(function(){
      $('#soquyetdinh_qtcv').change(function(){
        var soquyetdinh_qtcv = $(this).val();
        var soquyetdinh = '';
        // alert(soquyetdinh_qtcv);
        $.ajax({
          url:"{{ url("/check_soquyetdinh_qtcv") }}",
          type:"GET",
          data:{soquyetdinh_qtcv:soquyetdinh_qtcv},
          success:function(data){
            if(data == 1){  
              $('#baoloi').html('Số quyết định đã tồn tại');
              $('#soquyetdinh_qtcv').val('');
            }else{
              $('#thongbao').html(''); 
            }
          }
        });
      });
    });
  </script>
@endsection