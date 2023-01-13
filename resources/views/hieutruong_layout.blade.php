﻿<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Viên chức</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
  <meta content="Coderthemes" name="author">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('public\vienchuc\assets\images\favicon.ico') }}">

  <!-- App css -->
  <link href="{{ asset('public\vienchuc\assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public\vienchuc\assets\css\icons.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public\vienchuc\assets\css\app.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

  <!-- Begin page -->
  <div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
      <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="{{ asset('public\vienchuc\assets\images\users\avatar-1.jpg') }}" alt="user-image" class="rounded-circle">
            <span class="pro-user-name ml-1">
              Nik Patel <i class="mdi mdi-chevron-down"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="remixicon-account-circle-line"></i>
              <span>My Account</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="remixicon-settings-3-line"></i>
              <span>Settings</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="remixicon-wallet-line"></i>
              <span>My Wallet <span class="badge badge-success float-right">3</span> </span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="remixicon-lock-line"></i>
              <span>Lock Screen</span>
            </a>

            <div class="dropdown-divider"></div>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="remixicon-logout-box-line"></i>
              <span>Logout</span>
            </a>

          </div>
        </li>
      </ul>

      <!-- LOGO -->
      <div class="logo-box">
        <a href="index.html" class="logo text-center">
          <span class="logo-lg">
            <img src="{{ asset('public\vienchuc\assets\images\logo-light.png') }}" alt="" height="20">
          </span>
          <span class="logo-sm">
            <img src="{{ asset('public\vienchuc\assets\images\logo-sm.png') }}" alt="" height="24">
          </span>
        </a>
      </div>

      <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
          <button class="button-menu-mobile waves-effect waves-light">
            <i class="fe-menu"></i>
          </button>
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

            <li class="menu-title">Navigation</li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-dashboard-line"></i>
                <span class="badge badge-success badge-pill float-right">2</span>
                <span> Dashboards </span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="index.html">Dashboard 1</a>
                </li>
                <li>
                  <a href="dashboard-2.html">Dashboard 2</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-stack-line"></i>
                <span> Apps </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="apps-kanbanboard.html">Kanban Board</a>
                </li>
                <li>
                  <a href="apps-companies.html">Companies</a>
                </li>
                <li>
                  <a href="apps-calendar.html">Calendar</a>
                </li>
                <li>
                  <a href="apps-filemanager.html">File Manager</a>
                </li>
                <li>
                  <a href="apps-tickets.html">Tickets</a>
                </li>
                <li>
                  <a href="apps-team.html">Team Members</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-layout-line"></i>
                <span class="badge badge-pink float-right">New</span>
                <span> Layouts </span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="layouts-sidebar-sm.html">Small Sidebar</a>
                </li>
                <li>
                  <a href="layouts-dark-sidebar.html">Dark Sidebar</a>
                </li>
                <li>
                  <a href="layouts-light-topbar.html">Light Topbar</a>
                </li>
                <li>
                  <a href="layouts-preloader.html">Preloader</a>
                </li>
                <li>
                  <a href="layouts-sidebar-collapsed.html">Sidebar Collapsed</a>
                </li>
                <li>
                  <a href="layouts-boxed.html">Boxed</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-mail-open-line"></i>
                <span> Email </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="email-inbox.html">Inbox</a>
                </li>
                <li>
                  <a href="email-read.html">Read Email</a>
                </li>
                <li>
                  <a href="email-compose.html">Compose Email</a>
                </li>
                <li>
                  <a href="email-templates.html">Email Templates</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-file-copy-2-line"></i>
                <span> Pages </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="pages-starter.html">Starter</a>
                </li>
                <li>
                  <a href="pages-login.html">Log In</a>
                </li>
                <li>
                  <a href="pages-register.html">Register</a>
                </li>
                <li>
                  <a href="pages-recoverpw.html">Recover Password</a>
                </li>
                <li>
                  <a href="pages-lock-screen.html">Lock Screen</a>
                </li>
                <li>
                  <a href="pages-logout.html">Logout</a>
                </li>
                <li>
                  <a href="pages-confirm-mail.html">Confirm Mail</a>
                </li>
                <li>
                  <a href="pages-404.html">Error 404</a>
                </li>
                <li>
                  <a href="pages-404-alt.html">Error 404-alt</a>
                </li>
                <li>
                  <a href="pages-500.html">Error 500</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-pages-line"></i>
                <span> Extra Pages </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="extras-profile.html">Profile</a>
                </li>
                <li>
                  <a href="extras-timeline.html">Timeline</a>
                </li>
                <li>
                  <a href="extras-invoice.html">Invoice</a>
                </li>
                <li>
                  <a href="extras-faqs.html">FAQs</a>
                </li>
                <li>
                  <a href="extras-tour.html">Tour Page</a>
                </li>
                <li>
                  <a href="extras-pricing.html">Pricing</a>
                </li>
                <li>
                  <a href="extras-maintenance.html">Maintenance</a>
                </li>
                <li>
                  <a href="extras-coming-soon.html">Coming Soon</a>
                </li>
                <li>
                  <a href="extras-gallery.html">Gallery</a>
                </li>
              </ul>
            </li>

            <li class="menu-title mt-2">Components</li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-briefcase-5-line"></i>
                <span> UI Elements </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="ui-buttons.html">Buttons</a>
                </li>
                <li>
                  <a href="ui-cards.html">Cards</a>
                </li>
                <li>
                  <a href="ui-portlets.html">Portlets</a>
                </li>
                <li>
                  <a href="ui-tabs-accordions.html">Tabs & Accordions</a>
                </li>
                <li>
                  <a href="ui-modals.html">Modals</a>
                </li>
                <li>
                  <a href="ui-progress.html">Progress</a>
                </li>
                <li>
                  <a href="ui-notifications.html">Notifications</a>
                </li>
                <li>
                  <a href="ui-ribbons.html">Ribbons</a>
                </li>
                <li>
                  <a href="ui-spinners.html">Spinners</a>
                </li>
                <li>
                  <a href="ui-general.html">General UI</a>
                </li>
                <li>
                  <a href="ui-typography.html">Typography</a>
                </li>
                <li>
                  <a href="ui-grid.html">Grid</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="widgets.html" class="waves-effect">
                <i class="remixicon-vip-crown-2-line"></i>
                <span> Widgets </span>
              </a>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-trophy-line"></i>
                <span class="badge badge-primary float-right">Hot</span>
                <span> Admin UI </span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="admin-sweet-alert.html">Sweet Alert</a>
                </li>
                <li>
                  <a href="admin-nestable.html">Nestable List</a>
                </li>
                <li>
                  <a href="admin-treeview.html">Treeview</a>
                </li>
                <li>
                  <a href="admin-range-slider.html">Range Slider</a>
                </li>
                <li>
                  <a href="admin-carousel.html">Carousel</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-vip-diamond-line"></i>
                <span> Forms </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="forms-elements.html">General Elements</a>
                </li>
                <li>
                  <a href="forms-advanced.html">Advanced</a>
                </li>
                <li>
                  <a href="forms-validation.html">Validation</a>
                </li>
                <li>
                  <a href="forms-pickers.html">Pickers</a>
                </li>
                <li>
                  <a href="forms-wizard.html">Wizard</a>
                </li>
                <li>
                  <a href="forms-summernote.html">Summernote</a>
                </li>
                <li>
                  <a href="forms-quilljs.html">Quilljs Editor</a>
                </li>
                <li>
                  <a href="forms-file-uploads.html">File Uploads</a>
                </li>
                <li>
                  <a href="forms-x-editable.html">X Editable</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-table-line"></i>
                <span> Tables </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="tables-basic.html">Basic Tables</a>
                </li>
                <li>
                  <a href="tables-datatables.html">Data Tables</a>
                </li>
                <li>
                  <a href="tables-editable.html">Editable Tables</a>
                </li>
                <li>
                  <a href="tables-tablesaw.html">Tablesaw Tables</a>
                </li>
                <li>
                  <a href="tables-responsive.html">Responsive Tables</a>
                </li>
                <li>
                  <a href="tables-footables.html">FooTables</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-bar-chart-line"></i>
                <span> Charts </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="charts-flot.html">Flot Charts</a>
                </li>
                <li>
                  <a href="charts-apex.html">Apex Charts</a>
                </li>
                <li>
                  <a href="charts-morris.html">Morris Charts</a>
                </li>
                <li>
                  <a href="charts-chartjs.html">Chartjs Charts</a>
                </li>
                <li>
                  <a href="charts-c3.html">C3 Charts</a>
                </li>
                <li>
                  <a href="charts-peity.html">Peity Charts</a>
                </li>
                <li>
                  <a href="charts-chartist.html">Chartist Charts</a>
                </li>
                <li>
                  <a href="charts-sparklines.html">Sparklines Charts</a>
                </li>
                <li>
                  <a href="charts-knob.html">Jquery Knob Charts</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-honour-line"></i>
                <span> Icons </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="icons-remix.html">Remix Icons</a>
                </li>
                <li>
                  <a href="icons-feather.html">Feather Icons</a>
                </li>
                <li>
                  <a href="icons-mdi.html">Material Design Icons</a>
                </li>
                <li>
                  <a href="icons-font-awesome.html">Font Awesome</a>
                </li>
                <li>
                  <a href="icons-themify.html">Themify</a>
                </li>
                <li>
                  <a href="icons-weather.html">Weather</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-map-pin-line"></i>
                <span> Maps </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="maps-google.html">Google Maps</a>
                </li>
                <li>
                  <a href="maps-vector.html">Vector Maps</a>
                </li>
                <li>
                  <a href="maps-mapael.html">Mapael Maps</a>
                </li>
              </ul>
            </li>

            <li>
              <a href="javascript: void(0);" class="waves-effect">
                <i class="remixicon-folder-add-line"></i>
                <span> Multi Level </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level nav" aria-expanded="false">
                <li>
                  <a href="javascript: void(0);">Level 1.1</a>
                </li>
                <li>
                  <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                    <span class="menu-arrow"></span>
                  </a>
                  <ul class="nav-third-level nav" aria-expanded="false">
                    <li>
                      <a href="javascript: void(0);">Level 2.1</a>
                    </li>
                    <li>
                      <a href="javascript: void(0);">Level 2.2</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

      </div>
      <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
                </div>
                <h4 class="page-title">Welcome !</h4>
              </div>
            </div>
          </div>
          <!-- end page title -->

          @yield('hieutruong_content')

        </div> <!-- container -->

      </div> <!-- content -->

      <!-- Footer Start -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              2016 - 2019 &copy; Minton theme by <a href="">Coderthemes</a>
            </div>
            <div class="col-md-6">
              <div class="text-md-right footer-links d-none d-sm-block">
                <a href="javascript:void(0);">About Us</a>
                <a href="javascript:void(0);">Help</a>
                <a href="javascript:void(0);">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- end Footer -->

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
  <!-- /Right-bar -->

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>

  <!-- Vendor js -->
  <script src="{{ asset('public\vienchuc\assets\js\vendor.min.js') }}"></script>

  <script src="{{ asset('public\vienchuc\assets\libs\jquery-knob\jquery.knob.min.js') }}"></script>
  <script src="{{ asset('public\vienchuc\assets\libs\peity\jquery.peity.min.js') }}"></script>

  <!-- Sparkline charts -->
  <script src="{{ asset('public\vienchuc\assets\libs\jquery-sparkline\jquery.sparkline.min.js') }}"></script>

  <!-- init js -->
  <script src="{{ asset('public\vienchuc\assets\js\pages\dashboard-1.init.js') }}"></script>

  <!-- App js -->
  <script src="{{ asset('public\vienchuc\assets\js\app.min.js') }}"></script>

</body>

</html>