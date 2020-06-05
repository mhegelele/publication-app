-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 09:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nimr_publication`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `au_id` int(11) NOT NULL,
  `au` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `institution` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`au_id`, `au`, `p_id`, `firstname`, `middlename`, `surname`, `role`, `institution`) VALUES
(145, 0, 55, 'Ndekya', 'Maria', 'Oriyo', 'Co', NULL),
(148, 0, 57, 'Alice', 'Jonathan', 'Mtarubukwa', 'First', 'MUHIMBILI'),
(149, 0, 57, 'Alice', 'Jonathan', 'Mtarubukwa', 'Co Author', 'NIMR TANGA');

-- --------------------------------------------------------

--
-- Table structure for table `centres`
--

CREATE TABLE `centres` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centres`
--

INSERT INTO `centres` (`id`, `c_name`) VALUES
(1, 'AMANI'),
(2, 'MBEYA'),
(3, 'MUHIMBILI'),
(4, 'MWANZA'),
(5, 'NGONGONGARE'),
(6, 'TABORA'),
(7, 'TANGA'),
(8, 'TUKUYU'),
(9, 'HEADQUATERS');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `p_id` int(11) NOT NULL,
  `citation` text DEFAULT NULL,
  `abstract` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `pub_year` varchar(50) DEFAULT NULL,
  `pub_type` varchar(255) DEFAULT NULL,
  `researchArea` varchar(255) DEFAULT NULL,
  `journal` text DEFAULT NULL,
  `volume` varchar(200) DEFAULT NULL,
  `startpage` varchar(200) DEFAULT NULL,
  `endpage` varchar(200) DEFAULT NULL,
  `doi` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `uploader` int(11) NOT NULL,
  `uploadedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `approvedDate` date DEFAULT NULL,
  `approvedBy` int(10) DEFAULT NULL,
  `centre` int(11) DEFAULT NULL,
  `issue` varchar(200) DEFAULT NULL,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`p_id`, `citation`, `abstract`, `title`, `pub_year`, `pub_type`, `researchArea`, `journal`, `volume`, `startpage`, `endpage`, `doi`, `contact`, `uploader`, `uploadedDate`, `status`, `approvedDate`, `approvedBy`, `centre`, `issue`, `link`) VALUES
(55, 'Shija AE, Rumisha SF, Oriyo NM, Kilima SP, Massaga JJ. Effect of Moringa Oleifera leaf powder supplementation on reducing anemia in children below two years in Kisarawe District, Tanzania. Food Sci Nutr. 2019 Jul 4;7(8):2584-2594. doi: 10.1002/fsn3.1110. eCollection 2019 Aug. PubMed PMID: 31428346; PubMed Central PMCID: PMC6694432.', 'Anemia is a nutritional disorder that affects mostly children below 2 years and is mainly contributed by iron deficiency. Moringa oleifera leaves are rich in iron and other essential nutrients necessary for iron metabolism. We investigated the effect of M. oleifera leaf powder supplementation on reducing anemia among children below 2 years. A community-based interventional study was conducted that enrolled 95 anemic children who were followed for 6 months. The intervention communities received M. oleifera leaf powder and nutrition education, while control communities only received nutrition education. Changes on mean hemoglobin (Hb) concentration and anemia prevalence were compared between the two groups using t test and proportional test where appropriate. At baseline, the mean Hb concentrations of control and intervention groups were 7.9 g/dl? (SD = 1.3) and 8.3 g/dl (SD = 1.6) g/L, respectively (p-value = 0.0943). After 6 months, anemia prevalence significantly decreased in the intervention group by 53.6% (100%-46.4%; p < 0.001) compared to 13.6% (100%-86.4%; p = 0.005) in control community. The mean Hb was 10.9 g/dl (95% CI: 10.2-11.4) for intervention and 9.4 g/dl (95% 7.8-10.1) for control (p-value = 0.002). The effect was also observed in the reduction of the prevalence of moderate and severe anemia in the intervention communities by 68.2% and 77.9%, respectively, and by 23.3% and 56.9%, respectively, in the control communities. Increasing amount and time of using M. oleifera supplementation resulted to significant reduction in anemia cases therefore can be used as complementary solution in addressing anemia among children especially when the use of infant formulas and fortified food product is very poor.', 'Effect of Moringa Oleifera leaf powder supplementation on reducing anemia in children below two years in Kisarawe District, Tanzania', '2019', '1', '7', 'Food Science and Nutrition', '7', '2584', '2594', '10.1002/fsn3.1110', NULL, 13, '2020-05-18 11:15:15', 'pending', NULL, NULL, 9, '8', 'https://www.ncbi.nlm.nih.gov/pubmed/31428346');

-- --------------------------------------------------------

--
-- Table structure for table `publication_types`
--

CREATE TABLE `publication_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication_types`
--

INSERT INTO `publication_types` (`id`, `type`) VALUES
(1, 'Journal Article'),
(2, 'Book'),
(3, 'Book Section'),
(4, 'Technical Report'),
(5, 'Policy Brief'),
(6, 'Research Summary');

-- --------------------------------------------------------

--
-- Table structure for table `research_area`
--

CREATE TABLE `research_area` (
  `id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research_area`
--

INSERT INTO `research_area` (`id`, `area`) VALUES
(1, 'Malaria'),
(2, 'HIV/AIDS'),
(3, 'Health System'),
(4, 'Tuberculosis'),
(5, 'Non-Communicable Diseases and Injuries (NCDI)'),
(6, 'Neglected Tropical Diseases (NTD)'),
(7, 'Reproductive, Maternal, Neonatal, Child and Adolescent Health (RMNCAH)'),
(8, 'One Health'),
(9, 'Zoonoses'),
(10, 'Entomology and Insect Vectors'),
(11, 'Antimicrobial Resistance (AMR)'),
(12, 'Social Determinants for Health'),
(13, 'Nutrition'),
(14, 'Other Communicable Diseases'),
(15, 'Water and Sanitation Hygiene (WASH)'),
(16, 'Traditional and Alternative Medicine Research'),
(17, 'Digital Health Technologies'),
(27, 'Emerging and re-emerging infections'),
(28, 'Sexual and Reproductive Health');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(0, 'USER'),
(1, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(2) NOT NULL DEFAULT 0,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `sname`, `mname`, `email2`, `level`, `mobile`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Alice', NULL, 'Edward', 'Jonathan', 'alicejonathan@gmail.com', 1, '0767933960', 'alicejonathan@gmail.com', '2020-01-08 03:12:03', '$2y$10$2G5rqwjMIMmghdx4igpI.eb7d4MiJTF6aUc/1lOpmrW9bhbiJtaju', NULL, '2020-01-08 03:08:41', '2020-05-14 03:44:13'),
(11, 'Alice', NULL, 'Jonathan', 'Jonathan', 'alicejona@gmail.com', 0, '0717592556', 'alicejonatha@gmail.com', '2020-04-28 18:09:15', '$2y$10$FlA6bFmMM.B1wfMZ2f3Ylu24rJbNvtwPuCV6K1ZMQ/Kxpu7xKXaEW', NULL, '2020-04-28 18:06:18', '2020-04-28 18:09:15'),
(13, 'Ndekya', NULL, 'Oriyo', 'Maria', 'ndekya@yahoo.com', 1, '0764417771', 'ndekya.oriyo@nimr.or.tz', '2020-04-28 19:07:40', '$2y$10$.9NFhb4ooqoEUyZj4fsHhuF47R0qtlladwy62GZnU7u42ksQN7D0.', 'nztqSZxhEllOOZlr9zZBltU8Ik5u8t3EFShroKA7IIlTD99EWUzSIVQvcUN0', '2020-04-28 19:04:28', '2020-05-18 13:06:20'),
(17, 'Kelvin', NULL, 'Mbise', 'Thomas', 'alice@gmail.com', 0, '0717592556', 'alicejonathan8@gmail.com', NULL, '$2y$10$xsfi7BLAXYvD34XHXdfjeuhAQlVWbFMQlmqsaZC0zUeriwT/it3ia', NULL, '2020-05-14 03:18:50', '2020-05-14 09:29:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`au_id`);

--
-- Indexes for table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `publication_types`
--
ALTER TABLE `publication_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_area`
--
ALTER TABLE `research_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `centres`
--
ALTER TABLE `centres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `publication_types`
--
ALTER TABLE `publication_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `research_area`
--
ALTER TABLE `research_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
