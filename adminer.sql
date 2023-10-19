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
  `DESCRIPTION` text NOT NULL,
  `MODIFIED` datetime NOT NULL,
  `IDJOURNAUX` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDJOURNAUX` (`IDJOURNAUX`),
  CONSTRAINT `Article_ibfk_3` FOREIGN KEY (`IDJOURNAUX`) REFERENCES `Journaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
(1,	1,	'H2P Ep 1',	'...',	'15:49:07',	'2023-09-25',	'H2P/H2P Ep 1.wav',	'moi'),
(2,	1,	'H2P Ep 2 ',	'...',	'15:52:57',	'2023-09-25',	'H2P/H2P Ep 2.wav',	'moi med'),
(3,	1,	'H2P Ep 3 ',	'...',	'15:52:57',	'2023-09-25',	'H2P/H2P Ep 3.wav',	'moi med'),
(4,	3,	'1T3C Ep1',	'...',	'10:22:44',	'2023-10-17',	'1T3C/1T3C Ep1.wav',	'Moi ssoneuse'),
(5,	3,	'1T3C Ep2',	'...',	'11:02:57',	'2023-10-17',	'1T3C/1T3C Ep2.wav',	'Florent'),
(6,	1,	'IT Ep1',	'...',	'11:13:28',	'2023-10-17',	'IT/IT Ep1.wav',	'Benjamin'),
(7,	2,	'JA Ep1',	'...',	'11:18:52',	'2023-10-17',	'JA/JA Ep1.wav',	'Kassim'),
(8,	2,	'JA Ep2',	'...',	'11:19:42',	'2023-10-17',	'JA/JA Ep2.wav',	'Mathieu'),
(9,	5,	'QQC Ep1',	'...',	'11:29:47',	'2023-10-17',	'QQC/QQC Ep1.wav',	'Benjamdeux'),
(10,	4,	'QES Ep1',	'...',	'11:30:35',	'2023-10-17',	'QES/QES Ep1.wav',	'Kassimi like a breaking ball'),
(11,	4,	'QES Ep2',	'...',	'11:01:47',	'2023-10-18',	'QES/QES Ep2.wav',	'Noam'),
(12,	4,	'QES Ep3',	'...',	'11:02:32',	'2023-10-18',	'QES/QES Ep3.wav',	'Lucas');

DROP TABLE IF EXISTS `Emission`;
CREATE TABLE `Emission` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` text NOT NULL,
  `NOMLONG` mediumtext NOT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `SRC` varchar(100) NOT NULL,
  `INSCRIPTION` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Emission` (`ID`, `NOM`, `NOMLONG`, `DESCRIPTION`, `SRC`, `INSCRIPTION`) VALUES
(1,	'H2P',	'Histoire de Poche',	'Histoire de poche, c\'est une émission pour les amateurs d\'histoire et de savoir. Nous vous raconterons des anecdotes historiques et mythologiques sur des sujets aussi variés qu’intéressant.',	'rubrique/H2P.png',	0),
(2,	'JA',	'Journal Audio',	'...',	'rubrique/JA.png',	0),
(3,	'1T3C',	'1 Thème 3 Chansons',	'...',	'rubrique/1T3C.png',	0),
(4,	'QES',	'Quiz En Série',	'Le quiz en série, c\'est 2 minutes durant lequelles nous allons poser unesérie de questions à notre candidat, et ce dernier va devoir donner le plus  de bonnes réponses possibles. \r\nChaque bonne réponse lui rapportera 1 point. Tout ses points seront additionnés à la fin pour obtenir un score. Le candidat pourra passer une question s\'il ne trouve pas la bonne réponse, \r\nmais il ne pourra pas y répondre à nouveau par la suite',	'rubrique/QES.png',	1),
(5,	'QQC',	'Qui Que C\'est',	'...',	'rubrique/QQC.png',	0),
(6,	'DBL',	'Débat Lycéen',	'...',	'rubrique/DBL.png',	0);

