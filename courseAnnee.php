<?php
require_once(RACINE . '/model/connexion_PDO.php');

class CourseManager {
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }

    
     // Méthode pour récupérer les détails d'une course par pilote
    public function getCourseDetailsByPilot($idPil) {
        $req = $this->pdo->prepare("CALL GetCourseDetailsByPilot(?)");
        $req->bindParam(1, $idPil, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer les détails d'une course par équipe
    public function getCourseDetailsByTeam($idEcu) {
        $req = $this->pdo->prepare("CALL GetCourseDetailsByTeam(?)");
        $req->bindParam(1, $idEcu, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer les détails d'une course par pilote et année
    public function getCourseDetailsByPilotAndYear($idPil, $year) {
        $req = $this->pdo->prepare("CALL GetCourseDetailsByPilotAndYear(?, ?)");
        $req->bindParam(1, $idPil, PDO::PARAM_INT);
        $req->bindParam(2, $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer les détails d'une course par équipe et année
    public function getCourseDetailsByTeamAndYear($idEcu, $year) {
        $req = $this->pdo->prepare("CALL GetCourseDetailsByTeamAndYear(?, ?)");
        $req->bindParam(1, $idEcu, PDO::PARAM_INT);
        $req->bindParam(2, $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer les détails d'une course par pilote, équipe et année
    public function getCourseDetailsByPilotTeamAndYear($idPil, $idEcu, $year) {
        $req = $this->pdo->prepare("CALL GetCourseDetailsByPilotTeamAndYear(?, ?, ?)");
        $req->bindParam(1, $idPil, PDO::PARAM_INT);
        $req->bindParam(2, $idEcu, PDO::PARAM_INT);
        $req->bindParam(3, $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer les 3 meilleures courses d'une année
    public function getTop3CoursesByYear($year) {
        $req = $this->pdo->prepare("CALL GetTop3CoursesByYear(?)");
        $req->bindParam(1, $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour récupérer toutes les courses d'une année
    public function getAllCoursesByYear($year) {
        $req = $this->pdo->prepare("CALL GetAllCoursesByYear(?)");
        $req->bindParam(1, $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
