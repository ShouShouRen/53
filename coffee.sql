-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 03 月 13 日 09:10
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `coffee`
--

-- --------------------------------------------------------

--
-- 資料表結構 `login_log`
--

CREATE TABLE `login_log` (
  `user` varchar(100) NOT NULL,
  `login_time` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `login_log`
--

INSERT INTO `login_log` (`user`, `login_time`, `status`) VALUES
('admin', '2023-03-13 16:02:55', '登入成功'),
('admin', '2023-03-13 16:07:15', '登入成功'),
('admin', '2023-03-13 16:09:01', '登出成功'),
('admin', '2023-03-13 16:10:14', '登入成功'),
('admin', '2023-03-13 16:10:18', '登出成功');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_des` text NOT NULL,
  `price` varchar(25) NOT NULL,
  `links` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `images` varchar(100) NOT NULL,
  `template` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_des`, `price`, `links`, `time`, `images`, `template`) VALUES
(1, 'fewwfwef', 'ewfwefwefwefsfe', '5002', 'ewfewfwefewf', '2023-03-05 13:37:30', '0f650a5b156d40ec60860ed0a017235a.jpg', '2'),
(2, 'fewwfwef', 'ewfwefwefwefsfe', '500', 'ewfewfwefewf', '2023-03-05 13:37:34', 'e8ef16a798793a96ad48a8377c6fa2a5.jpg', '4'),
(3, 'fewwfwef', 'ewfwefwefwefsfe', '160', 'ewfewfwefewf', '2023-03-05 13:40:20', 'cd238e9b1308de373ee6dc267b0c6efb.jpg', '1'),
(4, 'test', 'dsffdsadfsfsafd', '1000', 'google.com', '2023-02-26 14:36:00', '379d5c8efff3b37b2625f31379216472.jpg', '3'),
(5, '版型三', '測試測試', '1500', 'https://youtube.com', '2023-02-26 14:45:00', '1a260de21e93dabfd12044a935454433.jpg', '3'),
(6, '測試標題2', '版型二', '600', 'google.com', '2023-02-26 15:17:00', '5a0f303d4f54bc4ac393aa44e175efb9.jpg', '2'),
(7, 'title', 'sdfafsadfs', '1300', 'google.com', '2023-03-03 00:47:00', '9f81bf1df19a8868d3dd40a2ec5b24a2.jpg', '3'),
(8, '咖啡', '好喝的咖啡', '300', 'google.com', '2023-03-03 00:59:05', '5c978e8547ea1a06ea636e82e36c74f3.jpg', '4'),
(9, '咖啡商品', '好好喝的咖啡', '500', 'coffee.com', '2023-03-03 09:57:56', '586d20331102ab9260e28021a1cda497.jpg', '3'),
(10, 'fewwfwef', 'ewfwefwefwefsfe', '500', 'ewfewfwefewf', '2023-03-03 10:21:32', '32c9be6f7804ef708cf0d4b3eb89f078.jpg', '1');

-- --------------------------------------------------------

--
-- 資料表結構 `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `product_name` int(11) NOT NULL,
  `product_des` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `links` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `images` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(100) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `user_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `user`, `user_name`, `pw`, `role`, `user_id`) VALUES
(1, 'admin', '超級管理者', '1234', 0, '0000'),
(2, 'coffee', 'coffee', '12345', 1, '0001'),
(3, 'peter', '陳暐仁', '1022', 1, '0002'),
(4, 'test001', '測試01', '12341', 1, '0003'),
(5, 'test02', '測試02', '12343', 1, '0004'),
(6, 'coffeesss', 'coffeess', '1234', 1, '0005'),
(7, '123', '1233421', '12424241', 1, '0006');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
