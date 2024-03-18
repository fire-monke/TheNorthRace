DROP DATABASE if exists bdTheNorthRace;
CREATE DATABASE if not exists bdTheNorthRace;

Use bdTheNorthRace;
CREATE TABLE Gerant(
	identifiant VARCHAR(40) PRIMARY KEY,
    password VARCHAR(50)
    );
INSERT INTO Gerant(identifiant, password) VALUES('admin','admin');

CREATE TABLE Pilote (
    id INT(3) AUTO_INCREMENT,
    nom VARCHAR(40),
    prenom VARCHAR(40),
    paysPil VARCHAR(30),
    dateNais Date,
    Primary Key(id)
    )
ENGINE=InnoDB;

CREATE TABLE if not exists Ecurie (
    id INT(3) AUTO_INCREMENT,
    nom VARCHAR(40) NOT NULL,
    couleur VARCHAR(20) NOT NULL,
    dateCreation YEAR DEFAULT '2024' NOT NULL,
    localisation VARCHAR(50) DEFAULT 'Inconnue' NOT NULL,
    nbTitresConstructeur INT DEFAULT 0 NOT NULL, 
    nbCoursesDisputees INT DEFAULT 0 NOT NULL,
    nbVictoires INT DEFAULT 0 NOT NULL, 
    nbPoduims INT DEFAULT 0 NOT NULL,
    directeur VARCHAR(80) DEFAULT 'Inconnu' NOT NULL, 
    Primary Key(id)
) ENGINE=InnoDB;

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

-- 2023
INSERT INTO Pilote (nom, prenom, paysPil, dateNais) VALUES
    ('Verstappen', 'Max', 'Pays-Bas', '1997-09-30'),
    ('Perez', 'Sergio', 'Mexique', '1990-01-26'),
    ('Hamilton', 'Lewis', 'Royaume-Uni', '1985-01-07'),
    ('Alonso', 'Fernando', 'Espagne', '1981-07-29'),
    ('Norris', 'Lando', 'Royaume-Uni', '1999-11-13'),
    ('Sainz', 'Carlos', 'Espagne', '1994-09-01'),
    ('Leclerc', 'Charles', 'Monaco', '1997-10-16'),
    ('Russel', 'George', 'Royaume-Uni', '1998-02-15'),
    ('Piastri', 'Oscar', 'Australie', '2001-04-06'),
    ('Stroll', 'Lance', 'Canada', '1998-10-29'),
    ('Gasly', 'Pierre', 'France', '1996-02-07'),
    ('Ocon', 'Estéban', 'France', '1996-09-17'),
    ('Albon', 'Alexandre', 'Thailande', '1996-03-23'),
    ('Tsunoda', 'Yuki', 'Japon', '2000-05-11'),
    ('Bottas', 'Valtteri', 'Finlande', '1989-08-28'),
    ('Hülkenberg', 'Nico', 'Allemagne', '1987-08-19'),
    ('Ricciardo', 'Daniel', 'Australie', '1989-07-01'),
    ('Zhou', 'Guan Yu', 'Chine', '2000-05-30'),
    ('Magnussen', 'Kevin', 'Danemark', '1992-10-05'),
    ('Lawson', 'Liam', 'Nouvelle-Zélande', '2002-07-11'),
    ('Sargeant', 'Logan', 'Etats-Unis', '2000-12-31'),
    ('De Vries', 'Nyck', 'Pays-Bas', '1995-02-26'),
    
    
       -- Pilote de l'année 2022
    -- ('Verstappen', 'Max', 'Pays-Bas', '1997-09-30'),
    -- ('Leclerc', 'Charles', 'Monaco', '1997-10-16'),
    -- ('Perez', 'Sergio', 'Mexique', '1990-01-26'),
    -- ('Russel', 'George', 'Royaume-Uni', '1998-02-15'),
    -- ('Sainz', 'Carlos', 'Espagne', '1994-09-01'),
    -- ('Hamilton', 'Lewis', 'Royaume-Uni', '1985-01-07'),
    -- ('Norris', 'Lando', 'Royaume-Uni', '1999-11-13'),
    -- ('Ocon', 'Estéban', 'France', '1996-09-17'),
    -- ('Alonso','Fernando', 'Espagne', '1981-07-29'),
    -- ('Bottas', 'Valtteri', 'Finlande', '1989-08-28'),
    -- ('Ricciardo', 'Daniel', 'Australie', '1989-07-01'),
    ('Vettel', 'Sebastian', 'Allemagne', '1987-07-03'),
    -- ('Magnussen', 'Kevin', 'Danemark', '1992-10-05'),
    -- ('Gasly', 'Pierre', 'France', '1996-02-07'),
    -- ('Stroll', 'Lance', 'Canada', '1998-10-29'),
    ('Schumacher', 'Mick', 'Allemagne', '1999-03-22'),
    -- ('Tsunoda', 'Yuki', 'Japon', '2000-05-11'),
    -- ('Zhou', 'Guan Yu', 'Chine', '2000-05-30'),
    -- ('Albon', 'Alexandre', 'Thailande', '1996-03-23'),
    ('Latifi', 'Nicholas', 'Canada', '1995-06-29'),
    -- ('De Vries', 'Nyck', 'Pays-Bas', '1995-02-06'),
    -- ('Hülkenberg', 'Nico', 'Allemagne', '1987-08-19'),
    
    -- Pilote de l'année 2021
    -- ('Verstappen', 'Max', 'Pays-Bas', '1997-09-30'),
    -- ('Hamilton', 'Lewis', 'Royaume-Uni', '1985-01-07'),
    -- ('Bottas', 'Valtteri', 'Finlande', '1989-08-28'),
    -- ('Perez', 'Sergio', 'Mexique', '1990-01-26'),
    -- ('Sainz', 'Carlos', 'Espagne', '1994-09-01'),
    -- ('Norris', 'Lando', 'Royaume-Uni', '1999-11-13'),
    -- ('Leclerc', 'Charles', 'Monaco', '1997-10-16'),
    -- ('Ricciardo', 'Daniel', 'Australie', '1989-07-01'),
    -- ('Gasly', 'Pierre', 'France', '1996-02-07'),
    -- ('Alonso','Fernando', 'Espagne', '1981-07-29'),
    -- ('Ocon', 'Estéban', 'France', '1996-09-17'),
    -- ('Vettel', 'Sebastian', 'Allemagne', '1987-07-03'),
    -- ('Stroll', 'Lance', 'Canada', '1998-10-29'),
    -- ('Tsunoda', 'Yuki', 'Japon', '2000-05-11'),
    -- ('Russel', 'George', 'Royaume-Uni', '1998-02-15'),
    ('Räikkönen', 'Kimi', 'Finlande', '1979-10-17'),
    -- ('Latifi', 'Nicholas', 'Canada', '1995-06-29'),
    ('Giovinazzi', 'Antonio', 'Italie', '1993-12-14'),
    -- ('Schumacher', 'Mick', 'Allemagne', '1999-03-22'),
    ('Kubica', 'Robert', 'Pologne', '1984-12-07'),
    ('Mazepin', 'Nikita', 'Russie', '1999-03-02'),
    
    
