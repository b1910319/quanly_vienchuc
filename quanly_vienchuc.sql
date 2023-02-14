-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 14, 2023 lúc 04:56 AM
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
(1, 'detdet', '<p>detw462</p>', 1, '2023-02-14 02:50:00', ' '),
(2, 'deft425', '<p>dtw462</p>', 0, '2023-02-14 03:45:14', ' '),
(3, 'Trinh', '<p>le diem trinh</p>', 0, '2023-02-14 03:45:25', ' '),
(4, 'dvegt', '<p>dvg</p>', 0, '2023-02-14 03:51:06', ' ');

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
(1, 0, 0, 0, 0, 0, 0, 0, 'trinhb1910319@student.ctu.edu.vn', '6141bcafae02e2b1e6110f7f0c238ce7', 'Lê Diểm Trinh', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-14 00:56:49', ' ');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `ma_q` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vienchuc`
--
ALTER TABLE `vienchuc`
  MODIFY `ma_vc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
