@extends('layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public\assets\css\form_login.css') }}">
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <div class="card-box" style="background-image: url('public/assets/images/background.jpg');background-repeat: no-repeat; background-size:cover;">
      <form action="{{ URL::to('/doi_matkhau') }}" method="POST">
        {{ csrf_field() }}
        <div class="login pt-2" >
          <h1 style="text-align: center; font-weight: bold; text-transform: uppercase; color: white">
            ĐỔI MẬT KHẨU
          </h1>
          <div class="music-waves-2" style="margin-left: 260px">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
              <p style="color: white; font-weight: bold; background-color: #E71414; border-radius: 20px; " class=" text-center" id="message"></p>
            </div>
            <div class="col-3"></div>
          </div>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
              <div class="mb-3">
                <input type="hidden" name="user_vc" class="form-control text-dark fw-bold" placeholder="name@example.com" required="" id="user_vc" value="{{ $vienchuc->user_vc }}">
                <label for="username" class="form-label" style="color: white; font-weight: bold; font-size: 18px;">Mật khẩu củ</label>
                <input type="password" name="pass_cu" class="form-control text-dark fw-bold" placeholder="Password" required="" id="pass_cu" >
              </div>
            </div>
            <div class="col-2"></div>
          </div>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
              <div class="mb-3">
                <label for="username" class="form-label" style="color: white; font-weight: bold; font-size: 18px;">Mật khẩu mới</label>
                <input type="password" name="pass_moi" class="form-control text-dark fw-bold" placeholder="Password" required="" id="pass_moi" >
              </div>
            </div>
            <div class="col-2"></div>
          </div>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
              <div class="mb-3">
                <label for="username" class="form-label" style="color: white; font-weight: bold; font-size: 18px;">Xác nhận mật khẩu mới</label>
                <input type="password" name="xacnhan_pass_moi" class="form-control text-dark fw-bold" placeholder="Password" required="" id="xacnhan_pass_moi" >
              </div>
            </div>
            <div class="col-2"></div>
          </div>
          <div class="pb-2 pt-2 text-center">
            <button class="button fw-bold" type="submit" style="font-size: 20px;">
              Cập nhật
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="col-3"></div>
</div>
<!-- end row -->

<!-- end row -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('#pass_cu').mouseout(function(){
      var pass_cu= $(this).val();
      var user_vc = $('#user_vc').val();
      // alert(pass_cu);
      // alert(user_vc);
      $.ajax({
        url:"{{ url("/check_pass_cu") }}",
        type:"GET",
        data:{pass_cu:pass_cu, user_vc:user_vc},
        success:function(data){
          if(data == 0){   
            $('#message').html('Mật khẩu sai vui lòng nhập lại');  
            $('#pass_cu').val('');
            // location.reload();
          }else{
            $('#message').html(''); 
          }
        }
      });
    });
    $('#xacnhan_pass_moi').mouseout(function(){
      var xacnhan_pass_moi= $(this).val();
      var pass_moi = $('#pass_moi').val();
      // alert(xacnhan_pass_moi);
      // alert(pass_moi);
      if(pass_moi == xacnhan_pass_moi ){
        $('#message').html('');  
      }else{
        $('#message').html('Xác nhận mật khẩu nhập sai vui lòng nhập lại'); 
        $('#xacnhan_pass_moi').val('');
      }
    });
  });
</script>
@endsection
