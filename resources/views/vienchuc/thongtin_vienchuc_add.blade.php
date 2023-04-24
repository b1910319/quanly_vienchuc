@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="mt-3"></div>
    <div class="alert alert-light color_alert" role="alert">
      ________THÔNG TIN VỀ VIÊN CHỨC________
    </div>
    <form action="{{ URL::to('/quanlythongtin_xuatfile') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table class="table" id="mytable">
        <thead class="color_table">
          <tr>
            <th class="text-light" scope="col"></th>
            <th class="text-light" scope="col">#</th>
            <th class="text-light" scope="col">Tên </th>
            <th class="text-light" scope="col">Email</th>
            <th class="text-light" scope="col">Khoa</th>
            <th class="text-light" scope="col">Trạng thái</th>
            <th class="text-light" scope="col"></th>
          </tr>
        </thead>
        <tbody  >
          @foreach ($list_vienchuc as $key => $vienchuc)
            <tr >
              <td style="width: 5%">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox"  name="ma_vc[{{ $vienchuc->ma_vc }}]" value="{{ $vienchuc->ma_vc }}">
                </div>
              </td>
              <th scope="row">{{ $key+1 }}</th>
              <td>
                {{ $vienchuc->hoten_vc }} ({{ $vienchuc->ma_vc }})
              </td>
              <td>{{ $vienchuc->user_vc }}</td>
              <td>
                {{ $vienchuc->ten_k }} ({{ $vienchuc->ma_k }})
              </td>
              <td>
                <?php
                  if($vienchuc->status_vc == 0){
                    ?>
                      <span class="badge badge-light-success">
                        <i class="fa-solid fa-unlock-keyhole"></i>&ensp;  Kích hoạt
                      </span>
                    <?php
                  }else if($vienchuc->status_vc == 1) {
                    ?>
                      <span class="badge badge-light-danger">
                        <i class="fa-solid fa-lock"></i>
                        &ensp; Vô hiệu hoá</span>
                    <?php
                  }elseif ($vienchuc->status_vc == 2) {
                    ?>
                      <span class="badge badge-light-warning">
                        <i class="fa-solid fa-toggle-off"></i>
                        &ensp; Nghĩ hưu</span>
                    <?php
                  }
                ?>
              </td>
              <td style="width: 35%">
                <a href="{{ URL::to('/thongtin_vienchuc_edit/'.$vienchuc->ma_vc) }}">
                  <button type="button" class="btn btn-warning button_cam">
                    <i class="fa-solid fa-pen-to-square text-light"></i>
                    &ensp; Cập nhật
                  </button>
                </a>
                <?php
                  foreach ($count_quanhe_giadinh as $key => $count) {
                    if($count->ma_vc == $vienchuc->ma_vc && $count->sum > 0){
                      ?>
                        <a href="{{ URL::to('/giadinh/'.$vienchuc->ma_vc) }}">
                          <button type="button" class="btn btn-primary position-relative button_xanhla">
                            <i class="fa-solid fa-people-roof text-light"></i> &ensp;
                            Thành viên gia đình
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                              <?php echo $count->sum ?>
                              <span class="visually-hidden">unread messages</span>
                            </span>
                          </button>
                        </a>
                      <?php
                    }elseif ($count->ma_vc == $vienchuc->ma_vc && $count->sum == 0) {
                      ?>
                        <a href="{{ URL::to('/giadinh/'.$vienchuc->ma_vc) }}">
                          <button type="button" class="btn btn-primary position-relative button_xanhla">
                            <i class="fa-solid fa-people-roof text-light"></i> &ensp;
                            Thành viên gia đình
                          </button>
                        </a>
                      <?php
                    }
                  }
                ?>
                <?php
                  foreach ($count_bangcap as $key => $count) {
                    if($count->ma_vc == $vienchuc->ma_vc && $count->sum > 0){
                      ?>
                        <a href="{{ URL::to('/bangcap/'.$vienchuc->ma_vc) }}">
                          <button type="button" class="btn btn-primary position-relative button_xanhla">
                            <i class="fa-solid fa-layer-group text-light"></i> &ensp;
                            Bằng cấp
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                              <?php echo $count->sum ?>
                              <span class="visually-hidden">unread messages</span>
                            </span>
                          </button>
                        </a>
                      <?php
                    }elseif ($count->ma_vc == $vienchuc->ma_vc && $count->sum == 0) {
                      ?>
                        <a href="{{ URL::to('/bangcap/'.$vienchuc->ma_vc) }}">
                          <button type="button" class="btn btn-primary position-relative button_xanhla">
                            <i class="fa-solid fa-layer-group text-light"></i> &ensp;
                            Bằng cấp
                          </button>
                        </a>
                      <?php
                    }
                  }
                ?>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <button type="submit" class="btn btn-warning fw-bold button_do">
        <i class="fa-solid fa-file-pdf text-light"></i>
        &ensp;
        Xuất file PDF
      </button>
    </form>
  </div>
</div>
@endsection
