@extends('layout')
@section('content')
<div class="row">
  <div class="col-6">
    <div class="card-box">
      <p class="fw-bold text-center text-black" style="font-size: 21px">THÔNG TIN VIÊN CHỨC</p>
      <table class="table">
        <tbody>
          <tr>
            <th scope="row" style="width: 20%; background-color: #14C38E; font-weight: bold; font-size: 16px; color: white">
              Họ tên
            </th>
            <td class="fw-bold">{{ $vienchuc->hoten_vc }}</td>
          </tr>
          <tr>
            <th scope="row" style="width: 20%; background-color: #14C38E; font-weight: bold; font-size: 16px; color: white">Mã số</th>
            <td class="fw-bold">VC{{ $vienchuc->ma_vc }}</td>
          </tr>
          <tr>
            <th scope="row" style="width: 20%; background-color: #14C38E; font-weight: bold; font-size: 16px; color: white">Email</th>
            <td class="fw-bold">{{ $vienchuc->user_vc }}</td>
          </tr>
          <tr>
            <th scope="row" style="width: 20%; background-color: #14C38E; font-weight: bold; font-size: 16px; color: white">Số điện thoại</th>
            <td class="fw-bold">{{ $vienchuc->sdt_vc }}</td>
          </tr>
          @if (!$phanquyen_admin)
            <tr>
              <th scope="row" style="width: 20%; background-color: #14C38E; font-weight: bold; font-size: 16px; color: white">Ngày sinh</th>
              <td class="fw-bold">{{ $vienchuc->ngaysinh_vc }}</td>
            </tr>
            <tr>
              <th scope="row" style="width: 20%; background-color: #14C38E; font-weight: bold; font-size: 16px; color: white">Ngạch viên chức</th>
              <td class="fw-bold">
                @foreach ($list_ngach as $ngach )
                  @if ($ngach->ma_n == $vienchuc->ma_n)
                    {{ $ngach->ten_n }}
                  @endif
                @endforeach
              </td>
            </tr>
            <tr>
              <th scope="row" style="width: 20%; background-color: #14C38E; font-weight: bold; font-size: 16px; color: white">Dân tộc</th>
              <td class="fw-bold">
                @foreach ($list_dantoc as $dantoc )
                  @if ($dantoc->ma_dt == $vienchuc->ma_dt)
                    {{ $dantoc->ten_dt }}
                  @endif
                @endforeach
              </td>
            </tr>
          @endif
          <tr>
            <th scope="row" style="width: 20%; background-color: #14C38E; font-weight: bold; font-size: 16px; color: white">Khoa</th>
            @foreach ($list_khoa as $khoa )
              @if ($khoa->ma_k == $vienchuc->ma_k)
                <td class="fw-bold">
                  {{ $khoa->ten_k }}
                </td>
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row" style="width: 20%; background-color: #14C38E; font-weight: bold; font-size: 16px; color: white">Chức vụ</th>
            @foreach ($list_chucvu as $chucvu )
              @if ($chucvu->ma_cv == $vienchuc->ma_cv)
                <td class="fw-bold">
                  {{ $chucvu->ten_cv }}
                </td>
              @endif
            @endforeach
          </tr>
        </tbody>
      </table>
      @if (!$phanquyen_admin)
        <div class="mt-2">&ensp;</div>
      @endif
      <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
          <a href="{{ URL::to('thongtin_canhan') }}">
            <button type="submit"  class="btn btn-primary font-weight-bold" style="background-color: #FF5B00; border: none; width: 100%;">
              <i class="fas fa-plus-square"></i>
              &ensp;
              Xem thêm
            </button>
          </a>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="card-box">
      <div class="row">
        @if ($phanquyen_admin)
          <div class="col-3 mt-1">
            <a href="{{ URL::to('phanquyen') }}">
              <p class="text-center">
                <i class="fa-solid fa-drum-steelpan" style="font-size: 60px;color: #FC7300"></i>
                <br>
                <span style="font-weight: bold; font-size: 20px; color: black">
                  Phân quyền
                </span>
              </p>
            </a>
          </div>
          <div class="col-3 mt-1">
            <a href="{{ URL::to('file') }}">
              <p class="text-center">
                <i class="fa-solid fa-file" style="font-size: 60px;color: #0b44a8"></i>
                <br>
                <span style="font-weight: bold; font-size: 20px; color: black">
                  Quản lý File
                </span>
              </p>
            </a>
          </div>
        @endif
        @if ($phanquyen_admin || $phanquyen_qltt)
          <div class="col-3 mt-1">
            <a href="{{ URL::to('danhsach_thongtin_vienchuc') }}">
              <p class="text-center">
                <i class="fa-solid fa-circle-info" style="font-size: 60px;color: #00541A"></i>
                <br>
                <span style="font-weight: bold; font-size: 20px; color: black">
                  Quản lý thông tin
                </span>
              </p>
            </a>
          </div>
        @endif
        @if ($phanquyen_admin || $phanquyen_qlktkl)
          <div class="col-3 mt-1">
            <a href="{{ URL::to('khenthuong') }}">
              <p class="text-center">
                <i class="fa-solid fa-award" style="font-size: 60px;color: #FFD31D"></i>
                <br>
                <span style="font-weight: bold; font-size: 20px; color: black">
                  Quản lý khen thưởng
                </span>
              </p>
            </a>
          </div>
          <div class="col-3 mt-1">
            <a href="{{ URL::to('kyluat') }}">
              <p class="text-center">
                <i class="fa-solid fa-circle-xmark" style="font-size: 60px;color: #AC0D0D"></i>
                <br>
                <span style="font-weight: bold; font-size: 20px; color: black">
                  Quản lý kỷ luật
                </span>
              </p>
            </a>
          </div>
        @endif
        @if ($phanquyen_admin || $phanquyen_qlcttc)
          <div class="col-3 mt-1">
            <a href="{{ URL::to('lop') }}">
              <p class="text-center">
                <i class="fa-solid fa-sitemap" style="font-size: 60px;color: #2A1A5E"></i>
                <br>
                <span style="font-weight: bold; font-size: 20px; color: black">
                  Quản lý công tác tổ chức
                </span>
              </p>
            </a>
          </div>
        @endif
        <div class="col-3 mt-1">
          <a href="{{ URL::to('thongtin_canhan') }}">
            <p class="text-center">
              <i class="fa-solid fa-circle-user" style="font-size: 60px;color: #155263"></i>
              <br>
              <span style="font-weight: bold; font-size: 20px; color: black">
                Thông tin cá nhân
              </span>
            </p>
          </a>
        </div>
        <div class="col-3 mt-1">
          <a href="{{ URL::to('thongtin_bangcap') }}">
            <p class="text-center">
              <i class="fa-solid fa-pager" style="font-size: 60px;color: #ADA2FF"></i>
              <br>
              <span style="font-weight: bold; font-size: 20px; color: black">
                Bằng cấp
              </span>
            </p>
          </a>
        </div>
        <div class="col-3 mt-1">
          <a href="{{ URL::to('thongtin_khenthuong') }}">
            <p class="text-center">
              <i class="fa-solid fa-award" style="font-size: 60px;color: #FFD31D"></i>
              <br>
              <span style="font-weight: bold; font-size: 20px; color: black">
                Khen thưởng
              </span>
            </p>
          </a>
        </div>
        <div class="col-3 mt-1">
          <a href="{{ URL::to('thongtin_kyluat') }}">
            <p class="text-center">
              <i class="fa-solid fa-circle-xmark" style="font-size: 60px;color: #AC0D0D"></i>
              <br>
              <span style="font-weight: bold; font-size: 20px; color: black">
                Kỹ luật
              </span>
            </p>
          </a>
        </div>
        <div class="col-3 mt-1">
          <a href="{{ URL::to('thongtin_lophoc') }}">
            <p class="text-center">
              <i class="fa-solid fa-person-shelter" style="font-size: 60px;color: #38E54D"></i>
              <br>
              <span style="font-weight: bold; font-size: 20px; color: black">
                Lớp viên chức tham gia
              </span>
            </p>
          </a>
        </div>
        @if ($phanquyen_qlk)
          <div class="col-3 mt-1">
            <a href="{{ URL::to('thongtin_vienchuc_khoa') }}">
              <p class="text-center">
                <i class="fa-solid fa-building" style="font-size: 60px;color: #CDC733"></i>
                <br>
                <span style="font-weight: bold; font-size: 20px; color: black">
                  Quản lý viên chức của khoa
                </span>
              </p>
            </a>
          </div>
        @endif
        <div class="col-3 mt-1"></div>
      </div>
    </div>
    @if (!$phanquyen_admin)
      <div class="card-box">
        <div class="row">
          <p class="fw-bold text-center text-black" style="font-size: 18px">THÔNG TIN TRƯỞNG KHOA</p>
          <table class="table">
            <tbody>
              @foreach ($truongkhoa as $tk )
                <tr>
                  <th scope="row" style="width: 20%; background-color: #0b44a8; font-weight: bold; font-size: 16px; color: white">Mã số viên chức </th>
                  <td class="fw-bold">VC{{ $tk->ma_vc }}</td>
                </tr>
                <tr>
                  <th scope="row" style="width: 20%; background-color: #0b44a8; font-weight: bold; font-size: 16px; color: white">Họ tên </th>
                  <td class="fw-bold">{{ $tk->hoten_vc }}</td>
                </tr>
                <tr>
                  <th scope="row" style="width: 20%; background-color: #0b44a8; font-weight: bold; font-size: 16px; color: white">Email </th>
                  <td class="fw-bold">{{ $tk->user_vc }}</td>
                </tr>
                <tr>
                  <th scope="row" style="width: 20%; background-color: #0b44a8; font-weight: bold; font-size: 16px; color: white">Số điện thoại </th>
                  <td class="fw-bold">{{ $tk->sdt_vc }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        
      </div>
    @endif
  </div>
</div>
<div class="row"  >
  @if ($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlktkl || $phanquyen_qlcttc  )
    <div class="col-xl-3 col-md-6">
      <div class="card-box">
        <div class="float-left" dir="ltr">
          <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#1abc9c" data-bgcolor="#d1f2eb" value="100" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
        </div>
        <div class="text-right">
          @foreach ($count_vienchuc as $vienchuc )
            <h3 class="mb-1"> {{ $vienchuc->sum }} </h3>
          @endforeach
          <p class="text-muted mb-1">Viên chức</p>
        </div>
      </div>
    </div>
  @endif
  @if ($phanquyen_qlk)
    <div class="col-xl-3 col-md-6">
      <div class="card-box">
        <div class="float-left" dir="ltr">
          @foreach ($count_vienchuc as $vc )
            @foreach ($count_vienchuc_khoa as $vck )
              <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#3bafda" data-bgcolor="#d8eff8" value="<?php echo ceil(($vck->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
            @endforeach
          @endforeach
        </div>
        <div class="text-right">
          @foreach ($count_vienchuc_khoa as $vienchuc )
            <h3 class="mb-1"> {{ $vienchuc->sum }} </h3>
          @endforeach
          <p class="text-muted mb-1">Viên chức</p>
        </div>
      </div>
    </div>
  @endif

  @if ($phanquyen_admin || $phanquyen_qltt)
    <div class="col-xl-3 col-md-6">
      <div class="card-box">
        <div class="float-left" dir="ltr">
          @foreach ($count_vienchuc as $vc )
            @foreach ($count_vienchuc_nghihuu as $vcnh )
              <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#3bafda" data-bgcolor="#d8eff8" value="<?php echo ceil(($vcnh->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
            @endforeach
          @endforeach
        </div>
        <div class="text-right">
          @foreach ($count_vienchuc_nghihuu as $vienchuc )
            <h3 class="mb-1"> {{ $vienchuc->sum }} </h3>
          @endforeach
          <p class="text-muted mb-1">Nghĩ hưu</p>
        </div>
      </div>
    </div>
  @endif

  @if ($phanquyen_qlk)
    <div class="col-xl-3 col-md-6">
      <div class="card-box">
        <div class="float-left" dir="ltr">
          @foreach ($count_vienchuc as $vc )
            @foreach ($count_vienchuc_nghihuu_khoa as $vcnhk )
              <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#3bafda" data-bgcolor="#d8eff8" value="<?php echo ceil(($vcnhk->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
            @endforeach
          @endforeach
        </div>
        <div class="text-right">
          @foreach ($count_vienchuc_nghihuu_khoa as $vienchuc )
            <h3 class="mb-1"> {{ $vienchuc->sum }} </h3>
          @endforeach
          <p class="text-muted mb-1">Nghĩ hưu</p>
        </div>
      </div>
    </div>
  @endif
  @if ($phanquyen_admin || $phanquyen_qlktkl)
    <div class="col-xl-3 col-md-6">
      <div class="card-box">
        <div class="float-left" dir="ltr">
          @foreach ($count_vienchuc as $vc )
            @foreach ($count_vienchuc_kyluat as $vckl )
              <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#f672a7" data-bgcolor="#fde3ed" value="<?php echo ceil(($vckl->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
            @endforeach
          @endforeach
        </div>
        <div class="text-right">
          @foreach ($count_vienchuc_kyluat as $vienchuc )
            <h3 class="mb-1"> {{ $vienchuc->sum }} </h3>
          @endforeach
          <p class="text-muted mb-1">Kỷ luật</p>
        </div>
      </div>
    </div>
  @endif

  @if ($phanquyen_qlk)
    <div class="col-xl-3 col-md-6">
      <div class="card-box">
        <div class="float-left" dir="ltr">
          @foreach ($count_vienchuc as $vc )
            @foreach ($count_vienchuc_kyluat_khoa as $vcklk )
              <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#f672a7" data-bgcolor="#fde3ed" value="<?php echo ceil(($vcklk->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
            @endforeach
          @endforeach
        </div>
        <div class="text-right">
          @foreach ($count_vienchuc_kyluat_khoa as $vienchuc )
            <h3 class="mb-1"> {{ $vienchuc->sum }} </h3>
          @endforeach
          <p class="text-muted mb-1">Kỷ luật</p>
        </div>
      </div>
    </div>
  @endif

  @if ($phanquyen_admin || $phanquyen_qlktkl)
    <div class="col-xl-3 col-md-6">
      <div class="card-box">
        <div class="float-left" dir="ltr">
          @foreach ($count_vienchuc as $vc )
            @foreach ($count_vienchuc_khenthuong as $vckt )
            <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#6c757d" data-bgcolor="#e2e3e5" value="<?php echo ceil(($vckt->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
            @endforeach
          @endforeach
        </div>
        <div class="text-right">
          @foreach ($count_vienchuc_khenthuong as $vienchuc )
            <h3 class="mb-1"> {{ $vienchuc->sum }} </h3>
          @endforeach
          <p class="text-muted mb-1">Khen thưởng</p>
        </div>
      </div>
    </div>
  @endif

  @if ($phanquyen_qlk)
    <div class="col-xl-3 col-md-6">
      <div class="card-box">
        <div class="float-left" dir="ltr">
          @foreach ($count_vienchuc as $vc )
            @foreach ($count_vienchuc_khenthuong_khoa as $vcktk )
            <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#6c757d" data-bgcolor="#e2e3e5" value="<?php echo ceil(($vcktk->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
            @endforeach
          @endforeach
        </div>
        <div class="text-right">
          @foreach ($count_vienchuc_khenthuong_khoa as $vienchuc )
            <h3 class="mb-1"> {{ $vienchuc->sum }} </h3>
          @endforeach
          <p class="text-muted mb-1">Khen thưởng</p>
        </div>
      </div>
    </div>
  @endif

</div>
<!-- end row -->


<div class="row">
  <div class="col-xl-12">
    <div class="card-box">
      <h4 class="header-title mb-3 fw-bold">Danh sách các lớp học hiện có</h4>

      <div class="table-responsive">
        <table class="table table-borderless table-hover table-centered m-0" id="mytable1">

          <thead class="thead-light">
            <tr>
              <th>Tên lớp</th>
              <th>Ngày bắt đầu học</th>
              <th>Ngày kết thúc</th>
              <th>Cơ sở đào tạo</th>
              <th>Quốc gia</th>
              <th>Luợt xem</th>
              <th>Chi tiết</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_lop as $key => $lop )
              <tr>
                <td>
                  <h5 class="m-0 font-weight-normal">
                    {{ $lop->ten_l }}
                  </h5>
                </td>
                <td>
                  {{ $lop->ngaybatdau_l }}
                </td>

                <td>
                  {{ $lop->ngayketthuc_l }}
                </td>

                <td>
                  {{ $lop->tencosodaotao_l }}
                </td>

                <td>
                  <span class="badge badge-light-danger">
                    {{ $lop->quocgiaodaotao_l }}
                  </span>
                </td>
                <td>
                  <i class="fa-solid fa-eye" style="color: #0b44a8;"></i>
                  &ensp;
                  {{ $lop->luotxem_l }}
                </td>
                <td>
                  <button type="button" class="btn btn-primary luotxem_l{{ $key+1 }} btn_chitiet" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $lop->ma_l }}">
                    <input type="hidden" class="ma_l{{ $key+1 }}" value="{{ $lop->ma_l }}">
                    <i class="fa-solid fa-circle-info"></i>
                  </button>
                  <div class="modal fade" id="exampleModal{{ $lop->ma_l }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $lop->ten_l }}</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-borderless table-hover table-centered m-0">
                            <tbody>
                              <tr>
                                <td style="width: 20%;">
                                  <h5 class="m-0 font-weight-normal">Tên lớp</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->ten_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Ngày bắt đầu</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->ngaybatdau_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Ngày kết thúc</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->ngayketthuc_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Yêu cầu</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->yeucau_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Tên cơ sở đào tạo</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->tencosodaotao_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Quốc gia đào tạo</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->quocgiaodaotao_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Ngành học</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->nganhhoc_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Trình độ đào tạo</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->trinhdodaotao_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Nguồn kinh phí</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->nguonkinhphi_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Địa chỉ đào tạo</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->diachidaotao_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Nội dung học</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->noidunghoc_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Email cơ sở</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->emailcoso_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 font-weight-normal">Số điện thoại cơ sở</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->sdtcoso_l }}
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa-solid fa-square-xmark"></i>
                            &ensp; Đóng
                          </button>
                          @if ($phanquyen_admin || $phanquyen_qlcttc)
                          <a href="{{ URL::to('/edit_lop_danhmuclop/'.$lop->ma_l) }}">
                            <button type="submit" class="btn btn-warning fw-bold" style="background-color: #FC7300">
                              <i class="fa-solid fa-pen-to-square"></i>
                              &ensp; Cập nhật
                            </button>
                          </a>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div> <!-- end card-box-->
  </div>
