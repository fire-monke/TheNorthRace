Use bdTheNorthRace;

DROP PROCEDURE if exists AddPilote;
DELIMITER //
CREATE PROCEDURE AddPilote (
    IN nomPilote VARCHAR(50),
    IN prenomPilote VARCHAR(50),
    IN paysPilote VARCHAR(50)
)
BEGIN
    INSERT INTO Pilote(nom, prenom, paysPil)
    VALUES(nomPilote, prenomPilote, paysPilote);
END //
DELIMITER ;

DROP PROCEDURE if exists deletePiloteById;
DELIMITER //
CREATE PROCEDURE deletePiloteById (
    IN idPilote INT(3)
)
BEGIN
    DELETE FROM CoursesAnnee WHERE idPil=idPilote;
	DELETE FROM Pilote WHERE id = idPilote;
END //
DELIMITER ;

DROP PROCEDURE if exists updatePilote;
DELIMITER //
CREATE PROCEDURE updatePilote(
    IN idPilote INT(3),
    IN nomPil VARCHAR(40),
    IN prenomPil VARCHAR(40),
    IN paysPilPil VARCHAR(30),
    IN dateNaisPil DATE
)
BEGIN
    UPDATE Pilote
	SET nom=nomPil, prenom=prenomPil, paysPil=paysPilPil
	WHERE id=idPilote;
END //
DELIMITER ;

DROP PROCEDURE if exists getPilotes;
DELIMITER //
CREATE PROCEDURE getPilotes()
BEGIN
    SELECT id, nom, prenom, paysPil, dateNais FROM Pilote;
END //
DELIMITER ;

DROP PROCEDURE if exists getPiloteById;
DELIMITER //
CREATE PROCEDURE getPiloteById(
    IN idPilote INT(3)
)
BEGIN
    SELECT nom, prenom, paysPil, dateNais
	FROM Pilote
	WHERE id = idPilote;
END //
DELIMITER ;

DROP PROCEDURE if exists getAllPointsPiloteById;
DELIMITER //
CREATE PROCEDURE getAllPointsPiloteById(
    IN idPilote INT(3)
)
BEGIN
	SELECT SUM(c.nbPointPil) AS totalPoints
	FROM Pilote p
	INNER JOIN CoursesAnnee c ON p.id = c.idPil
	Where p.id = idPilote;
END //
DELIMITER ;

DROP PROCEDURE if exists getPilotesPodium;
DELIMITER //
CREATE PROCEDURE getPilotesPodium()
BEGIN
	SELECT p.id, p.nom, p.prenom, c.nbPointPil
	FROM Pilote p
	INNER JOIN CoursesAnnee c ON p.id = c.idPil
	ORDER BY c.annee DESC, c.nbPointPil DESC
	LIMIT 3;
END //
DELIMITER ;

DROP PROCEDURE if exists getPilotesByIdEcu;
DELIMITER //
CREATE PROCEDURE getPilotesByIdEcu(
	IN idEcurie INT(3)
)
BEGIN
	SELECT p.nom, p.prenom, e.nom AS nomEcurie
	FROM Pilote p
	INNER JOIN CoursesAnnee c ON p.id = c.idPil
	INNER JOIN Ecurie e ON e.id = c.idEcu
	WHERE c.annee = (
		SELECT MAX(annee)
		FROM CoursesAnnee
	)
	AND c.idEcu = idEcurie
	ORDER BY p.nom;
END //
DELIMITER ;

DROP PROCEDURE if exists getPilotePointsLastSeasonById;
DELIMITER //
CREATE PROCEDURE getPilotePointsLastSeasonById(
	IN idPilote INT(3)
)
BEGIN
    select nbPointPil from coursesannee where idPil=idPilote and annee = (select max(annee) from coursesannee where idPil=idPilote);
END //
DELIMITER ;

DROP PROCEDURE if exists getPilotesLastSeason;
DELIMITER //
CREATE PROCEDURE getPilotesLastSeason()
BEGIN
    select id, nom, prenom, paysPil, dateNais from pilote join coursesannee on id=idPil where annee = (select max(annee) from coursesannee) order by nbPointPil desc;
END //
DELIMITER ;