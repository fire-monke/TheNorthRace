<?php
function getCourseDetailsByPilotAndYear($idPil, $year) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT * FROM CoursesAnnee WHERE idPil = :idPil AND annee = :year");
        $req->bindParam(':idPil', $idPil, PDO::PARAM_INT);
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        // Gérer l'erreur de manière appropriée
        // Vous pouvez journaliser l'erreur ou renvoyer une valeur par défaut
        // Si nécessaire, lancez une nouvelle exception ou renvoyez un message d'erreur
        die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
    } finally {
        $cnx = null; // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
    }

    return $resultat;
}

// Fonction pour récupérer les détails d'une course pour une écurie donnée pour une année donnée
function getCourseDetailsByTeamAndYear($idEcu, $year) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT * FROM CoursesAnnee WHERE idEcu = :idEcu AND annee = :year");
        $req->bindParam(':idEcu', $idEcu, PDO::PARAM_INT);
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
    } finally {
        $cnx = null; // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
    }

    return $resultat;
}

// Fonction pour récupérer les détails d'une course d'un pilote pour une écurie donnée et une année donnée
function getCourseDetailsByPilotTeamAndYear($idPil, $idEcu, $year) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT * FROM CoursesAnnee WHERE idPil = :idPil AND idEcu = :idEcu AND annee = :year");
        $req->bindParam(':idPil', $idPil, PDO::PARAM_INT);
        $req->bindParam(':idEcu', $idEcu, PDO::PARAM_INT);
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
    } finally {
        $cnx = null; // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
    }

    return $resultat;
}


function getTop3CoursesByYear($year) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT * FROM CoursesAnnee WHERE annee = :year ORDER BY nbPointPil DESC LIMIT 3");
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
    } finally {
        $cnx = null; // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
    }

    return $resultat;
}


function getAllCoursesByYear($year) {
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("SELECT * FROM CoursesAnnee WHERE annee = :year");
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
    } finally {
        $cnx = null; // Fermez la connexion PDO dans le bloc finally pour vous assurer qu'elle est toujours fermée
    }

    return $resultat;
}
