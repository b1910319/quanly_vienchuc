@extends('layout')
@section('content')
<div class="row">
  <div class="card-box col-12">
    <div class="row">
      <div class="col-6">
        <p class="fw-bold" style="font-size: 18px;">Thống kê viên chức </p>
      </div>
    </div>
    <div class="col-2">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #379237; border: none; width: 100%">
        <i class="fa-solid fa-filter"></i>
        &ensp;
        Bộ lọc
      </button>
      <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100%;">
        <div class="modal-dialog modal-dialog-scrollabl modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Bộ lọc</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ URL::to('thongke_qltt_loc') }}" method="post">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="row">
                  <span style="font-weight: bold; font-size: 20px;">Khoa</span>
                  @foreach ($list_khoa as $key => $khoa)
                    <div class="col-3">
                      <input type="radio" class="radio" name="ma_k" id="size_{{ $key+1 }}" value="{{ $khoa->ma_k }}"/>
                      <label class="label" for="size_{{ $key+1 }}">{{ $khoa->ten_k }}</label>
                    </div>
                  @endforeach
                </div>
                <div class="row">
                  <span style="font-weight: bold; font-size: 20px;">Chức vụ</span>
                  @foreach ($list_chucvu as $key => $chucvu)
                    <div class="col-3">
                      <input type="radio" class="radio" name="ma_cv" id="size_{{ $chucvu->created_cv }}" value="{{ $chucvu->ma_cv }}"/>
                      <label class="label" for="size_{{ $chucvu->created_cv }}">{{ $chucvu->ten_cv }}</label>
                    </div>
                  @endforeach
                </div>
                <div class="row">
                  <span style="font-weight: bold; font-size: 20px;">Hệ đào tạo</span>
                  @foreach ($list_hedaotao as $key => $hedaotao)
                    <div class="col-3">
                      <input type="radio" class="radio" name="ma_hdt" id="size_{{ $hedaotao->created_hdt }}" value="{{ $hedaotao->ma_hdt }}"/>
                      <label class="label" for="size_{{ $hedaotao->created_hdt }}">{{ $hedaotao->ten_hdt }}</label>
                    </div>
                  @endforeach
                </div>
                <div class="row">
                  <span style="font-weight: bold; font-size: 20px;">Loại bằng cấp</span>
                  @foreach ($list_loaibangcap as $key => $loaibangcap)
                    <div class="col-3">
                      <input type="radio" class="radio" name="ma_lbc" id="size_{{ $loaibangcap->created_lbc }}" value="{{ $loaibangcap->ma_lbc }}"/>
                      <label class="label" for="size_{{ $loaibangcap->created_lbc }}">{{ $loaibangcap->ten_lbc }}</label>
                    </div>
                  @endforeach
                </div>
                {{-- <div class="row mt-1">
                  <span style="font-weight: bold; font-size: 20px;">Hưu</span>
                  <div class="col-4 mt-1">
                    <select class="custom-select input_table" id="gender2" name="ma_k">
                      <option value="0" >Chọn khoa</option>
                      @foreach ($list_khoa as $khoa)
                        <option value="{{ $khoa->ma_k }}" >{{ $khoa->ten_k }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-4 mt-1">
                    <input type='date' class='form-control input_table' autofocus name="batdau">
                  </div>
                  <div class="col-4 mt-1">
                    <input type='date' class='form-control input_table' autofocus name="ketthuc">
                  </div>
                </div> --}}
                <div class="row mt-2">
                  <div class="col-4">
                    <span style="font-weight: bold; font-size: 20px;">Ngạch</span>
                    <div class="mt-2">
                      <select class="custom-select input_table" id="gender2" name="ma_n">
                        <option value="0" >Chọn ngạch viên chức</option>
                        @foreach ($list_ngach as $ngach)
                          <option value="{{ $ngach->ma_n }}" >{{ $ngach->ten_n }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <span style="font-weight: bold; font-size: 20px;">Quê quán</span>
                    <div class="mt-2">
                      <select class="custom-select input_table" id="gender2" name="ma_t">
                        <option value="0" >Chọn tỉnh\thành phố</option>
                        @foreach ($list_tinh as $tinh)
                          <option value="{{ $tinh->ma_t }}" >{{ $tinh->ten_t }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <span style="font-weight: bold; font-size: 20px;">Dân tộc</span>
                    <div class="mt-2">
                      <select class="custom-select input_table" id="gender2" name="ma_dt">
                        <option value="0" >Chọn dân tộc</option>
                        @foreach ($list_dantoc as $dantoc)
                          <option value="{{ $dantoc->ma_dt }}" >{{ $dantoc->ten_dt }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-4">
                    <span style="font-weight: bold; font-size: 20px;">Tôn giáo</span>
                    <div class="mt-2">
                      <select class="custom-select input_table" id="gender2" name="ma_tg">
                        <option value="0" >Chọn tôn giáo của viên chức</option>
                        @foreach ($list_tongiao as $tongiao)
                          <option value="{{ $tongiao->ma_tg }}" >{{ $tongiao->ten_tg }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <span style="font-weight: bold; font-size: 20px;">Thương binh</span>
                    <div class="mt-2">
                      <select class="custom-select input_table" id="gender2" name="ma_tb">
                        <option value="0" >Hạng thương binh</option>
                        @foreach ($list_thuongbinh as $thuongbinh)
                          <option value="{{ $thuongbinh->ma_tb }}" >{{ $thuongbinh->ten_tb }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">
                  <i class="fa-solid fa-filter"></i>
                  &ensp;
                  Lọc
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="myfirstchart_qltt_1" style="height: 250px;"></div>
    @if ($list != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Ngạch</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_n }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_pdf') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
    @if ($list_all != '')
      <table class="table" id="mytable">
        <thead class="table-dark">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Thông tin viên chức </th>
            <th scope="col">Khoa</th>
            <th scope="col">Ngạch</th>
          </tr>
        </thead>
        <tbody  >
          @foreach($list_all as $key => $vc)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>
                <div class="row ">
                  <div class="col-md-12">
                    <div class="scrollspy-example" data-bs-spy="scroll" data-bs-target="#lex" id="work" data-offset="20"
                      style="height: 100px; overflow: auto;">
                      <p>
                        <b> Tên viên chức:</b> {{ $vc->hoten_vc }} <br>
                        <b> Số điện thoại:</b> {{ $vc->sdt_vc }} <br>
                        <b> Email: </b> {{ $vc->user_vc }} <br>
                        <b> Ngày sinh: </b> {{ $vc->ngaysinh_vc }} <br>
                        <b> Giới tính: </b>
                        @if ($vc->giotinh_vc == 0)
                          Nam
                        @else
                          Nữ
                        @endif
                        <br>
                        <b> Địa chỉ hiện tại: </b> {{ $vc->hientai_vc }} <br>
                        <b> Địa chỉ thường trú: </b> {{ $vc->thuongtru_vc }} <br>
                        <b> Trình độ phổ thông: </b> {{ $vc->trinhdophothong_vc }} <br>
                        <b> Ngoại ngữ: </b> {{ $vc->ngoaingu_vc }} <br>
                        <b> Tin học: </b> {{ $vc->tinhoc_vc }} <br>
                        <b> Ngày vào đảng: </b> {{ $vc->ngayvaodang_vc }} <br>
                        <b> Ngày chính thức: </b> {{ $vc->ngaychinhthuc_vc }} <br>
                        <b> Ngày bắt đầu làm việc: </b> {{ $vc->ngaybatdaulamviec_vc }} <br>
                        <b> Chức vụ: </b> {{ $vc->ten_cv }} <br>
                        <b> Dân tộc: </b> {{ $vc->ten_dt }} <br>
                        <b> Tôn giáo: </b> {{ $vc->ten_tg }} <br>
                      </p>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{ $vc->ten_k }}</td>
              <td>{{ $vc->ten_n }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="col-2">
          <a href="{{ URL::to('/thongke_qltt_loc_all_pdf/'.$ma_k.'/'.$ma_cv.'/'.$ma_hdt.'/'.$ma_lbc.'/'.$ma_n.'/'.$ma_t.'/'.$ma_dt.'/'.$ma_tg.'/'.$ma_tb.'/') }}">
            <button type="button" class="btn btn-primary" style="background-color: #379237; border: none; width: 100%"><i class="fa-solid fa-file-arrow-down"></i> &ensp;Xuất file</button>
          </a>
        </div>
      </div>
    @endif
  </div>
</div>
<script>
  $(document).ready(function(){
    // Thống kê viên chức theo loại khen thưởng
    new Morris.Bar({
      element: 'myfirstchart_qltt_1',
      pointFillColors: ['#F94A29'],
      parseTime: false,
      hideHover:true,
      barColors: ['#FF6363'],
      data: [
        <?php
          if($count){
            foreach ($count as $key => $count){
              foreach($list_khoa as $key => $khoa){
                if($count->ma_k == $khoa->ma_k){
                  $ten_k = $khoa->ten_k;
                  $tong = $count->sum;
                  echo "{ year: '$ten_k', value: $tong },";
                }
              }
            }
          }
          // else if($count_ngach_ma_n){
          //   foreach ($count_ngach_ma_n as $key => $count){
          //     foreach($list_ngach as $key => $ngach){
          //       if($count->ma_n == $ngach->ma_n){
          //         $ten_n = $ngach->ten_n;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_n', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_loaibangcap){
          //   foreach ($count_loaibangcap as $key => $count){
          //     foreach($list_loaibangcap as $key => $loaibangcap){
          //       if($count->ma_lbc == $loaibangcap->ma_lbc){
          //         $ten_lbc = $loaibangcap->ten_lbc;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lbc', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_lbc){
          //   foreach ($count_lbc as $key => $count){
          //     foreach($list_loaibangcap as $key => $loaibangcap){
          //       if($count->ma_lbc == $loaibangcap->ma_lbc){
          //         $ten_lbc = $loaibangcap->ten_lbc;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_lbc', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_chucvu){
          //   foreach ($count_chucvu as $key => $count){
          //     foreach($list_chucvu as $key => $chucvu){
          //       if($count->ma_cv == $chucvu->ma_cv){
          //         $ten_cv = $chucvu->ten_cv;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_cv', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_cv){
          //   foreach ($count_cv as $key => $count){
          //     foreach($list_chucvu as $key => $chucvu){
          //       if($count->ma_cv == $chucvu->ma_cv){
          //         $ten_cv = $chucvu->ten_cv;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_cv', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_hedaotao){
          //   foreach ($count_hedaotao as $key => $count){
          //     foreach($list_hedaotao as $key => $hedaotao){
          //       if($count->ma_hdt == $hedaotao->ma_hdt){
          //         $ten_hdt = $hedaotao->ten_hdt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_hdt', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_hedaotao_ma_hdt){
          //   foreach ($count_hedaotao_ma_hdt as $key => $count){
          //     foreach($list_hedaotao as $key => $hedaotao){
          //       if($count->ma_hdt == $hedaotao->ma_hdt){
          //         $ten_hdt = $hedaotao->ten_hdt;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_hdt', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_khoa){
          //   foreach ($count_khoa as $key => $count){
          //     foreach($list_khoa as $key => $khoa){
          //       if($count->ma_k == $khoa->ma_k){
          //         $ten_k = $khoa->ten_k;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_k', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_khoa_ma_k){
          //   foreach ($count_khoa_ma_k as $key => $count){
          //     foreach($list_khoa as $key => $khoa){
          //       if($count->ma_k == $khoa->ma_k){
          //         $ten_k = $khoa->ten_k;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_k', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_nghihuu){
          //   foreach ($count_nghihuu as $key => $count){
          //     $thoigiannghi_vc = $count->thoigiannghi_vc;
          //     $tong = $count->sum;
          //     echo "{ year: '$thoigiannghi_vc', value: $tong },";
          //   }
          // }
          // else if($count_nghihuu_loc){
          //   foreach ($count_nghihuu_loc as $key => $count){
          //     $thoigiannghi_vc = $count->thoigiannghi_vc;
          //     $tong = $count->sum;
          //     echo "{ year: '$thoigiannghi_vc', value: $tong },";
          //   }
          // }
          // else if($count_nghihuu_khoa){
          //   foreach ($count_nghihuu_khoa as $key => $count){
          //     $thoigiannghi_vc = $count->thoigiannghi_vc;
          //     $tong = $count->sum;
          //     echo "{ year: '$thoigiannghi_vc', value: $tong },";
          //   }
          // }
          // else if($count_tinh){
          //   foreach ($count_tinh as $key => $count){
          //     foreach($list_tinh as $key => $tinh){
          //       if($count->ma_t == $tinh->ma_t){
          //         $ten_t = $tinh->ten_t;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_t', value: $tong },";
          //       }
          //     }
          //   }
          // }
          // else if($count_quequan_tinh){
          //   foreach ($count_quequan_tinh as $key => $count){
          //     foreach($list_tinh as $key => $tinh){
          //       if($count->ma_t == $tinh->ma_t){
          //         $ten_t = $tinh->ten_t;
          //         $tong = $count->sum;
          //         echo "{ year: '$ten_t', value: $tong },";
          //       }
          //     }
          //   }
          // }
        ?>
      ],
      xkey: 'year',
      ykeys: ['value'],
      labels: ['Số viên chức']
    });
  })
</script>
@endsection
