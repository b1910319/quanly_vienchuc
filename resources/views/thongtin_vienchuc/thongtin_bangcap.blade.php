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
          <button type="button" class="btn btn-success fw-bold" style="background-color: #81B214; border: #81B214;width: 100%">Bằng cấp</button>
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
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        ________THÔNG TIN BẰNG CẤP CỦA VIÊN CHỨC________
      </div>
      <div class="row ">
        <div class="mt-3"></div>
        <table class="table" id="mytable">
          <thead class="table-dark">
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Thông tin bằng cấp</th>
              <th scope="col">Hệ đào tạo</th>
              <th scope="col">Loại bằng cấp</th>
            </tr>
          </thead>
          <tbody  >
            @foreach ($list as $key => $bangcap)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td>
                  <div class="row ">
                    <div class="col-md-12">
                      <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                        style="height: 120px; overflow: auto;">
                        <p>
                          <b> Trình độ chuyên môn:</b> {{ $bangcap->trinhdochuyenmon_bc }} <br>
                          <b> Trường:</b> {{ $bangcap->truonghoc_bc }} <br>
                          <b> Niên khoá: </b> {{ $bangcap->nienkhoa_bc }} <br>
                          <b> Mã số bằng: </b> {{ $bangcap->sobang_bc }} <br>
                          <b> Ngày cấp: </b> {{ $bangcap->ngaycap_bc }} <br>
                          <b> Nơi cấp: </b> {{ $bangcap->noicap_bc }} <br>
                          <b> Xếp hạng: </b> {{ $bangcap->xephang_bc }}
                        </p>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  @foreach ($list_hedaotao as $hdt )
                    @if ($hdt->ma_hdt == $bangcap->ma_hdt)
                      {{ $hdt->ten_hdt }}
                    @endif
                  @endforeach
                </td>
                <td>
                  @foreach ($list_loaibangcap as $lbc )
                    @if ($lbc->ma_lbc == $bangcap->ma_lbc)
                      {{ $lbc->ten_lbc }}
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