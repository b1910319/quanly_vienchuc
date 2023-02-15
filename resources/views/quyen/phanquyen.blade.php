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
                  @if ($count_stt->status_q == 0)
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
        <a onclick="return confirm('Bạn có muốn xóa tất cả danh mục không?')" href="{{ URL::to('/delete_all_quyen') }}">
          <button type="button" class="btn btn-danger">Xoá tất cả</button>
        </a>
      </div>
    </div> --}}
    <table class="table" id="mytable">
      <thead class="table-dark">
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên </th>
          <th scope="col">UserName</th>
          <th scope="col">Quyền</th>
          <th scope="col">Khoa</th>
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
            <td>{{ $vienchuc->user_vc }}</td>
            <td>
              <div class="row">
                <div class="col-6">
                  <b style="color: #379237">
                    @foreach ($list_phanquyen as $phanquyen)
                      @if ($phanquyen->ma_vc == $vienchuc->ma_vc)
                        {{ $phanquyen->ten_q }}
                        <br>
                      @endif
                    @endforeach
                  </b>
                  
                </div>
                <div class="col-6">
                  <a href="{{ URL::to('lammoi_quyen/'.$vienchuc->ma_vc) }}">
                    <button type="button"  class="btn btn-outline-danger font-weight-bold">
                      <i class="fa-solid fa-rotate"></i>
                      Làm mới
                    </button>
                  </a>
                  
                </div>
              </div>
              
            </td>
            <td>
              {{ $vienchuc->ten_k }}
            </td>
            <td class="was-validated" style="width: 25%">
              <form action="{{ URL::to('phanquyen_vc') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-8">
                    <input type="hidden" name="ma_vc" value="{{ $vienchuc->ma_vc }}">
                    <select class="custom-select input_table" id="gender2" name="ma_q">
                      <option value="0" >Phân quyền</option>
                      @foreach ($list_quyen as $quyen)
                        <option value="{{ $quyen->ma_q }}" >{{ $quyen->ten_q }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-4">
                    <button type="submit"  class="btn btn-outline-primary font-weight-bold">
                      <i class="fas fa-plus-square"></i>
                      Thêm
                    </button>
                  </div>
                </div>
              </form>
              
            </td>

            
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