-- Pilote de l'année 2020

-- ('Hamilton', 'Lewis', 'Royaume-Uni', '1985-01-07'),
-- ('Bottas', 'Valtteri', 'Finlande', '1989-08-28'),
-- ('Verstappen', 'Max', 'Pays-Bas', '1997-09-30'),
-- ('Perez', 'Sergio', 'Mexique', '1990-01-26'),
-- ('Ricciardo', 'Daniel', 'Australie', '1989-07-01'),
-- ('Sainz', 'Carlos', 'Espagne', '1994-09-01'),
-- ('Albon', 'Alexandre', 'Thailande', '1996-03-23'),
-- ('Leclerc', 'Charles', 'Monaco', '1997-10-16'),
-- ('Norris', 'Lando', 'Royaume-Uni', '1999-11-13'),
-- ('Gasly', 'Pierre', 'France', '1996-02-07'),
-- ('Stroll', 'Lance', 'Canada', '1998-10-29'),
-- ('Ocon', 'Estéban', 'France', '1996-09-17'),
-- ('Vettel', 'Sebastian', 'Allemagne', '1987-07-03'),
('Kvyat', 'Daniil', 'Russie', '1994-04-26'),
-- ('Hülkenberg', 'Nico', 'Allemagne', '1987-08-19'),
-- ('Räikkönen', 'Kimi', 'Finlande', '1979-10-17'),
('Grosjean', 'Romain', 'France', '1986-04-17'),
-- ('Magnussen', 'Kevin', 'Danemark', '1992-10-05'),
('Aitken', 'Jack', 'Royaume-Uni', '1995-09-23'),
('Fittipaldi', 'Pietro', 'Brésil', '1996-06-25'),

-- Pilote de l'année 2019

