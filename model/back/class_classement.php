<?php

require_once('../connexion_PDO.php');

class Classement {    
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }

    function getClassementByYear($year) {
        try {
            $req = $this->cnx->prepare("CALL getClassementByYear(:year)");
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }

    function getPodiumByYear($year) {
        try {
            $req = $this->cnx->prepare("CALL getPodiumByYear(:year)");
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }

    function getClassementByTeam($idEcu) {
        try {
            $req = $this->cnx->prepare("CALL getClassementByTeam(:idEcu)");
            $req->bindValue(':idEcu', $idEcu, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }

    function getClassementByYearAndTeam($year, $idEcu) {
        try {
            $req = $this->cnx->prepare("CALL getClassementByYearAndTeam(:year, :idEcu)");
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->bindValue(':idEcu', $idEcu, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur !: " . $e->getMessage());
        }
        return $resultat;
    }

    function addClassement($teamId, $year, $points, $teamPlace) {
        try {
            $req = $this->cnx->prepare("CALL addClassement(:teamId, :year, :points, :teamPlace)");
            $req->bindValue(':teamId', $teamId, PDO::PARAM_INT);
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->bindValue(':points', $points, PDO::PARAM_INT);
            $req->bindValue(':teamPlace', $teamPlace, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            error_log("Erreur !: " . $e->getMessage());
        }
    }

    function deleteClassement($teamId, $year) {
        try {
            $req = $this->cnx->prepare("CALL deleteClassement(:teamId, :year)");
            $req->bindValue(':teamId', $teamId, PDO::PARAM_INT);
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            error_log("Erreur !: " . $e->getMessage());
        }
    }

    function updateClassement($points, $teamPlace, $teamId, $year) {
        try {
            $req = $this->cnx->prepare("CALL updateClassement(:points, :teamPlace, :teamId, :year)");
            $req->bindValue(':points', $points, PDO::PARAM_INT);
            $req->bindValue(':teamPlace', $teamPlace, PDO::PARAM_INT);
            $req->bindValue(':teamId', $teamId, PDO::PARAM_INT);
            $req->bindValue(':year', $year, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            error_log("Erreur !: " . $e->getMessage());
        }
    }
}

//de