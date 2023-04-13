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
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Bằng cấp</button>
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
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Qúa trình chức vụ</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light color_alert" role="alert">
        ________THÔNG TIN BẰNG CẤP CỦA VIÊN CHỨC________
      </div>
      <div class="dots-list">
        <ol>
          <div class="dots-list">
            <ol>
              @foreach ($list as $key => $bangcap )
                <li>
                  <span class="date">{{ $bangcap->ngaycap_bc }}</span>
                  <b style="font-weight: bold; font-size: 22px">{{ $bangcap->truonghoc_bc }}</b>
                  <br>
                  <div class="row">
                    <div class="col-6">
                      <b>Hệ đào tạo: </b> {{ $bangcap->ten_hdt }} <br>
                      <b>Loại bằng cấp: </b> {{ $bangcap->ten_lbc }} <br>
                      <b>Trình độ chuyên môn: </b> {{ $bangcap->trinhdochuyenmon_bc }} <br>
                    </div>
                    <div class="col-6">
                      <b>Niên khoá: </b> {{ $bangcap->nienkhoa_bc }} <br>
                      <b>Số bằng: </b> {{ $bangcap->sobang_bc }} <br>
                      <b>Nơi cấp: </b> {{ $bangcap->noicap_bc }} <br>
                      <b>Xếp hạng: </b> {{ $bangcap->xephang_bc }}
                    </div>
                  </div>
                </li>
              @endforeach
            </ol>
          </div>
        </ol>
      </div>
    </div>
  </div>
@endsection