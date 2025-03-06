-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th3 06, 2025 lúc 01:15 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom8`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL COMMENT 'id hóa đơn',
  `id_user` int NOT NULL COMMENT 'mã KH',
  `ma_donhang` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Mã hóa đơn',
  `nguoinhan_ten` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Tên người nhận',
  `nguoinhan_diachi` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'địa chỉ nhận',
  `nguoinhan_sdt` int DEFAULT NULL COMMENT 'SĐT nhận',
  `nguoinhan_email` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `pt_thanhtoan` tinyint(1) DEFAULT '0' COMMENT '0:POD 1:OP ',
  `voucher` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ship` int NOT NULL DEFAULT '0' COMMENT 'tiền giao hàng',
  `tong_thanhtoan` int NOT NULL,
  `ngay_dat_hang` date DEFAULT NULL,
  `order_notes` varchar(200) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `trangthai` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL COMMENT 'Mã sản phẩm',
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Nội dung',
  `ngay_bl` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Ngày bình luận',
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_bl`, `trang_thai`) VALUES
(33, 33, 138, 'Sản phẩm này rất bơ phẹt __++', '05:42:30 05/12/2023', 1),
(55, 34, 138, 'Nhưng giá lại quá đắt !', '05:44:11 05/12/2023', 1),
(56, 35, 139, 'Chỉ có bọn nghèo mới chê đắt thôi !', '05:45:05 05/12/2023', 1),
(57, 78, 140, 'Quá Đẹp', '18:58:56 05/12/2023', 1),
(58, 81, 141, 'Nên Mua nhé , bao bền', '07:29:56 07/12/2023', 1),
(59, 83, 139, 'Quá đẹp , \r\n', '06:01:50 08/12/2023', 1),
(64, 83, 140, 'csdvv', '2024-11-23 06:22:55', 1),
(65, 81, 141, 'coong', '2024-11-23 07:09:04', 1),
(66, 81, 141, 'new', '2024-11-23 07:09:54', 1),
(67, 81, 141, 'hiiii', '2024-11-23 07:45:17', 1),
(68, 81, 141, 'newwwww', '2024-11-23 07:48:19', 1),
(69, 34, 141, 'jnj', '2024-11-23 07:48:44', 1),
(70, 34, 141, 'nwqer', '2024-11-23 07:51:18', 1),
(71, 81, 141, 'sanr pham', '2024-11-23 07:56:48', 1),
(72, 34, 141, 'sản phẩm tốt giá rẻ', '2024-11-24 07:17:06', 1),
(73, 34, 141, 'sản phẩm tốt giá rẻ', '2024-11-24 07:17:07', 1),
(74, 34, 141, 'good', '2024-11-24 07:17:34', 1),
(75, 84, 141, 'nên mua nha mn', '2024-11-25 02:30:10', 1),
(76, 35, 154, 'sản phẩm perfect', '2024-11-25 04:53:40', 1),
(77, 84, 141, 'sản phẩm tốt', '2024-11-25 08:39:17', 1),
(78, 33, 154, 'đáng mua nha mn ', '2024-11-26 06:28:29', 1),
(79, 83, 141, 'quá đẹp', '2024-11-27 01:57:39', 1),
(80, 35, 141, 'js', '2024-11-29 04:41:21', 1),
(81, 35, 141, 'jvxs', '2024-11-30 07:18:13', 1),
(82, 34, 141, 'san phan nay tot', '2024-12-09 03:01:34', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(3, 4, 35, 120000.00, 5, 600000.00),
(4, 4, 34, 250000.00, 11, 2750000.00),
(5, 5, 35, 120000.00, 5, 600000.00),
(6, 5, 34, 250000.00, 11, 2750000.00),
(7, 7, 34, 250000.00, 8, 2000000.00),
(8, 7, 35, 120000.00, 6, 720000.00),
(9, 7, 83, 5490000.00, 1, 5490000.00),
(10, 7, 82, 19000000.00, 4, 76000000.00),
(11, 8, 34, 250000.00, 1, 250000.00),
(12, 8, 82, 19000000.00, 5, 95000000.00),
(13, 9, 82, 19000000.00, 2, 38000000.00),
(14, 9, 81, 1000000.00, 2, 2000000.00),
(15, 10, 82, 19000000.00, 1, 19000000.00),
(16, 10, 78, 1000000.00, 9, 9000000.00),
(17, 10, 34, 250000.00, 2, 500000.00),
(18, 10, 35, 120000.00, 1, 120000.00),
(19, 11, 82, 19000000.00, 1, 19000000.00),
(20, 11, 78, 1000000.00, 9, 9000000.00),
(21, 11, 34, 250000.00, 2, 500000.00),
(22, 11, 35, 120000.00, 1, 120000.00),
(23, 12, 82, 19000000.00, 1, 19000000.00),
(24, 12, 78, 1000000.00, 9, 9000000.00),
(25, 12, 34, 250000.00, 2, 500000.00),
(26, 12, 35, 120000.00, 1, 120000.00),
(27, 13, 35, 120000.00, 1, 120000.00),
(28, 13, 83, 5490000.00, 1, 5490000.00),
(29, 14, 35, 120000.00, 1, 120000.00),
(30, 15, 85, 12600000.00, 3, 37800000.00),
(31, 16, 34, 250000.00, 1, 250000.00),
(32, 16, 82, 14690000.00, 1, 14690000.00),
(33, 17, 35, 120000.00, 1, 120000.00),
(34, 17, 83, 5490000.00, 1, 5490000.00),
(35, 18, 83, 5490000.00, 1, 5490000.00),
(36, 18, 35, 120000.00, 7, 840000.00),
(37, 20, 35, 120000.00, 1, 120000.00),
(38, 21, 33, 7500000.00, 1, 7500000.00),
(39, 22, 35, 120000.00, 1, 120000.00),
(40, 23, 35, 120000.00, 1, 120000.00),
(41, 24, 78, 1000000.00, 1, 1000000.00),
(42, 25, 35, 120000.00, 1, 120000.00),
(43, 26, 35, 120000.00, 1, 120000.00),
(44, 27, 35, 120000.00, 2, 240000.00),
(45, 27, 78, 1000000.00, 1, 1000000.00),
(46, 27, 83, 5490000.00, 1, 5490000.00),
(47, 27, 34, 250000.00, 1, 250000.00),
(48, 28, 87, 9290000.00, 2, 18580000.00),
(49, 28, 34, 250000.00, 4, 1000000.00),
(50, 28, 35, 120000.00, 6, 720000.00),
(51, 29, 33, 7500000.00, 7, 52500000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL COMMENT 'Mã loại hàng',
  `ten_loai` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Tên loại hàng',
  `mota` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci COMMENT 'mô tả ở đây'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_loai`, `mota`) VALUES
