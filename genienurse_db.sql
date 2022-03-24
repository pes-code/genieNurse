-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1:3309
-- 生成日時: 2022-03-24 15:12:26
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `genienurse_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `appo_table`
--

CREATE TABLE `appo_table` (
  `id` int(12) NOT NULL,
  `n_id` int(12) NOT NULL,
  `needs_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `appo_table`
--

INSERT INTO `appo_table` (`id`, `n_id`, `needs_id`, `created_at`) VALUES
(75, 19, 30, '2022-03-24 22:44:32'),
(76, 19, 31, '2022-03-24 22:44:33');

-- --------------------------------------------------------

--
-- テーブルの構造 `nurse_service`
--

CREATE TABLE `nurse_service` (
  `id` int(12) NOT NULL,
  `n_id` int(12) NOT NULL,
  `face_img` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `office_name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `reward` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `tel` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `mail` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `time` date NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `nurse_service`
--

INSERT INTO `nurse_service` (`id`, `n_id`, `face_img`, `office_name`, `title`, `reward`, `comment`, `link`, `tel`, `mail`, `time`, `is_deleted`, `created_at`, `updated_at`) VALUES
(39, 19, 'face_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 'ジーニーナース', 'ああああ', '10000000000000000', 'iiii', 'https://techacademy.jp/magazine/5587', '09082488255', 'saoiosyu@gmail.com', '0000-00-00', 0, '2022-03-24 22:27:40', '2022-03-24 22:27:40'),
(40, 19, 'face_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 'ジーニーナース', 'いいいい', '10000', 'うううう', 'https://techacademy.jp/magazine/5587', '09082488255', 'saoiosyu@gmail.com', '0000-00-00', 0, '2022-03-24 22:27:57', '2022-03-24 22:27:57'),
(41, 19, 'face_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 'ジーニーナース', 'おおおおおお', '1000000', 'ががががががｇ', 'https://techacademy.jp/magazine/5587', '09082488255', 'saoiosyu@gmail.com', '0000-00-00', 0, '2022-03-24 22:28:13', '2022-03-24 22:28:13'),
(42, 20, 'face_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', '看護部長', 'aaaaaa', '10000', 'bbbbb', 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '0836211948', 'kkk@gmail.com', '0000-00-00', 0, '2022-03-24 22:38:06', '2022-03-24 22:38:06'),
(44, 20, 'face_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', '看護部長', 'hhhhhh', '1000000', 'jjjjjjjj', 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '0836211948', 'kkk@gmail.com', '0000-00-00', 0, '2022-03-24 22:38:36', '2022-03-24 22:38:36');

-- --------------------------------------------------------

--
-- テーブルの構造 `nurse_table`
--

CREATE TABLE `nurse_table` (
  `n_id` int(12) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `sex` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `birthday` varchar(12) COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `tel` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `mail` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `pass` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nurse_number` int(30) NOT NULL,
  `advance_license` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `office_name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `item_other` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `staff` int(100) NOT NULL,
  `link` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `appeal` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_f_img` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `id_b_img` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `face_img` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `license_img` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `nurse_table`
--

INSERT INTO `nurse_table` (`n_id`, `name`, `sex`, `birthday`, `address`, `tel`, `mail`, `pass`, `nurse_number`, `advance_license`, `office_name`, `item_other`, `staff`, `link`, `appeal`, `id_f_img`, `id_b_img`, `face_img`, `license_img`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(19, '白石知之', '男', '19840501', '山口県宇部市厚南中央5丁目10-55-4', '09082488255', 'saoiosyu@gmail.com', '111111', 987654321, 'JSMN', 'ジーニーナース', NULL, 0, 'https://techacademy.jp/magazine/5587', '夢を叶えるランプの魔人', 'id_f_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 'id_b_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 'face_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 'license_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 1, 0, '2022-03-24 22:27:11', '2022-03-24 22:27:11'),
(20, '末永佳子', '女', '19550101', '山口県宇部市小羽山町広田1-1-1', '0836211948', 'kkk@gmail.com', '222222', 0, 'non', '看護部長', NULL, 0, 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '宇部興産中央病院', 'id_f_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', 'id_b_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', 'face_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', 'license_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 0, '2022-03-24 22:37:46', '2022-03-24 22:37:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `patient_needs`
--

CREATE TABLE `patient_needs` (
  `needs_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `handlename` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `sex` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `need_title` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `reward` varchar(12) COLLATE utf8mb4_bin DEFAULT NULL,
  `deadline` datetime NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `mail` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `patient_needs`
--

INSERT INTO `patient_needs` (`needs_id`, `u_id`, `handlename`, `sex`, `need_title`, `comment`, `reward`, `deadline`, `name`, `tel`, `mail`, `is_deleted`, `created_at`, `updated_at`) VALUES
(30, 11, 'アラジン', '男', '病院についてきてほしい', '術前説明が明日あるが、医者の言っていることが全然理解できん。同行して解説して欲しい。', '1000000', '2022-03-25 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(31, 11, 'アラジン', '男', 'ミットを受けて欲しい', '打撃練習したいから誰かミットもって', '10000', '2022-03-26 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(32, 11, 'アラジン', '男', 'セコンドについて欲しい', '試合のセコンドついて欲しい。', '100000', '2022-04-02 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(33, 12, 'money', '男', 'スパーリングパートナー募集', '来月試合があるから来週くらいにスパーリングしておきたい。だれか相手して欲しい。', '1000000', '2022-03-31 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- テーブルの構造 `patient_table`
--

CREATE TABLE `patient_table` (
  `u_id` int(12) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `sex` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `birthday` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `tel` int(12) NOT NULL,
  `mail` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `pass` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `handlename` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `adl` varchar(12) COLLATE utf8mb4_bin NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `patient_table`
--

INSERT INTO `patient_table` (`u_id`, `name`, `sex`, `birthday`, `address`, `tel`, `mail`, `pass`, `handlename`, `adl`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(11, '白石知之', '男', '19840501', '山口県宇部市厚南中央5丁目10-55-4', 2147483647, 'saoiosyu@gmail.com', '111111', 'アラジン', 'J1', 0, 0, '2022-03-24 22:39:53', '2022-03-24 22:39:53'),
(12, 'チャドメンデス', '男', '19850501', 'アメリカコロラド州', 836222773, 'chad@gmail.com', '222222', 'money', 'C1', 0, 0, '2022-03-24 22:46:04', '2022-03-24 22:46:04');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `appo_table`
--
ALTER TABLE `appo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `nurse_service`
--
ALTER TABLE `nurse_service`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `nurse_table`
--
ALTER TABLE `nurse_table`
  ADD PRIMARY KEY (`n_id`);

--
-- テーブルのインデックス `patient_needs`
--
ALTER TABLE `patient_needs`
  ADD PRIMARY KEY (`needs_id`);

--
-- テーブルのインデックス `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`u_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `appo_table`
--
ALTER TABLE `appo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- テーブルの AUTO_INCREMENT `nurse_service`
--
ALTER TABLE `nurse_service`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- テーブルの AUTO_INCREMENT `nurse_table`
--
ALTER TABLE `nurse_table`
  MODIFY `n_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルの AUTO_INCREMENT `patient_needs`
--
ALTER TABLE `patient_needs`
  MODIFY `needs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- テーブルの AUTO_INCREMENT `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `u_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
