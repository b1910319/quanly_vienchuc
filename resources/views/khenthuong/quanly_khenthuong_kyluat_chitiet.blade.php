@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        @if ($phanquyen_admin || $phanquyen_qlktkl)
          <a href="{{ URL::to('quanly_khenthuong_kyluat') }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @else
          @if ($phanquyen_qlk)
            <a href="{{ URL::to('qlk_quanly_khenthuong_kyluat') }}">
              <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
                <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
              </button>
            </a>
          @endif
        @endif
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
        ________KHEN THƯỞNG, KỶ LUẬT CỦA VIÊN CHỨC " <span style="color: #FFFF00" >{{ $vienchuc->hoten_vc }}</span> "________
      </h4>
    </div>
    <div class="mt-3"></div>
    <div class="row">
      <div class="col-6">
        @if ($khenthuong)
          <p style="font-weight: bold; color: #E83A14; font-size: 22px; text-align: center;">KHEN THƯỞNG</p>
          <div class="dots-list">
            <ol>
              @foreach ($list_khenthuong as $khenthuong )
                <li>
                  <span class="date">{{ $khenthuong->ngay_kt }}</span>
                  <b style="font-weight: bold; font-size: 22px">{{ $khenthuong->ten_lkt }}</b>
                  <br>
                  <b>Hình thức khen thưởng:</b> {{ $khenthuong->ten_htkt }}
                  <br>
                  <b>Nội dung khen thưởng:</b> {{ $khenthuong->noidung_kt }} <br>
                  <b>Số quyết định khen thưởng: </b> {{ $khenthuong->soquyetdinh_kt }} <br>
                  @if ($khenthuong->filequyetdinh_kt)
                    <a href="{{ asset('public/uploads/khenthuong/'.$khenthuong->filequyetdinh_kt) }}" style="color: #000D6B; font-weight: bold">
                      <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                      File quyết định
                    </a>
                  @else
                    <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                  @endif
                </li>
              @endforeach
            </ol>
          </div>
        @endif
      </div>
      <div class="col-6">
        @if ($kyluat)
          <p style="font-weight: bold; color: #E83A14; font-size: 22px; text-align: center;">KỶ LUẬT</p>
          <div class="dots-list">
            <ol>
              @foreach ($list_kyluat as $kyluat )
                <li>
                  <span class="date">{{ $kyluat->ngay_kl }}</span>
                  <b style="font-weight: bold; font-size: 22px">{{ $kyluat->ten_lkl }}</b>
                  <br>
                  <b>Lý do kỷ luật:</b> {{ $kyluat->lydo_kl }} <br>
                  <b>Số quyết định kỷ luật: </b>{{ $kyluat->soquyetdinh_kl }} <br>
                  @if ($kyluat->filequyetdinh_kl)
                    <a href="{{ asset('public/uploads/kyluat/'.$kyluat->filequyetdinh_kl) }}" style="color: #000D6B; font-weight: bold">
                      <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                      File quyết định
                    </a>
                  @else
                    <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                  @endif
                </li>
              @endforeach
            </ol>
          </div>
        @endif
      </div>
    </div>
    
  </div>
</div>
@endsection
