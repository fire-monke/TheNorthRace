<?php

require_once('../connexion_PDO.php');

class Classement {    
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }

    function getClassementByYear($year) {
        try {
            $req = $this->cnx->prepare("CALL GetClassementByYear(:year)");
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
            $req = $this->cnx->prepare("CALL GetPodiumByYear(:year)");
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
}

//sdsd