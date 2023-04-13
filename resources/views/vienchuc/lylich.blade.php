@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="row ">
      <div class="alert alert-success color_alert" role="alert">
        <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
          ________DANH SÁCH VIÊN CHỨC________
        </h4>
      </div>
    </div>
    <div class="mt-3"></div>
    <form action="{{ URL::to('/lylich_xuatfile') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable1">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Viên chức </th>
          </tr>
        </thead>
        <tbody  >
          @foreach ($list_vienchuc as $key => $vienchuc)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_vc[{{ $vienchuc->ma_vc }}]" value="{{ $vienchuc->ma_vc }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                <a href="{{ URL::to('lylich_chitiet/'.$vienchuc->ma_vc) }}" style="color: black">
                  <b>Tên: </b> {{ $vienchuc->hoten_vc }} ({{ $vienchuc->ma_vc }}) <br>
                  <b>Khoa: </b>
                  {{ $vienchuc->ten_k }} ({{ $vienchuc->ma_k }})
                  <br>
                  <b>Email: </b> {{ $vienchuc->user_vc }}
                  <br>
                  <b>Mã số: </b> VC{{ $vienchuc->ma_vc }}
                </a>
                
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <button type="submit" class="btn btn-warning button_xanhla">
        <i class="fa-solid fa-file text-light"></i>
        &ensp;
        Xuất file
      </button>
    </form>
  </div>
</div>
@endsection
