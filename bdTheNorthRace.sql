DROP DATABASE if exists bdTheNorthRace;
CREATE DATABASE if not exists bdTheNorthRace;

Use bdTheNorthRace;
Drop Table if exists Pilote;
Drop Table if exists Ecurie;
Drop Table if exists Classement;
Drop Table if exists CalculPoint;

CREATE TABLE Pilote (
	id INT(3) AUTO_INCREMENT,
    nom VARCHAR(15),
    prenom VARCHAR(15),
    numPil Int(2),
    paysPil VARCHAR(15),
    photoPil VARCHAR(250),
    Primary Key(id)
    )
ENGINE=InnoDB;


CREATE TABLE Ecurie (
	id INT(3) AUTO_INCREMENT,
    nom VARCHAR(15),
    logoEcu VARCHAR(250),
    photoEcu VARCHAR(250),
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
    

    
