<?php
require_once(RACINE . '/model/connexion_PDO.php');
require_once(RACINE . '/model/back/class_ecurie.php');
require_once(RACINE . '/model/back/class_pilote.php');

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