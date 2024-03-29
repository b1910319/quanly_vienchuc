﻿<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>{{ $title }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
  <meta content="Coderthemes" name="author"> --}}
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
                <a href="{{ URL::to('quanly_khoa') }}" class="waves-effect">
                  <i class="fa-solid fa-building"></i>
                  <span> Quản Lý Đơn Vị Trực Thuộc </span>
                </a>
              </li>
              <li>
                <a href="{{ URL::to('quanly_vienchuc_khoa') }}" class="waves-effect">
                  <i class="fa-solid fa-user-shield"></i>
                  <span> Quản Lý Tài Khoản Viên Chức </span>
                </a>
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
                    <a href="javascript: void(0);" aria-expanded="false">Quản lý thành <br> phần
                      <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav" aria-expanded="false">
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
                        <a href="{{ URL::to('/danhmucnghi') }}">
                          Danh mục nghĩ
                        </a>
                      </li>
                      <li>
                        <a href="{{ URL::to('/thoigiannghihuu') }}">
                          Thời gian nghỉ hưu
                        </a>
                      </li>
                    </ul>
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
                    <a href="javascript: void(0);" aria-expanded="false">Quản lý thành <br> phần
                      <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav" aria-expanded="false">
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
                        <a href="{{ URL::to('/loaikyluat') }}">
                          Loại kỷ luật
                        </a>
                      </li>
                    </ul>
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
                  <span> Quản lý quá trình <br> công tác </span>
                  <span class="menu-arrow"></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                  <li>
                    <a href="javascript: void(0);" aria-expanded="false">Quản lý thành <br> phần
                      <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav" aria-expanded="false">
                      <li>
                        <a href="{{ URL::to('/danhmuclop') }}">Danh mục đào tạo</a>
                      </li>
                      <li>
                        <a href="{{ URL::to('/chauluc') }}">Châu lục</a>
                      </li>
                    </ul>
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
                    <a href="javascript: void(0);" aria-expanded="false">Quản lý viên chức <br> về nước
                      <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav" aria-expanded="false">
                      <li>
                        <a href="{{ URL::to('/check_venuoc') }}">Viên chức về nước</a>
                      </li>
                      <li>
                        <a href="{{ URL::to('/quahan') }}">Viên chức quá hạn chưa về nước</a>
                      </li>
                    </ul>
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
                    <a href="javascript: void(0);" aria-expanded="false">Quản lý thông tin viên chức
                      <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav" aria-expanded="false">
                      <li>
                        <a href="{{ URL::to('/thongtin_vienchuc_add_khoa') }}">Thông tin</a>
                      </li>
                      <li>
                        <a href="{{ URL::to('/thongtin_vienchuc_khoa') }}">Danh sách viên chức</a>
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
                    <a href="javascript: void(0);" aria-expanded="false">Quản lý khen thưởng, kỷ luật
                      <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav" aria-expanded="false">
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
                        <a href="{{ URL::to('/qlk_quanly_khenthuong_kyluat') }}">
                          Quản lý
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="{{ URL::to('/quatrinhchucvu') }}">
                      Qúa trình chức vụ
                    </a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/lylich') }}">
                      Lý lịch viên chức
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
        <div class="clearfix"></div>
      </div>
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
                        <img src="{{ asset('public/assets/images/welcome.png') }}" alt="" class="img-fluid" style="width: 8%">
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
  <!-- trình soạn thảo  -->
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
  <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('mota_q');
    CKEDITOR.replace('mota_k');
    CKEDITOR.replace('mota_tb');
  </script>
  {{-- ajax --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  {{--  --}}
    <!--  -->
</body>

</html>