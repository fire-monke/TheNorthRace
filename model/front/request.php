<?php
require_once('connexion_PDO.php');

class GetBrand {
    private $pdo;

    public function __construct() {
        $this->pdo = connectDB(); 
    }

    public function GetBrand() {
        try {
            $query = "SELECT DISTINCT marque FROM modele LIMIT 8 ";
            $request = $this->pdo->query($query);
            $brands = $request->fetchAll();
            return $brands;
        } catch (PDOException $e) {
            $error = $e->getMessage();
     }
    }
}

class GetCategories {
    private $pdo;

    public function __construct() {
        $this->pdo = connectDB(); 
    }

    public function afficherCategories() {
        try {
            $query = "SELECT DISTINCT nom FROM categories ORDER BY nom LIMIT 8";
            $request = $this->pdo->query($query);
            $categories = $request->fetchAll();
            return $categories;
        } catch (PDOException $e) {
            $error = $e->getMessage();
     }
    }
}

class GetModeles {
    private $pdo;

    public function __construct() {
        $this->pdo = connectDB(); 
    }

    public function afficherModeles() {
        try {
            $query = "SELECT * FROM modele
            INNER JOIN categories ON categories.idcat = modele.idCat";
            $request = $this->pdo->query($query);
            $modeles = $request->fetchAll();
            return $modeles;
        } catch (PDOException $e) {
            $error = $e->getMessage();
     }
    }
}

class GetProprietaires {
    private $pdo;

    public function __construct() {
        $this->pdo = connectDB(); 
    }

    public function afficherProprietaires() {
        try {
            $query = "SELECT * FROM proprietaire ORDER BY nom";
            $request = $this->pdo->query($query);
            $proprietaires = $request->fetchAll();
            return $proprietaires;
        } catch (PDOException $e) {
            $error = $e->getMessage();
     }
    }
}

class GetVoitures {
    private $pdo;

    public function __construct() {
        $this->pdo = connectDB(); 
    }

    public function afficherVoitures() {
        try {
            $query = "SELECT voiture.immat, idProp, nbPlaces, modele.idModele, modele.libModele, modele.marque, modele.carburant, categories.nom, CONCAT(DAY(datePremImmat),'/', MONTH(datePremImmat),'/',YEAR(datePremImmat)) AS DATE  
            FROM voiture
            INNER JOIN modele ON modele.idModele = voiture.idModele
            INNER JOIN categories ON categories.idcat = modele.idCat
            INNER JOIN cartegrise ON cartegrise.immat = voiture.immat
            ORDER BY idProp"
            ;
            $request = $this->pdo->query($query);
            $voitures = $request->fetchAll();
            return $voitures;
        } catch (PDOException $e) {
            $error = $e->getMessage();
     }
    }

}

