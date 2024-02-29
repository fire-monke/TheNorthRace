<?php
require_once(RACINE . '/model/connexion_PDO.php');

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
    function addEcurie($nom, $couleur, $dateCreation, $localisation, $nbTitresConstructeur, $nbCoursesDisputees, $nbVictoires, $nbPoduims, $directeur){
        try {
            $req = $this->cnx->prepare("CALL AddEcurie(:nom, :couleur, :dateCreation, :localisation, :nbTitresConstructeur, :nbCoursesDisputees, :nbVictoires, :nbPoduims, :directeur)");
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':couleur', $couleur, PDO::PARAM_STR);
            $req->bindValue(':dateCreation', $dateCreation, PDO::PARAM_INT);
            $req->bindValue(':localisation', $localisation, PDO::PARAM_STR);
            $req->bindValue(':nbTitresConstructeur', $nbTitresConstructeur, PDO::PARAM_INT);
            $req->bindValue(':nbCoursesDisputees', $nbCoursesDisputees, PDO::PARAM_INT);
            $req->bindValue(':nbVictoires', $nbVictoires, PDO::PARAM_INT);
            $req->bindValue(':nbPoduims', $nbPoduims, PDO::PARAM_INT);
            $req->bindValue(':directeur', $directeur, PDO::PARAM_STR);

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
    function updateEcurieColor($idEcurie, $couleur, $dateCreation, $localisation, $nbTitresConstructeur, $nbCoursesDisputees, $nbVictoires, $nbPoduims, $directeur) {
        try {
            $req = $this->cnx->prepare("CALL updateEcurieColor(:idEcurie, :couleur, :dateCreation, :localisation, :nbTitresConstructeur, :nbCoursesDisputees, :nbVictoires, :nbPoduims, :directeur)");
            $req->bindValue(':idEcurie', $idEcurie, PDO::PARAM_INT);
            $req->bindValue(':couleur', $couleur, PDO::PARAM_STR);
            $req->bindValue(':dateCreation', $dateCreation, PDO::PARAM_INT);
            $req->bindValue(':localisation', $localisation, PDO::PARAM_STR);
            $req->bindValue(':nbTitresConstructeur', $nbTitresConstructeur, PDO::PARAM_INT);
            $req->bindValue(':nbCoursesDisputees', $nbCoursesDisputees, PDO::PARAM_INT);
            $req->bindValue(':nbVictoires', $nbVictoires, PDO::PARAM_INT);
            $req->bindValue(':nbPoduims', $nbPoduims, PDO::PARAM_INT);
            $req->bindValue(':directeur', $directeur, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}