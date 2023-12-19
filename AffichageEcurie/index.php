<?php
require_once "classeEcu.php";
$ecurieObj = new Ecurie();
$ecuries = $ecurieObj->getEcuriesLastSeason();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h2>Toutes</h2>
    <div class="toutes">

        <?php
   
       foreach ($ecuries as $ecurie) {
            // Accédez directement aux propriétés de l'objet $ecurie
            $nomEcurie = $ecurie->nom;
            $couleurEcurie = $ecurie->couleur;

            // Remplacez les espaces par des underscores dans le nom de l'écurie pour le chemin de l'image
            $nomEcurieSansEspaces = str_replace(' ', '_', $nomEcurie);

            // Affichez "voiture_mercedes.png" sans changer les autres lignes
            echo '<div class="ecurie" id="' . $ecurie->id . '">';
            echo '<div class="ecurie-background" style="background-color: ' . $couleurEcurie . ';"></div>';
            echo '<h4>' . $nomEcurie . '</h4>';
            echo '<img src="images/voiture_' . $nomEcurieSansEspaces . '.png" alt="Image écurie ' . $ecurie->id . '" width="200px" height="200px" margin-left="200px">';
            /*echo '<img src="images/voiture_' . $nomEcurieSansEspaces . '.png" alt="Image écurie ' . $ecurie->id . '" style="width: 200px; height: 200px; margin-left: 200px;">';*/
            echo '</div>';
       }
        ?>
    </div>

</body>

</html>