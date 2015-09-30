-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 9 月 24 日 16:44
-- サーバのバージョン： 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_academy`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `news_source_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `news_source_id`) VALUES
(1, '国内', 1),
(2, '国際', 1),
(3, '経済\r\n', 1),
(4, 'エンタメ\r\n\r\n', 1),
(5, 'スポーツ', 1),
(6, 'IT・科学', 1),
(7, 'ライフ\r\n', 1),
(8, '地域', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `enq`
--

CREATE TABLE IF NOT EXISTS `enq` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `enq`
--

INSERT INTO `enq` (`id`, `name`, `email`, `age`, `create_date`, `update_date`) VALUES
(1, 'こうの', 'kono@yahoo.co.jp', 31, '2015-09-06 15:04:24', '2015-09-06 15:04:24'),
(2, 'さとう', 'sato@yahoo.co.jp', 32, '2015-09-06 15:05:29', '2015-09-13 15:35:42'),
(3, 'たかはし', 'takahasi@yahoo.co.jp', 33, '2015-09-06 15:06:51', '2015-09-06 15:06:51'),
(4, 'やまだ', 'yamada@yahoo.co.jp', 34, '2015-09-06 15:07:32', '2015-09-06 15:07:32'),
(5, 'のだ', 'noda@yahoo.co.jp', 35, '2015-09-06 15:08:04', '2015-09-06 15:08:04'),
(6, '河野', 'konotori_21century@yahoo.co.jp', 33, '2015-09-13 15:28:15', '2015-09-13 15:28:15'),
(7, '本田', 'honda@yahoo.co.jp', 32, '2015-09-13 15:31:00', '2015-09-13 15:31:00'),
(8, '河野', 'konotori_21century@yahoo.co.jp', 33, '2015-09-13 15:55:31', '2015-09-13 15:55:31'),
(9, '田中', 'tanaka@yahoo.co.jp', 34, '2015-09-13 15:58:43', '2015-09-13 15:58:43'),
(10, '橋下', 'hashimoto@yahoo.co.jp', 35, '2015-09-15 23:14:07', '2015-09-15 23:14:07');

-- --------------------------------------------------------

--
-- テーブルの構造 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `show_flg` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `login`
--

INSERT INTO `login` (`id`, `name`, `pass`, `show_flg`, `create_date`, `update_time`) VALUES
(1, 'admin', 'password', 0, '2015-09-13 17:13:00', '2015-09-13 17:13:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `news_detail` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `show_flg` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `keyword` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_detail`, `category_id`, `source_id`, `show_flg`, `create_date`, `update_date`, `keyword`) VALUES
(1, '国内１', '国内１', 1, 1, 1, '2015-07-12 14:00:00', '2015-09-21 06:45:05', '国内,日本,ドメスティック'),
(2, '国内２', '国内２', 1, 2, 1, '2015-08-23 14:00:00', '2015-09-21 06:46:28', ''),
(3, '国内３', '国内３', 1, 3, 1, '2015-11-01 14:00:00', '2015-09-21 06:47:32', '国内,日本,ドメスティック'),
(4, '国内４', '国内４', 1, 1, 1, '2015-11-22 14:00:00', '2015-09-21 06:48:51', ''),
(5, '国内５', '国内５', 1, 2, 1, '2016-01-26 23:59:59', '2015-09-21 06:50:17', ''),
(6, '国内６', '国内６', 1, 3, 1, '2016-01-30 14:00:00', '2015-09-21 06:51:37', '国内,日本,ドメスティック'),
(7, '国際１', '国際１', 2, 1, 1, '2016-01-31 14:00:00', '2015-09-21 06:45:16', ''),
(8, '国際２', '国際２', 2, 2, 1, '2015-09-15 23:21:57', '2015-09-21 06:46:36', '国際,海外,外国,インターナショナル'),
(9, '国際３', '国際３', 2, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:47:40', ''),
(10, '国際４', '国際４', 2, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:49:01', '国際,海外,外国,インターナショナル'),
(11, '国際５', '国際５', 2, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:50:26', ''),
(12, '国際６', '国際６', 2, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:51:51', '国際,海外,外国,インターナショナル'),
(13, '経済１', '経済１', 3, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:45:24', '経済,エコノミー,中央銀行'),
(14, '経済２', '経済２', 3, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:46:44', ''),
(15, '経済３', '経済３', 3, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:47:47', '経済,エコノミー,中央銀行'),
(16, '経済４', '経済４', 3, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:49:10', ''),
(17, '経済５', '経済５', 3, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:50:35', '経済,エコノミー,中央銀行'),
(18, '経済６', '経済６', 3, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:52:00', ''),
(19, 'エンタメ１', 'エンタメ１', 4, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:45:34', 'エンターテイメント,娯楽,映画\r\n'),
(20, 'エンタメ２', 'エンタメ２', 4, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:46:52', ''),
(21, 'エンタメ３', 'エンタメ３', 4, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:47:57', ''),
(22, 'エンタメ４', 'エンタメ４', 4, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:49:22', 'エンターテイメント,娯楽,映画\r\n'),
(23, 'エンタメ５', 'エンタメ５', 4, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:50:53', 'エンターテイメント,娯楽,映画\r\n\r\n'),
(24, 'エンタメ６', 'エンタメ６', 4, 3, 0, '2015-09-15 23:44:21', '2015-09-21 06:52:06', ''),
(25, 'スポーツ１', 'スポーツ１', 5, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:45:45', 'スポーツ,プロ,ゲーム,スコア\r\n'),
(26, 'スポーツ２', 'スポーツ２', 5, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:47:01', ''),
(27, 'スポーツ３', 'スポーツ３', 5, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:48:03', 'スポーツ,プロ,ゲーム,スコア'),
(28, 'スポーツ４', 'スポーツ４', 5, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:49:30', 'スポーツ,プロ,ゲーム,スコア'),
(29, 'スポーツ５', 'スポーツ５', 5, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:50:59', 'スポーツ,プロ,ゲーム,スコア'),
(30, 'スポーツ６', 'スポーツ６', 5, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:52:13', ''),
(31, 'IT・科学１', 'IT・科学１', 6, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:45:55', 'IT,科学,サイエンス,プログラム,研究'),
(32, 'IT・科学２', 'IT・科学２', 6, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:47:10', ''),
(33, 'IT・科学３', 'IT・科学３', 6, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:48:16', 'スポーツ,プロ,ゲーム,スコア'),
(34, 'IT・科学４', 'IT・科学４', 6, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:49:45', ''),
(35, 'IT・科学５', 'IT・科学５', 6, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:51:08', ''),
(36, 'IT・科学６', 'IT・科学６', 6, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:52:20', 'スポーツ,プロ,ゲーム,スコア\r\n'),
(37, 'ライフ１', 'ライフ１', 7, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:46:10', ''),
(38, 'ライフ２', 'ライフ２', 7, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:47:17', 'ライフ,生命,生き物'),
(39, 'ライフ３', 'ライフ３', 7, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:48:27', ''),
(40, 'ライフ４', 'ライフ４\r\n', 7, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:50:00', ''),
(41, 'ライフ５', 'ライフ５\r\n', 7, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:51:19', 'ライフ,生命,生き物'),
(42, 'ライフ６', 'ライフ６\r\n', 7, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:52:27', 'ライフ,生命,生き物'),
(43, '地域１', '地域１', 8, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:46:17', '地域,地方,観光'),
(44, '地域２', '地域２', 8, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:47:24', ''),
(45, '地域３', '地域３', 8, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:48:44', ''),
(46, '地域４', '地域４\r\n\r\n', 8, 1, 1, '2015-09-15 23:44:21', '2015-09-21 06:50:08', '地域,地方,観光'),
(47, '地域５', '地域５\r\n\r\n', 8, 2, 1, '2015-09-15 23:44:21', '2015-09-21 06:51:29', '地域,地方,観光'),
(48, '地域６', '地域６\r\n\r\n', 8, 3, 1, '2015-09-15 23:44:21', '2015-09-21 06:52:34', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `source`
--

CREATE TABLE IF NOT EXISTS `source` (
  `source_id` int(11) NOT NULL,
  `source_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `source`
--

INSERT INTO `source` (`source_id`, `source_name`) VALUES
(1, '日経新聞'),
(2, '朝日新聞'),
(3, '読売新聞');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `enq`
--
ALTER TABLE `enq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`source_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `enq`
--
ALTER TABLE `enq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `source`
--
ALTER TABLE `source`
  MODIFY `source_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
