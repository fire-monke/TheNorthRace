<?php
function connectDB() {
    $host = "localhost";
    $dbname = "bdoccasion";
    $user = "root";
    try {
        
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user);

        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    } catch (PDOException $e) {
       
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit();
    }
}
$connexion = connectDB();
?>