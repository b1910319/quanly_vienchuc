<div class="left-side-menu">

      <div class="slimscroll-menu">
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
                    <a href="javascript: void(0);" aria-expanded="false">Thông tin viên chức
                      <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-third-level nav" aria-expanded="false">
                      <li>
                        <a href="{{ URL::to('/thongtin_vienchuc_add') }}">Thêm thông tin</a>
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
            @if ($phanquyen_qlktkl || $phanquyen_admin)
              <li>
                <a href="javascript: void(0);" class="waves-effect">
                  <i class="fa-solid fa-award"></i>
                  <span> Quản Lý Khen Thưởng , <br>Kỉ Luật </span>
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
                    <a href="{{ URL::to('/danhmuclop') }}">Danh mục lớp học</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/lop') }}">Quản lý lớp học và quá trình học của viên chức</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/quyetdinh_all') }}">Tất cả quyết định cử đi học</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/ketqua_all') }}">Tất cả kết quả quá trình học của viên chức</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/dunghoc_all') }}">Tất cả thông tin tạm dừng học của viên chức</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/giahan_all') }}">Tất cả thông tin gia hạn thời gian học của viên chức</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/chuyen_all') }}">Tất cả thông tin xin chuyển trường / nước / ngành học của viên chức</a>
                  </li>
                  <li>
                    <a href="{{ URL::to('/thoihoc_all') }}">Tất cả thông tin xin thôi học của viên chức</a>
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
            {{-- <li>
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
            </li> --}}

            {{-- <li class="menu-title mt-2">Components</li> --}}

            {{-- <li>
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
            </li> --}}

            {{-- <li>
              <a href="widgets.html" class="waves-effect">
                <i class="remixicon-vip-crown-2-line"></i>
                <span> Widgets </span>
              </a>
            </li> --}}

            {{-- <li>
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
            </li> --}}

            {{-- <li>
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
            </li> --}}

            {{-- <li>
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
            </li> --}}

            {{-- <li>
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
            </li> --}}

            {{-- <li>
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
            </li> --}}

            {{-- <li>
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
            </li> --}}

            {{-- <li>
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
            </li> --}}
          </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

      </div>
      <!-- Sidebar -left -->

    </div>