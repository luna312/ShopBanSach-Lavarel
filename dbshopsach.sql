-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 13, 2022 lúc 03:14 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbshopsach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_11_06_151743_create_tbl_admin_table', 1),
(4, '2021_11_06_173847_create_tbl_category_product', 2),
(5, '2021_11_07_031912_create_tbl_brand_product', 3),
(6, '2021_11_07_032355_drop_table_brand', 4),
(7, '2021_11_07_032438_create_tbl_brand_product', 5),
(8, '2021_11_07_071821_create_tbl_product', 6),
(9, '2021_11_07_074228_drop_tbl_product', 7),
(10, '2021_11_07_074552_create_tbl_product', 8),
(11, '2021_11_08_040127_tbl_customer', 9),
(12, '2021_11_08_071836_tbl_ship', 10),
(13, '2021_11_08_073358_drop_tbl_ship', 11),
(14, '2021_11_08_073638_tbl_ship', 12),
(17, '2021_11_08_124549_tbl_payment', 13),
(18, '2021_11_08_124718_tbl_order', 13),
(19, '2021_11_08_124752_tbl_order_detail', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_role`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, '1', 'admin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'ThaoJack', '0159357', '2021-06-11 15:46:00', NULL),
(4, '1', 'admin2@gmail.com', '40f5888b67c748df7efba008e7c2f9d2', 'Jack', '123', NULL, NULL),
(5, '2', 'admin3@gmail.com', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'Angus', '15987', NULL, NULL),
(6, '2', 'admin6@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'Lucy', '0395095598', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Kim Đồng', 'bình dương', 1, NULL, NULL),
(3, 'NXBHCM', 'NXBHCM', 1, NULL, NULL),
(4, 'NXB Trẻ', 'dasdad', 1, NULL, NULL),
(5, 'Mint Book', 'fdsfsdf', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(6, 'Manga', 'truyện tranh', 1, NULL, NULL),
(7, 'Light Novel', 'Tiểu thuyết Nhật Bản', 1, NULL, NULL),
(8, 'Văn học', 'Các tac phẩm văn học khác', 1, NULL, NULL),
(9, 'Truyện nguyên bộ', 'Combo nhiều truyện', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_name` varchar(100) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `comment`, `comment_name`, `comment_date`, `product_id`) VALUES
(1, 'LoveLoveLoveLoveLoveLoveLoveLove', 'Love', '2021-11-17 11:19:59', 3),
(2, '4568956f35d45f4sd5fds45fsd6f456sdf4', 'Jacky', '2021-11-17 11:19:59', 3),
(3, 'gdfgdfgdsfgdfgdfg', '8946565', '2021-11-17 11:19:59', 3),
(4, 'gdfgdfgdsfgdfgdfg', 'ABCD', '2021-11-17 11:19:59', 3),
(14, 'dsadasd', 'Thao', '2021-11-18 10:34:05', 3),
(15, 'fsdfsd', 'Thao', '2021-11-18 11:01:15', 3),
(16, 'fsdfsd', 'Thao', '2021-11-18 11:01:17', 3),
(17, 'fsdfsd', 'Thao', '2021-11-18 11:01:19', 3),
(18, 'fsdfsd', 'Thao', '2021-11-18 11:01:21', 3),
(19, 'Hay ghê nha', 'Thao', '2021-11-22 12:14:33', 6),
(20, 'nice nice nice', 'Thao', '2021-11-22 14:11:17', 7),
(21, 'vcxvcxv', 'Thao', '2021-11-27 04:17:04', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment_post`
--

CREATE TABLE `tbl_comment_post` (
  `comment_post_id` int(11) NOT NULL,
  `comment_post` varchar(255) NOT NULL,
  `comment_post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment_post_name` varchar(255) NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment_post`
--

INSERT INTO `tbl_comment_post` (`comment_post_id`, `comment_post`, `comment_post_date`, `comment_post_name`, `post_id`) VALUES
(3, 'ddsd', '2021-11-22 14:22:57', 'Thao', 2),
(4, 'nice nice nice nice', '2021-11-26 07:59:03', 'Jack', 2),
(6, 'thật sâu sắc', '2021-11-26 16:09:22', 'Hinju', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `customer_phone`, `customer_image`, `created_at`, `updated_at`) VALUES
(4, 'Mach Hoang Minh', 'thao@gmail.com', 'eb62f6b9306db575c2d596b1279627a4', '118444kjhkjh', '03950987457', 'cute88.gif', NULL, NULL),
(6, 'jackylove', 'jackylove123@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'fdgdfgfdgdfg', '0123456', 'one87.png', NULL, NULL),
(10, 'Mach Minh', 'machhmthao123@gmail.com', '36e1a5072c78359066ed7715f5ff3da8', 'Binh Duong', '0354899742', NULL, NULL, NULL),
(11, 'Hinju', 'hinju12@gmail.com', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'NewYork', '01593572486', NULL, NULL, NULL),
(12, 'Mach Hoang Minh Thao', 'machhm5487h@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '5656', '0395095598', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `ship_id` int(11) UNSIGNED NOT NULL,
  `payment_id` int(11) UNSIGNED NOT NULL,
  `order_total` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `ship_id`, `payment_id`, `order_total`, `order_date`, `order_status`, `created_at`, `updated_at`) VALUES
(29, 4, 39, 33, '99,000.00', '16-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(30, 4, 40, 34, '99,000.00', '16-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(31, 4, 41, 35, '150,200.60', '16-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(32, 4, 43, 36, '891,000.00', '22-11-2021', 'Đã giao hàng', NULL, NULL),
(33, 4, 44, 37, '49,500.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(34, 4, 44, 38, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(35, 4, 44, 39, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(36, 4, 44, 40, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(37, 4, 45, 41, '117,260.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(38, 4, 45, 42, '117,260.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(39, 4, 45, 43, '117,260.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(40, 4, 45, 44, '117,260.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(41, 4, 45, 45, '117,260.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(42, 4, 45, 46, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(43, 4, 45, 47, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(44, 4, 45, 48, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(45, 4, 45, 49, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(46, 4, 45, 50, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(47, 4, 46, 51, '638,000.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(48, 4, 46, 52, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(49, 4, 47, 53, '1,485,000.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(50, 4, 47, 54, '1,485,000.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(51, 4, 47, 55, '1,485,000.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(52, 4, 47, 56, '1,485,000.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(53, 4, 47, 57, '1,485,000.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(54, 4, 48, 58, '123,750.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(55, 4, 49, 59, '123,750.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(56, 4, 50, 60, '148,500.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(57, 4, 50, 61, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(58, 4, 50, 62, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(59, 4, 51, 63, '123,750.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(60, 4, 51, 64, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(61, 4, 52, 65, '123,750.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(62, 4, 53, 66, '123,750.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(63, 4, 54, 67, '123,750.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(64, 4, 54, 68, '123,750.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(65, 4, 55, 69, '371,250.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(66, 4, 56, 70, '495,000.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(67, 4, 57, 71, '123,750.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(68, 4, 58, 72, '247,500.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(69, 4, 58, 73, '247,500.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(70, 4, 58, 74, '247,500.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(71, 4, 58, 75, '247,500.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(72, 4, 58, 76, '247,500.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(73, 4, 58, 77, '0.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(74, 4, 59, 78, '123,750.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(75, 4, 60, 79, '207,900.00', '26-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(77, 4, 62, 81, '1,506,304.80', '27-11-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(78, 4, 64, 82, '117,260.00', '11-12-2021', 'Đang xử lý đơn hàng', NULL, NULL),
(79, 4, 64, 83, '0.00', '11-12-2021', 'Đang xử lý đơn hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_buy_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_buy_quantity`, `created_at`, `updated_at`) VALUES
(30, 29, 9, 'Doraemon tap 57', '90000', 1, NULL, NULL),
(31, 30, 9, 'Doraemon tap 57', '90000', 1, NULL, NULL),
(32, 31, 9, 'Doraemon tap 57', '90000', 1, NULL, NULL),
(33, 31, 5, 'Doraemon tap 33', '46546', 1, NULL, NULL),
(34, 32, 25, 'CÔ DÂU THẢO NGUYÊN TẬP 1-10', '810000', 1, NULL, NULL),
(35, 33, 9, 'MADE IN ABYSS', '45000', 1, NULL, NULL),
(36, 37, 26, '[COMBO BOXSET] PHÁO HOA, NGẮM TỪ DƯỚI HAY BÊN CẠNH? + TẠM BIỆT PHÁO HOA', '106600', 1, NULL, NULL),
(37, 38, 26, '[COMBO BOXSET] PHÁO HOA, NGẮM TỪ DƯỚI HAY BÊN CẠNH? + TẠM BIỆT PHÁO HOA', '106600', 1, NULL, NULL),
(38, 39, 26, '[COMBO BOXSET] PHÁO HOA, NGẮM TỪ DƯỚI HAY BÊN CẠNH? + TẠM BIỆT PHÁO HOA', '106600', 1, NULL, NULL),
(39, 40, 26, '[COMBO BOXSET] PHÁO HOA, NGẮM TỪ DƯỚI HAY BÊN CẠNH? + TẠM BIỆT PHÁO HOA', '106600', 1, NULL, NULL),
(40, 41, 26, '[COMBO BOXSET] PHÁO HOA, NGẮM TỪ DƯỚI HAY BÊN CẠNH? + TẠM BIỆT PHÁO HOA', '106600', 1, NULL, NULL),
(41, 47, 24, '[COMBO] BARAKAMON 1-15', '580000', 1, NULL, NULL),
(42, 49, 22, '[COMBO] TAKAGI (VẪN LÀ) 1-7', '450000', 3, NULL, NULL),
(43, 50, 22, '[COMBO] TAKAGI (VẪN LÀ) 1-7', '450000', 3, NULL, NULL),
(44, 51, 22, '[COMBO] TAKAGI (VẪN LÀ) 1-7', '450000', 3, NULL, NULL),
(45, 52, 22, '[COMBO] TAKAGI (VẪN LÀ) 1-7', '450000', 3, NULL, NULL),
(46, 53, 22, '[COMBO] TAKAGI (VẪN LÀ) 1-7', '450000', 3, NULL, NULL),
(47, 54, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 5, NULL, NULL),
(48, 55, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 5, NULL, NULL),
(49, 56, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 6, NULL, NULL),
(50, 59, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 5, NULL, NULL),
(51, 61, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 5, NULL, NULL),
(52, 62, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 5, NULL, NULL),
(53, 63, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 5, NULL, NULL),
(54, 64, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 5, NULL, NULL),
(55, 65, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 15, NULL, NULL),
(56, 66, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 20, NULL, NULL),
(57, 67, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 5, NULL, NULL),
(58, 68, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 10, NULL, NULL),
(59, 69, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 10, NULL, NULL),
(60, 70, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 10, NULL, NULL),
(61, 71, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 10, NULL, NULL),
(62, 72, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 10, NULL, NULL),
(63, 74, 4, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '22500', 5, NULL, NULL),
(64, 75, 6, 'DÃ NGOẠI THẢNH THƠI - YURUCAMP TẬP 1', '27000', 7, NULL, NULL),
(65, 77, 7, 'MIỀN ĐẤT HỨA - THE PROMISED NEVERLAND- 0 MYSTIC CODE', '456456', 3, NULL, NULL),
(66, 78, 26, '[COMBO BOXSET] PHÁO HOA, NGẮM TỪ DƯỚI HAY BÊN CẠNH? + TẠM BIỆT PHÁO HOA', '106600', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(15, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(16, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(17, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(18, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(19, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(20, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(21, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(22, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(23, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(24, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(25, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(26, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(27, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(28, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(29, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(30, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(31, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(32, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(33, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(34, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(35, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(36, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(37, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(38, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(39, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(40, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(41, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(42, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(43, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(44, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(45, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(46, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(47, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(48, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(49, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(50, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(51, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(52, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(53, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(54, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(55, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(56, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(57, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(58, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(59, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(60, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(61, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(62, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(63, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(64, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(65, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(66, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(67, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(68, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(69, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(70, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(71, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(72, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(73, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(74, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(75, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(76, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(77, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(78, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(79, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(80, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(81, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(82, '2', 'Đang xử lý đơn hàng', NULL, NULL),
(83, '2', 'Đang xử lý đơn hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `post_title` tinytext NOT NULL,
  `post_desc` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_meta_desc` varchar(255) NOT NULL,
  `post_meta_keywords` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_status` int(11) NOT NULL,
  `post_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `customer_id`, `post_title`, `post_desc`, `post_content`, `post_meta_desc`, `post_meta_keywords`, `post_date`, `post_status`, `post_image`) VALUES
(2, 4, 'Lỗi \"unable to find an INI file\" game Skyrim Special Edition', '(PLO)- Người dân Thủ đô sẽ tắt đèn và thắp nến tưởng niệm đồng bào, chiến sỹ hi sinh, tử vong do đại dịch COVID-19 vào 20 giờ tối 19-11.', '<p>UBND TP H&agrave; Nội vừa ban h&agrave;nh kế hoạch tổ chức lễ tưởng niệm đồng b&agrave;o v&agrave; c&aacute;n bộ, chiến sỹ hy sinh, tử vong trong đại dịch COVID-19. Lễ tưởng niệm tại đầu cầu H&agrave; Nội sẽ diễn ra tại c&ocirc;ng vi&ecirc;n Thống nhất, v&agrave;o l&uacute;c 20 giờ tối ng&agrave;y 19-11 v&agrave; được truyền h&igrave;nh trực tiếp tr&ecirc;n VTV1. UBND TP H&agrave; Nội cho biết buổi lễ nhằm tưởng niệm đồng b&agrave;o đ&atilde; mất do đại dịch v&agrave; tri &acirc;n, biểu dương c&aacute;n bộ, chiến sỹ, c&aacute;c lực lượng đ&atilde; hy sinh v&igrave; dịch bệnh COVID-19. Lễ tưởng niệm thể hiện sự chia sẻ, động vi&ecirc;n của Đảng, Nh&agrave; nước, Mặt trận Tổ quốc Việt Nam, TP H&agrave; Nội trước những mất m&aacute;t, đau thương của c&aacute;c gia đ&igrave;nh, người th&acirc;n, lan toả t&igrave;nh nh&acirc;n &aacute;i cộng đồng, tiếp tục động vi&ecirc;n tinh thần c&aacute;c lực lượng tuyến đầu v&agrave; n&acirc;ng cao &yacute; thức tr&aacute;ch nhiệm của nh&acirc;n d&acirc;n trong tham gia ph&ograve;ng, chống địch COVID-19. Tối 19-11, H&agrave; Nội tắt đ&egrave;n, thắp nến tưởng niệm đồng b&agrave;o mất do COVID-19 - ảnh 1 B&agrave;n thờ d&acirc;n do qu&acirc;n đội lập ở nơi lưu tạm tro cốt đồng b&agrave;o TP.HCM mất trong đại dịch. Ảnh: Bộ Tư lệnh TP.HCM Kh&iacute;ch lệ tinh thần đại đo&agrave;n kết, &yacute; ch&iacute; quật cường của to&agrave;n d&acirc;n tộc, vượt qua kh&oacute; khăn, th&aacute;ch thức, th&iacute;ch ứng an to&agrave;n, linh hoạt, kiểm so&aacute;t hiệu quả dịch COVID-19, phục hồi sản xuất, kinh doanh, ph&aacute;t triển kinh tế, x&atilde; hội, x&acirc;y dựng v&agrave; bảo vệ Tổ quốc. &ldquo;Việc tổ chức Lễ Tưởng niệm phải đảm bảo trang ngh&ecirc;m, trang trọng tiết kiệm; thực hiện nghi&ecirc;m c&aacute;c quy định về ph&ograve;ng, chống dịch bệnh Covid-19&rdquo;, kế hoạch của UBND TP H&agrave; Nội n&ecirc;u r&otilde;. Dự kiến khoảng 300 đại biểu, tham gia lễ tưởng niệm l&agrave; đại diện l&atilde;nh đạo Đảng, Nh&agrave; nước, Mặt trận Tổ quốc Việt Nam, l&atilde;nh đạo c&aacute;c ban, bộ, ng&agrave;nh Trung ương, l&atilde;nh đạo Th&agrave;nh ủy, HĐND, UBND, Uỷ ban Mặt trận Tổ quốc Việt Nam TP H&agrave; Nội, c&aacute;c cơ quan của TP H&agrave; Nội v&agrave; đại diện một số tổ chức t&ocirc;n gi&aacute;o. Lễ tưởng niệm sẽ thực hiện c&aacute;c quy định về ph&ograve;ng dịch, 5k. C&aacute;c đại biểu dự phải đảm bảo đ&atilde; ti&ecirc;m đủ liều vaccine, liều sau c&ugrave;ng tối thiểu phải đủ 14 ng&agrave;y, t&iacute;nh đến hết ng&agrave;y tham gia Lễ Tưởng niệm. C&oacute; giấy x&eacute;t nghiệm SARS-CoV-2 &acirc;m t&iacute;nh trong v&ograve;ng 72 tiếng, t&iacute;nh đến hết thời điểm tổ chức Lễ Tưởng niệm. Sở Y tế H&agrave; Nội bố tr&iacute; x&eacute;t nghiệm miễn ph&iacute; cho c&aacute;c đại biểu từ chiều 18-11, tại Ph&ograve;ng kh&aacute;m Đa khoa, số 21 Phan Chu Trinh, quận Ho&agrave;n Kiếm, H&agrave; Nội.</p>', 'Tối 19-11, Hà Nội tắt đèn, thắp nến tưởng niệm đồng bào mất do COVID-19Số ca mắc Covid-19 ở miền Tây cao kỷ lục nhưng tỷ lệ tử vong rất thấp Số ca mắc Covid-19 ở miền Tây cao kỷ lục nhưng tỷ lệ tử vong rất thấp', 'Tối 19-11, Hà Nội tắt đèn, thắp nến tưởng niệm đồng bào mất do COVID-19', '2021-11-19 03:57:28', 1, 'cute49.gif'),
(9, 4, 'Anime  86-Eighty-Six phần 2 Ngày phát hành, Đoạn giới thiệu, Cốt truyện & Tin tức cần biết', 'Phần 2 của series 86-Eighty-Six sẽ bắt đầu từ phần kết của phần 1, tiếp tục chuyển thể loạt light novel ăn khách của loạt series này.', '<p style=\"text-align:justify\">C&ocirc;ng chiếu sớm hơn v&agrave;o năm 2021, anime chuyển thể từ bộ light novel ăn kh&aacute;ch&nbsp; 86-Eighty-Six đ&atilde; th&agrave;nh c&ocirc;ng vang dội. Điều n&agrave;y đ&atilde; khiến anime trở th&agrave;nh một trong những anime về qu&acirc;n sự nổi tiếng nhất trong một thời gian, thậm ch&iacute; cả thương hiệu Gundam nổi tiếng cũng đ&atilde; kh&ocirc;ng trở th&agrave;nh xu hướng chủ đạo b&ecirc;n ngo&agrave;i Nhật Bản trong một thời gian. Phần đầu ti&ecirc;n của 86-Eighty-Six Season 1 đ&atilde; kết th&uacute;c v&agrave;o m&ugrave;a h&egrave; n&agrave;y, nhưng phần tiếp theo sẽ sớm được ph&aacute;t s&oacute;ng trong những th&aacute;ng tới.</p>\r\n\r\n<h2>Cốt truyện của 86-Eighty-Six</h2>\r\n\r\n<p><img alt=\"\" src=\"https://kodoani.com/uploads/images/2021/08/image_750x_612933ffcf124.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">M&ugrave;a thứ hai của&nbsp; 86-Eighty-Six sẽ nhặt từ những năm đầu ti&ecirc;n Cliffhanger kết th&uacute;c, tiếp tục với c&acirc;u chuyện trong light novel. Đ&acirc;y l&agrave; những g&igrave; ch&uacute;ng ta biết về c&aacute;ch c&acirc;u chuyện sẽ tiếp tục ph&aacute;t triển cũng như thời điểm ph&aacute;t h&agrave;nh.</p>\r\n\r\n<p style=\"text-align:justify\">Chuyển thể từ light novel của Asato Asato v&agrave; Shirabii,&nbsp; 86-Eighty-Six lấy bối cảnh ở Cộng h&ograve;a San Magnolia, nơi c&oacute; chiến tranh với Empire of Giad trong một thời gian d&agrave;i. Trong khi Giad được trang bị những con robot khổng lồ được gọi l&agrave; Legion, San Magnolia đ&atilde; đ&aacute;p trả bằng những mech của ri&ecirc;ng m&igrave;nh được gọi l&agrave; Juggernauts. Được c&ocirc;ng ch&uacute;ng tin rằng chỉ l&agrave; m&aacute;y bay kh&ocirc;ng người l&aacute;i, ch&uacute;ng thực sự được l&aacute;i bởi chiếc 86.</p>\r\n\r\n<p style=\"text-align:justify\">86 l&agrave; lực lượng đ&igrave;nh c&ocirc;ng được th&agrave;nh lập bởi người thiểu số Colorata ở Magnolia, những người bị ngược đ&atilde;i v&agrave; bị coi l&agrave; kh&ocirc;ng xứng đ&aacute;ng với t&ecirc;n gọi ch&iacute;nh thức. Thiếu t&aacute; Vladilena Milize, hay Lena, một trong số &iacute;t những nh&agrave; hoạt động c&oacute; thiện cảm với đội 86, trở th&agrave;nh người điều h&agrave;nh Phi đội Spearhead, bao gồm to&agrave;n bộ 86 người cuối c&ugrave;ng đ&atilde; được đặt t&ecirc;n. C&ocirc; kết bạn với họ v&agrave; đội trưởng Shin, cuối c&ugrave;ng cả nh&oacute;m ph&aacute;t hiện ra cuộc chiến kh&ocirc;ng như những g&igrave; họ tin tưởng.</p>\r\n\r\n<p style=\"text-align:justify\">Cho đến nay đ&atilde; c&oacute; 10 light novel v&agrave; kh&ocirc;ng c&oacute; chương n&agrave;o trong số ch&uacute;ng sẽ sớm kết th&uacute;c. Phần đầu ti&ecirc;n của&nbsp; anime 86-Eighty-Six chỉ chuyển thể phần lớn Tập 1, để lại v&ocirc; số t&agrave;i liệu c&acirc;u chuyện để lấy từ đ&oacute;.</p>\r\n\r\n<p style=\"text-align:justify\">Một đoạn giới thiệu teaser cho 86-Eighty-Six Season 2 đ&atilde; được ph&aacute;t h&agrave;nh gần đ&acirc;y, cho thấy mọi thứ sẽ thay đổi như thế n&agrave;o so với phần đầu ti&ecirc;n đ&atilde; kết th&uacute;c. Th&ocirc;ng tin chi tiết về phần thứ hai vẫn c&ograve;n hơi mơ hồ về mặt cốt truyện, với đoạn trailer chỉ gợi &yacute; về những diễn biến mới. Phim c&oacute; cảnh Lena đi dạo về Cộng h&ograve;a Magnolia, thể chất tr&ocirc;ng cứng c&aacute;p hơn v&agrave; kh&aacute; thay đổi kể từ lần cuối người xem nh&igrave;n thấy c&ocirc;.</p>\r\n\r\n<h2>Tin Tức Cần Biết Về 86-86, Phần 2</h2>\r\n\r\n<p><img alt=\"\" src=\"https://kodoani.com/uploads/images/2021/08/image_750x_6129340030698.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">Phần 1 của 86-Eighty-Six&nbsp; dự kiến ​​sẽ ra mắt v&agrave;o năm 2020, nhưng ảnh hưởng của đại dịch to&agrave;n cầu đ&atilde; khiến anime bị tr&igrave; ho&atilde;n v&ocirc; thời hạn trong một thời gian. Trước ng&agrave;y c&ocirc;ng chiếu cuối c&ugrave;ng v&agrave;o th&aacute;ng 4 năm 2021, c&oacute; th&ocirc;ng tin tiết lộ rằng phần phim sẽ được chia th&agrave;nh hai phần. Anime được xử l&yacute; bởi studio A-1 Pictures, với dịch vụ ph&aacute;t trực tuyến Crunchyroll xử l&yacute; lồng tiếng simulcast.</p>\r\n\r\n<p style=\"text-align:justify\">Bộ truyện được đạo diễn bởi Toshimasa Ishii, trong khi Toshiya Ono, người đ&atilde; viết cả hai m&ugrave;a&nbsp; The Promised Neverland , cũng đang xử l&yacute; phần viết cho 86-Eighty-Six. Phần &acirc;m nhạc được s&aacute;ng t&aacute;c bởi Hiroyuki Sawano v&agrave; Kohta Yamamoto, tất cả đều được mong đợi sẽ trở lại c&ugrave;ng với d&agrave;n diễn vi&ecirc;n lồng tiếng cho Phần 2.</p>\r\n\r\n<h2>Ng&agrave;y Ph&aacute;t H&agrave;nh Cho 86-Eighty-Six, Phần 2</h2>\r\n\r\n<p><img alt=\"\" src=\"https://kodoani.com/uploads/images/2021/08/image_750x_6129340084397.jpg\" /></p>\r\n\r\n<p style=\"text-align:justify\">Rất may cho người xem, việc xem 86-Eighty-Six chọn v&agrave; đưa c&aacute;c nh&acirc;n vật sống s&oacute;t v&agrave;o trung t&acirc;m sẽ kh&ocirc;ng mất qu&aacute; nhiều thời gian, v&igrave; phần 2 - hiện đ&atilde; được ch&iacute;nh thức lồng tiếng lại th&agrave;nh Phần 2 - sẽ ra mắt tại Nhật Bản v&agrave;o th&aacute;ng 10 năm 2021. Mặc d&ugrave; chưa c&oacute; ng&agrave;y ph&aacute;t h&agrave;nh ch&iacute;nh thức cho phương T&acirc;y, nhưng c&oacute; vẻ như người h&acirc;m mộ chỉ c&ograve;n v&agrave;i tuần để chờ đợi cho đến khi họ c&oacute; thể quay trở lại Cộng h&ograve;a San Magnolia.</p>', 'Phần 2 của series 86-Eighty-Six sẽ bắt đầu từ phần kết của phần 1, tiếp tục chuyển thể loạt light novel ăn khách của loạt series này.', '86-Eighty-Six phần 2 Ngày phát hành, Đoạn giới thiệu, Cốt truyện & Tin tức cần biết', '2021-11-26 14:44:23', 1, 'unnamed41.png'),
(10, 6, 'Vẻ đẹp mong manh và bất tận của văn học Nhật Bản', 'Khởi nguyên văn chương với waka (hòa ca - một thể loại văn học cổ của người Nhật Bản) và thần thoại, người Nhật Bản như ký thác vào nghệ thuật ngôn từ nhiều tư tưởng về cái đẹp và bản chất vô thường của thế giới.', '<p>Sống hết m&igrave;nh với hoạt động s&aacute;ng tạo, thưởng thức, tr&acirc;n trọng v&agrave; bảo tồn c&aacute;i đẹp, v&igrave; vậy nền&nbsp;<a href=\"https://thanhnien.vn/post-1057989.html\" title=\"Nhà văn Dazai Osamu \'phơi mình\' trong tiểu thuyết \'Thất lạc cõi người\'\">văn học Nhật</a>&nbsp;lu&ocirc;n đề cao th&acirc;n phận con người, mang t&iacute;nh hiện thực ở tầm v&oacute;c nh&acirc;n loại v&agrave; đặc biệt l&agrave; c&oacute; gi&aacute; trị thẩm mỹ s&acirc;u sắc.</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Vẻ đẹp mong manh và bất tận của văn học Nhật Bản - ảnh 1\" src=\"https://image.thanhnien.vn/w2048/Uploaded/2021/pwivoviu/2021_10_05/5-lam-anh-425.jpeg\" style=\"float:left\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Tr&ecirc;n tinh thần đ&oacute;, t&aacute;c phẩm mới Văn học Nhật Bản - vẻ đẹp mong manh v&agrave; bất tận của t&aacute;c giả Lam Anh (NXB Tổng hợp TP.HCM ấn h&agrave;nh), l&agrave; sự đồng h&agrave;nh với độc giả, c&ugrave;ng kh&aacute;m ph&aacute; nền văn chương ph&aacute;t triển v&ocirc; c&ugrave;ng rực rỡ của đất nước mặt trời mọc. Ở đ&oacute; từng trang s&aacute;ch l&agrave; những cảnh ngộ của đời sống con người, bao c&acirc;u chuyện rung l&ecirc;n trong từng cung bậc cảm x&uacute;c kh&aacute;c nhau: c&oacute; khi ho&agrave;i nghi, đ&ocirc;i l&uacute;c hoang mang nhưng như thế c&agrave;ng c&oacute; điều kiện cảm nhận nền văn h&oacute;a thật v&agrave; đầy đủ hơn, từ những th&ocirc;ng điệp m&agrave; ch&iacute;nh chủ nh&acirc;n của nền văn h&oacute;a ấy lan tỏa v&agrave;o từng b&agrave;i viết. Đ&oacute; l&agrave;: Những nghịch l&yacute; nh&acirc;n sinh trong truyện ngắn của Akutagawa Ryūnosuke, Vấn đề c&aacute;i đẹp trong tiểu thuyết kim c&aacute;c tự của Mishima Yukio, hay L&yacute; giải hiện tượng truyện Genji từ nền tảng văn h&oacute;a x&atilde; hội Nhật Bản, Thể loại monogatari trong thế giới văn chương tự sự&hellip;</p>\r\n\r\n<p>L&agrave; sản phẩm được tạo n&ecirc;n từ tinh thần duy mỹ của người Nhật, văn học&nbsp;<a href=\"https://thanhnien.vn/post-1093112.html\" title=\"Vẻ đẹp trinh trắng của nữ giới Nhật Bản qua cảm thụ Akutagawa\">xứ Ph&ugrave; Tang</a>&nbsp;được hiểu trong sự gắn kết với cảm thức thẩm mỹ v&agrave; những n&eacute;t đặc trưng của văn h&oacute;a truyền thống. Đ&oacute; l&agrave; điều quan trọng, nhưng đối với độc giả sinh trưởng b&ecirc;n ngo&agrave;i kh&ocirc;ng gian văn h&oacute;a đ&atilde; h&igrave;nh th&agrave;nh nền văn học ấy th&igrave; mọi việc kh&ocirc;ng đơn giản. C&aacute;i đẹp trong văn chương Nhật Bản gắn với sự v&ocirc; thường của thế giới, sự mong manh của kiếp người n&ecirc;n thường phảng phất n&eacute;t buồn v&agrave; t&acirc;m th&aacute;i trầm tư - đ&oacute; l&agrave; một đặc trưng quan trọng tồn tại xuy&ecirc;n suốt cả một qu&aacute; tr&igrave;nh.</p>\r\n\r\n<p>Lịch sử văn h&oacute;a xứ sở mặt trời mọc l&agrave; một tiến tr&igrave;nh d&agrave;i với rất nhiều th&agrave;nh tựu thuộc về nhiều loại h&igrave;nh nghệ thuật kh&aacute;c nhau n&ecirc;n văn chương cũng kh&ocirc;ng nằm ngoại lệ, m&agrave; h&ograve;a trong d&ograve;ng chảy chung đ&oacute;. Đặc trưng n&agrave;y biểu hiện ở nhiều sắc độ kh&aacute;c nhau trong nhiều giai đoạn, nhiều loại h&igrave;nh văn chương từ waka truyền thống, truyện Genji (Truyện kể Genji - được coi l&agrave; trường thi&ecirc;n tiểu thuyết theo nghĩa hiện đại đầu ti&ecirc;n của nh&acirc;n loại, của nữ sĩ cung đ&igrave;nh Nhật Bản Murasaki Shikibu) đến những s&aacute;ng t&aacute;c của c&aacute;c nh&agrave; văn hiện đại v&agrave; đương đại.</p>\r\n\r\n<p>Dưới g&oacute;c nh&igrave;n của một nh&agrave; nghi&ecirc;n cứu ở khoa Nhật Bản học Trường ĐH KHXH-NV TP.HCM, những b&agrave;i viết trong s&aacute;ch Văn học Nhật Bản - vẻ đẹp mong manh v&agrave; bất tận l&agrave; kết quả gặt h&aacute;i được sau những th&aacute;ng ng&agrave;y &acirc;m thầm vun xới, t&igrave;m kiếm vẻ đẹp trong văn học Nhật Bản của t&aacute;c giả Lam Anh.</p>\r\n\r\n<p>Lam Anh hiện l&agrave; một dịch giả văn học Nhật Bản t&ecirc;n tuổi v&agrave; c&oacute; uy t&iacute;n. Nhiều t&aacute;c phẩm chuyển ngữ th&agrave;nh c&ocirc;ng của chị đ&atilde; xuất bản tại VN v&agrave; được độc giả đ&oacute;n nhận, như: Gối đầu l&ecirc;n cỏ, Ng&agrave;y 210, Cỏ ven đường, Xứ tuyết&hellip; V&igrave; vậy, với khối lượng kiến thức đồ sộ m&agrave; cuốn s&aacute;ch Văn học Nhật Bản - vẻ đẹp mong manh v&agrave; bất tận mang lại, t&aacute;c giả tiếp tục gi&uacute;p người đọc hiểu th&ecirc;m về vẻ đẹp của văn học xứ Ph&ugrave; Tang, c&oacute; l&uacute;c mong manh giữa hai miền s&aacute;ng tối, giữa thực tại nghiệt ng&atilde; v&agrave; mộng ước thanh cao, nhưng lại bất tận giữa nhịp sống x&ocirc; bồ v&agrave; sự tĩnh lặng trong t&acirc;m hồn mỗi người.</p>', 'Khởi nguyên văn chương với waka (hòa ca - một thể loại văn học cổ của người Nhật Bản) và thần thoại, người Nhật Bản như ký thác vào nghệ thuật ngôn từ nhiều tư tưởng về cái đẹp và bản chất vô thường của thế giới.', 'Vẻ đẹp mong manh và bất tận của văn học Nhật Bản', '2021-11-26 15:05:46', 1, '5-lam-anh-42553.jpeg'),
(11, 4, 'fsdf', 'fdsfsdfsd', '<p>fdsfsd</p>', 'fdsfsd', 'fdsf', '2021-11-27 04:15:40', 1, '71vMGRog+iL24.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `brand_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image_second` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` int(11) NOT NULL,
  `product_quantity` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_image_second`, `product_status`, `product_quantity`, `created_at`, `updated_at`) VALUES
(3, 6, 3, '[MANGA] DIỆT SLIME SUỐT 300 NĂM, TÔI LEVELMAX LÚC NÀO CHẲNG HAY TẬP 6', '<p>ISBN 9786043450002<br />\r\nC&ocirc;ng ty ph&aacute;t h&agrave;nh Tsuki LightNovel<br />\r\nNh&agrave; xuất bản NXB THẾ GIỚI<br />\r\nK&iacute;ch thước 13 x 18 cm<br />\r\nNguy&ecirc;n t&aacute;c Kisetsu Morita<br />\r\nThiết kế nh&acirc;n vật Benio<br />\r\nTruyện tranh Yusuke Shiba<br />\r\nDịch giả Phương Phạm<br />\r\nLoại b&igrave;a B&igrave;a mềm (c&oacute; b&igrave;a &aacute;o)<br />\r\nSố trang 174 trang + 2 trang m&agrave;u<br />\r\nNg&agrave;y xuất bản 22/10/2021<br />\r\nGi&aacute; b&igrave;a 48.000 VNĐ</p>', '<p>Diệt Slime Suốt 300 Năm, T&ocirc;i Levelmax L&uacute;c N&agrave;o Chẳng Hay l&agrave; một c&acirc;u chuyện mang g&oacute;c nh&igrave;n đầy h&agrave;i hước về mặt tr&aacute;i của x&atilde; hội Nhật Bản v&agrave; c&aacute;ch c&acirc;n bằng lại cuộc sống đ&oacute; như thế n&agrave;o th&ocirc;ng qua h&agrave;nh tr&igrave;nh diệt qu&aacute;i l&ecirc;n level của Azusa.</p>', '43200', 'b_a_di_t_slime_t690.png', 'b_adi_t-slime-su_t-300-n_m10.jpg', 1, 20, NULL, NULL),
(4, 6, 1, 'NHÀ CÓ 5 NÀNG DÂU - TẬP 2', '<p>M&atilde; EAN 8935244860436<br />\r\nT&aacute;c giả Negi Haruba<br />\r\nDịch giả Tanpopo Team<br />\r\nGi&aacute; b&igrave;a 25,000<br />\r\nLoại b&igrave;a Mềm<br />\r\nKhổ 11,3x17,6<br />\r\nSố trang 192<br />\r\nThể loại Truyện tranh đen trắng<br />\r\nĐối tượng Tuổi mới lớn (15-18 tuổi)<br />\r\nQu&agrave; tặng k&egrave;m B&igrave;a In 2 Mặt<br />\r\nNh&agrave; xuất bản NXB Kim Đồng<br />\r\nNăm xuất bản 2021</p>', '<p>Anh ch&agrave;ng gia sư bất đắc dĩ Futarou đang g&aacute;nh v&aacute;c sứ mệnh dẫn lối cho 5 chị em g&aacute;i xinh đẹp nhưng lại &quot;gh&eacute;t học&quot; v&agrave; &quot;su&yacute;t so&aacute;t lưu ban&quot; tới ngưỡng cửa &quot;lễ tốt nghiệp&quot;. Mục ti&ecirc;u đầu ti&ecirc;n của cậu l&agrave; cố gắng chiếm được cảm t&igrave;nh của từng c&ocirc; một.<br />\r\nSau trận đấu tr&iacute; về c&aacute;c v&otilde; tướng thời Chiến Quốc, cậu gi&agrave;nh được sự tin tưởng của c&ocirc; chị ba Miku. Nhưng cuộc đời thật lắm ch&ocirc;ng gai, chưa mừng được bao l&acirc;u, cậu đ&atilde; phải đối mặt với nguy cơ đ&aacute;nh mất niềm tin của cả 5 khi kẹt trong một t&igrave;nh huống t&igrave;nh ngay l&iacute; gian tại tư gia nh&agrave; Nakano với c&ocirc; chị hai Nino!!<br />\r\nLiệu Futarou c&oacute; thể rửa oan cho m&igrave;nh!?&nbsp;</p>', '22500', '2_9466f0d99c494b3c8500699ef2493397_large62.jpg', 'Gotoubun-no-Hanayome-Ss2-5-toubun-no-Hanayome44.jpg', 1, 15, NULL, NULL),
(5, 6, 5, 'RELIFE - TẬP 13', '<ul>\r\n	<li>Khổ s&aacute;ch 14 x 19 cm</li>\r\n	<li>Số trang 176 trang m&agrave;u</li>\r\n	<li>B&igrave;a B&igrave;a keo + b&igrave;a &aacute;o c&oacute; tay gấp + đai s&aacute;ch</li>\r\n	<li>Phụ kiện 1 postcard ReLIFE</li>\r\n	<li>Nxb Li&ecirc;n kết NXB D&acirc;n tr&iacute;</li>\r\n	<li>Thể loại Truyện tranh</li>\r\n	<li>Gi&aacute; b&igrave;a 85.000 VNĐ</li>\r\n	<li>M&atilde; vạch 8936117743368</li>\r\n	<li>ISBN 978-604-314-909-5</li>\r\n</ul>', '<p>C&acirc;u chuyện kể về Arata Kaizaki &ndash; 27 tuổi &ndash; FA &ndash; Thất nghiệp, v&agrave; chỉ sống nhờ v&agrave;o tiền chi ph&iacute; m&agrave; bố mẹ đưa&hellip; Trước khi thất nghiệp, Arata từng c&oacute; một c&ocirc;ng việc (chỉ trong 3 th&aacute;ng) nhưng đ&atilde; nghỉ việc, cho đến giờ vẫn kh&ocirc;ng t&igrave;m thấy được việc l&agrave;m ổn định. V&agrave;o một đ&ecirc;m, sau khi Arata nhậu c&ugrave;ng bọn bạn thời cấp 3, anh gặp Ryou Yoake, người n&agrave;y đ&atilde; đưa Arata một vi&ecirc;n thuốc m&agrave; c&oacute; thể l&agrave;m cho m&igrave;nh quay trở về 17 tuổi để l&agrave;m lại cuộc đời. Để uống vi&ecirc;n thuốc, Arata đ&atilde; phải tham gia một thử nghiệm, trở th&agrave;nh học sinh v&agrave; đi học một trường cấp 3, anh đ&atilde; gặp Chizuru v&agrave; một số người kh&aacute;c. Trong 1 năm duy tr&igrave; t&aacute;c dụng của vi&ecirc;n thuốc, Arata quyết định sẽ t&igrave;m ra một phần hạnh ph&uacute;c trong cuộc sống của m&igrave;nh.</p>', '76500', 'relife13_biaao_toai37.jpg', 'relife-thumbnail-146678809287.webp', 1, 20, NULL, NULL),
(6, 6, 1, 'DÃ NGOẠI THẢNH THƠI - YURUCAMP TẬP 1', '<ul>\r\n	<li>M&atilde; EAN 8935244862508</li>\r\n	<li>T&aacute;c giả afro</li>\r\n	<li>Dịch giả Hồng H&agrave;</li>\r\n	<li>Gi&aacute; b&igrave;a 30.000</li>\r\n	<li>Loại b&igrave;a Mềm</li>\r\n	<li>Khổ (cm) 13x18</li>\r\n	<li>Số trang 176 đen trắng + 2 trang m&agrave;u</li>\r\n	<li>Thể loại Truyện tranh đen trắng</li>\r\n	<li>Đối tượng D&agrave;nh cho lứa tuổi 14+</li>\r\n	<li>Qu&agrave; tặng k&egrave;m PVC Check in Card</li>\r\n	<li>Nh&agrave; xuất bản NXB Kim Đồng</li>\r\n	<li>Năm xuất bản 2021</li>\r\n</ul>', '<p>C&acirc;u chuyện b&igrave;nh dị n&agrave;y xoay quanh hai c&ocirc; g&aacute;i trẻ: Rin y&ecirc;u th&iacute;ch cắm trại một m&igrave;nh b&ecirc;n bờ hồ, nơi c&oacute; thế nh&igrave;n ra n&uacute;i Ph&uacute; Sĩ h&ugrave;ng vĩ; v&agrave; Nadeshiko th&iacute;ch những chuyến đi xe một m&igrave;nh đến những nơi m&agrave; c&ocirc; c&oacute; thể ngắm thấy n&uacute;i Ph&uacute; Sĩ. Sau khi gặp nhau. Rin v&agrave; Nadeshiko đ&atilde; c&ugrave;ng nhau cắm trại, ăn m&igrave; ly v&agrave; c&ugrave;ng thưởng thức cảnh đẹp.</p>', '27000', 'qqqda_ngoai_thanh_thoi_-_tap_1_156.jpg', '1625071336-yuru-camp-specials-f275041.jpg', 1, 13, NULL, NULL),
(7, 6, 4, 'MIỀN ĐẤT HỨA - THE PROMISED NEVERLAND- 0 MYSTIC CODE', '<p>T&aacute;c giả: Kaiu Shirai - Posuka Demizu<br />\r\nThể loại: fanbook, t&acirc;m l&yacute;, phi&ecirc;u lưu, giả tưởng</p>\r\n\r\n<p>Khổ: 12 x 18<br />\r\nSố trang: 240<br />\r\nTrọng lượng: 200g<br />\r\nGi&aacute; b&igrave;a: 80.000 đồng</p>\r\n\r\n<p>Qu&agrave; tặng: Cho những đơn h&agrave;ng đặt mua đầu ti&ecirc;n :Postcard nhựa dạng đồng hồ quả qu&yacute;t d&agrave;n</p>\r\n\r\n<p>(thiết kế độc quyền cho phi&ecirc;n bản Việt Nam)<br />\r\nDự kiến c&oacute; h&agrave;ng tại Hikaru: 26/11/2021</p>', '<p><strong>The Promised Neverland &ndash; Miền Đất Hứa</strong>. C&ocirc; b&eacute;&nbsp;<strong><em>Emma</em></strong>&nbsp;c&oacute; một cuộc sống b&igrave;nh y&ecirc;n v&agrave; hạnh ph&uacute;c ở trong trại mồ c&ocirc;i. Đối với<em>&nbsp;Emma</em>, từng căn ph&ograve;ng, g&oacute;c vườn l&agrave; nh&agrave; của c&ocirc;. Những người bạn th&acirc;n thiết ch&iacute;nh l&agrave; anh chị em ruột của c&ocirc;. C&ograve;n người nữ tu trẻ đẹp, hiền hậu, dịu d&agrave;ng với c&aacute;i t&ecirc;n&nbsp;<em>&ldquo;Mama&rdquo;</em>&nbsp;ch&iacute;nh l&agrave; mẹ của c&ocirc;.</p>\r\n\r\n<p>Một ng&agrave;y b&igrave;nh thường của<em>&nbsp;Emma</em>, l&agrave; thưởng thức những bữa ăn ngon tuyệt. Nằm tr&ecirc;n chiến giường &ecirc;m cuộn trong chăn ấm, v&agrave; c&oacute; những giờ ph&uacute;t vui chơi n&ocirc; đ&ugrave;a, những&hellip; con số&nbsp;<em>tr&ecirc;n cổ</em>, v&agrave; những b&agrave;i kiểm tra v&ocirc; c&ugrave;ng phức tạp. Nơi đ&oacute;,&nbsp;<em>Emma, Norman, Ray</em>&nbsp;l&agrave; ba đứa trẻ lớn nhất đồng thời cũng l&agrave; ba người t&agrave;i năng nhất.</p>\r\n\r\n<p>Trại trẻ mồ c&ocirc;i n&agrave;y c&oacute; một quy tắc: trước năm 12 tuổi, những đứa trẻ sẽ được chọn cha mẹ nu&ocirc;i v&agrave; rời khỏi đ&acirc;y. Tuy nhi&ecirc;n, bộ ba&nbsp;<em>Emma, Norman, Ray</em>&nbsp;đ&atilde; 11 tuổi m&agrave; vẫn chưa được sắp xếp để gặp gỡ ai.</p>\r\n\r\n<p>V&agrave;o một tối ng&agrave;y nọ,&nbsp;<em>Emma</em>&nbsp;v&agrave;&nbsp;<em>Norman</em>&nbsp;đi trả lại m&oacute;n đồ chơi cho một b&eacute; g&aacute;i vừa được nhận nu&ocirc;i, đ&atilde; qu&ecirc;n kh&ocirc;ng mang theo. Nhưng khi đến nơi, hai người chỉ c&ograve;n thấy một c&aacute;i x&aacute;c, phần bụng bị cắm bởi một c&agrave;nh c&acirc;y.</p>\r\n\r\n<p>C&ocirc; b&eacute; ấy đ&atilde; bị lũ quỷ dữ giết chết để ăn thịt. Đồng thời, họ cũng ph&aacute;t hiện ra một sự thật kinh ho&agrave;ng: trại trẻ mồ c&ocirc;i ch&iacute;nh l&agrave; một trang trại nu&ocirc;i thịt, đ&aacute;m trẻ kh&ocirc;ng hơn g&igrave; một đ&aacute;m gia s&uacute;c, v&agrave; người cam kết sẽ c&oacute; &ldquo;mặt h&agrave;ng chất lượng trong tương lai&rdquo; lại ch&iacute;nh l&agrave;&hellip;người tưởng chừng như sẽ ra tay bảo vệ ch&uacute;ng l&uacute;c n&agrave;y &ndash;&nbsp;<em>Mama</em>.</p>', '456456', 'the-promised-neverland161.jpg', 'mien-dat-hua-den_1b8d855691e940bd97926c8bd2af340c_master_e92f33a09a7e4e9bbf8f78e3f0fb53c7_master42.jpg', 1, 17, NULL, NULL),
(8, 6, 4, 'Girls\' Last Tour, Vol. 3', '<p>T&aacute;c giả: Akihito Tsukushi</p>\r\n\r\n<p>Thể loại: Truyện tranh, giả tưởng, phi&ecirc;u lưu</p>\r\n\r\n<p>Khổ: 14.5 x 20.5cm Số trang: 160</p>\r\n\r\n<p>Trọng lượng: 200g Gi&aacute; b&igrave;a: 50.000đ</p>\r\n\r\n<p>Qu&agrave; tặng: Postcard nh&acirc;n vật in Metalize</p>', '<p>Thời đại văn minh đ&atilde; chết, nhưng Chito v&agrave; Yuuri(2 b&eacute; loli) vẫn c&ograve;n sống. V&igrave; vậy, họ ở tr&ecirc;n chiếc xe m&aacute;y Kettenkrad v&agrave; đi lang thang khắp nơi. Ng&agrave;y sau ng&agrave;y tuyệt vọng, họ t&igrave;m kiếm bữa ăn v&agrave; nhi&ecirc;n liệu tiếp theo cho chuyến đi của họ. Nhưng miễn l&agrave; cả hai ở b&ecirc;n nhau, thậm ch&iacute; một sự tồn tại ảm đạm v&igrave; ch&uacute;ng c&oacute; một tia s&aacute;ng hoặc hai &aacute;nh nắng mặt trời trong đ&oacute;, cho d&ugrave; họ đ&oacute;i khổ vẫn lu&ocirc;n b&ecirc;n nhau. Đối với hai c&ocirc; g&aacute;i trong một thế giới kh&ocirc;ng c&ograve;n g&igrave;, họ phải sống c&ograve;n v&agrave; tồn tại như thế n&agrave;o đ&acirc;y</p>', '56000', 'd835c55496e5273d019fdf27f825795515.jpg', 'tải xuống7.jpg', 1, 20, NULL, NULL),
(9, 6, 5, 'MADE IN ABYSS', '<p>T&aacute;c giả: Akihito Tsukushi</p>\r\n\r\n<p>Thể loại: Truyện tranh, giả tưởng, phi&ecirc;u lưu</p>\r\n\r\n<p>Khổ: 14.5 x 20.5cm Số trang: 160</p>\r\n\r\n<p>Trọng lượng: 200g Gi&aacute; b&igrave;a: 50.000đ</p>\r\n\r\n<p>Qu&agrave; tặng: Postcard nh&acirc;n vật in Metalize</p>', '<p>Hệ thống hang động khổng lồ, nơi duy nhất tr&ecirc;n thế giới c&ograve;n chưa được kh&aacute;m ph&aacute; hay c&ograve;n được biết đến với c&aacute;i t&ecirc;n, Abyss. Kh&ocirc;ng ai biết được m&ecirc; cung b&iacute; ẩn n&agrave;y s&acirc;u xuống bao nhi&ecirc;u, c&oacute; những qu&aacute;i vật cũng như di t&iacute;ch n&agrave;o. Rất nhiều nh&agrave; th&aacute;m hiểm đ&atilde; dấn th&acirc;n v&agrave;o c&ocirc;ng cuộc th&aacute;m hiểm nơi đ&acirc;u. Qua thờii gian, những ai c&oacute; đủ can đảm để bước xuống m&ecirc; cung n&agrave;y thường được gọi bằng c&aacute;i t&ecirc;n Th&aacute;m hiểm gia hang động. Ở Oosu, thị trấn b&ecirc;n r&igrave;a Abyss, c&oacute; một c&ocirc; b&eacute; mồ c&ocirc;i t&ecirc;n l&agrave; Rico, nu&ocirc;i ước trở th&agrave;nh một th&aacute;m hiểm gia hang động như mẹ c&ocirc; m&agrave; giải được b&iacute; ẩn cả Abyss. Một ng&agrave;y nọ khi đang kh&aacute;m ph&aacute; những b&iacute; ẩn b&ecirc;n dưới Abyss, c&ocirc; đ&atilde; gặp được một cậu b&eacute; robot&hellip;</p>', '45000', 'Made_in_Abyss_volume_128.jpg', '163e52ff04e99a166eb63e4014257efb52.jpg', 1, 20, NULL, NULL),
(10, 6, 3, 'THIÊN THẦN DIỆT THẾ - SERAPH OF THE END TẬP 17', '<p>M&atilde; EAN 8935244859768<br />\r\nT&aacute;c giả Takaya Kagami, Yamato Yamamoto, Daisuke</p>\r\n\r\n<p>Furuya<br />\r\nDịch giả Ukatomai<br />\r\nGi&aacute; b&igrave;a 20.000<br />\r\nLoại b&igrave;a Mềm<br />\r\nKhổ 11,3x17,6 cm<br />\r\nSố trang 180<br />\r\nThể loại Truyện tranh đen trắng<br />\r\nĐối tượng D&agrave;nh cho lứa tuổi 15+<br />\r\nQu&agrave; tặng k&egrave;m Kh&ocirc;ng<br />\r\nNh&agrave; xuất bản NXB Kim Đồng<br />\r\nNăm xuất bản 2021</p>', '<p>Thi&ecirc;n thần thổi k&egrave;n thứ 6 hiện đang bị phong ấn tại nh&agrave; ri&ecirc;ng của Guren. Yuichiro quyết t&acirc;m<br />\r\ncứu lấy hắn - kẻ muốn hủy diệt lo&agrave;i người v&agrave; giết chết cậu. Trong trận chiến tầm cỡ ấy, Shinoa cũng đ&atilde; h&ocirc; trợ Yuichiro&hellip;!?</p>', '18000', '17_c91ce643eaac4d69806de2883af5dc2b_master14.jpg', '382b59da4a374552e9d54565b55eea0b79.jpg', 1, 20, NULL, NULL),
(11, 6, 5, 'MY HERO ACADEMIA - HỌC VIỆN SIÊU ANH HÙNG TẬP 27: ONE’S JUSTICE', '<p>M&atilde; EAN 8935244858396<br />\r\nT&aacute;c giả Kohei Horikoshi<br />\r\nDịch giả Ruyuha Kyouka<br />\r\nGi&aacute; b&igrave;a 20.000<br />\r\nLoại b&igrave;a Mềm<br />\r\nKhổ 11,3x17,6cm<br />\r\nSố trang 184<br />\r\nThể loại Truyện tranh đen trắng<br />\r\nĐối tượng D&agrave;nh cho lứa tuổi 15+<br />\r\nQu&agrave; tặng k&egrave;m Tặng k&egrave;m Bookmark Pro Hero<br />\r\nNh&agrave; xuất bản NXB Kim Đồng<br />\r\nNăm xuất bản 2021</p>', '<p>Cuối c&ugrave;ng chiến lược đột k&iacute;ch đồng loạt của giới si&ecirc;u anh h&ugrave;ng đ&atilde; triển khai. To&agrave;n bộ c&ocirc;ng sức nằm v&ugrave;ng bấy l&acirc;u cũng đều v&igrave; khoảnh khắc &aacute;p chế được Chiến Tuyến Giải Ph&oacute;ng Si&ecirc;u Năng n&agrave;y! T&ocirc;i nhất định sẽ bay nhanh hơn tất thảy! Tất cả v&igrave; mọi người, giống vị si&ecirc;u anh h&ugrave;ng m&igrave;nh ngưỡng mộ từ thuở b&eacute;! &ldquo;Plus Ultra&rdquo;!!</p>\r\n\r\n<p>Kohei Horikoshi</p>\r\n\r\n<p>&ldquo;Cảm ơn c&aacute;c bạn đ&atilde; mua tập 27 nh&eacute;! Thời buổi dịch bệnh hỗn loạn n&agrave;y lại khiến t&ocirc;i c&agrave;ng thấm th&iacute;a hơn niềm vui c&oacute; được từ việc đọc truyện tranh.&rdquo;</p>', '18000', 'ba8e995d613d5bbd9e28dcc814c12cab38.jpg', 'my-hero-academia-hoc-vien-sieu-anh-hung_tap-27-one_s-justice_-bookmark51.jpg', 1, 20, NULL, NULL),
(12, 7, 5, 'THIÊN SỨ NHÀ BÊN TẬP 01', '<p>M&atilde; EAN 8935244862126&nbsp;<br />\r\nM&atilde; ISBN 978-604-2-23298-2<br />\r\nT&aacute;c giả Saekisan, Hanekoto<br />\r\nDịch giả Tr&acirc;n Tr&acirc;n<br />\r\nGi&aacute; b&igrave;a 95.000<br />\r\nLoại b&igrave;a Mềm, Rời<br />\r\nKhổ 13 x 19 cm<br />\r\nSố trang 320 đen trắng + 8 trang m&agrave;u<br />\r\nQu&agrave; tặng k&egrave;m 01 Bookmark<br />\r\nThể loại Light-novel</p>\r\n\r\n<p>7358</p>\r\n\r\n<p>Đối tượng Thanh ni&ecirc;n (tr&ecirc;n 18 tuổi)<br />\r\nNh&agrave; xuất bản NXB Kim Đồng - Wings Books<br />\r\nNăm xuất bản 22/11/2021</p>', '<p>H&agrave;ng x&oacute;m kế b&ecirc;n căn hộ của Fujimiya Amane ch&iacute;nh l&agrave; nữ sinh xinh đẹp nhất trường cậu, Shiina Mahiru.<br />\r\nHọ vốn chẳng c&oacute; mối li&ecirc;n hệ n&agrave;o cho đến một ng&agrave;y mưa tầm t&atilde;, Amane t&igrave;nh nguyện đưa chiếc &ocirc; của m&igrave;nh cho c&ocirc; bạn h&agrave;ng x&oacute;m xinh đẹp tựa thi&ecirc;n thần, cả hai đ&atilde; bắt đầu tương t&aacute;c với nhau theo một c&aacute;ch k&igrave; quặc.<br />\r\nChẳng thể chịu được lối sinh hoạt cẩu thả khi sống một m&igrave;nh của Amane, Mahiru đ&atilde; quyết định sẽ chăm s&oacute;c cậu từ những điều nhỏ nhất. &nbsp;&nbsp;<br />\r\nMột Mahiru thiếu thốn sự gắn kết với gia đ&igrave;nh đang dần mở l&ograve;ng hơn, c&ugrave;ng một Amane hay tự ti đang ng&agrave;y một đổi thay theo chiều hướng t&iacute;ch cực. Khoảng c&aacute;ch giữa hai con người kh&ocirc;ng ch&uacute;t th&agrave;nh thật ấy đang từng bước thu hẹp lại...<br />\r\nĐ&acirc;y l&agrave; c&acirc;u chuyện t&igrave;nh ngọt ng&agrave;o với c&ocirc; g&aacute;i nh&agrave; b&ecirc;n tuy lạnh l&ugrave;ng nhưng thật đ&aacute;ng y&ecirc;u đ&atilde; được ủng hộ nhiệt t&igrave;nh tr&ecirc;n trang Shousetsuka ni Narou.&nbsp;</p>\r\n\r\n<p><strong>* THI&Ecirc;N SỨ NH&Agrave; B&Ecirc;N được xem l&agrave; c&uacute; hit của d&ograve;ng Light Novel rom-com tại thị trường Nhật Bản, với nội dung h&agrave;i hước - l&atilde;ng mạn rất được y&ecirc;u th&iacute;ch. T&aacute;c phẩm nằm top 10 Kono Light novel ga Sugoi năm 2021, đ&atilde; b&aacute;n ra hơn 400.000 bản chỉ với 4 tập truyện ri&ecirc;ng tại Nhật Bản.</strong></p>', '77900', '1_e415ba650f884ad3bb35fa0963f72034_master76.jpg', 'thien-su-nha-ben_tap-1_ban-gioi-han_79554e441c414759ab7f1c1add2f86e4_grande54.jpg', 1, 20, NULL, NULL),
(13, 7, 4, 'NHÂN VẬT HẠ CẤP TOMOZAKI – TẬP 1', '<p>M&atilde; EAN 8935244860337&nbsp;</p>\r\n\r\n<p>M&atilde; ISBN 978-604-2-22249-5<br />\r\nT&aacute;c giả Yuki Yaku, Fly<br />\r\nDịch giả akiyuki<br />\r\nGi&aacute; b&igrave;a 111.000<br />\r\nLoại b&igrave;a Mềm, Rời<br />\r\nKhổ 13 x 19 cm<br />\r\nSố trang 424 đen trắng + 8 trang m&agrave;u<br />\r\nQu&agrave; tặng k&egrave;m 01 Thẻ Normal + 01 Thẻ Rare + 1 Kẹp S&aacute;ch<br />\r\nThể loại Light-novel 7358<br />\r\nĐối tượng Thanh ni&ecirc;n (tr&ecirc;n 18 tuổi)<br />\r\nNh&agrave; xuất bản NXB Kim Đồng - Wings Books<br />\r\nNăm xuất bản 15/11/2021</p>', '<p>Cuộc đời l&agrave; một tr&ograve; chơi r&aacute;c rưởi. C&acirc;u n&oacute;i xưa như tr&aacute;i đất đ&oacute;, đ&aacute;ng tiếc lại l&agrave; sự thật. L&agrave; một trong những game thủ h&agrave;ng đầu Nhật Bản, lời t&ocirc;i đ&atilde; n&oacute;i kh&ocirc;ng c&oacute; g&igrave; phải b&agrave;n c&atilde;i. Vậy m&agrave;, c&ocirc; ta, Hinami Aoi, một nh&acirc;n vật thượng đẳng từ trong trứng, cũng l&agrave; nữ ch&iacute;nh ho&agrave;n hảo học đường, đ&atilde; đạt đến tr&igrave;nh độ ngang ngửa t&ocirc;i trong c&ugrave;ng một tr&ograve; chơi điện tử, lại quả quyết cho rằng cuộc đời l&agrave; một tr&ograve; chơi tuyệt đỉnh.&nbsp;<br />\r\nC&ugrave;ng với Hinami Aoi, một người ho&agrave;n to&agrave;n kh&ocirc;ng bị tr&oacute;i buộc trong những khu&ocirc;n mẫu th&ocirc;ng thường, nh&acirc;n vật hạ cấp Tomozaki sẽ l&agrave;m g&igrave; để t&igrave;m ra lời giải đ&aacute;p cho c&acirc;u hỏi: Liệu cuộc đời c&oacute; phải l&agrave; một tr&ograve; chơi tuyệt đỉnh!?&nbsp;</p>\r\n\r\n<p>* NH&Acirc;N VẬT HẠ CẤP TOMOZAKI l&agrave; t&aacute;c phẩm đạt giải xuất sắc trong khu&ocirc;n khổ giải thưởng Light novel Shogakukan lần thứ mười. 5 năm liền lọt top bảng xếp hạng Kono Light novel ga sugoi!</p>\r\n\r\n<p>Số tập: 9+ (on-going)</p>', '83250', '1--lmt_4c7020c7beac468591514ccee515d0a826.jpg', '07dd634e468c67830f52684054f1519987.jpg', 1, 20, NULL, NULL),
(14, 7, 3, 'CHUYỆN TÌNH THANH XUÂN BI HÀI CỦA TÔI QUẢ NHIÊN LÀ SAI LẦM 13', '<p>T&aacute;c giả Wataru WATARI<br />\r\nDịch giả AQ dịch, Nguy&ecirc;n Phạm hiệu đ&iacute;nh<br />\r\nSố trang 500<br />\r\nNh&agrave; xuất bản H&agrave; Nội</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>BẢN B&Igrave;A CỨNG</p>\r\n\r\n<p>Khổ 13x19 cm<br />\r\nGi&aacute; b&igrave;a 219.000 VNĐ<br />\r\nBarcode 8 935280 909588<br />\r\nISBN 978 604 339 544 0</p>\r\n\r\n<p>Qu&agrave; tặng k&egrave;m Bookmark mica, postcard bế h&igrave;nh, Standee mica, Poster kh&ocirc;ng gấp&nbsp;</p>', '<p><em>Chuyện t&igrave;nh thanh xu&acirc;n bi h&agrave;i của t&ocirc;i quả nhi&ecirc;n l&agrave; sai lầm.</em>&nbsp;(t&ecirc;n gốc: Yahari Ore no Seishun Rabukome wa Machigatteiru., gọi tắt l&agrave; Oregairu), l&agrave; một trong những series light novel ăn kh&aacute;ch nhất trong v&ograve;ng 20 năm trở lại đ&acirc;y, bộ truyện được viết bởi t&aacute;c giả trẻ Wataru WATARI, do họa sĩ Ponkan8 vẽ minh họa v&agrave; được xuất bản bởi NXB nổi tiếng Shogakukan.</p>\r\n\r\n<p><em>Chuyện t&igrave;nh thanh xu&acirc;n bi h&agrave;i của t&ocirc;i quả nhi&ecirc;n l&agrave; sai lầm.</em>&nbsp;đ&atilde; d&agrave;nh giải light novel hay nhất của bảng xếp hạng uy t&iacute;n Kono light novel ga sugoi! trong 3 năm li&ecirc;n tiếp l&agrave; 2014, 2015 v&agrave; 2016. B&ecirc;n cạnh đ&oacute;, nam ch&iacute;nh v&agrave; nữ ch&iacute;nh của series n&agrave;y l&agrave; Hachiman v&agrave; Yokin oshita cũng đoạt giải nam nữ ch&iacute;nh được y&ecirc;u th&iacute;ch nhất trong c&aacute;c năm đ&oacute;. Họa sĩ minh họa Ponkan8 với những bức tranh minh họa đẹp v&agrave; sinh động của m&igrave;nh cũng được b&igrave;nh chọn l&agrave; họa sĩ minh họa được y&ecirc;u th&iacute;ch nhất trong năm 2015. Đến thời điểm hiện tại, series đ&atilde; kết th&uacute;c với 14 tập, nhưng số s&aacute;ch b&aacute;n ra đ&atilde; vượt mốc 10 triệu bản.</p>\r\n\r\n<p>Sau sự kiện ng&agrave;y valentine v&agrave; ng&agrave;y tuyết rơi ở thuỷ cung, nh&oacute;m Hachiman đ&atilde; quyết định bước đi của m&igrave;nh. Gần một năm đ&atilde; qua kể từ lần đầu Hachiman bước qua c&aacute;nh cửa ph&ograve;ng c&acirc;u lạc bộ, rồi Yuigamaha tới, c&ugrave;ng nhau họ đ&atilde; trải qua biết bao kỷ niệm đi k&egrave;m với rắc rối. Sau tất cả mọi chuyện đ&atilde; xảy ra, họ đ&atilde; c&oacute; thể coi nhau như những người bạn th&acirc;n, để biết th&ecirc;m về c&acirc;u chuyện ri&ecirc;ng của đối phương cũng như kể ra c&acirc;u chuyện ri&ecirc;ng của ch&iacute;nh m&igrave;nh? Kh&ocirc;ng thể chấp nhận cứ m&atilde;i dừng lại v&agrave; chối bỏ vấn đề, Hachiman đ&atilde; đi tới quyết định trong ng&agrave;y tuyết rơi ấy v&agrave; lời hứa cũng đ&atilde; được đưa ra.</p>\r\n\r\n<p>Một y&ecirc;u cầu lớn cũng được gửi tới cho c&acirc;u lạc bộ t&igrave;nh nguyện. Với y&ecirc;u cầu n&agrave;y, c&acirc;u trả lời đầy quyết t&acirc;m m&agrave; Yukino đ&atilde; đưa ra l&agrave;&hellip; D&ugrave; cho c&oacute; phải hối tiếc về lựa chọn ấy đi chăng nữa&hellip; Để trưởng th&agrave;nh, người ta phải từ bỏ đi rất nhiều thứ. Yukino đ&atilde; quyết định từ bỏ điều ấy để c&oacute; thể trưởng th&agrave;nh v&agrave; tự m&igrave;nh bước tiếp trong tương lai. Tuy nhi&ecirc;n, bất kể l&uacute;c n&agrave;o, trước mặt ch&uacute;ng ta cũng chỉ c&oacute; duy nhất &ldquo;hiện tại&rdquo; m&agrave; th&ocirc;i. Với những suy nghĩ của mỗi người đuọc giữ chặt trong ngực, &ldquo;c&acirc;u trả lời&rdquo; m&agrave; Hachiman, Yukino v&agrave; Yui lựa chọn sẽ l&agrave; g&igrave; đ&acirc;y?</p>\r\n\r\n<p>Bộ tiểu thuyết về thanh xu&acirc;n sống động đầy mới mẻ n&agrave;y đang đi đến những chương cuối c&ugrave;ng.</p>', '179580', 'tải xuống (1)15.jpg', '678a8792e2132dcd2e0dda6454bf9ac124.jpg', 1, 20, NULL, NULL),
(15, 7, 1, '[BẢN ĐẶC BIỆT] SWORD ART ONLINE TẬP 21', '<p>SWORD ART ONLINE 021<br />\r\n&ldquo;UNITAL RING I&rdquo;<br />\r\nReki Kawahara</p>\r\n\r\n<p>Thể loại: light novel, game online, scifi</p>\r\n\r\n<p>Khổ: 13 x 18<br />\r\nSố trang: 348<br />\r\nTrọng lượng: 350g<br />\r\nGi&aacute; b&aacute;n bản thường: 125.000 đồng<br />\r\nGi&aacute; b&aacute;n bản đặc biệt: 150.000 đồng<br />\r\nQu&agrave; tặng đi k&egrave;m:</p>\r\n\r\n<p>Bản đặt biệt: Huy hiệu nh&acirc;n vật thiết kế in ấn độc đ&aacute;o tem độc quyền của Kadokawa +</p>\r\n\r\n<p>Bookmark PVC số lượng giới hạn</p>\r\n\r\n<p>Bản thường: Bookmark PVC cho những độc giả đặt h&agrave;ng sớm nhất, số lượng c&oacute; hạn.<br />\r\nPh&aacute;t h&agrave;nh tại HN: 6/11/2021 c&aacute;c tỉnh xa phụ thuộc v&agrave;o k&ecirc;nh ph&acirc;n phối</p>', '<p>Tạm dừng ở tập 36. Ban đầu, tập 37 dự kiến sẽ tiếp tục v&agrave;o th&aacute;ng 4/2020 nhưng do Covid-19 ảnh hưởng đến qu&aacute; tr&igrave;nh sản xuất n&ecirc;n b&ecirc;n Nhật đ&atilde; dời về th&aacute;ng 7/2020.</p>\r\n\r\n<p>Kirito tỉnh dậy trong một khu rừng rộng lớn, hoang sơ đầy những c&acirc;y cổ thụ cao lớn.</p>\r\n\r\n<p>Trong cuộc t&igrave;m kiếm manh mối về sự thật xung quanh, anh gặp một cậu b&eacute; v&agrave; h&igrave;nh như cậu ấy quen biết anh.</p>\r\n\r\n<p>Khi họ t&igrave;m kiếm cha mẹ của cậu b&eacute;, một k&yacute; ức bất chợt trở lại trong t&acirc;m tr&iacute; của Kirito. Đ&oacute; l&agrave; c&acirc;u chuyện về thời thơ ấu của Kirito, cậu b&eacute; ấy v&agrave; một c&ocirc; g&aacute;i với c&aacute;i t&ecirc;n đ&aacute;ng ra kh&ocirc;ng được bao giờ qu&ecirc;n - Alice.</p>\r\n\r\n<p>Sword Art Online: Alicization&nbsp;Sword Art Online: Alicization Vietsub&nbsp;Sword Art Online: Alicization HD&nbsp;&nbsp;&nbsp;tập 21&nbsp;Sword Art Online: Alicization tập mới nhất</p>', '120000', 'sao_21_-_bia_1__1__1b33322ca0a64faa8300454d7099cd7a_1024x102417.jpg', 'sao-21-_full-qua__828c7144642a4cf69a22ba24207576ce_master20.jpg', 1, 20, NULL, NULL),
(16, 7, 1, '[BẢN ĐẶC BIỆT] NGUYỆT ĐẠO DỊ GIỚI TẬP 3', '<p>T&ecirc;n s&aacute;ch: Nguyệt Đạo Dị Giới &ndash; Tập 3<br />\r\nT&aacute;c giả: Azumi Kei<br />\r\nNgười dịch: Ngọc Tr&acirc;m<br />\r\nThể loại: Light Novel<br />\r\nKhổ: 13x18 cm<br />\r\nSố trang: 328 trang<br />\r\nNh&agrave; Xuất Bản Phụ Nữ Việt Nam<br />\r\nThương hiệu: Skynovel<br />\r\nM&atilde; ISBN: 9786043297188<br />\r\nM&atilde; c&ocirc;ng ty: 8935325050350<br />\r\nGi&aacute; b&igrave;a: 129.000 đ<br />\r\nPh&aacute;t h&agrave;nh: 25/10/2021</p>', '<p>NGUYỆT ĐẠO DỊ GIỚI 3 - SERIES TRUYỆN ĂN KH&Aacute;CH BẬC NHẤT Đ&Atilde; TRỞ LẠI</p>\r\n\r\n<p>Tiếp nối diễn biến hấp dẫn từ tập 2, Nguyệt Đạo Dị Giới tập 3 mở ra với sự kiện Misumi Makoto với b&iacute; danh Raidou đ&atilde; c&ugrave;ng hai t&ugrave;y t&ugrave;ng l&agrave; Tomoe v&agrave; Mio th&agrave;nh lập thương hội Kuzunoha. Nhờ c&oacute; sự hậu thuẫn v&agrave; gi&uacute;p đỡ của Rembrandt, Makoto đ&atilde; th&agrave;nh c&ocirc;ng gia nhập thị trường Ziege dưới m&ocirc; h&igrave;nh kinh doanh cửa h&agrave;ng b&aacute;ch h&oacute;a, nơi b&agrave;y b&aacute;n c&aacute;c sản vật từ &Aacute; Kh&ocirc;ng, đặc biệt l&agrave; hoa Ambrosia lo&agrave;i hoa trị b&aacute;ch bệnh m&agrave; Makoto đ&atilde; kh&aacute;m ph&aacute; ra th&ocirc;ng qua vụ việc n&aacute;o động của gia đ&igrave;nh Rembrandt ở tập 2.</p>\r\n\r\n<p>Trong chuyến du h&agrave;nh t&igrave;m đến nơi lo&agrave;i hoa Ambrosia sinh trưởng, Makoto v&agrave; Mio đ&atilde; ph&aacute;t hiện ra ba Lo&agrave;i người b&aacute;m đu&ocirc;i m&igrave;nh, nhưng v&igrave; nể t&igrave;nh đồng loại n&ecirc;n cậu đ&atilde; tha thứ v&agrave; đưa họ về &Aacute; Kh&ocirc;ng để tr&ocirc;ng coi. Cũng trong l&uacute;c ấy, nh&oacute;m Makoto c&ograve;n chạm tr&aacute;n với hai c&ocirc; g&aacute;i &Aacute; nh&acirc;n thuộc tộc Quỷ rừng, sau đ&oacute; được họ dẫn về ng&ocirc;i l&agrave;ng của họ - một nơi với bầu kh&ocirc;ng kh&iacute; v&ocirc; c&ugrave;ng k&igrave; qu&aacute;i... C&oacute; vẻ nh&oacute;m Makoto lại sắp bị cuốn v&agrave;o chuyện g&igrave; đ&oacute; rồi đ&acirc;y.</p>\r\n\r\n<p>Rốt cuộc đ&atilde; c&oacute; chuyện g&igrave; xảy ra với ng&ocirc;i l&agrave;ng ấy...?</p>\r\n\r\n<p>V&agrave; liệu ba Lo&agrave;i người được tha thứ kia c&oacute; g&acirc;y n&ecirc;n những s&oacute;ng gi&oacute; g&igrave; kh&ocirc;ng?</p>\r\n\r\n<p>Tất cả sẽ được giải đ&aacute;p trong tập 3 của series ăn kh&aacute;ch Nguyệt đạo dị giới. Bằng ng&ograve;i b&uacute;t kỳ diệu của m&igrave;nh, Azumi Kei sẽ vẽ n&ecirc;n những chuyến phi&ecirc;u lưu gay cấn đến ngạt thở trong một thế giới ph&aacute;p thuật huyền b&iacute; kỳ ảo nơi m&agrave; bạn ngỡ rằng chỉ c&oacute; thể chạm đến trong những giấc mơ!</p>', '105780', 'bia_nguyetdaodigioi3_56140f103a074bc0bba6cc7492cb99a5_1024x102476.png', 'nddg03db92.jpg', 1, 10, NULL, NULL),
(17, 8, 5, 'ALICE Ở XỨ SỞ DIỆU KỲ & THẾ GIỚI TRONG GƯƠNG', '<p>Alice Ở Xứ Sở Diệu Kỳ V&agrave; Alice Ở Thế Giới Trong Gương l&agrave; một tuyệt t&aacute;c văn học kinh điển bất hủ d&agrave;nh cho thiếu nhi, tr&agrave;n đầy tr&iacute; tưởng tượng thần kỳ bất tận, trải ra một thế giới huyền ảo bất tận.</p>\r\n\r\n<table id=\"table-product-detail\">\r\n	<tbody>\r\n		<tr>\r\n			<td>T&aacute;c Giả</td>\r\n			<td>Lewis Carroll</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NXB</td>\r\n			<td>NXB Mỹ Thuật</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Năm XB</td>\r\n			<td>2018</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng Lượng (Gr)</td>\r\n			<td>150.0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch Thước Bao B&igrave;</td>\r\n			<td>17 x 24</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Số Trang</td>\r\n			<td>142</td>\r\n		</tr>\r\n		<tr>\r\n			<td>H&igrave;nh Thức</td>\r\n			<td>B&igrave;a Mềm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<p><strong>Alice Ở Xứ Sở Diệu Kỳ V&agrave; Alice Ở Thế Giới Trong Gương</strong></p>\r\n\r\n<p>Alice Ở Xứ Sở Diệu Kỳ V&agrave; Alice Ở Thế Giới Trong Gương l&agrave; một tuyệt t&aacute;c văn học kinh điển bất hủ d&agrave;nh cho thiếu nhi, tr&agrave;n đầy tr&iacute; tưởng tượng thần kỳ bất tận, trải ra một thế giới huyền ảo như những giấc mộng đầy m&agrave;u sắc với ch&uacute; Thỏ Trắng mặc &aacute;o gi l&ecirc; mang đồng hồ quả qu&yacute;t, ch&uacute; m&egrave;o Cheshire biết cười, anh em Tweedledum v&agrave; Tweedledee đ&aacute;nh nhau v&igrave; c&aacute;i trống bỏi, Humpty Dumpty b&eacute;o tr&ograve;n như quả trứng lu&ocirc;n ngồi tr&ecirc;n đầu tường, v&agrave; Kỵ sĩ Trắng kh&ocirc;ng biết cưỡi ngựa... Chắc hẳn mỗi một người ch&uacute;ng ta, đều đ&atilde; từng ước ao c&oacute; được những giấc mơ diệu kỳ như c&ocirc; b&eacute; Alice...</p>\r\n\r\n<p>Lewis Carroll (1832-1898), l&agrave; nh&agrave; to&aacute;n học, nh&agrave; logic học người Anh, nhưng rất say m&ecirc; văn chương, 12 tuổi đ&atilde; bắt đầu sự nghiệp s&aacute;ng t&aacute;c. Bộ đ&ocirc;i t&aacute;c phẩm &ldquo;Alice ở xứ sở diệu kỳ&rdquo; v&agrave; &ldquo;Alice ở xứ sở trong gương&rdquo; l&agrave; những tuyệt t&aacute;c kinh điển c&oacute; sức sống bất diệt, cho đến nay vẫn l&agrave; nguồn cảm hứng bất tận trong nhiều lĩnh vực nghệ thuật kh&aacute;c nhau. V&agrave; cũng ch&iacute;nh hai t&aacute;c phẩm n&agrave;y đ&atilde; đưa t&ecirc;n tuổi Lewis Carroll v&agrave;o danh s&aacute;ch những nh&agrave; văn nổi tiếng nhất thế giới về truyện cổ t&iacute;ch d&agrave;nh cho thiếu nhi, s&aacute;nh vai với c&aacute;c t&ecirc;n tuổi lớn như Andersen, anh em Grim...</p>', '150000', '2020_05_06_15_14_21_1-390x51066.jpg', '85a2b0ec66568d83af5cfe98bc284a7973.jpg', 1, 30, NULL, NULL),
(18, 8, 4, 'ANH EM NHÀ KARAMAZOV', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>C&ocirc;ng ty ph&aacute;t h&agrave;nh</p>\r\n			</td>\r\n			<td>\r\n			<p>Nh&atilde; Nam</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Ng&agrave;y xuất bản</p>\r\n			</td>\r\n			<td>\r\n			<p>2021-05-01 00:00:00</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>K&iacute;ch thước</p>\r\n			</td>\r\n			<td>\r\n			<p>17 x 25 cm</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Dịch Giả</p>\r\n			</td>\r\n			<td>\r\n			<p>Phạm Mạnh H&ugrave;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Loại b&igrave;a</p>\r\n			</td>\r\n			<td>\r\n			<p>B&igrave;a cứng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Số trang</p>\r\n			</td>\r\n			<td>\r\n			<p>848</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Nh&agrave; xuất bản</p>\r\n			</td>\r\n			<td>\r\n			<p>Nh&agrave; Xuất Bản H&agrave; Nội</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<p>Anh em nh&agrave; Karamazov, t&aacute;c phẩm cuối c&ugrave;ng của Dostoevsky, ch&iacute;nh l&agrave; kiệt t&aacute;c vĩ đại nhất m&agrave; &ocirc;ng để lại cho hậu thế sau hơn bốn chục năm miệt m&agrave;i lao động văn học. Bằng ng&ograve;i b&uacute;t thi&ecirc;n t&agrave;i của m&igrave;nh, Dostoevsky đ&atilde; phản &aacute;nh t&igrave;nh trạng hỗn loạn x&atilde; hội của nước Nga nửa sau thế kỷ 19 qua sự tan r&atilde; v&agrave; những bi kịch trong nh&agrave; Karamazov, c&ugrave;ng với đ&oacute; l&agrave; cuộc &ldquo;t&igrave;m kiếm &yacute; nghĩa tồn tại&rdquo; ở những con người thuộc c&aacute;c thế hệ qu&aacute; khứ, hiện tại v&agrave; tương lai của nước Nga, về những<br />\r\nđau khổ v&ocirc; lượng, v&agrave; những con đường c&oacute; thể gi&uacute;p đưa tới h&ograve;a đồng x&atilde; hội.</p>\r\n\r\n<p>Với phần đ&ocirc;ng mọi người, đọc Dostoevsky ch&iacute;nh l&agrave; diễu qua lịch sử ngắn gọn những bi kịch chung nhất của nh&acirc;n loại, l&agrave; leo l&ecirc;n những đỉnh cao tư tưởng, v&agrave; đ&ocirc;i khi, th&acirc;m nhập v&agrave;o những vỉa tầng s&acirc;u nhất trong nội t&acirc;m con người m&agrave; trước &ocirc;ng, kh&ocirc;ng mấy khi c&oacute; &aacute;nh s&aacute;ng rọi đến chốn ấy. Bởi thế, d&ugrave; đ&oacute; l&agrave; chuyến phi&ecirc;u lưu t&acirc;m tr&iacute; của tuổi trẻ hay ph&uacute;t chi&ecirc;m nghiệm khi đọc s&aacute;ch v&agrave; nh&igrave;n lại đoạn đời d&agrave;y dặn đ&atilde; qua, thiết nghĩ cuốn s&aacute;ch n&agrave;y sẽ đem lại cho ch&uacute;ng ta &iacute;t nhiều dư vị n&agrave;o đ&oacute;.</p>\r\n\r\n<p>Gi&aacute; sản phẩm tr&ecirc;n Tiki đ&atilde; bao gồm thuế theo luật hiện h&agrave;nh. B&ecirc;n cạnh đ&oacute;, tuỳ v&agrave;o loại sản phẩm, h&igrave;nh thức v&agrave; địa chỉ giao h&agrave;ng m&agrave; c&oacute; thể ph&aacute;t sinh th&ecirc;m chi ph&iacute; kh&aacute;c như ph&iacute; vận chuyển, phụ ph&iacute; h&agrave;ng cồng kềnh, thuế nhập khẩu (đối với đơn h&agrave;ng giao từ nước ngo&agrave;i c&oacute; gi&aacute; trị tr&ecirc;n 1 triệu đồng).....</p>', '300000', 'tải xuống (2)23.jpg', 'da953526c4c1d871945b091fb2abc3e069.jpg', 1, 6, NULL, NULL),
(19, 8, 3, 'BẢY NGÀY ĐẾM NGƯỢC', '<p>[TH&Ocirc;NG B&Aacute;O BẢN QUYỀN - BẢY NG&Agrave;Y ĐẾM NGƯỢC]</p>\r\n\r\n<p>T&ecirc;n truyện: Bảy ng&agrave;y đếm ngược</p>\r\n\r\n<p>T&ecirc;n gốc: 倒数七天</p>\r\n\r\n<p>T&aacute;c giả: C&aacute;t Bốc Lặc - 吉卜勒</p>\r\n\r\n<p>Dịch giả: Mỹ Linh &ndash; Dinh Dinh</p>\r\n\r\n<p>Số trang: 400</p>\r\n\r\n<p>Thể loại: Tiểu thuyết Đ&agrave;i Loan</p>', '<p>&ldquo;Tốt nhất l&agrave; kh&ocirc;ng gặp, kh&ocirc;ng gặp&nbsp;sẽ kh&ocirc;ng&nbsp;y&ecirc;u.</p>\r\n\r\n<p>Tốt nhất kh&ocirc;ng quen, kh&ocirc;ng quen&nbsp;sẽ kh&ocirc;ng&nbsp;nhớ.</p>\r\n\r\n<p>Nhưng từng gặp th&igrave; sẽ quen, gặp hay kh&ocirc;ng gặp kh&aacute;c g&igrave; nhau?</p>\r\n\r\n<p>Đ&agrave;nh c&ugrave;ng người quyết đoạn tuyệt, tr&aacute;nh được thương nhớ giữa&nbsp;sống chết.&rdquo;</p>\r\n\r\n<p>Nếu biết c&ograve;n 7 ng&agrave;y để sống, t&ocirc;i sẽ&hellip;&hellip;&hellip;</p>\r\n\r\n<p>Đ&atilde; bao giờ bạn tưởng tượng bạn sẽ được b&aacute;o trước 7 ng&agrave;y nữa m&igrave;nh sẽ chết?</p>\r\n\r\n<p>Nghe thật buồn cười nhưng một ng&agrave;y như thế sẽ l&agrave;m bạn phải suy nghĩ lại chứ?</p>\r\n\r\n<p>Những lời n&agrave;o bạn muốn n&oacute;i</p>\r\n\r\n<p>Người n&agrave;o bạn muốn gặp gỡ</p>\r\n\r\n<p>Việc g&igrave; bạn muốn l&agrave;m</p>\r\n\r\n<p>C&ocirc; nghệ sĩ hết thời từng danh nổi như cồn lại &ocirc;m trong l&ograve;ng sự hối tiếc đối với t&igrave;nh</p>\r\n\r\n<p>th&acirc;n</p>\r\n\r\n<p>C&ocirc; g&aacute;i trẻ xuất th&acirc;n trộm cắp v&ugrave;ng vẫy nơi đ&aacute;y x&atilde; hội, khư khư &ocirc;m chặt ước mơ của</p>\r\n\r\n<p>m&igrave;nh</p>\r\n\r\n<p>Ch&agrave;ng dũng sĩ nh&iacute; c&ocirc; độc lẻ loi chưa từng từ bỏ hi vọng, ki&ecirc;n tr&igrave; t&igrave;m đến v&ograve;ng tay của</p>\r\n\r\n<p>người th&acirc;n</p>\r\n\r\n<p>&ldquo;Bảy ng&agrave;y đếm ngược&rdquo; c&oacute; thể sẽ lấy đi những giọt nước mắt, cũng c&oacute; thể mang theo cả nụ cười cho bạn đọc. Hơn cả, cuốn s&aacute;ch n&agrave;y sẽ mang lại cho bạn cả những l&uacute;c cần phải lặng người hỏi bản th&acirc;n &ldquo;T&ocirc;i đ&atilde; sống trọn vẹn hay chưa?&rdquo;</p>\r\n\r\n<p>Gi&aacute; sản phẩm tr&ecirc;n Tiki đ&atilde; bao gồm thuế theo luật hiện h&agrave;nh. B&ecirc;n cạnh đ&oacute;, tuỳ v&agrave;o loại sản phẩm, h&igrave;nh thức v&agrave; địa chỉ giao h&agrave;ng m&agrave; c&oacute; thể ph&aacute;t sinh th&ecirc;m chi ph&iacute; kh&aacute;c như ph&iacute; vận chuyển, phụ ph&iacute; h&agrave;ng cồng kềnh, thuế nhập khẩu (đối với đơn h&agrave;ng giao từ nước ngo&agrave;i c&oacute; gi&aacute; trị tr&ecirc;n 1 triệu đồng).....</p>', '120000', '15a9ee1352dcfad896401552452770.jpg', 'bay-ngay-dem-nguoc42.jpg', 1, 10, NULL, NULL),
(20, 8, 3, 'BÊN KIA CẦU VỒNG - NUÔI DƯỠNG ĐỨA TRẺ TỪ SƠ SINH ĐẾN BẢY TUỔI', '<ul>\r\n	<li>T&aacute;c giả:&nbsp;<a href=\"https://www.nxbtre.com.vn/tac-gia/barbara-j-patterson-pamela-bradley-66342.html\" title=\"Barbara J.Patterson &amp; Pamela Bradley\">Barbara J.Patterson &amp; Pamela Bradley</a></li>\r\n	<li>Dịch giả:&nbsp;<a href=\"https://www.nxbtre.com.vn/dich-gia/thanh-cherry-50370.html\" title=\"Thanh Cherry\">Thanh Cherry</a></li>\r\n	<li>Khổ s&aacute;ch:&nbsp;15.5x23cm</li>\r\n	<li>Số trang:&nbsp;192</li>\r\n	<li>Gi&aacute; b&aacute;n:&nbsp;90,000 VNĐ</li>\r\n	<li>ISBN:&nbsp;9786041188495</li>\r\n	<li>In lần thứ&nbsp;1 năm 2021</li>\r\n</ul>', '<p>Giới thiệu t&oacute;m tắt t&aacute;c phẩm:</p>\r\n\r\n<p>Đời sống trong thời c&ocirc;ng nghệ khiến ch&uacute;ng ta quen với những thứ được l&agrave;m sẵn từ thức ăn tới quần &aacute;o, đồ chơi&hellip; Cuốn s&aacute;ch n&agrave;y sẽ l&agrave; m&oacute;n qu&agrave; đầy &yacute; nghĩa đối với c&aacute;c thầy c&ocirc; gi&aacute;o v&agrave; c&aacute;c &ocirc;ng bố b&agrave; mẹ c&oacute; con từ sơ sinh đến bảy tuổi. Những b&agrave;i giảng d&agrave;nh cho phụ huynh của c&ocirc; Barbara Patterson, một gi&aacute;o vi&ecirc;n mầm non Waldorf tại Chicago, Mỹ, đ&atilde; được một người dự, b&agrave; Pamela Bradley, ghi ch&eacute;p lại. To&agrave;n bộ s&aacute;ch được viết theo lối kể chuyện cực kỳ giản dị, nhưng đầy đủ những g&igrave; m&agrave; cha mẹ hay gi&aacute;o vi&ecirc;n, những người l&agrave;m c&ocirc;ng t&aacute;c gi&aacute;o dục trẻ ở lứa tuổi bảy năm đầu đời cần được trang bị: v&iacute; dụ phần chia sẻ về tầm quan trọng của sức ấm đối với trẻ sơ sinh v&agrave; trẻ mầm non. Độc giả được nhắc về những chi tiết nhỏ, trước nay &iacute;t người để &yacute; nhưng v&ocirc; c&ugrave;ng quan trọng đối với trẻ ở trường cũng như ở nh&agrave;.<br />\r\nVới lối mi&ecirc;u tả sinh động, chi tiết về những hoạt động trong trường mầm non, s&aacute;ch gi&uacute;p độc giả hiểu th&ecirc;m về trẻ, v&agrave; đ&aacute;p ứng nhu cầu của trẻ ở mỗi giai đoạn ph&aacute;t triển. Trẻ mầm non ở thời n&agrave;o, ở đất nước hay nền văn h&oacute;a n&agrave;o, cũng c&oacute; những nhu cầu v&agrave; vấn đề tương tự. T&aacute;c giả Barbara Patterson đ&atilde; g&oacute;i gọn mọi c&aacute;ch giải quyết trong cuốn s&aacute;ch nhỏ n&agrave;y.<br />\r\n&nbsp;Ngo&agrave;i c&aacute;c hướng dẫn chơi với trẻ, c&aacute;ch l&agrave;m c&aacute;c đồ chơi thủ c&ocirc;ng, phần ấn tượng nhất của s&aacute;ch l&agrave; những c&acirc;u chuyện sinh nhật, gi&uacute;p độc giả cảm nhận được sự thi&ecirc;ng li&ecirc;ng kỳ diệu về khoảnh khắc ra đời của từng em b&eacute; trong mỗi c&acirc;u chuyện. T&aacute;c giả c&ograve;n d&agrave;y c&ocirc;ng t&oacute;m tắt những đặc trưng về gi&aacute;o dục Steiner-Waldorf từ bậc mầm non tới trung học, v&agrave; cung cấp phụ lục giới thiệu t&agrave;i liệu, s&aacute;ch vở li&ecirc;n quan đến gi&aacute;o dục Steiner c&ugrave;ng Anthroposophy.</p>', '67500', 'RainbowBridgeCover246.jpg', 'ben-kia-cau-vong-nuoi-dung-tre-tu-so-sinh-den-bay-tuoi62.jpg', 1, 30, NULL, NULL),
(21, 8, 3, 'BỐC ÁN', '<p>T&ecirc;n s&aacute;ch: BỐC &Aacute;N<br />\r\nT&aacute;c giả: Sa Dư<br />\r\nDịch giả: Lục Phong</p>\r\n\r\n<p>Khổ s&aacute;ch 14.5x20.5 cm<br />\r\nSố trang 624 trang<br />\r\nB&igrave;a Mềm<br />\r\nNxb Li&ecirc;n kết NXB H&agrave; Nội<br />\r\nThể loại Văn học Trung Quốc &ndash; Tiểu thuyết<br />\r\nGi&aacute; b&igrave;a 168.000 VNĐ<br />\r\nM&atilde; vạch 8936117741937<br />\r\nM&atilde; ISBN 978-604-55-3524-0<br />\r\nPhụ kiện Tặng k&egrave;m 1 bookmark 1 mặt<br />\r\nNg&agrave;y dự kiến xuất bản Th&aacute;ng 8/2019</p>', '<p>Người chết c&ograve;n c&oacute; thể giương đao giết người!</p>\r\n\r\n<p>Một thi thể vốn n&ecirc;n nằm tr&ecirc;n linh đường, nhưng lại đứng trước mắt bao người giương đao về ph&iacute;a lưu d&acirc;n.</p>\r\n\r\n<p>Ngo&agrave;i th&agrave;nh Trường An, chỉ một đ&ecirc;m m&aacute;u đ&atilde; chảy th&agrave;nh s&ocirc;ng, hung thủ giết người lại ch&iacute;nh l&agrave; Thần Đao tướng qu&acirc;n chết kh&ocirc;ng r&otilde; nguy&ecirc;n nh&acirc;n bảy ng&agrave;y trước &mdash;- Th&ocirc;i Nguy&ecirc;n Khải.</p>\r\n\r\n<p>Huyền cơ ẩn giấu trong b&atilde;i tha ma, &ldquo;&Aacute;c quỷ kh&ocirc;ng đầu&rdquo; nhiều lần t&aacute;c qu&aacute;i.</p>\r\n\r\n<p>C&aacute;c chủ Minh Th&uacute;y c&aacute;c tinh th&ocirc;ng cầm nghệ, vang danh khắp Trường An, nhưng hầu như kh&ocirc;ng ai từng gặp gỡ, ca kĩ trong c&aacute;c Liễu Ngũ Nương h&agrave;nh sự qu&aacute;i đản, trong m&ugrave;i hương dịu d&agrave;ng ẩn chứa đao phong.</p>\r\n\r\n<p>Chỉ chốc l&aacute;t, trong th&agrave;nh Trường An l&ograve;ng người hoảng loạn, những điều cổ qu&aacute;i n&agrave;y l&agrave; hiện tượng chẳng l&agrave;nh tr&ecirc;n trời gi&aacute;ng xuống, hay l&agrave; một &acirc;m mưu lớn do con người b&agrave;y ra?</p>', '137760', 'Boc-An62.jpg', 'review-sach-Boc-An49.jpg', 1, 10, NULL, NULL),
(22, 9, 5, '[COMBO] TAKAGI (VẪN LÀ) 1-7', '<p>Combo bao gồm 7 tập Takagi vẫn l&agrave; từ tập 1 đến tập 7 bản full qu&agrave;<br />\r\nXuất bản v&agrave; ph&aacute;t h&agrave;nh: NXB Kim Đồng<br />\r\nT&igrave;nh trạng: Mới 100%<br />\r\nGi&aacute; b&igrave;a: 196.000đ<br />\r\nQu&agrave; tặng: Bao bảo vệ cho mỗi tập</p>', '<p>GIỚI THIỆU T&Aacute;C PHẨM<br />\r\nCảm ơn c&aacute;c bạn đ&atilde; lựa chọn bộ truyện của ch&uacute;ng t&ocirc;i. Đ&acirc;y l&agrave; phần hậu truyện của bộ &ldquo;Nhất quỷ nh&igrave; ma, thứ ba Takagi&rdquo;. T&ocirc;i hi vọng c&aacute;c bạn độc giả sẽ y&ecirc;u qu&yacute; Takagi hơn sau khi đọc xong phần truyện n&agrave;y.</p>', '450000', 'takagi_f2_1-7_7ec116e87b674a5f97de0d5eada0fe5d29.jpg', '79b29bf51beb3538e98cab8dd78124a479.jpg', 1, 2, NULL, NULL),
(23, 9, 4, '[COMBO] DIỆT SLIME SUỐT 300 NĂM TÔI LEVEL MAX LÚC NÀO CHẲNG HAY TẬP 1 - 10', '<p>Combo bao gồm 10 tập từ tập 1 - 10<br />\r\nBao gồm bản thường v&agrave; bản đặc biệt<br />\r\nT&igrave;nh trạng: Mới 100% (nguy&ecirc;n seal)<br />\r\nGi&aacute; b&igrave;a: 1.082.000đ&nbsp;</p>', '<p>[Manga] Diệt Slime Suốt 300 Năm, T&ocirc;i Levelmax L&uacute;c N&agrave;o Chẳng Hay (Tập 2) Chuyển sinh th&agrave;nh ph&ugrave; thủy trường sinh bất l&atilde;o, sau khi ti&ecirc;u diệt slime suốt 300 năm, kh&ocirc;ng biết từ l&uacute;c n&agrave;o m&agrave; Azusa đ&atilde; trở th&agrave;nh người mạnh nhất thế giới. C&ugrave;ng với c&ocirc; rồng Raika c&oacute; &yacute; ch&iacute; ki&ecirc;n định, hai c&ocirc; con g&aacute;i đ&aacute;ng y&ecirc;u Farufa v&agrave; Sharusha, tất cả c&ugrave;ng nhau sống chậm r&atilde;i, nhưng rắc rối ập tới c&ugrave;ng đệ tử thứ 2 &ndash; Elf Harukara v&agrave; Ma tộc Beelzebub&hellip;!? Bộ truyện h&agrave;i tại gia đến từ trang web &quot;Shousetsuka ni Narou&quot;, đạt doanh thu top 1 GA Novel!</p>', '1082000', 'diet_slime_1-10_9e810435f7ab4317b8b01856a28b187a_1024x10240.jpg', '413d14589538f446258f809349ebde5f26.jpg', 1, 40, NULL, NULL),
(24, 9, 3, '[COMBO] BARAKAMON 1-15', '<ul>\r\n	<li>T&aacute;c giả: Yoshino Satsuki</li>\r\n	<li>Thể loại: truyện tranh, h&agrave;i hước, đời thường</li>\r\n	<li>Khổ: 13 x 18</li>\r\n	<li>Trọng lượng: 200g</li>\r\n	<li>Gi&aacute; b&igrave;a: 40.000đ / cuốn</li>\r\n	<li>Qu&agrave; tặng:\r\n	<ul>\r\n		<li>Bản đặc biệt: Tặng 1 Postcard 2 mặt in m&agrave;u (h&igrave;nh ảnh bản quyền chỉ d&ugrave;ng cho d&ograve;ng qu&agrave; tặng tại Nhật)</li>\r\n		<li>Bản thường: Tặng 1 Bookmark nối &ldquo;Thước phim k&iacute; ức&rdquo; in m&agrave;u (thiết kế độc quyền cho phi&ecirc;n bản Việt Nam)</li>\r\n	</ul>\r\n	</li>\r\n</ul>', '<p><em><strong>Combo BARAKAMON: Tập 1 + 2 + 3 + 4 (Bộ 4 Tập)</strong></em></p>\r\n\r\n<p>V&igrave; l&yacute; do ri&ecirc;ng, nh&agrave; thư ph&aacute;p trẻ tuổi đẹp trai Handa Seishu phải chuyển tới sống tại một h&ograve;n đảo nằm ở cực T&acirc;y Nhật Bản. Tại đ&acirc;y, &ldquo;anh thầy thư ph&aacute;p&rdquo; c&ograve;n bỡ ngỡ với cuộc sống th&ocirc;n qu&ecirc; n&agrave;y gặp gỡ những cư d&acirc;n qu&aacute; đỗi ph&oacute;ng kho&aacute;ng tr&ecirc;n đảo.</p>\r\n\r\n<p>H&agrave;i nhưng kh&ocirc;ng nhảm, hồn nhi&ecirc;n nhưng kh&ocirc;ng thiếu triết l&yacute;. D&otilde;i theo c&acirc;u chuyện của nghệ nh&acirc;n th&agrave;nh thị v&agrave; những cư d&acirc;n ngo&agrave;i đảo xa, để t&igrave;m về c&aacute;i thời ng&acirc;y ng&ocirc;, trong trẻo, ăn chưa no lo chưa tới của ch&iacute;nh m&igrave;nh n&agrave;o!</p>', '580000', 'barakamon_1-15_129ba9a80d9a4fd1a6eff0ee0da09749_1024x102457.jpg', 'image_195509_1_3628596.jpg', 1, 20, NULL, NULL),
(25, 9, 3, 'CÔ DÂU THẢO NGUYÊN TẬP 1-10', '<ul>\r\n	<li>C&ocirc;ng ty ph&aacute;t h&agrave;nh&nbsp;IPM</li>\r\n	<li>K&iacute;ch thước&nbsp;13 x 18 cm</li>\r\n	<li>Dịch Giả&nbsp;Đỗ Nguy&ecirc;n</li>\r\n	<li>Loại b&igrave;a&nbsp;B&igrave;a mềm</li>\r\n	<li>Nh&agrave; xuất bản&nbsp;Nh&agrave; Xuất Bản H&agrave; Nội</li>\r\n</ul>', '<p>Ở tập n&agrave;y, Karluk tạm biệt thị tứ vui tươi nhộn nhịp, rời xa gia đ&igrave;nh, sang chỗ Azel, Baimat v&agrave; Joruk để học bắn cung. Nơi thảo nguy&ecirc;n bao la, c&ugrave;ng sinh hoạt với bộ tộc nh&agrave; vợ, Karluk đ&atilde; được trải nghiệm cuộc sống du mục, d&ugrave; thời gian n&agrave;y l&agrave; thời gian họ cắm trại tr&aacute;nh đ&ocirc;ng.</p>\r\n\r\n<p>Trong diễn biến kh&aacute;c, hai thầy tr&ograve; Smith tiếp tục cuộc h&agrave;nh tr&igrave;nh đến Ankara. Mỗi v&ugrave;ng đất đi qua, mỗi con người đ&atilde; gặp, đều để lại trong Smith ấn tượng s&acirc;u sắc. V&agrave; cuối cuộc h&agrave;nh tr&igrave;nh, Smith gặp lại một người. Cuộc gặp gỡ đ&atilde; khiến anh v&ocirc; c&ugrave;ng x&uacute;c động&hellip;</p>\r\n\r\n<p>Khung cảnh thảo nguy&ecirc;n v&agrave; cuộc sống Trung &Aacute; thế kỉ 19 tiếp tục hiện l&ecirc;n ấn tượng qua n&eacute;t vẽ t&agrave;i t&igrave;nh của t&aacute;c giả Mori Kaoru</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>&nbsp;</th>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Ở tập n&agrave;y, Karluk tạm biệt thị tứ vui tươi nhộn nhịp, rời xa gia đ&igrave;nh, sang chỗ Azel, Baimat v&agrave; Joruk để học bắn cung. Nơi thảo nguy&ecirc;n bao la, c&ugrave;ng sinh hoạt với bộ tộc nh&agrave; vợ, Karluk đ&atilde; được trải nghiệm cuộc sống du mục, d&ugrave; thời gian n&agrave;y l&agrave; thời gian họ cắm trại tr&aacute;nh đ&ocirc;ng.</p>\r\n\r\n<p>Trong diễn biến kh&aacute;c, hai thầy tr&ograve; Smith tiếp tục cuộc h&agrave;nh tr&igrave;nh đến Ankara. Mỗi v&ugrave;ng đất đi qua, mỗi con người đ&atilde; gặp, đều để lại trong Smith ấn tượng s&acirc;u sắc. V&agrave; cuối cuộc h&agrave;nh tr&igrave;nh, Smith gặp lại một người. Cuộc gặp gỡ đ&atilde; khiến anh v&ocirc; c&ugrave;ng x&uacute;c động&hellip;</p>\r\n\r\n<p>Khung cảnh thảo nguy&ecirc;n v&agrave; cuộc sống Trung &Aacute; thế kỉ 19 tiếp tục hiện l&ecirc;n ấn tượng qua n&eacute;t vẽ t&agrave;i t&igrave;nh của t&aacute;c giả Mori Kaoru</p>', '810000', 'co_dau_thao_nguyen_1-10_9ad55c3968334a6fadbe2ac5ba2a6a15_1024x102444.jpg', 'e9555f8162f6e997e7404038a8cf82bd16.jpg', 1, 50, NULL, NULL),
(26, 9, 1, '[COMBO BOXSET] PHÁO HOA, NGẮM TỪ DƯỚI HAY BÊN CẠNH? + TẠM BIỆT PHÁO HOA', '<p>(BOXSET LIGHT NOVEL 2 TẬP)<br />\r\nNguy&ecirc;n t&aacute;c: Shunji Iwai<br />\r\nT&aacute;c giả: Hitoshi One</p>\r\n\r\n<p>Thể loại: light novel, t&igrave;nh cảm, học đường</p>\r\n\r\n<p>Khổ: 13 x 18<br />\r\nSố trang: (1) 200, (2) 140<br />\r\nTrọng lượng: 450g<br />\r\nGi&aacute; trọn bộ 2 tập: 130.000 đồng/bộ<br />\r\nThời gian ph&aacute;t h&agrave;nh: 30/1/2021</p>', '<p>Giới thiệu s&aacute;ch: Boxset Ph&aacute;o Hoa, Ngắm Từ Dưới Hay B&ecirc;n Cạnh? - Tạm Biệt Ph&aacute;o Hoa (Bộ 2 Tập) Năm 1993, bộ phim truyền h&igrave;nh &ldquo;Ph&aacute;o hoa, ngắm từ dưới hay b&ecirc;n cạnh?&rdquo; do Shunji Iwai đạo diễn l&agrave;m mưa l&agrave;m gi&oacute; tr&ecirc;n s&oacute;ng truyền h&igrave;nh Nhật Bản. 24 năm sau, Hitoshi One đ&atilde; thổi một l&agrave;n gi&oacute; mới v&agrave;o nguy&ecirc;n t&aacute;c, viết n&ecirc;n kịch bản cho phi&ecirc;n bản chuyển thể hoạt h&igrave;nh. Nazuna, Norimichi, Yusuke, Junichi, Kazuhiro, Minoru - s&aacute;u đứa trẻ đ&atilde; đặt ra c&acirc;u hỏi, &ldquo;Ph&aacute;o hoa nh&igrave;n từ b&ecirc;n cạnh tr&ograve;n hay phẳng?&rdquo; H&agrave;nh tr&igrave;nh t&igrave;m kiếm đ&aacute;p &aacute;n của nh&oacute;m bạn nay được t&aacute;i hiện dưới hai ng&ograve;i b&uacute;t ho&agrave;n to&agrave;n kh&aacute;c biệt. &ldquo;Ph&aacute;o hoa, ngắm từ dưới hay b&ecirc;n cạnh?&rdquo; l&agrave; bản light novel do người viết kịch bản phim hoạt h&igrave;nh Hitoshi One chấp b&uacute;t. &ldquo;Tạm biệt ph&aacute;o hoa&rdquo; l&agrave; bản light novel cải bi&ecirc;n do ch&iacute;nh cha đẻ nguy&ecirc;n t&aacute;c truyền h&igrave;nh Shunji Iwai chấp b&uacute;t. C&oacute; thể n&oacute;i đ&acirc;y l&agrave; cuộc thi s&aacute;ng t&aacute;c giữa hai người cha của một c&acirc;u chuyện. Boxset &ldquo;Ph&aacute;o hoa, ngắm từ dưới hay b&ecirc;n cạnh?&rdquo; (light novel) xin được đem đến cho bạn đọc hai t&aacute;c phẩm tưởng một m&agrave; hai, tưởng hai m&agrave; một.</p>', '106600', 'phao_hoa__light_novel__-_box_mat_truoc_2a638459e3e54ed2afdb1d167f69dc77_1024x102436.jpg', 'phao_hoa_ngam__ln__-_bia1__1__a8fbef4768a24d829743116fdf4407e069.jpg', 1, 29, NULL, NULL);
INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_image_second`, `product_status`, `product_quantity`, `created_at`, `updated_at`) VALUES
(27, 8, 3, 'TIẾNG TRIỀU DÂNG', '<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>&nbsp;T&aacute;c giả:&nbsp;<a href=\"http://nhanam.com.vn/tac-gia/20438/mishima-yukio\">Mishima Yukio</a></li>\r\n	<li>&nbsp;Dịch giả:&nbsp;<a href=\"http://nhanam.com.vn/nhom-dich/15851/aikawa-haruki\">Aikawa Haruki</a></li>\r\n	<li>&nbsp;Nh&agrave; xuất bản:&nbsp;<a href=\"http://nhanam.com.vn/nha-xuat-ban/7/ha-noi\">H</a>CM</li>\r\n	<li>Số trang: 208</li>\r\n	<li>K&iacute;ch thước: 14x20.5cm</li>\r\n	<li>Ng&agrave;y ph&aacute;t h&agrave;nh: 01-03-2021</li>\r\n</ul>', '<p>&ldquo;Cậu &ocirc;m trọn cơ thể c&ocirc; g&aacute;i v&agrave;o l&ograve;ng. Họ nghe thấy trong tấm th&acirc;n trần trụi của người kia nhịp tim đang đập dồn dập. Ch&agrave;ng trai vẫn chưa thỏa kh&aacute;t khao, một nụ h&ocirc;n d&agrave;i c&agrave;ng h&agrave;nh hạ ch&agrave;ng, nhưng bất chợt từ l&uacute;c n&agrave;o, nỗi khổ t&acirc;m trong l&ograve;ng đ&atilde; trở th&agrave;nh cảm gi&aacute;c hạnh ph&uacute;c lạ l&ugrave;ng. Ngọn lửa hơi yếu đi thỉnh thoảng lại bập b&ugrave;ng. Đ&ocirc;i trai g&aacute;i trẻ lắng nghe tiếng lửa v&agrave; cả tiếng r&uacute; r&iacute;t của cơn b&atilde;o v&uacute;t qua cửa sổ tr&ecirc;n cao h&ograve;a nhịp c&ugrave;ng tiếng hai tr&aacute;i tim đập rộn r&agrave;ng. Giờ đ&acirc;y, đối với Shinji, cơn say men t&igrave;nh l&acirc;ng l&acirc;ng bất tận n&agrave;y, tiếng s&oacute;ng gầm gừ dữ tợn ngo&agrave;i kia, tiếng gi&oacute; lay những ngọn c&acirc;y run rẩy, tất cả dường như đang d&acirc;ng tr&agrave;o m&atilde;nh liệt trong c&ugrave;ng một &acirc;m sắc cao v&uacute;t của thi&ecirc;n nhi&ecirc;n. Trong l&ograve;ng ch&agrave;ng trai chan chứa một niềm hạnh ph&uacute;c thuần khiết kh&ocirc;n ngu&ocirc;i.&rdquo;<br />\r\n<br />\r\nT&Aacute;C GIẢ: MISHIMA YUKIO (1925-1970)</p>\r\n\r\n<p>&Ocirc;ng sinh tại Tokyo, tốt nghiệp khoa Luật Đại học Tokyo năm 1947, sau đ&oacute; l&agrave;m việc cho Bộ t&agrave;i ch&iacute;nh. Sau 9 th&aacute;ng, &ocirc;ng từ chức v&agrave; bắt đầu viết văn.<br />\r\n<br />\r\nC&aacute;c t&aacute;c phẩm ti&ecirc;u biểu: Kh&aacute;t vọng y&ecirc;u đương (năm 1950), Tiếng triều d&acirc;ng (năm 1954, giải thưởng Văn học Shinchosha), Kim c&aacute;c tự (năm 1956, giải thưởng Văn học Yomiuri), Sau bữa tiệc (năm 1960)&hellip;</p>\r\n\r\n<p>Ng&agrave;y 25 th&aacute;ng 11 năm 1970, &ocirc;ng tự s&aacute;t tại doanh trại Ichigaya của Lực lượng Ph&ograve;ng vệ Nhật Bản, sau khi ho&agrave;n th&agrave;nh những trang cuối bản thảo &ldquo;Năm dấu suy của người trời&rdquo; &ndash; tập thứ 4 trong t&aacute;c phẩm trường thi&ecirc;n Biển ph&igrave; nhi&ecirc;u.<br />\r\n<br />\r\nC&aacute;c t&aacute;c phẩm của Mishima Yukio đ&atilde; được dịch ra nhiều thứ tiếng v&agrave; được y&ecirc;u th&iacute;ch tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p>Gi&aacute; sản phẩm tr&ecirc;n Tiki đ&atilde; bao gồm thuế theo luật hiện h&agrave;nh. B&ecirc;n cạnh đ&oacute;, tuỳ v&agrave;o loại sản phẩm, h&igrave;nh thức v&agrave; địa chỉ giao h&agrave;ng m&agrave; c&oacute; thể ph&aacute;t sinh th&ecirc;m chi ph&iacute; kh&aacute;c như ph&iacute; vận chuyển, phụ ph&iacute; h&agrave;ng cồng kềnh, thuế nhập khẩu (đối với đơn h&agrave;ng giao từ nước ngo&agrave;i c&oacute; gi&aacute; trị tr&ecirc;n 1 triệu đồng).....</p>', '105000', 'tieng-trieu-dang-tieng-_83162031982954.jpg', '62681818c964673f70bb009574538f7646.jpg', 1, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `product_id`, `rating`) VALUES
(1, 3, 3),
(2, 3, 5),
(5, 3, 2),
(6, 3, 5),
(7, 3, 5),
(8, 3, 1),
(9, 3, 1),
(10, 7, 3),
(11, 6, 3),
(12, 7, 3),
(13, 26, 3),
(14, 26, 3),
(15, 26, 4),
(16, 26, 1),
(17, 26, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ship`
--

CREATE TABLE `tbl_ship` (
  `ship_id` int(10) UNSIGNED NOT NULL,
  `ship_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_status` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ship`
--

INSERT INTO `tbl_ship` (`ship_id`, `ship_name`, `ship_content`, `ship_address`, `ship_phone`, `ship_email`, `ship_status`, `created_at`, `updated_at`) VALUES
(39, 'Mach Hoang Minh Thao', '1', '1', '0395095598', '0123456$gmail.com', '1', NULL, NULL),
(40, 'Mach Hoang Minh Thao', '1', '1', '0395095598', '0123456$gmail.com', '1', NULL, NULL),
(41, 'Mach Hoang Minh Thao', '1', '1', '0395095598', '0123456$gmail.com', '1', NULL, NULL),
(42, 'Mach Hoang Minh Thao', 'fsdf', 'fsdf', '0395095598', '0123456$gmail.com', '1', NULL, NULL),
(43, 'Mach Hoang Minh Thao', NULL, 'fdsfdsfdsf', '0395095598', 'fdsf$gmail.com', '1', NULL, NULL),
(44, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(45, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(46, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(47, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(48, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(49, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(50, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(51, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(52, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(53, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(54, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(55, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(56, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(57, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(58, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(59, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(60, 'Mach Hoang Minh Thao', 'jhgjghjghg', 'fdsfdsfdsf', '0395095598', 'fdfsdfsdadsadafsf$gmail.com', '1', NULL, NULL),
(62, 'Mach Hoang Minh Thao', 'rwer', 'rewrew', '0395095598', '0123456$gmail.com', '1', NULL, NULL),
(64, 'Mach Hoang Minh Thao', 'fdsf', 'fdsfdsfdsf', '0395095598', 'fdsf$gmail.com', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `customer_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_comment_post`
--
ALTER TABLE `tbl_comment_post`
  ADD PRIMARY KEY (`comment_post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`,`ship_id`,`payment_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `ship_id` (`ship_id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`,`brand_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_ship`
--
ALTER TABLE `tbl_ship`
  ADD PRIMARY KEY (`ship_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_comment_post`
--
ALTER TABLE `tbl_comment_post`
  MODIFY `comment_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_ship`
--
ALTER TABLE `tbl_ship`
  MODIFY `ship_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_comment_post`
--
ALTER TABLE `tbl_comment_post`
  ADD CONSTRAINT `tbl_comment_post_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`ship_id`) REFERENCES `tbl_ship` (`ship_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category_product` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD CONSTRAINT `tbl_rating_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
