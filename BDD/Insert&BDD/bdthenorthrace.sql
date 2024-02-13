-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 13 fév. 2024 à 09:08
-- Version du serveur : 11.2.2-MariaDB
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdthenorthrace`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `AddEcurie`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddEcurie` (IN `nomEcu` VARCHAR(50), IN `couleurEcu` VARCHAR(40))   BEGIN
    INSERT INTO Ecurie(nom, couleur)
	VALUES(nomEcu, couleurEcu);
END$$

DROP PROCEDURE IF EXISTS `AddPilote`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPilote` (IN `nomPilote` VARCHAR(50), IN `prenomPilote` VARCHAR(50), IN `paysPilote` VARCHAR(50))   BEGIN
    INSERT INTO Pilote(nom, prenom, paysPil)
    VALUES(nomPilote, prenomPilote, paysPilote);
END$$

DROP PROCEDURE IF EXISTS `deleteEcurieById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteEcurieById` (IN `idEcurie` INT(3))   BEGIN
    DELETE FROM CoursesAnnee WHERE idEcu=idEcurie;
    DELETE FROM Classement WHERE idEcu=idEcurie;
	DELETE FROM Ecurie WHERE id = idEcurie;
END$$

DROP PROCEDURE IF EXISTS `deletePiloteById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deletePiloteById` (IN `idPilote` INT(3))   BEGIN
    DELETE FROM CoursesAnnee WHERE idPil=idPilote;
	DELETE FROM Pilote WHERE id = idPilote;
END$$

DROP PROCEDURE IF EXISTS `GetAllCoursesByYear`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllCoursesByYear` (IN `year` INT)   BEGIN
    SELECT c.*, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.annee = year;
END$$

DROP PROCEDURE IF EXISTS `getAllPointsPiloteById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllPointsPiloteById` (IN `idPilote` INT(3))   BEGIN
	SELECT SUM(c.nbPointPil) AS totalPoints
	FROM Pilote p
	INNER JOIN CoursesAnnee c ON p.id = c.idPil
	Where p.id = idPilote;
END$$

DROP PROCEDURE IF EXISTS `GetCourseDetailsByPilot`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCourseDetailsByPilot` (IN `idPil` INT)   BEGIN
    SELECT c.*, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idPil = idPil;
END$$

DROP PROCEDURE IF EXISTS `GetCourseDetailsByPilotAndYear`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCourseDetailsByPilotAndYear` (IN `idPil` INT, IN `year` INT)   BEGIN
    SELECT c.*, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idPil = idPil AND c.annee = year;
END$$

DROP PROCEDURE IF EXISTS `GetCourseDetailsByPilotTeamAndYear`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCourseDetailsByPilotTeamAndYear` (IN `idPil` INT, IN `idEcu` INT, IN `year` INT)   BEGIN
    SELECT c.*, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idPil = idPil AND c.idEcu = idEcu AND c.annee = year;
END$$

DROP PROCEDURE IF EXISTS `GetCourseDetailsByTeam`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCourseDetailsByTeam` (IN `idEcu` INT)   BEGIN
    SELECT c.*, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idEcu = idEcu;
END$$

DROP PROCEDURE IF EXISTS `GetCourseDetailsByTeamAndYear`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCourseDetailsByTeamAndYear` (IN `idEcu` INT, IN `year` INT)   BEGIN
    SELECT c.*, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idEcu = idEcu AND c.annee = year;
END$$

DROP PROCEDURE IF EXISTS `getEcurieById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getEcurieById` (IN `idEcu` INT(3))   BEGIN
    SELECT id, nom, couleur FROM Ecurie
    WHERE id=idEcu;
END$$

DROP PROCEDURE IF EXISTS `getEcurieOfLastSeasonOfPiloteByIdPilote`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getEcurieOfLastSeasonOfPiloteByIdPilote` (IN `idPilote` INT(3))   BEGIN
    SELECT id, nom, couleur FROM Ecurie
    JOIN CoursesAnnee ON idEcu=id
    WHERE idPil=idPilote AND annee = (SELECT max(annee) FROM CoursesAnnee);
