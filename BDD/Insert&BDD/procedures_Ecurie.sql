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


select * from ecurie;