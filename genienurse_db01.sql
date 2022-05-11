-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1:3309
-- 生成日時: 2022-05-11 16:22:19
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
-- データベース: `genienurse_db01`
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
(76, 19, 31, '2022-03-24 22:44:33'),
(77, 20, 30, '2022-05-10 23:21:03'),
(78, 21, 30, '2022-05-10 23:42:08'),
(79, 19, 30, '2022-05-11 01:15:23');

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
(45, 19, 'face_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 'ジーニーナース', 'お薬の説明を致します。', '1000', '現在お飲みになられているお薬がどのような目的か、どのような効果や副作用、注意点があるか説明させていただきます。', 'https://techacademy.jp/magazine/5587', '09082488255', 'saoiosyu@gmail.com', '0000-00-00', 0, '2022-05-10 23:18:32', '2022-05-10 23:18:32'),
(46, 20, 'face_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', '看護部長', '受診に同行します。', '5000', '病院の受診に同行して検査回りの案内や医師の説明をわかりやすく解説させていただきます。', 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '0836211948', 'kkk@gmail.com', '0000-00-00', 0, '2022-05-10 23:20:39', '2022-05-10 23:20:39'),
(47, 21, 'face_upload/20220510162739d41d8cd98f00b204e9800998ecf8427e.jpg', 'ATTケア', '入浴介助させていただきます。', '10000', 'お風呂に入りたい方の入浴のお手伝いをさせていただきます。', 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '0836222773', 'att@gmail.com', '0000-00-00', 0, '2022-05-10 23:41:55', '2022-05-10 23:41:55'),
(48, 21, 'face_upload/20220510162739d41d8cd98f00b204e9800998ecf8427e.jpg', 'ATTケア', '術後ご希望の期間付き添います。', '10000', '専属看護師として、術後の健康管理や身の回りのお世話をさせていただきます。\r\n※料金は10000円/日です。', 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '0836222773', 'att@gmail.com', '0000-00-00', 0, '2022-05-10 23:44:11', '2022-05-10 23:44:11');

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
(20, '末永佳子', '女', '19550101', '山口県宇部市小羽山町広田1-1-1', '0836211948', 'kkk@gmail.com', '222222', 0, 'non', '看護部長', NULL, 0, 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '宇部興産中央病院', 'id_f_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', 'id_b_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', 'face_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', 'license_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 0, '2022-03-24 22:37:46', '2022-03-24 22:37:46'),
(21, '堀口恭司', '男', '19920101', '群馬県', '0836222773', 'att@gmail.com', '111111', 987654321, 'non', 'ATTケア', NULL, 0, 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '', 'id_f_upload/20220510162739d41d8cd98f00b204e9800998ecf8427e.png', 'id_b_upload/20220510162739d41d8cd98f00b204e9800998ecf8427e.jpg', 'face_upload/20220510162739d41d8cd98f00b204e9800998ecf8427e.jpg', 'license_upload/20220510162739d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 0, '2022-05-10 23:27:39', '2022-05-10 23:27:39');

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
(30, 11, 'アラジン', '男', '病院についてきてほしい', '術前説明が明日あるが、医者の言っていることが全然理解できん。同行して解説して欲しい。', '1000000', '2022-03-25 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647);

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- テーブルの AUTO_INCREMENT `nurse_service`
--
ALTER TABLE `nurse_service`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- テーブルの AUTO_INCREMENT `nurse_table`
--
ALTER TABLE `nurse_table`
  MODIFY `n_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
