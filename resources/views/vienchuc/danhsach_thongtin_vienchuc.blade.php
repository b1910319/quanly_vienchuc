@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-2">
    <div class="row">
      <div class="mb-2">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="width: 100%; background-color: #850000; border: none;">Thống kê</button>
  
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Thống kê</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Tên</th>
                  <th scope="col">Số lượng</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($count_status as $key => $count_stt)
                  @if ($count_stt->status_vc == 0)
                    <tr>
                      <td>Danh mục hiển thị</td>
                      <td>{{ $count_stt->sum }}</td>
                    </tr>
                  @else
                    <tr>
                      <td>Danh mục ẩn</td>
                      <td>{{ $count_stt->sum }}</td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <a href="{{ URL::to('danhsach_thongtin_vienchuc') }}">
        <button type="button" class="btn btn-warning" style="width: 100%; background-color: #850000; border: none">
          <i class="fa-solid fa-rotate-right"></i>
        </button>
      </a>
      <div class="dropdown mt-2" >
        <button class="dropbtn" style="background-color: #850000">Khoa</button>
        <div class="dropdown-content">
          @foreach ($list_khoa_show as  $khoa)
            <a href="{{ URL::to('/search_danhsach_thongtin_vienchuc_khoa/'.$khoa->ma_k) }}">{{ $khoa->ten_k }}</a>
          @endforeach
          <a href="{{ URL::to('danhsach_thongtin_vienchuc') }}">Tất cả</a>
        </div>
      </div>
      <div class="dropdown mt-2" >
        <button class="dropbtn" style="background-color: #850000">Dân tộc</button>
        <div class="dropdown-content">
          @foreach ($list_dantoc as  $dantoc)
            <a href="{{ URL::to('/search_danhsach_thongtin_vienchuc_dantoc/'.$dantoc->ma_dt) }}">{{ $dantoc->ten_dt }}</a>
          @endforeach
          <a href="{{ URL::to('danhsach_thongtin_vienchuc') }}">Tất cả</a>
        </div>
      </div>
      <div class="dropdown mt-2" >
        <button class="dropbtn" style="background-color: #850000">Tôn giáo</button>
        <div class="dropdown-content">
          @foreach ($list_tongiao as  $tongiao)
            <a href="{{ URL::to('/search_danhsach_thongtin_vienchuc_tongiao/'.$tongiao->ma_tg) }}">{{ $tongiao->ten_tg }}</a>
          @endforeach
          <a href="{{ URL::to('danhsach_thongtin_vienchuc') }}">Tất cả</a>
        </div>
      </div>
      <div class="dropdown mt-2" >
        <button class="dropbtn" style="background-color: #850000">Giới tính</button>
        <div class="dropdown-content">
          <a href="{{ URL::to('/search_danhsach_thongtin_vienchuc_gioitinh/0') }}">
            Nam
          </a>
          <a href="{{ URL::to('/search_danhsach_thongtin_vienchuc_gioitinh/1') }}">
            Nữ
          </a>
        </div>
      </div>
      <div class="dropdown mt-2" >
        <button class="dropbtn" style="background-color: #850000">Thương binh</button>
        <div class="dropdown-content">
          @foreach ($list_thuongbinh as  $thuongbinh)
            <a href="{{ URL::to('/search_danhsach_thongtin_vienchuc_thuongbinh/'.$thuongbinh->ma_tb) }}">{{ $thuongbinh->ten_tb }}</a>
          @endforeach
        </div>
      </div>
      <div class="dropdown mt-2" >
        <button class="dropbtn" style="background-color: #850000">Hệ đào tạo</button>
        <div class="dropdown-content">
          @foreach ($list_hedaotao as  $hedaotao)
            <a href="{{ URL::to('/search_danhsach_thongtin_vienchuc_hedaotao/'.$hedaotao->ma_hdt) }}">{{ $hedaotao->ten_hdt }}</a>
          @endforeach
        </div>
      </div>
      <div class="dropdown mt-2" >
        <button class="dropbtn" style="background-color: #850000">Loại bằng cấp</button>
        <div class="dropdown-content">
          @foreach ($list_loiabangcap as  $loiabangcap)
            <a href="{{ URL::to('/search_danhsach_thongtin_vienchuc_loiabangcap/'.$loiabangcap->ma_lbc) }}">{{ $loiabangcap->ten_lbc }}</a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="card-box col-10">
    <div class="mt-3"></div>
    <div class="alert alert-success" role="alert">
      <div class="row">
        <h4 class="text-center" style="font-weight: bold">
          DANH SÁCH
          <sub style="color: #379237; font-size: 18px">( {{ $ten }} )</sub>

        </h4>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1" style="background-color: #00425A; border: none; width: 100%">Lọc theo quê quán</button>
        <div id="demo1" class="collapse mt-3">
          <form action="{{ URL::to('search_danhsach_thongtin_vienchuc_quequan') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-8">
                <select class="custom-select input_table" id="gender2" name="ma_t">
                  <option value="0" >Quê quán</option>
                  @foreach ($list_tinh as $tinh)
                    <option value="{{ $tinh->ma_t }}" >{{ $tinh->ten_t }}</option>
                  @endforeach
                  <a href="{{ URL::to('danhsach_thongtin_vienchuc') }}">Tất cả</a>
                </select>
                
              </div>
              <div class="col-4">
                <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="width: 100%">
                  <i class="fa-solid fa-magnifying-glass-plus"></i>
                  Tìm
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-3">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="background-color: #00425A; border: none; width: 100%" >Lọc theo ngày sinh của viên chức</button>
        <div id="demo" class="collapse mt-3">
          <form action="{{ URL::to('search_danhsach_thongtin_vienchuc_ngaysinh') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-6">
                <input type='date' class='form-control input_table' autofocus required name="batdau">
              </div>
              <div class="col-6">
                <input type='date' class='form-control input_table' autofocus required name="ketthuc">
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-8"></div>
              <div class="col-4">
                <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="width: 100%">
                  <i class="fa-solid fa-magnifying-glass-plus"></i>
                  Tìm
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-3">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2" style="background-color: #00425A; border: none; width: 100%" >Lọc theo ngạch</button>
        <div id="demo2" class="collapse mt-3 mb-3">
          <form action="{{ URL::to('search_danhsach_thongtin_vienchuc_ngach') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-6">
                <select class="custom-select input_table choose ngach" name="ma_n" id="ngach">
                  <option value="0" >Chọn ngạch</option>
                  @foreach ($list_ngach as $ngach)
                    <option value="{{ $ngach->ma_n }}" >{{ $ngach->ten_n }}</option>
                  @endforeach
                </select>
                
              </div>
              <div class="col-6">
                <select class="custom-select input_table choose bac" name="ma_b" id="bac"></select>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-8"></div>
              <div class="col-4">
                <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="width: 100%">
                  <i class="fa-solid fa-magnifying-glass-plus"></i>
                  Tìm
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-3 mb-2">
        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3" style="background-color: #00425A; border: none; width: 100%" >Lọc theo ngày viên chức bắt đầu làm việc</button>
        <div id="demo3" class="collapse mt-3">
          <form action="{{ URL::to('search_danhsach_thongtin_vienchuc_ngaybatdaulamviec') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-6">
                <input type='date' class='form-control input_table' autofocus required name="batdau">
              </div>
              <div class="col-6">
                <input type='date' class='form-control input_table' autofocus required name="ketthuc">
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-8"></div>
              <div class="col-4">
                <button type="submit"  class="btn btn-outline-primary font-weight-bold" style="width: 100%">
                  <i class="fa-solid fa-magnifying-glass-plus"></i>
                  Tìm
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <table class="table mt-2" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên viên chức</th>
          <th scope="col">Thông tin viên chức</th>
          <th scope="col">Thông tin cơ bản</th>
          <th scope="col">Quản lý</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list_vienchuc as $key => $vienchuc)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $vienchuc->hoten_vc }}
              <br>
              {{ $vienchuc->user_vc }}
            </td>
            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+1 }}" style="background-color: #379237; border: none;">
                Xem thông tin
              </button>

              <!-- Modal -->
              <div class="modal fade " id="exampleModal{{ $key+1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin viên chức</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <table class="table">
                        <tbody>
                          <tr>
                            <th scope="row" style="width: 40%">Họ tên viên chức:</th>
                            <td>
                              {{ $vienchuc->hoten_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Số điện thoại:</th>
                            <td>
                              {{ $vienchuc->sdt_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Khoa:</th>
                            <td>
                              @foreach ($list_khoa as $khoa)
                                @if ($khoa->ma_k == $vienchuc->ma_k)
                                  {{ $khoa->ten_k }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Chức vụ:</th>
                            <td>
                              @foreach ($list_chucvu as $chucvu)
                                @if ($chucvu->ma_cv == $vienchuc->ma_cv)
                                  {{ $chucvu->ten_cv }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngạch:</th>
                            <td>
                              @foreach ($list_ngach as $ngach)
                                @if ($ngach->ma_n == $vienchuc->ma_n)
                                  {{ $ngach->ten_n }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Bậc:</th>
                            <td>
                              @foreach ($list_bac as $bac)
                                @if ($bac->ma_b == $vienchuc->ma_b)
                                  {{ $bac->ten_b }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Dân tộc:</th>
                            <td>
                              @foreach ($list_dantoc as $dantoc)
                                @if ($dantoc->ma_dt == $vienchuc->ma_dt)
                                  {{ $dantoc->ten_dt }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Tôn giáo</th>
                            <td>
                              @foreach ($list_tongiao as $tongiao)
                                @if ($tongiao->ma_tg == $vienchuc->ma_tg)
                                  {{ $tongiao->ten_tg }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Thương binh</th>
                            <td>
                              @foreach ($list_thuongbinh as $thuongbinh)
                                @if ($thuongbinh->ma_tb == $vienchuc->ma_tb)
                                  {{ $thuongbinh->ten_tb }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Hình</th>
                            <td>
                              @if ($vienchuc->hinh_vc != ' ')
                                <img src="{{ asset('public/uploads/vienchuc/'.$vienchuc->hinh_vc) }}" style="width: 20%">
                              @else
                                Hình ảnh chưa được cập nhật &ensp; <i class="fa-solid fa-xmark" style="color: red"></i>
                              @endif
                              
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Tên gọi khác</th>
                            <td>
                              {{ $vienchuc->tenkhac_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày sinh</th>
                            <td>
                              {{ $vienchuc->ngaysinh_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Giới tính</th>
                            <td>
                              @if ($vienchuc->gioitinh_vc == 0)
                                Nam
                              @else
                                Nữ
                              @endif
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Địa chỉ thường trú</th>
                            <td>
                              {{ $vienchuc->thuongtru_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Địa chỉ hiện tại</th>
                            <td>
                              {{ $vienchuc->hientai_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Nghề khi được tuyển</th>
                            <td>
                              {{ $vienchuc->nghekhiduoctuyen_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày tuyển dụng</th>
                            <td>
                              {{ $vienchuc->ngaytuyendung_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Công việc chính được giao</th>
                            <td>
                              {{ $vienchuc->congviecchinhgiao_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Phụ cấp</th>
                            <td>
                              {{ $vienchuc->phucap_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Trình độ phổ thông</th>
                            <td>
                              {{ $vienchuc->trinhdophothong_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Lý luận chính trị</th>
                            <td>
                              {{ $vienchuc->chinhtri_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Quản lý nhà nước</th>
                            <td>
                              {{ $vienchuc->quanlynhanuoc_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngoại ngữ</th>
                            <td>
                              {{ $vienchuc->ngoaingu_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Tin học</th>
                            <td>
                              {{ $vienchuc->tinhoc_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày vào Đảng Cộng sản Việt Nam</th>
                            <td>
                              {{ $vienchuc->ngayvaodang_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày chính thức</th>
                            <td>
                              {{ $vienchuc->ngaychinhthuc_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày nhập ngũ</th>
                            <td>
                              {{ $vienchuc->ngaynhapngu_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày xuất ngũ</th>
                            <td>
                              {{ $vienchuc->ngayxuatngu_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Quân hàm cao nhất</th>
                            <td>
                              {{ $vienchuc->quanham_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày hưởng bật</th>
                            <td>
                              {{ $vienchuc->ngayhuongbac_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Danh hiệu được phong tặng cao nhất </th>
                            <td>
                              {{ $vienchuc->danhhieucao_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Sở trường công tác</th>
                            <td>
                              {{ $vienchuc->sotruong_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Chiều cao</th>
                            <td>
                              {{ $vienchuc->chieucao_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Cân nặng</th>
                            <td>
                              {{ $vienchuc->cannang_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Nhóm máu</th>
                            <td>
                              {{ $vienchuc->nhommau_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Là con gia đình chính sách</th>
                            <td>
                              {{ $vienchuc->chinhsach_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Số CCCD</th>
                            <td>
                              {{ $vienchuc->cccd_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày cấp CCCD</th>
                            <td>
                              {{ $vienchuc->ngaycapcccd_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Số BHXH</th>
                            <td>
                              {{ $vienchuc->bhxh_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Lịch sử bản thân</th>
                            <td>
                              {{ $vienchuc->lichsubanthan1_vc }}
                              <br>
                              {{ $vienchuc->lichsubanthan2_vc }}
                              <br>
                              {{ $vienchuc->lichsubanthan3_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày bắt đầu làm việc</th>
                            <td>
                              {{ $vienchuc->ngaybatdaulamviec_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Thời gian nghĩ</th>
                            <td>
                              {{ $vienchuc->thoigiannghi_vc }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                      <a href="{{ URL::to('/thongtin_vienchuc_edit/'.$vienchuc->ma_vc) }}">
                        <button type="button" class="btn btn-primary">Cập nhật thông tin</button>
                      </a>
                      
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <b>Số CCCD: </b> {{ $vienchuc->cccd_vc }}
            </td>
            <td>
              <?php
                foreach ($count_bangcap as $key => $count) {
                  if($count->ma_vc == $vienchuc->ma_vc && $count->sum > 0){
                    ?>
                      <a href="{{ URL::to('/bangcap/'.$vienchuc->ma_vc) }}">
                        <button type="button" class="btn btn-primary" style="background-color: #00425A; border: none;">Bằng cấp (<?php echo $count->sum ?>)</button>
                      </a>
                    <?php
                  }elseif ($count->ma_vc == $vienchuc->ma_vc && $count->sum == 0) {
                    ?>
                      <a href="{{ URL::to('/bangcap/'.$vienchuc->ma_vc) }}">
                        <button type="button" class="btn btn-primary" style="background-color: #00425A; border: none;">Bằng cấp (0)</button>
                      </a>
                    <?php
                  }
                }
              ?>
            </td>
            <td style="width: 25%;">
              <a href="{{ URL::to('/thongtin_vienchuc_edit/'.$vienchuc->ma_vc)}}">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> &ensp; Cập nhật</button>
              </a>
              <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/admin_delete_vienchuc/'.$vienchuc->ma_vc)}}">
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              </a>
              <?php
                if($vienchuc->status_vc == 0){
                  ?>
                    <a href="{{ URL::to('/admin_select_vienchuc/'.$vienchuc->ma_vc) }}">
                      <button type="button" class="btn btn-secondary">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Ẩn
                      </button>
                    </a>
                  <?php
                }else if($vienchuc->status_vc == 1) {
                  ?>
                    <a href="{{ URL::to('/admin_select_vienchuc/'.$vienchuc->ma_vc) }}">
                      <button type="button" class="btn btn-success">
                        <i class="fa-solid fa-eye"></i>
                        &ensp; Hiển thị
                      </button>
                    </a>
                  <?php
                }elseif ($vienchuc->status_vc == 2) {
                  ?>
                    <button type="button" class="btn btn-success" style="background-color: #850000; border: none;">
                      Nghĩ hưu
                    </button>
                  <?php
                }
              ?>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#ngach').change(function(){
      var id= $(this).val();
      $.ajax({
        url:"{{ url("/change_ngach") }}",
        type:"GET",
        data:{id:id},
        success:function(data){
            $('#bac').html(data);
        }
      });
    });
  });
</script>
@endsection