END$$

DROP PROCEDURE IF EXISTS `getEcuries`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getEcuries` ()   BEGIN
    SELECT id, nom, couleur FROM Ecurie;
END$$

DROP PROCEDURE IF EXISTS `getEcuriesLastSeason`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getEcuriesLastSeason` ()   BEGIN
    SELECT id, nom, couleur FROM Ecurie
    JOIN Classement on id=idEcu
    WHERE annee = (SELECT max(annee) FROM Classement);
END$$

DROP PROCEDURE IF EXISTS `getLastEcurieByIdPilote`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getLastEcurieByIdPilote` (IN `idPilote` INT(3))   BEGIN
    SELECT id, nom, couleur FROM Ecurie
    JOIN CoursesAnnee ON idEcu=id
    WHERE idPil=idPilote AND annee = (SELECT max(annee) FROM CoursesAnnee WHERE idPil=idPilote);
END$$

DROP PROCEDURE IF EXISTS `getPiloteById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPiloteById` (IN `idPilote` INT(3))   BEGIN
    SELECT nom, prenom, paysPil, dateNais
	FROM Pilote
	WHERE id = idPilote;
END$$

DROP PROCEDURE IF EXISTS `getPilotePointsLastSeasonById`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPilotePointsLastSeasonById` (IN `idPilote` INT(3))   BEGIN
    select nbPointPil from coursesannee where idPil=idPilote and annee = (select max(annee) from coursesannee where idPil=idPilote);
END$$

DROP PROCEDURE IF EXISTS `getPilotes`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPilotes` ()   BEGIN
    SELECT id, nom, prenom, paysPil, dateNais FROM Pilote;
END$$

DROP PROCEDURE IF EXISTS `getPilotesByIdEcu`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPilotesByIdEcu` (IN `idEcurie` INT(3))   BEGIN
	SELECT p.nom, p.prenom,p.id, e.nom AS nomEcurie
	FROM Pilote p
	INNER JOIN CoursesAnnee c ON p.id = c.idPil
	INNER JOIN Ecurie e ON e.id = c.idEcu
	WHERE c.annee = (
		SELECT MAX(annee)
		FROM CoursesAnnee
	)
	AND c.idEcu = idEcurie
	ORDER BY p.nom;
END$$

DROP PROCEDURE IF EXISTS `getPilotesLastSeason`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPilotesLastSeason` ()   BEGIN
    select id, nom, prenom, paysPil, dateNais from pilote join coursesannee on id=idPil where annee = (select max(annee) from coursesannee) order by nbPointPil desc;
END$$

DROP PROCEDURE IF EXISTS `getPilotesPodium`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPilotesPodium` ()   BEGIN
	SELECT p.id, p.nom, p.prenom, c.nbPointPil
	FROM Pilote p
	INNER JOIN CoursesAnnee c ON p.id = c.idPil
	ORDER BY c.annee DESC, c.nbPointPil DESC
	LIMIT 3;
END$$

DROP PROCEDURE IF EXISTS `GetTop3CoursesByYear`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetTop3CoursesByYear` (IN `year` INT)   BEGIN
    SELECT c.*, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.annee = year
    ORDER BY c.nbPointPil DESC
    LIMIT 3;
END$$

DROP PROCEDURE IF EXISTS `updateEcurieColor`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateEcurieColor` (IN `idEcu` INT(3), IN `nouvelleCouleurEcu` VARCHAR(40))   BEGIN
    UPDATE Ecurie
	SET couleur=nouvelleCouleurEcu
	WHERE id=idEcu;
END$$

DROP PROCEDURE IF EXISTS `updatePilote`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatePilote` (IN `idPilote` INT(3), IN `nomPil` VARCHAR(40), IN `prenomPil` VARCHAR(40), IN `paysPilPil` VARCHAR(30), IN `dateNaisPil` DATE)   BEGIN
    UPDATE Pilote
	SET nom=nomPil, prenom=prenomPil, paysPil=paysPilPil
	WHERE id=idPilote;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `classement`
--

DROP TABLE IF EXISTS `classement`;
CREATE TABLE IF NOT EXISTS `classement` (
  `idEcu` int(3) NOT NULL,
  `annee` int(4) NOT NULL,
  `nbPointEcu` int(4) DEFAULT NULL,
  `placeEcu` int(3) DEFAULT NULL,
  PRIMARY KEY (`idEcu`,`annee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `classement`
--

INSERT INTO `classement` (`idEcu`, `annee`, `nbPointEcu`, `placeEcu`) VALUES
(1, 2018, 655, 1),
(1, 2019, 739, 1),
(1, 2020, 573, 1),
(1, 2021, 613, 1),
(1, 2022, 515, 3),
(1, 2023, 392, 2),
(2, 2018, 571, 2),
(2, 2019, 504, 2),
(2, 2020, 131, 6),
(2, 2021, 323, 3),
(2, 2022, 554, 2),
(2, 2023, 388, 3),
(3, 2018, 122, 4),
(3, 2019, 91, 5),
(3, 2020, 181, 5),
(4, 2018, 419, 3),
(4, 2019, 417, 3),
(4, 2020, 319, 2),
(4, 2021, 585, 2),
(4, 2022, 759, 1),
(4, 2023, 822, 1),
(5, 2018, 93, 5),
(5, 2019, 28, 9),
(5, 2020, 3, 9),
(5, 2021, 0, 10),
(5, 2022, 37, 8),
(5, 2023, 12, 10),
(6, 2018, 62, 6),
(6, 2019, 145, 4),
(6, 2020, 202, 3),
(7, 2018, 52, 7),
(8, 2018, 48, 8),
(9, 2018, 33, 9),
(9, 2019, 85, 6),
(10, 2018, 7, 10),
(10, 2019, 1, 10),
(10, 2020, 0, 10),
(10, 2021, 23, 8),
(10, 2022, 8, 10),
(10, 2023, 28, 7),
(12, 2019, 73, 7),
(12, 2020, 195, 4),
(13, 2019, 57, 8),
(13, 2020, 8, 8),
(13, 2021, 13, 9),
(14, 2020, 107, 7),
(14, 2021, 142, 6),
(14, 2022, 35, 9),
(14, 2023, 21, 8),
(15, 2021, 275, 4),
(15, 2022, 159, 5),
(15, 2023, 284, 4),
(16, 2021, 155, 5),
(16, 2022, 173, 4),
(16, 2023, 120, 6),
(17, 2021, 77, 7),
(18, 2022, 55, 6),
(18, 2023, 16, 9),
(19, 2022, 55, 7),
(19, 2023, 273, 5);

-- --------------------------------------------------------

--
-- Structure de la table `coursesannee`
--

