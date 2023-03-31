@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row" role="alert" style="background-color: #3F979B; text-align: center; text-transform: uppercase">
      <div class="col-1">
        <a href="{{ URL::to('/danhmuclop') }}" class="col-1">
          <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
            <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
          </button>
        </a>
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px;">
        ________THÔNG TIN LỚP HỌC THUỘC DANH MỤC ĐÀO TẠO " <span style="color: #FFFF00">{{ $danhmuclop->ten_dml }}</span> "________
      </h4>
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary fw-bold" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237; border: none">
            <i class="fas fa-plus-square"></i>
            &ensp; Thêm
          </button>
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_lop_danhmuclop/'.$ma_dml) }}">
            <button type="button" class="btn btn-danger fw-bold" style="background-color: #FF1E1E">
              <i class="fa-solid fa-trash"></i>
              &ensp;
              Xoá tất cả
            </button>
          </a>
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
                    @if ($count_stt->status_l == 0)
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
              <form action="{{ URL::to('/add_lop_danhmuclop/'.$danhmuclop->ma_dml) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Quốc gia đào tạo: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_qg">
                              <option value="0" >Chọn quốc gia</option>
                              @foreach ($list_quocgia as $quocgia )
                                <option value="{{ $quocgia->ma_qg }}" >{{ $quocgia->ten_qg }}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Tên lớp học: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="ten_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày bắt đầu lớp học: </th>
                          <td class="was-validated">
                            <input type='date' class='form-control input_table' autofocus required name="ngaybatdau_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày kết thức lớp học: </th>
                          <td class="was-validated">
                            <input type='date' class='form-control input_table' autofocus required name="ngayketthuc_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Yêu cầu lớp học: </th>
                          <td class="was-validated">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="yeucau_l"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Cơ sở đào tạo: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="tencosodaotao_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngành học: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="nganhhoc_l">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Trình độ đào tạo: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="trinhdodaotao_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Nguồn kinh phí: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="nguonkinhphi_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Nội dung học: </th>
                          <td class="was-validated">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="noidunghoc_l"></textarea>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Địa chỉ đào tạo: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="diachidaotao_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Email cơ sở: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="emailcoso_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Số điện thoại cơ sở: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="sdtcoso_l">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_l">
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
    <form action="{{ URL::to('/delete_lop_danhmuclop_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="table-secondary">
          <tr>
            <th scope="col"></th>
            <th scope="col">STT</th>
            <th scope="col">Thông tin lớp học</th>
            <th scope="col">Danh mục lớp</th>
            <th scope="col">Quốc gia đào tạo</th>
            <th scope="col">Trạng thái</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody  >
          @foreach ($list as $key => $lop)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_l[{{ $lop->ma_l }}]" value="{{ $lop->ma_l }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td style="width: 20%;">
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên lớp:</b> {{ $lop->ten_l }} <br>
                        <b> Ngày bắt đầu:</b> {{ $lop->ngaybatdau_l }} <br>
                        <b> Ngày kết thúc: </b> {{ $lop->ngayketthuc_l }} <br>
                        <b> Tên cơ sở đào tạo: </b> {{ $lop->tencosodaotao_l }} <br>
                        <b> Quốc gia đào tạo: </b> {{ $lop->quocgiaodaotao_l }} <br>
                        <b> Ngành học: </b> {{ $lop->nganhhoc_l }} <br>
                        <b> Trình độ đào tạo: </b> {{ $lop->trinhdodaotao_l }} <br>
                        <b> Nguồn kinh phí: </b> {{ $lop->nguonkinhphi_l }} <br>
                        <b> Địa chỉ đào tạo: </b> {{ $lop->diachidaotao_l }} <br>
                        <b> Email cơ sở: </b> {{ $lop->emailcoso_l }} <br>
                        <b> Số điện thoại: </b> {{ $lop->sdtcoso_l }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                {{ $danhmuclop->ten_dml }} ({{ $danhmuclop->ma_dml }})
              </td>
              <td>
                @foreach ($list_quocgia as $key => $quocgia)
                  @if ($quocgia->ma_qg == $lop->ma_qg)
                    {{ $quocgia->ten_qg }}
                  @endif
                @endforeach
              </td>
              <td>
                <?php
                  if($lop->status_l == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị
                      </span>
                    <?php
                  }else if($lop->status_l == 1) {
                    ?>
                      <span class="badge badge-light-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 21%;">
                <a href="{{ URL::to('/edit_lop_danhmuclop/'.$lop->ma_l)}}">
                  <button type="button" class=" btn btn-warning fw-bold" style="background-color: #FC7300">
                    <i class="fa-solid fa-pen-to-square"></i>
                    &ensp; Cập nhật
                  </button>
                </a>
                <input class="ma_l{{ $lop->ma_l }}" type="hidden" value="{{ $lop->ma_l }}">
                <button type="button" class=" xoa{{ $lop->ma_l }} btn btn-danger fw-bold" style="background-color: #FF1E1E"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
                <?php
                  if($lop->status_l == 0){
                    ?>
                      <a href="{{ URL::to('/select_lop_danhmuclop/'.$lop->ma_l) }}">
                        <button type="button" class="btn btn-secondary fw-bold">
                          <i class="fa-solid fa-eye-slash"></i> 
                          &ensp; Ẩn
                        </button>
                      </a>
                    <?php
                  }else if($lop->status_l == 1) {
                    ?>
                      <a href="{{ URL::to('/select_lop_danhmuclop/'.$lop->ma_l) }}">
                        <button type="button" class="btn btn-success fw-bold">
                          <i class="fa-solid fa-eye"></i>
                          &ensp; Hiển thị
                        </button>
                      </a>
                    <?php
                  }
                ?>
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
  @foreach ($list as $lop )
    document.querySelector('.xoa{{ $lop->ma_l }}').addEventListener('click', (event)=>{
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
          var id= $('.ma_l{{ $lop->ma_l }}').val();
          $.ajax({
            url:"{{ url("/delete_lop_danhmuclop") }}", 
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
