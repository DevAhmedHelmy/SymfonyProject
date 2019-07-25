-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2019 at 04:26 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-8+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SymfonyProject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `product_id`, `cart_id`, `quantity`) VALUES
(5, 1, 1, 2),
(6, 1, 1, 1),
(7, 1, 1, 1),
(8, 1, 1, 1),
(9, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart_shopping`
--

CREATE TABLE `cart_shopping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_shopping`
--

INSERT INTO `cart_shopping` (`id`, `user_id`, `total_price`) VALUES
(1, 31, 42750);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(5, 'Raul Block', 'Minima non repellendus deserunt illum nostrum. Eaque illo soluta quisquam non et voluptatem aut. Voluptas neque voluptatem qui consequatur ut suscipit consequatur.'),
(6, 'Donny Bailey', 'Qui soluta nisi voluptatibus minus id nisi soluta. Voluptatem ut voluptatem recusandae facilis. Iusto adipisci ratione deserunt et.'),
(7, 'Jarrod Hayes', 'Sit inventore harum iste excepturi. Et optio sapiente quod officia sint. Aspernatur qui magni quidem quo dolore fuga.'),
(8, 'Robbie Schiller', 'Ea iusto eum odio qui eum. Veniam ut repellat modi eum iusto veniam. Blanditiis sint veritatis ab quibusdam optio accusamus.'),
(9, 'Ms. Ettie Schulist', 'Itaque voluptatem itaque ipsum architecto. Commodi aut architecto sint vitae quis fuga. In doloremque cupiditate voluptate ut iste. Aut consequatur iusto minus aperiam adipisci officiis quis.'),
(10, 'Gabrielle Pouros', 'Saepe et possimus explicabo voluptates sunt. Nihil ea sit at neque rerum voluptas. Porro aliquid ipsam doloremque consectetur. Explicabo dolor molestiae fugit iure et non sed.'),
(11, 'Idella Abshire', 'Repudiandae vel eligendi reprehenderit maxime fugit et omnis facilis. Distinctio omnis et expedita voluptates. Suscipit rem aut autem autem. Sed totam ea labore.'),
(12, 'Miss Susanna Considine', 'Veniam voluptates ut non inventore. Voluptas ut labore iste aliquam officia alias architecto. Perspiciatis dolorem omnis sed expedita est minus molestiae. Minima minima fugit repellat incidunt aut.'),
(13, 'Mr. Chesley Becker DDS', 'Aperiam aut mollitia quia. Et quas placeat veritatis. Reiciendis nisi iste reiciendis sapiente quis esse laudantium.'),
(14, 'Hector Kohler Jr.', 'Incidunt voluptas animi nihil ratione aut iure consequatur. Omnis quod adipisci voluptas ab at mollitia commodi. Quam quia autem temporibus hic id perferendis facere.'),
(15, 'Dr. Minerva Hamill Jr.', 'Quibusdam vero nesciunt ut culpa modi et. Dolor asperiores nostrum ipsam sunt. Sit minus non distinctio alias et.'),
(16, 'Katlyn Franecki', 'Ut quos ea illum odio quibusdam. Vitae molestiae inventore magnam quaerat quibusdam. Qui qui tempore porro id nam. Veritatis iure aut iste dolorum odio. Et iusto vel reiciendis ipsa.'),
(17, 'Austin Cronin', 'Possimus earum repellendus qui rerum dolor fuga officiis molestias. Sit quae necessitatibus quia natus.'),
(18, 'Kelli Rempel', 'Dolores nisi occaecati aut deleniti at. Accusamus ut voluptas et incidunt autem est enim fugit.'),
(19, 'Lee Wisoky Sr.', 'Quis recusandae dolorem fugiat delectus eos est eum. Voluptatem quia at maiores dolores voluptatem voluptas. Esse est est quia iure eius.'),
(20, 'Ally Nolan', 'Accusantium placeat et iusto distinctio. Et amet qui exercitationem culpa nostrum quas. Et corporis ipsam optio placeat et.'),
(21, 'Hal Schulist', 'Eaque molestias inventore asperiores unde odit aut. Similique quia voluptatem aperiam et sed iusto. Amet quia beatae nihil dicta iste quod velit.'),
(22, 'Freida Gaylord II', 'Sint eos consequuntur possimus magnam natus modi. Necessitatibus temporibus quod repellendus vel. Aliquid qui voluptatem iusto eos impedit. Sit maiores aliquid quo est est et.'),
(23, 'Sally Stamm II', 'Sit voluptates sed dolorem et corporis sed. Sapiente voluptatem et sunt autem veniam sapiente sit molestiae. Tempore enim quas possimus expedita voluptas qui. Error ullam sed possimus fuga quisquam.'),
(24, 'Prof. Marquise Stamm', 'In et officia quam accusamus. Corporis consectetur laudantium beatae et et. Ducimus totam minima et voluptatibus fugiat architecto. Est autem quaerat nostrum nobis voluptas corrupti dolor.');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190719204212', '2019-07-21 11:20:09'),
('20190719204634', '2019-07-21 11:20:09'),
('20190721112429', '2019-07-21 11:24:36'),
('20190721121140', '2019-07-21 12:12:36'),
('20190721122025', '2019-07-21 12:20:29'),
('20190721144821', '2019-07-21 14:48:44'),
('20190721162206', '2019-07-21 16:22:14'),
('20190722030505', '2019-07-22 03:05:48'),
('20190722030653', '2019-07-22 03:06:58'),
('20190722031850', '2019-07-22 03:18:55'),
('20190722032324', '2019-07-22 03:23:28'),
('20190722223634', '2019-07-22 22:36:42'),
('20190723005200', '2019-07-23 00:52:07'),
('20190723005257', '2019-07-23 00:53:00'),
('20190723005359', '2019-07-23 00:54:02'),
('20190723122816', '2019-07-23 12:28:32'),
('20190723124911', '2019-07-23 12:49:17'),
('20190723125930', '2019-07-23 12:59:35'),
('20190723131114', '2019-07-23 13:11:18'),
('20190723131540', '2019-07-23 13:15:43'),
('20190723231219', '2019-07-23 23:12:25'),
('20190724130839', '2019-07-24 13:08:45'),
('20190724131545', '2019-07-24 13:16:05'),
('20190724132133', '2019-07-24 13:21:38'),
('20190724144542', '2019-07-24 14:45:46'),
('20190724144655', '2019-07-24 14:50:01'),
('20190724211642', '2019-07-24 21:16:50'),
('20190724212233', '2019-07-24 21:22:39'),
('20190724212356', '2019-07-24 21:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`) VALUES
(4, 31),
(5, 31),
(6, 31);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` double NOT NULL,
  `sale_price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `purchase_price`, `sale_price`, `stock`, `image`, `category_id_id`) VALUES
