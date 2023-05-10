@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="row ">
      <div class="alert alert-success row color_alert" role="alert">
        <div class="col-1">
          <a href="{{ URL::to('lop') }}">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        </div>
        <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
          ________DANH SÁCH VIÊN CHỨC________
        </h4>
      </div>
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Tên viên chức</th>
            <th class="text-light" scope="col">Thông tin liên hệ</th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
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
                <b>Email: </b>{{ $vienchuc->user_vc }}
                <br>
                <b>Số điện thoại: </b>{{ $vienchuc->sdt_vc }}
              </td>
              <td>
                @foreach ($list_khoa as $khoa)
                  @if ($khoa->ma_k == $vienchuc->ma_k)
                    {{ $khoa->ten_k }}
                  @endif
                @endforeach
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
                  <button type="button"  class="btn btn-primary button_xanhla them">
                    <i class="fas fa-plus-square text-light"></i>
                    &ensp;
                    Thêm
                  </button>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="mt-3"></div>
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        <a href="{{ URL::to('lop') }}">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
        ________THÔNG TIN HỌC VIÊN CỦA LỚP " <span style="color: #FFFF00"> {{ $lop->ten_l }}</span> "________
      </h4>
    </div>
    <div class="row">
      <div class="col-2">
        <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_danhsach/'.$ma_l) }}">
          <button type="button" class="btn btn-danger button_do">
            <i class="fa-solid fa-trash text-light"></i>
            &ensp;
            Xoá tất cả
          </button>
        </a>
      </div>
    </div>
    <table class="table" id="mytable1">
      <thead class="color_table">
        <tr>
          <th class="text-light" scope="col">STT</th>
          <th class="text-light" scope="col">Viên chức </th>
          <th class="text-light" scope="col">Trạng thái</th>
          <th class="text-light" scope="col">Thông tin viên chức</th>
          <th class="text-light" scope="col">Qúa trình học</th>
          <th class="text-light" scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $danhsach)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              <b>Tên: </b> {{ $danhsach->hoten_vc }} <br>
              <b>Khoa: </b>
              @foreach ($list_khoa as $khoa)
                @if ($khoa->ma_k == $danhsach->ma_k)
                  {{ $khoa->ten_k }}
                @endif
              @endforeach
            </td>
            <td>
              @if ($danhsach->status_ds == 0)
              <span class="badge badge-light-success">
                <i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị
              </span>
              @else
                @if ($danhsach->status_ds == 1)
                <span class="badge badge-light-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                @else
                  @if ($danhsach->status_ds == 2)
                    <span class="badge badge-light-primary">
                      Xin chuyển
                    </span>
                  @else
                    @if ($danhsach->status_ds == 3)
                    <span class="badge badge-light-warning">
                      Thôi học
                    </span>
                    @else
                      
                    @endif
                  @endif
                @endif
              @endif
            </td>
            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary luotxem_l{{ $key+1 }} btn_chitiet fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+1 }}">
                <i class="fa-solid fa-circle-info text-light"></i> &ensp; Chi tiết
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
                              {{ $danhsach->hoten_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Email:</th>
                            <td>
                              {{ $danhsach->user_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Số điện thoại:</th>
                            <td>
                              {{ $danhsach->sdt_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Khoa:</th>
                            <td>
                              @foreach ($list_khoa as $khoa)
                                @if ($khoa->ma_k == $danhsach->ma_k)
                                  {{ $khoa->ten_k }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Chức vụ:</th>
                            <td>
                              @foreach ($list_chucvu as $chucvu)
                                @if ($chucvu->ma_cv == $danhsach->ma_cv)
                                  {{ $chucvu->ten_cv }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngạch:</th>
                            <td>
                              @foreach ($list_ngach as $ngach)
                                @if ($ngach->ma_n == $danhsach->ma_n)
                                  {{ $ngach->ten_n }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Bậc:</th>
                            <td>
                              @foreach ($list_bac as $bac)
                                @if ($bac->ma_b == $danhsach->ma_b)
                                  {{ $bac->ten_b }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Dân tộc:</th>
                            <td>
                              @foreach ($list_dantoc as $dantoc)
                                @if ($dantoc->ma_dt == $danhsach->ma_dt)
                                  {{ $dantoc->ten_dt }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Tôn giáo</th>
                            <td>
                              @foreach ($list_tongiao as $tongiao)
                                @if ($tongiao->ma_tg == $danhsach->ma_tg)
                                  {{ $tongiao->ten_tg }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Thương binh</th>
                            <td>
                              @foreach ($list_thuongbinh as $thuongbinh)
                                @if ($thuongbinh->ma_tb == $danhsach->ma_tb)
                                  {{ $thuongbinh->ten_tb }}
                                @endif
                              @endforeach
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Hình</th>
                            <td>
                              @if ($danhsach->hinh_vc != ' ')
                                <img src="{{ asset('public/uploads/vienchuc/'.$danhsach->hinh_vc) }}" style="width: 20%">
                              @else
                                Hình ảnh chưa được cập nhật &ensp; <i class="fa-solid fa-xmark" style="color: red"></i>
                              @endif
                              
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Tên gọi khác</th>
                            <td>
                              {{ $danhsach->tenkhac_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày sinh</th>
                            <td>
                              {{ $danhsach->ngaysinh_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Giới tính</th>
                            <td>
                              @if ($danhsach->gioitinh_vc == 0)
                                Nam
                              @else
                                Nữ
                              @endif
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Địa chỉ thường trú</th>
                            <td>
                              {{ $danhsach->thuongtru_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Địa chỉ hiện tại</th>
                            <td>
                              {{ $danhsach->hientai_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Nghề khi được tuyển</th>
                            <td>
                              {{ $danhsach->nghekhiduoctuyen_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày tuyển dụng</th>
                            <td>
                              {{ $danhsach->ngaytuyendung_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Công việc chính được giao</th>
                            <td>
                              {{ $danhsach->congviecchinhgiao_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Phụ cấp</th>
                            <td>
                              {{ $danhsach->phucap_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Trình độ phổ thông</th>
                            <td>
                              {{ $danhsach->trinhdophothong_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Lý luận chính trị</th>
                            <td>
                              {{ $danhsach->chinhtri_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Quản lý nhà nước</th>
                            <td>
                              {{ $danhsach->quanlynhanuoc_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngoại ngữ</th>
                            <td>
                              {{ $danhsach->ngoaingu_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Tin học</th>
                            <td>
                              {{ $danhsach->tinhoc_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày vào Đảng Cộng sản Việt Nam</th>
                            <td>
                              {{ $danhsach->ngayvaodang_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày chính thức</th>
                            <td>
                              {{ $danhsach->ngaychinhthuc_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày nhập ngũ</th>
                            <td>
                              {{ $danhsach->ngaynhapngu_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày xuất ngũ</th>
                            <td>
                              {{ $danhsach->ngayxuatngu_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Quân hàm cao nhất</th>
                            <td>
                              {{ $danhsach->quanham_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày hưởng bật</th>
                            <td>
                              {{ $danhsach->ngayhuongbac_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Danh hiệu được phong tặng cao nhất </th>
                            <td>
                              {{ $danhsach->danhhieucao_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Sở trường công tác</th>
                            <td>
                              {{ $danhsach->sotruong_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Chiều cao</th>
                            <td>
                              {{ $danhsach->chieucao_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Cân nặng</th>
                            <td>
                              {{ $danhsach->cannang_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Nhóm máu</th>
                            <td>
                              {{ $danhsach->nhommau_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Là con gia đình chính sách</th>
                            <td>
                              {{ $danhsach->chinhsach_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Số CCCD</th>
                            <td>
                              {{ $danhsach->cccd_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày cấp CCCD</th>
                            <td>
                              {{ $danhsach->ngaycapcccd_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Số BHXH</th>
                            <td>
                              {{ $danhsach->bhxh_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Lịch sử bản thân</th>
                            <td>
                              {{ $danhsach->lichsubanthan1_vc }}
                              <br>
                              {{ $danhsach->lichsubanthan2_vc }}
                              <br>
                              {{ $danhsach->lichsubanthan3_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Ngày bắt đầu làm việc</th>
                            <td>
                              {{ $danhsach->ngaybatdaulamviec_vc }}
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Thời gian nghĩ</th>
                            <td>
                              {{ $danhsach->thoigiannghi_vc }}
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
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td style="width: 15%">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $key+50 }}">
                Qúa trình học
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal{{ $key+50 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Quá trình học</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-6">
                          <a href="{{ URL::to('/quyetdinh/'.$danhsach->ma_l.'/'.$danhsach->ma_vc)}}">
                            <button type="button" class="btn btn-danger position-relative me-2 button_xanhla" style=" width: 100%">
                              Thêm quyết định 
                              <?php
                                foreach ($count_quyetdinh_vienchuc as $key => $count) {
                                  if($count->ma_vc == $danhsach->ma_vc){
                                    ?>
                                      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="background-color: #CF0000 !important; font-size: 16px">
                                        <?php echo $count->sum ?>
                                        <span class="visually-hidden">unread messages</span>
                                      </span>
                                    <?php
                                  }
                                }
                              ?>
                            </button>
                          </a>
                        </div>
                        <?php
                            foreach ($count_quyetdinh_vienchuc as $key => $count) {
                              if($count->ma_vc == $danhsach->ma_vc){
                                ?>
                                  <div class="col-6">
                                    <a href="{{ URL::to('/ketqua/'.$danhsach->ma_l.'/'.$danhsach->ma_vc)}}">
                                      <button type="button" class="btn btn-danger position-relative me-2 button_cam" style=" width: 100%">
                                        Kết quả học
                                        <?php
                                          foreach ($count_ketqua_vienchuc as $key => $count) {
                                            if($count->ma_vc == $danhsach->ma_vc){
                                              ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="background-color: #FF5200 !important; font-size: 16px">
                                                  <?php echo $count->sum ?>
                                                  <span class="visually-hidden">unread messages</span>
                                                </span>
                                              <?php
                                            }
                                          }
                                        ?>
                                      </button>
                                    </a>
                                  </div>
                                  <div class="col-6 mt-2">
                                    <a href="{{ URL::to('/dunghoc/'.$danhsach->ma_l.'/'.$danhsach->ma_vc)}}">
                                      <button type="button" class="btn btn-danger position-relative me-2 fw-bold" style="background-color: #B3005E; width: 100%">
                                        Tạm dừng học
                                        <?php
                                          foreach ($count_dunghoc_vienchuc as $key => $count) {
                                            if($count->ma_vc == $danhsach->ma_vc){
                                              ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="background-color: #B3005E !important; font-size: 16px">
                                                  <?php echo $count->sum ?>
                                                  <span class="visually-hidden">unread messages</span>
                                                </span>
                                              <?php
                                            }
                                          }
                                        ?>
                                      </button>
                                    </a>
                                  </div>
                                  <div class="col-6 mt-2">
                                    <a href="{{ URL::to('/giahan/'.$danhsach->ma_l.'/'.$danhsach->ma_vc)}}">
                                      <button type="button" class="btn btn-danger position-relative me-2 fw-bold" style="background-color: #FF9D76; border: none; width: 100%">
                                        Gia hạn
                                        <?php
                                          foreach ($count_giahan_vienchuc as $key => $count) {
                                            if($count->ma_vc == $danhsach->ma_vc){
                                              ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="background-color: #FF9D76 !important; font-size: 16px">
                                                  <?php echo $count->sum ?>
                                                  <span class="visually-hidden">unread messages</span>
                                                </span>
                                              <?php
                                            }
                                          } 
                                        ?>
                                      </button>
                                    </a>
                                  </div>
                                  <div class="col-6 mt-2">
                                    <a href="{{ URL::to('/chuyen/'.$danhsach->ma_l.'/'.$danhsach->ma_vc)}}">
                                      <button type="button" class="btn btn-danger position-relative me-2 fw-bold" style="background-color: #04009A; border: none; width: 100%">
                                        Chuyển ngành...
                                        <?php
                                          foreach ($count_chuyen_vienchuc as $key => $count) {
                                            if($count->ma_vc == $danhsach->ma_vc){
                                              ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="background-color: #04009A !important; font-size: 16px;">
                                                  <?php echo $count->sum ?>
                                                  <span class="visually-hidden">unread messages</span>
                                                </span>
                                              <?php
                                            }
                                          } 
                                        ?>
                                      </button>
                                    </a>
                                  </div>
                                  <div class="col-6 mt-2">
                                    <a href="{{ URL::to('/thoihoc/'.$danhsach->ma_l.'/'.$danhsach->ma_vc)}}">
                                      <button type="button" class="btn btn-danger position-relative me-2 fw-bold" style="background-color: #E5890A; border: none; width: 100%">
                                        Thôi học
                                        <?php
                                          foreach ($count_thoihoc_vienchuc as $key => $count) {
                                            if($count->ma_vc == $danhsach->ma_vc){
                                              ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="background-color: #E5890A !important; font-size: 16px;">
                                                  <?php echo $count->sum ?>
                                                  <span class="visually-hidden">unread messages</span>
                                                </span>
                                              <?php
                                            }
                                          } 
                                        ?>
                                      </button>
                                    </a>
                                  </div>
                                <?php
                              }
                            }
                          ?>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">
                        <i class="fa-solid fa-square-xmark text-light"></i>
                        &ensp; Đóng
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td style="width: 8%"> 
              {{-- <a href="{{ URL::to('/quyetdinh_dihoc_pdf/'.$danhsach->ma_l.'/'.$danhsach->ma_vc) }}">
                <button type="button" class="btn btn-warning button_xanhla">
                  <i class="fa-solid fa-file text-light"></i>
                  &ensp;
                  Xuất file
                </button>
              </a> --}}
              <input class="ma_vc{{ $danhsach->ma_vc }}" type="hidden" value="{{ $danhsach->ma_vc }}">
              <input class="ma_l{{ $danhsach->ma_l }}" type="hidden" value="{{ $danhsach->ma_l }}">
              <button type="button" class=" xoa{{ $danhsach->ma_l }}{{ $danhsach->ma_vc }} btn btn-danger button_do"><i class="fa-solid fa-trash text-light"></i> &ensp;Xoá</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
{{-- ajax --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{--  --}}
<script>
  @foreach ($list as $danhsach )
    document.querySelector('.xoa{{ $danhsach->ma_l }}{{ $danhsach->ma_vc }}').addEventListener('click', (event)=>{
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Bạn có chắc muốn xoá không?',
        text: "Bạn không thể khôi phục dữ liệu đã xoá",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: '<i class="fa-solid fa-trash"></i> &ensp;  Xoá',
        cancelButtonText: '<i class="fa-solid fa-xmark"></i> &ensp;  Huỷ',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          var ma_l= $('.ma_l{{ $danhsach->ma_l }}').val();
          var ma_vc= $('.ma_vc{{ $danhsach->ma_vc }}').val();
          $.ajax({
            url:"{{ url("/delete_danhsach") }}", 
            type: "GET", 
            data: {ma_l:ma_l, ma_vc:ma_vc},
          });
          swalWithBootstrapButtons.fire(
            'Xoá thành công',
            'Dữ liệu của bạn đã được xoá.',
            'success'
          )
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Đã huỷ',
            'Dữ liệu được an toàn',
            'error'
          )
        }
        location.reload();
      })
      
    });
  @endforeach
  
</script>
<!--  -->
@endsection
