@extends('layout')
@section('content')
<?php use Illuminate\Support\Carbon; ?>
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert" >
      <div class="col-1">
        @if ($vienchuc != '' && $lop != '')
          <a href="{{ URL::to('/danhsach/'.$lop->ma_l) }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @endif
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________THÔNG TIN VIÊN CHỨC XIN TẠM DỪNG KHOÁ HỌC________
      </h4>
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          @if ($vienchuc != '' && $lop != '')
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_dunghoc/'.$lop->ma_l.'/'.$vienchuc->ma_vc) }}">
              <button type="button" class="btn btn-danger button_do">
                <i class="fa-solid fa-trash text-light"></i>
                &ensp;
                Xoá tất cả
              </button>
            </a>
          @else
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_dunghoc_all') }}">
              <button type="button" class="btn btn-danger button_do">
                <i class="fa-solid fa-trash text-light"></i>
                &ensp;
                Xoá tất cả
              </button>
            </a>
          @endif
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
    <form action="{{ URL::to('/delete_dunghoc_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Thông tin viên chức</th>
            <th class="text-light" scope="col">Thông tin lớp học</th>
            <th class="text-light" scope="col">Thông tin tạm dừng học</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($list as $key => $dunghoc)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_dh[{{ $dunghoc->ma_dh }}]" value="{{ $dunghoc->ma_dh }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                <b>Họ tên viên chức: </b> {{ $dunghoc->hoten_vc }} <br>
                <b>Email viên chức: </b> {{ $dunghoc->user_vc }} <br>
                <b>Số điện thoại viên chức: </b> {{ $dunghoc->sdt_vc }} <br>
                <b>Khoa: </b> {{ $dunghoc->ten_k}}
              </td>
              <td>
                <b>Tên lớp học: </b> {{ $dunghoc->ten_l }} <br>
                <b>Ngày bắt đầu: </b> 
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaybatdau_l = Carbon::parse(Carbon::create($dunghoc->ngaybatdau_l))->format('d-m-Y');
                  echo $ngaybatdau_l;
                ?>
                <br>
                <b>Ngày kết thúc: </b> 
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngayketthuc_l = Carbon::parse(Carbon::create($dunghoc->ngayketthuc_l))->format('d-m-Y');
                  echo $ngayketthuc_l;
                ?>
                <br>
                <b>Tên cơ sở đào tạo: </b> {{ $dunghoc->tencosodaotao_l }} <br>
                <b>Quốc gia đào tạo: </b> {{ $dunghoc->quocgiaodaotao_l }} <br>
                <b>Email cơ sở đào tạo: </b> {{ $dunghoc->emailcoso_l }} <br>
                <b>Số điện thoại cơ sở đào tạo: </b> {{ $dunghoc->sdtcoso_l }} <br>
              </td>
              <td style="width: 19%">
                <b>Bắt đầu tạm dừng: </b> 
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $batdau_dh = Carbon::parse(Carbon::create($dunghoc->batdau_dh))->format('d-m-Y');
                  echo $batdau_dh;
                ?>
                <br>
                <b>Kết thúc tạm dừng: </b> 
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ketthuc_dh = Carbon::parse(Carbon::create($dunghoc->ketthuc_dh))->format('d-m-Y');
                  echo $ketthuc_dh;
                ?>
                <br>
                <b>Lý do tạm dừng: </b> {{ $dunghoc->lydo_dh }} <br>
                <b>Số quyết định: </b>{{ $dunghoc->soquyetdinh_dh }} <br>
                <b>Ngày ký quyết định: </b>
                <?php 
                  Carbon::now('Asia/Ho_Chi_Minh');
                  $ngaykyquyetdinh_dh = Carbon::parse(Carbon::create($dunghoc->ngaykyquyetdinh_dh))->format('d-m-Y');
                  echo $ngaykyquyetdinh_dh;
                ?>
                <br>
                @if ($dunghoc->file_dh)
                  <a href="{{ asset('public/uploads/dunghoc/'.$dunghoc->file_dh) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File xin tạm dừng
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
                <br>
                @if ($dunghoc->filequyetdinh_dh)
                  <a href="{{ asset('public/uploads/dunghoc/'.$dunghoc->filequyetdinh_dh) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File quyết định
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file quyết định</span>
                @endif
              </td>
              <td>
                <?php
                  if($dunghoc->status_dh == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fa-solid fa-circle-check "></i>&ensp;  Đã duyệt
                      </span>
                    <?php
                  }else if($dunghoc->status_dh == 1) {
                    ?>
                      <span class="badge badge-light-danger"><i class="fa-solid fa-circle-xmark "></i>&ensp; Chưa duyệt</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 12%;">
                <div class="row">
                  <div class="col-12 mt-1">
                    <a href="{{ URL::to('/edit_dunghoc/'.$dunghoc->ma_dh)}}">
                      <button type="button" style="width: 100%" class=" btn btn-warning button_cam ">
                        <i class="fa-solid fa-pen-to-square text-light"></i>
                        &ensp; Cập nhật
                      </button>
                    </a>
                  </div>
                  <div class="col-12 mt-1">
                    <?php
                      if($dunghoc->status_dh == 0){
                        ?>
                          <a href="{{ URL::to('/select_dunghoc/'.$dunghoc->ma_dh) }}">
                            <button type="button" style="width: 100%" class="btn btn-secondary fw-bold">
                              <i class="fa-solid fa-circle-xmark text-light "></i>
                              &ensp; Chưa duyệt
                            </button>
                          </a>
                        <?php
                      }else if($dunghoc->status_dh == 1) {
                        ?>
                          <a href="{{ URL::to('/select_dunghoc/'.$dunghoc->ma_dh) }}">
                            <button type="button" style="width: 100%" class="btn btn-success fw-bold">
                              <i class="fa-solid fa-circle-check text-light "></i>
                              &ensp; Duyệt
                            </button>
                          </a>
                        <?php
                      }
                    ?>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <button  type="submit" class="btn btn-danger button_do xoa_check">
        <i class="fa-solid fa-trash text-light"></i>
        &ensp;
        Xoá
      </button>
    </form>
  </div>
</div>
{{-- ajax --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
{{--  --}}
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
<!--  -->
@endsection
