<?php
require_once("$racine/model/connexion_PDO.php");

class GetModeles {
    private $pdo;

    public function __construct() {
        $this->pdo = connectDB(); 
    }

    public function GetAdmin($identifiant) {
        try {
            $req = $this->pdo->prepare("SELECT * FROM gerant WHERE identifiant = :identifiant LIMIT 1");
            $req->bindValue(":identifiant", $identifiant, PDO::PARAM_STR);
            $req->execute();
            $admin = $req->fetch(PDO::FETCH_ASSOC);
            return $admin;
        } catch (PDOException $e) {
            $error = $e->getMessage();
        }
    }
}

//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------


class Ecurie {
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }

    function getEcuries(){
        try{
            $req = $this->cnx->prepare("CALL getEcuries()");
            $req->execute();

            $resultat = $req->fetchall(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getEcuriesLastSeason(){
        try{
            $req = $this->cnx->prepare("CALL getEcuriesLastSeason()");
            $req->execute();

            $resultat = $req->fetchall(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getEcurieById($idEcu){
        try{
            $req = $this->cnx->prepare("CALL getEcurieById(:idEcu)");

            $req->bindValue(':idEcu', $idEcu, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getEcurieOfLastSeasonOfPiloteByIdPilote($idPil){
        try{
            $req = $this->cnx->prepare("CALL getEcurieOfLastSeasonOfPiloteByIdPilote(:idPil)");

            $req->bindValue(':idPil', $idPil, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getLastEcurieByIdPilote($idPil){
        try{
            $req = $this->cnx->prepare("CALL getLastEcurieByIdPilote(:idPil)");

            $req->bindValue(':idPil', $idPil, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    // add an Ecurie
    function addEcurie($nom, $couleur){
        try {
            $req = $this->cnx->prepare("CALL AddEcurie(:nom, :couleur)");
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':couleur', $couleur, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    // remove a Ecurie if it has never run
    function deleteEcurieById($idEcurie) {
        try {
            $req = $this->cnx->prepare("CALL deleteEcurieById(:idEcurie)");
            $req->bindValue(':idEcurie', $idEcurie, PDO::PARAM_INT);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    // update a color of an Ecurie
    function updateEcurieColor($idEcurie, $couleur) {
        try {
            $req = $this->cnx->prepare("CALL updateEcurieColor(:idEcurie, :couleur)");
            $req->bindValue(':idEcurie', $idEcurie, PDO::PARAM_INT);
            $req->bindValue(':couleur', $couleur, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}


//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------

class Pilote {
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }

    function getPilotes(){
        try {
            $req = $this->cnx->prepare("CALL getPilotes();");
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getPiloteById($idPil){
        try{
            $req = $this->cnx->prepare("CALL getPiloteById(:idPil)");

            $req->bindValue(':idPil', $idPil, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_OBJ);

        }  catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getAllPointsPiloteById($idPil){
        try{
            $req = $this->cnx->prepare("CALL getAllPointsPiloteById(:idPil)");
            $req->bindValue(':idPil', $idPil, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getPilotesPodium(){
        try {
            $req = $this->cnx->prepare("CALL getPilotesPodium()");
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getPilotesByIdEcu($idEcu){
        try{
            $req = $this->cnx->prepare("CALL getPilotesByIdEcu(:idEcu)");

            $req->bindValue(':idEcu', $idEcu, PDO::PARAM_STR);
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    // add a Pilote
    function addPilote($nom, $prenom, $paysPil){
        try {
            $req = $this->cnx->prepare("CALL AddPilote(:nom, :prenom, :paysPil)");
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindValue(':paysPil', $paysPil, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    // remove a Pilote if it has never run
    function deletePiloteById($idPilote) {
        try {
            $req = $this->cnx->prepare("CALL deletePiloteById(:idPilote)");
            $req->bindValue(':idPilote', $idPilote, PDO::PARAM_INT);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    // update a Pilote
    function updatePilote($idPilote, $nom, $prenom, $paysPil, $dateNais) {
        try {
            $req = $this->cnx->prepare("CALL updatePilote(:idPilote, :nom, :prenom, :paysPil, :dateNais)");
            $req->bindValue(':idPilote', $idPilote, PDO::PARAM_INT);
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindValue(':paysPil', $paysPil, PDO::PARAM_STR);
            $req->bindValue(':dateNais', $dateNais, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}

class Classement {
    private $cnx;

    public function __construct() {
        $this->cnx = connectDB();
    }

    function deletePiloteById($idPilote) {
        try {
            $req = $this->cnx->prepare("CALL deletePiloteById(:idPilote)");
            $req->bindValue(':idPilote', $idPilote, PDO::PARAM_INT);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}

?>
