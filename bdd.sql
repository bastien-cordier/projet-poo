-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 12, 2021 at 03:33 PM
-- Server version: 5.7.32
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ipssi_projet-poo`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `race` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `type`, `race`, `description`, `created_at`) VALUES
(1, 'Rex', 'Chien', 'Berger Allemand', 'Un bel animal ', '2021-10-11 00:00:00'),
(4, 'Pépette le lapin', 'Lapin', 'Nain', 'Le sang de la veine et bien plus encore', '2021-10-12 00:00:00'),
(6, 'Flipper', 'Poisson', 'Piranha', 'Ça mords', '2021-10-11 00:00:00'),
(7, 'Boulbi', 'Chat', 'Bengal', 'Quand il rentre sur la piste', '2021-10-11 00:00:00'),
(9, 'Jul', 'Chat', 'Persan', 'Chat marseillais', '2021-10-12 11:45:20'),
(10, 'Lil', 'Chien', 'Bulldog', 'Dangereux', '2021-10-12 11:41:20'),
(11, 'Néo', 'Chien', 'Border Collie', 'Hyperactif', '2021-10-12 11:45:42'),
(13, 'Mustang', 'Cheval', 'Mustang', 'Pas la voiture lol :3', '2021-10-12 14:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `animal_tag`
--

CREATE TABLE `animal_tag` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animal_tag`
--

INSERT INTO `animal_tag` (`id`, `animal_id`, `tag_id`) VALUES
(23, 1, 9),
(24, 7, 10),
(26, 9, 10),
(27, 10, 9),
(28, 4, 10),
(29, 6, 10),
(30, 11, 9),
(33, 13, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
(9, 'Réservé', '2021-10-12'),
(10, 'Non réservé', '2021-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(1, 'admin', '$2y$10$Dd.G99dTSE7OgRR2uFvd.uvbMBXmm6jZX8tf.xPbZdaSGJwlssSsK', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal_tag`
--
ALTER TABLE `animal_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_animal_tag_animals` (`animal_id`),
  ADD KEY `FK2` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `animal_tag`
--
ALTER TABLE `animal_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_tag`
--
ALTER TABLE `animal_tag`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_animal_tag_animals` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE;
