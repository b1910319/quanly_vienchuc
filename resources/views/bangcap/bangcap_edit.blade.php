@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert" >
      <div class="col-1">
        <a href="{{ URL::to('/bangcap/'.$ma_vc) }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________CẬP NHẬT THÔNG TIN________
      </h4>
    </div>
    <form action="{{ URL::to('/update_bangcap/'.$edit->ma_bc.'/'.$ma_vc) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Hệ đào tạo: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_hdt" required>
                    <option value="" >Chọn hệ đào tạo</option>
                    @foreach ($list_hedaotao as $hedaotao)
                      <option
                        @if ($hedaotao->ma_hdt == $edit->ma_hdt)
                          selected
                        @endif
                        value="{{ $hedaotao->ma_hdt }}" >{{ $hedaotao->ten_hdt }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Loại bằng cấp: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_lbc" required>
                    <option value="" >Chọn loại bằng cấp</option>
                    @foreach ($list_loaibangcap as $loaibangcap)
                      <option
                        @if ($loaibangcap->ma_lbc == $edit->ma_lbc)
                          selected
                        @endif
                        value="{{ $loaibangcap->ma_lbc }}" >{{ $loaibangcap->ten_lbc }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Trình độ chuyên môn: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="trinhdochuyenmon_bc" value="{{ $edit->trinhdochuyenmon_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Trường học: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="truonghoc_bc" value="{{ $edit->truonghoc_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Niên khoá: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-5">
                      <input id="tunam_bc" type='number' class='form-control input_table' autofocus required name="tunam_bc" min="1500"  max="<?php $date = getdate(); echo $date['year'] ?>" value="{{ $edit->tunam_bc }}">
                    </div>
                    <div class="col-2">
                      <p class="mt-1 fw-bold text-center">Đến</p>
                    </div>
                    <div class="col-5">
                      <input id="dennam_bc" type='number' class='form-control input_table' autofocus required name="dennam_bc" min="1500"  max="<?php $date = getdate(); echo $date['year'] ?>" value="{{ $edit->dennam_bc }}">
                      <span id="baoloi_nienkhoa" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Số bằng: </th>
                <td class="was-validated">
                  <input id="sobang_bc" type='number' class='form-control input_table' autofocus required name="sobang_bc" min="1" value="{{ $edit->sobang_bc }}">
                  <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày cấp bằng: </th>
                <td class="was-validated">
                  <?php 
                    use Illuminate\Support\Carbon;
                    Carbon::now('Asia/Ho_Chi_Minh'); 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                    <input type='date' class='form-control input_table' autofocus required name="ngaycap_bc" value="{{ $edit->ngaycap_bc }}" max="<?php echo $now ?>">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Nơi cấp: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="noicap_bc" value="{{ $edit->noicap_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Xếp hạng: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="xephang_bc" value="{{ $edit->xephang_bc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">File bằng cấp: </th>
                <td class="was-validated">
                  <div class="row">
                    <div class="col-6">
                      <input type='file' class='form-control input_table' name="file_bc"
                      @if (!$edit->file_bc)
                        required
                      @endif
                      >
                    </div>
                    <div class="col-6">
                      @if ($edit->file_bc)
                        <a href="{{ asset('public/uploads/bangcap/'.$edit->file_bc) }}">
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
                  <select class="custom-select input_table" id="gender2" name="status_bc">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_bc == 1)
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
      $('#sobang_bc').mouseout(function(){
        var sobang_bc = $(this).val();
        
        // alert(sobang_bc);
        $.ajax({
          url:"{{ url("/check_sobang_bc_edit") }}",
          type:"GET",
          data:{sobang_bc:sobang_bc},
          success:function(data){
            if(data == 1){  
              $('#baoloi').html('Số bằng đã tồn tại');
              $('#sobang_bc').val('');
            }else{
              $('#baoloi').html(''); 
            }
          }
        });
      });
    });
  </script>
  <script language="javascript">
    function check_submit()
    {
      let tunam_bc = document.getElementById("tunam_bc");
      var dennam_bc = document.getElementById("dennam_bc");
      var number_input = '';
      if(tunam_bc.value >= dennam_bc.value){
        $('#baoloi_nienkhoa').html('Năm kết thúc niên khoá phải lớn hơn năm bắt đầu niên khoá'); 
        dennam_bc.value = number_input.value;
        return false;
      }
      return true; 
    }
  </script>
@endsection