-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2022 lúc 05:29 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES
(1, '742874161', 'abc', 100000, 'chinh chuyển khoản', '00', '13401455', 'NCB', '2020-10-10 01:00:00'),
(2, '608324672', 'abc', 1000000, 'test chuyển khoản', '00', '13401811', 'NCB', '2020-10-11 21:00:00'),
(3, '1134065293', 'CT2', 150000, 'học phí', '00', '13407163', 'NCB', '2020-10-22 23:00:00'),
(4, '596509313', 'CT2', 5000000, 'học phí', '00', '13407176', 'NCB', '2020-10-23 00:00:00'),
(5, '70267166', 'CT2', 5000000, 'học phí', '00', '13407178', 'NCB', '2020-10-23 00:00:00'),
(6, '1672349048', 'CT1', 150000, 'học phí', '00', '13407729', 'NCB', '2020-10-23 21:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `ten_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `chuc_vu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `ten_admin`, `email`, `mat_khau`, `sdt`, `chuc_vu`) VALUES
(1, 'Bùi Thanh Tâm', 'tt@gmail.com', '12345', '0345678901', 'Quản lý'),
(2, 'Vương Thị Hương Ly', 'hl@gmail.com', '12345', '0912345670', 'Nhân viên'),
(3, 'Nguyễn Thu Hường', 'nth@gmail.com', '12345', '0984367521', 'Nhân viên'),
(4, 'Lỗ Quang Dũng', 'qd@gmail.com', '12345', '0372456789', 'Nhân viên'),
(5, 'Ngô Thị Phương Lan', 'nl@gmail.com', '12345', '0346789472', 'Nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `hoadon_id` int(11) DEFAULT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`giohang_id`, `sanpham_id`, `hoadon_id`, `so_luong`) VALUES
(21, 31, 15, 1),
(22, 12, 15, 2),
(23, 53, 16, 2),
(24, 42, 17, 2),
(25, 50, 17, 2),
(26, 52, 18, 1),
(27, 41, 18, 2),
(28, 51, 19, 1),
(29, 12, 19, 2),
(30, 31, 20, 1),
(31, 32, 20, 3),
(32, 50, 25, 1),
(33, 31, 26, 1),
(34, 53, 26, 1),
(35, 31, 27, 1),
(36, 31, 28, 1),
(37, 12, 28, 1),
(38, 31, 31, 1),
(39, 53, 34, 1),
(40, 31, 35, 1),
(41, 31, 36, 1),
(42, 42, 38, 1),
(43, 31, 39, 1),
(44, 12, 39, 1),
(45, 12, 40, 13),
(46, 11, 40, 2),
(47, 12, 41, 13),
(48, 11, 41, 2),
(49, 53, 41, 1),
(50, 12, 42, 13),
(51, 11, 42, 2),
(52, 53, 42, 1),
(53, 50, 43, 1),
(54, 12, 44, 1),
(55, 32, 44, 1),
(56, 42, 45, 1),
(57, 42, 46, 1),
(58, 42, 47, 1),
(59, 42, 48, 1),
(60, 42, 49, 1),
(61, 31, 50, 1),
(62, 32, 50, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadon`
--

CREATE TABLE `tbl_hoadon` (
  `hoadon_id` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `ngay_xuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinh_trang` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hoadon`
--

INSERT INTO `tbl_hoadon` (`hoadon_id`, `khachhang_id`, `admin_id`, `ngay_xuat`, `tinh_trang`) VALUES
(15, 7, 1, '2022-01-08 15:24:26', 2),
(16, 7, 1, '2022-01-08 06:03:05', 0),
(17, 1, 1, '2022-01-08 06:05:57', 0),
(18, 1, 1, '2022-01-08 06:07:35', 0),
(19, 1, 1, '2022-01-08 06:10:33', 0),
(20, 7, 1, '2022-01-09 03:25:58', 0),
(21, 7, 1, '2022-01-10 15:58:36', 1),
(22, 7, 1, '2022-01-09 05:19:34', 0),
(23, 7, 1, '2022-01-09 05:20:39', 0),
(24, 7, 1, '2022-01-09 05:21:32', 0),
(25, 6, 1, '2022-01-09 05:22:42', 0),
(26, 6, 1, '2022-01-09 05:26:23', 0),
(27, 6, 1, '2022-01-09 06:20:08', 0),
(28, 6, 1, '2022-01-09 06:20:38', 0),
(29, 6, 1, '2022-01-09 06:21:48', 0),
(30, 6, 1, '2022-01-09 06:23:17', 0),
(31, 6, 1, '2022-01-09 06:23:31', 0),
(32, 6, 1, '2022-01-09 06:23:58', 0),
(33, 6, 1, '2022-01-09 06:25:34', 0),
(34, 6, 1, '2022-01-09 06:26:22', 0),
(35, 6, 1, '2022-01-09 06:30:33', 0),
(36, 6, 1, '2022-01-09 07:17:46', 0),
(37, 6, 1, '2022-01-09 07:18:53', 0),
(38, 6, 1, '2022-01-09 07:23:06', 0),
(39, 6, 1, '2022-01-09 14:37:55', 0),
(40, 6, 1, '2022-01-09 14:55:02', 0),
(41, 6, 1, '2022-01-09 15:05:35', 0),
(42, 6, 1, '2022-01-09 15:07:34', 0),
(43, 6, 1, '2022-01-09 17:19:37', 0),
(44, 7, 1, '2022-01-10 06:17:49', 0),
(45, 6, 1, '2022-01-10 12:35:56', 0),
(46, 6, 1, '2022-01-10 12:47:29', 0),
(47, 6, 1, '2022-01-10 13:18:11', 0),
(48, 6, 1, '2022-01-10 13:29:36', 0),
(49, 6, 1, '2022-01-10 13:49:48', 0),
(50, 6, 1, '2022-01-10 15:56:47', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `ten_khachhang` varchar(50) NOT NULL,
  `dia_chi` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `ten_khachhang`, `dia_chi`, `email`, `mat_khau`) VALUES
(1, 'Nguyễn Khánh Linh', '80 Đường Quang Trung, Quang Trung, Hà Đông, Hà Nội', 'khanhlinh@gmail.com', 'khanhlinh123'),
(2, 'Trần Anh Tuấn', '317 Trường Chinh, Khương Trung, Thanh Xuân, Hà Nội', 'at@gmail.com', 'tuananhjsi-123'),
(3, 'Bùi Thị Hạnh', '4 Lương Thế Vinh, Thanh Xuân Bắc, Thanh Xuân, Hà Nội', 'bth@gmail.com', 'buihanh789'),
(6, 'Tâm', 'Thái Phương, Hưng Hà, Thái Bình', 'Buithanhtam17042001@gmail.com', '123456'),
(7, 'Nguyễn Hiền Hương', 'Thái Nguyên', 'tambuibdsthaco@gmail.com', '123456'),
(8, 'Nguyễn Liễu', 'Hà Nội', 'nguyenlieu@gmail.com', '123459');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisanpham`
--

CREATE TABLE `tbl_loaisanpham` (
  `loaisanpham_id` int(11) NOT NULL,
  `ten_loaisanpham` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaisanpham`
--

INSERT INTO `tbl_loaisanpham` (`loaisanpham_id`, `ten_loaisanpham`) VALUES
(1, 'Cá, Hải sản'),
(2, 'Đồ đóng hộp'),
(3, 'Đồ mát, Đồ đông lạnh'),
(4, 'Rau, Củ, Quả'),
(5, 'Thịt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `ten_sanpham` varchar(50) NOT NULL,
  `loaisanpham_id` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `anh` varchar(100) NOT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `ten_sanpham`, `loaisanpham_id`, `gia`, `so_luong`, `anh`, `mo_ta`) VALUES
(11, 'Ba khía muối Nhất Tâm', 2, 111000, 253, 'ba-khia-muoi-nhat-tam-hu-400g.jpg', 'Khối lượng 400gThành phần Ba khía muối, đường, chất điều vị, tỏi, ớt, tắc, chất bảo quản,...Cách dùng Ăn kèm với cơm trắng hoặc các loại rau tuỳ thíchBảo quản Để ở nhiệt độ từ 0 - 5 độ CThương hiệu Nhất Tâm (Việt Nam)Nơi sản xuất Việt Nam'),
(12, 'Cá ngừ ngâm muối xắt khúc Sea Crown', 1, 23000, 84, 'ca-ngu-lat-hap-tui-1kg.jpg', 'Khối lượng 140gThành phần Cá ngừ (70%), nước, muối i-ốt (1.5%), nước rau củ, chất điều vị (INS621)Cách dùng Ăn liền, cho ra dĩa làm nóng hoặc chế biến thành món ăn tuỳ thích.Bảo quản Để nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếpThương hiệu Sea Crown (Thái Lan)Nơi sản xuất Thái Lan'),
(31, 'Cá tuyết KOUKYU', 1, 98000, 289, 'ca-tuyet-cat-khoanh.jpg', 'Cá tuyết chứa nhiều protein nhưng ít calo, chất béo và carbs\r\nCác túi thịt cá tuyết KOUKYU đều được hút chân không, không bị ứ đọng nước\r\nDễ chế biến, bảo quản\r\nKhối lượng 270g'),
(32, 'Cá ngừ lát', 1, 399000, 187, 'ca-saba-nauy-fillet-rut-xuong.jpg', 'Cá ngừ cắt lát túi 1kg'),
(41, 'Ớt chuông xanh', 4, 7500, 298, 'ot-chuong-xanh-tui-300g.jpg', 'Ớt chuông xanh túi 300g'),
(42, 'Ớt chuông đỏ', 4, 7000, 292, 'ot-chuong-do-tui-300g.jpg', 'Ớt chuông đỏ túi 300g'),
(44, 'Thịt bò', 5, 100000, 7, 'than-bo-uc-khay-250g.jpg', 'Bán gấp'),
(49, 'Thịt gà', 5, 50000, 195, 'ma-dui-ga-nhap-khau-tui-500g.jpeg', 'gà ta'),
(50, 'Cá cơm chua ngọt', 2, 45000, 296, 'ca-com-chua-ngot-vasifood-chai-300g.jpg', 'Ngon, bổ'),
(51, 'Cá mang sưa hộp', 2, 89000, 149, 'ca-mang-sua-ngam-dau-bangus-century-hop-184g.jpg', 'Hộp nhỏ'),
(52, 'Ngô ngọt', 4, 10000, 299, 'bap-my-2-trai.jpg', 'Ngô non'),
(53, 'Chả viên', 3, 79000, 94, 'cha-that-lat-vien-nhat-tam-goi-200g.jpg', 'bán gấp'),
(54, 'Cá chép', 1, 45000, 60, 'ca-chep.jpg', 'cá tươi');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`),
  ADD KEY `khoangoai1` (`hoadon_id`),
  ADD KEY `khoangoai2` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD PRIMARY KEY (`hoadon_id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `tbl_hoadon_ibfk_2` (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Chỉ mục cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  ADD PRIMARY KEY (`loaisanpham_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`),
  ADD KEY `loaisanpham_id` (`loaisanpham_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  MODIFY `hoadon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  MODIFY `loaisanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD CONSTRAINT `khoangoai1` FOREIGN KEY (`hoadon_id`) REFERENCES `tbl_hoadon` (`hoadon_id`),
  ADD CONSTRAINT `khoangoai2` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`sanpham_id`);

--
-- Các ràng buộc cho bảng `tbl_hoadon`
--
ALTER TABLE `tbl_hoadon`
  ADD CONSTRAINT `tbl_hoadon_ibfk_1` FOREIGN KEY (`khachhang_id`) REFERENCES `tbl_khachhang` (`khachhang_id`),
  ADD CONSTRAINT `tbl_hoadon_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`admin_id`);

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`loaisanpham_id`) REFERENCES `tbl_loaisanpham` (`loaisanpham_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
