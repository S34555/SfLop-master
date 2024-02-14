-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour lop
DROP DATABASE IF EXISTS `lop`;
CREATE DATABASE IF NOT EXISTS `lop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `lop`;

-- Listage de la structure de table lop. doctrine_migration_versions
DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table lop.doctrine_migration_versions : ~0 rows (environ)
DELETE FROM `doctrine_migration_versions`;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20240108034909', '2024-01-08 03:51:26', 153);

-- Listage de la structure de table lop. frequency_play
DROP TABLE IF EXISTS `frequency_play`;
CREATE TABLE IF NOT EXISTS `frequency_play` (
  `id_frequency_play` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_frequency_play`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lop.frequency_play : ~3 rows (environ)
DELETE FROM `frequency_play`;
INSERT INTO `frequency_play` (`id_frequency_play`, `name`) VALUES
	(1, 'Séléctionner'),
	(2, 'Occasionnel'),
	(3, 'Régulier');

-- Listage de la structure de table lop. languages
DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id_languages` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_languages`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lop.languages : ~6 rows (environ)
DELETE FROM `languages`;
INSERT INTO `languages` (`id_languages`, `name`) VALUES
	(1, 'Séléctionner'),
	(2, 'Français'),
	(3, 'Anglais'),
	(4, 'Allemand'),
	(5, 'Italien'),
	(6, 'Espagnole');