(1, 'tv', 'iyhfh', 120, 150, 10, 'whgw2Vc5DJql_1506574240.jpg', 21),
(2, 'mobile', 'iphone', 20000, 21000, 1, 'rf9sj0ktl5oy-1506475203-5d37d823c66f8.jpeg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `product_id`, `orders_id`, `price`, `quantity`) VALUES
(1, 1, 4, 750, 1),
(2, 2, 5, 21600, 7),
(3, 2, 6, 42750, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `address`, `phone`, `image`, `first_name`, `password`) VALUES
(17, 'spacebar0@example.com', '[]', '400 Haskell Junction', '234-292-1322 x81119', 'https://lorempixel.com/640/480/?56631', 'Zackery', '$2y$13$YksHQ5VRZRmKZx9aDozRjuad3yBGd52I7tk.IWD0rSvkNv0Ng0oja'),
(18, 'spacebar1@example.com', '[]', '2802 Maximilian Stream Suite 116', '+13015426718', 'https://lorempixel.com/640/480/?14622', 'Otha', '$2y$13$OEIn34HqvIvpxpjsWUV4PuhMn.LXBLpGvkA4VYG6Ar163PFDuzzLi'),
(20, 'spacebar3@example.com', '[]', '37454 Halvorson Highway', '1-635-630-5206 x63940', 'https://lorempixel.com/640/480/?51841', 'Clay', '$2y$13$YBGOhearS3V2xzNIxZGZsOG/LtZ4vq8Wciq.IdfGRw9I8VXlOWYsy'),
(21, 'spacebar4@example.com', '[]', '175 Kassulke Stream Apt. 590', '(890) 704-4090 x9839', 'https://lorempixel.com/640/480/?17769', 'Rosemary', '$2y$13$IA2JpHXDifkH7xW7J74Y5u9g4XoTy0kiYj9Y6pRnXarV9tXOIB00e'),
(22, 'spacebar5@example.com', '[]', '30203 Corkery Isle', '891.302.0693 x44926', 'https://lorempixel.com/640/480/?15665', 'Addison', '$2y$13$yF.sESVn3b8inXcAnGvlGe2aEIUuCQWH4oO5hXoVjsoA4HP3Jw/GS'),
(23, 'spacebar6@example.com', '[]', '8978 Michelle View Suite 564', '+1-973-589-9522', 'https://lorempixel.com/640/480/?72859', 'Jettie', '$2y$13$UCHZaKJkLOrrxyVXGSWnCeGTe22quTDx1hmZYuhQLEzX9uEo41NVi'),
(24, 'spacebar7@example.com', '[]', '4000 Johnpaul Loop', '(876) 658-5747 x129', 'https://lorempixel.com/640/480/?53552', 'Frieda', '$2y$13$BzG1Qa0pYznWRlcLIb5Z8OydMki/53acnqNVit102QiVA9aIEg2lW'),
(25, 'spacebar8@example.com', '[]', '8092 Madge Plaza Suite 995', '480.882.7908 x08860', 'https://lorempixel.com/640/480/?23341', 'Giovanni', '$2y$13$Qn9t2C0MTrfy6ZVIZzmEJueQJQETM54n6Qt3TS4qqjD1W0.2qz896'),
(26, 'spacebar9@example.com', '[]', '2758 Berenice Summit', '1-849-787-7170 x241', 'https://lorempixel.com/640/480/?34289', 'Hester', '$2y$13$MCqkJsOMxahxesfhHwMJyegsZ5Is7DkoNsc98IZxRzlTdYPrncQhi'),
(27, 'admin0@thespacebar.com', '["ROLE_ADMIN"]', '93419 Medhurst Village', '(870) 374-6413 x002', 'https://lorempixel.com/640/480/?25265', 'Rico', '$2y$13$bzxMAI9x6.GJpY/lGu4ZAOESCiduX6JH46aeFwNQ2Us4oYv3PlxVO'),
(28, 'admin1@thespacebar.com', '["ROLE_ADMIN"]', '214 Alivia Village', '813.500.4907 x98587', 'https://lorempixel.com/640/480/?42958', 'Emie', '$2y$13$7vz6rfxmmHf.SmmLx9n7ae55TKfDoVR129biXwQEnrvOnf.HUiGAa'),
(29, 'admin2@thespacebar.com', '["ROLE_ADMIN"]', '4574 Cremin Green', '1-584-614-5187 x9260', 'https://lorempixel.com/640/480/?99683', 'Tia', '$2y$13$LWLHSoYTjs5zws0on.mcm.vvQhIUg.zKn69H.geL6pV1qA847b0/i'),
(30, 'admin@admin.com', '[]', 'Giza', '1143388949', 'whgw2Vc5DJql_1506574240.jpg', 'sayed', '$2y$13$1jsiC.iTZNHzaSkeuHyjc.366MzeffTQNa52r72j6PyexHEhVNU1u'),
(31, 'admin@app.com', '["ROLE_ADMIN"]', 'Giza', '1143388949', 'KEUl3SMhdyVG_1503783670.jpg', 'ahmed Helmy', '$2y$13$QgWig4JPFqq409r2pwwpweMLX0LKM23ThxUoPDhUOzjgvQ37JCpYa'),
(32, 'helmyahmed248@gmail.com', '[]', 'Giza', '01143388949', 'd74bqhbcgqim-1503774858-5d399e26c50a6.jpeg', 'Ahmed Helmy', '$2y$13$pQdkisZfrq2UrKfBNLwBKewqrh13mw0zdT4uPG7sdjW1/8bK7SSXq'),
(33, 'helmyahmed2019@gmail.com', '["ROLE_ADMIN"]', 'Giza', '01143388949', '14519812-590351077834357-2497162742903265818-n-5d399fc711f5d.jpeg', 'Dev Ahmed', '$2y$13$tP7ngIYH1aoxQ8pQuVbj3e1ZxU7mGrSHnLIQh/n69/se/vUKyhbAi'),
(34, 'ahmed2017@gmail.com', '["ROLE_USER"]', 'haram', '01061353023', 'bsotkjnf9tty-1506976176-5d39a6f84b421.jpeg', 'ahmed', '$2y$13$MEnIh2cbt74k.ZSCa3eOL.WBEMEtiKIN0wFq.G6uVaP8Xtze7jeyu'),
(35, 'super_admin@app.com', '["ROLE_USER"]', 'Giza', '1143388949', 'd74bqhbcgqim-1503774858-5d39a8e6839f3.jpeg', 'sayed ahmed', '$2y$13$vnYt78wSnGtQcU01jJCK9O69vzO8BRsS8wRLeoGg/uLhon2vZBFha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BEF484454584665A` (`product_id`),
  ADD KEY `IDX_BEF484451AD5CDBF` (`cart_id`);

--
-- Indexes for table `cart_shopping`
--
ALTER TABLE `cart_shopping`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_65DABB52A76ED395` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E52FFDEEA76ED395` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD9777D11E` (`category_id_id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8753BC4A4584665A` (`product_id`),
  ADD KEY `IDX_8753BC4ACFFE9AD6` (`orders_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cart_shopping`
--
ALTER TABLE `cart_shopping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `FK_BEF484451AD5CDBF` FOREIGN KEY (`cart_id`) REFERENCES `cart_shopping` (`id`),
  ADD CONSTRAINT `FK_BEF484454584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `cart_shopping`
--
ALTER TABLE `cart_shopping`
  ADD CONSTRAINT `FK_65DABB52A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_E52FFDEEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD9777D11E` FOREIGN KEY (`category_id_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `FK_8753BC4A4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_8753BC4ACFFE9AD6` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
