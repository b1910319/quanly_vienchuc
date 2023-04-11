@extends('layout')
@section('content')
<div class="row">
  <div class="col-6">
    <div class="card-box">
      <p class="fw-bold text-center" style="font-size: 22px; color: #155263">THÔNG TIN VIÊN CHỨC</p>
      <table class="table">
        <tbody>
          <tr>
            <th scope="row" style="width: 20%; background-color: #005F99; font-weight: bold; font-size: 16px; color: white">
              Họ tên
            </th>
            <td >{{ $vienchuc->hoten_vc }}</td>
          </tr>
          <tr>
            <th scope="row" style="width: 20%; background-color: #005F99; font-weight: bold; font-size: 16px; color: white">Mã số</th>
            <td >VC{{ $vienchuc->ma_vc }}</td>
          </tr>
          <tr>
            <th scope="row" style="width: 20%; background-color: #005F99; font-weight: bold; font-size: 16px; color: white">Email</th>
            <td >{{ $vienchuc->user_vc }}</td>
          </tr>
          <tr>
            <th scope="row" style="width: 20%; background-color: #005F99; font-weight: bold; font-size: 16px; color: white">Số điện thoại</th>
            <td >{{ $vienchuc->sdt_vc }}</td>
          </tr>
          @if (!$phanquyen_admin)
            <tr>
              <th scope="row" style="width: 20%; background-color: #005F99; font-weight: bold; font-size: 16px; color: white">Ngày sinh</th>
              <td >{{ $vienchuc->ngaysinh_vc }}</td>
            </tr>
            <tr>
              <th scope="row" style="width: 20%; background-color: #005F99; font-weight: bold; font-size: 16px; color: white">Ngạch viên chức</th>
              <td >
                @foreach ($list_ngach as $ngach )
                  @if ($ngach->ma_n == $vienchuc->ma_n)
                    {{ $ngach->ten_n }}
                  @endif
                @endforeach
              </td>
            </tr>
            <tr>
              <th scope="row" style="width: 20%; background-color: #005F99; font-weight: bold; font-size: 16px; color: white">Dân tộc</th>
              <td >
                @foreach ($list_dantoc as $dantoc )
                  @if ($dantoc->ma_dt == $vienchuc->ma_dt)
                    {{ $dantoc->ten_dt }}
                  @endif
                @endforeach
              </td>
            </tr>
          @endif
          <tr>
            <th scope="row" style="width: 20%; background-color: #005F99; font-weight: bold; font-size: 16px; color: white">Khoa</th>
            @foreach ($list_khoa as $khoa )
              @if ($khoa->ma_k == $vienchuc->ma_k)
                <td >
                  {{ $khoa->ten_k }}
                </td>
              @endif
            @endforeach
          </tr>
          <tr>
            <th scope="row" style="width: 20%; background-color: #005F99; font-weight: bold; font-size: 16px; color: white">Chức vụ</th>
            @foreach ($list_chucvu as $chucvu )
              @if ($chucvu->ma_cv == $vienchuc->ma_cv)
                <td >
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
            <button type="submit"  class="btn btn-primary button_cam" style="width: 100%;">
              <i class="fas fa-plus-square text-light"></i>
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
<!-- end row -->


<div class="row">
  <div class="col-xl-12">
    <div class="card-box">
      <h4 class="header-title mb-3 fw-bold title_table">
        Các lớp học hiện đang được mở
        <div class="music-waves-2">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </h4>

      <div class="table-responsive">
        <table class="table table-borderless table-hover table-centered m-0" id="mytable1">
          <thead class="color_table">
            <tr>
              <th class="text-light">Tên lớp</th>
              <th class="text-light">Hạn đăng ký nộp hồ sơ</th>
              <th class="text-light">Cơ sở đào tạo</th>
              <th class="text-light">Luợt xem</th>
              <th class="text-light">Chi tiết</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_lop as $key => $lop )
              <tr>
                <td>
                  <h5 class="m-0 fw-bold">
                    {{ $lop->ten_l }}
                  </h5>
                </td>
                <td>
                  <?php 
                  $han_dangky = strtotime ( '-2 month' , strtotime ( $lop->ngaybatdau_l ) ) ;
                  $han_dangky = date ( 'Y-m-j' , $han_dangky );
                  ?>
                    <span class="badge badge-light-danger" style="font-size: 16px">
                      <?php 
                        echo $han_dangky;
                      ?>
                    </span>
                  <?php
                ?>
                </td>
                <td>
                  {{ $lop->tencosodaotao_l }}
                </td>
                <td>
                  <i class="fa-solid fa-eye" style="color: #0b44a8;"></i>
                  &ensp;
                  {{ $lop->luotxem_l }}
                </td>
                <td style="width: 10%">
                  <button type="button" class="btn btn-primary luotxem_l{{ $key+1 }} btn_chitiet fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $lop->ma_l }}">
                    <input type="hidden" class="ma_l{{ $key+1 }}" value="{{ $lop->ma_l }}">
                    <i class="fa-solid fa-circle-info text-light"></i>
                    &ensp;
                    Chi tiết
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
                                  <h5 class="m-0 fw-bold">Tên lớp</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->ten_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Ngày bắt đầu</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->ngaybatdau_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Ngày kết thúc</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->ngayketthuc_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Yêu cầu</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->yeucau_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Tên cơ sở đào tạo</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->tencosodaotao_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Quốc gia đào tạo</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->quocgiaodaotao_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Ngành học</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->nganhhoc_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Trình độ đào tạo</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->trinhdodaotao_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Nguồn kinh phí</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->nguonkinhphi_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Địa chỉ đào tạo</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->diachidaotao_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Nội dung học</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->noidunghoc_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Email cơ sở</h5>
                                </td>
                  
                                <td>
                                  {{ $lop->emailcoso_l }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <h5 class="m-0 fw-bold">Số điện thoại cơ sở</h5>
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
                            <i class="fa-solid fa-square-xmark text-light"></i>
                            &ensp; Đóng
                          </button>
                          @if ($phanquyen_admin || $phanquyen_qlcttc)
                          <a href="{{ URL::to('/edit_lop_danhmuclop/'.$lop->ma_l) }}">
                            <button type="submit" class="btn btn-warning fw-bold" style="background-color: #FC7300">
                              <i class="fa-solid fa-pen-to-square text-light"></i>
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
      <div class="row"  >
        @if ($phanquyen_admin || $phanquyen_qltt || $phanquyen_qlktkl || $phanquyen_qlcttc  )
          <div class="col-12">
            <div class="card-box" style="background-color: #0096FF">
              <div class="float-left" dir="ltr">
                <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#FFED00" data-bgcolor="#FFED00" value="100" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".2">
              </div>
              <div class="text-right">
                @foreach ($count_vienchuc as $vienchuc )
                  <h3 class="mb-1" style="color: #FFED00"> {{ $vienchuc->sum }} </h3>
                @endforeach
                <p class=" mb-1 fw-bold" style="color: #FFED00">Viên chức</p>
              </div>
            </div>
          </div>
        @endif
        @if ($phanquyen_qlk)
          <div class="col-12">
            <div class="card-box" style="background-color: #FF8E00">
              <div class="float-left" dir="ltr">
                @foreach ($count_vienchuc as $vc )
                  @foreach ($count_vienchuc_khoa as $vck )
                    <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#49FF00" data-bgcolor="#d8eff8" value="<?php echo ceil(($vck->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                  @endforeach
                @endforeach
              </div>
              <div class="text-right">
                @foreach ($count_vienchuc_khoa as $vienchuc )
                  <h3 class="mb-1" style="color: #49FF00"> {{ $vienchuc->sum }} </h3>
                @endforeach
                <p class="mb-1 fw-bold" style="color: #49FF00">Viên chức</p>
              </div>
            </div>
          </div>
        @endif
      
        @if ($phanquyen_admin || $phanquyen_qltt)
          <div class="col-12">
            <div class="card-box" style="background-color: #04009A">
              <div class="float-left" dir="ltr">
                @foreach ($count_vienchuc as $vc )
                  @foreach ($count_vienchuc_nghihuu as $vcnh )
                    <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#3bafda" data-bgcolor="#d8eff8" value="<?php echo ceil(($vcnh->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                  @endforeach
                @endforeach
              </div>
              <div class="text-right">
                @foreach ($count_vienchuc_nghihuu as $vienchuc )
                  <h3 class="mb-1 text-light"> {{ $vienchuc->sum }} </h3>
                @endforeach
                <p class="fw-bold text-light mb-1">Nghĩ hưu</p>
              </div>
            </div>
          </div>
        @endif
      
        @if ($phanquyen_qlk)
          <div class="col-12">
            <div class="card-box" style="background-color: #04009A">
              <div class="float-left" dir="ltr">
                @foreach ($count_vienchuc as $vc )
                  @foreach ($count_vienchuc_nghihuu_khoa as $vcnhk )
                    <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#3bafda" data-bgcolor="#d8eff8" value="<?php echo ceil(($vcnhk->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                  @endforeach
                @endforeach
              </div>
              <div class="text-right">
                @foreach ($count_vienchuc_nghihuu_khoa as $vienchuc )
                  <h3 class="mb-1 text-light"> {{ $vienchuc->sum }} </h3>
                @endforeach
                <p class="fw-bold mb-1 text-light">Nghĩ hưu</p>
              </div>
            </div>
          </div>
        @endif
        @if ($phanquyen_admin || $phanquyen_qlktkl)
          <div class="col-12">
            <div class="card-box" style="background-color: #BD2000">
              <div class="float-left" dir="ltr">
                @foreach ($count_vienchuc as $vc )
                  @foreach ($count_vienchuc_kyluat as $vckl )
                    <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#f672a7" data-bgcolor="#fde3ed" value="<?php echo ceil(($vckl->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                  @endforeach
                @endforeach
              </div>
              <div class="text-right">
                @foreach ($count_vienchuc_kyluat as $vienchuc )
                  <h3 class="mb-1 text-light"> {{ $vienchuc->sum }} </h3>
                @endforeach
                <p class="fw-bold text-light mb-1">Kỷ luật</p>
              </div>
            </div>
          </div>
        @endif
      
        @if ($phanquyen_qlk)
          <div class="col-12">
            <div class="card-box" style="background-color: #BD2000">
              <div class="float-left" dir="ltr">
                @foreach ($count_vienchuc as $vc )
                  @foreach ($count_vienchuc_kyluat_khoa as $vcklk )
                    <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#f672a7" data-bgcolor="#fde3ed" value="<?php echo ceil(($vcklk->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                  @endforeach
                @endforeach
              </div>
              <div class="text-right">
                @foreach ($count_vienchuc_kyluat_khoa as $vienchuc )
                  <h3 class="mb-1 text-light"> {{ $vienchuc->sum }} </h3>
                @endforeach
                <p class="fw-bold text-light mb-1">Kỷ luật</p>
              </div>
            </div>
          </div>
        @endif
      
        @if ($phanquyen_admin || $phanquyen_qlktkl)
          <div class="col-12">
            <div class="card-box" style="background-color: #007965">
              <div class="float-left" dir="ltr">
                @foreach ($count_vienchuc as $vc )
                  @foreach ($count_vienchuc_khenthuong as $vckt )
                  <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#28DF99" data-bgcolor="#e2e3e5" value="<?php echo ceil(($vckt->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                  @endforeach
                @endforeach
              </div>
              <div class="text-right">
                @foreach ($count_vienchuc_khenthuong as $vienchuc )
                  <h3 class="mb-1 text-light"> {{ $vienchuc->sum }} </h3>
                @endforeach
                <p class="fw-bold text-light mb-1">Khen thưởng</p>
              </div>
            </div>
          </div>
        @endif
      
        @if ($phanquyen_qlk)
          <div class="col-12">
            <div class="card-box" style="background-color: #007965">
              <div class="float-left" dir="ltr">
                @foreach ($count_vienchuc as $vc )
                  @foreach ($count_vienchuc_khenthuong_khoa as $vcktk )
                  <input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#28DF99" data-bgcolor="#e2e3e5" value="<?php echo ceil(($vcktk->sum*100)/($vc->sum)) ?>" data-skin="tron" data-angleoffset="0" data-readonly="true" data-thickness=".15">
                  @endforeach
                @endforeach
              </div>
              <div class="text-right">
                @foreach ($count_vienchuc_khenthuong_khoa as $vienchuc )
                  <h3 class="mb-1 text-light"> {{ $vienchuc->sum }} </h3>
                @endforeach
                <p class="fw-bold text-light mb-1">Khen thưởng</p>
              </div>
            </div>
          </div>
        @endif
      
      </div>

    </div> <!-- end card-box -->
  </div>
  <div class="col-xl-8">
    <div class="card-box">
      <h4 class="header-title fw-bold text-center title_table">
        Biểu mẩu
      </h4>
      <div class="table-responsive">
        <table class="table table-borderless table-hover table-centered m-0" id="mytable">
          <thead class="color_table">
            <tr>
              <th class="text-light">STT</th>
              <th class="text-light">Tên file</th>
              <th class="text-light">Lượt tải</th>
              <th class="text-light">File</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_file as $key => $file )
              <tr>
                <td>
                  {{ $key+1 }}
                </td>
                <td style="width: 70%">
                  <h5 class="m-0 fw-bold">
                    {{ $file->ten_f }}
                  </h5>
                </td>
                <td style="width: 15%;">
                  <i class="fa-solid fa-download" style="color: #FF5B00;"></i>
                  &ensp;
                  {{ $file->luottai_f }}
                </td>
                <td style="width: 15%;">
                  <a href="{{ asset('public/uploads/file/'.$file->file_f) }}" class="taive{{ $key+1 }}">
                    <input class="ma_f{{ $key+1 }}" type="hidden" value="{{ $file->ma_f }}">
                    <button type="button" class="btn btn-warning button_xanhla">
                      <i class="fa-solid fa-download text-light"></i>
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
<div class="row">
  @if ($ketqua)
    <div class="col-6">
      <div class="card-box">
        <table class="table" id="mytable">
          <thead class="color_table">
            <tr>
              <th class="text-light" scope="col">STT</th>
              <th class="text-light" scope="col">Thông tin lớp học</th>
              <th class="text-light" scope="col">Kết quả</th>
            </tr>
          </thead>
          <tbody  >
            @foreach ($ketqua_an as $key => $ketqua)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td>
                  <b>Tên lớp học: </b> {{ $ketqua->ten_l }} <br>
                  <b>Ngày bắt đầu: </b> {{ $ketqua->ngaybatdau_l }} <br>
                  <b>Ngày kết thúc: </b> {{ $ketqua->ngayketthuc_l }} <br>
                  <b>Tên cơ sở đào tạo: </b> {{ $ketqua->tencosodaotao_l }} <br>
                  <b>Quốc gia đào tạo: </b> {{ $ketqua->quocgiaodaotao_l }} <br>
                  <b>Email cơ sở đào tạo: </b> {{ $ketqua->emailcoso_l }} <br>
                  <b>Số điện thoại cơ sở đào tạo: </b> {{ $ketqua->sdtcoso_l }} <br>
                </td>
                <td >
                  <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
              style="height: 300px; overflow: auto;">
                    <p>
                      <b>Tên người hướng dẫn: </b> {{ $ketqua->tennguoihuongdan_kq }} <br>
                      <b>Email người hướng dẫn: </b> {{ $ketqua->emailnguoihuongdan_kq }} <br>
                      <b>Nội dung đào tạo: </b> {{ $ketqua->noidungaotao_kq }} <br>
                      <b>Văn bằng, chứng chỉ được cấp: </b> {{ $ketqua->bangduoccap_kq }} <br>
                      <b>Ngày cấp bằng: </b> {{ $ketqua->ngaycapbang_kq }} <br>
                      <b>Kết quả xếp loại: </b> {{ $ketqua->xeploai_kq }} <br>
                      <b>Đề tài tốt nghiệp: </b> {{ $ketqua->detaitotnghiep_kq }} <br>
                      <b>Ngày về nước: </b> {{ $ketqua->ngayvenuoc_kq }} <br>
                      <b>Đánh giá của cơ sở: </b> {{ $ketqua->danhgiacuacoso_kq }} <br>
                      <b>Kiến nghị, đề xuất: </b> {{ $ketqua->kiennghi_kq }} <br>
                    </p>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif
  @if ($dunghoc)
    <div class="col-6">
      <div class="card-box">
        <table class="table" id="mytable">
          <thead class="color_table">
            <tr>
              <th class="text-light" scope="col">STT</th>
              <th class="text-light" scope="col">Thông tin lớp học</th>
              <th class="text-light" scope="col">Thông tin tạm dừng học</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dunghoc_an as $key => $dunghoc)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td>
                  <b>Tên lớp học: </b> {{ $dunghoc->ten_l }} <br>
                  <b>Ngày bắt đầu: </b> {{ $dunghoc->ngaybatdau_l }} <br>
                  <b>Ngày kết thúc: </b> {{ $dunghoc->ngayketthuc_l }} <br>
                  <b>Tên cơ sở đào tạo: </b> {{ $dunghoc->tencosodaotao_l }} <br>
                  <b>Quốc gia đào tạo: </b> {{ $dunghoc->quocgiaodaotao_l }} <br>
                  <b>Email cơ sở đào tạo: </b> {{ $dunghoc->emailcoso_l }} <br>
                  <b>Số điện thoại cơ sở đào tạo: </b> {{ $dunghoc->sdtcoso_l }} <br>
                </td>
                <td>
                  <b>Ngày bắt đầu tạm dừng: </b> {{ $dunghoc->batdau_dh }} <br>
                  <b>Ngày kết thúc tạm dừng: </b> {{ $dunghoc->ketthuc_dh }} <br>
                  <b>Lý do tạm dừng: </b> {{ $dunghoc->lydo_dh }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif
  @if ($giahan)
    <div class="col-6">
      <div class="card-box">
        <table class="table" id="mytable">
          <thead class="color_table">
            <tr>
              <th class="text-light" scope="col">STT</th>
              <th class="text-light" scope="col">Thông tin lớp học</th>
              <th class="text-light" scope="col">Thông tin gia hạn thời gian học</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($giahan_an as $key => $giahan)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td>
                  <b>Tên lớp học: </b> {{ $giahan->ten_l }} <br>
                  <b>Ngày bắt đầu: </b> {{ $giahan->ngaybatdau_l }} <br>
                  <b>Ngày kết thúc: </b> {{ $giahan->ngayketthuc_l }} <br>
                  <b>Tên cơ sở đào tạo: </b> {{ $giahan->tencosodaotao_l }} <br>
                  <b>Quốc gia đào tạo: </b> {{ $giahan->quocgiaodaotao_l }} <br>
                  <b>Email cơ sở đào tạo: </b> {{ $giahan->emailcoso_l }} <br>
                  <b>Số điện thoại cơ sở đào tạo: </b> {{ $giahan->sdtcoso_l }} <br>
                </td>
                <td>
                  <b>Thời gian gia hạn: </b> {{ $giahan->thoigian_gh }} <br>
                  <b>Lý do gia hạn: </b> {{ $giahan->lydo_gh }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif
  @if ($chuyen)
    <div class="col-6">
      <div class="card-box">
        <table class="table" id="mytable">
          <thead class="color_table">
            <tr>
              <th class="text-light" scope="col">STT</th>
              <th class="text-light" scope="col">Thông tin lớp học</th>
              <th class="text-light" scope="col">Thông tin chuyển trường, nước ....</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list as $key => $chuyen)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td>
                  <b>Tên lớp học: </b> {{ $chuyen->ten_l }} <br>
                  <b>Ngày bắt đầu: </b> {{ $chuyen->ngaybatdau_l }} <br>
                  <b>Ngày kết thúc: </b> {{ $chuyen->ngayketthuc_l }} <br>
                  <b>Tên cơ sở đào tạo: </b> {{ $chuyen->tencosodaotao_l }} <br>
                  <b>Quốc gia đào tạo: </b> {{ $chuyen->quocgiaodaotao_l }} <br>
                  <b>Email cơ sở đào tạo: </b> {{ $chuyen->emailcoso_l }} <br>
                  <b>Số điện thoại cơ sở đào tạo: </b> {{ $chuyen->sdtcoso_l }} <br>
                </td>
                <td>
                  <b>Nội dung chuyển: </b> {{ $chuyen->noidung_c }} <br>
                  <b>Lý do chuyển: </b> {{ $chuyen->lydo_c }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
  @endif
  @if ($thoihoc)
    <div class="col-6">
      <div class="card-box">
        <table class="table" id="mytable">
          <thead class="color_table">
            <tr>
              <th class="text-light" scope="col">STT</th>
              <th class="text-light" scope="col">Thông tin lớp học</th>
              <th class="text-light" scope="col">Thông tin thôi học</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list as $key => $thoihoc)
              <tr >
                <th scope="row">{{ $key+1 }}</th>
                <td>
                  <b>Tên lớp học: </b> {{ $thoihoc->ten_l }} <br>
                  <b>Ngày bắt đầu: </b> {{ $thoihoc->ngaybatdau_l }} <br>
                  <b>Ngày kết thúc: </b> {{ $thoihoc->ngayketthuc_l }} <br>
                  <b>Tên cơ sở đào tạo: </b> {{ $thoihoc->tencosodaotao_l }} <br>
                  <b>Quốc gia đào tạo: </b> {{ $thoihoc->quocgiaodaotao_l }} <br>
                  <b>Email cơ sở đào tạo: </b> {{ $thoihoc->emailcoso_l }} <br>
                  <b>Số điện thoại cơ sở đào tạo: </b> {{ $thoihoc->sdtcoso_l }} <br>
                </td>
                <td>
                  <b>Thời gian chính thức thôi học: </b> {{ $thoihoc->ngay_th }} <br>
                  <b>Lý do thôi học: </b> {{ $thoihoc->lydo_th }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endif
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
