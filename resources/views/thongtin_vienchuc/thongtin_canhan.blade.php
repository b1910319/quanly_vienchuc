@extends('layout')
@section('content')
  <div class="row">
    <div class="col-2 card-box">
      <div class="row">
        <a href="{{ URL::to('thongtin_canhan') }}">
          <button type="button" class="btn btn-success fw-bold" style="background-color: #81B214; border: #81B214;width: 100%">Thông tin viên chức</button>
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
      </div>
    </div>
    <div class="col-10 card-box">
      <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
        THÔNG TIN VIÊN CHỨC
      </div>
      <div class="row ">
        <div class="col-md-12">
          <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
            style="height: 550px; overflow: auto;">
            <p>
              <div class="row">
                  <div class="col-6">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row" style="width: 30%">Email: </th>
                        <td>
                          @if ($vienchuc->user_vc != ' ')
                            {{ $vienchuc->user_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Họ tên: </th>
                        <td>
                          @if ($vienchuc->hoten_vc != ' ')
                            {{ $vienchuc->hoten_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Số điện thoại: </th>
                        <td>
                          @if ($vienchuc->sdt_vc != ' ')
                            {{ $vienchuc->sdt_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
    
                      <tr>
                        <th scope="row">Khoa: </th>
                        <td>
                          @if ($vienchuc->ma_k != 0)
                            @foreach ($list_khoa as $khoa )
                              @if ($khoa->ma_k == $vienchuc->ma_k)
                                {{ $khoa->ten_k }}
                              @endif
                            @endforeach
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Chức vụ: </th>
                        <td>
                          @if ($vienchuc->ma_cv != 0)
                            @foreach ($list_chucvu as $chucvu )
                              @if ($chucvu->ma_cv == $vienchuc->ma_cv)
                                {{ $chucvu->ten_cv }}
                              @endif
                            @endforeach
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngạch: </th>
                        <td>
                          @if ($vienchuc->ma_n != 0)
                            @foreach ($list_ngach as $ngach )
                              @if ($ngach->ma_n == $vienchuc->ma_n)
                                {{ $ngach->ten_n }}
                              @endif
                            @endforeach
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Bậc: </th>
                        <td>
                          @if ($vienchuc->ma_b != 0)
                            @foreach ($list_bac as $bac )
                              @if ($bac->ma_b == $vienchuc->ma_b)
                                {{ $bac->ten_b }}
                              @endif
                            @endforeach
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Dân tộc: </th>
                        <td>
                          @if ($vienchuc->ma_dt != 0)
                            @foreach ($list_dantoc as $dantoc )
                              @if ($dantoc->ma_dt == $vienchuc->ma_dt)
                                {{ $dantoc->ten_dt }}
                              @endif
                            @endforeach
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Tôn giáo: </th>
                        <td>
                          @if ($vienchuc->ma_tg != 0)
                            @foreach ($list_tongiao as $tongiao )
                              @if ($tongiao->ma_tg == $vienchuc->ma_tg)
                                {{ $tongiao->ten_tg }}
                              @endif
                            @endforeach
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Thương binh: </th>
                        <td>
                          @if ($vienchuc->ma_tb != 0)
                            @foreach ($list_thuongbinh as $thuongbinh )
                              @if ($thuongbinh->ma_tb == $vienchuc->ma_tb)
                                {{ $thuongbinh->ten_tb }}
                              @endif
                            @endforeach
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
    
                      <tr>
                        <th scope="row">Hình: </th>
                        <td>
                          @if ($vienchuc->hinh_vc != ' ')
                            <img src="{{ URL::to('public/uploads/vienchuc/'.$vienchuc->hinh_vc) }}" class="img-fluid" style="width: 15%">
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Tên khác: </th>
                        <td>
                          @if ($vienchuc->tenkhac_vc != ' ')
                            {{ $vienchuc->tenkhac_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngày sinh: </th>
                        <td>
                          @if ($vienchuc->ngaysinh_vc != ' ')
                            {{ $vienchuc->ngaysinh_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Giới tính: </th>
                        <td>
                          @if ($vienchuc->gioitinh_vc != ' ')
                            @if ($vienchuc->gioitinh_vc == 0)
                              Nam
                            @else
                              Nữ
                            @endif
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Địa chỉ thường trú: </th>
                        <td>
                          @if ($vienchuc->thuongtru_vc != ' ')
                            {{ $vienchuc->thuongtru_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Chỗ ở hiện tại: </th>
                        <td>
                          @if ($vienchuc->hientai_vc != ' ')
                            {{ $vienchuc->hientai_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Nghề nghiệp khi được tuyển dụng: </th>
                        <td>
                          @if ($vienchuc->nghekhiduoctuyen_vc != ' ')
                            {{ $vienchuc->nghekhiduoctuyen_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngày tuyển dụng: </th>
                        <td>
                          @if ($vienchuc->ngaytuyendung_vc != ' ')
                            {{ $vienchuc->ngaytuyendung_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Công việc chính được giao: </th>
                        <td>
                          @if ($vienchuc->congviecchinhgiao_vc != ' ')
                            {{ $vienchuc->congviecchinhgiao_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Phụ cấp: </th>
                        <td>
                          @if ($vienchuc->phucap_vc != ' ')
                            {{ $vienchuc->phucap_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-6">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row" style="width: 30%">Trình độ phổ thông: </th>
                        <td>
                          @if ($vienchuc->trinhdophothong_vc != ' ')
                            {{ $vienchuc->trinhdophothong_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Lý luận chính trị: </th>
                        <td>
                          @if ($vienchuc->chinhtri_vc != ' ')
                            {{ $vienchuc->chinhtri_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Quản lý nhà nước: </th>
                        <td>
                          @if ($vienchuc->quanlynhanuoc_vc != ' ')
                            {{ $vienchuc->quanlynhanuoc_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngoại ngữ: </th>
                        <td>
                          @if ($vienchuc->ngoaingu_vc != ' ')
                            {{ $vienchuc->ngoaingu_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Tin học: </th>
                        <td>
                          @if ($vienchuc->tinhoc_vc != ' ')
                            {{ $vienchuc->tinhoc_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngày vào Đảng Cộng sản Việt Nam: </th>
                        <td>
                          @if ($vienchuc->ngayvaodang_vc != ' ')
                            {{ $vienchuc->ngayvaodang_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngày chính thức: </th>
                        <td>
                          @if ($vienchuc->ngaychinhthuc_vc != ' ')
                            {{ $vienchuc->ngaychinhthuc_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngày hưởng bậc: </th>
                        <td>
                          @if ($vienchuc->ngayhuongbac_vc != ' ')
                            {{ $vienchuc->ngayhuongbac_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngày nâng bậc: </th>
                        <td>
                          @if ($vienchuc->ngaynangbac_vc != ' ')
                            {{ $vienchuc->ngaynangbac_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Sở trường công tác: </th>
                        <td>
                          @if ($vienchuc->sotruong_vc != ' ')
                            {{ $vienchuc->sotruong_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Chiều cao: </th>
                        <td>
                          @if ($vienchuc->chieucao_vc != ' ')
                            {{ $vienchuc->chieucao_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Cân nặng: </th>
                        <td>
                          @if ($vienchuc->cannang_vc != ' ')
                            {{ $vienchuc->cannang_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Nhóm máu: </th>
                        <td>
                          @if ($vienchuc->nhommau_vc != ' ')
                            {{ $vienchuc->nhommau_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Là con gia đình chính sách: </th>
                        <td>
                          @if ($vienchuc->chinhsach_vc != ' ')
                            {{ $vienchuc->chinhsach_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Số CCCD/CMND: </th>
                        <td>
                          @if ($vienchuc->cccd_vc != ' ')
                            {{ $vienchuc->cccd_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngày cấp CCCD/CMND: </th>
                        <td>
                          @if ($vienchuc->ngaycapcccd_vc != ' ')
                            {{ $vienchuc->ngaycapcccd_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Số sổ BHXH: </th>
                        <td>
                          @if ($vienchuc->bhxh_vc != ' ')
                            {{ $vienchuc->bhxh_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Đặc điểm lịch sử bản thân: </th>
                        <td>
                          @if ($vienchuc->lichsubanthan1_vc != ' ')
                            {{ $vienchuc->lichsubanthan1_vc }}
                            <br>
                            {{ $vienchuc->lichsubanthan2_vc }}
                            <br>
                            {{ $vienchuc->lichsubanthan3_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Ngày bắt đầu làm việc: </th>
                        <td>
                          @if ($vienchuc->ngaybatdaulamviec_vc != ' ')
                            {{ $vienchuc->ngaybatdaulamviec_vc }}
                          @else
                            Chưa cập nhật <i class="fa-solid fa-circle-xmark" style="color: red;"></i>
                          @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-10"></div>
        <div class="col-2 mt-2">
          <a href="{{ URL::to('/thongtin_canhan_edit/'.$vienchuc->ma_vc)}}">
            <button type="button" class="btn btn-warning fw-bold" style="width: 100%; background-color: #FC7300">
              <i class="fa-solid fa-pen-to-square"></i>
              &ensp; Cập nhật
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection