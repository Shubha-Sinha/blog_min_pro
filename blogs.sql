-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 16, 2021 at 04:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(150) NOT NULL,
  `blog_content` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_path` varchar(1024) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_title`, `blog_content`, `user_id`, `image_path`, `date_time`) VALUES
(19, 'Hitman 3 ', 'Hitman 3 closes out the rebooted trilogy with another gorgeous entry that hews close to what makes these games so unique. It doesn’t redefine the gameplay but it does introduce six new maps and wraps up the story started in 2016’s Hitman. Just like the previous games, the maps will take you all over the world from Dubai and England to China and more.\r\nIf you’re not familiar with the gameplay of this series, you’re in for a treat. As Agent 47, you play a calm and calculating hitman whose job is not to run and gun through a mob of bad guys as most games would have you do. Instead, you move around large maps like an English manor to find and eliminate your targets quietly and undetected. On top of that, you can play the same map multiple times to find a multitude of ways or story paths to take out your targets, giving this entry, as well as the previous ones, the kind of replayability you don’t see in most games.', 3, 'http://127.0.0.1/shubha/blog_/upload/Hitman3.jpg', '2021-02-28 18:05:30'),
(20, 'The Witcher 3: Wild Hunt', 'The Witcher 3: Wild Hunt is aging like fine wine. Even several years after it hit the streets, it’s still one of the most impressive open world games that’s ever existed – mixing Skyrim’s unapologetic scale with Grand Theft Auto V’s incredible depth. It’s such a jam-packed game, which is why it claims the top spot on our list of the best PC games in 2021. Staggering, beautiful and an absolute time sink – in a good way – The Witcher 3: Wild Hunt isn’t just the best PC game of 2021 or among the best open world games on PC. It might just be one of the best video games of all time.', 3, 'http://127.0.0.1/shubha/blog_/upload/tw3.jpg', '2021-02-28 18:10:15'),
(22, ' Control', 'It’s not hard to see why Control has taken the gaming world by storm. The creative team at Remedy Entertainment made sure to pack this title with plenty to love, paying very close attention to the intricate details. A deeply cinematic game, this action-adventure offers its players staggering visuals, inspired environment design and brilliant performances – not to mention, a deeply satisfying combat experience.\r\n\r\nControl places you in the capable shoes of fiery-haired Jesse Faden. You’re tasked to seek out The Oldest House, a building in New York City that’s in a constant state of architectural flux and only appears to those who desire to find it, and locate your missing brother, all while heading the Federal Bureau of Control as its director and overseeing the containment of paranatural entities.\r\n\r\nThere’s nothing quite like Control on the market, and it makes it one of the best PC games to play right now.', 3, 'http://127.0.0.1/shubha/blog_/upload/Control.jpg', '2021-02-28 18:22:56'),
(23, 'Microsoft Flight Simulator', 'Beyond its impeccable graphics and its excellent peripheral support, it won’t take you long to realize that the Microsoft Flight Simulator is a labor of love. There’s a great attention to detail here, as well as a level of realism and immersion you won’t find elsewhere. So much so that if you’re not a fan of flight simulations, you’ll want to start getting on the bandwagon. Though that also means this game won’t be for everyone. Still, if you’re a flight sim fanatic or you love planes and flying, you’ll relish the chance to fly iconic vehicles in some of the most beautiful yet dangerous locations and conditions in the world.', 3, 'http://127.0.0.1/shubha/blog_/upload/Microsoft_Flight_Simulator.jpg', '2021-02-28 18:25:11'),
(24, 'Monster Hunter World', 'Monster Hunter is one of the biggest gaming franchises you’ve probably never heard of for years now. With Monster Hunter: World, the series broke into the mainstream and came to the PC (much to many gamers’ relief), and now, it’s one of the best PC games you can play to date. \r\n\r\nMonster Hunter: World puts you in the shoes of a monster hunter, and you’ll hunt increasingly bigger and meaner monsters, strip them for parts, and craft bigger, badder armor. It’s a deviously simple gameplay loop that ends up being one of the most compelling and rewarding PC games you can play right now. \r\n\r\nThere’s an incessant onslaught of content in this game, and Capcom, the developers of this monster hunting hit, are committed to bringing a wealth of free DLC to the game – as well as a new frosty expansion in Monster Hunter World: Iceborne. If you’re looking for an addictive, immersive and most importantly, fun game to play on your own or with all your closest friends cooperatively, Monster Hunter: World is the PC game of your dreams. There’s no doubt it’s one of the best PC games you can buy today.', 3, 'http://127.0.0.1/shubha/blog_/upload/Monster_Hunter.jpg', '2021-02-28 18:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date&time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `f_name`, `l_name`, `email`, `date&time`) VALUES
(2, 'sinha77', '23dbe60faea50975530563ba31a28317', 'Shubhadip', 'Sinha', 'shubhasinha77@gmail.com', '2021-02-25 05:25:15'),
(3, 'admin', '63a9f0ea7bb98050796b649e85481845', 'admin', 'test', 'admin@root.com', '2021-02-25 09:23:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
