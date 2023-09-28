-- Adminer 4.8.1 MySQL 5.5.5-10.5.19-MariaDB-0+deb11u2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `Article`;
CREATE TABLE `Article` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) NOT NULL,
  `AUTEUR` varchar(50) NOT NULL,
  `CREATED` datetime NOT NULL,
  `DESCRIPTION` varchar(300) NOT NULL,
  `MODIFIED` datetime NOT NULL,
  `IDJOURNAUX` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDJOURNAUX` (`IDJOURNAUX`),
  CONSTRAINT `Article_ibfk_3` FOREIGN KEY (`IDJOURNAUX`) REFERENCES `Journaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Article` (`ID`, `NOM`, `AUTEUR`, `CREATED`, `DESCRIPTION`, `MODIFIED`, `IDJOURNAUX`) VALUES
(1,	'test art - 1',	'benjamin toulat',	'2024-09-23 00:00:00',	'....',	'2024-09-23 00:00:00',	1);

DROP TABLE IF EXISTS `Audio`;
CREATE TABLE `Audio` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDEMISSION` int(11) NOT NULL,
  `NOM` text NOT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `HEURE` time NOT NULL,
  `DATE` date NOT NULL,
  `AUDIO` text NOT NULL,
  `AUTEURS` text DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDEMISSION` (`IDEMISSION`),
  CONSTRAINT `Audio_ibfk_2` FOREIGN KEY (`IDEMISSION`) REFERENCES `Emission` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Audio` (`ID`, `IDEMISSION`, `NOM`, `DESCRIPTION`, `HEURE`, `DATE`, `AUDIO`, `AUTEURS`) VALUES
(1,	1,	'H2P Ep 1',	'dffdf',	'15:49:07',	'2023-09-25',	'H2P/H2P Ep 1.wav',	'moi'),
(2,	1,	'H2P Ep1 2',	'azdeza',	'15:52:57',	'2023-09-25',	'H2P/H2P Ep 1.wav',	'moi 2');

DROP TABLE IF EXISTS `Emission`;
CREATE TABLE `Emission` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` text NOT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `SRC` varchar(100) NOT NULL,
  `INSCRIPTION` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Emission` (`ID`, `NOM`, `DESCRIPTION`, `SRC`, `INSCRIPTION`) VALUES
(1,	'H2P',	'Histoire de poche, c\'est une émission pour les amateurs d\'histoire et de savoir. Nous vous raconterons des anecdotes historiques et mythologiques sur des sujets aussi variés qu’intéressant.',	'rubrique/H2P.png',	0),
(2,	'JA',	'...',	'rubrique/JA.png',	0),
(3,	'1T3C',	'...',	'rubrique/1T3C.png',	0),
(4,	'QES',	'Le quiz en série, c\'est 2 minutes durant lequelles nous allons poser unesérie de questions à notre candidat, et ce dernier va devoir donner le plus  de bonnes réponses possibles. \r\nChaque bonne réponse lui rapportera 1 point. Tout ses points seront additionnés à la fin pour obtenir un score. Le candidat pourra passer une question s\'il ne trouve pas la bonne réponse, \r\nmais il ne pourra pas y répondre à nouveau par la suite',	'rubrique/QES.png',	1),
(5,	'QQC',	'...',	'rubrique/QQC.png',	0),
(6,	'DBL',	'...',	'rubrique/DBL.png',	0);

DROP TABLE IF EXISTS `Equipe`;
CREATE TABLE `Equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` int(11) NOT NULL,
  `PRENOM` int(11) NOT NULL,
  `SRC` int(11) NOT NULL,
  `DESCRIPTION` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `Info`;
CREATE TABLE `Info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) NOT NULL,
  `INFO` varchar(2000) DEFAULT NULL,
  `CREATED` datetime NOT NULL,
  `MODIFIED` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Info` (`id`, `NOM`, `INFO`, `CREATED`, `MODIFIED`) VALUES
(1,	'EN TETE',	'Bonjour à vous cher internaute. Dans cette superbe invention qui est Internet, reliant des milliards d\'humains entre eux, il y a environ 1.8 milliards de sites. Vous avez fait le choix de visiter celui-ci, toute l\'équipe de radio Guy Chauvet est donc très honorée de vous accueillir. Si vous ne savez pas à quoi sert ce site, ne vous inquiétez pas, on va vous expliquer tout ça de suite : ici, vous pouvez écouter les émissions de la Webradio du lycée Guy Chauvet, qui se situe dans la ville de Loudun, en région Nouvelle-Aquitaine. Il y en a pour tous les goûts, des émissions sur l\'Histoire, la musique, le cinéma ou l\'actualité, des jeux, etc. Ce projet est financé par la Maison des lycéens de notre établissement, l\'association qui organise des animations pour les élèves.  Nous espérons que vous passerez de bons moments ici.',	'2025-09-23 00:00:00',	'2025-09-23 00:00:00'),
(2,	'A VENIR',	'La web radio du lycée, c\'est votre radio. Vous y retrouverez des podcasts intéressants et vous y serez informés des actualités qu\'elles soient au lycée ou mondiales. ',	'2025-09-23 00:00:00',	'2025-09-23 00:00:00');

DROP TABLE IF EXISTS `Inscription`;
CREATE TABLE `Inscription` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDEMISSION` int(11) DEFAULT NULL,
  `NOM` text NOT NULL,
  `CONTACT` text NOT NULL,
  `RESPONSE` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDEMISSION` (`IDEMISSION`),
  CONSTRAINT `Inscription_ibfk_1` FOREIGN KEY (`IDEMISSION`) REFERENCES `Emission` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `Journaux`;
CREATE TABLE `Journaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) NOT NULL,
  `DESCRIPTION` varchar(300) NOT NULL,
  `src` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Journaux` (`id`, `NOM`, `DESCRIPTION`, `src`) VALUES
(1,	'default',	'...',	'...');

DROP TABLE IF EXISTS `Utilisateurs`;
CREATE TABLE `Utilisateurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` tinytext NOT NULL,
  `PASSWORD` text NOT NULL,
  `ROLE` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 2023-09-28 07:34:49
