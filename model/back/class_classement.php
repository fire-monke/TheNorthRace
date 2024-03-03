
<?php

require_once(RACINE . '/model/connexion_PDO.php');

class Classement {    
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }
    // Function to fetch ranking data for a specific year from the database.
    function getClassementByYear($year) {
        try {
            $req = $this->cnx->prepare("CALL getClassementByYear(:year)");
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
        return $resultat;
    }
    // Function to fetch podium data for a specific year from the database.
    function getPodiumByYear($year) {
        try {
            $req = $this->cnx->prepare("CALL getPodiumByYear(:year)");
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
        return $resultat;
    }
    // Function to fetch ranking data for a specific team from the database.
    function getClassementByTeam($idEcu) {
        try {
            $req = $this->cnx->prepare("CALL getClassementByTeam(:idEcu)");
            $req->bindValue(':idEcu', $idEcu, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
        return $resultat;
    }
    // Function to fetch ranking data for a specific year and team from the database.
    function getClassementByYearAndTeam($year, $idEcu) {
        try {
            $req = $this->cnx->prepare("CALL getClassementByYearAndTeam(:year, :idEcu)");
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->bindValue(':idEcu', $idEcu, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
        return $resultat;
    }

    //Function to add new ranking data for a team in a specific year to the database.
    function addClassement($teamId, $year, $points, $teamPlace) {
        try {
            $req = $this->cnx->prepare("CALL addClassement(:teamId, :year, :points, :teamPlace)");
            $req->bindValue(':teamId', $teamId, PDO::PARAM_INT);
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->bindValue(':points', $points, PDO::PARAM_INT);
            $req->bindValue(':teamPlace', $teamPlace, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }
    // Function to delete ranking data for a team in a specific year from the database.
    function deleteClassement($teamId, $year) {
        try {
            $req = $this->cnx->prepare("CALL deleteClassement(:teamId, :year)");
            $req->bindValue(':teamId', $teamId, PDO::PARAM_INT);
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }
    // Function to update ranking data for a team in a specific year in the database.
    function updateClassement($points, $teamPlace, $teamId, $year) {
        try {
            $req = $this->cnx->prepare("CALL updateClassement(:points, :teamPlace, :teamId, :year)");
            $req->bindValue(':points', $points, PDO::PARAM_INT);
            $req->bindValue(':teamPlace', $teamPlace, PDO::PARAM_INT);
            $req->bindValue(':teamId', $teamId, PDO::PARAM_INT);
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            die("Erreur lors de l'accès à la base de données: " . $e->getMessage());
        }
    }
}
