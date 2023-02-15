-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 15, 2023 lúc 04:42 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanly_vienchuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `ma_k` int(11) NOT NULL,
  `ten_k` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `mota_k` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_k` int(11) NOT NULL DEFAULT 0,
  `created_k` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_k` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`ma_k`, `ten_k`, `mota_k`, `status_k`, `created_k`, `updated_k`) VALUES
(5, 'Khoa Công Nghệ Thông Tin', '<p><strong>Nhiệm vụ</strong>&nbsp;của Khoa l&agrave; đ&agrave;o tạo Kỹ sư v&agrave; Thạc sĩ ng&agrave;nh C&ocirc;ng nghệ th&ocirc;ng tin, tham gia giảng dạy bậc sau đại học c&aacute;c ng&agrave;nh thuộc lĩnh vực m&aacute;y t&iacute;nh v&agrave; c&ocirc;ng nghệ th&ocirc;ng tin, nghi&ecirc;n cứu khoa học, hợp t&aacute;c, hỗ trợ, tư vấn, v&agrave; chuyển giao c&ocirc;ng nghệ trong lĩnh vực C&ocirc;ng nghệ th&ocirc;ng tin cho c&aacute;c đối t&aacute;c khu vực ĐBSCL cũng như c&aacute;c tỉnh th&agrave;nh ph&iacute;a Nam.</p>', 0, '2023-02-15 02:18:17', ' '),
(6, 'Khoa Công Nghệ Phần Mềm', '<p><strong>Nhiệm vụ</strong>&nbsp;của Khoa l&agrave; đ&agrave;o tạo sinh vi&ecirc;n ng&agrave;nh Kỹ thuật phần mềm bậc đại học; nghi&ecirc;n cứu khoa học v&agrave; chuyển giao c&ocirc;ng nghệ trong c&aacute;c lĩnh vực li&ecirc;n quan đến C&ocirc;ng nghệ phần mềm nhằm đ&aacute;p ứng nhu cầu nguồn nh&acirc;n lực v&agrave; xu thế ph&aacute;t triển của ng&agrave;nh n&agrave;y. Ngo&agrave;i ra, Bộ m&ocirc;n cũng phụ tr&aacute;ch giảng dạy c&aacute;c học phần li&ecirc;n quan ở bậc đại học v&agrave; cao học cho c&aacute;c ng&agrave;nh Mạng m&aacute;y t&iacute;nh &amp; Truyền th&ocirc;ng, Khoa học m&aacute;y t&iacute;nh, Hệ thống th&ocirc;ng tin.</p>', 0, '2023-02-15 02:18:56', ' '),
(7, 'Khoa Hệ Thống Thông Tin', '<p>Được th&agrave;nh lập năm 1990 với t&ecirc;n gọi l&agrave; Bộ m&ocirc;n Tin học. Đến năm 1997, Bộ m&ocirc;n Tin học được đổi t&ecirc;n th&agrave;nh Bộ m&ocirc;n Hệ thống th&ocirc;ng tin (HTTT) &amp; To&aacute;n ứng dụng. Theo nhu cầu ph&aacute;t triển, Bộ m&ocirc;n HTTT &amp; To&aacute;n ứng dụng được t&aacute;ch th&agrave;nh c&aacute;c bộ m&ocirc;n: HTTT, C&ocirc;ng nghệ phần mềm, v&agrave; Khoa học m&aacute;y t&iacute;nh. Ng&agrave;y 29/09/2022, Bộ m&ocirc;n HTTT chuyển th&agrave;nh Khoa HTTT theo nghị quyết của Hội đồng Trường trường ĐHCT.</p>', 0, '2023-02-15 02:19:36', ' '),
(8, 'Khoa Mạng Máy Tính Và Truyền Thông', '<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:12.16px\"><strong><span style=\"font-size:10pt\"><span style=\"font-family:Tahoma\"><span style=\"color:red\">Nhiệm vụ</span></span></span></strong></span>&nbsp;</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">-&nbsp;Đ&agrave;o tạo Kỹ sư ng&agrave;nh Mạng m&aacute;y t&iacute;nh v&agrave; Truyền th&ocirc;ng dữ liệu</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">-&nbsp;Tham gia hoạt động giảng dạy cho chương tr&igrave;nh sau đại học về Khoa học m&aacute;y t&iacute;nh v&agrave; c&aacute;c ng&agrave;nh thuộc lĩnh vực C&ocirc;ng nghệ th&ocirc;ng tin</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">-&nbsp;Nghi&ecirc;n cứu khoa học, hợp t&aacute;c, tư vấn v&agrave; chuyển giao c&ocirc;ng nghệ trong lĩnh vực Mạng m&aacute;y t&iacute;nh v&agrave; Truyền th&ocirc;ng dữ liệu với c&aacute;c đối t&aacute;c v&ugrave;ng Đồng bằng s&ocirc;ng Cửu Long, Việt nam.</span></span></span></span></p>', 0, '2023-02-15 02:20:08', ' '),
(9, 'Khoa Khoa Học Máy Tính', '<p><strong>Nhiệm vụ</strong>&nbsp;của Khoa l&agrave; đ&agrave;o tạo kỹ sư v&agrave; thạc sỹ chuy&ecirc;n ng&agrave;nh Khoa học m&aacute;y t&iacute;nh, tham gia nghi&ecirc;n cứu khoa học, x&acirc;y dựng v&agrave; triển khai c&aacute;c giải ph&aacute;p chuy&ecirc;n s&acirc;u trong lĩnh vực: Kh&aacute;m ph&aacute; tri thức v&agrave; khai mỏ dữ liệu, Đồ họa v&agrave; thị gi&aacute;c m&aacute;y t&iacute;nh.</p>', 0, '2023-02-15 02:20:50', ' '),
(10, 'Khoa Truyền Thông Đa Phương Tiện', '<p><strong>Nhiệm vụ:&nbsp;</strong>Khoa đ&agrave;o tạo Kỹ sư Truyền th&ocirc;ng đa phương tiện v&agrave; Kỹ sư C&ocirc;ng nghệ th&ocirc;ng tin chuy&ecirc;n ng&agrave;nh Tin học ứng dụng. Ngo&agrave;i ra, Khoa c&ograve;n đảm nhận giảng dạy c&aacute;c học phần Tin học ứng dụng v&agrave; học phần Tin học căn bản cho c&aacute;c ng&agrave;nh đ&agrave;o tạo kh&aacute;c của Trường Đại học Cần Thơ</p>', 0, '2023-02-15 02:21:14', ' '),
(11, 'Văn Phòng Trường', '<p>Văn ph&ograve;ng Trường l&agrave; bộ phận tham mưu, gi&uacute;p việc cho l&atilde;nh đạo đơn vị trong việc tổ chức v&agrave; quản l&yacute; mọi mặt c&ocirc;ng t&aacute;c h&agrave;nh ch&iacute;nh, tổ chức c&aacute;n bộ, sinh vi&ecirc;n, t&agrave;i ch&iacute;nh, t&agrave;i sản, vật tư, thiết bị, đ&agrave;o tạo, nghi&ecirc;n cứu khoa học v&agrave; hợp t&aacute;c quốc tế của đơn vị.</p>', 0, '2023-02-15 02:21:52', ' '),
(12, 'Phòng Kỹ Thuật', '<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:small\"><span style=\"font-family:Arial,&quot;sans-serif&quot;\"><span style=\"color:#000000\">Ph&ograve;ng Kỹ Thuật M&aacute;y T&iacute;nh phải đảm bảo c&aacute;c ph&ograve;ng thực h&agrave;nh trong trạng th&aacute;i sẵn s&agrave;ng phục vụ, hệ thống mạng th&ocirc;ng suốt. C&aacute;c chức năng, nhiệm vụ cụ thể l&agrave;:</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:small\"><span style=\"font-family:Arial,&quot;sans-serif&quot;\"><span style=\"color:#000000\">-&nbsp;&nbsp;&nbsp;Quản l&yacute; v&agrave; khai th&aacute;c hệ thống c&aacute;c ph&ograve;ng thực h&agrave;nh tin học:</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:small\"><span style=\"font-family:Arial,&quot;sans-serif&quot;\"><span style=\"color:#000000\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quản l&yacute; t&agrave;i sản, sửa chữa, n&acirc;ng cấp, c&agrave;i đặt phần mềm đ&aacute;p ứng y&ecirc;u cầu giảng dạy v&agrave; nghi&ecirc;n cứu khoa học</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:small\"><span style=\"font-family:Arial,&quot;sans-serif&quot;\"><span style=\"color:#000000\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lập kế hoạch, sắp lịch thực h&agrave;nh v&agrave; thi thực h&agrave;nh c&aacute;c lớp học phần nhằm khai th&aacute;c hiệu quả c&aacute;c m&aacute;y t&iacute;nh v&agrave; thiết bị hiện c&oacute; trong Trường.</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:small\"><span style=\"font-family:Arial,&quot;sans-serif&quot;\"><span style=\"color:#000000\">-&nbsp; X&acirc;y dựng, quản l&yacute;, quản trị mạng (c&oacute; d&acirc;y, kh&ocirc;ng d&acirc;y) trong Trường C&ocirc;ng Nghệ Th&ocirc;ng Tin &amp; Truyền Th&ocirc;ng:</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:small\"><span style=\"font-family:Arial,&quot;sans-serif&quot;\"><span style=\"color:#000000\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Thiết kế, x&acirc;y dựng, quản trị hệ thống mạng v&agrave; c&aacute;c dịch vụ</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:small\"><span style=\"font-family:Arial,&quot;sans-serif&quot;\"><span style=\"color:#000000\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; X&acirc;y dựng cơ chế quản l&yacute; người d&ugrave;ng, quản l&yacute; nội dung truy cập, x&acirc;y dựng chế độ bảo mật hợp l&yacute;</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:small\"><span style=\"font-family:Arial,&quot;sans-serif&quot;\"><span style=\"color:#000000\">-&nbsp;&nbsp;&nbsp;Hỗ trợ về mặt kỹ thuật cho c&aacute;c đơn vị kh&aacute;c trong Trường CNTT&amp;TT khi c&oacute; y&ecirc;u cầu</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#666666\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:small\"><span style=\"font-family:Arial,&quot;sans-serif&quot;\"><span style=\"color:#000000\">-&nbsp;&nbsp;&nbsp;Gi&uacute;p BGH Trường CNTT&amp;TT trong việc lựa chọn, mua sắm c&aacute;c trang thiết bị, m&aacute;y t&iacute;nh,</span></span></span></span></span></span></span></p>', 0, '2023-02-15 02:22:26', ' ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `ma_q` int(11) NOT NULL,
  `ma_vc` int(11) NOT NULL,
  `status_pq` int(11) NOT NULL DEFAULT 0,
  `created_pq` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_pq` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`ma_q`, `ma_vc`, `status_pq`, `created_pq`, `updated_pq`) VALUES
(10, 2, 0, '2023-02-14 07:33:17', ' '),
(10, 1, 0, '2023-02-14 07:38:46', ' '),
(5, 1, 0, '2023-02-14 08:02:55', ' '),
(10, 7, 0, '2023-02-15 03:18:24', ' ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `ma_q` int(11) NOT NULL,
  `ten_q` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `mota_q` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `status_q` int(11) NOT NULL DEFAULT 0,
  `created_q` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_q` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`ma_q`, `ten_q`, `mota_q`, `status_q`, `created_q`, `updated_q`) VALUES
