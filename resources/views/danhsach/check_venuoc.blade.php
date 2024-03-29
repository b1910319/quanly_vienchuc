@extends('layout')
@section('content')
<?php use Illuminate\Support\Carbon; ?>
<div class="row">
  <div class="card-box">
    <div class="row ">
      <div class="alert alert-success color_alert" role="alert">
        <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
          ________DANH SÁCH VIÊN CHỨC VỀ NƯỚC________
        </h4>
      </div>
      @foreach ($list_lop_quahan as $key => $lop_quahan )
        <button type="button" class="btn btn-light mt-3 bg-icon-success" data-toggle="collapse" data-target="#demo{{ $key+1 }}" style="width: 100%">
          <div class="row">
            <div class="col-11" style="font-weight: bold;">
              {{ $lop_quahan->ten_l }}
            </div>
            <div class="col-1">
              <i class="fa-solid fa-angle-down"></i>
            </div>
          </div>
        </button>
        <div id="demo{{ $key+1 }}" class="collapse mt-2">
          <table class="table" id="mytable{{ $key+1 }}">
            <thead class="color_table">
              <tr>
                <th class="text-light" scope="col">Thông tin viên chức</th>
                <th class="text-light" scope="col">Ngày về nước</th>
                <th class="text-light" scope="col">Trạng thái</th>
                <th></th>
              </tr>
            </thead>
            <tbody  >
              @foreach ($list_vienchuc_quahan as $key => $vienchuc)
                @if ($vienchuc->ma_l == $lop_quahan->ma_l)
                  <tr >
                    <td>
                      <b>- Họ tên viên chức: </b>{{ $vienchuc->hoten_vc }} <br>
                      <b>- Email: </b>{{ $vienchuc->user_vc }} <br>
                      <b>- Số điện thoại: </b>{{ $vienchuc->sdt_vc }} <br>
                      <b>- Khoa: </b> {{ $vienchuc->ten_k }}
                    </td>
                    <td>
                      <?php 
                        Carbon::now('Asia/Ho_Chi_Minh');
                        $ngayvenuoc_kq = Carbon::parse(Carbon::create($vienchuc->ngayvenuoc_kq))->format('d-m-Y');
                        echo $ngayvenuoc_kq;
                      ?>
                    </td>
                    <td>
                      @if ($vienchuc->status_ds != '4')
                        <span class="badge rounded-pill text-bg-danger">
                          Chưa về nước
                        </span>
                      @else
                        <span class="badge rounded-pill text-bg-success">
                          Đã về nước
                        </span>
                      @endif
                    </td>
                    <td style="width: 15%">
                      @if ($vienchuc->status_ds != '4')
                        <a href="{{ URL::to('davenuoc/'.$vienchuc->ma_vc.'/'.$vienchuc->ma_l) }}">
                          <button type="button" class="btn btn-primary button_xanhla">
                            <i class="fa-solid fa-circle-check text-light"></i>
                            &ensp;
                            Đã về nước
                          </button>
                        </a>
                      @endif
                      
                    </td>
                  </tr>
                @endif
                
              @endforeach
            </tbody>
          </table>
        </div>
      @endforeach
      
    </div>
  </div>
</div>

@endsection
