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
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Lớp học tham gia</button>
        </a>
        <a href="{{ URL::to('thongtin_quatrinhchucvu') }}" class="mt-2">
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Qúa trình chức vụ</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light color_alert" role="alert">
        ________THÔNG TIN QUÁ TRÌNH CHỨC VỤ CỦA VIÊN CHỨC CỦA VIÊN CHỨC________
      </div>
      <div class="dots-list">
        <ol>
          @foreach ($list_quatrinhchucvu as $qtcv )
            <li>
              <span class="date">{{ $qtcv->ten_nk }}</span>
              <b style="font-weight: bold; font-size: 22px">{{ $qtcv->ten_cv }}</b>
              <br>
              {{ $qtcv->ghichu_qtcv }}
            </li>
          @endforeach
        </ol>
      </div>
    </div>
  </div>
@endsection