@extends('layout')
@section('content')
  <div class="row">
    <div class="col-2 card-box">
      <div class="row">
        <a href="{{ URL::to('thongtin_canhan') }}">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Thông tin viên chức</button>
        </a>
        <a href="{{ URL::to('thongtin_giadinh') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Gia đình</button>
        </a>
        <a href="{{ URL::to('thongtin_bangcap') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Bằng cấp</button>
        </a>
        <a href="{{ URL::to('thongtin_khenthuong') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Khen thưởng</button>
        </a>
        <a href="{{ URL::to('thongtin_kyluat') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Kỷ luật</button>
        </a>
        <a href="{{ URL::to('thongtin_lophoc') }}" class="mt-2">
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Lớp học tham gia</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light color_alert row" role="alert">
        <div class="col-1">
          <a href="{{ URL::to('vienchuc_dunghoc_add/'.$ma_l) }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        </div>
        <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
          ________CẬP NHẬT THÔNG TIN XIN TẠM DỪNG QUÁ TRÌNH HỌC________
        </h4>
      </div>
      <form action="{{ URL::to('/vienchuc_updated_dunghoc/'.$edit->ma_dh) }}" method="POST"
        autocomplete="off" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="status_dh" value="1">
        <input type="hidden" name="ma_l" value="{{ $ma_l }}">
        <div class="row">
          <div class="col-6">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Ngày bắt đầu tạm dừng học: </th>
                  <td class="was-validated">
                    <input id="batdau_dh" type='date' class='form-control input_table' autofocus required name="batdau_dh" value="{{ $edit->batdau_dh }}" 
                      @if (isset($dunghoc->ketthuc_dh))
                        min="{{ $dunghoc->ketthuc_dh }}"
                      @else
                        min="{{ $lop->ngaybatdau_l }}"
                      @endif
                      max="{{ $lop->ngayketthuc_l }}"
                    >
                  </td>
                </tr>
                <tr>
                  <th scope="row">Ngày kết thúc tạm dừng học: </th>
                  <td class="was-validated">
                    <input id="ketthuc_dh" type='date' class='form-control input_table' autofocus required name="ketthuc_dh" value="{{ $edit->ketthuc_dh }}"
                      @if (isset($dunghoc->ketthuc_dh))
                        min="{{ $dunghoc->ketthuc_dh }}"
                      @else
                        min="{{ $lop->ngaybatdau_l }}"
                      @endif
                      max="{{ $lop->ngayketthuc_l }}"
                    >
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
                  <th scope="row">Lý do tạm dừng học: </th>
                  <td class="was-validated">
                    <input type='text' class='form-control input_table' autofocus required name="lydo_dh" value="{{ $edit->lydo_dh }}">
                  </td>
                </tr>
                <tr>
                  <th scope="row">File tạm dừng học: </th>
                  <td class="was-validated">
                    <div class="row">
                      <div class="col-6">
                        <input type='file' class='form-control input_table' name="file_dh"
                        @if (!$edit->file_dh)
                          required
                        @endif
                        >
                      </div>
                      <div class="col-6">
                        @if ($edit->file_dh)
                          <a href="{{ asset('public/uploads/dunghoc/'.$edit->file_dh) }}">
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
  </div>
  <script>
    $(document).ready(function(){
      $('#ketthuc_dh').change(function(){
        var ketthuc_dh = $(this).val();
        var batdau_dh = $('#batdau_dh').val();
        // alert(batdau_dh);
        // alert(ketthuc_dh);
        if(batdau_dh >= ketthuc_dh){  
          $('#baoloi').html('Ngày kết thúc phải lớn hơn ngày bắt đầu');
          $('#ketthuc_dh').val('');
        }else{
          $('#baoloi').html(''); 
        }
      });
    });
  </script>
@endsection