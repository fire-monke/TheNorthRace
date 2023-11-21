DROP DATABASE if exists bdTheNorthRace;
CREATE DATABASE if not exists bdTheNorthRace;

Use bdTheNorthRace;

CREATE TABLE Pilote (
    id INT(3) AUTO_INCREMENT,
    nom VARCHAR(40),
    prenom VARCHAR(40),
    paysPil VARCHAR(30),
    Primary Key(id)
    )
ENGINE=InnoDB;

CREATE TABLE Ecurie (
    id INT(3) AUTO_INCREMENT,
    nom VARCHAR(40),
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

Create Table CoursesAnnee(
    idPil INT(3) ,
    annee INT(4),
    idEcu INT(3) ,
    nbPointPil INT(4),
    placePil INT(3),
    numPil Int(2),
    PRIMARY KEY(idPil, annee, idEcu),
    FOREIGN KEY(idPil) REFERENCES Pilote(id),
    FOREIGN KEY(idEcu) REFERENCES Ecurie(id)
    )
ENGINE=InnoDB;
