<?php
require_once('connexion_PDO.php');

class Ecurie {
    private $cnx;

    public function __construct() {
        $this->cnx = connexionPDO();
    }

    function getEcurieByIdPiloteAndLastYear($idPil){
        try{
            $req = $this->cnx->prepare("SELECT e.id, e.nom, e.couleur
            FROM Ecurie e
            JOIN CoursesAnnee c ON e.id = c.idEcu
            WHERE idPil = :idPil
            GROUP BY 1, 2, 3
            HAVING max(c.annee);");
    
            $req->bindValue(':idPil', $idPil, PDO::PARAM_STR);
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
            $req = $this->cnx->prepare(
            "SELECT DISTINCT e.id, e.nom, e.couleur, c.annee, idPil
            FROM Ecurie e
            JOIN CoursesAnnee c ON e.id = c.idEcu
            WHERE c.idPil = :idPil
            ORDER BY c.annee DESC
            ;");
    
            $req->bindValue(':idPil', $idPil, PDO::PARAM_STR);
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
    function deleteEcurie($idEcurie) {
        try {
            $req = $this->cnx->prepare("DELETE FROM Ecurie WHERE id = :idEcurie;");
            $req->bindValue(':idEcurie', $idEcurie, PDO::PARAM_INT);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    // update a color of an Ecurie
    function updateEcurieColor($id, $couleur) {
        try {
            $req = $this->cnx->prepare("UPDATE Ecurie
                                SET couleur=:couleur
                                WHERE id=:id");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->bindValue(':couleur', $couleur, PDO::PARAM_STR);
            $req->execute();

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
}