-- Listage de la structure de table lop. main_champions
DROP TABLE IF EXISTS `main_champions`;
CREATE TABLE IF NOT EXISTS `main_champions` (
  `id_main_champions` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_main_champions`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lop.main_champions : ~6 rows (environ)
DELETE FROM `main_champions`;
INSERT INTO `main_champions` (`id_main_champions`, `name`, `image`) VALUES
	(1, 'Séléctionner', ''),
	(2, 'Veigar', ''),
	(3, 'Teemo', ''),
	(4, 'Maitre Yi', ''),
	(5, 'Miss Fortune', ''),
	(6, 'Darius', NULL);

-- Listage de la structure de table lop. main_roles
DROP TABLE IF EXISTS `main_roles`;
CREATE TABLE IF NOT EXISTS `main_roles` (
  `id_main_roles` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_main_roles`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table lop.main_roles : ~6 rows (environ)
DELETE FROM `main_roles`;
INSERT INTO `main_roles` (`id_main_roles`, `name`) VALUES
	(1, 'Séléctionner'),
	(2, 'Top'),
	(3, 'Mid'),
	(4, 'Jungler'),
	(5, 'Support'),
	(6, 'Adc');

-- Listage de la structure de table lop. matches
DROP TABLE IF EXISTS `matches`;
CREATE TABLE IF NOT EXISTS `matches` (
  `id_matches` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_matche` datetime NOT NULL,
  PRIMARY KEY (`id_matches`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lop.matches : ~0 rows (environ)
DELETE FROM `matches`;

-- Listage de la structure de table lop. messages
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_messages` int NOT NULL AUTO_INCREMENT,
  `message_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id_messages`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lop.messages : ~0 rows (environ)
DELETE FROM `messages`;

-- Listage de la structure de table lop. messenger_messages
DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lop.messenger_messages : ~0 rows (environ)
DELETE FROM `messenger_messages`;

-- Listage de la structure de table lop. play_styles
DROP TABLE IF EXISTS `play_styles`;
CREATE TABLE IF NOT EXISTS `play_styles` (
  `id_play_styles` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_play_styles`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lop.play_styles : ~3 rows (environ)
DELETE FROM `play_styles`;
INSERT INTO `play_styles` (`id_play_styles`, `name`) VALUES
	(1, 'Séléctionner'),
	(2, 'Passif'),
	(3, 'Aggresif ');

-- Listage de la structure de table lop. ranks
DROP TABLE IF EXISTS `ranks`;
CREATE TABLE IF NOT EXISTS `ranks` (
  `id_ranks` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_ranks`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lop.ranks : ~9 rows (environ)
DELETE FROM `ranks`;
INSERT INTO `ranks` (`id_ranks`, `name`) VALUES
	(1, 'Séléctionner'),
	(2, 'Bronze'),
	(3, 'Argent'),
	(4, 'Or'),
	(5, 'Platine'),
	(6, 'Diamant'),
	(7, 'Master'),
	(8, 'Grand Master'),
	(9, 'Challenger');

-- Listage de la structure de table lop. user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_champion_id` int DEFAULT NULL,
  `rank_id` int DEFAULT NULL,
  `play_style_id` int DEFAULT NULL,
  `main_role_id` int DEFAULT NULL,
  `frequency_play_id` int DEFAULT NULL,
  `language_id` int DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  KEY `main_champion_id` (`main_champion_id`),
  KEY `rank_id` (`rank_id`),
  KEY `play_style_id` (`play_style_id`),
  KEY `main_role_id` (`main_role_id`),
  KEY `frequency_play_id` (`frequency_play_id`),
  KEY `language_id` (`language_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`main_champion_id`) REFERENCES `main_champions` (`id_main_champions`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id_ranks`),
  CONSTRAINT `user_ibfk_3` FOREIGN KEY (`play_style_id`) REFERENCES `play_styles` (`id_play_styles`),
  CONSTRAINT `user_ibfk_4` FOREIGN KEY (`main_role_id`) REFERENCES `main_roles` (`id_main_roles`),
  CONSTRAINT `user_ibfk_5` FOREIGN KEY (`frequency_play_id`) REFERENCES `frequency_play` (`id_frequency_play`),
  CONSTRAINT `user_ibfk_6` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id_languages`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lop.user : ~7 rows (environ)
DELETE FROM `user`;
INSERT INTO `user` (`id_user`, `email`, `roles`, `password`, `username`, `avatar`, `main_champion_id`, `rank_id`, `play_style_id`, `main_role_id`, `frequency_play_id`, `language_id`) VALUES
	(12, 'Chien^gmail.com', '[]', '$2y$13$mo3SuHvKyNP3.LwP4p1xou7SV3djDfnpvZ/1df5tdAWsg5ELPXU0u', 'Chien', NULL, 6, 9, 1, 6, 2, 4),
	(13, 'Chien@gmail.com', '[]', '$2y$13$FOwQssG2jP/oLPvMRKTclOqp8uR8oWa.f6eDCH2/RMzb4pHsnCv.W', 'Hibou', 'homme-invisible.png', 5, 6, 1, 4, 3, 2),
	(14, 'Test123@gmail.com', '[]', '$2y$13$koyicKJdmWe2wPGkycT2y.XzCfwdRAAhIefPD7e7FeU5/souFSNMG', 'Test123', 'super-heros 2.png', 1, 8, 1, 2, 2, 5),
	(15, 'Chat@gmail.com', '[]', '$2y$13$CiinXYDIT2YySSF333q5HexoDoneJfMx2RB.vr7SFqQPXUf4iNe6a', 'Chat', 'super-heros.png', 2, 2, 2, 2, 2, 1),
	(16, 'Loutre@gmail.com', '[]', '$2y$13$0rH0DmQYjq3BDFaYYTtkkO/00CNEyfDY4mgCveDhRq4J0bjZp6VZW', 'Loutre', 'super-heros 3.png', 3, 4, 2, 3, 2, 2),
	(17, 'Exam@gmail.com', '[]', '$2y$13$Ju8sI5p/bvq0EC8ox6T3gODSA/JR877i6yl5zAVckHxnSPkgtCgPe', 'Ewenn', 'da00ee66aa362a4331844b9b089e9e38.png', 3, 6, 3, 5, 2, 4),
	(18, 'Céline@gmail.com', '[]', '$2y$13$uYayY.1c/nx8OdLiNGyN0O5ANkfD3UoG1huhaWkzcI4n8MbGGmc.O', 'Céline', '21cbc696ca6dee783b5f02735aa82ef3.png', 1, 1, 1, 1, 2, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