-- ('Hamilton', 'Lewis', 'Royaume-Uni', '1985-01-07'),
-- ('Bottas', 'Valtteri', 'Finlande', '1989-08-28'),
-- ('Verstappen', 'Max', 'Pays-Bas', '1997-09-30'),
-- ('Leclerc', 'Charles', 'Monaco', '1997-10-16'),
-- ('Vettel', 'Sebastian', 'Allemagne', '1987-07-03'),
-- ('Sainz', 'Carlos', 'Espagne', '1994-09-01'),
-- ('Gasly', 'Pierre', 'France', '1996-02-07'),
-- ('Albon', 'Alexandre', 'Thailande', '1996-03-23'),
-- ('Ricciardo', 'Daniel', 'Australie', '1989-07-01'),
-- ('Perez', 'Sergio', 'Mexique', '1990-01-26'),
-- ('Norris', 'Lando', 'Royaume-Uni', '1999-11-13'),
-- ('Räikkönen', 'Kimi', 'Finlande', '1979-10-17'),
-- ('Kvyat', 'Daniil', 'Russie', '1994-04-26'),
-- ('Hülkenberg', 'Nico', 'Allemagne', '1987-08-19'),
-- ('Stroll', 'Lance', 'Canada', '1998-10-29'),
-- ('Magnussen', 'Kevin', 'Danemark', '1992-10-05'),
-- ('Giovinazzi', 'Antonio', 'Italie', '1993-12-14'),
-- ('Grosjean', 'Romain', 'France', '1986-04-17'),
-- ('Kubica', 'Robert', 'Pologne', '1984-12-07'),
-- ('Russel', 'George', 'Royaume-Uni', '1998-02-15'),

-- Pilote de l'année 2018

-- ('Hamilton', 'Lewis', 'Royaume-Uni', '1985-01-07'),
-- ('Vettel', 'Sebastian', 'Allemagne', '1987-07-03'),
-- ('Räikkönen', 'Kimi', 'Finlande', '1979-10-17'),
-- ('Verstappen', 'Max', 'Pays-Bas', '1997-09-30'),
-- ('Bottas', 'Valtteri', 'Finlande', '1989-08-28'),
-- ('Ricciardo', 'Daniel', 'Australie', '1989-07-01'),
-- ('Hülkenberg', 'Nico', 'Allemagne', '1987-08-19'),
-- ('Perez', 'Sergio', 'Mexique', '1990-01-26'),
-- ('Magnussen', 'Kevin', 'Danemark', '1992-10-05'),
-- ('Sainz', 'Carlos', 'Espagne', '1994-09-01'),
-- ('Alonso','Fernando', 'Espagne', '1981-07-29'),
-- ('Ocon', 'Estéban', 'France', '1996-09-17'),
-- ('Leclerc', 'Charles', 'Monaco', '1997-10-16'),
-- ('Grosjean', 'Romain', 'France', '1986-04-17'),
-- ('Gasly', 'Pierre', 'France', '1996-02-07'),
('Vandoorne', 'Stoffel', 'Belgique', '1992-03-26'),
('Ericsson', 'Marcus', 'Suède', '1990-09-02'),
-- ('Stroll', 'Lance', 'Canada', '1998-10-29'),
('Hartley', 'Brendon', 'Nouvelle-Zélande', '1989-11-10'),
('Sirotkin', 'Sergey', 'Russie', '1995-08-27');

-- 2018
INSERT INTO Ecurie (nom, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur) VALUES
	('Mercedes', '#6CD3BF', 1954, 'Brackley, Royaume-Uni', 8, 270, 125, 281, 'Toto Wolff'),
	('Ferrari', '#F91536', 1929, 'Maranello, Italie', 16, 1073, 243, 806, 'Frédéric Vasseur');
    
INSERT INTO Ecurie (nom, couleur) VALUES
	('Renault', '#FFF500');
    
INSERT INTO Ecurie (nom, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur) VALUES
	('Red Bull Racing', '#3671C6', 2005, 'Milton Keynes, Royaume-Uni', 6, 369, 114, 263, 'Christian Horner'),
	('Haas', '#B6BABD', 2016, 'Kannapolis, États-Unis', 0, 142, 0, 0, 'Ayao Komatsu');
    
INSERT INTO Ecurie (nom, couleur) VALUES
	('McLaren Renault', '#F58020'),
	('Force India Mercedes', '#F596C8'),
	('Sauber', '#9B0000'),
	('Scuderia Toro Rosso', '#0032FF');
    
INSERT INTO Ecurie (nom, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur) VALUES
	('Williams', '#37BEDD', 1977, 'Grove, Royaume-Uni', 9, 745, 114, 312, 'James Vowles');

INSERT INTO Ecurie (nom, couleur) VALUES
	('Force India Sahara', '#F596C8'),

-- 2019
	-- ('MERCEDES', '#6CD3BF'),
	-- ('FERRARI', '#F91536'),
	-- ('Red Bull Racing', '#3671C6'),
	-- ('MCLAREN RENAULT', '#F58020'),
	-- ('RENAULT', '#FFF500'),
	-- ('SCUDERIA TORO ROSSO HONDA', '#0032FF'),
	('Racing Point BWT','#F596C8'),
	('Alfa Romeo Racing','#C92D4B');
	-- ('HAAS FERRARI', '#B6BABD'),
	-- ('WILLIAMS MERCEDES', '#37BEDD'),

