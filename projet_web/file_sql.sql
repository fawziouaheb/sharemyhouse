-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 14 avr. 2022 à 22:43
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `house`
--

-- --------------------------------------------------------

--
-- Structure de la table `appart`
--

DROP TABLE IF EXISTS `appart`;
CREATE TABLE IF NOT EXISTS `appart` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `logement` varchar(100) DEFAULT NULL,
  `prixavant` float DEFAULT NULL,
  `prixapres` float DEFAULT NULL,
  `periode` varchar(10) DEFAULT NULL,
  `debutdispo` date DEFAULT NULL,
  `findispo` date DEFAULT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `id_b` int(11) DEFAULT NULL,
  `adresse` varchar(200) NOT NULL,
  PRIMARY KEY (`id_a`),
  KEY `id_b` (`id_b`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appart`
--

INSERT INTO `appart` (`id_a`, `logement`, `prixavant`, `prixapres`, `periode`, `debutdispo`, `findispo`, `image1`, `image2`, `description`, `id_b`, `adresse`) VALUES
(73, 'apparetement', 500, 600, 'mois', '2022-04-13', '2022-04-14', './image/1.png', './image/2.png', 'appartement propre charge inclue superficie 60m2', 35, ' Rue St Ferréol numero 6 amiens'),
(75, 'Chambre', 256, 289, 'semaine', '2022-03-30', '2022-04-14', './image/5.png', './image/6.png', 'quartier silencieux tres calme a coté de la fac superficie 20m2.', 36, 'Boulevard de Normandie 56 amiens'),
(76, 'Studio', 0, 600, 'mois', '2022-04-28', '2022-04-14', './image/8.png', './image/7.png', 'apparetement pour un couple tout propre pas cher tout service disponible meme un parking', 36, 'rue Lenotre 88 rouen'),
(77, 'Chambre', 189, 250, 'semaine', '2022-04-14', '2022-04-14', './image/9.png', './image/10.png', 'une chambre en colocation avec des jeunes étudiant tres calme pas cher au bord de la mer', 38, 'place de Miremont 55 Marseille'),
(78, 'Studio', 1400, 1200, 'mois', '2022-04-21', '2023-01-14', './image/12.png', './image/11.png', 'appartement tres propre a proximité d\'un arret de bus et un lycée a profiter', 38, 'Boulevard de Normandie 56 Paris'),
(80, 'apparetemnt', 0, 500, 'mois', '2022-04-30', '2022-04-30', './image/12.png', './image/unknown2.png', 'Pas cher, Propre. Pres de la ville. Clé remise en main propre', 37, 'place de Miremont 55 corbeil essonnes'),
(81, 'Chambre', 0, 600, 'semaine', '2022-04-13', '2022-04-29', './image/blabla.png', './image/lala.png', 'Prix pas cher. Maisonnette pas loin de la mer  10 min a pied me contacter par mail', 37, 'rue Lenotre 88'),
(82, 'Studio', 0, 456, 'mois', '2022-04-28', '2022-04-14', './image/20.png', './image/67.png', 'au top pour un etudiant(e) toute est a coté a prifiter!', 35, 'avenue Ferdinand de Lesseps 8 AMIENS'),
(83, 'Chambre', 34, 22, 'semaine', '2022-04-28', '2022-04-14', './image/espace-optimise-appartement-meuble-paris.jpg', './image/appartement-photo.jpg', 'chambre propre toute neuf', 40, 'upjv 80080 amiens');

-- --------------------------------------------------------

--
-- Structure de la table `appart_non_dispo`
--

DROP TABLE IF EXISTS `appart_non_dispo`;
CREATE TABLE IF NOT EXISTS `appart_non_dispo` (
  `id_a` int(11) NOT NULL,
  `logement` varchar(100) NOT NULL,
  `periode` varchar(100) NOT NULL,
  `debutdispo` date NOT NULL,
  `findispo` date NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `id_l` int(11) NOT NULL,
  `date_reservation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `prixavant` float NOT NULL,
  `prixapres` float NOT NULL,
  `id_b` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_u` int(11) NOT NULL,
  `id_v` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_u`,`id_v`),
  KEY `id_v` (`id_v`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_u`, `id_v`, `note`, `titre`, `commentaire`, `date`) VALUES
(35, 37, 4, 'TOP', 'rien a dire ', '2022-04-14'),
(40, 35, 4, 'top', 'top', '2022-04-14');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_m` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  `id_room` int(11) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_m`),
  KEY `id_user` (`id_user`),
  KEY `id_room` (`id_room`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id_m`, `date`, `id_user`, `id_room`, `content`) VALUES
