@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row" role="alert" style="background-color: #3F979B; text-align: center; text-transform: uppercase">
      <div class="col-1">
        @if ($vienchuc != '' && $lop != '')
          <a href="{{ URL::to('/danhsach/'.$lop->ma_l) }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @endif
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________THÔNG TIN KẾT QUẢ CỦA VIÊN CHỨC THAM GIA LỚP HỌC________
      </h4>
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary fw-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237; border: none">
            <i class="fas fa-plus-square"></i>
            &ensp; Thêm
          </button>
          @if ($vienchuc != '' && $lop != '')
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_ketqua/'.$lop->ma_l.'/'.$vienchuc->ma_vc) }}">
              <button type="button" class="btn btn-danger fw-bold" style="background-color: #FF1E1E">
              <i class="fa-solid fa-trash"></i>
              &ensp;
              Xoá tất cả
            </button>
            </a>
          @else
            <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_ketqua_all') }}">
              <button type="button" class="btn btn-danger fw-bold" style="background-color: #FF1E1E">
              <i class="fa-solid fa-trash"></i>
              &ensp;
              Xoá tất cả
            </button>
            </a>
          @endif
          <button class="btn btn-primary fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="background-color: #00AF91; border: none;">
            <i class="fa-solid fa-chart-simple"></i> &ensp;
            Thống kê
          </button>
          <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title fw-bold" id="offcanvasScrollingLabel" style="color: #00AF91 ">
                <i class="fa-solid fa-chart-simple"></i>
                &ensp;
                Thống kê
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <table class="table">
                <thead class="table-dark text-light">
                  <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($count_status as $key => $count_stt)
                    @if ($count_stt->status_kq == 0)
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
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form action="{{ URL::to('/add_ketqua') }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        @if ($vienchuc != '' && $lop != '')
                          <input type="hidden" name="ma_vc" value="{{ $vienchuc->ma_vc }}">
                          <input type="hidden" name="ma_l" value="{{ $lop->ma_l }}">
                        @else
                          <tr>
                            <th scope="row">Viên chức: </th>
                            <td class="was-validated">
                              <select class="custom-select input_table" id="gender2" name="ma_vc">
                                <option value="0" >Chọn viên chức</option>
                                @foreach ($list_vienchuc as $vienchuc )
                                <option value="{{ $vienchuc->ma_vc }}" >{{ $vienchuc->hoten_vc }}</option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Lớp: </th>
                            <td class="was-validated">
                              <select class="custom-select input_table" id="gender2" name="ma_l">
                                <option value="0" >Chọn lớp</option>
                                @foreach ($list_lop as $lop )
                                  <option value="{{ $lop->ma_l }}" >{{ $lop->ten_l }}</option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                        @endif
                        <tr>
                          <th scope="row">Tên người hướng dẫn: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="tennguoihuongdan_kq">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Email người hướng dẫn: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="emailnguoihuongdan_kq">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Nội dung đào tạo: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="noidungaotao_kq">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Văn bằng, chứng chỉ được cấp: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="bangduoccap_kq">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày cấp bằng: </th>
                          <td class="was-validated">
                            <input type='date' class='form-control input_table' autofocus required name="ngaycapbang_kq">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Kết quả xếp loại: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="xeploai_kq">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Đề tài tốt nghiệp: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="detaitotnghiep_kq">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày về nước: </th>
                          <td class="was-validated">
                            <input type='date' class='form-control input_table' autofocus required name="ngayvenuoc_kq">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Đánh giá của cơ sở đào tạo: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="danhgiacuacoso_kq">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Kiến nghị, đề xuất: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="kiennghi_kq">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_kq">
                              <option value="0" >Chọn trạng thái</option>
                              <option value="1" >Ẩn</option>
                              <option selected value="0" >Hiển thị</option>
                            </select>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="row mb-2">
                    <div class="col-5"></div>
                    <div class="col-2">
                      <button type="submit"  class="btn btn-primary font-weight-bold them" style="background-color: #379237; border: none; width: 100%;">
                        <i class="fas fa-plus-square"></i>
                        &ensp;
                        Thêm
                      </button>
                    </div>
                    <div class="col-5"></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
    <form action="{{ URL::to('/delete_ketqua_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col"></th>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức</th>
            <th scope="col">Thông tin lớp học</th>
            <th scope="col">Khoa</th>
            <th scope="col">Kết quả</th>
            <th scope="col">Trạng thái</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody  >
          @foreach ($list as $key => $ketqua)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_kq[{{ $ketqua->ma_kq }}]" value="{{ $ketqua->ma_kq }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                <b>Họ tên viên chức: </b> {{ $ketqua->hoten_vc }} <br>
                <b>Email viên chức: </b> {{ $ketqua->user_vc }} <br>
                <b>Số điện thoại viên chức: </b> {{ $ketqua->sdt_vc }} <br>
              </td>
              <td>
                <b>Tên lớp học: </b> {{ $ketqua->ten_l }} <br>
                <b>Ngày bắt đầu: </b> {{ $ketqua->ngaybatdau_l }} <br>
                <b>Ngày kết thúc: </b> {{ $ketqua->ngayketthuc_l }} <br>
                <b>Tên cơ sở đào tạo: </b> {{ $ketqua->tencosodaotao_l }} <br>
                <b>Quốc gia đào tạo: </b> {{ $ketqua->quocgiaodaotao_l }} <br>
                <b>Email cơ sở đào tạo: </b> {{ $ketqua->emailcoso_l }} <br>
                <b>Số điện thoại cơ sở đào tạo: </b> {{ $ketqua->sdtcoso_l }} <br>
              </td>
              <td>
                {{ $ketqua->ten_k }}
              </td>
              <td style="width: 20%">
                <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
            style="height: 150px; overflow: auto;">
                  <p>
                    <b>Tên người hướng dẫn: </b> {{ $ketqua->tennguoihuongdan_kq }} <br>
                    <b>Email người hướng dẫn: </b> {{ $ketqua->emailnguoihuongdan_kq }} <br>
                    <b>Nội dung đào tạo: </b> {{ $ketqua->noidungaotao_kq }} <br>
                    <b>Văn bằng, chứng chỉ được cấp: </b> {{ $ketqua->bangduoccap_kq }} <br>
                    <b>Ngày cấp bằng: </b> {{ $ketqua->ngaycapbang_kq }} <br>
                    <b>Kết quả xếp loại: </b> {{ $ketqua->xeploai_kq }} <br>
                    <b>Đề tài tốt nghiệp: </b> {{ $ketqua->detaitotnghiep_kq }} <br>
                    <b>Ngày về nước: </b> {{ $ketqua->ngayvenuoc_kq }} <br>
                    <b>Đánh giá của cơ sở: </b> {{ $ketqua->danhgiacuacoso_kq }} <br>
                    <b>Kiến nghị, đề xuất: </b> {{ $ketqua->kiennghi_kq }} <br>
                  </p>
                </div>
              </td>
              <td>
                <?php
                  if($ketqua->status_kq == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị
                      </span>
                    <?php
                  }else if($ketqua->status_kq == 1) {
                    ?>
                      <span class="badge badge-light-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 30%;">
                <a href="{{ URL::to('/edit_ketqua/'.$ketqua->ma_kq)}}">
                  <button type="button" class=" btn btn-warning fw-bold" style="background-color: #FC7300">
                    <i class="fa-solid fa-pen-to-square"></i>
                    &ensp; Cập nhật
                  </button>
                </a>
                <input class="ma_kq{{ $ketqua->ma_kq }}" type="hidden" value="{{ $ketqua->ma_kq }}">
                <button type="button" class=" xoa{{ $ketqua->ma_kq }} btn btn-danger fw-bold" style="background-color: #FF1E1E"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
                <?php
                  if($ketqua->status_kq == 0){
                    ?>
                      <a href="{{ URL::to('/select_ketqua/'.$ketqua->ma_kq) }}">
                        <button type="button" class="btn btn-secondary fw-bold">
                          <i class="fa-solid fa-eye-slash"></i> 
                          &ensp; Ẩn
                        </button>
                      </a>
                    <?php
                  }else if($ketqua->status_kq == 1) {
                    ?>
                      <a href="{{ URL::to('/select_ketqua/'.$ketqua->ma_kq) }}">
                        <button type="button" class="btn btn-success fw-bold">
                          <i class="fa-solid fa-eye"></i>
                          &ensp; Hiển thị
                        </button>
                      </a>
                    <?php
                  }
                ?>
                <a href="{{ URL::to('/ketqua_pdf/'.$ketqua->ma_kq) }}">
                  <button type="button" class="btn btn-warning fw-bold" style="background-color: #FF1E1E; border: none;">
                    <i class="fa-solid fa-file-pdf"></i>
                    &ensp;
                    Xuất file PDF
                  </button>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <button  type="submit" class="btn btn-danger fw-bold xoa_check" style="background-color: #FF1E1E">
        <i class="fa-solid fa-trash"></i>
        &ensp;
        Xoá
      </button>
    </form>
  </div>
</div>
{{-- ajax --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{--  --}}
<script>
  document.querySelector('.them').addEventListener('click', (event)=>{
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })

    Toast.fire({
      icon: 'success',
      title: 'Thêm thành công'
    })
    
  }); 
  @foreach ($list as $ketqua )
    document.querySelector('.xoa{{ $ketqua->ma_kq }}').addEventListener('click', (event)=>{
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
          var id= $('.ma_kq{{ $ketqua->ma_kq }}').val();
          $.ajax({
            url:"{{ url("/delete_ketqua") }}", 
            type: "GET", 
            data: {id:id},
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
