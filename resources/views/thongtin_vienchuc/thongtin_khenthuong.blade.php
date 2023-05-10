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
          <button type="button" class="btn btn-success button_loc" style="width: 100%">Khen thưởng</button>
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
        ________THÔNG TIN KHEN THƯỞNG CỦA VIÊN CHỨC________
      </div>
      <div class="row ">
        <div class="mt-3"></div>
        <table class="table" id="mytable">
          <thead class="color_table" >
            <tr>
              <th class="text-light" scope="col">STT</th>
              <th class="text-light" scope="col">Thông tin khen thưởng</th>
              <th class="text-light" scope="col">Hình thức khen thưởng</th>
              <th class="text-light" scope="col">Loại khen thưởng</th>
            </tr>
          </thead>
          <tbody  >
            @foreach ($list as $key => $khenthuong)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td>
                  <p>
                    <b> Ngày khen thưởng:</b> {{ $khenthuong->ngay_kt }} <br>
                    <b> Nội dung khen thưởng: </b> {{ $khenthuong->noidung_kt }} <br>
                    <b> Số quyết định khen thưởng: </b> {{ $khenthuong->soquyetdinh_kt }} <br>
                    @if ($khenthuong->filequyetdinh_kt)
                      <a href="{{ asset('public/uploads/khenthuong/'.$khenthuong->filequyetdinh_kt) }}" style="color: #000D6B; font-weight: bold">
                        <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                        File kết quả
                      </a>
                    @else
                      <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                    @endif
                  </p>
                </td>
                <td>
                  @foreach ($list_hinhthuckhenthuong as $htkt )
                    @if ($htkt->ma_htkt == $khenthuong->ma_htkt)
                      {{ $htkt->ten_htkt }}
                    @endif
                  @endforeach
                </td>
                <td>
                  @foreach ($list_loaikhenthuong as $lkt )
                    @if ($lkt->ma_lkt == $khenthuong->ma_lkt)
                      {{ $lkt->ten_lkt }}
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