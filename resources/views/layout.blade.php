<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>{{ $title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
  <meta content="Coderthemes" name="author">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('public\assets\images\favicon.ico') }}">
  {{-- link bootstrap  --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
  {{--  --}}
  {{-- css datatable hỗ trợ tìm kiếm --}}
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  {{--  --}}
  <!-- App css -->
  <link href="{{ asset('public\assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public\assets\css\icons.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public\assets\css\app.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public\assets\css\style.css') }}" rel="stylesheet" type="text/css">
  {{-- link font awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  {{--  --}}
  {{-- link jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  {{--  --}}
  {{-- css biểu đồ --}}
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  {{--  --}}
  {{-- sweetalert 2 --}}
  <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css
" rel="stylesheet">
  {{--  --}}
</head>
<body>
  <!-- Begin page -->
  <div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">
      <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <?php
              $hinh_vc = session()->get('hinh_vc');
              ?>
                @if ($hinh_vc != ' ')
                  <img src="{{ asset('public/uploads/vienchuc/'.$hinh_vc) }}" alt="" style="border-radius: 50%">
                @else
                  <img src="https://gocbao.net/wp-content/uploads/2020/10/avatar-trang-4.jpg" alt="" style="border-radius: 50%">
                @endif
              <?php
            ?>
            
            <span class="pro-user-name ml-1 fw-bold text-white">
              <?php
                $hoten_vc = session()->get('hoten_vc');
                echo $hoten_vc;
              ?>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-header noti-title bg-light">
              <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!-- item-->
            <a href="{{ URL::to('thongtin_canhan') }}" class="dropdown-item notify-item">
              <i class="remixicon-account-circle-line"></i>
              <span>Thông tin</span>
            </a>

            <!-- item-->
            <a href="{{ URL::to('thongtin_giadinh') }}" class="dropdown-item notify-item">
              <i class="fa-solid fa-people-roof"></i>
              <span>Gia đình</span>
            </a>

            <!-- item-->
            <a href="{{ URL::to('thongtin_bangcap') }}" class="dropdown-item notify-item">
              <i class="remixicon-wallet-line"></i>
              <span>Bằng cấp </span>
            </a>

            <!-- item-->
            <a href="{{ URL::to('thongtin_khenthuong') }}" class="dropdown-item notify-item">
              <i class="fa-solid fa-award"></i>
              <span>Khen thưởng</span>
            </a>
            <a href="{{ URL::to('thongtin_kyluat') }}" class="dropdown-item notify-item">
              <i class="fa-solid fa-face-frown"></i>
              <span>Kỷ luật</span>
            </a>
            <a href="{{ URL::to('thongtin_lophoc') }}" class="dropdown-item notify-item">
              <i class="fa-solid fa-person-shelter"></i>
              <span>Lớp học</span>
            </a>
            <a href="{{ URL::to('thongtin_quatrinhchucvu') }}" class="dropdown-item notify-item">
              <i class="fa-solid fa-map-pin"></i>
              <span>Qúa trình chức vụ</span>
            </a>

            <div class="dropdown-divider"></div>

            <!-- item-->
            <a href="{{ URL::to('/change_pass') }}" class="dropdown-item notify-item">
              <i class="fa-solid fa-lock"></i>
              <span>Đổi mật khẩu</span>
            </a>
            <a href="{{ URL::to('/logout') }}" class="dropdown-item notify-item">
              <i class="fa-solid fa-power-off"></i>
              <span>Đăng xuất</span>
            </a>

          </div>
        </li>
      </ul>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

      <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

          <ul class="metismenu" id="side-menu">
            <li>
              <a href="{{ URL::to('/home') }}" class="waves-effect">
                <i class="fa-solid fa-house-chimney"></i>
                <span> Trang Chủ </span>
              </a>
            </li>
            @if ($phanquyen_admin)
              <li>
                <a href="javascript: void(0);" class="waves-effect">
                  <i class="fa-solid fa-drum-steelpan"></i>
                  <span> Quyền </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                  <li>
                    <a href="{{ URL::to('/quanly_quyen') }}">Quản Lý Quyền</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/phanquyen') }}">Phân Quyền</a>
                  </li>
                </ul>
              </li>
            @endif
            @if ($phanquyen_admin)
              <li>
                <a href="javascript: void(0);" class="waves-effect">
                  <i class="fa-solid fa-building"></i>
                  <span> Khoa </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                  <li>
                    <a href="{{ URL::to('/quanly_khoa') }}">Quản Lý Khoa</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/quanly_vienchuc_khoa') }}">Quản Lý Viên Chức Thuộc Khoa</a>
                  </li>
                </ul>
              </li>
            @endif
            @if ($phanquyen_admin)
              <li>
                <a href="{{ URL::to('file') }}" class="waves-effect">
                  <i class="fa-solid fa-file"></i>
                  <span> Quản lý file </span>
                </a>
              </li>
            @endif
            @if ($phanquyen_admin)
              <li>
                <a href="{{ URL::to('lylich') }}" class="waves-effect">
                  <i class="fa-solid fa-address-card"></i>
                  <span> Lý lịch viên chức </span>
                </a>
              </li>
            @endif
            @if ($phanquyen_qltt || $phanquyen_admin)
              <li>
                <a href="javascript: void(0);" class="waves-effect">
                  <i class="fa-solid fa-circle-info"></i>
                  <span> Quản Lý Thông Tin <br> Viên Chức </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                  <li>
                    <a href="{{ URL::to('/dantoc') }}">
                      Dân Tộc
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/chucvu') }}">
                      Chức Vụ
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/ngach') }}">
                      Ngạch viên chức
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/bac') }}">
                      Bậc
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/tongiao') }}">
                      Tôn giáo
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/thuongbinh') }}">
                      Thương binh
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/loaibangcap') }}">
                      Loại bằng cấp
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/hedaotao') }}">
                      Hệ đào tạo
                    </a>
                  </li>
                  <li>
                    <a href="javascript: void(0);" aria-expanded="false">Quản lý thông tin viên chức
                      <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav" aria-expanded="false">
                      <li>
                        <a href="{{ URL::to('/thongtin_vienchuc_add') }}">Thông tin</a>
                      </li>
                      <li>
                        <a href="{{ URL::to('/danhsach_thongtin_vienchuc') }}">Danh sách viên chức</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="{{ URL::to('/nghihuu') }}">
                      Nghĩ hưu
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/nangbac') }}">
                      @foreach ($count_nangbac as $count )
                        <span class="badge badge badge-pill float-right" style="background-color: #379237;">{{ $count->sum }}</span>
                      @endforeach
                      
                      Nâng bậc
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/thongke_qltt') }}">
                      Thống kê
                    </a>
                  </li>
                </ul>
              </li>
            @endif
            @if ($phanquyen_qlqtcv || $phanquyen_admin)
              <li>
                <a href="javascript: void(0);" class="waves-effect">
                  <i class="fa-solid fa-map-pin"></i>
                  <span> Quản Lý Qúa Trình <br> Chức Vụ </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                  <li>
                    <a href="{{ URL::to('/nhiemky') }}">
                      Nhiệm kỳ
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/quatrinhchucvu') }}">
                      Qúa trình chức vụ
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/thongke_qlqtcv') }}">
                      Thống kê
                    </a>
                  </li>
                </ul>
              </li>
            @endif
            @if ($phanquyen_qlktkl || $phanquyen_admin)
              <li>
                <a href="javascript: void(0);" class="waves-effect">
                  <i class="fa-solid fa-award"></i>
                  <span> Quản Lý Khen Thưởng, Kỹ Luật </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                  <li>
                    <a href="{{ URL::to('/loaikhenthuong') }}">
                      Loại khen thưởng
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/hinhthuckhenthuong') }}">
                      Hình thức khen thưởng
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/khenthuong') }}">
                      Khen thưởng
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/loaikyluat') }}">
                      Loại kỷ luật
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/kyluat') }}">
                      Kỷ luật
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/quanly_khenthuong_kyluat') }}">
                      Quản lý
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/thongke_qlktkl') }}">
                      Thống kê
                    </a>
                  </li>
                </ul>
              </li>
            @endif
            @if ($phanquyen_qlcttc || $phanquyen_admin)
              <li>
                <a href="javascript: void(0);" class="waves-effect">
                  <i class="fa-solid fa-sitemap"></i>
                  <span> Quản lý công tác <br> tổ chức </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                  <li>
                    <a href="{{ URL::to('/danhmuclop') }}">Danh mục đào tạo</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/chauluc') }}">Châu lục</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/lop') }}">Quản lý lớp học</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/quatrinhhoc') }}">Quản lý quá trình học</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/quyetdinh_all') }}">Quyết định cử đi học</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/ketqua_all') }}">
                      @foreach ($count_ketqua_an as $count )
                        <span class="badge badge badge-pill float-right" style="background-color: #54B435;">{{ $count->sum }}</span>
                      @endforeach
                      Kết quả quá trình học của viên chức
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/dunghoc_all') }}">
                      @foreach ($count_tamdung_an as $count )
                        <span class="badge badge badge-pill float-right" style="background-color: #AC0D0D;">{{ $count->sum }}</span>
                      @endforeach
                      Thông tin tạm dừng học của viên chức
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/giahan_all') }}">
                      @foreach ($count_giahan_an as $count )
                        <span class="badge badge badge-pill float-right" style="background-color: #0C1E7F;">{{ $count->sum }}</span>
                      @endforeach
                      Thông tin gia hạn thời gian học của viên chức
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/chuyen_all') }}">
                      @foreach ($count_chuyen_an as $count )
                        <span class="badge badge badge-pill float-right" style="background-color: #C400FF;">{{ $count->sum }}</span>
                      @endforeach
                      Thông tin xin chuyển trường / nước / ngành học của viên chức
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/thoihoc_all') }}">
                      @foreach ($count_thoihoc_an as $count )
                        <span class="badge badge badge-pill float-right" style="background-color: #480032;">{{ $count->sum }}</span>
                      @endforeach
                      Thông tin xin thôi học của viên chức
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/thongke_qlcttc') }}">Thống kê</a>
                  </li>
                </ul>
              </li>
            @endif
            @if ($phanquyen_qlk)
              <li>
                <a href="javascript: void(0);" class="waves-effect">
                  <i class="fa-solid fa-building"></i>
                  <span> Quản lý khoa </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                  <li>
                    <a href="{{ URL::to('/thongtin_vienchuc_khoa') }}">Thông tin viên chức</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/nghihuu') }}">
                      Nghĩ hưu
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/nangbac') }}">
                      @foreach ($count_nangbac as $count )
                        <span class="badge badge badge-pill float-right" style="background-color: #379237;">{{ $count->sum }}</span>
                      @endforeach
                      Nâng bậc
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/khenthuong') }}">
                      Khen thưởng
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/kyluat') }}">
                      Kỷ luật
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/thongke_qlk') }}">
                      Thống kê
                    </a>
                  </li>
                </ul>
              </li>
            @endif
          </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

      </div>
      <!-- Sidebar -left -->

    </div>
    <div class="content-page">
      <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row" style="padding-top: 200px">
            <div class="col-12">
              <div class="page-title-box">
                <div class="row">
                  <div class="col-10">
                    <h4 class="page-title">
                      <a href="{{ URL::to('home') }}">
                        Xin chào !!!
                        <span style="text-transform: uppercase; font-weight: bold; color: #155263; font-size: 20px;">
                          <?php
                            $hoten_vc = session()->get('hoten_vc');
                            echo $hoten_vc;
                          ?>
                        </span>
                      </a>
                    </h4>
                  </div>
                  <div class="col-2" style="padding-top: 10px">
                    <a href="{{ URL::to('logout') }}">
                      <button type="button" class="btn btn-light fw-bold" style="width: 100%; color: #AC0D0D">
                        <i class="fa-solid fa-power-off" style="color: #AC0D0D"></i>
                        &ensp;
                        ĐĂNG XUẤT
                      </button>
                    </a>
                  </div>
                  {{-- <div class="line-loading"></div> --}}
                </div>
                
              </div>
            </div>
          </div>
          <!-- end page title -->

          @yield('content')

        </div> <!-- container -->

      </div> <!-- content -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


  </div>
  <!-- END wrapper -->

  <!-- Right Sidebar -->
  <div class="right-bar">
    <div class="rightbar-title">
      <a href="javascript:void(0);" class="right-bar-toggle float-right">
        <i class="fe-x noti-icon"></i>
      </a>
      <h4 class="m-0 text-white">Settings</h4>
    </div>
    <div class="slimscroll-menu">
      <!-- User box -->
      <div class="user-box">
        <div class="user-img">
          <img src="assets\images\users\avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
          <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
        </div>

        <h5><a href="javascript: void(0);">Nik G. Patel</a> </h5>
        <p class="text-muted mb-0"><small>Admin Head</small></p>
      </div>

      <ul class="nav nav-pills bg-light nav-justified">
        <li class="nav-item">
          <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
            General
          </a>
        </li>
        <li class="nav-item">
          <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
            Chat
          </a>
        </li>
      </ul>
      <div class="tab-content pl-3 pr-3">
        <div class="tab-pane" id="home1">
          <div class="row mb-2">
            <div class="col">
              <h5 class="m-0 font-15">Notifications</h5>
              <p class="text-muted"><small>Do you need them?</small></p>
            </div> <!-- end col-->
            <div class="col-auto">
              <div class="custom-control custom-switch mb-2">
                <input type="checkbox" class="custom-control-input" id="tabswitch1">
                <label class="custom-control-label" for="tabswitch1"></label>
              </div>
            </div> <!-- end col -->
          </div>
          <!-- end row-->

          <div class="row mb-2">
            <div class="col">
              <h5 class="m-0 font-15">API Access</h5>
              <p class="text-muted"><small>Enable/Disable access</small></p>
            </div> <!-- end col-->
            <div class="col-auto">
              <div class="custom-control custom-switch mb-2">
                <input type="checkbox" class="custom-control-input" checked="" id="tabswitch2">
                <label class="custom-control-label" for="tabswitch2"></label>
              </div>
            </div> <!-- end col -->
          </div>
          <!-- end row-->

          <div class="row mb-2">
            <div class="col">
              <h5 class="m-0 font-15">Auto Updates</h5>
              <p class="text-muted"><small>Keep up to date</small></p>
            </div> <!-- end col-->
            <div class="col-auto">
              <div class="custom-control custom-switch mb-2">
                <input type="checkbox" class="custom-control-input" id="tabswitch3">
                <label class="custom-control-label" for="tabswitch3"></label>
              </div>
            </div> <!-- end col -->
          </div>
          <!-- end row-->

          <div class="row mb-2">
            <div class="col">
              <h5 class="m-0 font-15">Online Status</h5>
              <p class="text-muted"><small>Show your status to all</small></p>
            </div> <!-- end col-->
            <div class="col-auto">
              <div class="custom-control custom-switch mb-2">
                <input type="checkbox" class="custom-control-input" checked="" id="tabswitch4">
                <label class="custom-control-label" for="tabswitch4"></label>
              </div>
            </div> <!-- end col -->
          </div>
          <!-- end row-->

          <div class="alert alert-success alert-dismissible fade mt-3 show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h5>Unlimited Access</h5>
            Upgrade to plan to get access to unlimited reports
            <br>
            <a href="javascript: void(0);" class="btn btn-outline-success mt-3 btn-sm">Upgrade<i class="ml-1 mdi mdi-arrow-right"></i></a>
          </div>

        </div>
        <div class="tab-pane show active" id="messages1">
          <div>
            <div class="inbox-widget">
              <h5 class="mt-0">Recent</h5>
              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-2.jpg" class="rounded-circle" alt=""> <i class="online user-status"></i>
                </div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                <p class="inbox-item-text">I've finished it! See you so...</p>
              </div>
              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-3.jpg" class="rounded-circle" alt=""> <i class="away user-status"></i></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                <p class="inbox-item-text">This theme is awesome!</p>
              </div>
              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-4.jpg" class="rounded-circle" alt=""> <i class="online user-status"></i>
                </div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                <p class="inbox-item-text">Nice to meet you</p>
              </div>

              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-5.jpg" class="rounded-circle" alt=""> <i class="busy user-status"></i></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                <p class="inbox-item-text">Hey! there I'm available...</p>
              </div>
              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-6.jpg" class="rounded-circle" alt=""> <i class="user-status"></i></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                <p class="inbox-item-text">This theme is awesome!</p>
              </div>

              <hr>
              <h5>Favorite <span class="float-right badge badge-pill badge-danger">18</span></h5>
              <hr>
              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-7.jpg" class="rounded-circle" alt=""> <i class="busy user-status"></i></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kennith</a></p>
                <p class="inbox-item-text">I've finished it! See you so...</p>
              </div>
              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-3.jpg" class="rounded-circle" alt=""> <i class="busy user-status"></i></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                <p class="inbox-item-text">This theme is awesome!</p>
              </div>
              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-10.jpg" class="rounded-circle" alt=""> <i class="online user-status"></i>
                </div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kimberling</a></p>
                <p class="inbox-item-text">Nice to meet you</p>
              </div>

              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-4.jpg" class="rounded-circle" alt=""> <i class="user-status"></i></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                <p class="inbox-item-text">Hey! there I'm available...</p>
              </div>
              <div class="inbox-item">
                <div class="inbox-item-img"><img src="assets\images\users\avatar-9.jpg" class="rounded-circle" alt=""> <i class="away user-status"></i></div>
                <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Leonareade</a></p>
                <p class="inbox-item-text">This theme is awesome!</p>
              </div>

              <div class="text-center mt-2">
                <a href="javascript:void(0);" class="text-muted"><i class="mdi mdi-spin mdi-loading mr-1"></i> Load more </a>
              </div>

            </div> <!-- end inbox-widget -->
          </div> <!-- end .p-3-->
        </div>
      </div>

    </div> <!-- end slimscroll-menu-->
  </div>
  <div class="back_top">
    <i class="fa-solid fa-angle-up text-light fw-bold"></i>
  </div>
  <footer>
    <ul class="icons">
      <li>
        <a href="{{ URL::to('home') }}">
          <i class="fa-solid fa-house"></i>
        </a>
      </li>
      <li>
        <a href="https://www.facebook.com/CICT.CTU">
          <i class="fa-brands fa-facebook"></i>
        </a>
      </li>
      <li>
        <a href="https://www.cit.ctu.edu.vn/">
          <i class="fa-brands fa-google"></i>
        </a>
      </li>
    </ul>
    <ul class="menu">
      <li><a href="{{ URL::to('home') }}">Home</a></li>
      <li><a href="https://www.facebook.com/CICT.CTU">Facebook</a></li>
      <li><a href="https://www.cit.ctu.edu.vn/">Google</a></li>
    </ul>
    <div class="footer-copyright">
      <p class="text-light">Trường Công nghệ Thông tin & Truyền thông - Trường Đại học Cần Thơ.</p>
      <p class="text-light">Khu 2, đường 3/2, Phường Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ, Việt Nam.</p>
      <p class="text-light">Điện thoại: 84 0292 3 734713 - 0292 3 831301; Fax: 84 0292 3830841; Email: office@cit.ctu.edu.vn.</p>
    </div>
  </footer>
  <!-- /Right-bar -->

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>

  <!-- Vendor js -->
  <script src="{{ asset('public\assets\js\vendor.min.js') }}"></script>

  <script src="{{ asset('public\assets\libs\jquery-knob\jquery.knob.min.js') }}"></script>
  <script src="{{ asset('public\assets\libs\peity\jquery.peity.min.js') }}"></script>

  <!-- Sparkline charts -->
  <script src="{{ asset('public\assets\libs\jquery-sparkline\jquery.sparkline.min.js') }}"></script>

  <!-- init js -->
  <script src="{{ asset('public\assets\js\pages\dashboard-1.init.js') }}"></script>

  <!-- App js -->
  <script src="{{ asset('public\assets\js\app.min.js') }}"></script>
  {{-- datatable hỗ trợ tìm kiếm --}}
  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#mytable').DataTable({
            language: {
              search: "Tìm kiếm",
              lengthMenu: "Số bản ghi trên 1 trang _MENU_ ",
              info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_ bản ghi",
              infoEmpty: "Khi không có dữ liệu, Hiển thị 0 bản ghi trong 0 tổng cộng 0 ",
              infoFiltered: "(_MAX_)",
              loadingRecords: "",
              zeroRecords: "Không tìm thấy bản ghi phù hợp",
              emptyTable: "Không có dữ liệu",
              paginate: {
                  first: "Trang đầu",
                  previous: "Trang trước",
                  next: "Trang sau",
                  last: "Trang cuối"
              },
            },
          });
          $('#mytable1').DataTable({
            language: {
              search: "Tìm kiếm",
              lengthMenu: "Số bản ghi trên 1 trang _MENU_ ",
              info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_ bản ghi",
              infoEmpty: "Khi không có dữ liệu, Hiển thị 0 bản ghi trong 0 tổng cộng 0 ",
              infoFiltered: "(_MAX_)",
              loadingRecords: "",
              zeroRecords: "Không tìm thấy bản ghi phù hợp",
              emptyTable: "Không có dữ liệu",
              paginate: {
                  first: "Trang đầu",
                  previous: "Trang trước",
                  next: "Trang sau",
                  last: "Trang cuối"
              },
            },
          });
          $('#mytable2').DataTable({
            language: {
              search: "Tìm kiếm",
              lengthMenu: "Số bản ghi trên 1 trang _MENU_ ",
              info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_ bản ghi",
              infoEmpty: "Khi không có dữ liệu, Hiển thị 0 bản ghi trong 0 tổng cộng 0 ",
              infoFiltered: "(_MAX_)",
              loadingRecords: "",
              zeroRecords: "Không tìm thấy bản ghi phù hợp",
              emptyTable: "Không có dữ liệu",
              paginate: {
                  first: "Trang đầu",
                  previous: "Trang trước",
                  next: "Trang sau",
                  last: "Trang cuối"
              },
            },
          });
      });
  </script>
  {{--  --}}
  {{-- js biểu đồ --}}
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"> 
  </script>
  {{--  --}}
  {{-- sweetalert 2 --}}
  <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js
"></script>
  {{--  --}}
  {{-- nút về đầu trang --}}
  <script>
    $(document).ready(function(){
      $(window).scroll(function(){
        if($(this).scrollTop()){
          $('.back_top').fadeIn();
        }else{
          $('.back_top').fadeOut();
        }
      });
      $('.back_top').click(function(){
        $('html, body').animate({
          scrollTop: 0
        }, 100);
      });
    });
  </script>
</body>

</html>