-- 2020
	-- ('MERCEDES', '#6CD3BF'),
	-- ('RED BULL RACING HONDA', '#3671C6'),
	-- ('MCLAREN RENAULT', '#F58020'),
	-- ('RACING POINT BWT MERCEDES', '#F596C8'),
	-- ('RENAULT', '#FFF500'),
	-- ('FERRARI', '#F91536'),
INSERT INTO Ecurie (nom, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur) VALUES
	 ('Alphatauri','#5E8FAA',2006, 'Faenza, Italie', 0, 346, 2, 5, 'Laurent Mekies'),
	-- ('ALFA ROMEO RACING FERRARI', '#C92D4B'),
	-- ('HAAS FERRARI', '#B6BABD'),
	-- ('WILLIAMS MERCEDES', '#37BEDD'),

-- 2021
	-- ('MERCEDES', '#6CD3BF'),
	-- ('RED BULL RACING HONDA', '#3671C6'),
	-- ('FERRARI', '#F91536'),
	('McLaren Mercedes','#F58020', 1963, 'Woking, Royaume-Uni', 8, 880, 183, 501, 'Bruno Famin'),
	('Alpine','#2293D1' ,2021, 'Enstone, Royaume-Uni', 2, 471, 36, 107, 'Laurent Rossi'),
	-- ('ALPHATAURI HONDA', '#5E8FAA'),
	('Aston Martin','#358C75', 2021, 'Silverstone, Royaume-Uni', 0, 71, 0, 9, 'Mike Krack'),
	-- ('WILLIAMS MERCEDES', '#37BEDD'),
	-- ('ALFA ROMEO RACING FERRARI', '#C92D4B'),
	-- ('HAAS FERRARI', '#B6BABD')

-- 2022
	-- ('Red Bull Racing', '#3671C6'),
	-- ('FERRARI', '#F91536'),
	-- ('MERCEDES', '#6CD3BF'),
	-- ('Alpine Renault', '#2293D1'),
	-- ('McLaren Mercedes', '#F58020'),
	('Alfa Romeo Ferrari','#C92D4B', 1950, 'Hinwil, Suisse', 0, 175, 10, 26, 'Allessandro Alunni Bravi'),
	('Aston Martin Aramco','#358C75', 2021, 'Silverstone, Royaume-Uni', 0, 71, 0, 9, 'Mike Krack');
	-- ('HAAS FERRARI', '#B6BABD')
	-- ('Alphatauri', '#5E8FAA')
	-- ('WILLIAMS MERCEDES', '#37BEDD'),

-- 2023
	-- ('Red Bull Racing', '#3671C6'),
	-- ('Mercedes', '#6CD3BF'), (Commenté car déjà présent dans 2018)
	-- ('Ferrari', '#F91536'), (Commenté car déjà présent dans 2018)
INSERT INTO Ecurie (nom, couleur) VALUES
	('McLaren','#F58020'),
	-- ('Aston Martin', '#358C75'),
	-- ('Alpine', '#2293D1'),
	-- ('Williams', '#37BEDD'),
	-- ('Alphatauri', '#5E8FAA'),
	('Alpha Romeo','#C92D4B');
	-- ('Hass', '#B6BABD')

-- 2023 
Insert into Classement(idEcu, annee, nbPointEcu, placeEcu) Values
	(4, 2023, 822, 1),
    (1, 2023, 392, 2),
    (2, 2023, 388, 3),
    (15, 2023, 284, 4),
    (19, 2023, 273, 5),
    (16, 2023, 120, 6),
    (10, 2023, 28, 7),
    (14, 2023, 21, 8),
    (18, 2023, 16, 9),
    (5, 2023, 12, 10);
    
 -- 2022  
Insert into Classement(idEcu, annee, nbPointEcu, placeEcu) Values
	(4, 2022, 759, 1),
    (2, 2022, 554, 2),
    (1, 2022, 515, 3),
    (16, 2022, 173, 4),
    (15, 2022, 159, 5),
    (18, 2022, 55, 6),
    (19, 2022, 55, 7),
    (5, 2022, 37, 8),
    (14, 2022, 35, 9),
    (10, 2022, 8, 10);
    
-- 2021 
Insert into Classement(idEcu, annee, nbPointEcu, placeEcu) Values
	(1, 2021, 613, 1),
    (4, 2021, 585, 2),
    (2, 2021, 323, 3),
    (15, 2021, 275, 4),
    (16, 2021, 155, 5),
    (14, 2021, 142, 6),
    (17, 2021, 77, 7),
    (10, 2021, 23, 8),
    (13, 2021, 13, 9),
    (5, 2021, 0, 10);
    
-- 2020 
Insert into Classement(idEcu, annee, nbPointEcu, placeEcu) Values
	(1, 2020, 573, 1),
    (4, 2020, 319, 2),
    (6, 2020, 202, 3),
    (12, 2020, 195, 4),
    (3, 2020, 181, 5),
    (2, 2020, 131, 6),
    (14, 2020, 107, 7),
    (13, 2020, 8, 8),
    (5, 2020, 3, 9),
    (10, 2020, 0, 10);
    
