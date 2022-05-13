-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1:3309
-- 生成日時: 2022-05-13 16:27:07
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
(79, 19, 30, '2022-05-11 01:15:23'),
(80, 19, 42, '2022-05-13 16:24:11'),
(81, 19, 34, '2022-05-13 16:24:13'),
(82, 19, 35, '2022-05-13 16:24:15');

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
  `service_category` varchar(12) COLLATE utf8mb4_bin DEFAULT NULL,
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

INSERT INTO `nurse_service` (`id`, `n_id`, `face_img`, `office_name`, `title`, `reward`, `comment`, `service_category`, `link`, `tel`, `mail`, `time`, `is_deleted`, `created_at`, `updated_at`) VALUES
(46, 20, 'face_upload/20220324143746d41d8cd98f00b204e9800998ecf8427e.jpg', '看護部長', '受診に同行します。', '5000', '病院の受診に同行して検査回りの案内や医師の説明をわかりやすく解説させていただきます。', NULL, 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '0836211948', 'kkk@gmail.com', '0000-00-00', 0, '2022-05-10 23:20:39', '2022-05-10 23:20:39'),
(47, 21, 'face_upload/20220510162739d41d8cd98f00b204e9800998ecf8427e.jpg', 'ATTケア', '入浴介助させていただきます。', '10000', 'お風呂に入りたい方の入浴のお手伝いをさせていただきます。', NULL, 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '0836222773', 'att@gmail.com', '0000-00-00', 0, '2022-05-10 23:41:55', '2022-05-10 23:41:55'),
(48, 21, 'face_upload/20220510162739d41d8cd98f00b204e9800998ecf8427e.jpg', 'ATTケア', '術後ご希望の期間付き添います。', '10000', '専属看護師として、術後の健康管理や身の回りのお世話をさせていただきます。\r\n※料金は10000円/日です。', NULL, 'https://www.youtu.com/channel/UClvWDSieE1xCHf4ooNdw5gQ', '0836222773', 'att@gmail.com', '0000-00-00', 0, '2022-05-10 23:44:11', '2022-05-10 23:44:11'),
(50, 19, 'face_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 'ジーニーナース', '病院の受診に同行します。', '10000', '検査回りなど病院内での案内や医師の病状説明の解説をします。', NULL, 'https://techacademy.jp/magazine/5587', '09082488255', 'saoiosyu@gmail.com', '0000-00-00', 0, '2022-05-12 15:04:56', '2022-05-12 15:04:56'),
(51, 19, 'face_upload/20220324142711d41d8cd98f00b204e9800998ecf8427e.jpg', 'ジーニーナース', 'お買い物に同行します。', '2000', '日用品の買い出しに同行して移動の介助や荷物持ち、健康管理をさせていただきます。\r\n※料金は2000円/時間です。', '外出支援', 'https://techacademy.jp/magazine/5587', '09082488255', 'saoiosyu@gmail.com', '0000-00-00', 0, '2022-05-12 15:40:16', '2022-05-12 15:40:16');

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
  `needs_category` varchar(12) COLLATE utf8mb4_bin DEFAULT NULL,
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

INSERT INTO `patient_needs` (`needs_id`, `u_id`, `handlename`, `sex`, `need_title`, `comment`, `reward`, `deadline`, `needs_category`, `name`, `tel`, `mail`, `is_deleted`, `created_at`, `updated_at`) VALUES
(30, 11, 'アラジン', '男', '病院についてきてほしい', '術前説明が明日あるが、医者の言っていることが全然理解できん。同行して解説して欲しい。', '1000000', '2022-03-25 00:00:00', NULL, '', NULL, 0, 0, 2147483647, 2147483647),
(34, 11, 'アラジン', '男', '入院の準備をしてほしい。', '来月初めて入院します。\r\n何を準備したら良いか分からず、家族も近くにいないため入院してから準備してもらう事ができません。\r\n入院に必要な手続きを含め、日用品の準備を手伝っていただけないでしょうか？', '10000', '2022-06-02 00:00:00', '入院支援', '', NULL, 0, 0, 2147483647, 2147483647),
(35, 13, 'サトちゃん', '男', '独り暮らしの母の様子を見に行ってもらいたい', '出張で7日間、高齢の母を置いて家を空ける事になります。\r\n持病もあり、一週間一人で過ごさせることが不安なので毎日定時に様子を見に行っていただけないでしょうか？\r\n日時は5月21日から7日間です。', '20000', '2022-05-21 00:00:00', '見守り支援', '', NULL, 0, 0, 2147483647, 2147483647),
(36, 13, 'サトちゃん', '男', '手術後、そばで世話をしてほしい。', '来月初めて手術を受けることになりました。\r\n術後どのような状態なのかイメージができず、不安です。\r\n術後3日間そばで身の回りの世話をして欲しいです。', '50000', '2022-06-02 00:00:00', '入院支援', '', NULL, 0, 0, 2147483647, 2147483647),
(37, 13, 'サトちゃん', '男', '術後説明を一緒に聞いて欲しいです。', '来月手術を受けるため手術に向けた事前説明があります。\r\nしかし、医師に話は専門用語が多く、よくわかりません。一緒に説明を聞いて解説していただきたいです。', '3000', '2022-05-25 00:00:00', '受診支援', '', NULL, 0, 0, 2147483647, 2147483647),
(38, 14, 'しぃやん', '女', '温泉旅行に同行して欲しいです。', '家族で温泉旅行に行きたいのですが、普段は寝たきりでベッド上での生活が殆どです。\r\n車椅子に乗って近場に外出する事はありますが、移動には全面的な介助が必要です。\r\n旅行中の移動、食事、入浴、排泄等の日常介助と健康管理をお願いしたいです。', '150000', '2022-06-11 00:00:00', '外泊支援', '', NULL, 0, 0, 2147483647, 2147483647),
(39, 14, 'しぃやん', '女', 'スポーツ少年団の遠征に同行して欲しいです。', '小学5.6粘性のサッカーチームが県外遠征をするのですが、遠征中の怪我や健康不良の対応をお願いしたいです。\r\n期間は6月1日から2日間です。', '30000', '2022-06-01 00:00:00', 'その他', '', NULL, 0, 0, 2147483647, 2147483647),
(40, 14, 'しぃやん', '女', '祖母の通院に同行して欲しい', '高齢の祖母の通院に同行して診察結果などを報告して欲しいです。', '3000', '2022-05-14 00:00:00', '受診支援', '', NULL, 0, 0, 2147483647, 2147483647),
(41, 15, 'ひでじぃ', '男', '通院に同行して欲しい。', '病院の受診についてきて欲しい。', '1000', '2022-06-11 00:00:00', '受診支援', '', NULL, 0, 0, 2147483647, 2147483647),
(42, 15, 'ひでじぃ', '男', '手術の世話をしてほしい', '手術前の準備や術後の身の回りの世話などを術後1週間までしてほしい。', '30000', '2022-06-10 00:00:00', '入院支援', '', NULL, 0, 0, 2147483647, 2147483647);

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
(12, 'チャドメンデス', '男', '19850501', 'アメリカコロラド州', 836222773, 'chad@gmail.com', '222222', 'money', 'C1', 0, 0, '2022-03-24 22:46:04', '2022-03-24 22:46:04'),
(13, '北岡悟', '男', '19800204', '奈良県奈良市', 2147483647, 'satoru@gmail.com', '111111', 'サトちゃん', 'B1', 0, 0, '2022-05-13 12:14:11', '2022-05-13 12:14:11'),
(14, '杉山しずか', '女', '19870211', '神奈川県横浜市', 2147483647, 'sizuka@gmail.com', '111111', 'しぃやん', 'J2', 0, 0, '2022-05-13 12:30:42', '2022-05-13 12:30:42'),
(15, '白石秀樹', '男', '19601101', '山口県山陽小野田市高千帆2丁目31－11', 836830193, 'hideki@gmail.com', '111111', 'ひでじぃ', 'C2', 0, 0, '2022-05-13 12:40:54', '2022-05-13 12:40:54');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- テーブルの AUTO_INCREMENT `nurse_service`
--
ALTER TABLE `nurse_service`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- テーブルの AUTO_INCREMENT `nurse_table`
--
ALTER TABLE `nurse_table`
  MODIFY `n_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- テーブルの AUTO_INCREMENT `patient_needs`
--
ALTER TABLE `patient_needs`
  MODIFY `needs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- テーブルの AUTO_INCREMENT `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `u_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
