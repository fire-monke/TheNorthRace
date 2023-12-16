Use bdTheNorthRace;

DROP PROCEDURE if exists AddEcurie;
DELIMITER //
CREATE PROCEDURE AddEcurie (
    IN nomEcu VARCHAR(50),
    IN couleurEcu VARCHAR(40)
)
BEGIN
    INSERT INTO Ecurie(nom, couleur)
	VALUES(nomEcu, couleurEcu);
END //
DELIMITER ;

DROP PROCEDURE if exists deleteEcurieById;
DELIMITER //
CREATE PROCEDURE deleteEcurieById (
    IN idEcurie INT(3)
)
BEGIN
    DELETE FROM CoursesAnnee WHERE idEcu=idEcurie;
    DELETE FROM Classement WHERE idEcu=idEcurie;
	DELETE FROM Ecurie WHERE id = idEcurie;
END //
DELIMITER ;

DROP PROCEDURE if exists updateEcurieColor;
DELIMITER //
CREATE PROCEDURE updateEcurieColor(
    IN idEcu INT(3),
    IN nouvelleCouleurEcu VARCHAR(40)
)
BEGIN
    UPDATE Ecurie
	SET couleur=nouvelleCouleurEcu
	WHERE id=idEcu;
END //
DELIMITER ;

DROP PROCEDURE if exists getEcuries;
DELIMITER //
CREATE PROCEDURE getEcuries()
BEGIN
    SELECT id, nom, couleur FROM Ecurie;
END //
DELIMITER ;

DROP PROCEDURE if exists getEcuriesLastSeason;
DELIMITER //
CREATE PROCEDURE getEcuriesLastSeason()
BEGIN
    SELECT id, nom, couleur FROM Ecurie
    JOIN Classement on id=idEcu
    WHERE annee = (SELECT max(annee) FROM Classement);
END //
DELIMITER ;

DROP PROCEDURE if exists getEcurieById;
DELIMITER //
CREATE PROCEDURE getEcurieById(
	IN idEcu INT(3)
)
BEGIN
    SELECT id, nom, couleur FROM Ecurie
    WHERE id=idEcu;
END //
DELIMITER ;

DROP PROCEDURE if exists getEcurieOfLastSeasonOfPiloteByIdPilote;
DELIMITER //
CREATE PROCEDURE getEcurieOfLastSeasonOfPiloteByIdPilote(
	IN idPilote INT(3)
)
BEGIN
    SELECT id, nom, couleur FROM Ecurie
    JOIN CoursesAnnee ON idEcu=id
    WHERE idPil=idPilote AND annee = (SELECT max(annee) FROM CoursesAnnee);
END //
DELIMITER ;

DROP PROCEDURE if exists getLastEcurieByIdPilote;
DELIMITER //
CREATE PROCEDURE getLastEcurieByIdPilote(
	IN idPilote INT(3)
)
BEGIN
    SELECT id, nom, couleur FROM Ecurie
    JOIN CoursesAnnee ON idEcu=id
    WHERE idPil=idPilote AND annee = (SELECT max(annee) FROM CoursesAnnee WHERE idPil=idPilote);
END //
DELIMITER ;





select * from ecurie;