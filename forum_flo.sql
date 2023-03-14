-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour forum_flo
CREATE DATABASE IF NOT EXISTS `forum_flo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `forum_flo`;

-- Listage de la structure de la table forum_flo. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) NOT NULL DEFAULT '',
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_flo.categorie : ~3 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `nom_categorie`, `date_creation`) VALUES
	(1, 'Informatique', '2023-03-14 16:19:20'),
	(2, 'Animaux', '2023-03-14 16:19:21'),
	(3, 'Cuisine', '2023-03-14 16:19:23');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table forum_flo. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_post`),
  KEY `auteur_id` (`user_id`),
  KEY `sujet_id` (`topic_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
  CONSTRAINT `post_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_flo.post : ~0 rows (environ)
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- Listage de la structure de la table forum_flo. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `closed` tinyint(4) NOT NULL,
  `creationdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_topic`),
  KEY `auteur_id` (`user_id`),
  KEY `categorie_id` (`categorie_id`),
  CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`),
  CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_flo.topic : ~8 rows (environ)
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` (`id_topic`, `user_id`, `categorie_id`, `title`, `closed`, `creationdate`) VALUES
	(1, 1, 1, 'Les requêtes SQL', 0, '2023-03-14 14:54:08'),
	(2, 3, 1, 'Symfony mis à jour', 0, '2023-03-14 14:54:36'),
	(3, 2, 2, 'Les reptiles', 0, '2023-03-14 14:54:56'),
	(4, 3, 2, 'Portée de chiots', 1, '2023-03-14 14:55:30'),
	(5, 2, 3, 'Recette de tarte flambée', 1, '2023-03-14 14:56:05'),
	(6, 3, 3, 'Cuisson d\'une langue de boeuf', 1, '2023-03-14 14:56:34'),
	(7, 1, 3, 'Carottes rapées ou crues', 1, '2023-03-14 14:56:58'),
	(8, 1, 3, 'Entretenir son potager', 0, '2023-03-14 14:57:23');
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

-- Listage de la structure de la table forum_flo. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL DEFAULT '',
  `mot_de_passe` varchar(255) NOT NULL DEFAULT '',
  `role_membre` varchar(50) NOT NULL DEFAULT '',
  `email_membre` varchar(255) NOT NULL DEFAULT '',
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_flo.user : ~2 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `pseudo`, `mot_de_passe`, `role_membre`, `email_membre`, `date_inscription`) VALUES
	(1, 'Test', 'test123', 'member', 'test@test.fr', '2023-03-14 14:46:25'),
	(2, 'Animiel', 'animiel.9', 'admin', 'lol@gmail.com', '2023-03-14 14:50:04'),
	(3, 'Fondu2fromage', 'camembert2', 'member', 'tome@brebris.chevre', '2023-03-14 14:51:21');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
