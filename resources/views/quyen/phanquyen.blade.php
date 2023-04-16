@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="mt-3"></div>
    <div class="alert alert-light color_alert" role="alert" >
      ________PHÂN QUYỀN CHO VIÊN CHỨC________
    </div>
    <table class="table" id="mytable">
      <thead class="color_table">
        <tr>
          <th class="text-light" scope="col">STT</th>
          <th class="text-light" scope="col">Thông tin viên chức </th>
          <th class="text-light" scope="col">Khoa</th>
          <th class="text-light" scope="col">Quyền</th>
          <th class="text-light" scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list_vienchuc as $key => $vienchuc)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              <b>Họ tên:</b> {{ $vienchuc->hoten_vc }} ({{ $vienchuc->ma_vc }})
              <br>
              <b>Email:</b> {{ $vienchuc->user_vc }}
              <br>
              <b>Chức vụ:</b> {{ $vienchuc->ten_cv }}
            </td>
            <td>
              {{ $vienchuc->ten_k }} ({{ $vienchuc->ma_k }})
            </td>
            <td>
              <div class="row">
                <div class="col-6">
                  <b style="color: #379237">
                    @foreach ($list_phanquyen as $phanquyen)
                      @if ($phanquyen->ma_vc == $vienchuc->ma_vc)
                        <span class="badge rounded-pill text-bg-success" style="font-size: 12px">
                          {{ $phanquyen->ten_q }}
                        </span>
                      @endif
                    @endforeach
                  </b>
                </div>
                <div class="col-6">
                  <a href="{{ URL::to('lammoi_quyen/'.$vienchuc->ma_vc) }}">
                    <button type="button" class="btn btn-light fw-bold">
                      <i class="fa-solid fa-rotate"></i>
                      &ensp;
                      Làm mới
                    </button>
                  </a>
                  
                </div>
              </div>
              
            </td>
            <td class="was-validated" style="width: 25%">
              <form action="{{ URL::to('phanquyen_vc') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-7">
                    <input type="hidden" name="ma_vc" value="{{ $vienchuc->ma_vc }}">
                    <select class="custom-select input_table" id="gender2" name="ma_q">
                      <option value="0" >Phân quyền</option>
                      @foreach ($list_quyen as $quyen)
                        <option value="{{ $quyen->ma_q }}" >{{ $quyen->ten_q }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-5">
                    <button type="submit"  class="btn btn-primary button_xanhla">
                      <i class="fas fa-plus-square text-light"></i>
                      &ensp;
                      Thêm
                    </button>
                  </div>
                </div>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
