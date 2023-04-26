<div>
  <h2>{{ $data['type'] }}</h2>
  <h3>THÔNG BÁO</h3>
  <p>
    - Tài khoản với email:  <b>{{ $data['email'] }} </b> là viên chức của trường Công nghệ thông tin và Truyền thông <br>
    - Viên chức đã tham gia lớp: {{ $data['ten_l'] }} <br>
    - Thời hạn dự định về nước là: <b style="color: red; font-weight: bold">{{ $data['ngayvenuoc_kq'] }}</b> <br>
    - Nay đã quá hạn mà viên chức hiện chưa về nước mail này nhắc nhở viên chức <b>{{ $data['hoten_vc'] }}</b> sắp xếp công việc nhanh chống chở về
  </p>

</div>