(5, 'Admin', '<p>- Tất cả c&aacute;c quyền</p>\r\n\r\n<p>- Ph&acirc;n quyền cho vi&ecirc;n chức</p>', 0, '2023-02-14 04:31:50', ' '),
(6, 'Quản lý thông tin viên chức', '<p>- Nhập th&ocirc;ng tin vi&ecirc;n chức</p>\r\n\r\n<p>- Cập nhật th&ocirc;ng tin vi&ecirc;n chức</p>', 0, '2023-02-14 06:08:27', ' '),
(7, 'Quản lý kĩ luật, khen thưởng', '<p>- Quản l&yacute; kĩ luật</p>\r\n\r\n<p>- Quản l&yacute; khen thưởng</p>', 0, '2023-02-14 06:09:03', ' '),
(8, 'Quản lý công tác tổ chức', '<p>- Quản l&yacute; lớp học</p>', 0, '2023-02-14 06:10:09', ' '),
(9, 'Trưởng khoa', '<p>- Quản l&yacute; th&ocirc;ng tin vi&ecirc;n chức trong khoa</p>', 0, '2023-02-14 06:11:01', ' '),
(10, 'Viên chức', '<p>-&nbsp;Đăng nhập,&nbsp;đăng xuất</p>\r\n\r\n<p>- Cập nhật th&ocirc;ng tin c&aacute; nh&acirc;n</p>', 0, '2023-02-14 07:32:11', ' ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vienchuc`
--

CREATE TABLE `vienchuc` (
  `ma_vc` int(11) NOT NULL,
  `ma_k` int(11) NOT NULL DEFAULT 0,
  `ma_cv` int(11) NOT NULL DEFAULT 0,
  `ma_n` int(11) NOT NULL DEFAULT 0,
  `ma_b` int(11) NOT NULL DEFAULT 0,
  `ma_dt` int(11) NOT NULL DEFAULT 0,
  `ma_tg` int(11) NOT NULL DEFAULT 0,
  `ma_tb` int(11) NOT NULL DEFAULT 0,
  `user_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `pass_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `hoten_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `hinh_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `tenkhac_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `ngaysinh_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `gioitinh_vc` int(11) NOT NULL DEFAULT 0,
  `thuongtru_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `hientai_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `nghekhiduoctuyen_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `ngaytuyendung_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `congviecchinhgiao_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `phucap_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `trinhdophothong_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `chinhtri_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `quanlynhanuoc_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `ngoaingu_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `tinhoc_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `ngayvaodang_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `ngaychinhthuc_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `ngaynhapngu_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `ngayxuatngu_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `quanham_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `danhhieucao_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `sotruong_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `chieucao_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `cannang_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nhommau_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `chinhsach_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `cccd_vc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `ngaycapcccd_vc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `bhxh_vc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `lichsubanthan1_vc` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `lichsubanthan2_vc` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `lichsubanthan3_vc` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `ngaybatdaulamviec_vc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `thoigiannghi_vc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `status_vc` int(11) NOT NULL DEFAULT 0,
  `created_vc` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vienchuc`
--

INSERT INTO `vienchuc` (`ma_vc`, `ma_k`, `ma_cv`, `ma_n`, `ma_b`, `ma_dt`, `ma_tg`, `ma_tb`, `user_vc`, `pass_vc`, `hoten_vc`, `hinh_vc`, `tenkhac_vc`, `ngaysinh_vc`, `gioitinh_vc`, `thuongtru_vc`, `hientai_vc`, `nghekhiduoctuyen_vc`, `ngaytuyendung_vc`, `congviecchinhgiao_vc`, `phucap_vc`, `trinhdophothong_vc`, `chinhtri_vc`, `quanlynhanuoc_vc`, `ngoaingu_vc`, `tinhoc_vc`, `ngayvaodang_vc`, `ngaychinhthuc_vc`, `ngaynhapngu_vc`, `ngayxuatngu_vc`, `quanham_vc`, `danhhieucao_vc`, `sotruong_vc`, `chieucao_vc`, `cannang_vc`, `nhommau_vc`, `chinhsach_vc`, `cccd_vc`, `ngaycapcccd_vc`, `bhxh_vc`, `lichsubanthan1_vc`, `lichsubanthan2_vc`, `lichsubanthan3_vc`, `ngaybatdaulamviec_vc`, `thoigiannghi_vc`, `status_vc`, `created_vc`, `updated_vc`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 'trinhb1910319@student.ctu.edu.vn', '6141bcafae02e2b1e6110f7f0c238ce7', 'Lê Diểm Trinh', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-14 00:56:49', ' '),
(2, 0, 0, 0, 0, 0, 0, 0, 'hangb1910318@student.ctu.edu.vn', 'a1bc3146fd531764ef30961866aa53f9', ' Lê Thị Diễm Hằng', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-14 07:06:14', ' '),
(7, 12, 0, 0, 0, 0, 0, 0, 'trinh123456@student.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'trinh', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 03:18:24', ' ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`ma_k`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`ma_q`);

--
-- Chỉ mục cho bảng `vienchuc`
--
ALTER TABLE `vienchuc`
  ADD PRIMARY KEY (`ma_vc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `ma_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `ma_q` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `vienchuc`
--
ALTER TABLE `vienchuc`
  MODIFY `ma_vc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