</div>
<div class="row">
  <div class="col-xl-4">
    <div class="card-box">
      <div class="dropdown float-right">
        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
          <i class="mdi mdi-dots-horizontal"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item">Settings</a>
          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item">Download</a>
          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item">Upload</a>
          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item">Action</a>
        </div>
      </div>
      <h4 class="header-title">Earning Reports</h4>
      <p class="text-muted">1 Mar - 31 Mar Showing Data</p>
      <h2 class="mb-4"><i class="mdi mdi-currency-usd text-primary"></i>25,632.78</h2>

      <div class="row mb-4">
        <div class="col-6">
          <p class="text-muted mb-1">This Month</p>
          <h3 class="mt-0 font-20">$120,254 <small class="badge badge-light-success font-13">+15%</small></h3>
        </div>

        <div class="col-6">
          <p class="text-muted mb-1">Last Month</p>
          <h3 class="mt-0 font-20">$98,741 <small class="badge badge-light-danger font-13">-5%</small></h3>
        </div>
      </div>

      <h5 class="font-16"><i class="mdi mdi-chart-donut text-primary"></i> Weekly Earning
        Report</h5>

      <div class="mt-5">
        <span data-plugin="peity-bar" data-colors="#1abc9c,#ebeff2" data-width="100%" data-height="92">5,3,9,6,5,9,7,3,5,2,9,7,2,1,3,5,2,9,7,2,5,3,9,6,5,9,7</span>
      </div>

    </div> <!-- end card-box -->
  </div>
  <div class="col-xl-8">
    <div class="card-box">
      <h4 class="header-title fw-bold">Biểu mẩu</h4>
      <div class="table-responsive">
        <table class="table table-borderless table-hover table-centered m-0" id="mytable">
          <thead class="thead-light">
            <tr>
              <th>STT</th>
              <th>Tên file</th>
              <th>Lượt tải</th>
              <th>File</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_file as $key => $file )
              <tr>
                <td>
                  {{ $key+1 }}
                </td>
                <td style="width: 70%">
                  <h5 class="m-0 font-weight-normal">
                    {{ $file->ten_f }}
                  </h5>
                </td>
                <td>
                  <i class="fa-solid fa-download" style="color: #FF5B00;"></i>
                  &ensp;
                  {{ $file->luottai_f }}
                </td>
                <td>
                  <a href="{{ asset('public/uploads/file/'.$file->file_f) }}" class="taive{{ $key+1 }}">
                    <input class="ma_f{{ $key+1 }}" type="hidden" value="{{ $file->ma_f }}">
                    <button type="button" class="btn btn-warning fw-bold" style="background-color: #00541A; border: none;">
                      <i class="fa-solid fa-download"></i>
                      &ensp;
                      Tải về
                    </button>
                  </a>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- end row -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    @foreach ($list_file as $key => $file )
      $('.taive{{ $key+1 }}').click(function(){
        var id= $('.ma_f{{ $key+1 }}').val();
        $.ajax({
          url:"{{ url("/file_luottai") }}",
          type:"GET",
          data:{id:id},
        });
      });
    @endforeach
    @foreach ($list_lop as $key => $lop )
      $('.luotxem_l{{ $key+1 }}').click(function(){
        var id= $('.ma_l{{ $key+1 }}').val();
        // alert(id)
        $.ajax({
          url:"{{ url("/lop_luotxem") }}",
          type:"GET",
          data:{id:id},
        });
      });
    @endforeach
  });
</script>
@endsection
