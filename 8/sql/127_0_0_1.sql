-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 年 9 朁E24 日 15:48
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
-- テーブルの構造 `enq`
--

CREATE TABLE IF NOT EXISTS `enq` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `enq`
--

INSERT INTO `enq` (`id`, `name`, `email`, `age`, `create_date`, `update_date`) VALUES
(1, 'suganuma', 'aaa@bbb.com', 3, '2015-09-20 00:43:50', '2015-09-20 00:43:50');

-- --------------------------------------------------------

--
-- テーブルの構造 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `news_detail` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `show_flg` int(11) NOT NULL,
  `author` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_detail`, `show_flg`, `author`, `create_date`, `update_date`) VALUES
(1, 'デビュー戦で決勝弾の横浜FM FW富樫「まさかこうなるとは」', '相性の良さを感じていたという。昨年9月14日に行われていたFC東京との練習試合で、横浜F・マリノスのFW富樫敬真はヘディングからゴールを決めていた。このゴールが決勝点となり、チームは勝利していたこともあり「出たらもう一回、同じことが起こるかもと、軽い期待はしていました。でも、まさかこうなるとは」と、笑顔を見せた。', 1, 'サトウ', '2015-09-20 01:09:24', '2015-09-20 01:09:24');

-- --------------------------------------------------------

--
-- テーブルの構造 `news_count`
--

CREATE TABLE IF NOT EXISTS `news_count` (
  `news_id` int(11) NOT NULL,
  `news_pv` int(11) NOT NULL,
  `news_session` int(11) NOT NULL,
  `news_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `news_count`
--

INSERT INTO `news_count` (`news_id`, `news_pv`, `news_session`, `news_user`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0),
(3, 0, 0, 0),
(4, 0, 0, 0),
(5, 0, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `news_img`
--

CREATE TABLE IF NOT EXISTS `news_img` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `news_img`
--

INSERT INTO `news_img` (`img_id`, `img_name`) VALUES
(1, 'img_1.jpg'),
(2, 'img_2.jpg'),
(3, 'img_3.jpg'),
(4, 'img_4.jpg'),
(5, 'img_5.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `news_main`
--

CREATE TABLE IF NOT EXISTS `news_main` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `news_detail` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `category_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `author_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `img_id` int(11) NOT NULL,
  `show_flg` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `news_main`
--

INSERT INTO `news_main` (`news_id`, `news_title`, `news_detail`, `category_name`, `author_name`, `img_id`, `show_flg`, `create_date`, `update_date`) VALUES
(1, '山内晶大「若手らしく勢いや雰囲気をつくりたい」＝バレーＷ杯男子', 'バレーボール男子のワールドカップ（Ｗ杯）は２１日に第９戦が代々木第一体育館などで行われ、日本はアルゼンチンに０－３（２４－２６、２２－２５、２１－２５）のストレートで敗れた。４敗目を喫した日本は３位以下が確定。今大会でのリオ五輪出場権獲得はならなかった。', 'バレーボール', 'サトウ', 1, 1, '2015-09-21 12:27:32', '2015-09-21 12:27:32'),
(2, 'J1第2ステージ第11節の走行距離&スプリント数を発表', 'Jリーグは19日と20日に行われたJ1第2ステージ第11節の全9試合でトラッキングシステムにより取得したデータから選手の走行距離などを発表した。\r\n\r\n 　Jリーグによると、9試合で最も走行距離が長かったチームは、アルビレックス新潟で116.04km。2位は横浜F・マリノスで114.57km、3位はサガン鳥栖で113.93kmだった。逆に最も走行距離が短かったのは、名古屋グランパスで101.02kmだった。', 'Jリーグ', 'タナカ', 2, 1, '2015-09-20 12:27:32', '2015-09-20 12:27:32'),
(3, 'マルドナド「バトンに当てられてレースが台無しに」ロータス日曜コメント', '2015年F1シンガポールGPの日曜決勝で、ロータスのロマン・グロージャンは13位、パストール・マルドナドは12位だった。\r\nパストール・マルドナド　決勝＝12位\r\n 「本当に難しいレースだった。マクラーレンから受けた接触は軽いものだったけれど、それでもディフューザーが壊れた」\r\n\r\n 「僕はイン側でポジションを守ろうとしていた。ジェンソンがどこで僕を抜こうとしていたのかは知らない。でも接触が起きた場所はすごく狭いコーナーだ。オーバーテイクするなんて無理だった」', 'F1', 'サトウ', 3, 1, '2015-09-19 12:27:32', '2015-09-19 12:27:32'),
(4, '柳田将洋「レセプションが安定しなかった」＝バレーＷ杯男子', 'バレーボール男子のワールドカップ（Ｗ杯）は２１日に第９戦が代々木第一体育館などで行われ、日本はアルゼンチンに０－３（２４－２６、２２－２５、２１－２５）のストレートで敗れた。４敗目を喫した日本は３位以下が確定。今大会でのリオ五輪出場権獲得はならなかった。\n\n 　以下は、試合後の柳田将洋（サントリー）のコメント。\n\n 「サイドアウトの取り合いになると言われていた中で、僕のレセプションが安定せず連続得点を与えてしまったケースが多かったと思います。サーブはまあまあ入って、ブレイクを取れていたので明日につなげたいですが、レセプションの面はまず気持ちの面で前向きに、ポジティブに攻められるようなパスが返せればいいなと思います」', 'バレーボール', 'タナカ', 4, 1, '2015-09-18 12:27:32', '2015-09-18 12:27:32'),
(5, 'ATPワールドツアー・ファイナル', '男子テニスツアーのATPワールドツアー・ファイナル（イギリス/ロンドン、ハード）の出場権をかけた「RACE TO LONDON」（最終戦出場ランキング）が21日に発表され、20日まで行われていたデビスカップに日本代表として出場していた錦織圭（日本）は、前回と変わらず6位となった。', 'テニス', 'サトウ', 5, 1, '2015-09-17 12:27:32', '2015-09-17 12:27:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enq`
--
ALTER TABLE `enq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_count`
--
ALTER TABLE `news_count`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_img`
--
ALTER TABLE `news_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `news_main`
--
ALTER TABLE `news_main`
  ADD PRIMARY KEY (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_count`
--
ALTER TABLE `news_count`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news_img`
--
ALTER TABLE `news_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news_main`
--
ALTER TABLE `news_main`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
