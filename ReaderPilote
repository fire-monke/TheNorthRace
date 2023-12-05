<?php
function connexionPDO(){
    return new PDO("mysql:host=localhost;dbname=bdTheNorthRace", "root","");
}


function getPiloteByIdPilote($idPil){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT p.nom, p.prenom, p.paysPil, p.dateNais, c.numPil, e.nom AS nomEcurie
            FROM Pilote p
            INNER JOIN CoursesAnnee c ON p.id = c.idPil
            INNER JOIN Ecurie e ON e.id = c.idEcu
            WHERE annee = YEAR(CURRENT_DATE()) and p.id =:idPil
            ORDER BY p.nom");

        $req->bindValue(':idPil', $idPil, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    

    }  catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();

    } finally {
        // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
        $cnx = null;
    }

    return $resultat;
}


function getAllPointsPilote($idPil){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT SUM(c.nbPointPil) AS totalPoints
        FROM Pilote p
        INNER JOIN CoursesAnnee c ON p.id = c.idPil
        Where p.id =:idPil;");

        $req->bindValue(':idPil', $idPil, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    

    }  catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();

    } finally {
        // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
        $cnx = null;
    }

    return $resultat;
}


function getPilotesByEcu($idEcu){
    try{
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT p.nom, p.prenom, e.nom AS nomEcurie
        FROM Pilote p
        INNER JOIN CoursesAnnee c ON p.id = c.idPil
        INNER JOIN Ecurie e ON e.id = c.idEcu
        WHERE annee = YEAR(CURRENT_DATE()) and idEcu=:idEcu
        ORDER BY p.nom;");

        $req->bindValue(':idEcu', $idEcu, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    

    }  catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();

    } finally {
        // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
        $cnx = null;
    }

    return $resultat;

    
}

function getPilotesByTop3(){
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT p.nom, p.prenom, e.nom AS nomEcurie, c.nbPointPil
        FROM Pilote p
        INNER JOIN CoursesAnnee c ON p.id = c.idPil
        INNER JOIN Ecurie e ON e.id = c.idEcu
        WHERE annee = YEAR(CURRENT_DATE()) 
        ORDER BY c.nbPointPil DESC, p.nom
        LIMIT 3;");

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    } finally {
        // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
        $cnx = null;
    }

    return $resultat;
}

function getAllPilotesByTop3(){
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT p.nom, p.prenom, e.nom AS nomEcurie, c.nbPointPil
        FROM Pilote p
        INNER JOIN CoursesAnnee c ON p.id = c.idPil
        INNER JOIN Ecurie e ON e.id = c.idEcu
        WHERE annee = YEAR(CURRENT_DATE()) 
        ORDER BY c.nbPointPil DESC, p.nom
        LIMIT 3;");

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    } finally {
        // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
        $cnx = null;
    }

    return $resultat;
}
