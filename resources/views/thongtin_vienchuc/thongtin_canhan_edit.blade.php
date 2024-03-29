@extends('layout')
@section('content')
<div class="row">
  <div class="col-2 card-box">
    <div class="row">
      <a href="{{ URL::to('thongtin_canhan') }}">
        <button type="button" class="btn btn-success button_loc" style="width: 100%">Thông tin viên chức</button>
      </a>
      <a href="{{ URL::to('thongtin_giadinh') }}" class="mt-2">
        <button type="button" class="btn btn-light fw-bold" style="width: 100%">Gia đình</button>
      </a>
      <a href="{{ URL::to('thongtin_bangcap') }}" class="mt-2">
        <button type="button" class="btn btn-light fw-bold" style="width: 100%">Bằng cấp</button>
      </a>
      <a href="{{ URL::to('thongtin_khenthuong') }}" class="mt-2">
        <button type="button" class="btn btn-light fw-bold" style="width: 100%">Khen thưởng</button>
      </a>
      <a href="{{ URL::to('thongtin_kyluat') }}" class="mt-2">
        <button type="button" class="btn btn-light fw-bold" style="width: 100%">Kỷ luật</button>
      </a>
      <a href="{{ URL::to('thongtin_lophoc') }}" class="mt-2">
        <button type="button" class="btn btn-light fw-bold" style="width: 100%">Lớp học tham gia</button>
      </a>
      <a href="{{ URL::to('thongtin_quatrinhchucvu') }}" class="mt-2">
        <button type="button" class="btn btn-light fw-bold" style="width: 100%">Qúa trình chức vụ</button>
      </a>
    </div>
  </div>
  <div class="card-box col-10">
    <div class="alert alert-success row color_alert" role="alert">
      <a href="{{ URL::to('/thongtin_canhan') }}" class="col-1">
        <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
          <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
        </button>
      </a>
      <h4 class="text-center col-10 mt-1" style=" color: white; text-align: center; font-weight: bold; font-size: 20px">________CẬP NHẬT THÔNG TIN GIA ĐÌNH VIÊN CHỨC________</h4>
    </div>
    <form action="{{ URL::to('/update_thongtin_canhan/'.$edit->ma_vc) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th style="width: 30%" scope="row">Email: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="user_vc"  value="{{ $edit->user_vc }}" readonly>
                </td>
              </tr>
              <tr>
                <th scope="row">Đơn vị: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_k" required>
                    <option value="" >Chọn đơn vị</option>
                    @foreach ($list_khoa as $khoa )
                      <option
                        @if ($khoa->ma_k == $edit->ma_k)
                          selected
                        @endif
                        value="{{ $khoa->ma_k }}" >{{ $khoa->ten_k }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Chức vụ: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_cv" required>
                    <option value="" >Chọn chức vụ</option>
                    @foreach ($list_chucvu as $chucvu )
                      <option
                        @if ($chucvu->ma_cv == $edit->ma_cv)
                          selected
                        @endif
                        value="{{ $chucvu->ma_cv }}" >{{ $chucvu->ten_cv }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Dân tộc: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_dt" required>
                    <option value="" >Chọn dân tộc</option>
                    @foreach ($list_dantoc as $dantoc )
                      <option
                        @if ($dantoc->ma_dt == $edit->ma_dt)
                          selected
                        @endif
                        value="{{ $dantoc->ma_dt }}" >{{ $dantoc->ten_dt }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Tôn giáo: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_tg" required>
                    <option value="" >Chọn tôn giáo</option>
                    @foreach ($list_tongiao as $tongiao )
                      <option
                        @if ($tongiao->ma_tg == $edit->ma_tg)
                          selected
                        @endif
                        value="{{ $tongiao->ma_tg }}" >{{ $tongiao->ten_tg }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Thương binh: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_tb" required>
                    <option value="" >Chọn thương binh</option>
                    @foreach ($list_thuongbinh as $thuongbinh )
                      <option
                        @if ($thuongbinh->ma_tb == $edit->ma_tb)
                          selected
                        @endif
                        value="{{ $thuongbinh->ma_tb }}" >{{ $thuongbinh->ten_tb }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngạch: </th>
                <td class="was-validated">
                  <select class="custom-select input_table choose ngach" name="ma_n" id="ngach" required>
                    <option value="" >Chọn ngạch</option>
                    @foreach ($list_ngach as $ngach)
                      <option
                      @if ($ngach->ma_n == $edit->ma_n)
                      selected
                    @endif
                        value="{{ $ngach->ma_n }}" >{{ $ngach->ten_n }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Bậc: </th>
                <td class="was-validated">
                  <select class="custom-select input_table choose bac" name="ma_b" id="bac" required>
                    @foreach ($list_bac as $bac)
                      <option
                      @if ($bac->ma_b == $edit->ma_b)
                      selected
                    @endif
                        value="{{ $bac->ma_b }}" >{{ $bac->ten_b }} - {{ $bac->hesoluong_b }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Họ tên viên chức: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="hoten_vc"  value="{{ $edit->hoten_vc }}" maxlength="50">
                </td>
              </tr>
              <tr>
                <th scope="row">Số điện thoại: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required pattern="^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$" name="sdt_vc"  value="{{ $edit->sdt_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Hình ảnh: </th>
                <td class="was-validated">
                  @if ($edit->hinh_vc != ' ')
                    <img src="{{ URL::to('public/uploads/vienchuc/'.$edit->hinh_vc) }}" class="img-fluid" style="width: 15%">
                    <input type='file' name="hinh_vc" readonly>
                  @else
                    <input type='file' name="hinh_vc" readonly>
                  @endif
                </td>
              </tr>
              <tr>
                <th scope="row">Tên gọi khác: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus name="tenkhac_vc"  value="{{ $edit->tenkhac_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="">Ngày sinh: </th>
                <td class="was-validated">
                  <?php 
                    use Illuminate\Support\Carbon;
                    Carbon::now('Asia/Ho_Chi_Minh'); 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                    <input type='date' class='form-control input_table' autofocus max="<?php echo $now ?>" required name="ngaysinh_vc"  value="{{ $edit->ngaysinh_vc }}">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th colspan="2" class="text-center">Nơi sinh: </th>
              </tr>
              <tr>
                <td class="was-validated" colspan="2">
                  <div class="row">
                    <select class="custom-select input_table choose tinh col-3" name="ma_t_ns" id="tinh" required>
                      <option value="" >Chọn tỉnh</option>
                      @foreach ($list_tinh as $tinh)
                        @foreach ($noisinh as $ns )
                          <option
                            @if ($tinh->ma_t == $ns->ma_t)
                              selected
                            @endif
                            value="{{ $tinh->ma_t }}" >{{ $tinh->ten_t }}</option>
                        @endforeach
                      @endforeach
                    </select>
                    <select class="custom-select input_table choose huyen col-3 ms-4" name="ma_h_ns" id="huyen" required>
                      <option value="" >Chọn huyện</option>
                      @foreach ($list_huyen as $huyen)
                        @foreach ($noisinh as $ns)
                          <option
                            @if ($huyen->ma_h == $ns->ma_h)
                            selected
                          @endif
                              value="{{ $huyen->ma_h }}" >{{ $huyen->ten_h }}</option>
                        @endforeach
                        
                      @endforeach
                    </select>
                    <select class="custom-select input_table choose xa col-3 ms-4" name="ma_x_ns" id="xa" required>
                      <option value="" >Chọn xã</option>
                      @foreach ($list_xa as $xa)
                        @foreach ($noisinh as $ns)
                          <option
                            @if ($xa->ma_x == $ns->ma_x)
                            selected
                          @endif
                              value="{{ $xa->ma_x }}" >{{ $xa->ten_x }}</option>
                        @endforeach
                        
                      @endforeach
                    </select>
                  </div>
                  
                </td>
              </tr>
              <tr>
                <th scope="row">Địa chỉ nơi sinh: </th>
                <td class="was-validated">
                  @foreach ($noisinh as $ns )
                    @if ($ns->ma_vc == $edit->ma_vc)
                      <input type='text' class='form-control input_table' autofocus required name="diachi_ns"  value="{{ $ns->diachi_ns }}">
                    @endif
                    
                  @endforeach
                  
                </td>
              </tr>
              <tr>
                <th colspan="2" class="text-center">Quê quán: </th>
              </tr>
              <tr>
                <td class="was-validated" colspan="2">
                  <div class="row">
                    <select class="custom-select input_table choose tinh col-3" name="ma_t_qq" id="tinh_qq" required>
                      <option value="" >Chọn tỉnh</option>
                      @foreach ($list_tinh as $tinh)
                        @foreach ($quequan as $qq )
                          <option
                            @if ($tinh->ma_t == $qq->ma_t)
                              selected
                            @endif
                            value="{{ $tinh->ma_t }}" >{{ $tinh->ten_t }}</option>
                        @endforeach
                      @endforeach
                    </select>
                    <select class="custom-select input_table choose huyen col-3 ms-4" name="ma_h_qq" id="huyen_qq" required>
                      <option value="" >Chọn huyện</option>
                      @foreach ($list_huyen as $huyen)
                        @foreach ($quequan as $qq)
                          <option
                            @if ($huyen->ma_h == $qq->ma_h)
                            selected
                          @endif
                              value="{{ $huyen->ma_h }}" >{{ $huyen->ten_h }}</option>
                        @endforeach
                        
                      @endforeach
                    </select>
                    <select class="custom-select input_table choose xa col-3 ms-4" name="ma_x_qq" id="xa_qq" required>
                      <option value="" >Chọn xã</option>
                      @foreach ($list_xa as $xa)
                        @foreach ($quequan as $qq)
                          <option
                            @if ($xa->ma_x == $qq->ma_x)
                            selected
                          @endif
                              value="{{ $xa->ma_x }}" >{{ $xa->ten_x }}</option>
                        @endforeach
                        
                      @endforeach
                    </select>
                  </div>
                  
                </td>
              </tr>
              <tr>
                <th scope="row">Quê quán: </th>
                <td class="was-validated">
                  @foreach ($quequan as $qq )
                    @if ($qq->ma_vc == $edit->ma_vc)
                      <input type='text' class='form-control input_table' autofocus required name="diachi_qq"  value="{{ $qq->diachi_qq }}">
                    @endif
                    
                  @endforeach
                  
                </td>
              </tr>
              
              <tr>
                <th scope="row">Giới tính: </th>
                <td class="was-validated row">
                  @if ($edit->gioitinh_vc == 0)
                    <div class="form-check col-5 ms-3">
                      <input class="form-check-input" type="radio" name="gioitinh_vc" id="flexRadioDefault1" value="0" checked>
                      <label class="form-check-label" for="flexRadioDefault1">
                        Nam
                      </label>
                    </div>
                    <div class="form-check col-5">
                      <input class="form-check-input" type="radio" name="gioitinh_vc" id="flexRadioDefault2"  value="1">
                      <label class="form-check-label" for="flexRadioDefault2">
                        Nữ
                      </label>
                    </div>
                  @else
                    <div class="form-check col-5 ms-3">
                      
                      <input class="form-check-input" type="radio" name="gioitinh_vc" id="flexRadioDefault1" value="0">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Nam
                      </label>
                    </div>
                    <div class="form-check col-5">
                      <input class="form-check-input" type="radio" name="gioitinh_vc" id="flexRadioDefault2" checked value="1">
                      <label class="form-check-label" for="flexRadioDefault2">
                        Nữ
                      </label>
                    </div>
                  @endif
                </td>
              </tr>
              <tr>
                <th scope="row">Địa chỉ thường trú: </th>
                
                <td class="was-validated">
                  <textarea class="form-control"  name="thuongtru_vc" required>
                    {{ $edit->thuongtru_vc }}
                  </textarea>
                </td>
              </tr>
              <tr>
                <th scope="row">Địa chỉ hiện tại: </th>
                <td class="was-validated">
                  <textarea class="form-control" name="hientai_vc" required>
                    {{ $edit->hientai_vc }}
                  </textarea>
                </td>
              </tr>
              <tr>
                <th scope="row">Nghề khi được tuyển: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="nghekhiduoctuyen_vc"  value="{{ $edit->nghekhiduoctuyen_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="">Ngày tuyển dụng: </th>
                <td class="was-validated">
                  <?php 
                    // use Illuminate\Support\Carbon;
                    // Carbon::now('Asia/Ho_Chi_Minh'); 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                      <input type='date' class='form-control input_table' autofocus max="<?php echo $now ?>" required name="ngaytuyendung_vc"  value="{{ $edit->ngaytuyendung_vc }}">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Công việc chính được giao: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="congviecchinhgiao_vc"  value="{{ $edit->congviecchinhgiao_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Phụ cấp: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="phucap_vc"  value="{{ $edit->phucap_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Học phần giảng dạy: </th>
                <td class="was-validated">
                  <textarea class="form-control" name="hocphangiangday_vc" required>
                    {{ $edit->hocphangiangday_vc }}
                  </textarea>
                </td>
              </tr>
              <tr>
                <th scope="row">Trình độ giáo dục phổ thông : </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="trinhdophothong_vc"  value="{{ $edit->trinhdophothong_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Lý luận chính trị: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="chinhtri_vc"  value="{{ $edit->chinhtri_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Quản lý nhà nước: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="quanlynhanuoc_vc"  value="{{ $edit->quanlynhanuoc_vc }}">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th style="width: 30%" scope="row">Ngoại ngữ: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="ngoaingu_vc"  value="{{ $edit->ngoaingu_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Tin học: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="tinhoc_vc"  value="{{ $edit->tinhoc_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày vào Đảng Cộng sản Việt Nam: </th>
                <td class="was-validated">
                  <?php 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                      <input type='date' class='form-control input_table' autofocus max="<?php echo $now ?>" required name="ngayvaodang_vc"  value="{{ $edit->ngayvaodang_vc }}">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày chính thức: </th>
                <td class="was-validated">
                  <?php  
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                      <input type='date' class='form-control input_table' autofocus max="<?php echo $now ?>" required name="ngaychinhthuc_vc"  value="{{ $edit->ngaychinhthuc_vc }}">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày nhập ngũ: </th>
                <td class="was-validated">
                  <?php 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                      <input type='date' class='form-control input_table' autofocus max="<?php echo $now ?>" name="ngaynhapngu_vc"  value="{{ $edit->ngaynhapngu_vc }}">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày xuất ngũ: </th>
                <td class="was-validated">
                  <?php 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                      <input type='date' class='form-control input_table' autofocus max="<?php echo $now ?>" name="ngayxuatngu_vc"  value="{{ $edit->ngayxuatngu_vc }}">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Quân hàm cao nhất: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus name="quanham_vc"  value="{{ $edit->quanham_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày hưởng bậc: </th>
                <td class="was-validated">
                  <?php 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                      <input type='date' class='form-control input_table' autofocus max="<?php echo $now ?>" required name="ngayhuongbac_vc"  value="{{ $edit->ngayhuongbac_vc }}">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Danh hiệu được phong tặng cao nhất : </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus name="danhhieucao_vc"  value="{{ $edit->danhhieucao_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Sở trường công tác: </th>
                <td class="was-validated">
                  <textarea class="form-control" name="sotruong_vc" required>
                    {{ $edit->sotruong_vc }}
                  </textarea>
                </td>
              </tr>
              <tr>
                <th scope="row">Chiều cao: </th>
                <td class="was-validated">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <input type="number" id="inputPassword6" class="form-control" required aria-labelledby="passwordHelpInline" name="chieucao_vc"  value="{{ $edit->chieucao_vc }}" min="50" max="300" >
                    </div>
                    <div class="col-auto">
                      <span id="passwordHelpInline" class="form-text">
                        Ví dụ: bạn nhập 180 = 1m8
                      </span>
                    </div>
                  </div>
                  {{-- <input type='number' class='form-control input_table' autofocus required name="chieucao_vc"  value="{{ $edit->chieucao_vc }}"> --}}
                </td>
              </tr>
              <tr>
                <th scope="row">Cân nặng: </th>
                <td class="was-validated">
                  <input type='number' class='form-control input_table' autofocus required name="cannang_vc"  value="{{ $edit->cannang_vc }}" min="30" max="100">
                </td>
              </tr>
              <tr>
                <th scope="row">Nhóm máu: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="nhommau_vc"  value="{{ $edit->nhommau_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Là con gia đình chính sách: </th>
                <td class="was-validated">
                  <input type='text' class='form-control input_table' autofocus required name="chinhsach_vc"  value="{{ $edit->chinhsach_vc }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Số CCCD: </th>
                <td class="was-validated">
                  <input type='number' class='form-control input_table' autofocus required name="cccd_vc"  value="{{ $edit->cccd_vc }}" max="999999999999">
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày cấp: </th>
                <td class="was-validated">
                  <?php 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                      <input type='date' class='form-control input_table' autofocus max="<?php echo $now ?>" required name="ngaycapcccd_vc"  value="{{ $edit->ngaycapcccd_vc }}">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Số sổ BHXH: </th>
                <td class="was-validated">
                  <input type='number' class='form-control input_table' autofocus required name="bhxh_vc"  value="{{ $edit->bhxh_vc }}" max="9999999999">
                </td>
              </tr>
              <tr>
                <th style="width: 30%" scope="row">Khai rõ: bị bắt, bị tù (từ ngày tháng năm nào đến ngày tháng năm nào, ở đâu), đã khai báo cho ai, những vấn đề gì? Bản thân có làm việc trong chế độ cũ (cơ quan, đơn vị nào, địa điểm, chức danh, chức vụ, thời gian làm việc ....): </th>
                <td class="was-validated">
                  <textarea class="form-control"  rows="6" name="lichsubanthan1_vc">
                    {{ $edit->lichsubanthan1_vc }}
                  </textarea>
                </td>
              </tr>
              <tr>
                <th scope="row">Tham gia hoặc có quan hệ với các tổ chức chính trị, kinh tế, xã hội nào ở nước ngoài (làm gì, tổ chức nào, đặt trụ sở ở đâu .........?): : </th>
                <td class="was-validated">
                  <textarea class="form-control"  rows="4" name="lichsubanthan2_vc">
                    {{ $edit->lichsubanthan2_vc }}
                  </textarea>
                </td>
              </tr>
              <tr>
                <th scope="row">Có thân nhân (Cha, Mẹ, Vợ, Chồng, con, anh chị em ruột) ở nước ngoài (làm gì, địa chỉ)?: </th>
                <td class="was-validated">
                  <textarea class="form-control"  rows="3" name="lichsubanthan3_vc">
                    {{ $edit->lichsubanthan3_vc }}
                  </textarea>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày bắt đầu làm việc: </th>
                <td class="was-validated">
                  <?php 
                    $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                    ?>
                      <input type='date' class='form-control input_table' autofocus required name="ngaybatdaulamviec_vc"  value="{{ $edit->ngaybatdaulamviec_vc }}" max="<?php echo $now ?>">
                    <?php
                  ?>
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_vc" required>
                    <option value="" >Chọn trạng thái</option>
                    @if ($edit->status_vc == 1)
                      <option selected value="1" >Ẩn</option>
                      <option value="0" >Hiển thị</option>
                    @else
                      @if ($edit->status_vc == 0)
                        <option value="0" selected >Hiển thị</option>
                        <option value="1" >Ẩn</option>
                      @endif
                    @endif
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row mb-2">
          <div class="col-2">
          </div>
          <div class="col-3"></div>
          <div class="col-2">
            <button type="submit" class="btn btn-warning button_cam" style=" width: 100%">
              <i class="fa-solid fa-pen-to-square text-light"></i>
              &ensp; Cập nhật
            </button>
          </div>
          <div class="col-5"></div>
        </div>
      </div>
    </form>
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
  <script>
    $(document).ready(function(){
      $('#tinh').change(function(){
        var id= $(this).val();
        $.ajax({
          url:"{{ url("/change_tinh") }}",
          type:"GET",
          data:{id:id},
          success:function(data){
              $('#huyen').html(data);
          }
        });
      });
      $('#huyen').change(function(){
        var id= $(this).val();
        $.ajax({
          url:"{{ url("/change_huyen") }}",
          type:"GET",
          data:{id:id},
          success:function(data){
              $('#xa').html(data);
          }
        });
      });
    });
  </script>
    <script>
      $(document).ready(function(){
        $('#tinh_qq').change(function(){
          var id= $(this).val();
          $.ajax({
            url:"{{ url("/change_tinh") }}",
            type:"GET",
            data:{id:id},
            success:function(data){
                $('#huyen_qq').html(data);
            }
          });
        });
        $('#huyen_qq').change(function(){
          var id= $(this).val();
          $.ajax({
            url:"{{ url("/change_huyen") }}",
            type:"GET",
            data:{id:id},
            success:function(data){
                $('#xa_qq').html(data);
            }
          });
        });
      });
    </script>
  <!--  -->
@endsection