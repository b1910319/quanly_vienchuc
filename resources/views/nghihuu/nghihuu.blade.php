@extends('layout')
@section('content')
<?php use Illuminate\Support\Carbon; ?>
<div class="row">
  <div class="card-box">
    <div class="mt-3"></div>
    <div class="alert alert-light color_alert" role="alert">
      ________THÔNG TIN VIÊN CHỨC ĐÃ NGHỈ HƯU________
    </div>
    <div class="row mb-2">
      <div class="col-3">
        <a href="{{ URL::to('sap_nghihuu') }}">
          <button type="button" class="btn btn-primary fw-bold">
            <i class="fa-solid fa-list text-light"></i>
            &ensp;
            Danh sách viên chức sắp nghỉ hưu
          </button>
        </a>
      </div>
    </div>
    <table class="table" id="mytable1">
      <thead class="color_table">
        <tr>
          <th class="text-light" scope="col">#</th>
          <th class="text-light" scope="col">Thông tin viên chức</th>
          <th class="text-light" scope="col">Thông tin nghỉ hưu</th>
          <th class="text-light" scope="col">Thông tin quyết định</th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list_nghihuu as $key => $vienchuc)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              <b>- Họ tên viên chức: </b>{{ $vienchuc->hoten_vc }}<br>
              <b>- Email: </b> {{ $vienchuc->user_vc }} <br>
              <b>- Ngày sinh: </b>
              <?php 
                Carbon::now('Asia/Ho_Chi_Minh');
                $ngaysinh_vc = Carbon::parse(Carbon::create($vienchuc->ngaysinh_vc))->format('d-m-Y');
                echo $ngaysinh_vc;
              ?>
              <br>
              <b>- Khoa: </b>{{ $vienchuc->ten_k }}   <br>
              <button type="button" class="btn btn-primary fw-bold btn_chitiet" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+1 }}" >
                <i class="fa-solid fa-circle-info text-light"></i>
                &ensp;
                Chi tiết
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
                        <button type="button" class="btn btn-warning button_cam" style="width: 100%;">
                          <i class="fa-solid fa-pen-to-square text-light"></i>
                          &ensp; Cập nhật
                        </button>
                      </a>
                      
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <b>- Ngày nghỉ hưu: </b>
              @if ($vienchuc->gioitinh == 0)
                <?php 
                  echo Carbon::parse(Carbon::create($vienchuc->ngaysinh_vc)->addMonths($thoigiannghihuu->nam_tgnh))->format('d-m-Y');
                ?>
              @else
                <?php 
                  echo Carbon::parse(Carbon::create($vienchuc->ngaysinh_vc)->addMonths($thoigiannghihuu->nu_tgnh))->format('d-m-Y');
                ?>
              @endif
              <br>
              @if ($vienchuc->file_qtn)
                <a href="{{ asset('public/uploads/quatrinhnghi/'.$vienchuc->file_qtn) }}" style="color: #000D6B; font-weight: bold">
                  <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                  File 
                </a>
              @else
                <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
              @endif
            </td>
            <td>
              <b>- Số quyết định: </b>{{ $vienchuc->soquyetdinh_qtn }} <br>
              <b>- Ngày ký quyết định: </b>
              <?php 
                Carbon::now('Asia/Ho_Chi_Minh');
                $ngaykyquyetdinh_qtn = Carbon::parse(Carbon::create($vienchuc->ngaykyquyetdinh_qtn))->format('d-m-Y');
                echo $ngaykyquyetdinh_qtn;
              ?>
              <br>
              @if ($vienchuc->filequyetdinh_qtn)
                <a href="{{ asset('public/uploads/quatrinhnghi/'.$vienchuc->filequyetdinh_qtn) }}" style="color: #000D6B; font-weight: bold">
                  <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                  File quyết định
                </a>
              @else
                <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="col-2">
        <a href="{{ URL::to('/nghihuu_pdf') }}">
          <button type="button" class="btn btn-warning button_do" style=" width: 100%;">
            <i class="fa-solid fa-file-pdf text-light"></i>
            &ensp;
            Xuất file PDF
          </button>
        </a>
      </div>
      <div class="col-2">
        <a href="{{ URL::to('/nghihuu_excel') }}">
          <button type="button" class="btn btn-warning button_xanhla" style=" width: 100%;">
            <i class="fa-solid fa-file-excel text-light"></i>
            &ensp;
            Xuất file Excel
          </button>
        </a>
      </div>
    </div>
    <div class="alert alert-light mt-2 color_alert" role="alert">
      ________THÔNG TIN VIÊN CHỨC NGHỈ HƯU VÀO HÔM NAY________
    </div>
    <table class="table" id="mytable2">
      <thead class="color_table">
        <tr>
          <th class="text-light" scope="col">Thông tin viên chức </th>
          <th class="text-light" scope="col">Khoa</th>
          <th class="text-light" scope="col">Ngày sinh</th>
          <th class="text-light" scope="col">Ngày nghỉ hưu</th>
          <th class="text-light" scope="col">Trạng thái</th>
          <th class="text-light" scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list_nu_nghihuu_homnay as $key => $vienchuc)
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
                      &ensp; Nghỉ hưu</span>
                  <?php
                }
              ?>
            </td>
            <td style="width: 25%">
              <a href="{{ URL::to('quatrinhnghi/'.$vienchuc->ma_vc) }}">
                <button type="submit" class="btn btn-warning button_cam">
                  <i class="fa-solid fa-pen-to-square text-light"></i>
                  &ensp; Cập nhật nghỉ hưu
                </button>
              </a>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary fw-bold btn_chitiet" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+500 }}">
                <i class="fa-solid fa-circle-info text-light"></i>
                &ensp;
                Chi tiết
              </button>

              <!-- Modal -->
              <div class="modal fade " id="exampleModal{{ $key+500 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        @foreach ($list_nam_nghihuu_homnay as $key => $vienchuc)
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
              <button type="button" class="btn btn-primary fw-bold btn_chitiet" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+100 }}" >
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
      </tbody>
    </table>
  </div>
</div>
@endsection