-- 2019
Insert into Classement(idEcu, annee, nbPointEcu, placeEcu) Values
	(1, 2019, 739, 1),
    (2, 2019, 504, 2),
    (4, 2019, 417, 3),
    (6, 2019, 145, 4),
    (3, 2019, 91, 5),
    (9, 2019, 85, 6),
    (12, 2019, 73, 7),
    (13, 2019, 57, 8),
    (5, 2019, 28, 9),
    (10, 2019, 1, 10);
    
-- 2018 
Insert into Classement(idEcu, annee, nbPointEcu, placeEcu) Values
	(1, 2018, 655, 1),
	(2, 2018, 571, 2),
	(4, 2018, 419, 3),
	(3, 2018, 122, 4),
	(5, 2018, 93, 5),
	(6, 2018, 62, 6),
	(7, 2018, 52, 7),
	(8, 2018, 48, 8),
	(9, 2018, 33, 9),
	(10, 2018, 7, 10);
    
-- Insert de l'année 2018
INSERT INTO CoursesAnnee(idPil, annee, idEcu, nbPointPil, placePil, numPil) VALUES
	(3, 2018, 1, 408, 1, 44),
	(23, 2018, 2, 320, 2, 5),
	(26, 2018, 2, 251, 3, 7),
	(1, 2018, 4, 249, 4, 33),
	(15, 2018, 1, 247, 5, 77),
	(17, 2018, 4, 170, 6, 3),
	(16, 2018, 3, 69, 7, 44),
	(2, 2018, 11, 62, 8, 11),
	(19, 2018, 5, 56, 9, 20),
	(6, 2018, 3, 53, 10, 55),
	(4, 2018, 6, 50, 11, 14),
	(12, 2018, 11, 49, 12, 31),
	(7, 2018, 8, 39, 13, 16),
	(31, 2018, 5, 37, 14, 8),
	(11, 2018, 9, 29, 15, 10),
	(34, 2018, 6, 12, 16, 11),
	(35, 2018, 8, 9, 17, 9),
	(10, 2018, 10, 6, 18, 18),
	(36, 2018, 9, 4, 19, 28),
	(37, 2018, 10, 1, 20, 35);

-- Insert de l'année 2019
INSERT INTO CoursesAnnee(idPil, annee, idEcu, nbPointPil, placePil, numPil) VALUES
	(3, 2019, 1, 413, 1, 44),
	(15, 2019, 1, 326, 2, 77),
	(1, 2019, 4, 278, 3, 33),
	(7, 2019, 2, 264, 4, 16),
	(23, 2019, 2, 240, 5, 5),
	(6, 2019, 6, 96, 6, 55),
	(11, 2019, 9, 95, 7, 10),
	(13, 2019, 4, 92, 8, 23),
	(17, 2019, 3, 54, 9, 3),
	(2, 2019, 12, 52, 10, 11),
	(5, 2019, 6, 49, 11, 4),
	(26, 2019, 13, 43, 12, 7),
	(30, 2019, 9, 37, 13, 26),
	(16, 2019, 3, 37, 14, 27),
	(10, 2019, 12, 21, 15, 18),
	(19, 2019, 5, 20, 16, 20),
	(27, 2019, 13, 14, 17, 50),
	(31, 2019, 5, 8, 18, 8),
	(28, 2019, 10, 1, 19, 21),
	(8, 2019, 10, 0, 20, 63);

-- Année 2020
INSERT INTO CoursesAnnee (idPil, annee, idEcu, nbPointPil, placePil, numPil) VALUES
    (3, 2020, 1, 347, 1, 44),
    (15, 2020, 1, 223, 2, 77),
	(1, 2020, 4, 214, 3, 1),
    (2, 2020, 12, 125, 4, 11),
	(17, 2020, 3, 119, 5, 3),
    (6, 2020,6, 105, 6, 55),
    (13, 2020, 4, 105, 7, 23),
	(7, 2020, 2, 98, 8, 16),
    (5, 2020, 6, 97, 9, 4),
	(11, 2020, 14, 75, 10, 10),
    (10, 2020, 12, 75, 11, 18),    
    (12, 2020, 3, 62, 12, 31),    
	(23, 2020, 2, 33, 13, 5),
	(30, 2020, 14, 32, 14, 26),
    (16, 2020, 12, 10, 15, 27),
	(26, 2020, 13, 4, 16, 7),
    (27, 2020, 13, 4, 17, 50), 
	(8, 2020, 10, 3, 18, 63), 
    (31, 2020, 5, 2, 19, 8), 
    (19, 2020, 5, 1, 20, 20), 
    (25, 2020, 10, 0, 21, 6), 
    (32, 2020, 10, 0, 22, 89), 
    (33, 2020, 5, 0, 23, 51);
    
    -- Année 2021
