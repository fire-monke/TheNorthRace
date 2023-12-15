<?php
function connectDB() {
    $host = "localhost";
<<<<<<< HEAD
    $dbname = "bdoccasion";
    $user = "root";
    try {
        
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user);
=======
    $dbname = "bdTheNorthRace";
    $user = "root";
    try {
        
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, "root");
>>>>>>> 99faa55c97139b839038561a3d3a37a319ece07f

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