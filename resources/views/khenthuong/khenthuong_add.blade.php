@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="faqs-page block ">
      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <button role="button" class="item-question collapsed btn btn-primary" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237; border: none;">
            <i class="fa-solid fa-circle-plus"></i> &ensp; Thêm
          </button>
          <div id="collapse1a" class="panel-collapse collapse" role="tabpanel">
            <div class="panel-body mt-3">
              <div class="alert alert-primary" role="alert">
                <h4 class="text-center" style="font-weight: bold">THÊM THÔNG TIN</h4>
              </div>
              <form action="{{ URL::to('/add_khenthuong/'.$ma_vc) }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                {{ csrf_field() }}
                <?php
                  $message=session()->get('message');
                  if($message){
                    ?>
                      <p style="color: #379237" class="fw-bold text-center">
                        <?php echo $message ?>
                      </p>
                    <?php
                    session()->put('message',null);
                  }
                ?>
                <div class="row">
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Loại khen thưởng: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_lkt">
                              <option value="0" >Chọn loại khen thưởng</option>
                              @foreach ($list_loaikhenthuong as $loaikhenthuong )
                                <option value="{{ $loaikhenthuong->ma_lkt }}" >{{ $loaikhenthuong->ten_lkt }}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Hình thức khen thưởng: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="ma_htkt">
                              <option value="0" >Chọn hình thức khen thưởng</option>
                              @foreach ($list_hinhthuckhenthuong as $hinhthuckhenthuong )
                                <option value="{{ $hinhthuckhenthuong->ma_htkt }}" >{{ $hinhthuckhenthuong->ten_htkt }}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Ngày khen thưởng: </th>
                          <td class="was-validated">
                            <input type='date' class='form-control input_table' autofocus required name="ngay_kt">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-6">
                    <table class="table">
                      <tbody>
                        <tr>
                          <th scope="row">Số quyết định khen thưởng: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="soquyetdinh_kt">
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Nội dung khen thưởng: </th>
                          <td class="was-validated">
                            <input type='text' class='form-control input_table' autofocus required name="noidung_kt">
                            </textarea>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Trạng thái: </th>
                          <td class="was-validated">
                            <select class="custom-select input_table" id="gender2" name="status_kt">
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
                    <div class="col-6"></div>
                    <div class="col-6">
                      <button type="submit"  class="btn btn-outline-primary font-weight-bold">
                        <i class="fas fa-plus-square"></i>
                        Thêm
                      </button>
                    </div>
                  </div>
                </div>
              </form>
              <button role="button" class="item-question collapsed btn btn-primary" data-toggle="collapse" href="#collapse1a" aria-expanded="false" aria-controls="collapse1a" style="background-color: #379237; border: none;">
                <i class="fa-solid fa-chevron-up"></i> &ensp; Thu gọn
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-3"></div>
    <div class="alert alert-success" role="alert">
      <div class="row">
        <a href="{{ URL::to('/khenthuong') }}" class="col-1">
          <button type="button" class="btn btn-warning">
            <i class="fas fa-solid fa-caret-left"></i>&ensp;
          </button> &ensp;
        </a>
        <h4 class="text-center col-10 mt-1" style="font-weight: bold">
          DANH SÁCH 
          <span style="color: #379237;">( {{ $vienchuc->hoten_vc }} )</span>
        </h4>
      </div>
    </div>
    <?php
      $message=session()->get('message_update');
      if($message){
        ?>
          <p style="color: #379237" class="fw-bold text-center">
            <?php echo $message ?>
          </p>
        <?php
        session()->put('message_update',null);
      }
    ?>
    {{-- <div class="row">
      <div class="col-2">
        @foreach ($count as $key => $count)
          <p class="fw-bold" style="color: #379237; ">Tổng có: {{ $count->sum }}</p>
        @endforeach
      </div>
      <div class="col-2 mb-3">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="width: 100%">Thống kê</button>
  
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
        </div>
      </div>
      <div class="col-2">
        <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_bangcap/'.$ma_vc) }}">
          <button type="button" class="btn btn-danger">Xoá tất cả</button>
        </a>
      </div>
    </div> --}}
    {{-- <table class="table" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Loại bằng cấp</th>
          <th scope="col">Hệ đào tạo</th>
          <th scope="col">Trạng thái</th>
          <th scope="col">Trình độ chuyên môn</th>
          <th scope="col">Trường học</th>
          <th scope="col">Niên khoá</th>
          <th scope="col">Số bằng</th>
          <th scope="col">Ngày cấp</th>
          <th scope="col">Nơi cấp</th>
          <th scope="col">Xếp hạng</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $bangcap)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $bangcap->ten_lbc }}
            </td>
            <td>
              {{ $bangcap->ten_hdt }}
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
            <td>
              {{ $bangcap->trinhdochuyenmon_bc }}
            </td>
            <td>
              {{ $bangcap->truonghoc_bc }}
            </td>
            <td>
              {{ $bangcap->nienkhoa_bc }}
            </td>
            <td>
              {{ $bangcap->sobang_bc }}
            </td>
            <td>
              {{ $bangcap->ngaycap_bc }}
            </td>
            <td>
              {{ $bangcap->noicap_bc }}
            </td>
            <td>
              {{ $bangcap->xephang_bc }}
            </td>
            <td style="width: 21%;">
              <a href="{{ URL::to('/edit_bangcap/'.$bangcap->ma_bc.'/'.$ma_vc)}}">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> &ensp; Cập nhật</button>
              </a>
              <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/delete_bangcap/'.$bangcap->ma_bc.'/'.$ma_vc)}}">
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              </a>
              <?php
                if($bangcap->status_bc == 0){
                  ?>
                    <a href="{{ URL::to('/select_bangcap/'.$bangcap->ma_bc) }}">
                      <button type="button" class="btn btn-secondary">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Ẩn
                      </button>
                    </a>
                  <?php
                }else if($bangcap->status_bc == 1) {
                  ?>
                    <a href="{{ URL::to('/select_bangcap/'.$bangcap->ma_bc) }}">
                      <button type="button" class="btn btn-success">
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
    </table> --}}
  </div>
</div>
@endsection
