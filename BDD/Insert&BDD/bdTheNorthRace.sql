DROP DATABASE if exists bdTheNorthRace;
CREATE DATABASE if not exists bdTheNorthRace;

Use bdTheNorthRace;

CREATE TABLE Gerant (
    identifiant VARCHAR(40),
    password VARCHAR(40) NOT NULL,
    Primary Key(identifiant)
    )
ENGINE=InnoDB;
insert into gerant values("admin",'admin');

CREATE TABLE Pilote (
    id INT(3) AUTO_INCREMENT,
    nom VARCHAR(40),
    prenom VARCHAR(40),
    paysPil VARCHAR(30),
    dateNais Date,
    Primary Key(id)
    )
ENGINE=InnoDB;

CREATE TABLE Ecurie (
    id INT(3) AUTO_INCREMENT,
    nom VARCHAR(40),
    couleur VARCHAR(40),
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

-- 2023
INSERT INTO Pilote (nom, prenom, paysPil) VALUES
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
    ('Zhou', 'Guan Yu', 'Chine', '1999-05-30'),
    ('Magnussen', 'Kevin', 'Danemark', '1992-10-05'),
    ('Lawson', 'Liam', 'Nouvelle-Zélande', '2002-01-11'),
    ('Sargeant', 'Logan', 'Etats-Unis', '2000-12-31'),
    ('De Vries', 'Nyck', 'Pays-Bas', '1995-02-06'),
    
    
-- Pilote de l'année 2022
    ('Vettel', 'Sebastian', 'Allemagne', '1987-07-03'),
    ('Schumacher', 'Mick', 'Allemagne', '1999-03-22'),
    ('Latifi', 'Nicholas', 'Canada', '1995-06-29'),
	-- ('Verstappen', 'Max', 'Pays-Bas'),
	-- ('Leclerc', 'Charles', 'Monaco'),
	-- ('Perez', 'Sergio', 'Mexique'),
	-- ('Russel', 'George', 'Royaume-Uni'),
	-- ('Sainz', 'Carlos', 'Espagne'),
	-- ('Hamilton', 'Lewis', 'Royaume-Uni'),
	-- ('Norris', 'Lando', 'Royaume-Uni'),
	-- ('Ocon', 'Estéban', 'France'),
	-- ('Alonso','Fernando', 'Espagne'),
	-- ('Bottas', 'Valtteri', 'Finlande'),
	-- ('Ricciardo', 'Daniel', 'Australie'),
	-- ('Magnussen', 'Kevin', 'Danemark'),
	-- ('Gasly', 'Pierre', 'France'),
	-- ('Stroll', 'Lance', 'Canada'),
	-- ('Tsunoda', 'Yuki', 'Japon'),
	-- ('Zhou', 'Guan Yu', 'Chine'),
	-- ('Albon', 'Alexandre', 'Thailande'),
	-- ('De Vries', 'Nyck', 'Pays-Bas'),
	-- ('Hülkenberg', 'Nico', 'Allemagne'),
    
    
-- Pilote de l'année 2021
    ('Räikkönen', 'Kimi', 'Finlande', '1979-10-17'),
    ('Giovinazzi', 'Antonio', 'Italie', '1993-12-14'),
    ('Kubica', 'Robert', 'Pologne', '1984-12-07'),
    ('Mazepin', 'Nikita', 'Russe', '1999-03-02'),
	-- ('Verstappen', 'Max', 'Pays-Bas'),
	-- ('Hamilton', 'Lewis', 'Royaume-Uni'),
	-- ('Bottas', 'Valtteri', 'Finlande'),
	-- ('Perez', 'Sergio', 'Mexique'),
	-- ('Sainz', 'Carlos', 'Espagne'),
	-- ('Norris', 'Lando', 'Royaume-Uni'),
	-- ('Leclerc', 'Charles', 'Monaco'),
	-- ('Ricciardo', 'Daniel', 'Australie'),
	-- ('Gasly', 'Pierre', 'France'),
	-- ('Alonso','Fernando', 'Espagne'),
	-- ('Ocon', 'Estéban', 'France'),
	-- ('Vettel', 'Sebastian', 'Allemagne'),
	-- ('Stroll', 'Lance', 'Canada'),
	-- ('Tsunoda', 'Yuki', 'Japon'),
	-- ('Russel', 'George', 'Royaume-Uni'),
	-- ('Latifi', 'Nicholas', 'Canada'),
	-- ('Schumacher', 'Mick', 'Allemagne'),
    
    
-- Pilote de l'année 2020
    ('Kvyat', 'Daniil', 'Russe', '1994-04-26'),
    ('Grosjean', 'Romain', 'France', '1986-04-17'),
    ('Aitken', 'Jack', 'Royaume-Uni', '1995-09-23'),
    ('Fittipaldi', 'Pietro', 'Brésil', '1996-06-25')
	-- ('Hamilton', 'Lewis', 'Royaume-Uni'),
	-- ('Bottas', 'Valtteri', 'Finlande'),
	-- ('Verstappen', 'Max', 'Pays-Bas'),
	-- ('Perez', 'Sergio', 'Mexique'),
	-- ('Ricciardo', 'Daniel', 'Australie'),
	-- ('Sainz', 'Carlos', 'Espagne'),
	-- ('Albon', 'Alexandre', 'Thailande'),
	-- ('Leclerc', 'Charles', 'Monaco'),
	-- ('Norris', 'Lando', 'Royaume-Uni'),
	-- ('Gasly', 'Pierre', 'France'),
	-- ('Stroll', 'Lance', 'Canada'),
	-- ('Ocon', 'Estéban', 'France'),
	-- ('Vettel', 'Sebastian', 'Allemagne'),
	-- ('Hülkenberg', 'Nico', 'Allemagne'),
	-- ('Räikkönen', 'Kimi', 'Finlande'),
	-- ('Giovinazzi', 'Antonio', 'Italie'),
	-- ('Russel', 'George', 'Royaume-Uni'),
	-- ('Magnussen', 'Kevin', 'Danemark'),

-- Pilote de l'année 2019
	-- ('Hamilton', 'Lewis', 'Royaume-Uni'),
	-- ('Bottas', 'Valtteri', 'Finlande'),
	-- ('Verstappen', 'Max', 'Pays-Bas'),
	-- ('Leclerc', 'Charles', 'Monaco'),
	-- ('Vettel', 'Sebastian', 'Allemagne'),
	-- ('Sainz', 'Carlos', 'Espagne'),
	-- ('Gasly', 'Pierre', 'France'),
	-- ('Albon', 'Alexandre', 'Thailande'),
	-- ('Ricciardo', 'Daniel', 'Australie'),
	-- ('Perez', 'Sergio', 'Mexique'),
	-- ('Norris', 'Lando', 'Royaume-Uni'),
	-- ('Räikkönen', 'Kimi', 'Finlande'),
	-- ('Kvyat', 'Daniil', 'Russe'),
	-- ('Hülkenberg', 'Nico', 'Allemagne'),
	-- ('Stroll', 'Lance', 'Canada'),
	-- ('Magnussen', 'Kevin', 'Danemark'),
	-- ('Giovinazzi', 'Antonio', 'Italie'),
	-- ('Grosjean', 'Romain', 'France'),
	-- ('Kubica', 'Robert', 'Pologne'),
	-- ('Russel', 'George', 'Royaume-Uni'),

-- Pilote de l'année 2018
    ('Vandoorne', 'Stoffel', 'Belgique', '1992-03-26'),
    ('Ericsson', 'Marcus', 'Suède', '1990-09-02'),
    ('Hartley', 'Brendon', 'Nouvelle-Zélande', '1989-11-10'),
    ('Sirotkin', 'Sergey', 'Russe', '1995-08-27');
	-- ('Hamilton', 'Lewis', 'Royaume-Uni'),
	-- ('Vettel', 'Sebastian', 'Allemagne'),
	-- ('Räikkönen', 'Kimi', 'Finlande'),
	-- ('Verstappen', 'Max', 'Pays-Bas'),
	-- ('Bottas', 'Valtteri', 'Finlande'),
	-- ('Ricciardo', 'Daniel', 'Australie'),
	-- ('Hülkenberg', 'Nico', 'Allemagne'),
	-- ('Perez', 'Sergio', 'Mexique'),
	-- ('Magnussen', 'Kevin', 'Danemark'),
	-- ('Sainz', 'Carlos', 'Espagne'),
	-- ('Alonso','Fernando', 'Espagne'),
	-- ('Ocon', 'Estéban', 'France'),
	-- ('Leclerc', 'Charles', 'Monaco'),
	-- ('Grosjean', 'Romain', 'France'),
	-- ('Gasly', 'Pierre', 'France'),
	-- ('Stroll', 'Lance', 'Canada'),


-- 2018
INSERT INTO Ecurie(nom, couleur) VALUES
    ('Mercedes', '#00D2BE'),
    ('Ferrari', '#DC0000'),
    ('Renault', '#FFF500'),
    ('Red Bull Racing', '#1E41FF'),
    ('Haas', '#F0D787'),
    ('McLaren Renault', '#FF8700'),
    ('Force India Mercedes', '#F595C8'),
    ('Sauber', '#9B0000'),
    ('Scuderia Toro Rosso', '#469BFF'),
    ('Williams', '#FFFFFF'),
    ('Force India Sahara', '#F595C8');

-- 2019
INSERT INTO Ecurie(nom, couleur) VALUES
    ('Racing Point BWT', '#F595C8'),
    ('Alfa Romeo Racing', '#9B0000');
    -- ('MERCEDES'),
    -- ('FERRARI'),
    -- ('Red Bull Racing'),
    -- ('MCLAREN RENAULT'),
    -- ('RENAULT'),
    -- ('SCUDERIA TORO ROSSO HONDA'),
    -- ('HAAS FERRARI'),
    -- ('WILLIAMS MERCEDES'),

-- 2020
INSERT INTO Ecurie(nom, couleur) VALUES
    ('Alphatauri', '#469BFF');
    -- ('MERCEDES'),
    -- ('RED BULL RACING HONDA'),
    -- ('MCLAREN RENAULT'),
    -- ('RACING POINT BWT MERCEDES'),
    -- ('RENAULT'),
    -- ('FERRARI'),
    -- ('ALFA ROMEO RACING FERRARI'),
    -- ('HAAS FERRARI'),
    -- ('WILLIAMS MERCEDES'),

-- 2021
INSERT INTO Ecurie(nom, couleur) VALUES
    ('McLaren Mercedes', '#FF8700'),
    ('Alpine', '#0090FF'),
    ('Aston Martin', '#4D282E');
    -- ('MERCEDES'),
    -- ('RED BULL RACING HONDA'),
    -- ('FERRARI'),
    -- ('ALPHATAURI HONDA'),
    -- ('WILLIAMS MERCEDES'),
    -- ('ALFA ROMEO RACING FERRARI'),
    -- ('HAAS FERRARI')

-- 2022
INSERT INTO Ecurie(nom, couleur) VALUES
    ('McLaren Mercedes', '#FF8700'),
    ('Alfa Romeo Ferrari', '#DC0000'),
    ('Aston Martin Aramco', '#4D282E');
    -- ('Red Bull Racing'),
    -- ('FERRARI'),
    -- ('MERCEDES'),
    -- ('Alpine Renault'),
    -- ('HAAS FERRARI')
    -- ('Alphatauri')
    -- ('WILLIAMS MERCEDES'),

-- 2023
INSERT INTO Ecurie(nom, couleur) VALUES
    ('McLaren', '#FF8700'),
    ('Alpha Romeo', '#DC0000');
    -- ('Red Bull Racing'),
    -- ('Mercedes'),
    -- ('Ferrari'),
    -- ('Aston Martin'),
    -- ('Alpine'),
    -- ('Williams'),
    -- ('Alphatauri'),
    -- ('Hass')


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


-- PROCEDURES STOCKEES PARAMETREES
-- -------------------------------------
-- ECURIE ECURIE ECURIE ECURIE ECURIE
-- -------------------------------------

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