INSERT INTO CoursesAnnee(idPil, annee, idEcu, nbPointPil, placePil, numPil) VALUES 
    (1, 2021, 4, 395, 1, 1),
	(3, 2021, 1, 387, 2, 44),
    (15, 2021, 1, 226, 3, 77),
    (2, 2021, 4, 190, 4, 11),
	(6, 2021,2, 164, 5, 55),
	(5, 2021, 15, 160, 6, 4),
    (7, 2021, 2, 159, 7, 16),   
    (17, 2021, 15, 115, 8, 3),
    (11, 2021, 14, 110, 9, 10),
    (4, 2021, 16, 81, 10, 14),
    (12, 2021, 16, 74, 11, 31),  
    (23, 2021, 19, 43, 12, 5),
    (10, 2021, 19, 34, 13, 18),  
    (14, 2021, 14, 34, 14, 18),
    (8, 2021, 10, 16, 15, 63), 
    (26, 2021, 18, 10, 16, 7),
    (25, 2021, 10, 7, 17, 6),
	(27, 2021, 18, 3, 18, 50), 
    (24, 2021, 5, 0, 19, 47),
    (28, 2021, 18, 0, 20, 21),
    (29, 2021, 5, 0, 21, 9);


-- Insert de l'année 2022
INSERT INTO CoursesAnnee(idPil, annee, idEcu, nbPointPil, placePil, numPil) VALUES
	(1, 2022, 4, 454, 1, 1),
	(7, 2022, 2, 308, 2, 16),
	(2, 2022, 4, 305, 3, 11),
	(8, 2022, 1, 275, 4, 63),
	(6, 2022, 2, 246, 5, 55),
	(3, 2022, 1, 240, 6, 44),
	(5, 2022, 15, 122, 7, 4),
	(12, 2022, 16, 92, 8, 31),
	(4, 2022, 16, 81, 9, 14),
	(15, 2022, 18, 49, 10, 77),
	(17, 2022, 15, 37, 11, 3),
	(23, 2022, 19, 37, 12, 5),
	(19, 2022, 5, 25, 13, 20),
	(11, 2022, 14, 23, 14, 10),
	(10, 2022, 19, 18, 15, 18),
	(24, 2022, 5, 12, 16, 47),
	(14, 2022, 14, 12, 17, 22),
	(18, 2022, 18, 6, 18, 24),
	(13, 2022, 10, 4, 19, 23),
	(25, 2022, 10, 2, 20, 6),
	(22, 2022, 10, 2, 21, 24),
	(16, 2022, 19, 0, 22, 27);

-- Insert de l'année 2023
INSERT INTO CoursesAnnee(idPil, annee, idEcu, nbPointPil, placePil, numPil) VALUES
	(1, 2023, 4, 549, 1, 1),
	(2, 2023, 4, 273, 2, 11),
	(3, 2023, 1, 232, 3, 44),
	(6, 2023, 2, 200, 4, 55),
	(4, 2023, 19, 200, 5, 14),
	(5, 2023, 15, 195, 6, 4),
	(7, 2023, 2, 188, 7, 16),
	(8, 2023, 1, 160, 8, 63),
	(9, 2023, 15, 89, 9, 81),
	(10, 2023, 19, 73, 10, 18),
	(11, 2023, 16, 62, 11, 10),
	(12, 2023, 16, 58, 12, 31),
	(13, 2023, 10, 27, 13, 23),
	(14, 2023, 14, 13, 14, 22),
	(15, 2023, 18, 10, 15, 77),
	(16, 2023, 5, 9, 16, 27),
	(17, 2023, 14, 6, 17, 3),
	(18, 2023, 18, 6, 18, 24),
	(19, 2023, 5, 3, 19, 20),
	(20, 2023, 14, 2, 20, 40),
	(21, 2023, 10, 1, 21, 2),
	(22, 2023, 14, 0, 22, 24);   
    
    
-- PROCEDURES STOCKEES PARAMETREES
-- -------------------------------------
-- PILOTE PILOTE PILOTE PILOTE PILOTE
-- -------------------------------------

DROP PROCEDURE IF EXISTS AddPilote;
DELIMITER //
CREATE PROCEDURE AddPilote (
    IN nomPilote VARCHAR(50),
    IN prenomPilote VARCHAR(50),
    IN paysPilote VARCHAR(50),
    OUT idPilote INT
)
BEGIN
    INSERT INTO Pilote(nom, prenom, paysPil)
    VALUES(nomPilote, prenomPilote, paysPilote);
    
    SET idPilote = LAST_INSERT_ID();
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
	SELECT p.id, p.nom, p.prenom, e.nom AS nomEcurie
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


-- PROCEDURES STOCKEES PARAMETREES
-- -------------------------------------
-- ECURIE ECURIE ECURIE ECURIE ECURIE
-- -------------------------------------

