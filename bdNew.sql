DROP DATABASE if exists bdTheNorthRace;
CREATE DATABASE if not exists bdTheNorthRace;

Use bdTheNorthRace;

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


INSERT INTO Pilote (nom, prenom, numPil, paysPil, photoPil)
VALUES
	('Verstappen', 'Max', '1', 'Pays-Bas', Null),
	('Perez', 'Sergio', '11', 'Mexique', Null),
    ('Hamilton', 'Lewis', '44', 'Royaume-Uni', Null),
	('Alonso','Fernando', '14', 'Espagnol', Null),
    ('Norris', 'Lando', '4', 'Royaume-Uni', Null)
    ('Sainz', 'Carlos', '55', 'Espagne', Null),
    ('Leclerc', 'Charles', '16', 'Monaco', Null),
    ('Russel', 'George', '63', 'Royaume-Uni', Null),
    ('Piastri', 'Oscar', '81', 'Australie', Null),
    ('Flâner', 'Lance', '18', 'Canada', Null),
    ('Gasly', 'Pierre', '10', 'France', Null),
    ('Ocon', 'Estéban', '31', 'France', Null),
    ('Albon', 'Alexandre', '23', 'Thailande', Null),
    ('Tsunoda', 'Yuki', '22', 'Japon', Null),
    ('Bottas', 'Valtteri', '77', 'Finlande', Null),
    ('HÜlkenberg', 'Nico', '27', 'Allemagne', Null),
    ('Ricciardo', 'Daniel', '3', 'Australie', Null),
    ('Guan Yu', 'Zhou', '24', 'Chine', Null),
    
    
    