DROP TABLE IF EXISTS `coursesannee`;
CREATE TABLE IF NOT EXISTS `coursesannee` (
  `idPil` int(3) NOT NULL,
  `annee` int(4) NOT NULL,
  `idEcu` int(3) NOT NULL,
  `nbPointPil` int(4) DEFAULT NULL,
  `placePil` int(3) DEFAULT NULL,
  `numPil` int(2) DEFAULT NULL,
  PRIMARY KEY (`idPil`,`annee`,`idEcu`),
  KEY `idEcu` (`idEcu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `coursesannee`
--

INSERT INTO `coursesannee` (`idPil`, `annee`, `idEcu`, `nbPointPil`, `placePil`, `numPil`) VALUES
(1, 2018, 4, 249, 4, 33),
(1, 2019, 4, 278, 3, 33),
(1, 2020, 4, 214, 3, 1),
(1, 2021, 4, 395, 1, 1),
(1, 2022, 4, 454, 1, 1),
(1, 2023, 4, 549, 1, 1),
(2, 2018, 11, 62, 8, 11),
(2, 2019, 12, 52, 10, 11),
(2, 2020, 12, 125, 4, 11),
(2, 2021, 4, 190, 4, 11),
(2, 2022, 4, 305, 3, 11),
(2, 2023, 4, 273, 2, 11),
(3, 2018, 1, 408, 1, 44),
(3, 2019, 1, 413, 1, 44),
(3, 2020, 1, 347, 1, 44),
(3, 2021, 1, 387, 2, 44),
(3, 2022, 1, 240, 6, 44),
(3, 2023, 1, 232, 3, 44),
(4, 2018, 6, 50, 11, 14),
(4, 2021, 16, 81, 10, 14),
(4, 2022, 16, 81, 9, 14),
(4, 2023, 19, 200, 5, 14),
(5, 2019, 6, 49, 11, 4),
(5, 2020, 6, 97, 9, 4),
(5, 2021, 15, 160, 6, 4),
(5, 2022, 15, 122, 7, 4),
(5, 2023, 15, 195, 6, 4),
(6, 2018, 3, 53, 10, 55),
(6, 2019, 6, 96, 6, 55),
(6, 2020, 6, 105, 6, 55),
(6, 2021, 2, 164, 5, 55),
(6, 2022, 2, 246, 5, 55),
(6, 2023, 2, 200, 4, 55),
(7, 2018, 8, 39, 13, 16),
(7, 2019, 2, 264, 4, 16),
(7, 2020, 2, 98, 8, 16),
(7, 2021, 2, 159, 7, 16),
(7, 2022, 2, 308, 2, 16),
(7, 2023, 2, 188, 7, 16),
(8, 2019, 10, 0, 20, 63),
(8, 2020, 10, 3, 18, 63),
(8, 2021, 10, 16, 15, 63),
(8, 2022, 1, 275, 4, 63),
(8, 2023, 1, 160, 8, 63),
(9, 2023, 15, 89, 9, 81),
(10, 2018, 10, 6, 18, 18),
(10, 2019, 12, 21, 15, 18),
(10, 2020, 12, 75, 11, 18),
(10, 2021, 19, 34, 13, 18),
(10, 2022, 19, 18, 15, 18),
(10, 2023, 19, 73, 10, 18),
(11, 2018, 9, 29, 15, 10),
(11, 2019, 9, 95, 7, 10),
(11, 2020, 14, 75, 10, 10),
(11, 2021, 14, 110, 9, 10),
(11, 2022, 14, 23, 14, 10),
(11, 2023, 16, 62, 11, 10),
(12, 2018, 11, 49, 12, 31),
(12, 2020, 3, 62, 12, 31),
(12, 2021, 16, 74, 11, 31),
(12, 2022, 16, 92, 8, 31),
(12, 2023, 16, 58, 12, 31),
(13, 2019, 4, 92, 8, 23),
(13, 2020, 4, 105, 7, 23),
(13, 2022, 10, 4, 19, 23),
(13, 2023, 10, 27, 13, 23),
(14, 2021, 14, 34, 14, 18),
(14, 2022, 14, 12, 17, 22),
(14, 2023, 14, 13, 14, 22),
(15, 2018, 1, 247, 5, 77),
(15, 2019, 1, 326, 2, 77),
(15, 2020, 1, 223, 2, 77),
(15, 2021, 1, 226, 3, 77),
(15, 2022, 18, 49, 10, 77),
(15, 2023, 18, 10, 15, 77),
(16, 2018, 3, 69, 7, 44),
(16, 2019, 3, 37, 14, 27),
(16, 2020, 12, 10, 15, 27),
(16, 2022, 19, 0, 22, 27),
(16, 2023, 5, 9, 16, 27),
(17, 2018, 4, 170, 6, 3),
(17, 2019, 3, 54, 9, 3),
(17, 2020, 3, 119, 5, 3),
(17, 2021, 15, 115, 8, 3),
(17, 2022, 15, 37, 11, 3),
(17, 2023, 14, 6, 17, 3),
(18, 2022, 18, 6, 18, 24),
(18, 2023, 18, 6, 18, 24),
(19, 2018, 5, 56, 9, 20),
(19, 2019, 5, 20, 16, 20),
(19, 2020, 5, 1, 20, 20),
(19, 2022, 5, 25, 13, 20),
(19, 2023, 5, 3, 19, 20),
(20, 2023, 14, 2, 20, 40),
(21, 2023, 10, 1, 21, 2),
(22, 2022, 10, 2, 21, 24),
(22, 2023, 14, 0, 22, 24),
(23, 2018, 2, 320, 2, 5),
(23, 2019, 2, 240, 5, 5),
(23, 2020, 2, 33, 13, 5),
(23, 2021, 19, 43, 12, 5),
(23, 2022, 19, 37, 12, 5),
(24, 2021, 5, 0, 19, 47),
(24, 2022, 5, 12, 16, 47),
(25, 2020, 10, 0, 21, 6),
(25, 2021, 10, 7, 17, 6),
(25, 2022, 10, 2, 20, 6),
(26, 2018, 2, 251, 3, 7),
(26, 2019, 13, 43, 12, 7),
(26, 2020, 13, 4, 16, 7),
(26, 2021, 18, 10, 16, 7),
(27, 2019, 13, 14, 17, 50),
(27, 2020, 13, 4, 17, 50),
(27, 2021, 18, 3, 18, 50),
(28, 2019, 10, 1, 19, 21),
(28, 2021, 18, 0, 20, 21),
(29, 2021, 5, 0, 21, 9),
(30, 2019, 9, 37, 13, 26),
(30, 2020, 14, 32, 14, 26),
(31, 2018, 5, 37, 14, 8),
(31, 2019, 5, 8, 18, 8),
(31, 2020, 5, 2, 19, 8),
(32, 2020, 10, 0, 22, 89),
(33, 2020, 5, 0, 23, 51),
(34, 2018, 6, 12, 16, 11),
(35, 2018, 8, 9, 17, 9),
(36, 2018, 9, 4, 19, 28),
(37, 2018, 10, 1, 20, 35);

-- --------------------------------------------------------

--
-- Structure de la table `ecurie`
--

DROP TABLE IF EXISTS `ecurie`;
CREATE TABLE IF NOT EXISTS `ecurie` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `couleur` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `ecurie`
--

INSERT INTO `ecurie` (`id`, `nom`, `couleur`) VALUES
(1, 'Mercedes', '#6CD3BF'),
(2, 'Ferrari', '#F91536'),
(3, 'Renault', '#FFF500'),
(4, 'Red Bull Racing', '#3671C6'),
(5, 'Haas', '#B6BABD'),
(6, 'McLaren Renault', '#F58020'),
(7, 'Force India Mercedes', '#F596C8'),
(8, 'Sauber', '#9B0000'),
(9, 'Scuderia Toro Rosso', '#0032FF'),
(10, 'Williams', '#37BEDD'),
(11, 'Force India Sahara', '#F596C8'),
(12, 'Racing Point BWT', '#F596C8'),
(13, 'Alfa Romeo Racing', '#C92D4B'),
(14, 'Alphatauri', '#5E8FAA'),
(15, 'McLaren Mercedes', '#F58020'),
(16, 'Alpine', '#2293D1'),
(17, 'Aston Martin', '#358C75'),
(18, 'Alfa Romeo Ferrari', '#C92D4B'),
(19, 'Aston Martin Aramco', '#358C75'),
(20, 'McLaren', '#F58020'),
(21, 'Alpha Romeo', '#C92D4B'),
(22, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `gerant`
--

DROP TABLE IF EXISTS `gerant`;
CREATE TABLE IF NOT EXISTS `gerant` (
  `identifiant` varchar(40) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`identifiant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `gerant`
--

INSERT INTO `gerant` (`identifiant`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

DROP TABLE IF EXISTS `pilote`;
CREATE TABLE IF NOT EXISTS `pilote` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `paysPil` varchar(30) DEFAULT NULL,
  `dateNais` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`id`, `nom`, `prenom`, `paysPil`, `dateNais`) VALUES
(1, 'Verstappen', 'Max', 'Pays-Bas', '1997-09-30'),
(2, 'Perez', 'Sergio', 'Mexique', '1990-01-26'),
(3, 'Hamilton', 'Lewis', 'Royaume-Uni', '1985-01-07'),
(4, 'Alonso', 'Fernando', 'Espagne', '1981-07-29'),
(5, 'Norris', 'Lando', 'Royaume-Uni', '1999-11-13'),
(6, 'Sainz', 'Carlos', 'Espagne', '1994-09-01'),
(7, 'Leclerc', 'Charles', 'Monaco', '1997-10-16'),
(8, 'Russel', 'George', 'Royaume-Uni', '1998-02-15'),
(9, 'Piastri', 'Oscar', 'Australie', '2001-04-06'),
(10, 'Stroll', 'Lance', 'Canada', '1998-10-29'),
(11, 'Gasly', 'Pierre', 'France', '1996-02-07'),
(12, 'Ocon', 'Estéban', 'France', '1996-09-17'),
(13, 'Albon', 'Alexandre', 'Thailande', '1996-03-23'),
(14, 'Tsunoda', 'Yuki', 'Japon', '2000-05-11'),
(15, 'Bottas', 'Valtteri', 'Finlande', '1989-08-28'),
(16, 'Hülkenberg', 'Nico', 'Allemagne', '1987-08-19'),
(17, 'Ricciardo', 'Daniel', 'Australie', '1989-07-01'),
(18, 'Zhou', 'Guan Yu', 'Chine', '2000-05-30'),
(19, 'Magnussen', 'Kevin', 'Danemark', '1992-10-05'),
(20, 'Lawson', 'Liam', 'Nouvelle-Zélande', '2002-07-11'),
(21, 'Sargeant', 'Logan', 'Etats-Unis', '2000-12-31'),
(22, 'De Vries', 'Nyck', 'Pays-Bas', '1995-02-26'),
(23, 'Vettel', 'Sebastian', 'Allemagne', '1987-07-03'),
(24, 'Schumacher', 'Mick', 'Allemagne', '1999-03-22'),
(25, 'Latifi', 'Nicholas', 'Canada', '1995-06-29'),
(26, 'Räikkönen', 'Kimi', 'Finlande', '1979-10-17'),
(27, 'Giovinazzi', 'Antonio', 'Italie', '1993-12-14'),
(28, 'Kubica', 'Robert', 'Pologne', '1984-12-07'),
(29, 'Mazepin', 'Nikita', 'Russie', '1999-03-02'),
(30, 'Kvyat', 'Daniil', 'Russie', '1994-04-26'),
(31, 'Grosjean', 'Romain', 'France', '1986-04-17'),
(32, 'Aitken', 'Jack', 'Royaume-Uni', '1995-09-23'),
(33, 'Fittipaldi', 'Pietro', 'Brésil', '1996-06-25'),
(34, 'Vandoorne', 'Stoffel', 'Belgique', '1992-03-26'),
(35, 'Ericsson', 'Marcus', 'Suède', '1990-09-02'),
(36, 'Hartley', 'Brendon', 'Nouvelle-Zélande', '1989-11-10'),
(37, 'Sirotkin', 'Sergey', 'Russie', '1995-08-27');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classement`
--
ALTER TABLE `classement`
  ADD CONSTRAINT `classement_ibfk_1` FOREIGN KEY (`idEcu`) REFERENCES `ecurie` (`id`);

--
-- Contraintes pour la table `coursesannee`
--
ALTER TABLE `coursesannee`
  ADD CONSTRAINT `coursesannee_ibfk_1` FOREIGN KEY (`idPil`) REFERENCES `pilote` (`id`),
  ADD CONSTRAINT `coursesannee_ibfk_2` FOREIGN KEY (`idEcu`) REFERENCES `ecurie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