DROP PROCEDURE if exists AddEcurie;
DELIMITER //
CREATE PROCEDURE AddEcurie (
    IN nomEcu VARCHAR(50),
    IN couleurEcu VARCHAR(20),
    IN dateCreation YEAR,
    IN localisation VARCHAR(50),
    IN nbTitresConstructeur INT,
    IN nbCoursesDisputees INT,
    IN nbVictoires INT,
    IN nbPoduims INT,
    IN directeur VARCHAR(80),
    OUT idEcurie INT
)
BEGIN
    INSERT INTO Ecurie(nom, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur)
	VALUES(nomEcu, couleurEcu, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur);
    
	SET idEcurie = LAST_INSERT_ID();
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
    IN new_CouleurEcu VARCHAR(40),
    IN new_dateCreation year,
    IN new_localisation VARCHAR(50),
    IN new_nbTitresConstructeur INT,
	IN new_nbCoursesDisputees INT,
    IN new_nbVictoires INT,
    IN new_nbPoduims INT,
    IN new_directeur VARCHAR(50)
)
BEGIN
    UPDATE Ecurie
	SET couleur=new_CouleurEcu,
        dateCreation=new_dateCreation,
        localisation=new_localisation,
        nbTitresConstructeur=new_nbTitresConstructeur,
        nbCoursesDisputees=new_nbCoursesDisputees,
        nbVictoires=new_nbVictoires,
        nbPoduims=new_nbPoduims,
        directeur=new_directeur
	WHERE id=idEcu;
END //
DELIMITER ;

DROP PROCEDURE if exists getEcuries;
DELIMITER //
CREATE PROCEDURE getEcuries()
BEGIN
    SELECT id, nom, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur FROM Ecurie;
END //
DELIMITER ;

DROP PROCEDURE if exists getEcuriesLastSeason;
DELIMITER //
CREATE PROCEDURE getEcuriesLastSeason()
BEGIN
    SELECT id, nom, annee, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur FROM Ecurie
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
    SELECT id, nom, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur FROM Ecurie
    WHERE id=idEcu;
END //
DELIMITER ;

DROP PROCEDURE if exists getEcurieOfLastSeasonOfPiloteByIdPilote;
DELIMITER //
CREATE PROCEDURE getEcurieOfLastSeasonOfPiloteByIdPilote(
	IN idPilote INT(3)
)
BEGIN
    SELECT id, nom, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur FROM Ecurie
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
    SELECT id, nom, couleur, dateCreation, localisation, nbTitresConstructeur, nbCoursesDisputees, nbVictoires, nbPoduims, directeur FROM Ecurie
    JOIN CoursesAnnee ON idEcu=id
    WHERE idPil=idPilote AND annee = (SELECT max(annee) FROM CoursesAnnee WHERE idPil=idPilote);
END //
DELIMITER ;

-- PROCEDURES STOCKEES PARAMETREES
-- -------------------------------------
-- CoursesAnnee CoursesAnnee
-- -------------------------------------

DROP PROCEDURE IF EXISTS getAllCoursesByYear;
DELIMITER //
CREATE PROCEDURE getAllCoursesByYear (IN year INT) BEGIN
    SELECT c.idPil,c.annee,c.idEcu,c.nbPointPil,c.placePil,c.numPil, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.annee = year
    ORDER BY c.nbPointPil DESC;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS getCoursesDetailsByPilot;
DELIMITER //
CREATE PROCEDURE getCoursesDetailsByPilot (IN idPil INT) BEGIN
    SELECT c.idPil,c.annee,c.idEcu,c.nbPointPil,c.placePil,c.numPil, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idPil = idPil;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS getCoursesDetailsByPilotAndYear;
DELIMITER //
CREATE PROCEDURE getCoursesDetailsByPilotAndYear (IN idPil INT, IN year INT) BEGIN
    SELECT c.idPil,c.annee,c.idEcu,c.nbPointPil,c.placePil,c.numPil, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idPil = idPil AND c.annee = year;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS getCoursesDetailsByPilotTeamAndYear;
DELIMITER //
CREATE PROCEDURE getCoursesDetailsByPilotTeamAndYear (IN idPil INT, IN idEcu INT, IN year INT) BEGIN
    SELECT c.idPil,c.annee,c.idEcu,c.nbPointPil,c.placePil,c.numPil, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idPil = idPil AND c.idEcu = idEcu AND c.annee = year;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS getCoursesDetailsByTeam;
DELIMITER //
CREATE PROCEDURE getCoursesDetailsByTeam (IN idEcu INT) BEGIN
    SELECT c.idPil,c.annee,c.idEcu,c.nbPointPil,c.placePil,c.numPil, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idEcu = idEcu;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS getCoursesDetailsByTeamAndYear;
