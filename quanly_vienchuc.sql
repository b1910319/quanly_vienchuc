-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 17, 2023 lúc 03:13 AM
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
-- Cấu trúc bảng cho bảng `bac`
--

CREATE TABLE `bac` (
  `ma_b` int(11) NOT NULL,
  `ma_n` int(11) NOT NULL,
  `ten_b` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hesoluong_b` float NOT NULL DEFAULT 0,
  `status_b` int(11) NOT NULL DEFAULT 0,
  `created_b` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_b` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bac`
--

INSERT INTO `bac` (`ma_b`, `ma_n`, `ten_b`, `hesoluong_b`, `status_b`, `created_b`, `updated_b`) VALUES
(15, 5, 'Bậc 1', 6.2, 0, '2023-02-17 00:40:35', ' '),
(16, 5, 'Bậc 2', 6.56, 0, '2023-02-17 00:40:44', ' '),
(17, 5, 'Bậc 3', 6.92, 0, '2023-02-17 00:40:53', ' '),
(18, 5, 'Bậc 4', 7.28, 0, '2023-02-17 00:41:04', ' '),
(19, 5, 'Bậc 5', 7.64, 0, '2023-02-17 00:41:13', ' '),
(20, 5, 'Bậc 6', 8, 0, '2023-02-17 00:41:21', ' '),
(21, 6, 'Bậc 1', 6.2, 0, '2023-02-17 00:45:16', ' '),
(22, 6, 'Bậc 2', 6.56, 0, '2023-02-17 00:45:26', ' '),
(23, 6, 'Bậc 3', 6.92, 0, '2023-02-17 00:45:35', ' '),
(24, 6, 'Bậc 4', 7.28, 0, '2023-02-17 00:45:45', ' '),
(25, 6, 'Bậc 5', 7.64, 0, '2023-02-17 00:45:55', ' '),
(26, 6, 'Bậc 6', 8, 0, '2023-02-17 00:46:01', ' '),
(27, 7, 'Bậc 1', 6.2, 0, '2023-02-17 00:46:24', ' '),
(28, 7, 'Bậc 2', 6.56, 0, '2023-02-17 00:46:36', ' '),
(29, 7, 'Bậc 3', 6.92, 0, '2023-02-17 00:46:48', ' '),
(30, 7, 'Bậc 4', 7.28, 0, '2023-02-17 00:46:57', ' '),
(31, 7, 'Bậc 5', 7.64, 0, '2023-02-17 00:47:07', ' '),
(32, 7, 'Bậc 6', 8, 0, '2023-02-17 00:47:15', ' '),
(33, 8, 'Bậc 1', 6.2, 0, '2023-02-17 00:47:34', ' '),
(34, 8, 'Bậc 2', 6.56, 0, '2023-02-17 00:47:44', ' '),
(35, 8, 'Bậc 3', 6.92, 0, '2023-02-17 00:47:53', ' '),
(36, 8, 'Bậc 4', 7.28, 0, '2023-02-17 00:48:02', ' '),
(37, 8, 'Bậc 5', 7.64, 0, '2023-02-17 00:48:09', ' '),
(38, 8, 'Bậc 6', 8, 0, '2023-02-17 00:48:17', ' '),
(39, 9, 'Bậc 1', 4.4, 0, '2023-02-17 00:49:05', ' '),
(40, 9, 'Bậc 2', 4.74, 0, '2023-02-17 00:49:12', ' '),
(41, 9, 'Bậc 3', 5.08, 0, '2023-02-17 00:49:19', ' '),
(42, 9, 'Bậc 4', 5.42, 0, '2023-02-17 00:49:29', ' '),
(43, 9, 'Bậc 5', 5.76, 0, '2023-02-17 00:49:39', ' '),
(44, 9, 'Bậc 6', 6.1, 0, '2023-02-17 00:49:52', ' '),
(45, 9, 'Bậc 7', 6.44, 0, '2023-02-17 00:50:01', ' '),
(46, 9, 'Bậc 8', 6.78, 0, '2023-02-17 00:50:09', ' '),
(47, 10, 'Bậc 1', 4.4, 0, '2023-02-17 00:50:27', ' '),
(48, 10, 'Bậc 2', 4.74, 0, '2023-02-17 00:50:35', ' '),
(49, 10, 'Bậc 3', 5.08, 0, '2023-02-17 00:50:41', ' '),
(50, 10, 'Bậc 4', 5.42, 0, '2023-02-17 00:50:49', ' '),
(51, 10, 'Bậc 5', 5.76, 0, '2023-02-17 00:50:58', ' '),
(52, 10, 'Bậc 6', 6.1, 0, '2023-02-17 00:51:06', ' '),
(53, 10, 'Bậc 7', 6.44, 0, '2023-02-17 00:51:13', ' '),
(54, 10, 'Bậc 8', 6.78, 0, '2023-02-17 00:51:21', ' ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `ma_cv` int(11) NOT NULL,
  `ten_cv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_cv` int(11) NOT NULL DEFAULT 0,
  `created_cv` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_cv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`ma_cv`, `ten_cv`, `status_cv`, `created_cv`, `updated_cv`) VALUES
(5, 'Hiệu trưởng', 0, '2023-02-16 04:02:59', ' '),
(6, 'Trưởng khoa', 0, '2023-02-16 04:03:09', ' '),
(7, 'Phó trưởng khoa', 0, '2023-02-16 04:03:17', ' ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dantoc`
--

CREATE TABLE `dantoc` (
  `ma_dt` int(11) NOT NULL,
  `ten_dt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_dt` int(11) NOT NULL DEFAULT 0,
  `created_dt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_dt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dantoc`
--

INSERT INTO `dantoc` (`ma_dt`, `ten_dt`, `status_dt`, `created_dt`, `updated_dt`) VALUES
(4, 'Kinh', 0, '2023-02-15 09:02:10', ' '),
(5, 'Tày', 0, '2023-02-15 09:02:18', ' '),
(6, 'Thái', 0, '2023-02-15 09:02:23', ' '),
(7, 'Hoa', 0, '2023-02-15 09:02:28', ' '),
(9, 'Khơ-me', 0, '2023-02-15 09:02:44', ' '),
(10, 'Mường', 0, '2023-02-15 09:02:50', ' '),
(11, 'Nùng', 0, '2023-02-15 09:02:56', ' '),
(12, 'HMông', 0, '2023-02-15 09:03:01', ' '),
(13, 'Dao', 0, '2023-02-15 09:03:06', ' '),
(14, 'Gia-rai', 0, '2023-02-15 09:03:24', ' '),
(15, 'Ngái', 0, '2023-02-15 09:03:29', ' '),
(16, 'Ê-đê', 0, '2023-02-15 09:03:34', ' '),
(17, 'Ba na', 0, '2023-02-15 09:03:39', ' '),
(18, 'Xơ-Đăng', 0, '2023-02-15 09:03:44', ' '),
(19, 'Sán Chay', 0, '2023-02-15 09:03:48', ' '),
(20, 'Cơ-ho', 0, '2023-02-15 09:03:53', ' '),
(21, 'Chăm', 0, '2023-02-15 09:03:58', ' '),
(22, 'Sán Dìu', 0, '2023-02-15 09:04:04', ' '),
(23, 'Hrê', 0, '2023-02-15 09:04:08', ' '),
(24, 'Mnông', 0, '2023-02-15 09:04:13', ' '),
(25, 'Ra-glai', 0, '2023-02-15 09:04:18', ' '),
(26, 'Xtiêng', 0, '2023-02-15 09:04:23', ' '),
(27, 'Bru-Vân Kiều', 0, '2023-02-15 09:04:28', ' '),
(28, 'Thổ', 0, '2023-02-15 09:04:32', ' '),
(29, 'Giáy', 0, '2023-02-15 09:04:36', ' '),
(30, 'Cơ-tu', 0, '2023-02-15 09:04:44', ' '),
(31, 'Gié Triêng', 0, '2023-02-15 09:04:49', ' '),
(32, 'Mạ', 0, '2023-02-15 09:04:55', ' '),
(33, 'Khơ-mú', 0, '2023-02-15 09:05:00', ' '),
(34, 'Co', 0, '2023-02-15 09:05:05', ' '),
(35, 'Tà-ôi', 0, '2023-02-15 09:05:10', ' '),
(36, 'Chơ-ro', 0, '2023-02-15 09:05:14', ' '),
(37, 'Kháng', 0, '2023-02-15 09:05:19', ' '),
(38, 'Xinh-mun', 0, '2023-02-15 09:05:24', ' '),
(39, 'Hà Nhì', 0, '2023-02-15 09:05:32', ' '),
(40, 'Chu ru', 0, '2023-02-15 09:05:37', ' '),
(41, 'Lào', 0, '2023-02-15 09:05:42', ' '),
(42, 'La Chí', 0, '2023-02-15 09:05:47', ' '),
(43, 'La Ha', 0, '2023-02-15 09:05:52', ' '),
(44, 'Phù Lá', 0, '2023-02-15 09:05:56', ' '),
(45, 'La Hủ', 0, '2023-02-15 09:06:01', ' '),
(46, 'Lự', 0, '2023-02-15 09:06:08', ' '),
(47, 'Lô Lô', 0, '2023-02-15 09:06:12', ' '),
(48, 'Chứt', 0, '2023-02-15 09:06:16', ' '),
(49, 'Mảng', 0, '2023-02-15 09:06:26', ' '),
(50, 'Pà Thẻn', 0, '2023-02-15 09:06:30', ' '),
(51, 'Co Lao', 0, '2023-02-15 09:06:34', ' '),
(52, 'Cống', 0, '2023-02-15 09:06:40', ' '),
(53, 'Bố Y', 0, '2023-02-15 09:06:44', ' '),
(54, 'Si La', 0, '2023-02-15 09:06:51', ' '),
(55, 'Pu Péo', 0, '2023-02-15 09:06:56', ' '),
(56, 'Brâu', 0, '2023-02-15 09:07:01', ' '),
(57, 'Ơ Đu', 0, '2023-02-15 09:07:05', ' '),
(58, 'Rơ măm', 0, '2023-02-15 09:07:10', ' ');

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
-- Cấu trúc bảng cho bảng `ngach`
--

CREATE TABLE `ngach` (
  `ma_n` int(11) NOT NULL,
  `ten_n` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `maso_n` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `sonamnangbac_n` int(11) NOT NULL,
  `status_n` int(11) NOT NULL DEFAULT 0,
  `created_n` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_n` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ngach`
--

INSERT INTO `ngach` (`ma_n`, `ten_n`, `maso_n`, `sonamnangbac_n`, `status_n`, `created_n`, `updated_n`) VALUES
(5, 'Chuyên viên cao cấp', '01.001', 3, 0, '2023-02-16 06:55:34', ' '),
(6, 'Nghiên cứu viên cao cấp', '13.09', 3, 0, '2023-02-16 06:55:58', ' '),
(7, 'Kỹ sư cao cấp', '13.093', 3, 0, '2023-02-16 06:56:21', ' '),
(8, 'Gíao sư - giảng viên cao cấp', '15.109 V.07.01.01', 3, 0, '2023-02-16 06:57:06', ' '),
(9, 'Chuyên viên chính', '01.002', 3, 0, '2023-02-16 06:57:26', ' '),
(10, 'Nghiên cứu viên chính', '13.091', 3, 0, '2023-02-16 06:57:47', ' '),
(11, 'Kỹ sư chính', '13.094', 3, 0, '2023-02-16 06:58:15', ' '),
(12, 'Phó giáo sư - giảng viên chính', '15.110 V.07.01.02', 3, 0, '2023-02-16 06:58:43', ' '),
(13, 'Kê toán viên chính', '06.030', 3, 0, '2023-02-16 07:00:03', ' '),
(14, 'Giaó viên trung học cao cấp', '15.112', 3, 0, '2023-02-16 07:00:37', ' '),
(15, 'Thư viện viên chính', '17.169', 3, 0, '2023-02-16 07:01:01', ' '),
(16, 'Chuyên viên', '01.003', 3, 0, '2023-02-16 07:01:18', ' '),
(17, 'Kê toán viên', '06.031', 3, 0, '2023-02-16 07:01:35', ' '),
(18, 'Nghiên cứu viên', '13.092', 3, 0, '2023-02-16 07:01:55', ' '),
(19, 'Kỹ sư', '13.095', 3, 0, '2023-02-16 07:02:14', ' '),
(20, 'Giảng viên', '15.111 V.07.01.03', 3, 0, '2023-02-16 07:09:21', ' '),
(21, 'Giaó viên trung học', '15.113', 3, 0, '2023-02-16 07:09:42', ' '),
(22, 'Thư viện viên', '17.170', 3, 0, '2023-02-16 07:10:03', ' '),
(23, 'Huấn luyện viên', '18.181', 3, 0, '2023-02-16 07:10:25', ' '),
(24, 'Ngạch mới (Cao đẳng)', 'Ao', 3, 0, '2023-02-16 07:11:03', ' '),
(25, 'GV trung học (Cao đẳng)', '15c.207', 3, 0, '2023-02-16 07:11:38', ' '),
(26, 'Cán sự', '01.004', 2, 0, '2023-02-16 07:15:20', ' '),
(27, 'Kê toán viên trung cấp', '06.032', 2, 0, '2023-02-16 07:15:42', ' '),
(28, 'Kỹ thuật viên', '13.096', 2, 0, '2023-02-16 07:16:09', ' '),
(29, 'Y sĩ', '16.119', 2, 0, '2023-02-16 07:16:24', ' '),
(30, 'Thư viện viên trung cấp', '17.171', 2, 0, '2023-02-16 07:16:47', ' '),
(31, 'Giaó viên mầm non', '15.115', 2, 0, '2023-02-16 07:17:12', ' '),
(32, 'Thu quỹ cơ quan, đơn vị', '06.035', 2, 0, '2023-02-16 07:17:35', ' '),
(33, 'Kê toán viên sơ cấp', '06.033', 2, 0, '2023-02-16 07:18:03', ' '),
(34, 'Kỹ thuật viên đánh máy', '01.005', 2, 0, '2023-02-16 07:18:23', ' '),
(35, 'Lái xe cơ quan', '01.010', 2, 0, '2023-02-16 07:18:39', ' '),
(36, 'Nhân viên kỹ thuật', '01.007', 2, 0, '2023-02-16 07:18:58', ' '),
(37, 'Nhân viên đánh máy', '01.006', 2, 0, '2023-02-16 07:19:20', ' '),
(38, 'Nhân viên bảo vệ', '01.011', 2, 0, '2023-02-16 07:19:33', ' '),
(39, 'Nhân viên văn thư', '01.008', 2, 0, '2023-02-16 07:20:13', ' '),
(40, 'Nhân viên phục vụ', '01.009', 2, 0, '2023-02-16 07:20:29', ' ');

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
(10, 7, 0, '2023-02-15 03:18:24', ' '),
(10, 8, 0, '2023-02-15 03:52:52', ' '),
(10, 9, 0, '2023-02-15 03:52:58', ' '),
(10, 10, 0, '2023-02-15 04:21:36', ' '),
(10, 11, 0, '2023-02-15 04:21:49', ' '),
(10, 12, 0, '2023-02-15 04:24:25', ' '),
(10, 13, 0, '2023-02-15 06:51:16', ' '),
(10, 14, 0, '2023-02-15 06:59:10', ' '),
(10, 15, 0, '2023-02-15 07:05:17', ' '),
(10, 16, 0, '2023-02-15 07:05:39', ' '),
(10, 17, 0, '2023-02-15 07:05:54', ' '),
(10, 18, 0, '2023-02-15 07:06:09', ' '),
(10, 19, 0, '2023-02-15 07:06:24', ' '),
(10, 20, 0, '2023-02-15 07:06:39', ' '),
(10, 21, 0, '2023-02-15 07:06:50', ' '),
(10, 22, 0, '2023-02-15 07:07:00', ' '),
(10, 23, 0, '2023-02-15 07:07:15', ' '),
(10, 24, 0, '2023-02-15 07:07:28', ' '),
(10, 25, 0, '2023-02-15 07:07:42', ' '),
(10, 26, 0, '2023-02-15 07:07:53', ' '),
(10, 27, 0, '2023-02-15 07:08:07', ' '),
(10, 28, 0, '2023-02-15 07:08:18', ' '),
(10, 29, 0, '2023-02-15 07:08:29', ' '),
(10, 30, 0, '2023-02-15 07:08:38', ' '),
(10, 31, 0, '2023-02-15 07:09:19', ' '),
(10, 32, 0, '2023-02-15 07:09:38', ' '),
(10, 33, 0, '2023-02-15 07:09:55', ' '),
(10, 34, 0, '2023-02-15 07:10:12', ' '),
(10, 35, 0, '2023-02-15 07:10:39', ' '),
(10, 36, 0, '2023-02-15 07:10:54', ' '),
(10, 37, 0, '2023-02-15 07:11:07', ' '),
(10, 38, 0, '2023-02-15 07:11:26', ' '),
(10, 39, 0, '2023-02-15 07:11:37', ' '),
(10, 40, 0, '2023-02-15 07:11:51', ' '),
(10, 41, 0, '2023-02-15 07:12:15', ' '),
(10, 42, 0, '2023-02-15 07:12:28', ' '),
(10, 43, 0, '2023-02-15 07:12:44', ' '),
(10, 44, 0, '2023-02-15 07:12:58', ' '),
(10, 45, 0, '2023-02-15 07:13:11', ' '),
(10, 46, 0, '2023-02-15 07:13:24', ' '),
(10, 47, 0, '2023-02-15 07:14:43', ' '),
(10, 48, 0, '2023-02-15 07:14:58', ' '),
(10, 49, 0, '2023-02-15 07:15:14', ' '),
(10, 50, 0, '2023-02-15 07:15:30', ' '),
(10, 51, 0, '2023-02-15 07:15:41', ' '),
(10, 52, 0, '2023-02-15 07:15:53', ' '),
(10, 53, 0, '2023-02-15 07:16:05', ' '),
(10, 54, 0, '2023-02-15 07:16:16', ' '),
(10, 55, 0, '2023-02-15 07:16:27', ' '),
(10, 56, 0, '2023-02-15 07:16:36', ' '),
(10, 57, 0, '2023-02-15 07:16:46', ' '),
(10, 58, 0, '2023-02-15 07:16:57', ' '),
(10, 59, 0, '2023-02-15 07:17:08', ' '),
(10, 60, 0, '2023-02-15 07:17:19', ' '),
(10, 61, 0, '2023-02-15 07:17:30', ' '),
(10, 62, 0, '2023-02-15 07:17:41', ' '),
(5, 1, 0, '2023-02-16 00:57:56', ' '),
(8, 62, 0, '2023-02-16 00:59:16', ' '),
(10, 63, 0, '2023-02-16 02:38:07', ' ');

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
-- Cấu trúc bảng cho bảng `tongiao`
--

CREATE TABLE `tongiao` (
  `ma_tg` int(11) NOT NULL,
  `ten_tg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_tg` int(11) NOT NULL DEFAULT 0,
  `created_tg` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_tg` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tongiao`
--

INSERT INTO `tongiao` (`ma_tg`, `ten_tg`, `status_tg`, `created_tg`, `updated_tg`) VALUES
(1, 'grtreytytuy', 0, '2023-02-17 02:13:33', ' ');

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
  `ngayhuongbac_vc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `status_vc` int(11) NOT NULL DEFAULT 0,
  `created_vc` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_vc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vienchuc`
--

INSERT INTO `vienchuc` (`ma_vc`, `ma_k`, `ma_cv`, `ma_n`, `ma_b`, `ma_dt`, `ma_tg`, `ma_tb`, `user_vc`, `pass_vc`, `hoten_vc`, `hinh_vc`, `tenkhac_vc`, `ngaysinh_vc`, `gioitinh_vc`, `thuongtru_vc`, `hientai_vc`, `nghekhiduoctuyen_vc`, `ngaytuyendung_vc`, `congviecchinhgiao_vc`, `phucap_vc`, `trinhdophothong_vc`, `chinhtri_vc`, `quanlynhanuoc_vc`, `ngoaingu_vc`, `tinhoc_vc`, `ngayvaodang_vc`, `ngaychinhthuc_vc`, `ngaynhapngu_vc`, `ngayxuatngu_vc`, `quanham_vc`, `danhhieucao_vc`, `sotruong_vc`, `chieucao_vc`, `cannang_vc`, `nhommau_vc`, `chinhsach_vc`, `cccd_vc`, `ngaycapcccd_vc`, `bhxh_vc`, `lichsubanthan1_vc`, `lichsubanthan2_vc`, `lichsubanthan3_vc`, `ngaybatdaulamviec_vc`, `thoigiannghi_vc`, `ngayhuongbac_vc`, `status_vc`, `created_vc`, `updated_vc`) VALUES
(1, 5, 0, 0, 0, 0, 0, 0, 'trinhb1910319@student.ctu.edu.vn', '6141bcafae02e2b1e6110f7f0c238ce7', 'Lê Diểm Trinh', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-14 00:56:49', '2023-02-15 06:34:45'),
(15, 5, 0, 0, 0, 0, 0, 0, 'ptphi@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Thế Phi', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:05:17', ' '),
(16, 5, 0, 0, 0, 0, 0, 0, 'tcan@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Công Án', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:05:39', ' '),
(17, 5, 0, 0, 0, 0, 0, 0, 'tnbinh@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Ngân Bình', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:05:53', ' '),
(18, 5, 0, 0, 0, 0, 0, 0, 'lnkhang@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Lâm Nhựt Khang', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:06:09', ' '),
(19, 5, 0, 0, 0, 0, 0, 0, 'tmtuan@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Thái Minh Tuấn', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:06:24', ' '),
(20, 5, 0, 0, 0, 0, 0, 0, 'bvqbao@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Bùi Võ Quốc Bảo', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:06:39', ' '),
(21, 5, 0, 0, 0, 0, 0, 0, 'ptxdiem@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Thị Xuân Diễm', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:06:50', ' '),
(22, 5, 0, 0, 0, 0, 0, 0, 'nnmy@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Ngọc Mỹ', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:07:00', ' '),
(23, 5, 0, 0, 0, 0, 0, 0, 'tcde@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Cao Đệ', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:07:15', ' '),
(24, 5, 0, 0, 0, 0, 0, 0, 'lvlam@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Văn Lâm', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:07:28', ' '),
(25, 5, 0, 0, 0, 0, 0, 0, 'tmtan@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Minh Tân', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:07:42', ' '),
(26, 5, 0, 0, 0, 0, 0, 0, 'lhthao@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Hoàng Thảo', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:07:53', ' '),
(27, 5, 0, 0, 0, 0, 0, 0, 'trungnguyen@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Minh Trung', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:08:07', ' '),
(28, 5, 0, 0, 0, 0, 0, 0, 'ntkyen@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thị Kim Yến', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:08:18', ' '),
(29, 5, 0, 0, 0, 0, 0, 0, 'lhqbao@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Huỳnh Quốc Bảo', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:08:29', ' '),
(30, 5, 0, 0, 0, 0, 0, 0, 'tmkhoi@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Minh Khôi', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:08:38', ' '),
(31, 6, 0, 0, 0, 0, 0, 0, 'vhtram@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Võ Huỳnh Trâm', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:09:19', ' '),
(32, 6, 0, 0, 0, 0, 0, 0, 'tmthai@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trương Minh Thái', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:09:38', ' '),
(33, 6, 0, 0, 0, 0, 0, 0, 'hxhiep@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Huỳnh Xuân Hiệp', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:09:55', ' '),
(34, 6, 0, 0, 0, 0, 0, 0, 'ttttuyen@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trương Thị Thanh Tuyền', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:10:12', ' '),
(35, 6, 0, 0, 0, 0, 0, 0, 'lhbao@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Lâm Hoài Bảo', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:10:39', ' '),
(36, 6, 0, 0, 0, 0, 0, 0, 'phcuong@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Phan Huy Cường', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:10:54', ' '),
(37, 6, 0, 0, 0, 0, 0, 0, 'hqnghi@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Huỳnh Quang Nghi', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:11:07', ' '),
(38, 6, 0, 0, 0, 0, 0, 0, 'chgiang@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Cao Hoàng Giang', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:11:26', ' '),
(39, 6, 0, 0, 0, 0, 0, 0, 'pplan@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Phan Phương Lan', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:11:37', ' '),
(40, 6, 0, 0, 0, 0, 0, 0, 'ncdanh@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Công Danh', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:11:51', ' '),
(41, 6, 0, 0, 0, 0, 0, 0, 'tvhoang@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Văn Hoàng', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:12:15', ' '),
(42, 6, 0, 0, 0, 0, 0, 0, 'hqthai@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Hồ Quang Thái', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:12:28', ' '),
(43, 6, 0, 0, 0, 0, 0, 0, 'nvlinh@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Văn Linh', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:12:44', ' '),
(44, 6, 0, 0, 0, 0, 0, 0, 'txviet@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trương Xuân Việt', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:12:58', ' '),
(45, 6, 0, 0, 0, 0, 0, 0, 'cvloc@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Cù Vĩnh Lộc', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:13:11', ' '),
(46, 6, 0, 0, 0, 0, 0, 0, 'otmlinh@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Ông Thị Mỹ Linh', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:13:24', ' '),
(47, 7, 0, 0, 0, 0, 0, 0, 'ntnghe@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thái Nghe', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:14:43', ' '),
(48, 7, 0, 0, 0, 0, 0, 0, 'ptndiem@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Thị Ngọc Diễm', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:14:58', ' '),
(49, 7, 0, 0, 0, 0, 0, 0, 'tqdinh@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trương Quốc Định', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:15:14', ' '),
(50, 7, 0, 0, 0, 0, 0, 0, 'tnmthai@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Nguyễn Minh Thái', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:15:30', ' '),
(51, 7, 0, 0, 0, 0, 0, 0, 'nthai.cit@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thanh Hải', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:15:41', ' '),
(52, 7, 0, 0, 0, 0, 0, 0, 'nmkhiem@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Minh Khiêm', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:15:53', ' '),
(53, 7, 0, 0, 0, 0, 0, 0, 'thanhdien@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Thanh Điện', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:16:05', ' '),
(54, 7, 0, 0, 0, 0, 0, 0, 'ptxloc@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Thị Xuân Lộc', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:16:16', ' '),
(55, 7, 0, 0, 0, 0, 0, 0, 'vmhien@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Võ Minh Hiển', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:16:27', ' '),
(56, 7, 0, 0, 0, 0, 0, 0, 'pttai@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Phan Tấn Tài', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:16:36', ' '),
(57, 7, 0, 0, 0, 0, 0, 0, 'bdhphuong@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Bùi Đăng Hà Phương', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:16:46', ' '),
(58, 7, 0, 0, 0, 0, 0, 0, 'pnquyen@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Ngọc Quyền', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:16:57', ' '),
(59, 7, 0, 0, 0, 0, 0, 0, 'mtcnhung@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Mai Thị Cẩm Nhung', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:17:08', ' '),
(60, 7, 0, 0, 0, 0, 0, 0, 'skanh@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Sử Kim Anh', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:17:19', ' '),
(61, 7, 0, 0, 0, 0, 0, 0, 'ntthien@ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Thị Thanh Hiền', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:17:30', ' '),
(62, 7, 0, 0, 0, 0, 0, 0, 'ldthang@cit.ctu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Đức Thắng', ' ', ' ', ' ', 0, ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', '', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 0, '2023-02-15 07:17:41', ' ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bac`
--
ALTER TABLE `bac`
  ADD PRIMARY KEY (`ma_b`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`ma_cv`);

--
-- Chỉ mục cho bảng `dantoc`
--
ALTER TABLE `dantoc`
  ADD PRIMARY KEY (`ma_dt`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`ma_k`);

--
-- Chỉ mục cho bảng `ngach`
--
ALTER TABLE `ngach`
  ADD PRIMARY KEY (`ma_n`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`ma_q`);

--
-- Chỉ mục cho bảng `tongiao`
--
ALTER TABLE `tongiao`
  ADD PRIMARY KEY (`ma_tg`);

--
-- Chỉ mục cho bảng `vienchuc`
--
ALTER TABLE `vienchuc`
  ADD PRIMARY KEY (`ma_vc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bac`
--
ALTER TABLE `bac`
  MODIFY `ma_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `ma_cv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `dantoc`
--
ALTER TABLE `dantoc`
  MODIFY `ma_dt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `ma_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `ngach`
--
ALTER TABLE `ngach`
  MODIFY `ma_n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `ma_q` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tongiao`
--
ALTER TABLE `tongiao`
  MODIFY `ma_tg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vienchuc`
--
ALTER TABLE `vienchuc`
  MODIFY `ma_vc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
