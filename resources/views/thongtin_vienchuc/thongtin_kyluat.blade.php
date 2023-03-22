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
          <button type="button" class="btn btn-success fw-bold" style="background-color: #81B214; border: #81B214;width: 100%">Kỷ luật</button>
        </a>
        <a href="{{ URL::to('thongtin_lophoc') }}" class="mt-2">
          <button type="button" class="btn btn-light fw-bold" style="width: 100%">Lớp học tham gia</button>
        </a>
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THÔNG TIN KỶ LUẬT CỦA VIÊN CHỨC________
      </div>
      <div class="row ">
        <div class="mt-3"></div>
        <table class="table" id="mytable">
          <thead class="table-dark">
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Thông tin kỷ luật</th>
              <th scope="col">Loại kỷ luật</th>
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
                    <b> Mã số kỷ luật: </b> {{ $kyluat->ma_kl }}
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