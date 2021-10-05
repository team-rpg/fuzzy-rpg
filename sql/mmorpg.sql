-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 05 oct. 2021 à 09:35
-- Version du serveur : 8.0.26
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mmorpg`
--

-- --------------------------------------------------------

--
-- Structure de la table `arena`
--

DROP TABLE IF EXISTS `arena`;
CREATE TABLE IF NOT EXISTS `arena` (
  `arena_id` int NOT NULL AUTO_INCREMENT,
  `arena_name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `arena_picture` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `arena_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`arena_id`),
  UNIQUE KEY `arena_name` (`arena_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `arena`
--

INSERT INTO `arena` (`arena_id`, `arena_name`, `arena_picture`, `arena_desc`) VALUES
(1, 'Sanctuaire des élus', 'N/A', 'Dissimulée par les arbres d’une forêt ancestrale, la Route s’étend et mènera les joueurs vers le Sanctuaire des ­Élus, une cité flottante historique au-dessus des nuages. De nombreux trésors oubliés par le peuple de Saphael n’attendent plus qu’à être retrouvés par les héros assez courageux pour s’aventurer dans le nouveau donjon et vaincre de nouveaux boss qui apparaissent.');

-- --------------------------------------------------------

--
-- Structure de la table `armor`
--

DROP TABLE IF EXISTS `armor`;
CREATE TABLE IF NOT EXISTS `armor` (
  `armor_id` int NOT NULL AUTO_INCREMENT,
  `armor_name` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `armor_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `armor_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `armor_defense` int NOT NULL,
  `armor_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`armor_id`),
  UNIQUE KEY `armor_name` (`armor_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `armor`
--

INSERT INTO `armor` (`armor_id`, `armor_name`, `armor_img`, `armor_desc`, `armor_defense`, `armor_type`) VALUES
(1, 'Casque en cuir', 'N/A', 'fabriqué par le tanneur local , idéal pour un nouvel aventurier', 10, 'Helmet'),
(2, 'Plastron en cuir', 'N/A', 'fabriqué par le tanneur local , idéal pour un nouvel aventurier', 10, 'Body'),
(3, 'Coiffe en Tissu', 'N/A', 'fabriqué par le couturier local , idéal pour un nouvel aventurier', 5, 'Helmet'),
(4, 'Robe en Tissu', 'N/A', 'fabriqué par le couturier local , idéal pour un nouvel aventurier', 5, 'Body'),
(5, 'Casque en Fer', 'N/A', 'fabriqué par le forgeron local , idéal pour un nouvel aventurier', 20, 'Helmet'),
(6, 'Plastron en Fer', 'N/A', 'fabriqué par le forgeron local , idéal pour un nouvel aventurier', 20, 'Body');

-- --------------------------------------------------------

--
-- Structure de la table `character`
--

DROP TABLE IF EXISTS `character`;
CREATE TABLE IF NOT EXISTS `character` (
  `character_id` int NOT NULL AUTO_INCREMENT,
  `character_health` smallint NOT NULL DEFAULT '0',
  `character_secondary_stat` smallint NOT NULL DEFAULT '0',
  `character_nickname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `character_money` int NOT NULL DEFAULT '100',
  `character_level` tinyint NOT NULL DEFAULT '1',
  `character_xp` mediumint NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `class_id` int NOT NULL,
  PRIMARY KEY (`character_id`),
  UNIQUE KEY `character_name` (`character_nickname`),
  UNIQUE KEY `character_nickname` (`character_nickname`),
  KEY `user_id` (`user_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `character`
--

INSERT INTO `character` (`character_id`, `character_health`, `character_secondary_stat`, `character_nickname`, `character_money`, `character_level`, `character_xp`, `user_id`, `class_id`) VALUES
(2, 0, 0, 'Thorgal', 100, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `character_armor`
--

DROP TABLE IF EXISTS `character_armor`;
CREATE TABLE IF NOT EXISTS `character_armor` (
  `character_armor_id` int NOT NULL AUTO_INCREMENT,
  `character_id` int NOT NULL,
  `armor_id` int NOT NULL,
  `is_equiped` tinyint(1) NOT NULL,
  PRIMARY KEY (`character_armor_id`),
  KEY `characters_id` (`character_id`),
  KEY `armor_id` (`armor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `character_armor`
--

INSERT INTO `character_armor` (`character_armor_id`, `character_id`, `armor_id`, `is_equiped`) VALUES
(1, 2, 1, 0),
(2, 2, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `character_weapon`
--

DROP TABLE IF EXISTS `character_weapon`;
CREATE TABLE IF NOT EXISTS `character_weapon` (
  `character_weapon_id` int NOT NULL AUTO_INCREMENT,
  `character_id` int NOT NULL,
  `weapon_id` int NOT NULL,
  `is_equiped` tinyint(1) NOT NULL,
  PRIMARY KEY (`character_weapon_id`),
  KEY `characters_id` (`character_id`),
  KEY `weapon_id` (`weapon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `character_weapon`
--

INSERT INTO `character_weapon` (`character_weapon_id`, `character_id`, `weapon_id`, `is_equiped`) VALUES
(1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `class_secondary_stat` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `class_name` (`class_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`class_id`, `class_name`, `class_secondary_stat`) VALUES
(1, 'Guerrier', 'Rage'),
(2, 'Mage', 'Mana'),
(3, 'Archer', 'Énergie');

-- --------------------------------------------------------

--
-- Structure de la table `monster`
--

DROP TABLE IF EXISTS `monster`;
CREATE TABLE IF NOT EXISTS `monster` (
  `monster_id` int NOT NULL AUTO_INCREMENT,
  `monster_name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `monster_picture` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `monster_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `monster_health` int NOT NULL,
  `monster_dmg` int NOT NULL,
  `monster_armor` int NOT NULL,
  `monster_xp` int NOT NULL,
  `monster_category_id` int NOT NULL,
  PRIMARY KEY (`monster_id`),
  UNIQUE KEY `monster_name` (`monster_name`),
  KEY `monsters_category_id` (`monster_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `monster`
--

INSERT INTO `monster` (`monster_id`, `monster_name`, `monster_picture`, `monster_desc`, `monster_health`, `monster_dmg`, `monster_armor`, `monster_xp`, `monster_category_id`) VALUES
(1, 'Slime', '/assets/img/slime.jpg', 'entitées visceuses vivant dans les endroits sombres et humides , pouvant empoisonner leurs cibles avec des maladies.', 50, 5, 1, 20, 1),
(2, 'Scorpion Ravageur', '/assets/img/scorpion_ravageur.jpg', 'entitées toxiques et rapide vivant proches des habitations désertiques , pouvant empoisonner leurs cibles avec des maladies et se cammoufler sous le sable', 200, 20, 20, 35, 2),
(3, 'Gardien Gobelin Gris', '/assets/img/gobelin_gris.jpg', 'entitées humanoïdes très agiles attaquant en nombre , vivant dans de petits camps désertiques , pouvant utiliser des armes.', 50, 23, 15, 40, 2);

-- --------------------------------------------------------

--
-- Structure de la table `monster_category`
--

DROP TABLE IF EXISTS `monster_category`;
CREATE TABLE IF NOT EXISTS `monster_category` (
  `monster_category_id` int NOT NULL AUTO_INCREMENT,
  `monster_category_name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `monster_category_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`monster_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `monster_category`
--

INSERT INTO `monster_category` (`monster_category_id`, `monster_category_name`, `monster_category_desc`) VALUES
(1, 'Monstres des Marais', 'Faction de monstres composée de slimes , d\'araignées tisseuses nocturnes , de trolls pestiférés\r\n\r\nImmunitée : maladies et poisons\r\nPrésence: nocturne\r\nZone : marais , rivières'),
(2, 'Monstres des Plaines', 'Faction de monstres composée de serpents , scorpions jaunes , de gobelins gris\r\n\r\nImmunitée : épuisement, feu\r\nPrésence: journée\r\nZone : plaines , déserts');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_lastname` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_created_at`, `is_admin`) VALUES
(1, 'Toto', 'x', 'mmo@test.fr', '$2y$10$GUDmZFJChbtP5RDOrfn/TuoZALnAX6LBrwBxISNwXWs1CJpekbs8G', '2021-09-30 12:42:10', 0),
(2, 'Test', 'x', 'test1@test.fr', '$2y$10$GUDmZFJChbtP5RDOrfn/TuoZALnAX6LBrwBxISNwXWs1CJpekbs8G', '2021-10-05 10:43:28', 0);

-- --------------------------------------------------------

--
-- Structure de la table `weapon`
--

DROP TABLE IF EXISTS `weapon`;
CREATE TABLE IF NOT EXISTS `weapon` (
  `weapon_id` int NOT NULL AUTO_INCREMENT,
  `weapon_name` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `weapon_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `weapon_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `weapon_dmg` int NOT NULL,
  `weapon_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`weapon_id`),
  UNIQUE KEY `weapon_name` (`weapon_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `weapon`
--

INSERT INTO `weapon` (`weapon_id`, `weapon_name`, `weapon_img`, `weapon_desc`, `weapon_dmg`, `weapon_type`) VALUES
(1, 'Épée d\'apprenti(e) Guerrier', 'N/A', 'l\'arme idéale pour un guerrier débutant', 8, 'Sword'),
(2, 'Bâton magique d\'apprenti(e) Mage', 'N/A', 'l\'outil magique idéal pour un mage débutant', 3, 'Staff'),
(3, 'Arc d\'apprenti(e) Archer', 'N/A', 'L\'arme idéal pour un archer débutant', 5, 'Bow');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `character`
--
ALTER TABLE `character`
  ADD CONSTRAINT `character_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `character_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classe` (`class_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `character_armor`
--
ALTER TABLE `character_armor`
  ADD CONSTRAINT `character_armor_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `character` (`character_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `character_armor_ibfk_2` FOREIGN KEY (`armor_id`) REFERENCES `armor` (`armor_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `character_weapon`
--
ALTER TABLE `character_weapon`
  ADD CONSTRAINT `character_weapon_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `character` (`character_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `character_weapon_ibfk_2` FOREIGN KEY (`weapon_id`) REFERENCES `weapon` (`weapon_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `monster`
--
ALTER TABLE `monster`
  ADD CONSTRAINT `monster_ibfk_1` FOREIGN KEY (`monster_category_id`) REFERENCES `monster_category` (`monster_category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
