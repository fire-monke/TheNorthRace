DROP DATABASE if exists bdTheNorthRace;
CREATE DATABASE if not exists bdTheNorthRace;

Use bdTheNorthRace;

CREATE TABLE Pilote (
	id INT(3) AUTO_INCREMENT,
    nom VARCHAR(15),
    prenom VARCHAR(15),
    numPil Int(2),
    paysPil VARCHAR(20),
    Primary Key(id)
    )
ENGINE=InnoDB;


CREATE TABLE Ecurie (
	id INT(3) AUTO_INCREMENT,
    nom VARCHAR(15),
    Primary Key(id)
    )
ENGINE=InnoDB;
    
Create Table Classement(
	idEcu INT(3),
    annee INT(4),
    nbPointEcu INT(4),
    placeEcu INT(3),
    PRIMARY KEY(idEcu, annee),
    FOREIGN KEY(idEcu) REFERENCES Ecurie(id)
    )
ENGINE=InnoDB;
    
    
Create Table CalculPoint(
	idPil INT(3) ,
    annee INT(4),
    idEcu INT(3) ,
    nbPointPil INT(4),
    placePil INT(3),
    PRIMARY KEY(idPil, annee, idEcu),
    FOREIGN KEY(idPil) REFERENCES Pilote(id),
    FOREIGN KEY(idEcu) REFERENCES Ecurie(id)
    )
ENGINE=InnoDB;

    