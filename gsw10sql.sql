-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2025-07-25 12:35:23
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsw10`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `german_words`
--

CREATE TABLE `german_words` (
  `id` int(11) NOT NULL,
  `word` varchar(255) NOT NULL,
  `meaning` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `checked` tinyint(1) DEFAULT NULL,
  `correct_count` int(11) DEFAULT NULL,
  `wrong_count` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `german_words`
--

INSERT INTO `german_words` (`id`, `word`, `meaning`, `comment`, `date`, `checked`, `correct_count`, `wrong_count`, `user_id`) VALUES
(8, 'gestern', '昨日', '', '2025-07-10 18:40:09', 1, NULL, NULL, 4),
(9, 'danke', 'ありがとう', '', '2025-07-12 17:03:27', 0, NULL, NULL, 5),
(10, 'ich', 'わたし', '', '2025-07-12 17:03:39', 0, NULL, NULL, 6),
(11, 'gern', '好き', '', '2025-07-12 17:03:51', 0, NULL, NULL, 4),
(12, 'fahre', '行く', 'のりもの', '2025-07-12 17:04:03', 0, NULL, NULL, 5),
(13, 'heute', '今日', '', '2025-07-12 17:04:56', 0, NULL, NULL, 6),
(14, 'Guten Tag', 'こんにちは！', '', '2025-07-12 17:05:30', 1, NULL, NULL, 6),
(15, 'machen', 'する', '代動詞', '2025-07-12 17:17:38', 1, NULL, NULL, 5),
(16, 'Auto', '車', '中性名詞', '2025-07-13 17:54:41', 0, NULL, NULL, 4),
(17, 'aaa', 'ddd', '', '2025-07-13 18:37:47', 0, NULL, NULL, 4),
(19, 'lerne', '学ぶ', '規則動詞', '2025-07-21 17:34:49', 1, NULL, NULL, 5),
(20, 'hatte', '持った', '過去形', '2025-07-23 23:48:20', NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `userid` varchar(128) NOT NULL,
  `userpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL,
  `level` int(255) NOT NULL,
  `streak` mediumint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `userid`, `userpw`, `kanri_flg`, `life_flg`, `level`, `streak`) VALUES
(1, '管理者1', 'admin1', 'admin1', 1, 0, 1, 1),
(2, '管理者2', 'admin2', 'admin2', 1, 0, 1, 1),
(3, '管理者3', 'admin3', 'admin3', 1, 1, 1, 1),
(4, '利用者1', 'test1', 'test1', 0, 0, 12, 345),
(5, '利用者2', 'test2', 'test2', 0, 0, 66, 88),
(6, '利用者3', 'test3', 'test3', 0, 1, 1729, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `mistake_table`
--

CREATE TABLE `mistake_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `word_id` int(11) NOT NULL,
  `mistake_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `german_words`
--
ALTER TABLE `german_words`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `mistake_table`
--
ALTER TABLE `mistake_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `german_words`
--
ALTER TABLE `german_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `mistake_table`
--
ALTER TABLE `mistake_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
