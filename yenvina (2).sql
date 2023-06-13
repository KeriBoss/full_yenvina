-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 30, 2023 lúc 11:14 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `yenvina`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `status_home` tinyint(1) NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `user_id`, `topic_id`, `image`, `status`, `status_home`, `create_at`, `update_at`) VALUES
(1, 'Yến chưng tươi', 'Thơm ngon, bổ dưỡng với tỷ lệ kim cương cùng công thức độc quyền tạo ra hơn 20 hương vị khác nhau', 1, 1, '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 1, 1, '2023-05-03', '0000-00-00'),
(2, 'SET QUÀ Ý NGHĨA DÀNH TẶNG ĐỒNG NGHIỆP, ĐỐI TÁC', 'Nếu bạn chưa nghĩ ra Tết này mua gì tặng cho đồng nghiệp, đối tác thì tham khảo ngay các set quà Tết 2023 của CiCi nhé.', 1, 2, 'nhatho_batt.jpg', 1, 1, '2023-05-04', '0000-00-00'),
(3, '🪔 Các set 6 hũ, 12 hũ, 24 hũ Thượng Vy Yến đảo cũng rất đẹp và sang, phù hợp biếu tặng. ', 'Món quà nhỏ nhưng ý nghĩa lớn. Thêm phần gắn kết, trọn vẹn yêu thương. ', 1, 3, 'quang-binh\'.jpg', 1, 1, '2023-05-04', '0000-00-00'),
(6, 'Yến chưng tươi', 'Thơm ngon, bổ dưỡng với tỷ lệ kim cương cùng công thức độc quyền tạo ra hơn 20 hương vị khác nhau', 1, 4, '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 1, 1, '2023-05-03', '0000-00-00'),
(7, 'SET QUÀ Ý NGHĨA DÀNH TẶNG ĐỒNG NGHIỆP, ĐỐI TÁC', 'Nếu bạn chưa nghĩ ra Tết này mua gì tặng cho đồng nghiệp, đối tác thì tham khảo ngay các set quà Tết 2023 của CiCi nhé.', 1, 6, '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 1, 1, '2023-05-04', NULL),
(8, '🪔 Các set 6 hũ, 12 hũ, 24 hũ Thượng Vy Yến đảo cũng rất đẹp và sang, phù hợp biếu tặng. ', 'Món quà nhỏ nhưng ý nghĩa lớn. Thêm phần gắn kết, trọn vẹn yêu thương. ', 1, 1, 'quang-binh\'.jpg', 1, 1, '2023-05-04', NULL),
(9, 'Yến chưng tươi', 'Thơm ngon, bổ dưỡng với tỷ lệ kim cương cùng công thức độc quyền tạo ra hơn 20 hương vị khác nhau', 1, 1, '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 1, 0, '2023-05-03', '0000-00-00'),
(10, 'SET QUÀ Ý NGHĨA DÀNH TẶNG ĐỒNG NGHIỆP, ĐỐI TÁC', 'Nếu bạn chưa nghĩ ra Tết này mua gì tặng cho đồng nghiệp, đối tác thì tham khảo ngay các set quà Tết 2023 của CiCi nhé.', 1, 2, 'nhatho_batt.jpg', 1, 1, '2023-05-04', '0000-00-00'),
(11, '🪔 Các set 6 hũ, 12 hũ, 24 hũ Thượng Vy Yến đảo cũng rất đẹp và sang, phù hợp biếu tặng. ', 'Món quà nhỏ nhưng ý nghĩa lớn. Thêm phần gắn kết, trọn vẹn yêu thương. ', 1, 3, 'quang-binh\'.jpg', 1, 1, '2023-05-04', '0000-00-00'),
(12, 'Yến chưng tươi', 'Thơm ngon, bổ dưỡng với tỷ lệ kim cương cùng công thức độc quyền tạo ra hơn 20 hương vị khác nhau', 1, 4, '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 1, 0, '2023-05-03', '0000-00-00'),
(13, 'SET QUÀ Ý NGHĨA DÀNH TẶNG ĐỒNG NGHIỆP, ĐỐI TÁC', 'Nếu bạn chưa nghĩ ra Tết này mua gì tặng cho đồng nghiệp, đối tác thì tham khảo ngay các set quà Tết 2023 của CiCi nhé.', 1, 6, '3bbaeb04-eba4-4657-9388-b327bd42008e.png', 1, 1, '2023-05-04', NULL),
(14, '🪔 Các set 6 hũ, 12 hũ, 24 hũ Thượng Vy Yến đảo cũng rất đẹp và sang, phù hợp biếu tặng. ', 'Món quà nhỏ nhưng ý nghĩa lớn. Thêm phần gắn kết, trọn vẹn yêu thương. ', 1, 1, 'quang-binh\'.jpg', 1, 0, '2023-05-04', NULL),
(15, '🪔 Các set 6 hũ, 12 hũ, 24 hũ Thượng Vy Yến đảo cũng rất đẹp và sang, phù hợp biếu tặng. ', 'Món quà nhỏ nhưng ý nghĩa lớn. Thêm phần gắn kết, trọn vẹn yêu thương. ', 1, 1, 'quang-binh\'.jpg', 1, 0, '2023-05-04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article_topic`
--

CREATE TABLE `article_topic` (
  `id` int(11) NOT NULL,
  `topic_name` text NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `article_topic`
--

INSERT INTO `article_topic` (`id`, `topic_name`, `create_at`) VALUES
(1, 'Gia Đình', '2023-05-03'),
(2, 'Sức Khỏe', '2023-05-03'),
(3, 'Người Cao Tuổi', '2023-05-03'),
(4, 'Trẻ Em', '2023-05-03'),
(6, 'Sức khỏe 2', '2023-05-04'),
(7, 'Dinh dưỡng', '2023-05-23'),
(8, 'Dinh dưỡng 2', '2023-05-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `description` text NOT NULL,
  `img_web` text NOT NULL,
  `img_mobile` text NOT NULL,
  `position` int(11) NOT NULL,
  `href` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `heading`, `description`, `img_web`, `img_mobile`, `position`, `href`, `status`, `create_at`) VALUES
(1, 'Banner header 2', 'Mô tả chi tiết banner 2', 'banner-web-2.png', 'banner-mb-2.png', 2, 'https://thuongdinhyen.vn/', 1, '2023-05-02'),
(2, 'Banner header 1', 'Đây là banner no.1', 'banner-web-1.png', 'banner-mb-1.png', 1, 'https://thuongdinhyen.vn/', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `code` text NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `product_id`, `user_id`, `quantity`, `code`, `create_at`, `update_at`) VALUES
(44, 20, '080520230311', 1, 'keri110043', '2023-05-08', '2023-05-08'),
(45, 22, '080520230311', 1, 'keri110312', '2023-05-08', '2023-05-08'),
(47, 4, '080520230311', 1, 'keri135545', '2023-05-08', '2023-05-08'),
(48, 5, '080520230311', 1, 'keri135602', '2023-05-08', '0000-00-00'),
(49, 21, '080520231023', 3, 'keri153219', '2023-05-08', '2023-05-09'),
(50, 23, '080520231023', 1, 'keri153221', '2023-05-08', '2023-05-09'),
(51, 21, '080520231116', 3, 'keri161648', '2023-05-08', '2023-05-08'),
(52, 23, '080520231124', 3, 'keri162624', '2023-05-08', '2023-05-08'),
(53, 21, '080520231127', 1, 'keri162743', '2023-05-08', '0000-00-00'),
(54, 22, '090520230310', 1, 'keri081114', '2023-05-09', '0000-00-00'),
(55, 21, '090520230312', 1, 'keri082101', '2023-05-09', '0000-00-00'),
(56, 21, '090520230339', 2, 'keri083919', '2023-05-09', '2023-05-09'),
(57, 21, '190520231034', 1, 'keri153900', '2023-05-19', '2023-05-19'),
(58, 21, '260520230320', 1, 'keri082101', '2023-05-26', '2023-05-26'),
(59, 21, '290520230856', 1, 'keri135626', '2023-05-29', '2023-05-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `user_id`, `content`, `rating`, `create_at`) VALUES
(8, 21, '080520231023', 'bad', 1, '2023-05-09'),
(9, 21, '080520231023', 'Very good', 5, '2023-05-09'),
(10, 21, '080520231023', 'ok', 4, '2023-05-09'),
(11, 21, '080520231023', 'oke', 5, '2023-05-09'),
(12, 21, '080520231023', 'oke la', 5, '2023-05-09'),
(13, 21, '080520231023', 'tạm ổn', 2, '2023-05-09'),
(14, 21, '080520231023', 'đsad', 3, '2023-05-09'),
(15, 21, '080520231023', 'oh yeah', 5, '2023-05-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `work_time` text NOT NULL,
  `description` text NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`id`, `company_name`, `phone`, `email`, `address`, `work_time`, `description`, `create_at`) VALUES
(1, 'Công ty TNHH Yến Vina 2', '01213445782', 'Yenvina2@gmail.com', '888 đường 3/2, phường 11, quận Tân Bình 2', 'sáng từ 8h đến 12h, trưa 1h đến 5h chiều', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi quia dolore corrupti debitis voluptates similique ut, hic officiis veniam quas. Quas, corrupti? Commodi, quos! Accusantium ut qui quasi facilis sequi.', '2023-05-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_user`
--

CREATE TABLE `info_user` (
  `info_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `name_user` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info_user`
--

INSERT INTO `info_user` (`info_id`, `user_id`, `name_user`, `phone`, `address`, `create_at`, `update_at`) VALUES
(11, '080520230311', 'Le LAM', '0359893447', 'Ninh Thuan province', '2023-05-08', '0000-00-00'),
(12, '080520231023', 'Lâm Lê Văn', '0359893447', 'Ninh Thuan province', '2023-05-08', '2023-05-09'),
(13, '080520231116', 'test tow', '0359893447', 'Ninh Thuan province', '2023-05-08', '2023-05-09'),
(14, '080520231124', 'Le LAM', '0359893447', 'Ninh Thuan province', '2023-05-08', '0000-00-00'),
(15, '080520231127', 'Le LAM', '3213312321', 'thôn Văn Hòa, xã Vĩnh Phúc, tỉnh Lào Cai', '2023-05-08', '2023-05-08'),
(16, '090520230310', 'new bi', '0359893447', 'Ninh Thuan province', '2023-05-09', '0000-00-00'),
(17, '290520230856', 'asdsad', '0123456789', 'addsd', '2023-05-29', '2023-05-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `transport` text NOT NULL,
  `type_payment` text NOT NULL,
  `total_price` int(11) NOT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `transport`, `type_payment`, `total_price`, `create_at`) VALUES
(1, '080520230311', 'Phí ship dựa trên kilomet thực nhận', 'Thanh toán khi nhận hàng', 10243000, '2023-05-08'),
(2, '080520230311', 'Phí ship dựa trên kilomet thực nhận', 'Thanh toán khi nhận hàng', 10243000, '2023-05-08'),
(3, '080520230311', 'Phí ship dựa trên kilomet thực nhận', 'Thanh toán khi nhận hàng', 14327300, '2023-05-08'),
(4, '080520230311', 'Phí ship dựa trên quãng đường đi được', 'Thanh toán khi nhận hàng', 8136000, '2023-05-08'),
(6, '080520231116', 'Phí ship dựa trên kilomet thực nhận', 'Thanh toán khi nhận hàng', 12252900, '2023-05-09'),
(7, '080520231023', 'Phí ship dựa trên quãng đường đi được', 'Thanh toán khi nhận hàng', 14382900, '2023-05-09'),
(8, '290520230856', 'Phí ship dựa trên kilomet thực nhận', 'Thanh toán khi nhận hàng', 4084300, '2023-05-29'),
(9, '290520230856', 'Phí ship dựa trên kilomet thực nhận', 'Thanh toán khi nhận hàng', 4084300, '2023-05-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `prices` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `weight` text NOT NULL DEFAULT '50gram',
  `type_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` date DEFAULT current_timestamp(),
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `prices`, `quantity`, `sale`, `thumbnail`, `weight`, `type_id`, `rating`, `status`, `create_at`, `update_at`) VALUES
(2, 'Yến chưng chất lượng cao 2', 3100000, 297, 5, 'to_yen_2.png', '50gram', 2, 4, 1, NULL, NULL),
(3, 'Tổ yến nơi thiên đường', 5150000, 999, 9, 'to_yen_1.png', '50gram', 1, 4, 1, NULL, NULL),
(4, 'Tổ yến “thượng hạng”', 290000, 115, 0, 'to_yen_1.png', '50gram', 1, 5, 1, NULL, NULL),
(5, 'Tổ yến “thượng hạng”', 290000, 115, 0, 'to_yen_1.png', '50gram', 1, 5, 1, NULL, NULL),
(6, 'Yến chưng đỏ chưng cất', 3100000, 297, 5, 'to_yen_1.png', '50gram', 2, 4, 1, NULL, NULL),
(7, 'Tổ yến nơi thiên đường', 5150000, 999, 9, 'to_yen_1.png', '50gram', 1, 5, 1, NULL, NULL),
(8, 'Tổ yến “thượng hạng”', 290000, 115, 0, 'to_yen_1.png', '50gram', 1, 5, 1, NULL, NULL),
(9, 'Tổ yến “thượng hạng”', 290000, 115, 0, 'to_yen_2.png', '50gram', 1, 5, 1, NULL, NULL),
(10, 'Yến chưng Trung Quốc chất lượng cao', 3100000, 297, 5, 'to_yen_1.png', '50gram', 2, 4, 1, NULL, NULL),
(11, 'Tổ yến nơi thiên đường', 5150000, 999, 9, 'to_yen_1.png', '50gram', 1, 5, 1, NULL, NULL),
(13, 'Tổ yến “thượng hạng”', 290000, 115, 0, 'to_yen_1.png', '50gram', 1, 5, 1, NULL, NULL),
(14, 'Yến chưng chất lượng cao', 3100000, 297, 5, 'to_yen_1.png', '50gram', 9, 4, 1, NULL, NULL),
(15, 'Tổ yến nơi thiên đường', 5150000, 999, 9, 'to_yen_2.png', '50gram', 9, 5, 1, NULL, NULL),
(16, 'Tổ yến “thượng hạng”', 290000, 115, 0, 'to_yen_1.png', '50gram', 1, 5, 1, NULL, NULL),
(20, 'Tổ yến vip loại 2', 2100000, 31, 3, 'Pancake hạnh nhân đậu đỏ.jpg', '50gram', 2, 5, 1, NULL, NULL),
(21, 'Yen sao chung cat', 5170000, 412, 21, 'to_yen_1.png', '50gram', 3, 5, 1, NULL, NULL),
(22, 'Tổ yến vip loại 3', 2140000, 27, 5, 'Pancake hạnh nhân đậu đỏ.jpg', '50gram', 1, 5, 1, NULL, NULL),
(23, 'Tổ yến vip loại 4', 2130000, 213, 0, '3bbaeb04-eba4-4657-9388-b327bd42008e.png', '50gram', 3, 0, 1, NULL, NULL),
(24, 'Yen sao chung cat', 330000, 10, 2, 'img_item_hcoll_products_5_small (5).png', '50gram', 3, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `social_name` text NOT NULL,
  `description` text NOT NULL,
  `href` text NOT NULL,
  `icon` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social`
--

INSERT INTO `social` (`id`, `social_name`, `description`, `href`, `icon`, `status`, `create_at`) VALUES
(1, 'Facebook', 'Mạng xã hội hàng đầu và gộng gãi', 'https://www.facebook.com/', 'bxl-facebook-square', 1, '2023-05-03'),
(4, 'Youtube', 'Tập hợp các phim hành động, đấu kiếm đỉnh cao', 'https://www.youtube.com', 'bxl-youtube', 1, '2023-05-03'),
(5, 'Bing', 'Bing chí lỉn', 'https://thuongdinhyen.vn/', 'bxl-bing', 0, '2023-05-03'),
(6, 'Twitter', 'lorem', 'https://thuongdinhyen.vn/', 'bxl-twitter', 1, '2023-05-03'),
(7, 'Tiktok', 'Tiktok', 'https://tiktok.com/', 'bxl-tiktok', 0, '2023-05-08'),
(8, 'Priterest', 'Hình ảnh', 'https://thuongdinhyen.vn/', 'bxl-pinterest', 0, '2023-05-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `type_id` int(11) NOT NULL,
  `type_name` text NOT NULL,
  `image` text NOT NULL,
  `position` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`type_id`, `type_name`, `image`, `position`, `description`) VALUES
(1, 'Una Collagen', 'img_item_hcoll_products_5_small (1).png', 3, ''),
(2, 'Soup', 'img_item_hcoll_products_5_small (7).png', 4, ''),
(3, 'Fer Valley', 'img_item_hcoll_products_6_small.png', 5, ''),
(9, 'Yến chưng sẵn', 'img_item_hcoll_products_5_small (5).png', 1, ''),
(10, 'Yến khô', 'img_item_hcoll_products_5_small (6).png', 2, 'Một trong những loại yến thịnh hành và được nhiều người sử dụng nhất hiện nay.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `create_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345', '2023-04-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_web`
--

CREATE TABLE `user_web` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `user_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `member` text NOT NULL DEFAULT 'Khách hàng thường',
  `create_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_web`
--

INSERT INTO `user_web` (`id`, `user_id`, `user_name`, `email`, `password`, `member`, `create_at`, `update_at`) VALUES
(16, '080520231023', 'Lâm Lê Văn', 'levanlam3447@gmail.com', '123456', 'Khách hàng thường', '2023-05-08', '0000-00-00'),
(17, '080520231116', 'test tow', 'admin@gmail.com', '12345', 'Khách hàng thường', '2023-05-08', '0000-00-00'),
(27, '080520231124', '123123 213231', 'Admin3@gmail.com', '123445', 'Khách hàng thường', '2023-05-08', '0000-00-00'),
(28, '080520231127', 'Le LAM', 'admin2@gmail.com', '213213', 'Khách hàng thường', '2023-05-08', '0000-00-00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `article_topic`
--
ALTER TABLE `article_topic`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `fk_product` (`product_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info_user`
--
ALTER TABLE `info_user`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `user_id` (`user_id`(768));

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Chỉ mục cho bảng `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_web`
--
ALTER TABLE `user_web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `article_topic`
--
ALTER TABLE `article_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `info_user`
--
ALTER TABLE `info_user`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_web`
--
ALTER TABLE `user_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `article_topic` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_product` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
