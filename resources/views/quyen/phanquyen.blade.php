@extends('layout')
@section('content')
<div class="row">
  <div class="card-box">
    <div class="mt-3"></div>
    <div class="alert alert-light" role="alert" style="background-color: #3F979B; color: white; text-align: center; font-weight: bold; font-size: 20px">
      ________PHÂN QUYỀN CHO VIÊN CHỨC________
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
    <table class="table" id="mytable">
      <thead class="table-secondary">
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
                        <span class="badge rounded-pill text-bg-success" style="font-size: 12px">
                          {{ $phanquyen->ten_q }}
                        </span>
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
                    <button type="submit"  class="btn btn-primary font-weight-bold" style="background-color: #379237; border: none;">
                      <i class="fas fa-plus-square"></i>
                      &ensp;
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
