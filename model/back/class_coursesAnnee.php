<?php
require_once(RACINE . '/model/connexion_PDO.php');

class CoursesAnnee {
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }

    // Méthode pour récupérer les détails d'une course par pilote
    public function getCourseDetailsByPilot($idPil) {
        try {
            $req = $this->cnx->prepare("CALL GetCourseDetailsByPilot(?)");
            $req->bindParam(1, $idPil, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer l'erreur de manière appropriée
            // Vous pouvez journaliser l'erreur ou renvoyer une valeur par défaut
            // Si nécessaire, lancez une nouvelle exception ou renvoyez un message d'erreur
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    // Méthode pour récupérer les détails d'une course par équipe
    public function getCourseDetailsByTeam($idEcu) {
        try {
            $req = $this->cnx->prepare("CALL GetCourseDetailsByTeam(?)");
            $req->bindParam(1, $idEcu, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    // Méthode pour récupérer les détails d'une course par pilote et année
    public function getCourseDetailsByPilotAndYear($idPil, $year) {
        try {
            $req = $this->cnx->prepare("CALL GetCourseDetailsByPilotAndYear(?, ?)");
            $req->bindParam(1, $idPil, PDO::PARAM_INT);
            $req->bindParam(2, $year, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    // Méthode pour récupérer les détails d'une course par équipe et année
    public function getCourseDetailsByTeamAndYear($idEcu, $year) {
        try {
            $req = $this->cnx->prepare("CALL GetCourseDetailsByTeamAndYear(?, ?)");
            $req->bindParam(1, $idEcu, PDO::PARAM_INT);
            $req->bindParam(2, $year, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    // Méthode pour récupérer les détails d'une course par pilote, équipe et année
    public function getCourseDetailsByPilotTeamAndYear($idPil, $idEcu, $year) {
        try {
            $req = $this->cnx->prepare("CALL GetCourseDetailsByPilotTeamAndYear(?, ?, ?)");
            $req->bindParam(1, $idPil, PDO::PARAM_INT);
            $req->bindParam(2, $idEcu, PDO::PARAM_INT);
            $req->bindParam(3, $year, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    // Méthode pour récupérer les 3 meilleures courses d'une année
    public function getTop3CoursesByYear($year) {
        try {
            $req = $this->cnx->prepare("CALL GetTop3CoursesByYear(?)");
            $req->bindParam(1, $year, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    // Méthode pour récupérer toutes les courses d'une année
    public function getAllCoursesByYear($year) {
        try {
            $req = $this->cnx->prepare("CALL GetAllCoursesByYear(?)");
            $req->bindParam(1, $year, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

     // Méthode pour ajouter une course pour une année donnée
     public function AddRaceYear($pilotId, $yearRace,$teamId, $points, $pilotPlace, $pilotNumber) {
        try {
            $req = $this->cnx->prepare("CALL AddRaceYear(?, ?, ?, ?, ?, ?)");
            $req->bindParam(1, $pilotId, PDO::PARAM_INT);
            $req->bindParam(2, $yearRace, PDO::PARAM_INT);
            $req->bindParam(3, $teamId, PDO::PARAM_INT);
            $req->bindParam(4, $points, PDO::PARAM_INT);
            $req->bindParam(5, $pilotPlace, PDO::PARAM_INT);
            $req->bindParam(6, $pilotNumber, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    // Méthode pour supprimer une course pour une année donnée
    public function DeleteRaceYear($pilotId, $teamId, $yearRace) {
        try {
            $req = $this->cnx->prepare("CALL DeleteRaceYear(?, ?, ?)");
            $req->bindParam(1, $pilotId, PDO::PARAM_INT);
            $req->bindParam(2, $teamId, PDO::PARAM_INT);
            $req->bindParam(3, $yearRace, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    // Méthode pour modifier une course pour une année donnée
    public function updateRaceForYear($pilotId, $teamId, $year, $newPoints, $newPilotPlace, $newPilotNumber) {
        try {
            $req = $this->cnx->prepare("CALL UpdateRaceForYear(?, ?, ?, ?, ?, ?)");
            $req->bindParam(1, $pilotId, PDO::PARAM_INT);
            $req->bindParam(2, $teamId, PDO::PARAM_INT);
            $req->bindParam(3, $year, PDO::PARAM_INT);
            $req->bindParam(4, $newPoints, PDO::PARAM_INT);
            $req->bindParam(5, $newPilotPlace, PDO::PARAM_INT);
            $req->bindParam(6, $newPilotNumber, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }
}