(101, 'Apple', 'Apple là nhà sản xuất iPhone, dòng sản phẩm nổi bật và được yêu thích trên toàn cầu.'),
(102, 'Samsung', 'Samsung là một trong những hãng điện thoại lớn và phổ biến nhất trên thế giới, nổi tiếng với các dòng sản phẩm đa dạng từ điện thoại cao cấp đến tầm trung và giá rẻ.'),
(103, 'Xiami', 'Xiaomi là một trong những thương hiệu điện thoại lớn đến từ Trung Quốc, nổi tiếng với các sản phẩm điện thoại có giá cả phải chăng nhưng cấu hình mạnh mẽ.'),
(104, 'Oppo', 'Dòng sản phẩm Reno của OPPO tập trung vào thiết kế sáng tạo và các tính năng chụp ảnh vượt trội.'),
(106, 'Vivo', 'Dòng X Series của Vivo được biết đến với những sản phẩm cao cấp, tập trung vào camera và hiệu suất cao.'),
(117, 'Realme', 'Hiệu suất mạnh mẽ, màn hình đẹp, pin nhanh, cấu hình cao cấp, thiết kế thể thao và trẻ trung.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int NOT NULL,
  `trang_thai_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(1, 'THT-12345', 138, 'Minh', 'hieu12253@gmail.com', '0985635484', '13 Trịnh Văn Bô,Hà Nội', '2024-11-04', 2500000.00, 'mang ngay ra cho tôi', 1, 1),
(2, 'THT-1235624', 143, 'Ngọc', '12345@gmail.com', '023525145', 'Trịnh Văn Bô, Hà Nội', '2024-10-09', 1800000.00, 'ship nhanh đến cho tui', 1, 6),
(3, 'DH3812', 140, 'Tuấn Tú12', 'tu1@gmail.com', '2335685', '123 dsc', '2024-11-20', 4822000.00, '1233456', 1, 6),
(4, 'DH-1166', 140, 'Tuấn Tú', 'tu1@gmail.com', '2335685', '123 dsc', '2024-11-20', 4822000.00, 'hieu đặt hàng', 1, 1),
(5, 'DH-3401', 140, 'Tuấn Tú 12', 'tu1@gmail.com', '2335685', '123 dsc23', '2024-11-20', 4822000.00, 'hieu đây', 1, 1),
(6, 'DH-4569', 140, 'Tuấn Tú', 'tu1@gmail.com', '2335685', '123 dsc', '2024-11-20', 30000.00, '2011', 2, 1),
(7, 'DH-2145', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-21', 60288000.00, 'don hang tot', 1, 10),
(8, 'DH-7183', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-21', 62817000.00, 'gjjhbb', 1, 10),
(9, 'DH-3740', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-24', 25290000.00, 'giao sớm cho tôi', 2, 2),
(10, 'DH-7142', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-25', 14556000.00, 'giao nhanh nhất có thể cho tôi', 2, 2),
(11, 'DH-7794', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-25', 14556000.00, 'giao nhanh nhất có thể cho tôi', 1, 1),
(12, 'DH-4363', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-25', 14556000.00, 'giao nhanh nhất có thể cho tôi', 1, 1),
(13, 'DH-8644', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-25', 6357000.00, 'ok', 1, 1),
(14, 'DH-8012', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-25', 357000.00, '', 1, 1),
(15, 'DH-6330', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-26', 43530000.00, '', 1, 10),
(16, 'DH-9861', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-27', 19817000.00, '', 1, 1),
(17, 'DH-3588', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-27', 6357000.00, '', 1, 1),
(18, 'DH-8428', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-27', 8319000.00, '', 1, 1),
(19, 'DH-3590', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-27', 6030000.00, '', 1, 1),
(20, 'DH-1509', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-29', 357000.00, '123', 1, 8),
(22, 'DH-9052', 141, 'Phạm Lê Đức Trung', 'trung12@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-29', 357000.00, '123456789', 1, 8),
(23, 'DH-4367', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-29', 357000.00, '', 2, 2),
(24, 'DH-2214', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-29', 1280000.00, '1', 1, 8),
(25, 'DH-8887', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-30', 357000.00, '', 2, 2),
(26, 'DH-4191', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-11-30', 357000.00, '', 2, 2),
(27, 'DH-9207', 154, 'admin2', 'lehieu19042006@gmail.com', '0985635485', '123 Trịnh Văn Bô 12', '2024-12-08', 8221000.00, '12345', 1, 6),
(28, 'DH-8729', 141, 'Phạm Lê Đức Trung', 'trung@gmail.com', '214563', '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-12-08', 22120000.00, '123', 1, 1),
(29, 'DH-8124', 141, 'Phạm Lê Đức Trung12', 'trung122@gmail.com', '21456355622', '472/5623ewe Lê Đức Thọ , Phường 17, Gò vấp , HCM', '2024-12-09', 70030000.00, '122', 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `tai_khoan_id`) VALUES
(4, 140),
(7, 153),
(25, 154);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_san_pham`
--

CREATE TABLE `hinh_anh_san_pham` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh_san_pham`
--

INSERT INTO `hinh_anh_san_pham` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(13, 82, './uploads/1731660371oppo_a3_den_1_60d31c4366.jpg'),
(14, 82, './uploads/1731660371oppo_a3_den_2_83b299cb78.jpg'),
(15, 82, './uploads/1731660371oppo_a3_trang_5_9d886c971d.jpg'),
(16, 83, './uploads/17316800612024_6_14_638539252290763005_oppo-a60-xanh-4.jpg'),
(17, 83, './uploads/17316800612024_6_14_638539252291388601_oppo-a60-den-1-dd.jpg'),
(18, 83, './uploads/17316800612024_6_14_638539252299025543_oppo-a60-xanh-1.jpg'),
(19, 83, './uploads/17316800612024_6_14_638539252299650652_oppo-a60-xanh-3.jpg'),
(20, 84, './uploads/1732424269vivo-v40-lite-bac-1-638631652324926803-750x500.jpg'),
(21, 84, './uploads/1732424269vivo-v40-lite-bac-2-638631652331315511-750x500.jpg'),
(22, 84, './uploads/1732424269vivo-v40-lite-bac-3-638631652338882641-750x500.jpg'),
(23, 84, './uploads/1732424269vivo-v40-lite-bac-thumb-600x600.jpg'),
(24, 85, './uploads/1732425176vivo-y100-xanh-1-1-750x500.jpg'),
(25, 85, './uploads/1732425176vivo-y100-xanh-2-1-750x500.jpg'),
(26, 85, './uploads/1732425176vivo-y100-xanh-3-1-750x500.jpg'),
(27, 85, './uploads/1732425176vivo-y100-xanh-thumb-1-600x600.jpg'),
(28, 86, './uploads/1732426697vivo-y28-cam-1-750x500.jpg'),
(29, 86, './uploads/1732426697vivo-y28-cam-2-750x500.jpg'),
(30, 86, './uploads/1732426697vivo-y28-cam-3-750x500.jpg'),
(31, 87, './uploads/1732427482realme-13-plus-tim-1-638651073247797715-750x500.jpg'),
(32, 87, './uploads/1732427482realme-13-plus-tim-2-638651073253449987-750x500.jpg'),
(33, 87, './uploads/1732427482realme-13-plus-tim-3-638651073261751951-750x500.jpg'),
(34, 87, './uploads/1732427482realme-13-plus-tim-thumb-600x600.jpg'),
(39, 35, './uploads/1732432867samsung-galaxy-s24-ultra-xam-1-750x500.jpg'),
(40, 35, './uploads/1732432867samsung-galaxy-s24-ultra-xam-2-750x500.jpg'),
(41, 35, './uploads/1732432867samsung-galaxy-s24-ultra-xam-3-750x500.jpg'),
(43, 33, './uploads/1732433237iphone-12-xanh-la-1-1-750x500.jpg'),
(44, 33, './uploads/1732433237iphone-12-xanh-la-2-750x500.jpg'),
(45, 33, './uploads/1732433237iphone-12-xanh-la-3-750x500.jpg'),
(46, 34, './uploads/1732433444iphone-15-128gb-hong-3-1-750x500.jpg'),
(47, 34, './uploads/1732433430iphone-15-128gb-hong-2-750x500.jpg'),
(48, 34, './uploads/1732433430iphone-15-pink-2-638629454255353553-750x500.jpg'),
(50, 78, './uploads/1732433607iphone-15-pro-max-black-1-1-750x500.jpg'),
(51, 78, './uploads/1732433607iphone-15-pro-max-black-3-1-750x500.jpg'),
(52, 78, './uploads/1732433607iphone-15-pro-max-titan-den-2-638629415797228950-750x500.jpg'),
(53, 81, './uploads/1732433874xiaomi-14t-xam-1-638635700973443455-750x500.jpg'),
(54, 81, './uploads/1732433874xiaomi-14t-xam-2-638635700979069226-750x500.jpg'),
(55, 81, './uploads/1732433874xiaomi-14t-xam-3-638635700984506402-750x500.jpg'),
(56, 89, './uploads/1732434202samsung-galaxy-z-fold6-xam-1-1-750x500.jpg'),
(57, 89, './uploads/1732434202samsung-galaxy-z-fold6-xam-2-1-750x500.jpg'),
(58, 89, './uploads/1732434202samsung-galaxy-z-fold6-xam-3-1-750x500.jpg'),
(59, 89, './uploads/1732434202samsung-galaxy-z-fold6-xam-4-1-750x500.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_thuc_thanh_toan`
--

CREATE TABLE `phuong_thuc_thanh_toan` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong_thuc_thanh_toan`
--

INSERT INTO `phuong_thuc_thanh_toan` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD (Thanh Toán khi nhận hàng)'),
(2, 'Thanh Toán VNPay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL COMMENT 'Mã hàng hóa',
  `ten_sp` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Tên hàng hóa',
  `gia` int NOT NULL COMMENT 'Giá chính',
  `giam_gia` int DEFAULT NULL COMMENT 'Giá giảm',
  `hinh` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Hình ảnh',
  `soluong` int NOT NULL,
  `ngay_nhap` date NOT NULL COMMENT 'Ngày nhập hàng',
  `mo_ta` text COLLATE utf8mb3_unicode_ci COMMENT 'Mô tả chi tiết hàng hóa',
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1',
  `so_luot_xem` int NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) DEFAULT '0' COMMENT 'TINYINT(1): Kiểu dữ liệu nhỏ, chỉ chứa giá trị 0 hoặc 1.\r\nDEFAULT 0: Giá trị mặc định là 0 nếu không được chỉ định.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_sp`, `gia`, `giam_gia`, `hinh`, `soluong`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`, `so_luot_xem`, `is_hot`) VALUES
(33, 'Iphone 12 - 128GB | Chính Hãng VN/A', 10000000, 7500000, './uploads/1730446951anh5.jpg', 1200, '2022-11-05', '- Mạnh mẽ, siêu nhanh với chip A14, RAM 4GB, mạng 5G tốc độ cao. <br>\r\n- Rực rỡ, sắc nét, độ sáng cao -Màn hình OLED cao cấp, Super Retina XDR hỗ trợ HDR10, Dolby Vision <br>\r\n- Chụp đêm ấn tượng -  Night Mode cho 2 camera, thuật toán Deep Fusion, Smart HDR 3 <br>\r\n- Bền bỉ vượt trội - Kháng nước, kháng bụi IP68, mặt lưng Ceramic Shield.', 101, 1, 4, 0),
(34, 'iPhone 15 128GB | Chính hãng VN/A', 287000, 250000, './uploads/1732433469iphone-15-hong-thumb-1-600x600.jpg', 15, '2023-11-20', '- Thiết kế thời thượng và bền bỉ - Mặt lưng kính được pha màu xu hướng cùng khung viền nhôm bền bỉ.\r\n- Dynamic Island hiển thị linh động mọi thông báo ngay lập tức giúp bạn nắm bắt mọi thông tin.\r\n- Chụp ảnh đẹp nức lòng -  Camera chính 48MP, Độ phân giải lên đến 4x và Tele 2x chụp chân dung hoàn hảo.\r\n- Pin dùng cả ngày không lo lắng - Thời gian xem video lên đến 20 giờ và sạc nhanh qua cổng USB-C tiện lợi', 101, 1, 11, 1),
(35, 'Samsung Galaxy S24 Ultra 12GB 128GB', 327000, 120000, './uploads/1732432783ss-s24-ultra-xam-222.webp', 36, '2023-12-21', 'Trải nghiệm đỉnh cao với hiệu năng mạnh mẽ từ vi xử lý tân tiến, kết hợp cùng RAM 12GB cho khả năng đa nhiệm mượt mà.\r\nLưu trữ thoải mái mọi ứng dụng, hình ảnh và video với bộ nhớ trong 256GB.\r\nNâng tầm nhiếp ảnh di động với hệ thống camera tiên tiến, cho ra đời những bức ảnh và video chất lượng chuyên nghiệp.\r\nThiết kế sang trọng, đẳng cấp, khẳng định phong cách thời thượng.', 102, 1, 6, 0),
(78, 'iPhone 15 Pro Max 128GB', 1250000, 1000000, './uploads/1732433631iphone-15-pro-max-black-thumbnew-600x600.jpg', 1200, '2024-03-06', 'iPhone 14 Pro Max là sự kết hợp hoàn hảo giữa hiệu năng mạnh mẽ, thiết kế sang trọng và các tính năng camera tiên tiến, phù hợp với những ai yêu thích trải nghiệm công nghệ cao cấp. Các cải tiến về màn hình, camera và hiệu suất giúp iPhone 14 Pro Max trở thành một trong những smartphone tốt nhất trên thị trường hiện nay.', 101, 1, 0, 0),
(81, 'Xiaomi 14T 12GB - 512GB', 1300000, 1000000, './uploads/1731950534xiaomi_14t_2_.webp', 1200, '2024-10-10', '- Hiệu năng mạnh mẽ với chip MediaTek Dimensity 8300-Ultra - Mang lại hiệu năng tốt cho các tác vụ hàng ngày , từ lướt web, xem video đến chơi game với độ ổn định cao.\r\n- Thấu kính quang học Leica Summilux - Ghi lại những bức ảnh chi tiết, sắc nét phù hợp với nhu cầu nhiếp ảnh di động và quay phim chất lượng cao.\r\n- Màn hình 144Hz AMOLED cho màu sắc sống động, độ sáng cao và khả năng tái hiện hình ảnh chân thực, mang lại trải nghiệm xem phim, chơi game tuyệt vời.\r\n- Xiaomi 14T trang bị pin lớn 5.000mAh, kết hợp với công nghệ sạc nhanh 67W - Sạc đầy nhanh chóng và duy trì thời gian sử dụng suốt cả ngày.', 103, 1, 0, 1),
(82, 'Điện thoại Oppo A3 8GB-256GB', 19500000, 14690000, './uploads/1731660371oppo_a3_trang_5_9d886c971d.jpg', 120, '2024-10-10', 'OPPO A3 sở hữu giá bán hợp lý với thiết kế hiện đại cùng hiệu suất vượt trội bởi chipset mượt mà Snapdragon 6s 4G Gen 1, pin 5.100mAh, hỗ trợ sạc nhanh 45W và bộ nhớ 256GB, rất phù hợp dành cho người dùng trẻ năng động. Đặc biệt, thiết bị còn bền bỉ khi đạt chuẩn độ bền quân đội và tích hợp kháng bụi/nước IP54, giúp bạn sử dụng dài lâu.', 104, 1, 0, 1),
(83, 'Điện thoại Oppo A60 8GB-128GB', 6000000, 5490000, './uploads/17316800612024_6_14_638539252291388601_oppo-a60-den-1-dd.jpg', 85, '2024-10-30', 'OPPO A60 là sự lựa chọn sáng giá trong phân khúc với nhiều tính năng ấn tượng và thiết kế hiện đại, bền bỉ. Điện thoại sở hữu viên pin lớn 5.000mAh và sạc nhanh 45W vượt trội cho trải nghiệm liền mạch, tiết kiệm thời gian sạc hiệu quả. Thiết kế còn ghi điểm bởi sự trẻ trung, đạt chuẩn tiêu chuẩn quân đội MIL-STD-810G cao cấp, giúp bạn yên tâm sử dụng.\r\n\r\n', 104, 1, 0, 1),
(84, 'Điện thoại vivo V40 Lite 8GB/256GB', 12500000, 9600000, './uploads/1732424269vivo-v40-lite-bac-thumb-600x600.jpg', 25, '2024-11-01', 'Vivo V40 Lite mang đến trải nghiệm mượt mà với hiệu năng ổn định, màn hình chất lượng cao và khả năng chụp ảnh ấn tượng, phù hợp cho người dùng tìm kiếm một chiếc smartphone tầm trung với nhiều tính năng hiện đại.', 106, 1, 0, 0),
(85, 'Điện thoại Vivo Y100 8GB | 128GB', 14500000, 12600000, './uploads/1732425176vivo-y100-xanh-thumb-1-600x600.jpg', 25, '2024-11-15', 'Vivo Y100 8GB/128GB mang đến trải nghiệm mượt mà với hiệu năng ổn định, màn hình chất lượng cao và khả năng chụp ảnh ấn tượng, phù hợp cho người dùng tìm kiếm một chiếc smartphone tầm trung với nhiều tính năng hiện đại.', 106, 1, 0, 0),
(86, 'Điện thoại vivo Y28 8GB/128GB', 6000000, 5500000, './uploads/1732426697vivo-y28-vang-thumb-600x600.jpg', 13, '2024-10-16', 'Vivo Y28 8GB/128GB mang đến trải nghiệm mượt mà với hiệu năng ổn định, màn hình chất lượng cao và khả năng chụp ảnh ấn tượng, phù hợp cho người dùng tìm kiếm một chiếc smartphone tầm trung với nhiều tính năng hiện đại.', 106, 1, 0, 0),
(87, 'Điện thoại realme 13+ 5G 8GB/128GB', 9490000, 9290000, './uploads/1732427482realme-13-plus-tim-thumb-600x600.jpg', 35, '2024-10-18', 'Realme 13+ 5G 8GB/256GB mang đến trải nghiệm mượt mà với hiệu năng mạnh mẽ, màn hình chất lượng cao và khả năng chụp ảnh ấn tượng, phù hợp cho người dùng tìm kiếm một chiếc smartphone tầm trung với nhiều tính năng hiện đại.', 117, 1, 0, 1),
(89, 'Samsung Galaxy Z Fold6 5G 12GB/256GB', 43990000, 41990000, './uploads/1732434202samsung-galaxy-z-fold6-xam-thumbn-600x600.jpg', 12, '2024-11-07', 'Samsung Galaxy Z Fold6 5G 12GB/256GB là mẫu điện thoại gập cao cấp của Samsung, nổi bật với thiết kế hiện đại, hiệu năng mạnh mẽ và khả năng đa nhiệm vượt trội. Điện thoại sở hữu:\r\n- Thiết kế: Gập linh hoạt với trọng lượng nhẹ hơn, màn hình chính 7.6 inch Dynamic AMOLED 2X, màn hình ngoài 6.3 inch, cả hai đều có tần số quét 120Hz.\r\n- Hiệu năng: Trang bị chip Snapdragon 8 Gen 3 tiến trình 4nm, RAM 12GB, ROM 256GB, đảm bảo xử lý tác vụ mượt mà.\r\n- Camera: Hệ thống camera đa năng (50MP chính, 12MP góc rộng, 10MP tele) kết hợp AI hỗ trợ chụp ảnh chuyên nghiệp.\r\n- Pin và sạc: Pin 4.400mAh hỗ trợ sạc nhanh, kéo dài thời gian sử dụng.\r\nĐây là lựa chọn hoàn hảo cho người dùng yêu công nghệ và đòi hỏi một thiết bị tối ưu cho công việc và giải trí.', 102, 1, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int NOT NULL COMMENT 'Mã khách hàng',
  `hoten` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Họ và tên',
  `hinh` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci COMMENT 'Tên hình ảnh',
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Đia chỉ Email',
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:user 1:admin 2:block',
  `diachi` varchar(500) COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ',
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '1',
  `mat_khau` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dienthoai` int DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `hoten`, `hinh`, `ngay_sinh`, `email`, `role`, `diachi`, `gioi_tinh`, `mat_khau`, `dienthoai`, `trang_thai`) VALUES
