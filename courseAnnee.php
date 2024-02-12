<?php
require_once(RACINE . '/model/connexion_PDO.php');

class CourseManager {
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }

    
    public function getCourseDetailsByPilot($idPil) {
        $req = $this->pdo->prepare("SELECT * FROM CoursesAnnee WHERE idPil = :idPil");
        $req->bindParam(':idPil', $idPil, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCourseDetailsByTeam($idEcu) {
        $req = $this->pdo->prepare("SELECT * FROM CoursesAnnee WHERE idEcu = :idEcu");
        $req->bindParam(':idEcu', $idEcu, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    
     public function getCourseDetailsByPilotAndYear($idPil, $year) {
        $req = $this->pdo->prepare("SELECT * FROM CoursesAnnee WHERE idPil = :idPil AND annee = :year");
        $req->bindParam(':idPil', $idPil, PDO::PARAM_INT);
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCourseDetailsByTeamAndYear($idEcu, $year) {
        $req = $this->pdo->prepare("SELECT * FROM CoursesAnnee WHERE idEcu = :idEcu AND annee = :year");
        $req->bindParam(':idEcu', $idEcu, PDO::PARAM_INT);
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCourseDetailsByPilotTeamAndYear($idPil, $idEcu, $year) {
        $req = $this->pdo->prepare("SELECT * FROM CoursesAnnee WHERE idPil = :idPil AND idEcu = :idEcu AND annee = :year");
        $req->bindParam(':idPil', $idPil, PDO::PARAM_INT);
        $req->bindParam(':idEcu', $idEcu, PDO::PARAM_INT);
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTop3CoursesByYear($year) {
        $req = $this->pdo->prepare("SELECT * FROM CoursesAnnee WHERE annee = :year ORDER BY nbPointPil DESC LIMIT 3");
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCoursesByYear($year) {
        $req = $this->pdo->prepare("SELECT * FROM CoursesAnnee WHERE annee = :year");
        $req->bindParam(':year', $year, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
