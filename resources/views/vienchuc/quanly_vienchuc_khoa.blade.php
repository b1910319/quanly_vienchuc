@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="mt-3"></div>
    <div class="alert alert-success" role="alert">
      <div class="row">
        <h4 class="text-center" style="font-weight: bold">DANH SÁCH</h4>
      </div>
    </div>
    <div class="row">
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
                  @if ($count_stt->status_vc == 0)
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
      {{-- <div class="col-2">
        <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_khoa') }}">
          <button type="button" class="btn btn-danger">Xoá tất cả</button>
        </a>
      </div> --}}
      <div class="col-2">
        <div class="dropdown" >
          <button class="dropbtn">Sắp xếp</button>
          <div class="dropdown-content">
            @foreach ($list_khoa as $khoa )
              <a href="{{ URL::to('/search_vienchuc_khoa/'.$khoa->ma_k) }}">{{ $khoa->ten_k }}</a>
            @endforeach
            <a href="{{ URL::to('quanly_vienchuc_khoa') }}">Tất cả</a>
          </div>
        </div>
      </div>
    </div>
    <table class="table" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Thông tin viên chức</th>
          <th scope="col">Khoa</th>
          <th scope="col">Quản lý</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody  >
        @foreach ($list as $key => $vienchuc)
          <tr >
            <th scope="row">{{ $key+1 }}</th>
            <td>
              {{ $vienchuc->hoten_vc }}
              <br>
              {{ $vienchuc->user_vc }}
            </td>
            <td>
              {{ $vienchuc->ten_k }}
            </td>
            <td class="was-validated" style="width: 25%">
              <form action="{{ URL::to('update_khoa_vc') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-8">
                    <input type="hidden" name="ma_vc" value="{{ $vienchuc->ma_vc }}">
                    <select class="custom-select input_table" id="gender2" name="ma_k">
                      <option value="0" >Chọn khoa cần cập nhật</option>
                      @foreach ($list_khoa as $khoa)
                        <option value="{{ $khoa->ma_k }}" >{{ $khoa->ten_k }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-4">
                    <button type="submit" class="btn btn-outline-success font-weight-bold">
                      <i class="fa-solid fa-pen-to-square"></i>
                      Cập nhật
                    </button>
                  </div>
                </div>
              </form>
              
            </td>
            <td style="width: 21%;">
              <a href="{{ URL::to('/edit_vienchuc/'.$vienchuc->ma_vc)}}">
                <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> &ensp; Cập nhật</button>
              </a>
              <a  onclick="return confirm('Bạn có muốn xóa danh mục không?')" href="{{ URL::to('/admin_delete_vienchuc/'.$vienchuc->ma_vc)}}">
                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i> &ensp;Xoá</button>
              </a>
              <?php
                if($vienchuc->status_vc == 0){
                  ?>
                    <a href="{{ URL::to('/admin_select_vienchuc/'.$vienchuc->ma_vc) }}">
                      <button type="button" class="btn btn-secondary">
                        <i class="fa-solid fa-eye-slash"></i> 
                        &ensp; Ẩn
                      </button>
                    </a>
                  <?php
                }else if($vienchuc->status_vc == 1) {
                  ?>
                    <a href="{{ URL::to('/admin_select_vienchuc/'.$vienchuc->ma_vc) }}">
                      <button type="button" class="btn btn-success">
                        <i class="fa-solid fa-eye"></i>
                        &ensp; Hiển thị
                      </button>
                    </a>
                  <?php
                }else if($vienchuc->status_vc == 2) {
                  ?>
                    <button type="button" class="btn btn-success" style="background-color: #850000; border: none;">
                      Nghĩ hưu
                    </button>
                  <?php
                }
              ?>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