(8, '2022-04-14 14:33:02', 35, 5, 'salut'),
(9, '2022-04-14 14:34:17', 35, 5, ''),
(10, '2022-04-14 14:34:22', 35, 5, ''),
(11, '2022-04-14 14:34:53', 35, 5, 'kdkzjedlkzjde'),
(12, '2022-04-14 14:35:00', 35, 5, 'jjh jh'),
(13, '2022-04-14 21:18:23', 35, 6, 'salut');

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `id_l` int(11) NOT NULL,
  `id_a` int(11) NOT NULL,
  `id_b` int(11) NOT NULL,
  KEY `id_l` (`id_l`),
  KEY `id_a` (`id_a`),
  KEY `id_b` (`id_b`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`id_l`, `id_a`, `id_b`) VALUES
(35, 80, 37),
(35, 75, 36),
(35, 76, 36);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id_r` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) DEFAULT NULL,
  `user2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_r`),
  KEY `user1` (`user1`),
  KEY `user2` (`user2`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`id_r`, `user1`, `user2`) VALUES
(5, 35, 37),
(6, 35, 36);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_u` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `numero_tel` varchar(11) NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image_profile` varchar(100) NOT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_u`, `pseudo`, `nom`, `email`, `password`, `ip`, `numero_tel`, `date_inscription`, `image_profile`) VALUES
(36, 'upjv', 'upjv', 'fawzimob82@gmail.com', '$2y$12$seCN8G389kJyTTIB3LKLEOH.mrW4N5tRPr/TTeKhfvF7/xX0FroYm', '746174617461', '0989876543', '2022-04-14 14:46:32', './image/upjv.jpg'),
(37, 'nadir', 'mimouni', 'nadir.mimouni1@gmail.com', '$2y$12$DTGxK3Fguki9Z0giRGvmMuJwYmvK/26lFTgN6BOpSj81HhQVlr7Cu', '746174617461', '0987654323', '2022-04-14 14:49:49', './image/unknown.png'),
(38, 'aymane', 'bou...', 'aymane.b6@gmail.com', '$2y$12$gLOy.JBSKeBVkv1w2iC6MufNH1N9fGDCrotW5gjpziIqUcm0OX3/i', '746174617461', '0987898765', '2022-04-14 14:52:17', './image/ayme.jpg'),
(39, 'ayoush', 'ayoush', 'a@gmail.com', '$2y$12$Hw8R1DVWBbql7nXKsgMowOlykcIkjebx2E8/A0zGXb2YNE7QCUK3O', '746174617461', '0987654345', '2022-04-14 14:58:12', './image/gg.png'),
(35, 'fawzi', 'fawzi', 'fawziouaheb@gmail.com', '$2y$12$U7p57sqihR3Rp/VmHO3xUehwoIdQN3w1/QesAN6cDioiJj0MI5zQu', '746174617461', '0603524351', '2022-04-14 14:45:17', './image/WIN_20220408_13_37_27_Pro.jpg'),
(40, 'upjv', 'upjv', 'upjv@gmail.com', '$2y$12$pJcgkPzlhf9/7.fCpNll8Ogn.zd1fC7EctaEkuVAtuYRDn3IO5TDa', '746174617461', '0987654323', '2022-04-14 23:10:53', './image/game1.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