DELIMITER //
CREATE PROCEDURE getCoursesDetailsByTeamAndYear (IN idEcu INT, IN year INT) BEGIN
    SELECT c.idPil,c.annee,c.idEcu,c.nbPointPil,c.placePil,c.numPil, p.nom AS nomPilote, p.prenom AS prenomPilote, e.nom AS nomEcurie
    FROM CoursesAnnee c
    INNER JOIN Pilote p ON c.idPil = p.id
    INNER JOIN Ecurie e ON c.idEcu = e.id
    WHERE c.idEcu = idEcu AND c.annee = year;
END //
DELIMITER ;


DROP PROCEDURE IF EXISTS AddRaceYear;
DELIMITER //
CREATE PROCEDURE AddRaceYear(
    IN pilotId INT,
    IN yearRace INT,
    IN teamId INT,
    IN points INT,
    IN pilotPlace INT,
    IN pilotNumber INT
)
BEGIN
    INSERT INTO CoursesAnnee(idPil, annee, idEcu, nbPointPil, placePil, numPil) 
    VALUES(pilotId, yearRace, teamId, points, pilotPlace, pilotNumber);
END//
DELIMITER ;


DROP PROCEDURE IF EXISTS DeleteRaceYear;
DELIMITER //
CREATE PROCEDURE DeleteRaceYear(
    IN pilotId INT,
    IN teamID INT,
    IN yearRace INT
)
BEGIN
    DELETE FROM CoursesAnnee 
    WHERE idPil = pilotId AND annee = yearRace AND idEcu = teamId;
END//
DELIMITER ;


DROP PROCEDURE IF EXISTS UpdateRaceForYear;
DELIMITER //
CREATE PROCEDURE UpdateRaceForYear(
    IN pilotId INT,
    IN yearRace INT,
    IN teamId INT,
    IN newPoints INT,
    IN newPilotPlace INT,
    IN newPilotNumber INT
)
BEGIN
    UPDATE CoursesAnnee 
    SET nbPointPil = newPoints, 
        placePil = newPilotPlace, 
        numPil = newPilotNumber
    WHERE idPil = pilotId AND annee = yearRace AND idEcu = teamId;
END//
DELIMITER ;

-- PROCEDURES STOCKEES PARAMETREES
-- -------------------------------------
-- Classement Classement 
-- -------------------------------------
DROP PROCEDURE IF EXISTS getClassementByYear
DELIMITER //
CREATE PROCEDURE getClassementByYear(IN year INT)
BEGIN
    SELECT idEcu, annee, nbPointEcu, placeEcu
    FROM classement 
    WHERE annee = year
    ORDER BY nbPointEcu DESC;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS getPodiumByYear
DELIMITER //
CREATE PROCEDURE getPodiumByYear(IN year INT)
BEGIN
    SELECT e.nom as nomEcurie, c.placeEcu, c.nbPointEcu
	FROM classement c
	INNER JOIN ecurie e ON e.id = c.idEcu
	WHERE c.annee = year
	ORDER BY c.placeEcu
	LIMIT 3;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS addClassement;
DELIMITER //
CREATE PROCEDURE addClassement(
    IN teamId INT,
    IN year INT,
    IN points INT,
    IN teamPlace INT
)
BEGIN
    INSERT INTO Classement(idEcu, annee, nbPointEcu, placeEcu) 
    VALUES(teamId, year, points, teamPlace);
END//
DELIMITER ;


DROP PROCEDURE IF EXISTS deleteClassement;
DELIMITER //
CREATE PROCEDURE deleteClassement(
    IN teamId INT,
    IN year INT
)
BEGIN
    DELETE FROM Classement WHERE idEcu = teamId AND annee = year;
END//
DELIMITER ;

DROP PROCEDURE IF EXISTS updateClassement;
DELIMITER //
CREATE PROCEDURE updateClassement(
    IN points INT,
    IN teamPlace INT,
    IN teamId INT,
    IN year INT
)
BEGIN
    UPDATE Classement SET nbPointEcu = points, placeEcu = teamPlace 
    WHERE idEcu = teamId AND annee = year;
END//
DELIMITER ;

DROP PROCEDURE IF EXISTS getClassementByTeam;
DELIMITER //
CREATE PROCEDURE getClassementByTeam(IN teamId INT)
BEGIN
    SELECT idEcu, annee, nbPointEcu, placeEcu
    FROM Classement
    WHERE idEcu = teamId
    ORDER BY nbPointEcu DESC;
END //
DELIMITER ;

DROP PROCEDURE IF EXISTS getClassementByYearAndTeam;
DELIMITER //
CREATE PROCEDURE getClassementByYearAndTeam(IN raceYear INT, IN teamId INT)
BEGIN
    SELECT idEcu, annee, nbPointEcu, placeEcu
    FROM Classement
    WHERE annee = raceYear AND idEcu = teamId
    ORDER BY nbPointEcu DESC;
END //
DELIMITER ;