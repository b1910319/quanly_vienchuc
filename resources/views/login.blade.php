{{-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('public\assets\css\form_login.css') }}">
  </head>
  <body>
    <div class="container">
      <section id="content">
        <form action="{{ URL::to('/login') }}" method="POST">
          {{ csrf_field() }}
          <h1>Đăng Nhập</h1>
          <?php
            $message=session()->get('message');
            if($message){
              ?>
                <p style="color: #CD0404; font-weight: bold" class=" text-center">
                  <?php echo $message ?>
                </p>
              <?php
              session()->put('message',null);
            }
          ?>
          <div class="mt-3">
            <input type="text" name="user_vc" placeholder="Username" required="" id="username" value="trinhb1910319@student.ctu.edu.vn"/>
          </div>
          <div>
            <input type="password" name="pass_vc" placeholder="Password" required="" id="password" value="ldtrinh" />
          </div>
          <div>
            <input type="submit" value="Đăng nhập" />
          </div>
        </form>
      </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
  <meta content="Coderthemes" name="author">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('public\assets\images\favicon.ico') }}">
  {{-- link bootstrap  --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
  {{--  --}}
  <!-- App css -->
  <link href="{{ asset('public\assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public\assets\css\icons.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public\assets\css\app.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public\assets\css\style.css') }}" rel="stylesheet" type="text/css">
  {{-- link font awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  {{--  --}}
  <link rel="stylesheet" href="{{ asset('public\assets\css\form_login.css') }}">
  <title>Đăng nhập</title>
</head>
<body>
  <!-- Begin page -->
  <div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">

    </div>
    <div class="content-page1">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <section id="content">
            <form action="{{ URL::to('/login') }}" method="POST">
              {{ csrf_field() }}
              <h1>Đăng Nhập</h1>
              <?php
                $message=session()->get('message');
                if($message){
                  ?>
                    <p style="color: #CD0404; font-weight: bold" class=" text-center">
                      <?php echo $message ?>
                    </p>
                  <?php
                  session()->put('message',null);
                }
              ?>
              <div class="mt-3">
                <input type="text" name="user_vc" placeholder="Username" required="" id="username" value="trinhb1910319@student.ctu.edu.vn"/>
              </div>
              <div>
                <input type="password" name="pass_vc" placeholder="Password" required="" id="password" value="ldtrinh" />
              </div>
              <div class="ms-3">
                <input type="submit" value="Đăng nhập" />
              </div>
            </form>
          </section>
        </div>
        <div class="col-6">
          <div class="box-title-new">
            <div class="box-title-name-new">
              <span class="null">Thông báo mới</span>
            </div>
          </div>
          <table class="table mt-4">
            <tbody>
              @foreach ($list_lop as $key => $lop )
                <tr>
                  <th scope="row">{{ $key+1 }}</th>
                  <td>{{ $lop->ten_l }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- END wrapper -->
  <!-- Right bar overlay-->
  <!-- Vendor js -->
  {{-- <script src="{{ asset('public\assets\js\vendor.min.js') }}"></script>

  <script src="{{ asset('public\assets\libs\jquery-knob\jquery.knob.min.js') }}"></script>
  <script src="{{ asset('public\assets\libs\peity\jquery.peity.min.js') }}"></script>

  <!-- Sparkline charts -->
  <script src="{{ asset('public\assets\libs\jquery-sparkline\jquery.sparkline.min.js') }}"></script>

  <!-- init js -->
  <script src="{{ asset('public\assets\js\pages\dashboard-1.init.js') }}"></script>

  <!-- App js -->
  <script src="{{ asset('public\assets\js\app.min.js') }}"></script> --}}
</body>

</html>