(138, 'Hiếu', './uploads/1731655775anh18.jpg', '2024-10-30', 'hieulvph51615@gmail.com', 0, 'Xuân Phương, Nam Từ Liêm, Hà Nội', 1, '123456789', 985635484, 1),
(139, 'Lê Tuấn Tú', 'hinh_defaut.jpg', '2024-10-09', 'tu1234@gmail.com', 1, 'CVPM Quang Trung, Q.12, TP.HCM', 1, '123456', 1200251426, 1),
(140, 'Tuấn Tú', 'hinh_defaut.jpg', '2024-05-04', 'tu1@gmail.com', 0, '123 dsc', 2, '$2y$10$BliGeFbt7qYtHkcYmkYOG.qyr9ZW.UpVTtMcz5jCdafe9Xg55aVRO', 2335685, 1),
(141, 'Phạm Lê Đức Trung', 'hinh_defaut.jpg', '2024-11-01', 'trung@gmail.com', 0, '472/56 Lê Đức Thọ , Phường 17, Gò vấp , HCM', 1, '$2y$10$r7wZanUm8eW73Bu0aaY20OMgPqHM4QVH7KR9MO5qX6K7Z4Bc2/BiW', 214563, 1),
(142, 'trunglee', 'hinh_defaut.jpg', '2018-11-21', 'nhom8@gmail.com', 1, 'Hà Nội', 1, '$2y$10$r7wZanUm8eW73Bu0aaY20OMgPqHM4QVH7KR9MO5qX6K7Z4Bc2/BiW', 372179063, 1),
(143, 'lee', 'hinh_defaut.jpg', '2023-07-21', 'trunhle36@gmail.com', 0, 'Nam Định', 1, '$2y$10$zwr5H6b2FjMadJIiQKgs/uatqErw6ta4/tVTswRMwowdmcWGOeAQG', 372179063, 2),
(144, 'Lê Văn Hiếu', './uploads/1731655775anh18.jpg', '2024-11-02', 'hieu12@gmail.com', 1, '123 Trịnh Văn Bô', 1, '$2y$10$r7wZanUm8eW73Bu0aaY20OMgPqHM4QVH7KR9MO5qX6K7Z4Bc2/BiW', 123522522, 1),
(145, 'Phạm Lê Đức Trung', './uploads/1731655775anh18.jpg', '2024-02-15', 'trungle@gmail.com', 1, '12 Đường Trịnh Văn Bô, Nam Từ Liêm', 1, '$2y$10$2Y1k/15HfsHAIFoD7uXk4O/3oKZ.bzZWPSbe/hK.OLmfyMmz9NvYC', 120000, 1),
(150, 'hiếu', './uploads/1731655775anh18.jpg', '2015-11-11', 'hieu123@gmail.com', 0, '123 Xuân Phương', 1, '$2y$10$25pQN0pFODwjf2uCilny/.a1Q4dC99.b4AyyX0Uxves9bB5IjSYSa', 652663, 1),
(151, 'hieule', NULL, NULL, '113@gmail.com', 0, NULL, 1, '$2y$10$XfHhfXQn1a0zVs5ElipHOOkjayU4FtVoGmpL1JtmZyASFEOMvwN1e', NULL, 1),
(152, 'Phạm Đức Trung', NULL, NULL, 'trung123@gmail.com', 0, NULL, 1, '$2y$10$8WOaqiyY.ifCr1FM4B1Mxu8xb16lTR7d1mWpuiYIqaeTaRJ7znZaW', NULL, 1),
(153, 'tu', NULL, NULL, 'tu12@gmail.com', 0, NULL, 1, '$2y$10$ea7eLSPy12qDdDWvvdr6RuuGt6JPJh4liuGIgizyT1I9ZunxeNREu', NULL, 1),
(154, 'admin1', './uploads/1730471090anh17.jpg', NULL, 'lehieu19042005@gmail.com', 0, NULL, 1, '$2y$10$Q5XDZkDuxj1j2pbkWiDYF.9RBZYVYb221dwTmswevKPd5qFpWy/ZS', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai_don_hang`
--

INSERT INTO `trang_thai_don_hang` (`id`, `ten_trang_thai`) VALUES
(1, 'chưa xác nhận'),
(2, 'đã xác nhận\r\n'),
(3, 'Chưa thanh toán'),
(4, 'Đang thanh toán'),
(5, 'Đang chuẩn bị hàng'),
(6, 'Đang giao hàng'),
(7, 'Đã giao\r\n'),
(8, 'Thành công'),
(9, 'Hoàn hàng'),
(10, 'Hủy đơn');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_user` (`id_user`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_binhluan_sanpham` (`san_pham_id`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id hóa đơn', AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Mã loại hàng', AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Mã hàng hóa', AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng', AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT cho bảng `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`id_user`) REFERENCES `tai_khoan` (`id`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_binhluan_sanpham` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
