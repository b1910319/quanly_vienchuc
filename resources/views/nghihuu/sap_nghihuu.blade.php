@extends('layout')
@section('content')
<?php use Illuminate\Support\Carbon; ?>
<div class="row">
  <div class="card-box">
    <div class="mt-3"></div>
    <div class="alert alert-light mt-2 color_alert row" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('nghihuu') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________THÔNG TIN VIÊN CHỨC NGHĨ HƯU GẦN ĐÂY________
      </h4>
    </div>
    <form action="{{ URL::to('search_nghihuu') }}" method="post">
      {{ csrf_field() }}
      <div class="row mb-2">
        <div class="col-2">
          <input type='date' class='form-control input_table' autofocus required name="batdau_nghihuu">
        </div>
        <div class="col-2">
          <input type='date' class='form-control input_table' autofocus required name="ketthuc_nghihuu">
        </div>
        <div class="col-2">
          <button type="submit" class="btn btn-success button_xanhla">
            <i class="fa-solid fa-magnifying-glass text-light"></i>
            Tìm
          </button>
        </div>
      </div>
    </form>
    @if (isset($batdau_nghihuu) && isset($ketthuc_nghihuu))
      <p class="fw-bold">
        Viên chức nghĩ hưu trong khoảng từ: 
        <span class="badge rounded-pill text-bg-warning">
          <?php 
                  
            Carbon::now('Asia/Ho_Chi_Minh');
            $batdau_nghihuu = Carbon::parse(Carbon::create($batdau_nghihuu))->format('d-m-Y');
            echo $batdau_nghihuu;
          ?>
        </span>
        đến
        <span class="badge rounded-pill text-bg-info">
          <?php 
                  
            Carbon::now('Asia/Ho_Chi_Minh');
            $ketthuc_nghihuu = Carbon::parse(Carbon::create($ketthuc_nghihuu))->format('d-m-Y');
            echo $ketthuc_nghihuu;
          ?>
        </span>
      </p>
    @endif
    <table class="table" id="mytable">
      <thead class="color_table">
        <tr>
          <th class="text-light" scope="col">Thông tin viên chức</th>
          <th class="text-light" scope="col">Khoa</th>
          <th class="text-light" scope="col">Ngày sinh</th>
          <th class="text-light" scope="col">Ngày nghĩ hưu</th>
          <th class="text-light" scope="col">Trạng thái</th>
          <th class="text-light" scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list_vienchuc_nu_ganhuu as $key => $vienchuc)
          <tr >
            <td>
              <b>- Họ tên viên chức: </b>{{ $vienchuc->hoten_vc }}   <br>
              <b>- Email: </b>{{ $vienchuc->user_vc }}
            </td>
            <td>
              {{ $vienchuc->ten_k }}  
            </td>
            <td>
              <?php 
                Carbon::now('Asia/Ho_Chi_Minh');
                $ngaysinh_vc = Carbon::parse(Carbon::create($vienchuc->ngaysinh_vc))->format('d-m-Y');
                echo $ngaysinh_vc;
              ?>
            </td>
            <td>
              <?php 
                echo Carbon::parse(Carbon::create($vienchuc->ngaysinh_vc)->addMonths($thoigiannghihuu->nu_tgnh))->format('d-m-Y');
              ?>
            </td>
            <td>
              <?php
                if($vienchuc->status_vc == 0){
                  ?>
                    <span class="badge badge-light-success">
                      <i class="fa-solid fa-unlock-keyhole"></i>&ensp;  Kích hoạt
                    </span>
                  <?php
                }else if($vienchuc->status_vc == 1) {
                  ?>
                    <span class="badge badge-light-danger">
                      <i class="fa-solid fa-lock"></i>
                      &ensp; Vô hiệu hoá</span>
                  <?php
                }elseif ($vienchuc->status_vc == 2) {
                  ?>
                    <span class="badge badge-light-warning">
                      <i class="fa-solid fa-toggle-off"></i>
                      &ensp; Nghĩ hưu</span>
                  <?php
                }
              ?>
            </td>
            <td style="width: 25%">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary fw-bold btn_chitiet" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+100 }}">
                <i class="fa-solid fa-circle-info text-light"></i>
                &ensp;
                Chi tiết
              </button>
              <a href="{{ URL::to('quatrinhnghi/'.$vienchuc->ma_vc) }}">
                <button type="submit" class="btn btn-warning button_cam">
                  <i class="fa-solid fa-pen-to-square text-light"></i>
                  &ensp; Cập nhật nghỉ hưu
                </button>
              </a>

              <!-- Modal -->
              <div class="modal fade " id="exampleModal{{ $key+100 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaysinh_vc = Carbon::parse(Carbon::create($vienchuc->ngaysinh_vc))->format('d-m-Y');
                                echo $ngaysinh_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaytuyendung_vc = Carbon::parse(Carbon::create($vienchuc->ngaytuyendung_vc))->format('d-m-Y');
                                echo $ngaytuyendung_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngayvaodang_vc = Carbon::parse(Carbon::create($vienchuc->ngayvaodang_vc))->format('d-m-Y');
                                echo $ngayvaodang_vc;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày chính thức</th>
                            <td>
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaychinhthuc_vc = Carbon::parse(Carbon::create($vienchuc->ngaychinhthuc_vc))->format('d-m-Y');
                                echo $ngaychinhthuc_vc;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày nhập ngũ</th>
                            <td>
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaynhapngu_vc = Carbon::parse(Carbon::create($vienchuc->ngaynhapngu_vc))->format('d-m-Y');
                                echo $ngaynhapngu_vc;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày xuất ngũ</th>
                            <td>
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngayxuatngu_vc = Carbon::parse(Carbon::create($vienchuc->ngayxuatngu_vc))->format('d-m-Y');
                                echo $ngayxuatngu_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngayhuongbac_vc = Carbon::parse(Carbon::create($vienchuc->ngayhuongbac_vc))->format('d-m-Y');
                                echo $ngayhuongbac_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaycapcccd_vc = Carbon::parse(Carbon::create($vienchuc->ngaycapcccd_vc))->format('d-m-Y');
                                echo $ngaycapcccd_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaybatdaulamviec_vc = Carbon::parse(Carbon::create($vienchuc->ngaybatdaulamviec_vc))->format('d-m-Y');
                                echo $ngaybatdaulamviec_vc;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Thời gian nghỉ</th>
                            <td>
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $thoigiannghi_vc = Carbon::parse(Carbon::create($vienchuc->thoigiannghi_vc))->format('d-m-Y');
                                echo $thoigiannghi_vc;
                              ?>
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
                      <a href="{{ URL::to('/thongtin_vienchuc_edit/'.$vienchuc->ma_vc) }}">
                        <button type="submit" class="btn btn-warning button_cam" style="width: 100%;">
                          <i class="fa-solid fa-pen-to-square text-light"></i>
                          &ensp; Cập nhật
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
        @foreach ($list_vienchuc_nam_ganhuu as $key => $vienchuc)
          <tr >
            <td>
              <b>- Họ tên viên chức: </b>{{ $vienchuc->hoten_vc }}   <br>
              <b>- Email: </b>{{ $vienchuc->user_vc }}
            </td>
            <td>
              {{ $vienchuc->ten_k }}  
            </td>
            <td>
              <?php 
                Carbon::now('Asia/Ho_Chi_Minh');
                $ngaysinh_vc = Carbon::parse(Carbon::create($vienchuc->ngaysinh_vc))->format('d-m-Y');
                echo $ngaysinh_vc;
              ?>
            </td>
            <td>
              <?php 
                echo Carbon::parse(Carbon::create($vienchuc->ngaysinh_vc)->addMonths($thoigiannghihuu->nam_tgnh))->format('d-m-Y');
              ?>
            </td>
            <td>
              <?php
                if($vienchuc->status_vc == 0){
                  ?>
                    <span class="badge badge-light-success">
                      <i class="fa-solid fa-unlock-keyhole"></i>&ensp;  Kích hoạt
                    </span>
                  <?php
                }else if($vienchuc->status_vc == 1) {
                  ?>
                    <span class="badge badge-light-danger">
                      <i class="fa-solid fa-lock"></i>
                      &ensp; Vô hiệu hoá</span>
                  <?php
                }elseif ($vienchuc->status_vc == 2) {
                  ?>
                    <span class="badge badge-light-warning">
                      <i class="fa-solid fa-toggle-off"></i>
                      &ensp; Nghĩ hưu</span>
                  <?php
                }
              ?>
            </td>
            <td style="width: 25%">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary fw-bold btn_chitiet" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+200 }}">
                <i class="fa-solid fa-circle-info text-light"></i>
                &ensp;
                Chi tiết
              </button>
              <a href="{{ URL::to('quatrinhnghi/'.$vienchuc->ma_vc) }}">
                <button type="submit" class="btn btn-warning button_cam">
                  <i class="fa-solid fa-pen-to-square text-light"></i>
                  &ensp; Cập nhật nghỉ hưu
                </button>
              </a>

              <!-- Modal -->
              <div class="modal fade " id="exampleModal{{ $key+200 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaysinh_vc = Carbon::parse(Carbon::create($vienchuc->ngaysinh_vc))->format('d-m-Y');
                                echo $ngaysinh_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaytuyendung_vc = Carbon::parse(Carbon::create($vienchuc->ngaytuyendung_vc))->format('d-m-Y');
                                echo $ngaytuyendung_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngayvaodang_vc = Carbon::parse(Carbon::create($vienchuc->ngayvaodang_vc))->format('d-m-Y');
                                echo $ngayvaodang_vc;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày chính thức</th>
                            <td>
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaychinhthuc_vc = Carbon::parse(Carbon::create($vienchuc->ngaychinhthuc_vc))->format('d-m-Y');
                                echo $ngaychinhthuc_vc;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày nhập ngũ</th>
                            <td>
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaynhapngu_vc = Carbon::parse(Carbon::create($vienchuc->ngaynhapngu_vc))->format('d-m-Y');
                                echo $ngaynhapngu_vc;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày xuất ngũ</th>
                            <td>
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngayxuatngu_vc = Carbon::parse(Carbon::create($vienchuc->ngayxuatngu_vc))->format('d-m-Y');
                                echo $ngayxuatngu_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngayhuongbac_vc = Carbon::parse(Carbon::create($vienchuc->ngayhuongbac_vc))->format('d-m-Y');
                                echo $ngayhuongbac_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaycapcccd_vc = Carbon::parse(Carbon::create($vienchuc->ngaycapcccd_vc))->format('d-m-Y');
                                echo $ngaycapcccd_vc;
                              ?>
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
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $ngaybatdaulamviec_vc = Carbon::parse(Carbon::create($vienchuc->ngaybatdaulamviec_vc))->format('d-m-Y');
                                echo $ngaybatdaulamviec_vc;
                              ?>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Thời gian nghỉ</th>
                            <td>
                              <?php 
                                Carbon::now('Asia/Ho_Chi_Minh');
                                $thoigiannghi_vc = Carbon::parse(Carbon::create($vienchuc->thoigiannghi_vc))->format('d-m-Y');
                                echo $thoigiannghi_vc;
                              ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                        <i class="fa-solid fa-square-xmark text-light"></i>
                        &ensp; Đóng
                      </button>
                      <a href="{{ URL::to('/thongtin_vienchuc_edit/'.$vienchuc->ma_vc) }}">
                        <button type="submit" class="btn btn-warning button_cam" style="width: 100%;">
                          <i class="fa-solid fa-pen-to-square text-light"></i>
                          &ensp; Cập nhật
                        </button>
                      </a>
                      
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
</div>
@endsection