DROP TABLE IF EXISTS `Equipe`;
CREATE TABLE `Equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `SRC` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Equipe` (`id`, `NOM`, `PRENOM`, `SRC`, `DESCRIPTION`) VALUES
(1,	'Cuvier',	'Clara',	'equipe/Cuvier_Clara.png',	''),
(2,	'Devaux ',	'Faust',	'equipe/Devaux_Faust.png',	'Bonjour je suis Faust Devaux et je suis en terminale. Je participe au journal radio et au magazine cinéma de la Radio Guy Chauvet. J\'ai décidé de faire partie de la web radio pour apprendre à mieux m\'exprimer et comprendre le métier de journaliste.'),
(3,	'Fontaine',	'Emeraude',	'equipe/Fontaine_Emeraude.png',	'Je m’appelle Émeraude, je suis en terminale, je suis un peu barge et toujours à la recherche de sujet intéressant à développer, c’est pour ça que j’ai décidé de rejoindre la webradio.'),
(4,	'Fournier-Heinry',	'Lubin ',	'equipe/Fournier_Heinry_Lubin.png',	'Je m\'appelle Lubin Fournier-Heinry, j\'ai 15 ans je suis en classe de seconde 2, j\'aime et je fais du sport c\'est pour ça que j\'anime la rubrique sport.'),
(5,	'Godichaud ',	'William',	'equipe/Godicheau_William.png',	'Hey, je suis William, un passionné d\'histoire qui adore la Web radio. Je tiens l\'émission Histoire de poche. Retrouvez-moi vite !'),
(6,	'Klinzing ',	'Gaëtan',	'equipe/Klinzing_Gaetan.png',	'Bonjour, je m’appelle Gaëtan Klinzing, j’ai 15 ans. J’aime beaucoup le sport, c’est pour cela que je suis dans la rubrique sport en tant que Writer.'),
(7,	'Le Joly',	'Thomas',	'equipe/Le_Joly_Thomas.png',	'Mon nom est Thomas Le Joly. Passionné depuis longtemps par le monde de la radio, j’ai souhaité rejoindre Radio Guy Chauvet pour participer à ce projet qui, selon moi, peut permettre aux lycéens d’apprendre et de se divertir de manière originale au sein de l’établissement, qu’ils soient auditeurs ou participants. Bref, bon surf ^_^ .'),
(8,	'Meyer ',	'Luce ',	'equipe/Meyer_Luce.png',	'Je m\'appelle Luce et je suis en première. Je participe à  l\'émission \"histoire de poche\". Je suis là parce j\'aime ça et on peut découvrir de nouvelles choses :)'),
(9,	'Rochoux ',	'Quentin',	'equipe/Rochoux_Quentin.png',	'Je m\'appelle Quentin Rochoux, je suis passionné d\'actualités en particulier de sport et la politique. Je suis rédacteur en chef du journal et je compte devenir journaliste.');

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

DROP TABLE IF EXISTS `Lycée`;
CREATE TABLE `Lycée` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  `REPRE_PRE` varchar(50) NOT NULL,
  `REPRE_NOM` varchar(50) NOT NULL,
  `DESC` varchar(100) NOT NULL,
  `MAIL` varchar(100) NOT NULL,
  `CP` varchar(50) NOT NULL,
  `VILLE` varchar(50) NOT NULL,
  `TEL` varchar(50) NOT NULL,
  `DEPART` varchar(50) NOT NULL,
  `RUE` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Lycée` (`id`, `NAME`, `REPRE_PRE`, `REPRE_NOM`, `DESC`, `MAIL`, `CP`, `VILLE`, `TEL`, `DEPART`, `RUE`) VALUES
(1,	'LYCEE GENERAL ET TECHNOLOGIQUE GUY CHAUVET',	'ANONYME',	'ANONYME',	'',	'',	'86206',	'LOUDUN',	'0549981751',	'VIENNE',	'Rue DE L EPERON');

DROP TABLE IF EXISTS `Utilisateurs`;
CREATE TABLE `Utilisateurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` tinytext NOT NULL,
  `PASSWORD` text NOT NULL,
  `ROLE` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- 2023-10-19 13:10:44
