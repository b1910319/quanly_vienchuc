@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="alert alert-success row color_alert" role="alert">
      <div class="col-1">
        @if ($phanquyen_qlk)
          <a href="{{ URL::to('/thongtin_vienchuc_khoa') }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @else
          <a href="{{ URL::to('/thongtin_vienchuc_add') }}" class="col-1">
            <button type="button" class="btn btn-warning" style="background-color: #E83A14; border-radius: 50%; border: none;">
              <i class="fa-solid fa-angle-left fw-bold" style="font-size: 18px;"></i>
            </button>
          </a>
        @endif
      </div>
      <h4 class="text-center col-11 mt-1" style="font-weight: bold; color: white; font-size: 20px; text-transform: uppercase">
        ________THÔNG TIN BẰNG CẤP VIÊN CHỨC " <span style="color: #FFFF00"> {{ $vienchuc->hoten_vc }}</span> "________
      </h4>
    </div>
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary button_xanhla" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a">
            <i class="fas fa-plus-square text-light"></i>
            &ensp; Thêm
          </button>
          <button type="button" class="btn btn-primary button_xanhla" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-upload text-light"></i> &ensp;
            Nhập file
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Nhập file</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="form-container" action="{{ URL::to('add_bangcap_excel') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                      <div class="col-9">
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Chọn file cần nhập</label>
                          <input class="form-control" type="file" id="formFile" name="import_excel" accept=".xlsx" required>
                        </div>
                      </div>
                      <div class="col-3" style="margin-top: 37px">
                        <button type="submit" class="btn btn-primary button_xanhla">
                          <i class="fa-solid fa-upload text-light"></i> &ensp;
                          Upload
                        </button>
                      </div>
                    </div>
                  </form>
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
          <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_bangcap/'.$ma_vc) }}">
            <button type="button" class="btn btn-danger button_do">
              <i class="fa-solid fa-trash text-light"></i>
              &ensp;
              Xoá tất cả
            </button>
          </a>
          {{-- <button class="btn btn-primary button_thongke" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
            <i class="fa-solid fa-chart-simple text-light"></i> &ensp;
            Thống kê
          </button> --}}
          <a href="{{ URL::to('quanlythongtin_bangcap_xuatfile/'.$ma_vc) }}">
            <button type="button" class="btn btn-primary button_xanhla">
              <i class="fa-solid fa-file text-light"></i>
              &ensp;
              Xuất file
            </button>
          </a>
          {{-- <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
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
                <thead>
                  <tr>
                    <th scope="col">Tên</th>
                    <th scope="col">Số lượng</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($count_status as $key => $count_stt)
                    @if ($count_stt->status_bc == 0)
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
          </div> --}}
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <form onsubmit="return check_submit()" action="{{ URL::to('/add_bangcap/'.$ma_vc) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Hệ đào tạo: </th>
                          <td class="was-validated">
                            <select class="custom-select" id="ma_hdt" name="ma_hdt" required>
                              <option value="" >Chọn hệ đào tạo</option>
                              @foreach ($list_hedaotao as $hedaotao )
                                <option value="{{ $hedaotao->ma_hdt }}" >{{ $hedaotao->ten_hdt }}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Loại bằng cấp: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_lbc" required>
                              <option value="" >Chọn loại bằng cấp</option>
                              @foreach ($list_loaibangcap as $loaibangcap )
                                <option value="{{ $loaibangcap->ma_lbc }}" >{{ $loaibangcap->ten_lbc }}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trình độ chuyên môn: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="trinhdochuyenmon_bc">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trường học: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="truonghoc_bc">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Niên khoá: </th>
                          <td class="was-validated">
                            <div class="row">
                              <div class="col-5">
                                <input id="tunam_bc" type='number' class='form-control input_table' autofocus required name="tunam_bc" min="1500"  max="<?php $date = getdate(); echo $date['year'] ?>">
                              </div>
                              <div class="col-2">
                                <p class="mt-1 fw-bold text-center">Đến</p>
                              </div>
                              <div class="col-5">
                                <input id="dennam_bc" type='number' class='form-control input_table' autofocus required name="dennam_bc" min="1500"  max="<?php $date = getdate(); echo $date['year'] ?>">
                                <span id="baoloi_nienkhoa" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Số bằng: </th>
                          <td class="was-validated">
                            <input id="sobang_bc" type='number' class='form-control input_table' autofocus required name="sobang_bc" min="1">
                            <span id="baoloi" style="color: #FF1E1E; font-size: 14px; font-weight: bold"></span>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày cấp bằng: </th>
                          <td class="was-validated">
                            <?php 
                              use Illuminate\Support\Carbon;
                              Carbon::now('Asia/Ho_Chi_Minh'); 
                              $now = Carbon::parse(Carbon::now())->format('Y-m-d');
                              ?>
                              <input type='date' class='form-control input_table' autofocus required name="ngaycap_bc" max="<?php echo $now ?>">
                              <?php
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Nơi cấp: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="noicap_bc">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Xếp hạng: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="xephang_bc">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">File bằng cấp: </th>
                          <td class="was-validated">
                            <input type='file' class='form-control input_table' name="file_bc" required>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_bc">
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
                      <button type="submit"  class="btn btn-primary button_xanhla them" style="width: 100%;">
                        <i class="fas fa-plus-square text-light"></i>
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
    <form action="{{ URL::to('/delete_bangcap_check') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">STT</th>
            <th class="text-light" scope="col">Loại bằng cấp</th>
            <th class="text-light" scope="col">Hệ đào tạo</th>
            <th class="text-light" scope="col">Trình độ chuyên môn</th>
            <th class="text-light" scope="col">Thông tin băn cấp</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody  >
          @foreach ($list as $key => $bangcap)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_bc[{{ $bangcap->ma_bc }}]" value="{{ $bangcap->ma_bc }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                {{ $bangcap->ten_lbc }}
              </td>
              <td>
                {{ $bangcap->ten_hdt }}
              </td>
              <td>
                {{ $bangcap->trinhdochuyenmon_bc }}
              </td>
              <td>
                <b>Trường học: </b>{{ $bangcap->truonghoc_bc }} <br>
                <b>Niên khoá: </b>{{ $bangcap->tunam_bc }} - {{ $bangcap->dennam_bc }} <br>
                <b>Số bằng: </b>{{ $bangcap->sobang_bc }} <br>
                <b>Ngày cấp bằng: </b> {{ $bangcap->ngaycap_bc }} <br>
                <b>Nơi cấp: </b> {{ $bangcap->noicap_bc }} <br>
                <b>Xếp loại tốt nghiệp: </b>{{ $bangcap->xephang_bc }} <br>
                @if ($bangcap->file_bc)
                  <a href="{{ asset('public/uploads/bangcap/'.$bangcap->file_bc) }}" style="color: #000D6B; font-weight: bold">
                    <i class="fa-solid fa-file" style="color: #000D6B; font-weight: bold"></i>
                    File kết quả
                  </a>
                @else
                  <span style="color: #FF1E1E; font-weight: bold">Chưa cập nhật file</span>
                @endif
              </td>
              <td>
                <?php
                  if($bangcap->status_bc == 0){
                    ?>
                      <span class="badge rounded-pill text-bg-success"><i class="fas fa-solid fa-eye"></i>&ensp;  Hiển thị</span>
                    <?php
                  }else if($bangcap->status_bc == 1) {
                    ?>
                      <span class="badge text-bg-danger"><i class="fas fa-solid fa-eye-slash"></i>&ensp; Ẩn</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 27%;">
                <a href="{{ URL::to('/edit_bangcap/'.$bangcap->ma_bc.'/'.$ma_vc)}}">
                  <button type="button" class=" btn btn-warning button_cam">
                    <i class="fa-solid fa-pen-to-square text-light"></i>
                    &ensp; Cập nhật
                  </button>
                </a>
                <input class="ma_bc{{ $bangcap->ma_bc }}" type="hidden" value="{{ $bangcap->ma_bc }}">
                <button type="button" class=" xoa{{ $bangcap->ma_bc }} btn btn-danger button_do"><i class="fa-solid fa-trash text-light"></i> &ensp;Xoá</button>
                <?php
                  if($bangcap->status_bc == 0){
                    ?>
                      <a href="{{ URL::to('/select_bangcap/'.$bangcap->ma_bc) }}">
                        <button type="button" class="btn btn-secondary fw-bold">
                          <i class="fa-solid fa-eye-slash text-light"></i> 
                          &ensp; Ẩn
                        </button>
                      </a>
                    <?php
                  }else if($bangcap->status_bc == 1) {
                    ?>
                      <a href="{{ URL::to('/select_bangcap/'.$bangcap->ma_bc) }}">
                        <button type="button" class="btn btn-success fw-bold">
                          <i class="fa-solid fa-eye text-light"></i>
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
      <button  type="submit" class="btn btn-danger button_do xoa_check">
        <i class="fa-solid fa-trash text-light"></i>
        &ensp;
        Xoá
      </button>
    </form>
  </div>
</div>
{{-- ajax --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
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
  @foreach ($list as $key => $bangcap)
    document.querySelector('.xoa{{ $bangcap->ma_bc }}').addEventListener('click', (event)=>{
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
        confirmButtonText: '<i class="fa-solid fa-trash text-light"></i> &ensp;  Xoá',
        cancelButtonText: '<i class="fa-solid fa-xmark text-light"></i> &ensp;  Huỷ',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          var id= $('.ma_bc{{ $bangcap->ma_bc }}').val();
          $.ajax({
            url:"{{ url("/delete_bangcap") }}", 
            type: "GET", 
            data: {id:id},
          });
          swalWithBootstrapButtons.fire(
            'Xoá thành công',
            'Dữ liệu của bạn đã được xoá.',
            'success'
          )
          location.reload();
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Đã huỷ',
            'Dữ liệu được an toàn',
            'error'
          )
          location.reload();
        }
      })
      
    });
  @endforeach
  
</script>
<script>
  $(document).ready(function(){
    $('#sobang_bc').mouseout(function(){
      var sobang_bc = $(this).val();
      var ten = '';
      // alert(sobang_bc);
      $.ajax({
        url:"{{ url("/check_sobang_bc") }}",
        type:"GET",
        data:{sobang_bc:sobang_bc},
        success:function(data){
          if(data == 1){  
            $('#baoloi').html('Số bằng đã tồn tại');
            $('#sobang_bc').val('');
          }else{
            $('#baoloi').html(''); 
          }
        }
      });
    });
  });
</script>
<script language="javascript">
  function check_submit()
  {
    let tunam_bc = document.getElementById("tunam_bc");
    var dennam_bc = document.getElementById("dennam_bc");
    var number_input = '';
    if(tunam_bc.value >= dennam_bc.value){
      $('#baoloi_nienkhoa').html('Năm kết thúc niên khoá phải lớn hơn năm bắt đầu niên khoá'); 
      dennam_bc.value = number_input.value;
      return false;
    }
    return true; 
  }
</script>
<!--  -->
@endsection
