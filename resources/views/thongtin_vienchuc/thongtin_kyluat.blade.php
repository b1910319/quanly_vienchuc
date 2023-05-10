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
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Kỷ luật</button>
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
        ________THÔNG TIN KỶ LUẬT CỦA VIÊN CHỨC________
      </div>
      <div class="row ">
        <div class="mt-3"></div>
        <table class="table" id="mytable">
          <thead class="color_table" >
            <tr>
              <th class="text-light" scope="col">STT</th>
              <th class="text-light" scope="col">Thông tin kỷ luật</th>
              <th class="text-light" scope="col">Loại kỷ luật</th>
            </tr>
          </thead>
          <tbody  >
            @foreach ($list as $key => $kyluat)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td>
                  <p>
                    <b> Ngày kỷ luật:</b> {{ $kyluat->ngay_kl }} <br>
                    <b> Lý do kỷ luật: </b> {{ $kyluat->lydo_kl }} <br>
                    <b> Số quyết định kỹ luật: </b> {{ $kyluat->soquyetdinh_kl }} <br>
                    @if ($kyluat->filequyetdinh_kl)
                      <a href="{{ asset('public/uploads/kyluat/'.$kyluat->filequyetdinh_kl) }}" style="color: #000D6B; font-weight: bold">
                        <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                        File 
                      </a>
                    @else
                      <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                    @endif
                  </p>
                </td>
                <td>
                  @foreach ($list_loaikyluat as $lkl )
                    @if ($lkl->ma_lkl == $kyluat->ma_lkl)
                      {{ $lkl->ten_lkl }}
                    @endif
                  @endforeach
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection