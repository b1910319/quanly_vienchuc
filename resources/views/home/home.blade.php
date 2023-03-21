@extends('layout')
@section('content')
<div class="row">
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
  {{-- thời tiết --}}
  <div class="col-xl-4">
    <div class="card-box">
      <!-- weather widget start --><a target="_blank" href="https://hotelmix.vn/weather/can-tho-33807"><img src="https://w.bookcdn.com/weather/picture/3_33807_1_33_137AE9_430_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=38699&domid=1180&anc_id=20094"  alt="booked.net"/></a><!-- weather widget end -->
    </div> <!-- end card-box -->
  </div> <!-- end col -->

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

      <h4 class="header-title">Total Revenue</h4>

      <div class="mt-3 text-center">
        <p class="text-muted font-15 font-family-secondary mb-0">
          <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-success"></i> Desktop</span>
          <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i> Laptop</span>
        </p>

        <div id="sparkline1" class="mt-3"></div>

        <div class="row mt-3">
          <div class="col-4">
            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
            <h4> $56,214</h4>
          </div>
          <div class="col-4">
            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
            <h4><i class="fe-arrow-up text-success"></i> $840</h4>
          </div>
          <div class="col-4">
            <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
            <h4><i class="fe-arrow-down text-danger"></i> $7,845</h4>
          </div>
        </div>
      </div>
    </div> <!-- end card-box -->
  </div> <!-- end col -->

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

      <h4 class="header-title">Weekly Sales Report</h4>

      <div class="mt-3 text-center">
        <p class="text-muted font-15 font-family-secondary mb-0">
          <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-secondary"></i> Direct</span>
          <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-primary"></i>
            Affilliate</span>
          <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-light"></i>
            Sponsored</span>
        </p>

        <div id="sparkline3" class="text-center mt-3"></div>

        <div class="row mt-3">
          <div class="col-4">
            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
            <h4> $12,365</h4>
          </div>
          <div class="col-4">
            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
            <h4><i class="fe-arrow-down text-danger"></i> $365</h4>
          </div>
          <div class="col-4">
            <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
            <h4><i class="fe-arrow-up text-success"></i> $8,501</h4>
          </div>
        </div>

      </div>
    </div> <!-- end card-box -->
  </div> <!-- end col -->

</div>
<!-- end row -->

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
  </div> <!-- end col -->
  <div class="col-xl-8">
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
      <h4 class="header-title mb-3">Danh sách các lớp học hiện có</h4>

      <div class="table-responsive">
        <table class="table table-borderless table-hover table-centered m-0" id="mytable1">

          <thead class="thead-light">
            <tr>
              <th>Tên lớp</th>
              <th>Ngày bắt đầu học</th>
              <th>Ngày kết thúc</th>
              <th>Cơ sở đào tạo</th>
              <th>Quốc gia</th>
              <th>Chi tiết</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_lop as $lop )
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
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $lop->ma_l }}">
                    <i class="fa-solid fa-circle-info"></i>
                  </button>

                  <!-- Modal -->
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
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach

          </tbody>
        </table>
      </div> <!-- end .table-responsive-->
    </div> <!-- end card-box-->
  </div> <!-- end col -->
</div>
<!-- end row -->
@endsection
