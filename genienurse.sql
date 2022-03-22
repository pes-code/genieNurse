-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-02-23 18:42:50
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
-- データベース: `genienurse`
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
(22, 17, 13, '2022-02-21 04:54:39'),
(24, 17, 14, '2022-02-21 05:02:14'),
(25, 17, 15, '2022-02-21 05:02:16'),
(29, 18, 15, '2022-02-21 22:47:25'),
(30, 18, 14, '2022-02-21 22:47:29'),
(52, 16, 14, '2022-02-22 19:04:35'),
(66, 16, 15, '2022-02-23 00:22:41'),
(68, 16, 13, '2022-02-23 00:50:18'),
(70, 16, 0, '2022-02-23 22:11:36'),
(71, 16, 29, '2022-02-23 22:23:04');

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
(31, 16, 'face_upload/20220218155730d41d8cd98f00b204e9800998ecf8427e.jpg', 'genieNurse', '旅行に同行します', '10000', '旅行に同行して介護や必要な健康管理を行ないます。', 'https://www.youtube.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '09082488255', 'saoiosyu@gmail.com', '0000-00-00', 0, '2022-02-18 23:58:58', '2022-02-18 23:58:58'),
(32, 16, 'face_upload/20220218155730d41d8cd98f00b204e9800998ecf8427e.jpg', 'genieNurse', '通院に同行します', '10000', '通院に同行して医師の説明を解説します。', 'https://www.youtube.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '09082488255', 'saoiosyu@gmail.com', '0000-00-00', 0, '2022-02-19 00:00:37', '2022-02-19 00:00:37'),
(33, 17, 'face_upload/20220218171631d41d8cd98f00b204e9800998ecf8427e.png', 'ベラトールチャンピオン', '技術セミナーします', '10000', '空手の踏み込み技術をレクチャーします。', 'https://techacademy.jp/magazine/5587', '0836222773', 'att@gmail.com', '0000-00-00', 0, '2022-02-19 01:17:27', '2022-02-19 01:17:27'),
(35, 18, 'face_upload/20220221144506d41d8cd98f00b204e9800998ecf8427e.png', 'UFCチャンピオン', '豪邸に招待します', '10000', '豪邸に招待します。', 'https://techacademy.jp/magazine/5587', '012345', 'money@gmail.com', '0000-00-00', 0, '2022-02-21 22:45:36', '2022-02-21 22:45:36'),
(36, 18, 'face_upload/20220221144506d41d8cd98f00b204e9800998ecf8427e.png', 'UFCチャンピオン', '技術レクチャーします', '10000', '打撃の技術指導します。', 'https://techacademy.jp/magazine/5587', '012345', 'money@gmail.com', '0000-00-00', 0, '2022-02-21 22:47:13', '2022-02-21 22:47:13'),
(37, 16, 'face_upload/20220218160409f4d166f084547291f82849b0b41f6730.jpg', 'genieNurse', 'アマ修支援します', '20000', 'アマチュア修斗に出場支援します。', 'https://www.youtube.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '09082488255', 'saoiosyu@gmail.com', '0000-00-00', 0, '2022-02-22 08:21:21', '2022-02-22 08:21:21');

-- --------------------------------------------------------

--
-- テーブルの構造 `nurse_table`
--

CREATE TABLE `nurse_table` (
  `n_id` int(12) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `sex` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `birthday` date NOT NULL,
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
(16, '白石知之', 'Ma', '1984-05-01', '山口県宇部市', '09082488255', 'saoiosyu@gmail.com', '111111', 1234567890, 'JSMNC', 'genieNurse', NULL, 0, 'https://www.youtube.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '願いを叶えます。', 'id_f_upload/20220218155730d41d8cd98f00b204e9800998ecf8427e.png', 'id_b_upload/20220218155730d41d8cd98f00b204e9800998ecf8427e.png', 'face_upload/20220218160409f4d166f084547291f82849b0b41f6730.jpg', 'license_upload/20220218155730d41d8cd98f00b204e9800998ecf8427e.png', 1, 0, '2022-02-18 23:57:30', '2022-02-19 00:04:09'),
(17, '堀口恭司', 'Ma', '1990-01-01', '群馬県××市○○町00番地', '0836222773', 'att@gmail.com', '111111', 0, 'cns', 'ベラトールチャンピオン', NULL, 0, 'https://techacademy.jp/magazine/5587', 'ベラトールチャンピオンに返り咲きます。', 'id_f_upload/20220218171631d41d8cd98f00b204e9800998ecf8427e.png', 'id_b_upload/20220218171631d41d8cd98f00b204e9800998ecf8427e.png', 'face_upload/20220218171631d41d8cd98f00b204e9800998ecf8427e.png', 'license_upload/20220218171631d41d8cd98f00b204e9800998ecf8427e.jpg', 0, 0, '2022-02-19 01:16:31', '2022-02-19 01:16:31'),
(18, 'コナーマクレガー', 'Ma', '2022-02-16', 'アメリカ', '012345', 'money@gmail.com', '222222', 987654321, 'non', 'UFCチャンピオン', NULL, 0, 'https://techacademy.jp/magazine/5587', 'aaaaaaaaaaa', 'id_f_upload/20220221144506d41d8cd98f00b204e9800998ecf8427e.png', 'id_b_upload/20220221144506d41d8cd98f00b204e9800998ecf8427e.png', 'face_upload/20220221144506d41d8cd98f00b204e9800998ecf8427e.png', 'license_upload/20220221144506d41d8cd98f00b204e9800998ecf8427e.png', 0, 0, '2022-02-21 22:45:06', '2022-02-21 22:45:06');

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
(13, 9, 'アラジン', 'Ma', '病院についてきてほしい', '来月鼻骨の手術をする事になりました。\r\n今週末に手術説明があるのですが、先生の説明が難しく、良く分かりません。\r\n手術説明に同行して先生の説明を解説して欲しいです。', '10000円', '2022-02-26 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(14, 10, 'キョージ', 'Ma', 'セコンドについて欲しい', 'ベラトール再起戦でカットマンとタイムキーパーを募集しています。', '100000円', '2022-03-12 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(15, 9, 'アラジン', 'Ma', '病院についてきてほしい', '来月しゅ', '10000', '2022-02-19 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(18, 9, 'アラジン', 'Ma', 'kkkkkk', 'あいうえお', '10000', '2022-03-07 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(19, 9, 'アラジン', 'Ma', '病院についてきてほしい', 'っｐｐｐｐｐｐｐｐｐ', '100000000000', '2022-02-01 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(21, 9, 'アラジン', 'Ma', 'ミットを受けて欲しい', '打撃のミットを3分×3ラウンドもって欲しい。\r\n', '500', '2022-02-22 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(22, 9, 'アラジン', 'Ma', 'APPOボタンを実装してくれ', 'なんや知らんが、appoボタンができんくなった。\r\nなんとかしてくれー', '1000', '2022-02-22 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(23, 9, 'アラジン', 'Ma', '今日中にappo者の表示までしたいのに', 'やばいやばいやばい', '1000', '2022-02-26 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(26, 9, 'アラジン', 'Ma', 'ミスった。', 'varせないかんやんけ', '500', '2022-02-22 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(28, 9, 'アラジン', 'Ma', 'APPOボタンを実装してくれ', 'appoボタン集計を実装しようとするとneeds_idが取得できない。。。', '12', '2022-02-22 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647),
(29, 9, 'アラジン', 'Ma', 'APPOボタンを実装してくれ', 'ｐｐｐｐｐｐっｐｐｐｐｐっｐｐ', '555', '2022-02-23 00:00:00', '', NULL, 0, 0, 2147483647, 2147483647);

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
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `patient_table`
--

INSERT INTO `patient_table` (`u_id`, `name`, `sex`, `birthday`, `address`, `tel`, `mail`, `pass`, `handlename`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(9, '白石知之', 'Ma', '1984-05-01', '山口県宇部市', 2147483647, 'saoiosyu@gmail.com', '111111', 'アラジン', 0, 0, '2022-02-19 00:17:52', '2022-02-19 00:17:52'),
(10, '堀口恭司', 'Ma', '2010-01-01', '群馬県', 836222773, 'att@gmail.com', '111111', 'キョージ', 0, 0, '2022-02-19 01:19:44', '2022-02-19 01:19:44');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- テーブルの AUTO_INCREMENT `nurse_service`
--
ALTER TABLE `nurse_service`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- テーブルの AUTO_INCREMENT `nurse_table`
--
ALTER TABLE `nurse_table`
  MODIFY `n_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- テーブルの AUTO_INCREMENT `patient_needs`
--
ALTER TABLE `patient_needs`
  MODIFY `needs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- テーブルの AUTO_INCREMENT `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `u_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
