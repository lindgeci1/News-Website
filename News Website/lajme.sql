-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2025 at 08:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lajme`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `newsName` varchar(255) NOT NULL,
  `newsText` longtext DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newsName`, `newsText`, `foto`, `userId`, `category`) VALUES
(54, 'Ubt', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto41.jpg', 5, 'Business'),
(55, 'dwdwwdw', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.  The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from', 'foto42.jpg', 5, 'Business'),
(56, 'eqeqeq', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto50.jpg', 5, 'Business'),
(57, 'eqeqeq', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto41.jpg', 5, 'Technology'),
(58, 'dwdwwdw', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto60.webp', 5, 'Technology'),
(59, 'Mahmutioooo', '    <?php     if (!empty($homeNews)) {         // Iterate through the news items and alternate         for ($i = 0; $i < count($homeNews); $i += 2) {             echo \'<div class=\"newsItem1\" style=\"margin-bottom: 20px; border: 1px solid #ccc; border-radius: 10px; padding: 15px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); background-color: #f9f9f9;\">\';             echo \'<div class=\"img\" style=\"margin-bottom: 10px;\"><img src=\"../indexphoto/\' . htmlspecialchars($homeNews[$i][\"foto\"]) . \'\" alt=\"\' . htmlspecialchars($homeNews[$i][\"newsName\"]) . \'\" style=\"width: 100%; border-radius: 10px;\"></div>\';             echo \'<h3 style=\"font-size: 1.2rem; color: #333; margin-bottom: 10px;\">\' . htmlspecialchars($homeNews[$i][\"newsName\"]) . \'</h3>\';             echo \'<p style=\"font-size: 1rem; color: #555; line-height: 1.5; margin-bottom: 15px;\">\' . htmlspecialchars(substr($homeNews[$i][\"newsText\"], 0, PHP_INT_MAX)) . \'</p>\';             if (isset($_SESSION[\"user\"]) && $_SESSION[\"user\"] == \"yes\") {                 if (isset($_SESSION[\"roleId\"]) && $_SESSION[\"roleId\"] == 1) { // Admin access                     echo \'<a href=\"../controllers/editNews.php?id=\' . htmlspecialchars($homeNews[$i][\"id\"]) . \'\" style=\"font-size: 0.9rem; color: #007BFF; text-decoration: none; margin-right: 10px;\">Edit</a>\';                 }             }             echo \'<a href=\"LatestNews.php\" style=\"font-size: 0.9rem; color: #007BFF; text-decoration: none;\">Read more</a>\';             echo \'</div>\';         }     } else {         echo \"<p>No news available in the Home category.</p>\";     }     ?>    <?php     if (!empty($homeNews)) {         // Iterate through the news items and alternate         for ($i = 0; $i < count($homeNews); $i += 2) {             echo \'<div class=\"newsItem1\" style=\"margin-bottom: 20px; border: 1px solid #ccc; border-radius: 10px; padding: 15px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); background-color: #f9f9f9;\">\';             echo \'<div class=\"img\" style=\"margin-bottom: 10px;\"><img src=\"../indexphoto/\' . htmlspecialchars($homeNews[$i][\"foto\"]) . \'\" alt=\"\' . htmlspecialchars($homeNews[$i][\"newsName\"]) . \'\" style=\"width: 100%; border-radius: 10px;\"></div>\';             echo \'<h3 style=\"font-size: 1.2rem; color: #333; margin-bottom: 10px;\">\' . htmlspecialchars($homeNews[$i][\"newsName\"]) . \'</h3>\';             echo \'<p style=\"font-size: 1rem; color: #555; line-height: 1.5; margin-bottom: 15px;\">\' . htmlspecialchars(substr($homeNews[$i][\"newsText\"], 0, PHP_INT_MAX)) . \'</p>\';             if (isset($_SESSION[\"user\"]) && $_SESSION[\"user\"] == \"yes\") {                 if (isset($_SESSION[\"roleId\"]) && $_SESSION[\"roleId\"] == 1) { // Admin access                     echo \'<a href=\"../controllers/editNews.php?id=\' . htmlspecialchars($homeNews[$i][\"id\"]) . \'\" style=\"font-size: 0.9rem; color: #007BFF; text-decoration: none; margin-right: 10px;\">Edit</a>\';                 }             }             echo \'<a href=\"LatestNews.php\" style=\"font-size: 0.9rem; color: #007BFF; text-decoration: none;\">Read more</a>\';             echo \'</div>\';         }     } else {         echo \"<p>No news available in the Home category.</p>\";     }     ?>    <?php     if (!empty($homeNews)) {         // Iterate through the news items and alternate         for ($i = 0; $i < count($homeNews); $i += 2) {             echo \'<div class=\"newsItem1\" style=\"margin-bottom: 20px; border: 1px solid #ccc; border-radius: 10px; padding: 15px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); background-color: #f9f9f9;\">\';             echo \'<div class=\"img\" style=\"margin-bottom: 10px;\"><img src=\"../indexphoto/\' . htmlspecialchars($homeNews[$i][\"foto\"]) . \'\" alt=\"\' . htmlspecialchars($homeNews[$i][\"newsName\"]) . \'\" style=\"width: 100%; border-radius: 10px;\"></div>\';             echo \'<h3 style=\"font-size: 1.2rem; color: #333; margin-bottom: 10px;\">\' . htmlspecialchars($homeNews[$i][\"newsName\"]) . \'</h3>\';             echo \'<p style=\"font-size: 1rem; color: #555; line-height: 1.5; margin-bottom: 15px;\">\' . htmlspecialchars(substr($homeNews[$i][\"newsText\"], 0, PHP_INT_MAX)) . \'</p>\';             if (isset($_SESSION[\"user\"]) && $_SESSION[\"user\"] == \"yes\") {                 if (isset($_SESSION[\"roleId\"]) && $_SESSION[\"roleId\"] == 1) { // Admin access                     echo \'<a href=\"../controllers/editNews.php?id=\' . htmlspecialchars($homeNews[$i][\"id\"]) . \'\" style=\"font-size: 0.9rem; color: #007BFF; text-decoration: none; margin-right: 10px;\">Edit</a>\';                 }             }             echo \'<a href=\"LatestNews.php\" style=\"font-size: 0.9rem; color: #007BFF; text-decoration: none;\">Read more</a>\';             echo \'</div>\';         }     } else {         echo \"<p>No news available in the Home category.</p>\";     }     ?>', 'foto51.jpg', 5, 'Home'),
(60, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto53.webp', 5, 'Home'),
(61, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'twitter-icon.png', 5, 'Home'),
(62, 'dwdwd', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto78.jpg', 5, 'World'),
(63, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto41.jpg', 5, 'World'),
(64, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto41.jpg', 5, 'Health'),
(65, 'dwdw', 'dwdwdwdwd', 'foto54.jpg', 5, 'Sports'),
(66, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto77.jpg', 5, 'Home'),
(67, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto41.jpg', 5, 'Sports'),
(68, 'Hello', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto53.webp', 5, 'Home'),
(69, 'eqeqeq', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'foto59.jpg', 5, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `roleName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `Name`, `Surname`, `Email`, `Password`) VALUES
(5, 'Lind', 'Geci', 'lindgeci1@gmail.com', '$2y$10$Zz.lHrzMZ9lG3wNnUrcXIOYf5eCXAU92vZikVtBdbygBm0EYwbi4C'),
(8, 'ma', 'mam', 'Mausi@gmail.com', '$2y$10$LNyaVM8LBXHoKBHDnjszPeeunFeoqRNXtlamidc/qHngMkhhHftt.'),
(9, 'lamina', 'jamallina', 'lamina@gmail.com', '$2y$10$5j2KsXLoIAPfM.XU7q2a.uHCZRHKP6gVbzs0sLkQXQIHfk.kYTI22');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `userRoleId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`userRoleId`, `userId`, `roleId`) VALUES
(2, 5, 1),
(5, 8, 1),
(6, 9, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userId` (`userId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`),
  ADD UNIQUE KEY `roleName` (`roleName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`userRoleId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `userRoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
