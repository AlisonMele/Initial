-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 25 Janvier 2018 à 11:04
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`) VALUES
(31, 7, 'Pierre', 'Super chapitre! Hâte de découvrir la suite', '2018-01-10 16:11:22'),
(32, 7, 'Alison', 'Bonjour', '2018-01-10 18:25:21'),
(33, 7, 'dsf', 'df', '2018-01-10 18:46:21'),
(34, 42, 'xcdvfcb', 'vhbjhk,l;l', '2018-01-22 21:38:26'),
(35, 40, 'ghjk', 'ghbjnk', '2018-01-24 16:59:36');

-- --------------------------------------------------------

--
-- Structure de la table `draft`
--

CREATE TABLE IF NOT EXISTS `draft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(7, 'Chapitre 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis hendrerit ac ante a faucibus. Donec ornare, justo ut congue convallis, mi arcu porttitor nibh, quis aliquet est erat sed neque. Pellentesque non lorem accumsan, aliquet orci sed, iaculis odio. Vestibulum vestibulum felis odio, non laoreet mi hendrerit nec. Mauris at varius felis, nec egestas massa. Morbi iaculis ornare efficitur. Vivamus sit amet semper nibh. Donec tempus varius pretium. Etiam finibus aliquet neque, quis blandit odio scelerisque non. Nullam ac molestie justo. Aenean eget velit hendrerit, mattis dolor non, sagittis mauris. Sed a felis nec lacus cursus pretium sit amet a tortor. Mauris blandit massa at hendrerit posuere. Fusce in facilisis ante. Donec id nulla in enim bibendum luctus. Suspendisse at nulla nibh.\r\n\r\nPellentesque eget turpis sit amet quam facilisis congue sit amet vel ligula. Suspendisse non neque eu tellus pellentesque malesuada eget ac tortor. Proin placerat turpis sollicitudin ipsum sagittis pretium. Etiam lorem diam, tincidunt eu ornare vel, rutrum ut metus. Vivamus consectetur aliquet porta. In odio arcu, hendrerit non volutpat sit amet, hendrerit et neque. Mauris facilisis auctor turpis id fringilla. Morbi tempor urna id odio facilisis faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.\r\n\r\nAliquam luctus euismod imperdiet. Nam quis lectus sit amet urna porttitor tempus. Morbi efficitur elit turpis, at commodo ligula viverra vel. In in libero malesuada, porta justo sed, venenatis nulla. Fusce quis venenatis enim, vel varius urna. Nulla sit amet mauris nec massa eleifend ullamcorper. Morbi vel risus pulvinar, luctus eros eget, eleifend felis.\r\n\r\nIn congue orci cursus libero sollicitudin pulvinar. Vestibulum faucibus viverra ex, tincidunt lobortis turpis accumsan accumsan. Nulla viverra nisi nisi. Vestibulum iaculis vestibulum nunc, id dapibus urna pharetra et. Quisque quam elit, tempus eu nisl eu, ullamcorper dictum purus. Nam dictum egestas lorem, nec semper lacus porta sed. Vivamus faucibus felis eget elit tempus varius. Vestibulum vitae tincidunt tellus. Pellentesque nunc erat, volutpat ac congue a, lacinia quis massa. Praesent nec mauris semper sem blandit volutpat quis non elit. Etiam eget elit elit. Aenean in lectus ut ipsum eleifend gravida ut vel leo. Donec lacus nibh, maximus eu odio eu, aliquam ornare magna.\r\n\r\nEtiam ligula ante, ultrices id urna sit amet, placerat vehicula nisl. Integer eu lobortis enim, vitae porta tellus. Sed ex purus, aliquam in tellus a, consectetur pharetra turpis. In eleifend sagittis leo eget maximus. Ut id varius quam, ut pellentesque metus. In id eleifend elit. Nunc ac sapien in metus hendrerit venenatis. Cras tempus at mi et ornare. Nulla dictum sapien metus, sed facilisis lorem vulputate et. Pellentesque ac diam eleifend, tempor magna quis, varius augue. Sed a fringilla nulla. Quisque in congue tortor. Donec aliquam tincidunt turpis non vulputate. Cras vestibulum, velit a porttitor ultricies, nisl leo luctus nisi, at scelerisque urna lacus sit amet velit. ', '2018-01-03 17:23:01'),
(40, 'zdesfgtyh²', '&lt;p&gt;szdefrgtyujil&lt;/p&gt;', '2018-01-18 19:39:01'),
(51, 'ghjk', '&lt;p&gt;hbjkn,&lt;/p&gt;', '2018-01-24 17:09:29'),
(52, 'ghjk', '&lt;p&gt;hbjkn,&lt;/p&gt;', '2018-01-24 17:09:50'),
(53, 'ghjk', '&lt;p&gt;hbjkn,&lt;/p&gt;', '2018-01-24 17:10:41');

-- --------------------------------------------------------

--
-- Structure de la table `reportcomments`
--

CREATE TABLE IF NOT EXISTS `reportcomments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pseudo` text CHARACTER SET latin1 NOT NULL,
  `comment_id` int(4) NOT NULL,
  `report_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=229 ;

--
-- Contenu de la table `reportcomments`
--

INSERT INTO `reportcomments` (`id`, `pseudo`, `comment_id`, `report_date`) VALUES
(218, 'xxx', 32, '2018-01-10 18:25:50'),
(219, 'swxdctfvg', 33, '2018-01-10 18:47:28'),
(220, '1', 34, '2018-01-22 21:38:42'),
(221, '2', 34, '2018-01-22 21:38:49'),
(222, 'Test', 33, '2018-01-24 16:19:01'),
(223, 'Test', 33, '2018-01-24 16:19:44'),
(224, 'Test', 33, '2018-01-24 16:21:06'),
(225, 'Test', 33, '2018-01-24 16:21:09'),
(226, 'gbhjk', 32, '2018-01-24 16:21:15'),
(227, 'gbhjk', 32, '2018-01-24 16:22:23'),
(228, 'ghjkl', 35, '2018-01-24 16:59:39');

-- --------------------------------------------------------

--
-- Structure de la table `secure`
--

CREATE TABLE IF NOT EXISTS `secure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  FULLTEXT KEY `pseudo` (`pseudo`),
  FULLTEXT KEY `password` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `secure`
--

INSERT INTO `secure` (`id`, `pseudo`, `password`) VALUES
(1, 'alison', 'Victoria'),
(2, 'Administrateur1', 'Ghjulia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
