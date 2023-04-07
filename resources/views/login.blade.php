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
  {{-- css datatable hỗ trợ tìm kiếm --}}
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  {{--  --}}
    {{-- link jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
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
      <div class="row" style="padding-top: 200px">
        <div class="col-6">
          <div class="card-box" style="background-image: url('https://scontent.fsgn13-3.fna.fbcdn.net/v/t39.30808-6/311382201_438821861685718_5100129695517901539_n.jpg?stp=cp6_dst-jpg&_nc_cat=108&ccb=1-7&_nc_sid=e3f864&_nc_ohc=ioRcPmk_z7MAX9Uxa3h&_nc_ht=scontent.fsgn13-3.fna&oh=00_AfBWaiHHpONbgdEptJp1SqHCmeF5D27yhoITFpBW6KtXtw&oe=6430373D');background-repeat: no-repeat;
          background-size:cover;">
            <form action="{{ URL::to('/login') }}" method="POST">
              {{ csrf_field() }}
              <div class="login pt-2" >
                <h1 style="text-align: center; font-weight: bold; text-transform: uppercase; color: white">
                  Đăng nhập
                </h1>
                <div class="music-waves-2" style="margin-left: 325px">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
                <?php
                  $message=session()->get('message');
                  if($message){
                    ?>
                      <p style="color: #CD0404; font-weight: bold;" class=" text-center">
                        <?php echo $message ?>
                      </p>
                    <?php
                    session()->put('message',null);
                  }
                ?>
                <div class="row mt-1">
                  <div class="col-2"></div>
                  <div class="col-8">
                    <div class="mb-3">
                      <label for="username" class="form-label" style="color: white; font-weight: bold; font-size: 18px;">Email</label>
                      <input type="email" name="user_vc" class="form-control text-dark fw-bold" placeholder="name@example.com" required="" id="username" value="trinhb1910319@student.ctu.edu.vn">
                    </div>
                  </div>
                  <div class="col-2"></div>
                </div>
                <div class="row">
                  <div class="col-2"></div>
                  <div class="col-8">
                    <div class="mb-3">
                      <label for="username" class="form-label" style="color: white; font-weight: bold; font-size: 18px;">Password</label>
                      <input type="password" name="pass_vc" class="form-control text-dark fw-bold" placeholder="Password" required="" id="password" value="ldtrinh">
                    </div>
                  </div>
                  <div class="col-2"></div>
                </div>
                <div class="row">
                  <div class="col-2"></div>
                  <div class="col-8">
                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                    @if($errors->has('g-recaptcha-response'))
                      <span class="invalid-feedback" style="display:block">
                        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="col-2"></div>
                </div>
                <div class="pb-2 pt-2 text-center">
                  <button class="button fw-bold" type="submit" style="font-size: 20px;">
                    Đăng nhập
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-6">
          <div class="card-box">
            <h4 class="header-title mb-3 text-center" style="color: #155263; font-weight: bold; font-size: 22px; text-transform: uppercase; ">
              Các lớp học hiện đang được mở
            </h4>
            <div class="table-responsive">
              <table class="table  table-hover" id="mytable">
                <thead class="color_table">
                  <tr >
                    <th class="text-light">Tên lớp</th>
                    <th class="text-light">Hạn nộp hồ sơ</th>
                    <th class="text-light">Cơ sở đào tạo</th>
                    <th class="text-light">Chi tiết</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($list_lop as $key => $lop )
                    <tr>
                      <td>
                        <h5 class="m-0 font-weight-normal">
                          {{ $lop->ten_l }}
                        </h5>
                      </td>
                      <td style="width: 18%">
                        <?php 
                        $han_dangky = strtotime ( '-2 month' , strtotime ( $lop->ngaybatdau_l ) ) ;
                        $han_dangky = date ( 'Y-m-j' , $han_dangky );
                        ?>
                          <span class="badge badge-light-danger" style="font-size: 16px">
                            <?php 
                              echo $han_dangky;
                            ?>
                          </span>
                        <?php
                      ?>
                      </td>
                      <td>
                        {{ $lop->tencosodaotao_l }}
                      </td>
                      <td style="width: 18%">
                        <button type="button" class="btn btn-primary luotxem_l{{ $key+1 }} btn_chitiet fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $lop->ma_l }}">
                          <input type="hidden" class="ma_l{{ $key+1 }}" value="{{ $lop->ma_l }}">
                          <i class="fa-solid fa-circle-info text-light"></i>
                          &ensp;
                          Chi tiết
                        </button>
                        <div class="modal fade" id="exampleModal{{ $lop->ma_l }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $lop->ten_l }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <table class="table table-borderless table-hover table-centered m-0">
                                  <tbody>
                                    <tr>
                                      <td style="width: 20%;">
                                        <h5 class="m-0 font-weight-normal">Tên lớp</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->ten_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Ngày bắt đầu</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->ngaybatdau_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Ngày kết thúc</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->ngayketthuc_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Yêu cầu</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->yeucau_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Tên cơ sở đào tạo</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->tencosodaotao_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Quốc gia đào tạo</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->quocgiaodaotao_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Ngành học</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->nganhhoc_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Trình độ đào tạo</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->trinhdodaotao_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Nguồn kinh phí</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->nguonkinhphi_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Địa chỉ đào tạo</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->diachidaotao_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Nội dung học</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->noidunghoc_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Email cơ sở</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->emailcoso_l }}
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <h5 class="m-0 font-weight-normal">Số điện thoại cơ sở</h5>
                                      </td>
                        
                                      <td>
                                        {{ $lop->sdtcoso_l }}
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
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
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <ul class="icons">
        <li>
          <a href="{{ URL::to('home') }}">
            <i class="fa-solid fa-house"></i>
          </a>
        </li>
        <li>
          <a href="https://www.facebook.com/CICT.CTU">
            <i class="fa-brands fa-facebook"></i>
          </a>
        </li>
        <li>
          <a href="https://www.cit.ctu.edu.vn/">
            <i class="fa-brands fa-google"></i>
          </a>
        </li>
      </ul>
      <ul class="menu">
        <li><a href="{{ URL::to('home') }}">Home</a></li>
        <li><a href="https://www.facebook.com/CICT.CTU">Facebook</a></li>
        <li><a href="https://www.cit.ctu.edu.vn/">Google</a></li>
      </ul>
      <div class="footer-copyright">
        <p class="text-light">Trường Công nghệ Thông tin & Truyền thông - Trường Đại học Cần Thơ.</p>
        <p class="text-light">Khu 2, đường 3/2, Phường Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ, Việt Nam.</p>
        <p class="text-light">Điện thoại: 84 0292 3 734713 - 0292 3 831301; Fax: 84 0292 3830841; Email: office@cit.ctu.edu.vn.</p>
      </div>
    </footer>
  </div>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  {{-- datatable hỗ trợ tìm kiếm --}}
  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#mytable').DataTable({
            language: {
              search: "Tìm kiếm",
              lengthMenu: "Số bản ghi trên 1 trang _MENU_ ",
              info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_ bản ghi",
              infoEmpty: "Khi không có dữ liệu, Hiển thị 0 bản ghi trong 0 tổng cộng 0 ",
              infoFiltered: "(_MAX_)",
              loadingRecords: "",
              zeroRecords: "Không tìm thấy bản ghi phù hợp",
              emptyTable: "Không có dữ liệu",
              paginate: {
                  first: "Trang đầu",
                  previous: "Trang trước",
                  next: "Trang sau",
                  last: "Trang cuối"
              },
            },
          });
      });
  </script>
  <script>
    $(document).ready(function(){
      @foreach ($list_lop as $key => $lop )
        $('.luotxem_l{{ $key+1 }}').click(function(){
          var id= $('.ma_l{{ $key+1 }}').val();
          // alert(id)
          $.ajax({
            url:"{{ url("/lop_luotxem") }}",
            type:"GET",
            data:{id:id},
          });
        });
      @endforeach
    });
  </script>
  {{--  --}}
</body>

</html>