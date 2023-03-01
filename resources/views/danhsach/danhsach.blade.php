@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="row ">
      <div class="col-md-12">
        <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
          style="height: 400px; overflow: auto;">
          <p>
            <table class="table" id="mytable">
              <thead class="table-dark">
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Tên viên chức</th>
                  <th scope="col">Khoa</th>
                  <th scope="col">Thông tin viên chức </th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody  >
                @foreach ($list_vienchuc as $key => $vienchuc)
                  <tr >
                    <th scope="row">{{ $key+1 }}</th>
                    <td>
                      {{ $vienchuc->hoten_vc }}
                    </td>
                    <td>
                      @foreach ($list_khoa as $khoa)
                        @if ($khoa->ma_k == $vienchuc->ma_k)
                          {{ $khoa->ten_k }}
                        @endif
                      @endforeach
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
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      @foreach ($list as $danhsach )
                        @if ($danhsach->ma_vc == $vienchuc->ma_vc)
                          <i class="fa-solid fa-circle-check" style="color: #CF0000"></i>
                        @endif
                      @endforeach
                    </td>
                    <td>
                      <a href="{{ URL::to('/add_danhsach/'.$ma_l.'/'.$vienchuc->ma_vc) }}">
                        <button type="button" class="btn btn-primary">
                          <i class="fa-solid fa-circle-plus"></i>
                          &ensp;
                          Thêm
                        </button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </p>
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
    <div class="alert alert-success" role="alert">
      <div class="row">
        <a href="{{ URL::to('/lop') }}" class="col-1">
          <button type="button" class="btn btn-warning">
            <i class="fas fa-solid fa-caret-left"></i>&ensp;
          </button> &ensp;
        </a>
        <h4 class="text-center col-10 mt-1" style="font-weight: bold">
          DANH SÁCH 
        </h4>
      </div>
    </div>
    <div class="row">
      <div class="col-2">
        @foreach ($count as $key => $count)
          <p class="fw-bold" style="color: #379237; ">Tổng có: {{ $count->sum }}</p>
        @endforeach
      </div>
      <div class="col-2">
        <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_danhmuclop') }}">
          <button type="button" class="btn btn-danger">Xoá tất cả</button>
        </a>
      </div>
    </div>
    <table class="table" id="mytable1">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên viên chức </th>
          <th scope="col">Khoa</th>
          <th scope="col">Thông tin viên chức</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $danhmuclop)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $danhmuclop->hoten_vc }}
            </td>
            <td>
              @foreach ($list_khoa as $khoa)
                @if ($khoa->ma_k == $danhmuclop->ma_k)
                  {{ $khoa->ten_k }}
                @endif
              @endforeach
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
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/delete_danhmuclop/'.$danhmuclop->ma_dml)}}">
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection