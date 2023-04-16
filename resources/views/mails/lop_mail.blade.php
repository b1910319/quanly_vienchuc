<div>
  <h2>{{ $data['type'] }}</h2>
  <h4>THÔNG TIN LỚP HỌC</h4>
  <p>
    <b>Tên lớp học: </b> {{ $data['ten_l'] }}
  </p>
  <p>
    <b>Ngày bắt đầu: </b> {{ $data['ngaybatdau_l'] }}
  </p>
  <p>
    <b>Ngày kết thúc: </b> {{ $data['ngayketthuc_l'] }}
  </p>
  <p>
    <b>Tên cơ sở đào tạo: </b> {{ $data['tencosodaotao_l'] }}
  </p>
  <p>
    <b>Ngành học: </b> {{ $data['nganhhoc_l'] }}
  </p>
  <p>
    <b>Địa chỉ cơ sở đào tạo: </b> {{ $data['diachidaotao_l'] }}
  </p>
  <p>
    <b>Số điện thoại cơ sở: </b> {{ $data['sdtcoso_l'] }}
  </p>
  <p>
    Viên chức có thể truy cập vào link: <b style="color: #FF1E1E">{{ $data['url'] }}</b> để biết thêm chi tiết.
  </p>
</div>