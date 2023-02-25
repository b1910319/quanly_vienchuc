@extends('layout')
@section('content')
  <div class="card-box">
    <div class="alert alert-success row" role="alert">
      <a href="{{ URL::to('/kyluat_add/'.$ma_vc) }}" class="col-1">
        <button type="button" class="btn btn-warning">
          <i class="fas fa-solid fa-caret-left"></i>&ensp;
        </button> &ensp;
      </a>
      <h4 class="text-center col-10 mt-1" style="font-weight: bold">CẬP NHẬT THÔNG TIN</h4>
    </div>
    <form action="{{ URL::to('/update_kyluat/'.$edit->ma_kl.'/'.$edit->ma_vc) }}" method="POST"
      autocomplete="off" enctype="multipart/form-data">
      {{ csrf_field() }}
      <?php
        $message=session()->get('message');
        if($message){
          ?>
            <p style="color: #379237" class="font-weight-bold text-center">
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
                <th scope="row">Loại kỷ luật: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="ma_lkl">
                    <option value="0" >Chọn loại kỷ luật</option>
                    @foreach ($list_loaikyluat as $loaikyluat )
                      <option
                      @if ($edit->ma_lkl == $loaikyluat->ma_lkl)
                        selected
                      @endif
                        value="{{ $loaikyluat->ma_lkl }}" >{{ $loaikyluat->ten_lkl }}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
                <th scope="row">Ngày kỷ luật: </th>
                <td class="was-validated">
                  <input type='date' class='form-control input_table' autofocus required name="ngay_kl" value="{{ $edit->ngay_kl }}">
                </td>
              </tr>
              <tr>
                <th scope="row">Trạng thái: </th>
                <td class="was-validated">
                  <select class="custom-select input_table" id="gender2" name="status_kl">
                    <option value="0" >Chọn trạng thái</option>
                    @if ($edit->status_kl == 1)
                      <option selected value="1" >Ẩn</option>
                      <option value="0" >Hiển thị</option>
                    @else
                      <option value="0" selected >Hiển thị</option>
                      <option value="1" >Ẩn</option>
                    @endif
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">Lý do kỷ luật: </th>
                <td class="was-validated">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="lydo_kl">
                    {{ $edit->lydo_kl }}
                  </textarea>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row mb-2">
          <div class="col-6"></div>
          <div class="col-6">
            <button type="submit" class="btn btn-outline-success font-weight-bold">
              <i class="fa-solid fa-pen-to-square"></i>
              Cập nhật
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection