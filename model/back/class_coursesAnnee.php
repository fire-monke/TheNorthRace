<?php
require_once(RACINE . '/model/connexion_PDO.php');

class CoursesAnnee {
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }

    // Method to retrieve the details of a race per driverurse par pilote
    public function getCoursesDetailsByPilot($idPil) {
        try {
            $req = $this->cnx->prepare("CALL GetCoursesDetailsByPilot(?)");
            $req->bindParam(1, $idPil, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the error appropriately
            // You can log the error or return a default value
            // If necessary, throw a new exception or return an error message
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    public function getCoursesDetailsByTeam($idEcu) {
        try {
            $req = $this->cnx->prepare("CALL GetCoursesDetailsByTeam(?)");
            $req->bindParam(1, $idEcu, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }
    // Method to retrieve the details of a team race
    public function getCoursesDetailsByPilotAndYear($idPil, $year) {
        try {
            $req = $this->cnx->prepare("CALL GetCoursesDetailsByPilotAndYear(?, ?)");
            $req->bindParam(1, $idPil, PDO::PARAM_INT);
            $req->bindParam(2, $year, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

   // Method to retrieve the details of a race by team and year
    public function getCoursesDetailsByTeamAndYear($idEcu, $year) {
        try {
            $req = $this->cnx->prepare("CALL GetCoursesDetailsByTeamAndYear(?, ?)");
            $req->bindParam(1, $idEcu, PDO::PARAM_INT);
            $req->bindParam(2, $year, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

       // Method to retrieve the details of a race by team and year and pilot
    public function getCoursesDetailsByPilotTeamAndYear($idPil, $idEcu, $year) {
        try {
            $req = $this->cnx->prepare("CALL GetCoursesDetailsByPilotTeamAndYear(?, ?, ?)");
            $req->bindParam(1, $idPil, PDO::PARAM_INT);
            $req->bindParam(2, $idEcu, PDO::PARAM_INT);
            $req->bindParam(3, $year, PDO::PARAM_INT);
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }

    // Method to recover the 3 best races of a year
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

  // Method to recover all races of a year
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

 // Method to add a race for a given year
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

    // Method to delete
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

    // Method to update
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
