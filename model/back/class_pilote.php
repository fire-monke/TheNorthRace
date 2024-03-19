<?php
require_once(RACINE . '/model/connexion_PDO.php');

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
    
            $req->bindValue(':idPil', $idPil, PDO::PARAM_INT);
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
            $req->bindValue(':idPil', $idPil, PDO::PARAM_INT);
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
    
            $req->bindValue(':idEcu', $idEcu, PDO::PARAM_INT);
            $req->execute();
    
            $resultat = $req->fetchAll(PDO::FETCH_OBJ);
    
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    // add a Pilote / returns id of created Pilote
    function addPilote($nom, $prenom, $paysPil, $dateNais) {
        try {
            $req = $this->cnx->prepare("CALL AddPilote(:nom, :prenom, :paysPil, :dateNais, @idPilote)");
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindValue(':paysPil', $paysPil, PDO::PARAM_STR);
            $req->bindValue(':dateNais', $dateNais, PDO::PARAM_STR);
            $req->execute();

            $id_pilote = $this->cnx->query("SELECT @idPilote")->fetch(PDO::FETCH_ASSOC)['@idPilote'];
            
            return $id_pilote;
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

    function getPilotePointsLastSeasonById($idPil){
        try{
            $req = $this->cnx->prepare("CALL getPilotePointsLastSeasonById(:idPil)");
            $req->bindValue(':idPil', $idPil, PDO::PARAM_INT);
            $req->execute();
    
            $resultat = $req->fetch(PDO::FETCH_OBJ);
    
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getPilotesLastSeason(){
        try{
            $req = $this->cnx->prepare("CALL getPilotesLastSeason()");
            $req->execute();
    
            $resultat = $req->fetchall(PDO::FETCH_OBJ);
    
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}