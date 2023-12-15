<?php
require_once '../connexion.php';
$pdo = connectDB();

if (isset($pdo)) {
    try {

        $requete = $pdo->query("SELECT * FROM contact");

        if ($requete->rowCount() > 0) {
            while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
                echo "Nom: " . $row['nom'] . "<br>";
                echo "Prénom: " . $row['prenom'] . "<br>";
                echo "Email: " . $row['email'] . "<br>";
                echo "Téléphone: " . $row['tel'] . "<br>";
                echo "sujet: " . $row['sujet'] . "<br>";
                echo "Description: " . $row['description'] . "<br>";
                echo "<br>";
            }
        } else {
            echo "Aucun message trouvé.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "La connexion à la base de données n'est pas établie.";
}
?>
