<!doctype html>
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
        </form><!-- form -->
      </section><!-- content -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>